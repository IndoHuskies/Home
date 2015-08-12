<?php
require_once('../database.php');

$sql = "SELECT *
FROM event";

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<script src="jquery.Jcrop.min.js"></script>
<script src="img-crop-scripts.js"></script>
<hr>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<form role="form" method="post" action="new_event.php">
				<div class="form-group">
					<label for="eventName">Event Name</label>
					<input type="text" class="form-control" id="inputEventName" name="event_name" placeholder="event name">
				</div>
				<div class="form-group">
					<label for="eventDate">Event Date</label>
					<input type="date" class="form-control" id="inputEventDate" name="event_date">
				</div>
				<div class="form-group">
					<label for="eventLocation">Event Location</label>
					<input type="text" class="form-control" id="inputEventLocation" name="event_location">
				</div>
				<div class="form-group">
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
				<textarea class="editor" id="event-description" name="event_description"></textarea>
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
					<img src="http://placehold.it/250x250" alt="profile_preview" class="img-thumbnail img-circle">
				</div>
			</div>
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
									<td ><a href="event_edit.php?id=<?= $row['id'] ?>" class="event-edit btn btn-default">Edit</a></td>
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

				var src = $('img[alt="profile_preview"]').attr('src');

				$("#profileImg").val(src);
			}
		});

		$(".event-edit").click(function(e){
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