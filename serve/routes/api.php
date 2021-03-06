<?php

use App\Http\Controllers\Api\MailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\CategoryController;
use \App\Http\Controllers\Api\GalleryController;
use \App\Http\Controllers\Api\LangController;
use \App\Http\Controllers\Api\ProductController;
use \App\Http\Controllers\Api\VacancyController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'langs' => LangController::class,

    'vacancies' => VacancyController::class,

    'products' => ProductController::class,

    'gallery' => GalleryController::class,

    'categories' => CategoryController::class,
]);

Route::get('/categories/{slug}', [CategoryController::class, 'show']);

/**
 * Email
 */

Route::get('/send-email', [MailController::class, 'send_mail']);
