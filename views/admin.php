<?php 
$page_title = "Dashboard Admin";
require __DIR__ . '/partials/header_admin.php'; 
require __DIR__ . '/partials/sidebar_admin.php'; 
?>

<main class="w-100 p-4">
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
    
    <div class="row">
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-start border-primary border-4 shadow h-100 py-2">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs fw-bold text-primary text-uppercase mb-1">Total Pertanyaan</div>
                            <div class="h5 mb-0 fw-bold text-gray-800"><?php echo $total_pertanyaan; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-question-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-start border-success border-4 shadow h-100 py-2">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs fw-bold text-success text-uppercase mb-1">Total Responden</div>
                            <div class="h5 mb-0 fw-bold text-gray-800"><?php echo $total_responden; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require __DIR__ . '/partials/footer_admin.php'; ?>