<?php
$pageTitle = 'List users';
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
        <div class="card bg-light">
                <div class="card-header">
                        <div class="row">
                                <div class="col-md-10">
                                        <h4 class="card-title">Users</h4>
                                </div>
                                <div class="col-md-2">
                                        <a href="register-user.php" class="btn btn-primary">Register new</a>
                                </div>
                        </div>
                </div>
                <div class="card-body">
                        <?php
                        $conn = getConnection();

                        $result = $conn->query("SELECT * FROM users ");

                        if ($result->num_rows == 0) {
                                echo 'No data found';
                        } else {
                        ?>


                <table class="table table-bordered">
                        <thead>
                                <tr>
                                        <th>ID</th>
                                        <th>Full name</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Actions</th>
                                </tr>
                        </thead>

                        <tbody>
                                <?php  while ($row = $result->fetch_assoc()){ ?>
                                <tr >
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['fullname']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['username']; ?></td>
                                        <td>
                                                <form action="./remove-user.php" method="POST">
                                                <button  type="submit" name="id" value="<?php echo $row['id']; ?>" class="btn btn btn-danger btn-sm">Remoe</button>
                                                </form>

                                                <form action="./edit-user.php" method="POST">
                                                <button  type="submit" name="id" value="<?php echo $row['id']; ?>" class="btn btn btn-warning btn-sm">Edit</button>
                                                </form>
                                        </td>
                                </tr>

                                <?php }?>
                        </tbody>
                </table>










                        <?php
                        }



                        ?>
                </div>
        </div>
</div>

<?php include_once('./includes/footer.php') ?>