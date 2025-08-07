<?php
  $background = $this->db->get('background_home')->row_array();
  $bg_url = base_url('assets/images/background/' . $background['gambar']);
?>
<section id="hero-animated" class="hero-animated" style="background: url('<?= $bg_url ?>') center center / cover no-repeat;">

  <div class="container">
    <h1>Tentang Kami</h1>
    <p>Mengenal Lebih Dekat Desa Wisata Sedari</p>

    <!-- Ikon Scroll -->
    <div class="scroll-down">
  <a class="scroll-down" href="<?= base_url('tentang#about-section'); ?>" aria-label="Scroll ke bagian tentang">
  <i class="bi bi-chevron-down"></i>
</a>

</div>

  </div>
</section>
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
</style>
