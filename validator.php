function validateForm() {

	if(document.f_signup.name.value == ""){
	alert("Please provide your name!");
	document.f_signup.name.focus();
	return false;
	}

	if(document.f_signup.email.value == ""){
	alert("Please provide your email!");
	document.f_signup.email.focus();
	return false;
	}

	if(document.f_signup.sex.value == "0"){
	alert("Please mention your sex!");
	document.f_signup.sex.focus();
	return false;
	}

	if(document.f_signup.mobno.value == ""){
	alert("Please provide your mobile number!");
	document.f_signup.mobono.focus();
	return false;
	}

	if(document.f_signup.password.value == ""){
	alert("Please set a password!");
	document.f_signup.password.focus();
	return false;
	}

	return (true);
}