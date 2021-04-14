window.onload = function () {
    
   
}



function AdicionarProductos()
{
    var descripcionproducto = $("#descripcionproducto").val();
    var fotoproducto = $("#fotoproducto").val();
    var categoriaproductos = $("#categoriaproductos").val();
    

  //  $("#respuesta").html("<img src="loader.gif" /> Por favor espera un momento");
    $.ajax({
        type: "POST",
        dataType: "text/plain",
        url: "controles/producto.php",
        data:{
            accion:"Adicionar",
            descripcionproducto:descripcionproducto,
            fotoproducto:fotoproducto,
            categoriaproductos:categoriaproductos,     
        },      
        success: function(resp){
            swal("Producto guardado sastifactoriamente", "", "success");
            Limpiar();
        },error:function(resp){
            swal("Error al registrar producto", "", "error");
            console.log("error : " +resp);
        }
    });
}   



function Limpiar()
{
    $("#descripcionproducto").val("");
    $("#fotoproducto").val("");
    $("#categoriaproductos").val("");
   
}