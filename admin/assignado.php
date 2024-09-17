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
			<?php 
				$iduser = $_SESSION['id'];

				$nu = mysqli_query($conn,"SELECT username, last_name FROM user WHERE id_user ='$iduser'");

				$nurow=mysqli_fetch_array($nu)

			?>
            <h1 class="page-header">Territorios Asignados para  <?php echo strtoupper($nurow['username']).' '.strtoupper($nurow['last_name']); ?> 
			</h1>
        </div>
    </div>
	<div style="height:50px;"></div>
	<div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="assignadoTable">
                <thead>
                    <tr>
						<th>Sector</th>
						<th>Territorio</th>
						<th>Fecha</th>
						<th>Estado</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
				<?php
					$iduser = $_SESSION['id'];
					$cq=mysqli_query($conn,"SELECT assignment.id_assignment, date_assignment, user.username, user.last_name,
											sector.id_sector, sector.sector_name, territorio.id_territorio, territorio.territorio_name,
											assignment.state_asigment 
											FROM assignment 
											JOIN user ON assignment.id_user = user.id_user
											JOIN sector ON assignment.id_sector = sector.id_sector
											JOIN territorio ON assignment.id_territorio = territorio.id_territorio
											WHERE assignment.id_user = '$iduser'
											ORDER BY assignment.date_assignment DESC");

					while($cqrow=mysqli_fetch_array($cq)){
						  
					?>
						<tr>
							<td><?php echo $cqrow['sector_name']; ?></td>
							<td><?php echo $cqrow['territorio_name']; ?></td>
							<td><?php echo $cqrow['date_assignment']; ?></td>
							<td><?php echo $cqrow['state_asigment']; ?></td>
							<td>
								<?php
									if($cqrow['state_asigment']!='entregado'){
								?><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#check_<?php echo $cqrow['id_assignment']; ?>"><i class="fa fa-check"></i></button>
								<?php
									}
								?>
								<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#imp_<?php echo $cqrow['id_assignment']; ?>"><i class="fa fa-print"></i></button>
								<button class="btn btn-primary btn-sm" onclick="window.location.href='infoview.php?id_assignment=<?php echo $cqrow['id_assignment']; ?>'"><i class="fa fa-info"></i></button>
								<?php include('assignado_button.php'); ?>
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