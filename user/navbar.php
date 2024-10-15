<!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
				<a class="navbar-brand" href="#">SISTEMA Señas</a>
            </div>
           
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<span class="glyphicon glyphicon-lock"></span> <?php echo $user; ?> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
						<li><a href="#account" data-toggle="modal"><span class="glyphicon glyphicon-lock"></span>  My Account</a></li>
						<li class="divider"></li>
                        <li><a href="#logout" data-toggle="modal"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                    </ul>   
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-home fa-fw"></i> Inicio</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Amos de Casa<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="householder.php"> <i class="fa fa-user-plus"></i> Sordos</a>
                                </li>
                                <li>
                                    <a href="study.php"> <i class="fa fa-user-plus"></i> Estudia con</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Asignación Territorios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="assignment.php"> <i class="fa fa-user-plus"></i> Asignar</a>
                                </li>
                                <li>
                                    <a href="assignado.php"> <i class="fa fa-user-plus"></i> Asignado</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="informe.php"> <i class="fa fa-map"></i> Informe</a>
                        </li>
                        <li>
                            <a href="territory.php"> <i class="fa fa-map"></i> Territorio</a>
                        </li>
						<li><a href="#logout" data-toggle="modal"><i class="fa fa-sign-out fa-fw"></i> Salir</a></li>
                    </ul>
                </div>
            </div>
        </nav>