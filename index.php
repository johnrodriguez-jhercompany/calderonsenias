<?php include('header.php'); ?>
<?php
	session_start();
	
	if (isset($_SESSION['id'])){
		include('conn.php');
		$query=mysqli_query($conn,"select * from `user` where id_user='".$_SESSION['id']."'");
		$row=mysqli_fetch_array($query);

		switch ($row['access']){
			case 1:
				header('location:admin/');
				break;
			case 2:
				header('location:user/');
				break;
			case 3:
				header('location:publisher/');
				break;
		}
		
	}
?>
<body>
<div class="container img_fond">
	<div id="login_form" class="well">
		<h2><center><span class="glyphicon glyphicon-lock"></span> LOGIN</center></h2>
		<hr>
		<form method="POST" action="login.php" enctype="multipart/form-data">
		Usuario: <input type="text" name="username" class="form-control" required>
		<div style="height: 10px;"></div>		
		Clave: <input type="password" name="password" class="form-control" required> 
		<div style="height: 10px;"></div>
		<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Login</button>
		</form>
		<div style="height: 15px;"></div>
		<div style="color: red; font-size: 15px;">
			<center>
			<?php
				
				if(isset($_SESSION['msg'])){
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}
			?>
			</center>
		</div>
	</div>
</div>
<?php include('script.php'); ?>
</body>
</html>