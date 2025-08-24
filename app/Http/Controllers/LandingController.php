<?php

namespace App\Http\Controllers;

use App\Models\Category;

class LandingController extends Controller
{
    public function index()
    {
        // Ambil semua kategori beserta game-game nya
        $categories = Category::with('games')->get();

        return view('Landing.index', compact('categories'));
    }
}
