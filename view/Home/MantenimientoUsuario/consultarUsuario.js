function init() {

}
var tabla;
$(document).ready(function () {
    tabla = $("#tabla_usuarios").dataTable({
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
        "ajax": {
            url: "../../../controller/usuario.php?op=get_usuarios",
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
        "iDisplayLength": 8, //cantidad de tuplas o filas a mostrar
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

function verUsu(usu_id) {
    $("#myModal").modal("show");
    $.ajax({
        url: "../../../controller/usuario.php?op=get_usuario",
        type: "post",
        data: {
            usu_id: usu_id
        },
        success: function (data, textStatus, jqXHR) {
            data = JSON.parse(data)
            console.log(data);
            $("#usu_id_edit").val(data.usu_id);
            $("#mostrar_id").html(data.usu_id);
            $("#usu_email_editar").val(data.usu_email);
            $("#usu_pass_editar").val(data.usu_pass);
        }
    });
}

function editUsu() {
    usu_id = $("#usu_id_edit").val();
    usu_email = $("#usu_email_editar").val();
    usu_pass = $("#usu_pass_editar").val();
    $.ajax({
        url: "../../../controller/usuario.php?op=update_usuario",
        type: "post",
        data: {
            usu_id: usu_id,
            usu_email: usu_email,
            usu_pass: usu_pass
        },
        success: function (data, textStatus, jqXHR) {
            console.log(data);
            console.log(textStatus);
        }
    });
}

function delUsu(usu_id) {
    function preguntar() {
        if (confirm("¿Está seguro que desea eliminar el usuario?")) {
            $.ajax({
                url: "../../../controller/usuario.php?op=delete_usuario",
                type: "post",
                data: {
                    usu_id: usu_id
                },
                success: function confirm(data, textStatus, jqXHR) {
                    alert("Borrado correctamente");
                    $("#myModal").modal("hide");
                    tabla.ajax.reload();
                }
            });
        } else {
            return false;
        }
    }
preguntar();
}

init();