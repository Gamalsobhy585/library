@extends('layout')

@section('title')
    All Categories
@endsection

@section('page-styles')
    <link rel="stylesheet" href="{{ asset('css/categories/index.css') }}">
    <style>
        .fixed-bottom-right {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000; 
        }
    </style>
@endsection

@section('content')
    <div class="container position-relative">
        <h1>All Categories</h1>
        @if (request()->session()->get('success_msg'))
        <div class="alert alert-success" >
            {{request()->session()->get('success_msg')}}

        </div>
    @endif
        @foreach ($categories as $category)
            <div class="category-item mb-4">
                <h3>
                    <a href="{{ url("/categories/{$category->id}") }}">{{ $category->name }}</a>
                </h3>
                <p>{{ $category->desc }}</p>
                <hr>
            </div>
        @endforeach

        <div class="d-flex justify-content-center">
            {{ $categories->links() }}
        </div>

        <a href="{{ url('/categories/create') }}" class="btn btn-primary fixed-bottom-right">Add New Category</a>
    </div>
@endsection
