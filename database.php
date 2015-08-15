<?php
	$servername = "localhost";
	$db_name = "isauw_website";
	$username = "isauw_main";
	$password = "isauw2014";

	// Create connection
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
		//Connect to database
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

function TopHeader($title, $path) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="<?= $path ?>img/favicon.ico">

        <title><?php echo $title ?></title>

        <!-- Bootstrap core CSS -->
        <link href="<?= $path ?>css/bootstrap.css" rel="stylesheet">   

        <!-- Custom styles for this template -->
        <link href="<?= $path ?>css/carousel.css" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="<?= $path ?>css/style.css">
        <!-- Survival Guide -->
        <link rel="stylesheet" type="text/css" href="<?= $path ?>css/sv-guide.css">

        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>

    </head>
    <!-- NAVBAR ================================================== -->
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
                    <a class="navbar-brand" href="/">
                        <img src="<?= $path ?>img/Logo-resize.png">
                    </a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul id="navbar-ul" class="nav navbar-nav navbar-right">
                        <li><a href="/">Home</a></li>
                        <li><a href="<?= $path ?>officers.php">Officers</a></li>
                        <li><a href="<?= $path ?>sponsorship.php">Sponsorship</a></li>
                        <li><a href="/isauwcard">ISAUW Card</a></li>
                        <li><a href="<?= $path ?>event.php">Events</a></li>
                        <li><a href="<?= $path ?>keraton2015">Keraton 2015</a></li>
                        <li><a href="<?= $path ?>community.php">Community</a></li>
                    </ul>

                </div><!--/.nav-collapse -->
            </div>
        </div>

    <?php
}

# Footer template
function footer($conn) { 

    $sql = "SELECT * 
            FROM  `event` 
            ORDER BY  `event`.`countdown` DESC 
            LIMIT 10";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    ?>

	<div id="footer-space"></div>
    <footer>
    	<div class="row">
    		<div id="contact-footer" class="col-md-5">
                <div class="wrapper align-center">
            
                    <div class="text" itemscope itemtype="http://schema.org/Organization">
                      <h2>Contact Us</h2>
                      <hr>
                      <p style="color: #ffffff;" itemprop="address">Husky Union Building 232, <br>BOX 352238, <br>Seattle, WA 98195</p>
                      <p style="color: #ffffff;"><span itemprop="email">Email: isauw@uw.edu</span><br>Website: <span itemprop="url">www.isauw.org</span></p>
                      <hr>
                      <ul class="social icons align-center">
                        <li><a href="#" class="icon-facebook"></a></li>
                        <li><a href="https://www.youtube.com/watch?v=3SHA2DM7Gxs&list=PL1ya6d1mzAvTbETjquI6wB665d3ctzaB1" class="icon-youtube"></a></li>
                                        <li><a href="https://twitter.com/isauw" class="icon-twitter"></a></li>
                        <li><a href="http://instagram.com/isauwhuskies" class="icon-instagram"></a></li>
                      </ul>
                    </div>
                    
                    <iframe id="map" width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Husky+Union+Building+(HUB),+Northeast+Stevens+Way,+Seattle,+WA&amp;aq=0&amp;oq=hus&amp;sll=47.613028,-122.342064&amp;sspn=0.27079,0.676346&amp;ie=UTF8&amp;hq=Husky+Union+Building+(HUB),+Northeast+Stevens+Way,+Seattle,+WA&amp;ll=47.655258,-122.30492&amp;spn=0.006295,0.006295&amp;t=m&amp;z=13&amp;output=embed"></iframe>

                    
                </div>    
            </div>
    		<div id="event-footer" class="col-md-2">
    			<div class="row Separate">
		  			<div class="col-md-3"><hr></div>
		  			<div class="col-md-6">
		  				<h3 class="title text-center">Events</h3>
		  			</div>
		  			<div class="col-md-3"><hr></div>
		  		</div>
    		    <ul>
                    <?php
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                            <li><a href="<?= $row['link']; ?>"><?= $row['name']; ?></a></li>
                    <?php } ?>
    			</ul>
    		</div>
    		<div id="sponsor-support-footer" class="col-md-5">
                <div class="row Separate">
		  			<div class="col-md-4"><hr></div>
		  			<div class="col-md-4">
		  				<h3 class="title text-center">Sponsors</h3>
		  			</div>
		  			<div class="col-md-4"><hr></div>
		  		</div>
                <ul class="text-center">
                    <li><img class="sponsor" src="http://www.isauw.org/img/asuw-logo2.jpg" alt="ASUW"></li>
                    <li><img class="sponsor" src="http://www.isauw.org/img/identity.png" alt="Identity"></li>
                </ul>
                <div class="row Separate">
		  			<div class="col-md-4"><hr></div>
		  			<div class="col-md-4">
		  				<h3 class="title text-center">Supported By</h3>
		  			</div>
		  			<div class="col-md-4"><hr></div>
		  		</div>
                <ul class="text-center">
                    <li>
                        <img src="http://www.isauw.org/img/SAO.png" alt="SAO">
                    </li>
                </ul>
            </div>
    	</div>
    </footer>	
	<?php 
}

# Jumbotron Template for events.
function EventJumbotron() {
    ?>
    <!-- Jumbotron
    ================================================== -->
    <div class="jumbotron">
        <h1>Events</h1>
        <p>Explore our upcomming and past events</p>
    </div><!-- /.jumbotron -->
    <?php
}

?>