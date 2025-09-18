<?php 
$page_title = "Data Responden";
$is_table_page = true;
require __DIR__ . '/partials/header_admin.php'; 
require __DIR__ . '/partials/sidebar_admin.php'; 
?>

<main class="w-100 p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0 text-gray-800">Tabel Data Responden</h1>
        <a href="index.php?page=print_responden" target="_blank" class="btn btn-secondary btn-sm">
            <i class="fas fa-print me-2"></i>Cetak Data Responden
        </a>
    </div>
    <p class="mb-4">Data jawaban yang telah diisi oleh para responden.</p>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Responden</th>
                            <th>Email</th>
                            <?php for ($i = 1; $i <= 9; $i++): ?>
                                <th>P<?php echo $i; ?></th>
                            <?php endfor; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($responden as $r): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($r['id']); ?></td>
                            <td><?php echo htmlspecialchars($r['responden']); ?></td>
                            <td><?php echo htmlspecialchars($r['email']); ?></td>
                            <?php for ($i = 1; $i <= 9; $i++): ?>
                                <td><?php echo htmlspecialchars($r['p'.$i] ?? ''); ?></td>
                            <?php endfor; ?>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php require __DIR__ . '/partials/footer_admin.php'; ?>