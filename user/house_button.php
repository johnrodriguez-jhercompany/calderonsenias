<!-- Delete householder -->
    <div class="modal fade" id="del_<?php echo $cqrow['id_householder']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Borrar Amo de casa</h4></center>
                </div>
                <div class="modal-body">
                <div class="container-fluid">
                    <?php
                        $a=mysqli_query($conn,"select * from householder where id_householder='".$cqrow['id_householder']."'");
                        $b=mysqli_fetch_array($a);
                    ?>
                    <h5><center>Nombre de Amo de Casa: <strong><?php echo ucwords($b['name']).' '.ucwords($b['last_name']); ?></strong></center></h5>
                    <form role="form" method="POST" action="deletehouseholder.php">
                </div>                 
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="idhouseholder" value="<?php echo $cqrow['id_householder']; ?>">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Borrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->

<!-- Edit householder -->
    <div class="modal fade" id="edit_<?php echo $cqrow['id_householder']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Editar Amo de casa</h4></center>
                </div>
                <div class="modal-body">
                <div class="container-fluid">
                    <?php
                        $a=mysqli_query($conn,"select * from householder where id_householder='".$cqrow['id_householder']."'");
                        $b=mysqli_fetch_array($a);
                    ?>
                    <div style="height:10px;"></div>
                    <form role="form" method="POST" action="edit_householder.php" enctype="multipart/form-data">
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Nombre:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" value="<?php echo ucwords($b['name']); ?>" class="form-control" name="name" required>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Apellido:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" value="<?php echo ucwords($b['last_name']); ?>" class="form-control" name="last_name">
                        </div>
                         <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Sector:</span>
                            <select id="sectoredit" name="sector" style="width:400px; text-transform:capitalize;" class="form-control" required>
                                
                                <?php
                                    $sectorid=$b['id_sector'];
                                    $sqlsector = "SELECT * FROM sector where id_sector='$sectorid'"; // Ajusta los nombres de las columnas según tu tabla
                                    $result = $conn->query($sqlsector);
                                    $currentSector = $result->fetch_assoc();

                                ?>
                                <option value="<?php echo $currentSector['id_sector']; ?>">
                                    <?php echo $currentSector['sector_name']; // Ajusta el nombre de la columna según tu tabla ?>
                                </option>
                                <?php
                                    // Extraer todos los sectores para las otras opciones
                                    $sqlallsectors = "SELECT * FROM sector";
                                    $resultAll = $conn->query($sqlallsectors);

                                    while($row = $resultAll->fetch_assoc()) {
                                        // No mostrar el sector actual otra vez en las opciones
                                        if ($row['id_sector'] != $sectorid) {
                                            echo '<option value="' . $row['id_sector'] . '">' . $row['sector_name'] . '</option>';
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Territorio:</span>
                            <select id="territorioedit" name="territorio" style="width:400px; text-transform:capitalize;" class="form-control" required>
                                <?php
                                    $territorioid=$b['id_territorio'];
                                    $sqlterr = "SELECT * FROM territorio where id_territorio='$territorioid'"; // Ajusta los nombres de las columnas según tu tabla
                                    $resultt = $conn->query($sqlterr);
                                    $currentterr = $resultt->fetch_assoc();
                                ?>
                                <option value="<?php echo $currentterr['id_territorio']; ?>">
                                    <?php echo $currentterr['territorio_name']; // Ajusta el nombre de la columna según tu tabla ?>
                                </option>        
                            </select>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Dirección:</span>
                            <input type="text" style="width:400px;" value="<?php echo $b['direccion'] ?>" class="form-control" name="direccion">
                        </div>
                        <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Codigo:</span>
                            <input type="text" style="width:400px;" value="<?php echo $b['codigo'] ?>" class="form-control" name="codigo">
                        </div>
                        <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Teléfono:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" value="<?php echo $b['phone']; ?>" class="form-control" name="phone">
                        </div>
                        <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Tipo de Sordera:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" value="<?php echo $b['sordera']; ?>" class="form-control" name="sordera">
                        </div>
                        <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Link de Dirección:</span>
                            <input type="text" style="width:400px;" value="<?php echo $b['link_address'] ?>" class="form-control" name="link_address">
                        </div>
                        
                        <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Lee:</span>
                            <select style="width: 400px;" class="form-control" name="lee">
                                <?php
                                    switch($b['lee']){
                                        
                                        case 'ni':
                                            echo '<option value="ni">Sin Información</option>';
                                            echo '<option value="poco">Poco</option>';
                                            echo '<option value="no">No</option>';
                                            echo '<option value="si">Si</option>';
                                            break;
                                        case 'si': 
                                        echo '<option value="si">Si</option>';
                                        echo '<option value="no">No</option>';
                                        echo '<option value="poco">Poco</option>';
                                        echo '<option value="ni">Sin Información</option>';
                                        break;
                                        case 'no':
                                        echo '<option value="no">No</option>';
                                        echo '<option value="si">Si</option>';
                                        echo '<option value="poco">Poco</option>';
                                        echo '<option value="ni">Sin Información</option>'; 
                                        break;
                                        case 'poco':
                                        echo '<option value="poco">Poco</option>';
                                        echo '<option value="no">No</option>';
                                        echo '<option value="si">Si</option>';
                                        echo '<option value="ni">Sin Información</option>';
                                        break;
                                    }
                                ?>
                            </select>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Vocaliza:</span>
                            <select style="width: 400px;" class="form-control" name="vocalize">
                                <?php
                                    switch($b['vocalize']){
                                        case 'ni':
                                            echo '<option value="ni">Sin Información</option>';
                                            echo '<option value="poco">Poco</option>';
                                            echo '<option value="no">No</option>';
                                            echo '<option value="si">Si</option>';
                                            break;
                                        case 'si': 
                                        echo '<option value="si">Si</option>';
                                        echo '<option value="no">No</option>';
                                        echo '<option value="poco">Poco</option>';
                                        echo '<option value="ni">Sin Información</option>';
                                        break;
                                        case 'no':
                                        echo '<option value="no">No</option>';
                                        echo '<option value="si">Si</option>';
                                        echo '<option value="poco">Poco</option>';
                                        echo '<option value="ni">Sin Información</option>'; 
                                        break;
                                        case 'poco':
                                        echo '<option value="poco">Poco</option>';
                                        echo '<option value="no">No</option>';
                                        echo '<option value="si">Si</option>';
                                        echo '<option value="ni">Sin Información</option>';
                                        break;
                                        
                                    }
                                ?>
                            </select>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Sabe señas:</span>
                            <select style="width: 400px;" class="form-control" name="sign_language">
                                <?php
                                    switch($b['sign_language']){
                                        case 'ni':
                                            echo '<option value="ni">Sin Información</option>';
                                            echo '<option value="poco">Poco</option>';
                                            echo '<option value="no">No</option>';
                                            echo '<option value="si">Si</option>';
                                            break;
                                        case 'si': 
                                        echo '<option value="si">Si</option>';
                                        echo '<option value="no">No</option>';
                                        echo '<option value="poco">Poco</option>';
                                        echo '<option value="ni">Sin Información</option>';
                                        break;
                                        case 'no':
                                        echo '<option value="no">No</option>';
                                        echo '<option value="si">Si</option>';
                                        echo '<option value="poco">Poco</option>';
                                        echo '<option value="ni">Sin Información</option>'; 
                                        break;
                                        case 'poco':
                                        echo '<option value="poco">Poco</option>';
                                        echo '<option value="no">No</option>';
                                        echo '<option value="si">Si</option>';
                                        echo '<option value="ni">Sin Información</option>';
                                        break;
                                    }
                                ?>
                            </select>
                        </div>
                        
                        <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Fecha de Nacimiento:</span>
                            <select style="width:350px;" class="form-control" name="year_birth">
                                <option value="">Selecciona el Año</option>
                                <?php
                                $currentYear = date("Y");
                                $year_birth = $b['date_birth']; 
                                for ($year = $currentYear; $year >= 1900; $year--) {
                                    // Si el año es igual al año de nacimiento, añadir la propiedad "selected"
                                    $selected = ($year == $year_birth) ? "selected" : "Selecciona el Año";
                                    echo "<option value='$year' $selected>$year</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div style="height:10px;"></div>                    
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Observaciones:</span>
                            <textarea style="width:400px;" name="observation"><?php echo $b['observation'] ?></textarea> 
                        </div>
                        <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Cambiar Foto:</span>
                            <input type="file" style="width:400px;" class="form-control" name="img">
                        </div>
                       
                        <?php 
                             if(empty($b['img'])){ 

                                    echo '  <div style="height:10px;"></div>
                                            <img src="../img/photo.jpg" style="width:100px; height:100px;">';
                            }
                              else{
                                    echo '  <div style="height:10px;"></div><img src="../address/'.$b['img'].'" style="width:100px; height:100px;">'; 
                                   } ?>
                                    
                </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="idhouseholder" value="<?php echo $cqrow['id_householder']; ?>">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Actualizar</button>
                    </form>
                </div>
        </div>
    </div>
<!-- /.modal -->