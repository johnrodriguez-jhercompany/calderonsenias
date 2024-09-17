<!-- Delete sector -->
    <div class="modal fade" id="del_<?php echo $cqrow['id_territorio']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Borrar Territorio</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<?php
						$a=mysqli_query($conn,"select * from territorio where id_territorio='".$cqrow['id_territorio']."'");
						$b=mysqli_fetch_array($a);
					?>
                    <h5><center>Nombre del Territorio: <strong><?php echo ucwords($b['territorio_name']); ?></strong></center></h5>
					<form role="form" method="POST" action="deleteterritorio.php">
                </div>                 
				</div>
                <div class="modal-footer">
                    <input type="hidden" name="idterritorio" value="<?php echo $cqrow['id_territorio']; ?>">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Borrar</button>
					</form>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->

<!-- Edit sector -->
    <div class="modal fade" id="edit_<?php echo $cqrow['id_territorio']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Editar Territorio</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<?php
						$a=mysqli_query($conn,"SELECT 
        				    territorio.id_territorio,
        				    territorio.territorio_name,
        				    sector.id_sector,
        				    sector.sector_name
        				FROM 
        				    territorio
        				INNER JOIN 
        				    sector ON territorio.id_sector = sector.id_sector where id_territorio='".$cqrow['id_territorio']."'");
						$b=mysqli_fetch_array($a);
					?>
					<div style="height:10px;"></div>
                    <form role="form" method="POST" action="edit_territorio.php">
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Sector:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" value="<?php echo ucwords($b['sector_name']); ?>" class="form-control" name="sectorname" readonly>
                        </div>
                        <div style="height:15px;"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Territorio:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" value="<?php echo ucwords($b['territorio_name']); ?>" class="form-control" name="territorioname">
                        </div>
				</div>
				</div>
                <div class="modal-footer">
                    <input type="hidden" name="idterritorio" value="<?php echo $cqrow['id_territorio']; ?>">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Update</button>
					</form>
                </div>
        </div>
    </div>
<!-- /.modal -->