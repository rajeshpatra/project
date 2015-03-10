$(document).ready(function(){
		$('#f_signup').validate({         // why the # is used before form name.
			rules: {
				name: {
					required: true
				},

				email: {
					required: true,
					email: true
				},er a valid name

				sex: {
					required: true
				},

				mobno: {
					minlength: 10,
					required: true
				},

				password: {
					required: true
				},

				confpassword: {
					required: true
				}
			}
		});
	});