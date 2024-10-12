<?php

function get_name_month($var=''){
	// $bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
	if($var == '01'){
		$month = "Jan";
	}elseif($var == '02'){
		$month = "Feb";
	}elseif($var == '03'){
		$month = "Mar";
	}elseif($var == '04'){
		$month = "Apr";
	}elseif($var == '05'){
		$month = "Mei";
	}elseif($var == '06'){
		$month = "Jun";
	}elseif($var == '07'){
		$month = "Jul";
	}elseif($var == '08'){
		$month = "Agu";
	}elseif($var == '09'){
		$month = "Sep";
	}elseif($var == '10'){
		$month = "Okt";
	}elseif($var == '11'){
		$month = "Nop";
	}elseif($var == '12'){
		$month = "Des";
	}else{
		$month = "Undifined";
	}
	return $month;
}

?>