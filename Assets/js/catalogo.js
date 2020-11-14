$(document).ready(function(){
    var ruta =  $("#ruta").val()

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
      listarProductos();    

})


