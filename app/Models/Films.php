<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Films extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description', 'release_date'];

    // Define the one-to-many relationship with ticket_pricing
    public function ticketPricing()
    {
        return $this->hasOne(TicketPrice::class, 'film_id');
    }

    // Define the one-to-many relationship with film_rating
    public function filmRating()
    {
        return $this->hasOne(FilmRating::class, 'film_id');
    }

    // Define the many-to-many relationship with countries through film_country
    public function countries()
    {
        return $this->belongsToMany(Country::class, 'film_countries', 'film_id', 'country_id');
    }

    // Define the many-to-many relationship with genres through film_genre
    public function genres()
    {
        return $this->belongsToMany(Genres::class, 'film_genre', 'film_id', 'genre_id');
    }

    // Define the one-to-many relationship with photos
    public function photos()
    {
        return $this->hasMany(Photos::class, 'film_id');
    }

    // Define the one-to-many relationship with comments
    public function comments()
    {
        return $this->hasMany(Comments::class, 'film_id');
    }
}
