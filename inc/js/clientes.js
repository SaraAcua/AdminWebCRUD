//window.onload = function () {
    
//}


$(document).ready(function(){
    listadoclientes();  
});


function AdicionarCliente()
{
    var nombrecliente = $("#nombrecliente").val();
    var apellidocliente = $("#apellidocliente").val();
    var fotocliente = $("#fotocliente").val();
    var direccioncliente = $("#direccioncliente").val();
    var ciudadcliente = $("#ciudadcliente").val();
    var telefonocliente = $("#telefonocliente").val();

  //  $("#respuesta").html("<img src="loader.gif" /> Por favor espera un momento");
    $.ajax({
        type: "POST",
        dataType: "html",
        url: "controles/cliente.php",
        data:{
            accion:"Adicionar",
            nombrecliente:nombrecliente,
            apellidocliente:apellidocliente,
            fotocliente:fotocliente,
            direccioncliente:direccioncliente,
            ciudadcliente:ciudadcliente,
            telefonocliente:telefonocliente,
                    
        },      
        success: function(resp){
           //$("#respuesta").html(resp);
            Limpiar();
         
        }
    });
} 


function  listadoclientes()
{  
    $("#tablaclientes").load("controles/cliente.php");  
 
}


function Limpiar()
{
    $("#nombrecliente").val("");
    $("#apellidocliente").val("");
    $("#fotocliente").val("");
    $("#direccioncliente").val("");
    $("#ciudadcliente").val("");
    $("#telefonocliente").val("");
}