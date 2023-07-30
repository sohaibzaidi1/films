<?php

namespace App\Http\Controllers\Api\Backend;

use App\Models\Films;
use App\Http\Controllers\Api\ResponseController;
use App\Http\Resources\FilmResource;
use Illuminate\Http\Request;
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

    public function index(Request $request) {
        $perPage = $request->input('perPage', 1);

        $films = Films::with('ticketPricing', 'filmRating', 'countries', 'genres', 'photos', 'comments')->paginate($perPage);

        $films = [
            'data' => FilmResource::collection($films->getCollection()),
            'total' => $films->lastPage(),
            'currentPage' => $films->currentPage(),
        ];

        if ($films) {
            return $this->sendResponse($films, 'success');
        } else {
            return $this->sendError('No records have found');
        }
    }
}
