<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Utiliser le factory pour créer un utilisateur administrateur
        \App\Models\User::factory()->create([
            'nom' => 'Gueye',
            'prenom' => 'Adama',
            'email' => 'adamagu99@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('Ada20865'),
            'role' => 'admin',
        ]);
    }
}

