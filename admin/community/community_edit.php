<?php

require_once('../../database.php');

$community = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // update ID

	$name = $_POST['community_name'];
	$link = $_POST['community_link'];
	$type = $_POST['community_type'];
	$media = $_POST['profile'];
	$description = $_POST['community_description'];

	$sql = "UPDATE community
	SET id_type = :id_type, name = :name, description = :description, link = :link, pic =:pic
	WHERE id = :id";

	$stmt = $conn->prepare($sql);

	$stmt->bindParam(':id', $community, PDO::PARAM_INT);
	$stmt->bindParam(':id_type', $type, PDO::PARAM_INT); 
	$stmt->bindParam(':name', $name, PDO::PARAM_STR);       
	$stmt->bindParam(':link', $link, PDO::PARAM_STR);    
	$stmt->bindParam(':pic', $media, PDO::PARAM_STR);
	$stmt->bindParam(':description', $description, PDO::PARAM_STR);
	// use PARAM_STR although a number  
	$stmt->execute();

	header("Location: community.php");
} else {
	$sql = "SELECT *
	FROM  community
	WHERE id = :id";

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':id', $community, PDO::PARAM_INT);
	
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	foreach($result as $row) {
		?>
		<script src="jquery.Jcrop.min.js"></script>
		<script src="img-crop-scripts.js"></script>
		<hr>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<form role="form" method="post" action="new_community.php">
						<div class="form-group">
							<label for="eventName">Community Name</label>
							<input type="text" class="form-control" id="inputEventName" name="community_name" placeholder="community name" value="<?= $row['name']; ?>">
						</div>
						<div class="form-group">
							<label for="eventName">Community Link</label>
							<input type="text" class="form-control" id="inputEventName" name="community_link" placeholder="community link" value="<?= $row['edit']; ?>">
						</div>
						<div class="form-group">
							<p class="bg-warning">PLEASE BE SURE TO RE-CHECK <strong>COMMUNITY TYPE</strong> BEFORE SAVING</p>
							<label for="eventTime">Community Type</label>
							<div class="radio">
								<label>
									<input type="radio" name="community_type" id="optionsRadios1" value="1" checked>
									Student Organization
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="community_type" id="optionsRadios2" value="2">
									Religious Community
								</label>
							</div>
							<div class="radio disabled">
								<label>
									<input type="radio" name="community_type" id="optionsRadios3" value="3">
									Nonprofit Organization
								</label>
							</div>
						</div>
						<textarea class="editor" id="community-description" name="community_description"><?= $row['description']; ?></textarea>
						<input type="text" name="profile" id="profileImg" style="visibility: hidden; display: inline;">
						<button type="submit" class="btn btn-default">submit</submit>
						</form>
					</div>
					<div class="col-md-6">
						<form id="upload_form" enctype="multipart/form-data" method="post" action="../upload.php" onsubmit="return checkForm()">
							<p class="bg-danger">NOTICE: Please upload an image for the Community</p>
							<input type="hidden" name="loc-type" value="inner"/>
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
							<img src="../../<?= $row['pic']; ?>" alt="profile_preview" class="img-thumbnail img-circle">
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

						var src = $('img[alt="profile_preview"]').attr('src');

						$("#profileImg").val(src);
					}
				}); 
			});
			</script>
			<?php	
		}
	}
	?>