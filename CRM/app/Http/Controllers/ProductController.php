<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductDetails;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::all());
    }

    public function show(Product $product)
    {
        return response()->json($product);
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return response()->json($product);
    }

    public function storeDetails(Product $product, Request $request){
        $product->details()->create($request->all());
        $product->load('details');
        return response()->json($product);
    }


    public function update(Product $product, Request $request)
    {
        $product = $product->update($request->all());
        return response()->json($product);
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([
            'message' => 'Product deleted',
            'product' => $product
        ]);
    }
}
