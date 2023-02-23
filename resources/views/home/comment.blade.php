<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js" integrity="sha512-CX7sDOp7UTAq+i1FYIlf9Uo27x4os+kGeoT7rgwvY+4dmjqV0IuE/Bl5hVsjnQPQiTOhAX1O2r2j5bjsFBvv/A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>

    <div style="text-align:center; padding-bottom:20px;">
        <h1 style="font-size: 30px; text-align:center; padding-top:20px;padding-bottom:20px;">Review</h1>

        <form action="{{route('addComment')}}" method="post">
            @csrf
        <textarea style="height:50px; width:600px" placeholder="Put Your Comment HEre.." name="comment"></textarea>
        <br>
        <input type="submit" class="btn btn-primary" value="comment">
    </form>

    </div>
    



    <div style="padding-left:20% ">
        <h1 style="font-size: 20px;  padding-top:20px;padding-bottom:20px;">All Comments</h1>
    
    @foreach ($comment as $comment)
        
   
    <div>
        <b>{{$comment->name}}</b>
        <p>{{$comment->comment}}</p>
        <a href="javascript::void(0);" onclick="showDiv()"data-CommentId="{{$comment->id}}">Reply</a>
    </div>

    <form action="{{route('addReply')}}" method="post">
        @csrf

    <div style="display: none" class="replyDiv" id="welcomeDiv" >
        <input type="text" id="commentId" name="commenrId" hidden="">
        <textarea style="height:50px; width:300px" placeholder="Put Your Comment HEre.."name="reply">Reply</textarea>
        <br>
        <input type="submit" class="btn btn-primary" value="Reply">
    </div>
</form>
    @endforeach
    <br>

    </div>


   
</body>
<script type="text/javascript">
    function showDiv() {
        document.getElementById('commentId')
        // $('.showDiv').insertAfter($(this)); is not working
   document.getElementById('welcomeDiv').style.display = "block";
}


    </script>
</html>