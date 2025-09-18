<?php 
$page_title = "Hasil Kuesioner (CSI)";
// PERBAIKAN: Menggunakan __DIR__ untuk path yang benar
require __DIR__ . '/partials/header_admin.php'; 
require __DIR__ . '/partials/sidebar_admin.php'; 
?>
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <h1 class="h3 mb-4 text-gray-800">Hasil Kuesioner & Customer Satisfaction Index (CSI)</h1>
        </nav>
        <div class="container-fluid">
            

            <div class="row">
                <div class="col-lg-12">
                     <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Hasil Index Kepuasan Pelanggan (CSI)</h6>
                        </div>
                        <div class="card-body text-center">
                            <h2><?php echo number_format($csi, 2); ?>%</h2>
                            <div class="progress mb-4">
                                <div class="progress-bar" role="progressbar" style="width: <?php echo $csi; ?>%" aria-valuenow="<?php echo $csi; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p>Berdasarkan <?php echo $jumlah_responden; ?> tanggapan.</p>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Rata-Rata Skor Kepuasan per Pertanyaan (MSS)</h6>
                        </div>
                        <div class="card-body">
                             <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Pertanyaan</th>
                                            <th>Skor Rata-rata</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($semua_pertanyaan as $p) : ?>
                                            <tr>
                                                <td><?php echo $p['id']; ?></td>
                                                <td><?php echo htmlspecialchars($p['pertanyaan']); ?></td>
                                                <td>
                                                    <?php echo isset($mss_per_pertanyaan[$p['id']]) ? number_format($mss_per_pertanyaan[$p['id']], 2) : 'N/A'; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php 
// PERBAIKAN: Menggunakan __DIR__ untuk path yang benar
require __DIR__ . '/partials/footer_admin.php'; 
?>