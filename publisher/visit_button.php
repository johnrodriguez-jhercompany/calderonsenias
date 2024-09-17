<!-- Delete publisher -->
    <div class="modal fade" id="del_<?php echo $vsrow['id_visit']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Borrar Visita</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<?php
						$dv=mysqli_query($conn,"SELECT visit.*, user.username, user.last_name
                                                FROM visit
                                                JOIN user ON visit.id_user = user.id_user
                                                WHERE id_visit='".$vsrow['id_visit']."'");
						$rdv=mysqli_fetch_array($dv);
					?>
                    <h5><center>Fecha de Visita: <strong><?php echo $rdv['visit_date']; ?></strong></center></h5>
                    <h5><center>Visita de: <strong><?php echo $rdv['username']." ".$rdv['last_name']; ?></strong></center></h5>
					<form role="form" method="POST" action="deletevisit.php">
                </div>                 
				</div>
                <div class="modal-footer">
                    <input type="hidden" name="idhouseholder" value="<?php echo $vsrow['id_householder']; ?>">
                    <input type="hidden" name="idvisit" value="<?php echo $vsrow['id_visit']; ?>">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Borrar</button>
					</form>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->

<!-- Edit publisher -->
    <div class="modal fade" id="edit_<?php echo $vsrow['id_visit']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Editar Publicador</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<?php
						$a=mysqli_query($conn,"select * from visit where id_visit='".$vsrow['id_visit']."'");
						$b=mysqli_fetch_array($a);
					?>
					<div style="height:10px;"></div>
                    <form role="form" method="POST" action="edit_visit.php<?php echo '?id='.$vsrow['id_visit']; ?>">
                        <div class="container-fluid">
                        <div style="height:15px;"></div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Fecha:</span>
                            <input type="date" class="form-control" style="width: 400px;" name="date" value="<?php echo $vsrow['visit_date']; ?>" required>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span style="width:110px;" class="input-group-addon">Vistado por:</span>
                            <select class="form-control" style="width: 340px;" name="iduser_visit" required>
                                <?php
                                    $visit_id=$vsrow['id_visit'];
                                    $visitUserSql = mysqli_query($conn, "SELECT user.id_user, user.username, user.last_name FROM visit 
                                    JOIN user ON visit.id_user = user.id_user 
                                    WHERE visit.id_visit = $visit_id");

                                    $currentVisitUser = mysqli_fetch_array($visitUserSql);
                                    $currentIdUserVisit = $currentVisitUser['id_user'];

                                    $addvsql=mysqli_query($conn, "SELECT id_user, username, last_name FROM user");

                                     // Mostrar el usuario actual como primera opción seleccionada
                                    echo '<option value="'.$currentVisitUser['id_user'].'" selected>'.$currentVisitUser['username'].' '.$currentVisitUser['last_name'].'</option>';

                                    // Generar las demás opciones del select
                                    while ($rowuser = mysqli_fetch_array($addvsql)) {
                                        // No mostrar nuevamente el usuario ya seleccionado
                                        if ($rowuser['id_user'] != $currentIdUserVisit) {
                                            echo '<option value="'.$rowuser['id_user'].'">'.$rowuser['username'].' '.$rowuser['last_name'].'</option>';
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Tema:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" value="<?php echo $vsrow['topic']; ?>" name="topic">
                        </div>
                        <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Publicación:</span>
                            <input type="text" style="width:400px;" class="form-control" value="<?php echo $vsrow['publication']; ?>" name="publication">
                        </div>
                        <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span style="width:110px;" class="input-group-addon">Texto Biblico:</span>
                            <input type="text" style="width:400px;" class="form-control" value="<?php echo $vsrow['text']; ?>" name="text">
                        </div>
                        <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span style="width:105px;" class="input-group-addon">Modo de Comunicación:</span>
                            <select class="form-control" style="width: 330px;" name="communication">
                                <?php 
                                $options = [
                                    'casa' => 'De casa en casa',
                                    'whatsapp' => 'Whatsapp',
                                    'facebook' => 'Facebook',
                                    'zoom' => 'Zoom',
                                    'informal' => 'Informal'
                                ];
                                $selected = $vsrow['communication'];
                            
                                foreach ($options as $value => $label) {
                                    $isSelected = ($selected === $value) ? 'selected' : '';
                                    echo "<option value=\"$value\" $isSelected>$label</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Observaciones:</span>
                            <textarea class="form-control" style="width:380px;" name="observation"><?php echo $vsrow['observation']; ?></textarea>
                        </div>                       
                        </div>
				</div>
				</div>
                <div class="modal-footer">
                    <input type="hidden" name="idhouseholder" value="<?php echo $vsrow['id_householder']; ?>">
                    <input type="hidden" name="idvisit" value="<?php echo $vsrow['id_visit']; ?>" >
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Actualizar</button>
					</form>
                </div>
        </div>
    </div>
<!-- /.modal -->