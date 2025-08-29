@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Checkout</h2>
    
    <form id="checkoutForm">
        @csrf
        <input type="hidden" id="topup_id" name="topup_type_id" value="1">

        <div class="mb-3">
            <label>Email</label>
            <input type="email" id="user_email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>User ID</label>
            <input type="text" id="user_id" name="user_id" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Server ID</label>
            <input type="text" id="server_id" name="server_id" class="form-control" required>
        </div>

        <button type="button" id="btn_proses" class="btn btn-primary">
            Proses Topup
        </button>
    </form>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>

<script>
document.getElementById('btn_proses').addEventListener('click', function () {
    let formData = new FormData(document.getElementById('checkoutForm'));

    fetch("{{ route('checkout.process') }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
        },
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if (data.snap_token) {
            snap.pay(data.snap_token, {
                onSuccess: function(result) {
                    window.location.href = "/checkout/success"; // arahkan ke page sukses
                },
                onPending: function(result) {
                    window.location.href = "/checkout/pending"; // page pending
                },
                onError: function(result) {
                    window.location.href = "/checkout/failed"; // page gagal
                },
                onClose: function() {
                    alert('Kamu menutup pembayaran sebelum selesai');
                }
            });
        } else {
            alert(data.error || 'Gagal membuat transaksi');
        }
    });
});
</script>
@endsection
