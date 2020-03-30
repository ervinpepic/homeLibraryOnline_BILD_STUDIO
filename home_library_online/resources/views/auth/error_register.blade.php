@extends('layouts.app')

@section('content')
  {{-- displaying error if user try to login with unregistered account --}}
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="error-template">
          <h1>
            Oops!</h1>
          <h2>
            It's look like you don't have an account</h2>
          <div class="error-details">
            You must register first
          </div>
          <div class="error-actions">
            <a href="/" class="btn btn-primary btn-lg"><span
                      class="glyphicon glyphicon-home"></span>
              Take Me to registration </a><a href="/register" class="btn btn-default btn-lg"><span
                      class="glyphicon glyphicon-envelope"></span> Contact admin </a>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
