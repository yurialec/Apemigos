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

        @if ($permissions->isNotEmpty())
        <div class="flex flex-col justify-center items-center">
            <div style="margin-top: 40px; margin-bottom: 25px;">
                <h1 class="font-semibold text-md text-gray-800 dark:text-gray-200 leading-tight">
                    Nível de Acesso do perfil <u>{{$role->description}}</u>
                </h1>
            </div>
        </div>
        <div style="margin-top: 40px; margin-bottom: 25px;margin-left: 40px; margin-right: 40px;">
            <form method="post" action="{{route('adm.updateRolePermisison')}}" class="mt-6 space-y-6">
                @csrf
                @method('PUT')
                <input type="hidden" name="role_id" value="{{$role->id}}">
                <div class="grid grid-cols-4">
                    @foreach ($getAllPermissions as $permission)
                    <div>
                        <input name="permissions[]" type="checkbox" value="{{$permission->id}}" {{ in_array($permission->id, $isChecked) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$permission->description}}</label>
                    </div>
                    @endforeach
                </div>
                <button style="margin-top: 25px;" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold px-4 border border-gray-400 rounded shadow" type="submit">
                    Atualizar Permissões
                </button>
            </form>
        </div>
        @else
        <div class="flex flex-col justify-center items-center">
            <div style="margin-top: 40px; margin-bottom: 25px;">
                <h1 class="font-semibold text-md text-gray-800 dark:text-gray-200 leading-tight">
                    Nível de Acesso do perfil <u>{{$roleInfo->description}}</u>
                </h1>
            </div>
        </div>
        <div style="margin-top: 40px; margin-bottom: 25px;margin-left: 40px; margin-right: 40px;">
            <form method="post" action="{{route('adm.updateRolePermisison')}}" class="mt-6 space-y-6">
                @csrf
                @method('PUT')
                <input type="hidden" name="role_id" value="{{$roleInfo->id}}">
                <div class="grid grid-cols-4">
                    @foreach ($getAllPermissions as $permission)
                    <div>
                        <input name="permissions[]" type="checkbox" value="{{$permission->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$permission->description}}</label>
                    </div>
                    @endforeach
                </div>
                <button style="margin-top: 25px;" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold px-4 border border-gray-400 rounded shadow" type="submit">
                    Atualizar Permissões
                </button>
            </form>
        </div>
        @endif
    </div>
</x-app-layout>