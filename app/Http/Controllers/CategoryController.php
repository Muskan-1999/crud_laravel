<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Interfaces\CategoryRepositoryInterface;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     private $categoryRepository;

     public function __construct(CategoryRepositoryInterface $categoryRepository)
     {
         $this->categoryRepository = $categoryRepository;
     }

     
    
     public function index()
    {
      $categories =  $this->categoryRepository->allCategories(); 
      return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
        'category_name' => 'required|unique:categories'
    ]);
 
   return  $this->categoryRepository->storeCategory($request);

    
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
        $category = $this->categoryRepository->findCategory($id);
      
        return view('categories.edit', compact('category'));
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator=Validator::make($request->all(),[
            'category_name' => 'required|unique:categories'
           
        ]);

        
    return  $this->categoryRepository->updateCategory($request, $id);
       
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 

        $this->categoryRepository->destroyCategory($id);
      

        return redirect()->route('category.index')->with('success','Deleted Successfully');
    }
}
