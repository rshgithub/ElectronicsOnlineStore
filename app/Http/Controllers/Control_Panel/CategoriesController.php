<?php

namespace App\Http\Controllers\Control_Panel;


use App\Http\Controllers\Controller;

use App\Http\Requests\Categories\newCategoryRequest;
use App\Http\Requests\Categories\updateCategoryRequest;
use App\Models\Category;

class CategoriesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $categories = Category::paginate(10);
        $categories = Category::all();
        return view('control_panel.categories.index',compact('categories'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('control_panel.categories.create');
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
        return redirect(route('categories.index'));
//        redirect(route('categories.index')->with('success','You added a Category successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function show($category){
//        if($category) {
//            return view('control_panel.categories.update',compact('Category'));
//        }else{
//            return redirect('/')->with('error','this user does not exist');
//        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function edit($category){

        if($category) {
            return view('control_panel.categories.update',compact('Category'));
        }else{
            return redirect('/')->with('error','this Category does not exist');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(updateCategoryRequest $request,$category)
    {
        if($category) {
            $category->update($request->validated());
            return redirect(route('categories.index'));
//            redirect(route('categories.index')->with('success','You edited the Category successfully.'));
        }else{
            return redirect('/')->with('error','this Category does not exist');
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
            return redirect(route('categories.index'));
        }else{
            return redirect('/')->with('error','this Category does not exist');
        }
    }

}
