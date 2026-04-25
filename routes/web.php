<?php

use App\Http\Controllers\FaqController;
use App\Http\Controllers\SpecialistController;
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
    Route::resource('faqs', FaqController::class);
    Route::get('/teams', [TeamController::class, 'index']);
    // Speacialist
    Route::get('/specialists', [SpecialistController::class, 'index'])->name('specialists.index');
    Route::get('/specialists/create', [SpecialistController::class, 'create'])->name('specialists.create');
    Route::post('/specialists/store', [SpecialistController::class, 'store'])->name('specialists.store');
    Route::get('/specialists/edit/{id}', [SpecialistController::class, 'edit'])->name('specialists.edit');
    Route::post('/specialists/update/{id}', [SpecialistController::class, 'update'])->name('specialists.update');
    Route::delete('/specialists/destroy/{id}', [SpecialistController::class, 'destroy'])->name('specialists.destroy');
});

require __DIR__.'/settings.php';
