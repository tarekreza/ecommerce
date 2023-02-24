@extends('admin.layout')
@section('title', 'Category')
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
                    <h2 class="title-1 font-weight-bold">Manage Category</h2>
                    <button>
                        <a href="{{ route('managecat') }}" class="btn btn-outline-primary"><i class="zmdi zmdi-plus"></i>Add
                            Category</button></a>
                </div>
                <br>
                <br>
                {{-- table --}}
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Category Slug</th>
                            <th class="text-center" colspan="2" scope="col" >Operation</th>
                            {{-- <th scope="col">Update</th> --}}
                        </tr>
                    </thead>
                    @foreach ($data as $category)
                        <tbody>
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->Category_name }}</td>
                                <td>{{ $category->Category_slug }}</td>
                                <td>
                                    <form action="" method="post">
                                        @csrf
                                        @method('Delete')
                                        <a href="{{ route('deletecategory', ['id' => $category->id]) }}"
                                            class="btn btn-outline-danger btn-sm"
                                            onclick="return confirm('Are you sure? you want to delete this category')">Delete</a>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ route('updateCategoryForm', ['id' => $category->id]) }}"
                                        class="btn btn-outline-secondary btn-sm"
                                        onclick="return confirm('Are you sure? you want to update this category')">Update</a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
                {{-- table --}}
            </div>
        </div>
    </div>
@endsection
