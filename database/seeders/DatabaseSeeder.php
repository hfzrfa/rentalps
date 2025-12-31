<?php

namespace Database\Seeders;

use App\Models\Playstation;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'role' => 'admin',
                'password' => 'password',
            ]
        );

        User::updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'role' => 'user',
                'password' => 'password',
            ]
        );

        $defaultPlaystations = [
            ['nama' => 'PS 4 - Unit 1', 'harga_per_jam' => 10000],
            ['nama' => 'PS 4 - Unit 2', 'harga_per_jam' => 10000],
            ['nama' => 'PS 5 - Unit 1', 'harga_per_jam' => 20000],
        ];

        foreach ($defaultPlaystations as $ps) {
            Playstation::updateOrCreate(
                ['nama' => $ps['nama']],
                [
                    'harga_per_jam' => $ps['harga_per_jam'],
                    'status' => 'tersedia',
                ]
            );
        }
    }
}
