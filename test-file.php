<?php
    require_once 'database.php';

    TopHeader("ISAUW | Test File", "");

	EventJumbotron();
?>


    <!-- Separator End -->
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

    	<!-- START THE FEATURETTES -->

    	<!-- Content -->
    	<div id="event-info" class="row">
    		<div class="row featurette">
    			<div class="col-md-1"></div>
    			<div class="col-md-10">
    				<h2 class="row">Event Name</h2>

    				<div id="event-img">
    					<img class="featurette-image img-responsive img-thumbnail" src="../img/isauw.jpg" alt="Generic placeholder image">
    				</div>

    				<p class="lead" id="event-detail">
    					<strong>Date: </strong><span id="date"></span>
    					<br>
    					<strong>Time: </strong>12 PM
    					<br>
    					<strong>Location: </strong>University of Washington
    				</p>

    				<div class="lead">
    					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Istae artem deterret litteris provocatus omnesque, quippiam has, persius vester insidiarum inveniri aliquos insatiabiles, intellegebat, aliquem, voluit secunda, finibus existimare illo existimo ornatus. Maximis impendere iucunditas conectitur unum magnosque, tractavissent angore ei, magnam tranquillitatem facimus delectant semper totam eorum importari, quo intereant.
    				</div>

    				<hr class="featurette-divider">

    				<div id="event-thumbnails" class="row">
    				</div>
    			</div>
    		</div>
    		<div class="col-md-1"></div>

    	</div><!-- /.row -->
        
    	<!-- Content End -->

    		<div id="photo-gallery">
		<div id="pg-wrapper">
			<div class="pg-item">
				<img src="http://heidichandler.com/wp-content/uploads/2014/10/photography-love1.jpg">
			</div>
			<div class="pg-item">
				<img src="http://webneel.com/daily/sites/default/files/images/daily/01-2014/6-love-photography.jpg">
			</div>
			<div class="pg-item">
				<img src="http://heidichandler.com/wp-content/uploads/2014/10/photography-love1.jpg">
			</div>
			<div class="pg-item">
				<img src="http://heidichandler.com/wp-content/uploads/2014/10/photography-love1.jpg">
			</div>
			<div class="pg-item">
				<img src="http://webneel.com/daily/sites/default/files/images/daily/01-2014/6-love-photography.jpg">
			</div>
			<div class="pg-item">
				<img src="http://heidichandler.com/wp-content/uploads/2014/10/photography-love1.jpg">
			</div>
			<div class="pg-item">
				<img src="http://webneel.com/daily/sites/default/files/images/daily/01-2014/6-love-photography.jpg">
			</div>
			<div class="pg-item">
				<img src="http://heidichandler.com/wp-content/uploads/2014/10/photography-love1.jpg">
			</div>
			<div class="pg-item">
				<img src="http://heidichandler.com/wp-content/uploads/2014/10/photography-love1.jpg">
			</div>
			<div class="pg-item">
				<img src="http://heidichandler.com/wp-content/uploads/2014/10/photography-love1.jpg">
			</div>
		</div>

		<div id="left" class="pg-control"><span class="glyphicon glyphicon-chevron-left"></span></div>
		<div id="right" class="pg-control"><span class="glyphicon glyphicon-chevron-right"></span></div>
	</div>

	<div id="pg-overlay">
		<div id="pg-popup">
			<img src="">
		</div>
	</div>

    	<!-- /END THE FEATURETTES -->

    </div><!-- /.container -->


    <?php footer($conn); ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>

    <script type="text/javascript" src="js/photo_gallery.js"></script>
    
</body>
</html>