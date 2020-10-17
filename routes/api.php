<?php


use App\Http\Controllers\MailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
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

Route::get('/get/users/', [UserController::class, 'index']);
Route::get('/get/users/find/{username}', [UserController::class, 'findByUsername']);
Route::post('/users/create', [UserController::class, 'create']);
Route::post('/do/login', [UserController::class, 'login']);
Route::get('/do/logout', [UserController::class, 'logout']);
Route::get('/get/user/logged', [UserController::class, 'isLogged']);

Route::get('/get/products/', [ProductController::class, 'index']);
Route::get('/get/vendors/', [ProductController::class, 'findAllVendors']);
Route::get('/get/designers/', [ProductController::class, 'findAllDesigners']);
Route::get('/get/vendor/{vendorId}', [ProductController::class, 'findVendor']);
Route::get('/get/product/{productId}', [ProductController::class, 'findProduct']);
Route::get('/get/designer/{designerId}', [ProductController::class, 'findDesigner']);
Route::get('/get/onStock/', [ProductController::class, 'findOnstock']);
Route::get('/get/type/{type}', [ProductController::class, 'findByType']);
Route::get('/get/price/{max}', [ProductController::class, 'priceRange']);
Route::get('/get/join', [ProductController::class, 'findProductsJoined']);
Route::get('/get/max', [ProductController::class, 'getMaxPrice']);

Route::get('/get/sendEmail/{itemId}', [MailController::class, 'attachment_email']);
Route::get('/get/pdf/{itemId}', [MailController::class, 'pdfGenerator']);
