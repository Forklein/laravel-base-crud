@extends('layouts.main')

@section('title', 'Create')

@section('content')

<div class="container">
    <form method="POST" action="{{ route('comics.store') }}">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" name="title">
          <div class="form-text">Inserisci il titolo</div>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description">
            <div class="form-text">Inserisci la descrizione</div>
        </div>
        <div class="mb-3">
            <label for="thumb" class="form-label">Url</label>
            <input type="text" class="form-control" id="thumb" name="thumb">
            <div class="form-text">Inserisci URL dell'immagine</div>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="2.99">
            <div class="form-text">Inserisci il prezzo</div>
        </div>
        <div class="mb-3">
            <label for="series" class="form-label">Series</label>
            <input type="text" class="form-control" id="series" name="series">
            <div class="form-text">Inserire la serie</div>
        </div>
        <div class="mb-3">
            <label for="sale_date" class="form-label">Sale Date</label>
            <input type="text" class="form-control" id="sale_date" name="sale_date" placeholder="2020-08-09">
            <div class="form-text">Inserisci la data di vendita</div>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <input type="text" class="form-control" id="type" name="type">
            <div class="form-text">Inserisci il tipo</div>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>

@endsection