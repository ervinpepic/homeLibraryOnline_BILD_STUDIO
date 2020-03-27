@extends('layouts.app')

@section('content')
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
            <td>{{ $user->permissions() }}</td>
            <td>{{ $user->get_roles() }}</td>
        </tr>
        @endforeach

        </tbody>
    </table>

@endsection