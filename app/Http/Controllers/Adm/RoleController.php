<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Http\Requests\Adm\StoreRoleRequest;
use App\Http\Requests\Adm\UpdateRoleRequest;
use App\Models\Adm\Roles;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Roles::paginate();
        return view('Adm.Roles.index', compact('roles'));
    }

    public function create()
    {
        return view('Adm.Roles.create');
    }

    public function store(StoreRoleRequest $request)
    {
        $data = $request->all();

        $result = new Roles;

        if ($result->create($data)) {
            return redirect()->route('dashboard')
                ->with('message', 'Papel criado com sucesso');
        } else {
            return redirect()->route('dashboard')
                ->wiwithErrorsth('message', 'Erro ao criar papel');
        }
    }

    public function show($id)
    {
        $result = new Roles;
        $role = $result->where('id', $id)->first();
        return view('Adm.Roles.show', compact('role'));
    }

    public function edit($id)
    {
        $result = new Roles;
        $role = $result->where('id', $id)->first();
        return view('Adm.Roles.edit', compact('role'));
    }

    public function update(UpdateRoleRequest $request)
    {
        $data = $request->all();
        $result = new Roles;
        $role = $result->where('id', $data['id'])->first();

        if ($role->update($data)) {
            return redirect()->route('dashboard')
                ->with('message', 'Papel atualizado com sucesso');
        } else {
            return redirect()->route('dashboard')
                ->wiwithErrorsth('message', 'Erro ao atualizado papel');
        }
    }

    public function delete($id)
    {
        $result = new Roles;
        $role = $result->where('id', $id)->first();

        if ($role->delete()) {
            return redirect()->route('dashboard')
                ->with('message', 'Papel excluido com sucesso');
        } else {
            return redirect()->route('dashboard')
                ->wiwithErrorsth('message', 'Erro ao excluir papel');
        }
    }
}
