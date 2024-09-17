<?php
	include('session.php');
	
	$id=$_POST['idterritorio'];
	$territorio_name=$_POST['territorioname'];

	$id_user = $_SESSION['id'];
	$date_change= date('Y-m-d H:i:s');
	
	
	$id_change = mysqli_insert_id($conn);

	mysqli_query($conn,"update territorio set territorio_name='$territorio_name' where id_territorio='$id'");

	mysqli_query($conn,"insert into log (id_user, date_change, change_bd) values ('$id_user', '$date_change',  '" . $id_change . " territorioedt')");
	

	header('location:territorio.php');

?>