
<?php include'layout_user/header_user.php' ?>
<?php include'layout_user/sidebar_user.php' ?>



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
								<a href="#">Users Data</a>
							</li>
							
						</ul><!-- .breadcrumb -->

					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
							Data
								<small>
									<i class="icon-double-angle-right"></i>
									BLOOD CATEGORY
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="container">
								   <br />
								   
								   <div class="form-group">
								    <div class="input-group">
								     <span class="input-group-addon">Search</span>
								     <input type="text" name="search_text" id="search_text" placeholder="Search by User Address" class="form-control" />
								    </div>
								   </div>
								   <br />
								   <div id="result"></div>
								  </div> 

								<div class="row">
									<div class="col-xs-12">
										<div class="table-responsive">
											<table id="sample-table-1" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">
															<label>
																<th>S.N</th>
															</label>
														</th>
														<th>Name</th>
														<th>Bloodgroup</th>

														<th>Address</th>
														<!-- <th>Phone no</th>
														<th>Email</th> -->
														<th>Active</th>
														<th>Action</th>
														
													</tr>
												</thead>
                                          <?php
												$id=$_SESSION['id'];
								
								 
													$stmt = $conn->prepare("SELECT * FROM tbl_user WHERE  user_bloodgroup = 'O -ve'"); 
													$stmt->execute();
													$sn=1;	
														//echo $user_data['user_Firstname'];
														foreach ($stmt->fetchAll() as $k => $v) 
															{
																 
															$user_name =  $v['user_Firstname'];
															$user_email= $v['user_email'];
															$user_bloodgroup =  $v['user_bloodgroup'];
															$user_address =  $v['user_Address'];
															$user_phone =  $v['user_phonenumber'];
															$user_active = $v['user_status']; 


																												
														?>
										
												<tbody>
													<tr>
														<input type="hidden" name="bloodgroup" id="bloodgroup" value="<?php echo $user_bloodgroup ?>">
														<td></td>
														<td><?php echo $sn; $sn++;  ?></td>
														<td><?php echo $user_name;?></td>

														<td >
															<?php echo $user_bloodgroup;?>
														</td>
														<td><?php echo $user_address;?></td>
                                                        <!-- <td><?php echo $user_phone;?></td>
														<td><?php echo $user_email;?></td> -->
														<td><?php echo $user_active;?></td>
														<td>
														<div align="center">
														<a href="" data-toggle="modal" data-target="#exampleModal<?php echo $v['user_id'] ?>"><i class="fa fa-address-book" aria-hidden="true"></i></a>
														 <div align="center">
														<a href="" data-toggle="modal" data-target="#mailModal<?php echo $v['user_id'] ?>"><i class="fa fa-envelope" aria-hidden="true"></i>
														</a>
														</div>
														</td>
													</tr>

												

													
												</tbody>
													<form name=""  method="POST" action="sa.php">
									<div class="modal fade" id="exampleModal<?php echo $v['user_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h5 class="modal-title" id="exampleModalLabel">Your Message</h5>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>
									      <div class="modal-body" >
											<div class="form-group">
												<label class="col-sm-3  control-label no-padding-right" for="form-field-1">Phone No </label>
												<div class="col-sm-9">
													<input type="text" name="num" id="form-field-1" readonly placeholder="Username" value="977<?php echo $user_phone; ?>" class="col-xs-10 col-sm-5">

												</div>
											</div>

											<input type="hidden" name="returnback" value="Onegative">

											<div >
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Message Here</label>
												<div class="col-sm-7">
													<textarea class="form-control" name="msg"placeholder="Your Message Here..."></textarea>
												</div>
											</div>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									        <button type="submit" name="samrat" class="btn btn-primary">Send</button>

									      </div>
									    </div>
									  </div>
									</div>
									</form>
									<!-- Email Model -->
									<form name=""  method="POST" action="sendmail.php">
                  <div class="modal fade" id="mailModal<?php echo $v['user_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Your Message</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body" >
                      <div class="form-group">
                        <label class="col-sm-3  control-label no-padding-right" for="form-field-1">Email </label>
                        <div class="col-sm-9">
                          <input type="text" name="email" id="form-field-1" readonly placeholder="Username" value="<?php echo $user_email; ?>" class="col-xs-10 col-sm-5">

                        </div>
                      </div>

                      <input type="hidden" name="returnback" value="Onegative">

                      <div >
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Message Here</label>
                        <div class="col-sm-7">
                          <textarea class="form-control" name="msg" placeholder="Your Message Here..."></textarea>
                        </div>
                      </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" name="prabin" class="btn btn-primary">Send</button>

                        </div>
                      </div>
                    </div>
                  </div>




 

					</form>			
															<?php 
															} ?>
											</table>
										</div><!-- /.table-responsive -->
									</div><!-- /span -->
								</div><!-- /row -->

								

								

								
								<div class="hr hr-18 dotted hr-double"></div>

								

								<div class="hr hr-18 dotted hr-double"></div>



								<div id="modal-table" class="modal fade" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header no-padding">
												<div class="table-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
														<span class="white">&times;</span>
													</button>
													Results for "Latest Registered Domains
												</div>
											</div>

											

											<div class="modal-footer no-margin-top">
												<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
													<i class="icon-remove"></i>
													Close
												</button>

												<ul class="pagination pull-right no-margin">
													<li class="prev disabled">
														<a href="#">
															<i class="icon-double-angle-left"></i>
														</a>
													</li>

													<li class="active">
														<a href="#">1</a>
													</li>

													<li>
														<a href="#">2</a>
													</li>

													<li>
														<a href="#">3</a>
													</li>

													<li class="next">
														<a href="#">
															<i class="icon-double-angle-right"></i>
														</a>
													</li>
												</ul>
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div><!-- PAGE CONTENT ENDS -->
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

		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.js"></script>

		<!-- ace scripts -->

		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->

		<script type="text/javascript">
		$(document).ready(function(){
						$('#search_text').keyup(function(){
					  	var txt = $(this).val();
					  	var bloodgroup = $('#bloodgroup').val();
					  		if(txt != '')
					  			{
					  				$.ajax({
					  				url:"fetch.php",
					   				method:"POST",
					   				data:{search:txt,
					   				bloodgroup:bloodgroup,
					   			},
					   				dataType:"text",
					   				success:function(data)
					   					{
					    					$('#result').html(data);
					   					}
					  });
					  				
					  			}
					  else
					  {
					  		$('#result').html('');
					   
					   				/*$.ajax({
					   				url:"fetch.php",
					   				method:"POST",
					   				data:{search:txt},
					   				dataType:"text",
					   				success:function(data)
					   					{
					    					$('#result').html(data);
					   					}
					  });*/
					   			}
					 });
					
			 });
			jQuery(function($) {
				var oTable1 = $('#sample-table-2').dataTable( {
				"aoColumns": [
			      { "bSortable": false },
			      null, null,null, null, null,
				  { "bSortable": false }
				] } );
				
				
				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});
						
				});
			
			
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			})
		</script>
	</body>

<!-- Mirrored from 198.74.61.72/themes/preview/ace/tables.html by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 28 Feb 2014 17:45:47 GMT -->
</html>



								