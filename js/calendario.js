//Calendario para fechas
$(document).ready(function(){
    $("#fecha_inicio").datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
        yearRange: "2018:"+ new Date()
    }).datepicker("setDate", "Today");

    $("#fecha_final").datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
        yearRange: "2018:"+ new Date()
    }).datepicker("setDate", "Today");
	
	$('#hora_inicio').timepicker({
		timeFormat: 'HH:mm:ss',
		interval: 60,
		minTime: '00:00:00',
		maxTime: '23:59:59',
		defaultTime: '00:00:00',
		startTime: '00:00:00',
		dynamic: false,
		dropdown: true,
		scrollbar: true
	});

	$('#hora_final').timepicker({
		timeFormat: 'HH:mm:ss',
		interval: 60,
		minTime: '00:00:00',
		maxTime: '23:59:59',
		defaultTime: '23:59:59',
		startTime: '00:00:00',
		dynamic: false,
		dropdown: true,
		scrollbar: true
	});
});