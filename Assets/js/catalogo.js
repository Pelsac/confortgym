$(document).ready(function(){
    var ruta =  $("#ruta").val()

    function listarProductos(){
        $.ajax({
            url:ruta+"WbHome/getProductos",
            type:'GET',
            success:function(res){
                
                var productos = JSON.parse(res);
                let template=''; 
               
                let template2=``;
                productos.forEach(pro=>{
                    template+=`
                    <div class='col-md-3'>
                    <div class='card' idpro='${pro.codigo}'>
                        <div class='card-body pb-0'>
                        <img class="grande" src="..${pro.imagen}">
                        <p class="mt-3">${pro.nombre}<p>   
                        </div>
                        <div class="card-footer mt-0">
                        <span> precio: ${pro.precio}  COP</span>
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
      
      $(document).on('click','.card',function(){

        $('#modal-lg').modal('show')
        const elemento = $(this)[0];
        var id = $(elemento).attr('idpro');
         var template=``;
          $.post(ruta+"WbHome/getProducto",{id},function(res){
            const producto = JSON.parse(res);
            template=`
            <div class="row">
            <div class="col-md-6">
            <img class="grande" src="..${producto.imagen}">
            </div>
            <div class="col-md-6">
            <span>Nompre del producto${producto.nombre}</span><br>
            <span>Descripcion</span><br>
            <span>${producto.descripcion}</span>
            <br>
            <span>Precio: ${producto.precio} COP</span>
            </div>
            </div>
            `
            $('#listaproductos').html(template)
          })

          
      })

})


