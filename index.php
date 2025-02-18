<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FullCalendar with Datepicker</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- FullCalendar CSS -->
    <link rel="stylesheet" href="full-calander.css">

    <!-- Air Datepicker CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/css/datepicker.css">
</head>
<body>

<div class="container-fluid">
    <h2 class="mb-3">TimeSheet</h2>
    
    <div class="card">
        <div class="card-body">
            <div id="calendar"></div>
        </div>
    </div>

    <!-- Calendar Event Modal -->
    <div id="modal-view-event" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h4><span class="event-icon"></span> <span class="event-title"></span></h4>
                    <div class="event-body"></div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Event Modal -->
    <div id="modal-view-event-add" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="add-event">
                    <div class="modal-body">
                        <h4>Add Event</h4>
                        <div class="form-group">
                            <label>Event Name</label>
                            <input type="text" class="form-control" name="ename">
                        </div>
                        <div class="form-group">
                            <label>Event Date</label>
                            <input type="text" class="form-control datetimepicker" name="edate">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="edesc"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper.js for Bootstrap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<!-- Moment.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>

<!-- FullCalendar -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>

<!-- Air Datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/js/datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/js/i18n/datepicker.en.js"></script>

<script>
jQuery(document).ready(function(){
  jQuery('.datetimepicker').datepicker({
      timepicker: true,
      language: 'en',
      range: true,
      multipleDates: true,
		  multipleDatesSeparator: " - "
    });
  jQuery("#add-event").submit(function(){
      alert("Submitted");
      var values = {};
      $.each($('#add-event').serializeArray(), function(i, field) {
          values[field.name] = field.value;
      });
      console.log(
        values
      );
  });
});

(function () {    
    'use strict';
    // ------------------------------------------------------- //
    // Calendar
    // ------------------------------------------------------ //
	jQuery(function() {
		// page is ready
		jQuery('#calendar').fullCalendar({
			themeSystem: 'bootstrap4',
			// emphasizes business hours
			businessHours: false,
			defaultView: 'month',
			// event dragging & resizing
			editable: true,
			// header
			header: {
				left: 'title',
				center: 'month,agendaWeek,agendaDay',
				right: 'today prev,next'
			},
			events: [
				{
					title: 'Barber',
					description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
					start: '2019-07-07',
					end: '2019-07-07',
					className: 'fc-bg-default',
					icon : "circle"
				},
				{
					title: 'Flight Paris',
					description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
					start: '2019-08-08T14:00:00',
					end: '2019-08-08T20:00:00',
					className: 'fc-bg-deepskyblue',
					icon : "cog",
					allDay: false
				},
				{
					title: 'Team Meeting',
					description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
					start: '2019-07-10T13:00:00',
					end: '2019-07-10T16:00:00',
					className: 'fc-bg-pinkred',
					icon : "group",
					allDay: false
				},
				{
					title: 'Meeting',
					description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
					start: '2019-08-12',
					className: 'fc-bg-lightgreen',
					icon : "suitcase"
				},
				{
					title: 'Conference',
					description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
					start: '2019-08-13',
					end: '2019-08-15',
					className: 'fc-bg-blue',
					icon : "calendar"
				},
				{
					title: 'Baby Shower',
					description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
					start: '2019-08-13',
					end: '2019-08-14',
					className: 'fc-bg-default',
					icon : "child"
				},
				{
					title: 'Birthday',
					description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
					start: '2019-09-13',
					end: '2019-09-14',
					className: 'fc-bg-default',
					icon : "birthday-cake"
				},
				{
					title: 'Restaurant',
					description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
					start: '2019-10-15T09:30:00',
					end: '2019-10-15T11:45:00',
					className: 'fc-bg-default',
					icon : "glass",
					allDay: false
				},
				{
					title: 'Dinner',
					description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
					start: '2019-11-15T20:00:00',
					end: '2019-11-15T22:30:00',
					className: 'fc-bg-default',
					icon : "cutlery",
					allDay: false
				},
				{
					title: 'Shooting',
					description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
					start: '2019-08-25',
					end: '2019-08-25',
					className: 'fc-bg-blue',
					icon : "camera"
				},
				{
					title: 'Go Space :)',
					description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
					start: '2019-12-27',
					end: '2019-12-27',
					className: 'fc-bg-default',
					icon : "rocket"
				},
				{
					title: 'Dentist',
					description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
					start: '2019-12-29T11:30:00',
					end: '2019-12-29T012:30:00',
					className: 'fc-bg-blue',
					icon : "medkit",
					allDay: false
				}
			],
			eventRender: function(event, element) {
				if(event.icon){
					element.find(".fc-title").prepend("<i class='fa fa-"+event.icon+"'></i>");
				}
			  },
			dayClick: function() {
				jQuery('#modal-view-event-add').modal();
			},
			eventClick: function(event, jsEvent, view) {
			        jQuery('.event-icon').html("<i class='fa fa-"+event.icon+"'></i>");
					jQuery('.event-title').html(event.title);
					jQuery('.event-body').html(event.description);
					jQuery('.eventUrl').attr('href',event.url);
					jQuery('#modal-view-event').modal();
			},
		})
	});
  
})(jQuery);
</script>

</body>
</html>
