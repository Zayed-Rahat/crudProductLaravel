@extends('app')

@section('title', 'Login')

@section('content')
    <div class="row justify-content-center mt-4">
        <div class="col-md-6">
          <div class="border border-dark rounded p-4">
            <h2 class="text-center mb-4">Login</h2>
            <form action="/login" method="POST">
              @csrf
              <div class="form-group">
                <label for="loginname">Name:</label>
                <input name="loginname" type="text" class="form-control" placeholder="Enter your name">
              </div>
    
              <div class="form-group">
                <label for="loginpassword">Password:</label>
                <input name="loginpassword" type="password" class="form-control" placeholder="Enter your password">
              </div>
    
              <button type="submit" class="btn btn-primary btn-block">Log in</button>
            </form>
          </div>
        </div>
      </div>
@endsection
