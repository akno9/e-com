<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $featured_products=Product::where('populaire','1')->take(15)->get();
        $categories=Category::all();
        return view('frontEnd.index',compact('featured_products','categories'));
    }

    public function view_cat($id)
    {
        if(Category::where('id',$id)->exists()){
            $category=Category::where('id',$id)->first();
            $products=Product::where('cate_id',$id)->where('statut','0')->get();
            return view('frontEnd.category',compact('category','products'));
        }
        else{
            return redirect('/')->with('status','Catégorie non disponible');
        }
    }

    public function view_prod($id)
    {
        if(Product::where('id',$id)->exists()){
            $product=Product::where('id',$id)->first();
            return view('frontEnd.product',compact('product'));
        }
        else{
            return redirect('/')->with('status','Produit non disponible');
        }
    }

    public function placeOrder(Request $request)
    {
        # code...
    }
}
