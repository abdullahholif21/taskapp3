<?php
$pageTitle = 'register task';
include_once('./config/auth.php');

if (isLogin() == false) {
    header('location: ./login.php');
}

include_once('./includes/head.php');
include_once('./includes/sidebar.php');
include_once('./includes/navbar.php');

?>


<!-- main content -->
<div class="main-content">
    <div class="card">
<?php     

if (isset($_POST["btnsave"])){
    $title=$_POST["title"];
    $Desciption=$_POST["Desciption"];
    $status=$_POST["status"];
    $Due_date=$_POST["Due_date"];
if (empty($title)){
    echo "<p class='text-danger' > Fadlan buuix title ka  </p>";
    exit();
}
if (empty($Desciption)){
    echo "<p class='text-danger' > Fadlan buuix Desciption ka  </p>";
    exit();
}
if (empty($status)){
    echo "<p class='text-danger' > Fadlan buuix status ka  </p>";
    exit();
}
if (empty($Due_date)){
    echo "<p class='text-danger' > Fadlan buuix Due_date ka  </p>";
    exit();
}
   
    $sql="INSERT INTO `tasks` ( `title`, `Desciption`, `status`,  `Due_date`) VALUES
( '$title', '$Desciption', '$status',  '$Due_date')";
if (execdb($sql)==true){
    header("location:./list_tasks.php");
}else{
    echo  "cilad ayaa dhacady";
}


}
?>
        <div class="card-body">
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">title</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="enter title" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Desciption">description</label>
                            <input type="text" name="Desciption" id="Desciption" class="form-control" placeholder="enter description" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status">status</label>
                            <select name="status" id="status" required  class="form-control">
                            <option value="">Select status</option>
                                <option value="Pending">Pending</option>
                                <option value="In Proccess">In Proccess</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Due_date">Due_date</label>
                            <input type="date" name="Due_date" id="Due_date" class="form-control" placeholder="enter Due_date" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9"></div>
                    <div class="col-md-3">
                    <button type="submit" name="btnsave" class="btn btn-primary btn-block "  >save</button>

                    </div>

                </div>

               
            </form>
        </div>
    </div>
</div>

<?php
include_once('./includes/footer.php')
?>