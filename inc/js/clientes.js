window.onload = function () {
    listadoclientes();
    //ListarClientes();
}



function AdicionarCliente()
{
    var idcliente = $("#idcliente").val();
    var nombrecliente = $("#nombrecliente").val();
    var apellidocliente = $("#apellidocliente").val();
    var fotocliente = $("#fotocliente").val();
    var direccioncliente = $("#direccioncliente").val();
    var ciudadcliente = $("#ciudadcliente").val();
    var telefonocliente = $("#telefonocliente").val();

    //  $("#respuesta").html("<img src="loader.gif" /> Por favor espera un momento");
    var data = {
        accion: "Adicionar",
        idcliente: idcliente,
        nombrecliente: nombrecliente,
        apellidocliente: apellidocliente,
        fotocliente: fotocliente,
        direccioncliente: direccioncliente,
        ciudadcliente: ciudadcliente,
        telefonocliente: telefonocliente,

    };
    console.log("Data enviar : " + data);
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "controles/cliente.php",
        data: data,
        success: function (resp) {
            Limpiar();
            if (idcliente === "") {
                $('#tablaclientes').DataTable().ajax.reload();
                swal("Cliente Registrado correctamente", "", "success");
            } else {
                $('#tablaclientes').DataTable().ajax.reload();
                swal("Cliente Actualizado correctamente", "", "success");
            }

        }
    });
}



function  listadoclientes()
{

    $("#tablaclientes").DataTable({

        "ajax": {
            "url": "controles/cliente.php",
            dataSrc: ''
        },
        columnDefs: [{
                "targets": 0,
                "data": 'Foto',
                "render": function (data, type, row, meta) {
                    return '<img src="' + data + '" alt="' + data + '"height="64" width="64"/>';
                }
            }
        ],
        "columns": [
            {"data": "Foto"},
            {"data": "Nombre"},
            {"data": "Apellido"},
            {"data": "Direccion"},
            {"data": "Ciudad"},
            {"data": "Telefono"},
            {
                data: null,
                render: function (data, type, row) {
                    return '<button data-id=' + row.Id + ' onclick="BuscarCliente()" class="btn btn-edit btn-success">Editar</button>';
                }
            }, {
                data: null,
                render: function (data, type, row) {
                    return '<button data-id=' + row.Id + '  onclick="EliminarCliente()" class="bn btn-del btn-danger">Eliminar</button>';
                }
            }
        ], language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
        }, retrieve: true,
        paging: false
    });

}


function BuscarCliente()
{


    $(document).on("click", ".btn-edit", function () {
        idcliente = $(this).data("id");
        console.log(idcliente);

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "controles/cliente.php",
            data: {
                accion: 'BuscarC',
                idcliente: idcliente,
            },
            success: function (resp) {
                console.log(resp);
                console.log('Respuestas');

                $("#nombrecliente").val(resp[0]['Nombre']);
                $("#apellidocliente").val(resp[0]['Apellido']);
                $("#fotocliente").val(resp[0]['Foto']);
                $("#direccioncliente").val(resp[0]['Direccion']);
                $("#ciudadcliente").val(resp[0]['Ciudad']);
                $("#telefonocliente").val(resp[0]['Telefono']);
                $("#idcliente").val(resp[0]['Id']);
            }
        });



    });
}

function EliminarCliente()
{

    $(document).on("click", ".btn-del", function () {
        idclientedel = $(this).data("id");
        //console.log(idcliente);
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "controles/cliente.php",
            data: {
                accion: 'EliminarC',
                idclientedel: idclientedel,
            },
            success: function (resp) {
                listadoclientes();
                //alert('Cliente Eliminado');
                $('#tablaclientes').DataTable().ajax.reload();
                swal("Cliente eliminado", "", "success");
            }
        });
    });

    /* $(".btn-del").click(function () {
     
     idclientedel = $(this).data("id");
     
     $.ajax({
     type: "POST",
     dataType: "json",
     url: "controles/cliente.php",
     data: {
     accion: 'EliminarC',
     idclientedel: idclientedel,
     },
     success: function (resp) {
     listadoclientes();
     alert('Cliente Eliminado');
     
     }
     });
     });*/

}


function Limpiar()
{
    $("#idcliente").val("");
    $("#nombrecliente").val("");
    $("#apellidocliente").val("");
    $("#fotocliente").val("");
    $("#direccioncliente").val("");
    $("#ciudadcliente").val("");
    $("#telefonocliente").val("");
}