@extends('layouts.main')

@section('content')
    <section>
        <div class="container">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Price</th>
                    <th scope="col">Series</th>
                    <th scope="col">Sale Date</th>
                    <th scope="col">Type</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($comics as $comic)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td><a href="{{ route('comics.show', $comic->id) }}">{{$comic->title}}</a></td>
                            <td>{{$comic->price}}</td>
                            <td>{{$comic->series}}</td>
                            <td>{{$comic->sale_date}}</td>
                            <td>{{$comic->type}}</td>
                        </tr>
                    @empty
                        <h1 class="text-center">Nessun dato</h1>
                    @endforelse
                </tbody>
              </table>
              {{$comics->links()}}
        </div>
    </section>
@endsection