<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex">
            <aside class="h-screen sticky top-0" style="margin-right: 25px; margin-bottom: 25px;">
                @include('layouts.sidebar.Adm.sidebar')
            </aside>
            <main class="mt-16 flex-1" style="margin-right: 25px; margin-bottom: 25px;">
                @if ($errors->any)
                @foreach ($errors->all() as $error)
                <div class="flex flex-col justify-center items-center" style="margin-top: 15px; margin-bottom: 15px;">
                    <ul>
                        <li class="dark:text-gray-200">{{ $error }}</li>
                    </ul>
                </div>
                @endforeach
                @endif

                @can('create_user')
                <div class="flex justify-end" style="margin-top: 20px;">
                    <a style="margin-right:40px; margin-bottom:20px;" href="{{route('adm.CreateUser')}}" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold px-4 border border-gray-400 rounded shadow">
                        Novo
                    </a>
                </div>
                @endcan

                @can('list_users')
                @if (empty($users))
                <div class="flex flex-col justify-center items-center">
                    <p style="margin-top: 25px;" class="font-semibold text-md text-gray-800 dark:text-gray-200 leading-tight" style="margin-left: 10px;">
                        Nenhum Registro encontrado
                    </p>
                </div>
                @else
                <div class="relative overflow-x-auto flex flex-col justify-center items-center">
                    <table class="w-600 text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nome
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    E-mail
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Ações
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    {{$user->id}}
                                </td>
                                <th scope="row" class="px-6 py-4">
                                    {{$user->name}}
                                </th>
                                <th scope="row" class="px-6 py-4">
                                    {{$user->email}}
                                </th>
                                <td class="px-6 py-4">
                                    @can('show_user')
                                    <a class="dark:hover:text-white" href="{{route('adm.ShowUser', $user->id)}}">Visualizar</a>
                                    @endcan
                                    @can('update_user')
                                    <a class="dark:hover:text-white" href="{{route('adm.EditUser', $user->id)}}">Editar</a>
                                    @endcan
                                    @can('delete_user')
                                    <form action="{{route('adm.DeleteUser', $user->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="dark:hover:text-white">Excluir</button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
                @endcan
            </main>
        </div>
    </div>
</x-app-layout>