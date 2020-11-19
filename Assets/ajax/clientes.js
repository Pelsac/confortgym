$(document).ready(function(){


    var ruta =  $("#ruta").val()
console.log('jquey cargado');

 function listarClientes(){
    $.ajax({
        async:true,
        type:"GET",
        data:"",
        url:ruta+"WbClientes/getClientes",
        success:function(res){
         
            var template=``;
            clientes = JSON.parse(res);
           
           clientes.forEach(cli => {
               template+=`
               <tr cli_id='${cli.id}'>
               <td>${cli.id} </td>
               <td> ${cli.nombres} </td>
               <td>${cli.apellidos} </td>
               <td>${cli.fecha_nacimiento} </td>
               <td >${cli.edad}</td>
               <td class='hora' >${cli.genero}</td>
               <td class='hora' >${cli.cod_ingreso}</td>
               <td class='hora' >${cli.en_rutina}</td>
               <td class='hora' >${cli.cod_usuario}</td>
               <td>
               <button class='cli-editar btn btn-primary'> <i class="fas fa-edit"></i></button>
               <button class='cli-eliminar btn btn-danger'><i class="fas fa-trash"></i></button>
               
               </td>
               </tr>
               `;
           });
           $('#clientes').html(template);
           
       
       
      }
    });
    
 }


    $(document).on('click','.cli-eliminar',function(){
       const elemento = $(this)[0].parentElement.parentElement;
       var id= $(elemento).attr('cli_id');
     
       alertify.confirm('Eliminar cliente', '¿seguro que desea eliminar la informacion', function(){ 
           $.post(ruta+'clientes/eliminar',{id},function(){
            listarClientes();

           })
        alertify.success('Ok') }
       , function(){ alertify.error('Cancel')});

    })
 
    $(document).on('click','.cli-editar',function(){
        const elemento = $(this)[0].parentElement.parentElement;
        var id= $(elemento).attr('cli_id');
        console.log(id);

        location.href=ruta+"clientes/editar/"+id;
    })

    setInterval(listarClientes,1000)
})