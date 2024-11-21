<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('create-employee', [EmployeeController::class, 'store']);
Route::get('get-employees', [EmployeeController::class, 'getEmployees']);
Route::get('/update-employee/{id}', function () {
    return 'Test Route';
});
Route::put('/update-employee/{id}', [EmployeeController::class, 'updateEmployee']);

Route::delete('delete-employee/{id}', [EmployeeController::class, 'deleteEmployee']);
