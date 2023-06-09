function init() {}

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
    let valor = document.getElementById("precio_prod").value;
    total = valor * val;
    document.getElementById("precio_total").value = total;
}

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
        $.post("../../../controller/usuario.php?op=selec_vendedor", {id_vendedor: id_vendedor},
            function (data, textStatus, jqXHR) {
                data = JSON.parse(data)
                document.getElementById("id_vendedor_valor").value = data.nom_vendedor;
            },
        );
    })
}
selec_vendedor();

function select_cobrador() {
   let btn= document.getElementById("id_cobrador");
   btn.addEventListener("change",()=>{
        id_cobrador= btn.value;
        $.post("../../../controller/usuario.php?op=select_cobrador", {id_cobrador:id_cobrador},
            function (data, textStatus, jqXHR) {
                data=JSON.parse(data);
                document.getElementById("id_cobrador_valor").value=data.nom_cobrador;
                console.log(data);
            },
        );
   });
}
select_cobrador();

init();