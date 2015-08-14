<?php
header('Content-disposition: attachment; filename=Booklet_updated.pdf');
header('Content-type: application/pdf');
readfile('Booklet_updated.pdf');
?>