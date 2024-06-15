@extends('layout')

@section('title')
    All Books
@endsection

@section('page-styles')
    <link rel="stylesheet" href="{{ asset('css/books/index.css') }}">
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
        <h1>All Books</h1>
        @if (request()->session()->get('success_msg'))
            <div class="alert alert-success" >
                {{request()->session()->get('success_msg')}}
            </div>
        @endif
        @foreach ($books as $book)
            <div class="book-item mb-4">
                <h3>
                    <a href="{{ url("/books/{$book->id}") }}">{{ $book->name }}</a>
                </h3>
                <p>{{ $book->desc }}</p>
                <hr>
            </div>
        @endforeach

        <div class="d-flex justify-content-center">
            {{ $books->links() }}
        </div>

        <a href="{{ url('/books/create') }}" class="btn btn-primary fixed-bottom-right">Add New Book</a>
    </div>
@endsection
