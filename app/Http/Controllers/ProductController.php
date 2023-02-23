<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function addproduct()
    {
       $cat=Category::all(); 
       return view('admin.addproduct',compact('cat'));
    }

    public function productProcess(Request $request)
    {
        
   

        $product=new Product();
        $product->Title=$request->Product_name;
        $product->Description=$request->Product_description;
        // $product->image=$request->Product_image;

        $image=$request->Product_image;
        if ($image) {
        $image=$request->Product_image;
        $imagename=time().'.'. $image->getClientOriginalExtension();
        $request->Product_image->move('productimage',$imagename);
        $product->image= $imagename;
        }



        $product->category=$request->Product_category;
        $product->quantity=$request->Product_quantity;
        $product->price=$request->Product_price;
        // $product->discount=$request->Discount_price;
        
      

        $product->save();
        return redirect('admin/allproduct')->with('message', 'Product Added Successfully');

    }

    public function allproduct()
    {
        $data=product::all();
        return view('admin.allproduct', compact('data'));
    }
    public function deleteproduct($id)
    {
        $data=product::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Product Deleted');
    }
    public function updateProductForm($id)
    {
        $cat=Category::all();
        $data=product::find($id);
        return view('admin.updateProductForm',compact('data','cat'));
    }

    public function productEdit(Request $request, $id)
    {
        $product=Product::find($request->id);
        $product->Title=$request->Product_name;
        $product->Description=$request->Product_description;

        $image=$request->Product_image;
        if ($image) {
        $image=$request->Product_image;
        $imagename=time().'.'. $image->getClientOriginalExtension();
        $request->Product_image->move('productimage',$imagename);
        $product->image= $imagename;
        }



        $product->category=$request->Product_category;
        $product->quantity=$request->Product_quantity;
        $product->price=$request->Product_price;

        $product->save();
        return redirect('admin/allproduct')->with('messageSuc', 'Product Updated Successfully');

    }

    public function productDetails($id)
    {
        $product=product::find($id);
        $comment=Comment::all();
        return view('home.productDetails', compact('product','comment'));
    }
    public function search(Request $request)
    {
        
        
        $search=$request->search;
        $product =product::where('title','Like','%'.$search.'%')->orWhere('description','Like','%'.$search.'%')->get();

       
     return view('home.search',compact('product'));
    }
    
}
