<?php
require_once("../../../config/Conexion.php");
if (isset($_SESSION['usu_id'])) {
?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    require_once("../../Head/index.php");
    require_once("../../Public/Plugins/Css.php");
    ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />
    <title>Sistema de ventas</title>
    <link rel="stylesheet" href="../../Public/css/style.css">
    </head>

    <body>
        <div class="container">
            <ul class="navegacion nuevoArt">
                <li class="li_nav">
                    <a class="a_nav" href="./index.php">Volver</a>
                </li>
                <li class="li_nav">
                    <a class="a_nav" href="../../Home/">Inicio</a>
                </li>
            </ul>
        </div>
        <h1 class="text-center mt-4 font-weight-bold">Crear Venta</h1>

        <!------------------------   Inicio Formulario         -------------------------------->
        <div class="container col-10 p-5" id="cont_form_art_venta">
            <div class="justify-content-center mt-5 border bg-light p-5">
                <form id="form_agregar_filas" class="form-inline pb-4" action="#" method="post">

                    <input type="hidden" value="<?php echo $_SESSION['usu_id']; ?>" id="usu_id" name="usu_id">

                    <div class="container d-flex mb-3">
                        <label for="client_id" class="">Ingrese Código de cliente:</label>
                        <input type="number" min="0" value="<?php echo (0); ?>" style="font-size: 15px;" onblur="valIdClient(this.value)" id="client_id" name="client_id" autocomplete="off" class="form-control mb-2 ml-3 col-2" autofocus>
                    </div>

                    <input type="text" style="font-size: 15px; font-weight:bold" class="form-control mb-2 col-4" disabled name="client_nom" id="client_nom">
                    <input type="text" style="font-size: 15px; font-weight:bold" class="form-control mb-2 col-4" disabled name="client_cel" id="client_dire">
                    <input type="text" style="font-size: 15px; font-weight:bold" class="form-control mb-2 col-4" disabled name="client_localidad" id="client_cel">

                    <div class="container d-flex mb-3 mt-5">
                        <label for="client_id" class="">Ingrese Código de artículo:</label>
                        <input type="number" value="<?php echo (1); ?>" style="font-size: 15px;" min=1 id="id_prod" name="id_prod" onchange="valor_id_art(this.value)" class="form-control mb-2 mr-sm-2 col-1" autofocus>
                        <label for="client_id" class="">Cantidad:</label>
                        <input type="number" style="font-size: 15px;" id="client_id" min="1" value="1" onchange="cantArt(this.value)" name="cant_prod" class="form-control mb-2 mr-sm-2 col-1" autofocus>

                        <label for="id_vendedor">Vendedor:</label>
                        <div class="ml-1 form-group">
                            <select class="form-control" name="id_vendedor" id="id_vendedor">

                            </select>
                        </div>

                        <label for="id_cobrador" class="ml-2">Cobrador:</label>
                        <div class="ml-1 form-group">
                            <select class="form-control ml-1" name="id_cobrador" id="id_cobrador">

                            </select>
                        </div>

                        <button type="button" class="insertar_filas" id="insert_filas"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 5l0 14"></path>
                                <path d="M5 12l14 0"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- <div class="container_tabla" id="container_fila_ventas">

                        <input name="nom_prod" disabled id="nom_prod">
                        <input name="precio_prod" disabled id="precio_prod">
                        <input name="precio_venta" disabled id="precio_venta">
                        <input name="id_vendedor_valor" disabled id="id_vendedor_valor">
                        <input name="id_cobrador_valor" disabled id="id_cobrador_valor">
                    </div> -->
                <div style="width: 1200px;">
                    <table id="table_agregar_productos" class="display table table-striped table-bordered" width="100%">
                        <thead class="thead-dark">
                            <tr>
                                <th style="width: 20%;">Nombre</th>
                                <th style="width: 20%;">Precio unitario</th>
                                <th style="width: 20%;">Precio acumulado</th>
                                <th style="width: 20%;">Vendedor</th>
                                <th style="width: 20%;">Cobrador</th>
                                <th style="width: 10%;">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

                    <div class="cont" id="cont">

                    </div>

                    <div style="width: 900px;font-weight: bold; text-align: end; margin-bottom:100px;" class="precio_venta" id="precio_venta">
                        <h4>Total: $<span id="total_venta" name="total_venta" style="font-size: 18px;"></span></h4>
                    </div>
                    <div class="col-md-2">
                    <button id="btn_generar_venta" type="submit" class="btn btn-primary btn-block mt-3">Generar Venta</button>
                    </div>
                </form>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>
        <script src="crearVenta.js"></script>

        <script>
$(document).ready(function () {
    tabla = $("#table_agregar_productos").DataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
        "searching": true,
        lenghtChange: false,
        colReorder: true,

        "ajax": {
            url: "",
            type: "post",
            dataType: "json",
            data: {},
            error: function (e) {
                console.log(e.responseText);
            }
        },
        "order": [
            [0, "desc"]
        ], //Ordenar descendentemente
        "bDestroy": true,
        "responsive": true,
        "bInfo": true,
        "iDisplayLength": 5, //cantidad de tuplas o filas a mostrar
        "autoWith": false,
        "language": {
            "sProcessing": "Procesando..",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados..",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando un total de 0 registros",
            "sInfoFiltered": "(Filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar: ",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Ùltimo",
                "sNext": "Siguiente",
                "sPrevius": "Anterior"
            },
            "oAria": {
                "sSortAscending": ":Activar para ordenar la columna de manera ascendiente",
                "sSortDescending": ":Activar para ordenar la columna de manera descendiente"
            }
        }
    }).DataTable();
});
        </script>

        <?php echo "Usuario " . $_SESSION['nombre_rol'] . ": " . $_SESSION['usu_nom'] . " " . $_SESSION['usu_ape'] ?>
    </body>

    </html>
<?php
} else {
    header("Location:" . Conexion::ruta() . "index.php");
}
?>