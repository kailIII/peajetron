/**
 * Utilidad que se encarga de cargar le fecha actual del sistema
 * y mostrarla en le menú.
 * 
 * @author: Cristian Camilo Chaparro 
 */

$(function(){
	setInterval(function() {
		var strcount
		var x = new Date()
		var x1=x.getMonth() + "/" + x.getDate() + "/" + x.getYear(); 
		x1 = x1 + " - " +  x.getHours( )+ ":" +  x.getMinutes() + ":" +  x.getSeconds()
	    $('.Timer').text(x1);
}, 1000);
});
