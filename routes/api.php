<?php

namespace App\Http\Controllers\Api;

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
// Route::apiResource('/posts', App\Http\Controllers\Api\PostController::class);
Route::post('/register', RegisterController::class)->name('register');
Route::post('/login', LoginController::class)->name('login');


Route::get('/checklist', [ChecklistController::class, 'index' ]);
Route::post('/checklist', [ChecklistController::class, 'store' ]);
Route::delete('/checklist/{id}', [ChecklistController::class, 'destroy' ]);

Route::get('/checklist/{id}/item', [ChecklistItemController::class, 'index' ]);
Route::post('/checklist/{id}/item', [ChecklistItemController::class, 'store' ]);



