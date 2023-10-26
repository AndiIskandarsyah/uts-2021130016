<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //Ambil data artikel diurutkan berdasarkan tanggal terbaru. lalu tampilkan 7 artikel per halaman
        $transactions = Transaction::query()->orderBy('created_at')->paginate(7);
        //Ambil artikel pertama dari hasil query diatas
        return view('landing', compact('transactions'));
    }
}
