<?php 
session_start();
if (isset($_SESSION['role'])) 
{
	
	echo '<script>window.location="profile.php"</script>';
	//header('location:profile.php');
}


$msg = '';
include '../app/connect.php'; ?>

<?php if(isset($_POST['signupbtn']))
{
$msg="";
$user_id=""; 
$user_email=$_POST['signupemail'];
$password=$_POST['signuppassword'];
$user_role="user";
$user_firstname="";
$user_middlename="";
$user_lastname="";
$user_address="";
$user_gender="";
$user_phonenumber="";
$user_age="";
$user_bloodgroup="";
$user_avialibility="";
$user_recentlydonatedtime="";
$user_status="";
$user_photo="";

$password = md5($password);

	// prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO tbl_user (user_id,user_email,user_password,user_role,user_Firstname,user_Middlename,user_Lastname,user_Address,user_gender,user_phonenumber,user_age,user_bloodgroup,user_avialibility,user_recentlydonatedtime,user_status,user_photo) 
    VALUES (:id, :email, :pass, :role, :fname, :mname, :lname, :address, :gender, :phone, :age, :bloodgroup, :user_avialibility, :user_recentlydonatedtime, :status, :photo)");
    $stmt->bindParam(':id', $user_id);
    $stmt->bindParam(':email', $user_email);
    $stmt->bindParam(':pass', $password);
    $stmt->bindParam(':status', $user_status);
     $stmt->bindParam(':role' ,$user_role );
    $stmt->bindParam(':fname' , $user_firstname);
    $stmt->bindParam( ':mname', $user_middlename);
    $stmt->bindParam(':lname' , $user_lastname);
    $stmt->bindParam( ':address', $user_address);
    $stmt->bindParam(':gender' , $user_gender);
    $stmt->bindParam(':phone' , $user_phonenumber);
    $stmt->bindParam(':age' , $user_age);
    $stmt->bindParam(':bloodgroup' , $user_bloodgroup);
    $stmt->bindParam(':user_avialibility' , $user_avialibility);
    $stmt->bindParam(':user_recentlydonatedtime' , $user_recentlydonatedtime);
    $stmt->bindParam(':photo' , $user_photo);
    if($stmt->execute())
    {
   	$id = $conn->lastInsertId(); 

     $_SESSION['id'] =  $id;
 	 $_SESSION['email'] =  $user_email;
 	 $_SESSION['role'] =  $user_role;
 	 header('location:form.php');
    }
    else
    {
    	$msg = "Problem in Sign Up.";
    }






}


?>

<?php if(isset($_POST['loginbtn']))
{
$email = $_POST['email'];
$password = $_POST['password'];
$password = md5($password);
 
 $stmt = $conn->prepare("SELECT * FROM tbl_user WHERE user_email=:user_email AND user_password=:user_password"); 
 $stmt->bindParam(':user_email', $email);
 $stmt->bindParam(':user_password', $password);
 $stmt->execute();
 // set the resulting array to associative
 $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
 $count = $stmt->rowCount();
 if($count>0)
 {
 	foreach ($stmt->fetchAll() as $k => $v) 
 	{
 	
 	 $_SESSION['id'] =  $v['user_id'];
 	 $_SESSION['email'] =  $v['user_email'];
 	 $_SESSION['role'] =  $v['user_role'];
 	
 	 header('location:profile.php');
 	}
 }
 else
 {
 	$msg = 'Invalid Username Or Password';
 }

}
?> 
<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from 198.74.61.72/themes/preview/ace/login.html by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 28 Feb 2014 17:46:42 GMT -->
<head>
		<meta charset="utf-8" />
		<title>Login Page - User </title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- basic styles -->

		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="assets/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->

		<!-- fonts -->

		<link rel="stylesheet" href="../admin/assets/css/ace-fonts.css" />

		<!-- ace styles -->

		<link rel="stylesheet" href="../admin/assets/css/ace.min.css" />
		<link rel="stylesheet" href="../admin/assets/css/ace-rtl.min.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<img src="assets\images\download.jpg" /> 
									<span class="red">Blood</span>
									<span class="white">Application</span>
								</h1>
								<h4 class="blue">&copy; BIM 7th</h4>
							</div>

							<div class="space-6"></div>

							<div  id="logindiv" class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="icon-coffee green"></i>
												Please Enter Your Credentials
											</h4>
											<h5 > <span style="color:red"> <?php echo $msg; ?> </span></h5>

											<div class="space-6"></div>

											<form name="loginform" id="loginform" method="POST" action="">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" name="email" id="email" placeholder="Email" />
															<i class="icon-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" name="password" id="password" class="form-control" placeholder="Password" />
															<i class="icon-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
															<button type="button" id="signshowbtn" name="signupbtn" class="width-35 pull-left btn btn-sm btn-primary">
															<i class="icon-key"></i>
															Sign Up
														</button>

														<button type="submit" name="loginbtn" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="icon-key"></i>
															Login
														</button>

 																											
													</div>
												

													<div class="space-4"></div>
												</fieldset>
											</form>

											

										</div><!-- /widget-main -->

										<div class="toolbar clearfix">
											

											
										</div>
									</div><!-- /widget-body -->
								</div><!-- /login-box -->

							</div><!-- /position-relative -->

							<!-- SIGNUP FORM -->
<div id="signupdiv" class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="icon-coffee green"></i>
												Please Signup Information
												 
											</h4>
											<h5 > <span style="color:red"> <?php echo $msg; ?> </span></h5>

											<div class="space-6"></div>

											<form name="signupform" id="signupform" method="POST" action="">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" name="signupemail" id="signupemail" placeholder="Email" />
															<i class="icon-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" name="signuppassword" id="signuppassword" class="form-control" placeholder="Password" />
															<i class="icon-lock"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" name="repassword" id="repassword" class="form-control" placeholder="Password" />
															<i class="icon-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
															<button type="submit" name="signupbtn" class="width-35 pull-left btn btn-sm btn-primary">
															<i class="icon-key"></i>
															<?php echo $msg; ?>
															Sign Up
														</button>

														<button type="button" name="loginshowbtn" id="loginshowbtn" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="icon-key"></i>
															Login
														</button>

 																											
													</div>
												

													<div class="space-4"></div>
												</fieldset>
											</form>

											

										</div><!-- /widget-main -->

										<div class="toolbar clearfix">
											

											
										</div>
									</div><!-- /widget-body -->
								</div><!-- /login-box -->

								
							</div>
							

							<!-- /position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->

		<script type="text/javascript">
			function show_box(id) {
			 jQuery('.widget-box.visible').removeClass('visible');
			 jQuery('#'+id).addClass('visible');
			}
		</script>
<!-- For Show -->
<script type="text/javascript">
 $( "#signupdiv" ).hide();
	$( "#signshowbtn" ).click(function() {
  //alert( "Hello." );
  $( "#signupdiv" ).show();
});

$( "#loginshowbtn" ).click(function() {
  //alert('here');
  $( "#signupdiv" ).hide();
  $( "#logindiv" ).show();
});

	
</script>

<script type="text/javascript">
$('#loginform').submit(function() {
  var filter = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  var number= /[0-9 -()+]+$/;
  var alpha= /^[a-zA-Z0-9!-”$%&’()*\+,\/;\[\\\]\/\s^_.`{|}~]+$/;
  var phone_no=/^(?:\+\d{2})?\d{10}(?:,(?:\+\d{2})?\d{10})*$/;


  var email=$('#email').val();
  var password=$('#password').val();

  //alert(email);


  if(!filter.test(email))
  {
    $("#email").css({"border": "1px solid red"});
    $('#email').focus();
    setTimeout(function() {
       $('#email').css({"border": "1px solid #ddd"});
   }, 5000);
        return false;
  }
  if(password=='')
  {
    $("#password").css({"border": "1px solid red"});
    $('#password').focus();
    setTimeout(function() {
       $('#password').css({"border": "1px solid #ddd"});
   }, 5000);
        return false;
  }




  else 
  {
    $('#login_user').submit();
  }
});





</script>
<script type="text/javascript">
$('#signupform').submit(function() {
  var filter = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  var number= /[0-9 -()+]+$/;
  var alpha= /^[a-zA-Z0-9!-”$%&’()*\+,\/;\[\\\]\/\s^_.`{|}~]+$/;
  var phone_no=/^(?:\+\d{2})?\d{10}(?:,(?:\+\d{2})?\d{10})*$/;


  var signupemail=$('#signupemail').val();
  var signuppassword=$('#signuppassword').val();
  var repassword=$('#repassword').val();

  //alert(email);


  if(!filter.test(signupemail))
  {
    $("#signupemail").css({"border": "1px solid red"});
    $('#signupemail').focus();
    setTimeout(function() {
       $('#signupemail').css({"border": "1px solid #ddd"});
   }, 5000);
        return false;
  }
  if(signuppassword=='')
  {
    $("#signuppassword").css({"border": "1px solid red"});
    $('#signuppassword').focus();
    setTimeout(function() {
       $('#signuppassword').css({"border": "1px solid #ddd"});
   }, 5000);
        return false;
  }


   if(repassword != signuppassword)
  {
    $("#repassword").css({"border": "1px solid red"});
    $('#repassword').focus();
    setTimeout(function() {
       $('#repassword').css({"border": "1px solid #ddd"});
   }, 5000);
        return false;
  }




  else 
  {
    $('#signupform').submit();
  }
});





</script>

	</body>

<!-- Mirrored from 198.74.61.72/themes/preview/ace/login.html by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 28 Feb 2014 17:46:42 GMT -->
</html>
