<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\contEmploye;
use App\Http\Controllers\contUtilisateur;
use App\Http\Controllers\pointage;
use App\Http\Controllers\contConge;
use App\Http\Controllers\dashboardApp;
use Sopamo\LaravelFilepond\Http\Controllers\FilepondController;
use App\Http\Controllers\FileUploadController; 

Route::get('/', function () {
    return view('welcome');
});


Route::post('/upload/process', [contEmploye::class, 'process'])->name('upload.process');
Route::delete('/upload/revert', [contEmploye::class, 'revert'])->name('upload.revert');
Route::post('/upload/process', [contUtilisateur::class, 'process'])->name('upload.process');
Route::delete('/upload/revert', [contUtilisateur::class, 'revert'])->name('upload.revert');

// 2. Debug (Gardez ceci pour vérifier si votre modifie php.ini est bien active)
Route::get('/check-php', function() {
    return response()->json([
        'upload_max' => ini_get('upload_max_filesize'),
        'post_max' => ini_get('post_max_size'),
        'memory' => ini_get('memory_limit'),
        'max_input_time' => ini_get('max_input_time'),
    ]);
});
// ->middleware('check.session')
// 3. Vos routes applicatives
Route::prefix('employe')->group(function () {
    Route::get('/createEmploye', [contEmploye::class, 'index'])->name('employe.index');
    Route::post('/createEmploye', [contEmploye::class, 'store'])->name('employe.store');
    Route::get('/listeEmploye', [contEmploye::class, 'liste'])->name('employe.listeEmploye');
    Route::delete('/{id}', [contEmploye::class, 'destroy'])->name('employe.destroy');
    Route::get('/edit/{id}', [contEmploye::class, 'edit'])->name('employe.edit');
    Route::put('/edit/{id}', [contEmploye::class, 'update'])->name('employe.update');
    Route::get('/search', [contEmploye::class, 'searchEmploye'])->name('employe.search');
});
Route::prefix('presence')->group(function(){
    Route::get('/presenceAjout', [pointage::class, 'presence'])->name('presence.presenceAjout');
    Route::post('/presenceAjout',[pointage::class, 'storePointage'])->name('store.pointage');
    Route::put('/presenceAjout/{id}', [pointage::class, 'updatePointage'])->name('update.pointage');
    Route::get('/recherche', [pointage::class, 'searchPresence'])->name('presence.recherche');

});
Route::prefix('authentification')->group(function () {
    Route::get('/user', [contUtilisateur::class, 'index'])->name('login');
    Route::get('/register', [contUtilisateur::class, 'register'])->name('authentification.register');
    Route::post('/register', [contUtilisateur::class, 'store'])->name('authentification.store');
    Route::post('/user', [contUtilisateur::class, 'login'])->name('user.login');
    Route::get('/logout', [contUtilisateur::class, 'logout'])->name('user.logout');
});
Route::prefix('conge')->group(function(){
    Route::get('/congeAjout', [contConge::class, 'conge'])->name('conge.demandeConge');
    Route::post('/congeAjout', [contConge::class, 'demandeConge'])->name('conge.demande');
    Route::get('/liste', [contConge::class, 'liste'])->name('conge.liste');
});
Route::prefix('index')->group(function(){
    Route::get('/dashboardApp', [dashboardApp::class, 'dashboard'])->name('index.dashboard');
    // Route::get('/layout', [dashboardApp::class, 'searchPresence'])->name('index.search');
});
