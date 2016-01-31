<?php
  	require_once("../../models/config.php");
	require_once('../../database.php');
	require_once('../common.php');


	$sql = "SELECT *
			FROM homepage
			ORDER BY id
			LIMIT 3";

	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	if(!isUserLoggedIn()) {
    	header("Location: index.php");
  	}

  	adminHeader("Dashboard - Homepage", "../");
  	navbar("../");
?>

<body>

    <div class="container-fluid">
      	<div class="row">

        	<?php sideNavbar("../"); ?>

            <div id="main_content" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
				<hr>
				<div class="container">
	
					<h1>Home Page Image</h1>

					<?php
					$i = 0;
						foreach($result as $row) {
							$i++;
					?>
					<div class="row">
						<div class="col-md-6">
							<img src="../../<?= $row['img'] ?>" class="img-responsive img-thumbnail">
						</div>
						<div class="col-md-6">
							<form method="post" action="homepage_upload.php" enctype="multipart/form-data">
								<div class="form-group">
								    <label for="exampleInputFile">File input</label>
								    <input name='image_file' type="file" id="exampleInputFile">
								</div>
								<div class="form-group">
									<label for="inputLink">Enter Link</label>
								    <input name="link" type="text" class="form-control" id="inputLink" placeholder="Enter link">
								</div>
								<input type="radio" name="homepage_id" id="homepageRadio" value="<?= $row['id'] ?>" checked>
								<span><?= $i ?></span>
								<button>Submit</button>
							</form>
						</div>
					</div>
					<hr>
					<?php
						}
					?>
	
				</div>
			</div>
		</div>
	</div>
</body>
</html>