<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\newCategoryRequest;
use App\Http\Requests\Categories\updateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json( Category::all());
    }

    public function getDeletedCategories()
    {
        return response()->json( (Category::onlyTrashed()->get() ));
    }

    public function getCategoriesWithDeleted()
    {
        return response()->json( (Category::withTrashed()->get() ));
    }

    public function getCategoryProducts($category)
    {
        $categoryProducts = Category::with('products')->find($category);
        return response()->json( ['message' => 'success', 'data' => $categoryProducts ]);
    }

    public function restoreDeletedCategory($category)
    {
        $trashed = Category::withTrashed()->find($category);
        if($trashed) {
            $trashed->restore();
            return response()->json(['message'=>'success' , 'data' => $trashed]);
        }else{
            return response()->json(['message' => 'this Category is not trashed']);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(newCategoryRequest $request)
    {

        $category = Category::create($request->validated());
        return response()->json(['message' => 'success', 'data' => $category]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($category){
        if($category) {
            return response()->json(['message'=>'success' , 'data'=> $category]);
        }else{
            return response()->json(['message' => 'this Category does not exist']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($category){
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(updateCategoryRequest $request, $category )
    {
        if($category) {
            $category->update($request->validated());
            return response()->json(['message'=>'success' , 'data'=> $category]);
        }else{
            return response()->json(['message' => 'this Category does not exist']);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
    {
        if($category) {
            $category->delete();
            return response()->json(['message'=>'success']);
        }else{
            return response()->json(['message' => 'this Category does not exist']);
        }
    }

}
