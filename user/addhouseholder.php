<?php
	include('session.php');
	
	$name=$_POST['name'];
	$last_name=$_POST['last_name'];
	$sector=$_POST['sector'];
	$territorio=$_POST['territorio'];
	$direccion=$_POST['direccion'];
	$codigo=$_POST['codigo'];
	$phone=$_POST['phone'];
	$sordera=$_POST['sordera'];
	$link_address=$_POST['link_address'];
	$read=$_POST['read'];
	$vocalize=$_POST['vocalize'];
	$sign_language=$_POST['sign_language'];
	$year_birth=$_POST['year_birth'];
	$observation=$_POST['observation'];
	
	$nombre=$_FILES['img']['name'];
    $temporal=$_FILES['img']['tmp_name'];

	$id_user = $_SESSION['id'];

	$date_change= date('Y-m-d H:i:s');
    

    $fileInfo = PATHINFO($nombre);

    if (empty($nombre)){
    	$location="";
		$newname="";
		mysqli_query($conn,"insert into householder (id_sector,codigo,name, last_name, date_birth,phone,sordera,lee,vocalize,sign_language,observation,direccion,id_territorio,img,link_address) values 
		('$sector','$codigo','$name', '$last_name', '$year_birth', '$phone', '$sordera', '$read', '$vocalize', '$sign_language', '$observation', '$direccion', '$territorio', '$img','$link_address')");
		
		$id_change = mysqli_insert_id($conn);

		mysqli_query($conn,"insert into log (id_user, date_change, change_bd) values ('$id_user', '$date_change',  '" . $id_change . " householderAdd')");

		echo "<script>
					window.alert('Amo de Casa agregado');
					window.history.back();
			  </script>";
	}
	else{

		$a=mysqli_query($conn,"SELECT MAX(id_householder) AS id FROM householder");
		$b=mysqli_fetch_array($a);
		$id = $b['id'];

		if (is_null($id)) {
			$id = 0;
		} else {
			$id += 1;
		}

		$code=$sector.''.$territorio.''.$name.''.$last_name;

			if($fileInfo['extension'] == "jpg" OR $fileInfo['extension'] == "png"){

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


				mysqli_query($conn,"insert into householder (id_sector,codigo,name, last_name, date_birth,phone,sordera,lee,vocalize,sign_language,observation,direccion,id_territorio,img,link_address) values 
		('$sector','$codigo','$name', '$last_name', '$year_birth', '$phone', '$sordera', '$read', '$vocalize', '$sign_language', '$observation', '$direccion', '$territorio', '$newname','$link_address')");
               		
				$id_change = mysqli_insert_id($conn);

				mysqli_query($conn,"insert into log (id_user, date_change, change_bd) values ('$id_user', '$date_change',  '" . $id_change . " householderAdd')");
				
				echo "<script>
							window.alert('Amo de casa agregado');
							window.history.back();
						</script>";

			}
			else{

					echo "<script>
							window.alert('La imagen tiene que tener formato JPG, JPEG o PNG');
							window.history.back();
						</script>";
				}
		}



	
?>