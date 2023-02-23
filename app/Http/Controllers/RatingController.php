<?php

namespace App\Http\Controllers;
use App\Models\rating;
use Session;

use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function rating()
    {
        Session::put('page','rating');
        $rating=rating::with(['user','product'])->get()->toArray();
        // dd($rating);
        return view('admin.rating')->with(compact('rating'));
    }

    public function approved($id)
    {
        
        $rating=rating::find($id);
        $rating->status=1;
        
        $rating->save();
        return redirect()->back();
    }
}
