<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\StoreBlogRequest;
use App\Models\Blog\Blog;
use App\Models\Blog\BlogUser;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate();
        return view('Blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('Blog.create');
    }

    public function store(StoreBlogRequest $request)
    {
        $data = $request->all();
        $user = Auth::user();

        try {
            DB::beginTransaction();

            $files = [];

            foreach ($data['imagem'] as $imagefile) {
                $fileName = Str::of($request->titulo . rand(10, 1000))->slug('-') . '.' . $imagefile->extension();
                $imagefile->move(public_path('blog/' . $user->id . "/" . Str::of($request->titulo)->slug('-')), $fileName);
                $files[]['name'] = $fileName;
            }

            $blog = new Blog;
            $blog->titulo = $data['titulo'];
            $blog->data_evento = $data['data_evento'];
            $blog->texto = $data['texto'];
            $blog->imagem = json_encode($files);

            if ($blog->save()) {

                //Recupera o ultimo registro dos blogs
                $lastBlogId = Blog::latest()->first() ?? 1;

                $blogUser = new BlogUser;
                $blogUser->blog_id = $lastBlogId->id;
                $blogUser->user_id = Auth::user()->id;

                $blogUser->save();
            }


            DB::commit();

            return redirect()->route('dashboard')
                ->with('message', 'Novo Blog cadastrado com sucesso');
        } catch (Exception $err) {
            DB::rollback();
            dd($err);
            return redirect()->route('dashboard')
                ->withErrors('message', 'Erro ao cadastrar blog');
        }
    }

    public function show($id)
    {
        $result = new Blog;
        $blog = $result->where('id', $id)->first();

        $user = $blog->blogUser[0];

        $slugTitulo = Str::of($blog->titulo)->slug('-');

        $fotos = json_decode($blog->imagem);

        return view('Blog.show', compact('blog', 'user', 'slugTitulo', 'fotos'));
    }

    public function edit($id)
    {
        $blog = Blog::where('id', $id)->first();
        $user = $blog->blogUser[0];
        $slugTitulo = Str::of($blog->titulo)->slug('-');
        $fotos = json_decode($blog->imagem);

        if ($user->id == Auth::user()->id) {
            return view('Blog.edit', compact('blog', 'user', 'slugTitulo', 'fotos'));
        } else {
            return redirect()->route('dashboard')
                ->with('message', 'Sem a permissão necessária');
        }
    }

    public function update(Request $request)
    {
        //recebe os dados do formulario
        $data = $request->all();

        //consulta o registro
        $result = new Blog;
        $blog = $result->where('id', $data['id'])->first();

        //dados do usuario
        $user = $blog->blogUser[0];

        if (empty($data['imagem'])) {

            $images = [];

            //Diretorio
            $dir = public_path("blog\\" . $user->id . "\\" . Str::of($blog->titulo)->slug('-') . "\\");

            //Arquivos no diretorio
            $filesInFolder = File::files($dir);

            foreach ($filesInFolder as $path) {
                $file = pathinfo($path);
                $images[]['name'] = $file['basename'];
            }

            if (!empty($data['new_image'])) {

                foreach ($data['new_image'] as $imagefile) {
                    $fileName = Str::of($request->titulo . rand(10, 1000))->slug('-') . '.' . $imagefile->extension();
                    $imagefile->move(public_path('blog/' . $user->id . "/" . Str::of($request->titulo)->slug('-')), $fileName);
                    $images[]['name'] = $fileName;
                }
            }

            $blog->titulo = $data['titulo'];
            $blog->data_evento = $data['data_evento'];
            $blog->texto = $data['texto'];
            $blog->imagem = json_encode($images);

            if ($blog->save()) {
                return redirect()->route('dashboard')
                    ->with('message', 'Blog atualizado com sucesso');
            } else {
                return redirect()->route('dashboard')
                    ->withErrors('message', 'Erro ao atualizar blog');
            }
        } else {

            $images = [];

            //Diretorio
            $dir = public_path("blog\\" . $user->id . "\\" . Str::of($blog->titulo)->slug('-') . "\\");

            foreach ($data['imagem'] as $key => $value) {
                if (File::exists($dir . $value)) {
                    File::delete($dir . $value);
                }
            }

            $filesInFolder = File::files($dir);
            foreach ($filesInFolder as $path) {
                $file = pathinfo($path);
                $images[]['name'] = $file['basename'];
            }

            if (!empty($data['new_image'])) {
                foreach ($data['new_image'] as $imagefile) {
                    $fileName = Str::of($request->titulo . rand(10, 1000))->slug('-') . '.' . $imagefile->extension();
                    $imagefile->move(public_path('blog/' . $user->id . "/" . Str::of($request->titulo)->slug('-')), $fileName);
                    $images[]['name'] = $fileName;
                }
            }

            $blog->titulo = $data['titulo'];
            $blog->data_evento = $data['data_evento'];
            $blog->texto = $data['texto'];
            $blog->imagem = json_encode($images);

            if ($blog->save()) {
                return redirect()->route('dashboard')
                    ->with('message', 'Blog atualizado com sucesso');
            } else {
                return redirect()->route('dashboard')
                    ->withErrors('message', 'Erro ao atualizar blog');
            }
        }
    }

    public function delete($id)
    {
        $blogResult = new Blog;
        $blog = $blogResult->where('id', $id)->first();

        //Criador do blog
        $user = $blog->blogUser[0];

        $blogUserResult = new BlogUser;
        $blogUser = $blogUserResult->where('blog_id', $blog->id)->first();


        if (Auth::user()->id !== $user->id) {
            return redirect()->route('dashboard')
                ->withErrors('message', 'Você não tem permissão para excluir este registro');
        } else {
            $dir = public_path("blog\\" . $user->id . "\\" . Str::of($blog->titulo)->slug('-'));

            if (File::deleteDirectory($dir)) {
                if ($blog->delete() and $blogUser->delete()) {
                    return redirect()->route('dashboard')
                        ->with('message', 'Blog excluido com sucesso');
                } else {
                    return redirect()->route('dashboard')
                        ->withErrors('message', 'Erro ao excluir registro');
                }
            } else {
                return redirect()->route('dashboard')
                    ->withErrors('message', 'Erro ao excluir registro');
            }
        }
    }
}
