@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/css/medium-editor.min.css" type="text/css" media="screen" charset="utf-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@endsection

@section('navegacion')

@include('ui.adminnav')

@endsection

@section('content')
<h1 class="text-2xl text-center mt-10"> Nueva Vacante </h1>


<form action="{{route('vacantes.store')}}" method="POST" class="max-w-lg mx-auto my-10">
    @csrf
    <div class="mb-5">
        <label for="titulo" class="block text-gray-700 text-sm mb-2">Titulo Vacante:</label>
        <input id="titulo" type="text" class="p-3 bg-white rounded form-input w-full @error('password') is-invalid @enderror" name="titulo" placeholder="Titulo de la Vacante" value="{{old('titulo')}}">
        @error('titulo')
        <div class="bg-red-500 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block">{{$message}}</span>
        </div>
        @enderror
    </div>



    <div class="mb-5">
        <label for="categoria" class="block text-gray-700 text-sm mb-2">Categoria:</label>

        <select id="categoria" class="block appearance-none w-full border-gray-200 text-gray-700 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100
        " name="categoria">
            <option disabled selected>-Selecciona-</option>
            @foreach($categorias as $categoria)
            <option {{old('categoria') == $categoria->id? 'selected' :''}} value="{{$categoria->id}}">{{$categoria->nombre}}</option>

            @endforeach
        </select>
        @error('categoria')
        <div class="bg-red-500 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block">{{$message}}</span>
        </div>
        @enderror
    </div>


    <div class="mb-5">
        <label for="experiencia" class="block text-gray-700 text-sm mb-2">Experiencia:</label>

        <select id="experiencia" class="block appearance-none w-full border-gray-200 text-gray-700 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100
        " name="experiencia">
            <option disabled selected>-Selecciona-</option>
            @foreach($experiencias as $experiencia)
            <option {{old('experiencia')==$experiencia->id ? 'selected':''}} value="{{$experiencia->id}}">{{$experiencia->nombre}}</option>

            @endforeach
        </select>
        @error('experiencia')
        <div class="bg-red-500 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block">{{$message}}</span>
        </div>
        @enderror
    </div>

    <div class="mb-5">
        <label for="ubicacion" class="block text-gray-700 text-sm mb-2">Ubicacion:</label>

        <select id="ubicacion" class="block appearance-none w-full border-gray-200 text-gray-700 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100
        " name="ubicacion">
            <option disabled selected>-Selecciona-</option>
            @foreach($ubicaciones as $ubicacion)
            <option {{old('ubicacion')==$ubicacion->id ? 'selected':''}} value="{{$ubicacion->id}}">{{$ubicacion->nombre}}</option>

            @endforeach
        </select>
        @error('ubicacion')
        <div class="bg-red-500 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block">{{$message}}</span>
        </div>
        @enderror
    </div>

    <div class="mb-5">
        <label for="salario" class="block text-gray-700 text-sm mb-2">Salario:</label>

        <select id="salario" class="block appearance-none w-full border-gray-200 text-gray-700 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100
        " name="salario">
            <option disabled selected>-Selecciona-</option>
            @foreach($salarios as $salario)
            <option {{old('salario')==$salario->id ? 'selected':''}} value="{{$salario->id}}">{{$salario->nombre}}</option>

            @endforeach
        </select>
        @error('salario')
        <div class="bg-red-500 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block">{{$message}}</span>
        </div>
        @enderror
    </div>

    <div class="mb-5">
        <label for="descripcion" class="block text-gray-700 text-sm mb-2">Descripcion del puesto:</label>
        <div class="editable p-3 bg-gray-100 round form-input w-full text-gray-700">
        </div>

        <input type="hidden" name="descripcion" id="descripcion" value="{{old('descripcion')}}"></input>
        @error('descripcion')
        <div class="bg-red-500 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block">{{$message}}</span>
        </div>
        @enderror
    </div>

    <div class="mb-5">
        <label for="imagen" class="block text-gray-700 text-sm mb-2">Imagen Vacante:</label>
        <div id="dropzoneDevJobs" class="dropzone rounded bg-gray-100">
        </div>

        <input type="hidden" name="imagen" id="imagen" value={{old('imagen')}}>
        @error('imagen')
        <div class="bg-red-500 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block">{{$message}}</span>
        </div>
        @enderror
        <p id="error"></p>
    </div>

    <div class="mb-5">
        <label for="skills" class="block text-gray-700 text-sm mb-5">Habilidades y conocimientos:<span class="text-xs">(Elije al menos 3)</span></label>

        @php
        $skills = ['HTML5', 'CSS3', 'CSSGrid', 'Flexbox', 'JavaScript', 'jQuery', 'Node', 'Angular', 'VueJS', 'ReactJS', 'React Hooks', 'Redux', 'Apollo', 'GraphQL', 'TypeScript', 'PHP', 'Laravel', 'Symfony', 'Python', 'Django', 'ORM', 'Sequelize', 'Mongoose', 'SQL', 'MVC', 'SASS', 'WordPress', 'Express', 'Deno', 'React Native', 'Flutter', 'MobX', 'C#', 'Ruby on Rails']
        @endphp
        <lista-skills :skills="{{json_encode($skills)}}" :oldskills="{{json_encode(old('skills'))}}"></lista-skills>
        @error('skills')
        <div class="bg-red-500 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block">{{$message}}</span>
        </div>
        @enderror
    </div>



    <button type="submit" class="bg-teal-500 w-full hover:bg-teal-700 text-gray-100 p-3 focus:outline-none focus:shadow-outline uppercase font-bold">Publicar Vacante

    </button>

</form>
@endsection

@section('scripts')
<script src="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/js/medium-editor.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js" integrity="sha512-oQq8uth41D+gIH/NJvSJvVB85MFk1eWpMK6glnkg6I7EdMqC1XVkW7RxLheXwmFdG03qScCM7gKS/Cx3FYt7Tg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    Dropzone.autoDiscover = false;
    document.addEventListener('DOMContentLoaded', () => {
        //medium editor
        const editor = new MediumEditor('.editable', {
            toolbar: {
                buttons: ['bold', 'italic', 'underline', 'quote', 'anchor', 'justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull', 'orderedlist', 'unorderedlist', 'h2', 'h3'],
                static: true,
                sticky: true,
            },
            placeholder: {
                text: 'Informacion de la vacante'
            }
        });

        //agrega al input hidden la descripcion en medium editor

        editor.subscribe('editableInput', function(eventObj, editable) {

            const contenido = editable.getContent();

            document.querySelector('#descripcion').value = contenido;

        })

        //llena el editor con el contenido del input hidden 
        editor.setContent(document.querySelector('#descripcion').value)

        //dropzone

        const dropzoneDevJobs = new Dropzone('#dropzoneDevJobs', {
            url: "/vacantes/imagen",
            dictDefaultMessage: 'Sube aqui tu imagen',
            acceptedFiles: ".png,.jpg,.jpeg,.gif,.bmp",
            addRemoveLinks: true,
            dictRemoveFile: 'Borrar archivo',
            maxFiles: 1,
            headers: {
                'X=CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            init: function() {
                if (document.querySelector(#imagen).value.trim()) {
                    let imagenPublicada = {};
                    imagenPublicada.size = 1234;
                    imagenPublicada.name = document.querySelector('#imagen').value;

                    this.options.addedfile.call(this, imagenPublicada);
                    this.options.thumbnail.call(this, imagenPublicada, `/storage/vacantes/${imagenPublicada.name}`);
                    imagenPublicada.previewElement.classList.add('dz-success');
                    imagenPublicada.previewElement.classList.add('dz-complete');

                } else {

                }
            },
            success: function(file, response) {
                document.querySelector('#error').textContent = "";
                //coloca la respuesta del servidor en el input 
                document.querySelector('#imagen').value = response.correcto;
                //anadir al objeto de archivo el nombre del servidor
                file.nombreServidor = response.correcto;

            },
            maxfilesexceeded: function(file) {
                if (this.file[1] != null) {
                    this.removeFile(this.file[0]); // eliminar archivo anterior
                    this.addFile(file)
                }
            },
            removedfiles: function(file, response) {

                file.previewElement.parentNode.removeChild(file.previewElement);

                params = {
                    imagen: file.nombreServidor ? ? document.querySelector('#imagen').value;
                }

                axios.post('/vacantes/borrarimagen', params)
                    .then()

            }
        });
    })
</script>

@endsection