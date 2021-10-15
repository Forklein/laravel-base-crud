@extends('layouts.main')

@section('title', 'Create')

@section('content')

<div class="container mt-3">
    @if($errors->any())
    <div class="alert alert-danger" role="alert">
        <strong>Error</strong>
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="POST" action="{{ route('comics.store') }}">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title')}}">
                    @error('title')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @else
                    <div class="form-text">Inserisci il titolo</div>
                    @enderror
                  </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{old('description')}}">
                    <div class="form-text">Inserisci la descrizione</div>
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="thumb" class="form-label">Url</label>
                    <input type="text" class="form-control" id="thumb" name="thumb" value="{{old('thumb')}}">
                    <div class="form-text">Inserisci URL dell'immagine</div>
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="2.99" value="{{old('price')}}">
                    @error('price')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @else
                    <div class="form-text">Inserisci il prezzo</div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="series" class="form-label">Series</label>
                    <input type="text" class="form-control @error('series') is-invalid @enderror" id="series" name="series" value="{{old('series')}}">                  
                    @error('series')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @else
                    <div class="form-text">Inserire la serie</div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="sale_date" class="form-label">Sale Date</label>
                    <input type="text" class="form-control @error('sale_date') is-invalid @enderror" id="sale_date" name="sale_date" placeholder="2020-08-09" value="{{old('sale_date')}}">
                    @error('sale_date')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @else
                    <div class="form-text">Inserisci la data di vendita</div>
                    @enderror
                </div>
            </div>
            <div class="col-6 mx-auto">
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" value="{{old('type')}}">
                    @error('type')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @else
                    <div class="form-text">Inserisci il tipo</div>
                    @enderror
                </div>
            </div>
            <div class="btn mx-auto">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </div>
    </form>
</div>

@endsection