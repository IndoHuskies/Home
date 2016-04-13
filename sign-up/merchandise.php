<?php
	$servername = "localhost";
	$db_name = "isauw_website";
	$username = "isauw_main";
	$password = "isauw2014";

	// Create connection
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
		$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//Connect to database
	} catch (PDOException $e) {
		echo $e->getMessage();
	}


	$sql = "SELECT * FROM merchandise";

	$stmt = $conn->prepare($sql);
	$stmt->execute();

	
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$json = json_encode($result);
		
?>

<!DOCTYPE html>
<html>
	<head>
		<title>ISAUW Merchandise Test</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="https://bootstrapdocs.com/v2.0.3/docs/assets/js/bootstrap-carousel.js"></script>
		<link href="merchandise.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<div class="title">
			<img src="logo_isauw.png" alt="logo"> 
		</div>
		<h1>Merchandise</h1>

		<p>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
		</p>

		<div class="box" id="product">
		</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript">
		var products = <?php echo $json ?>;

        $(document).ready(function() {
            $.each(products, function(i, item) {
                $('#product').append(eventModel(item));
            });

        });

        function eventModel(item) {
            var link = item.redirect;
            if(item.link) {
                link = item.link;
            }
            return '<div class="container"><br><div id="carousel-example-generic" class="carousel slide" data-ride="carousel"><div class="carousel-inner"><div class="item active"><img src="' + item.mainimage + '" alt="pict"></div><div class="item"><img src="' + item.image2 + '" alt="pict"></div><div class="item"><img src="' + item.image3 + '" alt="pict"></div></div><a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></s<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></s</a></div></div><div class ="desc"><span class="name">' + item.name + '<br /></span><span class="price">' + item.price + 'USD<br /></span><span class="size' + checkStock(item.s) + '"">S</span><span class="size' + checkStock(item.m) + '"">M</span><span class="size' + checkStock(item.l) + '"">L</span><span class="size' + checkStock(item.xl) + '"">XL</span></div>';
        }

        function checkStock(item){
        	var q = parseInt(item, 10);
        	if(isNaN(q) || q === 0){
        		return ' cross';
        	}
        	return '';
        }
	</script>
	</body>
</html>