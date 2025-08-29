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
            'user_id'       => 'required|exists:users,id',
            'topup_type_id' => 'required|exists:topup_types,id',
            'quantity'      => 'required|integer|min:1',
        ]);

        // Hitung harga total
        $topupType   = TopupType::findOrFail($data['topup_type_id']);
        $grossAmount = $topupType->price_per_unit * $data['quantity'];
        $orderId     = 'ORDER-' . uniqid();

        // Simpan transaksi ke database (status pending)
        $transaction = TopupTransaction::create([
            'user_id'       => $data['user_id'],
            'topup_type_id' => $data['topup_type_id'],
            'quantity'      => $data['quantity'],
            'total_price'   => $grossAmount,
            'order_id'      => $orderId,
            'status'        => 'pending',
        ]);

        // Konfigurasi Midtrans
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false; // true kalau sudah live
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id'     => $orderId,
                'gross_amount' => $grossAmount,
            ],
            'customer_details' => [
                'first_name' => $transaction->user->name,
                'email'      => $transaction->user->email,
            ]
        ];

        // Dapatkan Snap Token
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        // Kirim token ke view untuk dipanggil Snap JS
        return view('topup_transactions.pay', compact('snapToken', 'transaction'));
    }


    /**
     * Update topup transaction.
     */
    public function update(Request $request, TopupTransaction $transaction)
    {
        $data = $request->validate([
            'quantity' => 'required|integer|min:1',
            'status'   => 'required|in:pending,success,failed'
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
