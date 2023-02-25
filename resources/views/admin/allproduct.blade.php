@extends('admin.layout')
@section('title', 'All product')
@section('container')
    <div class="main-content">
        <div class="section__content section__content--p20">
            <div class="container-fluid">
                @if (session()->has('message'))
                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success">Success</span>
                        {{ session()->get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
                <div class="overview-wrap">
                    <h2 class="title-1 font-weight-bold">Manage Products</h2>
                    <button>
                        <a href="{{ route('addproduct') }}" class="btn btn-outline-primary"><i
                                class="zmdi zmdi-plus"></i>Add
                            Product</button></a>
                </div>
                <br>
                <br>
                <div class="table-responsive">
                    {{-- table --}}
                    <table class="table table-borderless table-striped table-earning">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Category</th>
                                <th scope="col">Image</th>
                                <th class="text-center" colspan="2" scope="col">Operation</th>
                            </tr>
                        </thead>
                        @foreach ($data as $product)
                            <tbody>
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ Str::limit($product->Title, 15, '...') }}</td>
                                    <td>{{ Str::limit($product->Description, 20, '...') }}</td>
                                    <td>$ {{ $product->price }}</td>
                                    <td>{{ $product->category }}</td>
                                    <td><img height="100" width="50" src="/productimage/{{ $product->image }}"
                                            alt=""></td>
                                    <td>
                                        <a href="{{ route('deleteproduct', ['id' => $product->id]) }}"
                                            class="btn btn-outline-danger btn-sm mr-2"
                                            onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>

                                        <a href="{{ route('updateProductForm', $product->id) }}"
                                            class="btn btn-outline-secondary btn-sm"
                                            onclick="return confirm('Are you sure you want to Change this product?')">Update</a>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                    {{-- table --}}
                </div>
            </div>
        </div>
    </div>
@endsection
