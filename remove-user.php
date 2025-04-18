<?php 
$pageTitle = 'Remove user';
include_once('./config/auth.php');

if (isLogin() == false){
        header('location: ./login.php');
}

include_once('./includes/head.php');
include_once('./includes/sidebar.php');
include_once('./includes/navbar.php');
include_once ('./config/db.php');


?>


        <!-- main content -->
        <div class="main-content">
            <?php 
            if (isset($_POST['id']) == false ||  empty($_POST['id']) == true){
                echo '<p class="delete-error"> User ID is required!.</p>';
                return ;
            }

            $conn = getConnection();
            $id = $_POST['id'];

            $sql = "SELECT id, fullname FROM users WHERE id = $id";
            $results = $conn->query($sql);
            if ($results->num_rows == 0){
                echo "<p class='delete-error'> User ID: $id  not found.</p>";
                return;
            }

            $user = $results->fetch_assoc();

            $sql = "DELETE FROM users WHERE id = $id;";

            if ($conn->query($sql)){
                $fullname = $user['fullname'];
                echo "<p class='delete-success'> User ID: $id name: $fullname has been deleted.</p>";

            } else {
                echo "<p class='delete-error'> User ID: $id  is not  deleted.</p>";
            }

            ?>
         
        </div>

   <?php include_once('./includes/footer.php') ?>