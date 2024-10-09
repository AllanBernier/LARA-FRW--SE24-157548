<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('product.index')->with('products', Product::withTrashed()->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = new Product();
        
        return view('product.create')->with('product', $product);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductFormRequest $request)
    {
        $validated_data = $request->validated();        
        Product::create($validated_data);
        return redirect(route('products.index'))->with('success', 'Le produit a bien été crée');;
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product.show')->with('product', $product);   
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit')->with('product', $product) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductFormRequest $request, Product $product)
    {

        dd($request->all());

        $request->validated();
        $product->update($request->all());

        return redirect(route('products.index'))->with('success', 'Le produit a été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('products.index'));
    }
}
