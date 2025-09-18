<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Data Responden</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print {
            .no-print { display: none; }
            @page {
                size: landscape; /* Mengatur orientasi halaman menjadi landscape */
            }
        }
        body { font-family: 'Times New Roman', Times, serif; }
        h2 { text-align: center; margin-bottom: 2rem; }
        table { font-size: 10px; } /* Mengecilkan ukuran font tabel */
    </style>
</head>
<body onload="window.print()"> <div class="container-fluid mt-5">
        <h2>Laporan Data Responden</h2>
        <table class="table table-bordered">
            <thead class="table-light">
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
                <?php if (empty($responden)): ?>
                    <tr>
                        <td colspan="12" class="text-center">Tidak ada data untuk ditampilkan.</td>
                    </tr>
                <?php else: ?>
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
                <?php endif; ?>
            </tbody>
        </table>
        <div class="text-center mt-4 no-print">
            <button onclick="window.print()" class="btn btn-primary">Cetak Ulang</button>
            <button onclick="window.close()" class="btn btn-secondary">Tutup</button>
        </div>
    </div>
</body>
</html>