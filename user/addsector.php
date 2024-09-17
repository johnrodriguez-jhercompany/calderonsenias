<?php
	include('session.php');
	
	$sector=$_POST['sector'];

	$id_user = $_SESSION['id'];

	$date_change= date('Y-m-d H:i:s');
	
	mysqli_query($conn,"insert into sector (sector_name) values ('$sector')");

	$id_change = mysqli_insert_id($conn);

	mysqli_query($conn,"insert into log (id_user, date_change, change_bd) values ('$id_user', '$date_change',  '" . $id_change . " sectorAdd')");
	
	?>
		<script>
			window.alert('Sector Agregado!');
			window.history.back();
		</script>
	<?php
?>