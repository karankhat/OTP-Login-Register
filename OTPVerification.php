<?php
	session_start();

	$conn = mysqli_connect("localhost", "root", "", "qube");
	
	if(!empty($_POST["submit_phone"])) {
		$_SESSION["phone"] = $_POST["phone"];

		// Generate OTP
		$otp = rand(100000, 999999);
		$_SESSION["otp"] = $otp;

		// Send OTP
		require_once("SMSFunction.php");
		SendOTP($_POST["phone"], $otp);

		header("Location: OTP.html");
	}

	if(!empty($_POST["submit_otp"])) {
		// echo $otp." -> ".$_SESSION["otp"];
		if ($_SESSION["otp"] == (int)$_POST["otp"]) {
			$result = mysqli_query($conn, "SELECT * FROM users WHERE phone=".$_SESSION['phone']);
			$count  = mysqli_num_rows($result);

			if(!empty($count)) {
				header("Location: LoginSuccess.php");
			} else {
				header("Location: Register.html");
			}
		}
		else {
			header("Location: LoginFailure.php");
		}	
	}
?>
