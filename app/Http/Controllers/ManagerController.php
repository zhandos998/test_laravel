<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOption\None;

class ManagerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:project-manager');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('manager.home');
    }
    
    public function products($id=null)
    {
        $products = DB::table('products')->paginate(10);
        return view('manager.products',['products'=>$products]);
    } 
    public function add_product(Request $request)
    {
        if ($request->isMethod('post')){
            // dd($request->image);
            // $request->image = $request->file('image');
            $fileNameToStore = "/products/product_".((DB::select('select max(id) as max from products')[0]->max)+1).".".$request->image->extension();
            $request->image->storeAs('public/', $fileNameToStore);

            $product=new Product();
            $product->title=$request->title;
            $product->price=$request->price;
            $product->description=$request->description;
            $product->count=$request->count;
            $product->brand=$request->brand;
            $product->image='storage'.$fileNameToStore;
            $product->save();
            return redirect("/manager/products");
        }
        return view('manager.add_product');
    }

    public function change_product(Request $request,$id)
    {
        if ($request->isMethod('post')){
            if ($request->image)
            {
                $fileNameToStore = "/products/product_".$id.".".$request->image->extension();
                $request->image->storeAs('public/', $fileNameToStore);
            }

            DB::table('products')
            ->where('id',$id)
            ->update(array('title' => $request->title,'price' => $request->price,'description' => bcrypt($request->description)));

            $user_role = DB::table('users_roles')
            ->where('user_id',$id);

            if($request->role==1)
                $user_role->update(array('role_id' => 1));
            if($request->role==2)
                $user_role->update(array('role_id' => 2));
            return redirect("/manager/products");
        }
        $product = DB::table('products')
        ->where('id',$id)
        ->first();
        return view('manager.change_product',['product'=>$product]);
    }

    public function delete_product($id)
    {
        $user = DB::table('products')
        ->where('id',$id)
        ->delete();
        return redirect("/manager/products");
    }

    public function orders($id=null)
    {
        $orders = DB::table('orders')->paginate(10);
        return view('manager.orders',['orders'=>$orders]);
    } 
    
}
