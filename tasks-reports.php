<?php  
 include_once ("./config/auth.php");
  if (islogin()==false){
        header("location:./login.php");
  }
  $pageTitle="List reports";

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
                                task reports
                        </h4>
                </div>
                <div class="col-md-2">
                        <a href="regiser-task.php" class="btn btn-primary"> Register tasks</a>
                </div>
              </div>
        </div>
        <div class="card-body">
                <?php getAlert();?>
                <form action="" method="post">
<div class="row">
<div class="col-md-2">
                        <div class="form-group">
                            <label for="title">title</label>
                            <input type="text" value="" name="title" id="title" class="form-control" placeholder="enter title" >
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="status">status</label>
                            <select name="status" id="status"   class="form-control">
                            <option value="">Select status</option>
                                <option value="Pending" >Pending</option>
                                <option value="In Proccess" >In Proccess</option>
                                <option value="Completed" >Completed</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="start_Date">Start Date</label>
                            <input type="date" value="" name="start_Date" id="start_Date" class="form-control" placeholder="enter start_Date" >
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="end_Date">end Date</label>
                            <input type="date" value="" name="end_Date" id="end_Date" class="form-control" placeholder="enter end_Date" >
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                      <button type="submit" class="btn btn-primary"> Search</button>       
                    
                    </div>
                    </div>

                    </form>
</div>
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
                $sql="SELECT t.id,t.title,t.desciption Desciption,t.status,t.created_att,t.due_date Due_date,
t.userid,u.fullname username,
case 
when  DATEDIFF(t.due_date,SYSDATE())=0 then 'today'
when DATEDIFF(t.due_date,SYSDATE())=1 then 'tommorow'
when DATEDIFF(t.due_date,SYSDATE())>=0 then datediff(t.due_date,SYSDATE())
else 'OverDue' end  remainingDays
,uu.fullname assign_to
FROM `tasks` t 
left join users u on t.userid=u.id
LEFT JOIN users uu ON t.assign_to=uu.id where t.id like '%'";

if(isset($_POST["title"])){
    $title=$_POST["title"];
    $sql.=" and t.title like '$title%'";
}

if(isset($_POST["status"])){
    $status=$_POST["status"];
    $sql.=" and t.status like '$status%'";
}

if(isset($_POST["end_Date"])  && !empty($_POST["end_Date"])==true){
    $start_Date=$_POST["start_Date"];
    $end_Date=$_POST["end_Date"];
    $sql.=" and t.due_date between '$start_Date' and  '$end_Date'";
}
// print_r($sql);

// exit();

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