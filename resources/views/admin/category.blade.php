@extends('admin.layout')
@section('title','Category')
@section('container')

<div class="mb10">
  <h1>Category</h1>
  <hr>
  @if(session()->has('message'))
        <div class="alert alert-danger">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
          {{session()->get('message')}}
        </div>
        @endif
<br>
<a href="{{route('managecat')}}"><button type="button" class="btn btn-primary">Add Category</button></a>
<br>
<hr>
{{-- table --}}
<table class="table table-hover table-dark">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Category Name</th>
        <th scope="col">Category Slug</th>
        <th scope="col">Operation</th>
        <th scope="col">Update</th>
        
      </tr>
    </thead>
    @foreach ($data as $category)
        
    <tbody>
      <tr>
        
        <td>{{$category->id}}</td>
        <td>{{$category->Category_name}}</td>
        <td>{{$category->Category_slug}}</td>
        <td>
          <form action="" method="post">
              @csrf
              @method('Delete')
              <a href="{{ route('deletecategory', ['id' => $category->id]) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this')">Delete</a>
          </form> 
        </td>
        <td>
          <a href="{{ route('updateCategoryForm', ['id' => $category->id]) }}" class="btn btn-info" onclick="return confirm('Are you sure you want to Change this')">UPDATE</a>
        </td>
        
        
        
      </tr>
    
    </tbody>
    @endforeach
  </table>
{{-- table --}}


</div>
@endsection