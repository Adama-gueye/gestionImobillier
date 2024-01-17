<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Bien;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CreationBienTest extends TestCase
{
    public function test_Creation_Bien_Test()
    {
        Storage::fake('public');
        // Supposons que nous avons déjà un utilisateur authentifié
        $user = User::factory()->create();
        $this->actingAs($user, "web");

        // Créer une instance de la classe Request avec les données simulées
        $image = UploadedFile::fake()->image('202311231827pexels-photo-276554.jpeg');
        //$photoChambre = UploadedFile::fake()->image('image.png');

        $requestData = [
            'nom' => 'viptest',
            'categorie' => 'Luxe',
            'image' => $image,
            'description' => 'Appartement VIP',
            'adresse_localisation' => 'Mermoz',
            'status' => 'Occupé',
            'nbrChambre' => '3',
            'dimension' => '250',
            'nbrToilette' => '3',
            'nbrBalcon' => '2',
            'nbrEspaceVert' => '1',
        ];
        $response = $this->post(route('bien.store'), $requestData);

        $response->assertRedirect(route('index'));

         $this->assertDatabaseHas('biens', [
             'nom' => 'viptest',
         ]);

        // Assurez-vous que le fichier image a été stocké dans le bon répertoire
       // $this->assertFileExists(public_path('images/' . time() . '.' . $image->getClientOriginalExtension()));
    }
}