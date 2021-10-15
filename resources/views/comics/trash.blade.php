@extends('layouts.main')

@section('title', 'Cestino')
@section('content')
    <section>
        <div class="container mt-5">
            <div class="row">
                @forelse($comics as $comic)
                <div class="col-3 d-flex">
                    <div class="card">
                        <div class="card-body text-black text-center my-3">
                            <div class="info">
                                <h2>{{$comic->title}}</h2>
                                <p>Price: {{$comic->price}}</p>
                                <p>Series: {{$comic->series}}</p>
                                <p>Sale_date: {{$comic->sale_date}}</p>
                                <p>Type: {{$comic->type}}</p>
                                <p>Deteted at: {{$comic->deleted_at}}</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <form method="POST" data-title="{{$comic->title}}" class="delete" action="{{ route('comics.delete', $comic->id) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger">DELETE</button>
                                </form>
                                <form method="POST" action="{{ route('comics.restore', $comic->id) }}">
                                    @method('PATCH')
                                    @csrf
                                    <button class="btn btn-success">RESTORE</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <h1 class="text-center">Nessun Comics nel cestino</h1>
                @endforelse
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script src="{{asset('js/confirm.js')}}"></script>
@endsection