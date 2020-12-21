
<?php 
 
$user_profie = user_profile($user_id);
$data = [];
if(!empty($user_profie)){
	$service_url = "https://tickets.mostwantedmodels.com/projects/jobs/issues.json?issue_id=".$_GET['ticket'];
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
		$data = $response['issues'];
		$data = $data[0];

	}

}

// print_r($issues);
?>
<!-- Start Dashboard -->
<style type="text/css">
	.Table > table > tbody > tr > td:last-child {
    text-align: left;
}
</style>
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

							<h4> Open Ticket Detail </h4>

						</div>

						<div class="Table">

							<table class="table table-striped">

								 
								 

									<?php 
									if(!empty($data)){		
									// print_r($data['subject'])	;							 
									?>

									<tr> 
										<th>Subject</th>
										<td><?php echo $data['subject'] ?></td>
										 
									</tr>
									<tr> 
										<th>Project</th>
										<td><?php echo $data['project']['name'] ?></td>
										 
									</tr>
									<tr> 
										<th>Tracker</th>
										<td><?php echo $data['tracker']['name'] ?></td>
										 
									</tr>
									<tr> 
										<th>Status</th>
										<td><?php echo $data['status']['name'] ?></td>
										 
									</tr>
									<tr> 
										<th>Priority</th>
										<td><?php echo $data['priority']['name'] ?></td>
										 
									</tr>
									<tr> 
										<th>author</th>
										<td><?php echo $data['author']['name'] ?></td>
									</tr>
									<tr> 
										<th>Assigned To</th>
										<td><?php echo $data['assigned_to']['name'] ?></td>
									</tr>

									<tr> 
										<th>Date</th>
										<td><?php echo date("d M, Y h:i A", strtotime($data['created_on']));  ?></td>
									</tr>

								

									<?php
									}									 
									?>
									
 
								 

							</table>

						</div>

					</div>


				</div>

			</div>

		</div>

	</div>

</section>

<!-- End Dashboard -->



