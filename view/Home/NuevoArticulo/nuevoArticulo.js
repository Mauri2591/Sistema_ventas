function init() {
    $("#form_articulos").on("submit", (e) => {
        insert_articulo(e);
    })
}

$(document).ready(function () {
    $('#descrip_prod').summernote({
        height: 150
    });
});

function insert_articulo(e) {
    e.preventDefault();
    var formData = new FormData($("#form_articulos")[0]);
    if ($('#nom_prod').val() == '' || $('#marca_prod').val() == '' || $('#descrip_prod').val() == '') {
        confirm("Error, todos los campos deben estar completos")
    } else {
        $.ajax({
            url: "../../../controller/articulos.php?op=insert_articulo",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                alert("ok, datos guardados")
                $('#nom_prod').val('');
                $('#marca_prod').val('');
                $('#descrip_prod').summernote('reset');
            },
        });
    }

}
init();