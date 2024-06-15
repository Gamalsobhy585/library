@extends('layout')

@section('title')
    Show Category
@endsection

@section('page-styles')
    <link rel="stylesheet" href="{{ asset('css/categories/show.css') }}">
@endsection

@section('content')

<div class="container">
    <h1>{{ $category->name }}</h1>
    <p>{{ $category->desc }}</p>
    @if ($category->books->count() != 0 )
    @foreach ($category->books as $book )
    <p>{{$book->name}}</p>
@endforeach
    @endif
  
    <p>Created at: {{ $category->created_at->format('d M Y, H:i') }}</p>
    <img src="{{ asset(str_replace('public/', 'storage/', $category->img)) }}" alt="{{ $category->name }}" class="category-img">

    <div class="actions">
        <a href="{{ url("categories/{$category->id}/edit") }}" class="edit-btn">Edit</a>
        <form action="{{ url("categories/{$category->id}") }}" method="POST" class="delete-form ">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete" class="delete-btn">
        </form>
    </div>
</div>
@endsection
