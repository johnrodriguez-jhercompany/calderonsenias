<?php
	include('session.php');
	
	$id=$_POST['idhouseholder'];
	
	$name=$_POST['name'];
	$last_name=$_POST['last_name'];
	$sector=$_POST['sector'];
	$territorio=$_POST['territorio'];
	$address=$_POST['direccion'];
	$codigo=$_POST['codigo'];
	$phone=$_POST['phone'];
	$sordera=$_POST['sordera'];
	$link_address=$_POST['link_address'];
	$lee=$_POST['lee'];
	$vocalize=$_POST['vocalize'];
	$sign_language=$_POST['sign_language'];
	$date_birth=$_POST['year_birth'];
	$observation=$_POST['observation'];
	
	$id_user = $_SESSION['id'];

	$date_change= date('Y-m-d H:i:s');
	
	
	if (empty($name) && empty($last_name)){
		?>
		<script>
			window.alert('Tiene que tener un nombre o apellido');
			window.history.back();
		</script>
	<?php
	}
	else{

			$nombre=$_FILES['img']['name'];
    		$temporal=$_FILES['img']['tmp_name'];

    		$fileInfo = PATHINFO($nombre);

    		if (empty($nombre)){
    			
    			$location="";
				$newname="";
				mysqli_query($conn,"update householder set id_sector='$sector', codigo='$codigo', name='$name', last_name='$last_name', date_birth='$date_birth', phone='$phone', sordera='$sordera',lee='$lee', vocalize='$vocalize', sign_language='$sign_language', observation='$observation', direccion='$address',id_territorio='$territorio', link_address='$link_address' where id_householder='$id'");

				$id_change = mysqli_insert_id($conn);

	mysqli_query($conn,"insert into log (id_user, date_change, change_bd) values ('$id_user', '$date_change',  '" . $id_change . " householderedit')");

				echo "<script>
							window.alert('Amo de Casa editado');
							window.history.back();
					  </script>";
			}
			else{

				$code=$sector.''.$territorio.''.$name.''.$last_name;

				if($fileInfo['extension'] == "jpg" OR $fileInfo['extension'] == "png"){

					$sql=mysqli_query($conn,"SELECT * FROM householder where id_householder='$id'");
					$rowsql=mysqli_fetch_array($sql);
					if(!empty($rowsql['img'])){
					 $img= '../address/'.$rowsql['img'];
					unlink($img);
					}


				if ($fileInfo['extension'] == "jpg"){

					$original=imagecreatefromjpeg($temporal);


             		$ancho_original=imagesx($original);
             		$alto_original=imagesy($original);


             		$copia=imagecreatetruecolor(300, 300);


              		$convertir=imagecopyresampled($copia, $original, 0, 0, 0, 0, 300, 300, $ancho_original, $alto_original);
			  		//$rotar = imagerotate($copia, -90, 0);
			  		$newname=$code.".".$fileInfo['extension'];
            		$location= "../address/".$newname;
                    $guardar=imagejpeg($copia,$location,100);



				}elseif($fileInfo['extension'] == "png"){

					$original=imagecreatefrompng($temporal);

             		$ancho_original=imagesx($original);
             		$alto_original=imagesy($original);
		
		
		
             		$copia=imagecreatetruecolor(300, 300);
		
		
             		$convertir=imagecopyresampled($copia, $original, 0, 0, 0, 0, 300, 300, $ancho_original, $alto_original);
			 		 //$rotar = imagerotate($copia, -90, 0);
			 		$newname=$code.".".$fileInfo['extension'];
             		$location= "../address/".$newname;
             		$guardar=imagepng($copia,$location);

             		

				}

				mysqli_query($conn,"update householder set id_sector='$sector', codigo='$codigo', name='$name', last_name='$last_name', date_birth='$date_birth', phone='$phone', sordera='$sordera',lee='$lee', vocalize='$vocalize', sign_language='$sign_language', observation='$observation', direccion='$address',id_territorio='$territorio',img='$newname', link_address='$link_address' where id_householder='$id'");

				$id_change = mysqli_insert_id($conn);

	mysqli_query($conn,"insert into log (id_user, date_change, change_bd) values ('$id_user', '$date_change',  '" . $id_change . " householderedit')");

				echo '<script>
						window.alert("Datos Editados del Amo de Casa");
						window.history.back();
					</script>';
			}else{

					echo "<script>
							window.alert('La imagen tiene que tener formato JPG, JPEG o PNG');
							window.history.back();
						</script>";
				}
		}		

}

	
	

?>