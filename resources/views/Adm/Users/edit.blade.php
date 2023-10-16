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
                Dados do Usuário
            </p>
        </div>
        <div style="width: 600px;" class="block max-w-md rounded-lg p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
            <form method="POST" action="{{route('adm.UpdateUser')}}">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{$user->id}}" />

                <div style="margin-top: 10px;">
                    <x-input-label for="name" :value="__('Nome')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" autocomplete="name" value="{{$user->name ?? old('name')}}" />
                </div>

                <div style="margin-top: 10px;">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" autocomplete="name" value="{{$user->email ?? old('email')}}" />
                </div>

                <div style="margin-top: 10px;">
                    <x-input-label for="role" :value="__('Nivel de Acesso')" />
                    <select id="role_id" name="role_id" class="block mt-1 w-full" wire:model="role_id">
                        <option value="" disabled>Selecione um nível</option>
                        @foreach ($roles as $role)
                        <option value="{{$role->id}}">
                            {{$role->description}}
                        </option>
                        @endforeach
                    </select>
                </div>

                <button style="margin-top: 25px;" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold px-4 border border-gray-400 rounded shadow" type="submit">
                    Atualizar
                </button>
            </form>
        </div>
    </div>
</x-app-layout>