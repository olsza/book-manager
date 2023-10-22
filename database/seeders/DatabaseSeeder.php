<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Human Tester',
            'email' => 'test@test.test',
            'password' => Hash::make('PASSword!23'),
        ]);

        $this->call([
            CategorySeeder::class,
            BookSeeder::class,
        ]);
    }
}
