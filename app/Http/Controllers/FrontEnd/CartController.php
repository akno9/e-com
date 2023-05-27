<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addProd(Request $request)
    {
        $prod_id=$request->input('prod_id');
        $prod_qty=$request->input('prod_qty');

        if(Auth::check()){
            $prod_check=Product::where('id',$prod_id)->first();
            if($prod_check){
                if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists()){
                    return response()->json(['status'=>"Ce produit est déjà dans votre panier"]);
                }
                else {
                    $cartItem=new Cart();
                    $cartItem->prod_id=$prod_id;
                    $cartItem->prod_qte=$prod_qty;
                    $cartItem->user_id=Auth::id();
                    $cartItem->save();
                    return response()->json(['status'=>" Produit ajouté au panier"]);
                }
            }
        }
        else{
            return response()->json(['status'=>"Authentifiez-vous pour continuer"]);
        }
    }

    public function view()
    {
        $cartitems=Cart::where('user_id',Auth::id())->get();
        return view('frontEnd.cart',compact('cartitems'));
    }

    public function deleteProd(Request $request)
    {
        $prod_id=$request->input('prod_id');
        if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists()){
            $cartItem=Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
            $cartItem->delete();
            return response()->json(['status'=>"Supprimé"]);
        }
    }
}
