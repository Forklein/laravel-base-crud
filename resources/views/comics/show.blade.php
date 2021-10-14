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
                <div class="card-body text-black-50">
                    <p class="card-text">{{$comic->description}}</p>
                </div>
                <div class="card-footer d-flex">
                    <a href="{{url()->previous()}}"><button class="btn btn-primary">BACK</button></a>
                    <form method="POST" action="{{ route('comics.destroy', $comic->id)}}" data-title="{{ $comic->title }}" class="delete">
                        @method('DELETE')
                        @csrf
                    <button type="submit" class="btn btn-danger ms-2">DELETE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="{{asset('js/confirm.js')}}"></script>
@endsection