@extends('layouts.app')

@section('content')
  
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="error-template">
          <h1>
            Oops!</h1>
          <h2>
            403 Unauthorized access</h2>
          <div class="error-details">
            Your account has not been approved yet. We wil notify you on your email after approval.
          </div>
          <div class="error-actions">
            <a href="/" class="btn btn-primary btn-lg"><span
                      class="glyphicon glyphicon-home"></span>
              Take Me Home </a><a href="/" class="btn btn-default btn-lg"><span
                      class="glyphicon glyphicon-envelope"></span> Contact admin </a>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
  