<?php
	require_once("../models/config.php");
	require_once('common.php');

	$servername = "localhost";
	$db_name = "isauw_member";
	$username = "isauw";
	$password = "Welcome2014";

	// Create connection
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
		//Connect to database
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

	if(!isUserLoggedIn()) {
    	header("Location: index.php");
  	}

	$sql = "SELECT * FROM member";

	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

adminHeader("Dashboard - Member", "");
navbar("");
?>
<body>

    <div class="container-fluid">
      	<div class="row">

        	<?php sideNavbar(""); ?>

            <div id="main_content" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
				<script src="jquery.Jcrop.min.js"></script>
				<script src="img-crop-scripts.js"></script>
				<hr>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h2 class="sub-header">Member List</h2>
							<h3>Total member: <?= sizeof($result) ?></h3>
							<div class="table-responsive">
								<table id="event-table" class="display" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Name</th>
											<th>Email</th>
											<th>Major</th>
											<th>Standing</th>
											<th>Sign-up Date</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$i = 0;
										foreach($result as $row) {
											$i++;
											?>
											<tr>
												<td><?= $i; ?></td>
												<td><?= $row['name']; ?></td>
												<td><?= $row['email']; ?></td>
												<td><?= $row['major']; ?></td>
												<td><?= $row['standing']; ?></td>
												<td><?= $row['sign_up_date']; ?></td>
											</tr>
											<?php
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<script>
					$(document).ready(function() {
						$('#event-table').DataTable();
					});
				</script>
			</div>
		</div>
	</div>
</body>
</html>