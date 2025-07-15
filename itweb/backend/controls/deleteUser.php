<?php
session_start();
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("DELETE FROM `users` WHERE `id` = ?");
    $result = $stmt->execute([$id]);

    if ($result) {
        $_SESSION['success'] = "User fetched successfully.";
        header("Location: ../user.php");
    }
    else {
        $_SESSION['error'] = "Failed to fetch user.";
        header("Location: ../user.php");
    }
    
    exit;
}
?>
