@extends('layouts.main')

@section('title', 'Cestino')
@section('content')
    <section>
        <div class="container mt-5">
            @if (session('delete'))
            <div class="alert alert-danger" role="alert">
                <p><strong>{{session('delete')}}</strong> eliminato definitivamente</p>
            </div>
            @endif
            <div class="row">
                @forelse($comics as $comic)
                <div class="col-3">
                    <div class="card">
                        <div class="card-body text-black text-center my-3">
                            <div class="info">
                                <h3>{{$comic->title}}</h3>
                                <p>Price: {{$comic->price}}</p>
                                <p>Series: {{$comic->series}}</p>
                                <p>Sale_date: {{$comic->sale_date}}</p>
                                <p>Type: {{$comic->type}}</p>
                                <p>Deteted at: {{$comic->getDeletedDate()}}</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <form method="POST" data-title="{{$comic->title}}" class="delete" action="{{ route('comics.delete', $comic->id) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger">DELETE</button>
                                </form>
                                <a href="{{ route('comics.edit', $comic->id) }}">
                                    <button class="btn btn-warning">EDIT</button>
                                </a>
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
                <div class="card col-3 mx-auto">
                    <div class="card-body">
                        <h3 class="text-center">Nessun Comics nel cestino</h3>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script src="{{asset('js/confirm.js')}}"></script>
@endsection