<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\PagesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get("/hello-world", function () {
    return response()->json([
        'message' => 'Hello from api'
    ]);
});



// localhost:8000/api/hello/toto

Route::get("/hello/{name}", function (String $name) {
    return response()->json([
        'message' => 'Hello from ' . $name
    ]);
});


Route::get("/hello-request-param", function () {
    $name = request()->name;

    return response()->json([
        'message' => 'Hello from ' . $name
    ]);
});


Route::get('/books', [BookController::class, 'index']);
Route::get('/books/{book}', [BookController::class, 'show']);
Route::post('/books', [BookController::class, 'store']);
Route::put('/books/{book}', [BookController::class, 'update']);
Route::delete('/books/{book}', [BookController::class, 'destroy']);


Route::post('/pages/{book}', [PagesController::class, 'store']);
Route::get('/pages/{book}', [PagesController::class, 'index']);