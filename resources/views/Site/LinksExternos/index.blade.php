<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if ($errors->any)
        @foreach ($errors->all() as $error)
        <div class="flex flex-col justify-center items-center" style="margin-top: 15px; margin-bottom: 15px;">
            <ul>
                <li class="dark:text-gray-200">{{ $error }}</li>
            </ul>
        </div>
        @endforeach
        @endif
        @can('create_link_externo')
        <div class="flex justify-end" style="margin-top: 20px;">
            <a style="margin-right:40px; margin-bottom:20px;" href="{{route('site.createLink')}}" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold px-6 border border-gray-400 rounded shadow">
                Novo
            </a>
        </div>
        @endcan

        @if (empty($links))
        <div class="flex flex-col justify-center items-center">
            <p style="margin-top: 25px;" class="font-semibold text-md text-gray-800 dark:text-gray-200 leading-tight" style="margin-left: 10px;">
                Nenhum Registro encontrado
            </p>
        </div>
        @else
        @can('list_links_externos')
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
                            Link
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($links as $link)

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$link->id}}
                        </th>
                        <td class="px-6 py-4">
                            {{$link->name}}
                        </td>
                        <td class="px-6 py-4">
                            {{substr($link->link, 0,30)}}
                        </td>
                        <td class="px-6 py-4">
                            @can('show_link_externo')
                            <a class="dark:hover:text-white" href="{{route('site.ShowLink', $link->id)}}">Visualizar</a>
                            @endcan
                            @can('update_link_externo')
                            <a class="dark:hover:text-white" href="{{route('site.EditLink', $link->id)}}">Editar</a>
                            @endcan
                            @can('delete_link_externo')
                            <form action="{{route('site.DeleteLink', $link->id)}}" method="POST">
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
        @endcan
        @endif
    </div>
</x-app-layout>