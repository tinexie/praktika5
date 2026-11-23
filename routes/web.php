<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');

Route::get('/reports/create', function(){
    return view('report.create');
})->name('reports.create');

Route::delete('/reports/{id}', [ReportController::class, 'destroy'])->name('reports.destroy');

Route::post('/reports', [ReportController::class, 'store'])->name('reports.store');

Route::get('/reports/{id}/edit', [ReportController::class, 'edit'])->name('reports.edit');

Route::put('/reports/{id}', [ReportController::class, 'update'])->name('reports.update');
