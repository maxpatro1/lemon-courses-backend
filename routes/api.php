<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GradeController;
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
//Route::middleware('auth:sanctum')->get('/name', function (Request $request) {
//    return response()->json(['name' => $request->user()->name]);
//});
Route::post('/register', [AuthController::class, 'register']);
Route::resource('course', CourseController::class);
Route::resource('comment', CommentController::class);
Route::get('comments/{id}', [CommentController::class, 'getCommentsByCourseId']);
Route::resource('grade', GradeController::class);
