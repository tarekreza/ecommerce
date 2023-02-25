@extends('admin.layout')
@section('title', 'Add product')
@section('container')
    <div class="main-content">
        <div class="section__content section__content--p20">
            <div class="container-fluid">

              <div class="overview-wrap">
                <h2 class="title-1 font-weight-bold">Add Product</h2>
                <button>
                    <a href="{{ route('allproduct') }}" class="btn btn-outline-primary">
                        <-Back </a>
                </button>
            </div>
                <br>
                {{-- form --}}
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        {{ session()->get('message') }}
                    </div>
                @endif

                <div>

                    {{-- @if ($errors)

  @foreach ($errors->all() as $err)
  <li style="color: red">
    {{$err}}
  </li>
    
  @endforeach
    
  @endif --}}
                    <form action="{{ route('productProcess') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="Product_name">Product Name</label>
                            <input type="text" name="Product_name" class="form-control" id="Product_name"
                                aria-describedby="emailHelp" placeholder="Product_name" required>
                            <small id="emailHelp" class="form-text text-muted">Please Provide A New Product.</small>
                        </div>
                        {{-- <span>
      @error('Product_name')
      {{$message}}
 @enderror
    </span> --}}
                        <div class="form-group">
                            <label for="Product_description">Product Description</label>
                            <input type="text" name="Product_description" class="form-control" id="Product_description" placeholder="Product description" required>
                            <small id="emailHelp" class="form-text text-muted">Please Provide Product description.</small>
                        </div>
                        <div class="form-group">
                            <label for="Product_image">Product Image</label>
                            <input type="file" name="Product image" class="form-control" id="Product_image"
                                placeholder="Product_image" required>
                            <small id="emailHelp" class="form-text text-muted">Please Provide Product Image.</small>
                        </div>
                        <div class="form-group">
                            <label for="Product_category" name="Product_category">Product Category</label>
                            <select name="Product_category">
                                @foreach ($cat as $category)
                                    <option value="{{ $category->Category_name }}">{{ $category->Category_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="Product_quantity">Product Quantity</label>
                            <input type="number" name="Product_quantity" class="form-control" min="0"
                                id="Product_quantity" placeholder="Product quantity" required>
                            <small id="emailHelp" class="form-text text-muted">Please Provide Product Quantity. </small>
                        </div>
                        <div class="form-group">
                            <label for="Product_price">Product Price</label>
                            <input type="number" name="Product_price" class="form-control" id="Product_price"
                                placeholder="Product price" required>
                            <small id="emailHelp" class="form-text text-muted">Please Provide Product Price. </small>
                        </div>
                        <div class="form-group">
                            <label for="Discount_price">Discount Price</label>
                            <input type="number" name="Discount_price" class="form-control" id="Discount_price"
                                placeholder="Discount price">
                            <small id="emailHelp" class="form-text text-muted">Please Provide Discount Price.</small>
                        </div>
                        <div class="visible">
                            <button type="submit" class="btn btn-outline-success btn-lg btn-block">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
