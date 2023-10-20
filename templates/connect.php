<?php 

//1. Create Connection
$connect = mysqli_connect('localhost','odichimma','1234','furniture_db');
//2. Check connection

if(!$connect){
    echo 'could not connect' . mysqli_connect_error();
}

?>