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
include_once ('conn.php');

include('header.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);


    $error = [];


    if (!$email) {
        $errors[] = 'البريدالإلكتروني فارغ';
    }
    if (!$password) {
        $errors[] = 'كلمة المرور فارغة';
    }



    if (!isset($errors)) {
        $Manger= mysqli_real_escape_string($conn, $_POST['Manger']);
        $sql ="SELECT * FROM `users` WHERE email='$email' AND  Password='$password' AND Manger='$Manger' limit 1";
        if ($Manger==1) {
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result );
            $num_rows = mysqli_num_rows($result);
            if ($num_rows != 0) {
                $_SESSION['Password'] = $row['Password'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['Manger'] = $row['Manger'];
                    header('location:Pag_Maneg.php');
            } else {
                $errors[] = '1 خطأ في كلمة مرور أو بريد إلكتروني';
            }
        } else {
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $num_rows = mysqli_num_rows($result);
            if ($num_rows != 0) {
                $_SESSION['Password'] = $row['Password'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['Manger'] = $row['Manger'];
               # header('location:singup.php');
              header('location:search.php');
            } else {
                header('location:login.php');
                
            }
        }
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

    
<form  method="POST">
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header  text-center ">تسجيل دخول </div>

                
                    <div class="card-body  " style="background:#C86216">



                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end text-light ">البريد
                                الإلكتروني</label>
                            <div class="col-md-6">
                                <input id="email" placeholder="البريد الإكتروني" type="text" name="email"
                                    class="form-control" autofocus>
                            </div>
                        </div>

                        <div class="row">
                            <label for="password" class="col-md-4 col-form-label text-md-end text-light">كلمة المرور</label>

                            <div class="col-md-6">
                                
                                <input id="password" placeholder="أدخل كلمة المرور" type="password" name="password"class="form-control">
                                     <div class="from-check  ">
                                  <label class="form-check-label pt-2 text-light " for="f"> حساب مدير </label>
                                  <input class="form-check-input m-3" type="checkbox" name="Manger"  value="1" id="f">
                                        
                            </div>
                                <br><a href="singup.php" class="text-light ">ليس لديك حساب؟ أنشئ حساب</a>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mb-3 mt-3">
                        <button name="submit" type="submit" class="btn btn-primary ">تسجيل الدخول</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>





</body>
</html>