@extends('layouts.main')

@section('title', $comic->title)

@section('content')
    <div class="container mt-3">
        <div class="card mx-auto p-2" style="width: 18rem;">
            <img src="{{ $comic->thumb }}" class="card-img-top" alt="{{$comic->title}}">
            <div class="card-body">
              <p class="card-text">{{$comic->description}}</p>
            </div>
        </div>
    </div>
@endsection