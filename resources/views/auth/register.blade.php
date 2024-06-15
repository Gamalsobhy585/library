@extends('layout')
@section('title', 'Register')
@section('page-styles')
<link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
@endsection
@section('content')

<div class="container">
    <h2>Register</h2>
    <form method="POST" action="{{ route('register.post') }}">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

        <div class="form-group">
            <input type="submit" value="Register">
        </div>
    </form>
</div>

@endsection
