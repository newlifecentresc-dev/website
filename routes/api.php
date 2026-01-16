<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::get('/test', function (Request $request) {
//     return  App\Http\Services\Navigation::getAdminNavigation();
// });

// Route::middleware(['auth:api'])->group(function () {
    Route::get('/test', [AdminController::class, 'getAboutUsInformation']);
// });


Route::post('/newsletter', [HomeController::class, 'newsletter']);