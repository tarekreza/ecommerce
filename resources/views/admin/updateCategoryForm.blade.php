@extends('admin.layout')
@section('title', 'Update Category')
@section('container')
    <div class="main-content">
        <div class="section__content section__content--p20">
            <div class="container-fluid">
                @error('Category_name')
                    <div class="sufee-alert alert with-close alert-warning alert-dismissible fade show">
                        <span class="badge badge-pill badge-warning">Warning</span>
                        {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @enderror
                @error('Category_slug')
                    <div class="sufee-alert alert with-close alert-warning alert-dismissible fade show">
                        <span class="badge badge-pill badge-warning">Warning</span>
                        {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @enderror
                <div class="overview-wrap">
                    <h2 class="title-1 font-weight-bold">Update Category</h2>
                    <button>
                        <a href="{{ route('category') }}" class="btn btn-outline-primary">
                            <-Back </a>
                    </button>
                </div>
                <br>


                <div>
                    {{-- form --}}
                    <form action="{{ route('category-update', $data->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="Category-name">Category Name</label>
                            <input type="text" name="Category_name" class="form-control" id="Category-name"
                                aria-describedby="emailHelp" value="{{ $data->Category_name }}">
                            <small id="emailHelp" class="form-text text-muted">Please provide a new category.</small>
                        </div>
                        <div class="form-group">
                            <label for="Category_slug">Category Slug</label>
                            <input type="text" name="Category_slug" class="form-control" id="Category_slug"
                                value="{{ $data->Category_slug }}">
                            <small id="emailHelp" class="form-text text-muted">Please provide a new category slug.</small>

                        </div>

                        <button type="submit" class="btn btn-outline-success btn-lg btn-block">Submit</button>
                    </form>
                    {{-- form --}}
                </div>
            </div>
        </div>
    </div>
@endsection
