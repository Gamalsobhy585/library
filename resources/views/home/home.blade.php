@extends('layout')
@section('title')
  Home
@endsection 
@section('page-styles')
<link rel="stylesheet" href="{{asset('css/home/home.css')}}">
@endsection
@section('content')

<div  style="    margin-top: 100px;" class="d-flex align-items-center justify-content-center">
    <div class="welcome">
        <h1>Welcome to Book Store</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
        <a href="#" class="learn-more">Learn More</a>
    </div>
</div>


@endsection
