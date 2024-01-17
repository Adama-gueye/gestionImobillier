<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'categorie',
        'image',
        'description',
        'adresse_localisation',
        'status',
        'nbrChambre',
        'dimension',
        'nbrToilette',
        'nbrBalcon',
        'nbrEspaceVert',
    ];

    function user() {
        return $this->belongsToMany(Bien::class, 'commentaires', 'user_id', 'bien_id');
     }
     function gestionUser() {
        return $this->belongsToMany(Bien::class, 'gestionBiens', 'user_id', 'bien_id');
     }
    public function commentaires() {
        return $this->hasMany(Commentaire::class);
    }
    public function images(){
        return $this->hasMany(Image::class);
    }
}
