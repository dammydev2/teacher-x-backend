<?php

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::middleware('auth.check')->group(function () {
 Route::middleware('auth:sanctum')->group(function () {

    Route::get('/get-class/{classTeach}', [UserController::class, 'getClass']); //community.php line 67
    Route::get('/check-follow/{follow}', [UserController::class, 'checkFollow']); //community.php line 104
    Route::get('/opportunities', [UserController::class, 'opportunities']); //community.php line 920
    Route::get('/approved-blogs', [UserController::class, 'approvedBlogs']); //community.php line 968
    Route::get('/resources/{resourceId}', [UserController::class, 'resources']); //community.php line 1007


    Route::group(['prefix' => 'post'], function () {
        Route::get('', [PostController::class, 'show']); //community.php line 477
        Route::post('/add', [PostController::class, 'create']); //community.php line 67
        Route::post('/check-likes', [PostController::class, 'fetchLikes']); //community.php line 747
        Route::post('/check-follow', [PostController::class, 'checkFollow']); //community.php line 104

    });

    Route::group(['prefix' => 'course'], function () {
        Route::post('order-course', [CourseController::class, 'addOrderedCourse']); //coursepay.php line 86
        Route::get('', [CourseController::class, 'getAll']); 
        Route::get('category/{category}', [CourseController::class, 'fetchByCategory']); 
    });
});
