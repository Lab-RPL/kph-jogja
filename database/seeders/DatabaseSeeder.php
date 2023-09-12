<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Bdh;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Juan',
            'email' => 'dad@gmail.com',
            'password' => bcrypt('123')
        ]);

        Bdh::create([
            'nama_bdh' => 'Kulonprogo',
            'kepala_bdh' => 'Mas Ronal',
            'luas_bdh' => 123.85
        ]);
    }
}
