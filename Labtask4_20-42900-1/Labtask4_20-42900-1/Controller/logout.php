<?php
session_start();
if (isset($_SESSION['user'])){
    session_destroy();
    header("location: ../View/login.php");
}
 else{
 header("location: ../View/login.php");
}
?>