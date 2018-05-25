<?php 
include 'layout/header.php'; ?>
<?php 
$msg = '';
$cat_id = $_GET['id'];
if(isset($_POST['updatebtn']))
{
$title = $_POST['title'];
$status = $_POST['status'];

 // prepare sql and bind parameters
    $stmt_update = $conn->prepare("UPDATE  tbl_category SET  cat_title=:cat_title, cat_status=:cat_status WHERE cat_id=:cat_id");
    $stmt_update->bindParam(':cat_id', $cat_id);
    $stmt_update->bindParam(':cat_title', $title);
    $stmt_update->bindParam(':cat_status', $status);
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

				<?php 
				include 'layout/sidebar.php'; ?>
					
						

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
								<a href="#">Category</a>
							</li>
							<li class="active">Update Category</li>
						</ul><!-- .breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="icon-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- #nav-search -->
					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								Category
								<small>
									<i class="icon-double-angle-right"></i>
									Update category <?php echo $msg; ?>
								</small>
							</h1>
						</div><!-- /.page-header -->
	<?php 
	$stmt = $conn->prepare("SELECT * FROM tbl_category WHERE cat_id=:cat_id"); 
    $stmt->bindParam(':cat_id', $cat_id);
    $stmt->execute();
    $i = 1;
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $category = $stmt->fetch();

    ?>
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<form class="form-horizontal" role="form" method="post" action="" name="categoryform" id="categoryform">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Category title</label>

										<div class="col-sm-9">
											<input type="text" name="title"  id="title" value="<?php echo $category['cat_title']; ?>" placeholder="Category title" class="col-xs-10 col-sm-5" />
										</div>
									</div>


									

									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Status </label>
									
									<input  type="radio" name="status" value="active" <?php if($category['cat_status']=='active') echo 'checked' ; ?> class="ace" />
									<span class="lbl"> Active</span>
									

									<input  type="radio" name="status" value="inactive" <?php if($category['cat_status']=='inactive') echo 'checked' ; ?> class="ace" />
									<span class="lbl"> Inactive</span>
									
									</div>


									
								


									

								


									


									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button name="updatebtn" class="btn btn-info" type="submit">
												<i class="icon-ok bigger-110"></i>
												Update
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="icon-undo bigger-110"></i>
												Reset
											</button>
										</div>
									</div>

									


										
									</div><!-- /row -->

									

									

									

								
									
								</form>

							
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->

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
$('#categoryform').submit(function() {
  var filter = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  var number= /[0-9 -()+]+$/;
  var alpha= /^[a-zA-Z0-9!-”$%&’()*\+,\/;\[\\\]\/\s^_.`{|}~]+$/;
  var phone_no=/^(?:\+\d{2})?\d{10}(?:,(?:\+\d{2})?\d{10})*$/;


  var title=$('#title').val();
 

  //alert(title);


  if(!alpha.test(title))
  {
    $("#title").css({"border": "1px solid red"});
    $('#title').focus();
    setTimeout(function() {
       $('#title').css({"border": "1px solid #ddd"});
   }, 5000);
        return false;
  }




  else 
  {
    $('#categoryform').submit();
  }
});





</script>

		
	</body>

<!-- Mirrored from 198.74.61.72/themes/preview/ace/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 28 Feb 2014 17:46:06 GMT -->
</html>
