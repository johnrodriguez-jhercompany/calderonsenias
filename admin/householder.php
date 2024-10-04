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
            <h1 class="page-header">Amo de Casa
				<span class="pull-right">
					<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addhouseholder"><i class="fa fa-plus-circle"></i> Agregar Amo de casa</button>
				</span>
			</h1>
        </div>
    </div>
	<!-- Filtros para buscar por sector y territorio -->
	<div class="row">
	    <div class="col-md-6">
	        <label for="sectorFilter">Filtrar por Sector:</label>
	        <select id="sectorFilter" class="form-control">
	            <option value="">Todos los sectores</option>
	            <?php
	            $sectores = mysqli_query($conn, "SELECT * FROM sector");
	            while ($row = mysqli_fetch_assoc($sectores)) {
	                echo "<option value='".$row['sector_name']."'>".$row['sector_name']."</option>";
	            }
	            ?>
	        </select>
	    </div>
		
	</div>
    <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="houseTable">
                <thead>
                    <tr><th>Ver</th>
						<th>Codigo</th>
                        <th>Nombre</th>
						<th>Tipo de sordera</th>
						<th>Sector</th>
						<th>Territorio</th>
						<th>Action</th>
                    </tr>
                </thead>
                <tbody>
				<?php
					$cq=mysqli_query($conn,"select * from householder order by id_householder desc");

					while($cqrow=mysqli_fetch_array($cq)){
						  
					?>
						<tr>
							<TD><a class="btn btn-success" href="view.php<?php echo '?id='.$cqrow['id_householder']; ?>"><i class="fa fa-file"></i></a></TD>
							<td><?php echo $cqrow['codigo']; ?></td>
							<td><?php echo $cqrow['name'].' '. $cqrow['last_name']; ?></td>
							<td><?php echo $cqrow['sordera']; ?></td>
							<td><?php  $id_sector=$cqrow['id_sector']; 
										$sname=mysqli_query($conn,"select sector_name from sector where id_sector='$id_sector'");
										$sectorname=mysqli_fetch_array($sname);
										echo $sectorname['sector_name'];
								?>
							</td>
							<td><?php  $id_territorio=$cqrow['id_territorio']; 
										$tname=mysqli_query($conn,"select territorio_name from territorio where id_territorio='$id_territorio'");
										$territorioname=mysqli_fetch_array($tname);
										echo $territorioname['territorio_name'];
								?>
							</td>
							<td>
								<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit_<?php echo $cqrow['id_householder']; ?>"><i class="fa fa-edit"></i></button>
								<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del_<?php echo $cqrow['id_householder']; ?>"><i class="fa fa-trash"></i></button>
								<?php include('house_button.php'); ?>
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