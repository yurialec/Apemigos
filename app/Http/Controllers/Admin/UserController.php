<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Listar usuarios
     *
     * @return void
     */
    public function index()
    {
        $users = User::all();
        return view('Admin.Users.index', compact('users'));
    }
}
