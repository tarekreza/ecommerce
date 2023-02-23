@extends('admin.layout')
@section('title','Mail')
@section('container')

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
<body>
<div class="mb10">
  <span><h1 style="text-align: center; font-size:25px;">Mail To : {{$order->email}}</h1></span>

<hr>
<br>

<div class="container">
  <form action="{{route('sendmail',$order->id)}}" method="post">
    @csrf
    <label for="fname">Email Greeting</label>
    <input type="text" id="fname" name="greeting" placeholder="Email Greeting..">
    <label for="fname">Email Firstling</label>
    <input type="text" id="fname" name="firstling" placeholder="Email Firstling..">
    <label for="subject">Email Body</label>
    <textarea id="subject" name="body" placeholder="Write something.." style="height:200px"></textarea>
    <label for="fname">Email Button</label>
    <input type="text" id="fname" name="button" placeholder="Email Button..">
    <label for="fname">Email URL</label>
    <input type="text" id="fname" name="url" placeholder="Email URL..">
    <label for="fname">Email Lasting</label>
    <input type="text" id="fname" name="lasting" placeholder="Email Lasting..">

  
    <input type="submit" value="Send Email">
  </form>
</div>
</div>
</body>
</html>


@endsection