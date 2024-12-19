<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CurrencyController extends Controller
{
    public function getSGDRates()
    {
        // URL API untuk mengambil kurs SGD ke IDR, RMB, MYR, USD, dan SGD
        $url = 'https://cdn.jsdelivr.net/npm/@fawazahmed0/currency-api@latest/v1/currencies/sgd.json';

        // Lakukan permintaan GET ke API
        $response = Http::get($url);

        // Cek apakah permintaan berhasil
        if ($response->successful()) {
            // Ambil hasil konversi dari response
            $data = $response->json();

            // Ambil konversi mata uang yang diinginkan (SGD ke IDR, RMB, MYR, USD, SGD)
            $rates = [
                'IDR' => $data['sgd']['idr'] ?? null,
                'RMB' => $data['sgd']['cny'] ?? null,
                'MYR' => $data['sgd']['myr'] ?? null,
                'USD' => $data['sgd']['usd'] ?? null,
                'JPY' => $data['sgd']['jpy'] ?? null,
                'SGD' => $data['sgd']['sgd'] ?? null, // Selalu 1
            ];

            // Ambil daftar mata uang untuk mendapatkan nama mata uang
            $currencyListUrl = 'https://cdn.jsdelivr.net/npm/@fawazahmed0/currency-api@latest/v1/currencies.json';
            $currencyResponse = Http::get($currencyListUrl);

            if ($currencyResponse->successful()) {
                $currencies = $currencyResponse->json();
                Log::info('Currencies data:', $currencies); // Log data currencies
            } else {
                $currencies = [];
                Log::error('Failed to fetch currencies data');
            }

            // Kembalikan data ke tampilan
            return view('currency-table', compact('rates', 'currencies'));
        } else {
            // Fallback jika API utama gagal, gunakan fallback URL
            $fallbackUrl = 'https://latest.currency-api.pages.dev/v1/currencies/sgd.json';
            $fallbackResponse = Http::get($fallbackUrl);

            if ($fallbackResponse->successful()) {
                $data = $fallbackResponse->json();
                $rates = [
                    'IDR' => $data['sgd']['idr'] ?? null,
                    'RMB' => $data['sgd']['cny'] ?? null,
                    'MYR' => $data['sgd']['myr'] ?? null,
                    'USD' => $data['sgd']['usd'] ?? null,
                    'JPY' => $data['sgd']['jpy'] ?? null,
                    'SGD' => $data['sgd']['sgd'] ?? null, // Selalu 1
                ];

                // Ambil daftar mata uang untuk mendapatkan nama mata uang
                $currencyListUrl = 'https://cdn.jsdelivr.net/npm/@fawazahmed0/currency-api@latest/v1/currencies.json';
                $currencyResponse = Http::get($currencyListUrl);

                if ($currencyResponse->successful()) {
                    $currencies = $currencyResponse->json();
                    Log::info('Fallback currencies data:', $currencies); // Log data currencies
                } else {
                    $currencies = [];
                    Log::error('Failed to fetch fallback currencies data');
                }

                // Kembalikan data ke tampilan
                return view('currency-table', compact('rates', 'currencies'));
            } else {
                // Kembalikan error jika API gagal
                return response()->json(['error' => 'Unable to fetch currency data'], 500);
            }
        }
    }
}