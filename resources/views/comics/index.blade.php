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
                    <th>#</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Series</th>
                    <th>Sale Date</th>
                    <th>Type</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($comics as $comic)
                        <tr class="text-white">
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
                                    <button type="submit" class="btn btn-danger">MOVE TO TRASH</button>
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
                    <a class="text-white fw-bold text-decoration-none p-1" id="trash" href="{{route('comics.trash')}}">Trash <i class="far fa-trash-alt"></i></a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script src="{{asset('js/confirm.js')}}"></script>
@endsection