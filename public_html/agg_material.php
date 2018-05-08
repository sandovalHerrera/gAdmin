<?php include "includes/header.php"; ?>
<?php include "includes/navbar.php"; ?>
<?php include "includes/barraSuperior.php"; ?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Material nuevo</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Material Nuevo</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!--  Contenido  -->
<div class="col-md-6 ">
    <div class="card">
        <div class="card-header"><strong>Material nuevo</strong>
            <small> -DIRECTO-</small>
        </div>
        <div class="card-body card-block">
            <div class="form-group"><label for="nombre" class=" form-control-label">Nombre del material</label>
                <input type="text" id="company" placeholder="Nombre" class="form-control"></div>

            <div class="form-group"><label for="categoria" class=" form-control-label">Categoria</label>
                <select name="select" id="select" class="form-control">
                    <option value="0">Please select</option>
                    <option value="1">Option #1</option>
                    <option value="2">Option #2</option>
                    <option value="3">Option #3</option>
                </select>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="cantidad" class=" form-control-label">Cantidad</label>
                        <input type="text" id="cantidad" placeholder="Cantidad" class="form-control">
                    </div>
                </div>

                <div class="form-group"><label for="categoria" class=" form-control-label">Unidad de Medida</label>
                    <select name="select" id="select" class="form-control">
                        <option value="0">Please select</option>
                        <option value="1">Option #1</option>
                        <option value="2">Option #2</option>
                        <option value="3">Option #3</option>
                    </select>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="precio" class=" form-control-label">Precio</label>
                            <input type="text" id="city" placeholder="Precio" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <!-- boton de agregar -->
            <div class="row">
                <div class="col-lg-6 offset-md-3 mr-auto ml-auto">
                    <button type="button" class="btn btn-success btn-lg btn-block">Agregar Material
                    </button>
                </div>
            </div><!-- row -->
        </div>
    </div>
</div>

<div class="col-md-6 ">
    <div class="card">
        <div class="card-header"><strong>Material nuevo</strong>
            <small> -INDIRECTO-</small>
        </div>
        <div class="card-body card-block">
            <div class="form-group"><label for="nombre" class=" form-control-label">Nombre del material</label>
                <input type="text" id="company" placeholder="Nombre" class="form-control"></div>

            <div class="form-group"><label for="categoria" class=" form-control-label">Categoria</label>
                <select name="select" id="select" class="form-control">
                    <option value="0">Please select</option>
                    <option value="1">Option #1</option>
                    <option value="2">Option #2</option>
                    <option value="3">Option #3</option>
                </select>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="cantidad" class=" form-control-label">Cantidad</label>
                        <input type="text" id="cantidad" placeholder="Cantidad" class="form-control">
                    </div>
                </div>

                <div class="form-group"><label for="categoria" class=" form-control-label">Unidad de Medida</label>
                    <select name="select" id="select" class="form-control">
                        <option value="0">Please select</option>
                        <option value="1">Option #1</option>
                        <option value="2">Option #2</option>
                        <option value="3">Option #3</option>
                    </select>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="precio" class=" form-control-label">Precio</label>
                            <input type="text" id="city" placeholder="Precio" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <!-- boton de agregar -->
            <div class="row">
                <div class="col-lg-6 offset-md-3 mr-auto ml-auto">
                    <button type="button" class="btn btn-success btn-lg btn-block">Agregar Material
                    </button>
                </div>
            </div><!-- row -->
        </div>
    </div>
</div>

<!--  Contenido  -->
</div><!-- /#right-panel -->

<!-- Right Panel -->

<script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>
