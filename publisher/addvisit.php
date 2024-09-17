<?php
	include('session.php');

	$id_user=$_SESSION['id'];
	$date_change= date('Y-m-d H:i:s');


	echo $date_visit=$_POST['date_visit'];
	echo $iduser_visit=$_POST['iduser_visit'];
	echo $tema=$_POST['topic'];
	echo $publication=$_POST['publication'];
	echo $text=$_POST['text'];
	echo $communication=$_POST['communication'];
	echo $observations=$_POST['observations'];
	echo $id_householder=$_POST['id_householder'];
	
	if(!empty($date_visit)){

		mysqli_query($conn,"insert into visit (id_householder, id_user, visit_date, topic, publication, text, 
												comunication, observation) values ('$id_householder','$iduser_visit',
												'$date_visit', '$tema', '$publication', '$text', '$communication', 
												'$observations')");

		$id_change = mysqli_insert_id($conn);

		mysqli_query($conn,"insert into log (id_user, date_change, change_bd) values 
											('$id_user', '$date_change',  '" . $id_change . " visitAdd')");

		echo "<script>
			window.alert('Visita Agregada');
			window.history.back();
		</script>";

	}else{

		echo "<script>
			window.alert('Coloque la fecha');
			window.history.back();
		</script>";

		
	}

	/*mysqli_query($conn,"insert into user (username, last_name, phone, address, link_address, password, access) values ('$name', '$last_name', '$phone', '$address', '$link_address', '$password', '2')");*/

	

	?>
		
