<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TbOwnerController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::resource('owners', TbOwnerController::class);
