<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {

    $user = Auth::user();
    $prilivi = $user->transactions()->where('inflow', "1")->get();
    $prilivi_suma = 0;
    foreach ($prilivi as $priliv){
        $prilivi_suma += $priliv->amount;
    }
    $odlivi = $user->transactions()->where('inflow', "0")->get();
    $odlivi_suma = 0;
    foreach($odlivi as $odliv){
        $odlivi_suma += $odliv->amount;
    }

    return view('dashboard', ["user" => $user, "prilivi" => $prilivi_suma, "odlivi" => $odlivi_suma]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(\App\Http\Controllers\TransactionController::class)->group(function(){
    Route::get('/transactions', 'index')->name('transactions');
    Route::get('/transaction-create', 'create')->name('transaction.create');
    Route::post('/transaction-store', 'store')->name('transaction.store');
});

require __DIR__.'/auth.php';
