<?php
session_start();
require_once "db_connection.php";
if($db_connect){
	echo "db con successfully";
}else{
	echo "not good";
}
$userName = $_POST['user_name'];
$userEmail = $_POST['user_email'];
$userPassword = $_POST["user_password"];
$userConfirmPassword = $_POST["user_confirm__password"];
$userPhoto = $_FILES["user_photo"];
$userDistrict = $_POST["user_district"];
$error_status = false;


print_r($userPhoto);

if($userPhoto["name"]){
	$imageName =  $userPhoto["name"];
	$imageNameExplode = explode(".", $imageName);
	$imageNameExtension = end($imageNameExplode);
		if($imageNameExtension == 'jpg' || $imageNameExtension == "png" || $imageNameExtension == "svg"){
				
			if($userPhoto['size'] <= 200000){
				if($userPhoto['error'] == 0){
					$source = $userPhoto["tmp_name"];
					$destination = "uploadImage/ProfileImages/sanjoy.jpg";
					move_uploaded_file($source, $destination);
					}
				}else{
				$_SESSION["photo_error"] = "Image size must be 2 mb";
				$error_status = true;
				}
			}
			else{
				$_SESSION["photo_error"] = "Extensition must be jpg, png, svg";
				$error_status = true;
			}
		}else{
				$_SESSION["photo_error"] = "Please Choose an image.";
				$error_status = true;
			}




 if(empty($userName)){
	$_SESSION["name_error"] = "Name field is required";
	$error_status = true;
}else{
	$_SESSION["name"] = $userName;
}

if(empty($userEmail)){
	$_SESSION["email_error"] = "Email Field is required";
	$error_status = true;
}else{
	$_SESSION["email"] = $userEmail;
}

if(empty($userPassword)){
	$_SESSION["password_error"] = "Password field is required";
	$error_status = true;
}else{
	echo "password paici";
}

if(empty($userConfirmPassword)){
	$_SESSION["confirm_password_error"] = "Confirm Password field is required";
	$error_status = true;
}

if($userPassword != $userConfirmPassword){
	$_SESSION["confirm_password_error"] = "Your password and confirmation password not math";
	$error_status = true;
}

if(empty($userDistrict)){
	$_SESSION["district_error"] = "District field is required";
	$error_status = true;
}else{
	$_SESSION["district"] = $userDistrict;
}




 if($error_status){
	header("location: register.php");
}else{

/* 	$checking_email = "SELECT * FROM `registration` WHERE email = '$userEmail"; */
	$checking_email = "SELECT COUNT(*) as status FROM `registration` WHERE email = '$userEmail'";
	$checking_email_output = mysqli_query($db_connect, $checking_email);
	$checking_email_output_array = mysqli_fetch_assoc($checking_email_output);
	print_r($checking_email_output_array);

	if($checking_email_output_array["status"] == 0){
		$encripted_password = md5($userPassword);
		$insert_registration = "INSERT INTO `registration`(`name`, `email`, `district`, `image`, `password`) VALUES ('$userName','$userEmail','$userDistrict','$userPhoto','$encripted_password')";
		mysqli_query($db_connect, $insert_registration);
		$_SESSION["registration_success"] = "Your registration Successfully";
		header("location: login.php");
	}else{
		$_SESSION["email_error"] = "This email alreay taken";
		header("location: register.php");
	}
	/* $insert_registration = "INSERT INTO `registration`(`name`, `email`, `district`, `image`, `password`) VALUES ('$userName','$userEmail','$userDistrict','$userPhoto','$userPassword')";
	mysqli_query($db_connect, $insert_registration);
	$_SESSION["insert_success"] = "Your registration Successfully";
	header("location: register.php"); */
} 
?>