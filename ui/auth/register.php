<!-- ui/blank.php -->
<?php 
    // Connecting the db and start session
    include_once '../config/connectdb.php';
    session_start();
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

</body>
</html>