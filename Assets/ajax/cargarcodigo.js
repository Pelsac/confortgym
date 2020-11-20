$(document).ready(function(){
    var mensaje = $('#message');
    var ruta =  $("#ruta").val();
  
    $('#cargar').click(function(){
      console.log('hola');
      var tiempo = setInterval(function(){
        $.get(ruta+'WBIngresos/codigo',function(res){
          
            var result = JSON.parse(res);
            if(result.estatus == "0"){
              console.log(result.estatus);
              $('#codigo').val(" ");
              mensaje.css('color','#fd7e14');
              console.log('hola');
             
              mensaje.html('Esperando codigo de ingreso...');
             
            }
          else{
              mensaje.css('color','#007bff;');
              mensaje.html('Exito el codigo se cargo correctamente');
              $('#codigo').val(result.estatus);
             clearInterval(tiempo);
            }
       })
       
     },1000)
  
})
    
})