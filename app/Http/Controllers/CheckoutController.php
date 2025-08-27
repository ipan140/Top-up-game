<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TopupType;
use App\Services\MidtransService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    protected $midtrans;

    public function __construct(MidtransService $midtrans)
    {
        $this->midtrans = $midtrans;
    }

    public function checkout(Request $request)
    {
        // Validasi manual supaya response tetap JSON (tidak redirect HTML)
        $validator = Validator::make($request->all(), [
            'topup_type_id' => 'required|exists:topup_types,id',
            'email'        => 'required|email',
            'user_id'      => 'required|string',
            'server_id'    => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $topup  = TopupType::findOrFail($request->topup_type_id);

            // Pastikan gross_amount integer (Midtrans butuh integer)
            $amount = (int) round($topup->price_per_unit);

            // Amanin data user (login / guest)
            $userName  = auth()->check() && !empty(auth()->user()->name) ? auth()->user()->name : 'Guest';
            $userEmail = $request->input('email', (auth()->check() ? (auth()->user()->email ?? 'guest@example.com') : 'guest@example.com'));

            // Parameter transaksi Snap
            $params = [
                'transaction_details' => [
                    'order_id'     => 'ORDER-' . uniqid(),
                    'gross_amount' => $amount,
                ],
                'item_details' => [[
                    'id'       => (string) $topup->id,
                    'price'    => $amount,
                    'quantity' => 1,
                    'name'     => substr($topup->name ?? 'Topup', 0, 50), // jaga-jaga limit nama item
                ]],
                'customer_details' => [
                    'first_name' => $userName,
                    'email'      => $userEmail,
                ],
                // Simpan info tambahan agar mudah ditrace saat notifikasi
                'custom_field1' => $request->input('user_id'),
                'custom_field2' => $request->input('server_id'),
                'custom_field3' => (string) $topup->id,
            ];

            // Dapatkan token Snap (string)
            $snapToken = $this->midtrans->createTransaction($params);

            return response()->json([
                'snap_token' => $snapToken,   // gunakan ini di snap.pay(token)
            ]);

        } catch (\Throwable $e) {
            Log::error('Midtrans checkout error', [
                'message' => $e->getMessage(),
                'trace'   => $e->getTraceAsString(),
            ]);

            return response()->json([
                'error' => 'Gagal membuat transaksi: ' . $e->getMessage(),
            ], 500);
        }
    }
}
