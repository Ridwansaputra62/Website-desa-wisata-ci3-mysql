<?php $this->load->view('templates/template-fe/header'); ?>
<?php $this->load->view('templates/template-fe/hero-galeri'); ?>

<!-- ======= CSS Tambahan ======= -->
<style>
  
  /* Section Styles */
  .galeri-section {
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
    height: 100%;
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
    flex-direction: column;
    gap: 15px;
  }

  .jenis-card:hover .jenis-card-overlay {
    opacity: 1;
  }

  .gallery-btn {
    color: white;
    font-size: 1rem;
    font-weight: 600;
    text-decoration: none;
    padding: 10px 20px;
    border: 2px solid white;
    border-radius: 25px;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
  }

  .gallery-btn:hover {
    background: white;
    color: #28a745;
    text-decoration: none;
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
  }

  .gallery-count {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #f8f9fa;
    padding: 12px 15px;
    border-radius: 10px;
    font-size: 14px;
    color: #6c757d;
  }

  .count-item {
    display: flex;
    align-items: center;
    gap: 5px;
  }

  .count-item i {
    color: #28a745;
  }

  /* Responsive */
  @media (max-width: 768px) {
    .galeri-hero {
      height: 50vh;
      margin-top: 70px;
    }

    .galeri-hero h1 {
      font-size: 2.5rem;
    }

    .galeri-hero p {
      font-size: 1.1rem;
    }

    .galeri-section {
      padding: 60px 0;
    }

    .section-title h2 {
      font-size: 2rem;
    }

    .jenis-card-img {
      height: 200px;
    }

    .jenis-card-content {
      padding: 20px;
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


<!-- ======= Galeri Section ======= -->
<section id=galeri-section class="galeri-section">
  <div class="container">
    <div class="section-title" data-aos="fade-up">
      <h2>Pilih Wisata</h2>
      <p>Lihat koleksi foto dan video dari setiap jenis wisata yang tersedia</p>
    </div>

    <div class="row">
      <?php if (!empty($jenis)): ?>
        <?php foreach ($jenis as $index => $j): ?>
          <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="<?= 200 + ($index * 100) ?>">
            <div class="jenis-card">
              <div class="jenis-card-img">
                <img src="<?= base_url('assets/img/jenis/') . $j['gambar']; ?>" alt="<?= $j['nama_wisata']; ?>">
                <div class="jenis-card-overlay">
                  <a href="<?= base_url('galeri/foto/') . $j['id_jenis']; ?>" class="gallery-btn">
                    <i class="bi bi-images"></i>
                    Lihat Foto
                  </a>
                  <a href="<?= base_url('galeri/video/') . $j['id_jenis']; ?>" class="gallery-btn">
                    <i class="bi bi-play-circle"></i>
                    Lihat Video
                  </a>
                </div>
              </div>
              <div class="jenis-card-content">
                <h3 class="jenis-card-title"><?= $j['nama_wisata']; ?></h3>
                <p class="jenis-card-description"><?= $j['deskripsi']; ?></p>
                
                <div class="gallery-count">
                  <div class="count-item">
                    <i class="bi bi-images"></i>
                    <span>Foto Tersedia</span>
                  </div>
                  <div class="count-item">
                    <i class="bi bi-play-circle"></i>
                    <span>Video Tersedia</span>
                  </div>
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

<?php $this->load->view('templates/template-fe/footer'); ?>