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
                Dados da Mídia
            </p>
        </div>
        <div style="width: 600px;" class="block max-w-md rounded-lg p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
            <form method="POST" action="{{route('site.UpdateMidiasSociais')}}">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{$midia->id}}" />
                <div style="margin-top: 10px;">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Nome</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="nome" value="{{$midia->nome ?? old('nome') }}" />
                </div>

                <div style="margin-top: 10px;">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Ícone</label>
                    <select id="icone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="icone">
                        <option selected value="{{$midia->icone}}">{{$midia->nome}}</option>
                        <option value="fa fa-facebook">facebook</option>
                        <option value="fa fa-twitter">twitter</option>
                        <option value="fa fa-google">google</option>
                        <option value="fa fa-linkedin">linkedin</option>
                        <option value="fa fa-youtube">youtube</option>
                        <option value="fa fa-instagram">instagram</option>
                        <option value="fa fa-pinterest">pinterest</option>
                        <option value="fa fa-snapchat-ghost">snapchat</option>
                        <option value="fa fa-skype">skype</option>
                        <option value="fa fa-android">android</option>
                        <option value="fa fa-dribbble">dribbble</option>
                        <option value="fa fa-vimeo">vimeo</option>
                        <option value="fa fa-tumblr">tumblr</option>
                        <option value="fa fa-vine">vine</option>
                        <option value="fa fa-foursquare">foursquare</option>
                        <option value="fa fa-stumbleupon">stumbleupon</option>
                        <option value="fa fa-flickr">flickr</option>
                        <option value="fa fa-yahoo">yahoo</option>
                        <option value="fa fa-reddit">reddit</option>
                        <option value="fa fa-rss">rss</option>
                    </select>
                </div>

                <div style="margin-top: 10px;">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">URL</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="url" value="{{$midia->url ??  old('url') }}" />
                </div>

                <button style="margin-top: 25px;" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold px-4 border border-gray-400 rounded shadow" type="submit">
                    Atualizar
                </button>
            </form>
        </div>
    </div>
</x-app-layout>