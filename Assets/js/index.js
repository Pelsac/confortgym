$(document).ready(function(){
var ruta =  $("#ruta").val()

$('#search').keyup(function(e){
    var search = $('#search').val();
    console.log(search);

    $.ajax({
        url:ruta+'wbhome/buscar',
        type:'POST',
        data:{search},
        success:function(res){
            let rutinas = JSON.parse(res);
            let template ='';

            rutinas.forEach(rut=>{
                template +=`
                <div class="card mt-3">
                <div class="card-header bg-primary text-white">
                        ${rut.nombre_rutina}
                </div>
                <div class="card-body">
                <div class="row">
                <div class="col-md-5">
                <img class="img-fluid" src=".${rut.banner}">             
                </div>
                <div class="col-md-7">
                <p class="myClassName">${rut.descripcion_corta}</p>
               
                <a href='' class="btn btn-outline-primary btn-block">Ver detalles</a>
             
                </div>
                </div>
                </div>
            </div>
            `
            })
            $('#list-rut').html(template);
        }
    })
})

var rutina=$('#rutina');
   function listarRutinas(){
    $.ajax({
        url:ruta+"WbHome/getRutinas",
        type:'GET',
        success:function(res){
      
        var rutinas = JSON.parse(res);
        let template='';        
        rutinas.forEach(rut => {
            template +=`
                <div class="card mt-3">
                <div class="card-header bg-primary text-white">
                        ${rut.nombre_rutina}
                </div>
                <div class="card-body">
                <div class="row" cod="${rut.codigo}">
                <div class="col-md-5">
                <img class="img-fluid" src=".${rut.banner}">  
                   
                </div>
                <div class="col-md-7">
                <p class="myClassName">${rut.descripcion_corta}</p>
               
                <button  class="btn btn-outline-primary btn-block detalles">Ver detalles</button>
             
                </div>
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
        console.log(fecha);
        var datos=fecha.split('T',2)
        console.log("fecha 1: "+datos[0]);
        var fecha2 = new Date(fecha);
        var fecha3= new Date()
        e.preventDefault();
       if(fecha2<=fecha3){
        console.log("fecha ingresada"+fecha2);
        console.log("fecha3 actual"+fecha3);
        alertify.error("¡Error fecha incorrecta!");
         
       }else{

        var postdata={
          asistencia:1,
          fecha:datos[0],
          hora:datos[1],
          activo:0
          
      } 
      var closable = alertify.alert().setting('closable');
      //grab the dialog instance using its parameter-less constructor then set multiple settings at once.   
      $.post(ruta+"WbHome/programarRutina",postdata,function(res){
         $("#form-sesion").trigger('reset');
        $('#modal-lg').modal('toggle');

      location.href = ruta+"home";
       
      });
      alertify.success('Rutina Programada con exito!')
      
       }
      
       
    })
  }
  $(document).on('click','.detalles',function(){
    let elemento = $(this)[0].parentElement.parentElement;
     var id= $(elemento).attr('cod');
    
    
   $.post(ruta+'home/detalles',{id},function(res){
    location.href=ruta+"home/detalles/"+id;
})


        
  })
  function rutinasusuarios(){
    $.ajax({
        async:true,
        url:ruta+"WbHome/obtenerclientes",
        type:'GET',
        success:function(res){
            var clientes = JSON.parse(res);
            let num;   
            
         num= clientes.length;
         
            $('#clientes').html(num);
    }});
}

setInterval(rutinasusuarios,1000);
 
function verificarsesion(){
     const token = $('#token').val();
     $.post(ruta+'WbHome/verificausuario',{token},function(res){
        console.log(res)
    })
}

  programarrutina();
   listarRutinas();
  setInterval(verificarsesion,1000)


});