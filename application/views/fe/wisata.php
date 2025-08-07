<?php $this->load->view('templates/template-fe/header'); ?>
<?php $this->load->view('templates/template-fe/hero-wisata'); ?>

<!-- ======= CSS Tambahan ======= -->
<style>
 
  /* Section Styles */
  .wisata-section {
    padding: 80px 0;
  }

  .section-title {
    text-align: center;
    margin-bottom: 60px;
  }

  .section-title h2 {
    font-size: 2.5rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 20px;
    position: relative;
  }

  .section-title h2::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 4px;
    background: linear-gradient(45deg, #28a745, #20c997);
    border-radius: 2px;
  }

  .section-title p {
    font-size: 1.1rem;
    color: #6c757d;
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
  }

  /* Jenis Wisata Cards */
  .jenis-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    position: relative;
  }

  .jenis-card:hover {
    transform: translateY(-15px);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
  }

  .jenis-card-img {
    position: relative;
    height: 250px;
    overflow: hidden;
  }

  .jenis-card-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
  }

  .jenis-card:hover .jenis-card-img img {
    transform: scale(1.1);
  }

  .jenis-card-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(40, 167, 69, 0.8), rgba(32, 201, 151, 0.8));
    opacity: 0;
    transition: opacity 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .jenis-card:hover .jenis-card-overlay {
    opacity: 1;
  }

  .price-badge {
    position: absolute;
    top: 20px;
    right: 20px;
    background: #28a745;
    color: white;
    padding: 8px 15px;
    border-radius: 20px;
    font-weight: 600;
    font-size: 14px;
    z-index: 2;
  }

  .explore-btn {
    color: white;
    font-size: 1.2rem;
    font-weight: 600;
    text-decoration: none;
    padding: 12px 25px;
    border: 2px solid white;
    border-radius: 30px;
    transition: all 0.3s ease;
  }

  .explore-btn:hover {
    background: white;
    color: #28a745;
  }

  .jenis-card-content {
    padding: 30px;
  }

  .jenis-card-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 15px;
  }

  .jenis-card-description {
  color: #6c757d;
  line-height: 1.6;
  margin-bottom: 20px;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
  transition: all .3s ease;
}

.jenis-card.expanded .jenis-card-description {
  display: block;
  -webkit-line-clamp: unset;
  overflow: visible;
}



  .jenis-features {
    display: flex;
    gap: 15px;
    margin-top: 20px;
  }

  .feature-tag {
    background: #f8f9fa;
    color: #28a745;
    padding: 5px 12px;
    border-radius: 15px;
    font-size: 12px;
    font-weight: 600;
  }

  /* Paket Wisata Cards */
  .paket-bg {
    background: linear-gradient(135deg, #f8fdfc 0%, #e8f9f5 100%);
  }

  .paket-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    height: 100%;
    position: relative;
  }

  .paket-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.12);
  }

  .paket-card-img {
    position: relative;
    height: 220px;
    overflow: hidden;
  }

  .paket-card-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
  }

  .paket-card:hover .paket-card-img img {
    transform: scale(1.05);
  }

  .paket-badge {
    position: absolute;
    top: 15px;
    left: 15px;
    background: linear-gradient(45deg, #28a745, #20c997);
    color: white;
    padding: 8px 15px;
    border-radius: 20px;
    font-weight: 600;
    font-size: 12px;
    text-transform: uppercase;
  }

  .paket-card-content {
    padding: 25px;
  }

  .paket-card-title {
    font-size: 1.4rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 15px;
  }

  .paket-price {
    font-size: 1.8rem;
    font-weight: 700;
    color: #28a745;
    margin-bottom: 15px;
  }

  .paket-price span {
    font-size: 0.9rem;
    color: #6c757d;
    font-weight: 400;
  }

  .paket-description {
    color: #6c757d;
    line-height: 1.6;
    margin-bottom: 20px;
    font-size: 14px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }

  .paket-facilities {
    margin-bottom: 20px;
  }

  .paket-facilities h6 {
    font-size: 14px;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 10px;
  }

  .facilities-list {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
  }

  .facility-item {
    background: #e8f5e8;
    color: #28a745;
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 500;
  }

  .paket-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: linear-gradient(45deg, #28a745, #20c997);
    color: white;
    padding: 12px 20px;
    border-radius: 25px;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    transition: all 0.3s ease;
    width: 100%;
    justify-content: center;
  }

  .paket-btn:hover {
    background: linear-gradient(45deg, #20c997, #17a2b8);
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(40, 167, 69, 0.3);
    color: white;
  }

  /* Responsive */
  @media (max-width: 768px) {
    .wisata-hero {
      height: 50vh;
      margin-top: 70px;
    }

    .wisata-hero h1 {
      font-size: 2.5rem;
    }

    .wisata-hero p {
      font-size: 1.1rem;
    }

    .wisata-section {
      padding: 60px 0;
    }

    .section-title h2 {
      font-size: 2rem;
    }

    .jenis-card-img,
    .paket-card-img {
      height: 200px;
    }

    .jenis-card-content,
    .paket-card-content {
      padding: 20px;
    }

    .jenis-features {
      justify-content: center;
    }
  }

  /* Animations */
  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(30px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
  
</style>

<!-- ======= Jenis Wisata Section ======= -->
<section id="wisata-section" class="wisata-section">
  <div class="container">
    <div class="section-title" data-aos="fade-up">
      <h2>Jenis Wisata</h2>
      <p>Berbagai pilihan wisata alam yang menawan untuk petualangan Anda</p>
    </div>

    <div class="row">
      <?php if (!empty($jenis)): ?>
        <?php foreach ($jenis as $index => $j): ?>
          <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="<?= 200 + ($index * 100) ?>">
            <div class="jenis-card">
              <div class="jenis-card-img">
                <img src="<?= base_url('assets/img/jenis/') . $j['gambar']; ?>" alt="<?= $j['nama_wisata']; ?>">
                <div class="price-badge">
                  Rp <?= number_format($j['harga_tiket'], 0, ',', '.'); ?>
                </div>
                <div class="jenis-card-overlay">
                  <a href="#paket-wisata" class="explore-btn" aria-label="Lihat paket wisata">Lihat Paket Wisata</a>


                </div>
              </div>
              <div class="jenis-card-content">
                <h3 class="jenis-card-title"><?= $j['nama_wisata']; ?></h3>
                <p class="jenis-card-description">
  <?php
    $maxLength = 100; // batas karakter sebelum Read More muncul
    if (strlen($j['deskripsi']) > $maxLength) {
        $shortDesc = substr($j['deskripsi'], 0, $maxLength) . '...';
        echo '<span class="short-desc">' . $shortDesc . '</span>';
        echo '<span class="full-desc d-none">' . $j['deskripsi'] . '</span>';
        echo ' <a href="#" class="read-more" data-expanded="false">Read More</a>';
    } else {
        echo $j['deskripsi'];
    }
  ?>
</p>

                <div class="jenis-features">
                  <span class="feature-tag">Alam</span>
                  <span class="feature-tag">Edukasi</span>
                  <span class="feature-tag">Foto</span>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="col-12 text-center">
          <p class="text-muted">Belum ada data jenis wisata yang tersedia.</p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- ======= Paket Wisata Section (gaya services tanpa rating, WA dari controller) ======= -->
<section id="paket-wisata" class="services paket-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-header">
      <h2>Paket Wisata</h2>
      <p>Nikmati pengalaman liburan terbaik bersama keluarga atau teman dengan paket wisata paling favorit di Desa Sedari. Mulai dari jelajah Hutan Mangrove, Pantai Sedari, hingga Rumah Deret — semua dalam satu paket lengkap dan terjangkau! Yuk, jelajahi #ExploreSedari sekarang!</p>
    </div>

    <div class="row gy-5">
      <?php if (!empty($paket)): ?>
        <?php foreach ($paket as $index => $p): ?>
          <?php
            $nama_paket = $p['nama_paket'];
            $harga      = $p['harga'];
            $keterangan = $p['keterangan'];
            $gambar     = $p['gambar'];
            $fasilitas  = $p['fasilitas'];

            $wa_base = isset($wa_link_base) ? $wa_link_base : '';
            $msg = 'Halo kak, saya mau tanya tentang paket wisata (' . $nama_paket . ')';
            $href = $wa_base ? $wa_base . rawurlencode($msg) : '#';
          ?>
          <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="<?= 200 + ($index * 100) ?>">
            <div class="service-item shadow-sm border-0 rounded-4 h-100">
              <div class="img position-relative">
                <img
                  src="<?= base_url('assets/images/paket/') . $gambar; ?>"
                  class="img-fluid rounded-top w-100"
                  alt="<?= html_escape($nama_paket); ?>"
                  onerror="this.onerror=null;this.src='<?= base_url('assets/fe/img/blog/default-blog.jpg'); ?>';"
                >
              </div>

              <div class="details p-4 d-flex flex-column">
                <div class="icon mb-3">
                  <i class="bi bi-boxes fs-3 text-success"></i>
                </div>

                <h3 class="fw-semibold mb-2"><?= html_escape($nama_paket); ?></h3>

                <div class="mb-2">
                  <span class="fw-bold text-success fs-5">Rp <?= number_format($harga, 0, ',', '.'); ?></span>
                  <small class="text-muted">/ orang</small>
                </div>

                <div class="desc-paket mb-3">
                  <p class="text-muted small mb-2"><?= html_escape($keterangan); ?></p>

                  <?php if (!empty($fasilitas)): ?>
                    <p class="text-muted small mb-1 fw-bold">Fasilitas Wisata:</p>
                    <p class="text-muted small mb-0">
                      <?= html_escape(ucwords($fasilitas)); ?>
                    </p>
                  <?php endif; ?>
                </div>

                <div class="mt-auto">
                  <a href="<?= $href; ?>"
                     <?= $wa_base ? 'target="_blank" rel="noopener"' : '' ?>
                     class="btn btn-success w-100 d-inline-flex align-items-center justify-content-center gap-2 rounded-3">
                    <i class="bi bi-whatsapp"></i> Pesan Sekarang
                  </a>
                  <?php if (!$wa_base): ?>
                    <small class="text-muted d-block mt-2">Nomor WhatsApp admin belum tersedia.</small>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="col-12 text-center">
          <p class="text-muted">Belum ada data paket wisata yang tersedia.</p>
        </div>
      <?php endif; ?>
    </div>

  </div>
</section>

<?php $this->load->view('templates/template-fe/footer'); ?>


<script>
document.addEventListener('DOMContentLoaded', function() {
  const allCards = document.querySelectorAll('.jenis-card');

  document.querySelectorAll('.read-more').forEach(function(link) {
    link.addEventListener('click', function(e) {
      e.preventDefault();

      const card = this.closest('.jenis-card');
      const p = card.querySelector('.jenis-card-description');
      const shortDesc = p.querySelector('.short-desc');
      const fullDesc = p.querySelector('.full-desc');
      const expanded = this.dataset.expanded === "true";

      // Tutup semua card lain
      allCards.forEach(c => {
        if (c !== card) {
          c.classList.remove('expanded');
          const rm = c.querySelector('.read-more');
          const sDesc = c.querySelector('.short-desc');
          const fDesc = c.querySelector('.full-desc');
          if (rm) {
            rm.textContent = 'Read More';
            rm.dataset.expanded = "false";
            rm.setAttribute('aria-expanded', 'false');
          }
          if (sDesc) sDesc.classList.remove('d-none');
          if (fDesc) fDesc.classList.add('d-none');
        }
      });

      // Toggle card yang diklik
      if (!expanded) {
        shortDesc && shortDesc.classList.add('d-none');
        fullDesc && fullDesc.classList.remove('d-none');
        card.classList.add('expanded');
        this.textContent = 'Read Less';
        this.dataset.expanded = "true";
        this.setAttribute('aria-expanded', 'true');
      } else {
        shortDesc && shortDesc.classList.remove('d-none');
        fullDesc && fullDesc.classList.add('d-none');
        card.classList.remove('expanded');
        this.textContent = 'Read More';
        this.dataset.expanded = "false";
        this.setAttribute('aria-expanded', 'false');
      }
    });
  });
});
</script>



<script>
  // Smooth scroll native
  document.documentElement.style.scrollBehavior = 'smooth';

  // Jika navbar fixed, beri offset supaya judul section tidak tertutup
  (function() {
    // Ganti selector di bawah sesuai navbar kamu
    var navbar = document.querySelector('.navbar, header .navbar, #header');
    var offset = navbar ? (navbar.offsetHeight || 80) : 80;

    // Terapkan scroll-margin-top ke target section agar semua anchor rapi
    var target = document.getElementById('paket-wisata');
    if (target) {
      target.style.scrollMarginTop = offset + 'px';
    }

    // (Opsional) Intersep klik anchor untuk jaga-jaga jika browser tidak dukung scroll-behavior
    document.querySelectorAll('a[href^="#paket-wisata"]').forEach(function(a) {
      a.addEventListener('click', function(e) {
        var el = document.getElementById('paket-wisata');
        if (!el) return;
        e.preventDefault();
        var y = el.getBoundingClientRect().top + window.pageYOffset - offset;
        window.scrollTo({ top: y, behavior: 'smooth' });
        // Focus untuk aksesibilitas
        el.setAttribute('tabindex', '-1');
        el.focus({ preventScroll: true });
      });
    });
  })();
</script>
