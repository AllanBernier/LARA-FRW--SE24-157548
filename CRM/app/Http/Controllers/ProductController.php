<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


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

        $request->validate([
            'name' => ['required'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'numeric'],
            'description' => ['required']
        ]);


        $product = Product::create($request->all());
        return response()->json($product);
    }

    public function storeDetails(Product $product, Request $request)
    {

        $request->validate([
            'file' => ['required'],
            'description' => ['required'],
            'bar_code' => ['required'],
        ]);

        $fileName = Str::ulid() . $request->file('file')->getClientOriginalName();

        $result = Storage::put(
            $fileName,
            file_get_contents($request->file('file'))
        );

        $product->details()->create([
            'description' => $request->description,
            'bar_code' => $request->bar_code,
            'image_url' => $fileName
        ]);
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

        $product->load('details');

        if (isset($product->details)) {
            $product->details()->delete();
        }

        $product->delete();
        return response()->json([
            'message' => 'Product deleted',
            'product' => $product
        ]);
    }
}
