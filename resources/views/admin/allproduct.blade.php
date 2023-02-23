@extends('admin.layout')
@section('title','All product')
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
  @if(session()->has('messageSuc'))
        <div class="alert alert-success">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
          {{session()->get('message')}}
        </div>
        @endif
<br>
<a href="{{route('addproduct')}}"><button type="button" class="btn btn-primary">Add Product</button></a>
<br>
<hr>
{{-- table --}}
<table class="table table-hover table-dark">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Product Name</th>
        <th scope="col">Description</th>
        <th scope="col">Price</th>
        <th scope="col">Category</th>
        <th scope="col">Image</th>
        <th scope="col">Operation</th>
        <th scope="col">Update</th>
        
      </tr>
    </thead>
    @foreach ($data as $product)
        
    <tbody>
      <tr>
        
        <td>{{$product->id}}</td>
        <td>{{$product->Title}}</td>
        <td>{{$product->Description}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->category}}</td>
        <td><img height="100" width="50" src="/productimage/{{$product->image}}" alt=""></td>
        <td>
          <form action="" method="post">
              @csrf
              @method('Delete')
              <a href="{{ route('deleteproduct', ['id' => $product->id]) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this')">Delete</a>
          </form> 
        </td>
        <td>
          <a href="{{ route('updateProductForm', $product->id) }}" class="btn btn-info" onclick="return confirm('Are you sure you want to Change this')">UPDATE</a>
        </td> 
        
      </tr>
    
    </tbody>
    @endforeach
  </table>
{{-- table --}}


</div>
@endsection