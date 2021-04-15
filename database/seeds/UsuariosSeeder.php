<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Miguel Alejandro Ibañez Moreno',
            'email' => 'miguel@correo.com',
            'password' => Hash::make('123456789miguel'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        
        $user2 = User::create([
            'name' => 'Luis Alejandro Sanabria Sandoval',
            'email' => 'sanabria@correo.com',
            'password' => Hash::make('123456789luis'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]); 

        $user3 = User::create([
            'name' => 'Lina Doncel Ramos',
            'email' => 'lina@correo.com',
            'password' => Hash::make('123456789lina'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
