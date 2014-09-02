$(document).ready(function() {

	// Define differently for stime,etime,pubDate because of the error message even though same validation method.

	//Use for startTime. Must follow UTC format and cant be null value. 
	$.validator.addMethod(
      "wovodatDatetime",
	  function (value, element) {       
			
			/* start symbol    =>   /^
			   date YYYY-MM-DD =>  	\d\d\d\d\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])	    
			   space 	       =>   \s
			   Time HH:MM:SS   =>   (\d{2,}):(?:[0-5]\d):(?:[0-5]\d)
			   end symbol      =>    $/
			*/
			return value.match(/^\d\d\d\d\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])\s(\d{2,}):(?:[0-5]\d):(?:[0-5]\d)$/);          
      },
      "*Please enter a date in the format YYYY-MM-DD HH:MM:SS"
    );

	//Use for endTime. Must follow UTC format if there is a value but can be null value.
	$.validator.addMethod(
      "endTime",

	  function (value, element) {
		if(value != "" && value != 'YYYY-MM-DD HH:MM:SS'){
			return value.match(/^\d\d\d\d\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])\s(\d{2,}):(?:[0-5]\d):(?:[0-5]\d)$/);          
		}else{
			return true;
		}
	  },
		"*Please enter a date in the format YYYY-MM-DD HH:MM:SS. If you leave it blank, the system will automatically input  default 9999-12-31 23:59:59"
    );	

	//Use for public Date. Must follow UTC format if there is a value but can be null value.	
	$.validator.addMethod(
      "pubDate",

	  function (value, element) {

		if(value != "" && value != 'YYYY-MM-DD HH:MM:SS'){
			return value.match(/^\d\d\d\d\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])\s(\d{2,}):(?:[0-5]\d):(?:[0-5]\d)$/);          
		}else{
			return true;
		}
	  },
		"*Please enter a date in the format YYYY-MM-DD HH:MM:SS. If you leave it blank, the system will automatically plus 2 years to the start date."
    );	

	//Also Use for pubDate(message is different from above).Must follow UTC format if there is a value but can be null value.	
	$.validator.addMethod(
      "pubDate2",

	  function (value, element) {
		if(value != "" && value != 'YYYY-MM-DD HH:MM:SS'){
			return value.match(/^\d\d\d\d\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])\s(\d{2,}):(?:[0-5]\d):(?:[0-5]\d)$/);          
		}else{
			return true;
		}
	  },
		"*Please enter a date in the format YYYY-MM-DD HH:MM:SS"
    );	

	//Allow to enter Number (OR) Decimal. can be null but  if there is a value, must type either number/Decimal.
	$.validator.addMethod(
      "numberDecimal",

	  function (value, element) {  
		if(value != ""){
			return value.match(/^([-+]?)([0-9]+)(\.([0-9]+))?$/);      
		}else{
			return true; 
		}
	  },
		"*Please enter only number"
    );	


	//Allow to enter only Decimal. can be null but if there is a value, must type only Decimal.
	$.validator.addMethod(
      "decimal",

	  function (value, element) {  
		if(value != ""){
			return value.match(/^[0-9]+(\.[0-9]+)+$/);      
		}else{
			return true; 
		}
	  },
		"*Please enter only decimal"
    );	
	
	//This event will start when clicking on the "back to previous page" button.
	$("#back").click(function() {      
		location.href='../home_populate.php'; 
	});
	


	var formId = $('form').attr('id');
	
	if(formId == 'form_vd_inf'){
		vdInfTable();	
	}else if(formId == 'form_vd'){
		vdTable();
	}else if(formId == 'form_vd_mag'){
		vdMagTable();
	}else if(formId == 'form_vd_tec'){
		vdTecTable();
	}else if(formId == 'form_cc'){
		ccTable();
	}else if(formId == 'form_cb'){
		cbTable();
	}else if(formId == 'form_co'){
		coTable();  
	}else if(formId == 'form_ip_hyd'){
		ipHydTable();
	}else if(formId == 'form_ip_mag'){
		ipMagTable();
	}else if(formId == 'form_ip_pres'){
		ipPresTable();
	}else if(formId == 'form_ip_sat'){
		ipSatTable();
	}else if(formId == 'form_ip_tec'){
		ipTecTable();
	}
	
	
});  


function vdInfTable(){

	//for default values
	$('#vd_inf_stime').defaultValue('YYYY-MM-DD HH:MM::SS'); 
	$('#vd_inf_stime_unc').defaultValue('YYYY-MM-DD HH:MM::SS'); 
	$('#vd_inf_etime').defaultValue('YYYY-MM-DD HH:MM::SS'); 
	$('#vd_inf_etime_unc').defaultValue('YYYY-MM-DD HH:MM::SS'); 
	$('#vd_inf_pubdate').defaultValue('YYYY-MM-DD HH:MM::SS'); 
	
	$("#form_vd_inf").validate({
	
		onkeyup: false,      // Stopping remote validation as you type
		rules: {
			vd_id:{
				required: true
			},
			vd_inf_cavw:{
				required: true,
				remote: {
					url: "../convertie/model/commonInsertForm_m.php?tableName=vd_inf",
					type: "POST",
					data: {
						vd_inf_cavw:function(){
							return $("#vd_inf_cavw").val();
						}
					}  
				}
			},			
			vd_inf_status: {
				required: true
			},
			vd_inf_slat: {
				required: true,
				number: true
			},
			vd_inf_slon: {
				required: true,
				number: true
			},
			vd_inf_selev: {
				required: true,
				number: true
			},
			vd_inf_type: {
				required: true
			},
			vd_inf_rtype: {
				required: true
			},
			vd_inf_stime: {
				wovodatDatetime: true
			},
			vd_inf_etime:{
				endTime: true
			},
			cc_id: {
				required: true
			},
			vd_inf_pubdate:{     
				pubDate: true
			}			
		},			
		messages: {
			vd_id:{
				required: "*Please select volcano list"
			},			
			vd_inf_cavw: {
				required: "*Please provide cavw",
				maxlength: "*The cavw cannot<br/> exceed 15 characters long",
				remote: jQuery.format("*The cavw number you entered does not exist in volcano database. Please update volcano table first")
			},
			vd_inf_status:{
				required: "*Please select volcano info status list"
			},
			vd_inf_slat:{
				required: "*Please type only number"
			},
			vd_inf_slon:{
				required: "*Please type only number"
			},
			vd_inf_selev:{
				required: "*Please type only number"
			},
			vd_inf_type:{
				required: "*Please select volcano type"
			},  
			vd_inf_rtype:{
				required: "*Please select dominant rock type"
			},

			cc_id: {
				required: "*Please select One Institution/Observatory"
			}
			
		},
		// the errorPlacement has to take the table layout into account 
		errorPlacement: function(error, element) { 
			error.appendTo(element.parent().parent());
		},
		
		submitHandler: function(form) {
			if (confirm('Are you sure want to continue?')) {
				form.submit();
			}
		}		
		
	});
	
}	

function vdTable(){

	//for default values
	$('#vd_pubdate').defaultValue('YYYY-MM-DD HH:MM:SS'); 
	
	$("#form_vd").validate({
	
		onkeyup: false,      // Stopping remote validation as you type
		rules: {
			vd_cavw:{
				required: true,
				remote: {
					url: "../convertie/model/commonInsertForm_m.php?tableName=vd",
					type: "POST",
					data: {
						vd_cavw:function(){
							return $("#vd_cavw").val();
						}
					}  
				}
			},	
		//	vd_num: {
		//		numberDecimal: true
		//	},			
			vd_name: {
				required: true
			},
			vd_tzone: {
				numberDecimal: true
			},
			cc_id: {
				required: true
			},
			vd_pubdate:{     
				pubDate2: true
			}			
		},			
		messages: {
			vd_cavw: {
				required: "*Please provide Volcano CAVW",
				maxlength: "*The cavw cannot<br/> exceed 15 characters long",
				remote: jQuery.format("*The cavw number you entered was already in database")
			},
			vd_name:{
				required: "*Please type Volcano Name"
			},
			cc_id: {
				required: "*Please select One Institution/Observatory"
			}
			
		},
		// the errorPlacement has to take the table layout into account 
		errorPlacement: function(error, element) { 
			error.appendTo(element.parent().parent());
		},
		
		submitHandler: function(form) {
			if (confirm('Are you sure want to continue?')) {
				form.submit();
			}
		}		
		
	});
	
}	

function vdMagTable(){

	//for default values
	$('#vd_mag_pubdate').defaultValue('YYYY-MM-DD HH:MM:SS');
	
	$("#form_vd_mag").validate({
	
		onkeyup: false,      // Stopping remote validation as you type
		rules: {
			vd_id: {
				required: true
			},
			vd_mag_lvz_dia: {
				numberDecimal: true
			},
			vd_mag_lvz_vol: {
				numberDecimal: true
			},
			vd_mag_tlvz: {
				numberDecimal: true
			},
			vd_mag_lerup_vol: {
				numberDecimal: true
			},
			vd_mag_minsio2: {
				numberDecimal: true
			},
			vd_mag_maxsio2: {
				numberDecimal: true
			},			
			cc_id: {
				required: true
			},
			vd_mag_pubdate:{     
				pubDate2: true
			}			
		},			
		messages: {
			vd_id:{
				required: "*Please type Volcano Name"
			},
			cc_id: {
				required: "*Please select One Institution/Observatory"
			}
			
		},
		// the errorPlacement has to take the table layout into account 
		errorPlacement: function(error, element) { 
			error.appendTo(element.parent());
		},
		
		submitHandler: function(form) {
			if (confirm('Are you sure want to continue?')) {
				form.submit();
			}
		}		
		
	});
	
}

function vdTecTable(){

	//for default values
	$('#vd_tec_pubdate').defaultValue('YYYY-MM-DD HH:MM:SS');
	
	$("#form_vd_tec").validate({
	
		onkeyup: false,      // Stopping remote validation as you type
		rules: {
			vd_id: {
				required: true
			},
			vd_tec_strslip: {
				numberDecimal: true
			},
			vd_tec_ext: {
				numberDecimal: true
			},
			vd_tec_conv: {
				numberDecimal: true
			},
			vd_tec_travhs: {
				numberDecimal: true
			},
			cc_id: {
				required: true
			},
			vd_tec_pubdate:{     
				pubDate2: true
			}			
		},			
		messages: {
			vd_id:{
				required: "*Please type Volcano Name"
			},
			cc_id: {
				required: "*Please select One Institution/Observatory"
			}
			
		},
		// the errorPlacement has to take the table layout into account 
		errorPlacement: function(error, element) { 
			error.appendTo(element.parent());
		},
		
		submitHandler: function(form) {
			if (confirm('Are you sure want to continue?')) {
				form.submit();
			}
		}		
		
	});
	
}

function ccTable(){


	$("#form_cc").validate({
	
		onkeyup: false,      // Stopping remote validation as you type
		rules: {
			cc_code:{
				required: true,
				remote: {
					url: "../convertie/model/commonInsertForm_m.php?tableName=cc&fieldName=cc_code",
					type: "POST",
					data: {
						cc_code:function(){
							return $("#cc_code").val();
						}
					}  
				}
			},	
			cc_code2:{
				remote: {
					url: "../convertie/model/commonInsertForm_m.php?tableName=cc&fieldName=cc_code2",
					type: "POST",
					data: {
						cc_code2:function(){
							return $("#cc_code2").val();
						}
					}  
				}
			},	
			cc_obs:  "required",
			cc_add1: "required",
			cc_city:  "required",
			cc_state: "required",
			cc_country: "required",
			cc_post: "required",
			cc_url:{     
				required: true,
				url: true
			},
			cc_email:{     
				required: true,
				email:true
			},
			cc_phone: "required"
		},			
		messages: {
			cc_code: {
				required: "*Please provide observatory code",
				maxlength: "*The code cannot<br/> exceed 15 characters long",
				remote: jQuery.format("*The code you entered was already in database")
			},
			cc_code2: {
				maxlength: "*The code cannot<br/> exceed 15 characters long",
				remote: jQuery.format("*The code you entered was already in database")
			},			
			cc_obs:{
				required: "*Please type observatory name"
			},
			cc_add1:{
				required: "*Please type observatory address"
			},
			cc_city:{
				required: "*Please type observatory city"
			},
			cc_state:{
				required: "*Please type observatory state"
			},
			cc_country:{
				required: "*Please type observatory country"
			},
			cc_post:{
				required: "*Please type observatory postal code"
			},	
			cc_url:{
				required: "*Please type a valid URL"
			},
			cc_email:{
				required: "*Please type a valid email address"
			},
			cc_phone:{
				required: "*Please type observatory contact number"
			}			
			
		},
		// the errorPlacement has to take the table layout into account 
		errorPlacement: function(error, element) { 
			error.appendTo(element.parent().parent());
		},
		
		submitHandler: function(form) {
			if (confirm('Are you sure want to continue?')) {
				form.submit();
			}
		}		
		
	});
	
}

function cbTable(){

	//for default values
	$('#cb_year').defaultValue('YYYY');

	$("#form_cb").validate({
	
		onkeyup: false,      // Stopping remote validation as you type
		rules: {
			cb_auth:{
				required: true,
			},	
			cb_year: {
				required: true,
				numberDecimal: true
			},
			cb_title: "required",
			cb_url:{     
				url:true
			},
			cb_labadr:{     
				email:true
			}
		},			
		messages: {
			cb_auth: {
				required: "*Please type Authors/Editors"
			},
			cb_year:{
				required: "*Please type publication years in 4 digits"
			},
			cb_title:{
				required: "*Please type paper title"
			},
			cb_url:{     
				url: "*Please enter a valid URL"
			},
			cb_labadr:{     
				email:"*Please enter a valid email address"
			}
		},
		// the errorPlacement has to take the table layout into account 
		errorPlacement: function(error, element) { 
			error.appendTo(element.parent().parent());
		},
		
		submitHandler: function(form) {
			if (confirm('Are you sure want to continue?')) {
				form.submit();
			}
		}		
		
	});
	
}

function coTable(){

	//for default values
	$('#co_stime').defaultValue('YYYY-MM-DD HH:MM:SS'); 
	$('#co_stime_unc').defaultValue('YYYY-MM-DD HH:MM:SS'); 
	$('#co_etime').defaultValue('YYYY-MM-DD HH:MM:SS'); 
	$('#co_etime_unc').defaultValue('YYYY-MM-DD HH:MM:SS'); 
	$('#co_pubdate').defaultValue('YYYY-MM-DD HH:MM:SS'); 	
	
	$("#form_co").validate({
	
		onkeyup: false,      // Stopping remote validation as you type
		rules: {
			co_code:{
				required: true,
				remote: {
					url: "../convertie/model/commonInsertForm_m.php?tableName=co&fieldName=co_code",
					type: "POST",
					data: {
						co_code:function(){
							return $("#co_code").val();
						}
					}  
				}
			},
			vd_id:{
				required: true
			},
			co_stime: {
				wovodatDatetime: true
			},
			co_etime:{
				endTime: true
			},
			cc_id: {
				required: true
			},
			co_pubdate:{     
				pubDate: true
			}			
		},			
		messages: {
			co_code: {
				required: "*Please provide unique code",
				maxlength: "*The code cannot<br/> exceed 30 characters long",
				remote: jQuery.format("*The code you entered was already in database")
			},		
			vd_id:{
				required: "*Please select volcano list"
			},			
			cc_id: {
				required: "*Please select One Institution/Observatory"
			}
		},
		// the errorPlacement has to take the table layout into account 
		errorPlacement: function(error, element) { 
			error.appendTo(element.parent());
		},
		
		submitHandler: function(form) {
			if (confirm('Are you sure want to continue?')) {
				form.submit();
			}
		}		
		
	});
	
}	

function ipHydTable(){

	//for default values
	$('#ip_hyd_time').defaultValue('YYYY-MM-DD HH:MM:SS'); 
	$('#ip_hyd_start').defaultValue('YYYY-MM-DD HH:MM:SS');	
	$('#ip_hyd_start_unc').defaultValue('YYYY-MM-DD HH:MM:SS'); 
	$('#ip_hyd_end').defaultValue('YYYY-MM-DD HH:MM:SS'); 
	$('#ip_hyd_end_unc').defaultValue('YYYY-MM-DD HH:MM:SS'); 
	$('#ip_hyd_pubdate').defaultValue('YYYY-MM-DD HH:MM:SS'); 	
	
	$("#form_ip_hyd").validate({
	
		onkeyup: false,      // Stopping remote validation as you type
		rules: {
			ip_hyd_code:{
				required: true,
				remote: {
					url: "../convertie/model/commonInsertForm_m.php?tableName=ip_hyd&fieldName=ip_hyd_code",
					type: "POST",
					data: {
						ip_hyd_code:function(){
							return $("#ip_hyd_code").val();
						}
					}  
				}
			},
			vd_id:{
				required: true
			},
			ip_hyd_time:{
				pubDate2: true
			},			
			ip_hyd_start: {
				wovodatDatetime: true
			},
			ip_hyd_end:{
				endTime: true
			},
			cc_id: {
				required: true
			},
			ip_hyd_pubdate:{     
				pubDate: true
			}			
		},			
		messages: {
			ip_hyd_code: {
				required: "*Please provide unique code",
				maxlength: "*The code cannot<br/> exceed 30 characters long",
				remote: jQuery.format("*The code you entered was already in database")
			},		
			vd_id:{
				required: "*Please select volcano list"
			},			
			cc_id: {
				required: "*Please select One Institution/Observatory"
			}
		},
		// the errorPlacement has to take the table layout into account 
		errorPlacement: function(error, element) { 
			error.appendTo(element.parent());
		},
		
		submitHandler: function(form) {
			if (confirm('Are you sure want to continue?')) {
				form.submit();
			}
		}		
		
	});
	
}

function ipMagTable(){

	//for default values
	$('#ip_mag_time').defaultValue('YYYY-MM-DD HH:MM:SS'); 
	$('#ip_mag_start').defaultValue('YYYY-MM-DD HH:MM:SS');	
	$('#ip_mag_start_unc').defaultValue('YYYY-MM-DD HH:MM:SS'); 
	$('#ip_mag_end').defaultValue('YYYY-MM-DD HH:MM:SS'); 
	$('#ip_mag_end_unc').defaultValue('YYYY-MM-DD HH:MM:SS'); 
	$('#ip_mag_pubdate').defaultValue('YYYY-MM-DD HH:MM:SS'); 	
	
	$("#form_ip_mag").validate({
	
		onkeyup: false,      // Stopping remote validation as you type
		rules: {
			ip_mag_code:{
				required: true,
				remote: {
					url: "../convertie/model/commonInsertForm_m.php?tableName=ip_mag&fieldName=ip_mag_code",
					type: "POST",
					data: {
						ip_mag_code:function(){
							return $("#ip_mag_code").val();
						}
					}  
				}
			},
			vd_id:{
				required: true
			},
			ip_mag_time:{
				pubDate2: true
			},			
			ip_mag_start: {
				wovodatDatetime: true
			},
			ip_mag_end:{
				endTime: true
			},
			cc_id: {
				required: true
			},
			ip_mag_pubdate:{     
				pubDate: true
			}			
		},			
		messages: {
			ip_mag_code: {
				required: "*Please provide unique code",
				maxlength: "*The code cannot<br/> exceed 30 characters long",
				remote: jQuery.format("*The code you entered was already in database")
			},		
			vd_id:{
				required: "*Please select volcano list"
			},			
			cc_id: {
				required: "*Please select One Institution/Observatory"
			}
		},
		// the errorPlacement has to take the table layout into account 
		errorPlacement: function(error, element) { 
			error.appendTo(element.parent());
		},
		
		submitHandler: function(form) {
			if (confirm('Are you sure want to continue?')) {
				form.submit();
			}
		}		
		
	});
	
}	

function ipPresTable(){

	//for default values
	$('#ip_pres_time').defaultValue('YYYY-MM-DD HH:MM:SS'); 
	$('#ip_pres_start').defaultValue('YYYY-MM-DD HH:MM:SS');	
	$('#ip_pres_start_unc').defaultValue('YYYY-MM-DD HH:MM:SS'); 
	$('#ip_pres_end').defaultValue('YYYY-MM-DD HH:MM:SS'); 
	$('#ip_pres_end_unc').defaultValue('YYYY-MM-DD HH:MM:SS'); 
	$('#ip_pres_pubdate').defaultValue('YYYY-MM-DD HH:MM:SS'); 	
	
	$("#form_ip_pres").validate({
	
		onkeyup: false,      // Stopping remote validation as you type
		rules: {
			ip_pres_code:{
				required: true,
				remote: {
					url: "../convertie/model/commonInsertForm_m.php?tableName=ip_pres&fieldName=ip_pres_code",
					type: "POST",
					data: {
						ip_pres_code:function(){
							return $("#ip_pres_code").val();
						}
					}  
				}
			},
			vd_id:{
				required: true
			},
			ip_pres_time:{
				pubDate2: true
			},			
			ip_pres_start: {
				wovodatDatetime: true
			},
			ip_pres_end:{
				endTime: true
			},
			cc_id: {
				required: true
			},
			ip_pres_pubdate:{     
				pubDate: true
			}			
		},			
		messages: {
			ip_pres_code: {
				required: "*Please provide unique code",
				maxlength: "*The code cannot<br/> exceed 30 characters long",
				remote: jQuery.format("*The code you entered was already in database")
			},		
			vd_id:{
				required: "*Please select volcano list"
			},			
			cc_id: {
				required: "*Please select One Institution/Observatory"
			}
		},
		// the errorPlacement has to take the table layout into account 
		errorPlacement: function(error, element) { 
			error.appendTo(element.parent());
		},
		
		submitHandler: function(form) {
			if (confirm('Are you sure want to continue?')) {
				form.submit();
			}
		}		
		
	});
	
}	

function ipSatTable(){

	//for default values
	$('#ip_sat_time').defaultValue('YYYY-MM-DD HH:MM:SS'); 
	$('#ip_sat_start').defaultValue('YYYY-MM-DD HH:MM:SS');	
	$('#ip_sat_start_unc').defaultValue('YYYY-MM-DD HH:MM:SS'); 
	$('#ip_sat_end').defaultValue('YYYY-MM-DD HH:MM:SS'); 
	$('#ip_sat_end_unc').defaultValue('YYYY-MM-DD HH:MM:SS'); 
	$('#ip_sat_pubdate').defaultValue('YYYY-MM-DD HH:MM:SS'); 	
	
	$("#form_ip_sat").validate({
	
		onkeyup: false,      // Stopping remote validation as you type
		rules: {
			ip_sat_code:{
				required: true,
				remote: {
					url: "../convertie/model/commonInsertForm_m.php?tableName=ip_sat&fieldName=ip_sat_code",
					type: "POST",
					data: {
						ip_sat_code:function(){
							return $("#ip_sat_code").val();
						}
					}  
				}
			},
			vd_id:{
				required: true
			},
			ip_sat_time:{
				pubDate2: true
			},			
			ip_sat_start: {
				wovodatDatetime: true
			},
			ip_sat_end:{
				endTime: true
			},
			cc_id: {
				required: true
			},
			ip_sat_pubdate:{     
				pubDate: true
			}			
		},			
		messages: {
			ip_sat_code: {
				required: "*Please provide unique code",
				maxlength: "*The code cannot<br/> exceed 30 characters long",
				remote: jQuery.format("*The code you entered was already in database")
			},		
			vd_id:{
				required: "*Please select volcano list"
			},			
			cc_id: {
				required: "*Please select One Institution/Observatory"
			}
		},
		// the errorPlacement has to take the table layout into account 
		errorPlacement: function(error, element) { 
			error.appendTo(element.parent());
		},
		
		submitHandler: function(form) {
			if (confirm('Are you sure want to continue?')) {
				form.submit();
			}
		}		
		
	});
	
}

function ipTecTable(){

	//for default values
	$('#ip_tec_time').defaultValue('YYYY-MM-DD HH:MM:SS'); 
	$('#ip_tec_start').defaultValue('YYYY-MM-DD HH:MM:SS');	
	$('#ip_tec_start_unc').defaultValue('YYYY-MM-DD HH:MM:SS'); 
	$('#ip_tec_end').defaultValue('YYYY-MM-DD HH:MM:SS'); 
	$('#ip_tec_end_unc').defaultValue('YYYY-MM-DD HH:MM:SS'); 
	$('#ip_tec_pubdate').defaultValue('YYYY-MM-DD HH:MM:SS'); 	
	
	$("#form_ip_tec").validate({
	
		onkeyup: false,      // Stopping remote validation as you type
		rules: {
			ip_tec_code:{
				required: true,
				remote: {
					url: "../convertie/model/commonInsertForm_m.php?tableName=ip_tec&fieldName=ip_tec_code",
					type: "POST",
					data: {
						ip_tec_code:function(){
							return $("#ip_tec_code").val();
						}
					}  
				}
			},
			vd_id:{
				required: true
			},
			ip_tec_time:{
				pubDate2: true
			},			
			ip_tec_start: {
				wovodatDatetime: true
			},
			ip_tec_end:{
				endTime: true
			},
			cc_id: {
				required: true
			},
			ip_tec_pubdate:{     
				pubDate: true
			}			
		},			
		messages: {
			ip_tec_code: {
				required: "*Please provide unique code",
				maxlength: "*The code cannot<br/> exceed 30 characters long",
				remote: jQuery.format("*The code you entered was already in database")
			},		
			vd_id:{
				required: "*Please select volcano list"
			},			
			cc_id: {
				required: "*Please select One Institution/Observatory"
			}
		},
		// the errorPlacement has to take the table layout into account 
		errorPlacement: function(error, element) { 
			error.appendTo(element.parent());
		},
		
		submitHandler: function(form) {
			if (confirm('Are you sure want to continue?')) {
				form.submit();
			}
		}		
		
	});
	
}