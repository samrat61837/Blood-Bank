<?php include 'layout/header.php'; ?>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>

				<!-- Sidebar -->
				<?php include 'layout/sidebar.php'; ?>
				<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="icon-user home-icon"></i>
								<a href="#">Home</a>
							</li>

							<li>
								<a href="#">User</a>
							</li>
							
						</ul><!-- .breadcrumb -->

					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>User
								<small>
									<i class="icon-double-angle-right"></i>
									View
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="row">
									<div class="col-xs-12">
										<div class="table-responsive">
											<table id="sample-table-1" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">
															<label>
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>
														<th>S.N</th>
														<th>Email</th>
														<th>Name</th>
														<th>Address</th>
														<th>Gender</th>
														<th>Phone Number</th>
														<th>Age</th>
														<th>Blood Group</th>
														<th>Recently Donated Time</th>
														<th>Status</th>
														<th>Action</th>
													</tr>
												</thead>

												<tbody>
												<?php 
												$stmt = $conn->prepare("SELECT * FROM tbl_user"); 
    											$stmt->execute();
    											$i = 1;
    											// set the resulting array to associative
    											$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    											foreach($stmt->fetchAll() as $k=>$v) 
    												{ ?>
													<tr>
														<td class="center">
															<label>
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>

														<td>
															<?php echo $i; ?>
														</td>
														<td><?php echo $v['user_email']; ?></td>
														<td><?php echo $v['user_Firstname']." ".$v['user_Middlename']." ".$v['user_Lastname']; ?></td>
														<td><?php echo $v['user_Address']; ?></td>
														<td><?php echo $v['user_gender']; ?></td>
														<td><?php echo $v['user_phonenumber']; ?></td>
														<td><?php echo $v['user_age']; ?></td>
														<td><?php echo $v['user_bloodgroup']; ?></td>
														<td><?php echo $v['user_recentlydonatedtime']; ?></td>
														<td><?php echo $v['user_status']; ?></td>
														

														<!--
														<?php if ($v['cat_status'] == 'active'){ ?>
															<span class="label label-sm label-success">Active</span>
														<?php } else { ?>
															<span class="label label-sm label-danger">Inactive</span>
														<?php } ?>
														</td>-->

														<td>
															<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
																

																<a href="view.php?id=<?php echo $v['user_id']; ?>" class="btn btn-xs btn-success">
																	<i class="icon-eye-open bigger-120"></i>
																</a>

																<a href="userdeletecategory.php?id=<?php echo $v['user_id']; ?>" class="btn btn-xs btn-danger">
																	<i class="icon-trash bigger-120"></i>
																</a>

																
															</div>

															<div class="visible-xs visible-sm hidden-md hidden-lg">
																<div class="inline position-relative">
																	<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
																		<i class="icon-cog icon-only bigger-110"></i>
																	</button>

																	<ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
																		<li>
																			<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																				<span class="blue">
																					<i class="icon-zoom-in bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<li>
																			<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
																				<span class="green">
																					<i class="icon-edit bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																				<span class="red">
																					<i class="icon-trash bigger-120"></i>
																				</span>
																			</a>
																			<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																				<span class="red">
																					<i class="icon-trash bigger-120"></i>
																				</span>
																			</a>
																		</li>
																	</ul>
																</div>
															</div>
														</td>
													</tr>
												<?php $i++; } ?>
									
												</tbody>
											</table>
										</div><!-- /.table-responsive -->
									</div><!-- /span -->
								</div><!-- /row -->

								<div class="hr hr-18 dotted hr-double"></div>

							
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
