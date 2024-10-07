<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function store(Request $request)
    {
        $category = Category::create($request->all());
        return response()->json($category);
    }

    public function addProduct(Category $category, Product $product)
    {
        $product->category()->associate($category);
        $product->save();

        return response()->json([
            'message' => "Product linked to category"
        ]);
    }

    public function getProducts(Category $category){

        $category->load('products');
        return response()->json($category);
    }



}
