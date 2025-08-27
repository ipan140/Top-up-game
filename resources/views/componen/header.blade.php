<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ url('/') }}">
            <i class="fa-solid fa-gamepad me-2"></i> Tokomu.
        </a>

        <!-- Search Box -->
        <form class="d-flex mx-lg-5 flex-grow-1" role="search">
            <input class="form-control me-2" type="search" placeholder="Cari Sesuatu" aria-label="Search">
            <button class="btn btn-outline-light" type="submit"><i class="fa fa-search"></i></button>
        </form>

        <!-- Menu -->
        <div class="d-flex ms-lg-5 align-items-center">

            <!-- Histori Pembelian -->
            <a href="{{ url('/histori') }}" class="nav-link text-white me-4">
                <i class="fa fa-shopping-bag me-1"></i> Histori
            </a>

            <!-- Notifikasi -->
            <a href="{{ url('/notifikasi') }}" class="nav-link text-white me-4 position-relative">
                <i class="fa fa-bell"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    3
                </span>
            </a>

            <!-- Login / User Dropdown -->
            @auth
                <div class="nav-item dropdown">
                    <a class="nav-link text-white dropdown-toggle d-flex align-items-center" href="#" id="userDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user me-1"></i> {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#profileModal">
                                <i class="fa fa-id-card me-2"></i> Profil Saya
                            </a>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="{{ route('login') }}" class="nav-link text-white">
                    <i class="fa fa-user me-1"></i> Login
                </a>
            @endauth

        </div>
    </div>
</nav>

<!-- Modal Profil -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="profileModalLabel">
                    <i class="fa fa-id-card me-2"></i> Profil Saya
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body text-dark">
                <div class="text-center mb-3">
                    <i class="fa fa-user-circle fa-5x text-secondary"></i>
                </div>
                <p><strong>Nama:</strong> {{ Auth::user()?->name ?? 'Guest' }}</p>
                <p><strong>Email:</strong> {{ Auth::user()?->email ?? '-' }}</p>
                <p><strong>Role:</strong> {{ Auth::user()?->role ?? '-' }}</p>
                <p><strong>Dibuat:</strong> {{ Auth::user()?->created_at?->format('d M Y') ?? '-' }}</p>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fa fa-times me-1"></i> Tutup
                </button>
                @auth
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#editProfileModal" data-bs-dismiss="modal">
                        <i class="fa fa-edit me-1"></i> Edit Profil
                    </button>
                @endauth
            </div>

        </div>
    </div>
</div>

<!-- Modal Edit Profil -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="editProfileModalLabel">
                    <i class="fa fa-edit me-2"></i> Edit Profil
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body text-dark">
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PUT')

                    <!-- Nama -->
                    <div class="mb-3">
                        <label for="name" class="form-label"><strong>Nama</strong></label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ Auth::user()?->name ?? '' }}" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label"><strong>Email</strong></label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ Auth::user()?->email ?? '' }}" required>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label"><strong>Password Baru</strong></label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Kosongkan jika tidak ingin diubah">
                    </div>

                    <!-- Tombol Submit -->
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">
                            <i class="fa fa-times me-1"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save me-1"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<style>
    /* Pastikan teks modal selalu hitam */
    #profileModal .modal-body,
    #profileModal .modal-footer,
    #profileModal .modal-header,
    #profileModal p,
    #profileModal strong,
    #editProfileModal .modal-body,
    #editProfileModal .modal-footer,
    #editProfileModal .modal-header,
    #editProfileModal label,
    #editProfileModal strong {
        color: #000 !important;
    }
</style>
