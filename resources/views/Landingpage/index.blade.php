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
  </style>
</head>

<body>
  @include('componen.header')
  <!-- Banner -->
  <div class="main-banner text-center">
    <div class="container">
      <h6><b><i class="fa-solid fa-store"></i> Selamat datang di Tokomu.</b></h6>
      <h4><em>Top Up</em> Games Favoritmu <i class="fa-solid fa-bolt"></i> Cepat &amp; <i
          class="fa-solid fa-thumbs-up"></i> Mudah</h4>
    </div>
  </div>

  <!-- Most Popular -->
  <div class="most-popular py-5">
    <div class="container">
      <h4 class="mb-4 text-center"><i class="fa-solid fa-star text-warning"></i> <em>Paling Populer</em> Sekarang Ini
      </h4>
      <div class="row g-4">

        <!-- Game 1 -->
        <div class="col-lg-3 col-sm-6">
          <div class="item text-center">
            <a href="#">
              <img src="{{ asset('assets/images/game-ml.jpg') }}" class="img-fluid rounded shadow-sm"
                alt="Mobile Legends">
              <h4 class="mt-3"><i class="fas fa-dragon text-primary"></i> Mobile Legends<br><span>Moonton</span></h4>
            </a>
          </div>
        </div>

        <!-- Game 2 -->
        <div class="col-lg-3 col-sm-6">
          <div class="item text-center">
            <a href="#">
              <img src="{{ asset('assets/images/game-ff.jpg') }}" class="img-fluid rounded shadow-sm" alt="Free Fire">
              <h4 class="mt-3"><i class="fas fa-fire text-danger"></i> Free Fire<br><span>Garena</span></h4>
            </a>
          </div>
        </div>

        <!-- Game 3 -->
        <div class="col-lg-3 col-sm-6">
          <div class="item text-center">
            <a href="#">
              <img src="{{ asset('assets/images/game-pubg.jpg') }}" class="img-fluid rounded shadow-sm"
                alt="PUBG Mobile">
              <h4 class="mt-3"><i class="fas fa-crosshairs text-success"></i> PUBG Mobile<br><span>Tencent</span></h4>
            </a>
          </div>
        </div>

        <!-- Game 4 -->
        <div class="col-lg-3 col-sm-6">
          <div class="item text-center">
            <a href="#">
              <img src="{{ asset('assets/images/game-genshin.jpg') }}" class="img-fluid rounded shadow-sm"
                alt="Genshin Impact">
              <h4 class="mt-3"><i class="fas fa-magic text-info"></i> Genshin Impact<br><span>miHoYo</span></h4>
            </a>
          </div>
        </div>

      </div>
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