<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function products($id)
    {
        if ($id)
        {
            $product = DB::table('products')->where('id',$id);
            return view('product',['product'=>$product]);
        }
        $products = DB::table('products')->paginate(10);
        return view('products',['products'=>$products]);
    }
}
