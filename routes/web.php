<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\isSuperAdmin;




Route::get('/', function () {return view('home.home');});


Route::middleware('guest')->group(function(){
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});


Route::middleware('auth')->group(function(){
    
    Route::get('/categories',[CategoryController::class,'index']);
    Route::get('/categories/create',[CategoryController::class,'create']);
    Route::get('/categories/{category}', [CategoryController::class, 'show']);
    Route::post('/categories',[CategoryController::class,'store']);
    Route::get('/categories/{category}/edit',[CategoryController::class,'edit']);
    Route::put('/categories/{category}/',[CategoryController::class,'update']);
    Route::delete('/categories/{category}',[CategoryController::class,'destroy']);
    
    
    
    
    
    Route::get('/books',[BookController::class,'index']);
    Route::get('/books/create',[BookController::class,'create']);
    Route::get('/books/{book}', [BookController::class, 'show']);
    Route::post('/books',[BookController::class,'store']);
    Route::get('/books/{book}/edit',[BookController::class,'edit'])->middleware('can:update,book');
    Route::put('/books/{book}/',[BookController::class,'update'])->middleware('can:update,book');
    Route::delete('/books/{book}',[BookController::class,'destroy'])->middleware('can:delete,book');
    
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});



Route::middleware(['auth', 'isSuperAdmin'])->group(function() {
    Route::get('/dashboard', function() {
        return 'this is dashboard';
    });
});
