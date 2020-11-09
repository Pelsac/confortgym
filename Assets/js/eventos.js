$(document).ready(function () {
    var ruta =  $("#ruta").val()
   
    /* initialize the external events
     -----------------------------------------------------------------*/
        
    var sesion=   $.ajax({
            async:false,
            type:"GET",
            
            url:ruta+"wbhome/obtenerSesiones",
            success:function(res){
             
           
             return res;
            }
        }
            )
    
   var evento =JSON.parse(sesion.responseText);

    
    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
    var Calendar = FullCalendar.Calendar;
    var calendarEl = document.getElementById('calendar');
    var newEvento=[];
    // initialize the external events
    // -----------------------------------------------------------------
    evento.forEach(eve=>{
       var  fecha1 = eve.fecha.split(" ")
      if(eve.activo == 1){
        newEvento.push({
          title          : 'Rutina de ejercicio',
          start          : fecha1[0],
          end            : fecha1[0],
          backgroundColor: '#28a745', //yellow
          borderColor    : '#28a745' //yellow
        })
      }else{
        newEvento.push({
          title          : 'Rutina de ejercicio',
          start          : fecha1[0],
          end            : fecha1[0],
          backgroundColor: '#f39c12', //yellow
          borderColor    : '#f39c12' //yellow
        })
      }
     
    })
    
    var calendar = new Calendar(calendarEl, {
        height:"auto",
      plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
        
      },
      'themeSystem': 'bootstrap',
      //Random default events
      events    : newEvento
      ,
     
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function(info) {
        // is the "remove after drop" checkbox checked?
        if (checkbox.checked) {
          // if so, remove the element from the "Draggable Events" list
          info.draggedEl.parentNode.removeChild(info.draggedEl);
        }
      }    
    });
    calendar.render()
    calendar.setOption('locale', 'es');
    calendar.setOption('height', "100%");
    calendar.setOption('contentHeight', 150);
    calendar.setOption('aspectRatio', 2.3);
    })
 