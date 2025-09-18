<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Data Pertanyaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print {
            .no-print { display: none; }
        }
        body { font-family: 'Times New Roman', Times, serif; }
        h2 { text-align: center; margin-bottom: 2rem; }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Daftar Pertanyaan Kuesioner</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pertanyaan</th>
                    <th>Pilihan A</th>
                    <th>Pilihan B</th>
                    <th>Pilihan C</th>
                    <th>Pilihan D</th>
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
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-center mt-4 no-print">
            <button onclick="window.print()" class="btn btn-primary">Cetak Halaman</button>
        </div>
    </div>
</body>
</html>