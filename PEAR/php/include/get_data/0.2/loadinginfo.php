<?php

// DB functions
require_once "php/funcs/db_funcs.php";

// Local variables
$load_info_elements=$wovoml_element['value'];
$l_load_info_elements=count($load_info_elements);

// Loop on elements
for ($i=0; $i<$l_load_info_elements; $i++) {
	if ($load_info_elements[$i]['tag']=="OWNERCODE") {
		// Owner code found
		$gen_cc_code=$load_info_elements[$i]['value'][0];
		
		// Get cc_fname, cc_lname, cc_obs
		$table_name='cc';
		$field_name=array();
		$field_value=array();
		$field_name[0]='cc_fname';
		$field_name[1]='cc_lname';
		$field_name[2]='cc_obs';
		$where_field_name=array();
		$where_field_comp=array();
		$where_field_value=array();
		$where_logical=array();
		$where_field_name[0]='cc_code';
		$where_field_comp[0]='=';
		$where_field_value[0]=$gen_cc_code;
		$where_logical[0]='OR';
		$where_field_name[1]='cc_code2';
		$where_field_comp[1]='=';
		$where_field_value[1]=$gen_cc_code;
		$local_error="";
		if (!db_select_ext($table_name, $field_name, $where_field_name, $where_field_comp, $where_field_value, $where_logical, $field_value, $local_error)) {
			switch ($local_error) {
				case "Error in the parameters given":
					$errors[$l_errors]=array();
					$errors[$l_errors]['code']=1003;
					$errors[$l_errors]['message']=$local_error." to db_select()";
					$l_errors++;
					break;
				default:
					$errors[$l_errors]=array();
					$errors[$l_errors]['code']=4000;
					$errors[$l_errors]['message']=$local_error;
					$l_errors++;
			}
			return FALSE;
		}
		$l_field_value=count($field_value);
		if ($l_field_value>1) {
			// Only 1 result should be found
			$_SESSION['errors']=array();
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=1096;
			$_SESSION['errors'][0]['message']="Multiple rows in the cc table correspond to this cc_code: '".$gen_cc_code."' [get_data/wovoml.php]";
			$_SESSION['l_errors']=1;
			
			// Redirect to system error page
			header('Location: '.$url_root.'system_error.php');
			exit();
		}
		elseif ($l_field_value==0) {
			// Only 1 result should be found
			$_SESSION['errors']=array();
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=1096;
			$_SESSION['errors'][0]['message']="ownerCode with value '".$gen_cc_code."' from 'LoadingInfo' class could not be found in the database [get_data/wovoml.php]";
			$_SESSION['l_errors']=1;
			
			// Redirect to system error page
			header('Location: '.$url_root.'system_error.php');
			exit();
		}
		$cc_fname=$field_value[0][0];
		$cc_lname=$field_value[0][1];
		$cc_obs=$field_value[0][2];
		
		// Form owner name
		$owner_name="";
		if ($cc_fname!="") {
			$owner_name.=$cc_fname;
			if ($cc_lname!="") {
				$owner_name.=" ".$cc_lname;
			}
		}
		else {
			if ($cc_lname!="") {
				$owner_name.=$cc_lname;
			}
			else {
				// No first name and no last name
				$owner_name.=$cc_obs;
			}
		}
		
		// That's all for now
		break;
	}
}

$main_message.=" generally owned by <b>".$owner_name."</b>:";

?>