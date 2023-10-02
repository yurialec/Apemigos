<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Apemigos</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>
<x-app-layout>

    <body class="antialiased dark:bg-gray-900">
        <!-- Logotipo -->
        <div style="margin-left: 25px; margin-top: 25px;" class="relative flex justify-left bg-dots-darker bg-center bg-gray-100 dark:bg-gray-900">
            @if (!empty($logo))
            <img src="{{ URL::to("/images/site/logotype/{$logo}") }}" alt="Logo" width="350" height="250">
            @else
            <p class="font-semibold text-gray-600 dark:text-gray-400 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                Nenhum logotipo cadastrado
            </p>
            @endif
        </div>

        <!-- Titulo -->
        @if (!empty($content))
        <div class="flex justify-center" style="margin-top: 100px; margin-bottom: 10px;">
            <h2 style="font-size: 25px;" class="font-semibold text-gray-600 dark:text-gray-400 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{$content->titulo}}</h2>
        </div>
        <div class="flex justify-center">
            <p class="font-semibold text-gray-600 dark:text-gray-400 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{$content->descricao}}</p>
        </div>
        @else
        <p class="font-semibold text-gray-600 dark:text-gray-400 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
            Nenhum título cadastrado
        </p>
        @endif

        <!-- Links Externos -->
        <div class="flex justify-center" style="margin-top: 100px; margin-bottom: 100px;">
            @if (!empty($links))
            @foreach ($links as $link)
            <a style="background-color: rgb(255 200 102); border-radius: 0.125rem; margin-left: 10px; margin-left: 10px;" href="{{$link['link']}}" target="_blank">{{$link['name']}}</a>
            @endforeach
            @else
            <p class="font-semibold text-gray-600 dark:text-gray-400 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                Nenhum Link cadastrado
            </p>
            @endif
        </div>

        <!-- Carousel -->
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

        <div class="flex justify-center" style="margin-top: 100px; margin-bottom: 100px; margin-left: 100px; margin-right: 100px;">
            @if (!empty($carousels))
            <div class="mt-6 mx-60 swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach ($carousels as $carousel)
                    <div class="swiper-slide">
                        <div>
                            <div>
                                <p class="font-semibold text-gray-600 dark:text-gray-400 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                    {{ $carousel->titulo }}
                                </p>
                            </div>
                            <div>
                                <img src="{{ URL::to("/carousel/{$carousel->imagem}") }}" alt="{{ $carousel->titulo }}" width="250px">
                            </div>
                            <div>
                                <p class="font-semibold text-gray-600 dark:text-gray-400 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                    {{ $carousel->descricao }}
                                </p>
                            </div>
                            <div>
                                <a style="background-color: rgb(255 200 102); border-radius: 0.125rem; margin-left: 10px; margin-left: 10px;" href="{{$carousel->url_link_externo}}" target="_blank">{{$carousel->nome_link_externo}}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
            @else
            <p class="font-semibold text-gray-600 dark:text-gray-400 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                Nenhum carousel cadastrado
            </p>
            @endif
        </div>

        <!-- BLOG -->
        <div class="flex justify-center" style="margin-top: 100px; margin-bottom: 100px;">
            <p class="font-semibold text-gray-600 dark:text-gray-400 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                #BLOG
            </p>
        </div>

        <!-- NEWSLETTER -->
        <div class="flex justify-center" style="margin-top: 100px; margin-bottom: 100px;">
            <p class="font-semibold text-gray-600 dark:text-gray-400 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                #NEWSLETTER
            </p>
        </div>

        <!-- FOOTER -->
        @if (!empty($footer))
        <!-- Footer container -->
        <footer style="background-color: rgb(255 200 102); border-radius: 0.125rem;" class="bg-neutral-100 text-center text-neutral-600 dark:bg-neutral-600 dark:text-neutral-200 lg:text-left">


            <div class="flex items-center justify-center border-b-2 border-neutral-200 p-6 dark:border-neutral-500 lg:justify-between">
                <div class="mr-12 lg:block">
                    <p class="font-semibold focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                        {{$footer->sobre}}
                    </p>
                    <p class="font-semibold focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                        {{$footer->info}}
                    </p>
                </div>
            </div>
            <!-- Main container div: holds the entire content of the footer, including four sections (Tailwind Elements, Products, Useful links, and Contact), with responsive styling and appropriate padding/margins. -->
            <div class="mx-6 py-10 text-center md:text-left">
                <div class="grid-1 grid gap-8 md:grid-cols-2 lg:grid-cols-4">
                    <!-- Contact section -->
                    <div>
                        <h6 class="mb-4 flex justify-center font-semibold uppercase md:justify-start">
                            Contato
                        </h6>
                        <p class="mb-4 flex items-center justify-center md:justify-start">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="mr-3 h-5 w-5">
                                <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                                <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                            </svg>
                            {{$footer->endereco}}
                        </p>
                        <p class="mb-4 flex items-center justify-center md:justify-start">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="mr-3 h-5 w-5">
                                <path d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z" />
                                <path d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z" />
                            </svg>
                            {{$footer->email}}
                        </p>
                        <p class="mb-4 flex items-center justify-center md:justify-start">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="mr-3 h-5 w-5">
                                <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z" clip-rule="evenodd" />
                            </svg>
                            {{$footer->contato}}
                        </p>
                    </div>

                    <div>
                        @if (!empty($redesSociais))
                        <h6 class="mb-4 flex justify-center font-semibold uppercase md:justify-start">
                            Siga:
                        </h6>
                        @foreach ($redesSociais as $redeSocial)
                        <a href="{{$redeSocial->url}}" target="_blank">
                            <p class="{{$redeSocial->icone}}"></p>
                        </a>
                        @endforeach
                        @else
                        <p class="mb-4 flex items-center justify-center md:justify-start">
                            Nenhuma rede social Cadastrada
                        </p>
                        @endif
                    </div>
                </div>
            </div>

            <!--Copyright section-->
            <div class="bg-neutral-200 p-6 text-center dark:bg-neutral-700">
                <span>© 2023 Todos os direitos reservados:</span>
                <a class="font-semibold text-neutral-600 dark:text-neutral-400" href="https://tailwind-elements.com/">Tailwind Elements</a>
            </div>
        </footer>
        @else
        <p class="font-semibold text-gray-600 dark:text-gray-400 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
            Nenhuma informação do rodapé cadastrada
        </p>
        @endif
    </body>
</x-app-layout>
<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
        cssMode: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
        },
        mousewheel: true,
        keyboard: true,
    });
</script>

</html>