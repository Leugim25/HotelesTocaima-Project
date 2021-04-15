@extends('layouts.principal', ['class' => 'off-canvas-sidebar', 'activePage' => 'login', 'title' => __('')])

@section('carousel-content')
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('img/1.jpg') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block text-white">
                <p><a class="btn btn-outline-warning" href="#">Más información</a></p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('img/1.jpg') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block text-white">
                <p><a class="btn btn-outline-warning" href="#">Más información</a></p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('img/1.jpg') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block text-white">
                <p><a class="btn btn-outline-warning" href="#">Más información</a></p>
            </div>
        </div>
        </div>
    </div>

    <div style="background-color: #f2f1ec" class="first">
        <h2 id="cursiva"  class="text-center mt-5">Bienvenidos a</h2>
        <p id="titulo-principal">Hoteles Tocaima</p>
        <p id="parrafos">podrás encontrar tu hotel ideal, para descansar en familia o amigos con el mejor servicio posible mientras disfrutas de tu estadia. También podrás disfrutar de una gran variedad de servicios ofrecidos por los diferentes hoteles que brinda el municipio de Tocaima</p>
        <img id="alinear" src="{{ asset('img/G1.jpg') }}" class="" alt="..." width="250" height="250">
        <img id="alinear" src="{{ asset('img/H1.jpg') }}" class="" alt="..." width="250" height="250">
        <img id="alinear" src="{{ asset('img/J1.jpg') }}" class="" alt="..." width="250" height="250">
        <h5 style="padding-left: 8%; color: #000000" class="d-inline">ZONAS DE EJERCICIO</h5>
        <h5 style="margin-left: 19%; color: #000000" class="d-inline">ZONAS DE AREA SOCIAL</h5>
        <h5 style="padding-left: 18%; color: #000000" class="d-inline">ZONAS VERDES</h5>
    </div><br>

@endsection
