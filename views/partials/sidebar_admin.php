<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark vh-100" style="width: 280px;">
    <a href="index.php?page=admin" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <i class="fas fa-poll-h me-2"></i>
        <span class="fs-4">MyOpinion</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="index.php?page=admin" class="nav-link <?php echo ($page_title == 'Dashboard Admin') ? 'active' : 'text-white'; ?>">
                <i class="fa-fw fas fa-tachometer-alt me-2"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="index.php?page=data_pertanyaan" class="nav-link <?php echo ($page_title == 'Data Pertanyaan') ? 'active' : 'text-white'; ?>">
                <i class="fa-fw fas fa-table me-2"></i> Data Pertanyaan
            </a>
        </li>
        <li>
            <a href="index.php?page=data_responden" class="nav-link <?php echo ($page_title == 'Data Responden') ? 'active' : 'text-white'; ?>">
                <i class="fa-fw fas fa-users me-2"></i> Data Responden
            </a>
        </li>
        <li>
            <a href="index.php?page=hasil" class="nav-link <?php echo (strpos($page_title, 'Hasil') !== false) ? 'active' : 'text-white'; ?>">
                <i class="fa-fw fas fa-chart-area me-2"></i> Hasil Kuesioner (CSI)
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="assets/img/undraw_profile.svg" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong><?php echo htmlspecialchars($_SESSION['admin_name']); ?></strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="index.php?page=logout">Sign out</a></li>
        </ul>
    </div>
</div>