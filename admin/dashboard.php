<?php
  require_once "../models/config.php";

  if(!isUserLoggedIn()) {
    header("Location: index.php");
  }
?>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="This is the dasboard for editing ISAUW website">
    <meta name="author" content="Nabil Sutjipto">
    <link rel="icon" href="../../favicon.ico">

    <title>Dashboard</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

    <!-- Datatables CSS -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="//jqueryte.com/css/jquery-te.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script src="http://jqueryte.com/js/jquery-te-1.4.0.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

    <!-- Datatables JS -->
    <script src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>

    <script src="http://malsup.github.com/jquery.form.js"></script>

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

  <style id="holderjs-style" type="text/css"></style><style type="text/css"></style></head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="../img/logoisauw.png" style="width: 2%;"></a>
        </div>
        <div class="navbar-collapse collapse">
          <!-- <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form> -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active" id="overview"><a href="#">Overview</a></li>
            <li id="homepage"><a href="#">Homepage</a></li>
            <li id="event"><a href="#">Events</a></li>
            <li id="volunteer"><a href="#">Keraton 2015 Volunteer</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li id="blog"><a href="#">ISAUW Card</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li id="officer"><a href="#">Officers</a></li>
            <li id="community"><a href="#">Community</a></li>
          </ul>
        </div>
        <div id="main_content" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
          <!-- content -->
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript">
      $( document ).ready(function() {
        // For onload splash page
        $.ajax({url:"overview.php",success:function(result){
            $("#main_content").html(result);
          }});

        $("#overview").click(function(){
          $("ul.nav-sidebar li").removeClass("active");
          $("#overview").addClass("active");
          $.ajax({url:"overview.php",success:function(result){
            $("#main_content").html(result);
          }});
        });

        $("#event").click(function(){
          $("ul.nav-sidebar li").removeClass("active");
          $("#event").addClass("active");
          $.ajax({url:"events.php",success:function(result){
            $("#main_content").html(result);
          }});
        });

        $("#volunteer").click(function(){
          $("ul.nav-sidebar li").removeClass("active");
          $("#volunteer").addClass("active");
          $.ajax({url:"volunteer.php",success:function(result){
            $("#main_content").html(result);
          }});
        });

        $("#community").click(function(){
          $("ul.nav-sidebar li").removeClass("active");
          $("#community").addClass("active");
          $.ajax({url:"community.php",success:function(result){
            $("#main_content").html(result);
          }});
        });

        $("#officer").click(function(){
          $("ul.nav-sidebar li").removeClass("active");
          $("#officer").addClass("active");
          $.ajax({url:"officer.php",success:function(result){
            $("#main_content").html(result);
          }});
        });
      });
    </script>
</body>
</html>