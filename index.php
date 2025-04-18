<?php 
$pageTitle = 'Home page';
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

                <h1>Welcome dashboard</h1>
        </div>

   <?php 
   include_once('./includes/footer.php')
    ?>