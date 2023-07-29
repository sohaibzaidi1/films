<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = ['name', 'comment'];

    // Define the inverse one-to-many relationship with Film
    public function film()
    {
        return $this->belongsTo(Film::class, 'film_id');
    }
}
