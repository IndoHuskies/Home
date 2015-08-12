<?php
	require_once('../database.php');

	$sql = "SELECT * 
			FROM officer o
			JOIN department d ON o.department_id = d.id
			JOIN primary_pos p ON o.primary_id = p.id";

	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<script src="jquery.Jcrop.min.js"></script>
<script src="img-crop-scripts.js"></script>
<hr>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2 class="sub-header">Officer List</h2>
			<div class="table-responsive">
				<table id="event-table" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Department</th>
							<th>Primary</th>
							<th>edit</th>
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
								<td><?= $row['department_name']; ?></td>
								<td><?= $row['primary_name']; ?></td>
								<td><a href="officer_edit.php?id=<?= $row['id']; ?>" class="btn btn-default">Edit</a></td>
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