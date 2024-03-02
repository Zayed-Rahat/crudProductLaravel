@extends('app')

@section('title', 'Register')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
      <div class="border border-dark rounded p-4">
        <h2 class="text-center mb-4">Register</h2>
        <form action="/register" method="POST">
          @csrf

          <div class="form-group">
            <label for="name">Name:</label>
            <input name="name" type="text" class="form-control" placeholder="Enter your name">
          </div>

          <div class="form-group">
            <label for="email">Email:</label>
            <input name="email" type="email" class="form-control" placeholder="Enter your email">
          </div>

          <div class="form-group">
            <label for="password">Password:</label>
            <input name="password" type="password" class="form-control" placeholder="Enter your password">
          </div>

          <button type="submit" class="btn btn-primary btn-block">Register</button>
        </form>
      </div>
    </div>
  </div>
@endsection
