$(document).ready(function(){
var ruta =  $("#ruta").val()


    

var rutina=$('#rutina');
   function listarRutinas(){
    $.ajax({
        url:ruta+"wbhome/getRutinas",
        type:'GET',
        success:function(res){
        console.log(res);
        var rutinas = JSON.parse(res);
        let template='';        
        rutinas.forEach(rut => {
            template +=`
                <div class="card mt-3">
                <div class="card-header bg-primary">
                        ${rut.nombre_rutina}
                </div>
                <div class="card-body">
                        ${rut.descripcion_rutina}           
                </div>
                <div class="card-footer"> 
                <div class="float-right">
                <a href='' class="btn btn-outline-primary">Ver detalles</a>
                </div>
             </div>
            </div>
            `
        });
        $('#list-rut').html(template);
     
        }
    })

   }  
  function programarrutina(){  
$("#form-sesion").submit(function(e){
    var fecha= $("#fecha").val()
         datos=fecha.split('T',2)
     var postdata={
         asistencia:1,
         fecha:fecha,
         hora:datos[1],
         activo:0
         
     }
     e.preventDefault();
     var closable = alertify.alert().setting('closable');
     //grab the dialog instance using its parameter-less constructor then set multiple settings at once.
    
   
     $.post(ruta+"wbhome/programarRutina",postdata,function(res){
        $("#form-sesion").trigger('reset');
   
       $('#modal-lg').modal('toggle');
       console.log(res);
       alertify.alert()
       .setting({
         'label':'Aceptar',
         'message': res + (closable ? ' ' : ' not ')  ,
         'onok': function(){ alertify.success('Excelente');}
       }).show();
     });
    
    })
  }

  programarrutina();
   listarRutinas();



});