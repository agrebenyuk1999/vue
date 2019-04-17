<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return $products;
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
    public function store(Request $request)
    {
        $addProduct = new Product;
        $addProduct->name = $request->input('name');
        $addProduct->price = $request->input('price');
        $addProduct->save();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addQuantity(Request $request)
    {
        $productId = $request->input('id');

        $updateProductQuantity = Product::find($productId);
        $updateProductQuantity->quantity += 1;
        $updateProductQuantity->save();

        return $updateProductQuantity->quantity;
    }

    public function takeAwayQuantity(Request $request)
    {
        $productId = $request->input('id');

        $updateProductQuantity = Product::find($productId);
        $updateProductQuantity->quantity -= 1;
        $updateProductQuantity->save();

        return $updateProductQuantity->quantity;
    }

    public function zeroingQuantityItem(Request $request)
    {
        $productId = $request->input('id');

        $updateProductQuantity = Product::find($productId);
        $updateProductQuantity->quantity = 0;
        $updateProductQuantity->save();

        return $updateProductQuantity->quantity;
    }

    public function getLastUpdate()
    {
        $lastUp = Product::orderBy('updated_at', 'desc')->limit(1)->get('updated_at');

        return $lastUp;
    }
}
