<!-- Add publisher -->
    <div class="modal fade" id="addpublisher" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Agregar Nuevo Publicador</h4></center>
                </div>
                <div class="modal-body">
                <div class="container-fluid">
                    <form role="form" method="POST" action="addpublisher.php" enctype="multipart/form-data">
                        <div class="container-fluid">
                        <div style="height:15px;"></div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Nombre:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="name" required>
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Apellido:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="last_name">
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Teléfono:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="phone">
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Dirección:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="address">
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">URL Dirección:</span>
                            <input type="text" style="width:360px;" class="form-control" name="link_address">
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Password:</span>
                            <input type="text" style="width:400px;" class="form-control" name="password" required>
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Acceso:</span>
                            <select style="width:400px;" class="form-control" name="access">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>    
                        </div>                           
                        </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->

<!-- Add HouseHolder -->
    <div class="modal fade" id="addhouseholder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Agregar Nuevo Amo de Casa</h4></center>
                </div>
                <div class="modal-body">
                <div class="container-fluid">
                    <form role="form" method="POST" action="addhouseholder.php" enctype="multipart/form-data">
                        <div class="container-fluid">
                        <div style="height:15px;"></div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Nombre:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="name" required>
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Apellido:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="last_name">
                        </div>
                        <?php
                            $sqlsector = "SELECT * FROM sector"; // Ajusta los nombres de las columnas según tu tabla
                            $result = $conn->query($sqlsector);
                        ?>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Sector:</span>
                            <select id="sector" name="sector" style="width:400px; text-transform:capitalize;" class="form-control" required>
                                <option value="">Seleccione un Sector</option>
                                <?php
                                if ($result->num_rows > 0) {
                                    // Salida de datos de cada fila
                                    while($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row["id_sector"] . '">' . $row["sector_name"] . '</option>';
                                    }
                                } else {
                                    echo '<option value="">No hay sectores disponibles</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Territorio:</span>
                            <select id="territorio" name="territorio" style="width:400px; text-transform:capitalize;" class="form-control" required>
                                
                                <!-- Opciones de territorio se cargarán aquí -->
                            </select>
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Dirección:</span>
                            <textarea style="width:400px;" class="form-control" name="direccion"></textarea> 
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Codigo:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="codigo">
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Teléfono:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="phone">
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Tipo de Sordera:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="sordera">
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Link de google:</span>
                            <input type="text" style="width:380px;" class="form-control" name="link_address">
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Lee:</span>
                            <select style="width: 400px;" class="form-control" name="read"> 
                                <option value="si">Si</option>
                                <option value="no">No</option>
                                <option value="poco">Poco</option>
                            </select>
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Vocaliza:</span>
                            <select style="width: 400px;" class="form-control" name="vocalize"> 
                                <option value="si">Si</option>
                                <option value="no">No</option>
                                <option value="poco">Poco</option>
                            </select>
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Sabe Señas:</span>
                            <select style="width: 400px;" class="form-control" name="sign_language"> 
                                <option value="si">Si</option>
                                <option value="no">No</option>
                                <option value="poco">Poco</option>
                            </select>
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Fecha de Nacimiento:</span>
                            <select style="width:350px;" class="form-control" name="year_birth">
                                <option value="">Selecciona el Año</option>
                                <?php
                                $currentYear = date("Y");
                                for ($year = $currentYear; $year >= 1900; $year--) {
                                    echo "<option value='$year'>$year</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Observación:</span>
                            <textarea style="width:400px;" class="form-control" name="observation"></textarea> 
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Photo:</span>
                            <input type="file" style="width:400px;" class="form-control" name="img">
                        </div>                          
                        </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->

<!-- Add Sector -->
<div class="modal fade" id="addsector" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Agregar Sector</h4></center>
                </div>
                <div class="modal-body">
                <div class="container-fluid">
                    <form role="form" method="POST" action="addsector.php" enctype="multipart/form-data">
                        <div class="container-fluid">
                        <div style="height:15px;"></div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Sector:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="sector">
                        </div>               
                        </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->

<!-- Add Territorio -->
<div class="modal fade" id="addterritorio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Agregar Territorio</h4></center>
                </div>
                <div class="modal-body">
                <div class="container-fluid">
                    <form role="form" method="POST" action="addterritorio.php" enctype="multipart/form-data">
                        <div class="container-fluid">
                        <div style="height:15px;"></div>
                        <div class="form-group input-group">
                            <span style="width:110px;" class="input-group-addon">Sector:</span>
                            <select class="form-control" style="width: 340px;" name="id_sector">
                                <?php
                                    $a=mysqli_query($conn, "SELECT * FROM sector");

                                    while ($rowuser=mysqli_fetch_array($a)) {
                                        echo '<option value="'.$rowuser['id_sector'].'">'.$rowuser['sector_name'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div style="height:15px;"></div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Territorio:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="territorio">
                        </div>                  
                        </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->

<!-- Add Study -->
<div class="modal fade" id="addstudy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Agregar Estudio</h4></center>
                </div>
                <div class="modal-body">
                <div class="container-fluid">
                    <form role="form" method="POST" action="addstudy.php" enctype="multipart/form-data">
                        <div class="container-fluid">
                        <div style="height:15px;"></div>
                        <div class="form-group input-group">
                            <span style="width:110px;" class="input-group-addon">Sordo:</span>
                            <select class="form-control" style="width: 340px;" name="id_householder">
                                <?php
                                    $a=mysqli_query($conn, "SELECT householder.id_householder as id_householder, name, last_name 
                                                            FROM householder 
                                                            LEFT JOIN study ON householder.id_householder = study.id_householder
                                                            WHERE study.id_householder IS NULL");

                                    while ($rowuser=mysqli_fetch_array($a)) {
                                        echo '<option value="'.$rowuser['id_householder'].'">'.$rowuser['name'].' '.$rowuser['last_name'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div style="height:15px;"></div>
                        <div class="form-group input-group">
                            <span style="width:110px;" class="input-group-addon">Estudia con:</span>
                            <select class="form-control" style="width: 340px;" name="id_user">
                                <?php
                                    $a=mysqli_query($conn, "SELECT id_user, username, last_name FROM user");

                                    while ($rowuser=mysqli_fetch_array($a)) {
                                        echo '<option value="'.$rowuser['id_user'].'">'.$rowuser['username'].' '.$rowuser['last_name'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Observación:</span>
                            <textarea style="width:400px;" class="form-control" name="observation"></textarea> 
                        </div>                 
                        </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->

<!-- Add Visit -->
    <div class="modal fade" id="addvisit_<?php echo $rowsql['id_householder']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Agregar Visita</h4></center>
                </div>
                <div class="modal-body">
                <div class="container-fluid">
                    <form role="form" method="POST" action="addvisit.php" enctype="multipart/form-data">
                        <div class="container-fluid">
                        <div style="height:15px;"></div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Fecha:</span>
                            <input type="date" class="form-control" style="width: 400px;" name="date_visit" required>
                        </div>
                        <div style="height:15px;"></div>
                        <div class="form-group input-group">
                            <span style="width:110px;" class="input-group-addon">Vistado por:</span>
                            <select class="form-control" style="width: 340px;" name="iduser_visit" required>
                                <option value="">Publicador</option>
                                <?php
                                    $addvsql=mysqli_query($conn, "SELECT id_user, username, last_name FROM user");

                                    while ($rowuser=mysqli_fetch_array($addvsql)) {
                                        echo '<option value="'.$rowuser['id_user'].'">'.$rowuser['username'].' '.$rowuser['last_name'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Tema:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="topic">
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Publicación:</span>
                            <input type="text" style="width:400px;" class="form-control" name="publication">
                        </div>
                        <div class="form-group input-group">
                            <span style="width:110px;" class="input-group-addon">Texto Biblico:</span>
                            <input type="text" style="width:400px;" class="form-control" name="text">
                        </div>
                        <div class="form-group input-group">
                            <span style="width:110px;" class="input-group-addon">Modo de Comunicación:</span>
                            <select class="form-control" style="width: 340px;" name="communication">
                                <option value="visita en casa">Visita en casa</option>
                                <option value="whatsapp">Whatsapp</option>
                                <option value="facebook">Facebook</option>
                                <option value="zoom">Zoom</option>
                                <option value="informal">Informal</option>
                            </select>
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Observaciones:</span>
                            <textarea class="form-control" style="width:380px;" name="observations"></textarea>
                        </div>
                            <input  name="id_householder" type="hidden" value="<?php echo $rowsql['id_householder']; ?>">                         
                        </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->





