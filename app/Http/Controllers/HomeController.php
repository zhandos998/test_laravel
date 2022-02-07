<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOption\None;

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
    public function products_view($id=null)
    {
        if ($id != null)
        {
            $product = DB::table('products')->where('id',$id)->first();
            return view('product',['product'=>$product]);
        }
        $products = DB::table('products')->paginate(10);
        return view('products',['products'=>$products]);
    }

    public function basket_add(Request $request)
    {   
        // dd($request);
        // $request->session()->forget('basket');
        if (!$request->id){
            return false;
        }
        $session = session('basket',[]);
        array_push($session, $request->id);
        session(['basket' => $session]);
        
        // return true;
        return session('basket',[]);
    }

    public function basket(Request $request,$id=null)
    {   
        $session = session('basket',[]);
        if ($id){
            array_push($session, $id);
            session(['basket' => $session]);
        }
        $basket = DB::table('products')
        ->whereIn('id', $session)
        ->get();
        // print_r($basket);
        return view("basket",["basket"=>$basket]);
    }

    public function delete_basket(Request $request)
    {   
        $session = session('basket',[]);
        if ($request->id){
            $session_1 = array();
            $session = session('basket',[]);
            for ($i=0; $i < count($session); $i++) { 
                if ($session[$i]!=$request->id)
                    array_push($session_1, $session[$i]);
            }
            session(['basket' => $session_1]);
            // return session('basket',[]);
            return true;
        }
        return false;
    }

    public function buy(Request $request)
    {   
        $session = session('basket',[]);
        if ($request->id){
            $session_1 = array();
            $session = session('basket',[]);
            for ($i=0; $i < count($session); $i++) { 
                if ($session[$i]!=$request->id)
                    array_push($session_1, $session[$i]);
            }
            session(['basket' => $session_1]);
            // return session('basket',[]);
            return true;
            session(['basket' => []]);
        }
        return false;
    }
    
    
}
