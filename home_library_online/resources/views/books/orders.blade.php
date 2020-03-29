@extends('layouts.app')


@section('content')
    <div class="container">

        <h1 class="mb-5">Your Book Orders History</h1>
        <hr>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Book Title</th>
                <th scope="col">Book Author</th>
                <th scope="col">Book Publisher</th>
                <th scope="col">Order Date</th>

            </tr>
            </thead>
            <tbody>
            @foreach($order as $user_order)
                <tr>
                    <th scope="row">{{ $user_order->title }}</th>
                    <td>{{ $user_order->author_name }}</td>
                    <td>{{ $user_order->publisher }}</td>
                    <td>{{ $user_order->created_at }}</td>
            @endforeach

            </tbody>
        </table>
        <br>





        </div>

    </div>

@endsection