<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::orderBy('created_at', 'desc')->get();

        $totalIncome = Transaction::where('type', 'income')->sum('amount');
        $totalExpense = Transaction::where('type', 'expense')->sum('amount');
        $incomeCount = Transaction::where('type', 'income')->count();
        $expenseCount = Transaction::where('type', 'expense')->count();

        $balance = $totalIncome - $totalExpense;

        return view('transactions.index', compact('transactions', 'balance', 'totalIncome', 'totalExpense', 'incomeCount', 'expenseCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric',
            'type' => 'required|in:income,expense',
            'category' => 'required',
            'notes' => 'nullable',
        ]);

        $transaction = Transaction::create([
            'amount' => $validated['amount'],
            'type' => $validated['type'],
            'category' => $validated['category'],
            'notes' => $validated['notes'],
        ]);

        $transaction->save();

        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'type' => 'required|in:income,expense',
            'category' => 'required',
            'notes' => 'nullable',
        ]);

        $transaction->update($request->all());

        return redirect()->route('transactions.index')
            ->with('success', 'Transaction updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index')
            ->with('success', 'Transaction deleted successfully.');
    }
}
