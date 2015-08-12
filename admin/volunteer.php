<?php
	require_once('../database.php');

	$sql = "SELECT v.name, v.email, v.phone, v.t_shirt, CONCAT( ' | ', `volunteer_1` , ' | ', `volunteer_2` , ' | ', `volunteer_3` , ' | ', `volunteer_4` , ' | ', `volunteer_5` ) AS volunteer, vf.t_1, vf.t_2, vf.t_3 
			FROM `Keraton_2015_volunteer` v LEFT JOIN `Keraton_2015_volunteer_followup` vf ON vf.v_id = v.id";

	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$sql_2 = "SELECT name, email, phone, t_shirt, CONCAT( ' | ', `v_1` , ' | ', `v_2` , ' | ', `v_3`) AS volunteer, t_1, t_2, t_3 
			FROM `Keraton_2015_volunteer_v2`";
	$stmt = $conn->prepare($sql_2);
	$stmt->execute();
	$result_2 = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<script src="jquery.Jcrop.min.js"></script>
<script src="img-crop-scripts.js"></script>
<hr>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2 class="sub-header">Volunteer Group A</h2>
			<div class="table-responsive">
				<table id="event-table" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Tshirt</th>
							<th>Volunteer</th>
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
								<td><?= $row['volunteer']; ?></td>
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
		<div class="col-md-12">
			<h2 class="sub-header">Volunteer Group B</h2>
			<div class="table-responsive">
				<table id="event-table-2" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Tshirt</th>
							<th>Volunteer</th>
							<th>Time A</th>
							<th>Time B</th>
							<th>Time C</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 0;
						foreach($result_2 as $row) {
							$i++;
							?>
							<tr>
								<td><?= $i; ?></td>
								<td><?= $row['name']; ?></td>
								<td><?= $row['email']; ?></td>
								<td><?= $row['phone']; ?></td>
								<td><?= $row['t_shirt']; ?></td>
								<td><?= $row['volunteer']; ?></td>
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
		$('#event-table-2').DataTable();
	});
</script>