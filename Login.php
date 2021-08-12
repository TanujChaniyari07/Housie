<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "housie";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
  die("Connection failed: ". $conn->connect_error);
}

$userName = $_POST['username'];
$userPassword = $_POST['password'];

$sql  = "INSERT INTO login(username,user_password) VALUES ('$userName','$userPassword')";

if($conn->query($sql) === TRUE){

} else{
  echo "Error: ". $sql."<br>".$conn->error;
}
header("Location: http://localhost/alime");
 ?>
