<?php

use App\Http\Controllers\Api\EmployeeDataController;
use App\Http\Controllers\Api\EmployeeController;
use App\Models\Employee;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/employees', [EmployeeController::class, 'index']);
// Route::post('/employees', [EmployeeController::class, 'store']);


Route::get('/employees/countries', [
    EmployeeDataController::class, 'countries'
]);

// id here refers to country
Route::get('/employees/{id}/states', [
    EmployeeDataController::class, 'states'
]);

// id here refers to state
Route::get('/employees/{id}/cities', [
    EmployeeDataController::class, 'cities'
]);

Route::get('/employees/departments', [
    EmployeeDataController::class, 'departments'
]);

Route::apiResource('employees', EmployeeController::class);
