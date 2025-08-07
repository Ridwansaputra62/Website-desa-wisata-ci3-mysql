<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= isset($title) ? $title : 'Desa Wisata' ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <?php
$CI =& get_instance();
$CI->load->model('M_User');

// Ambil data user dengan ID 9
$userFavicon = $CI->M_User->getUserById(9);

// Pastikan image tidak kosong
$logoFile = !empty($userFavicon['image']) ? $userFavicon['image'] : 'default.jpg';

// Buat URL full ke file gambar
$faviconUrl = base_url('assets/images/users/' . $logoFile);
?>
<!-- Favicons -->
<link href="<?= $faviconUrl; ?>" rel="icon" type="image/png">
<link href="<?= $faviconUrl; ?>" rel="apple-touch-icon" type="image/png">


  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?=base_url('assets/fe/'); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=base_url('assets/fe/'); ?>vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?=base_url('assets/fe/'); ?>vendor/aos/aos.css" rel="stylesheet">
  <link href="<?=base_url('assets/fe/'); ?>vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?=base_url('assets/fe/'); ?>vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">



  <!-- Variables CSS Files. Uncomment your preferred color scheme -->
  <link href="<?=base_url('assets/fe/'); ?>css/variables.css" rel="stylesheet">
  <!-- <link href="assets/css/variables-blue.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-green.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-orange.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-purple.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-red.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-pink.css" rel="stylesheet"> -->

  <!-- Template Main CSS File -->
  <link href="<?=base_url('assets/fe/'); ?>css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: HeroBiz - v2.4.0
  * Template URL: https://bootstrapmade.com/herobiz-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

 <!-- ======= CSS + SECTION HERO + NAVBAR ======= -->
<style>
  /* Matikan background transparent dari .sticked jika .bg-active sedang aktif */
header.header.sticked:not(.bg-active) {
  background-color: transparent !important;
  box-shadow: none !important;
}

/* ====== NAVBAR STYLES ====== */
header.header {
  --nav-text-color: #ffffff;
  background-color: rgba(255, 255, 255, 0) !important; /* transparan awal */
  backdrop-filter: blur(0px);
  box-shadow: none !important;
  transition: background-color 0.4s ease, box-shadow 0.4s ease, padding 0.3s ease, backdrop-filter 0.3s ease;
  position: fixed !important;
  width: 100%;
  top: 0;
  z-index: 9999 !important;
  padding: 20px 0 !important;
}

header.header.bg-active {
  background-color: rgba(255, 255, 255, 0.96) !important; /* semi transparan */
  backdrop-filter: blur(10px);
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08) !important;
  padding: 12px 0 !important; /* mengecilkan navbar saat scroll */
}

header.header.text-active {
  --nav-text-color: rgba(51, 51, 51, 0.85); /* lebih halus daripada #333 solid */
}



nav.navbar ul li a {
  color: var(--nav-text-color) !important;
  font-weight: 600 !important; /* lebih tebal tapi tetap proporsional */
  transition: color 0.4s ease, font-weight 0.3s ease;
}



header.header.active nav.navbar ul li a {
  color: #333;
}


  .header .container-fluid {
    max-width: 1200px;
    margin: auto;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 40px;
    flex-wrap: wrap;
  }

  .logo-img {
    height: 50px;
    width: auto;
    border-radius: 8px;
  }

  nav.navbar ul {
    list-style: none;
    display: flex;
    gap: 35px;
    margin: 0;
    padding: 0;
    align-items: center;
  }

 


  header.header.active nav.navbar ul li a {
    color: #333;
  }

  nav.navbar ul li .dropdown-icon {
    font-size: 12px;
    transition: transform 0.3s ease;
  }

  nav.navbar ul li:hover .dropdown-icon {
    transform: rotate(180deg);
  }

  nav.navbar ul li ul {
    position: absolute;
    top: 100%;
    left: 0;
    background: #fff;
    border-radius: 8px;
    padding: 10px 0;
    display: none;
    flex-direction: column;
    min-width: 180px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
    animation: dropdownFade 0.3s ease;
    z-index: 1000;
  }

  nav.navbar ul li:hover > ul {
    display: flex;
  }

  nav.navbar ul li ul li a {
    padding: 10px 20px;
    color: #444;
    font-size: 14px;
  }

  nav.navbar ul li ul li a:hover {
    background-color: #f6f6f6;
    color: #2ab27b;
  }

  @keyframes dropdownFade {
    0% {
      opacity: 0;
      transform: translateY(10px);
    }

    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }

  /* Mobile Menu Toggle Button */
  .mobile-menu-toggle {
    display: none;
    background: none;
    border: none;
    font-size: 28px;
    cursor: pointer;
    color: var(--nav-text-color);
    transition: color 0.3s ease;
    z-index: 10000;
  }

  .mobile-menu-toggle:hover {
    color: #2ab27b;
  }

  @media (max-width: 768px) {
    .header {
      position: relative !important;
    }

    .header .container-fluid {
      flex-direction: row !important;
      justify-content: space-between !important;
      align-items: center !important;
      position: relative !important;
      z-index: 10001 !important;
    }

    /* Show mobile toggle button */
    .mobile-menu-toggle {
      display: block !important;
    }

    /* Hide navbar by default on mobile */
    nav.navbar {
      position: fixed !important;
      top: 82px !important;
      left: 0 !important;
      right: 0 !important;
      bottom: auto !important;
      width: 100vw !important;
      max-width: 100vw !important;
      min-height: auto !important;
      height: auto !important;
      max-height: calc(100vh - 82px) !important;
      background: rgba(255, 255, 255, 0.98) !important;
      backdrop-filter: blur(10px) !important;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1) !important;
      transform: translateY(-100%) !important;
      opacity: 0 !important;
      visibility: hidden !important;
      transition: all 0.3s ease !important;
      z-index: 9998 !important;
      margin: 0 !important;
      overflow-y: auto !important;
      overflow-x: visible !important;
    }

    /* Show navbar when active */
    nav.navbar.mobile-active {
      transform: translateY(0) !important;
      opacity: 1 !important;
      visibility: visible !important;
    }

    nav.navbar ul {
      position: static !important;
      inset: auto !important;
      top: auto !important;
      right: auto !important;
      bottom: auto !important;
      left: auto !important;
      flex-direction: column !important;
      gap: 0 !important;
      padding: 20px 30px !important;
      margin: 0 !important;
      background: transparent !important;
      width: 100% !important;
      max-width: 100% !important;
      box-sizing: border-box !important;
      min-height: auto !important;
      height: auto !important;
      flex-shrink: 0 !important;
      overflow: visible !important;
    }

    nav.navbar ul li {
      width: 100% !important;
      border-bottom: 1px solid rgba(0, 0, 0, 0.1) !important;
      box-sizing: border-box !important;
    }

    nav.navbar ul li:last-child {
      border-bottom: none !important;
    }

    nav.navbar ul li a {
      color: #333 !important;
      padding: 18px 0 !important;
      display: block !important;
      width: 100% !important;
      font-weight: 500 !important;
      min-height: 50px !important;
      line-height: 1.5 !important;
      text-align: left !important;
      box-sizing: border-box !important;
    }

    nav.navbar ul li a:hover {
      color: #2ab27b !important;
    }

    nav.navbar ul li ul {
      position: static !important;
      display: none !important;
      opacity: 1 !important;
      box-shadow: none !important;
      background: rgba(0, 0, 0, 0.05) !important;
      margin-top: 10px !important;
      padding: 10px 0 !important;
    }

    nav.navbar ul li:hover ul {
      display: block !important;
    }

    /* Change header background when mobile menu is active */
    header.header.mobile-menu-open {
      background-color: rgba(255, 255, 255, 0.98) !important;
      backdrop-filter: blur(10px) !important;
      box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1) !important;
    }

    header.header.mobile-menu-open .mobile-menu-toggle {
      color: #333 !important;
    }
  }

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

  /* ======= Modern On Focus Section Styles ======= */
  #onfocus {
    background: linear-gradient(135deg, #f8fdfc 0%, #e8f9f5 100%);
    min-height: 600px;
    display: flex;
    align-items: center;
    padding: 40px 20px 0;
  }

  /* Gallery Slider Styles */
  .gallery-slider {
    position: relative;
    width: 100%;
    height: 500px;
    overflow: hidden;
    border-radius: 20px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
  }

  .slider-container {
    position: relative;
    width: 100%;
    height: 100%;
  }

  .slide {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    transition: opacity 0.6s ease-in-out;
  }

  .slide.active {
    opacity: 1;
  }

  .slide-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
  }

  /* Slide Overlay */
  .slide-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
    padding: 40px 30px 30px;
    transform: translateY(100%);
    transition: transform 0.3s ease;
  }

  .slide:hover .slide-overlay {
    transform: translateY(0);
  }

  .slide-content h4 {
    color: white;
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 10px;
  }

  .slide-content p {
    color: rgba(255, 255, 255, 0.9);
    font-size: 14px;
    line-height: 1.5;
    margin-bottom: 15px;
  }

  .slide-price {
    display: inline-block;
    background: #2ab27b;
    color: white;
    padding: 8px 15px;
    border-radius: 20px;
    font-weight: 600;
    font-size: 14px;
  }

  /* Navigation Arrows */
  .slider-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(255, 255, 255, 0.9);
    border: none;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    z-index: 10;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
  }

  .slider-nav:hover {
    background: #2ab27b;
    color: white;
    transform: translateY(-50%) scale(1.1);
  }

  .slider-nav.prev {
    left: 20px;
  }

  .slider-nav.next {
    right: 20px;
  }

  .slider-nav i {
    font-size: 18px;
  }

  /* Dots Indicator */
  .slider-dots {
    position: absolute;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 10px;
    z-index: 10;
  }

  .dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.5);
    cursor: pointer;
    transition: all 0.3s ease;
  }

  .dot.active,
  .dot:hover {
    background: #2ab27b;
    transform: scale(1.2);
  }

  /* Modern Content Styles */
  .content-modern {
    padding: 0 40px;
    height: 100%;
    display: flex;
    align-items: center;
  }



  .section-badge {
    display: inline-block;
    background: linear-gradient(135deg, #2ab27b, #1f9a67);
    color: white;
    padding: 8px 20px;
    border-radius: 25px;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 20px;
    letter-spacing: 0.5px;
  }

  .content-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 20px;
    line-height: 1.2;
  }

  .content-description {
    font-size: 16px;
    color: #6c757d;
    line-height: 1.7;
    margin-bottom: 30px;
  }

  .content-features {
    margin-bottom: 35px;
  }

  .feature-item {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 12px;
    font-size: 15px;
    color: #495057;
  }

  .feature-item i {
    color: #2ab27b;
    font-size: 16px;
  }

  .btn-explore {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: linear-gradient(135deg, #2ab27b, #1f9a67);
    color: white;
    padding: 15px 30px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    font-size: 16px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(42, 178, 123, 0.3);
  }

  .btn-explore:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(42, 178, 123, 0.4);
    color: white;
  }

  .btn-explore i {
    transition: transform 0.3s ease;
  }

  .btn-explore:hover i {
    transform: translateX(5px);
  }

  /* Responsive Design */
  @media (max-width: 992px) {
    #onfocus {
      padding: 60px 0;
    }
    
    .gallery-slider {
      height: 400px;
      margin-bottom: 40px;
    }
    
    .content-modern {
      padding: 0 20px;
    }
    
    .content-title {
      font-size: 2rem;
    }
  }

  @media (max-width: 768px) {
    .gallery-slider {
      height: 300px;
      border-radius: 15px;
    }
    
    .slider-nav {
      width: 40px;
      height: 40px;
    }
    
    .slider-nav.prev {
      left: 15px;
    }
    
    .slider-nav.next {
      right: 15px;
    }
    
    .content-title {
      font-size: 1.8rem;
    }
    
    .content-description {
      font-size: 15px;
    }
    
    .btn-explore {
      padding: 12px 25px;
      font-size: 15px;
    }
  }

</style>

<!-- ======= HEADER ======= -->
<header id="header" class="header">
  <div class="container-fluid">
    <a href="<?= base_url('home'); ?>" class="logo scrollto">
      <img src="<?= base_url('assets/images/users/' . $user['image']); ?>" alt="Logo" class="logo-img">
    </a>
    <nav class="navbar" id="navbar">
      <ul>
        <li><a class="nav-link scrollto" href="<?= base_url('home'); ?>">Beranda</a></li>
        <li><a class="nav-link scrollto" href="<?= base_url('tentang'); ?>">Tentang</a></li>
        <li>
          <a href="<?= base_url('wisata'); ?>">Wisata</a>
        </li>
        <li>
          <a href="<?= base_url('galeri'); ?>">Galeri</a>
         
        </li>
        <li><a href="<?= base_url('cost_estimasi'); ?>">Cost Estimasi</a></li>
        <li><a href="<?= base_url('blog'); ?>">Artikel</a></li>
        <li><a href="<?= base_url('home#contact'); ?>">Kontak</a></li>
      </ul>
    </nav>
    <!-- Mobile Menu Toggle Button -->
    <div class="mobile-menu-toggle" id="mobile-menu-toggle">
      <i class="bi bi-list"></i>
    </div>
  </div>
</header>

<script>
  const header = document.querySelector("header.header");
  const mobileMenuToggle = document.getElementById("mobile-menu-toggle");
  const navbar = document.getElementById("navbar");

  // Handle scroll effects
  window.addEventListener("scroll", function () {
    const scrollY = window.scrollY;

    // ✅ Atur jarak sesuai keinginan
    const bgThreshold = 700;
    const textThreshold = 700;

    // matikan efek default template
    header.classList.remove('header-scrolled');

    // background navbar
    if (scrollY > bgThreshold) {
      header.classList.add("bg-active");
    } else {
      header.classList.remove("bg-active");
    }

    // warna teks navbar
    if (scrollY > textThreshold) {
      header.classList.add("text-active");
    } else {
      header.classList.remove("text-active");
    }
  });

  // Handle mobile menu toggle
  if (mobileMenuToggle && navbar) {
    mobileMenuToggle.addEventListener("click", function() {
      // Toggle mobile menu
      navbar.classList.toggle("mobile-active");
      header.classList.toggle("mobile-menu-open");
      
      // Change hamburger icon
      const icon = mobileMenuToggle.querySelector("i");
      if (navbar.classList.contains("mobile-active")) {
        icon.classList.remove("bi-list");
        icon.classList.add("bi-x");
      } else {
        icon.classList.remove("bi-x");
        icon.classList.add("bi-list");
      }
    });

    // Close mobile menu when clicking on a menu item
    const menuLinks = navbar.querySelectorAll("a");
    menuLinks.forEach(link => {
      link.addEventListener("click", function() {
        navbar.classList.remove("mobile-active");
        header.classList.remove("mobile-menu-open");
        const icon = mobileMenuToggle.querySelector("i");
        icon.classList.remove("bi-x");
        icon.classList.add("bi-list");
      });
    });

    // Close mobile menu when clicking outside
    document.addEventListener("click", function(e) {
      if (!header.contains(e.target)) {
        navbar.classList.remove("mobile-active");
        header.classList.remove("mobile-menu-open");
        const icon = mobileMenuToggle.querySelector("i");
        icon.classList.remove("bi-x");
        icon.classList.add("bi-list");
      }
    });
  }
</script>