<?php
    include './controls/db.php';

    $sql = "SELECT `id`, `first_name`, `last_name`, `address`, `phone`, `email`, `password`, `create_at`, `role`, `profile_images` FROM `users`";
    $stmt = $pdo->prepare($sql);    
    $stmt->execute();
?>