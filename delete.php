<?php
include('conn.php');
if(isset ($_GET['StudentID'])){
$Stu_Nm = $_GET['StudentID'];
$sql = 'DELETE FROM student WHERE StudentID=:Stu_Nm';
$statement = $connection->prepare($sql);
$statement->execute([':Stu_Nm' => $Stu_Nm]);
  header("Location: Mng_Student.php");
  
}elseif(isset ($_GET['AdminID'])){
    $AdminID = $_GET['AdminID'];
    $sql = 'DELETE FROM admin WHERE AdminID=:AdminID';
    $statement = $connection->prepare($sql);
    $statement->execute([':AdminID' => $AdminID]);
      header("Location: Mng_Supervisor.php");
    
}else{
    $Pro_ID = $_GET['Pro_ID'];
    $sql = 'DELETE FROM project WHERE Pro_ID=:Pro_ID';
    $statement = $connection->prepare($sql);
    $statement->execute([':Pro_ID' => $Pro_ID]);
    header("Location: Mng_Project.php");
}