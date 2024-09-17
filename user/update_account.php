<?php

	include('session.php');
	
	$npass=md5($_POST['npass']);
	$repass=md5($_POST['repass']);
	$password=$_POST['password'];
	$passwordmd5=md5($password);
	
	if($passwordmd5!=$srow['password']){
		?>
		<script>
			window.alert('Su contraseña antigua no es la correcta, vuelva a intentarlo.');
			window.history.back();
		</script>
		<?php
	}
	elseif($npass!=$repass){
		?>
		<script>
			window.alert('la nueva contraseña no coincide.');
			window.history.back();
		</script>
		<?php
	}
	else{
		$username=$_POST['username'];
		
		
		if(($passwordmd5==$srow['password']) && ($npass==$repass)){
			

			mysqli_query($conn,"update `user` set username='$username', password='$npass' where id_user='".$_SESSION['id']."'");

		?>
			<script>
				window.alert('Datos Actualizados');
				window.history.back();
			</script>
		<?php

		}
		else{
			?>
		<script>
			window.alert('Comprueba la contraseña antigua y la contraseña nueva');
			window.history.back();
		</script>
		<?php
		}
		
		
		
	}
		
?>