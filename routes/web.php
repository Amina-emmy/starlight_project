<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\JuryController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
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
        return view('welcome');
})->middleware(['limitaccess'])->name('welcome');

Route::get('/dashboard', function () {
    if (auth()->user()->hasRole('admin')) {
        return view("backend.affichage.pages.dashboardAdmin");
    } elseif (auth()->user()->hasRole('jury')) {
        return view('frontend.pages.juryHome');
    }
})->middleware(['auth', 'verified','logged_in'])->name('dashboard');


//^ ADMIN
Route::middleware('auth', 'role:admin')->group(function () {
    //~ VIEWS
    Route::get('/admin/home',[AdminController::class,'index'])->name('admin.dashboardAdmin'); 
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/admin/users',[AdminController::class,'indexUsers'])->name('admin.users'); 
    Route::get('/admin/episodes',[EpisodeController::class,'indexEp'])->name('admin.episodes');
    //~ FUNCTIONS
    Route::put('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');
    //USERS
    Route::put('/admin/users/{jury}/update',[AdminController::class,'updateJury'])->name('admin.updateJury');
    // EPISODES
    Route::post('/admin/episodes/store',[EpisodeController::class,'storeEp'])->name('admin.storeEp');
    Route::put('/admin/episodes/update/{episode}',[EpisodeController::class,'updateEp'])->name('admin.updateEp');
    Route::delete('/admin/episodes/destroy/{episode}',[EpisodeController::class,'destroyEp'])->name('admin.destroyEp');


});


//^ JURY
Route::middleware('auth', 'role:jury')->group(function () {
    //~ VIEWS
    Route::get('/jury/home',[JuryController::class,'index'])->name('jury.index');
});

require __DIR__ . '/auth.php';
