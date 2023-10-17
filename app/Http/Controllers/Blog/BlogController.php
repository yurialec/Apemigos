<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\StoreBlogRequest;
use App\Models\Blog\Blog;
use App\Models\Blog\BlogUser;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
                $lastBlogId = Blog::latest()->first();

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
                ->wiwithErrorsth('message', 'Erro ao cadastrar blog');
        }
    }

    public function show($id)
    {
        $blog = Blog::where('id', $id)->first();

        $user = $blog->blogUser[0];

        $slugTitulo = Str::of($blog->titulo)->slug('-');

        $fotos = json_decode($blog->imagem);

        return view('Blog.show', compact('blog', 'user', 'slugTitulo', 'fotos'));
    }
}
