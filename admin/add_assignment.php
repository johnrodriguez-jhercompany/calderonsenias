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
            <h1 class="page-header">Asignación de Predicación
				<span class="pull-right">
					<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addassigment"><i class="fa fa-plus-circle"></i> Agregar Asignación</button>
				</span>
			</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="pubTable">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Sector Asignado</th>
                        <th>Fecha</th>
						<th>Acción</th>
                    </tr>
                </thead>
                <tbody>
				<?php
					$cq=mysqli_query($conn,"select distinct householder.sector, user.username, user.last_name,
											assignment.date_assignment, assignment.id_assignment  
											from assignment 
											join user on user.id_user = assignment.id_user 
											join householder on householder.sector = assignment.sector 
											order by date_assignment desc");
					while($cqrow=mysqli_fetch_array($cq)){
					?>
						<tr>
							<td><?php echo $cqrow['username']; ?></td>
							<td><?php echo $cqrow['last_name']; ?></td>
							<td><?php echo $cqrow['sector']; ?></td>
							<td><?php echo $cqrow['date_assignment']; ?></td>
							<td>
								<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit_<?php echo $cqrow['id_assignment']; ?>"><i class="fa fa-edit"></i> Edit</button>
								<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del_<?php echo $cqrow['id_assignment']; ?>"><i class="fa fa-trash"></i> Delete</button>
								<?php include('assignment_button.php'); ?>
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