<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Reply;
use App\Models\Comment;
use App\Models\order;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function ourproducts()
    {
        $product=Product::all();
        return view('home.products',compact('product'));
    }
    public function blog()
    {
        
        return view('home.blog');
    }
    public function contact()
    {
        
        return view('home.contact');
    }
    public function index()
    {
        $product=Product::paginate(3);
        $comment=Comment::all();
        $review= testimonial::all();
         return view('home.userpage',compact('review','product','comment'));
    }
    public function redirect()
    {

        $usertype=Auth::user()->usertype;
        if ($usertype=='1')
        {
            $totalProduct=Product::all()->count();
            $totalUser=user::all()->count();
            $totalOrder=order::all()->count();

            $order=order::all();
            $totalEarning=0;
            foreach($order as $order)
            {
                $totalEarning= $totalEarning + $order->price;
            }

            $delivery= order::where('deliveryStatus','=','Delivered')->get()->count();
            $processing= order::where('deliveryStatus','=','processing')->get()->count();
            
            return view('admin.dash',compact('totalProduct','totalUser','totalOrder','totalEarning','delivery','processing'));
        } 
           else
        {
            
            $product=Product::paginate(3);
            $review= testimonial::all();
            $comment=Comment::all();

            return view('home.userpage',compact('review','product','comment'));

            //for testimonial section
            
        }
        
    }

    public function review(Request $request)
    {
        if (Auth::id())
        {
            $testimonial= new testimonial();
            $testimonial->name=Auth::User()->name;
            $testimonial->review=$request->review;
            $testimonial->save();
            return redirect()->back();

        } 
        else {
            return redirect('login');
        }
        
    }

    public function addComment(Request $request)
    {
        if (Auth::id())
        {
            $comment= new comment();
            $comment->name=Auth::User()->name;
            $comment->userId=Auth::User()->id;
            $comment->comment=$request->comment;
            $comment->save();
            return redirect()->back();

        } 
        else {
            return redirect('login');
        }
        
    }
    public function addReply(Request $request)
    {
        if (Auth::id())
        {
            $reply= new Reply();
            $reply->name=Auth::User()->name;
            $reply->userId=Auth::User()->id;
            $reply->CommentId=$request->commentId;
            $reply->reply=$request->reply;
            $reply->save();
            return redirect()->back();

        } 
        else {
            return redirect('login');
        }
        
    }


}
