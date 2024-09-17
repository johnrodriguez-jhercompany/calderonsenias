<?php include('session.php'); ?>
<?php include('header.php'); ?>
<?php
	$id_assignment=$_GET['id_assignment'];

	$sql=mysqli_query($conn,"SELECT *
FROM householder 
JOIN territorio ON householder.id_territorio = territorio.id_territorio
JOIN sector ON householder.id_sector = sector.id_sector
JOIN assignment ON territorio.id_territorio = assignment.id_territorio
WHERE assignment.id_assignment = '$id_assignment'");

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
            <h1 class="page-header">Amos de Casa Asignados</h1>
        </div>
        
    </div>
    <div class="row">
    	<div class="col-lg-12">
            <h1 class="page-header">Visitas
			</h1>

        </div>
    </div>
        <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="visitTable">
                <thead>
				<tr><th>Ver</th>
                        <th>Nombre</th>
						<th>Tipo de sordera</th>
						<th>Sector</th>
						<th>Territorio</th>
                        <th>Dirección</th>
						<th>Edad</th>
                    </tr>
                </thead>
                <tbody>
				<?php
					$vs=mysqli_query($conn,"SELECT *
											FROM householder 
											JOIN territorio ON householder.id_territorio = territorio.id_territorio
											JOIN sector ON householder.id_sector = sector.id_sector
											JOIN assignment ON territorio.id_territorio = assignment.id_territorio
											WHERE assignment.id_assignment = '$id_assignment' order by date_assignment desc");
					while($cqrow=mysqli_fetch_array($vs)){
						  
						?>
							<tr>
								<TD><a class="btn btn-success" href="viewhouseholder.php<?php echo '?id='.$cqrow['id_householder']; ?>"><i class="fa fa-file"></i></a></TD>
								<td><?php echo $cqrow['name'].' '. $cqrow['last_name']; ?></td>
								<td><?php echo $cqrow['sordera']; ?></td>
								<td><?php  $id_sector=$cqrow['id_sector']; 
											$sname=mysqli_query($conn,"select sector_name from sector where id_sector='$id_sector'");
											$sectorname=mysqli_fetch_array($sname);
											echo $sectorname['sector_name'];
									?>
								</td>
								<td><?php  $id_territorio=$cqrow['id_territorio']; 
											$tname=mysqli_query($conn,"select territorio_name from territorio where id_sector='$id_territorio'");
											$territorioname=mysqli_fetch_array($tname);
											echo $territorioname['territorio_name'];
									?>
								</td>
								<td><?php echo $cqrow['direccion']; ?></td>
								<td><?php
								$fecha = $cqrow['date_birth'];
								if(!empty($fecha)){
									echo $nowfecha = date("Y")-$fecha;
									 /*
									list($ano,$mes,$dia) = explode("-",$fecha);
										 $ano_diferencia  = date("Y") - $ano;
										 $mes_diferencia = date("m") - $mes;
										 $dia_diferencia   = date("d") - $dia;
										 if ($dia_diferencia < 0 || $mes_diferencia <= 0){
										   $ano_diferencia--;
										   echo $ano_diferencia;
										 }elseif($dia_diferencia > 0 || $mes_diferencia > 0){
											echo $ano_diferencia;
										}*/ 
									}else{
										echo 'Falta agregar el año';
									}    
										 
								 ?></td>
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