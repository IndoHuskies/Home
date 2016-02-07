<?php
	require_once("../../models/config.php");
	require_once('../../database.php');
	require_once('../common.php');

	$sql = "SELECT i.id AS id, i.name AS name, i.amount AS amount, i.box_num AS box_num
			FROM  `inventory` i";

	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	if(!isUserLoggedIn()) {
    	header("Location: ../index.php");
	}

adminHeader("Dashboard - Inventory", "../");
navbar("../");
?>
<body>

    <div class="container-fluid">
      	<div class="row">

        	<?php sideNavbar("../"); ?>

            <div id="main_content" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
				<script src="jquery.Jcrop.min.js"></script>
				<script src="img-crop-scripts.js"></script>
				<hr>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<form role="form" method="post" action="new_inventory.php">
								<div class="form-group">
									<label>
										<label for="invent_name">Inventory Name</label>
										<input type="text" class="form-control" id="invent_name" name="invent_name" placeholder="name">
									</label>
								</div>
								<div class="form-group">
									<label>
										<label for="invent_amount">Amount</label>
										<input type="number" class="form-control" id="invent_amount" name="invent_amount" placeholder="amount" value="0" min="0">
									</label>
								</div>
								<div class="form-group">
									<label>
										<label for="invent_boxnum">Box Number</label>
										<input type="text" class="form-control" id="invent_boxnum" name="invent_boxnum" placeholder="box number">
									</label>
								</div>
								<button type="submit" class="btn btn-default">Submit</submit>
							</form>
						</div>
						<div class="col-md-12">
							<h2 class="sub-header">Inventory List</h2>
							<div class="table-responsive">
								<table id="event-table" class="display" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Name</th>
											<th>Amount</th>
											<th>Box Number</th>
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
													<td><?= $row['amount']; ?></td>
													<td><?= $row['box_num']; ?></td>
													<td>
														<a href="inventory_edit.php?id=<?= $row['id']; ?>" class="btn btn-default comm-edit">Edit</a>
														<a href="inventory_delete.php?id=<?= $row['id']; ?>" class="btn btn-danger">DELETE</a>
													</td>
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
						$(".editor").jqte();

						$('#upload_form').ajaxForm({ 
							target: '#upload_crop',

							success: function(){
								$('#upload_form').fadeIn('slow');
							}
						});

						$(".comm-edit").click(function(e){
							e.preventDefault();
							var link = $(this).attr("href");
							console.log(link);
							// alert(link);
							$.ajax({url:link,success:function(result){
								$("#main_content").html(result);
							}});
						});
					});
				</script>
			</div>
		</div>
	</div>
</body>
</html>