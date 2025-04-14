<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Toko Online - Produk</title>

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
                        <li class="nav-item"><a class="nav-link active" href="<?= base_url(); ?>">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="/kontak">Contact</a></li>
                    </ul>
                    <div class="ms-4">
                        <a href="<?= base_url('login'); ?>" class="btn custom-btn custom-border-btn">Login</a>
                    </div>
                </div>
            </div>
        </nav>

        <section class="hero-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="text-center mb-5 pb-2">
                            <h1 class="text-white">Tipe iOS</h1>
                            <p class="text-white">Temukan produk favorit Anda dengan mudah dan nyaman</p>
                        </div>
                        <div class="owl-carousel owl-theme">
                            <?php if (!empty($produkIos)): ?>
                                <?php foreach ($produkIos as $produk): ?>
                                    <div class="owl-carousel-info-wrap item text-center">
                                        <img src="<?= base_url('uploads/' . $produk['gambar']) ?>" class="owl-carousel-image img-fluid" alt="<?= $produk['nama_produk'] ?>">
                                        <div class="owl-carousel-info">
                                            <h4 class="mb-2"><?= $produk['nama_produk'] ?></h4>
                                            <p class="badge">Rp <?= number_format($produk['harga'], 0, ',', '.') ?></p>
                                            <p class="badge">Stok: <?= $produk['stok'] ?> unit</p>
                                            <form action="<?= base_url('order/checkout/' . $produk['id']) ?>" method="get">
                                                <button type="submit" class="btn custom-btn mt-2">Beli Sekarang</button>
                                            </form>

                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p class="text-white">Tidak ada produk tersedia.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Produk Terbaru iOS -->
        <section class="latest-podcast-section section-padding" id="latest_ios_products">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-12">
                        <h4 class="section-title">Produk Terbaru iOS</h4>
                    </div>
                    <?php if (!empty($produkIos)): ?>
                        <?php foreach ($produkIos as $produk): ?>
                            <div class="col-lg-4 col-md-6 col-12 mb-4">
                                <div class="custom-block d-flex">
                                    <div class="custom-block-icon-wrap">
                                        <a href="#">
                                            <img src="<?= base_url('uploads/' . $produk['gambar']) ?>" class="custom-block-image img-fluid" alt="<?= $produk['nama_produk'] ?>">
                                        </a>
                                    </div>

                                    <div class="custom-block-info">
                                        <h5><a href="<?= base_url('product/detail/' . $produk['id']) ?>"><?= $produk['nama_produk'] ?></a></h5>
                                        <p class="mb-2">Harga: Rp <?= number_format($produk['harga'], 0, ',', '.') ?></p>
                                        <p><strong>Spesifikasi:</strong> <?= $produk['spesifikasi'] ?></p>
                                        <a href="<?= base_url('product/detail/' . $produk['id']) ?>" class="btn custom-btn btn-sm">Detail Produk</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-lg-12 col-12">
                            <p class="text-center">Tidak ada produk iOS tersedia.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>


        <section class="hero-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="text-center mb-5 pb-2">
                            <h1 class="text-white">Tipe Android</h1>
                            <p class="text-white">Temukan produk favorit Anda dengan mudah dan nyaman</p>
                        </div>

                        <div class="owl-carousel owl-theme">
                            <?php if (!empty($produkAndroid)): ?>
                                <?php foreach ($produkAndroid as $produk): ?>
                                    <div class="owl-carousel-info-wrap item text-center">
                                        <img src="<?= base_url('uploads/' . $produk['gambar']) ?>" class="owl-carousel-image img-fluid" alt="<?= $produk['nama_produk'] ?>">
                                        <div class="owl-carousel-info">
                                            <h4 class="mb-2"><?= $produk['nama_produk'] ?></h4>
                                            <p class="badge">Rp <?= number_format($produk['harga'], 0, ',', '.') ?></p>
                                            <p class="badge">Stok: <?= $produk['stok'] ?></p>
                                            <form action="<?= base_url('order/checkout/' . $produk['id']) ?>" method="get">
                                                <button type="submit" class="btn custom-btn mt-2">Beli Sekarang</button>
                                            </form>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p class="text-white">Tidak ada produk tersedia.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Produk Terbaru Android -->
        <section class="latest-podcast-section section-padding" id="latest_android_products">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-12">
                        <h4 class="section-title">Produk Terbaru Android</h4>
                    </div>

                    <?php if (!empty($produkAndroid)): ?>
                        <?php foreach ($produkAndroid as $produk): ?>
                            <div class="col-lg-4 col-md-6 col-12 mb-4">
                                <div class="custom-block d-flex">
                                    <div class="custom-block-icon-wrap">
                                        <a href="#">
                                            <img src="<?= base_url('uploads/' . $produk['gambar']) ?>" class="custom-block-image img-fluid" alt="<?= $produk['nama_produk'] ?>">
                                        </a>
                                    </div>

                                    <div class="custom-block-info">
                                        <h5><a href="<?= base_url('product/detail/' . $produk['id']) ?>"><?= $produk['nama_produk'] ?></a></h5>
                                        <p class="mb-2">Harga: Rp <?= number_format($produk['harga'], 0, ',', '.') ?></p>
                                        <p><strong>Spesifikasi:</strong> <?= $produk['spesifikasi'] ?></p>
                                        <a href="<?= base_url('product/detail/' . $produk['id']) ?>" class="btn custom-btn btn-sm">Detail Produk</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-lg-12 col-12">
                            <p class="text-center">Tidak ada produk Android tersedia.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <section class="youtube-episodes-section section-padding pb-0" id="section_3">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">YouTube Episodes: Penjelasan HP</h4>
                        </div>
                    </div>

                    <!-- YouTube Episode 1 -->
                    <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                        <div class="custom-block custom-block-overlay">
                            <div class="custom-block-image-wrap">
                                <iframe width="100%" height="200"
                                    src="https://www.youtube.com/embed/VIDEO_ID_1"
                                    title="YouTube video player"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                            </div>
                            <div class="custom-block-info text-center mt-3">
                                <h5 class="mb-1">
                                    Review iPhone 13
                                </h5>
                                <p class="badge mb-0">10 Minutes</p>
                            </div>
                        </div>
                    </div>

                    <!-- YouTube Episode 2 -->
                    <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                        <div class="custom-block custom-block-overlay">
                            <div class="custom-block-image-wrap">
                                <iframe width="100%" height="200"
                                    src="https://www.youtube.com/embed/VIDEO_ID_2"
                                    title="YouTube video player"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                            </div>
                            <div class="custom-block-info text-center mt-3">
                                <h5 class="mb-1">
                                    Perbandingan iPhone 12 vs iPhone 13
                                </h5>
                                <p class="badge mb-0">15 Minutes</p>
                            </div>
                        </div>
                    </div>

                    <!-- YouTube Episode 3 -->
                    <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                        <div class="custom-block custom-block-overlay">
                            <div class="custom-block-image-wrap">
                                <iframe width="100%" height="200"
                                    src="https://www.youtube.com/embed/VIDEO_ID_3"
                                    title="YouTube video player"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                            </div>
                            <div class="custom-block-info text-center mt-3">
                                <h5 class="mb-1">
                                    Panduan Membeli HP di Tahun 2025
                                </h5>
                                <p class="badge mb-0">20 Minutes</p>
                            </div>
                        </div>
                    </div>

                    <!-- YouTube Episode 4 -->
                    <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                        <div class="custom-block custom-block-overlay">
                            <div class="custom-block-image-wrap">
                                <iframe width="100%" height="200"
                                    src="https://www.youtube.com/embed/VIDEO_ID_4"
                                    title="YouTube video player"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                            </div>
                            <div class="custom-block-info text-center mt-3">
                                <h5 class="mb-1">
                                    Tips Memilih HP untuk Fotografi
                                </h5>
                                <p class="badge mb-0">8 Minutes</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <section class="customer-review-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">Review Customer</h4>
                        </div>
                    </div>

                    <!-- Review 1 -->
                    <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                        <div class="custom-block custom-block-full">
                            <div class="custom-block-image-wrap text-center">
                                <img src="images/profile/smiling-business-woman-with-folded-hands-against-white-wall-toothy-smile-crossed-arms.jpg"
                                    class="custom-block-image img-fluid rounded-circle" alt="Customer 1">
                            </div>
                            <div class="custom-block-info text-center mt-3">
                                <h5 class="mb-2">Candice</h5>
                                <p class="text-muted">"Produk yang sangat bagus, kualitasnya sesuai ekspektasi saya. Pengiriman juga cepat!"</p>
                            </div>
                        </div>
                    </div>

                    <!-- Review 2 -->
                    <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                        <div class="custom-block custom-block-full">
                            <div class="custom-block-image-wrap text-center">
                                <img src="images/profile/handsome-asian-man-listening-music-through-headphones.jpg"
                                    class="custom-block-image img-fluid rounded-circle" alt="Customer 2">
                            </div>
                            <div class="custom-block-info text-center mt-3">
                                <h5 class="mb-2">William</h5>
                                <p class="text-muted">"Pelayanan sangat ramah dan produk diterima dalam kondisi baik. Terima kasih!"</p>
                            </div>
                        </div>
                    </div>

                    <!-- Review 3 -->
                    <div class="col-lg-4 col-12">
                        <div class="custom-block custom-block-full">
                            <div class="custom-block-image-wrap text-center">
                                <img src="images/profile/cute-smiling-woman-outdoor-portrait.jpg"
                                    class="custom-block-image img-fluid rounded-circle" alt="Customer 3">
                            </div>
                            <div class="custom-block-info text-center mt-3">
                                <h5 class="mb-2">Taylor</h5>
                                <p class="text-muted">"Harga yang ditawarkan sangat kompetitif, pasti akan membeli lagi di sini."</p>
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

                    <!-- Contact Section -->
                    <div class="col-lg-4 col-md-6 col-12 mb-4 mb-md-0 mb-lg-0">
                        <h6 class="site-footer-title mb-3">Hubungi Kami</h6>
                        <p class="mb-2"><strong class="d-inline me-2">Telepon:</strong> 0812-3456-7890</p>
                        <p>
                            <strong class="d-inline me-2">Email:</strong>
                            <a href="mailto:info@tokoonline.com">info@tokoonline.com</a>
                        </p>
                        <h6 class="site-footer-title mb-3">Ikuti Kami</h6>
                        <ul class="social-icon">
                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-instagram"></a>
                            </li>
                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-facebook"></a>
                            </li>
                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-twitter"></a>
                            </li>
                        </ul>
                    </div>

                    <!-- Newsletter Subscription -->
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <h6 class="site-footer-title mb-3">Langganan Newsletter</h6>
                        <form class="custom-form subscribe-form" action="#" method="get" role="form">
                            <input type="email" name="subscribe-email" id="subscribe-email" pattern="[^ @]*@[^ @]*"
                                class="form-control" placeholder="Alamat Email" required>
                            <button type="submit" class="form-control mt-3" id="submit">Berlangganan</button>
                        </form>
                    </div>

                    <!-- Footer Links -->
                    <div class="col-lg-4 col-12">
                        <h6 class="site-footer-title mb-3">Tautan Cepat</h6>
                        <ul class="site-footer-links">
                            <li class="site-footer-link-item">
                                <a href="#" class="site-footer-link">Beranda</a>
                            </li>
                            <li class="site-footer-link-item">
                                <a href="#section_2" class="site-footer-link">Produk Kami</a>
                            </li>
                            <li class="site-footer-link-item">
                                <a href="#section_3" class="site-footer-link">Ulasan Pelanggan</a>
                            </li>
                            <li class="site-footer-link-item">
                                <a href="#contact" class="site-footer-link">Hubungi Kami</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="container pt-4">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <p class="copyright-text mb-0">Copyright © 2025 Toko Online.
                        </p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 text-lg-end">
                        <p class="mb-0">Design: <a href="https://templatemo.com" target="_blank">TemplateMo</a></p>
                    </div>
                </div>
            </div>
        </footer>

    </main>

    <!-- JAVASCRIPT FILES -->
    <script src="<?= base_url('vendor/js/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('vendor/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('vendor/js/owl.carousel.min.js'); ?>"></script>
    <script>
        // Initialize Owl Carousel
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                center: true,
                autoplay: true,
                autoplayTimeout: 3000,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                }
            });
        });
    </script>
</body>

</html>