<?php
session_start();
if (isset($_SESSION['email']) AND ( $_SESSION['Manger']==true  OR $_SESSION['Manger']==false)) {
    require 'conn.php';
    require 'header.php';
    ?>

<div class="card container">

<div class="card card-header "><h5> أدخل البيانات للبحث عن المشروع</h5></div>
     
   

<form action="" method="POST" enctype="multipart/form-data">

    <div class="card-body " style="background:#C86216">
    <label class="col-md-12 alert alert-info">اختر طريقة البحث الخاصة بك</label>
      <div class="row justify-content-center">
      
      <div class="col-3 dropdown ">

      <select name="search" class="form-select">
       <option class="" selected value="All">الكل</option>
       <option class="" value="StudentId">رقم الطالب</option>
       <option class="" value="StudentName">اسم الطالب</option>
       <option class="" value="AdminName">اسم المشرف</option>
       <option class="" value="Pro_Name">اسم المشروع</option>
       <option class="" value="Ad_Email">البريد الإلكتروني للمشرف</option>
       
      </select>
      </div>
      <div class="col-3 ">
        <input  type="text" name="searchdb" class="form-control" placeholder="اكتب للبحث...">
      </div>
      <div class="col-3">
              <button name="submit" type="submit" class="btn btn-primary">ابحث</button>
      </div> 
      </div>
    </div>
    
            </form>
      <table class="table table-bordered mt-3">
        <tbody>
        <tr>

          
          <th>رقم الطالب</th>
          <th>اسم الطالب</th>
          <th>رقم المشرف</th>
          <th>اسم المشرف</th>
          <th>رقم المشروع</th>
          <th>اسم المشروع</th>
         
        </tr>
      
     
 
<?php
if(isset($_POST['submit'])) {
    if($_POST['search'] == 'All') {
        $StudentId= $_POST['searchdb'] ;
        $Stu_Name= $_POST['searchdb'] ;
        $Ad_Name= $_POST['searchdb'] ;
        $Pro_Sammary= $_POST['searchdb'] ;
        $Ad_Email= $_POST['searchdb'] ;

        $Pro_Name= $_POST['searchdb'] ;


        $sql =$connection->prepare("SELECT * FROM student  inner join admin on admin.AdminID=student.AdminID  inner join project on project.Pro_ID =student.Pro_ID    where StudentID='$StudentId' OR Stu_Name='$Stu_Name' OR Pro_Name ='$Pro_Name' OR Ad_Name='$Ad_Name'OR Pro_Sammary='$Pro_Sammary' OR Ad_Email='$Ad_Email'");
        $sql->execute();
        $sql = $sql->fetchAll(PDO::FETCH_OBJ);
        foreach($sql as $per): ?>
      <tr>
        <td><?= $per->StudentID; ?></td>
        <td><?= $per->Stu_Name; ?></td>
        <td><?= $per->AdminID; ?></td>
        <td><?= $per->Ad_Name; ?></td>
        <td><?= $per->Pro_ID; ?></td>
        <td><?= $per->Pro_Name; ?></td>
       
        <td> <a   href="Viewprojectdetails.php?StudentID=<?= $per->StudentID ?>" class="btn btn-info"> مزيد من التفاصيل</a> </td>
      </tr>
      <?php endforeach;
    } elseif($_POST['search'] == 'StudentId') {
        $StudentId= $_POST['searchdb'] ;

        $sql =$connection->prepare("SELECT * FROM student inner join admin on admin.AdminID=student.AdminID  inner join project on project.Pro_ID =student.Pro_ID    where StudentID='$StudentId'");
        $sql->execute();
        $sql = $sql->fetchAll(PDO::FETCH_OBJ);
        ?>
<?php foreach($sql as $per): ?>
<tr>
<td><?= $per->StudentID; ?></td>
<td><?= $per->Stu_Name; ?></td>
<td><?= $per->AdminID; ?></td>
<td><?= $per->Ad_Name; ?></td>
<td><?= $per->Pro_ID; ?></td>
<td><?= $per->Pro_Name; ?></td>

<td> <a   href="Viewprojectdetails.php?StudentID=<?= $per->StudentID ?>" class="btn btn-info"> مزيد من التفاصيل</a> </td>
</tr>
<?php endforeach;
    } elseif($_POST['search'] == 'StudentName') {
        $Stu_Name= $_POST['searchdb'] ;

        $sql =$connection->prepare("SELECT * FROM student inner join admin on admin.AdminID=student.AdminID  inner join project on project.Pro_ID =student.Pro_ID    where Stu_Name='$Stu_Name'");
        $sql->execute();
        $sql = $sql->fetchAll(PDO::FETCH_OBJ);
        ?>
<?php foreach($sql as $per): ?>
<tr>
<td><?= $per->StudentID; ?></td>
<td><?= $per->Stu_Name; ?></td>
<td><?= $per->AdminID; ?></td>
<td><?= $per->Ad_Name; ?></td>
<td><?= $per->Pro_ID; ?></td>
<td><?= $per->Pro_Name; ?></td>

<td> <a   href="Viewprojectdetails.php?StudentID=<?= $per->StudentID ?>" class="btn btn-info"> مزيد من التفاصيل</a> </td>
</tr>
<?php endforeach;
    } elseif($_POST['search'] == 'AdminName') {
        $Ad_Name= $_POST['searchdb'] ;

        $sql =$connection->prepare("SELECT * FROM student inner join admin on admin.AdminID=student.AdminID  inner join project on project.Pro_ID =student.Pro_ID    where Ad_Name='$Ad_Name'");
        $sql->execute();
        $sql = $sql->fetchAll(PDO::FETCH_OBJ);
        ?>
<?php foreach($sql as $per): ?>
<tr>
<td><?= $per->StudentID; ?></td>
<td><?= $per->Stu_Name; ?></td>
<td><?= $per->AdminID; ?></td>
<td><?= $per->Ad_Name; ?></td>
<td><?= $per->Pro_ID; ?></td>
<td><?= $per->Pro_Name; ?></td>

<td> <a   href="Viewprojectdetails.php?StudentID=<?= $per->StudentID ?>" class="btn btn-info"> مزيد من التفاصيل</a> </td>
</tr>
<?php endforeach;
    } elseif($_POST['search'] == 'Pro_Name') {
        $Pro_Name= $_POST['searchdb'] ;

        $sql =$connection->prepare("SELECT * FROM student inner join admin on admin.AdminID=student.AdminID  inner join project on project.Pro_ID =student.Pro_ID    where Pro_Name='$Pro_Name'");
        $sql->execute();
        $sql = $sql->fetchAll(PDO::FETCH_OBJ);
        ?>
<?php foreach($sql as $per): ?>
<tr>
<td><?= $per->StudentID; ?></td>
<td><?= $per->Stu_Name; ?></td>
<td><?= $per->AdminID; ?></td>
<td><?= $per->Ad_Name; ?></td>
<td><?= $per->Pro_ID; ?></td>
<td><?= $per->Pro_Name; ?></td>

<td> <a   href="Viewprojectdetails.php?StudentID=<?= $per->StudentID ?>" class="btn btn-info"> مزيد من التفاصيل</a> </td>
</tr>
<?php endforeach;
    } elseif($_POST['search'] == 'Ad_Email') {
        $Ad_Email= $_POST['searchdb'] ;

        $sql =$connection->prepare("SELECT * FROM student inner join admin on admin.AdminID=student.AdminID  inner join project on project.Pro_ID =student.Pro_ID    where Ad_Email='$Ad_Email'");
        $sql->execute();
        $sql = $sql->fetchAll(PDO::FETCH_OBJ);
        ?>
<?php foreach($sql as $per): ?>
<tr>
<td><?= $per->StudentID; ?></td>
<td><?= $per->Stu_Name; ?></td>
<td><?= $per->AdminID; ?></td>
<td><?= $per->Ad_Name; ?></td>
<td><?= $per->Pro_ID; ?></td>
<td><?= $per->Pro_Name; ?></td>

<td> <a   href="Viewprojectdetails.php?StudentID=<?= $per->StudentID ?>" class="btn btn-info"> مزيد من التفاصيل</a> </td>
</tr>
<?php endforeach;
    }
}

    ?>
  </tbody>
    </table>
 
  
  

        </div>
<style>
  
#img:hover{
    transition: 0.8s;
    transform: scale(3.9);
    cursor: zoom-in;
}
</style>
<?php }else{

  header('location:login.php');
}?>