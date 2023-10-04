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
    <div class="flex flex-col justify-center items-center">
        <div style="margin-top: 40px; margin-bottom: 25px;">
            <p class="font-semibold text-md text-gray-800 dark:text-gray-200 leading-tight" style="margin-left: 10px;">
                Logotipo Página inicial
            </p>
        </div>
        
        <div>
            <form method="POST" action="{{route('site.updateLogo')}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Selecione a Imagem</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="logotipo" id="file_input" type="file">
                <x-primary-button style="margin-top: 10px;">
                    Atualizar
                </x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>