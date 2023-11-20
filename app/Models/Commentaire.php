<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;
     function user() {
        return $this->belongsTo(User::class);
     }
     function bien() {
        return $this->belongsTo(Bien::class);
     }
     public function bienAssocie() {
        return $this->belongsTo(Bien::class, 'bien_id');
    }

}
