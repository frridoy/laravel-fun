<?php

use App\Http\Controllers\UserProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/user-profiles', [UserProfileController::class, 'index'])->name('user-profiles.index');
Route::get('/user-profiles/create', [UserProfileController::class, 'create'])->name('user-profiles.create');
Route::post('/user-profiles', [UserProfileController::class, 'store'])->name('user-profiles.store');


Route::get('/download-sample-csv', [UserProfileController::class, 'downloadSampleCsv'])->name('userProfile.downloadSampleCsv');
Route::get('/import-csv', [UserProfileController::class, 'importCsv'])->name('userProfile.importCsv');
Route::post('/import-csv/store', [UserProfileController::class, 'importCsvStore'])->name('userProfile.importCsv');
