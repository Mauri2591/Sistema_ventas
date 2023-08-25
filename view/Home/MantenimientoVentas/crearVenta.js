function init() {

}
var tabla;
function valIdClient(value) {
    let client_id = value;
    $.post("../../../controller/cliente.php?op_cli=get_cliente", {client_id: client_id},
        function (data, textStatus, jqXHR) {
            data = JSON.parse(data)
            document.getElementById("client_nom").value = data.client_nom
            document.getElementById("client_dire").value = data.client_dire
            document.getElementById("client_cel").value = data.client_cel
        },
    );
}
valIdClient()

function valor_id_art(value) {
    let id_prod = value;
    $.post("../../../controller/articulos.php?op=getProd", {id_prod: id_prod},
        function (data, textStatus, jqXHR) {
            data = JSON.parse(data)
            document.getElementById("nom_prod").value = data.nom_prod
            document.getElementById("precio_prod").value = data.precio_prod
        },
    );
}
valIdClient()

function cantArt(value) {
    let cant_prod = value;
    let precio_prod = document.getElementById("precio_prod").value;
    let precio_total = cant_prod * precio_prod;
    document.getElementById("precio_venta").value = precio_total.toFixed(2)
}
cantArt()

function get_vendedores() {
    $.post("../../../controller/usuario.php?op=get_select_vendedores", function (data, textStatus, jqXHR) {
        data = JSON.parse(data)
        $("#id_vendedor").html(data);
    }, );
    $.post("../../../controller/usuario.php?op=get_select_cobradores", function (data, textStatus, jqXHR) {
        data = JSON.parse(data);
        $("#id_cobrador").html(data)
    }, );
}
get_vendedores();

function selec_vendedor() {
    let btn = document.getElementById("id_vendedor");
    btn.addEventListener("change", () => {
        id_vendedor = btn.value;
        $.post("../../../controller/usuario.php?op=selec_vendedor", {
                id_vendedor: id_vendedor
            },
            function (data, textStatus, jqXHR) {
                data = JSON.parse(data)
                document.getElementById("id_vendedor_valor").value = data.nom_vendedor;
            },
        );
    })
}
selec_vendedor();

function select_cobrador() {
    let btn = document.getElementById("id_cobrador");
    btn.addEventListener("change", () => {
        id_cobrador = btn.value;
        $.post("../../../controller/usuario.php?op=select_cobrador", {
                id_cobrador: id_cobrador
            },
            function (data, textStatus, jqXHR) {
                data = JSON.parse(data);
                document.getElementById("id_cobrador_valor").value = data.nom_cobrador;
            },
        );
    });
}
select_cobrador();

function insertar_filas(){
    let btn_insertar_filas=document.getElementById("insert_filas");
    btn_insertar_filas.addEventListener("click",(event)=>{
        console.log("insertar fila");
});
}
insertar_filas();



init();