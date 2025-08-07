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

            <div class="form-group">
              <label class="form-label">Jumlah Peserta *</label>
              <input type="number" class="form-control" name="jumlah_peserta" id="jumlah_peserta" min="1" max="500" placeholder="Contoh: 25" required>
            </div>

            <!-- Package Selection -->
            <div class="form-group">
              <label class="form-label">Paket Wisata *</label>
              <select class="form-control form-select" name="paket_id" id="paket_id" required>
                <option value="">Pilih paket wisata</option>
                <?php foreach ($paket as $p): ?>
                  <option value="<?= $p['id']; ?>" data-price="<?= $p['harga']; ?>">
                    <?= $p['nama_paket']; ?> - Rp <?= number_format($p['harga'], 0, ',', '.'); ?>/orang
                  </option>
                <?php endforeach; ?>
              </select>
            </div>

            <!-- Additional Facilities -->
            <div class="form-group">
              <label class="form-label">Fasilitas Tambahan (Opsional)</label>
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

            <!-- Action Buttons -->
            <button type="button" class="btn-primary" onclick="submitForm()">
              <i class="bi bi-whatsapp"></i>
              Kirim via WhatsApp
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

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center" style="padding: 40px;">
        <i class="bi bi-whatsapp" style="font-size: 4rem; color: #25d366; margin-bottom: 20px;"></i>
        <h4 style="margin-bottom: 15px;">WhatsApp Terbuka!</h4>
        <p style="color: #6c757d; margin-bottom: 30px;">Silakan kirim pesan yang sudah disiapkan. Tim kami akan membalas dalam 1x24 jam untuk konfirmasi lebih lanjut.</p>
        <button type="button" class="btn-primary" onclick="closeModal()">Tutup</button>
      </div>
    </div>
  </div>
</div>

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

// Calculate cost in real-time
function calculateCost() {
  const paketId = document.getElementById('paket_id').value;
  const jumlahPeserta = parseInt(document.getElementById('jumlah_peserta').value) || 0;
  const fasilitasCheckboxes = document.querySelectorAll('input[name="fasilitas_ids[]"]:checked');
  
  if (!paketId || jumlahPeserta <= 0) {
    showEmptySummary();
    return;
  }
  
  // Get package data
  const paketSelect = document.getElementById('paket_id');
  const selectedOption = paketSelect.options[paketSelect.selectedIndex];
  const paketPrice = parseInt(selectedOption.dataset.price) || 0;
  const paketName = selectedOption.text.split(' - ')[0];
  
  // Calculate package cost
  const paketSubtotal = paketPrice * jumlahPeserta;
  
  // Calculate facilities cost
  let fasilitasTotal = 0;
  const fasilitasList = [];
  
  fasilitasCheckboxes.forEach(checkbox => {
    const price = parseInt(checkbox.dataset.price) || 0;
    const facilityItem = checkbox.closest('.facility-item');
    const facilityName = facilityItem.querySelector('.facility-name').textContent;
    
    fasilitasTotal += price;
    fasilitasList.push({
      name: facilityName,
      price: price,
      subtotal: price
    });
  });
  
  // Calculate discount
  let discountPercentage = 0;
  if (jumlahPeserta >= 20) {
    discountPercentage = 10;
  } else if (jumlahPeserta >= 10) {
    discountPercentage = 5;
  }
  
  const subtotal = paketSubtotal + fasilitasTotal;
  const discountAmount = subtotal * (discountPercentage / 100);
  const total = subtotal - discountAmount;
  
  // Update UI
  updateSummaryUI({
    paketName: paketName,
    paketPrice: paketPrice,
    jumlahPeserta: jumlahPeserta,
    paketSubtotal: paketSubtotal,
    fasilitasList: fasilitasList,
    fasilitasTotal: fasilitasTotal,
    discountPercentage: discountPercentage,
    discountAmount: discountAmount,
    total: total
  });
  
  currentCalculation = {
    paket_id: paketId,
    jumlah_peserta: jumlahPeserta,
    fasilitas_ids: Array.from(fasilitasCheckboxes).map(cb => cb.value),
    total: total
  };
}

function updateSummaryUI(data) {
  document.getElementById('summaryContent').style.display = 'none';
  document.getElementById('summaryDetails').style.display = 'block';
  
  document.getElementById('packageName').textContent = data.paketName;
  document.getElementById('packagePrice').textContent = 'Rp ' + formatNumber(data.paketPrice);
  document.getElementById('participantCount').textContent = data.jumlahPeserta + ' orang';
  document.getElementById('packageSubtotal').textContent = 'Rp ' + formatNumber(data.paketSubtotal);
  
  // Facilities section
  const facilitiesSection = document.getElementById('facilitiesSection');
  const facilitiesList = document.getElementById('facilitiesList');
  
  if (data.fasilitasList.length > 0) {
    facilitiesSection.style.display = 'block';
    document.getElementById('facilitiesTotal').textContent = 'Rp ' + formatNumber(data.fasilitasTotal);
    
    facilitiesList.innerHTML = '';
    data.fasilitasList.forEach(facility => {
      const item = document.createElement('div');
      item.className = 'summary-item';
      item.style.fontSize = '14px';
      item.style.paddingLeft = '20px';
      item.innerHTML = `
        <span class="summary-label">${facility.name}</span>
        <span class="summary-value">Rp ${formatNumber(facility.subtotal)}</span>
      `;
      facilitiesList.appendChild(item);
    });
  } else {
    facilitiesSection.style.display = 'none';
  }
  
  // Discount section
  const discountSection = document.getElementById('discountSection');
  if (data.discountPercentage > 0) {
    discountSection.style.display = 'block';
    document.getElementById('discountPercentage').textContent = data.discountPercentage;
    document.getElementById('discountAmount').textContent = '-Rp ' + formatNumber(data.discountAmount);
  } else {
    discountSection.style.display = 'none';
  }
  
  document.getElementById('totalAmount').textContent = 'Rp ' + formatNumber(data.total);
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

// Submit form
function submitForm() {
  const nama = document.getElementById('nama').value;
  const nomor = document.getElementById('nomor').value;
  const temaKunjungan = document.getElementById('tema_kunjungan').value;
  
  if (!nama || !nomor || !temaKunjungan || !currentCalculation) {
    alert('Mohon lengkapi semua field yang wajib diisi dan pilih paket wisata.');
    return;
  }
  
  // Show loading state
  const submitBtn = document.querySelector('.btn-primary');
  const originalText = submitBtn.innerHTML;
  submitBtn.innerHTML = '<span class="spinner"></span>Mengirim ke WhatsApp...';
  submitBtn.disabled = true;
  
  // Prepare WhatsApp message
  setTimeout(() => {
    const waMessage = generateWhatsAppMessage();
    const waNumber = '08123456789';
    const waUrl = `https://wa.me/${waNumber.replace(/^0/, '62')}?text=${encodeURIComponent(waMessage)}`;
    
    // Open WhatsApp
    window.open(waUrl, '_blank');
    
    // Reset button
    submitBtn.innerHTML = originalText;
    submitBtn.disabled = false;
    
    // Show success modal
    const modal = new bootstrap.Modal(document.getElementById('successModal'));
    modal.show();
    
    // Reset form after delay
    setTimeout(() => {
      resetForm();
    }, 3000);
  }, 1000);
}

// Generate WhatsApp message
function generateWhatsAppMessage() {
  const nama = document.getElementById('nama').value;
  const nomor = document.getElementById('nomor').value;
  const temaKunjungan = document.getElementById('tema_kunjungan').value;
  const jumlahPeserta = document.getElementById('jumlah_peserta').value;
  
  // Get package info
  const paketSelect = document.getElementById('paket_id');
  const selectedOption = paketSelect.options[paketSelect.selectedIndex];
  const paketName = selectedOption.text.split(' - ')[0];
  const paketPrice = formatNumber(parseInt(selectedOption.dataset.price));
  
  // Get selected facilities
  const fasilitasCheckboxes = document.querySelectorAll('input[name="fasilitas_ids[]"]:checked');
  let fasilitasList = '';
  if (fasilitasCheckboxes.length > 0) {
    fasilitasList = '\n\n*FASILITAS TAMBAHAN:*\n';
    fasilitasCheckboxes.forEach((checkbox, index) => {
      const facilityItem = checkbox.closest('.facility-item');
      const facilityName = facilityItem.querySelector('.facility-name').textContent;
      const facilityPrice = formatNumber(parseInt(checkbox.dataset.price));
      fasilitasList += `${index + 1}. ${facilityName} - Rp ${facilityPrice}\n`;
    });
  }
  
  // Calculate totals
  const paketSubtotal = parseInt(selectedOption.dataset.price) * parseInt(jumlahPeserta);
  let fasilitasTotal = 0;
  fasilitasCheckboxes.forEach(checkbox => {
    fasilitasTotal += parseInt(checkbox.dataset.price);
  });
  
  const subtotal = paketSubtotal + fasilitasTotal;
  let discountPercentage = 0;
  if (parseInt(jumlahPeserta) >= 20) {
    discountPercentage = 10;
  } else if (parseInt(jumlahPeserta) >= 10) {
    discountPercentage = 5;
  }
  
  const discountAmount = subtotal * (discountPercentage / 100);
  const total = subtotal - discountAmount;
  
  // Generate message
  let message = `🌿 *PERMINTAAN COST ESTIMASI WISATA*
🏖️ *Desa Wisata Sedari*

👤 *DATA PENGUNJUNG:*
• Nama: ${nama}
• No. Telepon: ${nomor}
• Tema Kunjungan: ${temaKunjungan}
• Jumlah Peserta: ${jumlahPeserta} orang

📦 *PAKET DIPILIH:*
• ${paketName}
• Harga: Rp ${paketPrice}/orang
• Subtotal: Rp ${formatNumber(paketSubtotal)}${fasilitasList}

💰 *RINCIAN BIAYA:*
• Subtotal Paket: Rp ${formatNumber(paketSubtotal)}`;

  if (fasilitasTotal > 0) {
    message += `\n• Fasilitas Tambahan: Rp ${formatNumber(fasilitasTotal)}`;
  }
  
  message += `\n• Total Sebelum Diskon: Rp ${formatNumber(subtotal)}`;
  
  if (discountPercentage > 0) {
    message += `\n• Diskon Grup (${discountPercentage}%): -Rp ${formatNumber(discountAmount)}`;
  }
  
  message += `\n\n🎯 *TOTAL ESTIMASI: Rp ${formatNumber(total)}*`;
  
  if (discountPercentage > 0) {
    message += `\n\n🎉 *Selamat! Anda mendapat diskon ${discountPercentage}% untuk grup ${parseInt(jumlahPeserta) >= 20 ? 'besar' : 'menengah'}!*`;
  }
  
  message += `\n\n📋 *CATATAN:*
• Estimasi ini belum termasuk transportasi
• Harga dapat berubah sewaktu-waktu
• Konfirmasi lebih lanjut diperlukan
• Booking dapat dilakukan minimal H-3

🕒 Estimasi dibuat pada: ${new Date().toLocaleString('id-ID')}

Terima kasih atas minat Anda untuk berkunjung ke Desa Wisata Sedari! 🙏`;

  return message;
}

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

function closeModal() {
  const modal = bootstrap.Modal.getInstance(document.getElementById('successModal'));
  modal.hide();
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

<?php $this->load->view('templates/template-fe/footer'); ?>