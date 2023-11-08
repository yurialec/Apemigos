<?php

namespace Database\Seeders;

use App\Models\Adm\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Roles::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $roles = [
            [
                'id' => 1,
                'name' => 'desenvolvedor',
                'description' => 'Desenvolvedor'
            ],

            [
                'id' => 2,
                'name' => 'administrador',
                'description' => 'Administrador'
            ],

            [
                'id' => 3,
                'name' => 'funcionario',
                'description' => 'Funcionário'
            ],

            [
                'id' => 4,
                'name' => 'usuario',
                'description' => 'Usuário'
            ],
        ];

        Roles::insert($roles);
    }
}
