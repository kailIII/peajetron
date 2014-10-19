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
                            var m = new moment(value, 'YYYY-MM-DD', true);
                            var fechaFinal = $('#fechaFinal').val();
                            if (!m.isValid()) {
                                return false;
                            }
                            //return m.isBefore(fechaFinal) || m.isSame(fechaFinal) ;
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
                            var m = new moment(value, 'YYYY-MM-DD', true);
                            var fechaInicial = $('#fechaInicial').val();
                            var f =new moment(fechaInicial, 'YYYY-MM-DD', true) 
                            if (!m.isValid()) {
                                return false;
                            }
                            //return m.isAfter(fechaInicial) || m.isSame(fechaInicial) ;
                            return true;
                        }
                    }
                }
            },

        }

	});//end bootstrapValidator.
});