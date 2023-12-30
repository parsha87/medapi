<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\MedkitController;
use App\Http\Controllers\MedicalKitDataController;

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

Route::get('/test',function(){
    return response([
        'message' => 'API is working'
    ],200);
});

Route::get('/run-migration',function(){
    
    Artisan::call('optimize:clear');
    Artisan::call('migrate:fresh');

    return response([
        'message' => 'Migration Successful'
    ],200);
});

// Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/register', [AuthController::class, 'Register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/medikits', [MedkitController::class, 'index']);
Route::get('/medikits/{id}', [MedkitController::class, 'show']);
Route::post('/medikits/store', [MedkitController::class, 'store']);
Route::post('/medicaldata/store', [MedicalKitDataController::class, 'store']);
Route::get('/medicaldata', [MedicalKitDataController::class, 'index']);

Route::get('/medicaldata', [MedicalKitDataController::class, 'index']);
