<?php

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix('V1')->group(function () {
    
    Route::get("/tareas", [api::class, "read"]);
    Route::get("/tareas/{id}", [api::class, "read"]);
    Route::post("/tareas/create", [api::class, "create"]);
    Route::put("/tareas/{id}", [api::class, "update"]);
    Route::delete("/tareas/{id}", [api::class, "delete"]);
    Route::get("/tareas/search/{titulo}", [api::class, "readByTitulo"]);
    Route::get("/tareas/search/{autor}", [api::class, "readByAutor"]);
    Route::get("/tareas/search/{estado}", [api::class, "readByEstado"]);

});