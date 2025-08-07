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
    font-size: 70px;
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 20px;
    opacity: 0;
    animation: slideIn 1.5s ease forwards;
    animation-delay: 0.5s;
  }

  #hero-animated p {
    font-size: 25px;
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


  /* Video Section */
  .video-section {
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

  /* Video Grid */
  .video-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
    margin-top: 40px;
  }

  .video-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    position: relative;
  }

  .video-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
  }

  .video-container {
    position: relative;
    width: 100%;
    height: 250px;
    background: #000;
    border-radius: 20px 20px 0 0;
    overflow: hidden;
  }

  .video-frame {
    width: 100%;
    height: 100%;
    border: none;
    border-radius: 20px 20px 0 0;
  }

  .video-content {
    padding: 25px;
  }

  .video-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 15px;
    line-height: 1.4;
  }

  .video-description {
    color: #6c757d;
    line-height: 1.6;
    margin-bottom: 20px;
    font-size: 14px;
  }

  .video-meta {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 15px;
    border-top: 1px solid #e9ecef;
  }

  .video-category {
    background: linear-gradient(45deg, #28a745, #20c997);
    color: white;
    padding: 5px 12px;
    border-radius: 15px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
  }

  .video-actions {
    display: flex;
    gap: 10px;
  }

  .video-btn {
    width: 35px;
    height: 35px;
    border: none;
    border-radius: 50%;
    background: #f8f9fa;
    color: #6c757d;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 14px;
  }

  .video-btn:hover {
    background: #28a745;
    color: white;
    transform: scale(1.1);
  }

  .video-btn.fullscreen:hover {
    background: #007bff;
  }

  .video-btn.share:hover {
    background: #17a2b8;
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


  /* Featured Video */
  .featured-video {
    grid-column: 1 / -1;
    max-width: 800px;
    margin: 0 auto;
  }

  .featured-video .video-container {
    height: 400px;
  }

  /* Video Overlay Play Button */
  .video-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.3);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
    pointer-events: none;
  }

  .video-card:hover .video-overlay {
    opacity: 1;
  }

  .play-overlay {
    width: 80px;
    height: 80px;
    background: rgba(40, 167, 69, 0.9);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 2rem;
    transform: scale(0.8);
    transition: transform 0.3s ease;
  }

  .video-card:hover .play-overlay {
    transform: scale(1);
  }

  /* Responsive */
  @media (max-width: 768px) {
    .video-hero {
      height: 40vh;
      margin-top: 70px;
    }

    .video-hero h1 {
      font-size: 2.2rem;
    }

    .video-hero p {
      font-size: 1.1rem;
    }

    .video-section {
      padding: 60px 0;
    }

    .section-title h2 {
      font-size: 2rem;
    }

    .video-grid {
      grid-template-columns: 1fr;
      gap: 20px;
    }

    .video-container {
      height: 200px;
    }

    .featured-video .video-container {
      height: 250px;
    }

    .video-content {
      padding: 20px;
    }

    .play-overlay {
      width: 60px;
      height: 60px;
      font-size: 1.5rem;
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
    position: relative;
  }

  .modal-video {
    width: 100%;
    height: 70vh;
    border: none;
  }

  .modal-close {
    position: absolute;
    top: 15px;
    right: 20px;
    color: white;
    font-size: 2rem;
    cursor: pointer;
    z-index: 1051;
    background: rgba(0, 0, 0, 0.7);
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
    <h1>Galeri Video Wisata <?= isset($jenis['nama_wisata']) ? $jenis['nama_wisata'] : ''; ?></h1>
    <p>Saksikan keseruan dan keindahan destinasi <?= isset($jenis['nama_wisata']) ? $jenis['nama_wisata'] : 'Desa Sedari'; ?> melalui video-video inspiratif yang kami dokumentasikan untuk Anda.</p>

    <!-- Ikon Scroll -->
    <div class="scroll-down">
      <a class="scroll-down" href="#video-section" aria-label="Scroll ke bagian galeri">
        <i class="bi bi-chevron-down"></i>
      </a>
    </div>
  </div>
</section>


<!-- ======= Video Section ======= -->
<section id= "video-section" class="video-section">
  <div class="container">
    <div class="section-title" data-aos="fade-up">
      <h2>Koleksi Video</h2>
    </div>

    <?php if (!empty($video)): ?>
      <div class="video-grid">
        <?php foreach ($video as $index => $v): ?>
          <div class="video-card <?= $index === 0 ? 'featured-video' : '' ?>" data-aos="fade-up" data-aos-delay="<?= 100 + ($index * 100) ?>">
            <div class="video-container">
              <iframe src="<?= $v['link_video']; ?>" 
                      class="video-frame" 
                      allowfullscreen
                      title="<?= $v['keterangan']; ?>">
              </iframe>
              <div class="video-overlay">
                <div class="play-overlay">
                  <i class="bi bi-play-fill"></i>
                </div>
              </div>
            </div>
            
            <div class="video-content">
              <h3 class="video-title"><?= $v['keterangan']; ?></h3>
              <p class="video-description">
                Nikmati keindahan <?= $jenis['nama_wisata']; ?> melalui video berkualitas tinggi yang menampilkan pesona alam dan aktivitas menarik.
              </p>
              
              <div class="video-meta">
                <div class="video-category"><?= $jenis['nama_wisata']; ?></div>
                <div class="video-actions">
                  <button class="video-btn fullscreen" onclick="openVideoModal('<?= $v['link_video']; ?>')" title="Fullscreen">
                    <i class="bi bi-arrows-fullscreen"></i>
                  </button>
                  <button class="video-btn share" onclick="shareVideo('<?= $v['link_video']; ?>')" title="Share">
                    <i class="bi bi-share"></i>
                  </button>
                  <button class="video-btn" onclick="window.open('<?= $v['link_video']; ?>', '_blank')" title="Buka di Tab Baru">
                    <i class="bi bi-box-arrow-up-right"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <div class="empty-state" data-aos="fade-up">
        <i class="bi bi-play-circle"></i>
        <h3>Belum Ada Video</h3>
        <p>Koleksi video untuk <?= $jenis['nama_wisata']; ?> belum tersedia</p>
        
      </div>
    <?php endif; ?>

    <!-- Back to Gallery Button -->
    <?php if (!empty($video)): ?>
      <div class="text-center mt-5" data-aos="fade-up">
        
      </div>
    <?php endif; ?>
  </div>
</section>

<!-- Modal untuk Video Fullscreen -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-close" onclick="closeVideoModal()">&times;</div>
      <div class="modal-body">
        <iframe src="" id="modalVideo" class="modal-video" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>

<script>
// Modal Functions
function openVideoModal(videoUrl) {
  const modal = document.getElementById('videoModal');
  const modalVideo = document.getElementById('modalVideo');
  
  modalVideo.src = videoUrl;
  
  // Show modal using Bootstrap
  const bsModal = new bootstrap.Modal(modal);
  bsModal.show();
}

function closeVideoModal() {
  const modal = document.getElementById('videoModal');
  const modalVideo = document.getElementById('modalVideo');
  const bsModal = bootstrap.Modal.getInstance(modal);
  
  // Stop video
  modalVideo.src = '';
  bsModal.hide();
}

// Share Function
function shareVideo(videoUrl) {
  if (navigator.share) {
    navigator.share({
      title: '<?= $jenis["nama_wisata"]; ?> - Video Wisata',
      text: 'Lihat video wisata menarik dari <?= $jenis["nama_wisata"]; ?>',
      url: videoUrl
    });
  } else {
    // Fallback: copy to clipboard
    navigator.clipboard.writeText(videoUrl).then(() => {
      alert('Link video telah disalin ke clipboard!');
    }).catch(() => {
      // If clipboard API fails, show the URL
      prompt('Salin link video ini:', videoUrl);
    });
  }
}

// Keyboard Navigation
document.addEventListener('keydown', function(e) {
  if (e.key === 'Escape') {
    closeVideoModal();
  }
});

// Handle modal close event
document.getElementById('videoModal').addEventListener('hidden.bs.modal', function() {
  document.getElementById('modalVideo').src = '';
});
</script>

<?php $this->load->view('templates/template-fe/footer'); ?>