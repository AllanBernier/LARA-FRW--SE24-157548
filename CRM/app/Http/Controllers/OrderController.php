<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function store(Request $request) {
        $order = Order::create($request->all());
        return response()->json($order, 201);
    }

    public function destroy(Order $order) {
        $order->delete();
        return response()->json(['message' => 'order deleted']);
    }

    public function index() {
        $orders = Order::all();
        return response()->json($orders);
    }

    public function show(Order $order) {
        $order->load('products');
        return response()->json($order);
    }

    public function attach(Order $order, Product $product) {
        $order->products()->attach($product);        
        return response()->json(['message' => 'order attached to product']);
    }

    public function detach(Order $order, Product $product) {
        $order->products()->detach($product);
        return response()->json(['message' => 'order detached to product']);
    }
}
