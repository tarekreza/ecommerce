<!DOCTYPE html>
<html lang="en">
<head>
  <link href="{{asset('home/css/cartpage.css')}}" rel="stylesheet" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <header id="site-header">
    <div class="container" style="display: flex">
      <h1>{{$name->name}} 's<span> Shopping Cart</span>  <span class="last-span is-open"></span></h1>
      <a class="btn" style="margin: 20px;display: flex;  margin-left: auto; text-align:center" href="{{route('myorder')}}">My Orders</a>
    </div>
  </header>

  @if(session()->has('message'))
          <div class="alert alert-success">
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
          {{session()->get('message')}}
          </div>
         @endif



  <div class="container">

    <?php $subprice=0; $totalprice=0; $vat=0?>
    @foreach ($cart as $cart)
     
    <section id="cart"> 
        
      

      <article class="product">
        <header>
          <a class="remove">
            <img src="productimage/{{$cart->image}}" alt="">

            <form action="" method="post">
              @csrf
              @method('Delete')
              <a href="{{ route('deletecart', ['id' => $cart->id]) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this')"><h3>Remove</h3></a>
          </form> 

           
          </a>
        </header>

        <div class="content">

          <h1>{{$cart->productName}}</h1>

          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, numquam quis perspiciatis ea ad omnis provident laborum dolore in atque.

          <div title="You have selected this product to be shipped in the color yellow." style="top: 0" class="color yellow"></div>
          <div style="top: 43px" class="type small">XXL</div>
        </div>

        <footer class="content">
          
          <span class="qt">Quantity : {{$cart->quantity}} </span>
          

          <h2 class="full-price">
            {{$cart->price}} &#2547;
          </h2>

          <h2 class="price">
            {{$cart->price}} &#2547;
          </h2>
        </footer>
      </article>

    </section>
    <?php $subprice= $subprice + $cart->price ?>
    <?php $vat= ($subprice/100)*7 ?>


    <?php $totalprice= $subprice + 100 + $vat ?>

    @endforeach
  </div>

   <footer id="site-footer">
    <div class="container clearfix">

      <div class="left">
        <h2 class="subtotal">Subtotal: <span>{{$subprice}} &#2547; </span></h2>
        <h3 class="tax">Taxes (7%): <span>{{ $vat}}</span>&#2547;</h3>
        <h3 class="shipping">Shipping: <span>100.00 &#2547;</span></h3>
      </div>

      <div class="right">
        <h1 class="total">Total: <span> {{$totalprice}} </span>&#2547;</h1>
        <a class="btn" style="margin: 10px" href="{{route('routeCash')}}">Cash On Delivery</a>
        <a class="btn" style="margin: 10px" href="{{route('stripe',$totalprice)}}">Card Peyment</a>
      </div>
      

    </div>
  </footer>
  <script src="{{asset('home/js/cartpage.js')}}"></script>
</body>
</html>
