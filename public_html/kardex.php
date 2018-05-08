<?php include "includes/header.php";?>
<?php include "includes/navbar.php";?>
<?php include "includes/barraSuperior.php";?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Kardex</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Kardex</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!--  Contenido  -->

<div class="col col-md-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Table Head</strong>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th scope="col" rowspan="2"> Descripción </th>
                    <th scope="col" colspan="3"> Entradas </th>
                    <th scope="col" colspan="3"> Salidas </th>
                    <th scope="col" colspan="3"> Existencia </th>
                </tr>
                <tr>
                    <th scope="col" > Cantidad </th>
                    <th scope="col"> Costo U </th>
                    <th scope="col"> Total </th>

                    <th scope="col"> Cantidad </th>
                    <th scope="col"> Costo U </th>
                    <th scope="col"> Total </th>

                    <th scope="col"> Cantidad </th>
                    <th scope="col"> Costo U </th>
                    <th scope="col"> Total </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td scope="row"> Compra Producto 1</td>
                    <td>20</td>
                    <td>$12</td>
                    <td>$240</td>

                    <td></td>
                    <td></td>
                    <td></td>

                    <td>100</td>
                    <td>$12</td>
                    <td>$1,200</td>
                </tr>

                <tr>
                    <td scope="row"></td>
                    <td></td>
                    <td></td>
                    <td></td>

                    <td></td>
                    <td></td>
                    <td></td>

                    <td>120</td>
                    <td>$12</td>
                    <td>$1,440</td>
                </tr>

                    <tr>
                    <td scope="row"> Salida Producto 2</td>

                    <td></td>
                    <td></td>
                    <td></td>

                    <td>3</td>
                    <td>$15</td>
                    <td>$45</td>

                    <td>30</td>
                    <td>$15</td>
                    <td>$450</td>
                </tr>

                <tr>
                    <td scope="row"></td>
                    <td></td>
                    <td></td>
                    <td></td>

                    <td></td>
                    <td></td>
                    <td></td>

                    <td>27</td>
                    <td>$15</td>
                    <td>$405</td>
                </tr>
                </tbody>
            </table>

            </div>
        </div>
    </div>

<!--  Contenido  -->
</div><!-- /#right-panel -->

<!-- Right Panel -->
<script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>


</body>
</html>
