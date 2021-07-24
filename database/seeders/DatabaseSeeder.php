<?php

namespace Database\Seeders;

use App\Models\Carrera;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'email' => 'user@example.com',
            'name' => 'John Doe'
        ]);

        Carrera::factory(4)->create();
    }
}
