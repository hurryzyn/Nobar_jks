<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User as UserTable;
use App\Models\Booking;


class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil jumlah pengguna terdaftar
        $totalUsers = UserTable::count();

        // Mengambil total transaksi bulan ini dengan status 'paid'
        $totalTransactions = Booking::where('status', 'paid')
                                    ->whereMonth('created_at', now()->month)
                                    ->count();

        // Mengirim data ke view
        return view('admin.dashboard.dashboard', compact('totalUsers', 'totalTransactions'));
    }
}
