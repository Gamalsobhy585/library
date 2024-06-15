@extends('layout')

@section('Title')
    Create a Category
@endsection 
@section('page-styles')
<link rel="stylesheet" href="{{ asset('css/categories/create.css') }}">

@endsection
@section('content')


    <form class="create-form" action="{{ url('/categories') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" id="name" placeholder="Category Name" value="{{ old('name') }}">
        @if ($errors->has('name'))
            <p class="error-message">{{ $errors->first('name') }}</p>
        @endif
        <br>
        <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Category Description">{{ old('desc') }}</textarea>
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
    <br>

    <input type="submit" value="Add">

    </form>

@endsection
