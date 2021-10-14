@extends('layouts.main')

@section('title', 'Cestino')
@section('content')
    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col-3">
                    <div class="card">
                        <div class="card-body text-black text-center">
                          @forelse($comics as $comic)
                            <h2>{{$comic->title}}</h2>
                            <p>{{$comic->price}}</p>
                            <p>{{$comic->series}}</p>
                            <p>{{$comic->sale_date}}</p>
                            <p>{{$comic->type}}</p>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-danger">DELETE</button>
                                <button class="btn btn-success">RESTORE</button>
                            </div>
                          @empty
                            <h1 class="text-center">Nessun Comics nel cestino</h1>
                          @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection