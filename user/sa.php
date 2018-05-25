<?php
	if(isset($_POST['samrat'])){

		$username = "mangratirajit@gmail.com";
		$hash = "c0a069c7e1720a64066d3190b2a79a4884d9fe6b4926f7258385579e43c02a51";
		//d8196e936a499a8866b5a4fbbbe9763efaef7d92296bff6eb26ee5891cef6c23
		// Config variables. Consult http://api.txtlocal.com/docs for more info.
		$test = "0";

		 $redirectTo = $_POST['returnback'];

		// Data for text message. This is the text message data.
		$sender = "Blood Request"; // This is who the message appears to be from.
		
		$numbers = $_POST['num']; // A single number or a comma-seperated list of numbed59cd740c2eb3a1ff63581ce2d56d2fee5312cc5a31f66a060db99dc0c43a25f
		$message = $_POST['msg'];
		// 612 chars or less
		// A single number or a comma-seperated list of numbers
		$message = urlencode($message);
		$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
		$ch = curl_init('http://api.txtlocal.com/send/?');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch); // This is the result from the API
		curl_close($ch);
		echo ("$result");
	
		$_SESSION['message'] = 'success';
		//header("Location: http:tbl_common.php");

		$redirectTo = $_POST['returnback'];

		switch ($redirectTo) 
		{
			case 'tbl_common':
				header("location:tbl_common.php");
				break;

			case 'ABnegative':
				header("location:ABnegative.php");
				break;
			
			case 'ABpositive':
				header("location:ABpositive.php");
				break;
			
			case 'Anegative':
				header("location:Anegative.php");
				break;
			
			case 'Apositive':
				header("location:Apositive.php");
				break;
			
			case 'Bnegative':
				header("location:Bnegative.php");
				break;
			
			case 'Bpositive':
				header("location:Bpositive.php");
				break;

			case 'Onegative':
				header("location:Onegative.php");
				break;

			case 'Opositive':
				header("location:Opositive.php");
				break;
			
				
			
			default:
				header("location:profile.php");
				break;
		}
		

		echo("$numbers");
    }
?>

	