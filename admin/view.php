<?php include('session.php'); ?>
<?php include('header.php'); ?>
<?php
	$id=$_GET['id'];

	$sql=mysqli_query($conn,"SELECT * FROM householder WHERE id_householder='$id'");

	$rowsql=mysqli_fetch_array($sql);
?>




<body>
<div id="wrapper">
<?php include('navbar.php'); ?>
<div style="height:50px;"></div>
<div id="page-wrapper">
<div class="container-fluid">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Amo de Casa</h1>
        </div>
        
        	<div class="col-lg-3">
        		<?php 
				if(empty($rowsql['img'])){ 
				        echo '<img src="../img/photo.jpg">';
				}
				else{
				        echo '<img src="../address/'.$rowsql['img'].'" style="width=100%;">'; 
				    } 
				?>
        	</div>
        	
        	<div class="col-lg-9 information">
        		<div class="col-lg-12">
        			<div class="col-lg-4">	
        				<label>Nombre:</label>
        				<span><?php echo $rowsql['name']; ?></span>
        			</div>
        			<div class="col-lg-4">
        				<label>Apellido:</label>
        				<span><?php echo $rowsql['last_name']; ?></span>
        			</div>
					<div class="col-lg-4">
        				<label>Territorio #:</label>
        				<span><?php echo $rowsql['codigo']; ?></span>
        			</div>
        		</div>
        		<div class="col-lg-12">
					<div class="col-lg-6">
        				<label>Edad:</label>
        				<span><?php $fecha = $rowsql['date_birth'];
									if(!empty($fecha)){
										$ano = explode("-", $fecha)[0]; // Obtén solo el año de la fecha de nacimiento
										$ano_actual = date("Y"); // Obtén el año actual
										$edad = $ano_actual - $ano; // Calcula la edad
										echo $edad;
									}else{
										echo "SIN INFORMACION";
									}
									 ?>
						</span>
        			</div>
					<div class="col-lg-6">	
        				<label>Teléfono:</label>
        				<span><?php echo $rowsql['phone']; ?></span>
        			</div>
        		</div>
                <div class="col-lg-12">
					<div class="col-lg-4">
        				<label>Sector:</label>
        				<span><?php  // Incluir el archivo de conexión
									//include '../conn.php';

									// Obtener el id_sector desde los resultados de otra consulta
									$id_sector = $rowsql['id_sector'];

									// Preparar la consulta para obtener el name_sector
									$query = "SELECT sector_name FROM sector WHERE id_sector = ?";
									$stmt = $conn->prepare($query);
									$stmt->bind_param("i", $id_sector);
									$stmt->execute();
									$stmt->bind_result($name_sector);
									$stmt->fetch();

									echo $name_sector;

									// Cerrar la declaración y la conexión
									$stmt->close();
								?>
						</span>
        			</div>
					<div class="col-lg-6">
        				<label>Dirección:</label>
        				<span><?php echo $rowsql['direccion']; ?></span>
        			</div>
                </div>
        		<div class="col-lg-12">
					<div class="col-lg-6">	
        				<label>Tipo de Sordera:</label>
        				<span><?php echo $rowsql['sordera']; ?></span>
        			</div>
					<div class="col-lg-6">	
        				<label>Sabe Señas:</label>
        				<span><?php echo $rowsql['sign_language']; ?></span>
        			</div>
        		</div>
        		<div class="col-lg-12">
					<div class="col-lg-3">	
        				<label>Lee:</label>
        				<span><?php echo $rowsql['lee']; ?></span>
        			</div>
					<div class="col-lg-3">	
        				<label>Vocaliza:</label>
        				<span><?php echo $rowsql['vocalize']; ?></span>
        			</div>
        		</div>
        		<div class="col-lg-12">
					<div class="col-lg-6">
                        <label>Estudia con:</label>
                        <span><?php 
								// Obtener el id_householder desde los resultados de otra consulta
								$id_householder = $rowsql['id_householder'];

								// Preparar la consulta para verificar si el id_householder está en la tabla study
								// y obtener el username y last_name de la tabla user
								$query2 = "SELECT user.username, user.last_name 
								          FROM study 
								          JOIN user ON study.id_user = user.id_user 
								          WHERE study.id_householder = ?";

								$stmt2 = $conn->prepare($query2);
								$stmt2->bind_param("i", $id_householder);
								$stmt2->execute();
								$stmt2->bind_result($username, $last_name);

								// Verificar si hay resultados y obtener los datos
								if ($stmt2->fetch()) {
								    echo $username ." ".$last_name;
								} else {
								    echo "No estudia";
								}

								// Cerrar la declaración y la conexión
								$stmt2->close();
							  ?>
						</span>
                    </div>
        		</div>
				<div class="col-lg-12">
					<div class="col-lg-12">
					<label>Observaciones:</label>
					<span><?php echo $rowsql['observation']; ?></span>
        			</div>
				</div>	
				<div class="col-lg-12">
					<div class="col-lg-12">
        				<label>Dirección Link:</label>
        				<span><a href="<?php echo $rowsql['link_address']; ?>"><?php echo $rowsql['link_address']; ?></a></span>
        			</div>
				</div>	
        	</div>
    </div>
        
    </div>
    <div class="row">
    	<div class="col-lg-12">
            <h1 class="page-header">Visitas
            <span class="pull-right">
					<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addvisit_<?php echo $rowsql['id_householder']; ?>"><i class="fa fa-plus-circle"></i>Agregar Visita</button>
			</span>
			</h1>

        </div>
    </div>
        <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="visitTable">
                <thead>
                    <tr><th>Fecha</th>
                        <th>Tema</th>
                        <th>Publicación</th>
                        <th>Texto</th>
						<th>Comunicación</th>
						<th>Observación</th>
						<th>Action</th>
                    </tr>
                </thead>
                <tbody>
				<?php
					$vs=mysqli_query($conn,"select * from visit where id_householder='$id' order by visit_date desc");
					while($vsrow=mysqli_fetch_array($vs)){
					?>
						<tr>
							<td><?php echo $vsrow['visit_date']; ?></td>
							<td><?php echo $vsrow['topic']; ?></td>
							<td><?php echo $vsrow['publication']; ?></td>
							<td><?php echo $vsrow['text']; ?></td>
							<td><?php echo $vsrow['comunication']; ?></td>
							<td><?php echo $vsrow['observation']; ?></td>
							<td>
								<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit_<?php echo $vsrow['id_visit']; ?>"><i class="fa fa-edit"></i> Edit</button>
								<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del_<?php echo $vsrow['id_visit']; ?>"><i class="fa fa-trash"></i> Delete</button>
								<?php include('visit_button.php'); ?>
							</td>
						</tr>
					<?php
					}
				?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
<?php include('script.php'); ?>
<?php include('add_modal.php'); ?>
<?php include('modal.php'); ?>
<script src="publisher.js"></script>



</body>
</html>