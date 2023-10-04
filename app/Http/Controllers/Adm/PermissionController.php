<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Http\Requests\Adm\StorePermissionRequest;
use App\Http\Requests\Adm\UpdatePermissionRequest;
use App\Models\Adm\Permissions;

class PermissionController extends Controller
{
    public function index()
    {
        $result = new Permissions;
        $permissions = $result->paginate();

        return view('Adm.Permission.index', compact('permissions'));
    }

    public function create()
    {
        return view('Adm.Permission.create');
    }

    public function store(StorePermissionRequest $request)
    {
        $data = $request->all();
        $permission = new Permissions;

        if ($permission->create($data)) {
            return redirect()->route('dashboard')
                ->with('message', 'Permissão criada com sucesso');
        } else {
            return redirect()->route('dashboard')
                ->wiwithErrorsth('message', 'Erro ao criar permissão');
        }
    }

    public function show($id)
    {
        $result = new Permissions;
        $permission = $result->where('id', $id)->first();

        return view('Adm.Permission.show', compact('permission'));
    }

    public function edit($id)
    {
        $result = new Permissions;
        $permission = $result->where('id', $id)->first();

        return view('Adm.Permission.edit', compact('permission'));
    }

    public function update(UpdatePermissionRequest $request)
    {
        $data = $request->all();

        $result = new Permissions;
        $permission = $result->where('id', $data['id'])->first();

        if ($permission->update($data)) {
            return redirect()->route('dashboard')
                ->with('message', 'Permissão atualizada com sucesso');
        } else {
            return redirect()->route('dashboard')
                ->wiwithErrorsth('message', 'Erro ao atualizar permissão');
        }
    }

    public function delete($id)
    {
        $result = new Permissions;
        $permission = $result->where('id', $id)->first();

        if ($permission->delete()) {
            return redirect()->route('dashboard')
                ->with('message', 'Permissão excluida com sucesso');
        } else {
            return redirect()->route('dashboard')
                ->wiwithErrorsth('message', 'Erro ao excluir permissão');
        }
    }
}
