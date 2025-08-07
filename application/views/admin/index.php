<!-- Tambahkan style tambahan -->
<style>
    .card-box {
        border-radius: 16px;
        padding: 28px;
        color: #fff;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.12);
        transition: transform 0.2s, box-shadow 0.2s;
        text-align: center;
        height: 100%;
    }

    .card-box:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 24px rgba(0, 0, 0, 0.15);
    }

    .card-box h1 {
        font-size: 36px;
        margin-bottom: 10px;
    }

    .card-box h6 {
        font-size: 16px;
        margin: 0;
    }

    .card-link {
        text-decoration: none;
        display: block;
        height: 100%;
    }

    .btn-outline-secondary i,
    .btn-outline-danger i {
        margin-right: 4px;
    }
</style>

<div class="page-wrapper">
    <div class="page-breadcrumb mb-3">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title font-weight-bold"><?= $judul; ?></h4>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <!-- Card Statistik -->
        <div class="row row-cols-5 gap-2">
            <?php
            $cards = [
                ['icon' => 'mdi-nature-people', 'color' => '#007bff', 'text' => "$total_jenis_wisata Jenis Wisata", 'url' => base_url('jenis_wisata')],
                ['icon' => 'mdi-hotel', 'color' => '#28a745', 'text' => "$total_fasilitas Fasilitas", 'url' => base_url('fasilitas')],
                ['icon' => 'mdi-map-marker-radius', 'color' => '#ffc107', 'text' => "$total_paket Paket Wisata", 'url' => base_url('paket')],
                ['icon' => 'mdi-camera', 'color' => '#17a2b8', 'text' => "$total_gallery Galeri", 'url' => base_url('gallery')],
                ['icon' => 'mdi-video', 'color' => '#dc3545', 'text' => "$total_video Video", 'url' => base_url('video')],
            ];

            foreach ($cards as $card): ?>
                <div class="col mb-3">
                    <a href="<?= $card['url']; ?>" class="card-link">
                        <div class="card-box" style="background-color: <?= $card['color']; ?>;">
                            <h1><i class="mdi <?= $card['icon']; ?>"></i></h1>
                            <h6><?= $card['text']; ?></h6>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Grafik Pengunjung -->
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title font-weight-bold mb-0"> Grafik Pengunjung Website - Bulan <?= formatBulanIndonesia(date('Y-m-01')) ?></h5>

                            <div>
                                <span class="badge badge-primary p-2" style="font-size: 16px;">
                                    Total: <strong><?= $total_pengunjung ?></strong> Pengunjung
                                </span>
                                <button onclick="downloadPDF()" class="btn btn-sm btn-outline-secondary ml-2" title="Unduh PDF">
                                    <i class="mdi mdi-file-pdf"></i> PDF
                                </button>

                                
                                <!-- Tombol CSV -->
<button onclick="downloadCSV()" class="btn btn-sm btn-outline-secondary" title="Unduh Data CSV">
    <i class="mdi mdi-file-delimited-outline"></i> CSV
</button>

<!-- Tombol Reset -->
<button onclick="resetData()" class="btn btn-sm btn-outline-danger ml-2" title="Hapus Semua Data">
    <i class="mdi mdi-delete-alert-outline"></i> Reset Data
</button>

                            </div>
                        </div>
                        <canvas id="grafikPengunjung" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const labels = <?= json_encode(array_column($statistik_pengunjung, 'tanggal')) ?>;
    const dataPoints = <?= json_encode(array_map('intval', array_column($statistik_pengunjung, 'total'))) ?>;
    const totalPengunjung = <?= $total_pengunjung ?>;

    const ctx = document.getElementById('grafikPengunjung').getContext('2d');

    const chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Pengunjung',
                data: dataPoints,
                backgroundColor: 'rgba(0, 123, 255, 0.15)',
                borderColor: '#007bff',
                borderWidth: 3,
                pointBackgroundColor: '#007bff',
                pointBorderColor: '#007bff',
                pointRadius: 4,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    }
                }
            }
        }
    });

    
    function downloadCSV() {
        let csv = "Tanggal,Jumlah\n";
        labels.forEach((label, i) => {
            csv += `${label},${dataPoints[i]}\n`;
        });

        const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
        const link = document.createElement("a");
        link.setAttribute("href", URL.createObjectURL(blob));
        link.setAttribute("download", "pengunjung.csv");
        link.click();
    }
    

    function resetData() {
    Swal.fire({
        title: 'Yakin ingin reset data?',
        text: "Data pengunjung bulan ini akan dihapus permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e3342f',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch("<?= base_url('admin/reset_pengunjung') ?>", {
                method: "POST",
                headers: { "Content-Type": "application/json" }
            }).then(response => {
                if (response.ok) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Data pengunjung telah dihapus.',
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => location.reload());
                } else {
                    Swal.fire('Gagal', 'Terjadi kesalahan saat menghapus data.', 'error');
                }
            });
        }
    });
}

</script>
<!-- Tambahkan ini di header jika belum -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<script>
async function downloadPDF() {
    const canvas = document.getElementById("grafikPengunjung");

    // Konversi canvas ke image
    const canvasData = canvas.toDataURL("image/png", 1.0);

    // Ukuran halaman A4 dalam satuan mm
    const pageWidth = 210;  // A4 width
    const pageHeight = 297; // A4 height

    // Buat PDF baru
    const { jsPDF } = window.jspdf;
    const pdf = new jsPDF("p", "mm", "a4");

    // Hitung ukuran gambar dalam mm (berdasarkan rasio asli canvas)
    const imgProps = pdf.getImageProperties(canvasData);
    const imgWidth = pageWidth - 20; // padding 10mm kiri-kanan
    const imgHeight = (imgProps.height * imgWidth) / imgProps.width;

    // Judul
    pdf.setFontSize(14);
    pdf.text("Grafik Pengunjung Website - Bulan <?= formatBulanIndonesia(date('Y-m-01')) ?>", 10, 20);
    pdf.setFontSize(12);
    pdf.text("Total Pengunjung: <?= $total_pengunjung ?>", 10, 30);

    // Sisipkan gambar mulai dari y = 40mm
    pdf.addImage(canvasData, "PNG", 10, 40, imgWidth, imgHeight);

    // Simpan
    pdf.save("grafik_pengunjung_<?= date('Ymd') ?>.pdf");
}
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


