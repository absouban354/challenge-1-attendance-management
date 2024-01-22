<?php

use App\Http\Controllers\AttendanceController;
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

Route::get('/attendance', [AttendanceController::class, 'index']);
Route::get('/attendance/{employee_id}', [AttendanceController::class, 'show']);
Route::post('/upload-attendance', [AttendanceController::class, 'uploadAttendance']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
