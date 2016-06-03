<?php
	$servername = "";
	$db_name = "";
	$username = "";
	$password = "";

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

        <link rel="stylesheet" type="text/css" href="<?= $path ?>/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?= $path ?>isauwcard/css/template.css">
        <!-- Survival Guide -->
        <link rel="stylesheet" type="text/css" href="<?= $path ?>css/sv-guide.css">

        <link href='http://fonts.googleapis.com/css?family=Ubuntu:400,700' rel='stylesheet' type='text/css'>

    </head>
    <!-- NAVBAR ================================================== -->
    <body>

        <!-- Navigation Section -->
        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#"><img src="img/logo_isauw_16 copy.png" id="logo"></a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="/index.php">HOME</a></li>
                <li><a href="/officers.php">OFFICERS</a></li>
                <li><a href="/sign-up/member.html">MEMBERS</a></li>
                <li><a href="/isauwcard/">ISAUW CARD</a></li>
                <li><a href="/merchandise/merchandise.php">MERCHANDISE</a></li>
                <li><a href="/event.php">EVENT</a></li>
                <li><a href="/Keraton2016">KERATON 2016</a></li>
                <li><a href="/community.php">COMMUNITY</a></li>
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
    		<div id="contact-footer" class="col-md-4">
                <div class="wrapper align-center">
            
                    <div class="text" itemscope itemtype="http://schema.org/Organization">
                      <h2>Contact Us</h2>
                      <hr>
                      <p style="color: #ffffff;" itemprop="address">Husky Union Building 232, <br>BOX 352238, <br>Seattle, WA 98195</p>
                      <p style="color: #ffffff;"><span itemprop="email">Email: <a href="mailto:isauw@uw.edu">isauw@uw.edu</a></span><br>Website: <span itemprop="url"><a href="www.isauw.org">www.isauw.org</a></span></p>
                      <hr>
                      
                    </div>
                    
                </div>    
            </div>

            <div class="col-md-4">
                <div class="wrapper align-center">
                    <iframe id="map" width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Husky+Union+Building+(HUB),+Northeast+Stevens+Way,+Seattle,+WA&amp;aq=0&amp;oq=hus&amp;sll=47.613028,-122.342064&amp;sspn=0.27079,0.676346&amp;ie=UTF8&amp;hq=Husky+Union+Building+(HUB),+Northeast+Stevens+Way,+Seattle,+WA&amp;ll=47.655258,-122.30492&amp;spn=0.006295,0.006295&amp;t=m&amp;z=13&amp;output=embed"></iframe>
                </div>
            </div>

            <div class="col-md-4">
                <div class="wrapper align-center">
                    <ul class="social icons align-center">
                        <li><a href="https://www.facebook.com/isauw.huskies/?fref=ts" class="icon-facebook"></a></li>
                        <li><a href="http://instagram.com/isauwhuskies" class="icon-instagram"></a></li>
                        <li><a href="https://twitter.com/isauw" class="icon-twitter"></a></li>
                        <li><a href="https://www.youtube.com/watch?v=3SHA2DM7Gxs&list=PL1ya6d1mzAvTbETjquI6wB665d3ctzaB1" class="icon-youtube"></a></li>
                    </ul>
                </div>
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
        <p>Explore our upcoming and past events</p>
    </div><!-- /.jumbotron -->
    <?php
}

?>