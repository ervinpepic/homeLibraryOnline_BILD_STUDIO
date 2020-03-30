@extends('layouts.app')

@section('content')
  
  <div class="container">
    @can('Librarian')
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-12">
          <a class="btn btn-success float-right" href="{{route('book_create')}}">Enter new Book</a>
        </div>
      </div>
    </div>
    @endcan
    <div class="row">
      
      <h1 class="mb-5">Admin Panel</h1>
      <hr>
  
      
      <table class="table table-striped">
        <p class="text-muted mt-5">Approve or disapprove users by click on button approve or disapprove</p>
        <thead>
        <tr>
          <th scope="col">Users_id</th>
          <th scope="col">Full Name</th>
          <th scope="col">Status of approval</th>
          <th scope="col">Email</th>
          <th scope="col">Role</th>
        </tr>
        </thead>
        
        <tbody>
        @foreach($users as $user)
          <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->status }}
              <form action="admin/{{$user->id}}" method="POST">@csrf
                @method('PUT')
                <span>
                  @if($user->status === 'unapproved')
                    <input type="hidden" value="{{ $user->email }}" name="email">
                    <button
                            class="btn-sm btn-info ml-2"
                            type="submit"
                            name="status"
                            value="approved">
                      Approve
                    </button>
                  @endif
                </span>
              </form>
            </td>
            <td>{{ $user->email }}</td>
           
            <td>{{ $user->get_roles()->first() }}</td>
          
          </tr>
        @endforeach
        
        </tbody>
      
      </table>
      
      <div class="divider-custom-line"></div>
      
      <h1 class="mt-5">Book list </h1>
      <hr>
      
      <p class="text-muted mt-5">Here you can view all books added by librarian, delete them.</p>
      <thead>
      <tr>
        <form action="{{ route('admin_home')}}" method="GET">
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
        <table class="table table-striped">
          <th scope="col">Book ID</th>
          <th scope="col">Book Title</th>
          <th scope="col">Book Author</th>
          <th scope="col">Book Genre</th>
          <th scope="col">Book Publisher</th>
          <th scope="col">Book Status</th>
          </tr>
          </thead>
          <tbody>
          @foreach($books as $book)
            <tr>
              <th scope="row">{{ $book->id }}</th>
              <td><a href="{{ route('book_show', ['book' => $book->id]) }}">{{ $book->title }}</a></td>
              <td>{{ $book->author_name }}</td>
              <td>{{ $book->category }}</td>
              <td>{{ $book->publisher }}</td>
              <td>{{ $book->status }}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
    
    
    </div>
  </div>

@endsection