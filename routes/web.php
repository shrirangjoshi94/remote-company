<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ManagementController, VisitorController};

Route::redirect('/', 'visitor');
Route::get('management', [ManagementController::class, 'index'])->name('management');
Route::get('visitor', [VisitorController::class, 'index'])->name('visitor');
Route::post('management/save-pdf', [ManagementController::class, 'savePdf']);
Route::post('management/save-snippet', [ManagementController::class, 'saveSnippet']);
Route::post('management/save-link', [ManagementController::class, 'saveLink']);
