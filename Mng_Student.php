<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
 
<?php
 session_start();
if (isset($_SESSION['email']) and $_SESSION['Manger']==true) {
   
    include('header.php');
    include('conn.php');
    ?>
  <body>	
  <?php

if (isset($_GET['StudentID'])) {
    $StudentID = $_GET['StudentID'];
    $sql = mysqli_query($conn, " select * from student where StudentID = '$StudentID' ");
    $user= mysqli_fetch_assoc($sql);




    if (isset($_POST['Stu_Name']) && isset($_POST['StudentID']) && isset($_POST['Stu_Address']) && isset($_POST['Stu_Major']) && isset($_POST['Stu_Email'])&&isset($_FILES['imagef']['tmp_name'])) {
        $imageName=$_FILES['imagef']['name'];
        $image=$_FILES['imagef']['tmp_name'];
        move_uploaded_file($image, "صورالطالب/".$imageName);
        $Stu_Nm=$_POST['StudentID'];
        $Stu_Name=$_POST['Stu_Name'];
        $Address=$_POST['Stu_Address'];
        $SpecialtyName=$_POST['Stu_Major'];
        $Email=$_POST['Stu_Email'];
        $AdminID=$_POST['AdminID'];
        $Pro_ID=$_POST['Pro_ID'];

        if (empty($_FILES["imagef"]["name"])) {
            $sql =mysqli_query($conn, "UPDATE student SET   Stu_Name='$Stu_Name', StudentID='$Stu_Nm' , Stu_Address='$Address' , Stu_Major='$SpecialtyName' , Stu_Email='$Email', Pro_ID='$Pro_ID', AdminID='$AdminID'  WHERE StudentID='$StudentID'");
            header('location:Mng_Student.php');
        } else {
            $file = explode('.', $imageName);
            $fileActual = strtolower(end($file));
            $allowed = array('png','jpg','jpge','svg');
            if (in_array($fileActual, $allowed)) {
                $sql =mysqli_query($conn, "UPDATE student SET Stu_Pictuer='$imageName', Stu_Name='$Stu_Name', StudentID='$Stu_Nm' , Stu_Address='$Address' , Stu_Major='$SpecialtyName' , Stu_Email='$Email' , Pro_ID='$Pro_ID', AdminID='$AdminID'  WHERE StudentID='$StudentID'");

                header('location:Mng_Student.php');
            } else {
                echo '
         
      <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">تعديل بيانات الطالب</h5>
              <div class="">
              <button type="button" class="close "  onclick="goBack()" data-dismiss="modal" aria-label="">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
            </div>
            <p class="alert alert-danger">  ..أختر ملف من نوع صورة </p>
            <div class="modal-body">
            
          <form class="contact-form "  method="post"  enctype="multipart/form-data">
                  
                  
                  <div class="form-group row">
                  <label for="colFormLabel" class="col-sm-3 col-form-label">رقم الطالب</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="StudentID" value="'.$user['StudentID'].'" >
                    
                  </div>
                  </div>
                  
                  <div class="form-group row">
                  <label for="colFormLabel" class="col-sm-3 col-form-label">اسم الطالب</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="Stu_Name" value="'.$user['Stu_Name'].'" >
                  </div>
                  </div>
                  
                  
                  <div class="form-group row">
                  <label for="colFormLabel" class="col-sm-3 col-form-label">مكان السكن</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="Stu_Address" value="'.$user['Stu_Address'].'" >
                  </div>
                  </div>
                  
                  <div class="form-group row">
                  <label for="colFormLabel" class="col-sm-3 col-form-label">اسم التخصص</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="Stu_Major" value="'.$user['Stu_Major'].'" >
                  </div>
                  </div>
                  
                  <div class="form-group row">
                  <label for="colFormLabel" class="col-sm-3 col-form-label">البريد الخاص بالطالب</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" name="Stu_Email" value="'.$user['Stu_Email'].'" >
                  </div>
                  </div>
               
                  <div class="form-group row">
                  <label for="colFormLabel" class="col-sm-3 col-form-label">رقم مشروع الطالب </label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="Pro_ID" value="'.$user['Pro_ID'].'" >
                    
                  </div>
                  </div>
      
      
                  <div class="form-group row">
                  <label for="colFormLabel" class="col-sm-3 col-form-label">رقم مشرف الطالب</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="AdminID" value="'.$user['AdminID'].'" >
                    
                  </div>
                  </div>
      
      
                  <div class="mb-3">
                  <p class="text-dark">اختر صورة الطالب</p>
                  <input accept="image/*" class="form-control" value="'.$user['Stu_Pictuer'].'"  name="imagef" type="file"  id="image" >
              </div>
      
                  
             <div id="product_ar_edit_result" class="text-center col-md-12" style="margin:10px 0;"></div>
              <button type="button" onclick="goBack()" class="btn btn-danger" data-dismiss="modal">رجوع</button>
           
              <button type="submit" name="menu_ar_edit" class="btn btn-success"> حفظ  </button>
            </form>
      
            </div>
          </div>
        </div>
      </div>				
          ';
            }
        }
    }
    echo '
         
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">تعديل بيانات الطالب</h5>
        <div class="">
        <button type="button" class="close "  onclick="goBack()" data-dismiss="modal" aria-label="">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
      </div>
      <div class="modal-body">
      
		<form class="contact-form "  method="post"  enctype="multipart/form-data">
						
						
					  <div class="form-group row">
						<label for="colFormLabel" class="col-sm-3 col-form-label">رقم الطالب</label>
						<div class="col-sm-9">
						  <input type="text" class="form-control" name="StudentID" value="'.$user['StudentID'].'" >
						  
						</div>
					  </div>
					  
					  <div class="form-group row">
						<label for="colFormLabel" class="col-sm-3 col-form-label">اسم الطالب</label>
						<div class="col-sm-9">
						  <input type="text" class="form-control" name="Stu_Name" value="'.$user['Stu_Name'].'" >
						</div>
					  </div>
					  
					  
					  <div class="form-group row">
						<label for="colFormLabel" class="col-sm-3 col-form-label">مكان السكن</label>
						<div class="col-sm-9">
						  <input type="text" class="form-control" name="Stu_Address" value="'.$user['Stu_Address'].'" >
						</div>
					  </div>
					  
					  <div class="form-group row">
						<label for="colFormLabel" class="col-sm-3 col-form-label">اسم التخصص</label>
						<div class="col-sm-9">
						  <input type="text" class="form-control" name="Stu_Major" value="'.$user['Stu_Major'].'" >
						</div>
					  </div>
					  
					  <div class="form-group row">
						<label for="colFormLabel" class="col-sm-3 col-form-label">البريد الخاص بالطالب</label>
						<div class="col-sm-9">
						  <input type="email" class="form-control" name="Stu_Email" value="'.$user['Stu_Email'].'" >
						</div>
					  </div>
         
            <div class="form-group row">
						<label for="colFormLabel" class="col-sm-3 col-form-label">رقم مشروع الطالب </label>
						<div class="col-sm-9">
						  <input type="text" class="form-control" name="Pro_ID" value="'.$user['Pro_ID'].'" >
						  
						</div>
					  </div>


            <div class="form-group row">
						<label for="colFormLabel" class="col-sm-3 col-form-label">رقم مشرف الطالب</label>
						<div class="col-sm-9">
						  <input type="text" class="form-control" name="AdminID" value="'.$user['AdminID'].'" >
						  
						</div>
					  </div>


            <div class="mb-3">
            <p class="text-dark">اختر صورة الطالب</p>
            <input accept="image/*" class="form-control" value="'.$user['Stu_Pictuer'].'"  name="imagef" type="file"  id="image" >
        </div>

					  
		   <div id="product_ar_edit_result" class="text-center col-md-12" style="margin:10px 0;"></div>
        <button type="button" onclick="goBack()" class="btn btn-danger" data-dismiss="modal">رجوع</button>
		 
        <button type="submit" name="menu_ar_edit" class="btn btn-success"> حفظ  </button>
		  </form>

      </div>
    </div>
  </div>
</div>				
		';
}

    ?>

 
<div class="container"></div>
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
    <div class="card-header text-center"><h5 class="">أدخل بيانات الطالب</h5> <h6>صفحة إدارة الطلاب</h6></div>
    
      
        <div class="card-body " style="background-color: #C86216;">
            <form  method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row mb-3">
                        <label for="Stu_Nm" class="col-md-4 text-light">رقم الطالب</label>
                        <div class="col-md-6">
                            <input id="Stu_Nm" type="text" name="Stu_Nm" class="form-control" autofocus required >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="StudentName" class="col-md-4 text-light">اسم الطالب</label>
                        <div class="col-md-6">
                            <input id="StudentName" type="text" name="StudentName" class="form-control " >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="Address" class="col-md-4 text-light">مكان السكن</label>
                        <div class="col-md-6">
                            <input id="Address" type="text" name="Address" class="form-control" >
                        </div>
                    </div>
                             <div class="row mb-3">
                        <label for="SpecialtyName" class="col-md-4 text-light">اسم التخصص</label>
                        <div class="col-md-6">
                            <input id="SpecialtyName" type="text" name="SpecialtyName" class="form-control" >
                        </div>
                    </div>
                    <div class="row mb-3">
                    <label for="Email" class="col-md-4 col-form-label text-md-end text-light" >البريد الخاص بالطالب</label>

                    <div class="col-md-6">
                        <input id="Email"  type="Email" name="Email" class="form-control" >
                    </div>
                </div>
                <div class="row mb-3">
                        <label for="Pro_ID " class="col-md-4 text-light">رقم مشروع الطالب </label>
                        <div class="col-md-6">
                            <input id="Pro_ID " type="text" name="Pro_ID" class="form-control" >
                        </div>
                    </div>         <div class="row mb-3">
                        <label for="AdminID " class="col-md-4 text-light">رقم مشرف الطالب</label>
                        <div class="col-md-6">
                            <input id="AdminID " type="text" name="AdminID" class="form-control" >
                        </div>
                    </div>

                    </div>
                    <div class="mb-3">
                        <p class="text-light">اختر صورة الطالب</p>
                        <input accept="image/*" class="form-control" name="image" type="file"  id="image" >
                    </div>
           
            
            <div class="col text-center">
                <button name="upload" type="submit" class="btn btn-primary">تحميل البيانات</button>
            </div>
            <div class="container pt-4">
         <div class="card ">
        <div class="card card-header "><h5>البحث عن الطلاب</h5></div>
     
   



    <div class="card-body " style="background:#C86216">
    <label class="col alert alert-info form-control">اختر طريقة البحث الخاصة بك</label>

      <div class=" col row pr-5 mr-3 justify-content-center ">
      
      <div class="col pr-5 mr-3  ">

      <select name="search" class="form-control">
       <option selected value="All">الكل</option>
       <option value="Stu_Nm">رقم الطالب</option>
       <option value="Stu_Name">اسم الطالب</option>
       <option value="SpecialtyName">اسم التخصص</option>
       <option value="Email">البريد الإلكتروني</option>
      </select>

      </div>
      <div class="col">
        <input  type="text" name="searchdb" class="form-control " placeholder="اكتب للبحث...">
      </div>
      <div class="col">
              <button name="submit" type="submit" class="btn btn-primary">ابحث</button>
      </div> 
      </div>
      <div class=" text-left pt-4"> 
            <a href="Pag_Maneg.php" class="text-light btn btn-primary ">العوده إلي صفحة الإداره</a>
        </div>
    </div>
    
            </form>
         
      <table class="table  mt-3 text-center">
        <tbody>
        <tr class="table-bordered  ">

          <th>رقم الطالب</th>
          <th>اسم الطالب</th>
          <th> مكان السكن</th>
          <th>اسم التخصص</th>
          <th> البريد الإلكتروني</th>
          <th>رقم المشرف</th>
          <th> رقم المشروع</th>
          
          <th>الصورة</th>
          <th >العمليات</th>
        </tr>
        </div>
</div>


<?php


    if (isset($_POST['upload'])) {
        $Stu_Nm=$_POST['Stu_Nm'];
        $Stu_Name=$_POST['StudentName'];
        $Address=$_POST['Address'];
        $SpecialtyName=$_POST['SpecialtyName'];
        $Email=$_POST['Email'];
        $AdminID =$_POST['AdminID'];
        $Pro_ID =$_POST['Pro_ID'];




        $imageName=$_FILES['image']['name'];
        $image=$_FILES['image']['tmp_name'];

        $file = explode('.', $imageName);
        $fileActual = strtolower(end($file));
        $allowed = array('png','jpg','jpge','svg');

        if (!empty($_FILES['image']['tmp_name'])) {
            if (in_array($fileActual, $allowed)) {
                $sql = $connection->prepare('INSERT INTO student (StudentID  , Stu_Name,Stu_Address,Stu_Major ,Stu_Email,AdminID ,Pro_ID ,Stu_Pictuer ) 
                      VALUES(:Stu_Nm ,:StudentName ,:Address ,:SpecialtyName  ,:Email,:AdminID,:Pro_ID ,:name)');

                $sql->execute([':Stu_Nm' => $Stu_Nm ,':StudentName' => $Stu_Name ,':Address' => $Address ,':SpecialtyName' => $SpecialtyName  ,':Email' => $Email,':AdminID' => $AdminID,':Pro_ID' => $Pro_ID ,':name' => $imageName ]);
                move_uploaded_file($image, "صورالطالب/".$imageName);
            } else {
                ?><p class="alert alert-danger">  ..أختر ملف من نوع صورة </p><?php
            }
        } else {
            $sql = $connection->prepare('INSERT INTO student (StudentID  , Stu_Name,Stu_Address,Stu_Major ,Stu_Email,AdminID ,Pro_ID  ) 
  VALUES(:Stu_Nm ,:StudentName ,:Address ,:SpecialtyName  ,:Email,:AdminID,:Pro_ID )');

            $sql->execute([':Stu_Nm' => $Stu_Nm ,':StudentName' => $Stu_Name ,':Address' => $Address ,':SpecialtyName' => $SpecialtyName  ,':Email' => $Email,':AdminID' => $AdminID,':Pro_ID' => $Pro_ID ]);
        }
    }

    if (isset($_POST['submit'])) {
        if ($_POST['search'] == 'All') {
            $Stu_Nm= $_POST['searchdb'] ;
            $StudentName= $_POST['searchdb'] ;
            $SpecialtyName= $_POST['searchdb'] ;
            $Email= $_POST['searchdb'] ;
            $sql =mysqli_query($conn, "SELECT * FROM student where StudentID='$Stu_Nm' OR 	Stu_Name='$StudentName' OR  Stu_Major='$SpecialtyName' OR Stu_Email='$Email' ");
            while ($per= mysqli_fetch_assoc($sql)) {?>
     <tr>
          <td><?php echo $per['StudentID']; ?></td>
          <td><?php echo $per['Stu_Name'];?> </td>
          <td><?php echo $per['Stu_Address']; ?></td>
          <td><?php echo $per['Stu_Major']; ?></td>
          <td><?php echo $per['Stu_Email']; ?></td>
          <td><?php echo $per['AdminID']; ?></td>
          <td><?php echo $per['Pro_ID']; ?></td>
          <td><?php echo "<img id='img' src='صورالطالب/".$per['Stu_Pictuer']."'' width='50px'  class='rounded' >";?> </td>
          
          <td  class="table"> 
                <?php echo "
               <a href='?StudentID=$per[StudentID]' class='btn btn-info'>تعديل</a>
              <a onclick='return confirm('Are you sure you want to delete this entry?')' href='delete.php?StudentID= $per[StudentID] ' class='btn btn-danger'>حذف</a>
              ";
                ?>
              </td>
               
        </tr>
<?php
            }
        } elseif ($_POST['search'] == 'Stu_Nm') {
            $Stu_Nm= $_POST['searchdb'] ;
            $sql =mysqli_query($conn, "SELECT * FROM student where StudentID='$Stu_Nm' ");
            while ($per= mysqli_fetch_array($sql)) {?>
     <tr>
          <td><?php echo $per['StudentID']; ?></td>
          <td><?php echo $per['Stu_Name'];?> </td>
          <td><?php echo $per['Stu_Address']; ?></td>
          <td><?php echo $per['Stu_Major']; ?></td>
          <td><?php echo $per['Stu_Email']; ?></td>
          <td><?php echo $per['AdminID']; ?></td>
          <td><?php echo $per['Pro_ID']; ?></td>
          <td><?php echo "<img id='img' src='صورالطالب/".$per['Stu_Pictuer']."'' width='50px'  class='rounded' >";?> </td>
          
          <td  class="table"> 
                <?php echo "
               <a href='?StudentID=$per[StudentID]' class='btn btn-info'>تعديل</a>
              <a onclick='return confirm('Are you sure you want to delete this entry?')' href='delete.php?StudentID= $per[StudentID] ' class='btn btn-danger'>حذف</a>
              ";
                ?>
              </td>
               
        </tr>
              <?php }
            } elseif ($_POST['search'] == 'Stu_Name') {
                $Stu_Name= $_POST['searchdb'] ;
                $sql =mysqli_query($conn, "SELECT * FROM student where Stu_Name='$Stu_Name' ");
                while ($per= mysqli_fetch_array($sql)) {?>
     <tr>
          <td><?php echo $per['StudentID']; ?></td>
          <td><?php echo $per['Stu_Name'];?> </td>
          <td><?php echo $per['Stu_Address']; ?></td>
          <td><?php echo $per['Stu_Major']; ?></td>
          <td><?php echo $per['Stu_Email']; ?></td>
          <td><?php echo $per['AdminID']; ?></td>
          <td><?php echo $per['Pro_ID']; ?></td>
          <td><?php echo "<img id='img' src='صورالطالب/".$per['Stu_Pictuer']."'' width='50px'  class='rounded' >";?> </td>
          
          <td  class="table"> 
                <?php echo "
               <a href='?StudentID=$per[StudentID]' class='btn btn-info'>تعديل</a>
              <a onclick='return confirm('Are you sure you want to delete this entry?')' href='delete.php?StudentID= $per[StudentID] ' class='btn btn-danger'>حذف</a>
              ";
                    ?>
              </td>
               
        </tr>
              <?php }
                } elseif ($_POST['search'] == 'SpecialtyName') {
                    $SpecialtyName= $_POST['searchdb'] ;
                    $sql =mysqli_query($conn, "SELECT * FROM student where Stu_Major='$SpecialtyName' ");
                    while ($per= mysqli_fetch_array($sql)) {?>
       <tr>
          <td><?php echo $per['StudentID']; ?></td>
          <td><?php echo $per['Stu_Name'];?> </td>
          <td><?php echo $per['Stu_Address']; ?></td>
          <td><?php echo $per['Stu_Major']; ?></td>
          <td><?php echo $per['Stu_Email']; ?></td>
          <td><?php echo $per['AdminID']; ?></td>
          <td><?php echo $per['Pro_ID']; ?></td>
          <td><?php echo "<img id='img' src='صورالطالب/".$per['Stu_Pictuer']."'' width='50px'  class='rounded' >";?> </td>
          
          <td  class="table"> 
                <?php echo "
               <a href='?StudentID=$per[StudentID]' class='btn btn-info'>تعديل</a>
              <a onclick='return confirm('Are you sure you want to delete this entry?')' href='delete.php?StudentID= $per[StudentID] ' class='btn btn-danger'>حذف</a>
              ";
                        ?>
              </td>
               
        </tr>
              <?php }
                    } elseif ($_POST['search'] == 'Email') {
                        $Email= $_POST['searchdb'] ;
                        $sql =mysqli_query($conn, "SELECT * FROM student where Stu_Email='$Email' ");
                        while ($per= mysqli_fetch_array($sql)) {?>
     <tr>
          <td><?php echo $per['StudentID']; ?></td>
          <td><?php echo $per['Stu_Name'];?> </td>
          <td><?php echo $per['Stu_Address']; ?></td>
          <td><?php echo $per['Stu_Major']; ?></td>
          <td><?php echo $per['Stu_Email']; ?></td>
          <td><?php echo $per['AdminID']; ?></td>
          <td><?php echo $per['Pro_ID']; ?></td>
          <td><?php echo "<img id='img' src='صورالطالب/".$per['Stu_Pictuer']."'' width='50px'  class='rounded' >";?> </td>
          
          <td  class="table"> 
                <?php echo "
               <a href='?StudentID=$per[StudentID]' class='btn btn-info'>تعديل</a>
              <a onclick='return confirm('Are you sure you want to delete this entry?')' href='delete.php?StudentID= $per[StudentID] ' class='btn btn-danger'>حذف</a>
              ";
                            ?>
              </td>
               
        </tr>
              <?php }
                        }
    } else {
        $sql =mysqli_query($conn, 'SELECT * FROM student');
        while ($per= mysqli_fetch_assoc($sql)) {?>
     
        <tr>
          <td><?php echo $per['StudentID']; ?></td>
          <td><?php echo $per['Stu_Name'];?> </td>
          <td><?php echo $per['Stu_Address']; ?></td>
          <td><?php echo $per['Stu_Major']; ?></td>
          <td><?php echo $per['Stu_Email']; ?></td>
          <td><?php echo $per['AdminID']; ?></td>
          <td><?php echo $per['Pro_ID']; ?></td>
          <td><?php echo "<img id='img' src='صورالطالب/".$per['Stu_Pictuer']."'' width='50px'  class='rounded' >";?> </td>
          
          <td  class="table"> 
                <?php echo "
               <a href='?StudentID=$per[StudentID]' class='btn btn-info'>تعديل</a>
              <a onclick='return confirm('Are you sure you want to delete this entry?')' href='delete.php?StudentID= $per[StudentID] ' class='btn btn-danger'>حذف</a>
              ";
            ?>
              </td>
               
        </tr>
      <?php }
        }?> 

</tbody>
     </table>
   
    </div>

</div>
<script type="text/javascript">
    $(window).on('load',function(){
        $('#edit').modal('show');
    });
</script>
	
	
<script>
function goBack() {
  window.history.back();
}
</script>


<script>
$('#edit').modal({
backdrop: 'static',
keyboard: false
})
</script>

  
</body>
</html>
<?php }else{

header('location:login.php');
}
?>