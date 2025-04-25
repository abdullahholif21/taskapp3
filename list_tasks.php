<?php  
 include_once ("./config/auth.php");
  if (islogin()==false){
        header("location:./login.php");
  }
  $pageTitle="List tasks";

  include_once("./includes/head.php");
  include_once("./includes/sidebar.php");
  include_once("./includes/navbar.php");
include_once('./config/functions.php');
 ?>

 <div class="main-content">
<div class="card">
        <div class="card-header">
              <div class="row">
                <div class="col-md-10">
                        <h4 class="card-title">
                                task list
                        </h4>
                </div>
                <div class="col-md-2">
                        <a href="regiser-task.php" class="btn btn-primary"> Register tasks</a>
                </div>
              </div>
        </div>
        <div class="card-body">
                <?php getAlert();?>

         <table class="table table-bordered table-hover table-sm">
                <thead>
                  <tr>
                  
                        <th>id</th>
                        <th>title</th>
                        <th>Desciption</th>
                        <th>status</th>
                        <th>Due_date</th>
                        <th>Days</th>
                        <th>assing_to</th>
                        <th>actions</th>
                  </tr>
                </thead>
                <tbody>
                <?php   
                $conn=getConnection();
                $sql="CALL task_list()";
                $result=$conn->query($sql);
                if ($result->num_rows>0){
                        while($items=$result->fetch_assoc()){
                ?>
                <tr>
                  
                  <td><?php   echo $items["id"]   ?></td>
                  <td><?php   echo $items["title"]   ?></td>
                  <td><?php   echo $items["Desciption"]   ?></td>
                  <td><?php   echo $items["status"]   ?></td>
                  <td><?php   echo $items["Due_date"]   ?></td>
                  <td><?php   echo $items["remainingDays"]   ?></td>
                  <td><?php   echo $items["assign_to"]   ?></td>
                  <td><a href="edit-task.php?id=<?php echo $items['id']; ?>" class="btn btn-primary btn-sm">edit</a> 
                       <a onclick="return confirm('ma hubta in task la dlete gareeyo')"    href="remove-task.php?id=<?php   echo $items["id"]   ?>" class="btn btn-danger  btn-sm">delete</a>
                </td>
            </tr>
            <?php  }} ?>

                </tbody>
         </table>
        </div>
</div>
</div>

 <?php  include_once("./includes/footer.php") ?>