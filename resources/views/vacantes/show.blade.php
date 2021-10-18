@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')

<h1 class="text-3xl text-center mt-10">{{$vacante->titulo}}</h1>

<div class="mt-10 mb-20 m:flex items-start">
    p class="block text-gray-700 font-bold my-2">
    Publicado: <span class="font-normal">{{$vacante->created_at->diffForHumans()}}</span>
    por:<span class="font-normal">{{$vacante->reclutador->name}}</span>
    </p>
    <p class="block text-gray-700 font-bold my-2">
        Categoria: <span class="font-normal">{{$vacante->categoria->nombre}}</span>
    </p>
    <p class="block text-gray-700 font-bold my-2">
        Salario: <span class="font-normal">{{$vacante->salario->nombre}}</span>
    </p>
    <p class="block text-gray-700 font-bold my-2">
        Ubicacion: <span class="font-normal">{{$vacante->ubicacion->nombre}}</span>
    </p>
    <p class="block text-gray-700 font-bold my-2">
        Experiencia: <span class="font-normal">{{$vacante->experiencia->nombre}}</span>
    </p>
    <h2 class="text-2xl text-center mb-5 text-gray-700">Conocimientos y Tecnologias</h2>
    @php
    $arraySkills=explode(",",$vacante->skills);
    @endphp

    @foreach($arraySkills as $skill)
    <p class="inline-block border-gray-400 rounded py-2 px-8 text-gray-700 my-2 mt-2">

        {{$skill}}
    </p>
    @endforeach
    <a href="/storage/vacantes/{{$vacante->imagen}}" data-lightbox="imagen" data-title="{{$vacante->titulo}}">
        <img src="/storage/vacantes/{{$vacante->imagen}}" class="w-40 mt-10" />
    </a>

    <div class="descripcion mt-10 mb-5">
        {!!$vacante->descripcion!!}
    </div>

</div>

@include('ui.contacto')
</div>
@endsection