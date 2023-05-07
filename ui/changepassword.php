<!-- ui/changepassword.php -->
<?php 
    // Connecting the db and start session
    include_once 'config/connectdb.php';
    session_start();

    // Redirect unlogged in user to login page
    if($_SESSION['useremail'] == ""){
        header('location:../index.php');
    }

    // --------4 langkah untuk merubah password------------

    // Langkah 1 : dapatkan input dari form menggunakan post method
    if (isset($_POST['btnupdate'])){
        
        $oldpassword_text  = $_POST['txt_oldpassword'];
        $newdpassword_text = $_POST['txt_newpassword'];
        $rnewpassword_text = $_POST['txt_rnewpassword'];

        // Testing
        // echo $oldpassword_text." ".$newdpassword_text." ".$rnewpassword_text;
    
        // Langkah 2 : ambil data dari db menggunakan select query berdasarkan useremail
        
        // Catch the useremail using SESSION and put it in var email
        // Session had been started above in line 5
        $email = $_SESSION['useremail'];

        // Get out the user email from the tbl_user base on the session
        $select = $pdo->prepare("SELECT * FROM tbl_user WHERE useremail = '$email'");
        $select->execute();
        $row = $select->fetch(PDO::FETCH_ASSOC);

        // Check the value
        // echo $row['useremail']; 
        // echo $row['userpassword'];

        $useremail_db = $row['useremail']; 
        $password_db  = $row['userpassword'];

        // Langkah 3 Compare user input values to the database values
        // 1. Memastikan password user sama: yg ditulis dg passwordnya di db
        if ($oldpassword_text == $password_db){

            // 2. Memastikan password baru sama dengan repeat password baru
            if ($newdpassword_text == $rnewpassword_text){

                // Langkah 4 : jika kedua data sama, lakukan update query dan berikan pesan update gagal atau berhasil
                // Note: (:pass) dan (:email) dinamai place holder untuk password dan email
                $update = $pdo->prepare("
                    UPDATE tbl_user 
                    SET userpassword = :pass 
                    WHERE useremail = :email");

                // Note: :pass is equal to the old password and $rnewpassword_text is the new one
                $update->bindParam(':pass', $rnewpassword_text);
                $update->bindParam(':email', $email);

                // Execute the udate and show the alert message
                if ($update->execute()) {

                    $_SESSION['status'] = 'Password updated successfully!';
                    $_SESSION['status_code'] = 'success';

                } 

            } 
            
            // If new and repeat password did not match, show alert messages
            else {

                $_SESSION['status']="New password and repeat new password did not match!";
                $_SESSION['status_code']="error";     
            }

        } 

        // If password from the form and the passord in the db did not match
        // show the alert message
        else {

            $_SESSION['status']="Password did not match!";
            $_SESSION['status_code']="error";
        }

    }

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
    <?php 
        if ($_SESSION['role'] == 'admin'){
            require('inc/admin/aside_main.php'); 
        } else {
            require('inc/user/aside_main.php');  
        }
    ?>
    <!--||||||||||||||||| aside_main |||||||||||||||||-->

    <!--||||||||||||||||||| content |||||||||||||||||||-->
    <div class="content-wrapper">
        <!--|||||||||||||||| CONTENT HEADER ||||||||||||||||-->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Admin Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
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

                            <form class="form-horizontal" action="" method="post">
                                <div class="card-body">
                                    <!-- Old password -->
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Old password</label>
                                        <input 
                                            type="password" 
                                            class="form-control" 
                                            id="exampleInputPassword1" 
                                            placeholder="Old password"
                                            name="txt_oldpassword">
                                    </div>
                                    <!-- New password -->
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">New password</label>
                                        <input 
                                            type="password" 
                                            class="form-control" 
                                            id="exampleInputPassword1" 
                                            placeholder="New password"
                                            name="txt_newpassword">
                                    </div>
                                    <!-- Repeat new password -->
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Repeat new password</label>
                                        <input 
                                            type="password" 
                                            class="form-control" 
                                            id="exampleInputPassword1" 
                                            placeholder="Repeat new password"
                                            name="txt_rnewpassword">
                                    </div>
                                </div>

                                <!-- Button -->
                                <div class="card-footer">
                                    <button 
                                        type="submit" 
                                        class="btn btn-info float-right"
                                        name="btnupdate">Update password</button>
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
    <?php 
        if ($_SESSION['role'] == 'admin'){
            require('inc/admin/aside_control.php'); 
        } else {
            require('inc/user/aside_control.php');  
        }
    ?>
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
    <!-- SweetAlert2 -->
    <script src="../assets/plugins/sweetalert2/sweetalert2.min.js"></script>


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