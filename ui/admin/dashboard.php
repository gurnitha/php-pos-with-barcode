<!-- ui/user.php -->
<?php 
    // Connecting the db and start session
    include_once '../config/connectdb.php';
    session_start();

    // Redirect user if useremail is empty
    if($_SESSION['useremail'] == "" OR $_SESSION['role'] == "user"){
        header('location:../index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POS | Admin Dashboard</title>

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
    <?php require('inc/content.php'); ?>
    <!--||||||||||||||||||| content |||||||||||||||||||-->

    <!--||||||||||||||||| aside_control ||||||||||||||-->
    <?php require('inc/aside_control.php'); ?>
    <!--||||||||||||||||| aside_control ||||||||||||||-->

    <!--||||||||||||||||||| footer |||||||||||||||||||-->
    <?php require('../partials/footer.php'); ?>

    <!--||||||||||||||||||| scripts ||||||||||||||||||-->
    <?php require('../partials/scripts.php'); ?>
    
</body>
</html>