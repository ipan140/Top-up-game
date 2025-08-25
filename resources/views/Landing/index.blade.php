<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Top Up Game Terpercaya</title>
  <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon-mz.png') }}">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #4D2D8C;
      color: #fff;
      font-family: 'Segoe UI', sans-serif;
    }

    /* Banner */
    .main-banner {
      background: #111 url('{{ asset("assets/images/banner-bg.jpg") }}') no-repeat center/cover;
      color: #fff;
      padding: 50px 15px;
      /* lebih kecil dari sebelumnya */
      text-align: center;
    }

    .main-banner h4 em {
      font-style: normal;
      color: #0d6efd;
    }

    .main-banner h6 {
      font-size: 1.5rem;
      font-weight: 600;
    }

    .main-banner h4 {
      font-size: 2rem;
      font-weight: 700;
      margin-top: 10px;
    }

    /* Carousel */
    .carousel-inner {
      max-width: 80%;
      margin: 20px auto 0;
    }

    .carousel-inner img {
      border-radius: 12px;
      width: 50%;
      max-height: 1000px;
      /* batasi tinggi slider */
      object-fit: cover;
    }

    .carousel-indicators button {
      background-color: #0d6efd;
    }

    /* Game cards */
    .card-game {
      background-color: rgba(40, 40, 40, 0.95);
      color: #fff;
      border-radius: 12px;
      border: none;
      transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }

    .card-game:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
    }

    .card-game img {
      border-radius: 12px;
      max-height: 120px;
      /* lebih compact */
      object-fit: contain;
      margin-bottom: 12px;
    }

    .card-game h5 {
      font-size: 1rem;
      margin-bottom: 5px;
    }

    .card-game p {
      font-size: 0.85rem;
      color: #ccc;
      margin-bottom: 10px;
    }

    .card-game .btn {
      font-size: 0.85rem;
      border-radius: 8px;
      width: 100%;
      /* full width di mobile */
    }

    /* Section spacing */
    .most-popular {
      padding: 40px 0;
      /* lebih compact */
    }

    .most-popular h4 {
      margin-bottom: 30px;
      font-size: 1.75rem;
    }

    h5 {
      margin-bottom: 15px;
      color: #fff;
    }

    .text-muted {
      color: #ccc !important;
    }

    /* Responsive adjustments */
    @media (max-width: 991px) {
      .main-banner h6 {
        font-size: 1.3rem;
      }

      .main-banner h4 {
        font-size: 1.5rem;
      }

      .carousel-inner {
        max-width: 90%;
      }

      .carousel-inner img {
        max-height: 250px;
      }
    }

    @media (max-width: 767px) {
      .main-banner {
        padding: 30px 10px;
      }

      .main-banner h6 {
        font-size: 1.1rem;
      }

      .main-banner h4 {
        font-size: 1.3rem;
      }

      .carousel-inner {
        max-width: 100%;
      }

      .carousel-inner img {
        max-height: 180px;
        /* super compact untuk HP */
      }

      .card-game img {
        max-height: 100px;
      }

      .most-popular h4 {
        font-size: 1.4rem;
      }
    }

    .info-section {
      background-color: #2c1652;
      color: #fff;
      border-radius: 12px;
      padding: 40px 20px;
      /* lebih compact di mobile */
      margin: 40px 0;
    }

    .info-section h3 {
      font-weight: 700;
      font-size: 1.8rem;
      text-align: center;
    }

    .info-section h5 {
      font-weight: 600;
      margin-bottom: 5px;
      font-size: 1rem;
    }

    .info-section p {
      font-size: 0.9rem;
      color: #ccc;
      margin: 0;
    }

    .info-section .icon-box {
      width: 50px;
      height: 50px;
      background-color: #5c3fa3;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      font-size: 1.5rem;
      flex-shrink: 0;
      /* tidak mengecil saat wrap */
    }

    .info-section a.text-warning {
      text-decoration: underline;
      color: #ffc107 !important;
    }

    /* Responsive */
    @media (max-width: 991px) {
      .info-section h3 {
        font-size: 1.6rem;
      }

      .info-section h5 {
        font-size: 0.95rem;
      }

      .info-section p {
        font-size: 0.85rem;
      }
    }

    @media (max-width: 767px) {
      .info-section {
        padding: 30px 15px;
      }

      .info-section .d-flex {
        flex-direction: column;
        /* ubah dari row ke column */
        align-items: flex-start;
      }

      .info-section .icon-box {
        width: 40px;
        height: 40px;
        font-size: 1.2rem;
        margin-bottom: 10px;
        /* beri jarak bawah ikon */
      }

      .info-section h5 {
        margin-bottom: 5px;
      }

      .info-section p {
        margin-bottom: 15px;
      }
    }
  </style>

</head>

<body>
  {{-- Navbar --}}
  @include('componen.header')

  <!-- Banner -->
  <section class="main-banner">
    <h6><b><i class="fa-solid fa-store"></i> Selamat datang di Tokomu.</b></h6>
    <h4><em>Top Up</em> Games Favoritmu <i class="fa-solid fa-bolt"></i> Cepat & <i class="fa-solid fa-thumbs-up"></i>
      Mudah</h4>

    <!-- Carousel -->
    <div id="bannerCarousel" class="carousel slide mt-4" data-bs-ride="carousel" data-bs-interval="3000">
      <div class="carousel-inner rounded shadow-lg">
        @for ($i = 1; $i <= 5; $i++)
          <div class="carousel-item {{ $i === 1 ? 'active' : '' }}">
            <img src="{{ asset('img/Banner GAME' . $i . '.jpg') }}" class="d-block mx-auto" alt="Banner {{ $i }}">
          </div>
        @endfor
      </div>
      <div class="carousel-indicators mt-3">
        @for ($i = 0; $i < 5; $i++)
          <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="{{ $i }}"
            class="{{ $i === 0 ? 'active' : '' }}"></button>
        @endfor
      </div>
    </div>
  </section>

  <!-- Game Categories -->
  <section class="most-popular">
    <div class="container">
      <h4 class="text-center"><i class="fa-solid fa-star text-warning"></i> <em>Paling Populer</em> Sekarang Ini</h4>

      @foreach($categories as $category)
        @if($category->games->count())
          <h5>{{ $category->name }}</h5>
          <div class="row g-4">
            @foreach($category->games as $game)
              <div class="col-lg-3 col-sm-6">
                <div class="card-game text-center p-3 h-100">
                  <a href="{{ route('topups.show', $game->id) }}" class="text-decoration-none text-white">
                    <img src="{{ $game->image ? asset('storage/' . $game->image) : asset('images/default-game.png') }}"
                      alt="{{ $game->name }}">
                    <h5><i class="fas fa-gamepad text-primary"></i> {{ $game->name }}</h5>
                    <p>{{ $game->publisher }}</p>
                  </a>
                  <a href="{{ route('topups.show', $game->id) }}" class="btn btn-outline-primary btn-sm mt-2">
                    Topup Sekarang
                  </a>
                </div>
              </div>
            @endforeach
          </div>
        @endif
      @endforeach
    </div>
  </section>

  <!-- Informasi Section -->
  <section class="info-section py-5">
    <div class="container">
      <h3 class="text-center mb-4">INFORMASI</h3>
      <p class="text-center mb-5">
        Temukan informasi penting dan tips berguna yang bisa membantu Anda sehari-hari.<br>
        Kami menyediakan konten yang relevan dan terpercaya untuk memastikan Anda selalu mendapatkan informasi
        terkini dengan cara yang mudah dipahami.
      </p>
      <div class="row g-4">
        <div class="col-md-6 d-flex">
          <div class="icon-box me-3">
            <i class="fa-solid fa-info-circle"></i>
          </div>
          <div>
            <h5>Informasi Terpercaya</h5>
            <p>Konten yang disajikan selalu diverifikasi agar akurat dan dapat diandalkan.</p>
          </div>
        </div>
        <div class="col-md-6 d-flex">
          <div class="icon-box me-3">
            <i class="fa-solid fa-lightbulb"></i>
          </div>
          <div>
            <h5>Tips & Trik</h5>
            <p>Dapatkan tips praktis yang bisa membantu aktivitas harian Anda lebih efisien.</p>
          </div>
        </div>
        <div class="col-md-6 d-flex">
          <div class="icon-box me-3">
            <i class="fa-solid fa-book"></i>
          </div>
          <div>
            <h5>Panduan Lengkap</h5>
            <p>Kami menyediakan panduan step-by-step untuk memudahkan pemahaman berbagai topik.</p>
          </div>
        </div>
        <div class="col-md-6 d-flex">
          <div class="icon-box me-3">
            <i class="fa-solid fa-globe"></i>
          </div>
          <div>
            <h5>Berita Terbaru</h5>
            <p>Ikuti perkembangan terbaru dari berbagai bidang dan tetap up-to-date setiap saat.</p>
          </div>
        </div>
        <div class="col-md-6 d-flex">
          <div class="icon-box me-3">
            <i class="fa-solid fa-users"></i>
          </div>
          <div>
            <h5>Dukungan Komunitas</h5>
            <p>Bergabung dengan komunitas untuk berdiskusi dan berbagi informasi bermanfaat. <a href="#"
                class="text-warning">Gabung Sekarang!</a></p>
          </div>
        </div>
        <div class="col-md-6 d-flex">
          <div class="icon-box me-3">
            <i class="fa-solid fa-calendar-check"></i>
          </div>
          <div>
            <h5>Event & Kegiatan</h5>
            <p>Nikmati berbagai event dan kegiatan yang menambah wawasan dan pengalaman Anda.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Footer --}}
  @include('componen.footer')

  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>