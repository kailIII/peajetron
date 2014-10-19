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
                    }
                }
            },

        }

	});//end bootstrapValidator.
});