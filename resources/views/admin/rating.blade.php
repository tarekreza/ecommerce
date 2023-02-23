<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rating</title>
</head>

<body>
    @extends('admin.layout')


    @section('container')
        <div style="padding-top: 50px; padding-buttom:3px">
            <h1 style="">ratingList</h1>
            <hr>

            <div style="padding-left: 400px;padding-top: 20px; padding-buttom:30px">
                <form action="" method="post">
                    @csrf
                    <input type="text" placeholder="Search.." name="search" id="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            @if (session()->has('message'))
                <div class="alert alert-danger">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    {{ session()->get('message') }}
                </div>
            @endif
            @if (session()->has('messageSuc'))
                <div class="alert alert-success">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    {{ session()->get('message') }}
                </div>
            @endif
            {{-- <a href="{{route('addproduct')}}"><button type="button" class="btn btn-primary">Add Product</button></a> --}}
            <br>
            <hr>
            {{-- table --}}
            <table class="table table-hover table-dark" style="padding: 0em">
                <thead>
                    <tr>

                        <th scope="col">ID</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">User Email</th>
                        <th scope="col">Review</th>
                        <th scope="col">Rating</th>
                        <th scope="col">Action</th>
                       


                    </tr>
                </thead>
                @forelse ($rating as $rating)
                    <tbody>
                        <tr>


                            <td>{{ $rating['id'] }}</td>
                            <td>{{ $rating['product']['Title']}}</td>
                            <td>{{ $rating['user']['email']}}</td>
                            <td>{{ $rating['comment']}}</td>
                            <td>{{ $rating['rating']}}</td>
                           

                           

                            <td>
                                @if ($rating['status'] == 0)
                                    <a href="{{ route('approved', $rating['id']) }}" class="btn btn-success"
                                        onclick="return confirm('Are you sure you want to Change this')">Approved</a>
                                @else
                                    <p style="color: greenyellow">Approved</p>
                                @endif
                            </td>

                           

                        </tr>

                    </tbody>
                @empty
                    <tr>
                        <td colspan="18" style="text-align: center;  ">

                            No Data Found
                        </td>
                    </tr>
                @endforelse

            </table>
            {{-- table --}}
        @endsection
</body>

</html>
