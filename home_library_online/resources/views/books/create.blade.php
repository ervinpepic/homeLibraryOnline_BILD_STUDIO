@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">

    {{-- simple form for creating new book --}}
    <form action="/books" method="POST">@csrf
        <div class="form-group">
            <label for="bookTitle">Book Title</label>
            <input type="text" class="form-control"  placeholder="Enter Book Title..." name="title">
            <small class="form-text text-muted">Please enter correct book title.</small>
        </div>
        <div class="form-group">
            <label for="authorName">Author name</label>
            <input type="text" class="form-control"  placeholder="Enter author name..." name="author_name">

        </div>
        <div class="form-group">
            <label for="category">Genre</label>
            <input type="text" class="form-control" placeholder="Genre..." name="category">
        </div>
        <div class="form-group">
            <label for="publisher">Publisher</label>
            <input type="text" class="form-control" placeholder="Book publihser..." name="publisher">
            <small id="emailHelp" class="form-text text-muted">Please enter a valid book publisher</small>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control" value="Available" name="status">
            <small id="emailHelp" class="form-text text-muted">You don't need to change anything here if book is available</small>
        </div>


        <button type="submit" class="btn btn-success">Submit</button>
    </form>
        </div>
    </div>
@endsection