@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Movie</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('film.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="release_date">Release Date</label>
                            <input type="date" name="release_date" id="release_date" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="rating">Rating</label>
                            <input type="number" name="rating" id="rating" min="1" max="5" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="ticket_price">Ticket Price</label>
                            <input type="number" name="ticket_price" id="ticket_price" class="form-control" step="0.01" required>
                        </div>

                        <div class="form-group">
                            <label for="genres">Genres</label>
                            <select name="genres[]" id="genres" class="form-control" multiple required>
                                @foreach ($genres as $genre)
                                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" name="photo" id="photo" class="form-control-file" accept="image/*" required>
                        </div>
                        <div class="form-group">
                            <label for="countries">Countries</label>
                            <select name="countries[]" id="countries" class="form-control" multiple required>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
