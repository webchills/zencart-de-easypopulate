<?php
/**
 * @package easy populate 4 
 * @copyright Copyright 2003-2016 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart-pro.at/license/2_0.txt GNU Public License V2.0
 * $Id: easypopulate_4_split.php, v4.0.32 12-30-2015 chadderuski mc12345678 $
 * @version $Id: easypopulate_4.php 2016-03-26 20:19:14 webchills $
*/
if (!defined('IS_ADMIN_FLAG')) {
  die('Illegal Access');
}

if ( isset($_POST['split']) ) { 
	$file_name = $_POST['split'];
} else {
	die("invalid program entry");
}
$file_location = (EP4_ADMIN_TEMP_DIRECTORY !== 'true' ? /* Storeside */ DIR_FS_CATALOG : /* Admin side */ DIR_FS_ADMIN) . $tempdir . $file_name;
// if no error, retreive header row
if (!file_exists($file_location)) {
	echo "ERROR: File Does Not Exist: ".$file_location."<br>";
	exit();
}
if ( !($handle = fopen($file_location, "r")) ) {
	echo "ERROR: Cannot Open File For Reading: ".$file_location."<br>";
	exit();
}
if ( !($file_header = fgets($handle)) ) { // read header row
	echo "ERROR: File is empty";
	fclose($handle);
	exit();
}
$data_lines_per_split = $ep_split_records;
$data_lines_written = 0;
$split_counter = 0;

while ( ($file_data = fgets($handle)) !== false ) { // read 1 line of data and echo that line
	if ($data_lines_written == 0) { // open new split file
		// split file name and location
		$split_counter++;
		// str_pad($split_counter, 2, "0", STR_PAD_LEFT)
		$split_filename = substr($file_name, 0, strlen($file_name)-4)."_".str_pad($split_counter, 2, "0", STR_PAD_LEFT).".csv";
		// $split_filename = substr($file_name, 0, strlen($file_name)-4)."_".$split_counter.".csv";
		$split_location = (EP4_ADMIN_TEMP_DIRECTORY !== 'true' ? /* Storeside */ DIR_FS_CATALOG : /* Admin side */ DIR_FS_ADMIN) . $tempdir . $split_filename;
		$split_handle = fopen($split_location, "w") or die("can't create split file");
		// write header
		fwrite($split_handle, $file_header);
	}
	fwrite($split_handle, $file_data);
	$data_lines_written++;		
	if ($data_lines_per_split == $data_lines_written) { // close split file
		fclose($split_handle);
		$data_lines_written = 0; // reset counter
	}
}
fclose($split_handle); // close final split file
fclose($handle);
$messageStack->add("File Splitting Completed.", 'success');
