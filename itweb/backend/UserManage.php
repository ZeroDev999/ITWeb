<?php
session_start();
include './controls/fetchUser.php';
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: /itweb/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แสดงข้อมูลผู้ใช้งาน</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="d-flex">
        <?php include '../backend/components/header.php'; ?>

        <main class="p-4 flex-grow-1">
            <section id="fecth_user" class="py-5">
                <div class="container">
                    <h2 class="mb-4">แสดงข้อมูลผู้ใช้งาน</h2>

                    <?php if ($stmt->rowCount() > 0): ?>
                    <div class="row">
                        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?= htmlspecialchars($row['first_name'] . ' ' . $row['last_name']) ?>
                                    </h5>
                                    <td class="card-text"><strong>อีเมล์:</strong> <?= htmlspecialchars($row['email']) ?>
                                    </td>
                                    <td class="card-text"><strong>เบอร์โทร:</strong>
                                        <?= htmlspecialchars($row['phone']) ?></td>
                                    <td class="card-text"><strong>ที่อยู่:</strong>
                                        <?= htmlspecialchars($row['address']) ?></td>
                                    <td class="card-text"><strong>วันที่สมัคร:</strong>
                                        <?= htmlspecialchars($row['create_at']) ?></td>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <?php else: ?>
                    <p>ไม่พบข้อมูลผู้ใช้งาน</p>
                    <?php endif; ?>
                </div>
            </section>
        </main>
    </div>
</body>

</html>