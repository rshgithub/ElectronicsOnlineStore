<?php

namespace App\Http\Controllers\Control_Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\newProductRequest;
use App\Http\Requests\Products\updateProductRequest;
use App\Models\Product;
use function redirect;
use function view;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $products = Product::paginate(10);
        $products = Product::all();
        return view('control_panel.products.index',compact('products'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('control_panel.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(newProductRequest $request)
    {
        $product = Product::create($request->validated());
        return redirect(route('products.index'));
//        redirect(route('products.index')->with('success','You added a Product successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function show($product){
//        if($product) {
//            return view('control_panel.products.update',compact('Product'));
//        }else{
//            return redirect('/')->with('error','this user does not exist');
//        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function edit($product){

        if($product) {
            return view('control_panel.products.update',compact('Product'));
        }else{
            return redirect('/')->with('error','this Product does not exist');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(updateProductRequest $request,$product)
    {
        if($product) {
            $product->update($request->validated());
            return redirect(route('products.index'));
//            redirect(route('products.index')->with('success','You edited the Product successfully.'));
        }else{
            return redirect('/')->with('error','this Product does not exist');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function destroy($product)
    {
        if($product) {
            $product->delete();
            return redirect(route('products.index'));
        }else{
            return redirect('/')->with('error','this Product does not exist');
        }
    }

}
