@extends('layout')
@section('Title')
    Edit Book
@endsection
@section('page-styles')
<link rel="stylesheet" href="{{ asset('css/books/edit.css') }}">
@endsection
@section('content')

<form class="edit-form" action="{{ url('/books/' . $book->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="name" id="name" placeholder="Book Name" value="{{ old('name', $book->name) }}">
    @if ($errors->has('name'))
        <p class="error-message">{{ $errors->first('name') }}</p>
    @endif
    <br>
    <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Book Description">{{ old('desc', $book->desc) }}</textarea>
    @if ($errors->has('desc'))
        <p class="error-message">{{ $errors->first('desc') }}</p>
    @endif
    <br>
    <div class="file-input-wrapper">
        <label for="img">Choose a file</label>
        <input type="file" name="img" id="img">
    </div>
    @if ($errors->has('img'))
        <p class="error-message">{{ $errors->first('img') }}</p>
    @endif
    <br>

    <select name="category_id" id="category_id">
        <option value="">Select Category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    @if ($errors->has('category_id'))
        <p class="error-message">{{ $errors->first('category_id') }}</p>
    @endif
    <br>
    <br>

    <input type="submit" value="Edit">
</form>
@endsection
