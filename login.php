<?php
	include('conn.php');
	session_start();

	function check_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username=check_input($_POST['username']);
		
		if (!preg_match("/^[a-zA-Z0-9_]*$/",$username)) {
			$_SESSION['msg'] = "En el campo usuario no debe tener espacios o caracteres especiales."; 
			header('location: index.php');
		}
		else{
			
		$fusername=$username;
		
		$password = check_input($_POST["password"]);
		$fpassword=md5($password);
		
		$query=mysqli_query($conn,"select * from `user` where username='$fusername' and password='$fpassword'");
		
		if(mysqli_num_rows($query)==0){
			$_SESSION['msg'] = "Usuario o clave incorrecta";
			header('location: index.php');
		}
		else{
			
			$row=mysqli_fetch_array($query);

			if ($row['access']==1){
				$_SESSION['id']=$row['id_user'];
				
				echo "<script>
					window.alert('Bienvenido Administrador!');
					window.location.href='admin';
				</script>";
				
			}
			elseif ($row['access']==2){
				$_SESSION['id']=$row['id_user'];
				
				echo "<script>
					window.alert('Bienvenido ".$row['username']." ".$row['last_name']." ');
					window.location.href='user';
				</script>";
				
			}
			elseif ($row['access']==3){
				$_SESSION['id']=$row['id_user'];
				
				echo "<script>
					window.alert('Bienvenido ".$row['username']." ".$row['last_name']." ');
					window.location.href='publisher';
				</script>";
			}
		}
		
		}
	}
?>