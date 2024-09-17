
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../dist/js/sb-admin-2.js"></script>
	<script src="../vendor/metisMenu/metisMenu.min.js"></script>

	<!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
   
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });

    /*** Territorio con variable del sector para escoger territorio */
    $(document).ready(function(){
        $('#sector').change(function(){
            var id_sector = $(this).val();

            if (id_sector != '') {
                $.ajax({
                    url: 'get_territorios.php',
                    method: 'POST',
                    data: {id_sector: id_sector},
                    dataType: 'json',
                    success: function(data) {
                        var options = '<option value="">Seleccione un Territorio</option>';
                        $.each(data, function(key, value){
                            options += '<option value="'+ value.id_territorio +'">'+ value.territorio_name +'</option>';
                        });
                        $('#territorio').html(options);
                    }
                });
            } else {
                $('#territorio').html('<option value="">Seleccione un Sector primero</option>');
            }
        });
    }); 

    /*** Territorio con variable del sector para escoger territorio en edicion */
    $(document).ready(function(){
        $('#sectoredit').change(function(){
            var id_sector = $(this).val();

            if (id_sector != '') {
                $.ajax({
                    url: 'get_territorios.php',
                    method: 'POST',
                    data: {id_sector: id_sector},
                    dataType: 'json',
                    success: function(data) {
                        var options = '<option value="">Seleccione un Territorio</option>';
                        $.each(data, function(key, value){
                            options += '<option value="'+ value.id_territorio +'">'+ value.territorio_name +'</option>';
                        });
                        $('#territorioedit').html(options);
                    }
                });
            } else {
                $('#territorioedit').html('<option value="">Seleccione un Sector primero</option>');
            }
        });
    }); 

        /*** Territorio con variable del sector para escoger territorio en edicion en assigment.php */
        $(document).ready(function(){
        $('#sectorassigment').change(function(){
            var id_sector = $(this).val();

            if (id_sector != '') {
                $.ajax({
                    url: 'get_territorio_assig.php',
                    method: 'POST',
                    data: {id_sector: id_sector},
                    dataType: 'json',
                    success: function(data) {
                        var options = '<option value="">Seleccione un Territorio</option>';
                        $.each(data, function(key, value){
                            options += '<option value="'+ value.id_territorio +'">'+ value.territorio_name +'</option>';
                        });
                        $('#territorioassigment').html(options);
                    }
                });
            } else {
                $('#territorioassigment').html('<option value="">Seleccione un Sector primero</option>');
            }
        });
    }); 


    </script>
