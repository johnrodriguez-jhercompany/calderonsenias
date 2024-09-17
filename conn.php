<?php
/**
 * Local
 */
$conn = mysqli_connect("localhost","root","","senias");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}


/**
 * web
 */
 
 /*$conn = mysqli_connect("sql213.byethost7.com","b7_37300762","Borr@cho1","b7_37300762_senias");
 if (!$conn) {
	 die("Connection failed: " . mysqli_connect_error());
 }
*/
?>