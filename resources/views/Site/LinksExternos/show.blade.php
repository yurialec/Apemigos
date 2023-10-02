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
        <a style="margin-right:40px; margin-bottom:20px;" href="{{route('site.EditLink', $link->id)}}" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold px-4 border border-gray-400 rounded shadow">
            Editar
        </a>
    </div>
    <div class="flex flex-col justify-center items-center">
        <div style="margin-top: 40px; margin-bottom: 25px;">
            <h1 class="font-semibold text-md text-gray-800 dark:text-gray-200 leading-tight">
                Detalhes do Link
            </h1>
            <p class="font-semibold text-md text-gray-800 dark:text-gray-200 leading-tight">{{$link->name}}</p>
            <p class="font-semibold text-md text-gray-800 dark:text-gray-200 leading-tight">{{$link->link}}</p>
        </div>
    </div>
</x-app-layout>