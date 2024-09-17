<?php
	include('session.php');
	
	$id_sector=$_POST['id_sector'];

	$territorio=$_POST['territorio'];

	$id_user = $_SESSION['id'];

	$date_change= date('Y-m-d H:i:s');
	
	mysqli_query($conn,"insert into territorio (territorio_name,id_sector) values ('$territorio','$id_sector')");

	$id_change = mysqli_insert_id($conn);

	mysqli_query($conn,"insert into log (id_user, date_change, change_bd) values ('$id_user', '$date_change',  '" . $id_change . " territorioAdd')");
	
	?>
		<script>
			window.alert('Territorio Agregado!');
			window.history.back();
		</script>
	<?php
?>