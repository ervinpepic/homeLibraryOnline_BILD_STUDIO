@extends('layouts.app')


@section('content')
  <div class="container">
    <!-- Search form -->
 <div class="row">
   <div class="col-md-4">
     <form action="{{ route('book_list')}}" method="GET">
       <div class="input-group">
         <input
                 type="search"
                 name="search_query"
                 class="form-control"
                 placeholder="Search books by title or author..."
                 value="{{isset($search_query) ? $search_query : '' }}"
         >
         <span class="input-group-prepend">
           <button type="submit" class="btn btn-primary">Search</button>
         </span>
       </div>
     </form>
   </div>
 </div>
    <br>
    <h1>All books in library</h1>
    <h2></h2>
    <div class="row">
    
    {{-- displaying all books from database --}}
      @foreach($books as $book)
        
        <div class="card mr-5 mt-5" style="width: 18rem;">
          <img class="card-img-top" src="https://www.aiga.org/globalassets/migrated-images/uploadedimages/aiga/content/about_aiga/benefits/icon_book_1009.png " alt="Card image cap">
          <div class="card-body">
            <a href="{{route('book_show', ['book' => $book->id])}}"><h5 class="card-title">Book: {{ $book->title }}</h5></a>
            <p class="card-text">Author: {{ $book->author_name }}</p>
            <p class="card-text">Published by: {{ $book->publisher }}</p>
            <p class="card-text">Available on our library: {{ $book->status }}</p>
            <a href="{{route('book_show', ['book' => $book->id])}}" class="btn btn-primary">View Book</a>
          </div>
        </div>
      
      @endforeach
    </div>
  
  
  </div>

@endsection