<!-- Delete sector -->
    <div class="modal fade" id="del_<?php echo $cqrow['id_sector']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Borrar Sector</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<?php
						$a=mysqli_query($conn,"select * from sector where id_sector='".$cqrow['id_sector']."'");
						$b=mysqli_fetch_array($a);
					?>
                    <h5><center>Nombre del Sector: <strong><?php echo ucwords($b['sector_name']); ?></strong></center></h5>
					<form role="form" method="POST" action="deletesector.php">
                </div>                 
				</div>
                <div class="modal-footer">
                    <input type="hidden" name="idsector" value="<?php echo $cqrow['id_sector']; ?>">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Borrar</button>
					</form>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->

<!-- Edit sector -->
    <div class="modal fade" id="edit_<?php echo $cqrow['id_sector']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Editar Sector</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<?php
						$a=mysqli_query($conn,"select * from sector where id_sector='".$cqrow['id_sector']."'");
						$b=mysqli_fetch_array($a);
					?>
					<div style="height:10px;"></div>
                    <form role="form" method="POST" action="edit_sector.php">
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Sector:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" value="<?php echo ucwords($b['sector_name']); ?>" class="form-control" name="sectorname">
                        </div>
				</div>
				</div>
                <div class="modal-footer">
                    <input type="hidden" name="idsector" value="<?php echo $cqrow['id_sector']; ?>">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Update</button>
					</form>
                </div>
        </div>
    </div>
<!-- /.modal -->