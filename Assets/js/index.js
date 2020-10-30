$(document).ready(function(){
var ruta =  $("#ruta").val()

console.log("hola "+ruta);
   function obtenerRutinas(){
    $.ajax({
        url:ruta+"wbhome/getRutinas",
        type:'GET',
        success:function(res){
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
        console.log(rutinas);
        }
    })
   }

   obtenerRutinas();




});