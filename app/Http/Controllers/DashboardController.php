<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // pastikan hanya user login yang bisa akses
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Halaman utama dashboard
    public function index()
    {
        $users = User::count();

        $widget = [
            'users' => $users,
            // Tambahkan data lain kalau ada (misal sensor, produk, dsb.)
        ];

        return view('dashboard.index', compact('widget'));
    }
}
