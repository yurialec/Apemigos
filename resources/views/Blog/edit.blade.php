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
                    Editar <u>{{$blog->titulo}}</u>
                </p>
            </div>
            <div style="width: 600px; margin-bottom: 45px;" class="block max-w-md rounded-lg p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                <form method="POST" action="{{route('UpdateBlog')}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $blog->id}}" />
                    <div style=" margin-top: 10px;">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Título</label>
                        <input type="text" name="titulo" value="{{ $blog->titulo ?? old('titulo') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>

                    <div style="margin-top: 10px;">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Data do evento</label>
                        <input type="date" name="data_evento" value="{{ $blog->data_evento ?? old('data_evento') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>

                    <div style="margin-top: 10px;">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Descição</label>
                        <textarea name="texto" rows="3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        {{$blog->texto}}
                        </textarea>
                    </div>

                    <div style="margin-top: 10px;">
                        <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">
                            Fotos (Selecione as imagens que deseja excluir do album)
                        </p>
                        <p style="margin-top: 10px;">
                        <div>
                            @if (is_string($fotos))
                            <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                <img width="250" src="{{ URL::to("/blog/$user->id/$slugTitulo/$fotos") }}">
                            </label>
                            <input name="imagem[]" type="checkbox" value="{{$fotos}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            @else
                            @foreach ($fotos as $foto)
                            <div class="flex items-center justify-center">
                                <div class="grid grid-cols-2" style="margin-top: 25px;">
                                    <div class="text-center">
                                        <img width="250" src="{{ URL::to("/blog/$user->id/$slugTitulo/$foto->name") }}">
                                    </div>
                                    <div class="text-center">
                                        <input name="imagem[]" type="checkbox" value="{{$foto->name}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        </p>
                    </div>

                    <div class="row" x-data="handler()" style="margin-top: 10px;">
                        <div class="col">
                            <table class="table table-bordered align-items-center table-sm">
                                <thead class="thead-light">
                                    <tr>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template x-for="(field, index) in fields" :key="index">
                                        <tr>
                                            <td>
                                                <input x-model="field.imagem" type="file" name="new_image[]" multiple style="margin-top: 5px;" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-small" @click="removeField(index)">
                                                    <i style="margin-left: 5px;" class="fa-regular fa-square-minus dark:text-white"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="text-right"><button type="button" class="btn btn-info" @click="addNewField()">
                                                <i class="fa-regular fa-square-plus dark:text-white"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <button style="margin-top: 25px;" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold px-4 border border-gray-400 rounded shadow" type="submit">
                        Atualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    function handler() {
        return {
            fields: [],
            addNewField() {
                this.fields.push({
                    imagem: '',
                });
            },
            removeField(index) {
                this.fields.splice(index, 1);
            }
        }
    }
</script>