<?php
session_start();

// initializing variables
$UserName = "";
$UserEmailId    = "";
$SocietyPin = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'alime');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $UserName = mysqli_real_escape_string($db, $_POST['UserName']);
  $UserEmailId = mysqli_real_escape_string($db, $_POST['UserEmailId']);
  $SocietyPin = mysqli_real_escape_string($db, $_POST['SocietyPin']);

  $UserPassword = mysqli_real_escape_string($db, $_POST['UserPassword']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($UserName)) { array_push($errors, "Username is required"); }
  if (empty($UserEmailId)) { array_push($errors, "Email is required"); }
  if (empty($SocietyPin)) { array_push($errors, "Society Pin is required"); }

  if (empty($UserPassword)) { array_push($errors, "Password is required"); }
  

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM tbluser1 WHERE UserEmailId='$UserEmailId' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    
    if ($user['UserEmailId'] === $UserEmailId) {
      array_push($errors, "Email already exists");
    }
   
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $UserPassword = md5($UserPassword);//encrypt the password before saving in the database

    $query = "INSERT INTO tbluser1 (`UserName`, `UserPassword`, `UserEmailId`, `Is_Active`, `CreationDate`, `UpdationDate`, `SocietyPin`) 
              VALUES('$UserName', '$UserPassword', '$UserEmailId', 1, '2018-05-27 17:51:00', '2018-10-24 18:21:07', '$SocietyPin')";
    mysqli_query($db, $query);
    $_SESSION['login'] = $UserEmailId;
    $_SESSION['success'] = "You are now logged in";
   
    header('location: index.php');
  }
}
