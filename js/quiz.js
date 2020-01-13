function loadFunctions() {
	document.getElementById("quizForm").onsubmit = function() {
		var allowSubmit = false ;
		if(document.getElementById("submit").value === "Calculate") {
			createHiddenPanel() ;
		}
		return false ;
	}	
	
	function getTotal() {
		var input = document.getElementsByTagName("input") ;
		var total = 0 ;
		for(var i = 0 ; i < input.length ; i ++) {
			if(input[i].checked == 1) {
				total += parseInt(input[i].value) ;	
			}
		}
		return total  ;
	}
	function getQ() {
		var input = document.getElementsByTagName("input") ;
		var total = 0 ;
		for(var i = 0 ; i < input.length ; i ++) {
			if(input[i].checked) {
				total ++ ;
			}
		}
		return total  ;
	
	}
	function post(){
	var total = getTotal();
	
	$.post('validate.php', {total:total},
	function(data)
	{
		$('#result').html(data)
	})  ;
	}
	function createHiddenPanel() {
		clear() ; //clear message
		var total = getTotal() ;
		var message = "" ;
		var messageAfter = "";
		//CREATE ELEMENTS FOR PANEL
		var p = document.createElement("p") ;
		//HEADING
		var h4 = document.createElement("h4") ;
		var h4Text = document.createTextNode("Your Result") ;
		h4.appendChild(h4Text) ;
		document.getElementById("hiddenPanel").appendChild(h4) ;
		//PARAGRAPH
		
		message = document.createTextNode(total) ;
		text = document.createTextNode(" / ") ;
		input = document.createTextNode(getQ()) ;
		p.appendChild(message) ;
		p.appendChild(text) ;
		p.appendChild(input) ;
		document.getElementById("hiddenPanel").appendChild(p) ;	
		document.getElementById("hiddenPanel").style.display = "inline";
	}
	
	//CLEAR RESULT
	function clear() {
		var hidden = document.getElementById("hiddenPanel") ;
		while(hidden.hasChildNodes()) {
			hidden.removeChild(hidden.firstChild) ;	
		}
	}
}
window.onload = loadFunctions ;
