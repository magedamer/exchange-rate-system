<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Amount;

class AmountController extends Controller
{
    public function index()
    {
        $amounts = Amount::where('user_id', auth()->id())->get();
        $exchangeRates = config('exchange_rates.rates');
        return view('amounts.index', compact('amounts', 'exchangeRates'));
    }

    public function create()
    {
        $exchangeRates = config('exchange_rates.rates');
        return view('amounts.create', compact('exchangeRates'));
    }

    public function store(Request $request)
    {
        $amount = new Amount();
        $amount->user_id = auth()->id();
        $amount->currency = $request->input('currency');
        $amount->amount = $request->input('amount');
        $amount->save();
        return redirect()->route('amounts.index')->with('success', 'Amount added successfully');
    }

    public function edit(Amount $amount)
    {
        $exchangeRates = config('exchange_rates.rates');
        return view('amounts.edit', compact('amount', 'exchangeRates'));
    }

    public function update(Request $request, Amount $amount)
    {
        $amount->currency = $request->input('currency');
        $amount->amount = $request->input('amount');
        $amount->save();
        return redirect()->route('amounts.index')->with('success', 'Amount updated successfully');
    }

    public function destroy(Amount $amount)
    {
        $amount->delete();
        return redirect()->route('amounts.index')->with('success', 'Amount deleted successfully');
    }
}