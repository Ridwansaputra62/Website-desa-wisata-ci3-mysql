  <style>
.wa-float {
  position: fixed;
  width: 60px;
  height: 60px;
  bottom: 20px;
  right: 20px;
  background-color: #25d366;
  color: #fff;
  border-radius: 50px;
  text-align: center;
  font-size: 28px;
  box-shadow: 2px 2px 10px rgba(0,0,0,0.3);
  z-index: 9999;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: transform 0.3s ease;
}
.wa-float:hover {
  transform: scale(1.1);
  color: white;
}
@media (max-width: 768px) {
  .wa-float {
    width: 50px;
    height: 50px;
    font-size: 22px;
  }
}

</style>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-content">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Desa Wisata Sedari</h3>
              <p>
                Desa Sedari, Kecamatan Cibuaya<br>
                Kabupaten Karawang, Indonesia<br><br>
                <strong>Phone:</strong> <?= isset($kontak[0]['telepon']) ? $kontak[0]['telepon'] : '+62 xxx xxx xxx' ?><br>
                <strong>Email:</strong> <?= isset($kontak[0]['email']) ? $kontak[0]['email'] : 'info@desawisatasedari.com' ?><br>
              </p>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Link Berguna</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="<?= base_url('home'); ?>">Beranda</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="<?= base_url('tentang'); ?>">Tentang Kami</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="<?= base_url('wisata'); ?>">Lihat Wisata</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="<?= base_url('blog'); ?>">Artikel</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="<?= base_url('cost_estimasi'); ?>">Cost Estimasi</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
           
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Newsletter Kami</h4>
            <p>Dapatkan informasi terbaru tentang paket wisata dan promo menarik dari Desa Wisata Sedari</p>
            <form action="" method="post">
              <input type="email" name="email" placeholder="Email Anda"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="footer-legal text-center">
      <div class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

        <div class="d-flex flex-column align-items-center align-items-lg-start">
          <div class="copyright">
            &copy; Copyright <strong><span>Desa Wisata Sedari</span></strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> | Customized for Desa Wisata Sedari
          </div>
        </div>

        <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
  <?php
    $instagram = isset($kontak[0]['instagram']) ? trim($kontak[0]['instagram']) : '';
    $tiktok    = isset($kontak[0]['tiktok']) ? trim($kontak[0]['tiktok']) : '';
    $telepon   = isset($kontak[0]['telepon']) ? preg_replace('/[^0-9]/', '', $kontak[0]['telepon']) : '';

    // Format tautan sosial media
    $ig_link = $instagram !== '' ? (strpos($instagram, 'http') === 0 ? $instagram : 'https://instagram.com/' . ltrim($instagram, '@')) : '#';
    $tt_link = $tiktok    !== '' ? (strpos($tiktok, 'http') === 0 ? $tiktok    : 'https://tiktok.com/@' . ltrim($tiktok, '@'))     : '#';
    $wa_link = $telepon   !== '' ? ('https://wa.me/' . (substr($telepon, 0, 1) === '0' ? '62' . substr($telepon, 1) : $telepon))     : '#';
  ?>

  <a href="<?= $ig_link ?>" class="instagram" target="_blank"><i class="bi bi-instagram"></i></a>
  <a href="<?= $wa_link ?>" class="whatsapp" target="_blank"><i class="bi bi-whatsapp"></i></a>
  <a href="<?= $tt_link ?>" class="tiktok" target="_blank"><i class="bi bi-tiktok"></i></a>
</div>


      </div>
    </div>

  </footer><!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="<?=base_url('assets/fe/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?=base_url('assets/fe/'); ?>vendor/aos/aos.js"></script>
  <script src="<?=base_url('assets/fe/'); ?>vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?=base_url('assets/fe/'); ?>vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?=base_url('assets/fe/'); ?>vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?=base_url('assets/fe/'); ?>vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?=base_url('assets/fe/'); ?>js/main.js"></script>
<?php
$no_wa = '';
if (!empty($wa_user['telepon'])) {
  $no_wa = preg_replace('/[^0-9]/', '', $wa_user['telepon']);
  if (substr($no_wa, 0, 1) == '0') {
    $no_wa = '62' . substr($no_wa, 1);
  }
}
?>

<?php if (!empty($no_wa)): ?>
<a href="https://wa.me/<?= $no_wa; ?>" target="_blank" class="wa-float" aria-label="Chat via WhatsApp">
  <i class="bi bi-whatsapp"></i>
</a>
<?php endif; ?>

</body>

</html>