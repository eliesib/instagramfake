<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
             'name' => 'prueba',
             'surname' => 'prueba',
             'usuario' => 'prueba',
             'email' => 'prueba@prueba.com',
             'description' => 'descripcion de prueba',
             'password' => Hash::make('prueba'),
             'image' => 'defaultuser.jpg',
         ]);
    }
}
