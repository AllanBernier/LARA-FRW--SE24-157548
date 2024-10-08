<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function getOrders(Request $request){
        return response()->json(['orders' => $request->user->orders]);
    }
}
