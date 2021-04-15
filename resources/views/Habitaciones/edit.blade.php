@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" integrity="sha256-yebzx8LjuetQ3l4hhQ5eNaOxVLgqaY1y8JcrXuJrAOg=" crossorigin="anonymous" />

@endsection

@section('sidebar')
    <div class="menu">
        <a href="" class="d-block text-light p-3 border-0"><i class="icon ion-md-contact lead mr-2"></i>Perfil</a>

        <a href="{{ route('hoteles.index') }}" class="d-block text-light p-3 border-0"><i class="icon ion-md-business lead mr-2"></i>Hoteles</a>

        <a href="#" class="d-block text-light p-3 border-0"> <i class="icon ion-md-settings lead mr-2"></i>Configuración</a>
    </div>
@endsection

@section('botones')    
    <a href="{{ route('habitaciones.index', $hotel->id) }}" class="btn btn-warning text-white">Regresar</a>
@endsection

@section('content')
    @foreach($habitacion as $habitacion)
        
    @endforeach
    <h2 class="text-center mb-4">ACTUALIZA LOS DATOS DE LA HABITACIÓN</h2>
    <div class="contener">
        <div class="principal">
            <div class="card-body ml-5" id="card-crear">
                <div class="row justify-content-center mt-5">
                    <div class="col-md-8">

                        <form method="POST" action="{{ route('habitaciones.update', $hotel->id) }}" enctype="multipart/form-data" novalidate>
                            @csrf
                                @method('PUT')
                                <!-- Campo para el numero de habitacion -->
                            
                                <div class="form-group">
                                    <label for="n_habitacion" class="titles">Número de habitación</label>
                                    <input type="text" name="n_habitacion" class= "form-control @error('n_habitacion') is-invalid @enderror" id="n_habitacion" placeholder="Ej: Habitación 123" value="{{ $habitacion->n_habitacion }}">
                                    
                                    @error('n_habitacion')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <!-- Campo para la cantidad de camas de la habitación -->
                                <div class="form-group">
                                    <label for="camas" class="titles">Totalidad de camas</label>
                                    <input type="text" name="camas" class= "form-control @error('camas') is-invalid @enderror" id="camas" placeholder="Ej: 1, 2, 3..." value="{{ $habitacion->camas }}">
                                    
                                    @error('camas')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <!-- Estado de la habitación -->
                                <div class="form-group category">
                                    <label for="disponibilidad" class="titles">Estado de la Habitación</label>
                                    
                                    <select name="disponibilidad" class="form-control @error('disponibilidad') is-invalid @enderror" id="disponibilidad">
                                        <option value="">---------- Selecciona el estado ----------</option>
    
                                        <!-- Se recorren todos los estados de la habitación -->
                                        @foreach($disponible as $disponible)
                                        <option value="{{ $disponible->id }}" {{ $habitacion->disponibilidad_id == $disponible->id ? 'selected' : '' }} >{{$disponible->estado}}</option>
                                        @endforeach
                                    </select>
    
                                    @error('disponibilidad')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>

                            <!-- Campo para el mobiliario de la habitación -->
                            <div class="form-group mt-2 category">
                                <label for="mobiliario">Mobiliario de la habitación</label>
                                <input id="mobiliario" type="hidden" name="mobiliario" value="{{ $habitacion->mobiliario }}">
                                <trix-editor 
                                    class="form-control @error('mobiliario') is-invalid @enderror "
                                    input="mobiliario"
                                ></trix-editor>
            
                                @error('mobiliario')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <!-- Campo para los servicios ofrecidos en la habitación -->
                            <div class="form-group mt-2 category">
                                <label for="servicios">Servicios</label>
                                <input id="servicios" type="hidden" name="servicios" value="{{ $habitacion->servicios }}">
                                <trix-editor 
                                    class="form-control @error('servicios') is-invalid @enderror "
                                    input="servicios"
                                ></trix-editor>
            
                                @error('servicios')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <!-- Campo para el valor de la habitación -->
                            <div class="form-group">
                                <label for="precio" class="titles">Precio de la habitación</label>
                                <input type="text" name="precio" class= "form-control @error('precio') is-invalid @enderror" id="precio" placeholder="Ej: 123.456" value="{{ $habitacion->precio }}">
                                
                                @error('precio')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <!-- Agregar datos de la habitación -->
                            <div class="form-group">
                                <input type="submit" class="btn btn-warning text-white" value="Guardar Cambios">
                            </div>
                            <input type="hidden" name="hotel_id" value="{{ $hotel->id }}"/>
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