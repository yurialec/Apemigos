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
        <a style="margin-right:40px; margin-bottom:20px;" href="{{route('site.EditCarousel', $carousel->id)}}" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold px-4 border border-gray-400 rounded shadow">
            Editar
        </a>
    </div>
    <div class="flex flex-col justify-center items-center">
        <div style="width: 600px;" style="margin-top: 40px; margin-bottom: 25px;">
            <h1 class="font-semibold text-md text-gray-800 dark:text-gray-200 leading-tight">
                Detalhes do Carousel
            </h1>
            <p style="margin-top: 40px; margin-bottom: 25px;" class="text-gray-800 dark:text-gray-200 leading-tight">#{{$carousel->id}}</p>
            <p style="margin-top: 40px; margin-bottom: 25px;" class="dark:text-gray-200 leading-tight"><strong>Titulo:</strong> {{$carousel->titulo}}</p>
            <p style="margin-top: 40px; margin-bottom: 25px;" class="dark:text-gray-200 leading-tight"><strong>Descrição:</strong> {{$carousel->descricao}}</p>
            <img style="margin-top: 40px; margin-bottom: 25px;" src="{{ URL::to("/carousel/{$carousel->imagem}") }}" alt="{{ $carousel->titulo }}" width="250px">
            <p style="margin-top: 40px; margin-bottom: 25px;" class="dark:text-gray-200 leading-tight"><strong>Nome do Link Externo:</strong> {{$carousel->nome_link_externo ?? '---'}}</p>
            <p style="margin-top: 40px; margin-bottom: 25px;" class="dark:text-gray-200 leading-tight"><strong>Url do Link Externo:</strong> {{$carousel->url_link_externo ?? '---'}}</p>
            <p style="margin-top: 40px; margin-bottom: 25px;" class="dark:text-gray-200 leading-tight"><strong>Data de Criação:</strong> {{$carousel->created_at}}</p>
            <p style="margin-top: 40px; margin-bottom: 25px;" class="dark:text-gray-200 leading-tight"><strong>Data de Edição:</strong> {{$carousel->updated_at ?? '---'}}</p>
        </div>
    </div>
</x-app-layout>