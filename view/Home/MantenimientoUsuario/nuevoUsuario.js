function init() {
    document.getElementById("form_nuevo_usu").addEventListener("submit", (e) => {
        nuevoUsuario(e);
    });
}
$(document).ready(function () {
    $.post("../../../controller/usuario.php?op=selec_rol_usu", function (data, textStatus, jqXHR) {
        let usu_rol = document.getElementById("usu_rol").innerHTML = data;
    }, );
});

function nuevoUsuario(e) {
    e.preventDefault();
    let form = document.getElementById("form_nuevo_usu");
    let formData = new FormData(form);
    if ($("#usu_email").val() == '' || $("#usu_pass").val() == '' || $("#usu_nom").val() == '' || $("#usu_ape").val() == '') {
        swal({
            title: "Error!",
            text: "Hay campos vacíos!",
            icon: "warning",
            button: "Volver!",
        });
    } else {
        $.ajax({
            url: "../../../controller/usuario.php?op=insert_usuario",
            type: "post",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                swal({
                    title: "Bien!",
                    text: "Usuario creado correctamente!",
                    icon: "success",
                    button: "Volver!",
                });
                $("#form_nuevo_usu")[0].reset();
            },
        });
    }

}
init();