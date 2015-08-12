<?php
	require_once 'database.php';

	TopHeader("Sponsorship | ISAUW","");
?>

<!-- Content -->

<div class="jumbotron">
   	<h1>Sponsorship</h1>
  	<p>Become our partner</p>
</div>

<div class="container marketing">
	<hr>
	<div class="row">
		<div class="col-md-6">
			<div class="img-wrapper">
				<img src="img/keraton.png" class="img-responsive img-thumbnail">
				<div class="img-description">
					<p><a href="Keraton-2015-Sponsorship-Proposal.pdf">DOWNLOAD PROPOSAL</a></p>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<h2 class="text-center" style="margin-bottom:30px;">Keraton 2015: Indonesian Festival</h2>
			<p>
				“Keraton 2015: Indonesian Festival” is ISAUW’s largest and most iconic event. It will take place on May 2, 2015 at the University of Washington’s Red Square. Anticipating more than 8,000 attendees, ISAUW strives to convey Indonesia’s rich culture: traditional food, performances, arts and many more will be presented.
			</p>
			<p>
				Supporting ISAUW is a unique opportunity to promote your organization through the vast international exposure we hold. Plus, you are supporting the rich Indonesian culture, and are helping boost the country’s awareness and tourism.
			</p>
			<p>
				Download our Sponsorship Proposal <a href="Keraton-2015-Sponsorship-Proposal.pdf" class="btn btn-info">HERE</a>.
			</p>
			<p>
				Please contact us at <a href="mailto:isauw@uw.edu">isauw@uw.edu</a> if you are interested in sponsoring or donating to ISAUW.
			</p>
		</div>
	</div>
	<hr>
</div>
<!-- end Content -->

<?php footer($conn) ?>

	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript">
    	$(document).ready(function() {
			$('#navbar-ul li:nth-child(3)').addClass('active');
    	});
    </script>
</body>
</html>