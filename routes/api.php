<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Api\LoginController;
use App\Http\Controllers\Api\TaskController;
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

Route::post("login", [LoginController::class, "login"]);




Route::middleware("auth:sanctum")->group(function(){

   Route::post("/delete-old-token", [LoginController::class, "deleteToken"]);

   Route::get('/user', function (Request $request) {
        return $request->user();
    });


    Route::get("/tasks", [TaskController::class, "index"]);
    Route::post("/task/create", [TaskController::class, "store"]);
    Route::put("/task/update", [TaskController::class, "update"]);
    Route::get("/task/show", [TaskController::class, "show"]);
    Route::patch("/task/status-update", [TaskController::class, "status"]);
    Route::delete("/task/delete", [TaskController::class, "delete"]);

});
