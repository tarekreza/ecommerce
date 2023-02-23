@extends('admin.layout')
@section('title', 'Manage category')
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
                    <h2 class="title-1 font-weight-bold">Add Category</h2>
                    <button>
                        <a href="{{ route('category') }}" class="btn btn-outline-primary">
                            <-Back </a>
                    </button>

                </div>
                <br>

                <div class="">
                    {{-- form --}}
                    <form action="{{ route('category-process') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="Category-name">Category Name</label>
                            <input type="text" name="Category_name" class="form-control" id="Category-name"
                                aria-describedby="emailHelp" placeholder="Category Name" required>
                            <small id="emailHelp" class="form-text text-muted">Please Provide A New Category.</small>
                        </div>
                        <div class="form-group">
                            <label for="Category_slug">Category Slug</label>
                            <input type="text" name="Category_slug" class="form-control" id="Category_slug"
                                placeholder="Category slug" required>
                            <small id="emailHelp" class="form-text text-muted">Please Provide A New Category slug.</small>
                        </div>
                        <div class="visible">
                            <button type="submit" class=" btn btn-outline-success btn-lg btn-block">Submit</button>
                        </div>
                    </form>
                    {{-- form --}}
                </div>
            </div>
        </div>
    </div>

@endsection
