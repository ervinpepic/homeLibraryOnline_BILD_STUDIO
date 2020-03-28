@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="mb-5">USERS PANEL</h1>
            <hr>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Users_id</th>
            <th scope="col">Full Name</th>
            <th scope="col">Status of approval</th>
            <th scope="col">Email</th>
            <th scope="col">Permissions</th>
            <th scope="col">Role</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>
                {{ $user->status }}
                <form action="admin/{{$user->id}}" method="POST">
                    @csrf
                    @method('PUT')
                <span>
                @if($user->status === 'unapproved')
                        <button class="btn-sm btn-info ml-2" type="submit" name="status" value="approved">Approve</button>
                    @elseif($user->status === 'approved')
                        <button class="btn-sm btn-info ml-2" type="submit" name="status" value="unapproved">Unapprove</button>
                    @endif
                </span>
                </form>

            </td>
            <td>{{ $user->email }}</td>
            @foreach($user->permissions() as $single_user_permission)
            <td>{{ $single_user_permission }}</td>
                @endforeach
            <td>{{ $user->get_roles() }}</td>
        </tr>
        @endforeach

        </tbody>
    </table>
            <br>

            <h1 class="mt-5">BOOKS PANEL</h1>
    <table class="table table-striped">
        <thead>
        <tr>
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
                <td><a href="/books/{{$book->id}}">{{ $book->title }}</a></td>

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