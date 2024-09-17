<?php
	include('session.php');
	
	$id=$_POST['idvisit'];
	$id_householder=$_POST['idhouseholder'];
	
	
	$date=$_POST['date'];
	$id_user_visit=$_POST['iduser_visit'];
	$topic=$_POST['topic'];
	$publication=$_POST['publication'];
	$text=$_POST['text'];
	$communication=$_POST['communication'];
	$observations=$_POST['observation'];

	$id_user = $_SESSION['id'];
	$date_change= date('Y-m-d H:i:s');

	
	
	mysqli_query($conn,"update visit set id_user='$id_user_visit', visit_date='$date', topic='$topic', publication='$publication', text='$text', comunication='$communication', observation='$observations' where id_visit='$id'");

	$id_change = mysqli_insert_id($conn);

	mysqli_query($conn,"insert into log (id_user, date_change, change_bd) values ('$id_user', '$date_change',  '" . $id_change . " visitedit')");
	
	
	header('location:view.php?id='.$id_householder);
	
	?>
		
