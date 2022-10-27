<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create([
            'email' => 'admin@admin.com',
            'tipo_usuario_id' => 1,
        ]);

        \App\Models\User::factory(1)->create([
            'email' => 'presidente@presidente.com',
            'tipo_usuario_id' => 2,
        ]);

        \App\Models\User::factory(1)->create([
            'email' => 'agricultor@agricultor.com',
            'tipo_usuario_id' => 3,
        ]);

    }
}
