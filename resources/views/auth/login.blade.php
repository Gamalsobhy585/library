@extends('layout')
@section('title')
  Login
@endsection 
@section('page-styles')
<link rel="stylesheet" href="{{asset('css/auth/login.css')}}">
@endsection
@section('content')

<div class="container pt-5">
    <h2>Login</h2>
    <form method="POST" action="{{ route('login.post') }}">
        @csrf

        <div class="form-group">
            <label class="fw-bold" for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label class="fw-bold" for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="form-group">
            <input type="submit" value="Login">
        </div>
    </form>
</div>

@endsection
