$(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (https://fullcalendar.io/docs/event-object)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendar.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------

    new Draggable(containerEl, {
      itemSelector: '.external-event',
      eventData: function(eventEl) {
        console.log("Entro en el evento drag!");
        return {
          title: eventEl.innerText,
          backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
        };
      }
    });

    /*calendarEvents = [
      {
        id_calendar    : 0,
        title          : 'All Day Event',
        start          : new Date("2024/07/20"),
        backgroundColor: '#f56954', //red
        borderColor    : '#f56954', //red
        allDay         : true
      },
      {
        id_calendar    : 0,
        title          : 'Long Event',
        start          : new Date(y, m, d - 5),
        end            : new Date(y, m, d - 2),
        backgroundColor: '#f39c12', //yellow
        borderColor    : '#f39c12' //yellow
      },
      {
        id_calendar    : 0,
        title          : 'Meeting',
        start          : new Date(y, m, d, 10, 30),
        allDay         : false,
        backgroundColor: '#0073b7', //Blue
        borderColor    : '#0073b7' //Blue
      },
      {
        id_calendar    : 0,
        title          : 'Lunch',
        start          : new Date(y, m, d, 12, 0),
        end            : new Date(y, m, d, 14, 0),
        allDay         : false,
        backgroundColor: '#00c0ef', //Info (aqua)
        borderColor    : '#00c0ef' //Info (aqua)
      },
      {
        id_calendar    : 0,
        title          : 'Birthday Party',
        start          : new Date(y, m, d + 1, 19, 0),
        end            : new Date(y, m, d + 1, 22, 30),
        allDay         : false,
        backgroundColor: '#00a65a', //Success (green)
        borderColor    : '#00a65a' //Success (green)
      },
      {
        id_calendar    : 0,
        title          : 'Click for Google',
        start          : new Date(y, 6, d),
        end            : new Date(y, 6, d),
        allDay         : false,
        url            : 'https://www.google.com/',
        backgroundColor: '#3c8dbc', //Primary (light-blue)
        borderColor    : '#3c8dbc' //Primary (light-blue)
      }
    ];*/

    //var calendarEventsToJSON = JSON.stringify(calendarEvents);
    //console.log("calendar events to json " + calendarEventsToJSON);

    //Calendario, configuracion, data, botones, etc.

    var dropDate = "";
    var recieveEventName = "";

    var eventDropID = "";
    var eventDropDate = "";

    var calendarEvents = new Array();

    ShowEvents();
    var calendar = new Calendar(calendarEl, {
      headerToolbar: {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      themeSystem: 'bootstrap',
      //Random default events
      events: calendarEvents /*[
        {
          title          : 'All Day Event',
          start          : new Date(y, m, 1),
          backgroundColor: '#f56954', //red
          borderColor    : '#f56954', //red
          allDay         : true
        },
        {
          title          : 'Long Event',
          start          : new Date(y, m, d - 5),
          end            : new Date(y, m, d - 2),
          backgroundColor: '#f39c12', //yellow
          borderColor    : '#f39c12' //yellow
        },
        {
          title          : 'Meeting',
          start          : new Date(y, m, d, 10, 30),
          allDay         : false,
          backgroundColor: '#0073b7', //Blue
          borderColor    : '#0073b7' //Blue
        },
        {
          title          : 'Lunch',
          start          : new Date(y, m, d, 12, 0),
          end            : new Date(y, m, d, 14, 0),
          allDay         : false,
          backgroundColor: '#00c0ef', //Info (aqua)
          borderColor    : '#00c0ef' //Info (aqua)
        },
        {
          title          : 'Birthday Party',
          start          : new Date(y, m, d + 1, 19, 0),
          end            : new Date(y, m, d + 1, 22, 30),
          allDay         : false,
          backgroundColor: '#00a65a', //Success (green)
          borderColor    : '#00a65a' //Success (green)
        },
        {
          title          : 'Click for Google',
          start          : new Date(y, m, 1),
          end            : new Date(y, m, 10),
          allDay         : false,
          url            : 'https://www.google.com/',
          backgroundColor: '#3c8dbc', //Primary (light-blue)
          borderColor    : '#3c8dbc' //Primary (light-blue)
        }
      ]*/,
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function(info) {
        console.log("Entro al evento drop!" + info.date);
        var formatter = new Intl.DateTimeFormat('en-US', { day: '2-digit', month: '2-digit', year: 'numeric' });
        var formattedDate = formatter.format(info.date);
        console.log("Fecha del evento drop formateada " + formattedDate);

        dropDate = formattedDate;
        
        // is the "remove after drop" checkbox checked?
        /*if (checkbox.checked) {
          // if so, remove the element from the "Draggable Events" list
          console.log("Entro al evento drop 2!");
          info.draggedEl.parentNode.removeChild(info.draggedEl);
        }*/
      },
      eventDrop   : function(info){
        //var infoResources = info.event.getResources();                
        console.log("eventDrop event name " + info.event.title);
        //console.log("eventDrop event id " + infoResources[0]._resource.id);
        console.log("eventDrop event id " + info.event.id);

        const formatter = new Intl.DateTimeFormat('en-US', { day: '2-digit', month: '2-digit', year: 'numeric' });
        var currentPositionDate = formatter.format(info.event.start);

        eventDropDate = currentPositionDate;
        eventDropID = info.event.id;

        console.log("eventDrop current position date " + currentPositionDate);
        
        UpdateTurner();
      },
      eventReceive : function(info){
        recieveEventName = info.event.title;
        //info.event.id = 2;
        console.log("Receive Event name " + info.event.title);
        console.log("Receive Event id " + info.event.event_id);
        CreateTurner();
      },
      eventClick: function(info){
        var idTurner = info.event.id;

        var validateData = new FormData();
        validateData.append("getFullDayState", true);

        $.ajax({
          url:hiddenPath+"ajax/turner_module_ajax.php",
          method: "POST",
          data: validateData,
          cache: false,
          contentType: false,
          processData: false,
          success:(response)=>{
            console.log("Get Full Day State " + response);
          }
        });

        SetEventInFullDay(idTurner);
      }
    });

    calendar.render();
    // $('#calendar').fullCalendar()

    ShowPharmacies();

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    // Color chooser button
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      // Save color
      currColor = $(this).css('color')
      // Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color'    : currColor
      })
    })
    //Crear eventos, cambiar por logica de agregar farmacia
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      // Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      ShowPharmacies();

      // Create events
     var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.text(val)//nombre del evento, es el que se muestra a la derecha
      $('#external-events').prepend(event) //hacer hijo a event de external-events


      // Add draggable funtionality
      //ini_events(event)

      // Remove event from text input
      $('#new-event').val('')
    })
    function CreateTurner(){
        var validateData = new FormData();
        validateData.append("createTurner", true);
        validateData.append("recieveEventName", recieveEventName);
        validateData.append("dropDate", dropDate);
        //cambiar mas adelante
        validateData.append("pharmacy24hs", 1);

        $.ajax({
          url:hiddenPath+"ajax/admin_module_ajax.php",
          method: "POST",
          data: validateData,
          cache: false,
          contentType: false,
          processData: false,
          success:(response)=>{
            console.log("response create turner " + response);
          }
        });

    }

    function UpdateTurner(){
      var validateData = new FormData();
      validateData.append("updateTurner", true);
      validateData.append("eventDropID", eventDropID);
      validateData.append("eventDropDate", eventDropDate);

      $.ajax({
        url:hiddenPath+"ajax/admin_module_ajax.php",
        method: "POST",
        data: validateData,
        cache: false,
        contentType: false,
        processData: false,
        success:(response)=>{
          console.log("response update turner " + response);
        }
      });

    }

    function ShowEvents(){
      var dataEvents = [];
  
      var validateData = new FormData();
      validateData.append("getPharmaciesRegistered",true);
  
      $.ajax({
        url:hiddenPath+"ajax/admin_module_ajax.php",
        method: "POST",
        data: validateData,
        cache: false,
        contentType: false,
        processData: false,
        success:(response)=>{
          console.log("response pharmacies data" + response);
          var parseResponse = JSON.parse(response);
          //var parseResponse = response.data;
  
          for(var i = 0; i < parseResponse.data.length; i++){
  
            calendarEvents.push({
              id: parseResponse.data[i].id,
              title: parseResponse.data[i].title,
              start: parseResponse.data[i].start,
              backgroundColor: parseResponse.data[i].color,
              borderColor: parseResponse.data[i].color,
              allDay: true
            });

            calendar.addEvent(calendarEvents[i]);
          }
          console.log("calendar events " + calendarEvents.length);
        }
      })
    }

    function ShowPharmacies(){
      //Get Pharmacies
      var validateData = new FormData();
      validateData.append("getPharmacies", true);
  
      //var eventData = "";
  
      $.ajax({
        url:hiddenPath+"ajax/admin_module_ajax.php",
        method: "POST",
        data: validateData,
        cache: false,
        contentType: false,
        processData: false,
        success:(response)=>{
          var parsePharmaciesJSON = JSON.parse(response);
          //console.log("Get Pharmacies response " + parsePharmaciesJSON[3].name_pharmacy);
          for(var i = 0; i < parsePharmaciesJSON.length; i++){
            var event = $('<div />');
            event.css({
              'background-color': currColor,
              'border-color'    : currColor,
              'color'           : '#fff'
            }).addClass('external-event')
            event.text(parsePharmaciesJSON[i].name_pharmacy)//nombre del evento, es el que se muestra a la derecha
            $('#external-events').prepend(event) //hacer hijo a event de external-events
  
            ini_events(event);
            // Remove event from text input
            $('#new-event').val('');
          }
        }
    })
  }

  function SetEventInFullDay(idTurner){
    var validateData = new FormData();
    validateData.append("setTurnerFullDay", true);
    validateData.append("idTurnerFullDay", idTurner);
    //validateData.append("idTurnerFullDay", idTurner);

    $.ajax({
      url:hiddenPath+"ajax/turner_module_ajax.php",
      method: "POST",
      data: validateData,
      cache: false,
      contentType: false,
      processData: false,
      success:(response)=>{
        console.log("Set Turner Full Day " + response);
      }
    });
  }
})