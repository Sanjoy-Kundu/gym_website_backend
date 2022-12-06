<?php
session_start();
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
				echo "good";
		}else{
			$_SESSION["photo_error"] = "Extensition must be jpg, png, svg";
			header('location: register.php');
		}
/* 
	print_r($imageNameExplode);
	print_r($imageNameExtension); */

}else{
	$_SESSION["photo_error"] = "Please Choose an image.";
	header("location: register.php");
}




/* if(empty($userName)){
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

 */


/* if($error_status){
	header("location: register.php");
}else{
	
} */
?>