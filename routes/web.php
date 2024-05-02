<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TranscationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return redirect('login');
});

Route::get('/dashboard/general', [DashboardController::class, 'index'])->name('dashboard.general');
Route::get('/404', [DashboardController::class, 'notFound'])->name('404');
Route::get('/dashboard/search-result', [DashboardController::class, 'searchResult'])->name('dashboard.search-result');
Route::get('/dashboard/datatable', [DashboardController::class, 'datatable'])->name('dashboard.datatable');
Route::get('/dashboard/faq', [DashboardController::class, 'faq'])->name('dashboard.faq');
Route::get('dashboard/form', [DashboardController::class, 'form'])->name('dashboard.form');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/transaction/virtual', [TranscationController::class, 'index'])->name('virtual-account');
Route::get('/transaction/virtual/create-transaction', [TranscationController::class, 'create'])->name('transaction.create');

require __DIR__.'/auth.php';
