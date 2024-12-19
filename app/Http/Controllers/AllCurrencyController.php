<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AllCurrencyController extends Controller
{
    public function showAllCurrencies(Request $request)
    {
        // URL API untuk mengambil semua currency
        $url = 'https://cdn.jsdelivr.net/npm/@fawazahmed0/currency-api@latest/v1/currencies.json';

        // Lakukan permintaan GET ke API untuk mengambil semua currency
        $response = Http::get($url);

        if ($response->successful()) {
            $currencies = $response->json();

            // URL untuk mengambil kurs dari SGD ke semua currency
            $rateUrl = 'https://cdn.jsdelivr.net/npm/@fawazahmed0/currency-api@latest/v1/currencies/sgd.json';
            $rateResponse = Http::get($rateUrl);
            $rates = $rateResponse->successful() ? $rateResponse->json()['sgd'] : [];

            // Fitur pencarian berdasarkan Currency Code
            $search = $request->input('search');

            if ($search) {
                // Filter currencies berdasarkan kode mata uang yang dicari
                $currencies = array_filter($currencies, function($key) use ($search) {
                    return stripos($key, $search) !== false; // Cari case-insensitive
                }, ARRAY_FILTER_USE_KEY);
            }

            // Kembalikan data currency dan kurs ke tampilan
            return view('all-currencies', compact('currencies', 'rates', 'search'));
        } else {
            return response()->json(['error' => 'Unable to fetch currency data'], 500);
        }
    }
}