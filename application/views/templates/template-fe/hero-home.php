<?php
  $background = $this->db->get('background_home')->row_array();
  $bg_url = base_url('assets/images/background/' . $background['gambar']);
?>
<section id="hero-animated" class="hero-animated" style="background: url('<?= $bg_url ?>') center center / cover no-repeat;">
  <div class="overlay"></div>

  <div class="container text-center">
    <h1>Selamat Datang di Website <span>Desa Sedari, Desa Wisata Alam dan Pendidikan</span></h1>
    <p>Jelajahi indahnya hutan mangrove, pantai sedari, sampai rumah deret</p>
    <a href="#onfocus" class="btn-get-started scrollto">
      <i class="bi bi-arrow-right-circle"></i> Get Started
    </a>
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
    background-attachment: fixed;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
  }

  @media (max-width: 768px) {
    #hero-animated {
      background-attachment: scroll;
    }
  }

  .overlay {
    position: absolute;
    inset: 0;
    background-color: rgba(0, 0, 0, 0.35);
    z-index: 1;
  }

  #hero-animated .container {
    position: relative;
    z-index: 2;
    padding: 0 15px;
    max-width: 900px;
    animation: fadeUp 1.5s ease forwards;
  }

  #hero-animated h1 {
    font-size: 36px;
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 20px;
    line-height: 1.4;
    opacity: 0;
    animation: slideIn 1.5s ease forwards;
    animation-delay: 0.5s;
  }

  #hero-animated h1 span {
    color: #caffd1;
  }

  #hero-animated p {
    font-size: 18px;
    margin-bottom: 30px;
    color: #e6ffe6;
    opacity: 0;
    animation: slideIn 1.5s ease forwards;
    animation-delay: 0.9s;
  }

  .btn-get-started {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 12px 25px;
    background: #2ab27b;
    color: white;
    border: none;
    border-radius: 50px;
    font-weight: 500;
    text-decoration: none;
    font-size: 16px;
    opacity: 0;
    animation: fadeUp 1.5s ease forwards;
    animation-delay: 1.2s;
    transition: all 0.3s ease;
  }

  .btn-get-started i {
    font-size: 18px;
    transition: transform 0.3s ease;
  }

  .btn-get-started:hover {
    background-color: #1f9a67;
    transform: translateY(-3px);
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
  }

  .btn-get-started:hover i {
    transform: translateX(3px);
  }

  @keyframes fadeUp {
    0% {
      opacity: 0;
      transform: translateY(20px);
    }

    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @keyframes slideIn {
    0% {
      opacity: 0;
      transform: translateY(30px);
    }

    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @media (max-width: 768px) {
    #hero-animated h1 {
      font-size: 26px;
    }

    #hero-animated p {
      font-size: 16px;
    }

    .btn-get-started {
      font-size: 14px;
      padding: 10px 20px;
    }
  }

  @media (max-width: 480px) {
    #hero-animated h1 {
      font-size: 22px;
    }

    #hero-animated p {
      font-size: 14px;
    }

    .btn-get-started {
      font-size: 13px;
      padding: 9px 18px;
    }
  }
</style>
