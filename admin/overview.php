<?php
	require_once "../models/config.php";
	require_once('../database.php');

	if(!isUserLoggedIn()) {
	  header("Location: index.php");
	}

	$sql = "SELECT o.department_id, o.primary_id, o.name, o.standing, o.major, o.graduation, o.head, o.media, p.primary_name, d.department_name, d.email
            FROM officer o
            INNER JOIN primary_pos p ON p.id = o.primary_id
            LEFT JOIN department d ON d.id = o.department_id
            GROUP BY name
            ORDER BY RAND() LIMIT 1";

	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
	<div class="row">
		<div class="col-md-3">
			<h3>ISAUW Officer</h3>
			<?php
			foreach ($result as $row) {
			?>
			<div class="officer text-center">
				<div class="off-item">
					<div class="off-info">
						<div class="off-info-front">
							<img src="../<?= $row['media'] ?>" class="img-circle img-thumbnail img-responsive">
						</div>
						<div class="off-info-back">
							<p><?= $row['standing'] ?><br><?= $row['major'] ?><br><?= $row['graduation'] ?></p>
						</div>
					</div>
				</div>
			<span class="off-name"><strong><?= $row['name'] ?></strong></span><br><span class="off-title"><?= $row['department_name'] ?></span>
			</div>
			<?php } ?>
		</div>
		<div class="col-md-6">
			<h3>Instructions</h3>
			<p>Please select the section you want to edit from the side bar. You can add or edit the information that is already been inserted. Special cases:
				<ul>
					<li>You can upload photos in special cases.</li>
					<li>A window will open for you to crop the photo to <em>square</em></li>
					<li><strong>NOTE:</strong> If image file is too large, you will have to <em>refresh</em> the page</li>
				</ul>
		</div>
		<?php
			$sql = "SELECT *
			FROM event";

			$stmt = $conn->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		?>
		<div class="col-md-12">
			<h2 class="sub-header">Latest Events</h2>
			<div class="table-responsive">
				<table id="event-table" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>#</th>
							<th>Event Name</th>
							<th>Location</th>
							<th>Date</th>
							<th>Time</th>
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
									<td><?= $row['location']; ?></td>
									<td><?= $row['date']; ?></td>
									<td><?= $row['time']; ?></td>
									<td><a href="event_edit.php?id=<?=$row['id']; ?>" class="btn btn-default event-edit">Edit</a></td>
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

		
		$(".event-edit").click(function(e){
			e.preventDefault();
			var link = $(this).attr('href');
			console.log(link);
			//alert(link);
			$.ajax({url:link,success:function(result){
				//alert(result);
				$("#main_content").html(result);
			}});
		});


});

</script>