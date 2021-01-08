<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng Nhập</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

</head>
<body> 
<?php

require_once '../db.php';
$nameErr = isset($_GET['nameErr']) == true ? $_GET['nameErr'] : "";
$passwordErr = isset($_GET['passwordErr']) == true ? $_GET['passwordErr'] : "";
// var_dump($result);die;
?>

	<div class="container-login100" style="background-image: url('anh/03.jpg');opacity: 100%;">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<form class="login100-form validate-form" action="post-login.php" method="post">
				<span class="login100-form-title p-b-37">
					Sign In
				</span>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
					<input class="input100" type="text" name="name" placeholder="Username">
						<?php if ($nameErr != ""): ?>
						<p style="color: red"><?php echo $nameErr ?></p>
						<?php endif ?>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
					<input class="input100" type="password" name="password" placeholder="Password">
						<?php if ($passwordErr != ""): ?>
						<p style="color: red"><?php echo $passwordErr ?></p>
						<?php endif ?>
					<span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn">
					<button class="login100-form-btn" type="submit" name="login">
						ĐĂNG NHẬP
					</button>
				</div>

				<div class="text-center p-t-57 p-b-20">
					<span class="txt1" >
						<a href="../index.php">Về Trang Chủ</a>
					</span>
				</div>

				<div class="text-center">
					<a href="dk.php" class="txt2 hov1">
						ĐĂNG KÍ
					</a>
				</div>
			</form>		
		</div>
	</div>


	  <?php 
  include '../dp.php';
  if (isset($_POST['login'])) {
    $username=$_POST['username'];
    $password=($_POST['password']);
    $sql="SELECT * from nguoi_dung where username='$username' and password='$password'";
    $kq=$conn->query($sql)->fetch();
    if ($username==$kq['username']) {
      $_SESSION['username']=$username;
    header("location:../index.php");
    }
    else{
      echo "Sai tên đăng nhập hoặc mật khẩu !";
    } 
  }
   ?>
	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>