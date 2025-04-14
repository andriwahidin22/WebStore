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

        <!-- Detail -->
        <section class="hero-section">
            <div class="container mt-5">
                <h1 class="mb-4 text-center">Detail Produk</h1>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                <?php endif; ?>

                <div class="card shadow-lg">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?= base_url('uploads/' . $produk['gambar']) ?>" class="img-fluid rounded-start" alt="<?= $produk['nama_produk'] ?>">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title display-6"><?= $produk['nama_produk'] ?></h5>
                                <p class="card-text"><strong>Kategori:</strong> <?= $produk['nama_kategori'] ?></p>
                                <p class="card-text"><strong>Harga:</strong> Rp <?= number_format($produk['harga'], 0, ',', '.') ?></p>
                                <p class="card-text"><strong>Stok:</strong> <?= $produk['stok'] ?></p>
                                <p class="card-text"><strong>Spesifikasi:</strong></p>
                                <p><?= nl2br($produk['spesifikasi']) ?></p>

                                <!-- Button Section -->
                                <div class="mt-4">
                                    <a href="/" class="btn btn-secondary"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
                                    <form action="<?= base_url('order/checkout/' . $produk['id']) ?>" method="get" class="d-inline">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi bi-cart-check"></i> Beli Sekarang
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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