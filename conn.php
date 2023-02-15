<?php
$username = 'root';
$password = '';
$connection = new PDO("mysql:host=localhost;dbname=ssd;", $username, $password);


$conn = mysqli_connect('localhost','root','','ssd');
if(!$conn){
    echo 'Error';
}else{
   # echo 'Connecting to project';
}


?>