<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\JuryController;
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

//* Welcome View => Login page
Route::get('/', function () {
    if (!auth()->user()) {
        // si l'user n'est pas connecter
        return view('welcome');
    } else {
        return redirect('/dashboard');
    }
});


Route::get('/dashboard', function () {
    if (auth()->user()->hasRole('admin')) {
        return view("backend.pages.adminHome");
    } elseif (auth()->user()->hasRole('jury')) {
        return view('frontend.pages.juryHome');
    } 
})->middleware(['auth', 'verified'])->name('dashboard');


//^ ADMIN
Route::middleware('auth','role:admin')->group(function () {
    Route::get('/admin/home',[AdminController::class,'index'])->name('admin.index');
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//^ JURY
Route::middleware('auth','role:jury')->group(function () {
    Route::get('/jury/home',[JuryController::class,'index'])->name('jury.index');
});

require __DIR__.'/auth.php';
