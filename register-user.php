<?php
$pageTitle = 'Add new User';
include_once('./config/auth.php');

if (isLogin() == false){
        header('location: ./login.php');
}
include_once('./includes/head.php');
include_once('./includes/sidebar.php');
include_once('./includes/navbar.php');

?>


<!-- main content -->
<div class="main-content">
    <div class="card">
        <div class="card-body">
            <?php

        if (isset($_POST['btnSave'])){
           
            $fullname = $_POST['fullname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password =  md5($_POST['password']);

            if (empty($fullname)){
                echo '<p class="text-danger">Fadland fullname soo qor </p>';
            }


            if (empty($username)){
                echo '<p class="text-danger">Fadland username soo qor </p>';
            }

            if (empty($email)){
                echo '<p class="text-danger">Fadland email soo qor </p>';
            }

            if (empty($password)){
                echo '<p class="text-danger">Fadland password soo qor </p>';
            }

            $conn = getConnection();

         $result =   $conn->query("INSERT INTO users  (fullname, username, email, `password`) VALUES ('$fullname', '$username', '$email','$password' )");
            if ($result){
               header('location: ./list_users.php');
            }
        }



            ?>
            <form action="./register-user.php" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Full name</label>
                            <input type="text" class="form-control" name="fullname" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" class="form-control" name="username" />
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password"  />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-3">
                        <button type="reset" class="btn btn-danger btn-block">Reset</button>
                    </div>

                    <div class="col-md-3">
                        <button type="submit" class="btn btn-success btn-block" name="btnSave">Save</button>
                    </div>
                </div>

            </form>
        </div>

    </div>
</div>

<?php include_once('./includes/footer.php') ?>