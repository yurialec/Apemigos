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
        @can('show_role')
        @can('update_role')
        <div class="flex justify-end" style="margin-top: 20px;">
            <a style="margin-right:40px; margin-bottom:20px;" href="{{route('adm.EditRole', $role->id)}}" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold px-4 border border-gray-400 rounded shadow">
                Editar
            </a>
        </div>
        @endcan
        <div class="flex flex-col justify-center items-center">
            <div style="margin-top: 40px; margin-bottom: 25px;">
                <h1 class="font-semibold text-md text-gray-800 dark:text-gray-200 leading-tight">
                    Detalhes do Nível de Acesso
                </h1>
                <p class="font-semibold text-md text-gray-800 dark:text-gray-200 leading-tight">Nome: {{$role->name}}</p>
                <p class="font-semibold text-md text-gray-800 dark:text-gray-200 leading-tight">Descrição: {{$role->description}}</p>
            </div>
        </div>
        @endcan
    </div>
</x-app-layout>