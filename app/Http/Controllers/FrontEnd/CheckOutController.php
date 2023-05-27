<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    public function index()
    {
        $cartitems_v1=Cart::where('user_id',Auth::id())->get();
        foreach($cartitems_v1 as $item){
            if(!Product::where('id',$item->prod_id)->where('qte','>=',$item->prod_qte)->exists()){
                $removeItem=Cart::where('user_id',Auth::id())->where('prod_id',$item->prod_id)->first();
                $removeItem->delete();
            }
        }
        $cartitems=Cart::where('user_id',Auth::id())->get();
        return view('frontEnd.checkout',compact('cartitems'));
    }

    public function placeOrder(Request $request)
    {
        $order=new Order();
        $order->userId=Auth::id();
        $order->total_price=$request->input('name');
        $order->name=$request->input('name');
        $order->lname=$request->input('lname');
        $order->email=$request->input('email');
        $order->phone=$request->input('phone');
        $order->adress1=$request->input('adress1');
        $order->adress2=$request->input('adress2');
        $order->city=$request->input('city');
        $order->country=$request->input('country');
        $order->tracking_no='ecom'.rand(111,9999);
        $order->save();

        $order->id;

        $cartitems=Cart::where('user_id',Auth::id())->get();
        foreach($cartitems as $item){
            OrderItem::create(
                ['order_id'=>$order->id,
                'prod_id'=>$item->prod_id,
                'qte'=>$item->prod_qte,
                'prix'=>$item->products->prix_vente]
            );
        }

        $prod=Product::where('id',$item->prod_id)->first();
        $prod->qte=$prod->qte - $item->prod_qte;
        $prod->update();

        if(Auth::user()->adresse1==NULL){
            $user=User::where('id',Auth::id())->first();
            $user->name=$request->input('name');
            $user->lname=$request->input('lname');
            $user->email=$request->input('email');
            $user->phone=$request->input('phone');
            $user->adress1=$request->input('adress1');
            $user->adress2=$request->input('adress2');
            $user->city=$request->input('city');
            $user->country=$request->input('country');
            $user->update();

        }

        $cartitems=Cart::where('user_id',Auth::id())->get();
        Cart::destroy($cartitems);
        return redirect('/')->with('status','Commande passée');
    }
}
