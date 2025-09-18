<?php 
// $page_title diatur dari controller
require __DIR__ . '/partials/header_admin.php'; 
require __DIR__ . '/partials/sidebar_admin.php';

// Tentukan nilai default untuk form tambah data
$p_data = $pertanyaan ?? ['id' => null, 'pertanyaan' => '', 'isi1' => '', 'isi2' => '', 'isi3' => '', 'isi4' => ''];
?>

<main class="w-100 p-4">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $page_title; ?></h1>
    
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="pertanyaan" class="form-label">Teks Pertanyaan</label>
                    <textarea class="form-control" id="pertanyaan" name="pertanyaan" rows="3" required><?php echo htmlspecialchars($p_data['pertanyaan']); ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="isi1" class="form-label">Pilihan A (Sangat Baik)</label>
                    <input type="text" class="form-control" id="isi1" name="isi1" value="<?php echo htmlspecialchars($p_data['isi1']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="isi2" class="form-label">Pilihan B (Baik)</label>
                    <input type="text" class="form-control" id="isi2" name="isi2" value="<?php echo htmlspecialchars($p_data['isi2']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="isi3" class="form-label">Pilihan C (Cukup)</label>
                    <input type="text" class="form-control" id="isi3" name="isi3" value="<?php echo htmlspecialchars($p_data['isi3']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="isi4" class="form-label">Pilihan D (Buruk)</label>
                    <input type="text" class="form-control" id="isi4" name="isi4" value="<?php echo htmlspecialchars($p_data['isi4']); ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="index.php?page=data_pertanyaan" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</main>

<?php require __DIR__ . '/partials/footer_admin.php'; ?>