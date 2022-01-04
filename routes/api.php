<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\RTVRSEnumerationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\UserWalletController;
use App\Http\Controllers\PaymentPlanController;
use App\Http\Controllers\BuildingProjectController;









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

Route::post('/register', [ApiAuthController::class, 'register']);

Route::post('/login', [ApiAuthController::class, 'login']);


Route::post('/create_package', [PackageController::class, 'create_package']);

Route::get('/packages', [PackageController::class, 'packages']);

Route::post('/package', [PackageController::class, 'package']);

Route::post('/payment_callback', [PaymentController::class, 'callback'])->middleware('auth:sanctum');

Route::post('/verify_otp', [ApiAuthController::class, 'verify_otp'])->middleware('auth:sanctum');

Route::get('/get_faqs', [FAQController::class, 'get_faqs']);

Route::get('/add_faq', [FAQController::class, 'add_faq'])->middleware('auth:sanctum');

Route::get('/wallet_balance', [UserWalletController::class, 'wallet_balance'])->middleware('auth:sanctum');


Route::post('/create_enumeration', [RTVRSEnumerationController::class, 'create_enumeration']);

Route::post('/create_payment_plan', [PaymentPlanController::class, 'create_payment_plan'])->middleware('auth:sanctum');

Route::get('/building_projects', [BuildingProjectController::class, 'building_projects']);


Route::get('/payment_plans', [PaymentPlanController::class, 'payment_plans'])->middleware('auth:sanctum');;






