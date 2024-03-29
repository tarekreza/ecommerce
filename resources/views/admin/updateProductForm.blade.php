@extends('admin.layout')
@section('title','Update product')

@section('container')
<h1 class="mb10">Add Product</h1>
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

  {{-- @if ($errors)

  @foreach ($errors->all() as $err)
  <li style="color: red">
    {{$err}}
  </li>
    
  @endforeach
    
  @endif --}}
    <form action="{{route('productEdit',$data->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
    <div class="form-group">
      <label for="Product_name">Product Name...</label>
      <input type="text" name="Product_name" class="form-control" id="Product_name" aria-describedby="emailHelp"  value="{{ $data['Title'] }}">
      <small id="emailHelp" class="form-text text-muted">Please Provide A New Product.</small>
    </div>
    {{-- <span>
      @error('Product_name')
      {{$message}}
 @enderror
    </span> --}}
    <div class="form-group">
      <label for="Product_description">Product Description</label>
      <input type="text" name="Product_description" class="form-control" id="Product_description"  value="{{$data['Description']}}">
      <small id="emailHelp" class="form-text text-muted">Please Provide A New Category slug.</small>
    </div>
    <div class="form-group">
      <label for="Product_description">old image</label>
      <td><img height="100" width="50" src="/productimage/{{$data['image']}}" alt=""></td>
    </div>
    <div class="form-group">
      <label for="Product_image">Product Image</label>
      <input type="file" name="Product_image" class="form-control" id="Product_image" placeholder="Product_image">
      <small id="emailHelp" class="form-text text-muted">Please Provide A New Category slug.</small>
    </div>
    <div class="form-group">
      <label for="Product_category" name="Product_category" >Product Category</label>
      <select name="Product_category">
        @foreach ($cat as $category )

        <option value="{{$category->Category_name}}">{{$category->Category_name}}</option>
        
            
        @endforeach
      </select>
    </div>
  
    <div class="form-group">
      <label for="Product_quantity">Product Quantity</label>
      <input type="number" name="Product_quantity" class="form-control" min="0" id="Product_quantity"  value="{{$data['quantity']}}">
      <small id="emailHelp" class="form-text text-muted">Please Provide A New Category slug.</small>
    </div>
    <div class="form-group">
      <label for="Product_price">Product Price</label>
      <input type="number" name="Product_price" class="form-control" id="Product_price" value="{{$data['price']}}">
      <small id="emailHelp" class="form-text text-muted">Please Provide A New Category slug.</small>
    </div>
    <div class="form-group">
      <label for="Discount_price">Discount Price</label>
      <input type="number" name="Discount_price" class="form-control" id="Discount_price" placeholder="Discount_price">
      <small id="emailHelp" class="form-text text-muted">Please Provide A New Category slug.</small>
    </div>
    <div class="visible">
    <button type="submit" class=" btn btn-primary btn-lg btn-block">Submit</button>
  </div>
  </form>
</div>  


@endsection