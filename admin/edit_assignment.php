<?php
	include('session.php');
	
	$id=$_GET['id'];

	$date_assignment=$_POST['date'];
	$id_user=$_POST['id_user'];
	$sector=$_POST['sector'];
	

	mysqli_query($conn,"update assignment set date_assignment='$date_assignment', id_user='$id_user', sector='$sector' where id_assignment='$id'");

	echo "<script>
			window.alert('Asignación editado!');
			window.history.back();
		</script>";
	?>
		
