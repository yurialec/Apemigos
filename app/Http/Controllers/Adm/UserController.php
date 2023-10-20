<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Http\Requests\Adm\StoreUserRequest;
use App\Http\Requests\Adm\UpdateUserRequest;
use App\Models\Adm\Roles;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();
        return view('Adm.Users.index', compact('users'));
    }

    public function create()
    {
        return view('Adm.Users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->all();
        $data['role_id'] = 4;

        if (User::create($data)) {
            return redirect()->route('dashboard')
                ->with('message', 'Usuário cadastrado com sucesso');
        } else {
            return redirect()->route('dashboard')
                ->withErrors('message', 'Erro ao cadastrar usuário');
        }
    }

    public function show($id)
    {
        $user = User::where('id', $id)->first();
        return view('Adm.Users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        $roles = Roles::all();

        return view('Adm.Users.edit', compact('user', 'roles'));
    }

    public function update(UpdateUserRequest $request)
    {
        $data = $request->all();

        $user = User::where('id', $data['id'])->first();

        if ($user->update($data)) {
            return redirect()->route('dashboard')
                ->with('message', 'Usuário atualizada com sucesso');
        } else {
            return redirect()->route('dashboard')
                ->withErrors('message', 'Erro ao atualizar usuário');
        }
    }

    public function delete($id)
    {
        $user = User::where('id', $id)->first();

        if ($user->delete()) {
            return redirect()->route('dashboard')
                ->with('message', 'Usuário excluido com sucesso');
        } else {
            return redirect()->route('dashboard')
                ->withErrors('message', 'Erro ao excluir usuário');
        }
    }
}
