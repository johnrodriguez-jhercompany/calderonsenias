<?php
	include('session.php');
	
	$user=$_POST['id_user'];
	$householder=$_POST['id_householder'];
	$observation=$_POST['observation'];

	$id_user = $_SESSION['id'];

	$date_change= date('Y-m-d H:i:s');
	
	mysqli_query($conn,"insert into study (id_householder,id_user,observation_study) values ('$householder','$user','$observation')");

	$id_change = mysqli_insert_id($conn);

	mysqli_query($conn,"insert into log (id_user, date_change, change_bd) values ('$id_user', '$date_change',  '" . $id_change . " studyadd')");
	
	?>
		<script>
			window.alert('Estudiante Agregado!');
			window.history.back();
		</script>
	<?php
?>