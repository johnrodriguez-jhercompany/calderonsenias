<?php
	include('session.php');
	
	$id=$_POST['idstudy'];
	$id_user = $_SESSION['id'];
	$date_change= date('Y-m-d H:i:s');

	mysqli_query($conn,"delete from study where id_study='$id'");
	
	$id_change = mysqli_insert_id($conn);

	mysqli_query($conn,"insert into log (id_user, date_change, change_bd) values ('$id_user', '$date_change',  '" . $id_change . " studydlt')");
	

	header('location:study.php');

?>