<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GitHubController;


Route::get('/repositories', [GitHubController::class, 'index']);
Route::post('/send-report', [GitHubController::class, 'sendReport']);