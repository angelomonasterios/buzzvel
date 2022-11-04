<?php

use App\Http\Controllers\api\Qr;
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

Route::post('/user/qrcode', [Qr::class, 'save' ]);
Route::get('/user/qrcode/{id}', [Qr::class, 'get' ]);
