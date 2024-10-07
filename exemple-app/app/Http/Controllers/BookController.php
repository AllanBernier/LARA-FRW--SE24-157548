<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    
    public function index() {
        $books = Book::all();
        return response()->json($books);
    }

    public function show(Book $book) {
        return response()->json($book);
    }


    public function store(Request $request) {
        $book = Book::create($request->all());
        return request()->json($book);
    }

    public function update(Request $request, Book $book) {
        $book->update($request->all());
        return request()->json(['book' => $book->toArray()]);
    }

    public function destroy($id) {
        $result = Book::destroy($id);
        return request()->json($result);
    }



}
