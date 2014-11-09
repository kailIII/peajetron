/**
 * Archivo para traducir la información que se muestra
 * en el calendario con los datetimepicker.
 * 
 * @author: Cristian Camilo Chaparro.
 */

/*
$.fn.datetimepicker['es'] = 
{
	days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"],
	daysShort: ["Dom", "Lun", "Mar", "Mie", "Jueves", "Vie", "Sáb", "Dom"],
	daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa", "Do"],
	months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
	monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
	today: "Hoy"
};*/


$(function(){
	 $.fn.datetimepicker.dates['en'] = {
			    days: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
			    daysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
			    daysMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa", "Su"],
			    months: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
			    monthsShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
			    };
});
   