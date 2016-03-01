<?php
	require_once("../../models/config.php");
	require_once('../../database.php');
	require_once('../common.php');

	$sql = "SELECT m.id AS id, m.name AS name, m.s AS s_size, m.m AS m_size, m.l AS l_size, m.xl AS xl_size, m.image AS image, m.price AS price
			FROM  `merchandise` m";

	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	if(!isUserLoggedIn()) {
    	header("Location: ../index.php");
	}

adminHeader("Dashboard - Merchandise", "../");
navbar("../");
?>
<body>

    <div class="container-fluid">
      	<div class="row">

        	<?php sideNavbar("../"); ?>

            <div id="main_content" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
				<script src="../jquery.Jcrop.min.js"></script>
				<script src="../img-crop-scripts.js"></script>
				<hr>
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<form role="form" method="post" action="new_merchandise.php">
								<div class="form-group">
									<label for="merch_name">Merchandise Name</label>
									<input type="text" class="form-control" id="merch_name" name="merch_name" placeholder="Merchandise name">
								</div>
								<div class="form-group">
									<label for="merch_price">Price</label>
									<input type="number" step="0.01" class="form-control" id="merch_price" name="merch_price" placeholder="price">
								</div>
								<div class="form-group">
									<label>Quantity &amp; Size</label>
									<div>
										<label>
											<input type="number" name="merch_small" value="0" min="0">
											Small
										</label>
									</div>
									<div>
										<label>
											<input type="number" name="merch_medium" value="0" min="0">
											Medium
										</label>
									</div>
									<div>
										<label>
											<input type="number" name="merch_large" value="0" min="0">
											Large
										</label>
									</div>
									<div>
										<label>
											<input type="number" name="merch_xlarge" value="0" min="0">
											Xtra - Large
										</label>
									</div>
								</div>
								<input type="text" name="profile" id="profileImg" style="visibility: hidden; display: inline;">
								<button type="submit" class="btn btn-default">submit</submit>
							</form>
						</div>
						<div class="col-md-6">
							<form id="upload_form" enctype="multipart/form-data" method="post" action="../upload.php" onsubmit="return checkForm()">
					          <p class="bg-danger">NOTICE: Please upload an image for the Merchandise</p>
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
				              <img src="http://placehold.it/250x250" alt="profile_preview" class="img-thumbnail img-circle">
				            </div>
						</div>
						<div class="col-md-12">
							<h2 class="sub-header">Merchandise List</h2>
							<div class="table-responsive">
								<table id="merchandise-table" class="display" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Name</th>
											<th>Price</th>
											<th>Small</th>
											<th>Medium</th>
											<th>Large</th>
											<th>X-Large</th>
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
													<td><?= $row['price']; ?></td>
													<td><?= $row['s_size']; ?></td>
													<td><?= $row['m_size']; ?></td>
													<td><?= $row['l_size']; ?></td>
													<td><?= $row['xl_size']; ?></td>
													<td>
														<a href="merchandise_edit.php?id=<?= $row['id']; ?>" class="btn btn-default comm-edit">Edit</a>
														<a href="merchandise_delete.php?id=<?= $row['id']; ?>" class="btn btn-danger">DELETE</a>
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
						$('#merchandise-table').DataTable();
						$(".editor").jqte();

						$('#upload_form').ajaxForm({ 
							target: '#upload_crop',

							success: function(){
								$('#upload_form').fadeIn('slow');

								var src = $('img[alt="profile_preview"]').attr('src');

								$("#profileImg").val(src);
							}
						});

						/*$(".comm-edit").click(function(e){
							e.preventDefault();
							var link = $(this).attr("href");
							console.log(link);
							// alert(link);
							$.ajax({url:link,success:function(result){
								$("#main_content").html(result);
							}});
						});*/
					});
				</script>
			</div>
		</div>
	</div>
</body>
</html>