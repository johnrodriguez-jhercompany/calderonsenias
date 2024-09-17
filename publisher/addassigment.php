<?php
	include('session.php');
	
	$date_assignment=$_POST['date'];
	$id_user=$_POST['id_user'];
	$sector=$_POST['sector'];
	
	mysqli_query($conn,"insert into assignment (id_user, sector, date_assignment) values ('$id_user', '$sector', '$date_assignment')");

	echo "<script>
			window.alert('Asignación agregada!');
			window.history.back();
		</script>";
	?>
		
