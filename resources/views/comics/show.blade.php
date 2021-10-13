@extends('layouts.main')

@section('title', $comic->title)

@section('content')
    <div class="container mt-3">
        <div class="card mx-auto d-flex flex-row p-2">
            <div class="col-2">
                <div class="card-header">
                    <img src="{{ $comic->thumb }}" alt="{{$comic->title}}">
                </div>
            </div>
            <div class="col-10">
                <div class="card-body">
                    <p class="card-text">{{$comic->description}}</p>
                </div>
                <div class="card-footer text-center">
                    <a href="{{url()->previous()}}"><button class="btn btn-primary">Back</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection