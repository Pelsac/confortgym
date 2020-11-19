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
          
           if(Array.isArray(notifica)){
            
            notifica.forEach(noti => {
              template+=`
              
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> <p>${noti.mensaje}</p>
              <span class="float-right text-muted text-sm"></span>
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
           
    
   }

function alerta(){
  $.ajax({
    async:true,
    type:"GET",
    data:"",
    url:ruta+"WBIngresos/obteneringresos",
    success:function(res){
     var ingreso = JSON.parse(res);
     console.log(ingreso);
     if(ingreso.num >=localStorage.getItem('limite')){
       alert('!Se ha llegado al limite de personas dentro del gimnasio!')
     }
     $('#limite').html("Limite de personas: "+localStorage.getItem('limite'))
    }})

}

$('#agrega').click(function(){
localStorage.setItem('limite',$('#ingresos').val())
console.log(localStorage.getItem('limite'));

})
 
alerta();
   push()
   setInterval(push,1000);
   
   
});

