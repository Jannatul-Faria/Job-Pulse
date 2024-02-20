<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::get(); 
        return view('admin.components.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'remark' =>$request->remark,

        ]);
        $notification = array(
            'message' => 'Category Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
       
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {

     
        // $category= Category::all();
        //  return $category;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        return $category-> update([
            'name'=>'name',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        return Category::where('id', $category->input('id'))->delete();
    }

     public function CategoryId(Request $request)
    {
        $categoryId = $request->input('id');
        return Category::where('id', $categoryId)->first();
    }
}


     

  

   

 

   