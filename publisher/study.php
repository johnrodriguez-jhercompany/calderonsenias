<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body>
<div id="wrapper">
<?php include('navbar.php'); ?>
<div style="height:50px;"></div>
<div id="page-wrapper">
<div class="container-fluid">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Registro de Estudios
			</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="studyTable">
                <thead>
                    <tr>
                        <th>Sordo</th>
						<th>Estudia con</th>
						<th>Observación</th>
                    </tr>
                </thead>
                <tbody>
				<?php
					$cq=mysqli_query($conn,"select id_study, householder.name as name_sordo, householder.last_name as last_name_sordo, 
											user.username as name_user, 
											user.last_name as last_name_user, observation_study from study 
											join user on study.id_user = user.id_user 
											join householder on study.id_householder = householder.id_householder 
											order by id_study desc");

					while($cqrow=mysqli_fetch_array($cq)){
						  
					?>
						<tr>
							
							<td><?php echo $cqrow['name_sordo'].' '. $cqrow['last_name_sordo']; ?></td>
							<td><?php echo $cqrow['name_user'].' '. $cqrow['last_name_user']; ?></td>
							<td><?php echo $cqrow['observation_study']; ?></td>
						</tr>
					<?php
					}
				?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
<?php include('script.php'); ?>
<?php include('add_modal.php'); ?>
<?php include('modal.php'); ?>
<script src="publisher.js"></script>
</body>
</html>