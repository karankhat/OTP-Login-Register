<?php	
	$conn = mysqli_connect("localhost", "root", "", "qube");

	if(!empty($_POST["submit_details"])) {
		$result = mysqli_query($conn, "INSERT INTO users VALUES ('".$_POST['name']."', '".$_POST['phone']."', '".$_POST['email']."')");

		if($result) {
			header("Location: Login.html");
		} 
	}
?>
