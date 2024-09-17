<!-- Delete sector -->
    <div class="modal fade" id="del_<?php echo $cqrow['id_study']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Borrar Estudio</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<?php
						$a=mysqli_query($conn,"select householder.name as name_sordo, householder.last_name as last_name_sordo, 
											user.username as name_user, 
											user.last_name as last_name_user, observation_study from study 
											join user on study.id_user = user.id_user 
											join householder on study.id_householder = householder.id_householder 
											where id_study='".$cqrow['id_study']."'");
						$b=mysqli_fetch_array($a);
					?>
                    <h5><center>Nombre del Estudiante: <strong><?php echo ucwords($b['name_sordo']).' '.ucwords($b['last_name_sordo']); ?></strong></center></h5>
                    <h5><center>Nombre del Hermano: <strong><?php echo ucwords($b['name_user']).' '.ucwords($b['last_name_user']); ?></strong></center></h5>
					<form role="form" method="POST" action="deletestudy.php">
                </div>                 
				</div>
                <div class="modal-footer">
                    <input type="hidden" name="idstudy" value="<?php echo $cqrow['id_study']; ?>">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Borrar</button>
					</form>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->

