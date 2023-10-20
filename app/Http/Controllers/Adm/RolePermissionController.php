<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Http\Requests\Adm\UpdateRolePermissionRequest;
use App\Models\Adm\Permissions;
use App\Models\Adm\Roles;
use App\Models\Adm\RolesPermission;
use Exception;
use Illuminate\Support\Facades\DB;

class RolePermissionController extends Controller
{
    public function index($roleId)
    {
        $permissions = RolesPermission::where('role_id', '=', $roleId)
            ->with('role')
            ->with('permissions')
            ->get();

        //Dados do nivel de acesso
        $role = '';
        foreach ($permissions as $key => $value) {
            $role = $value->role;
        }

        //Listar permissoes ja vinculadas ao nivel de acesso
        $isChecked = [];

        foreach ($permissions->toArray() as $value) {
            $isChecked[] = $value['permissions']['id'];
        }

        //Listar todas as permissoes
        $getAllPermissions = Permissions::all();

        $roleInfo = Roles::where('id', $roleId)->first();

        return view('Adm.Roles.RolePermission.index', compact('role', 'isChecked', 'getAllPermissions', 'roleId', 'permissions', 'roleInfo'));
    }

    public function updateRolePermisison(UpdateRolePermissionRequest $request)
    {
        //Recebe todas as permissões marcadas
        $data = $request->all();

        //Permissoes selecionadas
        $permissionsArr = $data['permissions'];

        //Nivel de acesso
        $roleId = $data['role_id'];

        try {
            DB::beginTransaction();

            if (RolesPermission::where('role_id', '=', $roleId)->delete()) {

                $role = Roles::where('id', $data['role_id'])->first();

                foreach ($permissionsArr as $key => $value) {
                    DB::table('permissions_to_roles')->insert([
                        'permission_id' => $value,
                        'role_id' => $role->id,
                    ]);
                }
            } else {

                $role = Roles::where('id', $data['role_id'])->first();

                foreach ($permissionsArr as $key => $value) {
                    DB::table('permissions_to_roles')->insert([
                        'permission_id' => $value,
                        'role_id' => $role->id,
                    ]);
                }
            }

            DB::commit();

            return redirect()->route('dashboard')
                ->with('message', 'Permissões do Nível atualizadas com sucesso');
        } catch (Exception $err) {
            DB::rollback();
            dd($err)->getMessage();
            return redirect()->route('dashboard')
                ->withErrors('message', 'Erro ao atualizar permissões do nível de acesso');
        }
    }
}
