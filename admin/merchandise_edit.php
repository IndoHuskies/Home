<?php
require_once("../models/config.php");
require_once('../database.php');
require_once('common.php');

$merch = intval($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // update ID

    $name = $_POST['merch_name'];
	$price = $_POST['merch_price'];
	$small = $_POST['merch_small'];
	$medium = $_POST['merch_medium'];
	$large = $_POST['merch_large'];
	$x_large = $_POST['merch_xlarge'];
	$media = $_POST['profile'];

    $sql = "UPDATE merchandise
    		SET name = :name, s = :small, m = :medium, l = :large, xl = :xlarge,
    			image = :image, price = :price
    		WHERE id = :id";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':id', $merch, PDO::PARAM_INT);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
	$stmt->bindParam(':small', $small, PDO::PARAM_INT);
	$stmt->bindParam(':medium', $medium, PDO::PARAM_INT);
	$stmt->bindParam(':large', $large, PDO::PARAM_INT);
	$stmt->bindParam(':xlarge', $x_large, PDO::PARAM_INT);
	$stmt->bindParam(':price', $price, PDO::PARAM_STR);
	$stmt->bindParam(':image', $media, PDO::PARAM_STR);
	$stmt->execute();

	header("Location: merchandise.php");
} else {
	$sql = "SELECT * FROM merchandise WHERE id = :id ";

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':id', $merch, PDO::PARAM_INT);    

	$stmt->execute();

	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	if(!isUserLoggedIn()) {
    	header("Location: index.php");
	}

	adminHeader("Dashboard - Merchandise Editor");
	navbar();
	?>


	<body>

    	<div class="container-fluid">
      		<div class="row">

        		<?php sideNavbar(); ?>

            	<div id="main_content" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">


					<?php
					foreach($result as $row) {
					?>
						<script src="jquery.Jcrop.min.js"></script>
						<script src="img-crop-scripts.js"></script>
						<hr>
						<div class="container">
							<div class="row">
								<div class="col-md-6">
									<form role="form" method="post" action="">
										<div class="form-group">
											<label for="merch_name">Merchandise Name</label>
											<input type="text" class="form-control" id="merch_name" name="merch_name" placeholder="Merchandise name" value="<?= $row['name']; ?>">
										</div>
										<div class="form-group">
											<label for="merch_price">Price</label>
											<input type="number" step="0.01" class="form-control" id="merch_price" name="merch_price" placeholder="price" value="<?= $row['price']; ?>">
										</div>
										<div class="form-group">
											<label>Quantity &amp; Size</label>
											<div>
												<label>
													<input type="number" name="merch_small" value="<?= $row['s']; ?>" min="0">
													Small
												</label>
											</div>
											<div>
												<label>
													<input type="number" name="merch_medium" value="<?= $row['m']; ?>" min="0">
													Medium
												</label>
											</div>
											<div>
												<label>
													<input type="number" name="merch_large" value="<?= $row['l']; ?>" min="0">
													Large
												</label>
											</div>
											<div>
												<label>
													<input type="number" name="merch_xlarge" value="<?= $row['xl']; ?>" min="0">
													Xtra - Large
												</label>
											</div>
										</div>
										<input type="text" name="profile" id="profileImg" style="visibility: hidden; display: inline;">
										<button type="submit" class="btn btn-default">submit</submit>
									</form>
								</div>
								<div class="col-md-6">
									<form id="upload_form" enctype="multipart/form-data" method="post" action="upload.php" onsubmit="return checkForm()">
										<p class="bg-danger">NOTICE: Please upload an image for the event</p>
										<hr>
											<!-- hidden crop params -->
										<input type="hidden" id="x1" name="x1" />
										<input type="hidden" id="y1" name="y1" />
										<input type="hidden" id="x2" name="x2" />
										<input type="hidden" id="y2" name="y2" />

										<h5>Step1: Please select image file</h5>
										<div><input type="file" name="image_file" id="image_file" class="btn btn-default" onchange="fileSelectHandler()" /></div>

										<div class="error"></div>

										<div id="lightbox" class="step2">
											<h5>Step2: Please select a crop region</h5>
											<input id="img_upload_button" type="submit" class="btn btn-primary" value="Upload" style="width: 100%"/>
											<hr>
											<img id="preview" />

											<div class="info" style="display: none;">
												<label>File size</label> <input type="text" id="filesize" name="filesize" />
												<label>Type</label> <input type="text" id="filetype" name="filetype" />
												<label>Image dimension</label> <input type="text" id="filedim" name="filedim" />
												<label>W</label> <input type="text" id="w" name="w" />
												<label>H</label> <input type="text" id="h" name="h" />
											</div>

										</div>
									</form>
									<div class="col-md-4" id="upload_crop">
										<!-- Image Echo for profile, using class="img-thumbnail img-circle" -->
										<img src="../<?= $row['media'] ?>" alt="profile_preview" class="img-thumbnail img-circle">
									</div>
								</div>
							</div>
						</div>
						<script type="text/javascript">
						$(".editor").jqte();

						$('#upload_form').ajaxForm({ 
							target: '#upload_crop',

							success: function(){
								$('#upload_form').fadeIn('slow');

								var src = $('img[alt="profile_preview"]').attr('src');

								$("#profileImg").val(src);
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