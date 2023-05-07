<!-- ui/blank.php -->
<?php 
    // Connecting the db and start session
    include_once '../config/connectdb.php';
    session_start();

    // Create user records
    if (isset($_POST['btnsave'])){

        $username       = $_POST['txtname'];
        $useremail      = $_POST['txtemail'];
        $userpassword   = $_POST['txtpassword'];
        $userrole       = $_POST['txtselect_option'];

        // Cek apakah email yang sama sdh ada atau tidak di dalam db
        if (isset($_POST['txtemail'])){

            $select = $pdo->prepare("
                SELECT useremail
                FROM tbl_user
                WHERE useremail = '$useremail'");

            $select->execute();

            if ($select->rowCount() > 0 ){

                $_SESSION['status']="Email sudah digunakan ..Gunakan email lain!";
                $_SESSION['status_code']="warning";  
            }

            // Jika email belum ada di dalam db, lanjutkan buat user baru
            else {

                $insert = $pdo->prepare("
                    INSERT INTO tbl_user
                    (username, useremail, userpassword, role)
                    VALUES(:name, :email, :password, :role)");

                $insert->bindParam(':name', $username);
                $insert->bindParam(':email', $useremail);
                $insert->bindParam(':password', $userpassword);
                $insert->bindParam(':role', $userrole);

                if ($insert->execute()){

                    $_SESSION['status'] = 'Berhasil membuat user baru!';
                    $_SESSION['status_code'] = 'success';

                } else {

                    $_SESSION['status']="Gagal membuat user baru!";
                    $_SESSION['status_code']="error";  
                }
            }

        } 

    } else {

        $_SESSION['status']="Gagal membuat user baru!";
        $_SESSION['status_code']="error"; 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POS | Register</title>

    <!--|||||||||||||| head ||||||||||||||-->
    <?php require('../partials/head.php'); ?>
    <!--|||||||||||||| head ||||||||||||||-->
</head>
<body class="hold-transition sidebar-mini">

    <!--||||||||||||||||||| navbar |||||||||||||||||||-->
    <?php require('inc/navbar.php'); ?>
    <!--||||||||||||||||||| navbar |||||||||||||||||||-->

    <!--||||||||||||||||| aside_main |||||||||||||||||-->
    <?php require('inc/aside_main.php'); ?>
    <!--||||||||||||||||| aside_main |||||||||||||||||-->

    <!--||||||||||||||||||| content |||||||||||||||||||-->
     <?php require('inc/form_register.php'); ?>
    <!--||||||||||||||||||| content |||||||||||||||||||-->

    <!--||||||||||||||||| aside_control ||||||||||||||-->
    <?php require('inc/aside_control.php'); ?>
    <!--||||||||||||||||| aside_control ||||||||||||||-->

    <!--||||||||||||||||||| footer |||||||||||||||||||-->
    <?php require('../partials/footer.php'); ?>

    <!--||||||||||||||||||| scripts ||||||||||||||||||-->
    <?php require('../partials/scripts.php'); ?>

    <!-- Start alert messages -->
    <?php if(isset($_SESSION['status']) && $_SESSION['status'] !=''){ ?>

    <script>

          Swal.fire({
            icon: '<?php echo $_SESSION['status_code']; ?>',
            title: '<?php echo $_SESSION['status']; ?>'
          });

    </script>

    <?php unset($_SESSION['status']); } ?>
    <!-- End alert messages -->

</body>
</html>