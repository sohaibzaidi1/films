<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmRating extends Model
{
    protected $table = 'ratings'; 
    protected $primaryKey = 'id';
    protected $fillable = ['film_id','rating'];

    // Define the inverse one-to-many relationship with Film
    public function film()
    {
        return $this->belongsTo(Film::class, 'film_id');
    }
}
