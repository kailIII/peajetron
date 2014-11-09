$(function(){
	console.log( 'validado...' );

	$('#from_actualizar').bootstrapValidator({
		message: 'Este campo no es válido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },

        fields: 
        {
            telefono: 
            {
                message: 'Este no es un teléfono de celular valido',
                validators: 
                {
                    notEmpty: {
                        message: 'El teléfono celular no puede estar vacio.'
                    },
                    stringLength: {
                        min: 10,
                        max: 10,
                        message: 'El teléfono de celular debe tener 10 dígitos'
                    },
                    regexp: {
                        regexp: /^3[\d]{9}$/i,
                        message: 'Este no es  un número de celular válido'
                    }
                }
            },
            correo: 
            {
                validators: 
                {
                    notEmpty: {
                        message: 'El correo no puede estar vacio'
                    },
                    emailAddress: {
                        message: 'Este no es correo válido'
                    }
                }
            }
        }

	});//end bootstrapValidator.
});