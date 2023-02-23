<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order</title>
</head>

<body>
    @extends('admin.layout')

    @section('container')
        <div style="padding-top: 50px; padding-buttom:3px">
            <h1 style="">OrderList</h1>
            <hr>

            <div style="padding-left: 400px;padding-top: 20px; padding-buttom:30px">
                <form action="{{ route('adminsearch') }}" method="post">
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

                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Payment Status</th>
                        <th scope="col">Delevery Status</th>
                        <th scope="col">Image</th>

                        <th scope="col">Delivered</th>
                        <th scope="col">Print Pdf</th>
                        <th scope="col">Send Mail</th>


                    </tr>
                </thead>
                @forelse ($data as $order)
                    <tbody>
                        <tr>


                            <td>{{ $order->name }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->productName }}</td>
                            <td>{{ $order->price }}</td>
                            <td @if ($order->peymentStatus == 'paid') style="color:  hsl(84, 100%, 59%)">{{ $order->peymentStatus }}
              @else
                <p style="color: blue">Cash on delivery</p> @endif
                                </td>
                            <td>{{ $order->deliveryStatus }}</td>

                            <td><img height="100" width="50" src="/productimage/{{ $order->image }}" alt="">
                            </td>

                            <td>
                                @if ($order->deliveryStatus == 'processing')
                                    <a href="{{ route('delevery', $order->id) }}" class="btn btn-success"
                                        onclick="return confirm('Are you sure you want to Change this')">Delivered</a>
                                @else
                                    <p style="color: greenyellow">Delivered</p>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('pdf', $order->id) }}" class="btn btn-primary"
                                    onclick="return confirm('Are you sure you want to Print this')">Print</a>
                            </td>
                            <td>
                                <a href="{{ route('mail', $order->id) }}" class="btn btn-info"
                                    onclick="return confirm('Are you sure you want to Print this')">Mail</a>
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
