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
        // Validasi
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

            $amount = (int) round($topup->price_per_unit);

            $userName  = 'User-' . $request->user_id; // biar ada nama
            $userEmail = $request->email;

            $params = [
                'transaction_details' => [
                    'order_id'     => 'ORDER-' . uniqid(),
                    'gross_amount' => $amount,
                ],
                'item_details' => [[
                    'id'       => (string) $topup->id,
                    'price'    => $amount,
                    'quantity' => 1,
                    'name'     => substr($topup->name ?? 'Topup', 0, 50),
                ]],
                'customer_details' => [
                    'first_name' => $userName,
                    'email'      => $userEmail,
                ],
                'custom_field1' => $request->user_id,
                'custom_field2' => $request->server_id,
                'custom_field3' => (string) $topup->id,
            ];

            // Buat token Snap
            $snapToken = $this->midtrans->createTransaction($params);

            return response()->json([
                'snap_token' => $snapToken,
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
