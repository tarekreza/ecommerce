<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $inc = null;
        $slug = Str::slug($request->name, '-');

        do{

            $slug = $inc != null ?  Str::slug($request->name, '-').'_'.$inc : $slug;
            $exists  = Category::where('slug', $slug)->exists();

            if($inc == null) {
                $inc = 1;
            } else {
                $inc++;
            }

        } while($exists);

        $data = [
            'name' => $request->name,
            'slug' => $slug,
        ];
        // dd($data);
        Category::create($data);

        return redirect()->route('adminCategory');
    }
}
