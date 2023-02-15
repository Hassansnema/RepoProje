<!doctype html>
<?php 
    session_start();
if (isset($_SESSION['email']) and $_SESSION['Manger']==true) {
    include('header.php');
    include('conn.php');



    if (isset($_GET['Pro_ID'])) {
        $Pro_ID1= $_GET['Pro_ID'];
        $sql = mysqli_query($conn, " select * from project where Pro_ID='$Pro_ID1' ");
        $user= mysqli_fetch_assoc($sql);




        if (isset($_POST['Pro_ID'])) {
            $Pro_ID=$_POST['Pro_ID'];
            $Pro_Name=$_POST['Pro_Name'];
            $Pro_Sammary=$_POST['Pro_Sammary'];
            $fileName=$_FILES['file']['name'];
            $filee=$_FILES['file']['tmp_name'];
            $position= "folderfile/".$fileName;


            if (empty($_FILES["file"]["name"])) {
                $sql =mysqli_query($conn, "UPDATE project SET  Pro_ID='$Pro_ID', Pro_Name='$Pro_Name' , Pro_Sammary='$Pro_Sammary'  WHERE Pro_ID='$Pro_ID1'");
                header('location:Mng_Project.php');
            } else {
                $file = explode('.', $fileName);
                $fileActual = strtolower(end($file));
                $allowed = array('pdf');
                if (in_array($fileActual, $allowed)) {
                    $sql =mysqli_query($conn, "UPDATE project SET    Pro_ID='$Pro_ID', Pro_Name='$Pro_Name' , Pro_Sammary='$Pro_Sammary' , Pro_NameFile='$fileName' , position='$position'  WHERE Pro_ID='$Pro_ID1'");
                    move_uploaded_file($filee, "folderfile/".$fileName);
                    header('location:Mng_Project.php');
                } else {
                    echo '
         
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">تعديل بيانات المشروع</h5>
            <div class="">
            <button type="button" class="close" onclick="goBack()" data-dismiss="modal" aria-label="">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
          </div>
          <p class="alert alert-danger">  ..أختر ملف من نوع pdf</p>
          <div class="modal-body">
          
        <form class="contact-form "  method="post"  enctype="multipart/form-data">
                
                
                <div class="form-group row">
                <label for="colFormLabel" class="col-sm-3 col-form-label">رقم المشروع</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="Pro_ID" value="'.$user['Pro_ID'].'" >
                  
                </div>
                </div>
                
                <div class="form-group row">
                <label for="colFormLabel" class="col-sm-3 col-form-label">اسم المشروع</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="Pro_Name" value="'.$user['Pro_Name'].'" >
                </div>
                </div>
                
               <div class="form-group row">
                <label for="colFormLabel" class="col-sm-3 col-form-label">ملخص المشروع</label>
                <div class="col-sm-9">
                  <textarea class="form-control" name="Pro_Sammary"  >'.$user["Pro_Sammary"].'</textarea>
                </div>
                </div>
    
    
                <div class="mb-3">
                <p class="text-dark">اختر ملف المشروع</p>
                <input  accept=".pdf," class="form-control" value="'.$user['Pro_NameFile'].'"  name="file" type="file"   id="image" >
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
         
<div class="modal fade" id="edit1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">تعديل بيانات المشروع</h5>
        <div class="">
        <button type="button" class="close "  onclick="goBack()" data-dismiss="modal" aria-label="">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
      </div>
      <div class="modal-body">
      
		<form class="contact-form "  method="post"  enctype="multipart/form-data">
						
						
					  <div class="form-group row">
						<label for="colFormLabel" class="col-sm-3 col-form-label">رقم المشروع</label>
						<div class="col-sm-9">
						  <input type="text" class="form-control" name="Pro_ID" value="'.$user['Pro_ID'].'" >
						  
						</div>
					  </div>
					  
					  <div class="form-group row">
						<label for="colFormLabel" class="col-sm-3 col-form-label">اسم المشروع</label>
						<div class="col-sm-9">
						  <input type="text" class="form-control" name="Pro_Name" value="'.$user['Pro_Name'].'" >
						</div>
					  </div>
					  
					 <div class="form-group row">
						<label for="colFormLabel" class="col-sm-3 col-form-label">ملخص المشروع</label>
						<div class="col-sm-9">
						  <textarea class="form-control" name="Pro_Sammary"  >'.$user["Pro_Sammary"].'</textarea>
						</div>
					  </div>


            <div class="mb-3">
            <p class="text-dark">اختر ملف المشروع</p>
            <input  accept=".pdf," class="form-control" value="'.$user['Pro_NameFile'].'"  name="file" type="file"   id="image" >
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
    <div class="card-header text-center"><h5 class="">أدخل بيانات المشروع</h5> <h6>صفحة المشروع</h6></div>
   
      
        <div class="card-body " style="background-color: #C86216;">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row mb-3">
                        <label for="Pro_ID" class="col-md-4 text-light">رقم المشروع</label>
                        <div class="col-md-6">
                            <input id="Pro_ID" type="text" name="Pro_ID" class="form-control" required autofocus >
                        </div>
                    </div>
            
               
              
                    <div class="row mb-3">
                        <label for="Pro_Name" class="col-md-4 text-light">اسم المشروع</label>
                        <div class="col-md-6">
                            <input id="Pro_Name" type="text" name="Pro_Name" class="form-control" >
                        </div>
                    </div>
                  
                    <div class="mb-3">
                        <label for="Pro_Sammary" class=" text-light mb-3">ملخص المشروع</label>
                        <textarea class="form-control" name="Pro_Sammary" id="Pro_Sammary" rows="3" ></textarea>
                    </div>

                    <div class="mb-3">
                        <p class="text-light">اختر الملف</p>
                        <input accept=".pdf," class="form-control" name="Pro_NameFile" type="file"  id="Pro_NameFile" >
                    </div>
           
           
            <div class="col text-center pb-4">
                <button name="upload" type="submit" class="btn btn-primary">تحميل البيانات</button>
            </div>

        <div class="card ">
        <div class="card card-header  "style="background-color: #3198ad;"><h5>البحث عن المشروع</h5></div>
    <div class="card-body " style="background:#C86216">
    <label class="col alert alert-info form-control">اختر طريقة البحث الخاصة بك</label>

      <div class=" col row pr-5 mr-3 justify-content-center ">
      
      <div class="col pr-5 mr-3  ">

      <select name="search" class="form-control">
       <option selected value="All">الكل</option>
       <option value="Stu_Nm">رقم المشروع</option>
       <option value="Stu_Name">اسم المشروع</option>
      </select>

      </div>
      <div class="col">
        <input  type="text" name="searchdb" class="form-control " placeholder="اكتب للبحث...">
      </div>
      <div class="col">
              <button name="submit" type="submit" class="btn btn-primary">ابحث</button>
      </div> 
      </div>
      <div class=" text-start pt-4"> 
            <a href="Pag_Maneg.php" class="text-light btn btn-primary ">العوده إلي صفحة الإداره</a>
        </div>
    </div>
    
            </form>
      
            <table class="table  mt-3 text-center">
        <tbody>
        <tr class="table-bordered  ">

          <th>رقم المشروع</th>
          <th>اسم المشروع</th>
          <th>ملخص المشروع</th>
          <th>ملف المشروع</th>
          
          <th >العمليات</th>
        </tr>
        </div>
</div>
     <?php
    if (isset($_POST['upload'])) {
        $Pro_ID=$_POST['Pro_ID'];
        $Pro_Name=$_POST['Pro_Name'];
        $Pro_Sammary=$_POST['Pro_Sammary'];

        $fileName=$_FILES['Pro_NameFile']['name'];
        $filee=$_FILES['Pro_NameFile']['tmp_name'];

        $position= "folderfile/".$fileName;

        $file = explode('.', $fileName);
        $fileActual = strtolower(end($file));
        $allowed = array('pdf');
        if (!empty($_FILES['Pro_NameFile']['tmp_name'])) {
            if (in_array($fileActual, $allowed)) {
                $sql = $connection->prepare('INSERT INTO project (Pro_ID , Pro_Name ,Pro_Sammary ,Pro_NameFile,position) 
    VALUES(:Pro_ID , :Pro_Name , :Pro_Sammary , :name,:position)');
                $sql->execute([':Pro_ID' => $Pro_ID ,':Pro_Name' => $Pro_Name ,':Pro_Sammary' => $Pro_Sammary,':name' => $fileName,':position' => $position]);
                move_uploaded_file($filee, "folderfile/".$fileName);
            } else {
                ?><p class="alert alert-danger">  ..أختر ملف من نوع Pdf </p><?php

            }
        }
    }

    if (isset($_POST['submit'])) {
        if ($_POST['search'] == 'All') {
            $Stu_Nm= $_POST['searchdb'] ;
            $StudentName= $_POST['searchdb'] ;
            $SpecialtyName= $_POST['searchdb'] ;
            $Email= $_POST['searchdb'] ;
            $sql =mysqli_query($conn, "SELECT * FROM project where Pro_ID='$Stu_Nm' OR 	Pro_Name='$StudentName'  ");
            while ($per= mysqli_fetch_assoc($sql)) {?>
     <tr>
          <td><?php echo $per['Pro_ID']; ?></td>
          <td><?php echo $per['Pro_Name'];?> </td>
          <td><?php echo $per['Pro_Sammary']; ?></td>
          <td><?php echo $per['Pro_NameFile']; ?></td>

          <td  class="table"> 
                <?php echo "
               <a href='?Pro_ID=$per[Pro_ID]' class='btn btn-info'>تعديل</a>
              <a onclick='return confirm('Are you sure you want to delete this entry?')' href='delete.php?Pro_ID= $per[Pro_ID] ' class='btn btn-danger'>حذف</a>
              ";
                ?>
              </td>    
        </tr>
<?php
            }
        } elseif ($_POST['search'] == 'Stu_Nm') {
            $Stu_Nm= $_POST['searchdb'] ;
            $sql =mysqli_query($conn, "SELECT * FROM project where Pro_ID='$Stu_Nm' ");
            while ($per= mysqli_fetch_array($sql)) {?>
     <tr>
          <td><?php echo $per['Pro_ID']; ?></td>
          <td><?php echo $per['Pro_Name'];?> </td>
          <td><?php echo $per['Pro_Sammary']; ?></td>
          <td><?php echo $per['Pro_NameFile']; ?></td>

          <td  class="table"> 
                <?php echo "
               <a href='?Pro_ID=$per[Pro_ID]' class='btn btn-info'>تعديل</a>
              <a onclick='return confirm('Are you sure you want to delete this entry?')' href='delete.php?Pro_ID= $per[Pro_ID] ' class='btn btn-danger'>حذف</a>
              ";
                ?>
              </td>    
        </tr>
              <?php }
            } elseif ($_POST['search'] == 'Stu_Name') {
                $Stu_Name= $_POST['searchdb'] ;
                $sql =mysqli_query($conn, "SELECT * FROM project where Pro_Name='$Stu_Name' ");
                while ($per= mysqli_fetch_array($sql)) {?>
         <tr>
          <td><?php echo $per['Pro_ID']; ?></td>
          <td><?php echo $per['Pro_Name'];?> </td>
          <td><?php echo $per['Pro_Sammary']; ?></td>
          <td><?php echo $per['Pro_NameFile']; ?></td>

          <td  class="table"> 
                <?php echo "
               <a href='?Pro_ID=$per[Pro_ID]' class='btn btn-info'>تعديل</a>
              <a onclick='return confirm('Are you sure you want to delete this entry?')' href='delete.php?Pro_ID= $per[Pro_ID] ' class='btn btn-danger'>حذف</a>
              ";
                    ?>
              </td>    
        </tr>
              <?php }
                }
    } else {
        $sql =mysqli_query($conn, 'SELECT * FROM project');


        while ($per= mysqli_fetch_assoc($sql)) {?>
     
        <tr>
          <td><?php echo $per['Pro_ID']; ?></td>
          <td><?php echo $per['Pro_Name'];?> </td>
          <td><?php echo $per['Pro_Sammary']; ?></td>
          <td><?php echo '<a href="'.$per['position'].'" download>' .$per["Pro_NameFile"].'<a/> '?> </td>
        
          <td  class="table"> 
                <?php echo "
               <a href='?Pro_ID=$per[Pro_ID]' class='btn btn-info'>تعديل</a>
              <a onclick='return confirm('Are you sure you want to delete this entry?')' href='delete.php?Pro_ID=$per[Pro_ID]' class='btn btn-danger'>حذف</a>
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




<script type="text/javascript">
    $(window).on('load',function(){
        $('#edit1').modal('show');
    });
</script>
<script>
function goBack() {
    window.history.back();
}
</script>
<script>
$('#edit1').modal({
backdrop: 'static',
keyboard: false
})
</script>

</div>
    </div>
    </div>
</div>

    <?php
}else{

  header('location:login.php');
}
?>