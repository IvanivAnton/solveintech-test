<?php

use App\Http\Controllers\Api\V1\GetQuotationsController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')
    ->get('/quotation/{date}', GetQuotationsController::class);
