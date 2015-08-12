<?php
	require_once('../database.php');

	$sql = "SELECT *
			FROM homepage
			LIMIT 3";

	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
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
				<img src="../<?= $row['img'] ?>" class="img-responsive img-thumbnail">
			</div>
			<div class="col-md-6">
				<form method="post" action="home_change.php">
					<div class="form-group">
					    <label for="exampleInputFile">File input</label>
					    <input name='file' type="file" id="exampleInputFile">
					</div>
					<form role="form">
					<div class="form-group">
						<label for="inputLink">Enter Link</label>
					    <input type="text" class="form-control" id="inputLink" placeholder="Enter link">
					</div>
					<input type="radio" name="homepage_id" id="homepageRadio" value="<?= $i ?>" checked>
				</form>
			</div>
		</div>
		<hr>
		<?php
			}
		?>
	
</div>