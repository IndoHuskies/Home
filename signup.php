<?php 
if ($_POST["element_3"]<>'') { 
    $to = "isauw@uw.edu";
	$subject = "Supporting Member Application";
	$mailheader = "From: ".$_POST["element_3"]."\r\n"; 
    $mailheader .= "Reply-To: ".$_POST["element_3"]."\r\n"; 
    $mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
	$MESSAGE_BODY = "<strong>Name:</strong><br>".$_POST["element_1_2"].", ".$_POST["element_1_1"]."<br><br>"; 
	$MESSAGE_BODY .= "<strong>Phone:</strong><br>".$_POST["element_2_1"]."-".$_POST["element_2_2"]."-".$_POST["element_2_3"]."<br><br>";
    $MESSAGE_BODY .= "<strong>Email:</strong><br>".$_POST["element_3"]."<br><br>"; 
    $MESSAGE_BODY .= "<strong>Major:</strong><br>".$_POST["element_4"]."<br><br>";
    mail($to,$subject,$MESSAGE_BODY,$mailheader);
	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
		<link rel="Shortcut Icon" type="image/png" href="img/logoisauw.png" />
		<link href='http://fonts.googleapis.com/css?family=Offside' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="view.css" media="all">
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="http://flesler-plugins.googlecode.com/files/jquery.scrollTo-1.4.2-min.js"></script>
		<script type="text/javascript" src="http://malsup.github.com/jquery.cycle.all.js"></script>
		<script type="text/javascript" src="view.js"></script>
		<script>
			$(document).ready(function() {
				var height = $(document).height();
				height = height * 80 / 100;
				$("#form_container2").css({"height": height+"px"}); 
			});
		</script>
	</head>
	<body id="main_body" >
		<img id="top" src="top.png" alt="">
		<div id="form_container2">
			Thank you for signing up and stay tuned!
		</div>
		<img id="bottom" src="bottom.png" alt="">
	</body>
	</html>
	<?php
} else { 
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<link href='http://fonts.googleapis.com/css?family=Offside' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="view.css" media="all">
	<script type="text/javascript" src="view.js"></script>
</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
		<div id="information">
		<img src="img/isauw1.png" width="50%"/>
		<p>Hi,</p>
		<p>Thank you for your interest for the Indonesian Student Association at the University of Washington.
		<strong>Unfortunately the application to become an officer has been closed</strong>. 
		However as you might know, we are representing Indonesian communities at University of Washington. 
		So if you are interested in Indonesian communities or culture, please kindly fill
		the form below so that you'll be the first one to know if we have new events.
		If you are also searching for volunteer opportunities with us, please also fill the form.</p>
		<p>Thank you.</p>

		
	<h1>abc</h1>
	<h2>Supporting Member Application</h2>
	</div>
		<form id="form_699918" class="appnitro"  method="post" action="">
							
		<ul >
			
					<li id="li_1" >
		<label class="description" for="element_1">Name </label>
		<span>
			<input id="element_1_1" name= "element_1_1" class="element text" maxlength="255" size="8" value=""/>
			<label>First</label>
		</span>
		<span>
			<input id="element_1_2" name= "element_1_2" class="element text" maxlength="255" size="14" value=""/>
			<label>Last</label>
		</span> 
		</li>		<li id="li_2" >
		<label class="description" for="element_2">Phone </label>
		<span>
			<input id="element_2_1" name="element_2_1" class="element text" size="3" maxlength="3" value="" type="text"> -
			<label for="element_2_1">(###)</label>
		</span>
		<span>
			<input id="element_2_2" name="element_2_2" class="element text" size="3" maxlength="3" value="" type="text"> -
			<label for="element_2_2">###</label>
		</span>
		<span>
	 		<input id="element_2_3" name="element_2_3" class="element text" size="4" maxlength="4" value="" type="text">
			<label for="element_2_3">####</label>
		</span>
		 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Email </label>
		<div>
			<input id="element_3" name="element_3" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_4" >
		<label class="description" for="element_4">Major </label>
		<div>
			<input id="element_4" name="element_4" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>				
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="699918" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
		</li>
			</ul>
		</form>	
	</div>
	<img id="bottom" src="bottom.png" alt="">
	</body>
</html>
<?php 
}; 
?>

