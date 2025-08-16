<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand fw-bold d-flex align-items-center" href="#">
            <i class="fa-solid fa-gamepad me-2"></i> Tokomu.
        </a>

        <!-- Search Box -->
        <form class="d-flex mx-lg-5 flex-grow-1" role="search">
            <input class="form-control me-2" type="search" placeholder="Cari Sesuatu" aria-label="Search">
            <button class="btn btn-outline-light" type="submit"><i class="fa fa-search"></i></button>
        </form>

        <!-- Menu -->
        <div class="d-flex ms-lg-5 align-items-center">
            <!-- Home -->
            {{-- <a href="#" class="nav-link text-white me-4">
                <i class="fa fa-home me-1"></i> Home
            </a> --}}

            <!-- Histori Pembelian -->
            <a href="#" class="nav-link text-white me-4">
                <i class="fa fa-shopping-bag me-1"></i> Histori
            </a>

            <!-- Notifikasi -->
            <a href="#" class="nav-link text-white me-4 position-relative">
                <i class="fa fa-bell"></i>
                <!-- Badge notifikasi -->
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    3
                </span>
            </a>

            <!-- Login -->
            <a href="{{ route('login') }}" class="nav-link text-white">
                <i class="fa fa-user me-1"></i> Login
            </a>
        </div>

    </div>
</nav>
