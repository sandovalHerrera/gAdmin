<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                    aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./"><img height="35" src="images/Gadmin.png" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="images/Gadmin2.png" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="index.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                <h3 class="menu-title">Menú</h3><!-- /.menu-title -->

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false"> <i class="menu-icon fa fa-rocket"></i>Producción</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-truck"></i><a href="salida.php">Salidas</a></li>
                        <li><i class="fa fa-sort-numeric-asc"></i><a href="costos.php">Costos</a></li>
                        <li><i class="fa fa-calendar"></i><a href="sinproducir.php">Sin producir</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Producto</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-tasks"></i><a href="inventario.php">Inventario</a></li>
                        <li><i class="fa fa-plus"></i><a href="agg_producto.php">Agregar</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false"> <i class="menu-icon fa fa-puzzle-piece"></i>Materiales</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-tasks"></i><a href="materiales.php">Materiales</a></li>
                        <li><i class="fa fa-plus"></i><a href="agg_material.php">Agregar</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false"> <i class="menu-icon fa fa-bar-chart-o"></i>Reportes</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-tasks"></i><a href="kardex.php">Kardex</a></li>
                        <li><i class="fa fa-plus"></i><a href="#">Otros</a></li>
                    </ul>
                </li>

                <h3 class="menu-title">Configuración</h3><!-- /.menu-title -->

                <li>
                    <a href="config.php"> <i class="menu-icon fa fa-cogs"></i>Configuración </a>
                </li>

                <li>
                    <a href="usuarios.php"> <i class="menu-icon fa fa-users"></i>Usuarios </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<!-- /Left Panel -->
