function init() {}
var tabla;
// $(document).ready(function () {

//     const guardarArchivo = (contenido, nombre) => {
//         const a = document.createElement("a");
//         const archivo = new Blob([contenido, ], {
//             type: 'text/plain'
//         });
//         const url = URL.createObjectURL(archivo);
//         a.href = url;
//         a.download = nombre;
//         a.click();
//         url.revokeObjectURL(url);
//     }
//     const btnDesc = document.querySelector("#btnDescargar");
//     btnDesc.onclick = () => {
//         guardarArchivo("Culaquier cosa", "archivo.txt");
//     }

//     tabla = $("#table_id").dataTable({
//         "aProcessing": true,
//         "aServerSide": true,
//         dom: 'Bfrtip',
//         "searching": true,
//         lenghtChange: false,
//         colReorder: true,
//         buttons: [
//             'copyHtml5',
//             'excelHtml5',
//             'csvHtml5',
//             'pdfHtml5'
//         ],
//         "ajax": {
//             url: "controller.php?op=logeo_usuario",
//             type: "post",
//             dataType: "json",
//             data: {
//                 usu_id: 1
//             },
//             error: function (e) {
//                 console.log(e.responseText);
//             }
//         },
//         "bDestroy": true,
//         "responsive": true,
//         "bInfo": true,
//         "iDisplayLength": 10, //cantidad de tuplas o filas a mostrar
//         "autoWith": false,
//         "language": {
//             "sProcessing": "Procesando..",
//             "sLengthMenu": "Mostrar _MENU_ registros",
//             "sZeroRecords": "No se encontraron resultados..",
//             "sEmptyTable": "Ningún dato disponible en esta tabla",
//             "sInfo": "Mostrando un total de _TOTAL_ registros",
//             "sInfoEmpty": "Mostrando un total de 0 registros",
//             "sInfoFiltered": "(Filtrado de un total de _MAX_ registros)",
//             "sInfoPostFix": "",
//             "sSearch": "Buscar: ",
//             "sUrl": "",
//             "sInfoThousands": ",",
//             "sLoadingRecords": "Cargando",
//             "oPaginate": {
//                 "sFirst": "Primero",
//                 "sLast": "Ùltimo",
//                 "sNext": "Siguiente",
//                 "sPrevius": "Anterior"
//             },
//             "oAria": {
//                 "sSortAscending": ":Activar para ordenar la columna de manera ascendiente",
//                 "sSortDescending": ":Activar para ordenar la columna de manera descendiente"
//             }
//         }
//     }, );
// });

init();

