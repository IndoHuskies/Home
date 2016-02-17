<?php
	require_once("../../models/config.php");
	require_once('../../database.php');
	require_once('../common.php');

	$sql = "SELECT i.id AS id, i.name AS name, i.amount AS amount, i.box_num AS box_num
			FROM  `inventory` i";

	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$json = json_encode($result);

	$sql_co = "SELECT i.id AS item_id, co.id AS co_id, i.name AS name, co.pic AS pic, co.amount AS amount, co.checkout_date AS co_date
			FROM  `inventory` i INNER JOIN `inventory_checkout` co ON co.item_id = i.id";

	$stmt_co = $conn->prepare($sql_co);
	$stmt_co->execute();
	$result_co = $stmt_co->fetchAll(PDO::FETCH_ASSOC);

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
						<h3>Instructions:</h3>
						<ul class="col-md-6">
							<li>Before checking in any items, please check the Inventory List below</li>
							<li>If the same item already exists, then please edit the amount of the items</li>
							<li>Remove items with 0 amount if needed</li>
							<li>If needed, you can edit each item through the Inventory List</li>
						</ul>
						<ul class="col-md-6">
							<li>Make sure to keep updating the Check Out List below</li>
							<li>Don't forget, when you return any items, fill in the check out form and update it as needed</li>
							<li>You can return items by pressing the "Return" button in the Check Out List</li>
							<li>For returning items, please return the same amount you checked in</li>
							<li>If the returned items are less than what it was borrowed, make a new check out ticket</li>
						</ul>
						<div class="col-md-6">
							<form role="form" method="post" action="new_inventory.php">
								<h2>Check-In</h2>
								<hr>
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
						<div class="col-md-4">
							<form id="invent_co_form" role="form" onsubmit="return false;">
								<h2>Check-Out</h2>
								<hr>
								<div class="form-group">
									<label for="invent_co_item">Item:</label>
									<select class="form-control" name="invent_co_item" id="invent_co_item">
										<option value="" disabled selected></option>
									</select>
								</div>
								<div class="form-group" style="visibility:hidden;">
									<label for="invent_co_amount">Amount:</label>
									<input type="number" class="form-control" id="invent_co_amount" name="invent_co_amount" placeholder="amount" value="0" min="0" required>
								</div>
								<div class="form-group" id="invent_co_box" style="visibility:hidden">
									<label></label>
								</div>
								<div class="form-group">
									<label for="invent_co_pic">PIC:</label>
									<input type="text" class="form-control" id="invent_co_pic" name="invent_co_pic" placeholder="PIC" required>
								</div>
								<button id="submit_co" type="submit" class="btn btn-default">Submit</submit>
							</form>
						</div>
						<div class="col-md-12">
							<h2 class="sub-header">Checkout List</h2>
							<div class="table-responsive">
								<table id="co-table" class="display" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Name</th>
											<th>Amount</th>
											<th>PIC</th>
											<th>Checkout Date</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<?php
											$i = 0;
											foreach($result_co as $row) {
												$i++;
												?>
												<tr>
													<td><?= $i; ?></td>
													<td><?= $row['name']; ?></td>
													<td><?= $row['amount']; ?></td>
													<td><?= $row['pic']; ?></td>
													<td><?= $row['co_date']; ?></td>
													<td>
														<a href="#" class="btn btn-default return-co" data-toggle="modal" data-target="#basicModal">Return</a>
														<div class="confirm_return" style="display: none;">
															<label>Confirm?</label>
															<a href="inventory_return.php?id=<?= $row['co_id']; ?>&amp;item=<?= $row['item_id']; ?>&amp;amount=<?= $row['amount']; ?>" class="btn btn-danger">Yes</a>
														</div>
													</td>
												</tr>
												<?php
											}
										?>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-md-12">
							<h2 class="sub-header">Inventory List</h2>
							<div class="table-responsive">
								<table id="invent-table" class="display" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Name</th>
											<th>Amount</th>
											<th>Box Number</th>
											<th>Edit</th>
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
					var invent = <?php echo $json ?>;
					var index = 0;
					$(document).ready(function() {
						// attach to select options
						$.each(invent, function(i, item) {
							$('#invent_co_item').append("<option value=\"" + item.id + "\">" + item.name + "</option>");
						});

						// event for selection
						$( "#invent_co_item" ).change(function() {
							var id = $( "#invent_co_item option:selected" ).val();
							$.each(invent, function(i, item) {
								if (item.id === id) {
									index = i;
								}
							});
							$("#invent_co_amount").parent().css("visibility", "visible");
							$("#invent_co_box").css("visibility", "visible");
							$("#invent_co_box label").text("Item is located in Box #: " + invent[index].box_num);
							// need to check max when submitting
							$("#invent_co_amount").attr("max", invent[index].amount);
						});


						$("#submit_co").click(function(e) {
							// Validate first
							if(!$('#invent_co_form')[0].checkValidity()) {
								alert("Please fill out all the required fields!");
								return false;
							} else {
								var amount_co = parseInt($("#invent_co_amount").val());
								var amount_legal = parseInt(invent[index].amount);
								if ( amount_co > amount_legal || amount_co <= 0) {
									alert("Amount is not legal! Please check the amount in the list.");
									return false;
								}
							}
							
							var tdate = new Date();
							var dd = tdate.getDate(); //yields day
							var mm = tdate.getMonth()+1; //yields month
							var yyyy = tdate.getFullYear(); //yields year
							var xxx = yyyy + "-" + mm + "-" + dd;
							
					        var formData =
					        {
					            itemId: $('#invent_co_item').find(":selected").val(),
					    		amount: $('#invent_co_amount').val(),
					    		start_amount : invent[index].amount,
					    		pic: $('#invent_co_pic').val(),
					    		dates: xxx
					            
					        }
					        
					        e.preventDefault(); //STOP default action

        					
					        $.ajax({
					            url: 'inventory_checkout.php',
					            type: 'POST',
					            data: formData
					        }).success(function( msg ) {
					            location.reload();
					        }).fail(function() {
					            alert("Error: Server not available");

					        });
						});

						// handle return
						$(".return-co").click(function() {
							if($(this).siblings(".confirm_return").css("display") == "block") {
								$(this).siblings(".confirm_return").css("display", "none");
								$(this).text("Return");
							} else {
								$(this).siblings(".confirm_return").css("display", "block");
								$(this).text("Hide");
							}
						});

						$('#co-table').DataTable();
						$('#invent-table').DataTable();
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