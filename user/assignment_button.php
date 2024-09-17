<!-- Delete publisher -->
    <div class="modal fade" id="del_<?php echo $cqrow['id_assignment']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Borrar Asignación</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<?php
						$a=mysqli_query($conn,"select user.username, user.last_name, householder.sector, assignment.sector from assignment join user on user.id_user=assignment.id_user join householder on householder.sector = assignment.sector where id_assignment='".$cqrow['id_assignment']."'");
						$b=mysqli_fetch_array($a);
					?>
                    <h5><center>Hermano Asignado: <strong><?php echo ucwords($b['username']).ucwords($b['last_name']); ?></strong></center></h5><br>
                    <h5><center>Sector Asignado: <strong><?php echo ucwords($b['sector']); ?></strong></center></h5>
					<form role="form" method="POST" action="deleteassignment.php<?php echo '?id='.$cqrow['id_assignment']; ?>">
                </div>                 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Borrar</button>
					</form>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->

<!-- Edit publisher -->
    <div class="modal fade" id="edit_<?php echo $cqrow['id_assignment']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Editar Publicador</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<?php
						$a=mysqli_query($conn,"select assignment.id_assignment, user.id_user, assignment.sector, user.username, user.last_name, assignment.date_assignment 
                            from assignment 
                            join user on user.id_user = assignment.id_user 
                            where id_assignment='".$cqrow['id_assignment']."'");
						$b=mysqli_fetch_array($a);
					?>
					<div style="height:10px;"></div>
                    <form role="form" method="POST" action="edit_assignment.php<?php echo '?id='.$cqrow['id_assignment']; ?>">
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Fecha:</span>
                            <input type="date" class="form-control" style="width: 400px;" name="date" value="<?php echo $b['date_assignment']; ?>" required>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span style="width:110px;" class="input-group-addon">Hermano Asignado:</span>
                            <select class="form-control" style="width: 340px;" name="id_user">

                                <?php

                                echo '<option value="'.$b['id_user'].'">'.$b['username'].' '.$b['last_name'].'</option>';

                                $id_user=$b['id_user'];

                                $c=mysqli_query($conn, "SELECT username, last_name, id_user FROM user WHERE id_user != '$id_user' ");


                                while ($d=mysqli_fetch_array($c)) {
                                        echo '<option value="'.$d['id_user'].'">'.$d['username'].' '.$d['last_name'].'</option>';
                                    }

                                ?>
                            </select>
                        </div>
						<div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span style="width:110px;" class="input-group-addon">Sector Asignado:</span>
                            <select class="form-control" style="width: 340px;" name="sector">
                                <?php

                                    echo '<option value="'.$b['sector'].'">'.$b['sector'].'</option>';

                                    $sector=$b['sector'];

                                    $e=mysqli_query($conn, "SELECT DISTINCT sector FROM householder WHERE sector != '$sector' ");

                                    while ($rowsector=mysqli_fetch_array($e)) {
                                        echo '<option value="'.$rowsector['sector'].'">'.$rowsector['sector'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
						<div style="height:10px;"></div>
				</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Actualizar</button>
					</form>
                </div>
        </div>
    </div>
<!-- /.modal -->