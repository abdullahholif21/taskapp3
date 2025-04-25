<?php 
session_start();

function isLogin(){
    if (isset($_SESSION['id']) == false) {
        return false;
    }

    $userId = $_SESSION['id'];
    return  empty( $userId) == false;
}

function getUserId(){
    if (isset($_SESSION['id']) == false) {
        return 0;
    }   


    return $_SESSION['id'];

}

function logout(){
session_destroy();
header('location: ./login.php');
exit();
}

?>