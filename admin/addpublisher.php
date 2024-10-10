<?php
	include('session.php');
	
	$name=$_POST['name'];
	$last_name=$_POST['last_name'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$link_address=$_POST['link_address'];
	$password=md5($_POST['password']);
	$access=$_POST['access'];

	$id_user = $_SESSION['id'];

	$date_change= date('Y-m-d H:i:s');
	
	mysqli_query($conn,"insert into user (username, last_name, phone, address, link_address, password, access) values ('$name', '$last_name', '$phone', '$address', '$link_address', '$password', '$access')");

	$id_change = mysqli_insert_id($conn);

	mysqli_query($conn,"insert into log (id_user, date_change, change_bd) values ('$id_user', '$date_change', '" . $id_change . " PublicadorAdd')");
	
	header('location:publisher.php');
	?>