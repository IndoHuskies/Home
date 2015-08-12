<?php
    require_once 'database.php';

    $sql = "SELECT * 
			FROM  `community` 
			ORDER BY  `community`.`name` ASC ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($result);

    TopHeader("Community | ISAUW","");
?>
<!-- Jumbotron
	================================================== -->
	<div class="jumbotron">
		<h1>Community</h1>
		<p>Connect with other Indonesian communities around Seattle</p>
	</div><!-- /.jumbotron -->



	<!-- Separator End -->
<!-- Marketing messaging and featurettes
	================================================== -->
	<!-- Wrap the rest of the page in another container to center all the content. -->

	<div class="container marketing">


		<!-- START THE FEATURETTES -->

		<hr class="featurette-divider">

		<div class="row featurette" id="comm-link">
			<a href="#student-org" class="page-scroll">
				<h3 class="col-md-4" style="text-align:left">Student Organization</h3>
			</a>
			<a href="#religious-comm" class="page-scroll">
				<h3 class="col-md-4" style="text-align:center">Religious Community</h3>
			</a>
			<a href="#nonprofit-org" class="page-scroll">
				<h3 class="col-md-4" style="text-align:right">Nonprofit Organization</h3>
			</a>
		</div>

		<hr class="featurette-divider">

		<!-- Student Org -->
		<div class="row featurette" id="student-org">
			<h2 class="row">Student Organization</h2>
			<p class="pull-right"><a class="page-scroll" href="#comm-link">Back to top</a></p>
			<ul id="student-org-list" class="col-md-12">

			</ul>
		</div>
		<!-- Student Org End -->

		<!-- Religious Comm -->
		<div class="row featurette" id="religious-comm">
			<h2 class="row">Religious Community</h2>
			<p class="pull-right"><a class="page-scroll" href="#comm-link">Back to top</a></p>
			<ul id="religious-comm-list" class="col-md-12">

			</ul>
		</div>

		<hr class="featurette-divider">

		<div class="row featurette" id="nonprofit-org">
			<h2 class="row">Nonprofit Organization</h2>
			<p class="pull-right"><a class="page-scroll" href="#comm-link">Back to top</a></p>
			<ul id="nonprofit-org-list" class="col-md-12">

			</ul>
		</div>

		<!-- /END THE FEATURETTES -->



	</div><!-- /.container -->

	<hr class="featurette-divider">


	<?php footer($conn); ?>
<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/docs.min.js"></script>
	<script src="js/jquery.easing.min.js"></script>
	<script src="js/scrolling-nav.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="js/ie10-viewport-bug-workaround.js"></script>
	<script type="text/javascript">
		var community = <?php echo $json ?>;

		$(document).ready(function() {
			$('#navbar-ul li:nth-child(7)').addClass('active');
			var student = 0;
			var religious = 0;
			var nonprofit = 0;

            $.each(community, function(i, item) {
                if(item.id_type == 1) {
                    $('#student-org-list').append(community_append(item, student));
                    student++;
                } else if(item.id_type == 2) {
                    $('#religious-comm-list').append(community_append(item, religious));
                    religious++;
                } else {
                	$('#nonprofit-org-list').append(community_append(item, nonprofit));
                	nonprofit++;
                }
            });
        });

		function community_append(item, count) {
			if(count % 2 == 1) {
				return '<li class="community"><div class="col-md-7"><h2>'+ item.name +'</h2><p>' + item.description + '</p><p><a class="btn btn-default" href="'+ item.link + '" role="button">View details &raquo;</a></p></div><div class="col-md-5"><img class="img-circle" src="'+ item.pic +'"></div></li>';
			} else {
				return '<li class="community left-row"><div class="col-md-5"><img class="img-circle" src="'+ item.pic +'"></div><div class="col-md-7"><h2>'+ item.name +'</h2><p>' + item.description + '</p><p><a class="btn btn-default" href="'+ item.link + '" role="button">View details &raquo;</a></p></div></li>';
			}
		}
	</script>
</body>
</html>
