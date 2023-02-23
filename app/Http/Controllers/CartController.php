<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;

class CartController extends Controller
{
    
    public function addCart(Request $request ,$id)
    {
        if (Auth::id())
        {
            $user=Auth::user();
            $product=product::find($id);
            $cart=new cart;

            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->productName=$product->Title;
            
            $cart->quantity=$request->quantity;
            $cart->price=$product->price * $request->quantity ;
            $cart->image=$product->image;
            $cart->productId=$product->id;
            $cart->userId=$user->id;

            $cart->save();
            return redirect()->back();
        }
        else
        {
            return redirect('login');
        }
    }

    public function showCart()
    {
        $id=Auth::user()->id;
        $name=user::find($id);
        $cart=cart::where('userId','=',$id)->get();
        return view('home.showCart', compact('cart','name'));
    }

    public function deletecart($id)
    {
        $data=cart::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Product Deleted');
    }

    public function routeCash()
    {
        $id=Auth::user()->id;
        $name=user::find($id);
        $cart=cart::where('userId','=',$id)->get();
       

        foreach($cart as $data)
        {
            $order=new order();
            $order->name=$data->name;
            $order->email=$data->email;
            $order->productName=$data->productName;
            
            $order->quantity=$data->quantity;
            $order->price=$data->price ;
            $order->image=$data->image;
            $order->productId=$data->id;
            $order->userId=$data->id;
            $order->peymentStatus='cash on delivery';
            $order->deliveryStatus= 'processing';

            $order->save();

            $cartID=$data->id;
            $cart=cart::find($cartID);
            $cart->delete();
            
        }
        return redirect()->back()->with('message','We have revevied your order.We will notify you soon...');
    }

    public function stripe($totalprice)
    {
        return view('home.stripe',compact('totalprice'));
    }

    public function stripePost(Request $request, $totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "bdt",
                "source" => $request->stripeToken,
                "description" => "Thank You for payment" 
        ]);

        $id=Auth::user()->id;
        $name=user::find($id);
        $cart=cart::where('userId','=',$id)->get();
       

        foreach($cart as $data)
        {
            $order=new order();
            $order->name=$data->name;
            $order->email=$data->email;
            $order->productName=$data->productName;
            
            $order->quantity=$data->quantity;
            $order->price=$data->price ;
            $order->image=$data->image;
            $order->productId=$data->id;
            $order->userId=$data->id;
            $order->peymentStatus='Paid';
            $order->deliveryStatus= 'processing';

            $order->save();

            $cartID=$data->id;
            $cart=cart::find($cartID);
            $cart->delete();
            
        }
      
        Session::flash('success', 'Payment successful!');
              
        return back();
    }

    public function myorder()
    {
        
        $email=Auth::user()->email;
        $name=user::find($email);
        $order=order::where('email','=',$email)->get();
        
        return view('home.myorders', compact('order','name'));
        
    }

}
