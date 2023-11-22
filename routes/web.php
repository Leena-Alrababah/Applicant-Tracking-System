<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('front-end.index');
// });
Route::get('/', [JobController::class, 'show'])->name('index');
Route::get( '/job/{id}', [JobController::class, 'showSingleJop'])->name('showSingleJob');
Route::get('/job/{id}/apply', [JobController::class, 'showApplicationForm'])->name('showApplicationForm');
Route::post('/job/{id}/apply/submit', [JobController::class, 'submitApplicationForm'])->name('submitApplicationForm');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
