<!DOCTYPE html>

<html lang="en">
<head>
 

    <meta charset="UTF-8">
    <meta thhp-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    
    
  
<link href="css10/bootstrap.min.css" rel="stylesheet">
<link href="css10/main-style.css" rel="stylesheet">

    
</head>
<body class="bg-info" dir="rtl" style="text-align: right !important">

<script src="js10/jquery-3.6.1.min.js"></script>
<script src="js10/popper.min.js"></script>
<script src="js10/bootstrap.min1.js"></script>



<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="logout.php">المشروع</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
    <?php
  
    if(isset($_SESSION['email']) AND $_SESSION['Manger']==true){
    echo '
    <li class="nav-item">
<a class="nav-link active" aria-current="page" href="Pag_Maneg.php">صفحة الإدارة </a>
</li>
 
    <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="Mng_Project.php">صفحة ادإرة المشروع</a>
  </li>
  <li class="nav-item">
  <a class="nav-link active" aria-current="page" href="Mng_Supervisor.php">صفحة إدارة المشرف</a>
</li>
<li class="nav-item">
<a class="nav-link active" aria-current="page" href="Mng_Student.php">صفحة إدارة الطالب</a>
</li>
   
<li class="nav-item">
<a class="nav-link active" aria-current="page" href="search.php">البحث</a>
</li>
<li class="nav-item">
<a class="nav-link active" aria-current="page" href="singup.php">إنشاء حساب مدير</a>
</li>
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="logout.php">تسجيل الخروج</a>
    </li>

    
';
    }elseif(isset($_SESSION['email']) AND $_SESSION['Manger']==false){
      echo '
    
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="search.php">البحث</a>
    </li>
    

      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="singup.php"> إنشاء حساب  </a>
      </li>

      <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="logout.php">تسجيل الخروج</a>
    </li>
      
      
      ';

    }else{
      echo'
      <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="singup.php"> إنشاء حساب  </a>
    </li>

    <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="login.php">تسجيل دخول</a>
  </li>


';

    }
    
     
   

  
    ?>
      </ul>
    </div>
  </div>
</nav>

<div class=" m-5">

<h5 class="alert alert-info text-center" >   الكلية الجامعية للعلوم والتكنولوجيا   <img id="img" src='img/m2.png' width='50px' class='rounded'/></h5>
</div>

</body>
</html>



<style>
  
#img:hover{
    transition: 0.8s;
    transform: scale(3.9);
    cursor: zoom-in;
}
</style>