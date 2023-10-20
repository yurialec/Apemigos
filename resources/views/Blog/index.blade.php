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

        @can('add_blog')
        <div class="flex justify-end" style="margin-top: 20px;">
            <a style="margin-right:40px; margin-bottom:20px;" href="{{route('create')}}" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold px-4 border border-gray-400 rounded shadow">
                Novo
            </a>
        </div>
        @endcan
        @can('list_users')
        @if ($blogs->isEmpty())
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
                            Título
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Data do Evento
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
                    @foreach ($blogs as $blog)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            {{$blog->id}}
                        </td>
                        <th scope="row" class="px-6 py-4">
                            {{$blog->titulo}}
                        </th>
                        <th scope="row" class="px-6 py-4">
                            {{$blog->data_evento}}
                        </th>
                        <th scope="row" class="px-6 py-4">
                            {{$blog->texto}}
                        </th>
                        <td class="px-6 py-4">
                            @can('show_blog')
                            <a class="dark:hover:text-white" href="{{route('ShowBlog', $blog->id)}}">Visualizar</a>
                            @endcan

                            @if ($blog->blogUser[0]->id == Auth::user()->id)
                            @can('update_blog')
                            <a class="dark:hover:text-white" href="{{route('EditBlog', $blog->id)}}">Editar</a>
                            @endcan
                            @can('delete_blog')
                            <form action="{{route('DeleteBlog', $blog->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="dark:hover:text-white">Excluir</button>
                            </form>
                            @endcan
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
        @endcan

    </div>
</x-app-layout>