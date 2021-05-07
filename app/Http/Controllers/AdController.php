<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdController extends Controller
{
    public function index() {

        if(isset(Auth::user()->id)) {
            $ads = Ad::where('user_id', '!=', Auth::user()->id)->get();

            if(isset(request()->category)) {
                $cat = Category::where('name', request()->category)->first();
                $ads = Ad::with('category')->where('category_id', $cat->id)->where('user_id', '!=', Auth::user()->id)->get();
               
                // $ads = Ad::where('category_id', $cat->id)->get();
                // $ads = Ad::whereHas('category', function ($query) {
                //     //    $query->where('name', request()->cat);
                //           $query->whereName(request()->cat);
                //    })->get();   
            }
    
    
        } else {

            if(isset(request()->category)) {
                $cat = Category::where('name', request()->category)->first();
                $ads = Ad::with('category')->where('category_id', $cat->id)->get();
               
                // $ads = Ad::where('category_id', $cat->id)->get();
                // $ads = Ad::whereHas('category', function ($query) {
                //     //    $query->where('name', request()->cat);
                //           $query->whereName(request()->cat);
                //    })->get();   
            } else {
                
                $ads = Ad::all();
            }
        } 



        


        $categories = Category::all();
        
        

        return view('welcome', compact('categories', 'ads'));
    }

    public function showAdForm() {
        $categories = Category::all();

        return view('showAdForm', compact('categories'));
    }

    public function createAd(Request $request) {

        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'price' => 'required',
            'image1' => 'mimes:jpeg,jpg,png',
            'image2' => 'mimes:jpeg,jpg,png',
            'image3' => 'mimes:jpeg,jpg,png',
            'category' => 'required'
        ]);

        if($request->hasFile('image1')) {
            $image1 = $request->file('image1');
            $image1_name = time().'1.'.$image1->extension();
            $image1->move(public_path('ad_images'), $image1_name);
        }

        if($request->hasFile('image2')) {
            $image2 = $request->file('image2');
            $image2_name = time().'2.'.$image2->extension();
            $image2->move(public_path('ad_images'), $image2_name);
        }

        if($request->hasFile('image3')) {
            $image3 = $request->file('image3');
            $image3_name = time().'3.'.$image3->extension();
            $image3->move(public_path('ad_images'), $image3_name);
        }


        
        Ad::create([
            'title' => $request->title,
            'body' => $request->body,
            'price' => $request->price,
            'image1' => (isset($image1_name) ? $image1_name : null),
            'image2' => (isset($image2_name) ? $image2_name : null),
            'image3' => (isset($image3_name) ? $image3_name : null),
            'user_id' => Auth::user()->id,
            'category_id' => $request->category
            ]);


        return redirect('/');
    }

    public function singleAd($id) {
        $ad = Ad::find($id);

        if(Auth::check() && Auth::user()->id !== $ad->user_id) {
            $ad->increment('views');
        }

        return view('singleAd', compact('ad'));
    }
}
