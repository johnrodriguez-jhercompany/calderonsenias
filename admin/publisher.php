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
            <h1 class="page-header">Publicadores
				<span class="pull-right">
					<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addpublisher"><i class="fa fa-plus-circle"></i> Agregar Publicador</button>
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
                        <th>Password</th>
                        <th>Teléfono</th>
						<th>Dirección</th>
                        <th>Link google maps</th>
						<th>Acción</th>
                    </tr>
                </thead>
                <tbody>
				<?php
					$cq=mysqli_query($conn,"select * from user where access='2' or access='3' ORDER BY last_name ASC");
					while($cqrow=mysqli_fetch_array($cq)){
					?>
						<tr>
							<td><?php echo $cqrow['username']; ?></td>
							<td><?php echo $cqrow['last_name']; ?></td>
							<td>*****</td>
							<td><?php echo $cqrow['phone']; ?></td>
							<td><?php echo $cqrow['address']; ?></td>
							<td><?php echo $cqrow['link_address']; ?></td>
							<td>
								<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit_<?php echo $cqrow['id_user']; ?>"><i class="fa fa-edit"></i> Edit</button>
								<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del_<?php echo $cqrow['id_user']; ?>"><i class="fa fa-trash"></i> Delete</button>
								<?php include('user_button.php'); ?>
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