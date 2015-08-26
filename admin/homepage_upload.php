<?php
	require_once('../database.php');

	$id = intval($_POST['homepage_id']);
	$imgname = uploadImageFile();
	$link = $_POST['link'];

	$sql = "UPDATE homepage
			SET img = :img, link = :link
			WHERE id = :id";

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);     
	$stmt->bindParam(':img', $imgname, PDO::PARAM_STR);       
	$stmt->bindParam(':link', $link, PDO::PARAM_STR);
	$stmt->execute();

	header("Location: ../admin/homepage.php");  

function uploadImageFile() {

    //Photo Upload script, need to rename file with $sTempFileName = '../media/' . md5(time().rand());
	$allowedExts = array("gif", "jpeg", "jpg", "png");
	$temp = explode(".", $_FILES["image_file"]["name"]);
	$extension = end($temp);

	$sDir = md5(time().rand());
	$sTempFileName = '../img/home/' . $sDir;
	$sResultFileName = '';

	if ((($_FILES["image_file"]["type"] == "image/gif")
	|| ($_FILES["image_file"]["type"] == "image/jpeg")
	|| ($_FILES["image_file"]["type"] == "image/jpg")
	|| ($_FILES["image_file"]["type"] == "image/pjpeg")
	|| ($_FILES["image_file"]["type"] == "image/x-png")
	|| ($_FILES["image_file"]["type"] == "image/png"))
	&& ($_FILES["image_file"]["size"] < 500000)
	&& in_array($extension, $allowedExts)) {
	  if ($_FILES["$image_file"]["error"] > 0) {
	    echo "Return Code: " . $_FILES["image_file"]["error"] . "<br>";
	  } else {
	    /*
	    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
	    echo "Type: " . $_FILES["file"]["type"] . "<br>";
	    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
	    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
	    
	    if (file_exists("../img/" . $_FILES["$image_file"]["name"])) {
	      echo $_FILES["$image_file"]["name"] . " already exists. ";
	    } else {
	    */
	      move_uploaded_file($_FILES["image_file"]["tmp_name"],
	      $sTempFileName.'.' .$extension);

	      $sResultFileName = 'img/home/'.$sDir.'.'.$extension;
	    }
	} else {
	  echo "Invalid " . $_FILES["image_file"]["name"] . " ||| " . $sResultFileName;
	  exit();
	}

	return $sResultFileName;
}
?>