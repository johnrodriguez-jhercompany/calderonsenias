<?php
	include('session.php');
	
	$id=$_POST['iduser'];
	
	$username=$_POST['name'];
	$last_name=$_POST['last_name'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$link_address=$_POST['link_address'];
	$password=$_POST['password'];
	$access=$_POST['access'];
	
	
	$use=mysqli_query($conn,"select * from user where id_user='.$id.'");
	$urow=mysqli_fetch_array($use);
	
	if ($password===$urow['password']){
		$pass=$password;
	}
	else{
		$pass=md5($password);
	}

	mysqli_query($conn,"update user set username='$username', last_name='$last_name', phone='$phone', address='$address', link_address='$link_address', password='$pass', access='$access' where id_user='$id'");
	
	$id_user = $_SESSION['id'];
	$date_change= date('Y-m-d H:i:s');
	
	
	$id_change = mysqli_insert_id($conn);

	mysqli_query($conn,"insert into log (id_user, date_change, change_bd) values ('$id_user', '$date_change',  '" . $id_change . " publisheredt')");
	
	
	?>
		<script>
			window.alert('Datos Editados del Publicador');
			window.history.back();
		</script>
	<?php

?>