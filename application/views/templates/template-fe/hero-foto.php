<?php
  $background = $this->db->get('background_home')->row_array();
  $bg_url = base_url('assets/images/background/' . $background['gambar']);
?>
<section id="hero-animated" class="hero-animated" style="background: url('<?= $bg_url ?>') center center / cover no-repeat;">

  <div class="container">
    <h1>Galeri Foto Wisata</h1>
    <p>Jelajahi keindahan alam, budaya, dan momen seru yang terekam di setiap sudut Desa Wisata Sedari</p>

    <!-- Ikon Scroll -->
    <div class="scroll-down">
      <a class="scroll-down" href="<?= base_url('galeri-foto#gallery-section'); ?>" aria-label="Scroll ke bagian galeri">
        <i class="bi bi-chevron-down"></i>
      </a>
    </div>
  </div>
</section>


<style>
 
</style>
