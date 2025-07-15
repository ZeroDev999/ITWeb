<?php
    session_start();
    include 'db.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $product_name = $_POST['product_name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $created_at = $_POST['created_at'];
        $products_image = null;

        if (isset($_FILES['products_image']) && $_FILES['products_image']['error'] === UPLOAD_ERR_OK) {
            $target_dir = "../../assets/imgs/";
            $image_name = basename($_FILES["products_image"]["name"]);
            $target_file = $target_dir . $image_name;

            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if (in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
                if (move_uploaded_file($_FILES["products_image"]["tmp_name"], $target_file)) {
                    $products_image = $image_name;
                    $_SESSION['success'] = "User updated successfully with product image.";
                    header("Location: ../Food.php");
                } else {
                    $_SESSION['error'] = "Failed to upload product image.";
                    header("Location: ../editFood1.php?id=" . $id);
                    exit;
                }
            } else {
                $_SESSION['error'] = "Invalid image format. Only JPG, JPEG, PNG & GIF files are allowed.";
                header("Location: ../editFood1.php?id=" . $id);
                exit;
            }
        }

        $stmt = $pdo->prepare("UPDATE `products` SET `product_name` = ?, `description` = ?, `price` = ?, `created_at` = ? " . ($products_image ? ", `products_image` = ?" : "") . " WHERE `id` = ?");
        $params = [$product_name, $description, $price, $created_at];
        if ($products_image) {
            $params[] = $products_image;
        }
        $params[] = $id;
        $result = $stmt->execute($params);

        if ($result) {
            $_SESSION['success'] = "User updated successfully.";
            header("Location: ../Food.php");
        } else {
            $_SESSION['error'] = "Failed to update user.";
            header("Location: ../editFood1.php?id=" . $id);
        }

        exit;
    }
?>