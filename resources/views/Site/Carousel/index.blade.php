<x-app-layout>
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
        <a style="margin-right:40px; margin-bottom:20px;" href="{{route('site.CreateCarousel')}}" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold px-4 border border-gray-400 rounded shadow">
            Novo
        </a>
    </div>

    @if (empty($carousels))
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
                        Descrição
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Imagem
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nome link externo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Link externo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ações
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carousels as $carousel)

                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">
                        {{$carousel->id}}
                    </td>
                    <th scope="row" class="px-6 py-4">
                        {{$carousel->titulo}}
                    </th>
                    <td class="px-6 py-4">
                        {{substr($carousel->descricao, 0,30)}}
                    </td>
                    <td class="px-6 py-4">
                        <img src="{{ URL::to("/carousel/{$carousel->imagem}") }}" alt="{{ $carousel->titulo }}" width="250px">
                    </td>
                    <td class="px-6 py-4">
                        {{$carousel->nome_link_externo ?? '---'}}
                    </td>
                    <td class="px-6 py-4">
                        {{substr($carousel->url_link_externo, 0,30) ?? '---'}}
                    </td>
                    <td class="px-6 py-4">
                        <a class="dark:hover:text-white" href="{{route('site.ShowCarousel', $carousel->id)}}">Visualizar</a>
                        <a class="dark:hover:text-white" href="{{route('site.EditCarousel', $carousel->id)}}">Editar</a>
                        <form action="{{route('site.DeleteCarousel', $carousel->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="dark:hover:text-white">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</x-app-layout>