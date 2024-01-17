<?php

namespace Tests\Feature;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use App\Models\Bien;
use App\Models\GestionBien;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;

use function Pest\Laravel\actingAs;

class MyTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testListeBiens()
    {
        $response = $this->call('GET', '/index');

       // $response->assertRedirect(); 
        $response->assertStatus(302);
    }

        public function test_deleteBien(): void
    {
        $user = User::factory()->create();
        $bien = Bien::factory()->create();
        $gestionBien = GestionBien::factory()->create(['user_id' => $user->id]);
        

       // $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

        $this->actingAs($user);

        if ($gestionBien->user_id === $user->id) {
            $response = $this->call("POST", "/deleteBien/{$bien->id}", ['_method' => 'DELETE']);
            $response->assertStatus(302);
            $this->assertDatabaseMissing('biens', ['id' => $bien->id]);
        } else {
            echo "Il ne peut pas supprimer";
        }
    }


}

