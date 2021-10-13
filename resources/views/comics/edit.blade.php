@extends('layouts.main')

@section('title', 'Create')

@section('content')

<div class="container mt-3">
    <form method="POST" action="{{ route('comics.update', $comic->id) }}">
        @method('PATCH')
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" name="title" value="{{ $comic->title }} ">
          <div class="form-text">Inserisci il titolo</div>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ $comic->description }}">
            <div class="form-text">Inserisci la descrizione</div>
        </div>
        <div class="mb-3">
            <label for="thumb" class="form-label">Url</label>
            <input type="text" class="form-control" id="thumb" name="thumb" value="{{ $comic->thumb }}">
            <div class="form-text">Inserisci URL dell'immagine</div>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="2.99" value="{{ $comic->price }}">
            <div class="form-text">Inserisci il prezzo</div>
        </div>
        <div class="mb-3">
            <label for="series" class="form-label">Series</label>
            <input type="text" class="form-control" id="series" name="series" value="{{ $comic->series }}">
            <div class="form-text">Inserire la serie</div>
        </div>
        <div class="mb-3">
            <label for="sale_date" class="form-label">Sale Date</label>
            <input type="text" class="form-control" id="sale_date" name="sale_date" placeholder="2020-08-09" value="{{ $comic->sale_date }}">
            <div class="form-text">Inserisci la data di vendita</div>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <input type="text" class="form-control" id="type" name="type" value="{{ $comic->type }}">
            <div class="form-text">Inserisci il tipo</div>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>

@endsection