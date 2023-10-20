<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\StoreMediaSocialRequest;
use App\Http\Requests\Site\UpdateMediaSocialrRequest;
use App\Models\Site\MidiasSociais;

class MidiasSociaisController extends Controller
{
    public function index()
    {
        $result = new MidiasSociais;
        $midias = $result->paginate();

        return view('Site.MidiasSociais.index', compact('midias'));
    }

    public function create()
    {
        return view('Site.MidiasSociais.create');
    }

    public function store(StoreMediaSocialRequest $request)
    {
        $data = $request->all();

        $midias = new MidiasSociais;
        $midias->nome = $data['nome'];
        $midias->icone = $data['icone'];
        $midias->url = $data['url'];

        if ($midias->save()) {
            return redirect()->route('dashboard')
                ->with('message', 'Midias Cadastradas com sucesso');
        } else {
            return redirect()->route('dashboard')
                ->withErrors('message', 'Erro ao cadastrar midias');
        }
    }

    public function show($id)
    {
        $result = new MidiasSociais;
        $midia = $result->where('id', $id)->first();

        return view('Site.MidiasSociais.show', compact('midia'));
    }

    public function edit($id)
    {
        $result = new MidiasSociais;
        $midia = $result->where('id', $id)->first();

        return view('Site.MidiasSociais.edit', compact('midia'));
    }

    public function update(UpdateMediaSocialrRequest $request)
    {
        $data = $request->all();

        $result = new MidiasSociais;
        $midia = $result->where('id', $data['id'])->first();

        if ($midia->update($data)) {
            return redirect()->route('dashboard')
                ->with('message', 'Mídia atualizada com sucesso');
        } else {
            return redirect()->route('dashboard')
                ->withErrors('message', 'Erro ao atualizar mídia');
        }
    }

    public function delete($id)
    {
        $result = new MidiasSociais;
        $midia = $result->where('id', $id)->first();

        if ($midia->delete()) {
            return redirect()->route('dashboard')
                ->with('message', 'Mídia excluída com sucesso');
        } else {
            return redirect()->route('dashboard')
                ->withErrors('message', 'Erro ao excluir mídia');
        }
    }
}
