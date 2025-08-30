<?php

use App\Http\Controllers\AprendizController;
use App\Http\Controllers\UserController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\SemilleroController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    // Rutas para Directora y DirectorGrupo (comparten proyectos)
    Route::middleware('role:Directora,DirectorGrupo')->group(function () {
        Route::resource('proyectos', ProyectoController::class);
    });
    
    // Rutas exclusivas para Directora
    Route::middleware('role:Directora')->group(function () {
        Route::resource('semilleros', SemilleroController::class);
        Route::resource('users', UserController::class);
    });

    // Rutas para Aprendiz
    Route::middleware('role:Aprendiz')->group(function () {
        Route::get('/aprendiz', [AprendizController::class, 'index'])->name('aprendiz.index');
        Route::get('/aprendiz/{proyecto}', [AprendizController::class, 'show'])->name('aprendiz.show');
    });
});

require __DIR__.'/auth.php';