<?php 
session_start();

    include('header.php');
    include('conn.php');

    ?>
<div class="container">

<div class="row justify-content-center">
    <div class="col-md-12">
      
   
      <form method="post"  enctype="multipart/form-data">
    
        <?php if(isset($_GET['StudentID'])) {?>
          <table class="table   table-dark  ">
        <thead>
            <tr class="">
                <th scope="col">رقم الطالب</th>
                <th scope="col">اسم الطالب</th>
                <th scope="col">عنوان الطالب</th>
                <th scope="col">تخصص الطالب</th> 
                <th scope="col">بريد الطالب</th>
                <th scope="col">صورة الطالب</th>
                <th scope="col">رقم المشرف</th>
                <th scope="col">اسم المشرف</th>
                <th scope="col">عنوان المشرف</th>
                <th scope="col">بريد المشرف</th>
                <th scope="col">رقم هاتف المشرف</th>

            </tr>


           
<?php

    $id= $_GET['StudentID'];
    $sql =$connection->prepare("SELECT * FROM student  inner join admin on admin.AdminID=student.AdminID  inner join project on project.Pro_ID =student.Pro_ID  where StudentID ='$id'");
    $sql->execute();
    $sql = $sql->fetchAll(PDO::FETCH_OBJ);
    ;
    ?>
<?php foreach($sql as $per): ?>
    <tr class="table-light text-primary">
        <td><?= $per->StudentID; ?></td>
        <td><?= $per->Stu_Name; ?></td>
        <td><?= $per->Stu_Address; ?></td>
        <td><?= $per->Stu_Major; ?></td>
        <td><?= $per->Stu_Email; ?></td>
        <td><?="<img id='img' src='صورالطالب/".$per->Stu_Pictuer."'' width='50px'  class='rounded' >";?> </td>
        <td><?= $per->AdminID; ?></td>
        <td><?= $per->Ad_Name; ?></td>
        <td><?= $per->Ad_Address; ?></td>
        <td><?= $per->Ad_Email; ?></td>
        <td><?= $per->Ad_phone; ?></td>
      

           </thead>
    </table>
   
    <?php endforeach;

    ?>
     
     <table class="table   table-dark  ">
            <thead>
            <tr class="">
                <th scope="col">المؤهل العلمي للمشرف</th>
                <th scope="col">صورة المشرف</th>
                <th scope="col">رقم المشروع</th>
                <th scope="col">اسم المشروع</th>
                <th scope="col">ملخص المشروع</th>
                <th scope="col">تحميل ملف المشروع</th>
            </tr>
    
 <?php  foreach($sql as $per): ?>
    <tr class="table-light text-primary">
        <td><?= $per->Ad_Qualification; ?></td>
        <td><?="<img id='img' src='صورالمشرف/".$per->Ad_Picture."'' width='50px'  class='rounded' >";?> </td>
        <td><?= $per->Pro_ID; ?></td>
        <td><?= $per->Pro_Name; ?></td>
        <td><?= $per->Pro_Sammary; ?></td>
        <td> <div class="btn btn-primary"> <div class="badge badge-light"><h6><a href="<?=$per->position?>"  download ><<<"download">>></a></h6></div></div></td>
    </tr>

 <?php endforeach;
}?>
            </form>
    
          </div>

        </div>
  
      </div>
   
 



<style>
  
#img:hover{
    transition: 0.8s;
    transform: scale(3.9);
    cursor: zoom-in;
}
</style>