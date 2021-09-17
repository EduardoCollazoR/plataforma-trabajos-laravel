@extends('layouts.app')

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

    <button type="submit" class="bg-teal-500 w-full hover:bg-teal-700 text-gray-100 p-3 focus:outline-none focus:shadow-outline uppercase font-bold">Publicar Vacante

    </button>

</form>
@endsection