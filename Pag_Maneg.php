<?php

 session_start();
 if (isset($_SESSION['email']) AND $_SESSION['Manger']==True) {
 include('header.php');
 include('conn.php');

    ?>
<div class="container">
<div class="col text-center" >
<h3 class="mb-5" style="background:#C86216">الإدارة</h3>
</div>
<div class="row text-center">
<div class="col">
<h5  style="background:#C86216" ><a href="Mng_Student.php" ><h5 class="text-light btn btn-success" > إدارة الطلاب</h5> </a></h5>
</div>

<div class="col">
<h5 style="background:#C86216"><a href="Mng_Supervisor.php"><h5 class="text-light btn btn-success"> إدارة المشرفين</h5></a></h5>
</div>
</div>

<div class="row text-center ">
<div class="col">
<h5 style="background:#C86216"><a href="Mng_Project.php"><h5 class="text-light btn btn-success"> إدارة المشاريع</h5></a></h5>
</div>
<div class="col"  >
<h5 style="background:#C86216"><a  href="search.php"><h5 class="text-light  btn btn-success" >صفحة البحث </h5></a></h5>
</div>
</div>
</div>
<?php } else{

header('location:login.php');
} ?>