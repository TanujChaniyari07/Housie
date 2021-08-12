<?php
 session_start();
//Database Configuration File
include('includes/config.php');
//error_reporting(0);
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:LoginSignUp.php');
}
else
{
	$UserEmailId = $_SESSION['login'];
    $sql =mysqli_query($con,"SELECT SocietyPin,UserName,house_no FROM tbluser1 WHERE UserEmailId='$UserEmailId'");
$sql_result = mysqli_fetch_assoc($sql);
$SocietyPin= $sql_result['SocietyPin'];
$UserName = $sql_result['UserName'];
$house_no = $sql_result['house_no'];
if(isset($_POST['Edit']))
  {
 
    // Getting username/ email and password
   $UserEmailID1=$_POST['UserEmailID1'];
    $UserName1=$_POST['UserName1'];
    $SocietyPin1=$_POST['SocietyPin1'];
     $house_no1=$_POST['house_no1'];
    
    // Fetch data from database on the basis of username/email and password
$query=mysqli_query($con,"update tbluser1 set UserName='$UserName1',SocietyPin='$SocietyPin1',UserEmailId='$UserEmailID1',house_no='$house_no1' where UserEmailId='$UserEmailId'"); 
header('location:index.php');
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Change Password</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images2/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor2/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts2/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts2/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor2/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor2/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor2/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor2/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor2/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css2/util.css">
	<link rel="stylesheet" type="text/css" href="css2/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	
	<div class="container-login100" style="background-image: url('images2/Home_bg.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<form class="login100-form validate-form" method="post">
				<span class="login100-form-title p-b-37">
					Change Password
				</span>
<div class="wrap-input100 validate-input m-b-20" data-validate="UserEmailId">
					<input class="input100" type="password" name="old_pass" placeholder="Old Password">
					<span class="focus-input100"></span>

				</div>
				<div class="wrap-input100 validate-input m-b-20" data-validate="UserEmailId">
					<input class="input100" type="password" name="new_pass1" placeholder="New Password">
					<span class="focus-input100"></span>

				</div>
				<div class="wrap-input100 validate-input m-b-20" data-validate="UserEmailId">
					<input class="input100" type="password" name="new_pass2" placeholder="Confirm Password">
					<span class="focus-input100"></span>

				</div>
				
				

				<div class="container-login100-form-btn">
					<input type="submit" class="login100-form-btn" name="Edit">
						
					</input>
				</div>

				<!-- <div class="text-center p-t-57 p-b-20">
					<span class="txt1">
						Or login with
					</span>
				</div> -->

				<!-- <div class="flex-c p-b-112">
					<a href="#" class="login100-social-item">
						<i class="fa fa-facebook-f"></i>
					</a>

					<a href="#" class="login100-social-item">
						<img src="images2/icons/icon-google.png" alt="GOOGLE">
					</a>
				</div> -->

				
			</form>

			
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor2/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor2/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor2/bootstrap/js/popper.js"></script>
	<script src="vendor2/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor2/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor2/daterangepicker/moment.min.js"></script>
	<script src="vendor2/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor2/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js2/main.js"></script>

</body>
</html>