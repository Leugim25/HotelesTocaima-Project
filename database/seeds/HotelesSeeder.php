<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hoteles')->insert([
            'titulo' => 'Hotel Tocaima',
            'nit' => '123.456.789-0',
            'direccion' => 'Direccion inventada',
            'celular' => '3138870296',
            'descripcion' => 'aqui la descripcion',
            'imagen' => 'imagen.png',
            'user_id' => 1,
            'categoria_id' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
