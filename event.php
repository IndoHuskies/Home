<?php
    require_once 'database.php';

    $sql = "SELECT * 
            FROM  `event`
            ORDER BY  `event`.`countdown` DESC ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($result);

    TopHeader("Events | ISAUW","");
?>
    <!-- Jumbotron
    ================================================== -->
    <div class="jumbotron">
    	<h1>Events</h1>
    	<p>Explore our upcoming and past events</p>
    </div><!-- /.jumbotron -->



    <!-- Separator End -->
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">


    	<!-- START THE FEATURETTES -->

    	<!-- Upcoming Event -->
    	<div class="row">
    		<h2 class="row">Upcoming Events</h2>

    		<div class="row">
                <div class="col-md-12 text-center" id="up-event">
                    <h2 id="upcomming">No Upcoming Event!</h2>
                </div>
    		</div>

    	</div><!-- /.row -->
    	<!-- Upcoming Event End -->


    	<hr class="featurette-divider">

    	<!-- Past Event -->
    	<div class="panel">
    		<div class="panel-heading" role="tab" id="headingOne">
    			<a id="event-tab" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
    				<img id="event-tab-icon" class="pull-right" src="img/plus.png">
    				<h2 class="panel-title row">
    					Past Events
    				</h2>
    			</a>
    		</div>
    		<div id="collapseOne" class="panel-collapse collapse fade" role="tabpanel" aria-labelledby="headingOne">
    			<div class="panel-body">
    				<div class="row">
    					<ul class="ch-grid" id="past-event">
    						
    					</ul>
    				</div>
    			</div>
    		</div>
    	</div>
    	<!-- Past Event END -->

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
        var events = <?php echo $json ?>;
        var d = new Date();
        var n = d.getTime();
        var latest = false;

        $(document).ready(function() {
            $('#navbar-ul li:nth-child(5)').addClass('active');
            $.each(events, function(i, item) {
                if(item.countdown > n && !latest) {
                    $('#upcomming').remove();
                    $('#up-event').prepend(upcomingEvent(item));
                } else {
                    $('#past-event').append("<li>" + eventModel(item) + "</li>");
                }
            });

            $('#event-tab').click(function() {
                if($("#event-tab-icon").attr("src") === 'img/min.png') {
                    $("#event-tab-icon").attr("src","img/plus.png");
                } else {
                    $("#event-tab-icon").attr("src","img/min.png"); 
                }
            });
        });

        function eventModel(item) {
            return '<a href="'+item.link+'"><div class="ch-item ch-img-1"><div class="ch-info"><h3>'+item.name+'</h3><p>view detail</p></div><div class="event-past"><img class="img-circle" src="'+item.media+'" alt="Generic placeholder image"></div></div></a>';
        }

        function upcomingEvent(item) {
            var event_date = timeConverter(item.countdown);
            var event_desc = item.description.substring(0,200);

            return '<div class="row featurette event-up"><div class="col-md-5 event-img"><img class="img-thumbnail" src="'+item.media+'"></div><div class="col-md-7 event-info"><h2>'+item.name+'</h2><p><strong>Date:</strong> '+event_date+'<br><strong>Time:</strong> '+item.time+'<br><strong>Location:</strong> ' + item.location + '</p><p class="lead">'+event_desc+'...</p><p><a class="btn btn-default" href="'+item.link+'" role="button">View details &raquo;</a></p></div></div><hr>';
        }

        function timeConverter(UNIX_timestamp){
          var a = new Date(UNIX_timestamp*1);
          var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
          var year = a.getFullYear();
          var month = months[a.getMonth()];
          var date = a.getDate() + 1;
          var time = date + ' ' + month + ' ' + year;
          return time;
        }
    </script>
</body>
</html>
