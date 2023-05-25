var tabla;

function init() {}

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
            "iDisplayLength": 6, //cantidad de tuplas o filas a mostrar
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
    if (confirm(`Desea eliminar el producto n°  ${id_prod}?`) == true) {
        $.post("../../controller/articulos.php?op=delete_articulo", {
            id_prod: id_prod
        }, function (data, textStatus, jqXHR) {

        });
        $('#myTable').DataTable().ajax.reload();
    }
}

function getProd(id_prod) {
    $('#modal_edit_art').modal('show');
    if ($('.modal-backdrop').is(':visible')) {
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    };
    ruta = "../Public/Imagenes/";
    img = document.getElementById("ver_img_art");
    $.post("../../controller/articulos.php?op=getProd", {id_prod: id_prod}, function (data, textStatus, jqXHR) {
        data = JSON.parse(data);
        $("#mostrar_id").html(data.id_prod);
        $("#ver_nom_prod").val(data.nom_prod);
        $("#ver_marca_prod").val(data.marca_prod);
        $("#ver_descrip_prod").val(data.descrip_prod);
        img.setAttribute("src", ruta + data.art_img);
    }, 
    );
}

// function btnEdit(id_prod) {
//     $('#modal_edit_art').modal('show');
//     if ($('.modal-backdrop').is(':visible')) {
//         $('body').removeClass('modal-open');
//         $('.modal-backdrop').remove();
//         nom_prod = $("#nom_prod").val();
//         descrip_prod = $("#descrip_prod").val();
//         console.log(nom_prod + "\n" + descrip_prod);
//         console.log(id_prod);
//     };
// }

init();