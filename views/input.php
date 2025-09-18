<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Mulai Survey Anda | MyOpinion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f0f2f5; }
        .progress-container { position: fixed; top: 0; left: 0; width: 100%; z-index: 1030; height: 5px; }
        .progress-bar { height: 100%; background: #0d6efd; width: 0%; transition: width 0.2s ease-out; }
        .main-container { padding-top: 60px; }
        .card { border: none; border-radius: 0.75rem; box-shadow: 0 4px S15px rgba(0, 0, 0, 0.05); }
        .card-header { background-color: #fff; border-bottom: 1px solid #dee2e6; font-weight: 600; }
        .form-check-label { display: block; padding: 1rem; border: 2px solid #e9ecef; border-radius: 0.5rem; cursor: pointer; transition: background-color 0.2s ease-in-out, border-color 0.2s ease-in-out; }
        .form-check-input { display: none; }
        .form-check-input:checked + .form-check-label { background-color: #e7f1ff; border-color: #0d6efd; color: #0d6efd; font-weight: 600; }
        .form-check-label:hover { background-color: #f8f9fa; border-color: #0d6efd; }
    </style>
</head>

<body>
    <div class="progress-container">
        <div class="progress-bar" id="progressBar"></div>
    </div>

    <div class="container main-container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-5">
                    <h1 class="fw-bold">Kuesioner Survey MyOpinion</h1>
                    <p class="text-muted fs-5">Berikan suara Anda untuk membantu kami menjadi lebih baik.</p>
                </div>

                <form action="index.php?page=input" method="post">
                    
                    <?php if (isset($_SESSION['input_error'])): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php 
                                echo $_SESSION['input_error']; 
                                unset($_SESSION['input_error']); // Hapus pesan setelah ditampilkan
                            ?>
                        </div>
                    <?php endif; ?>

                    <div class="card p-4 mb-4">
                        <h4 class="mb-3 fw-bold">1. Data Diri Anda</h4>
                        <div class="mb-3">
                            <label for="responden" class="form-label">Nama Lengkap</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" name="responden" id="responden" placeholder="Masukkan nama Anda" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Alamat Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="email" class="form-control" name="email" id="email" placeholder="contoh@email.com" required>
                            </div>
                        </div>
                    </div>
                    
                    <h4 class="mb-3 fw-bold">2. Pertanyaan Kuesioner</h4>

                    <?php foreach ($pertanyaan as $row): ?>
                        <div class="card mb-4">
                            <div class="card-header">
                                <strong>Pertanyaan #<?php echo htmlspecialchars($row['id']); ?></strong>
                            </div>
                            <div class="card-body">
                                <p class="card-text mb-3"><?php echo htmlspecialchars($row['pertanyaan']); ?></p>
                                <div class="row g-2">
                                    <div class="col-sm-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p<?php echo $row['id']; ?>" id="p<?php echo $row['id']; ?>_isi1" value="<?php echo htmlspecialchars($row['isi1']); ?>" required>
                                            <label class="form-check-label" for="p<?php echo $row['id']; ?>_isi1"><?php echo htmlspecialchars($row['isi1']); ?></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p<?php echo $row['id']; ?>" id="p<?php echo $row['id']; ?>_isi2" value="<?php echo htmlspecialchars($row['isi2']); ?>" required>
                                            <label class="form-check-label" for="p<?php echo $row['id']; ?>_isi2"><?php echo htmlspecialchars($row['isi2']); ?></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p<?php echo $row['id']; ?>" id="p<?php echo $row['id']; ?>_isi3" value="<?php echo htmlspecialchars($row['isi3']); ?>" required>
                                            <label class="form-check-label" for="p<?php echo $row['id']; ?>_isi3"><?php echo htmlspecialchars($row['isi3']); ?></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="p<?php echo $row['id']; ?>" id="p<?php echo $row['id']; ?>_isi4" value="<?php echo htmlspecialchars($row['isi4']); ?>" required>
                                            <label class="form-check-label" for="p<?php echo $row['id']; ?>_isi4"><?php echo htmlspecialchars($row['isi4']); ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <div class="d-grid gap-2 mt-5">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-paper-plane me-2"></i> Kirim Jawaban Saya
                        </button>
                    </div>
                    
                    <a href="index.php?page=home" class="btn btn-link text-secondary w-100 mt-2">Kembali ke Beranda</a>
                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Fungsi untuk mengupdate progress bar saat scrolling
        window.onscroll = function() { updateProgressBar() };
        function updateProgressBar() {
            var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            var scrolled = (winScroll / height) * 100;
            document.getElementById("progressBar").style.width = scrolled + "%";
        }
    </script>
</body>
</html>