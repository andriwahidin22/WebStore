<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Halaman kontak untuk toko online Anda.">
    <title>Kontak Kami - Toko Online</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Sono:wght@200;300;400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('vendor/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('vendor/css/bootstrap-icons.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('vendor/css/owl.carousel.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('vendor/css/owl.theme.default.min.css'); ?>">
    <link href="<?= base_url('vendor/css/templatemo-pod-talk.css'); ?>" rel="stylesheet">
</head>

<body>
    <main>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand me-lg-5 me-0" href="<?= base_url(); ?>">
                    <img src="<?= base_url('vendor/images/pod-talk-logo.png'); ?>" class="logo-image img-fluid" alt="Toko Online Logo">
                </a>

                <form action="/search" method="get" class="custom-form search-form flex-fill me-3" role="search">
                    <div class="input-group input-group-lg">
                        <input name="search" type="search" class="form-control" id="search" placeholder="Cari Produk" aria-label="Search">
                        <button type="submit" class="form-control" id="submit">
                            <i class="bi-search"></i>
                        </button>
                    </div>
                </form>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-auto">
                        <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>">Home</a></li>
                        <li class="nav-item"><a class="nav-link active" href="/kontak">Contact</a></li>
                    </ul>
                    <div class="ms-4">
                        <a href="<?= base_url('login'); ?>" class="btn custom-btn custom-border-btn">Login</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Header -->
        <header class="site-header d-flex flex-column justify-content-center align-items-center" style="background-image: url('<?= base_url('vendor/images/templatemo-wave-banner.jpg'); ?>'); background-size: cover; background-position: center; height: 300px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 text-center text-white">
                        <h1 class="mb-3">Kontak Kami</h1>
                        <h3>Dapatkan bantuan dan informasi dari tim kami</h3>
                    </div>
                </div>
            </div>
        </header>

        <!-- Contact Section -->
        <section class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <iframe 
                            class="google-map" 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31871.78632759036!2d105.23225505541048!3d-5.358836999660993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40dbd062d1c80f%3A0x131ecb7cb94ec5c9!2sPoliteknik%20Negeri%20Lampung!5e0!3m2!1sen!2sid!4v1696598375931!5m2!1sen!2sid" 
                            width="100%" 
                            height="300" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    <div class="col-lg-6 col-12">
                        <form action="#" method="post" class="custom-form">
                            <div class="form-floating mb-3">
                                <input type="text" name="nama" class="form-control" placeholder="Nama Anda" required>
                                <label>Nama Anda</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Email Anda" required>
                                <label>Email Anda</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea name="pesan" class="form-control" placeholder="Pesan Anda" required></textarea>
                                <label>Pesan Anda</label>
                            </div>
                            <button type="submit" class="btn custom-btn">Kirim Pesan</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Social Media Section -->
        <section class="section-padding bg-light">
            <div class="container">
                <div class="row text-center">
                    <div class="col-12">
                        <h3>Ikuti Kami di Media Sosial</h3>
                        <p class="mb-4">Tetap terhubung dengan kami melalui media sosial</p>
                        <ul class="list-inline">
                            <li class="list-inline-item mx-2">
                                <a href="https://www.instagram.com/akun_anda" target="_blank" class="text-dark">
                                    <i class="bi bi-instagram" style="font-size: 2rem;"></i>
                                </a>
                            </li>
                            <li class="list-inline-item mx-2">
                                <a href="https://www.tiktok.com/@akun_anda" target="_blank" class="text-dark">
                                    <i class="bi bi-tiktok" style="font-size: 2rem;"></i>
                                </a>
                            </li>
                            <li class="list-inline-item mx-2">
                                <a href="https://wa.me/6281234567890" target="_blank" class="text-dark">
                                    <i class="bi bi-whatsapp" style="font-size: 2rem;"></i>
                                </a>
                            </li>
                            <li class="list-inline-item mx-2">
                                <a href="https://www.tokoonline.com" target="_blank" class="text-dark">
                                    <i class="bi bi-globe" style="font-size: 2rem;"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>

 <!-- Footer -->
 <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 mb-4 mb-md-0 mb-lg-0">
                    <h6 class="site-footer-title mb-3">Hubungi Kami</h6>
                    <p class="mb-2"><strong class="d-inline me-2">Telepon:</strong> 0812-3456-7890</p>
                    <p><strong class="d-inline me-2">Email:</strong> <a href="mailto:info@tokoonline.com">info@tokoonline.com</a></p>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <h6 class="site-footer-title mb-3">Langganan Newsletter</h6>
                    <form class="custom-form subscribe-form" action="#" method="get" role="form">
                        <input type="email" name="subscribe-email" class="form-control" placeholder="Alamat Email" required>
                        <button type="submit" class="form-control mt-3" id="submit">Berlangganan</button>
                    </form>
                </div>
                <div class="col-lg-4 col-12">
                    <h6 class="site-footer-title mb-3">Tautan Cepat</h6>
                    <ul class="site-footer-links">
                        <li class="site-footer-link-item"><a href="#" class="site-footer-link">Beranda</a></li>
                        <li class="site-footer-link-item"><a href="#section_2" class="site-footer-link">Produk Kami</a></li>
                        <li class="site-footer-link-item"><a href="#section_3" class="site-footer-link">Ulasan Pelanggan</a></li>
                        <li class="site-footer-link-item"><a href="/kontak" class="site-footer-link">Hubungi Kami</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="<?= base_url('vendor/js/bootstrap.bundle.min.js'); ?>"></script>
</body>
</html>