<?php
$pageTitle = 'edit task';
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
$title = '';
$status = ''; 
$Desciption = '';
$Due_date = '';
$assign_to='';
$id = 0;

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $conn = getConnection();
    $sql = "SELECT * FROM tasks WHERE id='$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($items = $result->fetch_assoc()) {
            $title = $items["title"];
            $status = $items["status"];
            $Desciption = $items["Desciption"];
            $Due_date = $items["Due_date"];
            $assign_to=$items["assign_to"];
        }
    }
}

if (isset($_POST["btnsave"])){
    $title=$_POST["title"];
    $Desciption=$_POST["Desciption"];
    $status=$_POST["status"];
    $Due_date=$_POST["Due_date"];
    $assign_to=$_POST["assign_to"];
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
try{
    $conn=getConnection();
    $sql="UPDATE tasks SET `title` = '$title' , `Desciption` = '$Desciption', `status` = '$status',  `Due_date` = '$Due_date',assign_to=$assign_to  WHERE id='$id'";
// print_r($sql);
// exit();
    if ($conn->query($sql)==true){
    $_SESSION['alertSuccess'] = "task has been updated";
    header("location:./list_tasks.php");
}else{
    $_SESSION['alertFailed']="ERROR!!!: ".$conn->error;
    header("location:./list_tasks.php");
}
} catch(Exception $e){
    $_SESSION['alertFailed']="ERROR".$e->getMessage();
    header("location:./list_tasks.php");
}



}
?>
        <div class="card-body">
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">title</label>
                            <input type="text" value="<?php echo $title  ?>" name="title" id="title" class="form-control" placeholder="enter title" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Desciption">description</label>
                            <input type="text"  value="<?php echo $Desciption  ?>"  name="Desciption" id="Desciption" class="form-control" placeholder="enter description" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-3">
                        <div class="form-group">
                            <label for="assign_to">assign_to</label>
                            <select name="assign_to" id="assign_to" required  class="form-control">
                            <option value="">Select assign_to</option>
                            <?php  
                            $conn=getConnection();
                            $sql="select id,fullname from users";
                            $result=$conn->query($sql);
                            if($result->num_rows){
                                while($row=$result->fetch_assoc()){
                                        ?>
                            <option value="<?php echo  $row["id"] ?>" <?php  echo $assign_to == $row["id"] ? 'Selected' : '';?>><?php echo  $row["fullname"] ?></option>
                        <?php }}
                         ?>        
                        </select>


  
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="status">status</label>
                            <select name="status" id="status" required  class="form-control">
                            <option value="">Select status</option>
                                <option value="Pending" <?php  echo $status == 'Pending' ? 'Selected' : '';?>>Pending</option>
                                <option value="In Proccess" <?php  echo $status == 'In Proccess' ? 'Selected' : '';?>>In Proccess</option>
                                <option value="Completed" <?php  echo $status == 'Completed' ? 'Selected' : '';?>>Completed</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Due_date">Due_date</label>
                            <input type="date"  value="<?php echo $Due_date  ?>"  name="Due_date" id="Due_date" class="form-control" placeholder="enter Due_date" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9"></div>
                    <div class="col-md-3">
                    <button type="submit" name="btnsave" class="btn btn-primary btn-block "  >edit</button>

                    </div>

                </div>

               
            </form>
        </div>
    </div>
</div>

<?php
include_once('./includes/footer.php')
?>