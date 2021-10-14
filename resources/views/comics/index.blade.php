@extends('layouts.main')

@section('title', 'Home')
@section('content')
    <section>
        <div class="container mt-3">
            @if (session('title'))
            <div class="alert alert-success" role="alert">
                <p>Eliminato con successo {{session('title')}}</p>
            </div>
            @endif
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Price</th>
                    <th scope="col">Series</th>
                    <th scope="col">Sale Date</th>
                    <th scope="col">Type</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($comics as $comic)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$comic->title}}</td>
                            <td>{{$comic->price}}</td>
                            <td>{{$comic->series}}</td>
                            <td>{{$comic->sale_date}}</td>
                            <td>{{$comic->type}}</td>
                            <td class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('comics.edit', $comic->id) }}">
                                    <button class="btn btn-warning">EDIT</button>
                                </a>
                                <form method="POST" action="{{ route('comics.destroy', $comic->id)}}" data-title="{{ $comic->title }}" class="delete">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">DELETE</button>
                                </form>
                                <a href="{{ route('comics.show', $comic->id) }}">
                                    <i class="fas fa-info-circle text-white"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <h1 class="text-center">Nessun dato</h1>
                    @endforelse
                </tbody>
              </table>
              {{$comics->links()}}
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <a class="text-white fw-bold" href="{{route('comics.trash')}}">Trash <i class="far fa-trash-alt"></i></a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script src="{{asset('js/confirm.js')}}"></script>
@endsection