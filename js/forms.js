function formhash(form, password) {
    // Create a new element input, this will be our hashed password field. 
    var p = document.createElement("input");
 
    // Add the new element to our form. 
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(password.value);
 
    // Make sure the plaintext password doesn't get sent. 
    password.value = "";
 
    // Finally submit the form. 
    form.submit();
}
 
function regformhash(form, uid, email,fname,lname, password, conf) {
     // Check each field has a value
    if (uid.value == ''         || 
          email.value == ''     || 
          fname.value == '' 	||
          lname.value == '' 	||
          password.value == ''  || 
          conf.value == '') {
 
        alert('You must provide all the requested details. Please try again');
        return false;
    }
    
 	
    // USERNAME
 	var f  = false ;
    regex = /^\w+$/; 
    user = document.getElementById("errorUser") ;
    if(!regex.test(form.username.value)) { 
        user.setAttribute("style","display:inline;");
  		user.setAttribute("aria-invalid","true");
  		user.innerHTML= "<b>ERROR</b> - Usernames may contain only digits, upper and lowercase letters and underscores.";
        document.getElementById("username").style.borderColor = "red";
        form.username.focus(); 
        f = true ;
    } else {
    	document.getElementById("username").style.borderColor = "green";	
    	user.setAttribute("style","display:none;");
    	f = false ;
    }
    
    //EMAIL 
    
    
    //FIRST NAME
 	regex = /^[a-zA-Z]+$/  ;
 	fname = document.getElementById("errorFname") ;
 	if(!regex.test(form.fname.value)) { 
        fname.setAttribute("style","display:inline;");
  		fname.setAttribute("aria-invalid","true");
  		fname.innerHTML= "<b>ERROR</b> - First names may only contain the alphabet(A-Z, a-z).";
        document.getElementById("fname").style.borderColor = "red";
        form.fname.focus(); 
        f = true ;
    } else {
    	document.getElementById("fname").style.borderColor = "green";	
    	fname.setAttribute("style","display:none;");
    	f = false ;
    }
 	//LAST NAME
 	regex = /^[a-zA-Z]+$/  ;
 	lname = document.getElementById("errorLname") ;
 	if(!regex.test(form.lname.value)) { 
        lname.setAttribute("style","display:inline;");
  		lname.setAttribute("aria-invalid","true");
  		lname.innerHTML= "<b>ERROR</b> - Last names may only contain the alphabet(A-Z, a-z).";
        document.getElementById("lname").style.borderColor = "red";
        form.lname.focus(); 
        f = true ;
    } else {
    	document.getElementById("lname").style.borderColor = "green";	
    	lname.setAttribute("style","display:none;");
    }
    //PASSWORD
    pass = document.getElementById("errorPassword") ;
    /*if (password.value.length < 6) {
        pass.setAttribute("style","display:inline;");
  		pass.setAttribute("aria-invalid","true");
  		pass.innerHTML= "<b>ERROR</b> -Passwords must be at least 6 characters long.  Please try again.";
        document.getElementById("password").style.borderColor = "red";
        form.password.focus();
        f = 1 ;
    }*/
 
    // At least one number, one lowercase and one uppercase letter 
    // At least six characters 
 
    var regex = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/; 
    if (!regex.test(password.value)) {
        pass.setAttribute("style","display:inline;");
  		pass.setAttribute("aria-invalid","true");
  		pass.innerHTML= "<b>ERROR</b> - Passwords must contain at least one number, one lowercase and one uppercase letter.  Please try again";
        document.getElementById("password").style.borderColor = "red";
        f = true ;  
    } else {
    	document.getElementById("password").style.borderColor = "green";	
    	pass.setAttribute("style","display:none;");
    }
 
    // Check password and confirmation are the same
    confirm = document.getElementById("errorConfirm") ;
    if (password.value != conf.value) {
        confirm.setAttribute("style","display:inline;");
  		confirm.setAttribute("aria-invalid","true");
  		confirm.innerHTML= "<b>ERROR</b> - Your password and confirmation do not match. Please try again.";
  		document.getElementById("confirmpwd").style.borderColor = "red";
        form.confirmpwd.focus();
        f = true ;
    } else {
    	document.getElementById("confirmpwd").style.borderColor = "green";	
    	confirm.setAttribute("style","display:none;");
 	}
    // Create a new element input, this will be our hashed password field. 
    var p = document.createElement("input");
 
    // Add the new element to our form. 
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(password.value);
 
    // Make sure the plaintext password doesn't get sent. 
    /*password.value = "";
    conf.value = "";*/
 
    // Finally submit the form. 
    if(f == true) {
    	return false ;
    } else {
    	form.submit();
    	return true;
    }
}
function upformhash(form, upload, options, options1 ){
	if(upload.value == '' || options.value == ''
			|| options1.value == '' ) {
		alert('You must provide all the requested details. Please try again.') ;
		return false ;
	}
	form.submit() ;
	return true ;
}
function upassignformhash(form, fileToUpload, description, lesson, course ){
	if(fileToUpload.value == '' || description.value == ''
			|| lesson.value == '' || course.value == '' ) {
		alert('You must provide all the requested details. Please try again.') ;
		return false ;
	}
	form.submit() ;
	return true ;
}
function assignformhash(form, options, options1 ){
	if(options.value == '' || options1.value == '' ) {
		alert('You must provide all the requested details. Please try again.') ;
		return false ;
	}
	form.submit() ;
	return true ;
}
function addformhash(form, question, a1, a2, a3, a4, correct, options, options1 ){
	if(question.value == '' || a1.value == '' || a2.value == '' || a3.value == '' || a4.value == '' || correct.value == '' || options.value == '' || options1.value == '' ) {
		alert('You must provide all the requested details. Please try again.') ;
		return false ;
	}
	form.submit() ;
	return true ;
}
function headerformhash(form, h1, c1, h2, c2) {
	if(h1.value == 0 || c1.value =='' || h2.value == '' || c2.value =='') {
		alert('You must provide all the requested details. Please try again.') ;
		return false ;
	}
	form.submit() ;
	return true ;
}
function reportformhash(form, subject, message, id) {
	if(subject.value == 0 || message.value =='' || id.value == '') {
		alert('You must provide all the requested details. Please try again.') ;
		return false ;
	}
	form.submit() ;
	return true ;
}
function deleteformhash(form, options) {
	if(options.value == '' ) {
		alert('You must provide all the requested details. Please try again.') ;
		return false ;
	}
	form.submit() ;
	return true ;
}
function helpformhash(form, question, answer) {
	if(question.value == ''|| answer.value == '' ) {
		alert('You must provide all the requested details. Please try again.') ;
		return false ;
	}
	form.submit() ;
	return true ;
}
function comformhash(form, comment) {
	if(comment.value == '' ) {
		alert('You must provide all the requested details. Please try again.') ;
		return false ;
	}
	form.submit() ;
	return true ;
}
function postformhash(form, comment) {
	if(title.value == '' || content.value=='') {
		alert('You must provide all the requested details. Please try again.') ;
		return false ;
	}
	form.submit() ;
	return true ;
}
function courseformhash(form, title, file) {
     // Check each field has a value
    if (title.value == '' || file.value == '') {
        alert('You must provide all the requested details. Please try again');
        return false;
    }
    
    regex = /^[a-zA-Z_ ]+$/  ;
 	title = document.getElementById("errorCourseTitle") ;
 	if(!regex.test(form.title.value)) { 
        title.setAttribute("style","display:inline;");
  		title.setAttribute("aria-invalid","true");
  		title.innerHTML= "<b>ERROR</b> - .";
        form.title.focus(); 
        return false ;
    } else {
    	title.setAttribute("style","display:none;");
    }
    regex = /^[a-zA-Z_ ]+$/  ;
 	file = document.getElementById("errorFile") ;
 	if(!regex.test(form.title.value)) { 
       	file.setAttribute("style","display:inline;");
  		file.setAttribute("aria-invalid","true");
  		file.innerHTML= "<b>ERROR</b> - .";
        file.title.focus(); 
        return false ;
    } else {
    	file.setAttribute("style","display:none;");
    }
    form.submit();
    return true;
}
