function init() {

}

function valIdClient(value) {
    let client_id = value;
    $.ajax({
        url: "../../../controller/cliente.php?op_cli=get_cliente",
        type: "post",
        data: {
            client_id: client_id
        },
        success: function (data) {
            data = JSON.parse(data);
            $("#client_nom").val(data.client_nom + " " + data.client_ape);
            $("#client_cel").val(data.client_cel);
            $("#client_dire").val(data.client_dire);
        }
    });
}

function valor_id_art(value) {
    let id_prod = value;
    $.ajax({
        url: "../../../controller/articulos.php?op=getProd",
        type: "post",
        data: {
            id_prod: id_prod
        },
        success: function (data) {
            data = JSON.parse(data);
            $("#nom_prod").val(data.nom_prod);
            // $("#cant_prod").val(data.cant_prod);
            $("#precio_prod").val(data.precio_prod);
        }
    });
}

function cantArt(val) {
    let valor= document.getElementById("precio_prod").value;
    total= valor*val;
    document.getElementById("precio_total").value=total;
}

init();