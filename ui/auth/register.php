<!-- ui/blank.php -->
<?php 
    // Connecting the db and start session
    include_once '../config/connectdb.php';
    session_start();

    // ===============DELETE USER================

    // Mencegah peringatan bila pd url tdk ada id
    error_reporting(0);

    // Jika icon delete diklik, get the id from the url untuk menghapus record
    $id = $_GET['id'];

    if (isset($id)){

        $delete = $pdo->prepare("
            DELETE 
            FROM tbl_user
            WHERE userid =".$id);

        if ($delete->execute()){

            $_SESSION['status']="Akun berhasil dihapus!";
            $_SESSION['status_code']="success";  

        } else {

            $_SESSION['status']="Akun gagal dihapus!";
            $_SESSION['status_code']="warning";  
        }
    }

    // ===============END DELETE USER================



    // ===================CREATE USER=================
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

    } 

    // NOTE: else ini di-nonaktifkan krn:
    // 1. Saat menu register diklik, it pops up
    // 2. Saat menghapus akun, it also pops up and prevent
    //    "Akun berhasil dihapus!"; pops up
    // 3. Setelah di-nonaktifkan, semua berjalan normal
    
    // else {

    //     $_SESSION['status']="Gagal membuat user baru! xx";
    //     $_SESSION['status_code']="error"; 
    // }
    // ==================END CREATE USER=============

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
    <?php require('../admin/inc/aside_main.php'); ?>
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