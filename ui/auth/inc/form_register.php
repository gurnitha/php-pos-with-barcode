<div class="content-wrapper">

    <!--|||||||||||||||| CONTENT HEADER ||||||||||||||||-->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Register</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
                        <li class="breadcrumb-item active">Register</li>
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

                <!--||||||||||||||| FORM |||||||||||||||-->
                <div class="col-lg-4">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Register</h5>
                        </div>
                        <form action="" method="POST">
                            <div class="card-body">

                                <!-- Name -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        id="exampleInputEmail1" 
                                        placeholder="Enter name"
                                        name="txtname">
                                </div>

                                <!-- Email -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input 
                                        type="email" 
                                        class="form-control" 
                                        id="exampleInputEmail1" 
                                        placeholder="Enter email"
                                        name="txtemail">
                                </div>

                                <!-- Password -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input 
                                        type="password" 
                                        class="form-control" 
                                        id="exampleInputPassword1" 
                                        placeholder="Password"
                                        name="txtpassword">
                                </div>

                                <!-- Role -->
                                <div class="form-group">
                                    <label>Role</label>
                                    <select 
                                        class="form-control" 
                                        name="txtselect_option">
                                        <option value="" disabled selected>Pilih role</option>
                                        <option>Admin</option>
                                        <option>User</option>
                                    </select>
                                </div>

                            </div>

                            <!-- Save button -->
                            <div class="card-footer">
                                <button 
                                    type="submit" 
                                    class="btn btn-primary float-right"
                                    name="btnsave">Save</button>
                            </div>
                        </form>
                    </div>                
                </div>
                <!--||||||||||||||| FORM |||||||||||||||-->

                <!--||||||||||||||| TABLE ||||||||||||||-->
                <div class="col-lg-8">
                    <table class="table table-striped card-primary card-outline">
                        <thead>
                            <td>#</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Password</td>
                            <td>Role</td>
                        </thead>
                        <tbody>
                            <?php  
                                $select = $pdo->prepare("
                                    SELECT * 
                                    FROM tbl_user
                                    ORDER BY userid ASC");
                                $select->execute();

                                while ($row = $select->fetch(PDO::FETCH_OBJ)) {
                                    echo '
                                    <tr>
                                        <td>'.$row->userid.'</td>
                                        <td>'.$row->username.'</td>
                                        <td>'.$row->useremail.'</td>
                                        <td>'.$row->userpassword.'</td>
                                        <td>'.$row->role.'</td>
                                    </tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!--||||||||||||||| TABLE ||||||||||||||-->

            </div>
        </div>
    </div>
    <!--||||||||||||||||| MAIN CONTENT |||||||||||||||||-->
    
</div>