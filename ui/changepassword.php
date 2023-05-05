<!-- ui/changepassword.php -->
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
    <div class="content-wrapper">
        <!--|||||||||||||||| CONTENT HEADER ||||||||||||||||-->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <!-- <h1 class="m-0">Change password</h1> -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Admin Dashboard</li>
                        </ol>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!--|||||||||||||||| CONTENT HEADER ||||||||||||||||-->


        <!--||||||||||||||||| MAIN CONTENT |||||||||||||||||-->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                    </div>
                    <div class="col-lg-4">

                        <div class="card card-info">

                            <div class="card-header">
                                <h3 class="card-title">Change password</h3>
                            </div>

                            <form class="form-horizontal">
                                <div class="card-body">
                                    <!-- Old password -->
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Old password</label>
                                        <input 
                                            type="password" 
                                            class="form-control" 
                                            id="exampleInputPassword1" 
                                            placeholder="Old password">
                                    </div>
                                    <!-- New password -->
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">New password</label>
                                        <input 
                                            type="password" 
                                            class="form-control" 
                                            id="exampleInputPassword1" 
                                            placeholder="New password">
                                    </div>
                                    <!-- Repeat new password -->
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Repeat new password</label>
                                        <input 
                                            type="password" 
                                            class="form-control" 
                                            id="exampleInputPassword1" 
                                            placeholder="Repeat new password">
                                    </div>
                                </div>

                                <!-- Button -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info float-right">Update password</button>
                                </div>
                            </form>
                        </div>       

                    </div>
                    <div class="col-lg-4">
                    </div>
                </div>
            </div>
        </div>
        <!--||||||||||||||||| MAIN CONTENT |||||||||||||||||-->
    </div>
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