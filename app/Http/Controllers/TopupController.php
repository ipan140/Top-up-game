<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class TopupController extends Controller
{
    /**
     * Tampilkan halaman topup berdasarkan game_id (atau default game pertama).
     */
    public function index(Request $request)
    {
        if ($request->has('game_id')) {
            // Kalau ada parameter game_id di URL
            $game = Game::with('topupTypes')->find($request->game_id);

            if (!$game) {
                return redirect()->route('topups.index')
                    ->with('error', 'Game dengan ID tersebut tidak ditemukan.');
            }
        } else {
            // Kalau tidak ada parameter game_id, ambil game pertama
            $game = Game::with('topupTypes')->first();

            if (!$game) {
                return redirect()->back()->with('error', 'Belum ada game tersedia.');
            }
        }

        // Kalau game ditemukan tetapi tidak punya topupTypes
        if ($game->topupTypes->isEmpty()) {
            return redirect()->back()->with('warning', 'Belum ada tipe topup untuk game ini.');
        }

        // kirim ke view termasuk harga tiap topup
        return view('topups.index', [
            'game' => $game,
            'topupTypes' => $game->topupTypes->map(function ($topup) {
                return [
                    'id' => $topup->id,
                    'name' => $topup->name,
                    'price' => $topup->price, // pastikan kolom price ada di tabel topup_types
                    'unit' => $topup->unit ?? null, // kalau ada field unit
                ];
            }),
        ]);
    }
     public function show($id)
    {
        // Cari game berdasarkan ID
        $game = Game::with('topupTypes')->findOrFail($id);

        // Kalau belum ada tipe topup
        if ($game->topupTypes->isEmpty()) {
            return redirect()->back()->with('warning', 'Belum ada tipe topup untuk game ini.');
        }

        // Kirim data game ke view
        return view('topups.index', compact('game'));
    }
}