<?php

namespace App\Http\Controllers;

use App\Models\TopupTransaction;
use App\Models\TopupType;
use App\Models\User;
use Illuminate\Http\Request;

class TopupTransactionController extends Controller
{
    /**
     * Menampilkan semua topup transaction.
     */
    public function index()
    {
        $transactions = TopupTransaction::with('user', 'topupType.game')->get();
        $users = User::all();
        $topupTypes = TopupType::with('game')->get();
        return view('topup_transactions.index', compact('transactions', 'users', 'topupTypes'));
    }

    /**
     * Simpan topup transaction baru.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'topup_type_id' => 'required|exists:topup_types,id',
            'quantity' => 'required|integer|min:1',
            'status' => 'required|in:pending,completed,failed'
        ]);

        // Hitung total_price dari topup_type
        $topupType = TopupType::findOrFail($data['topup_type_id']);
        $data['total_price'] = $topupType->price_per_unit * $data['quantity'];

        TopupTransaction::create($data);

        return redirect()->route('topup_transactions.index')->with('success', 'Topup transaction berhasil ditambahkan!');
    }

    /**
     * Update topup transaction.
     */
    public function update(Request $request, TopupTransaction $transaction)
    {
        $data = $request->validate([
            'quantity' => 'required|integer|min:1',
            'status' => 'required|in:pending,completed,failed'
        ]);

        // Update total_price sesuai quantity baru
        $data['total_price'] = $transaction->topupType->price_per_unit * $data['quantity'];

        $transaction->update($data);

        return redirect()->route('topup_transactions.index')->with('success', 'Topup transaction berhasil diperbarui!');
    }

    /**
     * Hapus topup transaction.
     */
    public function destroy(TopupTransaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('topup_transactions.index')->with('success', 'Topup transaction berhasil dihapus!');
    }
}
