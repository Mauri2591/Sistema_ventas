function init() {
    document.getElementById("form_client").addEventListener("submit", (e) => {
        insert_cliente(e);
    });
}

function insert_cliente(e) {
    e.preventDefault();
    let form = document.getElementById("form_client");
    let formData = new FormData(form);
    $.ajax({
        url: "../../../controller/cliente.php?op_cli=insert_cliente",
        type: "post",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            data = JSON.parse(data);
            console.log(data);
            if (data == 1) {
                swal({
                    title: "Error!",
                    text: "Hay campos vacíos!",
                    icon: "warning",
                    button: "Volver!",
                });
            }
            if (data == 2) {
                swal({
                    title: "Bien!",
                    text: "Cliente creado correctamente!",
                    icon: "success",
                    button: "Ok!",
                });
                $("#form_client")[0].reset();
            }
        },
        error: function (data) {
            // console.log(data);
        }
    });

}

function get_cliente(){
    
}

init();