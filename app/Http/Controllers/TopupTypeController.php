<?php

namespace App\Http\Controllers;

use App\Models\TopupType;
use App\Models\Game;
use Illuminate\Http\Request;

class TopupTypeController extends Controller
{
    // Tampilkan semua Topup Type
    public function index()
    {
        $topupTypes = TopupType::with('game')->get();
        $games = Game::all(); // untuk dropdown di modal tambah/edit
        return view('topup_types.index', compact('topupTypes', 'games'));
    }

    // Simpan Topup Type baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'game_id' => 'required|exists:games,id',
            'name' => 'required',
            'price_per_unit' => 'required|numeric',
        ]);

        TopupType::create($data);

        return redirect()->route('topup_types.index')->with('success', 'Topup Type berhasil ditambahkan!');
    }

    // Update Topup Type
    public function update(Request $request, TopupType $topupType)
    {
        $data = $request->validate([
            'game_id' => 'required|exists:games,id',
            'name' => 'required',
            'price_per_unit' => 'required|numeric',
        ]);

        $topupType->update($data);

        return redirect()->route('topup_types.index')->with('success', 'Topup Type berhasil diperbarui!');
    }

    // Hapus Topup Type
    public function destroy(TopupType $topupType)
    {
        $topupType->delete();
        return redirect()->route('topup_types.index')->with('success', 'Topup Type berhasil dihapus!');
    }
}
