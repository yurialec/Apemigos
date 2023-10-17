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
        @if (empty($blog))
        <div class="flex flex-col justify-center items-center">
            <p style="margin-top: 25px;" class="font-semibold text-md text-gray-800 dark:text-gray-200 leading-tight" style="margin-left: 10px;">
                Nenhum Registro encontrado
            </p>
        </div>
        @else
        <div class="flex justify-end" style="margin-top: 20px;">
            <a style="margin-right:40px; margin-bottom:20px;" href="#" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold px-4 border border-gray-400 rounded shadow">
                Editar
            </a>
        </div>
        <div class="flex flex-col justify-center items-center">
            <div style="width: 600px;" style="margin-top: 40px; margin-bottom: 25px;">
                <h1 class="font-semibold text-md text-gray-800 dark:text-gray-200 leading-tight">
                    Detalhes do Blog
                </h1>
                <div style="width: 600px;" class="block max-w-md rounded-lg p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                    <div style="margin-top: 10px;">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Título</label>
                        <p class="font-semibold text-md text-gray-800 dark:text-gray-200 leading-tight">{{$blog->titulo}}</p>
                    </div>
                    <div style="margin-top: 10px;">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Data do evento</label>
                        <p class="font-semibold text-md text-gray-800 dark:text-gray-200 leading-tight">{{$blog->data_evento}}</p>
                    </div>
                    <div style="margin-top: 10px;">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Texto</label>
                        <p class="font-semibold text-md text-gray-800 dark:text-gray-200 leading-tight">{{$blog->texto}}</p>
                    </div>
                    <div style="margin-top: 10px;">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Fotos</label>
                        @foreach ($fotos as $foto)
                        <p style="margin-top: 10px;">
                            <img src="{{ URL::to("/blog/$user->id/$slugTitulo/$foto->name") }}" alt="{{$blog->titulo}}">
                        </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</x-app-layout>