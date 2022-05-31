<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\newProductRequest;
use App\Http\Requests\Products\updateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json( Product::all());
    }

    public function getDeletedProducts()
    {
        return response()->json( (Product::onlyTrashed()->get() ));
    }

    public function getProductsWithDeleted()
    {
        return response()->json( (Product::withTrashed()->get() ));
    }

    public function restoreDeletedProduct($product)
    {
        $trashed = Product::withTrashed()->find($product);
        if($trashed) {
            $trashed->restore();
            return response()->json(['message'=>'success' , 'data' => $trashed]);
        }else{
            return response()->json(['message' => 'this Product is not trashed']);
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
    public function store(newProductRequest $request)
    {

        $product = Product::create($request->validated());
        return response()->json(['message' => 'success', 'data' => ProductResource::make($product)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($product){
        if($product) {
            return response()->json(['message'=>'success' , 'data'=> ProductResource::make($product)]);
        }else{
            return response()->json(['message' => 'this Product does not exist']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($product){
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(updateProductRequest $request, $product )
    {
        if($product) {
            $product->update($request->validated());
            return response()->json(['message'=>'success' , 'data'=> ProductResource::make($product)]);
        }else{
            return response()->json(['message' => 'this Product does not exist']);
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
            return response()->json(['message'=>'success']);
        }else{
            return response()->json(['message' => 'this Product does not exist']);
        }
    }
}
