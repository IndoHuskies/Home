<?php
require_once('../database.php');

$event = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // update ID

    $name = $_POST['event_name'];
	$date = $_POST['event_date'];
	$location = $_POST['event_location'];
	$media = $_POST['profile'];
	$description = $_POST['event_description'];

	$start_h = $_POST['start_hour'];
	$start_m = $_POST['start_minute'];
	$start_t = $_POST['start_time'];
	$end_h = $_POST['end_hour'];
	$end_m = $_POST['end_minute'];
	$end_t = $_POST['end_time'];

	$time = $conn->quote($start_h . "." . $start_m . " " . $start_t . " to " . $end_h . "." . $end_m . " " . $end_t);
	//Convert date to epoch time
	$countdown = strtotime($date) * 1000;

    $sql = "UPDATE event
    		SET name = :name, date = :date, location = :location, description = :description
    			time = :time, countdown = :countdown, media = :media
    		WHERE id = :id";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':id', $event, PDO::PARAM_INT); 
	$stmt->bindParam(':name', $name, PDO::PARAM_STR);       
	$stmt->bindParam(':date', $date, PDO::PARAM_STR);    
	$stmt->bindParam(':location', $location, PDO::PARAM_STR);
	$stmt->bindParam(':description', $description, PDO::PARAM_STR);
	// use PARAM_STR although a number  
	$stmt->bindParam(':time', $time, PDO::PARAM_STR); 
	$stmt->bindParam(':countdown', $countdown, PDO::PARAM_INT);
	$stmt->bindParam(':link', $link, PDO::PARAM_STR);   
	$stmt->bindParam(':media', $media, PDO::PARAM_STR);   
	$stmt->execute();

	header("Location: ../admin/dashboard.html");
} else {
	$sql = "SELECT * FROM event WHERE id = :id ";

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':id', $event, PDO::PARAM_INT);    

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
					<form role="form" method="post" action="">
						<div class="form-group">
							<label for="eventName">Event Name</label>
							<input type="text" class="form-control" id="inputEventName" name="event_name" placeholder="event name" value="<?= $row['name']; ?>">
						</div>
						<div class="form-group">
							<label for="eventDate">Event Date</label>
							<input type="date" class="form-control" id="inputEventDate" name="event_date" value="<?= $row['date']; ?>">
						</div>
						<div class="form-group">
							<label for="eventLocation">Event Location</label>
							<input type="text" class="form-control" id="inputEventLocation" name="event_location" value="<?= $row['location']; ?>">
						</div>
						<div class="form-group">
							<p class="bg-warning">PLEASE BE SURE TO RE-INPUT <strong>EVENT TIME</strong> BEFORE SAVING</p>
							<label for="eventTime">Event Time</label>
							<div class="row form-inline">
								<div class="col-md-2">
									<select class="form-control" name="start_hour">
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
										<option>6</option>
										<option>7</option>
										<option>8</option>
										<option>9</option>
										<option>10</option>
										<option>11</option>
										<option>12</option>
									</select>
								</div>
								<div class="col-md-2">
									<select class="form-control" name="start_minute">
										<option>00</option>
										<option>10</option>
										<option>20</option>
										<option>30</option>
										<option>40</option>
										<option>50</option>
									</select>
								</div>
								<div class="col-md-2">
									<select class="form-control" name="start_time">
										<option>AM</option>
										<option>PM</option>
									</select>
								</div>
								<div class="col-md-2">
									<select class="form-control" name="end_hour">
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
										<option>6</option>
										<option>7</option>
										<option>8</option>
										<option>9</option>
										<option>10</option>
										<option>11</option>
										<option>12</option>
									</select>
								</div>
								<div class="col-md-2">
									<select class="form-control" name="end_minute">
										<option>00</option>
										<option>10</option>
										<option>20</option>
										<option>30</option>
										<option>40</option>
										<option>50</option>
									</select>
								</div>
								<div class="col-md-2">
									<select class="form-control" name="end_time">
										<option>AM</option>
										<option>PM</option>
									</select>
								</div>
							</div>
						</div>
						<textarea class="editor" id="event-description" name="event_description"><?= $row['description'] ?></textarea>
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
	}
	?>