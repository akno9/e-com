<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $product=Product::all();
        return view('admin.product.index',compact('product'));
    }

    public function add()
    {
        $category=Category::all();
        return view('admin.product.add',compact('category'));
    }

    public function insert(Request $request){
        $product =new Product();

        if($request->hasFile('image')){
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('assets/uploads/product/',$filename);
            $product ->image = $filename;
        }

        $product ->cate_id = $request->input('cate_id');
        $product ->nom = $request->input('nom');
        $product ->mini_desc = $request->input('mini_desc');
        $product ->description = $request->input('description');
        $product ->prix_orig = $request->input('prix_orig');
        $product ->prix_vente = $request->input('prix_vente');
        $product ->qte = $request->input('qte');
        $product ->taxe = $request->input('taxe');
        $product ->statut = $request->input('statut')==TRUE?'1':'0';
        $product ->populaire = $request->input('populaire')==TRUE?'1':'0';
        $product ->meta_titre = $request->input('meta_titre');
        $product ->meta_desc = $request->input('meta_desc');
        $product ->meta_motCle = $request->input('meta_motCle');
        $product ->save();
        return redirect('/products')->with('status','Produit Bien Ajouté');
    }

    public function edit($id){
        $product=Product::find($id);
        return view('admin.product.edit',compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product=Product::find($id);
        if($request->hasFile('image')){
            $path='assets/uploads/product/'.$product->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('assets/uploads/product/',$filename);
            $product->image = $filename;
        }
        $product ->nom = $request->input('nom');
        $product ->mini_desc = $request->input('mini_desc');
        $product ->description = $request->input('description');
        $product ->prix_orig = $request->input('prix_orig');
        $product ->prix_vente = $request->input('prix_vente');
        $product ->qte = $request->input('qte');
        $product ->taxe = $request->input('taxe');
        $product ->statut = $request->input('statut')==TRUE?'1':'0';
        $product ->populaire = $request->input('populaire')==TRUE?'1':'0';
        $product ->meta_titre = $request->input('meta_titre');
        $product ->meta_desc = $request->input('meta_desc');
        $product ->meta_motCle = $request->input('meta_motCle');
        $product ->update();
        return redirect('/products')->with('status','Produit Bien Modifié');
    }

    public function destroy($id)
    {
        $product=Product::find($id);
        if ($product->image){
            $path='assets/uploads/product/'.$product->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $product->delete();
        return redirect('/products')->with('status','Produit Bien Supprimé');
    }
}
