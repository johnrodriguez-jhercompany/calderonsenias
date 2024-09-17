<?php
	include('session.php');
	
	$id=$_POST['idsector'];
	$sector_name=$_POST['sectorname'];

	$id_user = $_SESSION['id'];
	$date_change= date('Y-m-d H:i:s');
	
	
	$id_change = mysqli_insert_id($conn);

	mysqli_query($conn,"update sector set sector_name='$sector_name' where id_sector='$id'");

	mysqli_query($conn,"insert into log (id_user, date_change, change_bd) values ('$id_user', '$date_change',  '" . $id_change . " sectoredt')");
	

	header('location:sector.php');

?>