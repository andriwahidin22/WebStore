<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Profile</h1>

        <?php if (session()->getFlashdata('message')) : ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('message'); ?>
            </div>
        <?php endif; ?>

        <!-- Cek apakah $user tersedia -->
        <?php if (isset($user) && is_array($user)) : ?>
            <form action="<?= base_url('admin/profile/update'); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" value="<?= esc($user['username']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" name="password" class="form-control">
                    <small>Leave blank if you don't want to change the password.</small>
                </div>
                <div class="form-group">
                    <label for="profile_picture">Profile Picture</label>
                    <input type="file" name="profile_picture" class="form-control">
                    <?php if (!empty($user['profile_picture'])) : ?>
                        <p>Current Picture:</p>
                        <img src="<?= base_url('uploads/profile_pictures/' . $user['profile_picture']); ?>" alt="Profile Picture" style="width: 100px;">
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        <?php else : ?>
            <p class="text-danger">User data not found.</p>
        <?php endif; ?>
    </div>
</body>

</html>
