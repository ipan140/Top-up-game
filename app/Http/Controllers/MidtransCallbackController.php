<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TopupTransaction;
use Illuminate\Support\Facades\Log;
use Midtrans\Notification;

class MidtransCallbackController extends Controller
{
    public function handle(Request $request)
    {
        $notification = new Notification();

        $orderId = $notification->order_id;
        $status  = $notification->transaction_status;
        $type    = $notification->payment_type;

        $transaction = TopupTransaction::where('order_id', $orderId)->first();

        if ($transaction) {
            $transaction->update([
                'status'       => $status,
                'payment_type' => $type,
            ]);
        }

        Log::info("Midtrans callback received", [
            'order_id' => $orderId,
            'status'   => $status,
            'type'     => $type,
        ]);

        return response()->json(['message' => 'ok']);
    }
}
