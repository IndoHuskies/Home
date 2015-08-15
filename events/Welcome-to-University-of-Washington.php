<?php
    require_once '../database.php';
    //grab username and connect with temp profile
    $event_name = "Welcome to University of Washington";

    $sql = "SELECT * 
            FROM  `event`
            WHERE  `name` =  '".$event_name."'
            LIMIT 1";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_OBJ);

    TopHeader("ISAUW | " . $event_name, "../");

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
    				<h2 class="row"><?= $result->name ?></h2>

    				<div id="event-img">
    					<img class="featurette-image img-responsive img-circle" src="../<?= $result->media ?>" alt="Generic placeholder image">
    				</div>

    				<p class="lead" id="event-detail">
    					<strong>Date: </strong><span id="date"></span>
    					<br>
    					<strong>Time: </strong><?= $result->time ?>
    					<br>
    					<strong>Location: </strong><?= $result->location ?>
    				</p>

    				<p class="lead"><?= $result->description ?></p>

                    <!-- Survival Guide -->
                    <div id="sv-guide">
                        <p>
                            Download the 
                            <a href="" onclick="return openOverlay()">UW Survival Guide</a>
                            .
                        </p>
                        <div id="sv-verify">
                            <div>
                                <p>Password:</p>
                                <span>Incorrect Password!</span>
                                <input class="form-control" type="password">
                                <button class="btn" onclick="verifyPass()">Submit</button>
                            </div>
                        </div>
                    </div>

                    <script type="text/javascript">
                        
                    </script>
                    <!-- Survival Guide END -->

    				<hr class="featurette-divider">

    				<div id="event-thumbnails" class="row">
    				</div>
    			</div>
    		</div>
    		<div class="col-md-1"></div>

    	</div><!-- /.row -->

    	<div id="event-sponsor" class="row">
    		<div class="col-md-1"></div>
    		<div class="col-md-10">
    			<h2 class="row">Sponsor</h2>
    		</div>
    		<div class="col-md-1"></div>
    	</div>

    	<!-- Content End -->


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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#date').append(timeConverter(<?php echo $result->countdown ?>));
        });

        function timeConverter(UNIX_timestamp){
          var a = new Date(UNIX_timestamp*1);
          var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
          var year = a.getFullYear();
          var month = months[a.getMonth()];
          var date = a.getDate() + 1;
          var time = date + ' ' + month + ' ' + year;
          return time;
        }

        // Pass verify
        function openOverlay() {
            var overlay = $('#sv-verify');
            overlay.css('zIndex', 1);
            overlay.animate({
                opacity: 1
            }, 600, function() {
                //
            });

            overlay.click(function(e) {
                if(e.target == this) {
                    $(this).animate({
                        opacity: 0
                    }, 500, function() {
                        $(this).css('zIndex', '-1');
                    });
                }
            });

            return false;
        }

        function verifyPass () {
            var passInput = $('#sv-verify input').val();
            $.ajax({
                type: 'POST',
                url: 'sg-verify.php',
                data: {
                    pass: passInput
                },    
                success: function(data){
                    if(data === 'true') {
                        $('#sv-verify span').css('opacity', 0);
                        window.location.href = 'sg-download.php?pass=' + passInput;
                    } else {
                        $('#sv-verify span').css('opacity', 1);
                    }
                }
            });   
        }
    </script>
</body>
</html>
