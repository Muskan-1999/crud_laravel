<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller;
use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::get();

        return view('subcategories.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('subcategories.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $validator=Validator::make($request->all(),[
            'name' => 'required|min:3',
            'category' => 'required'
           
        ]);

        try
        { Subcategory::create([

            'name' => $request->name,
            'category_id' => $request->category

        ]);
        return redirect()->route('subcategory.index')->with('success','Subcategory created successfully!!!!');
        }catch(\throwable $e){
        return redirect()->back()->with('error','Subcategory Creation Failed!!!!!!');
    }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategory  = Subcategory::find($id);
        $category = Category::all();
        return view('subcategories.edit', compact('subcategory','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $validator=Validator::make($request->all(),[
            'name' => 'required|min:3',
            'category' => 'required'
           
        ]);
try{
    $subcategory = Subcategory::find($id);
    $subcategory->name = $request->name;
    $subcategory->category_id = $request->category;
    $subcategory->save();
    return redirect()->route('subcategory.index')->with('success','Subcategory updated successfully!!!');
}catch(\throwable $e)
  {
    return redirect()->back()->with('error','Subcategory Updation Failed!!!!');
  }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->delete();
        return redirect()->route('subcategory.index')->with('success','Subcategory deleted successfully!');
    }
}

