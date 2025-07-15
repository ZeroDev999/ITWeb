<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: /itweb/index.php");
    exit;
}

include 'controls/idFood.php'
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

            <form action="controls/editUser.php" method="POST">
                <input type="hidden" name="id" value="<?= $user['id']; ?>">

                <div class="mb-3">
                    <label for="product_name" class="form-label">Product</label>
                    <input type="text" id="product_name" name="product_name" class="form-control"
                        value="<?= htmlspecialchars($user['product_name']); ?>">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" id="description" name="description" class="form-control"
                        value="<?= htmlspecialchars($user['description']); ?>">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">price</label>
                    <input type="text" id="price" name="price" class="form-control"
                        value="<?= htmlspecialchars($user['price']); ?>">
                </div>

                <div class="mb-3">
                    <label for="created_at" class="form-label">created_at</label>
                    <input type="text" id="created_at" name="created_at" class="form-control"
                        value="<?= htmlspecialchars($user['created_at']); ?>">
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">บันทึก</button>
                </div>
            </form>

        </main>
    </div>
</body>

</html>