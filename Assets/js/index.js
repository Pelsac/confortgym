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
        url:ruta+"wbhome/getRutinas",
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
            
        });
        $('#list-rut').html(template);
     
        }
    })

   }  

  
  function programarrutina(){  



$("#form-sesion").submit(function(e){
    var fecha= $("#fecha").val()
        var datos=fecha.split('T',2)
       var fecha2 = new Date(datos[0]);
        var fecha3= new Date()
        e.preventDefault();
       if(fecha2<=fecha3){
        
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
     
    
      $.post(ruta+"wbhome/programarRutina",postdata,function(res){
         $("#form-sesion").trigger('reset');
        $('#modal-lg').modal('toggle');
        console.log(res);
      //  location.href = ruta+"home";
       
      });
      
      
       }
       alertify.success('Rutina Programada con exito!')
       
    })
  }
  
  function listarSesiones(){
     var id_user = $('#id_user').val();

    $.ajax({
        url:ruta+"wbhome/getsesiones",
        type:'POST',
        data:{id_user},
        success:function(res){
       
        var sesiones = JSON.parse(res);
        let template='';  
   
        var i=1;
      
        var options = {weekday: "long", year: "numeric", month: "long", day: "numeric"};
        sesiones.forEach(se => {
            var f = new Date(se.fecha).toLocaleDateString('es-ES',options);
            template +=`
                 <tr se_id='${se.id_sesion}'>
                
                 <td>sesion ${se.id_sesion} </td>
                 <td>${se.estado} </td>
                 <td>${f}</td>
                 <td><button class='sesion-eliminar btn btn-outline-danger'> cancelar </button></td>
                 </tr>
            `;
            i++;
        });
        $('#list-sesion').html(template);
     
        }
    })
  }
 
  function listarProductos(){
    $.ajax({
        url:ruta+"wbhome/getProductos",
        type:'GET',
        success:function(res){
            
            var productos = JSON.parse(res);
            let template=''; 
            console.log(productos);
            productos.forEach(pro=>{
                template+=`
                <div class='col-md-3'>
                <div class='card'>
                    <div class='card-body pb-0'>
                    <img class="grande" src="..${pro.imagen}">
                    <p class="mt-3">${pro.nombre}<p>   
                    </div>
                    <div class="card-footer mt-0">
                    <span> precio: ${pro.precio}  u</span>
                    </div>
                </div>
            </div>
                `;
            });
            $('#productos').html(template);
        }
    })
  }
   
  $(document).on('click','.sesion-eliminar',function(){
     let elemento = $(this)[0].parentElement.parentElement;
  
    var id= $(elemento).attr('se_id');
    console.log(id);
    $.post(ruta+'wbhome/cancelarsesion',{id},function(res){
        listarSesiones();
        alertify.success('Rutina ha sido cancelada con exito!')
    })

  })
  listarSesiones()
  programarrutina();
   listarRutinas();
   listarProductos();


});