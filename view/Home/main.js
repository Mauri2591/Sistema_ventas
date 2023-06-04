function init() {
}

var tabla;

$(document).ready(function () {
    $(document).ready(function () {
        tabla = $("#myTable").dataTable({
            "aProcessing": true,
            "aServerSide": true,
            dom: 'Bfrtip',
            "searching": true,
            lenghtChange: false,
            colReorder: true,
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],
            // exportOptions: {
            //     stripHtml: false, /* Aquí indicamos que no se eliminen las imágenes */
            // },
            "ajax": {
                url: "../../controller/articulos.php?op=select_articulos",
                type: "post",
                dataType: "json",
                data: {},
                error: function (e) {
                    console.log(e.responseText);
                    console.log(data);
                }
            },
            "bDestroy": true,
            "responsive": true,
            "bInfo": true,
            "iDisplayLength": 4, //cantidad de tuplas o filas a mostrar
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

    function centrar_datatable() {
        let tr = document.getElementsByClassName("tr_table")[0];
        tr.style.textAlign = "center";
        let tr2 = document.getElementsByClassName("tr_table")[1];
        tr2.style.textAlign = "center";
        let tr3 = document.getElementsByClassName("tr_table")[2];
        tr3.style.textAlign = "center";
        let tr4 = document.getElementsByClassName("tr_table")[3];
        tr4.style.textAlign = "center";
        let tr5 = document.getElementsByClassName("tr_table")[4];
        tr5.style.textAlign = "center";
    }
    centrar_datatable();
});

function btnElim(id_prod) {
    swal({
            title: "Desea eliminar este artículo?",
            text: "Una vez eliminado no podrá vovler atrás!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.post("../../controller/articulos.php?op=delete_articulo", {id_prod: id_prod},
                function (data, textStatus, jqXHR) {});
                swal("Artículo eliminado correctamente!", {
                    icon: "success",
                });
                $('#myTable').DataTable().ajax.reload();
            }
        });
}

function getProd(id_prod) {
    $('#modal_edit_art').modal('show');
    if ($('.modal-backdrop').is(':visible')) {
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    };
    ruta = "../Public/Imagenes/";
    img = document.getElementById("ver_img_art");
    $.post("../../controller/articulos.php?op=getProd", {
        id_prod: id_prod
    }, function (data, textStatus, jqXHR) {
        data = JSON.parse(data);
        console.log(data);
        $("#mostrar_id").html(data.id_prod);
        $("#ver_nom_prod").val(data.nom_prod);
        $("#ver_marca_prod").val(data.marca_prod);
        $("#ver_descrip_prod").val(data.descrip_prod);
        $("#ver_precio_prod").val(data.precio_prod);
        img.setAttribute("src", ruta + data.art_img);
    }, );
}

function editArt() {
    id_prod = $("#mostrar_id").html();
    nom_prod = $("#ver_nom_prod").val();
    marca_prod = $("#ver_marca_prod").val();
    descrip_prod = $("#ver_descrip_prod").val();
    precio_prod = $("#ver_precio_prod").val();
    if (nom_prod == '' || marca_prod == '' || descrip_prod == '' || precio_prod == '') {
        swal({
            title: "Error",
            text: "Campos vacíos",
            icon: "warning",
            button: "Volver",
        });
    } else {
        $.ajax({
            url: "../../controller/articulos.php?op=update_articulo",
            type: "post",
            data: {
                id_prod: id_prod,
                nom_prod: nom_prod,
                marca_prod: marca_prod,
                precio_prod : precio_prod,
                descrip_prod: descrip_prod,
            },
            success: function () {
                swal({
                    title: "Bien",
                    text: "Artículo editado correctamente!",
                    icon: "success",
                    button: "Volver",
                });
                $("#modal_edit_art").modal('hide');
                $('#myTable').DataTable().ajax.reload();
            },
        });
    }
}

init();