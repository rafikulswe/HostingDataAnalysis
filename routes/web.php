<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('backend.layout.app');
});

Route::get('importForm', [App\Http\Controllers\HostingDataController::class, 'showImportForm'])->name('showImportForm');
Route::post('import', [App\Http\Controllers\HostingDataController::class, 'import'])->name('import');

Route::get('workDb', [App\Http\Controllers\WorkingDBController::class, 'workDb'])->name('workDb');
Route::post('workDb', [App\Http\Controllers\WorkingDBController::class, 'store'])->name('workDbPost');

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return "Success";
});