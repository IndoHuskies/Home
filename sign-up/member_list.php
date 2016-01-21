<?php
	$servername = "localhost";
	$db_name = "isauw_member";
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


	$sql = "SELECT * FROM member";

	$stmt = $conn->prepare($sql);
	$stmt->execute();

	
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$json = json_encode($result);
		
?>
<!DOCTYPE html>
<html>
	<head>
		<title>ISAUW Member Sign Up</title>
		<link href="member.css" type="text/css" rel="stylesheet" />

		<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	</head>
	
	<body>
		<h1>ISAUW Member List</h1>
		
		<ol id="member-list">
			
		</ol>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript">
		var members = <?php echo $json ?>;

        $(document).ready(function() {
            $.each(members, function(i, item) {
                $('#member-list').append("<li>" + eventModel(item) + "</li>");
            });

        });

        function eventModel(item) {
            var link = item.redirect;
            if(item.link) {
                link = item.link;
            }
            return '<div><span class="label">Name:</span> ' + item.name + '</div><div><span class="label">Email:</span> ' + item.email + '</div><div><span class="label">Major:</span> ' + item.major + '</div><div><span class="label">Standing:</span> ' + item.standing + '</div><div><span class="label">Subscription:</span> ' + item.subscription + '</div><div><span class="label">Date:</span> ' + item.sign_up_date + '</div>';
        }
	</script>
	</body>
</html>
