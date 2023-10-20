<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\StoreFooterRequest;
use App\Http\Requests\Site\UpdateFooterRequest;
use App\Models\Site\Footer;

class FooterController extends Controller
{
    public function index()
    {
        $footer = Footer::first();

        return view('Site.Footer.index', compact('footer'));
    }

    public function create()
    {
        return view('Site.Footer.create');
    }

    public function store(StoreFooterRequest $request)
    {
        $data = $request->all();
        $footer = new Footer;

        $footer->sobre = $data['sobre'];
        $footer->info = $data['info'];
        $footer->contato = $data['contato'];
        $footer->endereco = $data['endereco'];
        $footer->email = $data['email'];

        if ($footer->save()) {
            return redirect()->route('dashboard')
                ->with('message', 'Dados atualizados com sucesso');
        } else {
            return redirect()->route('dashboard')
                ->withErrors('message', 'Erro ao atualizar os dados');
        }
    }

    public function edit($id)
    {
        $result = new Footer();
        $footer = $result->first()->toArray();

        return view('Site.Footer.edit', compact('footer'));
    }

    public function update(UpdateFooterRequest $request)
    {
        $data = $request->all();

        $result = new Footer;
        $footer = $result->where('id', $data['id'])->first();

        if ($footer->update($data)) {
            return redirect()->route('dashboard')
                ->with('message', 'Dados atualizados com sucesso');
        } else {
            return redirect()->route('dashboard')
                ->withErrors('message', 'Erro ao atualizar os dados');
        }
    }
}
