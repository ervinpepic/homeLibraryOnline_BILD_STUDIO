@extends('layouts.app')


@section('content')
  <div class="container">
    @if (session()->has('message'))
      <div class="alert alert-info" role="alert">
        {{session('message')}}
      </div>
    <div class="row">
      
      @endif
      {{--  show particular book    --}}
      <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="https://www.aiga.org/globalassets/migrated-images/uploadedimages/aiga/content/about_aiga/benefits/icon_book_1009.png" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Book: {{ $book->title }}</h5>
          <p class="card-text">Author: {{ $book->author_name }}</p>
          <p class="card-text">Published by: {{ $book->publisher }}</p>
          <p class="card-text">Available on our library: {{ $book->status }}</p>
          <form action="{{route('book_show', ['book' => $book->id])}}" method="POST">@csrf
            <button type="submit" value="{{$book->id}}" class="btn btn-success">Charter this book</button>
          </form>
        
        </div>
      </div>
    </div>
  </div>
@endsection
