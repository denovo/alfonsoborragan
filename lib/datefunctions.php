<?php
/**
 * Functions for handling dates from custom post types with custom date fields
 */



// // will return a properly formed date object in PHP 
// function get_date_from_custom_field()
// 	$date = get_field('date');
// 	// $date = 19881123 (23/11/1988)

// 	// extract Y,M,D
// 	$y = substr($date, 0, 4);
// 	$m = substr($date, 4, 2);
// 	$d = substr($date, 6, 2);

// 	// create UNIX
// 	$time = strtotime("{$d}-{$m}-{$y}");

// 	// format date (23/11/1988)
// 	echo date('d/m/Y', $time);

// 	// format date (November 11th 1988)
// 	echo date('F n Y', $time);
?>