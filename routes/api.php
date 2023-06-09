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
use App\Http\Controllers\NewUpdateController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\PaymentScheduleController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OfferLetterController;
use App\Http\Controllers\ProgressReportController;
use App\Http\Controllers\PaymentStageController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\UploadFileController;







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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', [ApiAuthController::class, 'register']);

Route::post('/login', [ApiAuthController::class, 'login']);


Route::post('/create_package', [PackageController::class, 'create_package']);

Route::get('/packages', [PackageController::class, 'packages']);

Route::post('/package', [PackageController::class, 'package']);

Route::post('/payment_callback', [PaymentController::class, 'callback'])->middleware('auth:sanctum');

Route::post('/verify_otp', [ApiAuthController::class, 'verify_otp']);

Route::get('/get_faqs', [FAQController::class, 'get_faqs']);

Route::get('/add_faq', [FAQController::class, 'add_faq'])->middleware('auth:sanctum');

Route::get('/wallet_balance', [UserWalletController::class, 'wallet_balance'])->middleware('auth:sanctum');


Route::post('/create_enumeration', [RTVRSEnumerationController::class, 'create_enumeration']);

Route::post('/create_payment_plan', [PaymentPlanController::class, 'create_payment_plan'])->middleware('auth:sanctum');

Route::get('/building_projects', [BuildingProjectController::class, 'building_projects']);

Route::post('/deactivate_project', [BuildingProjectController::class, 'deactivate_project'])->middleware('auth:sanctum');

Route::post('/activate_project', [BuildingProjectController::class, 'activate_project'])->middleware('auth:sanctum');

Route::post('/create_project', [BuildingProjectController::class, 'create_project']);


Route::get('/payment_plans', [PaymentPlanController::class, 'payment_plans'])->middleware('auth:sanctum');

Route::post('/notify_new_update', [NewUpdateController::class, 'notify_new_update']);


Route::post('/tickets', [TicketController::class, 'create_ticket'])->middleware('auth:sanctum');

Route::get('/tickets', [TicketController::class, 'get_tickets'])->middleware('auth:sanctum');

Route::put('/tickets', [TicketController::class, 'update_ticket'])->middleware('auth:sanctum');


Route::get('/users', [UserProfileController::class, 'users'])->middleware('auth:sanctum');

Route::post('/user_data', [UserProfileController::class, 'user_data'])->middleware('auth:sanctum');

Route::post('/add_new_user', [UserProfileController::class, 'add_new_user'])->middleware('auth:sanctum');

Route::get('/notifications', [NotificationController::class, 'notifications'])->middleware('auth:sanctum');

Route::get('/profiles', [UserProfileController::class, 'get_profiles'])->middleware('auth:sanctum');

Route::post('/profiles', [UserProfileController::class, 'update_profile'])->middleware('auth:sanctum');

Route::post('/update_payment_plan', [PaymentScheduleController::class, 'update_payment_plan'])->middleware('auth:sanctum');

Route::post('/update_plan', [PaymentScheduleController::class, 'update_plan'])->middleware('auth:sanctum');

Route::post('/send_reminders', [PaymentPlanController::class, 'send_reminders']);

Route::post('/send_letter', [OfferLetterController::class, 'send_letter']);

Route::post('/send_batch', [OfferLetterController::class, 'send_batch']);

Route::post('/progress_report', [ProgressReportController::class, 'progress_report'])->middleware('auth:sanctum');

Route::post('/get_reports', [ProgressReportController::class, 'get_reports'])->middleware('auth:sanctum');

Route::post('/create_payment_stage', [PaymentStageController::class, 'create_payment_stage']);

Route::post('/payment_plan_stages', [PaymentStageController::class, 'payment_plan_stages']);

Route::post('/update_payment_stage', [PaymentStageController::class, 'update_payment_stage']);


Route::get('/pdf', [PdfController::class, 'pdf']);

Route::post('/upload_file', [UploadFileController::class, 'upload_file']);



