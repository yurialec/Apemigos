<x-app-layout>
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Menu de Usuários') }}
    </h2>
    <table class="text-md text-gray-800 dark:text-gray-200 leading-tight">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>
        </thead>
        @foreach ($users as $user)
        <tbody>
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>Visualizar - Editar - Excluir</td>
            </tr>
        </tbody>
        @endforeach
    </table>
</x-app-layout>