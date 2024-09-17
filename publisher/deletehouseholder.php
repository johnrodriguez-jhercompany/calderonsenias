<?php
	include('session.php');
	
	$id=$_POST['idhouseholder'];

	$id_user = $_SESSION['id'];

	$date_change= date('Y-m-d H:i:s');

	$sql=mysqli_query($conn,"SELECT * FROM householder WHERE id_householder='$id'");

	$rowsql=mysqli_fetch_array($sql);


	if(!empty($rowsql['img'])){
				    $img= '../address/'.$rowsql['img'];
					unlink($img);
					}
	
	mysqli_query($conn,"delete from householder where id_householder='$id'");

	$id_change = mysqli_insert_id($conn);

	mysqli_query($conn,"insert into log (id_user, date_change, change_bd) values ('$id_user', '$date_change',  '" . $id_change . " householderdlt')");
	
	header('location:householder.php');

	

?>