
<?php 
 
// $user_session = $this->session->userdata('user');
 
$user_profie = user_profile($user_id);
// print_r($user_profie);
$issues = [];
if(!empty($user_profie)){
	$service_url = "https://tickets.mostwantedmodels.com/projects/jobs/issues.json";
	$curl = curl_init($service_url);
	$autho = $user_profie->redmine_username.':'.$user_profie->redmine_password;
	$request_headers = array(
		"Authorization:Basic ".base64_encode($autho),
	);

	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $request_headers);
	$curl_response = curl_exec($curl);
	curl_close($curl);
	$response = json_decode($curl_response, true);

	if(!empty($response['issues'])){
		$issues = $response['issues'];
	}
}

// print_r($issues);
?>
<!-- Start Dashboard -->

<section class="Dashboard">

	<div class="container">

		<div class="row">

			<div class="col-md-3">

				<?php include 'sidebar.php' ?>

			</div>

			<div class="col-md-9">

				<div class="DashboardContent">

					<div class="OpenTicket Box">

						<div class="BoxHeading">

							<h4>My Open Ticket List <a href="<?php echo base_url('view-issues-issues'); ?>"><button type="button" class="btn btn-primary">Show More</button></a></h4>

						</div>

						<div class="Table">

							<table class="table table-striped">

								<thead>

									<tr>

									 

										<th></th>
										<th>Sr.</th>

										<th>Project</th>

										<th>Status</th>

										<th>Subject</th>

										<th>Priority</th>

										<th>Author</th>
										<th>View</th>

									</tr>

								</thead>

								<tbody>

									<?php 
									if(!empty($issues)){
										$i = 0;
										foreach ($issues as $data) {
									?>

									<tr>

										<td>
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
												<label class="custom-control-label" for="customCheck"></label>
											</div>
										</td>

										<td><?php echo ++$i; ?></td>
										<td><?php echo $data['project']['name'] ?></td>
										<td><?php echo $data['tracker']['name'] ?></td>
										<td><?php echo $data['subject'] ?></td>
										<td><?php echo $data['priority']['name'] ?></td>
										<td><?php echo $data['author']['name'] ?></td>
										<td><a class="btn btn-sm btn-info" href="<?php echo base_url('view-issues-issues-detail?ticket=').$data['id'] ?>">VIEW</a></td>
 
									</tr>

									<?php
										}
									}
									?>
									
 
								</tbody>

							</table>

						</div>

					</div>

					<div class="SmallBox">

						<div class="row">

							<div class="col-lg-4 col-md-2">

								<div class="Invoice Box">

									<div class="BoxHeading">

										<h6>Open Invoice (Send)</h6>

										<h5>€ 123,572</h5>

									</div>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>

									<hr />

									<a href="<?php echo base_url('open-invoice-send') ?>"><button type="button" class="btn btn-primary d-block m-auto">Show More</button></a>

								</div>

							</div>

							<div class="col-lg-4 col-md-2">

								<div class="Invoice Box">

									<div class="BoxHeading">

										<h6>Reminders</h6>

										<h5>€ 123,572</h5>

									</div>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>

									<hr />

									<a href="javascript:void(0)"><button type="button" class="btn btn-primary d-block m-auto">Show More</button></a>

								</div>

							</div>

							<div class="col-lg-4 col-md-2">

								<div class="Invoice Box Refund">

									<div class="BoxHeading">

										<h6>Refund Prepared</h6>

										<h5>&nbsp;	</h5>

									</div>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> <strong>19874329387</strong>-D-Esprict Robina and Number <span class="RefundIndicator"></span></p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> <strong>98723898738</strong>-A-Umdnff Ajdsn <span class="RefundIndicator"></span></p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> <strong>19874329387</strong>-D-Esprict Robina and Number <span class="RefundIndicator"></span></p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> <strong>98723898738</strong>-A-Umdnff Ajdsn <span class="RefundIndicator"></span></p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> <strong>19874329387</strong>-D-Esprict Robina and Number <span class="RefundIndicator"></span></p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> <strong>98723898738</strong>-A-Umdnff Ajdsn <span class="RefundIndicator"></span></p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> <strong>19874329387</strong>-D-Esprict Robina and Number <span class="RefundIndicator"></span></p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> <strong>98723898738</strong>-A-Umdnff Ajdsn <span class="RefundIndicator"></span></p>

									<hr />

									<a href="javascript:void(0)"><button type="button" class="btn btn-primary d-block m-auto">Show More</button></a>

								</div>

							</div>

							<div class="col-lg-4 col-md-2">

								<div class="Invoice Box">

									<div class="BoxHeading">

										<h6>Payed Invoices - Ready for refund</h6>

										<h5>€ 123,572</h5>

									</div>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>

									<hr />

									<a href="javascript:void(0)"><button type="button" class="btn btn-primary d-block m-auto">Show More</button></a>

								</div>

							</div>

							<div class="col-lg-4 col-md-2">

								<div class="Invoice Box">

									<div class="BoxHeading">

										<h6>Approved Invoices - Ready for email</h6>

										<h5>€ 123,572</h5>

									</div>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>

									<hr />

									<a href="javascript:void(0)"><button type="button" class="btn btn-primary d-block m-auto">Show More</button></a>

								</div>

							</div>

							<div class="col-lg-4 col-md-2">

								<div class="Invoice Box">

									<div class="BoxHeading">

										<h6>Expenses Overview</h6>

										<h5>€ 123,572</h5>

									</div>

									<div class="Expence">

										<!-- Nav tabs -->

										<ul class="nav nav-tabs">

											<li class="nav-item">

												<a class="nav-link active" data-toggle="tab" href="#Women">Women</a>

											</li>

											<li class="nav-item">

												<a class="nav-link" data-toggle="tab" href="#Men">Men</a>

											</li>

										</ul>



										<!-- Tab panes -->

										<div class="tab-content">

											<div class="tab-pane active" id="Women">												

												<div class="Invoice p-0" >

													<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Ujwkhfewj KUYune oiuj<span class="CheckBg"><img src="<?php echo base_url('assets/frontend/images/check.svg');?>" alt="Icon"></span></p>

													<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Adaa Cee.Number<span class="CheckBg"><img src="<?php echo base_url('assets/frontend/images/check-o.svg');?>" alt="Icon"></span></p>

													<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Aiueiue iuyufnewu <span class="CheckBg"><img src="<?php echo base_url('assets/frontend/images/check.svg');?>" alt="Icon"></span></p>

													<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Ujwkhfewj KUYune oiuj<span class="CheckBg"><img src="<?php echo base_url('assets/frontend/images/check.svg');?>" alt="Icon"></span></p>

													<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Ujwkhfewj KUYune oiuj<span class="CheckBg"><img src="<?php echo base_url('assets/frontend/images/check.svg');?>" alt="Icon"></span></p>

													<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Adaa Cee.Number<span class="CheckBg"><img src="<?php echo base_url('assets/frontend/images/check-o.svg');?>" alt="Icon"></span></p>

												</div>

											</div>

											<div class="tab-pane container fade" id="Men">											

												<div class="Invoice p-0" >

													<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Ujwkhfewj KUYune oiuj<span class="CheckBg"><img src="<?php echo base_url('assets/frontend/images/check.svg');?>" alt="Icon"></span></p>

													<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Adaa Cee.Number<span class="CheckBg"><img src="<?php echo base_url('assets/frontend/images/check-o.svg');?>" alt="Icon"></span></p>

													<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Aiueiue iuyufnewu <span class="CheckBg"><img src="<?php echo base_url('assets/frontend/images/check.svg');?>" alt="Icon"></span></p>

													<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Ujwkhfewj KUYune oiuj<span class="CheckBg"><img src="<?php echo base_url('assets/frontend/images/check.svg');?>" alt="Icon"></span></p>

													<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Ujwkhfewj KUYune oiuj<span class="CheckBg"><img src="<?php echo base_url('assets/frontend/images/check.svg');?>" alt="Icon"></span></p>

													<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> Adaa Cee.Number<span class="CheckBg"><img src="<?php echo base_url('assets/frontend/images/check-o.svg');?>" alt="Icon"></span></p>

												</div>

											</div>

										</div>

									</div>

									<hr />

									<a href="javascript:void(0)"><button type="button" class="btn btn-primary d-block m-auto">Show More</button></a>

								</div>

							</div>

							<div class="col-lg-4 col-md-2">

								<div class="Invoice Box Refund">

									<div class="BoxHeading">

										<h6>Payed Refund</h6>

										<h5>&nbsp;	</h5>

									</div>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> <strong>19874329387</strong>-D-Esprict Robina and Number <span class="RefundIndicator"></span></p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> <strong>98723898738</strong>-A-Umdnff Ajdsn <span class="RefundIndicator"></span></p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> <strong>19874329387</strong>-D-Esprict Robina and Number <span class="RefundIndicator"></span></p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> <strong>98723898738</strong>-A-Umdnff Ajdsn <span class="RefundIndicator"></span></p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> <strong>19874329387</strong>-D-Esprict Robina and Number <span class="RefundIndicator"></span></p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> <strong>98723898738</strong>-A-Umdnff Ajdsn <span class="RefundIndicator"></span></p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> <strong>19874329387</strong>-D-Esprict Robina and Number <span class="RefundIndicator"></span></p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> <strong>98723898738</strong>-A-Umdnff Ajdsn <span class="RefundIndicator"></span></p>

									<hr />

									<a href="javascript:void(0)"><button type="button" class="btn btn-primary d-block m-auto">Show More</button></a>

								</div>

							</div>

							<div class="col-lg-4 col-md-2">

								<div class="Invoice Box Refund">

									<div class="BoxHeading">

										<h6>Payed to Models Overview</h6>

										<h5>&nbsp;	</h5>

									</div>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> <strong>19874329387</strong>-D-Esprict Robina and Number <span class="RefundIndicator"></span></p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> <strong>98723898738</strong>-A-Umdnff Ajdsn <span class="RefundIndicator"></span></p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> <strong>19874329387</strong>-D-Esprict Robina and Number <span class="RefundIndicator"></span></p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> <strong>98723898738</strong>-A-Umdnff Ajdsn <span class="RefundIndicator"></span></p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> <strong>19874329387</strong>-D-Esprict Robina and Number <span class="RefundIndicator"></span></p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> <strong>98723898738</strong>-A-Umdnff Ajdsn <span class="RefundIndicator"></span></p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> <strong>19874329387</strong>-D-Esprict Robina and Number <span class="RefundIndicator"></span></p>

									<p><img src="<?php echo base_url('assets/frontend/images/utilities.svg');?>" alt="Icon"> <strong>98723898738</strong>-A-Umdnff Ajdsn <span class="RefundIndicator"></span></p>

									<hr />

									<a href="javascript:void(0)"><button type="button" class="btn btn-primary d-block m-auto">Show More</button></a>

								</div>

							</div>

							<div class="col-lg-4 col-md-2">

								<div class="Invoice Box">

									<div class="BoxHeading">

										<h6>Ticket On Hold</h6>

										<h5>&nbsp;	</h5>

									</div>

									<div class="Ticket">

										<h6>On Hold Contract Missing  <span class="badge badge-primary">34</span></h6>

										<div class="row">

											<div class="col-2">

												<div class="custom-control custom-checkbox">

													<input type="checkbox" class="custom-control-input" id="customCheck8" name="example1">

													<label class="custom-control-label" for="customCheck8">&#160;</label>

												</div>												

											</div>

											<div class="col-3">

												<p>87687</p>

											</div>

											<div class="col-2">

												<p>Job</p>

											</div>

											<div class="col-5">

												<p>On Hold Contract Missing</p>

											</div>

										</div>

										<div class="row">

											<div class="col-2">

												<div class="custom-control custom-checkbox">

													<input type="checkbox" class="custom-control-input" id="customCheck8" name="example1">

													<label class="custom-control-label" for="customCheck8">&#160;</label>

												</div>												

											</div>

											<div class="col-3">

												<p>87687</p>

											</div>

											<div class="col-2">

												<p>Job</p>

											</div>

											<div class="col-5">

												<p>On Hold Contract Missing</p>

											</div>

										</div>

										<div class="row">

											<div class="col-2">

												<div class="custom-control custom-checkbox">

													<input type="checkbox" class="custom-control-input" id="customCheck8" name="example1">

													<label class="custom-control-label" for="customCheck8">&#160;</label>

												</div>												

											</div>

											<div class="col-3">

												<p>87687</p>

											</div>

											<div class="col-2">

												<p>Job</p>

											</div>

											<div class="col-5">

												<p>On Hold Contract Missing</p>

											</div>

										</div>

										<div class="row">

											<div class="col-2">

												<div class="custom-control custom-checkbox">

													<input type="checkbox" class="custom-control-input" id="customCheck8" name="example1">

													<label class="custom-control-label" for="customCheck8">&#160;</label>

												</div>												

											</div>

											<div class="col-3">

												<p>87687</p>

											</div>

											<div class="col-2">

												<p>Job</p>

											</div>

											<div class="col-5">

												<p>On Hold Contract Missing</p>

											</div>

										</div>

										<div class="row">

											<div class="col-2">

												<div class="custom-control custom-checkbox">

													<input type="checkbox" class="custom-control-input" id="customCheck8" name="example1">

													<label class="custom-control-label" for="customCheck8">&#160;</label>

												</div>												

											</div>

											<div class="col-3">

												<p>87687</p>

											</div>

											<div class="col-2">

												<p>Job</p>

											</div>

											<div class="col-5">

												<p>On Hold Contract Missing</p>

											</div>

										</div>

										<div class="row">

											<div class="col-2">

												<div class="custom-control custom-checkbox">

													<input type="checkbox" class="custom-control-input" id="customCheck8" name="example1">

													<label class="custom-control-label" for="customCheck8">&#160;</label>

												</div>												

											</div>

											<div class="col-3">

												<p>87687</p>

											</div>

											<div class="col-2">

												<p>Job</p>

											</div>

											<div class="col-5">

												<p>On Hold Contract Missing</p>

											</div>

										</div>

										<div class="row">

											<div class="col-2">

												<div class="custom-control custom-checkbox">

													<input type="checkbox" class="custom-control-input" id="customCheck8" name="example1">

													<label class="custom-control-label" for="customCheck8">&#160;</label>

												</div>												

											</div>

											<div class="col-3">

												<p>87687</p>

											</div>

											<div class="col-2">

												<p>Job</p>

											</div>

											<div class="col-5">

												<p>On Hold Contract Missing</p>

											</div>

										</div>

										<hr />

										<a href="javascript:void(0)"><button type="button" class="btn btn-primary d-block m-auto">Show More</button></a>

									</div>

								</div>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

</section>

<!-- End Dashboard -->



