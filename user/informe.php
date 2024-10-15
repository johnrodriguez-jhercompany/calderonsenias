<?php include('session.php'); ?>
<?php include('header.php'); ?>

<body>
<div id="wrapper">
<?php include('navbar.php'); ?>
<div style="height:50px;"></div>
<div id="page-wrapper">
<div class="container-fluid">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Registro de Asignación de Territorio
			</h1>
        </div>
    </div>
	<div class="row">
		<form role="form" method="POST" action="impinforme.php" enctype="multipart/form-data">
		<div class="col-lg-10">
			<div class="col-lg-6">
			<h2>Año de Servicio</h2>
			<select id="anio_servicio" name="anio" class="form-control" required>
				<?php
				// Obtener datos de la tabla sector
				$assigment = "SELECT DISTINCT YEAR(date_assignment) AS asignado FROM assignment";
				$assigmentResult = $conn->query($assigment);
				if ($assigmentResult->num_rows > 0) {
					echo "<option value=''>Escoja un Año de Servicio</option>";
					while($row = $assigmentResult->fetch_assoc()) {
						echo "<option value='" . $row['asignado'] . "'>" . $row['asignado'] . "</option>";
					}
				} else {
					echo "<option value=''>No hay sectores disponibles</option>";
				}
				?>
			</select>
		    </div>
		</div>
		<div class="col-lg-2">
			<h2>Acción</h2>
			<button type="submit" class="btn btn-primary"><i class="fa fa-print"></i> Descargar Informe</button>
		</div>
		</form>
	</div>
	<div style="height:50px;"></div>
	<div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="assignmentTable">
                <thead>
                    <tr>
                        <th>Núm. de terr.</th>
						<th>Sector</th>
						<th>Asignado a</th>
						<th>Fecha Asignada</th>
						<th>Fecha Entregada</th>
                    </tr>
                </thead>
                <tbody>
				<?php
					$cq=mysqli_query($conn,"SELECT assignment.id_assignment, date_assignment, date_assignment_end, 
                                            user.username, user.last_name, territorio.territorio_name,sector_name
											FROM assignment 
											JOIN user ON assignment.id_user = user.id_user
											JOIN sector ON assignment.id_sector = sector.id_sector
											JOIN territorio ON assignment.id_territorio = territorio.id_territorio
											ORDER BY assignment.date_assignment DESC");

					while($cqrow=mysqli_fetch_array($cq)){
						  
					?>
						<tr>
                            <td><?php echo $cqrow['territorio_name']; ?></td>
							<td><?php echo $cqrow['sector_name']; ?></td>
							<td><?php echo $cqrow['username'].' '. $cqrow['last_name']; ?></td>
							<td><?php echo $cqrow['date_assignment']; ?></td>
							<td><?php echo $cqrow['date_assignment_end']; ?></td>
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