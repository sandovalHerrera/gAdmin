<?php include "includes/header.php"; ?>
<?php include "includes/navbar.php"; ?>
<?php include "includes/barraSuperior.php"; ?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!--  Contenido  -->
        <div class="row">
            <div class="col-md-4 offset-md-2 mr-auto ml-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="mx-auto d-block">
                            <img class="rounded-circle mx-auto d-block" src="images/admin.jpg" alt="Card image cap">
                            <h5 class="text-sm-center mt-2 mb-1">Nombre de la empresa</h5>
                            <div class="location text-sm-center"><i class="fa fa-map-marker"></i>Santa Ana, El Salvador</div>
                        </div>
                        <hr>
                        <div class="card-text text-sm-center">

                        </div>
                    </div>
                    <div class="card-footer">
                        <strong class="card-title mb-3">Datos de la empresa</strong>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Esta semana</div>
                                <div class="stat-digit">1,200</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-layout-grid2 text-warning border-warning"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Productos</div>
                                <div class="stat-digit">
                                    <?php echo getNumOf('productos','idproducto'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-layout-grid2 text-success border-success"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Materiales</div>
                                <div class="stat-digit">
                                    <?php echo getNumOf('materiales','idmaterial'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-user text-danger border-danger"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Usuarios</div>
                                <div class="stat-digit">2</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-four">
                            <div class="stat-icon dib">
                                <i class="ti-server text-muted"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-heading">Database</div>
                                    <div class="stat-text">Total: 765</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-four">
                            <div class="stat-icon dib">
                                <i class="ti-user text-muted"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-heading">Users</div>
                                    <div class="stat-text">Total: 24720</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-four">
                            <div class="stat-icon dib">
                                <i class="ti-stats-up text-muted"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-heading">Daily Sales</div>
                                    <div class="stat-text">Total: $76,58,714</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-four">
                            <div class="stat-icon dib">
                                <i class="ti-pulse text-muted"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-heading">Bandwidth</div>
                                    <div class="stat-text">Total: 4TB</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <!--  Contenido  -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script type='text/javascript' src="assets/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>

    
</body>
</html>
