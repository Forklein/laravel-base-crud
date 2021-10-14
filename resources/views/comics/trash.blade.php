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
                                <h2>{{$comic->title}}</h2>
                                <p>{{$comic->price}}</p>
                                <p>{{$comic->series}}</p>
                                <p>{{$comic->sale_date}}</p>
                                <p>{{$comic->type}}</p>
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