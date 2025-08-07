<?php $this->load->view('templates/template-fe/header'); ?>
<?php $this->load->view('templates/template-fe/hero-tentang'); ?>

<!-- ======= CSS Tambahan ======= -->
<style>

  
  /* Section Styles */
  .about-section {
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

  /* Sejarah Section */
  .sejarah-content {
    background: #fff;
    border-radius: 20px;
    padding: 50px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    position: relative;
    overflow: hidden;
  }

  .sejarah-content::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 5px;
    background: linear-gradient(45deg, #28a745, #20c997);
  }

  .sejarah-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(45deg, #28a745, #20c997);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 30px;
    color: white;
    font-size: 2rem;
  }

  .sejarah-text {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #555;
    text-align: justify;
  }

  /* Visi Misi Section */
  .visi-misi-bg {
    background: linear-gradient(135deg, #f8fdfc 0%, #e8f9f5 100%);
  }

  .visi-misi-card {
    background: white;
    border-radius: 20px;
    padding: 40px;
    height: 100%;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
  }

  .visi-misi-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.12);
  }

  .visi-misi-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 5px;
    background: linear-gradient(45deg, #28a745, #20c997);
  }

  .card-icon {
    width: 70px;
    height: 70px;
    background: linear-gradient(45deg, #28a745, #20c997);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 25px;
    color: white;
    font-size: 1.8rem;
  }

  .card-title {
    font-size: 1.8rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 20px;
  }

  .card-content {
    font-size: 1rem;
    line-height: 1.7;
    color: #555;
    text-align: justify;
  }

  /* Timeline Decoration */
  .timeline-decoration {
    position: relative;
    padding: 20px 0;
  }

  .timeline-decoration::before {
    content: '';
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 2px;
    height: 100%;
    background: linear-gradient(to bottom, #28a745, #20c997);
  }

  .timeline-dot {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 20px;
    height: 20px;
    background: #28a745;
    border-radius: 50%;
    border: 4px solid white;
    box-shadow: 0 0 0 4px #28a745;
  }

  /* Responsive */
  @media (max-width: 768px) {
    .about-hero {
      height: 50vh;
      margin-top: 70px;
    }

    .about-hero h1 {
      font-size: 2.5rem;
    }

    .about-hero p {
      font-size: 1.1rem;
    }

    .about-section {
      padding: 60px 0;
    }

    .section-title h2 {
      font-size: 2rem;
    }

    .sejarah-content {
      padding: 30px;
    }

    .visi-misi-card {
      padding: 30px;
      margin-bottom: 30px;
    }

    .timeline-decoration::before {
      display: none;
    }

    .timeline-dot {
      display: none;
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

  .fade-in-up {
    animation: fadeInUp 1s ease;
  }
  
</style>



<!-- ======= Sejarah Section ======= -->
<section id="about-section" class="about-section">
  <div class="container">
    <div class="section-title" data-aos="fade-up">
      <h2>Sejarah Desa Sedari</h2>
      <p>Perjalanan panjang pembentukan dan perkembangan Desa Wisata Sedari</p>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="sejarah-content" data-aos="fade-up" data-aos-delay="200">
          <div class="sejarah-icon">
            <i class="bi bi-clock-history"></i>
          </div>
          
          <?php if (!empty($sejarah)): ?>
            <?php foreach ($sejarah as $s): ?>
              <div class="sejarah-text">
                <?= nl2br($s['keterangan']); ?>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="sejarah-text">
              <p>Desa Sedari merupakan desa wisata yang terletak di pesisir utara Karawang, Jawa Barat. Desa ini dikenal dengan keindahan hutan mangrove yang masih alami dan berbagai aktivitas ekowisata yang menarik. Dengan dukungan masyarakat lokal dan pemerintah, Desa Sedari terus berkembang menjadi destinasi wisata alam yang berkelanjutan.</p>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ======= Timeline Decoration ======= -->
<section class="timeline-decoration">
  <div class="timeline-dot"></div>
</section>

<!-- ======= Visi Misi Section ======= -->
<section class="about-section visi-misi-bg">
  <div class="container">
    <div class="section-title" data-aos="fade-up">
      <h2>Visi & Misi</h2>
      <p>Komitmen kami dalam mengembangkan wisata berkelanjutan</p>
    </div>

    <div class="row">
      <?php if (!empty($visi)): ?>
        <?php foreach ($visi as $index => $v): ?>
          <!-- Card Visi -->
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="visi-misi-card">
              <div class="card-icon icon-visi">
                <i class="bi bi-eye"></i>
              </div>
              <h3 class="card-title">Visi</h3>
              <div class="card-content">
                <?= nl2br($v['visi']); ?>
              </div>
            </div>
          </div>

          <!-- Card Misi -->
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
            <div class="visi-misi-card">
              <div class="card-icon icon-misi">
                <i class="bi bi-bullseye"></i>
              </div>
              <h3 class="card-title">Misi</h3>
              <div class="card-content">
                <?= nl2br($v['misi']); ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <!-- Fallback Visi -->
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
          <div class="visi-misi-card">
            <div class="card-icon icon-visi">
              <i class="bi bi-eye"></i>
            </div>
            <h3 class="card-title">Visi</h3>
            <div class="card-content">
              Menjadi desa wisata alam terdepan yang berkelanjutan dan ramah lingkungan, serta memberikan pengalaman wisata terbaik bagi pengunjung sambil meningkatkan kesejahteraan masyarakat lokal.
            </div>
          </div>
        </div>

        <!-- Fallback Misi -->
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
          <div class="visi-misi-card">
            <div class="card-icon icon-misi">
              <i class="bi bi-bullseye"></i>
            </div>
            <h3 class="card-title">Misi</h3>
            <div class="card-content">
              <ul style="list-style: none; padding: 0; margin: 0;">
                <li>• Mengembangkan ekowisata berkelanjutan</li>
                <li>• Memberdayakan masyarakat lokal</li>
                <li>• Melestarikan ekosistem mangrove</li>
                <li>• Memberikan edukasi lingkungan</li>
                <li>• Menciptakan pengalaman wisata berkualitas</li>
              </ul>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- ======= Style Internal: Visi Misi ======= -->
<style>
  .visi-misi-card {
    background: #fff;
    padding: 30px 25px;
    border-radius: 15px;
    box-shadow: 0 10px 20px rgba(0,0,0,0.05);
    text-align: center;
    transition: transform 0.3s ease;
  }

  .visi-misi-card:hover {
    transform: translateY(-8px);
  }

  .card-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto 20px auto;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 36px;
    background: #e6f2ff;
    box-shadow: 0 0 0 6px rgba(0, 123, 255, 0.1);
    transition: all 0.4s ease;
  }

  .icon-visi {
    background: linear-gradient(145deg, #6dd5ed, #2193b0);
    color: #fff;
    box-shadow: 0 0 0 6px rgba(109, 213, 237, 0.3);
  }

  .icon-misi {
    background: linear-gradient(145deg, #00c9a7, #92fe9d);
    color: #fff;
    box-shadow: 0 0 0 6px rgba(0, 201, 167, 0.3);
  }

  .card-title {
    font-size: 24px;
    font-weight: 700;
    color: #333;
    margin-bottom: 15px;
  }

  .card-content {
    font-size: 16px;
    color: #555;
    line-height: 1.7;
    text-align: left;
  }

  @media (max-width: 768px) {
    .card-content {
      text-align: center;
    }
  }
</style>

<?php $this->load->view('templates/template-fe/footer'); ?>