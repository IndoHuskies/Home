<?php
$passInput = $_GET['pass'];
if(strcmp($passInput, 'indoHuskies') === 0) {
	header('Content-disposition: attachment; filename=Booklet_updated.pdf');
	header('Content-type: application/pdf');
	readfile('Booklet_updated.pdf');
} else {
	echo 'Access Denied!';	
}
?>