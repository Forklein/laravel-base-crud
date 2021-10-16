@extends('layouts.main')

@section('title', 'Home')
@section('content')
    <section>
        <div class="card col-8 mx-auto shadow mt-5">
            <div class="card-body">
                <div class="container mt-3">
                    @if (session('trash'))
                    <div class="alert alert-success" role="alert">
                        <p><strong>{{session('trash')}}</strong> spostato nel cestino </p>
                    </div>
                    @elseif (session('restore'))
                    <div class="alert alert-success" role="alert">
                        <p><strong>{{session('restore')}}</strong> ripristinato con successo</p>
                    </div>
                    @endif
                    <strong class="text-success">{{$comics->total()}} Total Element</strong>
                    <table class="table mt-2">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Series</th>
                            <th>Sale Date</th>
                            <th>Type</th>
                            <th>Create</th>
                            <th>Edit</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($comics as $comic)
                                <tr>
                                    <th>{{$loop->iteration}}</th>
                                    <td>{{$comic->title}}</td>
                                    <td>{{$comic->price}}</td>
                                    <td>{{$comic->series}}</td>
                                    <td>{{$comic->sale_date}}</td>
                                    <td>{{$comic->type}}</td>
                                    <td>{{$comic->getCreatedDate()}}</td>
                                    <td>{{$comic->getUpdatedDate()}}</td>
                                    <td>
                                        <a href="{{ route('comics.show', $comic->id) }}">
                                            <i class="fas fa-info-circle fa-2x text-primary"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('comics.edit', $comic->id) }}">
                                            <button class="btn btn-warning">EDIT</button>
                                        </a>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('comics.destroy', $comic->id)}}" data-title="{{ $comic->title }}" class="delete">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">TRASH</button>
                                        </form>
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
                            <a class="fw-bold text-decoration-none p-1" id="trash" href="{{route('comics.trash')}}">Trash <i class="far fa-trash-alt"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-center align-items-center text-center">
                <div class="box-icon m-3">
                    <i class="fas fa-spinner fa-pulse"></i>
                </div>
                <div class="credit">
                    <p class="h3">Made by {{ $author }}</p>
                    <p class="font-monospace m-0">Laravel Development</p>
                </div>
                <div class="box-icon m-3">
                    <i class="fas fa-spinner fa-pulse"></i>
                </div>
            </div>
        </div>
    </section>
@endsection