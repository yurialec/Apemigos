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
        <a style="margin-right:40px; margin-bottom:20px;" href="{{route('site.EditMidiasSociais', $midia->id)}}" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold px-4 border border-gray-400 rounded shadow">
            Editar
        </a>
    </div>
    <div class="flex flex-col justify-center items-center">
        <div style="margin-top: 40px; margin-bottom: 25px;">
            <h1 class="font-semibold text-md text-gray-800 dark:text-gray-200 leading-tight">
                Detalhes da Mídia
            </h1>
            @can('update_sicial_media')
            @if (empty($midia))
            <p class="font-semibold text-md text-gray-800 dark:text-gray-200 leading-tight" style="margin-left: 10px;">
                Nenhum registro encontrado
            </p>
            @else
            <div style="width: 600px;" class="block max-w-md rounded-lg p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                <div style="margin-top: 10px;">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Icone</label>
                    <p class="{{$midia->icone}}"></p>
                </div>
                <div style="margin-top: 10px;">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Nome</label>
                    <a class="hover:bg-sky-700" href="{{$midia->url}}" target="_blank">{{$midia['nome']}}</a>
                </div>
            </div>
            @endif
            @endcan
        </div>
    </div>
</x-app-layout>