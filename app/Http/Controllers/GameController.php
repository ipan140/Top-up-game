<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Category;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::with('category')->get();
        $categories = Category::all();
        return view('games.index', compact('games', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('games.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['category_id', 'name']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('games', 'public');
        }

        Game::create($data);

        return redirect()->route('games.index')->with('success', 'Game berhasil ditambahkan!');
    }

    public function edit(Game $game)
    {
        $categories = Category::all();
        return view('games.edit', compact('game', 'categories'));
    }

    public function update(Request $request, Game $game)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['category_id', 'name']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('games', 'public');
        }

        $game->update($data);

        return redirect()->route('games.index')->with('success', 'Game berhasil diperbarui!');
    }

    public function destroy(Game $game)
    {
        $game->delete();
        return redirect()->route('games.index')->with('success', 'Game berhasil dihapus!');
    }

    
    // App\Models\Game.php
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
