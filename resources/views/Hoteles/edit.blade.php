@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" integrity="sha256-yebzx8LjuetQ3l4hhQ5eNaOxVLgqaY1y8JcrXuJrAOg=" crossorigin="anonymous" />
@endsection

@section('sidebar')
    <div class="menu">
        <a href="#" class="d-block text-light p-3 border-0"><i class="icon ion-md-contact lead mr-2"></i>Perfil</a>

        <a href="{{ route('hoteles.index') }}" class="d-block text-light p-3 border-0"><i class="icon ion-md-business lead mr-2"></i>Hoteles</a>

        <a href="#" class="d-block text-light p-3 border-0"> <i class="icon ion-md-settings lead mr-2"></i>Configuración</a>
    </div>
@endsection

@section('botones')    
    <a href="{{ route('hoteles.index') }}" class="btn btn-warning text-white">Regresar</a>
@endsection

@section('content')

    <h2 class="text-center mb-4">ACTUALIZA LOS DATOS DE: <strong id="edit-title" style="color: #fca311">{{ $hotel->titulo }}</strong></h2>
    <div class="contener">
        <div class="principal">
            <div class="card-body ml-5" id="card-crear">
                <div class="row justify-content-center mt-5">
                    <div class="col-md-8">

                        <form method="POST" action="{{ route('hoteles.update', ['hotel' => $hotel->id]) }}" enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="pagina">
                                
                                @method('PUT')
                            
                                <!-- Campo para el nombre del hotel -->
                                <div class="form-group">
                                    <label for="titulo" class="titles">Nombre del Hotel</label>
                                    <input type="text" name="titulo" class= "form-control @error('titulo') is-invalid @enderror" id="titulo" placeholder="Ej: Hotel el Ejemplo" value="{{ $hotel->titulo }}">
                                    
                                    @error('titulo')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
    
                                <!-- Campo para el NIT del hotel -->
                                <div class="form-group">
                                    <label for="nit" class="titles">Nit del Hotel</label>
                                    <input type="text" name="nit" class= "form-control @error('nit') is-invalid @enderror" id="nit" placeholder="Ej: 123.456.789-0" value="{{ $hotel->nit }}">
                                    
                                    @error('nit')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
    
                                <!-- Campo para la dirección del hotel -->
                                <div class="form-group">
                                    <label for="direccion" class="titles">Dirección del hotel</label>
                                    <input type="text" name="direccion" class= "form-control @error('direccion') is-invalid @enderror" id="direccion" placeholder="Ej: Calle 1 #2-3 B/ejemplo" value="{{ $hotel->direccion }}">
                                    
                                    @error('direccion')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Campo para el celular del hotel -->
                            <div class="form-group">
                                <label for="celular" class="titles">Número celular</label>
                                <input type="text" name="celular" class= "form-control @error('celular') is-invalid @enderror" id="celular" placeholder="Ej: 3124567890" value="{{ $hotel->celular }}">
                                
                                @error('celular')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="pagina 2">
                                <!-- Campo para la categoria del hotel -->
                                <div class="form-group category">
                                    <label for="categoria" class="titles">Categoria del hotel</label>
                                    
                                    <select name="categoria" class="form-control @error('categoria') is-invalid @enderror" id="categoria">
                                        <option value="">---------- Seleccione una opción ----------</option>
    
                                        <!-- Se recorren todas las categorias del hotel -->
                                        @foreach($categorias as $categoria)
                                            <option value="{{ $categoria->id }}" {{ $hotel->categoria_id == $categoria->id ? 'selected' : '' }} >{{$categoria->nombre}}</option>
                                        @endforeach
                                    </select>
    
                                    @error('categoria')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Campo para agregar imagenes del hotel -->
                                <div class="form-group mt-3 category">
                                    <label for="imagen">Elige la imagen</label>
                
                                    <input 
                                        id="imagen" 
                                        type="file" 
                                        class="form-control @error('imagen') is-invalid @enderror"
                                        name="imagen"
                                    >

                                    <div class="mt-4">
                                        <p>Imagen Actual:</p>
                
                                        <img src="/storage/{{$hotel->imagen}}" style="width: 200px">
                                    </div>

                                    @error('imagen')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="pagina 3">
                                <!-- Campo para la descripcion del hotel -->
                                <div class="form-group mt-3 category">
                                    <label for="descripcion">Descripción del hotel</label>
                                    <input id="descripcion" type="hidden" name="descripcion" value="{{ $hotel->descripcion }}">
                                    <trix-editor 
                                        class="form-control @error('descripcion') is-invalid @enderror "
                                        input="descripcion"
                                    ></trix-editor>
                
                                    @error('descripcion')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
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