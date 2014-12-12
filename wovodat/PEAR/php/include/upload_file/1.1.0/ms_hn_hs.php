<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");

// Get code
$code=xml_get_att($ms_hn_hs_obj, "CODE");

// Get owners
$owners=$ms_hn_hs_obj['results']['owners'];

// Get start time
$stime=xml_get_ele($ms_hn_hs_obj, "STARTTIME");

// INSERT or UPDATE?
$id=v1_get_id_ms("hs", $code, $stime, $owners);

// If ID is NULL, INSERT
if ($id==NULL) {
	
	// Prepare variables
	$insert_table="hs";
	$field_name=array();
	$field_name[0]="hs_code";
	$field_name[1]="hs_name";
	$field_name[2]="hs_type";
	$field_name[3]="hs_perm";
	$field_name[4]="hs_tscr";
	$field_name[5]="hs_bscr";
	$field_name[6]="hs_tdepth";
	$field_name[7]="hs_lat";
	$field_name[8]="hs_lon";
	$field_name[9]="hs_elev";
	$field_name[10]="hs_stime";
	$field_name[11]="hs_stime_unc";
	$field_name[12]="hs_etime";
	$field_name[13]="hs_etime_unc";
	$field_name[14]="hs_utc";
	$field_name[15]="hs_desc";
	$field_name[16]="hs_ori";            
	$field_name[17]="hs_com";            
	$field_name[18]="cn_id";
	$field_name[19]="cc_id";
	$field_name[20]="cc_id2";
	$field_name[21]="cc_id3";
	$field_name[22]="hs_pubdate";
	$field_name[23]="cc_id_load";
	$field_name[24]="hs_loaddate";
	$field_name[25]="cb_ids";
	$field_value=array();
	$field_value[0]=$code;
	$field_value[1]=xml_get_ele($ms_hn_hs_obj, "NAME");
	$field_value[2]=xml_get_ele($ms_hn_hs_obj, "WATERBODYTYPE");
	$field_value[3]=xml_get_ele($ms_hn_hs_obj, "PERMINST");
	$field_value[4]=xml_get_ele($ms_hn_hs_obj, "SCREENTOP");
	$field_value[5]=xml_get_ele($ms_hn_hs_obj, "SCREENBOTTOM");
	$field_value[6]=xml_get_ele($ms_hn_hs_obj, "WELLDEPTH");
	$field_value[7]=xml_get_ele($ms_hn_hs_obj, "LAT");
	$field_value[8]=xml_get_ele($ms_hn_hs_obj, "LON");
	$field_value[9]=xml_get_ele($ms_hn_hs_obj, "ELEV");
	$field_value[10]=$stime;
	$field_value[11]=xml_get_ele($ms_hn_hs_obj, "STARTTIMEUNC");
	$field_value[12]=xml_get_ele($ms_hn_hs_obj, "ENDTIME");
	$field_value[13]=xml_get_ele($ms_hn_hs_obj, "ENDTIMEUNC");
	$field_value[14]=xml_get_ele($ms_hn_hs_obj, "DIFFUTC");
	$field_value[15]=xml_get_ele($ms_hn_hs_obj, "DESCRIPTION");
	$field_value[16]=xml_get_ele($ms_hn_hs_obj, "ORGDIGITIZE");         
	$field_value[17]=xml_get_ele($ms_hn_hs_obj, "COMMENTS");         
	$field_value[18]=$ms_hn_obj['id'];
	$field_value[19]=$ms_hn_hs_obj['results']['owners'][0]['id'];
	$field_value[20]=$ms_hn_hs_obj['results']['owners'][1]['id'];
	$field_value[21]=$ms_hn_hs_obj['results']['owners'][2]['id'];
	$field_value[22]=$ms_hn_hs_obj['results']['pubdate'];
	$field_value[23]=$cc_id_load;
	$field_value[24]=$current_time;
	$field_value[25]=$cb_ids;
	
	// INSERT values into database and write UNDO file
	if (!v1_insert($undo_file_pointer, $insert_table, $field_name, $field_value, $upload_to_db, $last_insert_id, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$ms_hn_hs_obj['id']=$last_insert_id;
	array_push($db_ids, $last_insert_id);
}
// Else, UPDATE
else {
	
	// Prepare variables
	$update_table="hs";
	$field_name=array();
	$field_name[0]="hs_pubdate";
	$field_name[1]="hs_name";
	$field_name[2]="hs_type";
	$field_name[3]="hs_perm";
	$field_name[4]="hs_tscr";
	$field_name[5]="hs_bscr";
	$field_name[6]="hs_tdepth";
	$field_name[7]="hs_lat";
	$field_name[8]="hs_lon";
	$field_name[9]="hs_elev";
	$field_name[10]="cn_id";
	$field_name[11]="hs_stime_unc";
	$field_name[12]="hs_etime";
	$field_name[13]="hs_etime_unc";
	$field_name[14]="hs_utc";
	$field_name[15]="hs_desc";
	$field_name[16]="hs_ori";           
	$field_name[17]="hs_com";             
	$field_name[18]="cc_id";
	$field_name[19]="cc_id2";
	$field_name[20]="cc_id3";
	$field_name[21]="cb_ids";
	$field_value=array();
	$field_value[0]=$ms_hn_hs_obj['results']['pubdate'];
	$field_value[1]=xml_get_ele($ms_hn_hs_obj, "NAME");
	$field_value[2]=xml_get_ele($ms_hn_hs_obj, "WATERBODYTYPE");
	$field_value[3]=xml_get_ele($ms_hn_hs_obj, "PERMINST");
	$field_value[4]=xml_get_ele($ms_hn_hs_obj, "SCREENTOP");
	$field_value[5]=xml_get_ele($ms_hn_hs_obj, "SCREENBOTTOM");
	$field_value[6]=xml_get_ele($ms_hn_hs_obj, "WELLDEPTH");
	$field_value[7]=xml_get_ele($ms_hn_hs_obj, "LAT");
	$field_value[8]=xml_get_ele($ms_hn_hs_obj, "LON");
	$field_value[9]=xml_get_ele($ms_hn_hs_obj, "ELEV");
	$field_value[10]=$ms_hn_obj['id'];
	$field_value[11]=xml_get_ele($ms_hn_hs_obj, "STARTTIMEUNC");
	$field_value[12]=xml_get_ele($ms_hn_hs_obj, "ENDTIME");
	$field_value[13]=xml_get_ele($ms_hn_hs_obj, "ENDTIMEUNC");
	$field_value[14]=xml_get_ele($ms_hn_hs_obj, "DIFFUTC");
	$field_value[15]=xml_get_ele($ms_hn_hs_obj, "DESCRIPTION");
	$field_value[16]=xml_get_ele($ms_hn_hs_obj, "ORGDIGITIZE");         
	$field_value[17]=xml_get_ele($ms_hn_hs_obj, "COMMENTS");          		
	$field_value[18]=$ms_hn_hs_obj['results']['owners'][0]['id'];
	$field_value[19]=$ms_hn_hs_obj['results']['owners'][1]['id'];
	$field_value[20]=$ms_hn_hs_obj['results']['owners'][2]['id'];
	$field_value[21]=$cb_ids;
	$where_field_name=array();
	$where_field_name[0]="hs_id";
	$where_field_value=array();
	$where_field_value[0]=$id;
	
	// UPDATE values in database and write UNDO file
	if (!v1_update($undo_file_pointer, $update_table, $field_name, $field_value, $where_field_name, $where_field_value, $upload_to_db, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$ms_hn_hs_obj['id']=$id;
	array_push($db_ids, $id);
}

// Upload children
foreach ($ms_hn_hs_obj['value'] as &$ms_hn_hs_ele) {
	switch ($ms_hn_hs_ele['tag']) {
		case "HYDROLOGICINSTRUMENT":
			$ms_hn_hs_hi_obj=&$ms_hn_hs_ele;
			include "ms_hn_hs_hi.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>