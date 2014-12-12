// Function to check/uncheck all check boxes in a form
function checkUncheckAll(selectAllCB) {
	// Get state of unselectAll checkbox
	var checkAll=selectAllCB.unchecked;  
	
	// Get form
	var myForm=selectAllCB.form;
	
	// For each element of the form
	var i=0;
	for (i=0; i<myForm.length; i++) {
		// Local variable
		var element=myForm[i];
		
		// If it's a checkbox
		if (element.type=='checkbox') {
			element.checked=checkAll;
		}
	}
}

// Function to limit a text field
function limitText(limitField, limitNum) {
	if (limitField.value.length > limitNum) {
		limitField.value = limitField.value.substring(0, limitNum);
	}
}

// Function to make sure a text field contains numbers only
function numbersOnly(field) {
	if (isNaN(field.value)) {
		field.value=field.value.substring(0, field.value.length-1);
	}
}

// Function to uncrypt an email address
function UnCryptMailto(s, shift) {
	var n=0; var r="";
	for (var i=0; i<s.length; i++) { 
		n=s.charCodeAt(i); 
		if (n>=8364) {
			n = 128;
		}
		r += String.fromCharCode(n-(shift));
	}
	return r;
}

// Function to write "mailto:email@address"
function linkTo_UnCryptMailto(s, shift)	{
	location.href=UnCryptMailto(s, shift);
}
