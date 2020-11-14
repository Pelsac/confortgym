$(document).ready(function(){
    var ruta =  $("#ruta").val()
    function listarSesiones(){
        var id_user = $('#id_user').val();
   
       $.ajax({
           url:ruta+"WbHome/getsesiones",
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
                    <td class='fecha' fecha='${f}'>${f}</td>
                    <td class='hora' hola='${se.hora_ingreso}'>${se.hora_ingreso}</td>
                    <td><button class='sesion-eliminar btn btn-outline-danger'> cancelar </button></td>
                    </tr>
               `;
               i++;
           });
           $('#list-sesion').html(template);
        
           }
       })
     }

       
  $(document).on('click','.sesion-eliminar',function(){
    let elemento = $(this)[0].parentElement.parentElement;
 console.log(elemento);
    var id= $(elemento).attr('se_id');
    var asiste=0;
    var fecha =$('.fecha')[0]
    var f = $(fecha).attr('fecha');
    var hora =$('.hora')[0]
    var h = $(hora).attr('hora');
 $.post(ruta+'WbHome/cancelarsesion',{id,asiste,f,h},function(res){
       console.log(res);
       listarSesiones();
       alertify.success('Rutina ha sido cancelada con exito!')
   })

 })

 listarSesiones();

});