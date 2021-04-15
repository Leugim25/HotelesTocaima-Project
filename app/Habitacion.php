<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    protected $table = 'habitaciones';

    // Campos que se agregaran
    protected $fillable = [
        'n_habitacion', 'camas', 'mobiliario', 'servicios', 'precio', 'disponibilidad_id'
    ];

    // Obtiene la categoria de la receta via FK
    public function diponible()
    {
        return $this->belongsTo(DisponibilidadHabitacion::class, 'disponibilidad_id');
    }

    // Obtener el id del Hotel
    public function hoteles()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id'); // FK de esta tabla
    }

    // Obtener el id del admin
    public function autor()
    {
        return $this->belongsTo(User::class, 'user_id'); // FK de esta tabla
    }
}
