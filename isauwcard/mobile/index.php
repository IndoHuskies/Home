<?php
require_once "../database.php";

if ($_POST["element_3"]<>'') { 
    $to = "isauw@uw.edu";
    $subject = "Supporting Member Application";
    $mailheader = "From: ".$_POST["element_3"]."\r\n"; 
    $mailheader .= "Reply-To: ".$_POST["element_3"]."\r\n"; 
    $mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
    $MESSAGE_BODY = "<strong>Name:</strong><br>".$_POST["element_1"]."<br><br>"; 
    $MESSAGE_BODY .= "<strong>Email:</strong><br>".$_POST["element_3"]."<br><br>"; 
    $MESSAGE_BODY .= "<strong>Comment:</strong><br>".$_POST["element_4"]."<br><br>";
    mail($to,$subject,$MESSAGE_BODY,$mailheader);
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ISAUW Card</title>


    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-50767610-1', 'auto');
    ga('send', 'pageview');

  </script>
    
    <!-- Bootstrap -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="css/template.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:400,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
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
          <a class="navbar-brand" href="#"><img src="../img/logo_isauw_16.png" id="logo"></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../../index.php">HOME</a></li>
            <li><a href="../../officers.php">OFFICERS</a></li>
            <li><a href="../../sign-up/member.html">MEMBERS</a></li>
            <li class="active"><a href="#contact">ISAUW CARD</a></li>
            <li><a href="../../merchandise/merchandise.php">MERCHANDISE</a></li>
            <li><a href="../../event.php">EVENT</a></li>
            <li><a href="../../Keraton2016">KERATON 2016</a></li>
            <li><a href="../../community.php">COMMUNITY</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <!-- Carousel -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <!--
        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
      -->
      </ol>
      <div class="carousel-inner ">
        <div class="item active">
          <img src="../img/isauwcard2015.png" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <!--
              <h1>Example headline.</h1>
              <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
            -->
            </div>
          </div>
        </div>
        <!--
        <div class="item">
          <img src="http://placehold.it/2110x768" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Another example headline.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="http://placehold.it/2110x768" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>One more for good measure.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
            </div>
          </div>
        </div>
      -->
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>

    <div class="container">
    <!--  About ISAUW Card ================================================================ -->
      <section id="about" class="page">

        <div class="row">
          <header>
            <h1>ISAUW CARD</h1>
            <hr>
            <h5>For Your Every Need.</h5>
          </header>
          <div class="row" id="promo-pic">
            <img src="../img/isauwcardhome.JPG" class="img-rounded img-responsive">
          </div>
          <div class="col-md-4 ">
            <h4>What Is It?</h4>
            <p>
              ISAUW Card is a student discount card that offers exclusive promotions to its cardholders. Available for only $5, you can benefit perks from not just restaurants, but also fitness, leisure, and copy-printing services all over Seattle.
            </p>
            <p>
            The ISAUW Card is now more innovative than ever: simply snap the QR code on the back of the card to access the list of vendors through your mobile phone. With these perks that will multiply throughout the year, it’s a perfect addition to your Seattle experience!
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-md-offset-2">
            <h4> Where To Get it?</h4>
            <P>Please fill the form at the bottom of this page or contact:</p>
            <br>
            <br>
            <img src="../img/Promotion 2.jpg" class="img-rounded img-responsive">
          </div>
          <div class="col-md-4">
            <br>
            <br>
            <address>
              <strong>UW, Seattle - Peter Tandio</strong><br>
              <abbr title="Phone">P:</abbr> (206) 422-3599<br>
              <a href="mailto:#"></a>
            </address>
            <address>
              <strong>UW, Bothell - Chaercha Angely</strong><br>
              <abbr title="Phone">P:</abbr> (425) 835-1990<br>
              <a href="mailto:#"></a>
            </address>
            <address>
              <strong>Bellevue - Claudia Hartono</strong><br>
              <abbr title="Phone">P:</abbr> (425) 633-0006<br>
              <a href="mailto:#"></a>
            </address>
            <address>
              <strong>North Seattle - Christopher Bernard</strong><br>
              <abbr title="Phone">P:</abbr> (425) 623-8268<br>
              <a href="mailto:#"></a>
            </address>
            <address>
              <strong>AIS - Randy Hermawan</strong><br>
              <abbr title="Phone">P:</abbr> (206) 788-6612<br>
              <a href="mailto:#"></a>
            </address>
            <address>
              <strong>Edmonds - Darren Abisha</strong><br>
              <abbr title="Phone">P:</abbr> (425) 232-0159<br>
              <a href="mailto:#"></a>
            </address>
            <address>
              <strong>Seattle University - Winda Halim</strong><br>
              <abbr title="Phone">P:</abbr> (206) 454-0906<br>
              <a href="mailto:#"></a>
            </address>
            <address>
              <strong>Shoreline - Ryan Kevin</strong><br>
              <abbr title="Phone">P:</abbr> (425) 943-1779<br>
              <a href="mailto:#"></a>
            </address>
            <address>
              <strong>Seattle Central - Gilbert Febrianto</strong><br>
              <abbr title="Phone">P:</abbr> (253) 213-7831<br>
              <a href="mailto:#"></a>
            </address>
          </div>
        </div>
        <div class="row">
        </div>
      </section>

      <section id="restaurant" class="page">
        <div class="row">
          <header>
            <h1>VENDORS LIST</h1>
            <hr>
          </header>
          <h3 id="udistrict-toggle">University District</h3>
          <div class="row restaurant" id="udistrict">
            <?php
                $query = "SELECT * 
                          FROM restaurant r
                          INNER JOIN address a ON r.id = a.restaurant_id
                          WHERE location =  'U District'
                          ORDER BY name ASC";

                if ($result = mysqli_query($conn, $query)) { 
                  while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col-sm-8">
              <div id="popup">
                <h4 class="text-center"><?= $row["name"] ?></h4>
                <hr>
                <div class="box">
                  <p class="text-left"><?= $row["deal"] ?></p>
                  <small>
                    <address class="text-left">
                      <?= $row["address"] ?><br>
                      <?= $row["state"] ?>,  <?= $row["zipcode"] ?>
                      <br><br>
                      <abbr title="Phone">P:</abbr> <?= $row["phone"] ?>
                    </address>
                  </small>
                  <?php
                  if ($row["website"] != "") {
                    ?>
                    <a href="<?= $row["website"] ?>" target="_blank">
                      <small class="text-left"> click for site..</small>
                    </a>
                    <?php } ?>
                </div>
                <div class="box">
                  <?php
                          $query_menu = "SELECT *
                                          FROM top_menu t
                                          INNER JOIN restaurant r ON t.restaurant_id = r.id
                                          WHERE restaurant_id = ".$row["id"];

                          if ($menu = mysqli_query($conn, $query_menu)) { 
                            $row_2 = mysqli_fetch_assoc($menu);
                            if($row_2["menu_1"] != "") {
                            ?>
                            <p class="text-left">Top 5 Menu:</p>
                            <ul class="text-left">
                              <?php
                              if ($row_2["menu_1"] != "") {
                              ?>
                              <li><?= $row_2["menu_1"] ?></li>
                              <?php } ?>
                              <?php
                              if ($row_2["menu_2"] != "") {
                              ?>
                              <li><?= $row_2["menu_2"] ?></li>
                              <?php } ?>
                              <?php
                              if ($row_2["menu_3"] != "") {
                              ?>
                              <li><?= $row_2["menu_3"] ?></li>
                              <?php } ?>
                              <?php
                              if ($row_2["menu_4"] != "") {
                              ?>
                              <li><?= $row_2["menu_4"] ?></li>
                              <?php } ?>
                              <?php
                              if ($row_2["menu_5"] != "") {
                              ?>
                              <li><?= $row_2["menu_5"] ?></li>
                              <?php } ?>
                            </ul>
                          <?php }
                          } ?>
                          <br>
                </div>
              </div>
            </div>
            <?php
                  }
                }
 
              ?>
          </div>
          <h3 id="chinatown-toggle">Chinatown</h3>
          <div class="row restaurant" id="chinatown">
            <?php
                $query = "SELECT * 
                          FROM restaurant r
                          INNER JOIN address a ON r.id = a.restaurant_id
                          WHERE location =  'Chinatown'
                          ORDER BY name ASC";

                if ($result = mysqli_query($conn, $query)) { 
                  while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col-md-8">
              <div id="popup">
                <h4 class="text-center"><?= $row["name"] ?></h4>
                <hr>
                <div class="box">
                  <p class="text-left"><?= $row["deal"] ?></p>
                  <small>
                    <address class="text-left">
                      <?= $row["address"] ?><br>
                      <?= $row["state"] ?>,  <?= $row["zipcode"] ?>
                      <br><br>
                      <abbr title="Phone">P:</abbr> <?= $row["phone"] ?>
                    </address>
                  </small>
                  <?php
                  if ($row["website"] != "") {
                    ?>
                    <a href="<?= $row["website"] ?>" target="_blank">
                      <small class="text-left"> click for site..</small>
                    </a>
                    <?php } ?>
                </div>
                <div class="box">
                  <?php
                          $query_menu = "SELECT *
                                          FROM top_menu t
                                          INNER JOIN restaurant r ON t.restaurant_id = r.id
                                          WHERE restaurant_id = ".$row["id"];

                          if ($menu = mysqli_query($conn, $query_menu)) { 
                            $row_2 = mysqli_fetch_assoc($menu);
                            if($row_2["menu_1"] != "") {
                            ?>
                            <p class="text-left">Top 5 Menu:</p>
                            <ul class="text-left">
                              <?php
                              if ($row_2["menu_1"] != "") {
                              ?>
                              <li><?= $row_2["menu_1"] ?></li>
                              <?php } ?>
                              <?php
                              if ($row_2["menu_2"] != "") {
                              ?>
                              <li><?= $row_2["menu_2"] ?></li>
                              <?php } ?>
                              <?php
                              if ($row_2["menu_3"] != "") {
                              ?>
                              <li><?= $row_2["menu_3"] ?></li>
                              <?php } ?>
                              <?php
                              if ($row_2["menu_4"] != "") {
                              ?>
                              <li><?= $row_2["menu_4"] ?></li>
                              <?php } ?>
                              <?php
                              if ($row_2["menu_5"] != "") {
                              ?>
                              <li><?= $row_2["menu_5"] ?></li>
                              <?php } ?>
                            </ul>
                          <?php }
                          } ?>
                          <br>
                </div>
              </div>
            </div>
            <?php
                  }
                }
 
              ?>
          </div>
          <h3 id="northgate-toggle">Northgate</h3>
          <div class="row restaurant" id="northgate">
            <?php
                $query = "SELECT * 
                          FROM restaurant r
                          INNER JOIN address a ON r.id = a.restaurant_id
                          WHERE location =  'Northgate'
                          ORDER BY name ASC";

                if ($result = mysqli_query($conn, $query)) { 
                  while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col-md-8">
              <div id="popup">
                <h4 class="text-center"><?= $row["name"] ?></h4>
                <hr>
                <div class="box">
                  <p class="text-left"><?= $row["deal"] ?></p>
                  <small>
                    <address class="text-left">
                      <?= $row["address"] ?><br>
                      <?= $row["state"] ?>,  <?= $row["zipcode"] ?>
                      <br><br>
                      <abbr title="Phone">P:</abbr> <?= $row["phone"] ?>
                    </address>
                  </small>
                  <?php
                  if ($row["website"] != "") {
                    ?>
                    <a href="<?= $row["website"] ?>" target="_blank">
                      <small class="text-left"> click for site..</small>
                    </a>
                    <?php } ?>
                </div>
                <div class="box">
                  <?php
                          $query_menu = "SELECT *
                                          FROM top_menu t
                                          INNER JOIN restaurant r ON t.restaurant_id = r.id
                                          WHERE restaurant_id = ".$row["id"];

                          if ($menu = mysqli_query($conn, $query_menu)) { 
                            $row_2 = mysqli_fetch_assoc($menu);
                            if($row_2["menu_1"] != "") {
                            ?>
                            <p class="text-left">Top 5 Menu:</p>
                            <ul class="text-left">
                              <?php
                              if ($row_2["menu_1"] != "") {
                              ?>
                              <li><?= $row_2["menu_1"] ?></li>
                              <?php } ?>
                              <?php
                              if ($row_2["menu_2"] != "") {
                              ?>
                              <li><?= $row_2["menu_2"] ?></li>
                              <?php } ?>
                              <?php
                              if ($row_2["menu_3"] != "") {
                              ?>
                              <li><?= $row_2["menu_3"] ?></li>
                              <?php } ?>
                              <?php
                              if ($row_2["menu_4"] != "") {
                              ?>
                              <li><?= $row_2["menu_4"] ?></li>
                              <?php } ?>
                              <?php
                              if ($row_2["menu_5"] != "") {
                              ?>
                              <li><?= $row_2["menu_5"] ?></li>
                              <?php } ?>
                            </ul>
                          <?php }
                          } ?>
                          <br>
                </div>
              </div>
            </div>
            <?php
                  }
                }
 
              ?>
          </div>
          <h3 id="capitolhill-toggle">Capitol Hill</h3>
          <div class="row restaurant" id="capitolhill">
            <?php
                $query = "SELECT * 
                          FROM restaurant r
                          INNER JOIN address a ON r.id = a.restaurant_id
                          WHERE location =  'Capitol Hill'
                          ORDER BY name ASC";

                if ($result = mysqli_query($conn, $query)) { 
                  while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col-md-8">
              <div id="popup">
                <h4 class="text-center"><?= $row["name"] ?></h4>
                <hr>
                <div class="box">
                  <p class="text-left"><?= $row["deal"] ?></p>
                  <small>
                    <address class="text-left">
                      <?= $row["address"] ?><br>
                      <?= $row["state"] ?>,  <?= $row["zipcode"] ?>
                      <br><br>
                      <abbr title="Phone">P:</abbr> <?= $row["phone"] ?>
                    </address>
                  </small>
                  <?php
                  if ($row["website"] != "") {
                    ?>
                    <a href="<?= $row["website"] ?>" target="_blank">
                      <small class="text-left"> click for site..</small>
                    </a>
                    <?php } ?>
                </div>
                <div class="box">
                  <?php
                          $query_menu = "SELECT *
                                          FROM top_menu t
                                          INNER JOIN restaurant r ON t.restaurant_id = r.id
                                          WHERE restaurant_id = ".$row["id"];

                          if ($menu = mysqli_query($conn, $query_menu)) { 
                            $row_2 = mysqli_fetch_assoc($menu);
                            if($row_2["menu_1"] != "") {
                            ?>
                            <p class="text-left">Top 5 Menu:</p>
                            <ul class="text-left">
                              <?php
                              if ($row_2["menu_1"] != "") {
                              ?>
                              <li><?= $row_2["menu_1"] ?></li>
                              <?php } ?>
                              <?php
                              if ($row_2["menu_2"] != "") {
                              ?>
                              <li><?= $row_2["menu_2"] ?></li>
                              <?php } ?>
                              <?php
                              if ($row_2["menu_3"] != "") {
                              ?>
                              <li><?= $row_2["menu_3"] ?></li>
                              <?php } ?>
                              <?php
                              if ($row_2["menu_4"] != "") {
                              ?>
                              <li><?= $row_2["menu_4"] ?></li>
                              <?php } ?>
                              <?php
                              if ($row_2["menu_5"] != "") {
                              ?>
                              <li><?= $row_2["menu_5"] ?></li>
                              <?php } ?>
                            </ul>
                          <?php }
                          } ?>
                          <br>
                </div>
              </div>
            </div>
            <?php
                  }
                }
 
              ?>
          </div>
          <h3 id="bellevue-toggle">Bellevue</h3>
          <div class="row restaurant" id="bellevue">
            <?php
                $query = "SELECT * 
                          FROM restaurant r
                          INNER JOIN address a ON r.id = a.restaurant_id
                          WHERE location =  'Bellevue'
                          ORDER BY name ASC";

                if ($result = mysqli_query($conn, $query)) { 
                  while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col-md-8">
              <div id="popup">
                <h4 class="text-center"><?= $row["name"] ?></h4>
                <hr>
                <div class="box">
                  <p class="text-left"><?= $row["deal"] ?></p>
                  <small>
                    <address class="text-left">
                      <?= $row["address"] ?><br>
                      <?= $row["state"] ?>,  <?= $row["zipcode"] ?>
                      <br><br>
                      <abbr title="Phone">P:</abbr> <?= $row["phone"] ?>
                    </address>
                  </small>
                  <?php
                  if ($row["website"] != "") {
                    ?>
                    <a href="<?= $row["website"] ?>" target="_blank">
                      <small class="text-left"> click for site..</small>
                    </a>
                    <?php } ?>
                </div>
                <div class="box">
                  <?php
                          $query_menu = "SELECT *
                                          FROM top_menu t
                                          INNER JOIN restaurant r ON t.restaurant_id = r.id
                                          WHERE restaurant_id = ".$row["id"];

                          if ($menu = mysqli_query($conn, $query_menu)) { 
                            $row_2 = mysqli_fetch_assoc($menu);
                            if($row_2["menu_1"] != "") {
                            ?>
                            <p class="text-left">Top 5 Menu:</p>
                            <ul class="text-left">
                              <?php
                              if ($row_2["menu_1"] != "") {
                              ?>
                              <li><?= $row_2["menu_1"] ?></li>
                              <?php } ?>
                              <?php
                              if ($row_2["menu_2"] != "") {
                              ?>
                              <li><?= $row_2["menu_2"] ?></li>
                              <?php } ?>
                              <?php
                              if ($row_2["menu_3"] != "") {
                              ?>
                              <li><?= $row_2["menu_3"] ?></li>
                              <?php } ?>
                              <?php
                              if ($row_2["menu_4"] != "") {
                              ?>
                              <li><?= $row_2["menu_4"] ?></li>
                              <?php } ?>
                              <?php
                              if ($row_2["menu_5"] != "") {
                              ?>
                              <li><?= $row_2["menu_5"] ?></li>
                              <?php } ?>
                            </ul>
                          <?php }
                          } ?>
                          <br>
                </div>
              </div>
            </div>
            <?php
                  }
                }
 
              ?>
          </div>
          <h3 id="edmonds-toggle">Edmonds</h3>
          <div class="row restaurant" id="edmonds">
            <?php
                $query = "SELECT * 
                          FROM restaurant r
                          INNER JOIN address a ON r.id = a.restaurant_id
                          WHERE location =  'Edmonds'
                          ORDER BY name ASC";

                if ($result = mysqli_query($conn, $query)) { 
                  while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col-md-8">
              <div id="popup">
                <h4 class="text-center"><?= $row["name"] ?></h4>
                <hr>
                <div class="box">
                  <p class="text-left"><?= $row["deal"] ?></p>
                  <small>
                    <address class="text-left">
                      <?= $row["address"] ?><br>
                      <?= $row["state"] ?>,  <?= $row["zipcode"] ?>
                      <br><br>
                      <abbr title="Phone">P:</abbr> <?= $row["phone"] ?>
                    </address>
                  </small>
                  <?php
                  if ($row["website"] != "") {
                    ?>
                    <a href="<?= $row["website"] ?>" target="_blank">
                      <small class="text-left"> click for site..</small>
                    </a>
                    <?php } ?>
                </div>
                <div class="box">
                  <?php
                          $query_menu = "SELECT *
                                          FROM top_menu t
                                          INNER JOIN restaurant r ON t.restaurant_id = r.id
                                          WHERE restaurant_id = ".$row["id"];

                          if ($menu = mysqli_query($conn, $query_menu)) { 
                            $row_2 = mysqli_fetch_assoc($menu);
                            if($row_2["menu_1"] != "") {
                            ?>
                            <p class="text-left">Top 5 Menu:</p>
                            <ul class="text-left">
                              <?php
                              if ($row_2["menu_1"] != "") {
                              ?>
                              <li><?= $row_2["menu_1"] ?></li>
                              <?php } ?>
                              <?php
                              if ($row_2["menu_2"] != "") {
                              ?>
                              <li><?= $row_2["menu_2"] ?></li>
                              <?php } ?>
                              <?php
                              if ($row_2["menu_3"] != "") {
                              ?>
                              <li><?= $row_2["menu_3"] ?></li>
                              <?php } ?>
                              <?php
                              if ($row_2["menu_4"] != "") {
                              ?>
                              <li><?= $row_2["menu_4"] ?></li>
                              <?php } ?>
                              <?php
                              if ($row_2["menu_5"] != "") {
                              ?>
                              <li><?= $row_2["menu_5"] ?></li>
                              <?php } ?>
                            </ul>
                          <?php }
                          } ?>
                          <br>
                </div>
              </div>
            </div>
            <?php
                  }
                }
 
              ?>
          </div>
          <h3 id="greenlake-toggle">Redmond</h3>
          <div class="row restaurant" id="greenlake">
            <?php
                $query = "SELECT * 
                          FROM restaurant r
                          INNER JOIN address a ON r.id = a.restaurant_id
                          WHERE location =  'Redmond'
                          ORDER BY name ASC";

                if ($result = mysqli_query($conn, $query)) { 
                  while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col-md-8">
              <div id="popup">
                <h4 class="text-center"><?= $row["name"] ?></h4>
                <hr>
                <div class="box">
                  <p class="text-left"><?= $row["deal"] ?></p>
                  <small>
                    <address class="text-left">
                      <?= $row["address"] ?><br>
                      <?= $row["state"] ?>,  <?= $row["zipcode"] ?>
                      <br><br>
                      <abbr title="Phone">P:</abbr> <?= $row["phone"] ?>
                    </address>
                  </small>
                  <?php
                  if ($row["website"] != "") {
                    ?>
                    <a href="<?= $row["website"] ?>" target="_blank">
                      <small class="text-left"> click for site..</small>
                    </a>
                    <?php } ?>
                </div>
                <div class="box">
                  <?php
                          $query_menu = "SELECT *
                                          FROM top_menu t
                                          INNER JOIN restaurant r ON t.restaurant_id = r.id
                                          WHERE restaurant_id = ".$row["id"];

                          if ($menu = mysqli_query($conn, $query_menu)) { 
                            $row_2 = mysqli_fetch_assoc($menu);
                            if($row_2["menu_1"] != "") {
                            ?>
                            <p class="text-left">Top 5 Menu:</p>
                            <ul class="text-left">
                              <?php
                              if ($row_2["menu_1"] != "") {
                              ?>
                              <li><?= $row_2["menu_1"] ?></li>
                              <?php } ?>
                              <?php
                              if ($row_2["menu_2"] != "") {
                              ?>
                              <li><?= $row_2["menu_2"] ?></li>
                              <?php } ?>
                              <?php
                              if ($row_2["menu_3"] != "") {
                              ?>
                              <li><?= $row_2["menu_3"] ?></li>
                              <?php } ?>
                              <?php
                              if ($row_2["menu_4"] != "") {
                              ?>
                              <li><?= $row_2["menu_4"] ?></li>
                              <?php } ?>
                              <?php
                              if ($row_2["menu_5"] != "") {
                              ?>
                              <li><?= $row_2["menu_5"] ?></li>
                              <?php } ?>
                            </ul>
                          <?php }
                          } ?>
                          <br>
                </div>
              </div>
            </div>
            <?php
                  }
                }
 
              ?>
          </div>
          <h3 id="lcity-toggle">Lake City</h3>
          <div class="row restaurant" id="lcity">
            <?php
                $query = "SELECT * 
                          FROM restaurant r
                          INNER JOIN address a ON r.id = a.restaurant_id
                          WHERE location =  'Lake City'
                          ORDER BY name ASC";

                if ($result = mysqli_query($conn, $query)) { 
                  while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col-md-8">
              <div id="popup">
                <h4 class="text-center"><?= $row["name"] ?></h4>
                <hr>
                <div class="box">
                  <p class="text-left"><?= $row["deal"] ?></p>
                  <small>
                    <address class="text-left">
                      <?= $row["address"] ?><br>
                      <?= $row["state"] ?>,  <?= $row["zipcode"] ?>
                      <br><br>
                      <abbr title="Phone">P:</abbr> <?= $row["phone"] ?>
                    </address>
                  </small>
                  <?php
                  if ($row["website"] != "") {
                    ?>
                    <a href="<?= $row["website"] ?>" target="_blank">
                      <small class="text-left"> click for site..</small>
                    </a>
                    <?php } ?>
                </div>
                <div class="box">
                  <?php
                          $query_menu = "SELECT *
                                          FROM top_menu t
                                          INNER JOIN restaurant r ON t.restaurant_id = r.id
                                          WHERE restaurant_id = ".$row["id"];

                          if ($menu = mysqli_query($conn, $query_menu)) { 
                            $row_2 = mysqli_fetch_assoc($menu);
                            if($row_2["menu_1"] != "") {
                            ?>
                            <p class="text-left">Top 5 Menu:</p>
                            <ul class="text-left">
                              <?php
                              if ($row_2["menu_1"] != "") {
                              ?>
                              <li><?= $row_2["menu_1"] ?></li>
                              <?php } ?>
                              <?php
                              if ($row_2["menu_2"] != "") {
                              ?>
                              <li><?= $row_2["menu_2"] ?></li>
                              <?php } ?>
                              <?php
                              if ($row_2["menu_3"] != "") {
                              ?>
                              <li><?= $row_2["menu_3"] ?></li>
                              <?php } ?>
                              <?php
                              if ($row_2["menu_4"] != "") {
                              ?>
                              <li><?= $row_2["menu_4"] ?></li>
                              <?php } ?>
                              <?php
                              if ($row_2["menu_5"] != "") {
                              ?>
                              <li><?= $row_2["menu_5"] ?></li>
                              <?php } ?>
                            </ul>
                          <?php }
                          } ?>
                          <br>
                </div>
              </div>
            </div>
            <?php
                  }
                }
 
              ?>
          </div>
          <h3 id="wallingford-toggle">Wallingford</h3>
          <div class="row restaurant" id="wallingford">
            <?php
                $query = "SELECT * 
                          FROM restaurant r
                          INNER JOIN address a ON r.id = a.restaurant_id
                          WHERE location =  'Wallingford'
                          ORDER BY name ASC";

                if ($result = mysqli_query($conn, $query)) { 
                  while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col-md-8">
              <div id="popup">
                <h4 class="text-center"><?= $row["name"] ?></h4>
                <hr>
                <div class="box">
                  <p class="text-left"><?= $row["deal"] ?></p>
                  <small>
                    <address class="text-left">
                      <?= $row["address"] ?><br>
                      <?= $row["state"] ?>,  <?= $row["zipcode"] ?>
                      <br><br>
                      <abbr title="Phone">P:</abbr> <?= $row["phone"] ?>
                    </address>
                  </small>
                  <?php
                  if ($row["website"] != "") {
                    ?>
                    <a href="<?= $row["website"] ?>" target="_blank">
                      <small class="text-left"> click for site..</small>
                    </a>
                    <?php } ?>
                </div>
                <div class="box">
                  <?php
                          $query_menu = "SELECT *
                                          FROM top_menu t
                                          INNER JOIN restaurant r ON t.restaurant_id = r.id
                                          WHERE restaurant_id = ".$row["id"];

                          if ($menu = mysqli_query($conn, $query_menu)) { 
                            $row_2 = mysqli_fetch_assoc($menu);
                            if($row_2["menu_1"] != "") {
                            ?>
                            <p class="text-left">Top 5 Menu:</p>
                            <ul class="text-left">
                              <?php
                              if ($row_2["menu_1"] != "") {
                              ?>
                              <li><?= $row_2["menu_1"] ?></li>
                              <?php } ?>
                              <?php
                              if ($row_2["menu_2"] != "") {
                              ?>
                              <li><?= $row_2["menu_2"] ?></li>
                              <?php } ?>
                              <?php
                              if ($row_2["menu_3"] != "") {
                              ?>
                              <li><?= $row_2["menu_3"] ?></li>
                              <?php } ?>
                              <?php
                              if ($row_2["menu_4"] != "") {
                              ?>
                              <li><?= $row_2["menu_4"] ?></li>
                              <?php } ?>
                              <?php
                              if ($row_2["menu_5"] != "") {
                              ?>
                              <li><?= $row_2["menu_5"] ?></li>
                              <?php } ?>
                            </ul>
                          <?php }
                          } ?>
                          <br>
                </div>
              </div>
            </div>
            <?php
                  }
                }
 
              ?>
          </div>
          <h3 id="shoreline-toggle">Shoreline</h3>
          <div class="row restaurant" id="shoreline">
            <?php
                $query = "SELECT * 
                          FROM restaurant r
                          INNER JOIN address a ON r.id = a.restaurant_id
                          WHERE location =  'Shoreline'
                          ORDER BY name ASC";

                if ($result = mysqli_query($conn, $query)) { 
                  while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col-md-8">
              <div id="popup">
                <h4 class="text-center"><?= $row["name"] ?></h4>
                <hr>
                <div class="box">
                  <p class="text-left"><?= $row["deal"] ?></p>
                  <small>
                    <address class="text-left">
                      <?= $row["address"] ?><br>
                      <?= $row["state"] ?>,  <?= $row["zipcode"] ?>
                      <br><br>
                      <abbr title="Phone">P:</abbr> <?= $row["phone"] ?>
                    </address>
                  </small>
                  <?php
                  if ($row["website"] != "") {
                    ?>
                    <a href="<?= $row["website"] ?>" target="_blank">
                      <small class="text-left"> click for site..</small>
                    </a>
                    <?php } ?>
                </div>
                <div class="box">
                  <?php
                          $query_menu = "SELECT *
                                          FROM top_menu t
                                          INNER JOIN restaurant r ON t.restaurant_id = r.id
                                          WHERE restaurant_id = ".$row["id"];

                          if ($menu = mysqli_query($conn, $query_menu)) { 
                            $row_2 = mysqli_fetch_assoc($menu);
                            if($row_2["menu_1"] != "") {
                            ?>
                            <p class="text-left">Top 5 Menu:</p>
                            <ul class="text-left">
                              <?php
                              if ($row_2["menu_1"] != "") {
                              ?>
                              <li><?= $row_2["menu_1"] ?></li>
                              <?php } ?>
                              <?php
                              if ($row_2["menu_2"] != "") {
                              ?>
                              <li><?= $row_2["menu_2"] ?></li>
                              <?php } ?>
                              <?php
                              if ($row_2["menu_3"] != "") {
                              ?>
                              <li><?= $row_2["menu_3"] ?></li>
                              <?php } ?>
                              <?php
                              if ($row_2["menu_4"] != "") {
                              ?>
                              <li><?= $row_2["menu_4"] ?></li>
                              <?php } ?>
                              <?php
                              if ($row_2["menu_5"] != "") {
                              ?>
                              <li><?= $row_2["menu_5"] ?></li>
                              <?php } ?>
                            </ul>
                          <?php }
                          } ?>
                          <br>
                </div>
              </div>
            </div>
            <?php
                  }
                }
 
              ?>
          </div>
        </div>
      </section>

      <section id="social" class="page">
        <div class="row">
          <div class="col-md-4"><h2>Get Social</h2></div>
          <div class="col-md-4 col-md-offset-4 text-right"><button type="button" class="btn btn-default">Share your experience</div></div>
          <br>
          <div class="col-md-12 text-center">
            Use the <span class="hashtag">#ISAUWCard</span> on Instagram and get featured in our site!
          </div>
          <div id="insta1"></div>
        </div>
      </section>
    </div>

    <div id="footer-space"></div>
    <footer>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-6">
              <h2>Do you love it?</h2>
                <hr>
                <p>
                  Are you interested in purchasing a card? Interested in being an ISAUW Card Ambassador? Restaurants, are you interested in collaborating with us? Please leave us a message here and we will reply you shortly! Throughout time, all we want is to give out the best and so we really appreciate your suggestions. Let us hear what you have to say!
                </p>
            </div>
            <div class="col-md-6">
              <?php
              if ($_POST["element_3"]<>'') {
                ?> <p class="bg-success">Form succesfully submitted! we will contact you shortly</p>
              <?php } ?> 
              <form role="form" id="contact-form" action="">
                <div class="form-group">
                  <input type="text" class="form-control" name="element_1" id="exampleInputEmail1" placeholder="What is your name?">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="element_3" id="exampleInputemail" placeholder="What is your email?">
                </div>
                <textarea class="form-control" rows="3" name="element_4"  placeholder="How can we help you?"></textarea>
                <br>
                <button type="submit" class="btn btn-danger">Submit</button>
            </div>
          </div>
        </div>
        <div class="col-md-6">
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
    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.4.4/underscore-min.js'></script>
    <script src='../js/instagram.js' type='text/javascript' charset='utf-8'></script>
    <script type="text/template" id="photo-template">
            <div class="img-container">
              <!-- Instagram pic -->
              <div class='photo imageThree image'>
                <a href='<%= url %>' target='_blank'>
                  <img class='main' src='<%= photo %>' width='250' height='250' style='display:none;' onload='Instagram.App.showPhoto(this);' />
                </a>
              </div>
              <div class='captions'>
              <blockquote class="blockquote-reverse">
                <p>
                  <%= caption %>
                </p>
                <footer><%= username %></footer>
              </blockquote>
              </div>
                <div class="post">
                  <img class='avatar img-thumbnail' width='40' height='40' src='<%= avatar %>' />
                  <span class='heart'><strong><%= count %></strong></span>
                </div>
            </div>
    </script>
    <script type="text/javascript">
      $("#udistrict-toggle").click(function(){
          $("#udistrict").toggle("slow");
      });
      $("#chinatown-toggle").click(function(){
          $("#chinatown").toggle("slow");
      });
      $("#northgate-toggle").click(function(){
          $("#northgate").toggle("slow");
      });
      $("#capitolhill-toggle").click(function(){
          $("#capitolhill").toggle("slow");
      });
      $("#bellevue-toggle").click(function(){
          $("#bellevue").toggle("slow");
      });
      $("#edmonds-toggle").click(function(){
          $("#edmonds").toggle("slow");
      });
      $("#greenlake-toggle").click(function(){
          $("#greenlake").toggle("slow");
      });
      $("#lcity-toggle").click(function(){
          $("#lcity").toggle("slow");
      });
      $("#wallingford-toggle").click(function(){
          $("#wallingford").toggle("slow");
      });
      $("#shoreline-toggle").click(function(){
          $("#shoreline").toggle("slow");
      });
    </script>
  </body>
</html>