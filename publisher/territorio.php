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
            <h1 class="page-header">Territorios
				<span class="pull-right">
					<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addterritorio"><i class="fa fa-plus-circle"></i> Agregar Territorio</button>
				</span>
			</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="territorioTable">
                <thead>
                    <tr>
						<th>Sector</th>
                        <th>Territorio</th>
						<th>Acción</th>
                    </tr>
                </thead>
                <tbody>
				<?php
					$cq=mysqli_query($conn,"SELECT 
        				    territorio.id_territorio,
        				    territorio.territorio_name,
        				    sector.id_sector,
        				    sector.sector_name
        				FROM 
        				    territorio
        				INNER JOIN 
        				    sector ON territorio.id_sector = sector.id_sector ORDER BY territorio_name ASC");
					while($cqrow=mysqli_fetch_array($cq)){
					?>
						<tr>
							<td><?php echo $cqrow['sector_name']; ?></td>
							<td><?php echo $cqrow['territorio_name']; ?></td>
							<td>
								<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit_<?php echo $cqrow['id_territorio']; ?>"><i class="fa fa-edit"></i> Edit</button>
								<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del_<?php echo $cqrow['id_territorio']; ?>"><i class="fa fa-trash"></i> Delete</button>
								<?php include('territorio_button.php'); ?>
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