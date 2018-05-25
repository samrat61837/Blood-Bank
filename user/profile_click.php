<?php include'layout_user/header_user.php';?>
<?php include'layout_user/sidebar_user.php';?>
<?php 
	 
if(isset ($_POST['updatebtn'])){

$stmt_photo = $conn->prepare("SELECT * FROM tbl_user WHERE user_id=:user_id"); 
											$stmt_photo->bindParam(':user_id', $_SESSION['id']);
											$stmt_photo->execute();
											$photo=$stmt_photo->fetch();
											

if(!empty($_FILES['image']['name']))
{
					//For Image
					$image_name=$_FILES['image']['name'];
					$src=$_FILES['image']['tmp_name'];
					$newname=time();
					$temp=explode(".", $image_name);
					$new_name=$newname.".".$temp[1];
					$db_image_name=$new_name;

					$target_dir="images/profile_photo/";
					$file="profile_photo";
					if(!is_dir('images/'.$file))
 						 {
 						 	
  						//echo ("$file is a directory");
  						//echo '<img src="../images/1469265298.jpg"/>';
 						 mkdir("images/$file", 0755); 
 						 }
					move_uploaded_file($src, $target_dir.$db_image_name);
}
else
{
$db_image_name = $photo['user_photo'];	
}
					


$user_Firstname = $_POST['firstname'];	
$user_Middlename=$_POST['middlename'];
$user_Lastname=$_POST['lastname'];
$user_age=$_POST['age'];
$user_gender=$_POST['gender'];
$user_Address=$_POST['address'];
$user_phonenumber=$_POST['phonenumber'];
$user_bloodgroup=$_POST['bloodgroup'];
$user_avialibility=$_POST['aviability'];
$user_status=$_POST['status'];
$user_recentlydonatedtime=$_POST['time'];	

	$stmt_update = $conn->prepare("UPDATE  tbl_user SET  user_Firstname=:user_Firstname, user_Middlename=:user_Middlename, 
								user_Lastname=:user_Lastname, user_Address=:user_Address, user_gender=:user_gender, 
								user_phonenumber=:user_phonenumber, user_age=:user_age, user_bloodgroup=:user_bloodgroup, user_avialibility=:user_avialibility,
								user_status=:user_status, user_recentlydonatedtime=:user_recentlydonatedtime, user_photo=:user_photo WHERE user_id=:user_id");
    
    $stmt_update->bindParam(':user_id' , $_SESSION['id']);
    $stmt_update->bindParam(':user_Firstname' , $user_Firstname);
    $stmt_update->bindParam(':user_Middlename', $user_Middlename);
    $stmt_update->bindParam(':user_Lastname' ,$user_Lastname);
    $stmt_update->bindParam(':user_Address', $user_Address);
    $stmt_update->bindParam(':user_gender' , $user_gender);
    $stmt_update->bindParam(':user_phonenumber' , $user_phonenumber);
    $stmt_update->bindParam(':user_age' , $user_age);
    $stmt_update->bindParam(':user_avialibility' , $user_avialibility);
    $stmt_update->bindParam(':user_status' , $user_status);
    $stmt_update->bindParam(':user_recentlydonatedtime' , $user_recentlydonatedtime);
    $stmt_update->bindParam(':user_bloodgroup' , $user_bloodgroup);
    $stmt_update->bindParam(':user_photo' , $db_image_name);

	if($stmt_update->execute())
	{
		
		$msg = '<div class="alert alert-info">
				<button type="button" class="close" data-dismiss="alert">
				<i class="icon-remove"></i>
				</button>
				<strong>Congrats!</strong>

				Profile Updated successfully.
				<br>
				</div>';
				echo '<script> window.location.href = "profile_click.php"</script>';
		
	}
  
	
 }
 
 ?>

<?php 
											$stmt = $conn->prepare("SELECT * FROM tbl_user WHERE user_id=:user_id"); 
											$stmt->bindParam(':user_id', $_SESSION['id']);
											$stmt->execute();
											$user_data=$stmt->fetch();
											$path = 'images/profile_photo/';
											$default_photo = 'assets/avatars/profile-pic.jpg';
											?>
				<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="icon-home home-icon"></i>
								<a href="#">Home</a>
							</li>

							<li>
								<a href="#">More Pages</a>
							</li>
							<li class="active">User Profile</li>
						</ul><!-- .breadcrumb -->

						
					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								User Profile Page
								
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

						

							

								<div>
									<div id="user-profile-1" class="user-profile row">
										<div class="col-xs-12 col-sm-3 center">
											<div>
												<span class="profile-picture">
													<img  alt="Alex's Avatar" width="250px" height="200px" src="<?php if($user_data['user_photo'] == '') echo $default_photo; else echo $path.$user_data['user_photo']; ?>" />
												</span>

												<div class="space-4"></div>

												<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
													<div class="inline position-relative">
														<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
															<i class="icon-circle light-green middle"></i>
															&nbsp;
															<span class="white"> <?php echo $user_data['user_Firstname']; ?> </span>
														</a>

														<ul class="align-left dropdown-menu dropdown-caret dropdown-lighter">
															<li class="dropdown-header"> Change Status </li>

															<li>
																<a href="#">
																	<i class="icon-circle green"></i>
																	&nbsp;
																	<span class="green">Available</span>
																</a>
															</li>

															<li>
																<a href="#">
																	<i class="icon-circle red"></i>
																	&nbsp;
																	<span class="red">Busy</span>
																</a>
															</li>

															<li>
																<a href="#">
																	<i class="icon-circle grey"></i>
																	&nbsp;
																	<span class="grey">Invisible</span>
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>

											

											

											<div class="hr hr12 dotted"></div>

										

											<div class="hr hr16 dotted"></div>
										</div>

										<div class="col-xs-12 col-sm-9">
											

											<div class="space-12"></div>
											

											<div class="profile-user-info profile-user-info-striped">
												<div class="profile-info-row">
													<div class="profile-info-name"> Username </div>

													<div class="profile-info-value">
														<span class="editable" id="username"><?php echo $user_data['user_Firstname']; ?></span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> Age </div>

													<div class="profile-info-value">
														<span class="editable" id="age"><?php echo $user_data['user_age']; ?></span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> Sex </div>

													<div class="profile-info-value">
														<span class="editable" id="username"><?php echo $user_data['user_gender']; ?></span>
													</div>
												</div>

												

												<div class="profile-info-row">
													<div class="profile-info-name"> Bloodgroup </div>

													<div class="profile-info-value">
														<span class="editable" id="username"><?php echo $user_data['user_bloodgroup']; ?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Contact.No </div>

													<div class="profile-info-value">
														<span class="editable" id="username"><?php echo $user_data['user_phonenumber']; ?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Address</div>

													<div class="profile-info-value">
														<span class="editable" id="username"><?php echo $user_data['user_Address']; ?></span>
													</div>
												</div>
											</div>

											


											<div class="hr hr2 hr-double"></div>

											<div class="space-6"></div>

											
										</div>
									</div>
								</div>

							
								
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->
				
				
				<!--form div starts-->
				<div>


						<form class="form-horizontal" name="infoform" id="infoform" method="POST" action="" enctype="multipart/form-data" role="form">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">First Name </label>

										<div class="col-sm-9">
											<input type="text" id="firstname" value="<?php echo $user_data['user_Firstname']?>" name="firstname" class="col-xs-10 col-sm-5" />
										</div>
									</div>

											<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Profile Image </label>

										<div class="col-sm-9">
											<input type="file" id="image" name="image" />
										</div>
									</div>


									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Middle Name </label>

										<div class="col-sm-9">
											<input type="text" id="middlename" value="<?php echo $user_data['user_Middlename']?>" name="middlename" class="col-xs-10 col-sm-5" />
										</div>
									</div>
									

									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Last Name </label>

										<div class="col-sm-9">
											<input type="text" id="lastname" value="<?php echo $user_data['user_Lastname']?>" name="lastname" class="col-xs-10 col-sm-5" />
										</div>
									</div>
									

									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Address </label>

										<div class="col-sm-9">
											<input type="text" id="address" value="<?php echo $user_data['user_Address']?>" name="address" class="col-xs-10 col-sm-5" />
										</div>
									</div>
									

									<div class="space-4"></div>

								
								<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">  Phone Number </label>

										<div class="col-sm-9">
											<input type="text" id="phonenumber" value="<?php echo $user_data['user_phonenumber']?>" name="phonenumber" class="col-xs-10 col-sm-5" />
										</div>
									</div>
									

									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Gender </label>
											<input  type="radio" name="gender" value="male" <?php if($user_data['user_gender']=='male') echo 'checked'; ?> class="ace" />
									<span class="lbl">Male</span>
									

									<input  type="radio" name="gender" value="female" <?php if($user_data['user_gender']=='female') echo 'checked'; ?> class="ace" />
									<span class="lbl"> Female</span>
										
									</div>
									

										<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-2">Donated time</label>
									<div class="col-sm-4">
											
														
															<select class="form-control" id="time" name="time">
																<option value="0">Recently Donated Time</option>
																<option value="More than 3 Months" <?php if($user_data['user_recentlydonatedtime']=='More than 3 Months') echo 'selected="selected"'; ?>>More than 3 Months</option>
																<option value="More than 6 Months" <?php if($user_data['user_recentlydonatedtime']=='More than 6 Months') echo 'selected="selected"'; ?>>More than 6 Months</option>																
																<option value="More than a year" <?php if($user_data['user_recentlydonatedtime']=='More than a year') echo 'selected="selected"'; ?>> More than a year </option>
															</select>
									</div>
									
									</div>
									<div class="space-4"></div>

																		
										<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Age </label>

									<div class="col-sm-9">
											<input type="number" id="age" value="<?php echo $user_data['user_age']?>" name="age" class="col-xs-10 col-sm-5" />
										</div>
									</div>


										<div class="space-4"></div>
										
								
								
										<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Available For Donation </label>
											<div class="col-sm-8">
											<input  type="radio" name="aviability" value="yes" class="ace" <?php if($user_data['user_avialibility']=='yes') echo 'checked'; ?> />
											<span class="lbl">Yes</span>
									

											<input  type="radio" name="aviability" value="no" class="ace" <?php if($user_data['user_avialibility']=='no') echo 'checked'; ?> />
											<span class="lbl">No</span>
											</div>
										
									</div>
									

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Blood Group</label>

										<div class="col-sm-4">
											
														<div>
															<select class="form-control" id="bloodgroup" name="bloodgroup">
																<option value="0">Select Your Blood Group</option>
																<?php 
																 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    															$stmt = $conn->prepare("SELECT * FROM tbl_category"); 
    															$stmt->execute();

    															// set the resulting array to associative
    															$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    															foreach($stmt->fetchAll() as $k=>$category) { ?> 
        								
																<option value="<?php echo $category['cat_title']; ?>" <?php if($category['cat_title']==$user_data['user_bloodgroup']) echo 'selected="selected"'; ?>><?php echo $category['cat_title']; ?></option>
																<?php } ?>
															</select>
														
										</div>
									</div>
									</div>
									<div class="space-4"></div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Status </label>
											<input  type="radio" name="status" value="yes"  class="ace" <?php if($user_data['user_status']=='yes') echo 'checked'; ?> />
											<span class="lbl">Active</span>
									

											<input  type="radio" name="status" value="no" class="ace" <?php if($user_data['user_status']=='no') echo 'checked'; ?>/>
											<span class="lbl">Inactive</span>
										
									</div>
									

									<div class="space-4"></div>
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" name="updatebtn" type="submit">
												<i class="icon-ok bigger-110"></i>
												Update
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" id="submitbtn2" name="submitbtn2" type="reset">
												<i class="icon-undno bigger-110"></i>
												Reset
											</button>
										</div>
									</div>
</form>
</div>

				
			</div><!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
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
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/typeahead-bs2.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->

		<script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/jquery.gritter.min.js"></script>
		<script src="assets/js/bootbox.min.js"></script>
		<script src="assets/js/jquery.slimscroll.min.js"></script>
		<script src="assets/js/jquery.easy-pie-chart.min.js"></script>
		<script src="assets/js/jquery.hotkeys.min.js"></script>
		<script src="assets/js/bootstrap-wysiwyg.min.js"></script>
		<script src="assets/js/select2.min.js"></script>
		<script src="assets/js/date-time/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/fuelux/fuelux.spinner.min.js"></script>
		<script src="assets/js/x-editable/bootstrap-editable.min.js"></script>
		<script src="assets/js/x-editable/ace-editable.min.js"></script>
		<script src="assets/js/jquery.maskedinput.min.js"></script>

		<!-- ace scripts -->

		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->

		<script type="text/javascript">
			jQuery(function($) {
			
				//editables on first profile page
				$.fn.editable.defaults.mode = 'inline';
				$.fn.editableform.loading = "<div class='editableform-loading'><i class='light-blue icon-2x icon-spinner icon-spin'></i></div>";
			    $.fn.editableform.buttons = '<button type="submit" class="btn btn-info editable-submit"><i class="icon-ok icon-white"></i></button>'+
			                                '<button type="button" class="btn editable-cancel"><i class="icon-remove"></i></button>';    
				
				//editables 
			    $('#username').editable({
					type: 'text',
					name: 'username'
			    });
			
			
				var countries = [];
			    $.each({ "CA": "Canada", "IN": "India", "NL": "Netherlands", "TR": "Turkey", "US": "United States"}, function(k, v) {
			        countries.push({id: k, text: v});
			    });
			
				var cities = [];
				cities["CA"] = [];
				$.each(["Toronto", "Ottawa", "Calgary", "Vancouver"] , function(k, v){
					cities["CA"].push({id: v, text: v});
				});
				cities["IN"] = [];
				$.each(["Delhi", "Mumbai", "Bangalore"] , function(k, v){
					cities["IN"].push({id: v, text: v});
				});
				cities["NL"] = [];
				$.each(["Amsterdam", "Rotterdam", "The Hague"] , function(k, v){
					cities["NL"].push({id: v, text: v});
				});
				cities["TR"] = [];
				$.each(["Ankara", "Istanbul", "Izmir"] , function(k, v){
					cities["TR"].push({id: v, text: v});
				});
				cities["US"] = [];
				$.each(["New York", "Miami", "Los Angeles", "Chicago", "Wysconsin"] , function(k, v){
					cities["US"].push({id: v, text: v});
				});
				
				var currentValue = "NL";
			    $('#country').editable({
					type: 'select2',
					value : 'NL',
			        source: countries,
					success: function(response, newValue) {
						if(currentValue == newValue) return;
						currentValue = newValue;
						
						var new_source = (!newValue || newValue == "") ? [] : cities[newValue];
						
						//the destroy method is causing errors in x-editable v1.4.6
						//it worked fine in v1.4.5
						/**			
						$('#city').editable('destroy').editable({
							type: 'select2',
							source: new_source
						}).editable('setValue', null);
						*/
						
						//so we remove it altogether and create a new element
						var city = $('#city').removeAttr('id').get(0);
						$(city).clone().attr('id', 'city').text('Select City').editable({
							type: 'select2',
							value : null,
							source: new_source
						}).insertAfter(city);//insert it after previous instance
						$(city).remove();//remove previous instance
						
					}
			    });
			
				$('#city').editable({
					type: 'select2',
					value : 'Amsterdam',
			        source: cities[currentValue]
			    });
			
			
			
				$('#signup').editable({
					type: 'date',
					format: 'yyyy-mm-dd',
					viewformat: 'dd/mm/yyyy',
					datepicker: {
						weekStart: 1
					}
				});
			
			    $('#age').editable({
			        type: 'spinner',
					name : 'age',
					spinner : {
						min : 16, max:99, step:1
					}
				});
				
				//var $range = document.createElement("INPUT");
				//$range.type = 'range';
			    $('#login').editable({
			        type: 'slider',//$range.type == 'range' ? 'range' : 'slider',
					name : 'login',
					slider : {
						min : 1, max:50, width:100
					},
					success: function(response, newValue) {
						if(parseInt(newValue) == 1)
							$(this).html(newValue + " hour ago");
						else $(this).html(newValue + " hours ago");
					}
				});
			
				$('#about').editable({
					mode: 'inline',
			        type: 'wysiwyg',
					name : 'about',
					wysiwyg : {
						//css : {'max-width':'300px'}
					},
					success: function(response, newValue) {
					}
				});
				
				
				
				// *** editable avatar *** //
				try {//ie8 throws some harmless exception, so let's catch it
			
					//it seems that editable plugin calls appendChild, and as Image doesn't have it, it causes errors on IE at unpredicted points
					//so let's have a fake appendChild for it!
					if( /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ) Image.prototype.appendChild = function(el){}
			
					var last_gritter
					$('#avatar').editable({
						type: 'image',
						name: 'avatar',
						value: null,
						image: {
							//specify ace file input plugin's options here
							btn_choose: 'Change Avatar',
							droppable: true,
							/**
							//this will override the default before_change that only accepts image files
							before_change: function(files, dropped) {
								return true;
							},
							*/
			
							//and a few extra ones here
							name: 'avatar',//put the field name here as well, will be used inside the custom plugin
							max_size: 110000,//~100Kb
							on_error : function(code) {//on_error function will be called when the selected file has a problem
								if(last_gritter) $.gritter.remove(last_gritter);
								if(code == 1) {//file format error
									last_gritter = $.gritter.add({
										title: 'File is not an image!',
										text: 'Please choose a jpg|gif|png image!',
										class_name: 'gritter-error gritter-center'
									});
								} else if(code == 2) {//file size rror
									last_gritter = $.gritter.add({
										title: 'File too big!',
										text: 'Image size should not exceed 100Kb!',
										class_name: 'gritter-error gritter-center'
									});
								}
								else {//other error
								}
							},
							on_success : function() {
								$.gritter.removeAll();
							}
						},
					    url: function(params) {
							// ***UPDATE AVATAR HERE*** //
							//You can replace the contents of this function with examples/profile-avatar-update.js for actual upload
			
			
							var deferred = new $.Deferred
			
							//if value is empty, means no valid files were selected
							//but it may still be submitted by the plugin, because "" (empty string) is different from previous non-empty value whatever it was
							//so we return just here to prevent problems
							var value = $('#avatar').next().find('input[type=hidden]:eq(0)').val();
							if(!value || value.length == 0) {
								deferred.resolve();
								return deferred.promise();
							}
			
			
							//dummy upload
							setTimeout(function(){
								if("FileReader" in window) {
									//for browsers that have a thumbnail of selected image
									var thumb = $('#avatar').next().find('img').data('thumb');
									if(thumb) $('#avatar').get(0).src = thumb;
								}
								
								deferred.resolve({'status':'OK'});
			
								if(last_gritter) $.gritter.remove(last_gritter);
								last_gritter = $.gritter.add({
									title: 'Avatar Updated!',
									text: 'Uploading to server can be easily implemented. A working example is included with the template.',
									class_name: 'gritter-info gritter-center'
								});
								
							 } , parseInt(Math.random() * 800 + 800))
			
							return deferred.promise();
						},
						
						success: function(response, newValue) {
						}
					})
				}catch(e) {}
				
				
			
				//another option is using modals
				$('#avatar2').on('click', function(){
					var modal = 
					'<div class="modal hide fade">\
						<div class="modal-header">\
							<button type="button" class="close" data-dismiss="modal">&times;</button>\
							<h4 class="blue">Change Avatar</h4>\
						</div>\
						\
						<form class="no-margin">\
						<div class="modal-body">\
							<div class="space-4"></div>\
							<div style="width:75%;margin-left:12%;"><input type="file" name="file-input" /></div>\
						</div>\
						\
						<div class="modal-footer center">\
							<button type="submit" class="btn btn-small btn-success"><i class="icon-ok"></i> Submit</button>\
							<button type="button" class="btn btn-small" data-dismiss="modal"><i class="icon-remove"></i> Cancel</button>\
						</div>\
						</form>\
					</div>';
					
					
					var modal = $(modal);
					modal.modal("show").on("hidden", function(){
						modal.remove();
					});
			
					var working = false;
			
					var form = modal.find('form:eq(0)');
					var file = form.find('input[type=file]').eq(0);
					file.ace_file_input({
						style:'well',
						btn_choose:'Click to choose new avatar',
						btn_change:null,
						no_icon:'icon-picture',
						thumbnail:'small',
						before_remove: function() {
							//don't remove/reset files while being uploaded
							return !working;
						},
						before_change: function(files, dropped) {
							var file = files[0];
							if(typeof file === "string") {
								//file is just a file name here (in browsers that don't support FileReader API)
								if(! (/\.(jpe?g|png|gif)$/i).test(file) ) return false;
							}
							else {//file is a File object
								var type = $.trim(file.type);
								if( ( type.length > 0 && ! (/^image\/(jpe?g|png|gif)$/i).test(type) )
										|| ( type.length == 0 && ! (/\.(jpe?g|png|gif)$/i).test(file.name) )//for android default browser!
									) return false;
			
								if( file.size > 110000 ) {//~100Kb
									return false;
								}
							}
			
							return true;
						}
					});
			
					form.on('submit', function(){
						if(!file.data('ace_input_files')) return false;
						
						file.ace_file_input('disable');
						form.find('button').attr('disabled', 'disabled');
						form.find('.modal-body').append("<div class='center'><i class='icon-spinner icon-spin bigger-150 orange'></i></div>");
						
						var deferred = new $.Deferred;
						working = true;
						deferred.done(function() {
							form.find('button').removeAttr('disabled');
							form.find('input[type=file]').ace_file_input('enable');
							form.find('.modal-body > :last-child').remove();
							
							modal.modal("hide");
			
							var thumb = file.next().find('img').data('thumb');
							if(thumb) $('#avatar2').get(0).src = thumb;
			
							working = false;
						});
						
						
						setTimeout(function(){
							deferred.resolve();
						} , parseInt(Math.random() * 800 + 800));
			
						return false;
					});
							
				});
			
				
			
				//////////////////////////////
				$('#profile-feed-1').slimScroll({
				height: '250px',
				alwaysVisible : true
				});
			
				$('.profile-social-links > a').tooltip();
			
				$('.easy-pie-chart.percentage').each(function(){
				var barColor = $(this).data('color') || '#555';
				var trackColor = '#E2E2E2';
				var size = parseInt($(this).data('size')) || 72;
				$(this).easyPieChart({
					barColor: barColor,
					trackColor: trackColor,
					scaleColor: false,
					lineCap: 'butt',
					lineWidth: parseInt(size/10),
					animate:false,
					size: size
				}).css('color', barColor);
				});
			  
				///////////////////////////////////////////
			
				//show the user info on right or left depending on its position
				$('#user-profile-2 .memberdiv').on('mouseenter', function(){
					var $this = $(this);
					var $parent = $this.closest('.tab-pane');
			
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $this.offset();
					var w2 = $this.width();
			
					var place = 'left';
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) place = 'right';
					
					$this.find('.popover').removeClass('right left').addClass(place);
				}).on('click', function() {
					return false;
				});
			
			
				///////////////////////////////////////////
				$('#user-profile-3')
				.find('input[type=file]').ace_file_input({
					style:'well',
					btn_choose:'Change avatar',
					btn_change:null,
					no_icon:'icon-picture',
					thumbnail:'large',
					droppable:true,
					before_change: function(files, dropped) {
						var file = files[0];
						if(typeof file === "string") {//files is just a file name here (in browsers that don't support FileReader API)
							if(! (/\.(jpe?g|png|gif)$/i).test(file) ) return false;
						}
						else {//file is a File object
							var type = $.trim(file.type);
							if( ( type.length > 0 && ! (/^image\/(jpe?g|png|gif)$/i).test(type) )
									|| ( type.length == 0 && ! (/\.(jpe?g|png|gif)$/i).test(file.name) )//for android default browser!
								) return false;
			
							if( file.size > 110000 ) {//~100Kb
								return false;
							}
						}
			
						return true;
					}
				})
				.end().find('button[type=reset]').on(ace.click_event, function(){
					$('#user-profile-3 input[type=file]').ace_file_input('reset_input');
				})
				.end().find('.date-picker').datepicker().next().on(ace.click_event, function(){
					$(this).prev().focus();
				})
				$('.input-mask-phone').mask('(999) 999-9999');
			
			
			
				////////////////////
				//change profile
				$('[data-toggle="buttons"] .btn').on('click', function(e){
					var target = $(this).find('input[type=radio]');
					var which = parseInt(target.val());
					$('.user-profile').parent().addClass('hide');
					$('#user-profile-'+which).parent().removeClass('hide');
				});
			});
		</script>
	</body>

<!-- Mirrored from 198.74.61.72/themes/preview/ace/profile.html by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 28 Feb 2014 17:46:42 GMT -->
</html>
