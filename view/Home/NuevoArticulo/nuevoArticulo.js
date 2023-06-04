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
    if ($('#nom_prod').val() == '' || $('#marca_prod').val() == '' || $('#descrip_prod').val() == '' || $('#precio_prod').val() == '') {
        swal({
            title: "Error",
            text: "Debe llenar todos los campos!",
            icon: "warning",
            button: "Volver",
          });
    } else {
        $.ajax({
            url: "../../../controller/articulos.php?op=insert_articulo",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                swal({
                    title: "Bien",
                    text: "Artículo guardado correctamente!",
                    icon: "success",
                    button: "Volver",
                  });
                $('#nom_prod').val('');
                $('#marca_prod').val('');
                $('#precio_prod').val('');
                $('#descrip_prod').summernote('reset');
            },
        });
    }

}
init();