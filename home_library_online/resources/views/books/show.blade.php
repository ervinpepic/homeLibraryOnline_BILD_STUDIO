@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">

            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="https://via.placeholder.com/150" alt="Card image cap">
                <div class="card-body">
                    <a href="/books/{{$book->id}}"><h5 class="card-title">{{ $book->title }}</h5></a>
                    <p class="card-text">{{ $book->author }}</p>
                    <p class="card-text">{{ $book->publisher }}</p>
                    <p class="card-text">{{ $book->status }}</p>
                    <form action="/books/{{ $book->id }}" method="POST">@csrf
                        <button type="submit" value="{{$book->id}}" class="btn btn-success">Get</button>
                    </form>

                </div>
            </div>
    </div>
</div>
@endsection
