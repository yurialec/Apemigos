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

        try {
            DB::beginTransaction();

            $user = new User;
            $user->create($data);

            $lastUser = User::orderBy('id', 'DESC')->first();

            DB::table('user_to_role')->insert([
                'user_id' => $lastUser->id,
                'role_id' => 3,
            ]);

            DB::commit();

            return redirect()->route('dashboard')
                ->with('message', 'Usuário cadastrado com sucesso');
        } catch (Exception $e) {
            DB::rollback();
            // throw new Exception($e);
            return redirect()->route('dashboard')
                ->wiwithErrorsth('message', 'Erro ao criar usuário');
        }
    }

    public function show($id)
    {
        $user = DB::table('users')
            ->join('user_to_role', 'users.id', '=', 'user_to_role.user_id')
            ->join('roles', 'roles.id', '=', 'user_to_role.role_id')
            ->select('users.*', 'roles.id AS role_id', 'roles.name AS role_name', 'roles.description AS role_description')
            ->where('users.id', '=', $id)
            ->first();

        return view('Adm.Users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = DB::table('users')
            ->join('user_to_role', 'users.id', '=', 'user_to_role.user_id')
            ->join('roles', 'roles.id', '=', 'user_to_role.role_id')
            ->select('users.*', 'roles.id AS role_id', 'roles.name AS role_name', 'roles.description AS role_description')
            ->where('users.id', '=', $id)
            ->first();

        $roles = Roles::all();
        return view('Adm.Users.edit', compact('user', 'roles'));
    }

    public function update(UpdateUserRequest $request)
    {
        $data = $request->all();

        try {
            DB::beginTransaction();

            $user = new User;
            $user->update($data);

            DB::table('user_to_role')->select("*")->where([
                'user_id' => $data['id']
            ])->update([
                'role_id' => $data['role']
            ]);

            DB::commit();

            return redirect()->route('dashboard')
                ->with('message', 'Usuário atualizado com sucesso');
        } catch (Exception $e) {
            DB::rollback();
            // throw new Exception($e);
            return redirect()->route('dashboard')
                ->wiwithErrorsth('message', 'Erro ao atualizar usuário');
        }
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();

            User::find($id)->delete();

            DB::table('user_to_role')->select("*")->where([
                'user_id' => $id
            ])->delete();

            DB::commit();

            return redirect()->route('dashboard')
                ->with('message', 'Usuário excluido com sucesso');
        } catch (Exception $e) {
            DB::rollback();
            // throw new Exception($e);
            return redirect()->route('dashboard')
                ->wiwithErrorsth('message', 'Erro ao excluir usuário');
        }
    }
}
