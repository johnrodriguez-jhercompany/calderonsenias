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
                        $a=mysqli_query($conn,"select username, last_name from assignment JOIN user ON 
                                               assignment.id_user = user.id_user
                                               where id_assignment='".$cqrow['id_assignment']."'");
                        $b=mysqli_fetch_array($a);
                    ?>
                    <h5><center>Borrar Asignación de: <strong><?php echo ucwords($b['username']).' '.ucwords($b['last_name']); ?></strong></center></h5>
                    <form role="form" method="POST" action="deleteassignment.php">
                </div>                 
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_assignment" value="<?php echo $cqrow['id_assignment']; ?>">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Borrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->

<!-- Check publisher -->
<div class="modal fade" id="check_<?php echo $cqrow['id_assignment']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Entregar Territorio</h4></center>
                </div>
                <div class="modal-body">
                <div class="container-fluid">
                    <?php
                        $a=mysqli_query($conn,"select username, last_name from assignment JOIN user ON 
                                               assignment.id_user = user.id_user
                                               where id_assignment='".$cqrow['id_assignment']."'");
                        $b=mysqli_fetch_array($a);
                    ?>
                    <h5><center>Territorio entregado de: <strong><?php echo ucwords($b['username']).' '.ucwords($b['last_name']); ?></strong></center></h5>
                    <form role="form" method="POST" action="checkassign.php">
                </div>                 
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_assignment" value="<?php echo $cqrow['id_assignment']; ?>">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Entregar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->

<!-- Imprim publisher -->
<div class="modal fade" id="imp_<?php echo $cqrow['id_assignment']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Descargar territorio</h4></center>
                </div>
                <div class="modal-body">
                <div class="container-fluid">
                    <?php
                        $a=mysqli_query($conn,"select username, last_name from assignment JOIN user ON 
                                               assignment.id_user = user.id_user
                                               where id_assignment='".$cqrow['id_assignment']."'");
                        $b=mysqli_fetch_array($a);
                    ?>
                    <h5><center>Territorio de: <strong><?php echo ucwords($b['username']).' '.ucwords($b['last_name']); ?></strong></center></h5>
                    <form role="form" method="POST" action="impassignment.php">
                </div>                 
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_assignment" value="<?php echo $cqrow['id_assignment']; ?>">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                    <button type="submit" class="btn btn-info"><i class="fa fa-print"></i> Descargar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->

