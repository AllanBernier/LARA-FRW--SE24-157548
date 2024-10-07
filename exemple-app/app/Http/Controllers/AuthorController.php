<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

    public function store(Request $request) {
        $author = Author::create($request->all());
        return response()->json($author);
    }

    public function show(Author $author){
        $author->load('books');
        return response()->json($author);
    }


    public function attach(Author $author, Book $book  ){
        $author->books()->attach($book->id);

        response()->json([
            'message' => 'Book & Author attached succesfully'
        ]);
    }


    public function detach(Author $author, Book $book  ){
        $author->books()->detach($book->id);

        response()->json([
            'message' => 'Book & Author detached succesfully'
        ]);
    }

}
