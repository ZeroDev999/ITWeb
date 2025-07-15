<?php
    include './controls/db.php';
    session_start();

    $sql = "SELECT `id`, `first_name`, `last_name`, `address`, `phone`, `email`, `password`, `create_at`, `role`, `profile_images` FROM `users`";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
?>