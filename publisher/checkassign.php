<?php
	include('session.php');
	
	$id=$_POST['id_assignment'];
	$state='entregado';

	$id_user = $_SESSION['id'];
	$date_change= date('Y-m-d H:i:s');
	
	
	$id_change = mysqli_insert_id($conn);

	mysqli_query($conn,"update assignment set state_asigment='$state', date_assignment_end='$date_change' where id_assignment='$id'");

	mysqli_query($conn,"insert into log (id_user, date_change, change_bd) values ('$id_user', '$date_change',  '" . $id_change . " assignmentcheck')");
	

	header('location:assignado.php');

?>