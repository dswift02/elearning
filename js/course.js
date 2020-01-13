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
