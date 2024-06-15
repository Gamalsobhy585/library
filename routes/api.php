<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiCategoryController;
Route::get('/categories',[ApiCategoryController::class,'index']);
Route::get('/categories/{category}', [ApiCategoryController::class, 'show']);
Route::post('/categories',[ApiCategoryController::class,'store']);


Route::middleware(['api_auth'])->group(function(){
    Route::post('/logout',[ApiAuthController::class,'logout']);
    Route::put('/categories/{category}/',[ApiCategoryController::class,'update']);
Route::delete('/categories/{category}',[ApiCategoryController::class,'destroy']);
});