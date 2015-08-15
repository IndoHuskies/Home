<?php
	# Password
	$passInput = $_POST['pass'];
	if(strcmp($passInput, 'indoHuskies') === 0) {
		echo 'true';
	} else {
		echo 'meh';
	}
?>