<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\TipoUsuario::factory(1)->create(['name' => 'Administrador']);
        \App\Models\TipoUsuario::factory(1)->create(['name' => 'Presidente']);
        \App\Models\TipoUsuario::factory(1)->create(['name' => 'Agricultor']);
    }
}
