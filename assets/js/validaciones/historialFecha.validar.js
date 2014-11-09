$(function(){
	console.log( 'validado...' );

	$('#form_seleccion_fecha').bootstrapValidator({
		message: 'Este campo no es válido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },

        fields: 
        {
            fechaInicial: {
                validators: {
                    notEmpty: {
                        message: 'La fecha inicial no puede estar vacia.'
                    },
                    date: {
                        format: 'YYYY-MM-DD',
                        message: 'Este no es valor válido para la fecha Inicial'
                    },
                    callback: {
                        message: 'La fecha inicial no puede ser superior a la fecha final',
                        callback: function(value, validator) {
                            var fechaInicial = new moment(value, 'YYYY-MM-DD', true);
                            var fecha= $('#fechaFinal').val();
                            var fechaFinal  = new moment(fecha, 'YYYY-MM-DD', true);
                            if (!fechaInicial.isValid()) {
                                return false;
                            }
                            //return fechaInicial.diff(fechaFinal)<=0;
                            return true;
                        }
                    }
                }
            },
            fechaFinal: {
                validators: {
                    notEmpty: {
                        message: 'La fecha final no puede estar vacia.'
                    },
                    date: {
                        format: 'YYYY-MM-DD',
                        message: 'Este no es valor válido para la fecha Final'
                    },
                    callback: {
                        message: 'La fecha final no puede ser inferior a la fecha inicial',
                        callback: function(value, validator) {
                            var fechaFinal = new moment(value, 'YYYY-MM-DD', true);
                            var fecha = $('#fechaInicial').val();
                            var fechaInicial =new moment(fecha, 'YYYY-MM-DD', true) 
                            if (!fechaFinal.isValid()) {
                                return false;
                            }
                            //return fechaInicial.diff(fechaFinal)>=0;
                            return true;
                        }
                    }
                }
            },

        }

	});//end bootstrapValidator.
});