<?php
$pageTitle = 'Update user';
include_once('./includes/head.php');
include_once('./includes/sidebar.php');
include_once('./includes/navbar.php');

?>


<!-- main content -->
<div class="main-content">
    <div class="card">
        <div class="card-body">
            <?php
            $fullname = '';
            $email = '';
            $username = '';
            $id = '';

        if (isset($_POST['id']) == true && empty($_POST['id'])  == false ) {
            $id = $_POST['id'];

            $sql = "SELECT id, fullname, email, username FROM users WHERE id =$id";
            $conn =  getConnection();
            $results =$conn->query($sql);
            if ($results->num_rows == 0){
                echo "<p> User not found!.</p>";
                 return;
            }
            $user = $results->fetch_assoc();
            $fullname = $user['fullname'];
            $email = $user['email'];
            $username = $user['username'];

        } else {
            echo "<p> User ID is required!.</p>";
            return;
        }

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

         $result =   $conn->query("UPDATE users  SET fullname= '$fullname', username = '$username', email = '$email', `password` = '$password' WHERE id = $id");
            if ($result){
               header('location: ./list_users.php');
            }
        }



            ?>
            <form action="./edit-user.php" method="POST">
                <input type="hidden"  value="<?php echo $id ?>" name="id" />
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Full name</label>
                            <input type="text" class="form-control" name="fullname"  value="<?php echo $fullname  ?>"/>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" class="form-control" name="username"  value="<?php echo $username  ?>" />
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email"  value="<?php echo $email  ?>" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password" value=""  />
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