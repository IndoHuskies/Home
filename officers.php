<?php
    require_once 'database.php';

    $sql = "SELECT o.department_id, o.primary_id, o.name, o.standing, o.major, o.graduation, o.head, o.media, p.primary_name, d.department_name, d.email
            FROM officer o
            INNER JOIN primary_pos p ON p.id = o.primary_id
            LEFT JOIN department d ON d.id = o.department_id
            GROUP BY name
            ORDER BY o.head DESC";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($result);

    TopHeader("Officers | ISAUW", "");
?>
    <!-- Jumbotron
    ================================================== -->
    <div class="jumbotron">
    	<h1>Officers</h1>
    	<p>Meet our team</p>
    </div><!-- /.jumbotron -->



    <!-- Separator End -->
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

    	<!-- START THE FEATURETTES -->
    	<div class="row featurette officer-block">
    		<h3 id="off-structure">Organization Structure</h3>

    		<!-- President -->
    		<div class="row" id="president">
    			
    		</div>
    		<!-- President End-->

    		<!-- Vice President -->
    		<div class="row" id="vice-president">
    			
    		</div>
    		<!-- Vice President End-->

    		<div class="row">
    			<!-- D. Operations -->
    			<div class="col-lg-4 left-row">
    				<div class="row" id="d-operations">
    					
    				</div>

    				<div class="row depart">
    					<div class="col-lg-4 left-row">
    						<a class="page-scroll" href="#event-organizer">
    							<img class="img-circle" src="img/eo.png">
    						</a>
    						<span>Event Organizer</span>
    					</div>

    					<div class="col-lg-4 left-row">
    						<a class="page-scroll" href="#inventory">
    							<img class="img-circle" src="img/in.png">
    						</a>
    						<span>Inventory</span>
    					</div>

    					<div class="col-lg-4">
    						<a class="page-scroll" href="#creativity-management">
    							<img class="img-circle" src="img/cm.png">
    						</a>
    						<span>Creativity Management</span>
    					</div>
    				</div>
    			</div>
    			<!-- D. Operations End-->

    			<!-- D. Finance -->
    			<div class="col-lg-4 left-row">
    				<div class="row" id="d-finance">
    					
    				</div>

    				<div class="row depart">
    					<div class="col-lg-6 left-row">
    						<a class="page-scroll" href="#treasury">
    							<img class="img-circle" src="img/tr.png">
    						</a>
    						<span>Treasury</span>
    					</div>

    					<div class="col-lg-6">
    						<a class="page-scroll" href="#sponsorship">
    							<img class="img-circle" src="img/sp.png">
    						</a>
    						<span>Sponsorship</span>
    					</div>
    				</div>
    			</div>
    			<!-- D. Finance End-->

    			<!-- D. C/O -->
    			<div class="col-lg-4">
    				<div class="row" id="d-co">
    					
    				</div>

    				<div class="row depart">
    					<div class="col-lg-6 left-row">
    						<a class="page-scroll" href="#information-tech">
    							<img class="img-circle" src="img/it.png">
    						</a>
    						<span>Information Technology</span>
    					</div>

    					<div class="col-lg-6">
    						<a class="page-scroll" href="#marketing">
    							<img class="img-circle" src="img/mc.png">
    						</a>
    						<span>Marketing Communication</span>
    					</div>
    				</div>
    			</div>
    			<!-- D. C/O -->
    		</div>

    	</div>

    	<hr class="featurette-divider">

    	<!-- EO -->
    	<div class="row featurette officer-block">
    		<img class="img-circle" src="img/eo.png">
    		<h3 id="event-organizer" >Event Organizer</h3>
    		<p class="pull-right"><a class="page-scroll" href="#off-structure">Back to top</a></p>
    		<!-- Event Organizer -->
    		<div class="col-lg-12">
    			<ul class="off-grid" id="off-eo">
    				
    			</ul>
    		</div>
    		<!-- Event Organizer End-->
    	</div>
    	<!-- EO End-->

    	<hr class="featurette-divider">

    	<!-- Inventory -->
    	<div class="row featurette officer-block">
    		<img class="img-circle" src="img/in.png">
    		<h3 id="inventory">Inventory</h3>
    		<p class="pull-right"><a class="page-scroll" href="#off-structure">Back to top</a></p>

    		<!-- Inventory -->
    		<div class="col-lg-12">
    			<ul class="off-grid" id="off-inventory">
    				
    			</ul>
    		</div>
    		<!-- Inventory -->
    	</div>
    	<!-- Inventory End -->

    	<hr class="featurette-divider">

    	<!-- CM -->
    	<div class="row featurette officer-block">
    		<img class="img-circle" src="img/cm.png">
    		<h3 id="creativity-management">Creativity Management</h3>
    		<p class="pull-right"><a class="page-scroll" href="#off-structure">Back to top</a></p>

    		<!-- Creativity Management -->
    		<div class="col-lg-12">
    			<ul class="off-grid" id="off-cm">
    				
    			</ul>
    		</div>
    		<!-- Creativity Management End-->
    	</div>
    	<!-- CM End -->

    	<!-- Treasury -->
    	<div class="row featurette officer-block">
    		<img class="img-circle" src="img/tr.png">
    		<h3 id="treasury">Treasury</h3>
    		<p class="pull-right"><a class="page-scroll" href="#off-structure">Back to top</a></p>

    		<!-- Treasury -->
    		<div class="col-lg-12">
    			<ul class="off-grid" id="off-treasury">
    				
    			</ul>
    		</div>
    		<!-- Treasury -->
    	</div>
    	<!-- Treasury End -->

    	<!-- Sponsorship -->
    	<div class="row featurette officer-block">
    		<img class="img-circle" src="img/sp.png">
    		<h3 id="sponsorship">Sponsorship</h3>
    		<p class="pull-right"><a class="page-scroll" href="#off-structure">Back to top</a></p>

    		<!-- Sponsorship -->
    		<div class="col-lg-12">
    			<ul class="off-grid" id="off-sponsorship">
    			
                </ul>
    		</div>
    		<!-- Sponsorship -->
    	</div>
    	<!-- Sponsorship End -->

    	<!-- IT -->
    	<div class="row featurette officer-block">
    		<img class="img-circle" src="img/it.png">
    		<h3 id="information-tech">Information Technology</h3>
    		<p class="pull-right"><a class="page-scroll" href="#off-structure">Back to top</a></p>

    		<!-- IT -->
    		<div class="col-lg-12">
    			<ul class="off-grid" id="off-it">
    				
    			</ul>
    		</div>
    		<!-- IT End -->
    	</div>
    	<!-- IT End -->

    	<!-- MC -->
    	<div class="row featurette officer-block">
    		<img class="img-circle" src="img/mc.png">
    		<h3 id="marketing">Marketing Communication</h3>
    		<p class="pull-right"><a class="page-scroll" href="#off-structure">Back to top</a></p>


    		<!-- Marketing -->
    		<div class="col-lg-12">
    			<ul class="off-grid" id="off-mc">
    				
    			</ul>
    		</div>
    		<!-- Marketing End -->
    	</div>
    	<!-- MC End -->

    	<!-- /END THE FEATURETTES -->

		<hr class="featurette-divider">

    </div><!-- /.container -->

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
        var officers = <?php echo $json ?>;

        console.log(officers);

        $(document).ready(function() {
            $('#navbar-ul li:nth-child(2)').addClass('active');
            $.each(officers, function(i, item) {
                if(item.head == 2) {
                    if(item.primary_id == 1) {
                        $('#president').append(officerModel(item, "president@isauw.org"));
                    } else if (item.primary_id == 2) {
                        $('#vice-president').append(officerModel(item, "vicepresident@isauw.org"));
                    } else if (item.primary_id == 3) {
                        $('#d-operations').append(officerModel(item, "operations@isauw.org"));
                    } else if (item.primary_id == 4) {
                        $('#d-finance').append(officerModel(item, "finance@isauw.org"));
                    } else {
                        $('#d-co').append(officerModel(item, "outreach@isauw.org"));
                    }
                } else {
                    if(item.department_id == 1) {
                        $('#off-eo').append("<li>" + officerModel(item, "operations@isauw.org") + "</li>");
                    } else if(item.department_id == 2) {
                        $('#off-inventory').append("<li>" + officerModel(item, "operations@isauw.org") + "</li>");
                    } else if(item.department_id == 3) {
                        $('#off-cm').append("<li>" + officerModel(item, "operations@isauw.org") + "</li>");
                    } else if(item.department_id == 4) {
                        $('#off-treasury').append("<li>" + officerModel(item, "finance@isauw.org") + "</li>");
                    } else if(item.department_id == 5) {
                        $('#off-sponsorship').append("<li>" + officerModel(item, "finance@isauw.org") + "</li>");
                    } else if(item.department_id == 6) {
                        $('#off-mc').append("<li>" + officerModel(item, "outreach@isauw.org") + "</li>");
                    } else {
                        $('#off-it').append("<li>" + officerModel(item, "outreach@isauw.org") + "</li>");
                    }

                }
            });
        });

        function officerModel(item, email) {
            var title = "";
            if(item.head == 2) {
                title = item.primary_name;
            } else if(item.head == 1) {
                title = "Head of " + item.department_name;
            } else {
                title = item.department_name;
            }
            var result = '<div class="officer"><div class="off-item"><div class="off-info"><div class="off-info-front"><img src="' + item.media +'" class="img-circle"></div><div class="off-info-back"><p><a href="mailto:' + email + '"><i class="glyphicon glyphicon-envelope"></i></a></p><p>'+ item.standing +'<br>'+ item.major +'<br>'+ item.graduation +'</p></div></div></div><span class="off-name">'+ item.name +'</span><span class="off-title">'+ title +'</span></div>';

        return result;
     }
    </script>
</body>
</html>
