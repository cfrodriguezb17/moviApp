<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Profile::factory()->create([
            'name' => 'Practicante',
        ]);
        \App\Models\Profile::factory()->create([
            'name' => 'Desarrollador',
        ]);
        \App\Models\Profile::factory()->create([
            'name' => 'Vendedor',
        ]);
        \App\Models\Profile::factory()->create([
            'name' => 'Administrador',
        ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
