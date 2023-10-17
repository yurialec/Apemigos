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
        <div class="flex flex-col justify-center items-center">
            <div style="margin-top: 40px; margin-bottom: 25px;">
                <p class="font-semibold text-md text-gray-800 dark:text-gray-200 leading-tight" style="margin-left: 10px;">
                    Novo Blog
                </p>
            </div>
            <div style="width: 600px;" class="block max-w-md rounded-lg p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                <form method="POST" action="{{route('StoreBlog')}}" enctype="multipart/form-data">
                    @csrf
                    <div style="margin-top: 10px;">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Título</label>
                        <input type="text" name="titulo" value="{{ old('titulo') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>

                    <div style="margin-top: 10px;">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Data do evento</label>
                        <input type="date" name="data_evento" value="{{ old('data_evento') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>

                    <div style="margin-top: 10px;">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Descição</label>
                        <textarea name="texto" value="{{ old('descricao') }}" rows="3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                    </div>

                    <div style="margin-top: 10px;">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Imagem</label>
                        <input name="imagem[]" type="file" value="{{ old('imagem') }}" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" multiple>
                    </div>

                    <button style="margin-top: 25px;" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold px-4 border border-gray-400 rounded shadow" type="submit">
                        Cadastrar
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>