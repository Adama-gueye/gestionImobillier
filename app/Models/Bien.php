<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    use HasFactory;
    function user() {
        return $this->belongsToMany(Bien::class, 'commentaires', 'user_id', 'bien_id');
     }
    public function commentaires() {
        return $this->hasMany(Commentaire::class);
    }
}
