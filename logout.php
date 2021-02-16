<?php
session_start();
if(isset($_SESSION['logged_in'])){
    session_destroy();
    header('location:index.php');
    die();
}
?>