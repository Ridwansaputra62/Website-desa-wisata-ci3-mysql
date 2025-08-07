<?php $this->load->view('templates/template-fe/header'); ?>

<?php $this->load->view('templates/template-fe/hero-home'); ?>

<!-- ======= CSS Tambahan ======= -->
<style>
  /* Custom col-20: 5 kolom dalam 1 baris */
  .col-20 {
    flex: 0 0 20%;
    max-width: 20%;
  }

  @media (max-width: 992px) {
    .col-20 {
      flex: 0 0 50%;
      max-width: 50%;
    }
  }

  @media (max-width: 576px) {
    .col-20 {
      flex: 0 0 100%;
      max-width: 100%;
    }
  }

  /* Pastikan setiap service-item punya tinggi yang sama */
  .featured-services .service-item {
    background: #fff;
    border-radius: 10px;
    padding: 30px;
    text-align: center;
    box-shadow: 0 2px 20px rgba(0, 0, 0, 0.05);
    height: 100%;
    transition: all 0.3s ease-in-out;
  }

  .featured-services .service-item .icon {
    font-size: 32px;
    color: #2ab27b;
    margin-bottom: 15px;
  }

  .featured-services .service-item h4 {
    font-weight: 700;
    margin-bottom: 10px;
    font-size: 18px;
  }

  .featured-services .service-item p {
    font-size: 14px;
    color: #555;
  }

  .featured-services .service-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
  }

  /* Styling untuk membatasi tinggi desc-paket */
  .desc-paket {
    max-height: 120px;
    overflow-y: scroll;

  }

  .desc-paket p {
    margin: 0;
    line-height: 1.5;
  }

  /* ======= Features Section Styles ======= */
  #features .nav-tabs {
    border: none;
  }

  #features .nav-item {
    margin-bottom: 20px;
  }

  #features .nav-link {
    border: none;
    background: #fff;
    border-radius: 10px;
    padding: 30px 20px;
    text-align: center;
    box-shadow: 0 2px 20px rgba(0, 0, 0, 0.05);
    height: 100%;
    transition: all 0.3s ease-in-out;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }

  #features .nav-link:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
  }

  #features .nav-link i {
    font-size: 32px;
    margin-bottom: 15px;
    transition: all 0.3s ease;
  }

  #features .nav-link h4 {
    font-weight: 600;
    margin: 0;
    font-size: 16px;
    color: #333;
  }

  #features .nav-link:hover h4 {
    color: #2ab27b;
  }

  /* Rating Section Styles */
  .rating-section {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 15px;
  }

  .rating-section .stars {
    display: flex;
    gap: 2px;
  }

  .rating-section .stars i {
    font-size: 14px;
  }

  .rating-section .rating-number {
    font-size: 14px;
    font-weight: 600;
  }
  #title-testi{
    font-weight: 700;
    font-size: 32px;
    color: #ffffff
  }

  /* Modern Pricing Section Styles */
  .pricing .pricing-item {
    position: relative;
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    height: 100%;
    border: 2px solid transparent;
  }

  .pricing .pricing-item:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.12);
  }

  .pricing .pricing-item.featured {
    border: 2px solid #28a745;
    transform: scale(1.05);
  }

  .pricing .pricing-item.featured .pricing-header {
    background: white;
  }

  .pricing .pricing-badge {
    position: absolute;
    top: 15px;
    left: 15px;
    background: linear-gradient(45deg, #28a745, #20c997);
    color: white;
    padding: 8px 15px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    z-index: 2;
  }

  .pricing .pricing-badge.popular {
    background: linear-gradient(45deg, #dc3545, #fd7e14);
    color: white;
  }

  .pricing .pricing-image {
    position: relative;
    height: 200px;
    overflow: hidden;
  }

  .pricing .pricing-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
  }

  .pricing .pricing-item:hover .pricing-image img {
    transform: scale(1.05);
  }

  .pricing .pricing-header {
    padding: 25px 30px 15px;
    text-align: center;
    background: white;
    color: #333;
    position: relative;
  }

  .pricing .pricing-header h3 {
    font-size: 20px;
    font-weight: 700;
    color: #333;
    margin-bottom: 10px;
  }

  .pricing .pricing-header h4 {
    font-size: 16px;
    color: #333;
    margin-bottom: 5px;
  }

  .pricing .price-amount {
    font-size: 28px;
    font-weight: 700;
    color: #28a745;
  }

  .pricing .price-period {
    font-size: 14px;
    color: #6c757d;
  }

  .pricing .pricing-duration {
    color: #6c757d;
    font-size: 12px;
    margin-top: 5px;
    font-style: italic;
  }

  .pricing .pricing-description {
    padding: 20px 25px 10px;
  }

  .pricing .pricing-description p {
    color: #6c757d;
    font-size: 14px;
    line-height: 1.5;
    margin: 0;
  }

  .pricing .pricing-features {
    list-style: none;
    padding: 15px 25px;
    margin: 0;
  }

  .pricing .pricing-features li {
    padding: 8px 0;
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .pricing .pricing-features i {
    color: #28a745;
    font-size: 14px;
    flex-shrink: 0;
  }

  .pricing .pricing-features span {
    color: #555;
    font-size: 14px;
  }

  .pricing .buy-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 12px 25px;
    background: linear-gradient(45deg, #28a745, #20c997);
    color: white;
    border-radius: 25px;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    transition: all 0.3s ease;
    border: none;
    width: calc(100% - 50px);
    text-align: center;
    margin: 0 25px 25px;
  }

  .pricing .buy-btn i {
    font-size: 16px;
  }

  .pricing .buy-btn:hover {
    background: linear-gradient(45deg, #20c997, #17a2b8);
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(40, 167, 69, 0.3);
    color: white;
  }

  .pricing .featured .buy-btn {
    background: linear-gradient(45deg, #198754, #20c997);
    box-shadow: 0 8px 20px rgba(25, 135, 84, 0.3);
  }

  .pricing .featured .buy-btn:hover {
    background: linear-gradient(45deg, #157347, #0d6efd);
  }

  /* Modern Blog Section Styles */
  .recent-blog-posts .post-box {
    background: #fff;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 30px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    height: 100%;
    position: relative;
  }

  .recent-blog-posts .post-box:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
  }

  .recent-blog-posts .post-img {
    position: relative;
    overflow: hidden;
    height: 250px;
  }

  .recent-blog-posts .post-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
  }

  .recent-blog-posts .post-box:hover .post-img img {
    transform: scale(1.1);
  }

  .recent-blog-posts .post-category {
    position: absolute;
    top: 15px;
    right: 15px;
    background: linear-gradient(45deg, #28a745, #20c997);
    color: white;
    padding: 8px 15px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    z-index: 2;
  }

  .recent-blog-posts .post-content {
    padding: 30px 25px;
  }

  .recent-blog-posts .meta {
    display: flex;
    gap: 20px;
    margin-bottom: 15px;
    flex-wrap: wrap;
  }

  .recent-blog-posts .meta span {
    display: flex;
    align-items: center;
    gap: 5px;
    color: #6c757d;
    font-size: 14px;
  }

  .recent-blog-posts .meta i {
    color: #28a745;
    font-size: 14px;
  }

  .recent-blog-posts .post-title {
    font-size: 20px;
    font-weight: 700;
    color: #333;
    margin-bottom: 15px;
    line-height: 1.4;
    transition: color 0.3s ease;
  }

  .recent-blog-posts .post-box:hover .post-title {
    color: #28a745;
  }

  .recent-blog-posts .post-content p {
    color: #6c757d;
    font-size: 15px;
    line-height: 1.6;
    margin-bottom: 20px;
  }

  .recent-blog-posts .readmore {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #28a745;
    font-weight: 600;
    font-size: 15px;
    text-decoration: none;
    transition: all 0.3s ease;
  }

  .recent-blog-posts .readmore:hover {
    color: #20c997;
    gap: 12px;
  }

  .recent-blog-posts .readmore i {
    font-size: 14px;
    transition: transform 0.3s ease;
  }

  .recent-blog-posts .readmore:hover i {
    transform: translateX(3px);
  }

  /* Responsive adjustments */
  @media (max-width: 768px) {
    .recent-blog-posts .post-img {
      height: 200px;
    }
    
    .recent-blog-posts .post-content {
      padding: 20px;
    }
    
    .recent-blog-posts .meta {
      gap: 15px;
    }
  }

  .service-item {
    background: #fff;
    border-radius: 15px;
    padding: 30px 20px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.06);
    transition: all 0.3s ease;
    height: 100%;
  }

  .service-item:hover {
    transform: translateY(-7px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.12);
  }

  .icon-gradient {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    margin: 0 auto 20px;
    background: linear-gradient(135deg, #28a745, #20c997);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    transition: all 0.3s ease;
  }

  .service-item:hover .icon-gradient {
    background: linear-gradient(135deg, #157347, #198754);
    transform: scale(1.1);
  }

  .service-item h4 {
    font-weight: 600;
    font-size: 18px;
    margin-bottom: 10px;
  }

  .service-item p {
    font-size: 14px;
    color: #666;
  }

  /* Responsive */
  @media (max-width: 768px) {
    .icon-gradient {
      width: 50px;
      height: 50px;
      font-size: 22px;
    }

    .service-item {
      padding: 20px;
    }

    .service-item h4 {
      font-size: 16px;
    }

    .service-item p {
      font-size: 13px;
    }
  }

</style>



<!-- ======= HTML Featured Services Section ======= -->
<main id="main">
  <section id="featured-services" class="featured-services py-5" style="background: #f7f9fc;">
    <div class="container" data-aos="fade-up">
      <div class="section-header text-center mb-5">
        <h2 class="fw-bold">Jelajahi Desa Wisata Sedari</h2>
        <p class="text-muted">Beragam informasi dan fitur menarik yang dapat Anda temukan di Desa Sedari.</p>
      </div>

      <div class="row gy-4 d-flex flex-wrap justify-content-center">
        <!-- 1. Profil Desa -->
        <div class="col-20 d-flex" data-aos="zoom-in" data-aos-delay="100">
          <div class="service-item animated-service text-center">
            <div class="icon-gradient">
              <i class="bi bi-info-circle-fill"></i>
            </div>
            <h4><a href="<?= base_url('tentang'); ?>" class="stretched-link">Profil Desa</a></h4>
            <p>Kenali sejarah, visi, dan potensi Desa Sedari sebagai destinasi wisata alam dan pendidikan.</p>
          </div>
        </div>

        <!-- 2. Wisata -->
        <div class="col-20 d-flex" data-aos="zoom-in" data-aos-delay="200">
          <div class="service-item animated-service text-center">
            <div class="icon-gradient">
              <i class="bi bi-map-fill"></i>
            </div>
            <h4><a href="<?= base_url('wisata'); ?>" class="stretched-link">Wisata</a></h4>
            <p>Jelajahi berbagai jenis dan paket wisata terbaik yang ditawarkan oleh Desa Sedari.</p>
          </div>
        </div>

        <!-- 3. Galeri -->
        <div class="col-20 d-flex" data-aos="zoom-in" data-aos-delay="300">
          <div class="service-item animated-service text-center">
            <div class="icon-gradient">
              <i class="bi bi-image-fill"></i>
            </div>
            <h4><a href="<?= base_url('Galeri'); ?>" class="stretched-link">Foto Wisata</a></h4>
            <p>Lihat dokumentasi foto keseruan wisata di Desa Sedari.</p>
          </div>
        </div>

        <!-- 4. Video Wisata -->
        <div class="col-20 d-flex" data-aos="zoom-in" data-aos-delay="400">
          <div class="service-item animated-service text-center">
            <div class="icon-gradient">
              <i class="bi bi-camera-reels-fill"></i>
            </div>
            <h4><a href="<?= base_url('Galeri'); ?>" class="stretched-link">Video Wisata</a></h4>
            <p>Tonton video menarik dari kegiatan wisata di Sedari.</p>
          </div>
        </div>

        <!-- 5. Artikel -->
        <div class="col-20 d-flex" data-aos="zoom-in" data-aos-delay="500">
          <div class="service-item animated-service text-center">
            <div class="icon-gradient">
              <i class="bi bi-newspaper"></i>
            </div>
            <h4><a href="<?= base_url('blog'); ?>" class="stretched-link">Artikel Wisata</a></h4>
            <p>Artikel, informasi, dan berita terbaru tentang Desa Wisata Sedari.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

</main>

    <!-- ======= On Focus Section ======= -->
    <section id="onfocus" class="onfocus">
      <div class="container-fluid p-0" data-aos="fade-up">
        <div class="row g-0 ">
          <!-- Image Slider Section -->
          <div class="col-lg-6 position-relative ">
            <div class="gallery-slider">
              <div class="slider-container">
                <?php foreach ($jenis as $index => $j): ?>
                <div class="slide <?= $index == 0 ? 'active' : '' ?>">
                  <img src="<?= base_url('assets/img/jenis/') . $j['gambar']; ?>" alt="<?= $j['nama_wisata']; ?>" class="slide-image">
                  <div class="slide-overlay">
                    <div class="slide-content">
                      <h4><?= $j['nama_wisata']; ?></h4>
                      <p><?= substr($j['deskripsi'], 0, 100) . '...'; ?></p>
                      <!-- <span class="slide-price">Rp <?= number_format($j['harga_tiket'], 0, ',', '.'); ?></span> -->
                    </div>
                  </div>
                </div>
                <?php endforeach; ?>
              </div>
              
              <!-- Navigation Arrows -->
              <button class="slider-nav prev" onclick="changeSlide(-1)">
                <i class="bi bi-chevron-left"></i>
              </button>
              <button class="slider-nav next" onclick="changeSlide(1)">
                <i class="bi bi-chevron-right"></i>
              </button>
              
              <!-- Dots Indicator -->
              <div class="slider-dots">
                <?php foreach ($jenis as $index => $j): ?>
                <span class="dot <?= $index == 0 ? 'active' : '' ?>" onclick="currentSlide(<?= $index + 1 ?>)"></span>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
          
          <!-- Content Section -->
          <div class="col-lg-6">
            <div class="content-modern">
              <div class="content-wrapper">
                <h3 class="content-title">Selamat datang di Desa Wisata Sedari</h3>
                <p class="content-description">
                  Selamat datang di Desa Wisata Alam Mangrove Sedari – surga ekowisata di pesisir utara Karawang. Nikmati keindahan hutan mangrove yang hijau, keasrian alam yang masih terjaga, serta berbagai aktivitas wisata menarik seperti tracking mangrove, wisata perahu, edukasi lingkungan, hingga kuliner khas laut. Cocok untuk wisata keluarga, pelajar, hingga pecinta alam yang ingin merasakan ketenangan dan keindahan alam tropis.
                </p>
                <div class="content-features">
                  <div class="feature-item">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>Tracking Mangrove</span>
                  </div>
                  <div class="feature-item">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>Wisata Perahu</span>
                  </div>
                  <div class="feature-item">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>Edukasi Lingkungan</span>
                  </div>
                  <div class="feature-item">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>Kuliner Khas Laut</span>
                  </div>
                </div>
                <a href="#services" class="btn-explore">
                  <span>Jelajahi Paket Wisata</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End On Focus Section -->

 <!-- ======= Features Section ======= -->
<section id="features" class="features py-5" style="background-color: #f4f6f9;">
  <div class="container" data-aos="fade-up">
    <div class="section-header text-center mb-5">
      <h2 class="fw-bold">Fasilitas Wisata</h2>
      <p class="text-muted">Berikut adalah berbagai fasilitas wisata yang dapat dinikmati pengunjung.</p>
    </div>

    <div class="row g-4 justify-content-center">
      <?php foreach ($fasilitas as $idx => $f): ?>
        <div class="col-6 col-md-4 col-lg-3"
             data-aos="zoom-in"
             data-aos-delay="<?= 100 + ($idx % 8) * 50; ?>">
          <div class="feature-card h-100 text-center">
            <div class="icon-circle icon-anim mx-auto mb-3">
              <i class="bi bi-tree-fill"></i>
            </div>
            <h5 class="fw-semibold mb-0"><?= $f['nama_fasilitas']; ?></h5>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- End Features Section -->

<!-- Internal CSS -->
<style>
  .feature-card {
    background: linear-gradient(135deg, #ffffff, #f1f1f1);
    border-radius: 20px;
    padding: 30px 20px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    transition: transform .3s ease, box-shadow .3s ease;
    position: relative;
    overflow: hidden;
  }
  .feature-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 14px 28px rgba(0,0,0,0.12);
  }

  .icon-circle {
    background: linear-gradient(to right, #00c853, #b2ff59);
    color: #fff;
    width: 68px;
    height: 68px;
    line-height: 68px;
    border-radius: 50%;
    font-size: 1.9rem;
    box-shadow: 0 3px 12px rgba(0, 200, 83, 0.35);
    display: inline-flex;
    align-items: center;
    justify-content: center;
  }

  /* Animasi ikon: float & pulse glow */
  .icon-anim {
    animation: floatY 4s ease-in-out infinite, glowPulse 2.8s ease-in-out infinite;
    will-change: transform, box-shadow;
  }
  .feature-card:hover .icon-anim {
    animation-play-state: paused; /* saat hover, berhenti agar fokus */
    transform: translateY(-2px) scale(1.04);
    box-shadow: 0 8px 22px rgba(0, 200, 83, 0.35);
  }

  @keyframes floatY {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-6px); }
  }
  @keyframes glowPulse {
    0%, 100% { box-shadow: 0 3px 12px rgba(0, 200, 83, 0.35); }
    50% { box-shadow: 0 6px 18px rgba(0, 200, 83, 0.5); }
  }

  /* Hargai preferensi reduced motion */
  @media (prefers-reduced-motion: reduce) {
    .icon-anim { animation: none; }
    .feature-card, .feature-card:hover { transform: none !important; }
  }

  @media (max-width: 768px) {
    .icon-circle {
      width: 56px; height: 56px; line-height: 56px; font-size: 1.6rem;
    }
    .feature-card { padding: 22px; }
    .feature-card h5 { font-size: 15px; }
  }
</style>

<!-- (Opsional) Tambahkan AOS jika belum ada di layout global -->
<!--
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>AOS.init({ once: true, duration: 650, easing: 'ease-out' });</script>
-->


    <section id="services" class="services">
  <div class="container" data-aos="fade-up">

    <div class="section-header">
      <h2>Wisata Terpopuler</h2>
      <p>Nikmati pengalaman liburan terbaik bersama keluarga atau teman dengan paket wisata paling favorit di Desa Sedari. Mulai dari jelajah Hutan Mangrove, Pantai Sedari, hingga Rumah Deret — semua dalam satu paket lengkap dan terjangkau! Yuk, jelajahi #ExploreSedari sekarang!</p>
    </div>

    <div class="row gy-5">
      <?php foreach ($paket as $index => $p): ?>
      <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
        <div class="service-item shadow-sm border-0 rounded-4">
          <div class="img">
            <img src="<?= base_url('assets/images/paket/') . $p->gambar; ?>" class="img-fluid rounded-top" alt="<?= $p->nama_paket; ?>">
          </div>
          <div class="details p-4">
            <div class="icon mb-3">
              <i class="bi bi-boxes fs-3 text-success"></i>
            </div>
            <h3 class="fw-semibold"><?= $p->nama_paket; ?></h3>
            <div class="desc-paket mb-3">
              <p class="text-muted small"><?= $p->keterangan; ?></p>
            </div>

            <!-- Rating Section (dalam card) -->
            <div class="rating-section d-flex align-items-center mt-2">
              <div class="stars text-warning small me-2">
                <?php
                  if ($index === 2) {
                    // Paket ke-3 rating 4.9
                    echo str_repeat('<i class="bi bi-star-fill"></i>', 4);
                    echo '<i class="bi bi-star-half"></i>';
                    $rating = '4.9';
                  } else {
                    // Default full 5 star
                    echo str_repeat('<i class="bi bi-star-fill"></i>', 5);
                    $rating = '5.0';
                  }
                ?>
              </div>
              <span class="rating-number text-muted small"><?= $rating; ?></span>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>




    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container" data-aos="fade-up">

        <div class="section-header text-center">
          <h2>Paket Wisata Terbaik</h2>
          <p>Pilih paket wisata yang sesuai dengan kebutuhan dan budget Anda. Nikmati pengalaman tak terlupakan di Desa Wisata Sedari dengan berbagai pilihan aktivitas menarik</p>
        </div>

        <div class="row gy-4">
          <?php if (!empty($paket)): ?>
            <?php foreach ($paket as $index => $p): ?>
              <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="<?= 200 + ($index * 200) ?>">
                <div class="pricing-item <?= $index == 1 ? 'featured' : '' ?>">
                  <div class="pricing-badge <?= $index == 1 ? 'popular' : '' ?>">
                    <?= $index == 1 ? 'Paling Populer' : 'Paket Populer' ?>
                  </div>
                  
                  <!-- Package Image -->
                  <div class="pricing-image">
                    <img src="<?= base_url('assets/images/paket/') . $p->gambar; ?>" alt="<?= $p->nama_paket; ?>" class="img-fluid">
                  </div>
                  
                  <div class="pricing-header">
                    <h3><?= $p->nama_paket; ?></h3>
                    <h4>Rp <span class="price-amount"><?= number_format($p->harga, 0, ',', '.'); ?></span><span class="price-period"> / orang</span></h4>
                    <p class="pricing-duration">Paket Wisata Lengkap</p>
                  </div>

                  <div class="pricing-description">
                    <p><?= substr($p->keterangan, 0, 120) . '...'; ?></p>
                  </div>

                  <?php if (!empty($p->fasilitas) && trim($p->fasilitas) != ''): ?>
                    <ul class="pricing-features">
                      <?php 
                      $facilities = explode(',', $p->fasilitas);
                      $hasValidFacilities = false;
                      foreach (array_slice($facilities, 0, 5) as $facility): 
                        $facility = trim($facility);
                        if (!empty($facility)):
                          $hasValidFacilities = true;
                      ?>
                        <li><i class="bi bi-check-circle-fill"></i> <span><?= $facility; ?></span></li>
                      <?php 
                        endif;
                      endforeach; 
                      
                      // Jika tidak ada fasilitas valid yang ditemukan, tampilkan default
                      if (!$hasValidFacilities):
                      ?>
                        <li><i class="bi bi-check-circle-fill"></i> <span>Guide Profesional</span></li>
                        <li><i class="bi bi-check-circle-fill"></i> <span>Dokumentasi Foto</span></li>
                        <li><i class="bi bi-check-circle-fill"></i> <span>Transportasi</span></li>
                      <?php endif; ?>
                    </ul>
                  <?php else: ?>
                    <ul class="pricing-features">
                      <li><i class="bi bi-check-circle-fill"></i> <span>Guide Profesional</span></li>
                      <li><i class="bi bi-check-circle-fill"></i> <span>Dokumentasi Foto</span></li>
                      <li><i class="bi bi-check-circle-fill"></i> <span>Transportasi</span></li>
                      <li><i class="bi bi-check-circle-fill"></i> <span>Makanan & Minuman</span></li>
                      <li><i class="bi bi-check-circle-fill"></i> <span>Perlengkapan Wisata</span></li>
                    </ul>
                  <?php endif; ?>

                  <div class="text-center mt-auto">
                    <?php
                    // Ambil nomor telepon dari data kontak
                    $no_whatsapp = '';
                    if (!empty($kontak)) {
                      foreach ($kontak as $k) {
                        $no_whatsapp = $k['telepon'];
                        break; // Ambil nomor pertama
                      }
                    }
                    
                    // Format nomor WhatsApp (hapus karakter non-digit, tambah 62 jika dimulai dengan 0)
                    $no_whatsapp = preg_replace('/[^0-9]/', '', $no_whatsapp);
                    if (substr($no_whatsapp, 0, 1) == '0') {
                      $no_whatsapp = '62' . substr($no_whatsapp, 1);
                    }
                    
                    // Buat pesan WhatsApp
                    $pesan = "Halo, saya tertarik dengan paket wisata:\n\n";
                    $pesan .= "*" . $p->nama_paket . "*\n";
                    $pesan .= "Harga: Rp " . number_format($p->harga, 0, ',', '.') . " / orang\n\n";
                    $pesan .= "Mohon informasi lebih lanjut mengenai:\n";
                    $pesan .= "- Jadwal tersedia\n";
                    $pesan .= "- Cara pemesanan\n";
                    $pesan .= "- Detail lengkap paket\n\n";
                    $pesan .= "Terima kasih!";
                    
                    $pesan_encoded = urlencode($pesan);
                    $whatsapp_url = "https://wa.me/{$no_whatsapp}?text={$pesan_encoded}";
                    ?>
                    <a href="<?= $whatsapp_url ?>" target="_blank" class="buy-btn">
                      <i class="bi bi-whatsapp"></i> Pesan Sekarang
                    </a>
                  </div>

                </div>
              </div><!-- End Pricing Item -->
            <?php endforeach; ?>
          <?php else: ?>
            <div class="col-12 text-center">
              <p class="text-muted">Belum ada data paket wisata yang tersedia.</p>
            </div>
          <?php endif; ?>
        </div>

      </div>
    </section><!-- End Pricing Section -->


    <!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials">
  <div class="container" data-aos="fade-up">

    <div class="section-header text-center">
      <h2 id="title-testi">Testimoni Wisatawan</h2>
      <p>Dengarkan cerita pengalaman tak terlupakan dari para wisatawan yang telah mengunjungi Desa Wisata Sedari</p>
    </div>

    <div class="testimonials-slider swiper">
      <div class="swiper-wrapper">

        <!-- Testimonial 1 -->
        <div class="swiper-slide">
          <div class="testimonial-item text-center">
            <i class="bi bi-person-circle user-icon"></i>
            <h3>Budi Santoso</h3>
            <h4>Wisatawan dari Jakarta</h4>
            <div class="stars mb-2">
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
            </div>
            <p>
              <i class="bi bi-quote quote-icon-left"></i>
              Pengalaman yang luar biasa! Hutan mangrove di Desa Sedari sangat indah dan alami. Anak-anak juga senang belajar tentang ekosistem mangrove. Guide-nya sangat ramah dan informatif. Pasti akan kembali lagi!
              <i class="bi bi-quote quote-icon-right"></i>
            </p>
          </div>
        </div>

        <!-- Testimonial 2 -->
        <div class="swiper-slide">
          <div class="testimonial-item text-center">
            <i class="bi bi-person-circle user-icon"></i>
            <h3>Sari Dewi</h3>
            <h4>Guru SD dari Bandung</h4>
            <div class="stars mb-2">
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
            </div>
            <p>
              <i class="bi bi-quote quote-icon-left"></i>
              Tempat yang sempurna untuk wisata edukasi! Siswa-siswa saya sangat antusias belajar langsung di alam. Fasilitas lengkap, pemandangan pantai indah, dan program edukasinya sangat berkualitas. Highly recommended!
              <i class="bi bi-quote quote-icon-right"></i>
            </p>
          </div>
        </div>

        <!-- Testimonial 3 -->
        <div class="swiper-slide">
          <div class="testimonial-item text-center">
            <i class="bi bi-person-circle user-icon"></i>
            <h3>Ahmad Rizki</h3>
            <h4>Fotografer Alam</h4>
            <div class="stars mb-2">
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
            </div>
            <p>
              <i class="bi bi-quote quote-icon-left"></i>
              Surga bagi fotografer! Pemandangan sunrise dan sunset di pantai Sedari sangat memukau. Hutan mangrove memberikan setting yang unik untuk foto alam. Spot-spot fotonya beragam dan instagramable banget!
              <i class="bi bi-quote quote-icon-right"></i>
            </p>
          </div>
        </div>

        <!-- Testimonial 4 -->
        <div class="swiper-slide">
          <div class="testimonial-item text-center">
            <i class="bi bi-person-circle user-icon"></i>
            <h3>Keluarga Wijaya</h3>
            <h4>Wisatawan dari Surabaya</h4>
            <div class="stars mb-2">
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
            </div>
            <p>
              <i class="bi bi-quote quote-icon-left"></i>
              Liburan keluarga yang sangat menyenangkan! Aktivitas tracking mangrove, naik perahu keliling pantai, dan makan seafood segar di warung lokal. Anak-anak betah main di pantai yang bersih dan aman.
              <i class="bi bi-quote quote-icon-right"></i>
            </p>
          </div>
        </div>

        <!-- Testimonial 5 -->
        <div class="swiper-slide">
          <div class="testimonial-item text-center">
            <i class="bi bi-person-circle user-icon"></i>
            <h3>Maya Santi</h3>
            <h4>Travel Blogger</h4>
            <div class="stars mb-2">
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
            </div>
            <p>
              <i class="bi bi-quote quote-icon-left"></i>
              Hidden gem di Karawang! Desa Sedari menawarkan pengalaman ekowisata yang autentik. Masyarakat lokalnya ramah, makanan tradisionalnya lezat, dan alam yang masih asri. Wajib dikunjungi para traveler!
              <i class="bi bi-quote quote-icon-right"></i>
            </p>
          </div>
        </div>

      </div>
      <div class="swiper-pagination mt-4"></div>
    </div>

  </div>
</section>
<!-- End Testimonials Section -->

    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq">
      <div class="container-fluid" data-aos="fade-up">

        <div class="row gy-4">

          <div class=" d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

            <div class="content px-xl-5 text-center">
              <h3>Frequently Asked <strong>Questions</strong></h3>
              <p>
                Temukan jawaban atas pertanyaan yang sering diajukan seputar paket wisata, pemesanan, dan layanan kami untuk membantu merencanakan liburan terbaik Anda.
              </p>
            </div>

            <div class="accordion accordion-flush px-xl-5" id="faqlist">

              <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                    <i class="bi bi-question-circle question-icon"></i>
                    Bagaimana cara memesan paket wisata?
                  </button>
                </h3>
                <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    Anda dapat memesan paket wisata melalui website kami dengan memilih paket yang diinginkan, mengisi form pemesanan, dan melakukan pembayaran. Tim kami akan menghubungi Anda untuk konfirmasi detail perjalanan dalam 1x24 jam.
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item" data-aos="fade-up" data-aos-delay="300">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                    <i class="bi bi-question-circle question-icon"></i>
                    Apa saja yang sudah termasuk dalam paket wisata?
                  </button>
                </h3>
                <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    Paket wisata kami sudah termasuk transportasi, akomodasi, makan sesuai itinerary, tiket masuk objek wisata, dan guide profesional. Detail lengkap fasilitas dapat dilihat pada masing-masing paket wisata.
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item" data-aos="fade-up" data-aos-delay="400">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                    <i class="bi bi-question-circle question-icon"></i>
                    Apakah bisa melakukan pembatalan atau perubahan jadwal?
                  </button>
                </h3>
                <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    Pembatalan dapat dilakukan maksimal 7 hari sebelum keberangkatan dengan biaya administrasi 10%. Perubahan jadwal dapat dilakukan sesuai ketersediaan dengan konfirmasi 3 hari sebelumnya. Syarat dan ketentuan lengkap dapat dilihat pada halaman Terms & Conditions.
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item" data-aos="fade-up" data-aos-delay="500">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-4">
                    <i class="bi bi-question-circle question-icon"></i>
                    Berapa minimal peserta untuk trip grup?
                  </button>
                </h3>
                <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    Minimal peserta untuk trip grup adalah 4 orang. Jika peserta kurang dari minimum, kami akan menawarkan opsi private trip dengan penyesuaian harga atau menggabungkan dengan grup lain yang jadwalnya sama.
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item" data-aos="fade-up" data-aos-delay="600">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-5">
                    <i class="bi bi-question-circle question-icon"></i>
                    Apa yang harus dibawa saat berwisata?
                  </button>
                </h3>
                <div id="faq-content-5" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    Bawalah pakaian sesuai cuaca, sepatu yang nyaman, kamera, obat-obatan pribadi, dan dokumen identitas. Untuk aktivitas khusus seperti hiking atau snorkeling, kami akan menyediakan informasi detail perlengkapan yang diperlukan.
                  </div>
                </div>
              </div><!-- # Faq item-->

            </div>

          </div>

        
        </div>

      </div>
    </section><!-- End F.A.Q Section -->


    <section id="recent-blog-posts" class="recent-blog-posts">
  <div class="container" data-aos="fade-up">
    <div class="section-header text-center">
      <h2>Artikel Seputar Desa Wisata Sedari</h2>
      <p>Baca artikel terbaru seputar wisata alam, tips berkunjung, dan info menarik tentang Desa Wisata Sedari</p>
    </div>

    <div class="row">
      <?php foreach ($artikel_eksternal as $index => $a): ?>
        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="<?= 200 + ($index * 200) ?>">
          <a href="<?= $a['link']; ?>" target="_blank" class="post-box text-decoration-none text-dark">
            <div class="post-img">
              <img src="<?= base_url('assets/fe/img/blog/' . $a['gambar']); ?>" class="img-fluid" alt="<?= $a['judul']; ?>">
              <div class="post-category">Artikel Eksternal</div>
            </div>
            <div class="post-content">
              <h3 class="post-title"><?= $a['judul']; ?></h3>
              <p class="text-muted small"><?= date('d F Y', strtotime($a['tanggal'])); ?></p>
              <span class="readmore">
                Baca Selengkapnya <i class="bi bi-arrow-right"></i>
              </span>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-header">
          <h2>Kontak Kami</h2>
          <p>Kami siap membantu Anda. Jangan ragu untuk menghubungi kami jika Anda memiliki pertanyaan, masukan, atau membutuhkan informasi lebih lanjut.</p>
        </div>

      </div>

      <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6673.361062505385!2d107.30087748038845!3d-5.9941514686509905!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6bd2a4c32e6001%3A0x10c24e5b31f2622a!2sWisata%20Alam%20Mangrove%20Sedari!5e0!3m2!1sid!2sid!4v1751363585423!5m2!1sid!2sid" frameborder="0" allowfullscreen></iframe>
      </div><!-- End Google Maps -->

      <div class="container">

        <div class="row gy-5 gx-lg-5">

          <div class="col-lg-4">

            <div class="info">
              <?php
              foreach ($kontak as $k) { ?>
              <h3>Lokasi dan Kontak Kami</h3>
              <p>Silahkan tinggalkan pesan anda melalui form ini jika ada hal yang ingin di tanyakan kepada pengelola Desa Wisata Alam dan Pendidikan, Desa Sedari,</p>
              <div class="info-item d-flex">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h4>Alamat</h4>
                  <!--<p>Desa Sedari, Kecamatan Cibuaya, Kabupaten Karawang, Indonesia 41356</p> -->
                 <p><?= $k['alamat']; ?> </p> 
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h4>Email:</h4>
                  <p><?= $k['email']; ?> </p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-phone flex-shrink-0"></i>
                <div>
                  <h4>Telepon</h4>
                  <p><?= $k['telepon']; ?> </p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-instagram flex-shrink-0"></i>
                <div>
                  <h4>Instagram:</h4>
                  <p><?= $k['instagram']; ?> </p>
                </div>
              </div><!-- End Info Item -->
                <?php } ?>
            </div>

          </div>

          <div class="col-lg-8">
            <form action="<?=base_url('pesan/simpan');?>" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="nama" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subjek" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="pesan" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- Gallery Slider JavaScript -->
  <script>
    let currentSlideIndex = 0;
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.dot');
    const totalSlides = slides.length;

    function showSlide(index) {
      // Remove active class from all slides and dots
      slides.forEach(slide => slide.classList.remove('active'));
      dots.forEach(dot => dot.classList.remove('active'));
      
      // Add active class to current slide and dot
      if (slides[index] && dots[index]) {
        slides[index].classList.add('active');
        dots[index].classList.add('active');
      }
    }

    function changeSlide(direction) {
      currentSlideIndex += direction;
      
      if (currentSlideIndex >= totalSlides) {
        currentSlideIndex = 0;
      } else if (currentSlideIndex < 0) {
        currentSlideIndex = totalSlides - 1;
      }
      
      showSlide(currentSlideIndex);
    }

    function currentSlide(index) {
      currentSlideIndex = index - 1;
      showSlide(currentSlideIndex);
    }

    // Auto slide every 5 seconds (only if there are slides)
    if (totalSlides > 1) {
      setInterval(() => {
        changeSlide(1);
      }, 5000);
    }

    // Initialize slider
    document.addEventListener('DOMContentLoaded', function() {
      if (totalSlides > 0) {
        showSlide(0);
      }
    });
  </script>
 

<?php $this->load->view('templates/template-fe/footer'); ?>