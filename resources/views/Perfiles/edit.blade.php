@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" integrity="sha256-yebzx8LjuetQ3l4hhQ5eNaOxVLgqaY1y8JcrXuJrAOg=" crossorigin="anonymous" />
    
@endsection

@section('sidebar')
    <div class="menu">
        <a href="{{ route('perfiles.show', $perfil->id) }}" class="d-block text-light p-3 border-0"><i class="icon ion-md-contact lead mr-2"></i>Perfil</a>

        <a href="{{ route('hoteles.index') }}" class="d-block text-light p-3 border-0"><i class="icon ion-md-business lead mr-2"></i>Hoteles</a>

        <a href="#" class="d-block text-light p-3 border-0"> <i class="icon ion-md-settings lead mr-2"></i>Configuración</a>
    </div>
@endsection

@section('botones')    
    <a href="{{ route('perfiles.show', $perfil->id) }}" class="btn btn-warning text-white">Regresar</a>
@endsection

@section('content')
    <h2 class="text-center mb-4" style="font:bold">ACTUALIZA TUS DATOS</h2>
    <div class="contener">
        <div class="principal">
            <div class="card-body ml-5" id="card-crear">
                <div class="row justify-content-center mt-5">
                    <div class="col-md-8">

                        <form method="POST" action="{{ route('perfiles.update', $perfil->id) }}" enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="pagina">
                                
                                @method('PUT')
                            
                                <!-- Campo para el nombre del hotel -->
                                <div class="form-group">
                                    <label for="name" class="titles">Nombres completos</label>
                                    <input type="text" name="name" class= "form-control @error('name') is-invalid @enderror" id="name" placeholder="Nombres completos" value="{{ $perfil->usuario->name}}">
                                    
                                    @error('name')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email" class="titles">Correo electronico</label>
                                    <input type="text" name="email" class= "form-control @error('email') is-invalid @enderror" id="email" placeholder="Nombres completos" value="{{ $perfil->usuario->email}}">
                                    
                                    @error('email')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="imagen" class="titles">Foto de perfil</label>
                                    <input 
                                        id="imagen" 
                                        type="file" 
                                        class="form-control @error('imagen') is-invalid @enderror"
                                        name="imagen"
                                    >
                                    <div class="mt-4">
                                        <p>Imagen Actual:</p>
                
                                        <img id="perfil-image" src="/storage/upload-ImagenesPerfil/{{$perfil->avatar}}" style="width: 200px">
                                    </div>
                                    @error('imagen')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mt-3 category">
                                    <label for="biografia">Tu briografia</label>
                                    <input id="biografia" type="hidden" name="biografia" value="{{ $perfil->biografia }}">
                                    <trix-editor 
                                        class="form-control @error('biografia') is-invalid @enderror "
                                        input="biografia"
                                    ></trix-editor>
                
                                    @error('biografia')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>

                            <!-- Agregar datos del hotel -->
                            <div class="form-group">
                                <input type="submit" class="btn btn-warning text-white" value="Guardar cambios">
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>        
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js" integrity="sha256-2D+ZJyeHHlEMmtuQTVtXt1gl0zRLKr51OCxyFfmFIBM=" crossorigin="anonymous" defer></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous" defer></script>
@endsection