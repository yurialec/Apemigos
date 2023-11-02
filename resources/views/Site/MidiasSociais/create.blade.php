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
                    Dados da Mídia
                </p>
            </div>
            <div style="width: 600px;" class="block max-w-md rounded-lg p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                <form method="POST" action="{{route('site.StoreMidiasSociais')}}">
                    @csrf
                    <div style="margin-top: 10px;">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Nome</label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="nome" value="{{ old('nome') }}" />
                    </div>

                    <div style="margin-top: 10px;">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Ícone</label>
                        <select id="icone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="icone">
                            <option selected>Selecione</option>
                            <option value="fa-brands fa-facebook">facebook</option>
                            <option value="fa-brands fa-twitter">twitter</option>
                            <option value="fa-brands fa-google">google</option>
                            <option value="fa-brands fa-linkedin">linkedin</option>
                            <option value="fa-brands fa-youtube">youtube</option>
                            <option value="fa-brands fa-instagram">instagram</option>
                            <option value="fa-brands fa-pinterest">pinterest</option>
                            <option value="fa-brands fa-snapchat-ghost">snapchat</option>
                            <option value="fa-brands fa-skype">skype</option>
                            <option value="fa-brands fa-android">android</option>
                            <option value="fa-brands fa-dribbble">dribbble</option>
                            <option value="fa-brands fa-vimeo">vimeo</option>
                            <option value="fa-brands fa-tumblr">tumblr</option>
                            <option value="fa-brands fa-vine">vine</option>
                            <option value="fa-brands fa-foursquare">foursquare</option>
                            <option value="fa-brands fa-stumbleupon">stumbleupon</option>
                            <option value="fa-brands fa-flickr">flickr</option>
                            <option value="fa-brands fa-yahoo">yahoo</option>
                            <option value="fa-brands fa-reddit">reddit</option>
                            <option value="fa-brands fa-rss">rss</option>
                        </select>
                    </div>

                    <div style="margin-top: 10px;">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">URL</label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="url" value="{{ old('url') }}" />
                    </div>

                    <button style="margin-top: 25px;" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold px-4 border border-gray-400 rounded shadow" type="submit">
                        Cadastrar
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>