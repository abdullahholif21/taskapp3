<?php 
session_start();

function isLogin(){
    if (isset($_SESSION['id']) == false) {
        return false;
    }

    $userId = $_SESSION['id'];
    return  empty( $userId) == false;
}



?>