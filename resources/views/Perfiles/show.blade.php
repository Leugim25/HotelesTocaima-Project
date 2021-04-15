@extends('layouts.app')

@section('sidebar')
    <div class="menu">
        <a href="{{ route('perfiles.show', $perfil->id) }}" class="d-block text-light p-3 border-0"><i class="icon ion-md-contact lead mr-2"></i>Perfil</a>

        <a href="{{ route('hoteles.index') }}" class="d-block text-light p-3 border-0"><i class="icon ion-md-business lead mr-2"></i>Hoteles</a>

        <a href="#" class="d-block text-light p-3 border-0"> <i class="icon ion-md-settings lead mr-2"></i>Configuración</a>
    </div>
@endsection

@section('botones')
    <div style="float: right;margin-right: 10%">
        <a href="{{ route('hoteles.create') }}" class="btn btn-warning text-white">Regresar</a>
    </div>
@endsection

@section('content')

    <img src="/storage/upload-ImagenesPerfil/{{$perfil->avatar}}" class="img-thumbnail" id="perfil-image" alt="">
    <div class="image-content">
        <h2 id="administrator-name" class="font-weight-bold">{{$perfil->usuario->name}}</h2>
        <h5 id="administrator-name" class="font-weight-bold">Administrador</h5>
    </div>
   <form class="d-flex" action="" method="POST" enctype="multipart/form-data">
        <label class="d-block">Edita tu foto de perfil</label>
        <input class="d-block" type="file" name="avatar">
        <input class="d-block" type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" class="pull-right btn btn-warning btn-sm text-white d-block">
   </form>
    <a href="{{ route('perfiles.edit', $perfil->id)}}" class="btn btn-warning text-white" style="float: right; margin-right: 9%; margin-top: 18%">Edita tu perfil</a>

    <div class="col-md-14 mx-1 bg-light p-3" id="dataTable">
    <!-- Datos principales del hotel a crear -->
    <h4 class="text-left mb-4 font-weight-bold">Datos principales</h4>
    </div>
            
@endsection