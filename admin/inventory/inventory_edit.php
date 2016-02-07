<?php
require_once("../../models/config.php");
require_once('../../database.php');
require_once('../common.php');

$invent = intval($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // update ID

    $name = $_POST['invent_name'];
	$amount = $_POST['invent_amount'];
	$box_num = $_POST['invent_boxnum'];

    $sql = "UPDATE inventory
    		SET name = :name, amount = :amount, box_num = :box_num
    		WHERE id = :id";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':id', $invent, PDO::PARAM_INT);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
	$stmt->bindParam(':amount', $amount, PDO::PARAM_INT);
	$stmt->bindParam(':box_num', $box_num, PDO::PARAM_STR);
	$stmt->execute();

	header("Location: inventory.php");
} else {
	$sql = "SELECT * FROM inventory WHERE id = :id ";

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':id', $invent, PDO::PARAM_INT);    

	$stmt->execute();

	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	if(!isUserLoggedIn()) {
    	header("Location: ../index.php");
	}

	adminHeader("Dashboard - Inventory Editor", "../");
	navbar("../");
	?>


	<body>

    	<div class="container-fluid">
      		<div class="row">

        		<?php sideNavbar("../"); ?>

            	<div id="main_content" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">


					<?php
					foreach($result as $row) {
					?>
						<script src="jquery.Jcrop.min.js"></script>
						<script src="img-crop-scripts.js"></script>
						<hr>
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<form role="form" method="post" action="">
										<div class="form-group">
											<label for="invent_name">Inventory Name</label>
											<input type="text" class="form-control" id="invent_name" name="invent_name" placeholder="Inventory name" value="<?= $row['name']; ?>">
										</div>
										<div class="form-group">
											<label for="invent_amount">Amount</label>
											<input type="number" class="form-control" id="invent_amount" name="invent_amount" placeholder="amount" value="<?= $row['amount']; ?>" min="0">
										</div>
										<div class="form-group">
											<label for="invent_boxnum">Box Number</label>
											<input type="text" class="form-control" id="invent_boxnum" name="invent_boxnum" placeholder="box number" value="<?= $row['box_num']; ?>">
										</div>
										<button type="submit" class="btn btn-default">submit</submit>
									</form>
								</div>
							</div>
						</div>
						<script type="text/javascript">
						$(".editor").jqte();

						$('#upload_form').ajaxForm({ 
							target: '#upload_crop',

							success: function(){
								$('#upload_form').fadeIn('slow');

							}
						});
						</script>
					<?php
					}
					?>
				</div>
			</div>
		</div>
	</body>
	</html>
<?php
}
?>