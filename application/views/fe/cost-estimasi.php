<?php $this->load->view('templates/template-fe/header'); ?>
<?php $this->load->view('templates/template-fe/hero-cost-estimasi'); ?>

<!-- ======= CSS Tambahan ======= -->
<style>
 

  /* Main Section */
  .cost-section {
    padding: 80px 0;
    background: #f8f9fa;
  }

  /* Form Section */
  .form-section {
    background: white;
    border-radius: 20px;
    padding: 40px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    height: fit-content;
    margin-bottom: 30px;
  }

  .section-title {
    font-size: 1.8rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 30px;
    text-align: center;
    position: relative;
  }

  .section-title::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 4px;
    background: linear-gradient(45deg, #28a745, #20c997);
    border-radius: 2px;
  }

  .form-group {
    margin-bottom: 25px;
  }

  .form-label {
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 8px;
    display: block;
  }

  .form-control {
    width: 100%;
    padding: 12px 15px;
    border: 2px solid #e9ecef;
    border-radius: 10px;
    font-size: 16px;
    transition: all 0.3s ease;
  }

  .form-control:focus {
    border-color: #28a745;
    box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
    outline: none;
  }

  .form-select {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m1 6 7 7 7-7'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 0.75rem center;
    background-size: 16px 12px;
    appearance: none;
  }

  /* Checkbox Styling */
  .facilities-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 15px;
    margin-top: 15px;
  }

  .facility-item {
    background: #f8f9fa;
    border: 2px solid #e9ecef;
    border-radius: 10px;
    padding: 15px;
    transition: all 0.3s ease;
    cursor: pointer;
  }

  .facility-item:hover {
    border-color: #28a745;
    background: #e8f5e8;
  }

  .facility-item.selected {
    border-color: #28a745;
    background: #e8f5e8;
  }

  .facility-checkbox {
    display: none;
  }

  .facility-info {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .facility-name {
    font-weight: 600;
    color: #2c3e50;
  }

  .facility-price {
    color: #28a745;
    font-weight: 600;
    font-size: 14px;
  }

  .facility-check {
    width: 20px;
    height: 20px;
    border: 2px solid #dee2e6;
    border-radius: 4px;
    margin-left: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
  }

  .facility-item.selected .facility-check {
    background: #28a745;
    border-color: #28a745;
    color: white;
  }

  /* Summary Section */
  .summary-section {
    background: white;
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    position: sticky;
  }

  .summary-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 0;
    border-bottom: 1px solid #e9ecef;
  }

  .summary-item:last-child {
    border-bottom: none;
  }

  .summary-label {
    color: #6c757d;
    font-weight: 500;
  }

  .summary-value {
    font-weight: 600;
    color: #2c3e50;
  }

  .summary-total {
    background: linear-gradient(45deg, #28a745, #20c997);
    color: white;
    padding: 20px;
    border-radius: 15px;
    margin: 20px 0;
    text-align: center;
  }

  .summary-total .total-label {
    font-size: 14px;
    margin-bottom: 5px;
    opacity: 0.9;
  }

  .summary-total .total-amount {
    font-size: 2rem;
    font-weight: 700;
  }

  .discount-info {
    background: #fff3cd;
    border: 1px solid #ffeaa7;
    border-radius: 10px;
    padding: 15px;
    margin: 15px 0;
    font-size: 14px;
    color: #856404;
  }

  .discount-info i {
    color: #f39c12;
    margin-right: 8px;
  }

  /* Buttons */
  .btn-primary {
    background: linear-gradient(45deg, #28a745, #20c997);
    border: none;
    padding: 15px 30px;
    border-radius: 25px;
    font-weight: 600;
    font-size: 16px;
    color: white;
    width: 100%;
    cursor: pointer;
    transition: all 0.3s ease;
  }

  .btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(40, 167, 69, 0.3);
  }

  .btn-secondary {
    background: #6c757d;
    border: none;
    padding: 12px 25px;
    border-radius: 20px;
    font-weight: 600;
    color: white;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-right: 10px;
  }

  .btn-secondary:hover {
    background: #5a6268;
    transform: translateY(-2px);
  }

  /* Loading State */
  .loading {
    opacity: 0.6;
    pointer-events: none;
  }

  .spinner {
    border: 2px solid #f3f3f3;
    border-top: 2px solid #28a745;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    animation: spin 1s linear infinite;
    display: inline-block;
    margin-right: 10px;
  }

  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }

  /* Empty State */
  .empty-summary {
    text-align: center;
    padding: 40px 20px;
    color: #6c757d;
  }

  .empty-summary i {
    font-size: 3rem;
    margin-bottom: 15px;
    color: #dee2e6;
  }

  /* Responsive */
  @media (max-width: 768px) {
    .cost-hero {
      height: 40vh;
      margin-top: 70px;
    }

    .cost-hero h1 {
      font-size: 2.2rem;
    }

    .cost-section {
      padding: 60px 0;
    }

    .form-section,
    .summary-section {
      padding: 25px;
      margin-bottom: 20px;
    }

    .facilities-grid {
      grid-template-columns: 1fr;
    }

    .summary-total .total-amount {
      font-size: 1.5rem;
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

  .fade-in {
    animation: fadeInUp 0.5s ease;
  }

  .input-counter {
  display: flex;
  align-items: center;
  gap: 4px;
}

.input-counter {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 4px;
  height: 26px;
}

.counter-input {
  width: 28px;                /* muat 2 digit */
  text-align: center;
  font-weight: 600;
  font-size: 0.75rem;
  padding: 2px 0;
  border: 1px solid #ced4da;
  border-radius: 4px;
  background-color: #fff;
  height: 24px;
}

.btn-plus,
.btn-minus {
  background: #28a745;
  color: white;
  border: none;
  padding: 0 6px;
  font-size: 12px;
  line-height: 1;
  height: 24px;
  width: 24px;
  border-radius: 4px;
  cursor: pointer;
  transition: background 0.2s;
  display: flex;
  align-items: center;
  justify-content: center;
}

.btn-plus:hover,
.btn-minus:hover {
  background: #218838;
}

</style>


<!-- ======= Cost Estimation Section ======= -->
<section id="cost-estimasi-section" class="cost-estimasi-section">
  <div class="container">
    <div class="row">
      <!-- Form Section -->
      <div class="col-lg-7">
        <div class="form-section" data-aos="fade-up">
          <h2 class="section-title">Detail Kunjungan</h2>
          
          <form id="costForm">
            <!-- Personal Info -->
            <div class="form-group">
              <label class="form-label">Nama Lengkap *</label>
              <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama lengkap" required>
            </div>

            <div class="form-group">
              <label class="form-label">Nomor Telepon *</label>
              <input type="tel" class="form-control" name="nomor" id="nomor" placeholder="Contoh: 08123456789" required>
            </div>

            <div class="form-group">
              <label class="form-label">Tema Kunjungan *</label>
              <input type="text" class="form-control" name="tema_kunjungan" id="tema_kunjungan" placeholder="Contoh: Wisata Keluarga, Study Tour, Outbound, dll" required>
            </div>
<h5 class="form-label">Tiket Masuk Jenis Wisata</h5>
<div class="facilities-grid">
  <?php foreach ($jenis_wisata as $j): ?>
    <div class="facility-item position-relative">
      <!-- Input custom dengan tombol -->
      <div style="position: absolute; top: 10px; right: 10px;" class="input-counter">
        <button type="button" class="btn-minus" onclick="changeValue('jenis_wisata_<?= $j['id_jenis']; ?>', -1)">–</button>
        <input type="text" id="jenis_wisata_<?= $j['id_jenis']; ?>" name="jenis_wisata[<?= $j['id_jenis']; ?>]" value="0" class="counter-input">
        <button type="button" class="btn-plus" onclick="changeValue('jenis_wisata_<?= $j['id_jenis']; ?>', 1)">+</button>
      </div>

      <div class="facility-name mb-1"><?= $j['nama_wisata']; ?></div>
      <div class="facility-price">Rp <?= number_format($j['harga_tiket'], 0, ',', '.'); ?>/org</div>
    </div>
  <?php endforeach; ?>
</div>

    <h5 class="form-label mt-4">Paket Wisata</h5>
<div class="facilities-grid">
  <?php foreach ($paket as $p): ?>
    <div class="facility-item position-relative">
      <div style="position: absolute; top: 10px; right: 10px;" class="input-counter">
        <button type="button" class="btn-minus" onclick="changeValue('paket_<?= $p['id']; ?>', -1)">–</button>
        <input type="text" id="paket_<?= $p['id']; ?>" name="paket[<?= $p['id']; ?>]" value="0" class="counter-input" readonly>
        <button type="button" class="btn-plus" onclick="changeValue('paket_<?= $p['id']; ?>', 1)">+</button>
      </div>

      <div class="facility-name mb-1"><?= $p['nama_paket']; ?></div>
      <div class="facility-price">Rp <?= number_format($p['harga'], 0, ',', '.'); ?>/org</div>
    </div>
  <?php endforeach; ?>
</div>

            <!-- Additional Facilities -->
             <h5 class="form-label mt-4">Fasilitas Tambahan (opsional)</h5>
            <div class="form-group">
              
              <div class="facilities-grid">
                <?php foreach ($fasilitas as $f): ?>
                  <div class="facility-item" onclick="toggleFacility(this, <?= $f['id_fasilitas']; ?>)">
                    <input type="checkbox" class="facility-checkbox" name="fasilitas_ids[]" value="<?= $f['id_fasilitas']; ?>" data-price="<?= $f['harga_fasilitas']; ?>">
                    <div class="facility-info">
                      <div>
                        <div class="facility-name"><?= $f['nama_fasilitas']; ?></div>
                        <div class="facility-price">+Rp <?= number_format($f['harga_fasilitas'], 0, ',', '.'); ?></div>
                      </div>
                      <div class="facility-check">
                        <i class="bi bi-check" style="display: none;"></i>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </form>
        </div>
      </div>

      <!-- Summary Section -->
      <div class="col-lg-5">
        <div class="summary-section" data-aos="fade-up" data-aos-delay="200">
          <h2 class="section-title">Ringkasan Biaya</h2>
          
          <div id="summaryContent">
            <div class="empty-summary">
              <i class="bi bi-calculator"></i>
              <h4>Silakan Lengkapi Form</h4>
              <p>Pilih paket wisata dan jumlah peserta untuk melihat estimasi biaya</p>
            </div>
          </div>

          <div id="summaryDetails" style="display: none;">
            <!-- Package Cost -->
            <div class="summary-item">
              <span class="summary-label">Paket Wisata</span>
              <span class="summary-value" id="packageName">-</span>
            </div>
            <div class="summary-item">
              <span class="summary-label">Harga per orang</span>
              <span class="summary-value" id="packagePrice">-</span>
            </div>
            <div class="summary-item">
              <span class="summary-label">Jumlah peserta</span>
              <span class="summary-value" id="participantCount">-</span>
            </div>
            <div class="summary-item">
              <span class="summary-label">Subtotal paket</span>
              <span class="summary-value" id="packageSubtotal">-</span>
            </div>

            <!-- Facilities Cost -->
            <div id="facilitiesSection" style="display: none;">
              <div class="summary-item">
                <span class="summary-label">Fasilitas tambahan</span>
                <span class="summary-value" id="facilitiesTotal">-</span>
              </div>
              <div id="facilitiesList"></div>
            </div>

            <!-- Discount -->
            <div id="discountSection" style="display: none;">
              <div class="discount-info">
                <i class="bi bi-gift"></i>
                <strong>Diskon Grup!</strong> Anda mendapat diskon <span id="discountPercentage">0</span>% untuk grup besar.
              </div>
              <div class="summary-item">
                <span class="summary-label">Diskon</span>
                <span class="summary-value" id="discountAmount" style="color: #28a745;">-</span>
              </div>
            </div>

            <!-- Total -->
            <div class="summary-total">
              <div class="total-label">Total Estimasi Biaya</div>
              <div class="total-amount" id="totalAmount">Rp 0</div>
            </div>

            <button type="button" class="btn-primary" onclick="downloadPDF()">
  <i class="bi bi-file-earmark-pdf"></i>
  Download PDF
</button>

            
            <div style="margin-top: 15px; text-align: center;">
              <button type="button" class="btn-secondary" onclick="resetForm()">
                Reset Form
              </button>
             
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<script>
let currentCalculation = null;

// Toggle facility selection
function toggleFacility(element, facilityId) {
  const checkbox = element.querySelector('input[type="checkbox"]');
  const checkIcon = element.querySelector('.facility-check i');
  
  checkbox.checked = !checkbox.checked;
  
  if (checkbox.checked) {
    element.classList.add('selected');
    checkIcon.style.display = 'block';
  } else {
    element.classList.remove('selected');
    checkIcon.style.display = 'none';
  }
  
  calculateCost();
}

function calculateCost() {
  let totalOrang = 0;
  let totalBiaya = 0;

  // Jenis Wisata
  const jenisWisataItems = document.querySelectorAll('input[name^="jenis_wisata["]');
  const jenisWisataData = [];
  jenisWisataItems.forEach(input => {
    const jumlah = parseInt(input.value) || 0;
    if (jumlah > 0) {
      const parent = input.closest('.facility-item');
      const nama = parent.querySelector('.facility-name').textContent.trim();
      const hargaText = parent.querySelector('.facility-price').textContent.trim();
      const harga = parseInt(hargaText.replace(/[^\d]/g, '')) || 0;

      const subtotal = jumlah * harga;
      totalBiaya += subtotal;
      totalOrang += jumlah;

      jenisWisataData.push({ nama, jumlah, harga, subtotal });
    }
  });

  // Paket Wisata
  const paketItems = document.querySelectorAll('input[name^="paket["]');
  const paketData = [];
  paketItems.forEach(input => {
    const jumlah = parseInt(input.value) || 0;
    if (jumlah > 0) {
      const parent = input.closest('.facility-item');
      const nama = parent.querySelector('.facility-name').textContent.trim();
      const hargaText = parent.querySelector('.facility-price').textContent.trim();
      const harga = parseInt(hargaText.replace(/[^\d]/g, '')) || 0;

      const subtotal = jumlah * harga;
      totalBiaya += subtotal;
      totalOrang += jumlah;

      paketData.push({ nama, jumlah, harga, subtotal });
    }
  });

  // Fasilitas tambahan
  const fasilitasCheckboxes = document.querySelectorAll('input[name="fasilitas_ids[]"]:checked');
  let fasilitasTotal = 0;
  const fasilitasList = [];
  fasilitasCheckboxes.forEach(cb => {
    const price = parseInt(cb.dataset.price) || 0;
    const name = cb.closest('.facility-item').querySelector('.facility-name').textContent.trim();
    fasilitasTotal += price;
    fasilitasList.push({ name, price });
  });

  totalBiaya += fasilitasTotal;

  // Diskon
  let discountPercentage = 0;
  if (totalOrang >= 20) discountPercentage = 10;
  else if (totalOrang >= 10) discountPercentage = 5;
  const discountAmount = totalBiaya * discountPercentage / 100;
  const finalTotal = totalBiaya - discountAmount;

  // Update UI
  updateSummaryUI({
    jenisWisataData,
    paketData,
    fasilitasList,
    fasilitasTotal,
    totalOrang,
    totalBiaya,
    discountPercentage,
    discountAmount,
    finalTotal
  });
}


function updateSummaryUI(data) {
  document.getElementById('summaryContent').style.display = 'none';
  document.getElementById('summaryDetails').style.display = 'block';

  const summaryBox = document.getElementById('summaryDetails');
  summaryBox.innerHTML = ''; // bersihkan isinya

  // Ringkasan jenis wisata
  data.jenisWisataData.forEach(item => {
    const el = document.createElement('div');
    el.className = 'summary-item';
    el.innerHTML = `
      <span class="summary-label">${item.nama} (${item.jumlah} org)</span>
      <span class="summary-value">Rp ${formatNumber(item.subtotal)}</span>
    `;
    summaryBox.appendChild(el);
  });

  // Ringkasan paket wisata
  data.paketData.forEach(item => {
    const el = document.createElement('div');
    el.className = 'summary-item';
    el.innerHTML = `
      <span class="summary-label">${item.nama} (${item.jumlah} org)</span>
      <span class="summary-value">Rp ${formatNumber(item.subtotal)}</span>
    `;
    summaryBox.appendChild(el);
  });

  // Fasilitas
  if (data.fasilitasList.length > 0) {
    const title = document.createElement('div');
    title.className = 'summary-item';
    title.innerHTML = `<span class="summary-label"><b>Fasilitas Tambahan</b></span><span class="summary-value">Rp ${formatNumber(data.fasilitasTotal)}</span>`;
    summaryBox.appendChild(title);

    data.fasilitasList.forEach(item => {
      const el = document.createElement('div');
      el.className = 'summary-item';
      el.innerHTML = `
        <span class="summary-label" style="padding-left: 20px;">${item.name}</span>
        <span class="summary-value">+Rp ${formatNumber(item.price)}</span>
      `;
      summaryBox.appendChild(el);
    });
  }

  // Diskon
  if (data.discountPercentage > 0) {
    const el = document.createElement('div');
    el.className = 'summary-item';
    el.innerHTML = `
      <span class="summary-label">Diskon (${data.discountPercentage}%)</span>
      <span class="summary-value text-success">-Rp ${formatNumber(data.discountAmount)}</span>
    `;
    summaryBox.appendChild(el);
  }

  // Total
  const totalBox = document.createElement('div');
  totalBox.className = 'summary-total';
  totalBox.innerHTML = `
    <div class="total-label">Total Estimasi</div>
    <div class="total-amount">Rp ${formatNumber(data.finalTotal)}</div>
  `;
  summaryBox.appendChild(totalBox);

  // Tombol
  const actionBox = document.createElement('div');
  actionBox.innerHTML = `
   <button type="button" class="btn-primary" onclick="downloadPDF()">
  <i class="bi bi-file-earmark-pdf"></i>
  Download PDF
</button>


    <div class="text-center mt-3">
      <button type="button" class="btn-secondary" onclick="resetForm()">Reset Form</button>
    </div>
  `;
  summaryBox.appendChild(actionBox);
}


function showEmptySummary() {
  document.getElementById('summaryContent').style.display = 'block';
  document.getElementById('summaryDetails').style.display = 'none';
  currentCalculation = null;
}

function formatNumber(num) {
  return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

// Event listeners
document.getElementById('paket_id').addEventListener('change', calculateCost);
document.getElementById('jumlah_peserta').addEventListener('input', calculateCost);




function resetForm() {
  document.getElementById('costForm').reset();
  
  // Reset facility selections
  document.querySelectorAll('.facility-item').forEach(item => {
    item.classList.remove('selected');
    item.querySelector('.facility-check i').style.display = 'none';
  });
  
  showEmptySummary();
  currentCalculation = null;
}

function printSummary() {
  if (!currentCalculation) {
    alert('Belum ada data untuk dicetak.');
    return;
  }
  
  window.print();
}



// Phone number formatting
document.getElementById('nomor').addEventListener('input', function(e) {
  let value = e.target.value.replace(/\D/g, '');
  if (value.startsWith('0')) {
    value = '+62' + value.substring(1);
  }
  e.target.value = value;
});
</script>
<script>
function changeValue(inputId, delta) {
  const input = document.getElementById(inputId);
  let value = parseInt(input.value) || 0;
  value += delta;
  if (value < 0) value = 0;
  input.value = value;

  // Trigger hitung ulang jika dibutuhkan
  if (typeof calculateCost === 'function') {
    calculateCost();
  }
}
async function downloadPDF() {
  const { jsPDF } = window.jspdf;
  const doc = new jsPDF();

  const nama = document.getElementById('nama').value;
  const nomor = document.getElementById('nomor').value;
  const temaKunjungan = document.getElementById('tema_kunjungan').value;

  if (!nama || !nomor || !temaKunjungan) {
    alert('Mohon lengkapi semua data sebelum mengunduh PDF.');
    return;
  }

  let y = 20;

  // Header
  doc.setFont('helvetica', 'bold');
  doc.setFontSize(16);
  doc.text('Estimasi Biaya Kunjungan Wisata', 105, y, { align: 'center' });

  y += 10;
  doc.setLineWidth(0.5);
  doc.line(20, y, 190, y);
  y += 10;

  // Informasi Pengunjung
  doc.setFont('helvetica', 'normal');
  doc.setFontSize(12);
  doc.text(`Nama Lengkap  : ${nama}`, 20, y); y += 7;
  doc.text(`No. Telepon   : ${nomor}`, 20, y); y += 7;
  doc.text(`Tema Kunjungan: ${temaKunjungan}`, 20, y); y += 10;

  // Tabel Jenis Wisata
  const addTableHeader = (judul) => {
    doc.setFont('helvetica', 'bold');
    doc.setTextColor(40, 167, 69);
    doc.text(judul, 20, y); y += 6;
    doc.setDrawColor(200);
    doc.setTextColor(0);
    doc.setFontSize(11);
    doc.setFont('helvetica', 'bold');
    doc.text("Nama", 22, y);
    doc.text("Jumlah", 100, y);
    doc.text("Subtotal", 150, y);
    y += 5;
    doc.setLineWidth(0.1);
    doc.line(20, y, 190, y);
    y += 5;
  };

  const addTableRow = (nama, jumlah, subtotal) => {
    doc.setFont('helvetica', 'normal');
    doc.text(nama, 22, y);
    doc.text(`${jumlah} org`, 100, y);
    doc.text(`Rp ${formatNumber(subtotal)}`, 150, y);
    y += 6;
  };

  let total = 0;
  let totalPeserta = 0;

  // Jenis Wisata
  const jenisInputs = document.querySelectorAll('input[name^="jenis_wisata["]');
  let adaJenis = false;
  jenisInputs.forEach(input => {
    const jumlah = parseInt(input.value) || 0;
    if (jumlah > 0) {
      if (!adaJenis) {
        addTableHeader("Tiket Masuk Jenis Wisata");
        adaJenis = true;
      }
      const parent = input.closest('.facility-item');
      const nama = parent.querySelector('.facility-name').textContent.trim();
      const harga = parseInt(parent.querySelector('.facility-price').textContent.replace(/[^\d]/g, ''));
      const subtotal = harga * jumlah;
      addTableRow(nama, jumlah, subtotal);
      total += subtotal;
      totalPeserta += jumlah;
    }
  });

  // Paket Wisata
  const paketInputs = document.querySelectorAll('input[name^="paket["]');
  let adaPaket = false;
  paketInputs.forEach(input => {
    const jumlah = parseInt(input.value) || 0;
    if (jumlah > 0) {
      if (!adaPaket) {
        y += 5;
        addTableHeader("Paket Wisata");
        adaPaket = true;
      }
      const parent = input.closest('.facility-item');
      const nama = parent.querySelector('.facility-name').textContent.trim();
      const harga = parseInt(parent.querySelector('.facility-price').textContent.replace(/[^\d]/g, ''));
      const subtotal = harga * jumlah;
      addTableRow(nama, jumlah, subtotal);
      total += subtotal;
      totalPeserta += jumlah;
    }
  });

  // Fasilitas Tambahan
  const fasilitas = document.querySelectorAll('input[name="fasilitas_ids[]"]:checked');
  let fasilitasTotal = 0;
  if (fasilitas.length > 0) {
    y += 5;
    addTableHeader("Fasilitas Tambahan");
    fasilitas.forEach(cb => {
      const parent = cb.closest('.facility-item');
      const nama = parent.querySelector('.facility-name').textContent.trim();
      const harga = parseInt(cb.dataset.price);
      addTableRow(nama, 1, harga);
      fasilitasTotal += harga;
    });
    total += fasilitasTotal;
  }

  // Diskon
  let discountPercentage = 0;
  if (totalPeserta >= 20) discountPercentage = 10;
  else if (totalPeserta >= 10) discountPercentage = 5;
  const discount = total * (discountPercentage / 100);
  const totalFinal = total - discount;

  if (discount > 0) {
    y += 8;
    doc.setFont('helvetica', 'bold');
    doc.setTextColor(50, 150, 50);
    doc.text(`Diskon Grup (${discountPercentage}%): -Rp ${formatNumber(discount)}`, 20, y);
    doc.setTextColor(0);
  }

  // Total Estimasi
  y += 10;
  doc.setFontSize(13);
  doc.setFont('helvetica', 'bold');
  doc.setTextColor(0, 0, 100);
  doc.text(`TOTAL ESTIMASI: Rp ${formatNumber(totalFinal)}`, 20, y);

  // Catatan
  y += 15;
  doc.setFontSize(10);
  doc.setFont('helvetica', 'normal');
  doc.setTextColor(100);
  doc.text("Catatan:", 20, y); y += 5;
  doc.text("• Estimasi biaya belum termasuk transportasi.", 24, y); y += 5;
  doc.text("• Harga dapat berubah sewaktu-waktu.", 24, y); y += 5;
  doc.text("• Estimasi ini bersifat sementara dan perlu konfirmasi.", 24, y); y += 10;

  doc.setFont('helvetica', 'italic');
  doc.text(`Dicetak pada: ${new Date().toLocaleString('id-ID')}`, 20, y);

  // Simpan PDF
  doc.save(`Estimasi-Kunjungan-${nama}.pdf`);
}

function formatNumber(num) {
  return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}


</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<?php $this->load->view('templates/template-fe/footer'); ?>