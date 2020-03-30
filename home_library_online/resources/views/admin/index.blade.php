@extends('layouts.app')

@section('content')
  <div class="container">
   
    <div class="row">
      <h1 class="mt-5">Users</h1>
      <table class="table">
        <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Full Name</th>
          <th scope="col">Email</th>
          <th scope="col">Status</th>
          <th scope="col">Role</th>
        </tr>
        </thead>
        <tbody>
        {{-- list all usres from database --}}
        @foreach($users as $user)
          
          <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
              {{ $user->status }}
              {{-- display button only if status not approved --}}
              @if($user->status != 'approved')
                
                <form action="{{route('update_status', ['id' => $user->id])}}" method="post">@csrf
                  @method('PUT')
                  <input type="hidden" value="{{ $user->email }}" name="email">
                  <button
                          class="btn btn-success ml-2"
                          type="submit"
                          name="status"
                          value="approved"
                  >Approve
                  
                  </button>
                </form>
             @endif
             
            </td>
            <td>
              {{-- display all roles for particular user and flatten them to string --}}
              {{ $user->get_roles()->first() }}
              {{-- display button for updating role --}}
              @if( $user->get_roles()->first() != 'Librarian' and $user->get_roles()->first() != 'Admin')
                
                <form action="{{route('update_role', ['id' => $user->id])}}" method="post">@csrf
                  @method('PUT')
                  <button
                          class="btn btn-dark"
                          type="submit"
                          name="role"
                          value="Librarian"
                  >Assign Librarian role
                  </button>
                </form>
                
              @endif
              {{-- display button only if role not User or Admin --}}
              @if( $user->get_roles()->first() != 'User' and $user->get_roles()->first() != 'Admin')
                
                <form action="{{route('update_role', ['id' => $user->id])}}" method="post">@csrf
                  @method('PUT')
                  <button
                          class="btn btn-dark"
                          type="submit"
                          name="role"
                          value="User"
                  >Assign User role
                  </button>
                </form>
                
              @endif
              
            </td>
          </tr>
          
        @endforeach
        
        </tbody>
      </table>
      
    </div>
    
    <div class="row">
      <h1 class="mt-5">Book list</h1>
      <div class="container">
        <div class="row">
          {{-- search form --}}
          <form action="{{ route('admin_home') }}" method="GET">
            <div class="input-group mb-4 mt-2" >
              <input
                      type="search"
                      name="search_query"
                      class="form-control"
                      placeholder="Search books by title or author..."
                      value="{{ isset($search_query) ? $search_query : '' }}"
              />
              <span class="input-group-prepend">
              <button type="submit" class="btn btn-primary">Search</button>
            </span>
            </div>
          </form>
        </div>
      </div>
      <table class="table">
        <thead>
        <tr>
          <th scope="col">Book ID</th>
          <th scope="col">Title</th>
          <th scope="col">Author</th>
          <th scope="col">Genre</th>
          <th scope="col">Publisher</th>
          <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>
        {{-- display all books from database --}}
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
