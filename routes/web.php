<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/profilo');

Route::get('/profilo', [ProfileController::class, 'show'])->name('profile.show');
