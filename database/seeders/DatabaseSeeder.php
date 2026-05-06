<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            TypeSeeder::class,
            MoveSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Aap',
            'email' => 'aap@example.com',
            'password' => '12345678',
        ]);
    }
}
