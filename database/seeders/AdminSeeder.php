<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Créer un utilisateur administrateur
        User::create([
            'nom' => 'Ba',
            'prenom' => 'Adama',
            'email' => 'adamagu99@gmail.com',
            'password' => Hash::make('Ada20865'),
            'role' => 'admin',
        ]);
    }
}
