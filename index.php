<?php
    require_once 'database.php';

    $sql = "SELECT *
            FROM homepage
            ORDER BY id
            LIMIT 3";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    TopHeader("ISAUW | Indonesian Student Association at University of Washington", "");
?>

		<!-- Navbar End -->


    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-top:80px;">
    	<!-- Indicators -->
    	<ol class="carousel-indicators">
    		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    		<li data-target="#myCarousel" data-slide-to="1"></li>
    		<li data-target="#myCarousel" data-slide-to="2"></li>
    	</ol>
    	<div class="carousel-inner">
            <?php
                foreach($result as $row) {
            ?>
                <div class="item">
                    <a href="<?= $row['link'] ?>"><img src="<?= $row['img'] ?>" style="width:100%; height:auto;"></a>
                    <div class="container">
                        
                    </div>
                </div>
            <?php
                }
            ?>
    		
    	</div>
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
    </div><!-- /.carousel -->


    <!-- Separator -->
    <div id="separator">
    	<div>
    		<span class="glyphicon glyphicon-chevron-down"></span>
    	</div>
    </div>
    <!-- Separator End -->
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

    	<!-- Three columns of text below the carousel -->
    	<div class="row">
    		<div class="col-lg-4">
    			<img src="img/Icon.png" alt="Generic placeholder image" style="width: 140px; height: 140px;">
    			<h2>About Us</h2>
    			<p>ISAUW (Indonesian Student Association at the UW) is a non-profit cultural organization with the purpose of uniting the Indonesian community within the university as well as to promote our Indonesian culture to the community in the greater Seattle Area. </p>

    			<p>Since 2001, we have established a platform for Indonesian students at University of Washington to create a unifying community based on common interest in Indonesian culture.
    			</p>
    		</div><!-- /.col-lg-4 -->
    		<div class="col-lg-4">
    			<img class="img-circle" src="http://th09.deviantart.net/fs71/PRE/i/2010/130/7/1/Indonesia_Grunge_Flag_by_think0.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
    			<h2>Mission &amp; Vision</h2>
    			<p>To become the most leading and innovative Indonesian student association, in creating respectful, well-rounded, diverse yet nationalistic, young Indonesian leaders.</p>
                <p>To hold events that would promote the many unique and diverse cultures of Indonesia to the Indonesian community and beyond</p>
                <p>To unite and strengthen the bonds amongst the different Indonesiancommunities around the University of Washington, Greater Seattle Area, and the world</p>
                <p>To provide a versatile learning experience through hands-on approaches</p>
            </div><!-- /.col-lg-4 -->
    		<div class="col-lg-4">
    			<img class="img-circle" src="img/logo_permias.png" alt="Generic placeholder image" style="width: 140px; height: 140px;">
    			<h2>PERMIAS Nasional</h2>
    			<p>May 25, 2013 marks the re-establishment of PERMIAS Nasional in Washington D.C. at the PERMIAS Congress 2013. PERMIAS Nasional was initiated to represent all chapters of PERMIAS as one body and to create a greater network of Indonesian students throughout the United States. As well as an umbrella organization, PERMIAS Nasional consists of 6 different committees and 23 councils from each listed PERMIAS.</p>
    			<p><a class="btn btn-default" href="http://permiasnasional.org/" target="_blank" role="button">View details &raquo;</a></p>
    		</div><!-- /.col-lg-4 -->
    	</div><!-- /.row -->


    	<!-- START THE FEATURETTES -->

    	<hr class="featurette-divider">

    	<div class="row featurette">
    		<div class="col-md-3">
    			<div>
    				<h3 class="row">Quick <span>Info</span></h3>
    				<p><strong>Founded - </strong> 2001</p>
    				<p><strong>Emblem - </strong>Garuda</p>
    				<p>
    					<strong>Colors: </strong>
    					<br>
    					<strong style="color:rgb(129, 20, 27); padding-left: 1em;">Red Maroon</strong>
    					<br>
    					<strong style="padding-left: 1em;">White</strong>
    				</p>
    			</div>
    		</div>
    		<div class="col-md-9">
    			<div id="home-event-up">
                    <?php
                        $sql = "SELECT * 
                                FROM  `event`
                                ORDER BY `event`.`countdown` DESC
                                LIMIT 1";

                        $stmt = $conn->prepare($sql);
                        $stmt->execute();

                        $result = $stmt->fetch(PDO::FETCH_OBJ);
                    ?>

    				<h2>Upcoming Event</h2>
    				    <a href="<?php echo $result->link ?>"><img class="img-thumbnail" src="<?php echo $result->media ?>"></a>
                   
                    <!-- <a href="<?php echo $result->link ?>"><img class="img-thumbnail" src="img/volunteer-keraton-2015.jpg"></a> -->
    			</div>
    		</div>
    	</div>

    	<hr class="featurette-divider">

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
    <script>
        $( document ).ready(function() {
            $('#navbar-ul li:nth-child(1)').addClass('active');
            $( ".item" ).first().addClass( "active" );
        });
    </script>
</body>
</html>
