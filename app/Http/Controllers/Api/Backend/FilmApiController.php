<?php

namespace App\Http\Controllers\Api\Backend;

use App\Models\Films;
use App\Http\Controllers\Api\ResponseController;
use App\Http\Resources\FilmResource;

class FilmApiController extends ResponseController
{

    public function __construct()
    {
        $this->middleware('auth:admin_api')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index() {
        
        $films = FilmResource::collection(Films::with('ticketPricing', 'filmRating', 'countries', 'genres', 'photos', 'comments')->get());
        
        if ($films) {
            return $this->sendResponse($films, 'success');
        } else {
            return $this->sendError('No records have found');
        }
    }
}
