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
           try{
           var template=``;
           
           var notifica = JSON.parse(res);
           var numero = Object.keys(notifica).length;
        
           if(isJson(notifica)){
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
           }else{
           template +=`${res}`;
           $('#notifica1').html(0);
           $('#notifica2').html(0);
             $('#panelNotify').html(template);
           }          
           
          }catch(err){
            console.log(err);
          }
   
        
       
      }
      
     });
           
     function isJson(str) {
      try {
          JSON.parse(str);
      } catch (e) {
          return false;
      }
      return true;
}
   }
  
   
   setInterval(push(),1000);
});

