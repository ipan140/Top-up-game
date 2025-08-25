<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<footer class="footer-section">
  <div class="footer-main py-5">
    <div class="container">
      <div class="row gy-4 text-center text-md-start">

        <!-- Untuk Penerbit -->
        <div class="col-6 col-md-3">
          <h5 class="footer-title"><i class="fa-solid fa-store me-2"></i>Untuk Penerbit</h5>
          <ul class="footer-links">
            <li><a href="#"><i class="fa-solid fa-list me-2"></i>Daftarkan judulmu di Widan Store</a></li>
            <li><a href="#"><i class="fa-solid fa-circle-info me-2"></i>Pelajari lebih lanjut tentang kami</a></li>
          </ul>
        </div>

        <!-- Butuh Bantuan -->
        <div class="col-6 col-md-2">
          <h5 class="footer-title"><i class="fa-solid fa-headset me-2"></i>Butuh Bantuan?</h5>
          <a href="#" class="footer-btn"><i class="fa-solid fa-envelope me-2"></i>Hubungi Kami</a>
        </div>

        <!-- Negara -->
        <div class="col-6 col-md-3">
          <h5 class="footer-title"><i class="fa-solid fa-flag me-2"></i>Negara</h5>
          <div class="footer-country">
            <img src="https://flagcdn.com/id.svg" alt="ID" width="22" class="me-2 rounded">
            <span>Indonesia</span>
          </div>
        </div>

        <!-- Preferensi Cookie -->
        <div class="col-6 col-md-2">
          <h5 class="footer-title"><i class="fa-solid fa-cookie-bite me-2"></i>Preferensi Cookie</h5>
          <a href="#" class="footer-btn"><i class="fa-solid fa-sliders me-2"></i>Atur Cookie</a>
        </div>

        <!-- Media Sosial -->
        <div class="col-12 col-md-2">
          <h5 class="footer-title text-center"><i class="fa-solid fa-share-nodes me-2"></i>Ikuti Kami:</h5>
          <div class="social-icons text-center">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-x-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-tiktok"></i></a>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Bottom Bar -->
  <div class="footer-bottom py-3">
    <div class="container d-flex flex-wrap justify-content-center align-items-center gap-2 gap-md-3">
      <span><i class="fa-regular fa-copyright me-1"></i>2025 Widan Store</span>
      <a href="#"><i class="fa-solid fa-users me-1"></i>Jadi Afiliasi</a>
      <a href="#"><i class="fa-solid fa-gamepad me-1"></i>Untuk Penerbit Game</a>
      <a href="#"><i class="fa-solid fa-file-contract me-1"></i>Syarat & Ketentuan</a>
      <a href="#"><i class="fa-solid fa-shield-halved me-1"></i>Kebijakan Privasi</a>
      <a href="#"><i class="fa-solid fa-bug me-1"></i>Bug Bounty</a>
      <a href="#"><i class="fa-solid fa-truck me-1"></i>Jadi Distributor</a>
      <img src="logo.png" alt="Logo" height="20">
    </div>
  </div>
</footer>

<!-- CSS -->
<style>
body {
  font-family: 'Poppins', sans-serif;
}
.footer-section {
  background: #f3c624; 
  color: #1a1a1a;
}
.footer-title {
  font-weight: 600;
  margin-bottom: 12px;
  font-size: 15px;
  display: flex;
  align-items: center;
}
.footer-links {
  list-style: none;
  padding: 0;
  margin: 0;
}
.footer-links li a {
  color: #1a1a1a;
  text-decoration: none;
  font-size: 14px;
  display: flex;
  align-items: center;
  margin-bottom: 8px;
  transition: color 0.3s ease;
}
.footer-links li a:hover {
  color: #D92C54;
}
.footer-btn {
  display: inline-block;
  background: #D92C54;
  color: #fff;
  padding: 8px 14px;
  border-radius: 10px;
  font-size: 14px;
  font-weight: 500;
  text-decoration: none;
  box-shadow: 0 2px 6px rgba(0,0,0,0.1);
  transition: all 0.3s ease;
}
.footer-btn:hover {
  background: #b91f44;
  transform: translateY(-2px);
}
.footer-country {
  background: #fff;
  padding: 8px 12px;
  border-radius: 10px;
  display: flex;
  align-items: center;
  font-size: 14px;
  border: 1px solid #ddd;
  justify-content: center;
}
.lang-link {
  color: #1a1a1a;
  margin-right: 10px;
  font-size: 14px;
}
.social-icons a {
  color: #1a1a1a;
  font-size: 18px;
  margin: 0 8px;
  transition: transform 0.3s ease, color 0.3s ease;
}
.social-icons a:hover {
  color: #D92C54;
  transform: scale(1.2);
}
.footer-bottom {
  background: #f9f1d3;
  border-top: 1px solid #ddd;
  font-size: 13px;
}
.footer-bottom a {
  color: #1a1a1a;
  text-decoration: none;
  display: flex;
  align-items: center;
}
.footer-bottom a:hover {
  color: #D92C54;
}
.footer-bottom i {
  font-size: 12px;
}

/* Responsive */
@media (max-width: 767px) {
  .footer-main .col-6 {
    flex: 0 0 100%;
    max-width: 100%;
    text-align: center !important;
  }
  .footer-main .footer-btn {
    margin-top: 8px;
  }
  .social-icons {
    justify-content: center;
  }
  .footer-bottom {
    text-align: center;
  }
  .footer-bottom img {
    margin-top: 5px;
  }
}
</style>

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/your-kit-id.js" crossorigin="anonymous"></script>
