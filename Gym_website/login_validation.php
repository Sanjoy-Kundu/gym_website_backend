<?php
session_start();
require_once "db_connection.php";
$email = $_POST["login_email"];
$password = md5($_POST["login_password"]);

$check_login = "SELECT COUNT(*) as status FROM `registration` WHERE email = '$email' AND password = '$password'";
$checking_login_output = mysqli_query($db_connect, $check_login);
$checking_login_output_array = mysqli_fetch_assoc($checking_login_output);
print_r($checking_login_output_array);
if($checking_login_output_array["status"] == 0){
	$_SESSION["login_error"] = "Your Email and password does't match.";
	header("location: login.php");
}else{
	$_SESSION["login_success"] = "Your Login Successfully";
	header("location: profile.php"); 
}


?>