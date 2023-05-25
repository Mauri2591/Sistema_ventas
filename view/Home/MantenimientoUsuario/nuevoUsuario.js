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
    if ($("#usu_email").val() == '' || $("#usu_pass").val().length < 8 || $("#usu_pass").val().length > 12) {
        confirm("Error. Respete la cantidad de caracteres permitidos");
    }else{
        $.ajax({
            url: "../../../controller/usuario.php?op=insert_usuario",
            type: "post",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                alert("Creado correctamente");
                window.location.reload();
            },
        });
    }
    
}

init();