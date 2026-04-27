<?php

use App\Http\Controllers\DivisionController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\SpecialistController;
use App\Http\Controllers\SpecialtyRiskController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::inertia('/', 'Welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');

Route::get('/register', function () {
    return redirect(route('login'));
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::inertia('dashboard', 'Dashboard')->name('dashboard');

    // Hero
    Route::get('/hero', [HeroController::class, 'index'])->name('hero.index');
    Route::get('/hero/create', [HeroController::class, 'create'])->name('hero.create');
    Route::post('/hero/store', [HeroController::class, 'store'])->name('hero.store');
    Route::get('/hero/edit/{id}', [HeroController::class, 'edit'])->name('hero.edit');
    Route::post('/hero/update/{id}', [HeroController::class, 'update'])->name('hero.update');
    Route::delete('/hero/destroy/{id}', [HeroController::class, 'destroy'])->name('hero.destroy');

    // Faq
    Route::resource('faqs', FaqController::class);
    // Specialty Risk
    Route::resource('specialty-risk', SpecialtyRiskController::class);
    // Divisions
    Route::get('/our-divisions', [DivisionController::class, 'index'])->name('divisions.index');
    Route::get('/divisions/create', [DivisionController::class, 'create'])->name('divisions.create');
    Route::post('/divisions/store', [DivisionController::class, 'store'])->name('divisions.store');
    Route::get('/divisions/edit/{id}', [DivisionController::class, 'edit'])->name('divisions.edit');
    Route::post('/divisions/update/{id}', [DivisionController::class, 'update'])->name('divisions.update');
    Route::delete('/divisions/destroy/{id}', [DivisionController::class, 'destroy'])->name('divisions.destroy');

    // Team
    Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
    Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
    Route::post('/teams/store', [TeamController::class, 'store'])->name('teams.store');
    Route::get('/teams/edit/{id}', [TeamController::class, 'edit'])->name('teams.edit');
    Route::post('/teams/update/{id}', [TeamController::class, 'update'])->name('teams.update');
    Route::delete('/teams/destroy/{id}', [TeamController::class, 'destroy'])->name('teams.destroy');

    // Specialist
    Route::get('/specialists', [SpecialistController::class, 'index'])->name('specialists.index');
    Route::get('/specialists/create', [SpecialistController::class, 'create'])->name('specialists.create');
    Route::post('/specialists/store', [SpecialistController::class, 'store'])->name('specialists.store');
    Route::get('/specialists/edit/{id}', [SpecialistController::class, 'edit'])->name('specialists.edit');
    Route::post('/specialists/update/{id}', [SpecialistController::class, 'update'])->name('specialists.update');
    Route::delete('/specialists/destroy/{id}', [SpecialistController::class, 'destroy'])->name('specialists.destroy');
});

require __DIR__.'/settings.php';
