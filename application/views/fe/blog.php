<?php $this->load->view('templates/template-fe/header'); ?>
<?php $this->load->view('templates/template-fe/hero-artikel'); ?>

<!-- ======= CSS Tambahan ======= -->
<style>
 

  .search-box {
    max-width: 500px;
    margin: 0 auto;
    animation: fadeInUp 1s ease 0.5s both;
  }

  .search-input {
    background: rgba(255, 255, 255, 0.9);
    border: none;
    border-radius: 25px;
    padding: 15px 20px;
    width: 100%;
    font-size: 16px;
    color: #333;
  }

  .search-input::placeholder {
    color: #666;
  }

  .search-btn {
    position: absolute;
    right: 5px;
    top: 5px;
    bottom: 5px;
    background: #28a745;
    border: none;
    border-radius: 20px;
    color: white;
    padding: 0 20px;
    font-weight: 600;
    transition: all 0.3s ease;
  }

  .search-btn:hover {
    background: #20c997;
    transform: scale(1.05);
  }

  /* Blog Section */
  .blog-section {
    padding: 80px 0;
  }

  /* Filter Bar */
  .filter-bar {
    background: white;
    border-radius: 15px;
    padding: 25px;
    margin-bottom: 40px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
  }

  .filter-title {
    font-size: 1.2rem;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 15px;
  }

  .category-filters {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
  }

  .category-btn {
    padding: 8px 18px;
    border: 2px solid #e9ecef;
    background: white;
    color: #6c757d;
    border-radius: 20px;
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
    transition: all 0.3s ease;
  }

  .category-btn:hover,
  .category-btn.active {
    background: #28a745;
    border-color: #28a745;
    color: white;
    text-decoration: none;
    transform: translateY(-2px);
  }

  /* Blog Cards */
  .blog-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
    margin-bottom: 50px;
  }

  .blog-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
  }

  .blog-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
  }

  .blog-image {
    position: relative;
    height: 250px;
    overflow: hidden;
  }

  .blog-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
  }

  .blog-card:hover .blog-image img {
    transform: scale(1.05);
  }

  .blog-category {
    position: absolute;
    top: 20px;
    left: 20px;
    background: linear-gradient(45deg, #28a745, #20c997);
    color: white;
    padding: 6px 15px;
    border-radius: 15px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
  }

  .blog-content {
    padding: 25px;
    flex: 1;
    display: flex;
    flex-direction: column;
  }

  .blog-meta {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 15px;
    font-size: 14px;
    color: #6c757d;
  }

  .blog-date {
    display: flex;
    align-items: center;
    gap: 5px;
  }

  .blog-reading-time {
    display: flex;
    align-items: center;
    gap: 5px;
  }

  .blog-title {
    font-size: 1.4rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 15px;
    line-height: 1.4;
  }

  .blog-title a {
    color: inherit;
    text-decoration: none;
    transition: color 0.3s ease;
  }

  .blog-title a:hover {
    color: #28a745;
  }

  .blog-excerpt {
    color: #6c757d;
    line-height: 1.6;
    margin-bottom: 20px;
    flex: 1;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }

  .blog-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 15px;
    border-top: 1px solid #e9ecef;
  }

  .blog-author {
    font-size: 14px;
    color: #6c757d;
    font-weight: 500;
  }

  .read-more {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #28a745;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    transition: all 0.3s ease;
  }

  .read-more:hover {
    color: #20c997;
    text-decoration: none;
    transform: translateX(5px);
  }

  /* Pagination */
  .pagination-wrapper {
    display: flex;
    justify-content: center;
    margin-top: 50px;
  }

  .pagination {
    display: flex;
    gap: 10px;
    align-items: center;
  }

  .page-btn {
    padding: 12px 18px;
    border: 2px solid #e9ecef;
    background: white;
    color: #6c757d;
    text-decoration: none;
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.3s ease;
  }

  .page-btn:hover,
  .page-btn.active {
    background: #28a745;
    border-color: #28a745;
    color: white;
    text-decoration: none;
    transform: translateY(-2px);
  }

  .page-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
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
  }

  /* Blog Stats */
  .blog-stats {
    background: white;
    border-radius: 15px;
    padding: 20px;
    margin-bottom: 30px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
    text-align: center;
  }

  .stats-number {
    font-size: 2rem;
    font-weight: 700;
    color: #28a745;
    display: block;
  }

  .stats-label {
    color: #6c757d;
    font-size: 14px;
    margin-top: 5px;
  }

  /* Responsive */
  @media (max-width: 768px) {
    .blog-hero {
      height: 50vh;
      margin-top: 70px;
    }

    .blog-hero h1 {
      font-size: 2.5rem;
    }

    .blog-hero p {
      font-size: 1.1rem;
    }

    .blog-section {
      padding: 60px 0;
    }

    .blog-grid {
      grid-template-columns: 1fr;
      gap: 20px;
    }

    .filter-bar {
      padding: 20px;
    }

    .category-filters {
      justify-content: center;
    }

    .blog-content {
      padding: 20px;
    }

    .blog-image {
      height: 200px;
    }

    .pagination {
      flex-wrap: wrap;
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


<!-- ======= Blog Section ======= -->
<section id="blog-section" class="blog-section">
  <div class="container">

    <?php
      // Pastikan variabel ada agar tidak Notice/Undefined dan tidak bikin JS/preloader macet
      $artikel_eksternal = isset($artikel_eksternal) && is_array($artikel_eksternal) ? $artikel_eksternal : [];
      $total_artikel = count($artikel_eksternal);

      // Helper aman untuk tanggal
      function safe_date($val, $format = 'd M Y') {
        if (empty($val)) return '-';
        $ts = strtotime($val);
        return $ts ? date($format, $ts) : '-';
      }

      // Helper excerpt (fallback jika word_limiter tidak tersedia)
      if (!function_exists('word_limiter')) {
        function word_limiter($str, $limit = 15) {
          $words = preg_split('/\s+/', trim(strip_tags($str)));
          if (count($words) <= $limit) return implode(' ', $words);
          return implode(' ', array_slice($words, 0, $limit)) . '…';
        }
      }
    ?>

    
    <!-- Blog Grid -->
    <?php if ($total_artikel > 0): ?>
      <div class="blog-grid">
        <?php foreach ($artikel_eksternal as $index => $article): ?>
          <?php
            // Amankan field
            $judul     = isset($article['judul']) ? $article['judul'] : '(Tanpa Judul)';
            $link      = isset($article['link']) ? $article['link'] : '#';
            $tanggal   = isset($article['tanggal']) ? $article['tanggal'] : null;
            $gambar    = isset($article['gambar']) && $article['gambar'] ? $article['gambar'] : 'default-blog.jpg';

            // Path gambar final (taruh file di assets/fe/img/blog/)
            $img_src   = base_url('assets/fe/img/blog/' . $gambar);
            $img_fallback = base_url('assets/fe/img/blog/default-blog.jpg');

            // Excerpt: karena DB kita hanya pakai judul, excerpt dibuat dari judul
            $excerpt = word_limiter($judul, 20);
          ?>

          <div class="blog-card">
            <div class="blog-image">
              <img src="<?= $img_src; ?>"
                   alt="<?= html_escape($judul); ?>"
                   onerror="this.onerror=null;this.src='<?= $img_fallback; ?>';">
              <div class="blog-category">Artikel Eksternal</div>
            </div>

            <div class="blog-content">
              <div class="blog-meta">
                <div class="blog-date">
                  <i class="bi bi-calendar3"></i>
                  <?= safe_date($tanggal); ?>
                </div>
              </div>

              <h3 class="blog-title">
                <a href="<?= html_escape($link); ?>" target="_blank" rel="noopener">
                  <?= html_escape($judul); ?>
                </a>
              </h3>


              <div class="blog-footer">
                <div class="blog-author">
                  <i class="bi bi-globe"></i>
                  Sumber Eksternal
                </div>
                <a href="<?= html_escape($link); ?>" target="_blank" class="read-more" rel="noopener">
                  Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>

        <?php endforeach; ?>
      </div>

    <?php else: ?>
      <div class="empty-state">
        <i class="bi bi-journal-text"></i>
        <h3>Tidak Ada Artikel</h3>
        <p>Maaf, tidak ada artikel yang ditemukan.</p>
      </div>
    <?php endif; ?>
  </div>
</section>

<!-- ======= JS perbaikan preloader/animasi ======= -->
<script>
  // 1) Jika template punya preloader, pastikan ditutup agar tidak "loading terus"
  (function () {
    var pre = document.getElementById('preloader');
    if (pre) {
      // Jika library utama gagal load (error JS), tetap singkirkan preloader:
      window.addEventListener('load', function() { pre.style.display = 'none'; });
      // fallback guard:
      setTimeout(function(){ pre.style.display = 'none'; }, 1500);
    }
  })();

  // 2) Opsi: matikan AOS jika belum tersedia agar tidak error
  (function () {
    if (typeof AOS === 'undefined') {
      // Hapus atribut data-aos supaya tidak ada JS error dari lib yang tidak ada
      document.querySelectorAll('[data-aos]').forEach(function(el){ el.removeAttribute('data-aos'); });
    }
  })();
</script>

<?php $this->load->view('templates/template-fe/footer'); ?>
