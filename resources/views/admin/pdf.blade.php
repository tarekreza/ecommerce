<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
  margin: 2em;
  color: #fff;
  background-color: #000;
}

/* override styles when printing */
@media print {

  body {
    margin: 0;
    color: #000;
    background-color: #fff;
  }

}
    </style>
</head>
<body>
   <h1><strong>Order Details</strong></h1>
   <hr>
   <div ><h3>
    Customer Name    : {{$order->name}}
    Customer Email   : {{$order->email}}
    Product Name     : {{$order->productNamr}}
    Product Price    : {{$order->price}} take
    Product Quantity : {{$order->quantity}}
    Payment          : {{$order->peymentStatus}}
    Delivery         : {{$order->deliveryStatus}}
    Image            :
    <br>
    <img height="200" width="450" src="/productimage/{{$order->image}}" alt="">
</h3></div>

    
</body>
</html>