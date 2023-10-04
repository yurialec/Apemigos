<x-app-layout>
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

            <div class="flex justify-end" style="margin-top: 20px;">
                <a style="margin-right:40px; margin-bottom:20px;" href="{{route('adm.CreatePermission')}}" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold px-4 border border-gray-400 rounded shadow">
                    Novo
                </a>
            </div>

            @if (empty($permissions->items()))
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
                                Descrição
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Ações
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)

                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">
                                {{$permission->id}}
                            </td>
                            <th scope="row" class="px-6 py-4">
                                {{$permission->name}}
                            </th>
                            <td class="px-6 py-4">
                                {{$permission->description}}
                            </td>
                            <td class="px-6 py-4">
                                <a class="dark:hover:text-white" href="{{route('adm.ShowPermission', $permission->id)}}">Visualizar</a>
                                <a class="dark:hover:text-white" href="{{route('adm.EditPermission', $permission->id)}}">Editar</a>
                                <form action="{{route('adm.DeletePermission', $permission->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="dark:hover:text-white">Excluir</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $permissions->links() }}
            </div>
            @endif
        </main>
    </div>
</x-app-layout>