<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['name'];

    // Define the many-to-many relationship with films through film_country
    public function films()
    {
        return $this->belongsToMany(Film::class, 'film_country', 'id', 'film_id');
    }
}
