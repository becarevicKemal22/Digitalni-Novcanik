<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $transactions = $user->transactions()->with('category');
        if(request('category')){
            $cat_id = $request->input('category');
            if($cat_id != 0){
                $transactions = $transactions->where('category_id', $cat_id);
            }
        }
        if(request('date')){
            $date = $request->input('date');
            $transactions = $transactions->where('date', $date);
        }
        $transactions = $transactions->orderBy('created_at', 'desc')->get();

        $valuta = $user->currency;

        $categories = Category::all();
        return view('transactions', ['transactions'=>$transactions, 'categories' => $categories, 'currency' => $valuta]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::all();
        return view('create-transaction', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $transaction = Transaction::make([
            "name" => $request->name,
            "user_id" => $user_id,
            "amount" => $request->amount,
            "category_id" => $request->category,
            "repetition_interval" => $request->interval,
            "date" => $request->date,
            "inflow" => $request->inflow == "inflow",
        ]);
        $user = User::where('id', $user_id)->first();
        if($transaction->inflow){
            $user->balance += $transaction->amount;
        }else{
            $user->balance -= $transaction->amount;
        }
        $user->save();
        $transaction->save();

        return redirect()->route('transactions');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transaction = Transaction::where('id', $id)->first();
        if($request->input('repetition_interval')){
            $transaction->repetition_interval = $request->repetition_interval;
        }
        if($request->input('amount')){
            $transaction->amount = $request->amount;
        }
        $transaction->save();
        return redirect()->route('transactions');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaction = Transaction::findOrFail($id);
        $user = Auth::user();
        if($transaction->inflow){
            $user->balance -= $transaction->amount;
        }else{
            $user->balance += $transaction->amount;
        }
        $user->save();
        $transaction->delete();
        return redirect()->route('transactions');
    }
}
