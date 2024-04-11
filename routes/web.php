<?php

use App\Http\Controllers\ProfileController;
use App\Models\Transaction;
use Carbon\Carbon;
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
    $prilivi_data = [];
    if(count($prilivi) > 0){
        $prilivi_data[0] = $prilivi[0]->amount;
    }
    foreach ($prilivi as $idx => $priliv){
        if($idx >= 1){
            $prilivi_data[$idx] = $prilivi_data[$idx - 1] + $priliv->amount;
        }
        $prilivi_suma += $priliv->amount;
    }
    $odlivi = $user->transactions()->where('inflow', "0")->get();
    $odlivi_suma = 0;
    $odlivi_data = [];
    if(count($odlivi) > 0){
        $odlivi_data[0] = $odlivi[0]->amount;
    }
    foreach($odlivi as $idx => $odliv){
        if($idx >= 1){
            $odlivi_data[$idx] = $prilivi_data[$idx - 1] + $odliv->amount;
        }
        $odlivi_suma += $odliv->amount;
    }

    $valuta = $user->currency;

    if(count($odlivi_data) > count($prilivi_data)){
        $razlika = count($odlivi_data) - count($prilivi_data);
        $last = $prilivi_data[count($prilivi_data) - 1];
        for($i = 0; $i < $razlika; $i++){
            array_push($prilivi_data, $last);
        }
    }
    else if(count($prilivi_data) > count($odlivi_data)){
        $razlika = count($prilivi_data) - count($odlivi_data);
        $last = $odlivi_data[count($odlivi_data) - 1];
        for($i = 0; $i < $razlika; $i++){
            array_push($odlivi_data, $last);
        }
    }

    return view('dashboard', ["user" => $user, "prilivi" => $prilivi_suma, "odlivi" => $odlivi_suma, "valuta" => $valuta, "prilivi_data" => $prilivi_data, "odlivi_data" => $odlivi_data]);
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
