<?php
function  getAlert(){
if (isset($_SESSION['alertSuccess'])){
    echo "<div class='alert alert-success'>".$_SESSION['alertSuccess']."</div>";
    unset($_SESSION['alertSuccess']);
}elseif (isset($_SESSION['alertFailed'])){
    echo "<div class='alert alert-danger'>".$_SESSION['alertFailed']."</div>";
    unset($_SESSION['alertFailed']);
}
}



?>