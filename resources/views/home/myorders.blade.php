<!DOCTYPE html>
<html>
   <head>
    <base href="/public">
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>www.Ecommerce.com</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->

         
         
         <div class="body6">
            {{-- @foreach ($orders as $order) --}}
            
            <div class="card6 mt6-50 mb6-50">
                <div class="col d-flex"><span class="text-muted" id="orderno">order #546924</span></div>
                <div class="gap">
                    <div class="col-2 d-flex mx-auto"> </div>
                </div>
                <div class="title mx-auto"> Thank you for your order! </div>
                <div class="main"> <span id="sub-title">
                        <p><b>Payment Summary</b></p>
                    </span>
                    <div class="row row-main" style="padding: 2px">
                        <?php $subprice=0; $totalprice=0; $vat=0?>
                        @foreach ($order as $order)
                        <div class="col-3"> <img class="img-fluid" src="productimage/{{$order->image}}" > </div>
                        <div class="col-6">
                            <div class="row d-flex">
                                <p><b>{{$order->productName}}</b></p>
                            </div>
                            <div class="row d-flex">
                                <p class="text-muted">{{$order->productName}}</p>
                            </div>
                        </div>
                        <div class="col-3 d-flex justify-content-end">
                            <p><b>{{$order->price}} &#2547;</b></p>
                        </div>
                        <?php $subprice= $subprice + $order->price ?>
                        <?php $vat= ($subprice/100)*7 ?>
                        
                        
                        <?php $totalprice= $subprice + 100 + $vat ?>
                        @endforeach
                    </div>
                  
                    <hr>
                    <div class="total">
                        <div class="row">
                            <div class="col"> <b> Total:</b> </div>
                            <div class="col d-flex justify-content-end"><p class="text-muted">(with 7% additional vat)</p> <b> {{$subprice}}&#2547;</b></div>
                        </div> <button class="btn6 d-flex mx-auto"> Track your order </button>
                    </div>
                </div>
            </div>
            

         </div>
         
      </div>
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="{{asset('home/js/jquery-3.4.1.min.js')}}"></script>
      <!-- popper js -->
      <script src="{{asset('home/js/popper.min.js')}}"></script>
      <!-- bootstrap js -->
      <script src="{{asset('home/js/bootstrap.js')}}"></script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
   </body>
</html>