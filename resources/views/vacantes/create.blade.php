@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/css/medium-editor.min.css" type="text/css" media="screen" charset="utf-8">

@endsection

@section('navegacion')

@include('ui.adminnav')

@endsection

@section('content')
<h1 class="text-2xl text-center mt-10"> Nueva Vacante </h1>


<form class="max-w-lg mx-auto my-10">

    <div class="mb-5">
        <label for="titulo" class="block text-gray-700 text-sm mb-2">Titulo Vacante:</label>
        <input id="titulo" type="text" class="p-3 bg-white rounded form-input w-full @error('password') is-invalid @enderror" name="titulo">
    </div>



    <div class="mb-5">
        <label for="categoria" class="block text-gray-700 text-sm mb-2">Categoria:</label>

        <select id="categoria" class="block appearance-none w-full border-gray-200 text-gray-700 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100
        " name="categoria">
            <option disabled selected>-Selecciona-</option>
            @foreach($categorias as $categoria)
            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>

            @endforeach
        </select>
    </div>


    <div class="mb-5">
        <label for="experiencia" class="block text-gray-700 text-sm mb-2">Experiencia:</label>

        <select id="experiencia" class="block appearance-none w-full border-gray-200 text-gray-700 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100
        " name="experiencia">
            <option disabled selected>-Selecciona-</option>
            @foreach($experiencias as $experiencia)
            <option value="{{$experiencia->id}}">{{$experiencia->nombre}}</option>

            @endforeach
        </select>
    </div>

    <div class="mb-5">
        <label for="ubicacion" class="block text-gray-700 text-sm mb-2">Ubicacion:</label>

        <select id="ubicacion" class="block appearance-none w-full border-gray-200 text-gray-700 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100
        " name="ubicacion">
            <option disabled selected>-Selecciona-</option>
            @foreach($ubicaciones as $ubicacion)
            <option value="{{$ubicacion->id}}">{{$ubicacion->nombre}}</option>

            @endforeach
        </select>
    </div>

    <div class="mb-5">
        <label for="salario" class="block text-gray-700 text-sm mb-2">Salario:</label>

        <select id="salario" class="block appearance-none w-full border-gray-200 text-gray-700 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100
        " name="salario">
            <option disabled selected>-Selecciona-</option>
            @foreach($salarios as $salario)
            <option value="{{$salario->id}}">{{$salario->nombre}}</option>

            @endforeach
        </select>
    </div>

    <div class="mb-5">
        <label for="descripcion" class="block text-gray-700 text-sm mb-2">Descripcion del puesto:</label>
        <div class="editable p-3 bg-gray-100 round form-input w-full text-gray-700">
        </div>

        <input type="hidden" name="descripcion" id="descripcion"></input>
    </div>



    <button type="submit" class="bg-teal-500 w-full hover:bg-teal-700 text-gray-100 p-3 focus:outline-none focus:shadow-outline uppercase font-bold">Publicar Vacante

    </button>

</form>
@endsection

@section('scripts')
<script src="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/js/medium-editor.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const editor = new MediumEditor('.editable', {
            toolbar: {
                buttons: ['bold', 'italic', 'underline', 'quote', 'anchor', 'justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull', 'orderedList', 'unorderedList', 'h2', 'h3'],
                static: true,
                sticky: true,
            },
            placeholder: {
                text: 'Informacion de la vacante'
            }
        });

        editor.subscribe('editableInput', function(eventObj, editable) {

            const contenido = editable.getContent();

            document.querySelector('#descripcion').value = contenido;

        })
    })
</script>

@endsection