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
        $profile_images = null;

        if (isset($_FILES['profile_images']) && $_FILES['profile_images']['error'] === UPLOAD_ERR_OK) {
            $target_dir = "../../assets/imgs/";
            $image_name = basename($_FILES["profile_images"]["name"]);
            $target_file = $target_dir . $image_name;

            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if (in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
                if (move_uploaded_file($_FILES["profile_images"]["tmp_name"], $target_file)) {
                    $profile_images = $image_name;
                    $_SESSION['success'] = "User updated successfully with profile picture.";
                    header("Location: ../user.php");
                } else {
                    $_SESSION['error'] = "Failed to upload profile picture.";
                    header("Location: ../edituser.php?id=" . $id);
                    exit;
                }
            } else {
                $_SESSION['error'] = "Invalid image format. Only JPG, JPEG, PNG & GIF files are allowed.";
                header("Location: ../edituser.php?id=" . $id);
                exit;
            }
        }

        $stmt = $pdo->prepare("UPDATE `users` SET `first_name` = ?, `last_name` = ?, `address` = ?, `phone` = ?, `email` = ? " . ($profile_images ? ", `profile_images` = ?" : "") . " WHERE `id` = ?");
        $params = [$first_name, $last_name, $address, $phone, $email];
        if ($profile_images) {
            $params[] = $profile_images;
        }
        $params[] = $id;
        $result = $stmt->execute($params);

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