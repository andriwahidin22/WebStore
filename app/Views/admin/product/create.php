<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>

    <!-- Custom fonts for this template -->
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin Panel</div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/dashboard'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>

            </li>

            <li class="nav-item">
                <a class="nav-link active" href="<?= base_url('admin/product'); ?>">
                    <i class="fas fa-fw fa-box"></i>
                    <span>Manage Products</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Form Pencarian di Navbar -->
                    <form action="<?= base_url('admin/product'); ?>" method="get" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Search by product name" aria-label="Search" aria-describedby="basic-addon2" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown">
                                <i class="fas fa-bell fa-fw"></i>
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">Notifications</h6>
                                <?php if (session()->getFlashdata('notifications')) : ?>
                                    <?php foreach (session()->getFlashdata('notifications') as $notif) : ?>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="mr-3">
                                                <div class="icon-circle bg-primary">
                                                    <i class="fas fa-info-circle text-white"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="small text-gray-500"><?= date('Y-m-d H:i:s'); ?></div>
                                                <?= $notif; ?>
                                            </div>
                                        </a>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <a class="dropdown-item text-center text-gray-500" href="#">No notifications</a>
                                <?php endif; ?>
                            </div>
                        </li>

                        <!-- User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle" src="<?= base_url('assets/img/undraw_profile.svg'); ?>">
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Create Product</h1>

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="<?= base_url('admin/product/store'); ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="nama_produk">Product Name</label>
                                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
                                </div>

                                <div class="form-group">
                                    <label for="kategori_id">Category</label>
                                    <select id="kategori_id" name="kategori_id" class="form-control" required>
                                        <?php foreach ($categories as $category) : ?>
                                            <option value="<?= $category['id']; ?>"><?= esc($category['nama_kategori']); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="thumbnail">Thumbnail</label>
                                    <input type="file" class="form-control" id="thumbnail" name="thumbnail" required>
                                </div>

                                <div class="form-group">
                                    <label for="harga">Price</label>
                                    <input type="number" class="form-control" id="harga" name="harga" required>
                                </div>

                                <div class="form-group">
                                    <label for="spesifikasi">Specification</label>
                                    <textarea class="form-control" id="spesifikasi" name="spesifikasi" rows="4" required></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="stok">Stock</label>
                                    <input type="number" class="form-control" id="stok" name="stok" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="<?= base_url('admin/product'); ?>" class="btn btn-secondary">Back</a>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; WebStore22</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/js/sb-admin-2.min.js'); ?>"></script>
</body>

</html>