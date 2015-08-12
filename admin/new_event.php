<?php
	require_once('../database.php');

	$name = $_POST['event_name'];
	$date = $_POST['event_date'];
	$location = $_POST['event_location'];
	$media = $_POST['profile'];
	$description = $_POST['event_description'];

	$start_h = $_POST['start_hour'];
	$start_m = $_POST['start_minute'];
	$start_t = $_POST['start_time'];
	$end_h = $_POST['end_hour'];
	$end_m = $_POST['end_minute'];
	$end_t = $_POST['end_time'];

	$time = $conn->quote($start_h . "." . $start_m . " " . $start_t . " to " . $end_h . "." . $end_m . " " . $end_t);
	$link = "/events/".str_replace(" ","-",$_POST['event_name']).".php";
	//Convert date to epoch time
	$countdown = strtotime($date) * 1000;

	//Create new file based on input
		//Get link name;
	$dir = "../events/";
	//mkdir($_SERVER['DOCUMENT_ROOT']."/dir");

	if( is_dir($dir) === false )
	{
	    mkdir($dir);
	}

	//name of the template file 
	$tpl_file = "event-template.php";

	//path to the directory at the server, where you store the "template.html" file. 
	$tpl_path = "../events/";

	//get username for profile control
	$placeholders = array("{event}");
	$data["event"] = $_POST['event_name'];

	//Get template
	$tpl = file_get_contents($tpl_path.$tpl_file);

	$new_member_file = str_replace($placeholders, $data , $tpl);

	$php_file_name = (str_replace(" ","-",$_POST['event_name'])).".php";

	//writes index file to new folder
	$fp = fopen($dir.$php_file_name, "w"); 
	fwrite($fp, $new_member_file); 
	fclose($fp);

	//SQL to be performed AFTER new file has been created
	$sql = "INSERT INTO event 
			(name, date, location, description, time, countdown, link, media) 
			VALUES 
			(:name, :date, :location, :description, :time, :countdown, :link, :media)";

	$stmt = $conn->prepare($sql);

	$stmt->bindParam(':name', $name, PDO::PARAM_STR);       
	$stmt->bindParam(':date', $date, PDO::PARAM_STR);    
	$stmt->bindParam(':location', $location, PDO::PARAM_STR);
	$stmt->bindParam(':description', $description, PDO::PARAM_STR);
	// use PARAM_STR although a number  
	$stmt->bindParam(':time', $time, PDO::PARAM_STR); 
	$stmt->bindParam(':countdown', $countdown, PDO::PARAM_INT);
	$stmt->bindParam(':link', $link, PDO::PARAM_STR);   
	$stmt->bindParam(':media', $media, PDO::PARAM_STR);   
	$stmt->execute();

	header("Location: ../admin/dashboard.php");
?>