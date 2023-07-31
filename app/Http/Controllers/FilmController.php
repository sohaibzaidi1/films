<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Genres;
use App\Models\Country;
use App\Models\Films;
use App\Models\FilmRating;
use App\Models\TicketPrice;
use App\Models\Photos;

use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{
    //
    public function index() {

        $countries = Country::all();
        $genres = Genres::all();
    
        return view('create')->with([
            'countries' => $countries,
            'genres' => $genres,
        ]);
    }

    public function store(Request $request){

        $film = new Films();
        $film->name = $request->input('title');
        $film->description = $request->input('description');
        $film->release_date = $request->input('release_date');
        if($film->save()){

            $film->countries()->attach($request->input('countries'));
            $film->genres()->attach($request->input('genres'));

            $filmRating = new FilmRating();
            $filmRating->film_id = $film->id;
            $filmRating->rating = $request->input('rating');
            $filmRating->save();

            $ticketPricing = new TicketPrice();
            $ticketPricing->film_id = $film->id;
            $ticketPricing->price = $request->input('ticket_price');
            $ticketPricing->save();
            
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('photos', 'public');
                $photos = new Photos;
                $photos->film_id = $film->id;
                $photos->photo_path = $photoPath;
                $photos->save();
            }
        }
        return redirect()->route('films');
    }
}
