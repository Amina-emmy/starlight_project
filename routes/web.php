<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AudCandidatController;
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
    //affichage
    Route::get('/admin/home',[AdminController::class,'index'])->name('admin.dashboardAdmin'); 
    Route::get('/admin/audition/affichage', [AdminController::class, 'affichageAud'])->name('admin.audAffichage');
    Route::get('/admin/faf/affichage', [AdminController::class, 'affichageFaF'])->name('admin.FafAffichage');
    Route::get('/admin/ufaf/affichage', [AdminController::class, 'affichageUFaF'])->name('admin.UFafAffichage');
    Route::get('/admin/demiFinale/affichage', [AdminController::class, 'affichageDemiFinale'])->name('admin.DFAffichage');
    Route::get('/admin/finale/affichage', [AdminController::class, 'affichageFinale'])->name('admin.FAffichage');
    //primes audition
    Route::get('/admin/audition/prime/{episode}', [AudCandidatController::class, 'showCandidatsByEpisode'])->name('candidats.by.episode');
    //gestion
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/admin/users',[AdminController::class,'indexUsers'])->name('admin.users'); 
    Route::get('/admin/episodes',[EpisodeController::class,'indexEp'])->name('admin.episodes');
    Route::get('/admin/audition',[AudCandidatController::class,'indexAud'])->name('admin.audGestion');

    //~ FUNCTIONS
    Route::put('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');
    //USERS
    Route::put('/admin/users/{jury}/update',[AdminController::class,'updateJury'])->name('admin.updateJury');
    // EPISODES
    Route::post('/admin/episodes/store',[EpisodeController::class,'storeEp'])->name('admin.storeEp');
    Route::put('/admin/episodes/update/{episode}',[EpisodeController::class,'updateEp'])->name('admin.updateEp');
    Route::delete('/admin/episodes/destroy/{episode}',[EpisodeController::class,'destroyEp'])->name('admin.destroyEp');
    // Aud_candidat
    Route::post('/admin/audition/candidats/store',[AudCandidatController::class,"StoreAudCandi"])->name("store.audCandidat");
    Route::delete('/admin/audition/candidats/update/{audCandidat}',[AudCandidatController::class,"destroyAudCandi"])->name("destroy.audCandidat");
    Route::put('/admin/audition/candidats/delete/{audCandidat}',[AudCandidatController::class,"updateAudCandi"])->name("update.audCandidat");
    Route::post('/admin/audition/candidats/storevotes',[AdminController::class,"storeVoteAudCandi"])->name("store.voteAud");



});


//^ JURY
Route::middleware('auth', 'role:jury')->group(function () {
    //~ VIEWS
    Route::get('/jury/home',[JuryController::class,'index'])->name('jury.index');
    //~ FUNCTIONS
    //Audition
    Route::put('/jury/audition/{jury}/voter/{candidat}',[JuryController::class,'voterAud'])->name("jury.voterAud");
});

require __DIR__ . '/auth.php';
