<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\PizzaController;
use  App\Http\Controllers\PublicPizzaController;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/order/{pizza}', [PublicPizzaController::class, 'show'])->name('public.pizzas.show');
Route::middleware('auth')->group(function () {
    Route::get('/pizzas', [PizzaController::class, 'index'])->name('pizzas.index'); // List all pizzas
    Route::get('/pizzas/{pizza}/edit', [PizzaController::class, 'edit'])->name('pizzas.edit'); // Edit a specific pizza
    Route::patch('/pizzas/{pizza}', [PizzaController::class, 'update'])->name('pizzas.update'); // Update a specific pizza

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
