$(document).ready(function(){
    var ruta=$('#ruta_url').val();
    function push(){
     var mensaje="";
     $.ajax({
       async:true,
       type:"POST",
       data:"",
       url:ruta+"wbNotificacion/getNotificacion",
       success:function(res){
           let template=``;
           console.log(res);
           var notifica = JSON.parse(res);
           var numero = Object.keys(notifica).length;           
           notifica.forEach(noti => {
              template+=`
              
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> <p>${noti.mensaje}</p>
              <span class="float-right text-muted text-sm">3 mins</span>
              </a>`
             
            
           });
      $('#notifica1').html(numero);
      $('#notifica2').html(numero);
        $('#panelNotify').html(template);
        
       
      }
            
       
     });
     
   }
  
   
   setInterval(push,1000);
});

