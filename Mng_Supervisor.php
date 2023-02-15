<!doctype html>
<?php
  session_start();
if (isset($_SESSION['email']) and $_SESSION['Manger']==true) {
    include('header.php');
    include('conn.php');
    ?>
  <body>	
  <?php



if (isset($_GET['AdminID'])) {
    $id = $_GET['AdminID'];
    $sql = mysqli_query($conn, " select * from admin where AdminID = '$id' ");
    $user= mysqli_fetch_assoc($sql);



    if (isset($_POST['AdminID'])) {
        $AdminID=$_POST['AdminID'];
        $Ad_Name=$_POST['Ad_Name'];
        $Ad_Address=$_POST['Ad_Address'];
        $Ad_Email=$_POST['Ad_Email'];
        $Ad_phone=$_POST['Ad_phone'];
        $Ad_Qualification=$_POST['Ad_Qualification'];

        $imageName=$_FILES['imagef']['name'];
        $image=$_FILES['imagef']['tmp_name'];



        if (empty($_FILES["imagef"]["name"])) {
            $sql =mysqli_query($conn, "UPDATE admin SET  AdminID='$AdminID', Ad_Name='$Ad_Name' , Ad_Address='$Ad_Address' , Ad_Email='$Ad_Email' , Ad_phone='$Ad_phone'  WHERE AdminID='$id'");
            header('location:Mng_Supervisor.php');
        } else {
            $file = explode('.', $imageName);
            $fileActual = strtolower(end($file));
            $allowed = array('png','jpg','jpge','svg');
            if (in_array($fileActual, $allowed)) {
                $sql =mysqli_query($conn, "UPDATE admin SET   AdminID='$AdminID', Ad_Name='$Ad_Name' , Ad_Address='$Ad_Address' , Ad_Email='$Ad_Email' , Ad_phone='$Ad_phone' , Ad_Picture='$imageName' WHERE AdminID='$id'");
                move_uploaded_file($image, "صورالمشرف/".$imageName);
                header('location:Mng_Supervisor.php');
            } else {
                echo '
  <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">تعديل بيانات المشرف</h5>
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
              <label for="colFormLabel" class="col-sm-3 col-form-label">رقم المشرف</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="AdminID" value="'.$user['AdminID'].'" >
                
              </div>
              </div>
              
              <div class="form-group row">
              <label for="colFormLabel" class="col-sm-3 col-form-label">اسم المشرف</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="Ad_Name" value="'.$user['Ad_Name'].'" >
              </div>
              </div>
              
              
              <div class="form-group row">
              <label for="colFormLabel" class="col-sm-3 col-form-label">مكان السكن</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="Ad_Address" value="'.$user['Ad_Address'].'" >
              </div>
              </div>
              
              <div class="form-group row">
              <label for="colFormLabel" class="col-sm-3 col-form-label">المؤهل العلمي</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="Ad_Qualification" value="'.$user['Ad_Qualification'].'" >
              </div>
              </div>
              
              <div class="form-group row">
              <label for="colFormLabel" class="col-sm-3 col-form-label">البريد الخاص بالمشرف</label>
              <div class="col-sm-9">
                <input type="email" class="form-control" name="Ad_Email" value="'.$user['Ad_Email'].'" >
              </div>
              </div>
              <div class="form-group row">
              <label for="colFormLabel" class="col-sm-3 col-form-label">رقم الهاتف</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="Ad_phone" value="'.$user['Ad_phone'].'" >
              </div>
              </div>
              <div class="mb-3">
              <p class="text-dark">اختر صورة الطالب</p>
              <input accept="image/*" class="form-control"  name="imagef" type="file"  id="image" >
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
        <h5 class="modal-title" id="exampleModalCenterTitle">تعديل بيانات المشرف</h5>
        <div class="">
        <button type="button" class="close "  onclick="goBack()" data-dismiss="modal" aria-label="">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
      </div>
      <div class="modal-body">
      
		<form class="contact-form "  method="post"  enctype="multipart/form-data">
						
						
					  <div class="form-group row">
						<label for="colFormLabel" class="col-sm-3 col-form-label">رقم المشرف</label>
						<div class="col-sm-9">
						  <input type="text" class="form-control" name="AdminID" value="'.$user['AdminID'].'" >
						  
						</div>
					  </div>
					  
					  <div class="form-group row">
						<label for="colFormLabel" class="col-sm-3 col-form-label">اسم المشرف</label>
						<div class="col-sm-9">
						  <input type="text" class="form-control" name="Ad_Name" value="'.$user['Ad_Name'].'" >
						</div>
					  </div>
					  
					  
					  <div class="form-group row">
						<label for="colFormLabel" class="col-sm-3 col-form-label">مكان السكن</label>
						<div class="col-sm-9">
						  <input type="text" class="form-control" name="Ad_Address" value="'.$user['Ad_Address'].'" >
						</div>
					  </div>
					  
					  <div class="form-group row">
						<label for="colFormLabel" class="col-sm-3 col-form-label">المؤهل العلمي</label>
						<div class="col-sm-9">
						  <input type="text" class="form-control" name="Ad_Qualification" value="'.$user['Ad_Qualification'].'" >
						</div>
					  </div>
					  
					  <div class="form-group row">
						<label for="colFormLabel" class="col-sm-3 col-form-label">البريد الخاص بالمشرف</label>
						<div class="col-sm-9">
						  <input type="email" class="form-control" name="Ad_Email" value="'.$user['Ad_Email'].'" >
						</div>
					  </div>
            <div class="form-group row">
						<label for="colFormLabel" class="col-sm-3 col-form-label">رقم الهاتف</label>
						<div class="col-sm-9">
						  <input type="text" class="form-control" name="Ad_phone" value="'.$user['Ad_phone'].'" >
						</div>
					  </div>
            <div class="mb-3">
            <p class="text-dark">اختر صورة الطالب</p>
            <input accept="image/*" class="form-control"   name="imagef" type="file"  id="image" >
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



<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
    <div class="card-header text-center"><h5 class="">أدخل بيانات المشرف</h5> <h6>صفحة إدارة المشرف</h6></div>
   
      
        <div class="card-body " style="background-color: #C86216;">
            <form  method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row mb-3">
                        <label for="AdminID" class="col-md-4 text-light">رقم المشرف</label>
                        <div class="col-md-6">
                            <input id="AdminID" type="text" name="AdminID" class="form-control" autofocus required >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="Ad_Name" class="col-md-4 text-light">اسم المشرف</label>
                        <div class="col-md-6">
                            <input id="Ad_Name" type="text" name="Ad_Name" class="form-control " >
                        </div>
                    </div>
                    <div class="row mb-3">
                    <label for="Ad_Email" class="col-md-4 col-form-label text-md-end text-light" >البريد الخاص المشرف</label>

                    <div class="col-md-6">
                        <input id="Ad_Email"  type="Email" name="Ad_Email" class="form-control" autofocus>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="Ad_phone" class="col-md-4 col-form-label text-md-end text-light" >رقم الهاتف</label>

                    <div class="col-md-6">
                        <input id="Ad_phone"  type="TEXT" name="Ad_phone" class="form-control" autofocus>
                    </div>
                </div>
                    <div class="row mb-3">
                        <label for="Ad_Address" class="col-md-4 text-light">مكان السكن</label>
                        <div class="col-md-6">
                            <input id="Ad_Address" type="text" name="Ad_Address" class="form-control" >
                        </div>
                    </div>
                             <div class="row mb-3">
                        <label for="Ad_Qualification" class="col-md-4 text-light"> المؤهل العلمي</label>
                        <div class="col-md-6">
                            <input id="Ad_Qualification" type="text" name="Ad_Qualification" class="form-control" >
                        </div>
                    </div>
             

                    </div>
                    <div class="mb-3">
                        <p class="text-light">اختر صورة المشرف</p>
                        <input class="form-control" name="image" type="file"  id="image" accept="image/*" >
                    </div>
           
            
            <div class="col text-center">
                <button name="upload" type="submit" class="btn btn-primary">تحميل البيانات</button>
            </div>
            <div class="container pt-4">
         <div class="card ">
        <div class="card card-header "><h5>البحث عن المشرف</h5></div>
     
   



    <div class="card-body " style="background:#C86216">
    <label class="col alert alert-info form-control">اختر طريقة البحث الخاصة بك</label>

      <div class=" col row pr-5 mr-3 justify-content-center ">
      
      <div class="col pr-5 mr-3  ">

      <select name="search" class="form-select">
       <option selected value="All">الكل</option>
       <option value="Sup_Nm">رقم المشرف</option>
       <option value="Sup_Name">اسم المشرف</option>
       <option value="Scie_Cer">المؤهل العلمي</option>
       <option value="Sup_Email">البريد الإلكتروني</option>
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

          <th>رقم المشرف</th>
          <th>اسم المشرف</th>
          <th> مكان السكن</th>
          <th> البريد الإلكتروني</th>
          <th>رقم الهاتف</th>
          <th>المؤهل العلمي</th>
          
          <th>الصورة</th>

          <th >العمليات</th>
        </tr>
        </div>
</div>
     <?php
    if (isset($_POST['upload'])) {
        $Sup_Nm=$_POST['AdminID'];
        $Sup_Name=$_POST['Ad_Name'];
        $Address=$_POST['Ad_Address'];
        $Sup_Email=$_POST['Ad_Email'];
        $Ad_phone=$_POST['Ad_phone'];
        $Ad_Qualification=$_POST['Ad_Qualification'];


        $imageName=$_FILES['image']['name'];
        $image=$_FILES['image']['tmp_name'];


        $file = explode('.', $imageName);
        $fileActual = strtolower(end($file));
        $allowed = array('png','jpg','jpge','svg');

        if (!empty($_FILES['image']['tmp_name'])) {
            if (in_array($fileActual, $allowed)) {
                $sql = $connection->prepare('INSERT INTO admin (AdminID , Ad_Name ,Ad_Address ,Ad_Email,Ad_phone ,Ad_Qualification   ,Ad_Picture ) 
        VALUES(:AdminID , :Ad_Name , :Ad_Address , :Ad_Email , :Ad_phone , :Ad_Qualification , :name)');
                $sql->execute([':AdminID' => $Sup_Nm ,':Ad_Name' => $Sup_Name ,':Ad_Address' => $Address  , ':Ad_Email' => $Sup_Email ,':Ad_phone' => $Ad_phone,':Ad_Qualification' => $Ad_Qualification  ,':name' => $imageName ]);
                move_uploaded_file($image, "صورالمشرف/".$imageName);
            } else {
                ?><p class="alert alert-danger">  ..أختر ملف من نوع صورة </p><?php
            }
        } else {
            $sql = $connection->prepare('INSERT INTO admin (AdminID , Ad_Name ,Ad_Address ,Ad_Email,Ad_phone ,Ad_Qualification   ) 
      VALUES(:AdminID , :Ad_Name , :Ad_Address , :Ad_Email , :Ad_phone , :Ad_Qualification )');
            $sql->execute([':AdminID' => $Sup_Nm ,':Ad_Name' => $Sup_Name ,':Ad_Address' => $Address  , ':Ad_Email' => $Sup_Email ,':Ad_phone' => $Ad_phone,':Ad_Qualification' => $Ad_Qualification  ]);
        }
    }

    if (isset($_POST['submit'])) {
        if ($_POST['search'] == 'All') {
            $Sup_Nm= $_POST['searchdb'] ;
            $Sup_Name= $_POST['searchdb'] ;
            $Scie_Cer= $_POST['searchdb'] ;
            $Sup_Email= $_POST['searchdb'] ;
            $sql =mysqli_query($conn, "SELECT * FROM admin where AdminID ='$Sup_Nm' OR 	Ad_Name='$Sup_Name' OR  Ad_Qualification='$Scie_Cer' OR Ad_Email='$Sup_Email' ");
            while ($per= mysqli_fetch_assoc($sql)) {?>
                
        <tr>
              <td><?php echo $per['AdminID']; ?></td>
              <td><?php echo $per['Ad_Name'];?> </td>
              <td><?php echo $per['Ad_Address']; ?></td>
              <td><?php echo $per['Ad_Email']; ?></td>
              <td><?php echo $per['Ad_phone']; ?></td>
              <td><?php echo $per['Ad_Qualification']; ?></td>
              
              <td><?php echo "<img id='img' src='صورالمشرف/".$per['Ad_Picture']."'' width='50px'  class='rounded' >";?> </td>
          
          <td  class="table"> 
                <?php echo "
               <a href='?AdminID=$per[AdminID]  '  class='btn btn-info'>تعديل</a>
               <a href='delete.php?AdminID=$per[AdminID]'    class='btn btn-danger'>حذف</a>
              ";
                ?>
              </td>
               
        </tr>
<?php
            }
        } elseif ($_POST['search'] == 'Sup_Nm') {
            $Sup_Nm= $_POST['searchdb'] ;
            $sql =mysqli_query($conn, "SELECT * FROM admin where AdminID='$Sup_Nm' ");
            while ($per= mysqli_fetch_array($sql)) {?>
               <tr>
              <td><?php echo $per['AdminID']; ?></td>
              <td><?php echo $per['Ad_Name'];?> </td>
              <td><?php echo $per['Ad_Address']; ?></td>
              <td><?php echo $per['Ad_Email']; ?></td>
              <td><?php echo $per['Ad_phone']; ?></td>
              <td><?php echo $per['Ad_Qualification']; ?></td>
              
              <td><?php echo "<img id='img' src='صورالمشرف/".$per['Ad_Picture']."'' width='50px'  class='rounded' >";?> </td>
          
          <td  class="table"> 
                <?php echo "
               <a href='?AdminID=$per[AdminID]  '  class='btn btn-info'>تعديل</a>
               <a href='delete.php?AdminID=$per[AdminID]'    class='btn btn-danger'>حذف</a>
              ";
                ?>
              </td>
               
        </tr>
              <?php }
            } elseif ($_POST['search'] == 'Sup_Name') {
                $Sup_Name= $_POST['searchdb'] ;
                $sql =mysqli_query($conn, "SELECT * FROM admin where Ad_Name='$Sup_Name' ");
                while ($per= mysqli_fetch_array($sql)) {?>
                <tr>
              <td><?php echo $per['AdminID']; ?></td>
              <td><?php echo $per['Ad_Name'];?> </td>
              <td><?php echo $per['Ad_Address']; ?></td>
              <td><?php echo $per['Ad_Email']; ?></td>
              <td><?php echo $per['Ad_phone']; ?></td>
              <td><?php echo $per['Ad_Qualification']; ?></td>
              
              <td><?php echo "<img id='img' src='صورالمشرف/".$per['Ad_Picture']."'' width='50px'  class='rounded' >";?> </td>
          
          <td  class="table"> 
                <?php echo "
               <a href='?AdminID=$per[AdminID]  '  class='btn btn-info'>تعديل</a>
               <a href='delete.php?AdminID=$per[AdminID]'    class='btn btn-danger'>حذف</a>
              ";
                    ?>
              </td>
               
        </tr>
              <?php }
                } elseif ($_POST['search'] == 'Sup_Email') {
                    $Sup_Email= $_POST['searchdb'] ;
                    $sql =mysqli_query($conn, "SELECT * FROM admin where  Ad_Email='$Sup_Email' ");
                    while ($per= mysqli_fetch_array($sql)) {?>
            <tr>
              <td><?php echo $per['AdminID']; ?></td>
              <td><?php echo $per['Ad_Name'];?> </td>
              <td><?php echo $per['Ad_Address']; ?></td>
              <td><?php echo $per['Ad_Email']; ?></td>
              <td><?php echo $per['Ad_phone']; ?></td>
              <td><?php echo $per['Ad_Qualification']; ?></td>
              
              <td><?php echo "<img id='img' src='صورالمشرف/".$per['Ad_Picture']."'' width='50px'  class='rounded' >";?> </td>
          
          <td  class="table"> 
                <?php echo "
               <a href='?AdminID=$per[AdminID]  '  class='btn btn-info'>تعديل</a>
               <a href='delete.php?AdminID=$per[AdminID]'    class='btn btn-danger'>حذف</a>
              ";
                        ?>
              </td>
               
        </tr>
              <?php }
                    } elseif ($_POST['search'] == 'Scie_Cer') {
                        $Scie_Cer= $_POST['searchdb'] ;
                        $sql =mysqli_query($conn, "SELECT * FROM admin where Ad_Qualification='$Scie_Cer' ");
                        while ($per= mysqli_fetch_array($sql)) {?>
                <tr>
              <td><?php echo $per['AdminID']; ?></td>
              <td><?php echo $per['Ad_Name'];?> </td>
              <td><?php echo $per['Ad_Address']; ?></td>
              <td><?php echo $per['Ad_Email']; ?></td>
              <td><?php echo $per['Ad_phone']; ?></td>
              <td><?php echo $per['Ad_Qualification']; ?></td>
              
              <td><?php echo "<img id='img' src='صورالمشرف/".$per['Ad_Picture']."'' width='50px'  class='rounded' >";?> </td>
          
          <td  class="table"> 
                <?php echo "
               <a href='?AdminID=$per[AdminID]  '  class='btn btn-info'>تعديل</a>
               <a href='delete.php?AdminID=$per[AdminID]'    class='btn btn-danger'>حذف</a>
              ";
                            ?>
              </td>
               
        </tr>
              <?php }
                        }
    } else {
        $sql =mysqli_query($conn, 'SELECT * FROM admin');
        while ($per= mysqli_fetch_assoc($sql)) {?>
     
    <tr>
          <td><?php echo $per['AdminID']; ?></td>
          <td><?php echo $per['Ad_Name'];?> </td>
          <td><?php echo $per['Ad_Address']; ?></td>
          <td><?php echo $per['Ad_Email']; ?></td>
          <td><?php echo $per['Ad_phone']; ?></td>
          <td><?php echo $per['Ad_Qualification']; ?></td>
          
          
          <td><?php echo "<img id='img' src='صورالمشرف/".$per['Ad_Picture']."'' width='50px'  class='rounded' >";?> </td>
      
      <td  class="table"> 
            <?php echo "
           <a href='?AdminID=$per[AdminID]  '  class='btn btn-info'>تعديل</a>
           <a href='delete.php?AdminID=$per[AdminID]'    class='btn btn-danger'>حذف</a>
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
} ?>