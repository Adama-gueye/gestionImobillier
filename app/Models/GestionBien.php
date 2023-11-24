<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GestionBien extends Model
{
    use HasFactory;

    function user() {
        return $this->belongsTo(User::class);
     }
     function bien() {
        return $this->belongsTo(Bien::class);
     }
}
