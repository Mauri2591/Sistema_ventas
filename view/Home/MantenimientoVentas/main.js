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
            document.getElementById("nom_prod").innerText = data.nom_prod;
            document.getElementById("precio_prod").value = data.precio_prod;
        }
    });
}

function cantArt(val) {
    let valor = document.getElementById("precio_prod").value;
    total = valor * val;
    totalFinal = total.toFixed(2);
    document.getElementById("precio_venta").value = totalFinal
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


let elementos = [];

function clickBtn(event, position) {
    event.target.parentElement.remove();
    delete elementos[position];
}

function agregar_filas() {
    const addJsonElement = (json) => {
        elementos.push(json);
        return elementos.length - 1;
    }

    let btn_agregar = document.getElementById("insertar_filas");
    let form_agregar_filas = document.getElementById("form_agregar_filas");

    let htmlTemplate = (data, position) => {
        console.log(data);
        return (`
        <p name="nueva_fila_agregar" disabled id="nueva_fila_agregar">${data}</p>
        <button type="button" class="btn_quitar_venta" onClick="clickBtn(event,${position})" id="btn_quitar_venta">x
        </button>
        `);
    }
    btn_agregar.addEventListener("click", () => {
        let container_fila_ventas = document.getElementById("cont");
        if (form_agregar_filas.nom_prod.value != '' || form_agregar_filas.precio_prod.value != '' ||
            form_agregar_filas.precio_venta.value != '' || form_agregar_filas.id_vendedor_valor.value != '' ||
            form_agregar_filas.id_cobrador_valor.value != '') {

            let client_id = document.getElementById("client_id").value;
            let id_prod = document.getElementById("id_prod").value;
            let id_vendedor = document.getElementById("id_vendedor").value;
            let id_cobrador = document.getElementById("id_cobrador").value;


            let index = addJsonElement({
                precio_venta: form_agregar_filas.precio_venta.value,
                client_id: client_id,
                id_prod: id_prod,
                id_vendedor: id_vendedor,
                id_cobrador: id_cobrador
            });
            console.log(index);

            let div = document.createElement("div");
            div.classList.add("container_tabla_2");

            div.innerHTML = htmlTemplate(`${form_agregar_filas.nom_prod.value}  
            ${form_agregar_filas.precio_prod.value}  ${form_agregar_filas.precio_venta.value}  
            ${form_agregar_filas.id_vendedor_valor.value}  ${form_agregar_filas.id_cobrador_valor.value}`, index);

            container_fila_ventas.prepend(div);

            form_agregar_filas.reset();
        } else {
            alert("campos vacíos");
        }
    });

    let btn_generar_venta = document.getElementById("btn_generar_venta");
    btn_generar_venta.addEventListener('click', function (e) {
        e.preventDefault();



        const jsonDiv = document.getElementById("jsonDiv");
        jsonDiv.innerHTML = `${JSON.stringify(elementos)}`;

        elementos = elementos.filter(elem => elem != null);

        let form = document.getElementById("form_agregar_filas");
        let formData = new FormData(form);
        $.ajax({
            url: "../../../controller/ventas.php?op=nueva_venta",
            type: "post",
            data: index,
            contentType: false,
            processData: false,
            success: function (response) {
                console.log(response);
            }
        });
        container_fila_ventas.innerHTML = '';
        elementos = [];
    });
}
agregar_filas();



init();