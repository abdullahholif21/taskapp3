<?php 
include_once('./includes/head.php');
include_once('./config/db.php');
include_once('./config/auth.php');


?>

<div class="card w-50">
    <div class="card-body">
        <?php
$errorMessage = '';
if (isset($_POST['btnLogin'])){
    $username = $_POST['username'];
    $password = $_POST['pass'];

    if (empty($username) || empty($password)){
        $errorMessage= 'Username or Password Invalid';
    }


    if (empty($errorMessage) == false){
        echo ("<p class= 'alert alert-danger'> $errorMessage </p>");
    } else {
        $password = md5($password);
        $sql = "SELECT id, fullname, username FROM users WHERE username = '$username' AND password = '$password'";
        
        $conn = getConnection();
        $result = $conn->query($sql);
        if ($result->num_rows == 1){
            $user = $result->fetch_assoc();
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['fullname'] = $user['fullname'];
            header('location: ./index.php');
        }  else {
            echo ("<p class= 'alert alert-danger'> No username found </p>");
        }
    }

}


        ?>
        <form action="./login.php" method="POST">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="pass" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-primary btn-block" name="btnLogin">Login</button>
                </div>
            </div>

        </form>
    </div>
</div>