<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: /itweb/index.php");
    exit;
}

include 'controls/idUsers.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขผู้ใช้งาน</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="d-flex">
        <?php include '../backend/components/header.php'; ?>

        <main class="p-4 flex-grow-1">
            <h2>แก้ไขผู้ใช้งาน</h2>

            <form action="controls/editUser.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $user['id']; ?>">

                <div class="mb-3">
                    <label for="first_name" class="form-label">Firstname</label>
                    <input type="text" id="first_name" name="first_name" class="form-control"
                        value="<?= htmlspecialchars($user['first_name']); ?>">
                </div>

                <div class="mb-3">
                    <label for="last_name" class="form-label">Lastname</label>
                    <input type="text" id="last_name" name="last_name" class="form-control"
                        value="<?= htmlspecialchars($user['last_name']); ?>">
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea id="address" name="address"
                        class="form-control"><?= htmlspecialchars($user['address']); ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" id="phone" name="phone" class="form-control"
                        value="<?= htmlspecialchars($user['phone']); ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-Mail</label>
                    <input type="email" id="email" name="email" class="form-control"
                        value="<?= htmlspecialchars($user['email']); ?>">
                </div>

                <div class="mb-3">
                    <label for="profile_images" class="form-label">Profile Picture</label>
                    <input type="file" name="profile_images" class="form-control">
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">บันทึก</button>
                    <button type="reset" class="btn btn-danger">รีเซ็ต</button>
                    <a href="user.php" class="btn btn-secondary">กลับ</a>
                </div>
            </form>

        </main>
    </div>


</body>
</html>
<?php if (isset($_SESSION['success'])) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'สำเร็จ',
            text: '<?= $_SESSION['success']; ?>',
            confirmButtonText: 'ตกลง'
        });
    </script>
    <?php unset($_SESSION['success']); endif; ?>
<?php if (isset($_SESSION['error'])) : ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'ผิดพลาด',
            text: '<?= $_SESSION['error']; ?>',
            confirmButtonText: 'ตกลง'
        });
    </script>
    <?php unset($_SESSION['error']); endif; ?>