<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\StoreLinkExternoRequest;
use App\Http\Requests\Site\UpdateLinkExternoRequest;
use App\Models\Site\ExternalLinks;

class LinksExternosController extends Controller
{
    public function index()
    {
        $links = ExternalLinks::paginate();
        return view('Site.LinksExternos.index', compact('links'));
    }

    public function create()
    {
        return view('Site.LinksExternos.create');
    }

    public function store(StoreLinkExternoRequest $request)
    {
        $data = $request->all();

        $links = new ExternalLinks;

        $links->name = $data['name'];
        $links->link = $data['link'];

        if ($links->save()) {
            return redirect()->route('dashboard')
                ->with('message', 'Link cadastrado com sucesso');
        } else {
            return redirect()->route('dashboard')
                ->wiwithErrorsth('message', 'Erro ao cadastrar novo link');
        }
    }

    public function show($id)
    {
        $link = ExternalLinks::where('id', $id)->first();
        return view('Site.LinksExternos.show', compact('link'));
    }

    public function edit($id)
    {
        $link = ExternalLinks::where('id', $id)->first();
        return view('Site.LinksExternos.edit', compact('link'));
    }

    public function update(UpdateLinkExternoRequest $request)
    {
        $data = $request->all();

        $link = ExternalLinks::where('id', $data['id'])->first();

        $link->name = $data['name'];
        $link->link = $data['link'];

        if ($link->save()) {
            return redirect()->route('dashboard')
                ->with('message', 'Link atualizado com sucesso');
        } else {
            return redirect()->route('dashboard')
                ->wiwithErrorsth('message', 'Erro ao atualizar link');
        }
    }

    public function delete($id)
    {
        if (ExternalLinks::find($id)->delete()) {
            return redirect()->route('dashboard')
                ->with('message', 'Link excluido com sucesso');
        } else {
            return redirect()->route('dashboard')
                ->wiwithErrorsth('message', 'Erro ao excluir link');
        }
    }
}
