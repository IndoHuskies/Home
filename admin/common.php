<?php

# Common header for dashboard
function adminHeader($title, $path) {
?>

	<html lang="en">
		<head>
		    <meta charset="utf-8">
		    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <meta name="description" content="This is the dasboard for editing ISAUW website">
		    <meta name="author" content="Nabil Sutjipto, Marcella Cindy Prasetio">
		    <link rel="icon" href="<?= $path ?>../../favicon.ico">

		    <title><?php echo $title ?></title>

		    <!-- Latest compiled and minified CSS -->
		    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
		    <!-- Datatables CSS -->
		    <link rel="stylesheet" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css">
		    <link rel="stylesheet" href="//jqueryte.com/css/jquery-te.css">
		    <!-- Optional theme -->
		    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
		    <!-- Custom styles for this template -->
		    <link href="<?= $path ?>dashboard.css" rel="stylesheet">

		  	<style id="holderjs-style" type="text/css"></style><style type="text/css"></style>


		    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		    <script src="http://jqueryte.com/js/jquery-te-1.4.0.min.js"></script>
		    <!-- Latest compiled and minified JavaScript -->
		    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
		    <!-- Datatables JS -->
		    <script src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
		    <script src="http://malsup.github.com/jquery.form.js"></script>

		</head>

<?php
}

# Common Navigation bar
function navbar($path) {
?>

	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    	<div id="menu-icon"><span class="glyphicon glyphicon-menu-hamburger">ISAUW Admin</span></div>
    	<div id="isauw-brand"><a class="navbar-brand" href="http://isauw.org/"><img src="<?= $path ?>../img/logoisauw.png" style="width: 2em;"></a></div>
    </div>

<?php
}


# Side navbar
function sideNavbar($path) {
?>
	<div class="col-sm-3 col-md-2 sidebar">
        <ul class="nav nav-sidebar">
        	<li class="active" id="overview"><a href="<?= $path ?>dashboard.php">Overview</a></li>
            <li id="homepage"><a href="<?= $path ?>homepage/homepage.php">Homepage</a></li>
            <li id="event"><a href="<?= $path ?>event/events.php">Events</a></li>
            <li id="volunteer"><a href="#">Keraton 2015 Volunteer</a></li>
        </ul>
        <ul class="nav nav-sidebar">
            <li id="blog"><a href="#">ISAUW Card</a></li>
        </ul>
        <ul class="nav nav-sidebar">
            <li id="officer"><a href="<?= $path ?>officer.php">Officers</a></li>
            <li id="community"><a href="<?= $path ?>community/community.php">Community</a></li>
            <li id="merchandise"><a href="<?= $path ?>merchandise/merchandise.php">Merchandise</a></li>
            <li id="member"><a href="<?= $path ?>member.php">Member</a></li>
            <li id="inventory"><a href="<?= $path ?>inventory/inventory.php">Inventory</a></li>
        </ul>
    </div>
<?php
}
?>