<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpOption\None;
use App\Models\User;

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
        if (Auth::user() && Auth::user()->hasRole("project-manager"))
        {
            return redirect("/manager");
        }
        return view('user.home');
    }

    public function products_view($id=null)
    {
        if ($id != null)
        {
            $product = DB::table('products')->where('id',$id)->first();
            return view('user.product',['product'=>$product]);
        }
        $products = DB::table('products')->paginate(10);
        return view('user.products',['products'=>$products]);
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
        return view("user.basket",["basket"=>$basket]);
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
        $order = new Order();
        $order->first_name = $request->first_name;
        $order->last_name = $request->last_name;
        $order->phone_number = $request->phone_number;
        $basket = DB::table('products')
        ->whereIn('id', $session)
        ->get();
        $s=array();
        $product_name=array();
        foreach ($basket as $product) {
            array_push($product_name, $product->title);
            array_push($s, $product->price);
        }
        $order->product_name =json_encode($product_name);
        $order->price = json_encode($s);
        $order->save();
        return redirect("/");
    }
    
    
}
