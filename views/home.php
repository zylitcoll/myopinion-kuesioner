<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | MyOpinion</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; padding-top: 70px; }
        .navbar-brand { font-weight: 700; }
        .navbar.scrolled { box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease-in-out; transform: translateY(0); }
        .navbar.hidden { transform: translateY(-100%); }
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://img.freepik.com/free-vector/web-development-programmer-engineering-coding-website-augmented-reality-interface-screens-developer-project-engineer-programming-software-application-design-cartoon-illustration_107791-3863.jpg') no-repeat center center;
            background-size: cover; color: white; padding: 100px 0; background-attachment: fixed;
        }
        .hero-section h1 { font-size: 3.5rem; font-weight: 700; }
        .card-partner { transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .card-partner:hover { transform: translateY(-10px); box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1); }
        .footer-section { background-color: #333; color: #eee; }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="index.php?page=home">MyOpinion</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#partners">Info</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-outline-light ms-lg-3" href="index.php?page=login">Login Admin</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <section class="hero-section text-center">
            <div class="container">
                <h1 class="display-4">Suarakan Pendapatmu</h1>
                <p class="lead mb-4">Dengan memberikan masukan Anda, kita bisa mendapatkan pandangan yang lebih luas dan memahami persepsi orang-orang terhadap suatu masalah.</p>
                <a href="index.php?page=input" class="btn btn-primary btn-lg rounded-pill" style="background-color: #4e73df; border: none;">Mulai Disini</a>
            </div>
        </section>
        <section id="about" class="py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-4 mb-lg-0 d-flex flex-column justify-content-center">
                        <h2 class="mb-3 fw-bold">Tetap Sehat, Tetap Semangat</h2>
                        <p class="text-muted">Dengan memberikan masukan agar kami menjadi lebih baik lagi.</p>
                        <p class="text-muted">Masukan Anda berperan penting dalam perencanaan dan pengembangan, membantu untuk menghasilkan inovasi yang lebih baik dan memenuhi kebutuhan masyarakat.</p>
                        <a href="index.php?page=input" class="btn btn-outline-primary mt-3 align-self-start rounded-pill">Mulai Disini</a>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center">
                        <img src="https://img.freepik.com/free-vector/web-development-programmer-engineering-coding-website-augmented-reality-interface-screens-developer-project-engineer-programming-software-application-design-cartoon-illustration_107791-3863.jpg" class="img-fluid rounded shadow-sm" alt="Ilustrasi Survey">
                    </div>
                </div>
            </div>
        </section>
        <section id="partners" class="py-5">
            <div class="container">
                <div class="text-center mb-5"><h2 class="fw-bold">Info</h2></div>
                <div class="row g-4 justify-content-center">
                    <div class="col-md-6 mb-4">
                        <div class="card card-partner p-4 h-100 border-0 rounded-4">
                            <div class="text-center">
                                <img src="assets/img/bps.webp" class="img-fluid mb-3" alt="Logo BPS" style="max-height: 80px;">
                                <h5 class="fw-bold">BPS</h5>
                            </div>
                            <p class="text-muted mt-2">Badan Pusat Statistik adalah Lembaga Pemerintah Non Kementerian yang bertanggung jawab langsung kepada Presiden. Sebelumnya, BPS merupakan Biro Pusat Statistik, yang dibentuk berdasarkan UU Nomor 6 Tahun 1960 tentang Sensus dan UU Nomer 7 Tahun 1960 tentang Statistik.</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 d-flex align-items-stretch">
                        <div class="card card-partner p-4 h-100 border-0 rounded-4 d-flex align-items-center justify-content-center">
                            <img src="assets/img/univ.png" class="img-fluid" alt="Logo Universitas" style="max-height: 100px;">
                        </div>
                    </div>
                    <div class="col-6 col-md-3 d-flex align-items-stretch">
                        <div class="card card-partner p-4 h-100 border-0 rounded-4 d-flex align-items-center justify-content-center">
                            <img src="assets/img/fak.jpeg" class="img-fluid" alt="Logo Fakultas" style="max-height: 100px;">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer id="contact" class="footer-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-4">
                    <h5>m2803y.</h5>
                    <p class="text-white-50">Belajar adalah kunci untuk mengasah kemampuan kita dan menjelma menjadi developer yang lebih baik setiap harinya." "Sikap yang rendah hati dan terus lapar akan pengetahuan adalah fondasi penting dalam perjalanan belajar sebagai seorang developer</p>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <h5>About</h5>
                    <p class="text-white-50">MyOpinion adalah sebuah platform web survey yang memungkinkan pengguna untuk mengumpulkan opini dan pendapat dari responden melalui kuesioner online. Dengan fitur-fitur dan layanan yang tersedia, pengguna dapat mengumpulkan data dengan mudah dan menganalisis hasil survei untuk mendapatkan wawasan yang berharga.</p>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <h5>Contact</h5>
                    <ul class="list-unstyled text-white-50">
                        <li><i class="fas fa-map-marker-alt me-2"></i>JL Takengon - Angkup</li>
                        <li><i class="fas fa-inbox me-2"></i>Kode Pos: 57365</li>
                    </ul>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <h5>Social</h5>
                    <ul class="list-unstyled text-white-50">
                        <li><i class="fab fa-instagram me-2"></i>@m28.03y</li>
                        <li><i class="fab fa-youtube me-2"></i>Tady Tv</li>
                    </ul>
                </div>
            </div>
            <div class="text-center text-white-50 pt-4 border-top border-secondary">
                <p class="mb-0">&copy; 2021. <b>Muhtady.</b> All Rights Reserved.</p>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let prevScrollpos = window.pageYOffset;
        window.onscroll = function() {
            const currentScrollPos = window.pageYOffset;
            const navbar = document.querySelector('.navbar');
            if (prevScrollpos > currentScrollPos) {
                navbar.classList.remove('hidden');
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.add('hidden');
                navbar.classList.remove('scrolled');
            }
            if (currentScrollPos === 0) {
                navbar.classList.remove('scrolled', 'hidden');
            }
            prevScrollpos = currentScrollPos;
        }
    </script>
</body>
</html>