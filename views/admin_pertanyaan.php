<?php 
$page_title = "Data Pertanyaan";
$is_table_page = true;
require __DIR__ . '/partials/header_admin.php'; 
require __DIR__ . '/partials/sidebar_admin.php'; 
?>
<main class="w-100 p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0 text-gray-800">Tabel Data Pertanyaan</h1>
        <div>
            <a href="index.php?page=tambah_pertanyaan" class="btn btn-primary btn-sm">
                <i class="fas fa-plus me-2"></i>Tambah Data
            </a>
            <a href="index.php?page=print_pertanyaan" target="_blank" class="btn btn-secondary btn-sm">
                <i class="fas fa-print me-2"></i>Print
            </a>
        </div>
    </div>
    <p class="mb-4">Berikut adalah daftar semua pertanyaan dalam kuesioner.</p>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Pertanyaan</th>
                            <th>Pilihan A</th>
                            <th>Pilihan B</th>
                            <th>Pilihan C</th>
                            <th>Pilihan D</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pertanyaan as $p): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($p['id']); ?></td>
                            <td><?php echo htmlspecialchars($p['pertanyaan']); ?></td>
                            <td><?php echo htmlspecialchars($p['isi1']); ?></td>
                            <td><?php echo htmlspecialchars($p['isi2']); ?></td>
                            <td><?php echo htmlspecialchars($p['isi3']); ?></td>
                            <td><?php echo htmlspecialchars($p['isi4']); ?></td>
                            <td>
                                <a href="index.php?page=edit_pertanyaan&id=<?php echo $p['id']; ?>" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="index.php?page=hapus_pertanyaan&id=<?php echo $p['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php require __DIR__ . '/partials/footer_admin.php'; ?>