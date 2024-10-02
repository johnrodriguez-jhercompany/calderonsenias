
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

        

        // Inicializar DataTables con tus opciones personalizadas
    var table = $('#houseTable').DataTable({
        "bLengthChange": true,
        "bInfo": true,
        "bPaginate": true,
        "bFilter": true,
        "bSort": true,
        "pageLength": 7,
        "language": {
            "paginate": {
                "previous": "Anterior",
                "next": "Siguiente"
            },
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se encontraron registros",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros en total)",
            "search": "Buscar:"
        }
    });

    // Filtro por Sector
    $('#sectorFilter').on('change', function() {
        table.column(3).search(this.value).draw();  // La columna 3 es la del sector
    });


        $('#pubTable').DataTable({
	    "bLengthChange": true,
	    "bInfo": true,
	    "bPaginate": true,
	    "bFilter": true,
	    "bSort": true,
	    "pageLength": 7,
        "language": {
		    	"paginate": {
		    		"previous": "Anterior",
		    		"next": "Siguiente"
		    	},
		    	"lengthMenu": "Mostrar _MENU_ registros por página",
		    	"zeroRecords": "No se encontraron registros",
		    	"info": "Mostrando página _PAGE_ de _PAGES_",
		    	"infoEmpty": "No hay registros disponibles",
		    	"infoFiltered": "(filtrado de _MAX_ registros en total)",
		    	"search": "Buscar:"
		    }
	    });
    
    
    
    
    
	    $('#visitTable').DataTable({
	    "bLengthChange": true,
	    "bInfo": true,
	    "bPaginate": true,
	    "bFilter": true,
	    "bSort": true,
	    "pageLength": 7,
        "language": {
		    	"paginate": {
		    		"previous": "Anterior",
		    		"next": "Siguiente"
		    	},
		    	"lengthMenu": "Mostrar _MENU_ registros por página",
		    	"zeroRecords": "No se encontraron registros",
		    	"info": "Mostrando página _PAGE_ de _PAGES_",
		    	"infoEmpty": "No hay registros disponibles",
		    	"infoFiltered": "(filtrado de _MAX_ registros en total)",
		    	"search": "Buscar:"
		    }
	    });
    
	    $('#sectorTable').DataTable({
	    "bLengthChange": true,
	    "bInfo": true,
	    "bPaginate": true,
	    "bFilter": true,
	    "bSort": true,
	    "pageLength": 7,
        "language": {
		    	"paginate": {
		    		"previous": "Anterior",
		    		"next": "Siguiente"
		    	},
		    	"lengthMenu": "Mostrar _MENU_ registros por página",
		    	"zeroRecords": "No se encontraron registros",
		    	"info": "Mostrando página _PAGE_ de _PAGES_",
		    	"infoEmpty": "No hay registros disponibles",
		    	"infoFiltered": "(filtrado de _MAX_ registros en total)",
		    	"search": "Buscar:"
		    }
	    });
    
	    $('#territorioTable').DataTable({
	    "bLengthChange": true,
	    "bInfo": true,
	    "bPaginate": true,
	    "bFilter": true,
	    "bSort": true,
	    "pageLength": 7,
        "language": {
		    	"paginate": {
		    		"previous": "Anterior",
		    		"next": "Siguiente"
		    	},
		    	"lengthMenu": "Mostrar _MENU_ registros por página",
		    	"zeroRecords": "No se encontraron registros",
		    	"info": "Mostrando página _PAGE_ de _PAGES_",
		    	"infoEmpty": "No hay registros disponibles",
		    	"infoFiltered": "(filtrado de _MAX_ registros en total)",
		    	"search": "Buscar:"
		    }
	    });
    
	    $('#studyTable').DataTable({
	    "bLengthChange": true,
	    "bInfo": true,
	    "bPaginate": true,
	    "bFilter": true,
	    "bSort": true,
	    "pageLength": 7,
        "language": {
		    	"paginate": {
		    		"previous": "Anterior",
		    		"next": "Siguiente"
		    	},
		    	"lengthMenu": "Mostrar _MENU_ registros por página",
		    	"zeroRecords": "No se encontraron registros",
		    	"info": "Mostrando página _PAGE_ de _PAGES_",
		    	"infoEmpty": "No hay registros disponibles",
		    	"infoFiltered": "(filtrado de _MAX_ registros en total)",
		    	"search": "Buscar:"
		    }
	    });
    
	    $('#assignmentTable').DataTable({
	    "bLengthChange": true,
	    "bInfo": true,
	    "bPaginate": true,
	    "bFilter": true,
	    "bSort": true,
	    "pageLength": 7,
        "language": {
		    	"paginate": {
		    		"previous": "Anterior",
		    		"next": "Siguiente"
		    	},
		    	"lengthMenu": "Mostrar _MENU_ registros por página",
		    	"zeroRecords": "No se encontraron registros",
		    	"info": "Mostrando página _PAGE_ de _PAGES_",
		    	"infoEmpty": "No hay registros disponibles",
		    	"infoFiltered": "(filtrado de _MAX_ registros en total)",
		    	"search": "Buscar:"
		    }
	    });
    
	    $('#assignadoTable').DataTable({
	    "bLengthChange": true,
	    "bInfo": true,
	    "bPaginate": true,
	    "bFilter": true,
	    "bSort": true,
	    "pageLength": 7,
        "language": {
		    	"paginate": {
		    		"previous": "Anterior",
		    		"next": "Siguiente"
		    	},
		    	"lengthMenu": "Mostrar _MENU_ registros por página",
		    	"zeroRecords": "No se encontraron registros",
		    	"info": "Mostrando página _PAGE_ de _PAGES_",
		    	"infoEmpty": "No hay registros disponibles",
		    	"infoFiltered": "(filtrado de _MAX_ registros en total)",
		    	"search": "Buscar:"
		    }
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


    // Delegar el evento 'change' para el select #sectoredit dentro del modal
    $(document).on('change', '#sectoredit', function(){
        var id_sector = $(this).val();
		
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
            },
            error: function(xhr, status, error) {
                console.log("Error en la petición AJAX: " + error);
                $('#territorioedit').html('<option value="">Error al cargar territorios</option>');
            }
        });
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
