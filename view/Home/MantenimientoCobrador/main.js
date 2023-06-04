var tabla;

function init() {
    document.getElementById("form_crear_cobrador").addEventListener("submit", (e) => {
        insert_cobrador(e);
    })
}

function insert_cobrador(e) {
    e.preventDefault();
    let form = document.getElementById("form_crear_cobrador");
    let form_data = new FormData(form);
    $.ajax({
        url: "../../../controller/usuario.php?op=insert_cobrador",
        type: "post",
        data: form_data,
        contentType: false,
        processData: false,
        success: function (data) {
            data = JSON.parse(data);
            if (data == 1) {
                swal({
                    title: "Error!",
                    text: "Hay campos vacíos!",
                    icon: "warning",
                    button: "Volver!",
                });
            } else {
                swal({
                    title: "Bien!",
                    text: "Cobrador creado correctamente!",
                    icon: "success",
                    button: "Volver!",
                });
                $("#form_crear_cobrador")[0].reset();
            }
        }
    });
}

$(document).ready(function () {
    tabla = $("#tabla_cobrador").dataTable({
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
            url: "../../../controller/usuario.php?op=get_cobradores",
            type: "post",
            dataType: "json",
            data: {},
            error: function (e) {
                console.log(e.responseText);
            }
        },
        "order": [
            [0, "desc"]
        ],
        "bDestroy": true,
        "responsive": true,
        "bInfo": true,
        "iDisplayLength": 7, //cantidad de tuplas o filas a mostrar
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

init();