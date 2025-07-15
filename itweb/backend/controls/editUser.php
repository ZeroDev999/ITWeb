<?php
    session_start();
    include 'db.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        $stmt = $pdo->prepare("UPDATE `users` SET `first_name` = ?, `last_name` = ?, `address` = ?, `phone` = ?, `email` = ? WHERE `id` = ?");
        $result = $stmt->execute([$first_name, $last_name, $address, $phone, $email, $id]);

        if ($result) {
            $_SESSION['success'] = "User updated successfully.";
            header("Location: ../user.php");
        } else {
            $_SESSION['error'] = "Failed to update user.";
            header("Location: ../edituser.php?id=" . $id);
        }

        exit;
    }
?>