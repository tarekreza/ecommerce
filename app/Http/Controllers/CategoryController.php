<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data=Category::all();
        return view('admin.category', compact('data'));
    }
    public function managecat()
    {
        return view('admin.managecat');
    }
    public function categoryProcess(Request $request)
    {
        
        $request->validate([
            'Category_name'=>'required|unique:categories',
            'Category_slug'=>'required|unique:categories'
        ]);

        $Category=new Category();
        $Category->Category_name=$request->Category_name;
        $Category->Category_slug=$request->Category_slug;
        $Category->save();
        return redirect('admin/category')->with('message', 'Category Added Successfully');

        

    }

    public function deletecategory($id)
    {
        $data=category::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Category deleted successfully');
    }
    public function updateCategoryForm($id)
    {
        $data=Category::find($id);
        return view('admin.updateCategoryForm',compact('data'));
    }

    public function categoryUpdate(Request $request,$id)
    {
        $Category=Category::find($id);
        
        $request->validate([
            'Category_name'=>'required|unique:categories',
            'Category_slug'=>'required|unique:categories'
        ]);
       
        $Category->Category_name=$request->Category_name;
        $Category->Category_slug=$request->Category_slug;
        

        $Category->save();
        return redirect('admin/category')->with('message', 'Category updated successfully');
    }


}
