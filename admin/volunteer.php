<?php
	require_once("../models/config.php");
	require_once('../database.php');
	require_once('common.php');

	$sql = "SELECT * FROM Keraton_2016_volunteer";

	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	if(!isUserLoggedIn()) {
    	header("Location: index.php");
  	}

	adminHeader("Dashboard - Keraton 2016 Volunteer", "");
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
							<h2 class="sub-header">Volunteer</h2>
							<div class="table-responsive">
								<table id="event-table" class="display" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Name</th>
											<th>Email</th>
											<th>Phone</th>
											<th>Tshirt</th>
											<th>Volunteer 1</th>
											<th>Volunteer 2</th>
											<th>Volunteer 3</th>
											<th>Time A</th>
											<th>Time B</th>
											<th>Time C</th>
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
												<td><?= $row['phone']; ?></td>
												<td><?= $row['t_shirt']; ?></td>
												<td><?= $row['v_1']; ?></td>
												<td><?= $row['v_2']; ?></td>
												<td><?= $row['v_3']; ?></td>
												<td><?= $row['t_1']; ?></td>
												<td><?= $row['t_2']; ?></td>
												<td><?= $row['t_3']; ?></td>
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