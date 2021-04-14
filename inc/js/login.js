
/* 
Ajax- Conceptos:
https://www.hostinger.es/tutoriales/que-es-ajax#Ejemplos-practicos-de-AJAX

*/


$(document).ready(function(){
    console.log("documento");
    $("#botoningresar").click(function(){
        console.log("click");
        var username = $("#user").val().trim();
        var password = $("#password").val().trim();
       

        if( username != "" && password != "" ){
            console.log("entro");
            $.ajax({
                url:'controles/validaruser.php',
                type:'post',
               
                data:{
                    username:username,
                    password:password
                  
                },
                success:function(response){
                window.location="index.php";
                
                }
            });
        }
    });
});