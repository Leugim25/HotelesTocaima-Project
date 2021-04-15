<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategotiasSeederHotel extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoria_hoteles')->insert([
            'nombre' => 'Alojamiento básico o sencillo',
            'descripcion' => 'Habitación con 1 o 2 camas, Mobiliario básico (cama, mesa de noche, silla, ventilador), productos de aseo básicos, servicio de restaurante',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('categoria_hoteles')->insert([
            'nombre' => 'Alojamiento estandar o comodo',
            'descripcion' => 'Habitación con 2 o 3 camas, Mobiliario básico (cama, mesa de noche, ventilador o aire acondicionado, televisión con tv cable estandar, internet), productos de aseo básicos, servicio de restaurante, jacuzzi o piscina',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('categoria_hoteles')->insert([
            'nombre' => 'Alojamiento superior o de mayor calidad',
            'descripcion' => 'Habitación con 2 o 5 camas, Mobiliario (cama, mesa de noche, escritorio, aire acondicionado, televisión minima de 19 pulgadas con tv cable de calidad, internet, closet), mini bar con nevera, servicio de Restaurante con menú especializado, servicio de jacuzzi o piscina, servicio al cuarto y servicio de bar',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]); 
    }
}
