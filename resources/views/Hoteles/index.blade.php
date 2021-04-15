@extends('layouts.app')

@section('sidebar')
    <div class="menu">
        <a href="" class="d-block text-light p-3 border-0"><i class="icon ion-md-contact lead mr-2"></i>Perfil</a>

        <a href="{{ route('hoteles.index') }}" class="d-block text-light p-3 border-0"><i class="icon ion-md-business lead mr-2"></i>Hoteles</a>

        <a href="#" class="d-block text-light p-3 border-0"> <i class="icon ion-md-settings lead mr-2"></i>Configuración</a>
    </div>
@endsection

@section('botones')
    <div class="buttons">
        <h5>Crea un nuevo hotel</h5>
        <a href="{{ route('hoteles.create') }}" class="btn btn-warning text-white">Agregar Hotel</a>
    </div>
@endsection

@section('content')
    
<h2 class="text-center mb-4 font-weight-bold">ADMINISTRA TUS HOTELES</h2>
    <div class="col-md-13 mx-auto bg-light p-3" id="dataTable">
    
    <!-- Datos principales del hotel a crear -->
    <h4 class="text-left mb-4 font-weight-bold">Datos principales</h4>
        <table id="Tablehotels" class="table table-striped table-bordered shadow-lg mt-4 " style="width:100%">
            <thead class="bg-dark text-white">
                <tr>
                    <th scope="col">Nº</th>
                    <th scope="col">Nombre del hotel</th>
                    <th scope="col">Nit</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Celular</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach($hoteles as $hotel)
                    <tr>
                        <td class="text-center"> {{ $hotel->id }} </td>
                        <td class="text-center"> {{ $hotel->titulo }} </td>
                        <td class="text-center"> {{ $hotel->nit }} </td>
                        <td class="text-center"> {{ $hotel->direccion }} </td>
                        <td class="text-center"> {{ $hotel->celular }} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    <!-- Datos secundarios del hotel a crear -->
    <h4 class="text-left mb-0 mt-2 font-weight-bold">Datos secundarios</h4>
        <table id="Tablehotels" class="table table-striped table-bordered shadow-lg mt-4 " style="width:100%">
            <thead class="bg-info text-white">
                <tr>
                    <th scope="col">Nº</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Tipo de categoria</th>
                    <th scope="col">habitación</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach($hoteles as $hotel)
                    <tr>
                        <td class="text-center"> {{ $hotel->id }} </td>
                        <td class="text-justify"> {!! $hotel->descripcion !!} </td>
                        <td class="text-justify"> 
                            <strong>{{ $hotel->categoria->nombre }}: </strong>
                            {{ $hotel->categoria->descripcion }} 
                        </td>
                        <td>
                            <a href="{{ route('habitaciones.index', $hotel->id) }}" class="btn btn-warning d-block text-white mt-2">Ver</a>
                            <a href="{{ route('habitaciones.create', $hotel->id) }}" class="btn btn-secondary d-block text-white mt-2">Agregar</a>
                        </td>
                        <td>
                            <a href="{{ route('hoteles.show', ['hotel' => $hotel->id]) }}" class="btn btn-warning d-block text-white mt-2">Ver</a>
                            <form action="{{ route('hoteles.destroy', ['hotel' => $hotel->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger d-block text-white mt-2 w-100" value="Eliminar" &time>
                            </form>
                            <a href="{{ route('hoteles.edit', ['hotel' => $hotel->id]) }}" class="btn btn-secondary d-block text-white mt-2">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection