@extends('admin.layout')
@section('title','Manage category')
@section('container')
<h1 class="mb10">Manage Category</h1>
<br>
<a class="mb10" href="{{route('category')}}"><button type="button" class="btn btn-secondary"><-Back</button></a>
<br>
{{-- form --}}
@if(session()->has('message'))
<div class="alert alert-success">
<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  {{session()->get('message')}}
</div>
@endif

<div class="mb10">
    <form action="{{route('category-process')}}" method="POST">
      @csrf
    <div class="form-group">
      <label for="Category-name">Category Name...</label>
      <input type="text" name="Category_name" class="form-control" id="Category-name" aria-describedby="emailHelp" placeholder="Category Name">
      <small id="emailHelp" class="form-text text-muted">Please Provide A New Category.</small>
    </div>
    <div class="form-group">
      <label for="Category_slug">Category Slug</label>
      <input type="text" name="Category_slug" class="form-control" id="Category_slug" placeholder="Category_slug">
      <small id="emailHelp" class="form-text text-muted">Please Provide A New Category slug.</small>
    </div>
    <div class="visible">
    <button type="submit" class=" btn btn-primary btn-lg btn-block">Submit</button>
  </div>
  </form>
</div>  
{{-- form --}}

@endsection