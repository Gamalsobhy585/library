@extends('layout')

@section('title')
    Show Book
@endsection

@section('page-styles')
    <link rel="stylesheet" href="{{ asset('css/books/show.css') }}">
@endsection

@section('content')

<div class="container ">
    <h1>{{ $book->name }}</h1>
    <p>{{ $book->desc }}</p>
    
    <p>Category: {{ $book->category->name }}</p>
    <p>Added by: {{ $book->user->name }}</p>
    
    <p>Created at: {{ $book->created_at->format('d M Y, H:i') }}</p>
    <img src="{{ asset(str_replace('public/', 'storage/', $book->img)) }}" alt="{{ $book->name }}" class="book-img w-50 mb-2">

    <div class="actions">
        <a href="{{ url("books/{$book->id}/edit") }}" class="edit-btn">Edit</a>
        <form action="{{ url("books/{$book->id}") }}" method="POST" class="delete-form">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete" class="delete-btn">
        </form>
    </div>
</div>
@endsection
