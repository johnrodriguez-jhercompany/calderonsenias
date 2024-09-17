<?php include('session.php'); ?>
<?php include('header.php'); ?>
<?php
// Guardar la asignación si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	
    $sector = $_POST['sector'];
    $territorio = $_POST['territorio'];
    $user = $_POST['user'];

	$date_assignment = date('Y-m-d H:i:s');
	$state_asigment = 'asignado';

    // Consulta para asignar el sector al usuario
    $assignQuery = "INSERT INTO assignment (id_user, id_sector, id_territorio, date_assignment,state_asigment) 
					VALUES ('$user', '$sector', '$territorio', '$date_assignment', '$state_asigment')";

$id_user = $_SESSION['id'];
$date_change= date('Y-m-d H:i:s');


$id_change = mysqli_insert_id($conn);

mysqli_query($conn,"insert into log (id_user, date_change, change_bd) values ('$id_user', '$date_change',  '" . $id_change . " assignadd')");
    
if ($conn->query($assignQuery) === TRUE) {
        header("Location: assignment.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<body>
<div id="wrapper">
<?php include('navbar.php'); ?>
<div style="height:50px;"></div>
<div id="page-wrapper">
<div class="container-fluid">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Asignar Territorio
			</h1>
        </div>
    </div>
	<div class="row">
		<form role="form" method="POST" action="" enctype="multipart/form-data">
		<div class="col-lg-4">
			<div class="col-lg-6">
			<h2>Sector</h2>
			<select id="sectorassigment" name="sector" class="form-control" required>
				<?php
				// Obtener datos de la tabla sector
				$sectorQuery = "SELECT id_sector, sector_name FROM sector";
				$sectorResult = $conn->query($sectorQuery);
				if ($sectorResult->num_rows > 0) {
					echo "<option value=''>Escoja un Sector</option>";
					while($row = $sectorResult->fetch_assoc()) {
						echo "<option value='" . $row['id_sector'] . "'>" . $row['sector_name'] . "</option>";
					}
				} else {
					echo "<option value=''>No hay sectores disponibles</option>";
				}
				?>
			</select>
		    </div>
			<div class="col-lg-6">
			<h2>Territorio</h2>
			<!--esta en el script.php con el id territorioasssigment-->
			<select id="territorioassigment" name="territorio" class="form-control" required>
				<option value="">Seleccione un territorio</option>
			</select>
		    </div>
		</div>
		<div class="col-lg-4">
			<h2>Publicador</h2>
			<select name="user" class="form-control" required>
			<?php
				// Obtener datos de la tabla sector
				$userQuery = "SELECT id_user, username, last_name FROM user";
				$userResult = $conn->query($userQuery);
				if ($userResult->num_rows > 0) {
					echo "<option value=''>Escoja un publicador</option>";
					while($row = $userResult->fetch_assoc()) {
						echo "<option value='" . $row['id_user'] . "'>" . $row['username'] . " ". $row['last_name']."</option>";
					}
				} else {
					echo "<option value=''>No hay publicadores disponibles</option>";
				}
				?>
			</select>
		</div>
		<div class="col-lg-4">
			<h2>Acción</h2>
			<button type="submit" class="btn btn-primary">Asignar</button>
		</div>
		</form>
	</div>
	<div style="height:50px;"></div>
	<div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="assignmentTable">
                <thead>
                    <tr>
                        <th>Nombre</th>
						<th>Sector</th>
						<th>Territorio</th>
						<th>Fecha</th>
						<th>Estado</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
				<?php
					$cq=mysqli_query($conn,"SELECT assignment.id_assignment, date_assignment, user.username, user.last_name,
											sector.id_sector, sector.sector_name, territorio.id_territorio, territorio.territorio_name,
											assignment.state_asigment 
											FROM assignment 
											JOIN user ON assignment.id_user = user.id_user
											JOIN sector ON assignment.id_sector = sector.id_sector
											JOIN territorio ON assignment.id_territorio = territorio.id_territorio
											WHERE assignment.state_asigment = 'asignado'
											ORDER BY assignment.date_assignment DESC");

					while($cqrow=mysqli_fetch_array($cq)){
						  
					?>
						<tr>
							<td><?php echo $cqrow['username'].' '. $cqrow['last_name']; ?></td>
							<td><?php echo $cqrow['sector_name']; ?></td>
							<td><?php echo $cqrow['territorio_name']; ?></td>
							<td><?php echo $cqrow['date_assignment']; ?></td>
							<td><?php echo $cqrow['state_asigment']; ?></td>
							<td>
								<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#check_<?php echo $cqrow['id_assignment']; ?>"><i class="fa fa-check"></i></button>
								<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del_<?php echo $cqrow['id_assignment']; ?>"><i class="fa fa-trash"></i></button>
								<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#imp_<?php echo $cqrow['id_assignment']; ?>"><i class="fa fa-print"></i></button>
								<!--<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#inf_<?php echo $cqrow['id_assignment']; ?>"><i class="fa fa-info"></i></button>-->
								<?php include('assign_button.php'); ?>
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
<?php include('modal.php'); ?>
<?php include('add_modal.php'); ?>
<script src="publisher.js"></script>
</body>
</html>