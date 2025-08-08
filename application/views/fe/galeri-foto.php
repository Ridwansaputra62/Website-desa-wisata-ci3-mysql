<?php $this->load->view('templates/template-fe/header'); ?>

<!-- ======= CSS Tambahan ======= -->
<style>
  /* Hero Section */
  #hero-animated {
    height: 100vh;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    background-size: cover;
    background-position: center;
  }

  #hero-animated::before {
    content: "";
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    background: rgba(0, 0, 0, 0.35);
    z-index: 1;
  }

  #hero-animated .container {
    position: relative;
    z-index: 2;
    text-align: center;
    animation: fadeUp 1.5s ease forwards;
    padding: 0 30px;
  }

  #hero-animated h1 {
    font-size: 60px;
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 20px;
    opacity: 0;
    animation: slideIn 1.5s ease forwards;
    animation-delay: 0.5s;
  }

  #hero-animated p {
    font-size: 23px;
    margin-bottom: 30px;
    color: #e6ffe6;
    opacity: 0;
    animation: slideIn 1.5s ease forwards;
    animation-delay: 0.9s;
  }

  /* Mobile Styling */
  @media (max-width: 576px) {
    #hero-animated {
      align-items: flex-end; /* teks turun ke bawah */
    }

    #hero-animated .container {
      padding-bottom: 325px; /* beri jarak dari bawah */
    }

    #hero-animated h1 {
      font-size: 40px;
      line-height: 1.2;
    }

    #hero-animated p {
      font-size: 20px;
    }

    #hero-animated .scroll-down {
    bottom: 100px !important;
  }

  #hero-animated .scroll-down i {
    font-size: 50px !important;
  }
}

  /* Scroll Icon */
  .scroll-down {
    position: absolute;
    bottom: -50px;
    left: 50%;
    transform: translateX(-50%);
    animation: bounce 1.5s infinite;
    cursor: pointer;
    z-index: 2;
  }

  .scroll-down i {
    font-size: 35px;
    color: white;
    opacity: 0.85;
    transition: opacity 0.3s;
  }

  .scroll-down:hover i {
    opacity: 1;
  }

  /* Animations */
  @keyframes bounce {
    0%, 20%, 50%, 80%, 100% { transform: translate(-50%, 0); }
    40% { transform: translate(-50%, -12px); }
    60% { transform: translate(-50%, -6px); }
  }

  @keyframes fadeUp {
    0% { opacity: 0; transform: translateY(20px); }
    100% { opacity: 1; transform: translateY(0); }
  }

  @keyframes slideIn {
    0% { opacity: 0; transform: translateY(30px); }
    100% { opacity: 1; transform: translateY(0); }
  }

  /* Gallery Section */
  .gallery-section {
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

  /* Photo Grid */
  .photo-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    margin-top: 40px;
  }

  .photo-item {
    position: relative;
    border-radius: 15px;
    overflow: hidden;
    background: white;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    cursor: pointer;
  }

  .photo-item:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
  }

  .photo-img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    transition: transform 0.3s ease;
  }

  .photo-item:hover .photo-img {
    transform: scale(1.05);
  }

  .photo-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to bottom, transparent 0%, rgba(0, 0, 0, 0.8) 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
    display: flex;
    align-items: flex-end;
    padding: 20px;
  }

  .photo-item:hover .photo-overlay {
    opacity: 1;
  }

  .photo-info {
    color: white;
    width: 100%;
  }

  .photo-title {
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 5px;
  }

  .photo-description {
    font-size: 14px;
    opacity: 0.9;
    line-height: 1.4;
  }

  .photo-actions {
    position: absolute;
    top: 15px;
    right: 15px;
    display: flex;
    gap: 10px;
    opacity: 0;
    transition: opacity 0.3s ease;
  }

  .photo-item:hover .photo-actions {
    opacity: 1;
  }

  .action-btn {
    width: 40px;
    height: 40px;
    background: rgba(255, 255, 255, 0.9);
    border: none;
    border-radius: 50%;
    color: #28a745;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 16px;
  }

  .action-btn:hover {
    background: #28a745;
    color: white;
    transform: scale(1.1);
  }

  /* Empty State */
  .empty-state {
    text-align: center;
    padding: 80px 20px;
  }

  .empty-state i {
    font-size: 4rem;
    color: #e9ecef;
    margin-bottom: 20px;
  }

  .empty-state h3 {
    color: #6c757d;
    margin-bottom: 10px;
  }

  .empty-state p {
    color: #adb5bd;
    margin-bottom: 30px;
  }

  


  /* Responsive */
  @media (max-width: 768px) {
    .foto-hero {
      height: 40vh;
      margin-top: 70px;
    }

    .foto-hero h1 {
      font-size: 2.2rem;
    }

    .foto-hero p {
      font-size: 1.1rem;
    }

    .gallery-section {
      padding: 60px 0;
    }

    .section-title h2 {
      font-size: 2rem;
    }

    .photo-grid {
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 15px;
    }

    .photo-img {
      height: 200px;
    }
  }

  /* Modal Styles */
  .modal-content {
    background: #000;
    border: none;
    border-radius: 10px;
  }

  .modal-body {
    padding: 0;
  }

  .modal-image {
    width: 100%;
    height: auto;
    max-height: 80vh;
    object-fit: contain;
  }

  .modal-close {
    position: absolute;
    top: 15px;
    right: 20px;
    color: white;
    font-size: 2rem;
    cursor: pointer;
    z-index: 1051;
    background: rgba(0, 0, 0, 0.5);
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
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
<?php
  $background = $this->db->get('background_home')->row_array();
  $bg_url = base_url('assets/images/background/' . $background['gambar']);
?>
<section id="hero-animated" class="hero-animated" style="background: url('<?= $bg_url ?>') center center / cover no-repeat;">

  <div class="container">
    <h1>Galeri Foto Wisata <?= isset($jenis['nama_wisata']) ? $jenis['nama_wisata'] : ''; ?></h1>
    <p>Jelajahi keindahan alam, budaya, dan momen seru yang terekam di setiap sudut destinasi <?= isset($jenis['nama_wisata']) ? $jenis['nama_wisata'] : 'desa kami'; ?></p>

    <!-- Ikon Scroll -->
    <div class="scroll-down">
      <a class="scroll-down" href="#gallery-section" aria-label="Scroll ke bagian galeri">

        <i class="bi bi-chevron-down"></i>
      </a>
    </div>
  </div>
</section>

<!-- ======= Gallery Section ======= -->
<section id="gallery-section" class="gallery-section">
  <div class="container">
    <div class="section-title" data-aos="fade-up">
      <h2>Koleksi Foto</h2>
    </div>

    <?php if (!empty($gallery)): ?>
      <div class="photo-grid">
        <?php foreach ($gallery as $index => $g): ?>
          <div class="photo-item" data-aos="fade-up" data-aos-delay="<?= 100 + ($index * 50) ?>">
            <img src="<?= base_url('assets/img/gallery/') . $g['gambar']; ?>" 
                 alt="<?= $g['keterangan']; ?>" 
                 class="photo-img"
                 onclick="openModal(this)">
            
            <div class="photo-overlay">
              <div class="photo-info">
                <div class="photo-title"><?= $jenis['nama_wisata']; ?></div>
                <div class="photo-description"><?= $g['keterangan']; ?></div>
              </div>
            </div>

            <div class="photo-actions">
              <button class="action-btn" onclick="openModal(this.closest('.photo-item').querySelector('.photo-img'))" title="Lihat Penuh">
                <i class="bi bi-arrows-fullscreen"></i>
              </button>
              <button class="action-btn" onclick="downloadImage('<?= base_url('assets/img/gallery/') . $g['gambar']; ?>')" title="Download">
                <i class="bi bi-download"></i>
              </button>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <div class="empty-state" data-aos="fade-up">
        <i class="bi bi-images"></i>
        <h3>Belum Ada Foto</h3>
        <p>Koleksi foto untuk <?= $jenis['nama_wisata']; ?> belum tersedia</p>
        
      </div>
    <?php endif; ?>

    <!-- Back to Gallery Button -->
    <?php if (!empty($gallery)): ?>
      <div class="text-center mt-5" data-aos="fade-up">
        
      </div>
    <?php endif; ?>
  </div>
</section>

<!-- Modal untuk Preview Gambar -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-close" onclick="closeModal()">&times;</div>
      <div class="modal-body">
        <img src="" id="modalImage" class="modal-image" alt="">
      </div>
    </div>
  </div>
</div>

<script>
// Modal Functions
function openModal(imgElement) {
  const modal = document.getElementById('imageModal');
  const modalImg = document.getElementById('modalImage');
  
  modalImg.src = imgElement.src;
  modalImg.alt = imgElement.alt;
  
  // Show modal using Bootstrap
  const bsModal = new bootstrap.Modal(modal);
  bsModal.show();
}

function closeModal() {
  const modal = document.getElementById('imageModal');
  const bsModal = bootstrap.Modal.getInstance(modal);
  bsModal.hide();
}

// Download Function
function downloadImage(imageUrl) {
  const link = document.createElement('a');
  link.href = imageUrl;
  link.download = imageUrl.split('/').pop();
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
}

// Keyboard Navigation
document.addEventListener('keydown', function(e) {
  if (e.key === 'Escape') {
    closeModal();
  }
});
</script>

<?php $this->load->view('templates/template-fe/footer'); ?>