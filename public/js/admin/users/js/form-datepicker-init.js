"use strict";
$(document).ready(function() {    

    /* -----  Form - Datepicker ----- */

    $('#xp-default-date').datepicker({
	    language: 'ru',
		dateFormat: 'dd.mm.yyyy',
		todayHighlight: true
	})

    $('#xp-autoclose-date').datepicker({
	    language: 'ru',
	    autoClose: true,
		dateFormat: 'dd/mm/yyyy',
		todayBtn: 'linked'
	})

    $('#xp-month-view-date').datepicker({
	    language: 'ru',
	    minView: 'months',
	    view: 'months',	    
		dateFormat: 'MM yyyy',
		todayBtn: 'linked'
	})

    $('#xp-time-format').datepicker({
    	language: 'ru',	    
	    timeFormat: 'hh:ii aa',
	    timepicker: true,
		dateTimeSeparator: ' - ',
		todayBtn: 'linked'
	})

    $('#xp-multi-date').datepicker({
	    language: 'ru',
	    dateFormat: 'dd/mm/yyyy',
		multipleDates: 3,
		todayBtn: 'linked'
	})

    $('#xp-range-date').datepicker({
	    language: 'ru',
	    dateFormat: 'dd/mm/yyyy',
	    range: true,
		multipleDatesSeparator: ' - ',
		todayBtn: 'linked'
	})

    $('#xp-min-max-date').datepicker({
	    language: 'ru',
	    dateFormat: 'dd/mm/yyyy',
	    minDate: new Date(),
		position: 'top left',
		todayBtn: 'linked'
	});

    var disabledDays = [0, 6];
	$('#xp-disable-day-date').datepicker({
	    language: 'ru',
	    dateFormat: 'dd/mm/yyyy',
	    position: 'top left',
	    onRenderCell: function (date, cellType) {
	        if (cellType == 'day') {
	            var day = date.getDay(),
	                isDisabled = disabledDays.indexOf(day) != -1;

	            return {
	                disabled: isDisabled
	            }
	        }
	    }
	})	


});