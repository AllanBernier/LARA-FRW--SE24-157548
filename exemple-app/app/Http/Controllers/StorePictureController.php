<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StorePictureController extends Controller
{

    public function upload(Request $request)
    {
        $request->validate([
            'file' => ['required']
        ]);

        Storage::put(
            Str::ulid() . '_' . $request->file('file')->getClientOriginalName(),
            file_get_contents($request->file('file'))
        );
    }

    public function download(String $filename) {
        if (Storage::exists($filename)){
            return Storage::download($filename);
        }

        return response()->json(['message' => 'File not found', 404]);
    }


    public function delete(String $filename) {
        if (Storage::exists($filename)){
            Storage::delete($filename);
            return response()->json(['message' => 'File deleted succesfully']);
        }

        return response()->json(['message' => 'File not found', 404]);
    }





}
