<?php
    session_start();
    if(!isset($_SESSION['user_id'])) {
        header("Location: signin.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information Website</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php include './components/header.php' ?>
    

    <section class="hero text-white text-center py-5" style="background: linear-gradient(to right,rgb(0, 39, 75),rgb(0, 114, 167)); height: 100vh;">
        <div class="container h-100 d-flex flex-column justify-content-center">
            <h1 class="display-4">ยินดีตอนรับเข้าสู่เว็บไซต์ของเรา</h1>
            <p class="lead">ค้นพบเทคโนโลยีใหม่</p>
            <a href="#content" class="btn btn-light btn-lg mx-auto">เริ่มตอนนี้</a>
        </div>
    </section>

    <section id="container" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">เกี่ยวกับเทคโนโลยีสารสนเทศ</h2>

            <p>
                เว็บไซต์สารสนเทศคือแหล่งข้อมูลออนไลน์ที่จัดเก็บและนำเสนอข้อมูลเพื่อให้ผู้ใช้งานสามารถค้นหา เรียนรู้ และนำไปใช้ประโยชน์ได้อย่างสะดวก โดยมักประกอบด้วยข้อมูลที่ถูกจัดหมวดหมู่ เช่น ข่าวสาร สถิติ ฐานข้อมูล เอกสารวิชาการ หรือข้อมูลเฉพาะทางในด้านต่าง ๆ เช่น การศึกษา การเกษตร หรือสาธารณสุข จุดเด่นของเว็บไซต์ประเภทนี้คือความถูกต้องของข้อมูล และการอัปเดตที่สม่ำเสมอเพื่อรองรับการใช้งานของผู้ใช้ทุกระดับ
            </p>

            <p>
               เว็บไซต์สารสนเทศเป็นเครื่องมือสำคัญในการรวบรวม จัดเก็บ และเผยแพร่ข้อมูลในรูปแบบดิจิทัล ช่วยให้ผู้ใช้งานสามารถเข้าถึงข้อมูลได้อย่างรวดเร็วทุกที่ทุกเวลา ไม่ว่าจะเป็นข้อมูลด้านวิชาการ งานวิจัย ข่าวสาร หรือข้อมูลเพื่อการตัดสินใจ เว็บไซต์เหล่านี้มักถูกใช้งานในองค์กร โรงเรียน หน่วยงานภาครัฐ หรือภาคธุรกิจ เพื่อเพิ่มประสิทธิภาพในการสื่อสารและการบริหารจัดการข้อมูล 
            </p>
        </div>
    </section>


    <!-- <h1>Hello</h1> -->

    <!-- <p><?php echo htmlspecialchars($_SESSION['name']); ?></p>
    <p><?php echo htmlspecialchars($_SESSION['email']); ?></p>

    <a href="controls/signout.php">SignOut</a> -->

    <script>
    <?php if(isset($_GET['error']) && $_GET ['error'] == 'invalid') : ?>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Invalid email or password',
        footer: 'Please ry again.'
    });
    <?php endif; ?>

    <?php if(isset($_GET['success']) && $_GET ['success'] == 'true') : ?>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: 'You have signed in successfully!',
        footer: 'Go Away Teen.'
    });
    <?php endif; ?>
    </script>

    <?php include './components/footer.php' ?>
</body>

</html>