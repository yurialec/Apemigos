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
        @if (empty($footer))
        <a style="margin-right:40px; margin-bottom:20px;" href="{{route('site.CreateFooter')}}" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold px-4 border border-gray-400 rounded shadow">
            Novo
        </a>
        @else
        <a style="margin-right:40px; margin-bottom:20px;" href="{{route('site.EditFooter', $footer['id'])}}" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold px-4 border border-gray-400 rounded shadow">
            Editar
        </a>
        @endif
    </div>

    <div class="flex flex-col justify-center items-center">
        <div style="margin-top: 40px; margin-bottom: 25px;">
            <p class="font-semibold text-md text-gray-800 dark:text-gray-200 leading-tight" style="margin-left: 10px;">
                Conteúdo Rodapé
            </p>
        </div>
        @if (empty($footer))
        <p class="font-semibold text-md text-gray-800 dark:text-gray-200 leading-tight" style="margin-left: 10px;">
            Nenhum registro encontrado
        </p>
        @else
        <div style="width: 600px;" class="block max-w-md rounded-lg p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
            <div style="margin-top: 10px;">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Sobre</label>
                <p class="font-semibold text-md text-gray-800 dark:text-gray-200 leading-tight">{{$footer['sobre']}}</p>
            </div>
            <div style="margin-top: 10px;">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Info</label>
                <p class="font-semibold text-md text-gray-800 dark:text-gray-200 leading-tight">{{$footer['info']}}</p>
            </div>
            <div style="margin-top: 10px;">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Contato</label>
                <p class="font-semibold text-md text-gray-800 dark:text-gray-200 leading-tight">{{$footer['contato']}}</p>
            </div>
            <div style="margin-top: 10px;">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Endereço</label>
                <p class="font-semibold text-md text-gray-800 dark:text-gray-200 leading-tight">{{$footer['endereco']}}</p>
            </div>
            <div style="margin-top: 10px;">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">E-mail</label>
                <p class="font-semibold text-md text-gray-800 dark:text-gray-200 leading-tight">{{$footer['email']}}</p>
            </div>
        </div>
        @endif
    </div>
</x-app-layout>