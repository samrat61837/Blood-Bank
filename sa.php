<?php
	if(isset($_POST['btn'])){
		
		$username = $_POST['email'];
		$hash = $_POST['hash'];
		//d8196e936a499a8866b5a4fbbbe9763efaef7d92296bff6eb26ee5891cef6c23
		// Config variables. Consult http://api.txtlocal.com/docs for more info.
		$test = "0";

		// Data for text message. This is the text message data.
		$sender = $_POST['sen']; // This is who the message appears to be from.
		$numbers = $_POST['num']; // A single number or a comma-seperated list of numbers
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
    }
?>
<form name="" id="loginform" method="POST" action="sa.php">
												<fieldset>
													<label class="block clearfix">Username
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" name="email" id="email" placeholder="email" />
															<i class="icon-user"></i>
														</span>
													</label>

													<label class="block clearfix">HASH Value
														<span class="block input-icon input-icon-right">
															<input type="text" name="hash" id="password" class="form-control" placeholder="Password" />
															<i class="icon-lock"></i>
														</span>
													</label>
													<label class="block clearfix">sender
														<span class="block input-icon input-icon-right">
															<input type="text" name="sen" id="number" class="form-control" placeholder="Password" />
															<i class="icon-lock"></i>
														</span>
													</label>
													<label class="block clearfix">number
														<span class="block input-icon input-icon-right">
															<input type="text" name="num" id="number" class="form-control" placeholder="Password" />
															<i class="icon-lock"></i>
														</span>
													</label>
													<label class="block clearfix">message
														<span class="block input-icon input-icon-right">
															<input type="text" name="msg" id="msg" class="form-control" placeholder="Password" />
															<i class="icon-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
															<button type="button" id="signshowbtn" name="signupbtn" class="width-35 pull-left btn btn-sm btn-primary">
															<i class="icon-key"></i>
															Sign Up
														</button>

														<button type="submit" name="btn" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="icon-key"></i>
															Login
														</button>

 																											
													</div>
	