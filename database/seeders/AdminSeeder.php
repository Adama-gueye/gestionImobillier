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
            'prenom' => 'Mountaga',
            'email' => 'mountaga@gmail.com',
            'password' => Hash::make('passer123'),
            'role' => 'admin',
        ]);
    }
}
