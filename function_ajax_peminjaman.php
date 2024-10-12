<?php
// $Date = "2010-09-17";
// echo date('Y-m-d', strtotime($Date. ' + 1 days'));
// echo date('Y-m-d', strtotime($Date. ' + 2 months'));
if($_POST['id'] != '') {
  // call removeday() here
	// $Date = "2010-09-17";
	$Date = $_POST['id'];
	$date_fix = date('d-m-Y', strtotime($Date. ' + 7 days'));
	return $date_fix;
}
?>