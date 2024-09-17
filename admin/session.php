<?php
	session_start();

	include('../conn.php');

	$sq=mysqli_query($conn,"select * from `user` where id_user='".$_SESSION['id']."'");
	$srow=mysqli_fetch_array($sq);
	
	$user=$srow['username'];
	$access=$srow['access'];
	
	if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '') || $access=$srow['access']!= '1') {
	header('location:../index.php');
    exit();
	}
	
	
?>