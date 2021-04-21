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
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "controles/cliente.php",
        data:{
            accion:"Adicionar",
            idcliente:idcliente,
            nombrecliente:nombrecliente,
            apellidocliente:apellidocliente,
            fotocliente:fotocliente,
            direccioncliente:direccioncliente,
            ciudadcliente:ciudadcliente,
            telefonocliente:telefonocliente,
                    
        },      
        success: function(resp){
           // $("#respuesta").html(resp);
          Limpiar();
         
        }
    });
}   



function  listadoclientes()
{
    $("#tablaclientes").DataTable({

        "ajax":{
            "url":"controles/cliente.php",
            "dataSrc":""
        },
        
        "columns":[
            {"render": function () {
                return "<img class='borrar' src='https://noverbal.es/uploads/blog/rostro-de-un-criminal.jpg' width=50 style='cursor:pointer' />"
              }},
            {"data":"nombre"},
            {"data":"apellido"},
            {"data":"foto"},
            
            {"render": function () {
                return "<button data-id="+"id"+"onclick='BuscarCliente()'  type='button' class='btn btn-edit btn-success btn-sm'>Editar</button>"
              }},
            {"defaultContent": "<button data-id="+"id"+"onclick='EditarCliente()'  type='button' class='btn btn-edit btn-success btn-sm'>Editar</button>"},
        
        ]
    });
    
    }
    

function BuscarCliente()
{
    $(".btn-edit").click(function(){
        
        idcliente = $(this).data("id");
        //console.log(idcliente);
     
        $.ajax({
            type: "POST",
            dataType: "json",
            url:"controles/cliente.php",
            data:{
                accion:'BuscarC',
                idcliente:idcliente,
            },      
            success: function(resp){
            console.log(resp);
            console.log('Respuestas');

             $("#nombrecliente").val(resp[0]['nombre']);
             $("#apellidocliente").val(resp[0]['apellido']);
             $("#fotocliente").val(resp[0]['foto']);
             $("#direccioncliente").val(resp[0]['direccion']);
             $("#ciudadcliente").val(resp[0]['ciudad']);
             $("#telefonocliente").val(resp[0]['telefono']);
             $("#idcliente").val(resp[0]['id']);

            }
        });


     
    });

}   

function EliminarCliente()
{
    $(".btn-del").click(function(){
        
        idclientedel = $(this).data("id");
        //console.log(idcliente);
     
        $.ajax({
            type: "POST",
            dataType: "json",
            url:"controles/cliente.php",
            data:{
                accion:'EliminarC',
                idclientedel:idclientedel,
            },      
            success: function(resp){
                listadoclientes();  
                alert('Cliente Eliminado');

            }
        });


     
    });

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