import $ from 'jquery'
import 'fullcalendar';
import 'fullcalendar/dist/locale/fr.js'

$(function() {

    // page is now ready, initialize the calendar...

    $('#calendar').fullCalendar({
        // put your options and callbacks here

    	locale: 'fr',
    	firstDay: 1,
		events: '/admin/r-res/get-nb-res'
    })
});
