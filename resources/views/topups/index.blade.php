<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Widan Store | Top Up Game Terpercaya</title>
  <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon-mz.png') }}">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #4D2D8C; /* background hitam */
      color: #fff;
      font-family: 'Segoe UI', sans-serif;
    }

    /* Card gelap semi-transparan */
    .card {
      background-color: rgba(40, 40, 40, 0.95);
      color: #fff;
      border-radius: 12px;
      border: none;
    }

    .card-header {
      background-color: #1f1f1f;
      color: #fff;
      font-weight: 600;
      font-size: 1.1rem;
    }

    /* Tombol Topup */
    .topup-btn {
      min-width: 160px;
      min-height: 100px;
      border-radius: 12px;
      font-size: 16px;
      text-align: center;
      transition: all 0.2s ease-in-out;
      color: #fff;
      border: 2px solid #fff;
      background-color: transparent;
    }

    .topup-btn:hover {
      background-color: #0d6efd;
      border-color: #0d6efd;
      color: #fff;
      transform: scale(1.05);
    }

    .topup-btn.active {
      background-color: #0d6efd;
      border-color: #0d6efd;
      color: #fff;
    }

    .topup-btn div,
    .topup-btn small {
      white-space: normal;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    /* Tombol metode pembayaran */
    .btn-outline-primary,
    .btn-outline-success,
    .btn-outline-warning,
    .btn-outline-info {
      color: #fff;
      border-width: 2px;
    }

    .btn-outline-primary:hover,
    .btn-outline-success:hover,
    .btn-outline-warning:hover,
    .btn-outline-info:hover {
      color: #fff;
      filter: brightness(1.2);
    }

    /* Input field */
    .form-control {
      background-color: #222;
      color: #fff;
      border: 1px solid #444;
    }

    .form-control::placeholder {
      color: #bbb;
    }

    /* Footer link & teks */
    small.text-muted {
      color: #ccc;
    }
  </style>
</head>

<body>
  @include('componen.header')

  <div class="container py-5">
    @if(isset($game))
      <!-- Game Header -->
      <div class="text-center mb-4">
        <img src="{{ asset('storage/' . $game->image) }}" alt="{{ $game->name }}" class="img-fluid mb-3 rounded-circle"
          style="max-height:120px; border: 2px solid #fff;">
        <h3>{{ $game->name }}</h3>
        <p class="text-muted">{{ $game->publisher }}</p>
      </div>

      <!-- Step 1: User ID -->
      <div class="card shadow-sm mb-4">
        <div class="card-header">
          <strong>1. Masukkan User ID</strong>
        </div>
        <div class="card-body">
          <input type="text" class="form-control mb-2" placeholder="Masukkan User ID">
          <input type="text" class="form-control" placeholder="Server ID">
          <small class="text-muted">Cek di profil game kamu untuk menemukan User ID dan Server ID.</small>
        </div>
      </div>

      <!-- Step 2: Pilih Nominal -->
      <div class="card shadow-sm mb-4">
        <div class="card-header text-center">
          <strong>2. Pilih Nominal Topup</strong>
        </div>
        <div class="card-body">
          <div class="row">
            @foreach($game->topupTypes as $topup)
              <div class="col-6 col-md-3 mb-3">
                <button type="button"
                  class="topup-btn w-100 h-100 py-4 d-flex flex-column align-items-center justify-content-center"
                  data-id="{{ $topup->id }}">
                  <div class="fw-bold fs-6">{{ $topup->name }}</div>
                  <small class="d-block">Rp {{ number_format($topup->price_per_unit, 0, ',', '.') }}</small>
                </button>
              </div>
            @endforeach
          </div>
          <input type="hidden" name="topup_id" id="topup_id">
        </div>
      </div>

      <!-- Step 3: Pilih Pembayaran -->
      <div class="card shadow-sm mb-4">
        <div class="card-header">
          <strong>3. Pilih Metode Pembayaran</strong>
        </div>
        <div class="card-body">
          <div class="d-flex gap-3 flex-wrap">
            <button class="btn btn-outline-primary"><i class="fa-brands fa-cc-visa"></i> Visa</button>
            <button class="btn btn-outline-success"><i class="fa-brands fa-paypal"></i> PayPal</button>
            <button class="btn btn-outline-warning"><i class="fa-solid fa-wallet"></i> E-Wallet</button>
            <button class="btn btn-outline-info"><i class="fa-solid fa-money-bill"></i> Bank Transfer</button>
          </div>
        </div>
      </div>

      <!-- Step 4: Detail -->
      <div class="card shadow-sm mb-4">
        <div class="card-header">
          <strong>4. Detail</strong>
        </div>
        <div class="card-body">
          <input type="email" class="form-control mb-2" placeholder="Email untuk bukti transaksi">
          <small class="text-muted">Pastikan email benar agar bukti transaksi bisa terkirim.</small>
        </div>
      </div>

      <!-- Tombol Proses -->
      <div class="text-center">
        <button class="btn btn-lg btn-primary my-3">
          <i class="fa-solid fa-bolt"></i> Proses Topup
        </button>
      </div>

    @elseif(isset($games))
      <!-- Jika belum pilih game → tampilkan daftar game -->
      <h3 class="mb-4 text-center">Pilih Game untuk Topup</h3>
      <div class="row">
        @foreach($games as $g)
          <div class="col-md-3 mb-3">
            <div class="card h-100 text-center">
              <img src="{{ asset('storage/' . $g->image) }}" alt="{{ $g->name }}" class="card-img-top p-3"
                style="max-height:150px; object-fit:contain; border-radius: 12px;">
              <div class="card-body">
                <h5>{{ $g->name }}</h5>
                <p class="text-muted">{{ $g->publisher }}</p>
                <a href="{{ route('topups.index', ['game_id' => $g->id]) }}" class="btn btn-primary btn-sm">
                  Topup Sekarang
                </a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @endif
  </div>

  @include('componen.footer')

  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      // pilih topup
      document.querySelectorAll('.topup-btn').forEach(btn => {
        btn.addEventListener('click', function () {
          document.querySelectorAll('.topup-btn').forEach(el => el.classList.remove('active'));
          this.classList.add('active');
          document.getElementById('topup_id').value = this.getAttribute('data-id');
        });
      });
    });
  </script>
</body>

</html>
