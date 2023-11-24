<?php

// app\Models\Image.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['url', 'bien_id'];

    public function bien()
    {
        return $this->belongsTo(Bien::class);
    }
}
