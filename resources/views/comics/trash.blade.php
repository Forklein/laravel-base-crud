@extends('layouts.main')

@section('title', 'Cestino')
@section('content')
    <section>
        <div class="card">
            <div class="card-body text-black">
              @forelse($comics as $comic)
                <p>{{$comic->title}}</p>
              @empty
                <h1 class="text-center text-black">Nessun Comics nel cestino</h1>
              @endforelse
            </div>
        </div>
    </section>
@endsection