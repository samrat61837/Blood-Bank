<?php 
include 'layout_user/header_signup.php'; ?>
<?php 
$msg = '';

if(isset($_POST['updatebtn']))
{
	
$user_id= $_SESSION['id'];	
$user_firstname=$_POST['firstname'];
$user_middlename=$_POST['middlename'];
$user_lastname=$_POST['lastname'];
$user_address=$_POST['address'];
$user_gender=$_POST['gender'];
$user_phonenumber=$_POST['phonenumber'];
$user_age=$_POST['age'];
$user_bloodgroup=$_POST['bloodgroup'];
$user_avialibility=$_POST['aviability'];
$user_status=$_POST['status'];
$user_photo="";
$user_recentlydonatedtime=$_POST['time'];

 // prepare sql and bind parameters
    $stmt_update = $conn->prepare("UPDATE  tbl_user SET  user_Firstname=:fname, user_Middlename=:mname, user_Lastname=:lname, 
    			user_Address=:address, user_gender=:gender, user_phonenumber=:phone, user_age=:age, user_bloodgroup=:bloodgroup, user_recentlydonatedtime=:user_recentlydonatedtime, user_avialibility=:user_avialibility, user_status=:status WHERE user_id=:user_id");
     $stmt_update->bindParam(':user_id', $user_id);
    $stmt_update->bindParam(':status', $user_status);
    
    $stmt_update->bindParam(':fname' , $user_firstname);
    $stmt_update->bindParam( ':mname', $user_middlename);
    $stmt_update->bindParam(':lname' , $user_lastname);
    $stmt_update->bindParam( ':address', $user_address);
    $stmt_update->bindParam(':gender' , $user_gender);
    $stmt_update->bindParam(':phone' , $user_phonenumber);
    $stmt_update->bindParam(':age' , $user_age);
    $stmt_update->bindParam(':bloodgroup' , $user_bloodgroup);
    $stmt_update->bindParam(':user_avialibility' , $user_avialibility);
    $stmt_update->bindParam(':user_recentlydonatedtime' , $user_recentlydonatedtime);
	if($stmt_update->execute())
	{
		
		$msg = '<div class="alert alert-info">
				<button type="button" class="close" data-dismiss="alert">
				<i class="icon-remove"></i>
				</button>
				<strong>Congrats!</strong>

				Data Updated successfully.
				<br>
				</div>';
	echo '<script> window.location.href="profile.php";	</script>';		
	}
}
	?>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>

						
						<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					</script>
				</div>

				<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="icon-home home-icon"></i>
								<a href="#">Signup</a>
							</li>

							<li>
								<a href="#">Forms</a>
							</li>
							<li class="actiev"></li>
						</ul><!-- .breadcrumb -->

						<!--<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="icon-search nav-search-icon"></i>
								</span>
							</form>
						</div> -->
					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								Form Field
								<small>
									<i class="icon-double-angle-right"></i>
									Enter Your Information
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<form class="form-horizontal" name="infoform" id="infoform" method="POST" action="" role="form">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">First Name </label>

										<div class="col-sm-9">
											<input type="text" id="firstname" placeholder="First Name" name="firstname" class="col-xs-10 col-sm-5" />
										</div>
									</div>


									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Middle Name </label>

										<div class="col-sm-9">
											<input type="text" id="middlename" placeholder="Middle Name " name="middlename" class="col-xs-10 col-sm-5" />
										</div>
									</div>
									

									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Last Name </label>

										<div class="col-sm-9">
											<input type="text" id="lastname" placeholder="Last Name" name="lastname" class="col-xs-10 col-sm-5" />
										</div>
									</div>
									

									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Address </label>

										<div class="col-sm-9">
											<input type="text" id="address" placeholder="Address" name="address" class="col-xs-10 col-sm-5" />
										</div>
									</div>
									

									<div class="space-4"></div>

								
								<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">  Phone Number </label>

										<div class="col-sm-9">
											<input type="text" id="phonenumber" placeholder="Phone Number" name="phonenumber" class="col-xs-10 col-sm-5" />
										</div>
									</div>
									

									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Gender </label>
											<input  type="radio" name="gender" value="male" checked class="ace" />
									<span class="lbl">Male</span>
									

									<input  type="radio" name="gender" value="female" class="ace" />
									<span class="lbl"> Female</span>
										
									</div>
									

									<div class="space-4"></div>
									
										<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Age </label>

									<div class="col-sm-9">
											<input type="number" id="age" placeholder="Above 18 - Below 60" name="age" class="col-xs-10 col-sm-5" />
										</div>
									</div>


										<div class="space-4"></div>
										
								
								
										<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Avialibility For Donation </label>
											<input  type="radio" name="aviability" value="yes" checked class="ace" />
											<span class="lbl">Yes</span>
									

											<input  type="radio" name="aviability" value="no" class="ace" />
											<span class="lbl">No</span>
										
									</div>
									<div class="space-4"></div>
									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-2">Donated time</label>
									<div class="col-sm-4">
											<div class="widget-main">
														<div>
															<select class="form-control" id="time" name="time">
																<option value="0">Recently Donated Time</option>
																<option value="Not Yet">Not Yet</option>
																<option value="More than 3 Months">More than 3 Months</option>
																<option value="More than 6 Months">More than 6 Months</option>																
																<option value="More than a year"> More than a year </option>
															</select>
														</div>
										</div>
									</div>
									</div>
									<div class="space-4"></div>
									
									

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Blood Group</label>

										<div class="col-sm-4">
											<div class="widget-main">
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
        								
																<option value="<?php echo $category['cat_title']; ?>"><?php echo $category['cat_title']; ?></option>
																<?php } ?>
															</select>
														</div>
										</div>
									</div>
									</div>
									<div class="space-4"></div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Status </label>
											<input  type="radio" name="status" value="yes" checked class="ace" />
											<span class="lbl">Active</span>
									

											<input  type="radio" name="status" value="no" class="ace" />
											<span class="lbl">Inactive</span>
										
									</div>
									

									<div class="space-4"></div>
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" id="updatebtn" name="updatebtn" type="submit">
												<i class="icon-ok bigger-110"></i>
												Submit
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" id="submitbtn2" name="submitbtn2" type="reset">
												<i class="icon-undno bigger-110"></i>
												Reset
											</button>
										</div>
									</div>
</form>


									

									

											

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
		<script type="text/javascript">
$('#infoform').submit(function() {
  var filter = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  var number= /[0-9 -()+]+$/;
  var alpha= /^[a-zA-Z0-9!-”$%&’()*\+,\/;\[\\\]\/\s^_.`{|}~]+$/;
  var phone_no=/^(?:\+\d{3})?\d{10}(?:,(?:\+\d{2})?\d{10})*$/;


  var firstname=$('#firstname').val();
  var lastname=$('#lastname').val();
  var age=$('#age').val();
  var address=$('#address').val();
  var bloodGroup=$('#bloodgroup').val();
  var phonenumber=$('#phonenumber').val();
  
//alert(firstname);
 


  if(!alpha.test(firstname))
  {
    $("#firstname").css({"border": "1px solid red"});
    $('#firstname').focus();
    setTimeout(function() {
       $('#firstname').css({"border": "1px solid #ddd"});
   }, 5000);
        return false;
  }

  

if(!alpha.test(lastname))
  {
    $("#lastname").css({"border": "1px solid red"});
    $('#lastname').focus();
    setTimeout(function() {
       $('#lastname').css({"border": "1px solid #ddd"});
   }, 5000);
        return false;
  }
  if(!alpha.test(address))
  {
    $("#address").css({"border": "1px solid red"});
    $('#address').focus();
    setTimeout(function() {
       $('#address').css({"border": "1px solid #ddd"});
   }, 5000);
        return false;
  }
   if(!number.test(phonenumber))
  {
    $("#phonenumber").css({"border": "1px solid red"});
    $('#phonenumber').focus();
    setTimeout(function() {
       $('#phonenumber').css({"border": "1px solid #ddd"});
   }, 5000);
        return false;
  }
  if(!alpha.test(age))
  {
    $("#age").css({"border": "1px solid red"});
    $('#age').focus();
    setTimeout(function() {
       $('#age').css({"border": "1px solid #ddd"});
   }, 5000);
        return false;
  }

  if(time==0)
  {
    $("#time").css({"border": "1px solid red"});
    $('#time').focus();
    setTimeout(function() {
       $('#time').css({"border": "1px solid #ddd"});
   }, 5000);
        return false;
  }
 
 
 if(bloodGroup==0)
  {
    $("#bloodgroup").css({"border": "1px solid red"});
    $('#bloodgroup').focus();
    setTimeout(function() {
       $('#bloodgroup').css({"border": "1px solid #ddd"});
   }, 5000);
        return false;
  }
 
  


  else 
  {
    $('#infoform').submit();
  }
});
</script>

		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/typeahead-bs2.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->

		<script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/chosen.jquery.min.js"></script>
		<script src="assets/js/fuelux/fuelux.spinner.min.js"></script>
		<script src="assets/js/date-time/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/date-time/bootstrap-timepicker.min.js"></script>
		<script src="assets/js/date-time/moment.min.js"></script>
		<script src="assets/js/date-time/daterangepicker.min.js"></script>
		<script src="assets/js/bootstrap-colorpicker.min.js"></script>
		<script src="assets/js/jquery.knob.min.js"></script>
		<script src="assets/js/jquery.autosize.min.js"></script>
		<script src="assets/js/jquery.inputlimiter.1.3.1.min.js"></script>
		<script src="assets/js/jquery.maskedinput.min.js"></script>
		<script src="assets/js/bootstrap-tag.min.js"></script>

		<!-- ace scripts -->

		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->

		<script type="text/javascript">
			jQuery(function($) {
				$('#id-disable-check').on('click', function() {
					var inp = $('#form-input-readonly').get(0);
					if(inp.hasAttribute('disabled')) {
						inp.setAttribute('readonly' , 'true');
						inp.removeAttribute('disabled');
						inp.value="This text field is readonly!";
					}
					else {
						inp.setAttribute('disabled' , 'disabled');
						inp.removeAttribute('readonly');
						inp.value="This text field is disabled!";
					}
				});
			
			
				$(".chosen-select").chosen(); 
				$('#chosen-multiple-style').on('click', function(e){
					var target = $(e.target).find('input[type=radio]');
					var which = parseInt(target.val());
					if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
					 else $('#form-field-select-4').removeClass('tag-input-style');
				});
			
			
				$('[data-rel=tooltip]').tooltip({container:'body'});
				$('[data-rel=popover]').popover({container:'body'});
				
				$('textarea[class*=autosize]').autosize({append: "\n"});
				$('textarea.limited').inputlimiter({
					remText: '%n character%s remaining...',
					limitText: 'max allowed : %n.'
				});
			
				$.mask.definitions['~']='[+-]';
				$('.input-mask-date').mask('99/99/9999');
				$('.input-mask-phone').mask('(999) 999-9999');
				$('.input-mask-eyescript').mask('~9.99 ~9.99 999');
				$(".input-mask-product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});
			
			
			
				$( "#input-size-slider" ).css('width','200px').slider({
					value:1,
					range: "min",
					min: 1,
					max: 8,
					step: 1,
					slide: function( event, ui ) {
						var sizing = ['', 'input-sm', 'input-lg', 'input-mini', 'input-small', 'input-medium', 'input-large', 'input-xlarge', 'input-xxlarge'];
						var val = parseInt(ui.value);
						$('#form-field-4').attr('class', sizing[val]).val('.'+sizing[val]);
					}
				});
			
				$( "#input-span-slider" ).slider({
					value:1,
					range: "min",
					min: 1,
					max: 12,
					step: 1,
					slide: function( event, ui ) {
						var val = parseInt(ui.value);
						$('#form-field-5').attr('class', 'col-xs-'+val).val('.col-xs-'+val);
					}
				});
				
				
				$( "#slider-range" ).css('height','200px').slider({
					orientation: "vertical",
					range: true,
					min: 0,
					max: 100,
					values: [ 17, 67 ],
					slide: function( event, ui ) {
						var val = ui.values[$(ui.handle).index()-1]+"";
			
						if(! ui.handle.firstChild ) {
							$(ui.handle).append("<div class='tooltip right in' style='display:none;left:16px;top:-6px;'><div class='tooltip-arrow'></div><div class='tooltip-inner'></div></div>");
						}
						$(ui.handle.firstChild).show().children().eq(1).text(val);
					}
				}).find('a').on('blur', function(){
					$(this.firstChild).hide();
				});
				
				$( "#slider-range-max" ).slider({
					range: "max",
					min: 1,
					max: 10,
					value: 2
				});
				
				$( "#eq > span" ).css({width:'90%', 'float':'left', margin:'15px'}).each(function() {
					// read initial values from markup and remove that
					var value = parseInt( $( this ).text(), 10 );
					$( this ).empty().slider({
						value: value,
						range: "min",
						animate: true
						
					});
				});
			
				
				$('#id-input-file-1 , #id-input-file-2').ace_file_input({
					no_file:'No File ...',
					btn_choose:'Choose',
					btn_change:'Change',
					droppable:false,
					onchange:null,
					thumbnail:false //| true | large
					//whitelist:'gif|png|jpg|jpeg'
					//blacklist:'exe|php'
					//onchange:''
					//
				});
				
				$('#id-input-file-3').ace_file_input({
					style:'well',
					btn_choose:'Drop files here or click to choose',
					btn_change:null,
					no_icon:'icon-cloud-upload',
					droppable:true,
					thumbnail:'small'//large | fit
					//,icon_remove:null//set null, to hide remove/reset button
					/**,before_change:function(files, dropped) {
						//Check an example below
						//or examples/file-upload.html
						return true;
					}*/
					/**,before_remove : function() {
						return true;
					}*/
					,
					preview_error : function(filename, error_code) {
						//name of the file that failed
						//error_code values
						//1 = 'FILE_LOAD_FAILED',
						//2 = 'IMAGE_LOAD_FAILED',
						//3 = 'THUMBNAIL_FAILED'
						//alert(error_code);
					}
			
				}).on('change', function(){
					//console.log($(this).data('ace_input_files'));
					//console.log($(this).data('ace_input_method'));
				});
				
			
				//dynamically change allowed formats by changing before_change callback function
				$('#id-file-format').removeAttr('checked').on('change', function() {
					var before_change
					var btn_choose
					var no_icon
					if(this.checked) {
						btn_choose = "Drop images here or click to choose";
						no_icon = "icon-picture";
						before_change = function(files, dropped) {
							var allowed_files = [];
							for(var i = 0 ; i < files.length; i++) {
								var file = files[i];
								if(typeof file === "string") {
									//IE8 and browsers that don't support File Object
									if(! (/\.(jpe?g|png|gif|bmp)$/i).test(file) ) return false;
								}
								else {
									var type = $.trim(file.type);
									if( ( type.length > 0 && ! (/^image\/(jpe?g|png|gif|bmp)$/i).test(type) )
											|| ( type.length == 0 && ! (/\.(jpe?g|png|gif|bmp)$/i).test(file.name) )//for android's default browser which gives an empty string for file.type
										) continue;//not an image so don't keep this file
								}
								
								allowed_files.push(file);
							}
							if(allowed_files.length == 0) return false;
			
							return allowed_files;
						}
					}
					else {
						btn_choose = "Drop files here or click to choose";
						no_icon = "icon-cloud-upload";
						before_change = function(files, dropped) {
							return files;
						}
					}
					var file_input = $('#id-input-file-3');
					file_input.ace_file_input('update_settings', {'before_change':before_change, 'btn_choose': btn_choose, 'no_icon':no_icon})
					file_input.ace_file_input('reset_input');
				});
			
			
			
			
				$('#spinner1').ace_spinner({value:0,min:0,max:200,step:10, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
				.on('change', function(){
					//alert(this.value)
				});
				$('#spinner2').ace_spinner({value:0,min:0,max:10000,step:100, touch_spinner: true, icon_up:'icon-caret-up', icon_down:'icon-caret-down'});
				$('#spinner3').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'icon-plus smaller-75', icon_down:'icon-minus smaller-75', btn_up_class:'btn-success' , btn_down_class:'btn-danger'});
			
			
				
				$('.date-picker').datepicker({format: 'yyyy/mm/dd',autoclose:true}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				$('input[name=date-range-picker]').daterangepicker().prev().on(ace.click_event, function(){
					$(this).next().focus();
				});
				
				$('#timepicker1').timepicker({
					minuteStep: 1,
					showSeconds: true,
					showMeridian: false
				}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				
				$('#colorpicker1').colorpicker();
				$('#simple-colorpicker-1').ace_colorpicker();
			
				
				$(".knob").knob();
				
				
				//we could just set the data-provide="tag" of the element inside HTML, but IE8 fails!
				var tag_input = $('#form-field-tags');
				if(! ( /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase())) ) 
				{
					tag_input.tag(
					  {
						placeholder:tag_input.attr('placeholder'),
						//enable typeahead by specifying the source array
						source: ace.variable_US_STATES,//defined in ace.js >> ace.enable_search_ahead
					  }
					);
				}
				else {
					//display a textarea for old IE, because it doesn't support this plugin or another one I tried!
					tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
					//$('#form-field-tags').autosize({append: "\n"});
				}
				
				
				
			
				/////////
				$('#modal-form input[type=file]').ace_file_input({
					style:'well',
					btn_choose:'Drop files here or click to choose',
					btn_change:null,
					no_icon:'icon-cloud-upload',
					droppable:true,
					thumbnail:'large'
				})
				
				//chosen plugin inside a modal will have a zero width because the select element is originally hidden
				//and its width cannot be determined.
				//so we set the width after modal is show
				$('#modal-form').on('shown.bs.modal', function () {
					$(this).find('.chosen-container').each(function(){
						$(this).find('a:first-child').css('width' , '210px');
						$(this).find('.chosen-drop').css('width' , '210px');
						$(this).find('.chosen-search input').css('width' , '200px');
					});
				})
				/**
				//or you can activate the chosen plugin after modal is shown
				//this way select element becomes visible with dimensions and chosen works as expected
				$('#modal-form').on('shown', function () {
					$(this).find('.modal-chosen').chosen();
				})
				*/
			
			});
		</script>
	</body>

<!-- Mirrored from 198.74.61.72/themes/preview/ace/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 28 Feb 2014 17:46:06 GMT -->
</html>
