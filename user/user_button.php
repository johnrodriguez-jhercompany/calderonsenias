<!-- Delete publisher -->
    <div class="modal fade" id="del_<?php echo $cqrow['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Borrar Publicador</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<?php
						$a=mysqli_query($conn,"select * from user where id_user='".$cqrow['id_user']."'");
						$b=mysqli_fetch_array($a);
					?>
                    <h5><center>Nombre de Publicador: <strong><?php echo ucwords($b['username']); ?></strong></center></h5>
					<form role="form" method="POST" action="deletepublisher.php">
                </div>                 
				</div>
                <div class="modal-footer">
                    <input type="hidden" name="iduser" value="<?php echo $cqrow['id_user']; ?>">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Borrar</button>
					</form>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->

<!-- Edit publisher -->
    <div class="modal fade" id="edit_<?php echo $cqrow['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Editar Publicador</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<?php
						$a=mysqli_query($conn,"select * from user where id_user='".$cqrow['id_user']."'");
						$b=mysqli_fetch_array($a);
					?>
					<div style="height:10px;"></div>
                    <form role="form" method="POST" action="edit_publisher.php">
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Nombre:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" value="<?php echo ucwords($b['username']); ?>" class="form-control" name="name">
                        </div>
                        <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Apellido:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" value="<?php echo ucwords($b['last_name']); ?>" class="form-control" name="last_name">
                        </div>
						<div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Teléfono:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" value="<?php echo $b['phone']; ?>" class="form-control" name="phone">
                        </div>
						<div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Dirección:</span>
                            <input type="text" style="width:400px;" value="<?php echo $b['address'] ?>" class="form-control" name="address">
                        </div>
						<div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Link de Google:</span>
                            <input type="text" style="width:400px;" value="<?php echo $b['link_address'] ?>" class="form-control" name="link_address">
                        </div>
                        <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Acceso:</span>
                            <select style="width:400px;" class="form-control" name="access">
                            <?php
                                echo '<option value="'.$b['access'].'">'.$b['access'].'</option>';
                                $options = [1, 2, 3];
                                foreach ($options as $option) {
                                    if ($option != $b['access']) {
                                        echo "<option value='$option'>$option</option>";
                                    }
                                }
                            ?>
                            </select>    
                        </div> 
						<div style="height:10px;"></div>					
						<div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Password:</span>
                            <input type="password" style="width:400px;" value="<?php echo $b['password'] ?>" class="form-control" name="password">
                        </div>
						<div style="height:10px;"></div>
				</div>
				</div>
                <div class="modal-footer">
                    <input type="hidden" name="iduser" value="<?php echo $cqrow['id_user']; ?>">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Update</button>
					</form>
                </div>
        </div>
    </div>
<!-- /.modal -->