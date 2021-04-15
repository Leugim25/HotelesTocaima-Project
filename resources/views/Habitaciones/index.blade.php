@extends('layouts.app')

@section('sidebar')
    <div class="menu">
        <a href="#" class="d-block text-light p-3 border-0"><i class="icon ion-md-contact lead mr-2"></i>Perfil</a>

        <a href="{{ route('hoteles.index') }}" class="d-block text-light p-3 border-0"><i class="icon ion-md-business lead mr-2"></i>Hoteles</a>

        <a href="#" class="d-block text-light p-3 border-0"> <i class="icon ion-md-settings lead mr-2"></i>Configuración</a>
    </div>
@endsection

@section('botones')
    <h5>Crea una nueva habitación</h5>
    <a href="{{ route('habitaciones.create', $hotel->id) }}" class="btn btn-warning text-white">Agregar Habitación</a>

   <div style="float: right;margin-right: 10%">
    <a href="{{ route('hoteles.index') }}" class="btn btn-warning text-white">Regresar</a>
   </div>
   
@endsection

@section('content')
    
    <h2 class="text-center mb-4 font-weight-bold" style="text-transform: uppercase;">ADMINISTRA LAS HABITACIONES DEL <strong style="color: #fca311"> {{ $hotel->titulo }} </strong></h2>
    
    <div class="col-md-13 mx-auto bg-light p-3" id="dataTable">

    <!-- Datos principales del hotel a crear -->
    <h4 class="text-left mb-4 font-weight-bold">Instalaciones</h4>
        <table id="Tablehotels" class="table table-striped table-bordered shadow-lg mt-4 " style="width:100%">
            <thead class="bg-dark text-white">
                <tr>
                    <th scope="col">Nº de Habitación</th>
                    <th scope="col">Nº Camas</th>
                    <th scope="col">Mobiliario</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach($habitaciones as $habitacion)
                    <tr>
                        <td class="text-center"> {{ $habitacion->n_habitacion }} </td>
                        <td class="text-center"> {{ $habitacion->camas }} </td>
                        <td class="services"> {!! $habitacion->mobiliario !!} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    <!-- Datos secundarios del hotel a crear -->
    <h4 class="text-left mb-4 font-weight-bold">Servicios y otros</h4>    
        <table id="Tablehotels" class="table table-striped table-bordered shadow-lg mt-4 " style="width:100%">
            <thead class="bg-dark text-white">
                <tr>
                    <th scope="col">Servicios</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Disponibilidad</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach($habitaciones as $habitacion)
                    <tr>
                        <td class=""> {!! $habitacion->servicios !!} </td>
                        <td class="text-center"> {{ $habitacion->precio }} </td>
                        <td class="text-center"> {{ $habitacion->diponible->estado }} </td>
                        <td>
                            <a href="{{ route('habitaciones.edit', $hotel->id) }}" class="btn btn-secondary d-block text-white mt-2">Editar</a>
                            <form action="{{ route('habitaciones.destroy', $hotel->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger d-block text-white mt-2 w-100" value="Eliminar" &time>
                            </form>
                            <a href="" class="btn btn-warning d-block text-white mt-2">Ver</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection