<?php

// Get code
$code=xml_get_att($er_ed_phs_obj, "CODE");

// Get owners
$owners=$er_ed_phs_obj['results']['owners'];

// INSERT or UPDATE?
$id=v1_get_id("ed_phs", $code, $owners);

// If ID is NULL, INSERT
if ($id==NULL) {
	
	// Prepare variables
	$insert_table="ed_phs";
	$field_name=array();
	$field_name[0]="ed_phs_code";
	$field_name[1]="ed_phs_phsnum";
	$field_name[2]="ed_phs_stime";
	$field_name[3]="ed_phs_stime_bc";
	$field_name[4]="ed_phs_stime_unc";
	$field_name[5]="ed_phs_etime";
	$field_name[6]="ed_phs_etime_bc";
	$field_name[7]="ed_phs_etime_unc";
	$field_name[8]="ed_phs_desc";
	$field_name[9]="ed_phs_vei";
	$field_name[10]="ed_phs_max_lext";
	$field_name[11]="ed_phs_max_expdis";
	$field_name[12]="ed_phs_dre";
	$field_name[13]="ed_phs_mix";
	$field_name[14]="ed_phs_col";
	$field_name[15]="ed_phs_coldet";
	$field_name[16]="ed_phs_minsio2_mg";
	$field_name[17]="ed_phs_maxsio2_mg";
	$field_name[18]="ed_phs_minsio2_wr";
	$field_name[19]="ed_phs_maxsio2_wr";
	$field_name[20]="ed_phs_totxtl";
	$field_name[21]="ed_phs_phenc";
	$field_name[22]="ed_phs_phena";
	$field_name[23]="ed_phs_h2o";
	$field_name[24]="ed_phs_h2o_xtl";
	$field_name[25]="ed_phs_com";
	$field_name[26]="ed_id";
	$field_name[27]="cc_id";
	$field_name[28]="cc_id2";
	$field_name[29]="cc_id3";
	$field_name[30]="ed_phs_pubdate";
	$field_name[31]="cc_id_load";
	$field_name[32]="ed_phs_loaddate";
	$field_name[33]="cb_ids";
	$field_value=array();
	$field_value[0]=$code;
	$field_value[1]=xml_get_ele($er_ed_phs_obj, "PHASENUMBER");
	$field_value[2]=$er_ed_phs_obj['results']['ed_phs_stime'];
	$field_value[3]=$er_ed_phs_obj['results']['ed_phs_stime_bc'];
	$field_value[4]=xml_get_ele($er_ed_phs_obj, "STARTTIMEUNC");
	$field_value[5]=$er_ed_phs_obj['results']['ed_phs_etime'];
	$field_value[6]=$er_ed_phs_obj['results']['ed_phs_etime_bc'];
	$field_value[7]=xml_get_ele($er_ed_phs_obj, "ENDTIMEUNC");
	$field_value[8]=xml_get_ele($er_ed_phs_obj, "DESCRIPTION");
	$field_value[9]=xml_get_ele($er_ed_phs_obj, "VEI");
	$field_value[10]=xml_get_ele($er_ed_phs_obj, "MAXLAVAEXTRU");
	$field_value[11]=xml_get_ele($er_ed_phs_obj, "MAXEXPMASSDIS");
	$field_value[12]=xml_get_ele($er_ed_phs_obj, "DRE");
	$field_value[13]=xml_get_ele($er_ed_phs_obj, "MAGMAMIX");
	$field_value[14]=xml_get_ele($er_ed_phs_obj, "MAXCOLHEIGHT");
	$field_value[15]=xml_get_ele($er_ed_phs_obj, "COLHEIGHTDET");
	$field_value[16]=xml_get_ele($er_ed_phs_obj, "MINSIO2MATRIXGLASS");
	$field_value[17]=xml_get_ele($er_ed_phs_obj, "MAXSIO2MATRIXGLASS");
	$field_value[18]=xml_get_ele($er_ed_phs_obj, "MINSIO2WHOLEROCK");
	$field_value[19]=xml_get_ele($er_ed_phs_obj, "MAXSIO2WHOLEROCK");
	$field_value[20]=xml_get_ele($er_ed_phs_obj, "TOTCRYSTAL");
	$field_value[21]=xml_get_ele($er_ed_phs_obj, "PHENOCONTENT");
	$field_value[22]=xml_get_ele($er_ed_phs_obj, "PHENOASSEMB");
	$field_value[23]=xml_get_ele($er_ed_phs_obj, "PREERUPH2OCONTENT");
	$field_value[24]=xml_get_ele($er_ed_phs_obj, "PHENOMELTINCLUSION");
	$field_value[25]=xml_get_ele($er_ed_phs_obj, "COMMENTS");
	$field_value[26]=$er_ed_obj['id'];
	$field_value[27]=$er_ed_phs_obj['results']['owners'][0]['id'];
	$field_value[28]=$er_ed_phs_obj['results']['owners'][1]['id'];
	$field_value[29]=$er_ed_phs_obj['results']['owners'][2]['id'];
	$field_value[30]=$er_ed_phs_obj['results']['pubdate'];
	$field_value[31]=$cc_id_load;
	$field_value[32]=$current_time;
	$field_value[33]=$cb_ids;
	
	// INSERT values into database and write UNDO file
	if (!v1_insert($undo_file_pointer, $insert_table, $field_name, $field_value, $upload_to_db, $last_insert_id, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$er_ed_phs_obj['id']=$last_insert_id;
	array_push($db_ids, $last_insert_id);
}
// Else, UPDATE
else {
	
	// Prepare variables
	$update_table="ed_phs";
	$field_name=array();
	$field_name[0]="ed_phs_pubdate";
	$field_name[1]="ed_phs_phsnum";
	$field_name[2]="ed_phs_stime";
	$field_name[3]="ed_phs_stime_bc";
	$field_name[4]="ed_phs_stime_unc";
	$field_name[5]="ed_phs_etime";
	$field_name[6]="ed_phs_etime_bc";
	$field_name[7]="ed_phs_etime_unc";
	$field_name[8]="ed_phs_desc";
	$field_name[9]="ed_phs_vei";
	$field_name[10]="ed_phs_max_lext";
	$field_name[11]="ed_phs_max_expdis";
	$field_name[12]="ed_phs_dre";
	$field_name[13]="ed_phs_mix";
	$field_name[14]="ed_phs_col";
	$field_name[15]="ed_phs_coldet";
	$field_name[16]="ed_phs_minsio2_mg";
	$field_name[17]="ed_phs_maxsio2_mg";
	$field_name[18]="ed_phs_minsio2_wr";
	$field_name[19]="ed_phs_maxsio2_wr";
	$field_name[20]="ed_phs_totxtl";
	$field_name[21]="ed_phs_phenc";
	$field_name[22]="ed_phs_phena";
	$field_name[23]="ed_phs_h2o";
	$field_name[24]="ed_phs_h2o_xtl";
	$field_name[25]="ed_phs_com";
	$field_name[26]="ed_id";
	$field_name[27]="cc_id";
	$field_name[28]="cc_id2";
	$field_name[29]="cc_id3";
	$field_name[30]="cb_ids";
	$field_value=array();
	$field_value[0]=$er_ed_phs_obj['results']['pubdate'];
	$field_value[1]=xml_get_ele($er_ed_phs_obj, "PHASENUMBER");
	$field_value[2]=$er_ed_phs_obj['results']['ed_phs_stime'];
	$field_value[3]=$er_ed_phs_obj['results']['ed_phs_stime_bc'];
	$field_value[4]=xml_get_ele($er_ed_phs_obj, "STARTTIMEUNC");
	$field_value[5]=$er_ed_phs_obj['results']['ed_phs_etime'];
	$field_value[6]=$er_ed_phs_obj['results']['ed_phs_etime_bc'];
	$field_value[7]=xml_get_ele($er_ed_phs_obj, "ENDTIMEUNC");
	$field_value[8]=xml_get_ele($er_ed_phs_obj, "DESCRIPTION");
	$field_value[9]=xml_get_ele($er_ed_phs_obj, "VEI");
	$field_value[10]=xml_get_ele($er_ed_phs_obj, "MAXLAVAEXTRU");
	$field_value[11]=xml_get_ele($er_ed_phs_obj, "MAXEXPMASSDIS");
	$field_value[12]=xml_get_ele($er_ed_phs_obj, "DRE");
	$field_value[13]=xml_get_ele($er_ed_phs_obj, "MAGMAMIX");
	$field_value[14]=xml_get_ele($er_ed_phs_obj, "MAXCOLHEIGHT");
	$field_value[15]=xml_get_ele($er_ed_phs_obj, "COLHEIGHTDET");
	$field_value[16]=xml_get_ele($er_ed_phs_obj, "MINSIO2MATRIXGLASS");
	$field_value[17]=xml_get_ele($er_ed_phs_obj, "MAXSIO2MATRIXGLASS");
	$field_value[18]=xml_get_ele($er_ed_phs_obj, "MINSIO2WHOLEROCK");
	$field_value[19]=xml_get_ele($er_ed_phs_obj, "MAXSIO2WHOLEROCK");
	$field_value[20]=xml_get_ele($er_ed_phs_obj, "TOTCRYSTAL");
	$field_value[21]=xml_get_ele($er_ed_phs_obj, "PHENOCONTENT");
	$field_value[22]=xml_get_ele($er_ed_phs_obj, "PHENOASSEMB");
	$field_value[23]=xml_get_ele($er_ed_phs_obj, "PREERUPH2OCONTENT");
	$field_value[24]=xml_get_ele($er_ed_phs_obj, "PHENOMELTINCLUSION");
	$field_value[25]=xml_get_ele($er_ed_phs_obj, "COMMENTS");
	$field_value[26]=$er_ed_obj['id'];
	$field_value[27]=$er_ed_phs_obj['results']['owners'][0]['id'];
	$field_value[28]=$er_ed_phs_obj['results']['owners'][1]['id'];
	$field_value[29]=$er_ed_phs_obj['results']['owners'][2]['id'];
	$field_value[30]=$cb_ids;
	$where_field_name=array();
	$where_field_name[0]="ed_phs_id";
	$where_field_value=array();
	$where_field_value[0]=$id;
	
	// UPDATE values in database and write UNDO file
	if (!v1_update($undo_file_pointer, $update_table, $field_name, $field_value, $where_field_name, $where_field_value, $upload_to_db, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$er_ed_phs_obj['id']=$id;
	array_push($db_ids, $id);
}

// Upload children
foreach ($er_ed_phs_obj['value'] as &$er_ed_phs_ele) {
	switch ($er_ed_phs_ele['tag']) {
		case "VIDEO":
			$er_ed_phs_vid_obj=&$er_ed_phs_ele;
			include "er_ed_phs_vid.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "FORECAST":
			$er_ed_phs_for_obj=&$er_ed_phs_ele;
			include "er_ed_phs_for.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>