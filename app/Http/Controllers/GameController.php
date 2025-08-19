<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Category;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Menampilkan semua game.
     */
    public function index()
    {
        // Ambil semua game beserta kategori terkait
        $games = Game::with('category')->get();

        // Ambil semua kategori untuk modal tambah/edit
        $categories = Category::all();

        // Pastikan file view ada: resources/views/games/index.blade.php
        return view('game.index', compact('games', 'categories'));
    }

    /**
     * Simpan game baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        Game::create($request->only('name', 'category_id'));

        return redirect()->route('game.index')->with('success', 'Game berhasil ditambahkan!');
    }

    /**
     * Update game.
     */
    public function update(Request $request, Game $game)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        $game->update($request->only('name', 'category_id'));

        return redirect()->route('game.index')->with('success', 'Game berhasil diperbarui!');
    }

    /**
     * Hapus game.
     */
    public function destroy(Game $game)
    {
        $game->delete();

        return redirect()->route('game.index')->with('success', 'Game berhasil dihapus!');
    }
}
