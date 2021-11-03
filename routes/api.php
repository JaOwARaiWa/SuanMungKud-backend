<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\AdminController;

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

// JWT-Auth
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout']);
});

//Admin route
Route::post('/admin/create-user', [AdminController::class, 'create_user']);
Route::post('/admin/delete-user/{id}', [AdminController::class, 'delete_user']);
Route::post('/admin/assign-work', [AdminController::class, 'assign_work']);
Route::get('/admin/all-users', [AdminController::class, 'all_users']);
Route::get('/admin/all-employees', [AdminController::class, 'all_employees']);
Route::get('/admin/can-assigned/{date}', [AdminController::class, 'can_assigned']);
Route::get('/admin/all-partners', [AdminController::class, 'all_partners']);
Route::post('/admin/create-invoice', [AdminController::class, 'create_invoice']);
Route::get('/admin/my-work/{id}', [AdminController::class, 'my_work']);
Route::post('/admin/done-work/{id}', [AdminController::class, 'done_work']);
Route::get('/admin/my-invoice/{id}', [AdminController::class, 'my_invoice']);
Route::post('/admin/accept-invoice/{id}', [AdminController::class, 'accept_invoice']);
Route::get('/admin/already-assigned/{date}', [AdminController::class, 'already_assigned']);
Route::get('/admin/today-invoice/{date}', [AdminController::class, 'today_invoice']);
Route::post('/admin/update-payment-status/{id}', [AdminController::class, 'update_payment_status']);
