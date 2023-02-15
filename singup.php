<?php

session_start();
?>
<?php
include_once('conn.php');

   
    if(isset($_SESSION['email']) and $_SESSION['Manger']==1) {
          include('header.php');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $UserName = mysqli_real_escape_string($conn, $_POST['UserName']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $mange=$_POST['mange'];
            $error = [];

            $check_user = mysqli_query($conn, "SELECT * FROM `users` WHERE email='$email'");
            if (mysqli_num_rows($check_user) != 0) {
                $errors[] = 'تم بالفعل استخدام هذا البريد الإلكتروني. استخدم بريدًا إلكترونيًا آخر';
            }

            if (!$email) {
                $errors[] = 'البريد الإلكتروني مطلوب';
            }


            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'أدخل البريد الإلكتروني للتحقق من الصحة';
            }




            if (strlen($UserName) < 8) {
                $errors[] = 'يجب ألا يقل اسم المستخدم عن 8 أحرف';
            }

            if (strlen($password) < 8) {
                $errors[] = 'يجب ألا تقل كلمة المرور عن 8 أحرف';
            }

            if (!isset($errors)) {
                $sql = "INSERT INTO users (UserName,email,Password,Manger) VALUES ('$UserName','$email','$password','$mange')";
                mysqli_query($conn, $sql);
                header('location:login.php');
            }
        }



        ?>


<?php if (!empty($errors)) : ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error) : ?>
            <div><?php echo '- ' . $error; ?></div>
        <?php endforeach ?>
    </div>
<?php endif; ?>
<form method="POST" >
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-10">
   
        <div class="card">
            <div class="card-header text-center ">إنشاء حساب مدير</div>
            
                <div class="card-body" style="background:#C86216">

                    <div class="row mb-3">
                        <label for="UserName" class="col-md-4 col-form-label text-md-end text-light">اسم المستخدم</label>
                        <div class="col-md-6">
                            <input id="UserName" type="text" name="UserName" placeholder="اسم المستخدم" class="form-control" autofocus>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end text-light">البريد الإلكتروني</label>

                        <div class="col-md-6">
                            <input id="email" type="text" name="email" placeholder=" أدخل البريد الإلكتروني" class="form-control" autofocus>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end text-light">كلمة المرور</label>

                        <div class="col-md-6">
                              <input id="password" type="password" placeholder="أدخل كلمة المرور" name="password" class="form-control">
                            <div class="from-check  ">
                                  <label class="form-check-label pt-2 text-light " for="f"> حساب مدير </label>
                                  <input class="form-check-input m-3" type="checkbox" name="mange"  value="1" id="f">
                                        
                            </div>
                                <br><a href="login.php" class="text-light ">لديك حساب؟ تسجيل الدخول</a>
                        </div>
                    </div>
                    
                

            </form>
        </div>

        <div class=" text-center mb-3 mt-3">
                        <button name="submit" type="submit" class="btn btn-primary ">إنشاء حساب مدير</button>
                    </div>
    </div>
    </div>
</div>










<?php

    } else {
        include('header.php');
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $UserName = mysqli_real_escape_string($conn, $_POST['UserName']) ;
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $error = [];

            $check_user = mysqli_query($conn, "SELECT * FROM `users` WHERE email='$email'");
            if(mysqli_num_rows($check_user) != 0) {
                $errors[] = 'تم بالفعل استخدام هذا البريد الإلكتروني. استخدم بريدًا إلكترونيًا آخر';
            }

            if(!$email) {
                $errors[] = 'البريد الإلكتروني مطلوب';
            }


            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'أدخل البريد الإلكتروني للتحقق من الصحة';
            }




            if(strlen($UserName) < 8) {
                $errors[] = 'يجب ألا يقل اسم المستخدم عن 8 أحرف';
            }

            if(strlen($password) < 8) {
                $errors[] = 'يجب ألا تقل كلمة المرور عن 8 أحرف';
            }

            if(!isset($errors)) {
                $sql = "INSERT INTO users (UserName,email,Password) VALUES ('$UserName','$email','$password')";
                mysqli_query($conn, $sql);
                header('location:loginad.php');
            }
        }



        ?>


<?php if(!empty($errors)): ?>
<div class="alert alert-danger">
<?php foreach($errors as $error): ?>
    <div><?php echo '- '.$error ;?></div>
<?php endforeach ?>
</div>
<?php endif; ?> 

<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
    <div class="card">
    <div class="card-header text-center ">إنشاء حساب </div>

<form action="" method="POST">
<div class="card-body "style="background:#C86216">

<div class="row mb-3">
        <label for="UserName" class="col-md-4 col-form-label text-md-end text-light">اسم المستخدم</label>
        <div class="col-md-6">
            <input id="UserName" type="text" name="UserName" placeholder="اسم المستخدم" class="form-control" autofocus>
        </div>
    </div>

    <div class="row mb-3">
        <label for="email" class="col-md-4 col-form-label text-md-end text-light" >البريد الإلكتروني</label>

        <div class="col-md-6">
            <input id="email" type="text" name="email"placeholder=" أدخل البريد الإلكتروني" class="form-control" autofocus>
        </div>
    </div>

    <div class="row mb-3">
        <label for="password" class="col-md-4 col-form-label text-md-end text-light">كلمة المرور</label>

        <div class="col-md-6">
            <input id="password" type="password"placeholder="أدخل كلمة المرور" name="password" class="form-control" >
            <br><a href="login.php" class="text-light ">لديك حساب؟ تسجيل الدخول</a>
        </div>
    </div>

                </div>
                <div class="text-center mb-3 mt-3">

     <button name="submit" type="submit" class="btn btn-primary ">إنشاء حساب</button>

    </div>
    </form>
            </div>
        </div>
    </div> 
</div>

  
<?php
    }

?>