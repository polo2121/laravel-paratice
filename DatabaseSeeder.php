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
        // \App\Models\Drugs::factory(10)->create();
        // \App\Models\Message::factory(10)->create();
        // \App\Models\Appointment::factory(10)->create();
        // \App\Models\Rooms::factory(10)->create();s
        // \App\Models\Doctor::factory(10)->create();

        \App\Models\User::factory(10)->create();





        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Drugs::factory(1)->create();
    }
}
