<?php
    require_once 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="../img/icon.png">

	<title>ISAUW | Volunteer's Page</title>

	<!-- Bootstrap core CSS -->
	<link href="../css/bootstrap.css" rel="stylesheet">   

	<!-- Custom styles for this template -->
	<link href="../css/carousel.css" rel="stylesheet">


	<link rel="stylesheet" type="text/css" href="../css/style.css">

    <style type="text/css">
    #job-desc ul {
        list-style: none;
        display: block;
        width: 100%;
        text-align: center;
    }

    #job-desc h3 {
        text-align: center;
        margin-bottom: 20px;
    }

    #job-desc li {
        width: 300px;
        display: inline-block;
    }

    #job-desc .panel {
        border-color: black;
    }

    #job-desc .panel-heading {
        color: white;
        background-color: rgb(129, 20, 27);
    }

    #inputWork select {
        margin-bottom: 10px;
    }

    #disclaimerModal {
        top: 50%;
    }

    #disclaimerModal p {
        font-size: 16px;
    }

    #volunteer hr {
        clear: both;
    }
    </style>
</head>
<!-- NAVBAR
	================================================== -->
	<body>

		<!-- Navbar -->
		<div class="navbar navbar-default navbar-static-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">
						<img src="../img/Logo-resize.png">
					</a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="../index.php">Home</a></li>
						<li><a href="../officers.php">Officers</a></li>
						<li><a href="../isauwcard">ISAUW Card</a></li>
						<li><a href="../event.php">Event</a></li>
						<li><a href="../community.php">Community</a></li>

					</ul>

				</div><!--/.nav-collapse -->
			</div>
		</div>

		<!-- Navbar End -->


    <!-- Jumbotron
    ================================================== -->
    <div class="jumbotron">
    	<h1>Events</h1>
    	<p>Explore our upcomming and past events.</p>
    </div><!-- /.jumbotron -->



    <!-- Separator End -->
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">


    	<!-- START THE FEATURETTES -->

    	<!-- Content -->
    	<div id="event-info volunteer" class="row">
    		<div class="row featurette">
    			<div class="col-md-1"></div>
    			<div class="col-md-10">
    				<h2 class="row">Volunteer's Page</h2>

                    <div id="event-img">
                        <img class="featurette-image img-responsive img-circle" src="" alt="Generic placeholder image">
                    </div>

    				<p class="lead" id="event-detail">
    					<strong>Date: </strong><span id="date"></span>
    					<br>
    					<strong>Time: </strong>
    					<br>
    					<strong>Location: </strong>
    				</p>

                    <hr class="featurette-divider">

                    <div class="row lead"  id="job-desc">
                        <h3>Volunteer Job Description</h3>
                        <ul>
                            <li>
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        Photo / Documentation
                                    </div>
                                    <div class="panel-body">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Urbane ero detracta carum, locos voluptates meminit quamvis difficile retinere, veritus labor stoicis dubium, fuisse fecit probabis diligant sentit noster multam certa veritatis.
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        Vendor
                                    </div>
                                    <div class="panel-body">
                                        Panel Lorem ipsum dolor sit amet, consectetur adipisicing elit. Urbane ero detracta carum, locos voluptates meminit quamvis difficile retinere, veritus labor stoicis dubium, fuisse fecit probabis diligant sentit noster multam certa veritatis.
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        Usher
                                    </div>
                                    <div class="panel-body">
                                        Panel Lorem ipsum dolor sit amet, consectetur adipisicing elit. Urbane ero detracta carum, locos voluptates meminit quamvis difficile retinere, veritus labor stoicis dubium, fuisse fecit probabis diligant sentit noster multam certa veritatis.
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        Preparation
                                    </div>
                                    <div class="panel-body">
                                        Panel Lorem ipsum dolor sit amet, consectetur adipisicing elit. Urbane ero detracta carum, locos voluptates meminit quamvis difficile retinere, veritus labor stoicis dubium, fuisse fecit probabis diligant sentit noster multam certa veritatis.
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        Cleaning
                                    </div>
                                    <div class="panel-body">
                                        Panel Lorem ipsum dolor sit amet, consectetur adipisicing elit. Urbane ero detracta carum, locos voluptates meminit quamvis difficile retinere, veritus labor stoicis dubium, fuisse fecit probabis diligant sentit noster multam certa veritatis.
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <hr class="featurette-divider">

                    <div class="row lead">
                        <form class="col-md-12 form-horizontal" action="VolunteerLayout.php">
                            <div class="form-group">
                                <label for="inputName" class="col-sm-4 control-label">Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputName">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-4 control-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" id="inputEmail">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPhone" class="col-sm-4 control-label">Phone</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputPhone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputShirtSize" class="col-sm-4 control-label">T-Shirt Size</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="inputShirtSize" style="max-width:10%;">
                                        <option value="s">S</option>
                                        <option value="ml">M</option>
                                        <option value="l">L</option>
                                        <option value="xl">XL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputWork" class="col-sm-4 control-label">Choice of Volunteer Work</label>
                                <div class="col-sm-8" id="inputWork">
                                    <select class="form-control">
                                        <option disabled selected> -- select an option -- </option>
                                        <option value="photo-documentation">Photo / Documentation</option>
                                        <option value="vendor">Vendor</option>
                                        <option value="usher">Usher</option>
                                        <option value="preparation">Preparation</option>
                                        <option value="cleaning">Cleaning</option>
                                    </select>
                                    <select class="form-control">
                                        <option disabled selected> -- select an option -- </option>
                                        <option value="photo-documentation">Photo / Documentation</option>
                                        <option value="vendor">Vendor</option>
                                        <option value="usher">Usher</option>
                                        <option value="preparation">Preparation</option>
                                        <option value="cleaning">Cleaning</option>
                                    </select>
                                    <select class="form-control">
                                        <option disabled selected> -- select an option -- </option>
                                        <option value="photo-documentation">Photo / Documentation</option>
                                        <option value="vendor">Vendor</option>
                                        <option value="usher">Usher</option>
                                        <option value="preparation">Preparation</option>
                                        <option value="cleaning">Cleaning</option>
                                    </select>
                                    <select class="form-control">
                                        <option disabled selected> -- select an option -- </option>
                                        <option value="photo-documentation">Photo / Documentation</option>
                                        <option value="vendor">Vendor</option>
                                        <option value="usher">Usher</option>
                                        <option value="preparation">Preparation</option>
                                        <option value="cleaning">Cleaning</option>
                                    </select>
                                    <select class="form-control">
                                        <option disabled selected> -- select an option -- </option>
                                        <option value="photo-documentation">Photo / Documentation</option>
                                        <option value="vendor">Vendor</option>
                                        <option value="usher">Usher</option>
                                        <option value="preparation">Preparation</option>
                                        <option value="cleaning">Cleaning</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputHour" class="col-sm-4 control-label">Volunteer Hour</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="inputHour" min="1" max="24" style="max-width:10%;">
                                </div>
                            </div>

                            <div class="form-group" style="text-align:center;">
                                <input type="checkbox"> Disclaimer, <a href="#" data-toggle="modal" data-target="#disclaimerModal">here</a>
                                <div class="modal fade" id="disclaimerModal" tabindex="-1" role="dialog" aria-labelledby="disclaimerModal" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Indignae praetorem.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group" style="text-align:center;">
                                <input type="submit" class="btn">
                            </div>

                        </form>
                    </div>

                    <hr class="featurette-divider">

                    <div id="event-thumbnails" class="row">


                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>

        </div><!-- /.row -->


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
    
</body>
</html>
