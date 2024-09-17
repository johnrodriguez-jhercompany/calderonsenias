<?php
	include('session.php');
	
	$id=$_POST['id_assignment'];
	
	mysqli_query($conn,"delete from assignment where id_assignment='$id'");

	$id_user = $_SESSION['id'];
$date_change= date('Y-m-d H:i:s');


$id_change = mysqli_insert_id($conn);

mysqli_query($conn,"insert into log (id_user, date_change, change_bd) values ('$id_user', '$date_change',  '" . $id_change . " assigndlt')");
	
	header('location:assignment.php');

?>