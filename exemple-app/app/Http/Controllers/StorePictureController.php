<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StorePictureController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'file' => ['required']
        ]);

        Storage::put(
            $request->file('file')->getClientOriginalName(),
            file_get_contents($request->file('file'))
        );
    }
}
