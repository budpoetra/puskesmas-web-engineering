<?php
	$location_counter = "data.txt";
	$fp = fopen($location_counter,"w");
				fputs($fp, 0);
				fclose($fp);
	header('Location: index.php');
?>
