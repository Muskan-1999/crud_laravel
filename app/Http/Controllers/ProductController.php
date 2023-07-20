<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        $category = Category::all();
        // $subcategory = Subcategory::all(); 
        return view('products.create',compact('category'));
    }

    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name' => 'required|min:3',
            'category'=>'required',
            'subcategory'=>'required',
        ]);

        try{
             Product::create([
            'name' => $request->name,
            'description'=>$request->description,
            'category'=>$request->category,
            'subcategory'=>$request->subcategory,
        ]);
        return redirect()->route('products.index')->with('success','Product created successfully!!!!');
    }catch(\throwable $e){
        return redirect()->back()->with('error','Product Failed!!!!');
    }
    }
 
    public function edit($id)
     {
        $product=Product::find($id);
        $subcategory  = Subcategory::all();
        $category = Category::all();
        return view('products.edit', compact('product','subcategory','category'));
     }

     public function update(Request $request, $id)
     {   
        $validator=Validator::make($request->all(),[
        'name' => 'required|min:3',
        'category'=>'required',
        'subcategory'=>'required',
    ]);
    try{ 
        $product=Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category=$request->category;
        $product->subcategory=$request->subcategory;
        $product->save();
        return redirect()->route('product.index')->with('success','Subcategory updated successfully!');
    }catch(\throwable $e){
        return redirect()->back()->with('error','Product Updation Failed!!!!');
    }
}

    public function destroy($id)
    {
        $product =Product::find($id);
        $product->delete();
        return redirect()->route('product.index')->with('success','Products deleted successfully!');
    }

    public function loadSubCategories($id=null){
        $data = Subcategory::where('category_id',$id)->get();
        return response()->json([
            'data' => $data
        ]);
    }
}
