<?php
	require_once("AuthKey.php");
	// session_start();

	function SendOTP($phone, $otp)
	{
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.msg91.com/api/sendotp.php?authkey=".$_SESSION["authKey"]."&mobile=91".$phone."&message=Your%20otp%20is%20".$otp."&sender=MSGIND&otp=".$otp,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
	}
?>