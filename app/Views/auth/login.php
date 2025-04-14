<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="<?= base_url('vendor/css/bootstrap.min.css'); ?>">
    <style>
        body {
            background: linear-gradient(132deg, #f44336, #E91E63, #9C27B0, #673AB7, #3F51B5, #2196F3, #03A9F4, #00BCD4, #009688, #4CAF50, #FFC107, #FF9800, #f44336, #E91E63, #9C27B0, #673AB7, #3F51B5, #2196F3, #03A9F4, #00BCD4, #009688, #4CAF50, #FFC107, #FF9800);
            background-size: 400% 400%;
            animation: BackgroundGradient 30s ease infinite;
            height: 100vh;
            margin: 0;
        }

        @keyframes BackgroundGradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            background: #fff;
            padding: 30px;
            margin: 80px auto;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
        }

        .login-header {
            font-size: 28px;
            margin-bottom: 30px;
            color: #333;
        }

        .form-control {
            margin-bottom: 20px;
            height: 45px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .btn-login {
            width: 100%;
            background: #2196F3;
            color: #fff;
            font-weight: bold;
            border: none;
            padding: 12px;
            font-size: 18px;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        .btn-login:hover {
            background: #1E88E5;
        }

        .btn-home {
            width: 100%;
            background: #4CAF50;
            color: #fff;
            font-weight: bold;
            border: none;
            padding: 12px;
            font-size: 18px;
            border-radius: 5px;
            margin-top: 10px;
            transition: background 0.3s ease;
        }

        .btn-home:hover {
            background: #43A047;
        }

        .footer-text {
            margin-top: 20px;
            color: #fff;
            font-size: 14px;
        }

        .alert-danger {
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2 class="login-header">Admin Login</h2>

        <!-- Menampilkan pesan error jika ada -->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>

        <!-- Form login -->
        <form action="<?= base_url('auth/auth'); ?>" method="post">
            <?= csrf_field(); ?>
            <input type="text" class="form-control" name="username" placeholder="Username" required>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <button type="submit" class="btn btn-login">Login</button>
        </form>
        <a href="<?= base_url('/'); ?>" class="btn btn-home">Kembali ke Home</a>
    </div>

    <div class="footer-text text-center">
        Welcome to the Admin Panel | Admin Template <br>
        &copy; 2025 Toko Online
    </div>

</body>

</html>
