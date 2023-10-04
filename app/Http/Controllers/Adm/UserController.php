<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Http\Requests\Adm\StoreUserRequest;
use App\Http\Requests\Adm\UpdateUserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $result = new User();
        $users = $result->paginate();

        return view('Adm.Users.index', compact('users'));
    }

    public function create()
    {
        return view('Adm.Users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->all();
        $result = new User;

        if ($result->create($data)) {
            return redirect()->route('dashboard')
                ->with('message', 'Usuário criado com sucesso');
        } else {
            return redirect()->route('dashboard')
                ->wiwithErrorsth('message', 'Erro ao criar usuário');
        }
    }

    public function show($id)
    {
        $result = new User;
        $user = $result->where('id', $id)->first();
        return view('Adm.Users.show', compact('user'));
    }

    public function edit($id)
    {
        $result = new User;
        $user = $result->where('id', $id)->first();
        return view('Adm.Users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request)
    {
        $data = $request->all();
        $result = new User;
        $role = $result->where('id', $data['id'])->first();

        if ($role->update($data)) {
            return redirect()->route('dashboard')
                ->with('message', 'Usuário atualizado com sucesso');
        } else {
            return redirect()->route('dashboard')
                ->wiwithErrorsth('message', 'Erro ao atualizado usuário');
        }
    }

    public function delete($id)
    {
        $result = new User;
        $role = $result->where('id', $id)->first();

        if ($role->delete()) {
            return redirect()->route('dashboard')
                ->with('message', 'Usuário excluido com sucesso');
        } else {
            return redirect()->route('dashboard')
                ->wiwithErrorsth('message', 'Erro ao excluir usuário');
        }
    }
}
