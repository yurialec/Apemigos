<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\StoreCarouselRequest;
use App\Http\Requests\Site\UpdateCarouselRequest;
use App\Models\Site\Carousel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class CarouselController extends Controller
{
    public function index()
    {
        $carousels = Carousel::paginate();
        return view('Site.Carousel.index', compact('carousels'));
    }

    public function create()
    {
        return view('Site.Carousel.create');
    }

    public function store(StoreCarouselRequest $request)
    {
        $data = $request->all();

        if ($request->imagem->isValid()) {

            $nameFile = Str::of($request->titulo)->slug('-') . '.' . $request->imagem->getClientOriginalExtension();
            $imagem = $request->imagem->move('carousel', $nameFile);
            $data['imagem'] = $nameFile;
        }

        if (Carousel::create($data)) {
            return redirect()
                ->route('dashboard')
                ->with('message', 'Item criado com sucesso');
        } else {
            return redirect()
                ->route('dashboard')
                ->withErrors('message', 'Erro ao criar item, tente novamente mais tarde');
        }
    }

    public function show($id)
    {
        $carousel = Carousel::find($id)->first();
        return view('Site.Carousel.show', compact('carousel'));
    }

    public function edit($id)
    {
        $carousel = Carousel::where('id', $id)->first();
        return view('Site.Carousel.edit', compact('carousel'));
    }

    public function update(UpdateCarouselRequest $request)
    {
        //Recebe os dados do formulario
        $data = $request->all();

        //Verificar registro no banco de dados
        $carousel = new Carousel;
        $result = $carousel->where('id', $data['id'])->first();

        $dir = public_path("carousel\\" . $result->imagem);

        if (isset($data['imagem'])) {
            if (File::exists(public_path("carousel\\" . $carousel->image))) {
                unlink($dir . $carousel->image);
            }
        }

        if (!empty($data['imagem']) and $request->imagem->isValid()) {

            $nameFile = Str::of($request->titulo)->slug('-') . '.' . $request->imagem->getClientOriginalExtension();
            $request->imagem->move('carousel', $nameFile);
            $data['imagem'] = $nameFile;
        }

        if ($result->update($data)) {
            return redirect()
                ->route('dashboard')
                ->with('message', 'Registro atualizado com sucesso');
        } else {
            return redirect()
                ->route('dashboard')
                ->withErrors('message', 'Erro ao atualizar registro');
        }
    }

    public function delete($id)
    {
        $carousel = new Carousel;
        $result = $carousel->where('id', $id)->first();

        $dir = public_path("carousel\\" . $result->imagem);

        if (File::exists(public_path("carousel\\" . $carousel->image))) {
            unlink($dir . $carousel->image);
        }

        if ($result->delete()) {
            return redirect()
                ->route('dashboard')
                ->with('message', 'Registro excluido com sucesso');
        } else {
            return redirect()
                ->route('dashboard')
                ->withErrors('message', 'Erro ao excluir registro');
        }
    }
}
