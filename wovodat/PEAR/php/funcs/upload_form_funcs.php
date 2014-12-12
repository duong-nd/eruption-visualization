<?php

/******************************************************************************************************
*
* Package of functions for operations on upload forms
*
* html_write_form_line: Function to write a line in the form
*
******************************************************************************************************/

/******************************************************************************************************
* Function to write a line in the form
* Returns nothing
* Input:	- $field_name: the name of the field
* 			- $is_required: a boolean whether field is required
* 			- $has_error: a boolean whether field has error
* 			- $field_error: the error message
* 			- $input_type: the type of input (hidden, text, textarea, select)
* 			- $field_input: an array which content depends on input_type
* 			- $field_desc: the description of the field
******************************************************************************************************/
function html_write_form_line($field_name, $is_required, $has_error, $field_error, $input_type, $field_input, $field_desc) {
	// Header
	print <<<STRING
					<tr>
						<th
STRING;

	// Red field
	if ($has_error) {
		print " class=\"redtext\"";
	}
	
	// Close "th" tag
	print ">";

	// Field name
	if ($is_required) {
		print "*";
	}
	print $field_name;

	// Field error
	if ($has_error) {
		print " (".$field_error.")";
	}

	// Prepare for input
	print <<<STRING
:</th>
						<td>
STRING;
	
	// Input
	switch ($input_type) {
		case "hidden":
			break;
		case "text":
			// Get maxlength, name and value
			$maxlength=$field_input['maxlength'];
			if ($maxlength===NULL || !is_int($maxlength)) {
				// System error
				$_SESSION['errors']=array();
				$_SESSION['errors'][0]=array();
				$_SESSION['errors'][0]['code']=1860;
				$_SESSION['errors'][0]['message']="Error in upload_form.php: maxlength is not specified correctly (maxlength=$maxlength)";
				$_SESSION['l_errors']=1;
				// Redirect to system error page
				header('Location: '.$url_root.'system_error.php');
				exit();
			}
			$name=$field_input['name'];
			$value=$field_input['value'];
			print <<<STRING
							<input type="text" size="28" maxlength="$maxlength" name="$name" value="$value"
STRING;
			$onkeydown=$field_input['onkeydown'];
			if ($onkeydown!=NULL) {
				print " onkeydown=\"$onkeydown\" onkeyup=\"$onkeydown\"";
			}
			print " />";
			break;
		case "textarea":
			// Get maxlength, name and value
			$maxlength=$field_input['maxlength'];
			if ($maxlength===NULL || !is_int($maxlength)) {
				// System error
				$_SESSION['errors']=array();
				$_SESSION['errors'][0]=array();
				$_SESSION['errors'][0]['code']=1860;
				$_SESSION['errors'][0]['message']="Error in upload_form.php: maxlength is not specified correctly (maxlength=$maxlength)";
				$_SESSION['l_errors']=1;
				// Redirect to system error page
				header('Location: '.$url_root.'system_error.php');
				exit();
			}
			$name=$field_input['name'];
			$value=$field_input['value'];
			print <<<STRING
							<textarea name="$name" cols="30" rows="4"
STRING;
			if ($maxlength!=0) {
				print " onkeydown=\"limitText(this, $maxlength)\"";
			}
			print <<<STRING
>$value</textarea>
STRING;
			break;
		case "select":
			// Get name and options
			$name=$field_input['name'];
			$options=$field_input['options'];
			$n_options=$field_input['n_options'];
			$form_loader_id=$_SESSION['login']['cc_id'];
			$form_loader_name=$_SESSION['login']['user_name'];
			print <<<STRING
							<select name="$name" style="width:220px">
								<option value="$form_loader_id"> Myself ($form_loader_name) </option>\n
STRING;
			for ($i=0; $i<$n_options; $i++) {
				$value=$options['id'][$i];
				$name=$options['name'][$i];		
				if(!is_numeric(substr($name,0,1))){	//to remove non-observatory "cc"
					print <<<STRING
						<option value="$value"> $name </option>\n
STRING;
				}
			}
			print <<<STRING
							</select>
STRING;
			break;
		case "radio":
			// Get name and options
			$name=$field_input['name'];
			$options=$field_input['options'];
			$n_options=$field_input['n_options'];
			for ($i=0; $i<$n_options; $i++) {
				$value=$options['value'][$i];
				$display=$options['display'][$i];
				$checked=$options['checked'][$i];
				if ($i==0) {
					print "\t\t\t\t\t\t\t";
				}
				else {
					print "&#09;";
				}
				print "<input type=\"radio\"";
				if ($checked) {
					print " checked=\"yes\"";
				}
				print " name=\"$name\" value=\"$value\">$display</input>";
			}
			break;
		default:
			// System error
			$_SESSION['errors']=array();
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=1860;
			$_SESSION['errors'][0]['message']="Error in upload_form.php: input_type could not be recognized (input_type=$input_type)";
			$_SESSION['l_errors']=1;
			// Redirect to system error page
			header('Location: '.$url_root.'system_error.php');
			exit();
			
	}
	
	// Field description
	print <<<STRING
						</td>
						<td><span style="font-size:10px"> $field_desc </span></td>
					</tr>
STRING;
}

?>