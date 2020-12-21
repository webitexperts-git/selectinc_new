
<?php 
 
// $user_session = $this->session->userdata('user');
 
$user_profie = user_profile($user_id);
// print_r($user_profie);
// GET /issues.xml?offset=0&limit=100
// GET /issues.xml?offset=100&limit=100
$issues = [];
if(!empty($user_profie)){
	$service_url = "https://tickets.mostwantedmodels.com/projects/jobs/issues.json?offset=1&limit=100";
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

							<h4> Open Ticket  List </h4>

						</div>

						<div class="Table">

							<table class="table table-striped">

								<thead>

									<tr>

										<!-- <th></th>
										<th>Sr.</th>

										<th>Purpose</th>

										<th>Type</th>

										<th>Descripition</th>

										<th>Location</th>

										<th>Degination</th> -->

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


				</div>

			</div>

		</div>

	</div>

</section>

<!-- End Dashboard -->



