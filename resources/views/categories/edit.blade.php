
    
@extends('layout')
@section('Title')
    Edit Category
@endsection    
@section('page-styles')
<link rel="stylesheet" href="{{asset('css/categories/edit.css')}}">

@endsection
   @section('content')

   <form class="edit-form" action="{{ url("/categories/$category->id") }}" method="POST" enctype="multipart/form-data">
       @csrf
       @method('PUT')
       <input type="text" name="name" id="name"  placeholder="Category Name" value="{{ $category->name }}">
       @if ($errors->has('name'))
           <p class="error-message">{{ $errors->first('name') }}</p>
       @endif
       <br>
       <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Category Description"> {{$category->desc}} </textarea>
       @if ($errors->has('desc'))
           <p class="error-message">{{ $errors->first('desc') }}</p>
       @endif
       <br>
       <div class="file-input-wrapper">
        <label for="img">Choose a file</label>
        <input type="file" name="img" id="img">
    </div>       @if ($errors->has('img'))
       <p class="error-message">{{ $errors->first('img') }}</p>
   @endif
   <br>
   <br>

       <input type="submit" value="Edit">
   </form>
   @endsection
  
