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

		<!-- Student Org -->
		<div class="row featurette" id="student-org">
			<h2 class="row" style="float: left; width: 50%;">Student Organization</h2>
			<h2 class="row" style="float: right; width: 50%;">Non-Profit Organization</h2>
			<p class="pull-right"><a class="page-scroll" href=".jumbotron">Back to top</a></p>
			<ul id="student-org-list" class="col-md-12">
				<li class="community left-row">
					<div class="col-md-5">
						<img class="img-circle" src="img/ISASU.jpg">
					</div>
					<div class="col-md-7">
						<h2>ISASU</h2>
						<p>Indonesian Student Association Seattle Univeristy (ISASU) is mainly consist of Indonesian students who are currently pursuing their education at Seattle University (SU). We are an active club and recognized by ASSU (Associated Student of Seattle University).</p>
						<p><a class="btn btn-default" href="https://www.instagram.com/isasuseattle/" role="button">View details &raquo;</a></p>
					</div>
				</li>

				<li class="community">
					<div class="col-md-7">
						<h2>SSSCA</h2>
						<p>Since initiation of the sister-city relationship in 1991, the Seattle-Surabaya Sister City Association has worked hard to promote knowledge and understanding of the city of Surabaya and the country of Indonesia.</p>
						<p><a class="btn btn-default" href="" role="button">View details &raquo;</a></p>
					</div>
					<div class="col-md-5">
						<img class="img-circle" src="img/SSSC.jpg">
					</div>
				</li>
			</ul>
		</div>
		<!-- Student Org End -->

		<!-- Religious Comm -->
		<div class="row featurette" id="religious-comm">
			<h2 class="row">Religious Community</h2>
			<p class="pull-right"><a class="page-scroll" href=".jumbotron">Back to top</a></p>
			<ul id="religious-comm-list" class="col-md-12">
				<li class="community left-row">
					<div class="col-md-5">
						<img class="img-circle" src="img/Caregroup.jpg" height="200" width="200">
					</div>
					<div class="col-md-7">
						<h2>Caregroup</h2>
						<p>Caregroup is a community under IFGF that is open for everyone who wants to know more about Jesus. Not only that, we are here as a family and we care about you. ther than group bible studies, we also have fellowships, where we hang out and have fun!</p>
						<p><a class="btn btn-default" href="" role="button">View details &raquo;</a></p>
					</div>
				</li>

				<li class="community">
					<div class="col-md-7">
						<h2>Christ the Cornerstone Church</h2>
						<p>We meet to worship on Sundays as the body of Christ at 4pm at Greenlake Presbyterian Church, 6318 Linden Ave N, Seattle, WA 98103. On Fridays, we have a college aged group of international students who get together to better understand the word of God and share our lives to each other.</p>
						<p><a class="btn btn-default" href="" role="button">View details &raquo;</a></p>
					</div>
					<div class="col-md-5">
						<img class="img-circle" src="img/event/ea153e8d7e337e7297db7cef815e8f26.jpg" height="200" width="200">
					</div>
				</li>

				<li class="community left-row">
					<div class="col-md-5">
						<img class="img-circle" src="img/KTM.jpg" height="200" width="200">
					</div>
					<div class="col-md-7">
						<h2>KTM Seattle</h2>
						<p>KTM (Komunitas Tritunggal Mahakudus) is a collection of the Catholics who desire to practice their Christian life and grow in faith to its fullness. The cell group meets every Friday 8PM. We strengthen each other's faith through prayers, worships, sharing, and services.</p>
						<p><a class="btn btn-default" href="" role="button">View details &raquo;</a></p>
					</div>
				</li>

				<li class="community">
					<div class="col-md-7">
						<h2>Mudika-KKI Seattle</h2>
						<p>KKI Seattle (Komunitas Katolik Indonesia Seattle) is an organization where catholic people can gather and grow their faith together. Its activities include bible study, praise and worship, rosary prayer, and indonesian mass every month.</p>
						<p><a class="btn btn-default" href="" role="button">View details &raquo;</a></p>
					</div>
					<div class="col-md-5">
						<img class="img-circle" src="img/KKI.jpg" height="200" width="200">
					</div>
				</li>
			</ul>
		</div>

		<hr class="featurette-divider">

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

</body>
</html>
