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
                Editar Carousel
            </p>
        </div>
        <div style="width: 600px;" class="block max-w-md rounded-lg p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
            <form method="POST" action="{{route('site.UpdateCarousel')}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input value="{{$carousel->id}}" type="hidden" name="id" />
                <div style="margin-top: 10px;">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Título*</label>
                    <input value="{{$carousel->titulo}}" type="text" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" name="titulo" />
                </div>

                <div style="margin-top: 10px;">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Descrição*</label>
                    <textarea class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" name="descricao" rows="3">{{$carousel->descricao}}</textarea>
                </div>
                <div style="margin-top: 10px;">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Nome do link externo</label>
                    <input value="{{$carousel->nome_link_externo}}" type="text" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" name="nome_link_externo" />
                </div>
                <div style="margin-top: 10px;">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Link externo</label>
                    <input value="{{$carousel->url_link_externo}}" type="text" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" name="url_link_externo" />
                </div>
                <div style="margin-top: 10px;">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Imagem</label>
                    <img src="{{ URL::to("/carousel/{$carousel->imagem}") }}" alt="$carousel->titulo" width="300">
                </div>
                <div style="margin-top: 10px;">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Selecionar nova imagem</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="imagem" id="file_input" type="file">
                </div>

                <button style="margin-top: 25px;" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-10 px-4 border border-gray-400 rounded shadow" type="submit">
                    Atualizar
                </button>
            </form>
        </div>
    </div>
</x-app-layout>