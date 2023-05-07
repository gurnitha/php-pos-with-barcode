<?php 

    require_once ('ui/config/connectdb.php'); 
    session_start();

    if(isset($_POST['btn_login'])){

        $useremail = $_POST['text_email'];
        $password = $_POST['text_password'];

        // echo $useremail. " ".$password;

        // Test : email= test_email@gmail.com, password=testpassword
        // Hasil: test_email@gmail.com testpassword

        $select = $pdo->prepare("select * from tbl_user where useremail='$useremail' and userpassword='$password'");
        $select->execute();
        $row = $select->fetch(PDO::FETCH_ASSOC);

        if(is_array($row)) {
        
            if($row['useremail'] == $useremail and $row['userpassword'] == $password and $row['role'] == "admin") {

                // Showing alert messages
                $_SESSION['status']="Admin sukses login!";
                $_SESSION['status_code']="success";

                // Redirect to admin dashboard
                header('refresh: 1;ui/admin/dashboard.php');

                $_SESSION['userid'] = $row['userid'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['useremail'] = $row['useremail'];
                $_SESSION['role'] = $row['role'];
            } 

            elseif ($row['useremail'] == $useremail and $row['userpassword'] == $password and $row['role'] == "user") {

                // Showing alert messages
                $_SESSION['status']="User sukses login!";
                $_SESSION['status_code']="success";

                // Redirect to user dashboard
                header('refresh: 1;ui/user/dashboard.php');

                $_SESSION['userid'] = $row['userid'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['useremail'] = $row['useremail'];
                $_SESSION['role'] = $row['role'];
            }
        } 

        else {

            // Showing alert messages
            $_SESSION['status']="Email atau password salah... ulangi lagi";
            $_SESSION['status_code']="error";
        }
        
        // Tesing: useremal:admin@mail.com, userpassword:admin@mail.com
        // Hasil: Login sukses
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POS | Login</title>

    <!--|||||||||||||| head ||||||||||||||-->
    <?php require('ui/partials/head.php'); ?>
    <!--|||||||||||||| head ||||||||||||||-->
    
</head>
<body class="hold-transition login-page">

    <!-- Content -->
    <div class="login-box">

        <!-- Login form -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="../../index2.html" class="h1"><b>PHP</b>Barcode</a>
            </div>
            <div class="card-body">

                <p class="login-box-msg">Sign in to start your session</p>

                <form action="" method="post">

                    <div class="input-group mb-3">
                        <input 
                            type="email" 
                            class="form-control" 
                            placeholder="Email" 
                            name="text_email" 
                            required>

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input 
                            type="password" 
                            class="form-control" 
                            placeholder="Password" 
                            name="text_password" 
                            required>

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <a href="forgot-password.html">I forgot my password</a>
                            </div>
                        </div>
                        <div class="col-4">
                            <button 
                                type="submit" 
                                class="btn btn-primary btn-block" 
                                name="btn_login">Log in</button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <a href="ui/auth/register.php">Register</a>
                            </div>
                        </div>
                    </div>
                </form>
                <p class="mb-1">
                    
                </p>
            </div>
        </div>

    </div>
    <!-- End Content -->

    <!--||||||||||||||||||| scripts ||||||||||||||||||-->
    <?php require('ui/partials/scripts.php'); ?>

    <!-- Alert messages -->
    <?php if(isset($_SESSION['status']) && $_SESSION['status'] !=''){ ?>

    <script>
      $(function() {
        var Toast = Swal.mixin({
          toast: true,
          position: 'top',
          showConfirmButton: false,
          timer: 5000
        });

          Toast.fire({
            icon: '<?php echo $_SESSION['status_code']; ?>',
            title: '<?php echo $_SESSION['status']; ?>'
          })
        });

    </script>

    <?php unset($_SESSION['status']); } ?>
</body>
</html>