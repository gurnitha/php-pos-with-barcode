<!-- ui/blank.php -->
<?php 
    // Connecting the db and start session
    include_once 'config/connectdb.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('inc/others/head.php'); ?>
</head>
<body class="hold-transition sidebar-mini">

    <!--||||||||||||||||||| navbar |||||||||||||||||||-->
    <?php require('inc/others/navbar.php'); ?>
    <!--||||||||||||||||||| navbar |||||||||||||||||||-->

    <!--||||||||||||||||| aside_main |||||||||||||||||-->
    <?php require('inc/others/aside_main.php'); ?>
    <!--||||||||||||||||| aside_main |||||||||||||||||-->

    <!--||||||||||||||||||| content |||||||||||||||||||-->
     <?php require('inc/others/content.php'); ?>
    <!--||||||||||||||||||| content |||||||||||||||||||-->

    <!--||||||||||||||||| aside_control ||||||||||||||-->
    <?php require('inc/others/aside_control.php'); ?>
    <!--||||||||||||||||| aside_control ||||||||||||||-->

    <!--||||||||||||||||||| footer |||||||||||||||||||-->
    <?php require('inc/others/footer.php'); ?>

    <!-- ./wrapper -->
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/dist/js/adminlte.min.js"></script>

</body>
</html>