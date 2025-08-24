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

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/flex-slider.css') }}">
  <link rel="stylesheet" href="{{ asset('css/owl.css') }}">
  <link rel="stylesheet" href="{{ asset('css/sb-admin-2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/templatemo-cyborg-gaming.css') }}">

  <style>
    img {
      max-width: 100%;
      height: auto;
    }

    h4 {
      font-size: clamp(1rem, 2vw, 1.2rem);
    }

    .main-banner {
      background: #111 url('{{ asset("assets/images/banner-bg.jpg") }}') no-repeat center center/cover;
      color: #fff;
      padding: 80px 20px;
    }

    .game-card h4 span {
      display: block;
      font-size: 0.9rem;
      color: #aaa;
      font-weight: 400;
    }
  </style>
</head>

<body>
  @include('componen.header')

  <!-- Banner -->
  <!-- Banner dengan Slider -->
  <div class="main-banner text-center">
    <div class="container">

      <!-- Teks di atas slider -->
      <h6>
        <b>
          <i class="fa-solid fa-store"></i> Selamat datang di Tokomu.
        </b>
      </h6>
      <h4>
        <em>Top Up</em> Games Favoritmu
        <i class="fa-solid fa-bolt"></i> Cepat &
        <i class="fa-solid fa-thumbs-up"></i> Mudah
      </h4>

      <!-- Carousel -->
      <div id="bannerCarousel" class="carousel slide mt-4" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-inner rounded shadow-lg">

          <!-- Slide 1 -->
          <div class="carousel-item active">
            <img src="{{ asset('img/Banner GAME1.jpg') }}" class="d-block w-75 mx-auto" alt="Banner 1">
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item">
            <img src="{{ asset('img/Banner GAME2.jpg') }}" class="d-block w-75 mx-auto" alt="Banner 2">
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item">
            <img src="{{ asset('img/Banner GAME3.jpg') }}" class="d-block w-75 mx-auto" alt="Banner 3">
          </div>

          <!-- Slide 4 -->
          <div class="carousel-item">
            <img src="{{ asset('img/Banner GAME4.jpg') }}" class="d-block w-75 mx-auto" alt="Banner 4">
          </div>

          <!-- Slide 5 -->
          <div class="carousel-item">
            <img src="{{ asset('img/Banner GAME5.jpg') }}" class="d-block w-75 mx-auto" alt="Banner 5">
          </div>
        </div>
        <!-- Indicator -->
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="0" class="active"></button>
          <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="1"></button>
          <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="2"></button>
          <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="3"></button>
          <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="4"></button>
        </div>
      </div>

    </div>
  </div>

  <!-- Game Categories -->
  <div class="most-popular py-5">
    <div class="container">
      <h4 class="mb-4 text-center">
        <i class="fa-solid fa-star text-warning"></i>
        <em>Paling Populer</em> Sekarang Ini
      </h4>

      @foreach($categories as $category)
      <h5 class="mb-3">{{ $category->name }}</h5>
      <div class="row g-4">
      @foreach($category->games->take(4) as $game) <!-- ambil max 4 game -->
      <div class="col-lg-3 col-sm-6">
      <div class="item text-center">
      <a href="#">
        <img src="{{ asset('storage/' . $game->image) }}" class="img-fluid rounded shadow-sm"
        alt="{{ $game->name }}">
        <h4 class="mt-3">
        <i class="fas fa-gamepad text-primary"></i>
        {{ $game->name }} <br>
        <span>{{ $game->publisher }}</span>
        </h4>
      </a>
      </div>
      </div>
    @endforeach
      </div>
    @endforeach
    </div>
  </div>

  <!-- Footer -->
  @include('componen.footer')

  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/custom.js') }}"></script>
  <script src="{{ asset('js/owl-carousel.js') }}"></script>
  <script src="{{ asset('js/popup.js') }}"></script>
  <script src="{{ asset('js/tabs.js') }}"></script>
  <script src="{{ asset('js/isotope.js') }}"></script>
</body>

</html>