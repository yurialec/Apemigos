<?php

namespace Database\Seeders;

use App\Models\Adm\Permissions;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permissions::truncate();

        $permissions = [
            //Permissões
            [
                'name' => 'create_permission',
                'description' => 'Criar permissão',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'list_permissions',
                'description' => 'Listar permissões',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'show_permission',
                'description' => 'Detalhes da permissão',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'update_permission',
                'description' => 'Atualizar permissão',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'delete_permission',
                'description' => 'Deletar permissão',
                'created_at' => Carbon::now(),
            ],

            //Níveis de Acesso
            [
                'name' => 'create_role',
                'description' => 'Criar nível de acesso',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'list_roles',
                'description' => 'Listar níveis de aceeso',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'role_permissions',
                'description' => 'Permissões do nível de acesso',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'show_role',
                'description' => 'Detalhes do nível de acesso',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'update_role',
                'description' => 'Atualizar nível de acesso',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'delete_role',
                'description' => 'Deletar nível de acesso',
                'created_at' => Carbon::now(),
            ],

            //Usuários
            [
                'name' => 'create_user',
                'description' => 'Criar usuário',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'list_users',
                'description' => 'Listar usuários',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'show_user',
                'description' => 'Detalhes do usuário',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'update_user',
                'description' => 'Atualizar usuário',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'delete_user',
                'description' => 'Deletar usuário',
                'created_at' => Carbon::now(),
            ],

            //Blog
            [
                'name' => 'create_blog',
                'description' => 'Criar blog',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'list_blogs',
                'description' => 'Listar blogs',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'show_blog',
                'description' => 'Detalhes do blog',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'update_blog',
                'description' => 'Atualizar blog',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'delete_blog',
                'description' => 'Deletar blog',
                'created_at' => Carbon::now(),
            ],

            //Caroulsel
            [
                'name' => 'list_caroulsels',
                'description' => 'Criar carousel',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'create_carousel',
                'description' => 'Cadastrar carousel',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'show_carousel',
                'description' => 'Detalhes do carousel',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'update_carousel',
                'description' => 'Atualizar carousel',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'delete_carousel',
                'description' => 'Deletar carousel',
                'created_at' => Carbon::now(),
            ],

            //Contrudo principal
            [
                'name' => 'update_main_content',
                'description' => 'Atualizar conteúdo principal',
                'created_at' => Carbon::now(),
            ],

            //Rodapé
            [
                'name' => 'update_footer',
                'description' => 'Atualizar rodapé',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'list_footers',
                'description' => 'Listar rodapé',
                'created_at' => Carbon::now(),
            ],

            //Logotipo
            [
                'name' => 'update_logotype',
                'description' => 'Atualizar logotipo',
                'created_at' => Carbon::now(),
            ],

            //Link externo
            [
                'name' => 'list_links_externos',
                'description' => 'Listar links externos',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'create_link_externo',
                'description' => 'Cadastrar link externo',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'show_link_externo',
                'description' => 'Detalhes do link externo',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'update_link_externo',
                'description' => 'Atualizar link externo',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'delete_link_externo',
                'description' => 'Deletar link externo',
                'created_at' => Carbon::now(),
            ],

            //Midias sociais
            [
                'name' => 'list_social_media',
                'description' => 'Listar midias sociais',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'create_social_media',
                'description' => 'Cadastrar midia social',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'show_social_media',
                'description' => 'Detalhes da midia social',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'update_social_media',
                'description' => 'Atualizar midia social',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'delete_social_media',
                'description' => 'Deletar midia social',
                'created_at' => Carbon::now(),
            ],
        ];

        Permissions::insert($permissions);
    }
}
