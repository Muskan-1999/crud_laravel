<?php

namespace App\Repository;

use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;


class CategoryRepository implements CategoryRepositoryInterface
{

    public function allCategories()
    {
        $categories = Category::all();
        return $categories;
    }

    public function storeCategory($request)
    {
        try{ 
            Category::create([
            'category_name' => $request->category_name,
    
        ]);
    
        return redirect()->route('category.index')->with('success','Data insertion created');
    }catch(\Exception $e){ 
        return redirect()->back()->with('error','Data insertion failed!!!',$e->getMessage());
    }
    
    }

    public function findCategory($id)
    {
        return Category::findorfail($id);
    }

    public function updateCategory($request, $id)
    {
        try{
            // $category = Category::where('id',$id)->first();
            Category::where('id',$id)->update([
                'category_name' =>   $request->category_name
            ]);
            return  redirect()->route('category.index')->with('success','Data updated successfully');
        }catch(\Throwable $e){
            dd($e->getMessage());
        return redirect()->back()->with('error','Updation Failed!!!!',$e->getMessage());
        }
    }

    public function destroyCategory($id)
    {
       
        $category = Category::find($id);
        $category->delete();
    }
}