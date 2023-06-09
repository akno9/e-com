<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $category=Category::all();
        return view('admin.category.index',compact('category'));
    }

    public function add()
    {
        return view('admin.category.add');
    }

    public function insert(Request $request){
        $category =new Category();

        if($request->hasFile('image')){
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('assets/uploads/category/',$filename);
            $category->image = $filename;
        }

        $category->nom = $request->input('nom');
        $category->url = $request->input('url');
        $category->description = $request->input('description');
        $category->statut = $request->input('statut')==TRUE?'1':'0';
        $category->populaire = $request->input('populaire')==TRUE?'1':'0';
        $category->meta_titre = $request->input('meta_titre');
        $category->meta_desc = $request->input('meta_desc');
        $category->meta_motCle = $request->input('meta_motCle');
        $category->save();
        return redirect('/categories')->with('status','Catégorie Bien Ajoutée');
    }

    public function edit($id){
        $category=Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category=Category::find($id);
        if($request->hasFile('image')){
            $path='assets/uploads/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('assets/uploads/category/',$filename);
            $category->image = $filename;
        }
        $category->nom = $request->input('nom');
        $category->url = $request->input('url');
        $category->description = $request->input('description');
        $category->statut = $request->input('statut')==TRUE?'1':'0';
        $category->populaire = $request->input('populaire')==TRUE?'1':'0';
        $category->meta_titre = $request->input('meta_titre');
        $category->meta_desc = $request->input('meta_desc');
        $category->meta_motCle = $request->input('meta_motCle');
        $category->update();
        return redirect('/categories')->with('status','Catégorie Bien Modifiée');
    }

    public function destroy($id)
    {
        $category=Category::find($id);
        if ($category->image){
            $path='assets/uploads/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $category->delete();
        return redirect('/categories')->with('status','Catégorie Bien Supprimée');
    }
}
