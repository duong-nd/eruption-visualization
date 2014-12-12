<?php

// Check login
require_once "php/include/login_check.php";

// Get root url
require_once "php/include/get_root.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>WOVOdat :: The World Organization of Volcano Observatories (WOVO): Database of Volcanic Unrest (WOVOdat), by IAVCEI</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8">
	<meta http-equiv="content-type" content="text/html;charset=iso-8859-1">
	<meta name="description" content="The World Organization of Volcano Observatories (WOVO): Database of Volcanic Unrest (WOVOdat)">
	<meta name="keywords" content="Volcano, Vulcano, Volcanoes, Vulcanoes">
	<link href="/css/styles_beta.css" rel="stylesheet">
	<link href="/gif/WOVOfavicon.ico" type="image/x-icon" rel="SHORTCUT ICON">	
	<script language="javascript" type="text/javascript" src="/js/scripts.js">
	</script>
<style type="text/css" media=screen>
<!--
ul{width:760px;margin-bottom:10px; overflow:hidden;}
li{line-height:1.5em; float:left; display:inline;}
#six li { width:16.666%; } /* 6 col */
-->
</style>
</head>
<body>

	<div id="wrapborder">
	<div id="wrap">
		<div id="headershadow">
			<?php include 'php/include/header_beta.php'; ?>
		</div>

		<!-- Content -->
		<div id="content">
			<div id="content_ref">
			
			<!-- Page content -->
				<h1>Table selection</h1>
				<p>Select the tables that you wish to check:</p>
				<form method="post" action="check.php" name="check_select_table_form">
				<input type="checkbox" name="select_all" onClick="checkUncheckAll(this)" /> Uncheck all
					<ul id="six">
						<li><input type="checkbox" name="select_table[]" value="cb" /> cb</li>
						<li><input type="checkbox" name="select_table[]" value="cc" /> cc</li>
						<li><input type="checkbox" name="select_table[]" value="ch" /> ch</li>
						<li><input type="checkbox" name="select_table[]" value="cm" /> cm</li>
						<li><input type="checkbox" name="select_table[]" value="cn" /> cn</li>
						<li><input type="checkbox" name="select_table[]" value="co" /> co</li>
						<li><input type="checkbox" name="select_table[]" value="cp" /> cp</li>
						<li><input type="checkbox" name="select_table[]" value="cr" /> cr</li>
						<li><input type="checkbox" name="select_table[]" value="cr_tmp" /> cr_tmp</li>
						<li><input type="checkbox" name="select_table[]" value="cs" /> cs</li>
						<li><input type="checkbox" name="select_table[]" value="cu" /> cu</li>
						<li><input type="checkbox" name="select_table[]" value="dd_ang" /> dd_ang</li>
						<li><input type="checkbox" name="select_table[]" value="dd_edm" /> dd_edm</li>
						<li><input type="checkbox" name="select_table[]" value="dd_gps" /> dd_gps</li>
						<li><input type="checkbox" name="select_table[]" value="dd_gpv" /> dd_gpv</li>
						<li><input type="checkbox" name="select_table[]" value="dd_lev" /> dd_lev</li>
						<li><input type="checkbox" name="select_table[]" value="dd_sar" /> dd_sar</li>
						<li><input type="checkbox" name="select_table[]" value="dd_srd" /> dd_srd</li>
						<li><input type="checkbox" name="select_table[]" value="dd_str" /> dd_str</li>
						<li><input type="checkbox" name="select_table[]" value="dd_tlt" /> dd_tlt</li>
						<li><input type="checkbox" name="select_table[]" value="dd_tlv" /> dd_tlv</li>
						<li><input type="checkbox" name="select_table[]" value="di_gen" /> di_gen</li>
						<li><input type="checkbox" name="select_table[]" value="di_tlt" /> di_tlt</li>
						<li><input type="checkbox" name="select_table[]" value="ds" /> ds</li>
						<li><input type="checkbox" name="select_table[]" value="ed" /> ed</li>
						<li><input type="checkbox" name="select_table[]" value="ed_for" /> ed_for</li>
						<li><input type="checkbox" name="select_table[]" value="ed_phs" /> ed_phs</li>
						<li><input type="checkbox" name="select_table[]" value="ed_vid" /> ed_vid</li>
						<li><input type="checkbox" name="select_table[]" value="fd_ele" /> fd_ele</li>
						<li><input type="checkbox" name="select_table[]" value="fd_gra" /> fd_gra</li>
						<li><input type="checkbox" name="select_table[]" value="fd_mag" /> fd_mag</li>
						<li><input type="checkbox" name="select_table[]" value="fd_mgv" /> fd_mgv</li>
						<li><input type="checkbox" name="select_table[]" value="fi" /> fi</li>
						<li><input type="checkbox" name="select_table[]" value="fs" /> fs</li>
						<li><input type="checkbox" name="select_table[]" value="gd" /> gd</li>
						<li><input type="checkbox" name="select_table[]" value="gd_plu" /> gd_plu</li>
						<li><input type="checkbox" name="select_table[]" value="gd_sol" /> gd_sol</li>
						<li><input type="checkbox" name="select_table[]" value="gi" /> gi</li>
						<li><input type="checkbox" name="select_table[]" value="gs" /> gs</li>
						<li><input type="checkbox" name="select_table[]" value="hd" /> hd</li>
						<li><input type="checkbox" name="select_table[]" value="hi" /> hi</li>
						<li><input type="checkbox" name="select_table[]" value="hs" /> hs</li>
						<li><input type="checkbox" name="select_table[]" value="ip_hyd" /> ip_hyd</li>
						<li><input type="checkbox" name="select_table[]" value="ip_mag" /> ip_mag</li>
						<li><input type="checkbox" name="select_table[]" value="ip_pres" /> ip_pres</li>
						<li><input type="checkbox" name="select_table[]" value="ip_sat" /> ip_sat</li>
						<li><input type="checkbox" name="select_table[]" value="ip_tec" /> ip_tec</li>
						<li><input type="checkbox" name="select_table[]" value="jj_concon" /> jj_concon</li>
						<li><input type="checkbox" name="select_table[]" value="jj_imgx" /> jj_imgx</li>
						<li><input type="checkbox" name="select_table[]" value="jj_volcon" /> jj_volcon</li>
						<li><input type="checkbox" name="select_table[]" value="jj_volnet" /> jj_volnet</li>
						<li><input type="checkbox" name="select_table[]" value="j_sarsat" /> j_sarsat</li>
						<li><input type="checkbox" name="select_table[]" value="md" /> md</li>
						<li><input type="checkbox" name="select_table[]" value="sd_evn" /> sd_evn</li>
						<li><input type="checkbox" name="select_table[]" value="sd_evs" /> sd_evs</li>
						<li><input type="checkbox" name="select_table[]" value="sd_int" /> sd_int</li>
						<li><input type="checkbox" name="select_table[]" value="sd_ivl" /> sd_ivl</li>
						<li><input type="checkbox" name="select_table[]" value="sd_rsm" /> sd_rsm</li>
						<li><input type="checkbox" name="select_table[]" value="sd_sam" /> sd_sam</li>
						<li><input type="checkbox" name="select_table[]" value="sd_ssm" /> sd_ssm</li>
						<li><input type="checkbox" name="select_table[]" value="sd_trm" /> sd_trm</li>
						<li><input type="checkbox" name="select_table[]" value="sd_wav" /> sd_wav</li>
						<li><input type="checkbox" name="select_table[]" value="si" /> si</li>
						<li><input type="checkbox" name="select_table[]" value="si_cmp" /> si_cmp</li>
						<li><input type="checkbox" name="select_table[]" value="sn" /> sn</li>
						<li><input type="checkbox" name="select_table[]" value="ss" /> ss</li>
						<li><input type="checkbox" name="select_table[]" value="st_eqt" /> st_eqt</li>
						<li><input type="checkbox" name="select_table[]" value="td" /> td</li>
						<li><input type="checkbox" name="select_table[]" value="td_img" /> td_img</li>
						<li><input type="checkbox" name="select_table[]" value="td_pix" /> td_pix</li>
						<li><input type="checkbox" name="select_table[]" value="ti" /> ti</li>
						<li><input type="checkbox" name="select_table[]" value="ts" /> ts</li>
						<li><input type="checkbox" name="select_table[]" value="vd" /> vd</li>
						<li><input type="checkbox" name="select_table[]" value="vd_inf" /> vd_inf</li>
						<li><input type="checkbox" name="select_table[]" value="vd_mag" /> vd_mag</li>
						<li><input type="checkbox" name="select_table[]" value="vd_tec" /> vd_tec</li>
						<li><input type="checkbox" name="select_table[]" value="ms" /> ms</li>
						<li><input type="checkbox" name="select_table[]" value="mi" /> mi</li>
						<li><input type="checkbox" name="select_table[]" value="med"/> med</li>						
					</ul>
					<input type="submit" name="check_select_table_ok" value="OK" />
				</form>

			</div>
		</div>
		
		<!-- Footer -->
			<div>
				<?php include 'php/include/footer_main_beta.php'; ?>
			</div>
		
	</div>
</body>
</html>
