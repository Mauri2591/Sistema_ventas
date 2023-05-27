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
    if (usu_email == '' || usu_pass == '') {
        swal({
            title: "Error",
            text: "Campos vacíos",
            icon: "warning",
            button: "Volver",
        });
    } else {
        $.ajax({
            url: "../../../controller/usuario.php?op=update_usuario",
            type: "post",
            data: {
                usu_id: usu_id,
                usu_email: usu_email,
                usu_pass: usu_pass
            },
            success: function (data, textStatus, jqXHR) {
                swal({
                    title: "Bien",
                    text: "Usuario editado correctamente!",
                    icon: "success",
                    button: "Volver",
                });
                $("#myModal").modal('hide');
                $('#tabla_usuarios').DataTable().ajax.reload();
            }
        });
    }

}

function delUsu(usu_id) {
    swal({
            title: "Desea eliminar este usuario?",
            text: "Una vez eliminado no podrá volver atrás",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "../../../controller/usuario.php?op=delete_usuario",
                    type: "post",
                    data: {
                        usu_id: usu_id
                    }
                });
                swal("Usuario eliminado correctamente", {
                    icon: "success",
                });
                $('#tabla_usuarios').DataTable().ajax.reload();
            }
        });
}

init();