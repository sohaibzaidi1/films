<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CommentsResource;
use App\Http\Resources\CountryResource;
use App\Http\Resources\GenreResource;
use App\Http\Resources\PhotoResource;

class FilmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [  
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'release_date' => $this->release_date,
            'rating' => $this->filmRating->rating,
            'ticket_price' => $this->ticketPricing->price,
            'country'   =>  CountryResource::collection($this->countries),
            'genre' =>  GenreResource::collection($this->genres),
            'photo' =>  PhotoResource::collection($this->photos),
            'comments' => CommentsResource::collection($this->comments)
        ];
    }
}
