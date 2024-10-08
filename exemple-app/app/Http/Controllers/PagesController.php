<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageRequestForm;
use App\Models\Book;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function store(Book $book, PageRequestForm $request)
    {

        $request->validated();

        $book->pages()->create($request->all());

        return response()->json([
            'message' => 'page created succesfully'
        ]);
    }


    public function index(Book $book) {
        return response()->json($book->pages);
    }
}
