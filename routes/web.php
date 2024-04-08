<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Redirect;
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

    $valuta = $user->currency;

    return view('dashboard', ["user" => $user, "prilivi" => $prilivi_suma, "odlivi" => $odlivi_suma, "valuta" => $valuta]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(\App\Http\Controllers\TransactionController::class)->middleware('auth')->group(function(){
    Route::get('/transactions', 'index')->name('transactions');
    Route::get('/transaction-create', 'create')->name('transaction.create');
    Route::post('/transaction-store', 'store')->name('transaction.store');
    Route::delete('/transaction-delete/{id}', 'destroy')->name('transaction.delete');
    Route::patch('/transaction-modify/{id}', 'update')->name('transaction.modify');
});

Route::controller(\App\Http\Controllers\CyclicalTransactionController::class)->middleware('auth')->group(function(){
    Route::get('/cyclical-transactions', 'index')->name('cyclicalTransactions');
});

Route::get('/add-category', function() {
    return view('add-category');
})->name('category.add');

Route::post('/add-category', function(\Illuminate\Http\Request $request) {
    \App\Models\Category::create([
        "ime" => $request->name,
        "boja" => $request->color,
    ]);
    return redirect()->route('transaction.create');
})->name('category.save');

Route::middleware('auth')->get('/conversions', function() {
    $balance = Auth::user()->balance;
    $currency = Auth::user()->currency;
    return view('conversions', ["balance" => $balance, "baseCurrency" => $currency]);

})->name('conversions');

Route::get('/setCurrency', function() {
    return view('setCurrency');
})->name('setCurrency');

Route::post('/setCurrency', function(\Illuminate\Http\Request $request) {
    $user = Auth::user();
    $user->balance = $request->balance;
    $user->currency = $request->currency;
    $user->save();
    return redirect()->route('dashboard');
})->name('setCurrency');

require __DIR__.'/auth.php';
