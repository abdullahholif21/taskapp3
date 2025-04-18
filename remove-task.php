<?php 
$pageTitle = 'remove task';
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

               <?php 
               if (isset($_GET["id"])){
                $id=$_GET["id"];
                $sql="delete from tasks where id ='$id'";
                $conn=getConnection();
                if($conn->query($sql)==true){
                    header("location:./list_tasks.php");
                }else{
                    echo "cilada ayaa dhacady ";
                }
               }else{
                echo "please you must profide task id ";
               }
               
               
               ?>
        </div>

   <?php 
   include_once('./includes/footer.php')
    ?>