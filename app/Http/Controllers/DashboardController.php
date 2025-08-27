<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // hitung user dan admin saja
        $users = User::whereIn('role', ['user', 'admin'])->count();

        $widget = [
            'users' => $users,
        ];

        return view('dashboard.index', compact('widget'));
    }
}
