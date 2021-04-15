@extends('layouts.app')

@section('botones')  
    <div class="buttons">
        <a href="{{ route('hoteles.index') }}" class="btn btn-warning text-white">Regresar</a>
    </div>
@endsection

@section('content')
    
<article class="contenido-hotel bg-white p-5 shadow">
    <h1 class="font-weight-bold text-center mb-4">{{$hotel->titulo}}</h1>

    <div class="imagen-receta">
        <img src="/storage/{{ $hotel->imagen }}" class="w-100">
    </div>

    <div class="hotel-meta mt-3">
        <p>
            <span class="font-weight-bold text-primary">Categorización: </span>
                {{$hotel->categoria->nombre}}
        </p>

        <p>
            <span class="font-weight-bold text-primary">Administrador: </span>
            {{$hotel->autor->name}}
        </p>

        <p>
            <span class="font-weight-bold text-primary">Fecha:</span>
            @php
                $fecha = $hotel->created_at
            @endphp

            <fecha-hotel fecha="{{$fecha}}" ></fecha-hotel>
        </p>

        <div class="Descripcion">
            <h2 class="my-3 text-primary text-center">DESCRIPCIÓN DEL HOTEL</h2>

            {!! $hotel->descripcion !!}
        </div>
    </div>
</article>
@endsection