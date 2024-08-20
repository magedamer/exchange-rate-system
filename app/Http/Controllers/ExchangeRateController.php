<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class AmountController extends Controller
{
    public function index()
    {
        $exchangeRates = config('exchange_rates.rates');
        return view('index', compact('exchangeRates'));
    }

    public function add(Request $request)
    {
        $exchangeRates = config('exchange_rates.rates');
        $exchangeRates[$request->input('currency')] = $request->input('rate');
        file_put_contents(config_path('exchange_rates.php'), '<?php return [' . "\n" . '    \'rates\' => ' . var_export($exchangeRates, true) . ',' . "\n" . '];');
        \Artisan::call('config:clear'); // Clear config cache
        return redirect()->route('amount.index')->with('success', 'Exchange rate added successfully');
    }

    public function update(Request $request)
    {
        $exchangeRates = config('exchange_rates.rates');
        $exchangeRates[$request->input('currency')] = $request->input('rate');
        file_put_contents(config_path('exchange_rates.php'), '<?php return [' . "\n" . '    \'rates\' => ' . var_export($exchangeRates, true) . ',' . "\n" . '];');
        \Artisan::call('config:clear'); // Clear config cache
        return redirect()->route('amount.index')->with('success', 'Exchange rate updated successfully');
    }
}