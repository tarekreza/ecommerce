<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Notifications\EmailSend;
use Illuminate\Http\Request;
use Notification;
 
use PDF;

class OrderController extends Controller
{
    public function order()
    {
        
        $data=order::all();
        return view('admin.order', compact('data'));
    }
    public function delevery($id)
    {
        
        $order=order::find($id);
        $order->deliveryStatus='Delivered';
        $order->peymentStatus='paid';
        $order->save();
        return redirect()->back();
    }
    // public function paid($id)
    // {
        
    //     $paid=order::find($id);
    //     $paid->peymentStatus='paid';
    //     $paid->save();
    //     return redirect()->back();
    // }
    public function pdf($id)
    {
        $order=order::find($id);
        $pdf=PDF::loadView('admin.pdf',compact('order'));
        return $pdf->download('orderDetails.pdf');
    }
    public function mail($id)
    {
        $order=order::find($id);
        return view('admin.mail',compact('order'));
    }
    public function sendmail(Request $request,$id)
    {
        $order=order::find($id);
        $details=[
            'greeting'=>$request->greeting,
            'firstling'=>$request->firstling,
            'body'=>$request->body,
            'button'=>$request->button,
            'url'=>$request->url,
            'lasting'=>$request->lasting

        ];
    //    Notification::send($order, new EmailSend($details));
    Notification::send($order, new EmailSend($details));
    }

   
    public function search(Request $request)
    {
        
        $search=$request->search;
        $data =order::where('name','Like','%'.$search.'%')->orWhere('productName','Like','%'.$search.'%')->get();

      
        return view('admin.order',compact('data'));
    }

    
}