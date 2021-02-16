<?php

// information database 
$server = "localhost"; 
$username = "root";
$password = ""; 
$dbname = "library"; 

// create connect 
$conn = new mysqli($server,$username,$password,$dbname);

// utf-8 
$conn->set_charset("utf8");

// check connection 
if($conn->connect_error){
    die("فشل الاتصال بقواعد البيانات"); 
}


?> 