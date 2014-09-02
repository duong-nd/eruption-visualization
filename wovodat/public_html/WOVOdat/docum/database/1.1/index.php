<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>WOVOdat :: The World Organization of Volcano Observatories (WOVO): Database of Volcanic Unrest (WOVOdat), by IAVCEI</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8">
	<meta http-equiv="content-type" content="text/html;charset=iso-8859-1">
	<meta name="description" content="The World Organization of Volcano Observatories (WOVO): Database of Volcanic Unrest (WOVOdat)">
	<meta name="keywords" content="Volcano, Vulcano, Volcanoes, Vulcanoes">
	<link href="/css/styles_beta.css" rel="stylesheet">
	<link href="/gif2/WOVOfavicon.ico" type="image/x-icon" rel="SHORTCUT ICON">
	<script language="javascript" type="text/javascript" src="/js/scripts.js"></script>
</head>
<body>

	<div id="wrapborder">
	<div id="wrap">
		<?php include 'php/include/header_beta.php'; ?>
		<!-- Content -->
		<div id="content">
		<div id="content_ref_top"></div>
		<div id="content_ref">
		
			<!-- Left division: list of tables -->
			<div id="table_list">
				<h3>Alphabetical list of tables</h3>
				<ul class="table_list_table">
					<li><a href="#cb"><b>cb</b> - Bibliographic</a></li>
					<li><a href="#cc"><b>cc</b> - Contact</a></li>
					<li><a href="#ch"><b>ch</b> - Change</a></li>
					<li><a href="#cm"><b>cm</b> - Image</a></li>
					<li><a href="#cn"><b>cn</b> - Common network</a></li>
					<li><a href="#co"><b>co</b> - Observation</a></li>
					<li><a href="#cp"><b>cp</b> - Permission</a></li>
					<li><a href="#cr"><b>cr</b> - Registry</a></li>
					<li><a href="#cr_tmp"><b>cr_tmp</b> - Temporary registry</a></li>
					<li><a href="#cs"><b>cs</b> - Airplane/Satellite</a></li>
					<li><a href="#cu"><b>cu</b> - Upload history</a></li>
					<li><a href="#dd_ang"><b>dd_ang</b> - Angle</a></li>
					<li><a href="#dd_edm"><b>dd_edm</b> - EDM</a></li>
					<li><a href="#dd_gps"><b>dd_gps</b> - GPS</a></li>
					<li><a href="#dd_gpv"><b>dd_gpv</b> - GPS vector</a></li>
					<li><a href="#dd_lev"><b>dd_lev</b> - Leveling</a></li>
					<li><a href="#dd_sar"><b>dd_sar</b> - InSAR image</a></li>
					<li><a href="#dd_srd"><b>dd_srd</b> - InSAR pixel</a></li>
					<li><a href="#dd_str"><b>dd_str</b> - Strain</a></li>
					<li><a href="#dd_tlt"><b>dd_tlt</b> - Electronic tilt</a></li>
					<li><a href="#dd_tlv"><b>dd_tlv</b> - Tilt vector</a></li>
					<li><a href="#di_gen"><b>di_gen</b> - General deformation instrument</a></li>
					<li><a href="#di_tlt"><b>di_tlt</b> - Tiltmeter/Strainmeter</a></li>
					<li><a href="#ds"><b>ds</b> - Deformation station</a></li>
					<li><a href="#ed"><b>ed</b> - Eruption</a></li>
					<li><a href="#ed_for"><b>ed_for</b> - Eruption forecast</a></li>
					<li><a href="#ed_phs"><b>ed_phs</b> - Eruption phase</a></li>
					<li><a href="#ed_vid"><b>ed_vid</b> - Eruption video</a></li>
					<li><a href="#fd_ele"><b>fd_ele</b> - Electric fields</a></li>
					<li><a href="#fd_gra"><b>fd_gra</b> - Gravity</a></li>
					<li><a href="#fd_mag"><b>fd_mag</b> - Magnetic fields</a></li>
					<li><a href="#fd_mgv"><b>fd_mgv</b> - Magnetic vector</a></li>
					<li><a href="#fi"><b>fi</b> - Fields instrument</a></li>
					<li><a href="#fs"><b>fs</b> - Fields station</a></li>
					<li><a href="#gd"><b>gd</b> - Directly sampled gas</a></li>
					<li><a href="#gd_plu"><b>gd_plu</b> - Plume</a></li>
					<li><a href="#gd_sol"><b>gd_sol</b> - Soil efflux</a></li>
					<li><a href="#gi"><b>gi</b> - Gas instrument</a></li>
					<li><a href="#gs"><b>gs</b> - Gas station</a></li>
					<li><a href="#hd"><b>hd</b> - Hydrologic data</a></li>
					<li><a href="#hi"><b>hi</b> - Hydrologic instrument</a></li>
					<li><a href="#hs"><b>hs</b> - Hydrologic station</a></li>
					<li><a href="#ip_hyd"><b>ip_hyd</b> - Hydrothermal system interaction</a></li>
					<li><a href="#ip_mag"><b>ip_mag</b> - Magma movement</a></li>
					<li><a href="#ip_pres"><b>ip_pres</b> - Buildup of magma pressure</a></li>
					<li><a href="#ip_sat"><b>ip_sat</b> - Volatile saturation</a></li>
					<li><a href="#ip_tec"><b>ip_tec</b> - Regional tectonics interaction</a></li>
					<li><a href="#jj_concon"><b>jj_concon</b> - Users to users permissions</a></li>
					<li><a href="#jj_imgx"><b>jj_imgx</b> - Image related to data</a></li>
					<li><a href="#jj_volcon"><b>jj_volcon</b> - Contacts for volcanoes</a></li>
					<li><a href="#jj_volnet"><b>jj_volnet</b> - Networks monitoring volcanoes</a></li>
					<li><a href="#j_sarsat"><b>jj_sarsat</b> - InSAR images created by satellites</a></li>
					<li><a href="#md"><b>md</b> - Map</a></li>
					<li><a href="#med"><b>med</b> - Meteo Data</a></li>
					<li><a href="#mi"><b>mi</b> - Meteo instrument</a></li>
					<li><a href="#ms"><b>ms</b> - Meteo station</a></li>
					<li><a href="#sd_evn"><b>sd_evn</b> - Event from a network</a></li>
					<li><a href="#sd_evs"><b>sd_evs</b> - Event from a single station</a></li>
					<li><a href="#sd_int"><b>sd_int</b> - Intensity</a></li>
					<li><a href="#sd_ivl"><b>sd_ivl</b> - Interval</a></li>
					<li><a href="#sd_rsm"><b>sd_rsm</b> - RSAM data</a></li>
					<li><a href="#sd_sam"><b>sd_sam</b> - RSAM-SSAM</a></li>
					<li><a href="#sd_ssm"><b>sd_ssm</b> - SSAM data</a></li>
					<li><a href="#sd_trm"><b>sd_trm</b> - Tremor</a></li>
					<li><a href="#sd_wav"><b>sd_wav</b> - Waveform</a></li>
					<li><a href="#si"><b>si</b> - Seismic instrument</a></li>
					<li><a href="#si_cmp"><b>si_cmp</b> - Seismic component</a></li>
					<li><a href="#sn"><b>sn</b> - Seismic network</a></li>
					<li><a href="#ss"><b>ss</b> - Seismic station</a></li>
					<li><a href="#st_eqt"><b>st_eqt</b> - Earthquake terminology translation</a></li>
					<li><a href="#td"><b>td</b> - Ground-based thermal data</a></li>
					<li><a href="#td_img"><b>td_img</b> - Thermal image</a></li>
					<li><a href="#td_pix"><b>td_pix</b> - Thermal pixel</a></li>
					<li><a href="#ti"><b>ti</b> - Thermal instrument</a></li>
					<li><a href="#ts"><b>ts</b> - Thermal station</a></li>
					<li><a href="#vd"><b>vd</b> - Volcano</a></li>
					<li><a href="#vd_inf"><b>vd_inf</b> - Volcano information</a></li>
					<li><a href="#vd_mag"><b>vd_mag</b> - Magma chamber</a></li>
					<li><a href="#vd_tec"><b>vd_tec</b> - Tectonic setting</a></li>
				</ul>
			</div>
			
			<!-- Right division: main content -->
			<div id="main_content">
				<a name="top" id="top"></a>
				<h1>WOVOdat1.1 documentation</h1>
				<p>This page contains a full description of the database structure.</p>
				<p>This description brings a technical insight of the database. People who wish to know more about the database structure may thus use this document as a reference. For each table of the database, the fields, indexes, links and constraints are described.</p>
				<p>An offline version of this documentation is available <a href="/docum/database/1.1/wovodat11_tech.pdf">here</a>.</p>
				
				<h2>Updates</h2>
				<p>Latest updates to the database: <em>to be added later</em></p>
				
				<h2>List of tables</h2>
				<p>Here is the list of tables used in the database, sorted by field:</p>
				<ul>
					<li>
						<h3>Volcano</h3>
						<ul class="line_height_130">
							<li><a href="#vd">Volcano - vd</a></li>
							<li><a href="#vd_inf">Volcano information - vd_inf</a></li>
							<li><a href="#vd_mag">Magma chamber - vd_mag</a></li>
							<li><a href="#vd_tec">Tectonic setting - vd_tec</a></li>
						</ul>
					</li>
					<li>
						<h3>Eruption</h3>
						<ul class="line_height_130">
							<li><a href="#ed">Eruption - ed</a></li>
							<li><a href="#ed_vid">Eruption video - ed_vid</a></li>
							<li><a href="#ed_phs">Eruption phase - ed_phs</a></li>
							<li><a href="#ed_for">Eruption forecast - ed_for</a></li>
						</ul>
					</li>
					<li>
						<h3>Deformation</h3>
						<ul>
							<li>
								<h4>Monitoring system</h4>
								<ul class="line_height_130">
									<li><a href="#cn">Common network - cn</a></li>
									<li><a href="#ds">Deformation station - ds</a></li>
									<li><a href="#di_gen">Deformation instrument (general) - di_gen</a></li>
									<li><a href="#di_tlt">Tiltmeter/Strainmeter - di_tlt</a></li>
								</ul>
							</li>
							<li>
								<h4>Data</h4>
								<ul class="line_height_130">
									<li><a href="#dd_ang">Angle - dd_ang</a></li>
									<li><a href="#dd_edm">EDM - dd_edm</a></li>
									<li><a href="#dd_gps">GPS - dd_gps</a></li>
									<li><a href="#dd_gpv">GPS vector - dd_gpv</a></li>
									<li><a href="#dd_lev">Leveling - dd_lev</a></li>
									<li><a href="#dd_str">Strain - dd_str</a></li>
									<li><a href="#dd_tlt">Electronic tilt - dd_tlt</a></li>
									<li><a href="#dd_tlv">Tilt vector - dd_tlv</a></li>
									<li><a href="#dd_sar">InSAR image - dd_sar</a></li>
									<li><a href="#dd_srd">InSAR pixel - dd_srd</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li>
						<h3>Fields</h3>
						<ul>
							<li>
								<h4>Monitoring system</h4>
								<ul class="line_height_130">
									<li><a href="#cn">Common network - cn</a></li>
									<li><a href="#fs">Fields station - fs</a></li>
									<li><a href="#fi">Fields instrument - fi</a></li>
								</ul>
							</li>
							<li>
								<h4>Data</h4>
								<ul class="line_height_130">
									<li><a href="#fd_ele">Electric fields - fd_ele</a></li>
									<li><a href="#fd_gra">Gravity - fd_gra</a></li>
									<li><a href="#fd_mag">Magnetic fields - fd_mag</a></li>
									<li><a href="#fd_mgv">Magnetic vector - fd_mgv</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li>
						<h3>Gas</h3>
						<ul>
							<li>
								<h4>Monitoring system</h4>
								<ul class="line_height_130">
									<li><a href="#cn">Common network - cn</a></li>
									<li><a href="#gs">Gas station - gs</a></li>
									<li><a href="#gi">Gas instrument - gi</a></li>
								</ul>
							</li>
							<li>
								<h4>Data</h4>
								<ul class="line_height_130">
									<li><a href="#gd">Directly sampled gas - gd</a></li>
									<li><a href="#gd_plu">Plume - gd_plu</a></li>
									<li><a href="#gd_sol">Soil efflux - gd_sol</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li>
						<h3>Hydrologic</h3>
						<ul>
							<li>
								<h4>Monitoring system</h4>
								<ul class="line_height_130">
									<li><a href="#cn">Common network - cn</a></li>
									<li><a href="#hs">Hydrologic station - hs</a></li>
									<li><a href="#hi">Hydrologic instrument - hi</a></li>
								</ul>
							</li>
							<li>
								<h4>Data</h4>
								<ul class="line_height_130">
									<li><a href="#hd">Hydrologic data - hd</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li>
						<h3>Meteo</h3>
						<ul>
							<li>
								<h4>Meteo system</h4>
								<ul class="line_height_130">
									<li><a href="#cn">Common network - cn</a></li>
									<li><a href="#ms">Meteo station - ms</a></li>
									<li><a href="#mi">Meteo instrument - mi</a></li>
								</ul>
							</li>
							<li>
								<h4>Data</h4>
								<ul class="line_height_130">
									<li><a href="#med">Meteo data - med</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li>
						<h3>Seismic</h3>
						<ul>
							<li>
								<h4>Monitoring system</h4>
								<ul class="line_height_130">
									<li><a href="#sn">Seismic network - sn</a></li>
									<li><a href="#ss">Seismic station - ss</a></li>
									<li><a href="#si">Seismic instrument - si</a></li>
									<li><a href="#si_cmp">Seismic component - si_cmp</a></li>
								</ul>
							</li>
							<li>
								<h4>Data</h4>
								<ul class="line_height_130">
									<li><a href="#sd_evn">Event recorded by a network - sd_evn</a></li>
									<li><a href="#sd_evs">Event recorded by a single station - sd_evs</a></li>
									<li><a href="#sd_trm">Tremor - sd_trm</a></li>
									<li><a href="#sd_int">Intensity - sd_int</a></li>
									<li><a href="#sd_ivl">Interval - sd_ivl</a></li>
									<li><a href="#sd_wav">Waveform - sd_wav</a></li>
									<li><a href="#sd_sam">RSAM-SSAM - sd_sam</a></li>
									<li><a href="#sd_rsm">RSAM data - sd_rsm</a></li>
									<li><a href="#sd_ssm">SSAM data - sd_ssm</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li>
						<h3>Thermal</h3>
						<ul>
							<li>
								<h4>Monitoring system</h4>
								<ul class="line_height_130">
									<li><a href="#cn">Common network - cn</a></li>
									<li><a href="#ts">Thermal station - ts</a></li>
									<li><a href="#ti">Thermal instrument - ti</a></li>
								</ul>
							</li>
							<li>
								<h4>Data</h4>
								<ul class="line_height_130">
									<li><a href="#td">Ground-based thermal data - td</a></li>
									<li><a href="#td_img">Thermal image - td_img</a></li>
									<li><a href="#td_pix">Thermal pixel - td_pix</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li>
						<h3>Inferred processes</h3>
						<ul class="line_height_130">
							<li><a href="#ip_hyd">Hydrothermal system interaction - ip_hyd</a></li>
							<li><a href="#ip_mag">Magma movement - ip_mag</a></li>
							<li><a href="#ip_pres">Buildup of magma pressure - ip_pres</a></li>
							<li><a href="#ip_sat">Volatile saturation - ip_sat</a></li>
							<li><a href="#ip_tec">Regional tectonics interaction - ip_tec</a></li>
						</ul>
					</li>
					<li>
						<h3>Other data</h3>
						<ul class="line_height_130">
							<li><a href="#cc">Contact - cc</a></li>
							<li><a href="#cb">Bibliographic - cb</a></li>
							<li><a href="#co">Observation - co</a></li>
							<li><a href="#cm">Image - cm</a></li>
							<li><a href="#md">Map - md</a></li>
							<li><a href="#cs">Airplane/Satellite - cs</a></li>
							<li><a href="#st_eqt">Earthquake terminology translation - st_eqt</a></li>
						</ul>
					</li>
					<li>
						<h3>System</h3>
						<ul>
							<li>
								<h4>Links</h4>
								<ul class="line_height_130">
									<li><a href="#jj_concon">Users to users permissions - jj_concon</a></li>
									<li><a href="#jj_imgx">Image related to data - jj_imgx</a></li>
									<li><a href="#jj_volcon">Contacts for volcanoes - jj_volcon</a></li>
									<li><a href="#jj_volnet">Networks monitoring volcanoes - jj_volnet</a></li>
									<li><a href="#j_sarsat">InSAR images created by satellites - j_sarsat</a></li>
								</ul>
							</li>
							<li>
								<h4>Database administration</h4>
								<ul class="line_height_130">
									<li><a href="#cr">Registry - cr</a></li>
									<li><a href="#cr_tmp">Temporary registry - cr_tmp</a></li>
									<li><a href="#cp">Permission - cp</a></li>
									<li><a href="#cu">Upload history - cu</a></li>
									<li><a href="#ch">Change - ch</a></li>
								</ul>
							</li>
						</ul>
					</li>
				</ul>
				
				<br />
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				<!-- cb - Bibliographic -->
				<h2 class="element_title"><a name="cb" id="cb"></a>cb - Bibliographic</h2>
				
				<h3>Description</h3>
				<p>This table stores information about articles, papers, books, and web sites, with information that is related to the data in WOVOdat.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>cb_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID, bibliography identifier</td>
					</tr>
					<tr>
						<td>cb_auth</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Authors/Editors</td>
					</tr>
					<tr>
						<td>cb_year</td>
						<td>year(4)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publication year</td>
					</tr>
					<tr>
						<td>cb_title</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Title</td>
					</tr>
					<tr>
						<td>cb_journ</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Journal</td>
					</tr>
					<tr>
						<td>cb_vol</td>
						<td>varchar(20)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Volume</td>
					</tr>
					<tr>
						<td>cb_pub</td>
						<td>varchar(50)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publisher</td>
					</tr>
					<tr>
						<td>cb_page</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Pages</td>
					</tr>
					<tr>
						<td>cb_doi</td>
						<td>varchar(20)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Digital Object Identifier</td>
					</tr>
					<tr>
						<td>cb_isbn</td>
						<td>varchar(13)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>International Standard Book Number</td>
					</tr>
					<tr>
						<td>cb_url</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Info on the web</td>
					</tr>
					<tr>
						<td>cb_labadr</td>
						<td>varchar(320)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Email address of observatory</td>
					</tr>
					<tr>
						<td>cb_keywords</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Keywords</td>
					</tr>
					<tr>
						<td>cb_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>	
					<tr>
						<td>cb_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>cb_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<p>None</p>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- cc - Contact -->
				<h2 class="element_title"><a name="cc" id="cc"></a>cc - Contact</h2>
				
				<h3>Description</h3>
				<p>This table provides all of the contact information for a person, observatory, or institution.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>Contact ID</td>
					</tr>
					<tr>
						<td>cc_code</td>
						<td>varchar(15)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Contact Code</td>
					</tr>
					<tr>
						<td>cc_code2</td>
						<td>varchar(15)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Contact Code alias</td>
					</tr>
					<tr>
						<td>cc_fname</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>First name</td>
					</tr>
					<tr>
						<td>cc_lname</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Last name</td>
					</tr>
					<tr>
						<td>cc_obs</td>
						<td>varchar(150)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Observatory</td>
					</tr>
					<tr>
						<td>cc_add1</td>
						<td>varchar(60)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Address 1</td>
					</tr>
					<tr>
						<td>cc_add2</td>
						<td>varchar(60)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Address 2</td>
					</tr>
					<tr>
						<td>cc_city</td>
						<td>varchar(50)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>City</td>
					</tr>
					<tr>
						<td>cc_state</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>State</td>
					</tr>
					<tr>
						<td>cc_country</td>
						<td>varchar(50)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Country</td>
					</tr>
					<tr>
						<td>cc_post</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Postal code</td>
					</tr>
					<tr>
						<td>cc_url</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Web address</td>
					</tr>
					<tr>
						<td>cc_email</td>
						<td>varchar(320)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Email</td>
					</tr>
					<tr>
						<td>cc_phone</td>
						<td>varchar(50)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Phone</td>
					</tr>
					<tr>
						<td>cc_phone2</td>
						<td>varchar(50)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Phone 2</td>
					</tr>
					<tr>
						<td>cc_fax</td>
						<td>varchar(60)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Fax</td>
					</tr>
					<tr>
						<td>cc_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>cc_id</td>
					</tr>
					<tr>
						<td>CODE</td>
						<td>UNIQUE</td>
						<td>cc_code</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<p>None</p>
				
				<h3>Restrictions</h3>
				<p>None</p>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- ch - Change -->
				<h2 class="element_title"><a name="ch" id="ch"></a>ch - Change</h2>
				
				<h3>Description</h3>
				<p>This table stores information about any changes that have been made in the database.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>ch_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>ch_linkname</td>
						<td>enum('cb', 'cc', 'ch', 'cm', 'cn', 'co', 'cp', 'cr', 'cr_tmp', 'cs', 'cu', 'dd_ang', 'dd_edm', 'dd_gps', 'dd_gpv', 'dd_lev', 'dd_sar', 'dd_srd', 'dd_str', 'dd_tlt', 'dd_tlv', 'di_gen', 'di_tlt', 'ds', 'ed', 'ed_for', 'ed_phs', 'ed_vid', 'fd_ele', 'fd_gra', 'fd_mag', 'fd_mgv', 'fi', 'fs', 'gd', 'gd_plu', 'gd_sol', 'gi', 'gs', 'hd', 'hi', 'hs', 'ip_hyd', 'ip_mag', 'ip_pres', 'ip_sat', 'ip_tec', 'jj_concon', 'jj_imgx', 'jj_volcon', 'jj_volnet', 'j_sarsat', 'md', 'med', 'mi', 'ms', 'sd_evn', 'sd_evs', 'sd_int', 'sd_ivl', 'sd_rsm', 'sd_sam', 'sd_ssm', 'sd_trm', 'sd_wav', 'si', 'si_cmp', 'sn', 'ss', 'st_eqt', 'td', 'td_img', 'td_pix', 'ti', 'ts', 'vd', 'vd_inf', 'vd_mag', 'vd_tec')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Table</td>
					</tr>
					<tr>
						<td>ch_link_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>ID in table</td>
					</tr>
					<tr>
						<td>ch_atname</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Field/attribute name</td>
					</tr>
					<tr>
						<td>ch_desc</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Description</td>
					</tr>
					<tr>
						<td>ch_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>					
					<tr>
						<td>ch_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>ch_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<p>None</p>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- cm - Image -->
				<h2 class="element_title"><a name="cm" id="cm"></a>cm - Image</h2>
				
				<h3>Description</h3>
				<p>This table stores images that support other WOVOdat data.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>cm_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>Image ID</td>
					</tr>
					<tr>
						<td>cm_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Image Code</td>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Volcano Identifier</td>
					</tr>
					<tr>
						<td>cm_lat</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Latitude</td>
					</tr>
					<tr>
						<td>cm_lon</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Longitude</td>
					</tr>
					<tr>
						<td>cm_location</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Location</td>
					</tr>
					<tr>
						<td>cm_description</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Description (including the scale)</td>
					</tr>
					<tr>
						<td>cm_format</td>
						<td>varchar(10)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Image Format</td>
					</tr>
					<tr>
						<td>cm_date</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Date</td>
					</tr>
					<tr>
						<td>cm_date_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Date uncertainty</td>
					</tr>
					<tr>
						<td>cm_image</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link/pat where the image stored</td>
					</tr>
					<tr>
						<td>cm_usage</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Usage of image (copyright)</td>
					</tr>
					<tr>
						<td>cm_keywords</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Keywords</td>
					</tr>
					<tr>
						<td>cm_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>
					<tr>
						<td>cm_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>					
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>cm_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>cm_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>cm_id</td>
					</tr>
					<tr>
						<td rowspan="2">CODE</td>
						<td rowspan="2">UNIQUE</td>
						<td>cm_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>vd.vd_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>					
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<p>None</p>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- cn - Common network -->
				<h2 class="element_title"><a name="cn" id="cn"></a>cn - Common network</h2>
				
				<h3>Description</h3>
				<p>This table contains information about the network of stations that collect data at a particular site, in general at one volcano.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>cn_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID, Common network Identifier</td>
					</tr>
					<tr>
						<td>cn_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Common network Code</td>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Volcano Identifier</td>
					</tr>
					<tr>
						<td>cn_name</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Network Name</td>
					</tr>
					<tr>
						<td>cn_type</td>
						<td>enum('Deformation','Fields','Gas','Hydrologic','Thermal','Meteo','Unknown')</td>
						<td></td>
						<td>No</td>
						<td>Unknown</td>
						<td></td>
						<td></td>
						<td>common network Type</td>
					</tr>
					<tr>
						<td>cn_area</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>km<sup>2</sup></td>
						<td>Network Area coverage</td>
					</tr>
					<tr>
						<td>cn_map</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link/path to the Map of the network (from Observatory)</td>
					</tr>
					<tr>
						<td>cn_stime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time</td>
					</tr>
					<tr>
						<td>cn_stime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time uncertainty</td>
					</tr>
					<tr>
						<td>cn_etime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End time</td>
					</tr>
					<tr>
						<td>cn_etime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End time uncertainty</td>
					</tr>
					<tr>
						<td>cn_utc</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Difference from UTC</td>
					</tr>
					<tr>
						<td>cn_desc</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Description</td>
					</tr> 
					<tr>
						<td>cn_ori</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>		
					</tr>
					<tr>
						<td>cn_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>cn_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>cn_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>cn_id</td>
					</tr>
					<tr>
						<td rowspan="3">CODE</td>
						<td rowspan="3">UNIQUE</td>
						<td>cn_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
					<tr>
						<td>cn_stime</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>vd.vd_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li>cn_stime &lt; cn_etime</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- co - Observation -->
				<h2 class="element_title"><a name="co" id="co"></a>co - Observation</h2>
				
				<h3>Description</h3>
				<p>This table provides storage for observations about volcanic activity.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>co_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>Observation ID</td>
					</tr>
					<tr>
						<td>co_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Observation Code</td>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Volcano Identifier</td>
					</tr>
					<tr>
						<td>co_observe</td>
						<td>text</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Description</td>
					</tr>
					<tr>
						<td>co_stime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time</td>
					</tr>
					<tr>
						<td>co_stime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time uncertainty</td>
					</tr>
					<tr>
						<td>co_etime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End time</td>
					</tr>
					<tr>
						<td>co_etime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End time uncertainty</td>
					</tr>  
					<tr>
						<td>co_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>	
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Observer ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>		
					<tr>
						<td>co_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>co_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>	
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>co_id</td>
					</tr>
					<tr>
						<td rowspan="2">CODE</td>
						<td rowspan="2">UNIQUE</td>
						<td>co_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>vd.vd_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li>co_stime &lt; co_etime</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- cp - Permission -->
				<h2 class="element_title"><a name="cp" id="cp"></a>cp - Permission</h2>
				
				<h3>Description</h3>
				<p>This table provides the access information for each registered user.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>cp_id</td>
						<td>tinyint(3)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>cr_id</td>
						<td>tinyint(3)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Registry ID</td>
					</tr>
					<tr>
						<td>cp_access</td>
						<td>enum('0','1','2','3','4','5','6','7','8','9')</td>
						<td></td>
						<td>No</td>
						<td>9</td>
						<td></td>
						<td></td>
						<td>Access level, for example: 0=Developer, 9=Minimum access</td>
					</tr>
					<tr>
						<td>cp_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>cp_id</td>
					</tr>
					<tr>
						<td>REGISTERED USER</td>
						<td>UNIQUE</td>
						<td>cr_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>cr_id</td>
						<td>cr.cr_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<p>None</p>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- cr - Registry -->
				<h2 class="element_title"><a name="cr" id="cr"></a>cr - Registry</h2>
				
				<h3>Description</h3>
				<p>This table provides username and password information for people who registered to WOVOdat.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>cr_id</td>
						<td>tinyint(3)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>User ID</td>
					</tr>
					<tr>
						<td>cr_uname</td>
						<td>varchar(30)</td>
						<td></td>
						<td>No</td>
						<td></td>
						<td></td>
						<td></td>
						<td>Username</td>
					</tr>
					<tr>
						<td>cr_pwd</td>
						<td>varchar(60)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Password</td>
					</tr>
					<tr>
						<td>cr_regdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Registration date</td>
					</tr>
					<tr>
						<td>cr_update</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Last update</td>  
					</tr> 
					<tr>
						<td>cr_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>	
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>cr_id</td>
					</tr>
					<tr>
						<td>USERNAME</td>
						<td>UNIQUE</td>
						<td>cr_uname</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<p>None</p>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- cr_tmp - Temporary registry -->
				<h2 class="element_title"><a name="cr_tmp" id="cr_tmp"></a>cr_tmp - Temporary registry</h2>
				
				<h3>Description</h3>
				<p>This table stores information about users who wish to register to WOVOdat while waiting for them to confirm registration by clicking the link provided in a confirmation email.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>cr_tmp_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>cr_tmp_time</td>
						<td>datetime</td>
						<td></td>
						<td>No</td>
						<td></td>
						<td></td>
						<td></td>
						<td>Time</td>
					</tr>
					<tr>
						<td>cr_tmp_email</td>
						<td>varchar(320)</td>
						<td></td>
						<td>No</td>
						<td></td>
						<td></td>
						<td></td>
						<td>Email</td>
					</tr>
					<tr>
						<td>cr_tmp_fname</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>First name</td>
					</tr>
					<tr>
						<td>cr_tmp_lname</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Last name</td>
					</tr>
					<tr>
						<td>cr_tmp_obs</td>
						<td>varchar(150)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Observatory</td>
					</tr>
					<tr>
						<td>cr_tmp_add1</td>
						<td>varchar(60)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Address 1</td>
					</tr>
					<tr>
						<td>cr_tmp_add2</td>
						<td>varchar(60)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Address 2</td>
					</tr>
					<tr>
						<td>cr_tmp_city</td>
						<td>varchar(50)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>City</td>
					</tr>
					<tr>
						<td>cr_tmp_state</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>State/Province</td>
					</tr>
					<tr>
						<td>cr_tmp_country</td>
						<td>varchar(50)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Country</td>
					</tr>
					<tr>
						<td>cr_tmp_post</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Postal code</td>
					</tr>
					<tr>
						<td>cr_tmp_url</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Web address</td>
					</tr>
					<tr>
						<td>cr_tmp_phone</td>
						<td>varchar(50)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Phone</td>
					</tr>
					<tr>
						<td>cr_tmp_phone2</td>
						<td>varchar(50)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Phone 2</td>
					</tr>
					<tr>
						<td>cr_tmp_fax</td>
						<td>varchar(60)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Fax</td>
					</tr>
					<tr>
						<td>cr_tmp_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cr_tmp_uname</td>
						<td>varchar(30)</td>
						<td></td>
						<td>No</td>
						<td></td>
						<td></td>
						<td></td>
						<td>Username</td>
					</tr>
					<tr>
						<td>cr_tmp_pwd</td>
						<td>varchar(60)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Password</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>cr_tmp_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<p>None</p>
				
				<h3>Restrictions</h3>
				<p>None</p>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- cs - Satellite/Airplane -->
				<h2 class="element_title"><a name="cs" id="cs"></a>cs - Satellite/Airplane</h2>
				
				<h3>Description</h3>
				<p>This table stores information about satellites and airplanes that are used for collecting data from above the surface of the earth.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>cs_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>satellite/ airplane ID</td>
					</tr>
					<tr>
						<td>cs_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>satellite/ airplane Code</td>
					</tr>
					<tr>
						<td>cs_type</td>
						<td>enum('S', 'A')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Type (A=Airplane, S=Satellite)</td>
					</tr>
					<tr>
						<td>cs_name</td>
						<td>varchar(50)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>satellite/ airplane Name</td>
					</tr>
					<tr>
						<td>cs_stime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time</td>
					</tr>
					<tr>
						<td>cs_stime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time uncertainty</td>
					</tr>
					<tr>
						<td>cs_etime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End time</td>
					</tr>
					<tr>
						<td>cs_etime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End time uncertainty</td>
					</tr>
					<tr>
						<td>cs_desc</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Description</td>
					</tr>
					<tr>
						<td>cs_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>
					<tr>
						<td>cs_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>					
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>cs_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>cs_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>cs_id</td>
					</tr>
					<tr>
						<td rowspan="3">CODE</td>
						<td rowspan="3">UNIQUE</td>
						<td>cs_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
					<tr>
						<td>cs_stime</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>					
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li>cs_stime &lt; cs_etime</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- cu - Upload history -->
				<h2 class="element_title"><a name="cu" id="cu"></a>cu - Upload history</h2>
				
				<h3>Description</h3>
				<p>This table stores information about all uploads made to the database, including those which failed.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>cu_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>cu_file</td>
						<td>varchar(255)</td>
						<td></td>
						<td>No</td>
						<td></td>
						<td></td>
						<td></td>
						<td>Original file name</td>
					</tr>
					<tr>
						<td>cu_type</td>
						<td>enum('I', 'N', 'U', 'T', 'W', 'F')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Type of upload: I=In database, N=Not in database (test), U=Undone, T=Temporary (to be treated later), W=translated to WOVOML , F=Failed</td>
					</tr>
					<tr>
						<td>cu_com</td>
						<td>text</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments or error message</td>
					</tr>
					<tr>
						<td>cu_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>cu_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<p>None</p>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- dd_ang - Angle -->
				<h2 class="element_title"><a name="dd_ang" id="dd_ang"></a>dd_ang - Angle</h2>
				
				<h3>Description</h3>
				<p>This table contains a few angles from early geodetic surveys where someone would stand on a high point (on top of a mountain) and measure the horizontal and vertical angles to prominent features in the area.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>dd_ang_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>Deformation angle ID</td>
					</tr>
					<tr>
						<td>dd_ang_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Deformation angle Code</td>
					</tr>
					<tr>
						<td>di_gen_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>General deformation instrument ID</td>
					</tr>
					<tr>
						<td>ds_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Theodolite/total station instrument identifier ID</td>
					</tr>
					<tr>
						<td>ds_id1</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Target station 1 ID</td>
					</tr>
					<tr>
						<td>ds_id2</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Target station 2 ID</td>
					</tr>
					<tr>
						<td>dd_ang_time</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Measurement time</td>
					</tr>
					<tr>
						<td>dd_ang_time_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Measurement time uncertainty</td>
					</tr>
					<tr>
						<td>dd_ang_hort1</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Horizontal angle to target 1</td>
					</tr>
					<tr>
						<td>dd_ang_hort2</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Horizontal angle to target 2</td>
					</tr>
					<tr>
						<td>dd_ang_vert1</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Vertical angle to target 1</td>
					</tr>
					<tr>
						<td>dd_ang_vert2</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Vertical angle to target 2</td>
					</tr>
					<tr>
						<td>dd_ang_herr1</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Horizontal error on angle 1</td>
					</tr>
					<tr>
						<td>dd_ang_herr2</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Horizontal error on angle 2</td>
					</tr>
					<tr>
						<td>dd_ang_verr1</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Vertical error on angle 1</td>
					</tr>
					<tr>
						<td>dd_ang_verr2</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Vertical error on angle 2</td>
					</tr>
					<tr>
						<td>dd_ang_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>					
					<tr>
						<td>dd_ang_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>dd_ang_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>dd_ang_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>dd_ang_id</td>
					</tr>
					<tr>
						<td rowspan="2">CODE</td>
						<td rowspan="2">UNIQUE</td>
						<td>dd_ang_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>di_gen_id</td>
						<td>di_gen.di_gen_id</td>
					</tr>
					<tr>
						<td>ds_id</td>
						<td>ds.ds_id</td>
					</tr>
					<tr>
						<td>ds_id1</td>
						<td>ds.ds_id</td>
					</tr>
					<tr>
						<td>ds_id2</td>
						<td>ds.ds_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>					
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li>0 &le; dd_ang_hort1 &le; 360</li>
					<li>0 &le; dd_ang_hort2 &le; 360</li>
					<li>-90 &le; dd_ang_vert1 &le; 90</li>
					<li>-90 &le; dd_ang_vert2 &le; 90</li>
					<li><em>di_gen_id</em>.di_gen_stime &le; dd_ang_time &le; <em>di_gen_id</em>.di_gen_etime</li>
					<li><em>ds_id</em>.ds_stime &le; dd_ang_time &le; <em>ds_id</em>.ds_etime</li>
					<li><em>ds_id1</em>.ds_stime &le; dd_ang_time &le; <em>ds_id1</em>.ds_etime</li>
					<li><em>ds_id2</em>.ds_stime &le; dd_ang_time &le; <em>ds_id2</em>.ds_etime</li>
					<li>ds_id = <em>di_gen_id</em>.ds_id</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- dd_edm - EDM -->
				<h2 class="element_title"><a name="dd_edm" id="dd_edm"></a>dd_edm - EDM</h2>
				
				<h3>Description</h3>
				<p>This table contains EDM data that were collected between two stations, an instrument station and a target or reflector station.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>dd_edm_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>dd_edm_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>di_gen_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>General deformation instrument ID</td>
					</tr>
					<tr>
						<td>ds_id1</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Instrument station ID</td>
					</tr>
					<tr>
						<td>ds_id2</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Target station ID</td>
					</tr>
					<tr>
						<td>dd_edm_time</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Measurement time</td>
					</tr>
					<tr>
						<td>dd_edm_time_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Measurement time uncertainty</td>
					</tr>
					<tr>
						<td>dd_edm_line</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m</td>
						<td>Line length</td>
					</tr>
					<tr>
						<td>dd_edm_cerr</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m</td>
						<td>Constant error</td>
					</tr>
					<tr>
						<td>dd_edm_serr</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>ppm</td>
						<td>Scale error</td>
					</tr>
					<tr>
						<td>dd_edm_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>
					<tr>
						<td>dd_edm_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>					
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>dd_edm_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>dd_edm_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>dd_edm_id</td>
					</tr>
					<tr>
						<td rowspan="2">CODE</td>
						<td rowspan="2">UNIQUE</td>
						<td>dd_edm_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>di_gen_id</td>
						<td>di_gen.di_gen_id</td>
					</tr>
					<tr>
						<td>ds_id1</td>
						<td>ds.ds_id</td>
					</tr>
					<tr>
						<td>ds_id2</td>
						<td>ds.ds_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>					
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li><em>di_gen_id</em>.di_gen_stime &le; dd_edm_time &le; <em>di_gen_id</em>.di_gen_etime</li>
					<li><em>ds_id1</em>.ds_stime &le; dd_edm_time &le; <em>ds_id1</em>.ds_etime</li>
					<li><em>ds_id2</em>.ds_stime &le; dd_edm_time &le; <em>ds_id2</em>.ds_etime</li>
					<li>ds_id1 = <em>di_gen_id</em>.ds_id</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- dd_gps - GPS -->
				<h2 class="element_title"><a name="dd_gps" id="dd_gps"></a>dd_gps - GPS</h2>
				
				<h3>Description</h3>
				<p>This table contains continuous and periodic data collected at a single station and referenced to two reference stations.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>dd_gps_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>dd_gps_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>di_gen_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>General deformation instrument ID</td>
					</tr>
					<tr>
						<td>ds_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>GPS station ID</td>
					</tr>
					<tr>
						<td>ds_id_ref1</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Reference station 1 ID</td>
					</tr>
					<tr>
						<td>ds_id_ref2</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Reference station 2 ID</td>
					</tr>
					<tr>
						<td>dd_gps_time</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Measurement time</td>
					</tr>
					<tr>
						<td>dd_gps_time_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Measurement time uncertainty</td>
					</tr>
					<tr>
						<td>dd_gps_lat</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Latitude</td>
					</tr>
					<tr>
						<td>dd_gps_lon</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Longitude</td>
					</tr>
					<tr>
						<td>dd_gps_elev</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m</td>
						<td>Elevation above sea level</td>
					</tr>
					<tr>
						<td>dd_gps_nserr</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>N-S error</td>
					</tr>
					<tr>
						<td>dd_gps_ewerr</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>E-W error</td>
					</tr>
					<tr>
						<td>dd_gps_verr</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m</td>
						<td>Vertical error</td>
					</tr>
					<tr>
						<td>dd_gps_software</td>
						<td>varchar(50)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Position-determining software</td>
					</tr>
					<tr>
						<td>dd_gps_orbits</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Orbits used</td>
					</tr>
					<tr>
						<td>dd_gps_dur</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>min</td>
						<td>Duration of the solution</td>
					</tr>
					<tr>
						<td>dd_gps_qual</td>
						<td>enum('E', 'G', 'P', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Quality: E=Excellent, G=Good, P=Poor, U=Unknown</td>
					</tr>
					<tr>
						<td>dd_gps_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>	
					<tr>
						<td>dd_gps_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>					
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>dd_gps_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>dd_gps_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>dd_gps_id</td>
					</tr>
					<tr>
						<td rowspan="2">CODE</td>
						<td rowspan="2">UNIQUE</td>
						<td>dd_gps_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>di_gen_id</td>
						<td>di_gen.di_gen_id</td>
					</tr>
					<tr>
						<td>ds_id</td>
						<td>ds.ds_id</td>
					</tr>
					<tr>
						<td>ds_id_ref1</td>
						<td>ds.ds_id</td>
					</tr>
					<tr>
						<td>ds_id_ref2</td>
						<td>ds.ds_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>					
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li><em>di_gen_id</em>.di_gen_stime &le; dd_gps_time &le; <em>di_gen_id</em>.di_gen_etime</li>
					<li><em>ds_id</em>.ds_stime &le; dd_gps_time &le; <em>ds_id</em>.ds_etime</li>
					<li><em>ds_id_ref1</em>.ds_stime &le; dd_gps_time &le; <em>ds_id_ref1</em>.ds_etime</li>
					<li><em>ds_id_ref2</em>.ds_stime &le; dd_gps_time &le; <em>ds_id_ref2</em>.ds_etime</li>
					<li>ds_id = <em>di_gen_id</em>.ds_id</li>
					<li>-90 &le; dd_gps_lat &le; 90</li>
					<li>-180 &le; dd_gps_lon &le; 180</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- dd_gpv - GPS vector -->
				<h2 class="element_title"><a name="dd_gpv" id="dd_gpv"></a>dd_gpv - GPS vector</h2>
				
				<h3>Description</h3>
				<p>This table contains vectors that were computed from GPS data where the actual positions are not available.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>dd_gpv_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>dd_gpv_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>di_gen_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>General deformation instrument ID</td>
					</tr>
					<tr>
						<td>ds_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Deformation station ID</td>
					</tr>
					<tr>
						<td>dd_gpv_stime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time</td>
					</tr>
					<tr>
						<td>dd_gpv_stime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time uncertainty</td>
					</tr>
					<tr>
						<td>dd_gpv_etime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End time</td>
					</tr>
					<tr>
						<td>dd_gpv_etime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End time uncertainty</td>
					</tr>
					<tr>
						<td>dd_gpv_dmag</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>mm</td>
						<td>Displacement magnitude</td>
					</tr>
					<tr>
						<td>dd_gpv_daz</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Displacement azimuth</td>
					</tr>
					<tr>
						<td>dd_gpv_vincl</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Vector inclination</td>
					</tr>
					<tr>
						<td>dd_gpv_N</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>mm</td>
						<td>North displacement</td>
					</tr>
					<tr>
						<td>dd_gpv_E</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>mm</td>
						<td>East displacement</td>
					</tr>
					<tr>
						<td>dd_gpv_vert</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>mm</td>
						<td>Vertical displacement</td>
					</tr>
					<tr>
						<td>dd_gpv_dherr</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>mm</td>
						<td>Magnitude horizontal uncertainty</td>
					</tr>
					<tr>
						<td>dd_gpv_dnerr</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>mm</td>
						<td>North displacement uncertainty</td>
					</tr>
					<tr>
						<td>dd_gpv_deerr</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>mm</td>
						<td>East displacement uncertainty</td>
					</tr>
					<tr>
						<td>dd_gpv_dverr</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>mm</td>
						<td>Magnitude vertical uncertainty</td>
					</tr>
					<tr>
						<td>dd_gpv_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>					
					<tr>
						<td>dd_gpv_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>dd_gpv_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>dd_gpv_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>dd_gpv_id</td>
					</tr>
					<tr>
						<td rowspan="2">CODE</td>
						<td rowspan="2">UNIQUE</td>
						<td>dd_gpv_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>di_gen_id</td>
						<td>di_gen.di_gen_id</td>
					</tr>
					<tr>
						<td>ds_id</td>
						<td>ds.ds_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>					
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li><em>di_gen_id</em>.di_gen_stime &le; dd_gpv_stime &le; <em>di_gen_id</em>.di_gen_etime</li>
					<li><em>ds_id</em>.ds_stime &le; dd_gpv_stime &le; <em>ds_id</em>.ds_etime</li>
					<li><em>di_gen_id</em>.di_gen_stime &le; dd_gpv_etime &le; <em>di_gen_id</em>.di_gen_etime</li>
					<li><em>ds_id</em>.ds_stime &le; dd_gpv_etime &le; <em>ds_id</em>.ds_etime</li>
					<li>dd_gpv_stime &le; dd_gpv_etime</li>
					<li>0 &le; dd_gpv_daz &le; 360</li>
					<li>0 &le; dd_gpv_vincl &le; 90</li>
					<li>ds_id = <em>di_gen_id</em>.ds_id</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- dd_lev - Leveling -->
				<h2 class="element_title"><a name="dd_lev" id="dd_lev"></a>dd_lev - Leveling</h2>
				
				<h3>Description</h3>
				<p>This table contains elevation changes between successive benchmarks of a leveling line.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>dd_lev_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>dd_lev_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>di_gen_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>General deformation instrument ID</td>
					</tr>
					<tr>
						<td>ds_id_ref</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Reference benchmark ID</td>
					</tr>
					<tr>
						<td>ds_id1</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>First benchmark (n) ID</td>
					</tr>
					<tr>
						<td>ds_id2</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second benchmark (n+1) ID</td>
					</tr>
					<tr>
						<td>dd_lev_ord</td>
						<td>mediumint(9)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Order</td>
					</tr>
					<tr>
						<td>dd_lev_class</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Class</td>
					</tr>
					<tr>
						<td>dd_lev_time</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Survey date</td>
					</tr>
					<tr>
						<td>dd_lev_time_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Survey date uncertainty</td>
					</tr>
					<tr>
						<td>dd_lev_delev</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>mm</td>
						<td>Elevation change</td>
					</tr>
					<tr>
						<td>dd_lev_herr</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>mm</td>
						<td>Elevation change uncertainty</td>
					</tr>
					<tr>
						<td>dd_lev_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>
					<tr>
						<td>dd_lev_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>					
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>dd_lev_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>dd_lev_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>					
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>dd_lev_id</td>
					</tr>
					<tr>
						<td rowspan="2">CODE</td>
						<td rowspan="2">UNIQUE</td>
						<td>dd_lev_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>di_gen_id</td>
						<td>di_gen.di_gen_id</td>
					</tr>
					<tr>
						<td>ds_id_ref</td>
						<td>ds.ds_id</td>
					</tr>
					<tr>
						<td>ds_id1</td>
						<td>ds.ds_id</td>
					</tr>
					<tr>
						<td>ds_id2</td>
						<td>ds.ds_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>	
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>					
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li><em>di_gen_id</em>.di_gen_stime &le; dd_lev_time &le; <em>di_gen_id</em>.di_gen_etime</li>
					<li><em>ds_id_ref</em>.ds_stime &le; dd_lev_time &le; <em>ds_id_ref</em>.ds_etime</li>
					<li><em>ds_id1</em>.ds_stime &le; dd_lev_time &le; <em>ds_id1</em>.ds_etime</li>
					<li><em>ds_id2</em>.ds_stime &le; dd_lev_time &le; <em>ds_id2</em>.ds_etime</li>
					<li>ds_id_ref = <em>di_gen_id</em>.ds_id</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- dd_sar - InSAR image -->
				<h2 class="element_title"><a name="dd_sar" id="dd_sar"></a>dd_sar - InSAR image</h2>
				
				<h3>Description</h3>
				<p>This table contains information about radar interferograms that show deformation of volcanoes.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>dd_sar_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>dd_sar_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Volcano Identifier</td>
					</tr>
					<tr>
						<td>di_gen_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>General deformation instrument ID</td>
					</tr>
					<tr>
						<td>cs_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Satellite ID</td>
					</tr>
					<tr>
						<td>dd_sar_slat</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Starting latitude</td>
					</tr>
					<tr>
						<td>dd_sar_slon</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Starting longitude</td>
					</tr>
					<tr>
						<td>dd_sar_spos</td>
						<td>enum('BLC', 'TLC')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Starting position: BLC=Bottom Left Corner, TLC=Top Left Corner</td>
					</tr>
					<tr>
						<td>dd_sar_rord</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Row order</td>
					</tr>
					<tr>
						<td>dd_sar_nrows</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Number of rows</td>
					</tr>
					<tr>
						<td>dd_sar_ncols</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Number of columns</td>
					</tr>
					<tr>
						<td>dd_sar_units</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Units</td>
					</tr>
					<tr>
						<td>dd_sar_ndata</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Null data value</td>
					</tr>
					<tr>
						<td>dd_sar_loc</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Location</td>
					</tr>
					<tr>
						<td>dd_sar_pair</td>
						<td>enum('P', 'S', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Flag: P=Pair, S=Stacked, U=Unknown</td>
					</tr>
					<tr>
						<td>dd_sar_desc</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Description</td>
					</tr>
					<tr>
						<td>dd_sar_dem</td>
						<td>varchar(50)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>DEM</td>
					</tr>
					<tr>
						<td>dd_sar_dord</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Data order</td>
					</tr>
					<tr>
						<td>dd_sar_img1_time</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Date of image 1</td>
					</tr>
					<tr>
						<td>dd_sar_img1_time_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Date of image 1 uncertainty</td>
					</tr>
					<tr>
						<td>dd_sar_img2_time</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Date of image 2</td>
					</tr>
					<tr>
						<td>dd_sar_img2_time_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Date of image 2 uncertainty</td>
					</tr>
					<tr>
						<td>dd_sar_pixsiz</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m</td>
						<td>Pixel size</td>
					</tr>
					<tr>
						<td>dd_sar_spacing</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Spacing of rows and columns</td>
					</tr>
					<tr>
						<td>dd_sar_lookang</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Look angle</td>
					</tr>
					<tr>
						<td>dd_sar_limb</td>
						<td>enum('ASC', 'DES')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Limb: ASC=Ascending, DES=Descending </td>
					</tr>
					<tr>
						<td>dd_sar_img_path</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Image Path</td>
					</tr>
					<tr>
						<td>dd_sar_geotiff</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>GEOTIFF of interferogram</td>
					</tr>
					<tr>
						<td>dd_sar_prometh</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Processing method</td>
					</tr>
					<tr>
						<td>dd_sar_softwr</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Software</td>
					</tr>
					<tr>
						<td>dd_sar_dem_qual</td>
						<td>enum('E', 'G', 'F', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>DEM quality: E=Excellent, G=Good, F=Fair, U=Unknown</td>
					</tr> 
					<tr>
						<td>dd_sar_ori</td>
						<td>enum('D', 'O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>
					<tr>
						<td>dd_sar_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>					
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>dd_sar_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>dd_sar_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>dd_sar_id</td>
					</tr>
					<tr>
						<td rowspan="2">CODE</td>
						<td rowspan="2">UNIQUE</td>
						<td>dd_sar_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>vd.vd_id</td>
					</tr>
					<tr>
						<td>di_gen_id</td>
						<td>di_gen.di_gen_id</td>
					</tr>
					<tr>
						<td>cs_id</td>
						<td>cs.cs_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>										
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li>-90 &le; dd_sar_slat &le; 90</li>
					<li>-180 &le; dd_sar_slon &le; 180</li>
					<li><em>dd_sar_nrows</em> &times; <em>dd_sar_ncols</em> = COUNT (dd_srd WHERE dd_srd.dd_sar_id=<em>dd_sar_id</em>)</li>
					<li>dd_sar_img1_time &le; dd_sar_img2_time</li>
					<li><em>di_gen_id</em>.di_gen_stime &le; dd_sar_img1_time &le; <em>di_gen_id</em>.di_gen_etime</li>
					<li><em>di_gen_id</em>.di_gen_stime &le; dd_sar_img2_time &le; <em>di_gen_id</em>.di_gen_etime</li>
					<li>vd_id = <em>di_gen_id</em>.ds_id.cn_id.vd_id OR jj_volnet.vd_id WHERE jj_net_id=<em>di_gen_id</em>.ds_id.cn_id.vd_id AND jj_net_flag=C</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- dd_srd - InSAR image pixel -->
				<h2 class="element_title"><a name="dd_srd" id="dd_srd"></a>dd_srd - InSAR image pixel</h2>
				
				<h3>Description</h3>
				<p>This table contains the data collected by two satellites to create an InSAR image.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>dd_srd_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>dd_sar_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>InSAR image ID</td>
					</tr>
					<tr>
						<td>dd_srd_numb</td>
						<td>int(10)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Number</td>
					</tr>
					<tr>
						<td>dd_srd_dchange</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>mm</td>
						<td>Range of change</td>
					</tr> 
					<tr>
						<td>dd_srd_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>dd_srd_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>dd_srd_id</td>
					</tr>
					<tr>
						<td rowspan="2">PIXEL NUMBER</td>
						<td rowspan="2">UNIQUE</td>
						<td>dd_sar_id</td>
					</tr>
					<tr>
						<td>dd_srd_numb</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>dd_sar_id</td>
						<td>dd_sar.dd_sar_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li>dd_srd_numb = 1, 2, 3 ... X (where X =  <em>dd_sar_id</em>.dd_sar_nrows &times; <em>dd_sar_id</em>.dd_sar_ncols)</li>
					<li>pixel at starting position of InSAR image (dd_sar.dd_sar_spos) = dd_srd WHERE dd_srb_numb = 1</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- dd_str - Strain -->
				<h2 class="element_title"><a name="dd_str" id="dd_str"></a>dd_str - Strain</h2>
				
				<h3>Description</h3>
				<p>This table stores both raw and processed strainmeter data.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>dd_str_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>dd_str_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>ds_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Deformation station ID</td>
					</tr>
					<tr>
						<td>di_tlt_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Strainmeter ID</td>
					</tr>
					<tr>
						<td>dd_str_time</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Survey date</td>
					</tr>
					<tr>
						<td>dd_str_time_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Survey date uncertainty</td>
					</tr>
					<tr>
						<td>dd_str_comp1</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&mu;strain</td>
						<td>Component 1</td>
					</tr>
					<tr>
						<td>dd_str_comp2</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&mu;strain</td>
						<td>Component 2</td>
					</tr>
					<tr>
						<td>dd_str_comp3</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&mu;strain</td>
						<td>Component 3</td>
					</tr>
					<tr>
						<td>dd_str_comp4</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&mu;strain</td>
						<td>Component 4</td>
					</tr>
					<tr>
						<td>dd_str_err1</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&mu;strain</td>
						<td>Component 1 error</td>
					</tr>
					<tr>
						<td>dd_str_err2</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&mu;strain</td>
						<td>Component 2 error</td>
					</tr>
					<tr>
						<td>dd_str_err3</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&mu;strain</td>
						<td>Component 3 error</td>
					</tr>
					<tr>
						<td>dd_str_err4</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&mu;strain</td>
						<td>Component 4 error</td>
					</tr>
					<tr>
						<td>dd_str_vdstr</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&mu;strain</td>
						<td>Volumetric strain change</td>
					</tr>
					<tr>
						<td>dd_str_vdstr_err</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&mu;strain</td>
						<td>Volumetric strain change error</td>
					</tr>
					<tr>
						<td>dd_str_sstr_ax1</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&mu;strain</td>
						<td>Shear strain of axis 1</td>
					</tr>
					<tr>
						<td>dd_str_azi_ax1</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Azimuth of axis 1</td>
					</tr>
					<tr>
						<td>dd_str_sstr_ax2</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&mu;strain</td>
						<td>Shear strain of axis 2</td>
					</tr>
					<tr>
						<td>dd_str_azi_ax2</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Azimuth of axis 2</td>
					</tr>
					<tr>
						<td>dd_str_sstr_ax3</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&mu;strain</td>
						<td>Shear strain of axis 3</td>
					</tr>
					<tr>
						<td>dd_str_azi_ax3</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Azimuth of axis 3</td>
					</tr>
					<tr>
						<td>dd_str_stderr1</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&mu;strain</td>
						<td>Strain for axis 1 uncertainty</td>
					</tr>
					<tr>
						<td>dd_str_stderr2</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&mu;strain</td>
						<td>Strain for axis 2 uncertainty</td>
					</tr>
					<tr>
						<td>dd_str_stderr3</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&mu;strain</td>
						<td>Strain for axis 3 uncertainty</td>
					</tr>
					<tr>
						<td>dd_str_pmax</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&mu;strain</td>
						<td>Maximum principal strain</td>
					</tr>
					<tr>
						<td>dd_str_pmaxerr</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&mu;strain</td>
						<td>Maximum principal strain uncertainty</td>
					</tr>
					<tr>
						<td>dd_str_pmin</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&mu;strain</td>
						<td>Minimum principal strain</td>
					</tr>
					<tr>
						<td>dd_str_pminerr</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&mu;strain</td>
						<td>Minimum principal strain uncertainty</td>
					</tr>
					<tr>
						<td>dd_str_pmax_dir</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Maximum principal strain direction</td>
					</tr>
					<tr>
						<td>dd_str_pmax_direrr</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Maximum principal strain direction uncertainty</td>
					</tr>
					<tr>
						<td>dd_str_pmin_dir</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Minimum principal strain direction</td>
					</tr>
					<tr>
						<td>dd_str_pmin_direrr</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Minimum principal strain direction uncertainty</td>
					</tr>
					<tr>
						<td>dd_str_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>
					<tr>
						<td>dd_str_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>					
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>dd_str_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>dd_str_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>dd_str_id</td>
					</tr>
					<tr>
						<td rowspan="2">CODE</td>
						<td rowspan="2">UNIQUE</td>
						<td>dd_str_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>ds_id</td>
						<td>ds.ds_id</td>
					</tr>
					<tr>
						<td>di_tlt_id</td>
						<td>di_tlt.di_tlt_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>		
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li><em>di_tlt_id</em>.di_tlt_stime &le; dd_str_time &le; <em>di_tlt_id</em>.di_tlt_etime</li>
					<li><em>ds_id</em>.ds_stime &le; dd_str_time &le; <em>ds_id</em>.ds_etime</li>
					<li>0 &le; dd_str_azi_ax1 &le; 360</li>
					<li>0 &le; dd_str_azi_ax2 &le; 360</li>
					<li>0 &le; dd_str_azi_ax3 &le; 360</li>
					<li>0 &le; dd_str_pmax_dir &le; 360</li>
					<li>0 &le; dd_str_pmin_dir &le; 360</li>
					<li>dd_str_pmin &le; dd_str_pmax</li>
					<li>ds_id = <em>di_tlt_id</em>.ds_id</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- dd_tlt - Electronic tilt -->
				<h2 class="element_title"><a name="dd_tlt" id="dd_tlt"></a>dd_tlt - Electronic tilt</h2>
				
				<h3>Description</h3>
				<p>This table contains tilt data that are either raw or processed.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>dd_tlt_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>dd_tlt_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>ds_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Deformation station ID</td>
					</tr>
					<tr>
						<td>di_tlt_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Tiltmeter ID</td>
					</tr>
					<tr>
						<td>dd_tlt_time</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Measurement time</td>
					</tr>
					<tr>
						<td>dd_tlt_timecsec</td>
						<td>decimal(2,2)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Centisecond precision for measurement time</td>
					</tr>
					<tr>
						<td>dd_tlt_time_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Measurement time uncertainty</td>
					</tr>
					<tr>
						<td>dd_tlt_timecsec_unc</td>
						<td>decimal(2,2)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Centisecond precision for measurement time uncertainty</td>
					</tr>
					<tr>
						<td>dd_tlt_srate</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>sec</td>
						<td>Sampling rate</td>
					</tr>
					<tr>
						<td>dd_tlt1</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Tilt measurement 1</td>
					</tr>
					<tr>
						<td>dd_tlt2</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Tilt measurement 2</td>
					</tr>
					<tr>
						<td>dd_tlt_err1</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Tilt 1 error</td>
					</tr>
					<tr>
						<td>dd_tlt_err2</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Tilt 2 error</td>
					</tr>
					<tr>
						<td>dd_tlt_proc_flg</td>
						<td>enum('P', 'R')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Flag: P=Processed, R=Raw</td>
					</tr>
					<tr>
						<td>dd_tlt_temp</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Temperature</td>
					</tr>
					<tr>
						<td>dd_tlt_bat</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Battery Level</td>
					</tr>
					<tr>
						<td>dd_tlt_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>	
					</tr>
					<tr>
						<td>dd_tlt_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>					
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>dd_tlt_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>dd_tlt_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>dd_tlt_id</td>
					</tr>
					<tr>
						<td rowspan="2">CODE</td>
						<td rowspan="2">UNIQUE</td>
						<td>dd_tlt_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>ds_id</td>
						<td>ds.ds_id</td>
					</tr>
					<tr>
						<td>di_tlt_id</td>
						<td>di_tlt.di_tlt_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li><em>di_tlt_id</em>.di_tlt_stime &le; dd_tlt_time &le; <em>di_tlt_id</em>.di_tlt_etime</li>
					<li><em>ds_id</em>.ds_stime &le; dd_tlt_time &le; <em>ds_id</em>.ds_etime</li>
					<li>ds_id = <em>di_tlt_id</em>.ds_id</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- dd_tlv - Tilt vector -->
				<h2 class="element_title"><a name="dd_tlv" id="dd_tlv"></a>dd_tlv - Tilt vector</h2>
				
				<h3>Description</h3>
				<p>This table stores tilt information from sources where we do not have the raw or semi-processed data and only have access to tilt vectors.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>dd_tlv_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>dd_tlv_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>ds_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Deformation station ID</td>
					</tr>
					<tr>
						<td>di_tlt_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Tiltmeter ID</td>
					</tr>
					<tr>
						<td>dd_tlv_stime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time</td>
					</tr>
					<tr>
						<td>dd_tlv_stime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time uncertainty</td>
					</tr>
					<tr>
						<td>dd_tlv_etime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End time</td>
					</tr>
					<tr>
						<td>dd_tlv_etime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End time uncertainty</td>
					</tr>
					<tr>
						<td>dd_tlv_mag</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&mu;rad</td>
						<td>Magnitude</td>
					</tr>
					<tr>
						<td>dd_tlv_azi</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Azimuth</td>
					</tr>
					<tr>
						<td>dd_tlv_magerr</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&mu;rad</td>
						<td>Magnitude error</td>
					</tr>
					<tr>
						<td>dd_tlv_azierr</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Azimuth error</td>
					</tr>
					<tr>
						<td>dd_tlv_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>
					<tr>
						<td>dd_tlv_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>					
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>dd_tlv_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>dd_tlv_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>dd_tlv_id</td>
					</tr>
					<tr>
						<td rowspan="2">CODE</td>
						<td rowspan="2">UNIQUE</td>
						<td>dd_tlv_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>ds_id</td>
						<td>ds.ds_id</td>
					</tr>
					<tr>
						<td>di_tlt_id</td>
						<td>di_tlt.di_tlt_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>	
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li><em>di_tlt_id</em>.di_tlt_stime &le; dd_tlv_stime &le; <em>di_tlt_id</em>.di_tlt_etime</li>
					<li><em>ds_id</em>.ds_stime &le; dd_tlv_stime &le; <em>ds_id</em>.ds_etime</li>
					<li><em>di_tlt_id</em>.di_tlt_stime &le; dd_tlv_etime &le; <em>di_tlt_id</em>.di_tlt_etime</li>
					<li><em>ds_id</em>.ds_stime &le; dd_tlv_etime &le; <em>ds_id</em>.ds_etime</li>
					<li>dd_tlv_stime &le; dd_tlv_etime</li>
					<li>0 &le; dd_tlv_azi &le; 360</li>
					<li>ds_id = <em>di_tlt_id</em>.ds_id</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- di_gen - General deformation instrument -->
				<h2 class="element_title"><a name="di_gen" id="di_gen"></a>di_gen - General deformation instrument</h2>
				
				<h3>Description</h3>
				<p>This table stores information about each individual instrument.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>di_gen_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>di_gen_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>ds_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Deformation station ID</td>
					</tr>
					<tr>
						<td>di_gen_name</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Name</td>
					</tr>
					<tr>
						<td>di_gen_type</td>
						<td>enum('Angle','CGPS','EDM','EDM_Reflector','GPS','Total_Station','OtherTypes')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Type</td>
					</tr>
					<tr>
						<td>di_gen_units</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Units measured</td>
					</tr>
					<tr>
						<td>di_gen_res</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Resolution</td>
					</tr>
					<tr>
						<td>di_gen_stn</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Signal to noise</td>
					</tr>
					<tr>
						<td>di_gen_stime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time</td>
					</tr>
					<tr>
						<td>di_gen_stime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time uncertainty</td>
					</tr>
					<tr>
						<td>di_gen_etime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End time</td>
					</tr>
					<tr>
						<td>di_gen_etime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End time uncertainty</td>
					</tr>
					<tr>
						<td>di_gen_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>					
					<tr>
						<td>di_gen_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>di_gen_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>di_gen_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>di_gen_id</td>
					</tr>
					<tr>
						<td rowspan="3">CODE</td>
						<td rowspan="3">UNIQUE</td>
						<td>di_gen_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
					<tr>
						<td>di_gen_stime</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>ds_id</td>
						<td>ds.ds_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>	
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li><em>ds_id</em>.ds_stime &le; di_gen_stime &le; <em>ds_id</em>.ds_etime</li>
					<li><em>ds_id</em>.ds_stime &le; di_gen_etime &le; <em>ds_id</em>.ds_etime</li>
					<li>di_gen_stime &le; di_gen_etime</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- di_tlt - Tilt/Strain instrument -->
				<h2 class="element_title"><a name="di_tlt" id="di_tlt"></a>di_tlt - Tilt/Strain instrument</h2>
				
				<h3>Description</h3>
				<p>This table stores information about each individual instrument and provides the necessary data to process raw data from the tilt and strain data tables.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>di_tlt_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>di_tlt_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>ds_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Deformation station ID</td>
					</tr>
					<tr>
						<td>di_tlt_name</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Name</td>
					</tr>
					<tr>
						<td>di_tlt_type</td>
						<td>enum('Tilt','Strain')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Type</td>
					</tr>
					<tr>
						<td>di_tlt_depth</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m</td>
						<td>Depth</td>
					</tr>
					<tr>
						<td>di_tlt_units</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Units measured</td>
					</tr>
					<tr>
						<td>di_tlt_res</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Resolution</td>
					</tr>
					<tr>
						<td>di_tlt_dir1</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Azimuth of direction 1</td>
					</tr>
					<tr>
						<td>di_tlt_dir2</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Azimuth of direction 2</td>
					</tr>
					<tr>
						<td>di_tlt_dir3</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Azimuth of direction 3</td>
					</tr>
					<tr>
						<td>di_tlt_dir4</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Azimuth of direction 4</td>
					</tr>
					<tr>
						<td>di_tlt_econv1</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&mu;rad/mV or &mu;strain/mV</td>
						<td>Electronic conversion for component 1</td>
					</tr>
					<tr>
						<td>di_tlt_econv2</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&mu;rad/mV or &mu;strain/mV</td>
						<td>Electronic conversion for component 2</td>
					</tr>
					<tr>
						<td>di_tlt_econv3</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&mu;rad/mV or &mu;strain/mV</td>
						<td>Electronic conversion for component 3</td>
					</tr>
					<tr>
						<td>di_tlt_econv4</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&mu;rad/mV or &mu;strain/mV</td>
						<td>Electronic conversion for component 4</td>
					</tr>
					<tr>
						<td>di_tlt_stime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time</td>
					</tr>
					<tr>
						<td>di_tlt_stime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time uncertainty</td>
					</tr>
					<tr>
						<td>di_tlt_etime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End time</td>
					</tr>
					<tr>
						<td>di_tlt_etime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End time uncertainty</td>
					</tr>
					<tr>
						<td>di_tlt_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>
					<tr>
						<td>di_tlt_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>di_tlt_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>di_tlt_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>di_tlt_id</td>
					</tr>
					<tr>
						<td rowspan="3">CODE</td>
						<td rowspan="3">UNIQUE</td>
						<td>di_tlt_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
					<tr>
						<td>di_tlt_stime</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>ds_id</td>
						<td>ds.ds_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>	
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li><em>ds_id</em>.ds_stime &le; di_tlt_stime &le; <em>ds_id</em>.ds_etime</li>
					<li><em>ds_id</em>.ds_stime &le; di_tlt_etime &le; <em>ds_id</em>.ds_etime</li>
					<li>di_tlt_stime &le; di_tlt_etime</li>
					<li>0 &le; di_tlt_dir1 &le; 360</li>
					<li>0 &le; di_tlt_dir2 &le; 360</li>
					<li>0 &le; di_tlt_dir3 &le; 360</li>
					<li>0 &le; di_tlt_dir4 &le; 360</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- ds - Deformation station -->
				<h2 class="element_title"><a name="ds" id="ds"></a>ds - Deformation station</h2>
				
				<h3>Description</h3>
				<p>This table stores information such as a location, name, and description for stations where deformation or geodetic data are collected.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>ds_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>ds_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>ds_name</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Name</td>
					</tr>
					<tr>
						<td>cn_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Deformation network ID</td>
					</tr>
					<tr>
						<td>ds_perm</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>List of permanent instruments</td>
					</tr>
					<tr>
						<td>ds_nlat</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Nominal latitude</td>
					</tr>
					<tr>
						<td>ds_nlon</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Nominal longitude</td>
					</tr>
					<tr>
						<td>ds_nelev</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m</td>
						<td>Nominal elevation</td>
					</tr>
					<tr>
						<td>ds_herr_loc</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Horizontal precision of nominal location</td>
					</tr>
					<tr>
						<td>ds_stime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time</td>
					</tr>
					<tr>
						<td>ds_stime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time uncertainty</td>
					</tr>
					<tr>
						<td>ds_etime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End time</td>
					</tr>
					<tr>
						<td>ds_etime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End time uncertainty</td>
					</tr>
					<tr>
						<td>ds_utc</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Difference from UTC</td>
					</tr>
					<tr>
						<td>ds_rflag</td>
						<td>enum('Y', 'N')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Reference station: Y=Yes, N=No</td>
					</tr>
					<tr>
						<td>ds_desc</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Description</td>
					</tr>  
					<tr>
						<td>ds_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>  
					<tr>
						<td>ds_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>  					
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>ds_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>ds_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>ds_id</td>
					</tr>
					<tr>
						<td rowspan="3">CODE</td>
						<td rowspan="3">UNIQUE</td>
						<td>ds_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
					<tr>
						<td>ds_stime</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>cn_id</td>
						<td>cn.cn_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>	
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li><em>cn_id</em>.cn_stime &le; ds_stime &le; <em>cn_id</em>.cn_etime</li>
					<li><em>cn_id</em>.cn_stime &le; ds_etime &le; <em>cn_id</em>.cn_etime</li>
					<li>ds_stime &le; ds_etime</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- ed - Eruption -->
				<h2 class="element_title"><a name="ed" id="ed"></a>ed - Eruption</h2>
				
				<h3>Description</h3>
				<p>This table stores general information about an eruption such as a narrative and time span.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>ed_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID, eruption identifier (index)</td>
					</tr>
					<tr>
						<td>ed_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>EruptionCode</td>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Volcano Identifier</td>
					</tr>
					<tr>
						<td>ed_name</td>
						<td>varchar(60)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>EruptionName</td>
					</tr>
					<tr>
						<td>ed_nar</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Narrative</td>
					</tr>
					<tr>
						<td>ed_stime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time</td>
					</tr>
					<tr>
						<td>ed_stime_bc</td>
						<td>smallint(6)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Year of start time before Christ</td>
					</tr>
					<tr>
						<td>ed_stime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time uncertainty</td>
					</tr>
					<tr>
						<td>ed_etime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End time</td>
					</tr>
					<tr>
						<td>ed_etime_bc</td>
						<td>smallint(6)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Year of end time before Christ</td>
					</tr>
					<tr>
						<td>ed_etime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End time uncertainty</td>
					</tr>
					<tr>
						<td>ed_climax</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Onset of climax</td>
					</tr>
					<tr>
						<td>ed_climax_bc</td>
						<td>smallint(6)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Year of climax time before Christ</td>
					</tr>
					<tr>
						<td>ed_climax_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Onset of climax uncertainty</td>
					</tr>
					<tr>
						<td>ed_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>First Collector ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Collector ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Collector ID</td>
					</tr>
					<tr>
						<td>ed_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>ed_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>ed_id</td>
					</tr>
					<tr>
						<td rowspan="2">CODE</td>
						<td rowspan="2">UNIQUE</td>
						<td>ed_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>vd.vd_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>	
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li>ed_stime &le; ed_climax &le; ed_etime</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- ed_for - Eruption forecast -->
				<h2 class="element_title"><a name="ed_for" id="ed_for"></a>ed_for - Eruption forecast</h2>
				
				<h3>Description</h3>
				<p>This table stores information about forecasts made for a phase of the eruption, such as an overview of the forecast and the times forecasted.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>ed_for_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>ed_for_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Volcano Identifier</td>
					</tr>
					<tr>
						<td>ed_phs_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Eruption phase ID</td>
					</tr>
					<tr>
						<td>ed_for_desc</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Description</td>
					</tr>
					<tr>
						<td>ed_for_open</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Earliest expected start time of eruption</td>
					</tr>
					<tr>
						<td>ed_for_open_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Earliest expected start time of eruption uncertainty</td>
					</tr>
					<tr>
						<td>ed_for_close</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Latest expected start time of eruption</td>
					</tr>
					<tr>
						<td>ed_for_close_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Latest expected start time of eruption uncertainty</td>
					</tr>
					<tr>
						<td>ed_for_time</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Issue date</td>
					</tr>
					<tr>
						<td>ed_for_time_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Issue date uncertainty</td>
					</tr>
					<tr>
						<td>ed_for_tsucc</td>
						<td>enum('Y', 'N', 'P')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Success on time: Y=Yes, N=No, P=Partly</td>
					</tr>
					<tr>
						<td>ed_for_msucc</td>
						<td>enum('Y', 'N', 'P')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Success on magnitude: Y=Yes, N=No, P=Partly</td>
					</tr>
					<tr>
						<td>ed_for_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>ed_for_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>ed_for_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>ed_for_id</td>
					</tr>
					<tr>
						<td rowspan="2">CODE</td>
						<td rowspan="2">UNIQUE</td>
						<td>ed_for_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>vd.vd_id</td>
					</tr>
					<tr>
						<td>ed_phs_id</td>
						<td>ed_phs.ed_phs_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>	
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li>ed_for_time &le; ed_for_open &le; ed_for_close</li>
					<li>ed_for_time &le; <em>ed_phs_id</em>.ed_phs_stime</li>
					<li>vd_id = <em>ed_phs_id</em>.ed_id.vd_id</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- ed_phs - Eruption phase -->
				<h2 class="element_title"><a name="ed_phs" id="ed_phs"></a>ed_phs - Eruption phase</h2>
				
				<h3>Description</h3>
				<p>This table stores specific information about the eruption such as the size of the phase and composition of magma.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>ed_phs_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>ed_phs_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>ed_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Eruption ID</td>
					</tr>
					<tr>
						<td>ed_phs_phsnum</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Phase number</td>
					</tr>
					<tr>
						<td>ed_phs_stime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time</td>
					</tr>
					<tr>
						<td>ed_phs_stime_bc</td>
						<td>smallint(6)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Year of start time before Christ</td>
					</tr>
					<tr>
						<td>ed_phs_stime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time uncertainty</td>
					</tr>
					<tr>
						<td>ed_phs_etime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End time</td>
					</tr>
					<tr>
						<td>ed_phs_etime_bc</td>
						<td>smallint(6)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Year of end time before Christ</td>
					</tr>
					<tr>
						<td>ed_phs_etime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End time uncertainty</td>
					</tr>
					<tr>
						<td>ed_phs_desc</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Description</td>
					</tr>
					<tr>
						<td>ed_phs_vei</td>
						<td>mediumint(9)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>VEI (Volcanic Explosivity Index)</td>
					</tr>
					<tr>
						<td>ed_phs_max_lext</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m<sup>3</sup>/s</td>
						<td>Maximum lava extrusion rate</td>
					</tr>
					<tr>
						<td>ed_phs_max_expdis</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>kg/s &times; 10<sup>6</sup></td>
						<td>Maximum explosive mass discharge rate</td>
					</tr>
					<tr>
						<td>ed_phs_dre</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m<sup>3</sup> &times; 10<sup>6</sup></td>
						<td>DRE (Dense-Rock Equivalent)</td>
					</tr>
					<tr>
						<td>ed_phs_mix</td>
						<td>enum('Y', 'N', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Evidence of magma mixing: Y=Yes, N=No, U=Unknown</td>
					</tr>
					<tr>
						<td>ed_phs_col</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>km</td>
						<td>Column height</td>
					</tr>
					<tr>
						<td>ed_phs_coldet</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Column height determination</td>
					</tr>
					<tr>
						<td>ed_phs_minsio2_mg</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>%</td>
						<td>Minimum SiO<sub>2</sub> of matrix glass</td>
					</tr>
					<tr>
						<td>ed_phs_maxsio2_mg</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>%</td>
						<td>Maximum SiO<sub>2</sub> of matrix glass</td>
					</tr>
					<tr>
						<td>ed_phs_minsio2_wr</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>%</td>
						<td>Minimum SiO<sub>2</sub> of whole rock</td>
					</tr>
					<tr>
						<td>ed_phs_maxsio2_wr</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>%</td>
						<td>Maximum SiO<sub>2</sub> of whole rock</td>
					</tr>
					<tr>
						<td>ed_phs_totxtl</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>%</td>
						<td>Total crystallinity</td>
					</tr>
					<tr>
						<td>ed_phs_phenc</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>%</td>
						<td>Phenocryst content</td>
					</tr>
					<tr>
						<td>ed_phs_phena</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Phenocryst assemblage</td>
					</tr>
					<tr>
						<td>ed_phs_h2o</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Pre-eruption water content</td>
					</tr>
					<tr>
						<td>ed_phs_h2o_xtl</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Description of phenocryst and melt inclusion</td>
					</tr>
					<tr>
						<td>ed_phs_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner /Collector ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner/Collector ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner/Collector ID</td>
					</tr>
					<tr>
						<td>ed_phs_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>ed_phs_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>ed_phs_id</td>
					</tr>
					<tr>
						<td rowspan="2">CODE</td>
						<td rowspan="2">UNIQUE</td>
						<td>ed_phs_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>ed_id</td>
						<td>ed.ed_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>						
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li>ed_phs_stime &le; ed_phs_etime</li>
					<li><em>ed_id</em>.ed_stime &le; ed_phs_stime &le; <em>ed_id</em>.ed_etime</li>
					<li><em>ed_id</em>.ed_stime &le; ed_phs_etime &le; <em>ed_id</em>.ed_etime</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- ed_vid - Eruption video -->
				<h2 class="element_title"><a name="ed_vid" id="ed_vid"></a>ed_vid - Eruption video</h2>
				
				<h3>Description</h3>
				<p>This table stores information about a video clip of the eruption.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>ed_vid_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>ed_vid_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Volcano Identifier</td>
					</tr>
					<tr>
						<td>ed_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Eruption ID</td>
					</tr>
					<tr>
						<td>ed_phs_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Eruption phase ID</td>
					</tr>
					<tr>
						<td>ed_vid_link</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link</td>
					</tr>
					<tr>
						<td>ed_vid_stime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time</td>
					</tr>
					<tr>
						<td>ed_vid_stime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time uncertainty</td>
					</tr>
					<tr>
						<td>ed_vid_length</td>
						<td>time</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Length</td>
					</tr>
					<tr>
						<td>ed_vid_desc</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Description</td>
					</tr>
					<tr>
						<td>ed_vid_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>ed_vid_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>ed_vid_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>ed_vid_id</td>
					</tr>
					<tr>
						<td rowspan="2">CODE</td>
						<td rowspan="2">UNIQUE</td>
						<td>ed_vid_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>vd.vd_id</td>
					</tr>
					<tr>
						<td>ed_id</td>
						<td>ed.ed_id</td>
					</tr>
					<tr>
						<td>ed_phs_id</td>
						<td>ed_phs.ed_phs_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>	
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li>ed_id = <em>ed_phs_id</em>.ed_id</li>
					<li>vd_id = <em>ed_phs_id</em>.ed_id.vd_id</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- fd_ele - Electric fields -->
				<h2 class="element_title"><a name="fd_ele" id="fd_ele"></a>fd_ele - Electric fields</h2>
				
				<h3>Description</h3>
				<p>This table contains electric data in digital form.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>fd_ele_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>fd_ele_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>fs_id1</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>ID of fields station from which the electrode is subtracted</td>
					</tr>
					<tr>
						<td>fs_id2</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>ID of fields station for the electrode that's being subtracted</td>
					</tr>
					<tr>
						<td>fi_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Fields instrument ID</td>
					</tr>
					<tr>
						<td>fd_ele_time</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Measurement time</td>
					</tr>
					<tr>
						<td>fd_ele_time_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Measurement time uncertainty</td>
					</tr>
					<tr>
						<td>fd_ele_field</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>mV</td>
						<td>Field</td>
					</tr>
					<tr>
						<td>fd_ele_ferr</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>mV</td>
						<td>Field uncertainty</td>
					</tr>
					<tr>
						<td>fd_ele_dir</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Direction</td>
					</tr>
					<tr>
						<td>fd_ele_hpass</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>Hz</td>
						<td>High pass filter frequency</td>
					</tr>
					<tr>
						<td>fd_ele_lpass</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>Hz</td>
						<td>Low pass filter frequency</td>
					</tr>
					<tr>
						<td>fd_ele_spot</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>mV</td>
						<td>Self potential</td>
					</tr>
					<tr>
						<td>fd_ele_spot_err</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>mV</td>
						<td>Self potential uncertainty</td>
					</tr>
					<tr>
						<td>fd_ele_ares</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&Omega; m</td>
						<td>Apparent resistivity</td>
					</tr>
					<tr>
						<td>fd_ele_ares_err</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&Omega; m</td>
						<td>Apparent resistivity uncertainty</td>
					</tr>
					<tr>
						<td>fd_ele_dres</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&Omega; m</td>
						<td>Direct resistivity</td>
					</tr>
					<tr>
						<td>fd_ele_dres_err</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&Omega; m</td>
						<td>Direct resistivity uncertainty</td>
					</tr>
					<tr>
						<td>fd_ele_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>
					<tr>
						<td>fd_ele_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>fd_ele_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>fd_ele_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>fd_ele_id</td>
					</tr>
					<tr>
						<td rowspan="2">CODE</td>
						<td rowspan="2">UNIQUE</td>
						<td>fd_ele_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>fs_id1</td>
						<td>fs.fs_id</td>
					</tr>
					<tr>
						<td>fs_id2</td>
						<td>fs.fs_id</td>
					</tr>
					<tr>
						<td>fi_id</td>
						<td>fi.fi_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li><em>fs_id1</em>.fs_stime &le; fd_ele_time &le; <em>fs_id1</em>.fs_etime</li>
					<li><em>fs_id2</em>.fs_stime &le; fd_ele_time &le; <em>fs_id2</em>.fs_etime</li>
					<li><em>fi_id</em>.fi_stime &le; fd_ele_time &le; <em>fi_id</em>.fi_etime</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- fd_gra - Gravity -->
				<h2 class="element_title"><a name="fd_gra" id="fd_gra"></a>fd_gra - Gravity</h2>
				
				<h3>Description</h3>
				<p>This table contains gravity data such as field strength and associated vertical displacement.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>fd_gra_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>fd_gra_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>fs_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Fields station ID</td>
					</tr>
					<tr>
						<td>fs_id_ref</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Reference station ID</td>
					</tr>
					<tr>
						<td>fi_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Fields instrument ID</td>
					</tr>
					<tr>
						<td>fd_gra_time</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Measurement time</td>
					</tr>
					<tr>
						<td>fd_gra_time_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Measurement time uncertainty</td>
					</tr>
					<tr>
						<td>fd_gra_fstr</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>Gal</td>
						<td>Strength</td>
					</tr>
					<tr>
						<td>fd_gra_ferr</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>Gal</td>
						<td>Strength uncertainty</td>
					</tr>
					<tr>
						<td>fd_gra_vdisp</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Associated vertical displacement: Y=Yes, N=No, U=Unknown</td>
					</tr>
					<tr>
						<td>fd_gra_gwater</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Associated change in groundwater level: Y=Yes, N=No, U=Unknown</td>
					</tr>
					<tr>
						<td>fd_gra_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>
					<tr>
						<td>fd_gra_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>fd_gra_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>fd_gra_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>fd_gra_id</td>
					</tr>
					<tr>
						<td rowspan="2">CODE</td>
						<td rowspan="2">UNIQUE</td>
						<td>fd_gra_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>fs_id</td>
						<td>fs.fs_id</td>
					</tr>
					<tr>
						<td>fs_id_ref</td>
						<td>fs.fs_id</td>
					</tr>
					<tr>
						<td>fi_id</td>
						<td>fi.fi_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li><em>fs_id</em>.fs_stime &le; fd_gra_time &le; <em>fs_id</em>.fs_etime</li>
					<li><em>fs_id_ref</em>.fs_stime &le; fd_gra_time &le; <em>fs_id_ref</em>.fs_etime</li>
					<li><em>fi_id</em>.fi_stime &le; fd_gra_time &le; <em>fi_id</em>.fi_etime</li>
					<li>fs_id = <em>fi_id</em>.fs_id</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- fd_mag - Magnetic fields -->
				<h2 class="element_title"><a name="fd_mag" id="fd_mag"></a>fd_mag - Magnetic fields</h2>
				
				<h3>Description</h3>
				<p>This table contains magnetic data that were collected digitally.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>fd_mag_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>fd_mag_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>fs_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Fields station ID</td>
					</tr>
					<tr>
						<td>fs_id_ref</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Reference station ID</td>
					</tr>
					<tr>
						<td>fi_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Fields instrument ID</td>
					</tr>
					<tr>
						<td>fd_mag_time</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Measurement time</td>
					</tr>
					<tr>
						<td>fd_mag_time_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Measurement time uncertainty</td>
					</tr>
					<tr>
						<td>fd_mag_f</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>nT</td>
						<td>F</td>
					</tr>
					<tr>
						<td>fd_mag_compx</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>nT</td>
						<td>X</td>
					</tr>
					<tr>
						<td>fd_mag_compy</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>nT</td>
						<td>Y</td>
					</tr>
					<tr>
						<td>fd_mag_compz</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>nT</td>
						<td>Z</td>
					</tr>
					<tr>
						<td>fd_mag_ferr</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>nT</td>
						<td>Total field strength uncertainty</td>
					</tr>
					<tr>
						<td>fd_mag_errx</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>nT</td>
						<td>Component X uncertainty</td>
					</tr>
					<tr>
						<td>fd_mag_erry</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>nT</td>
						<td>Component Y uncertainty</td>
					</tr>
					<tr>
						<td>fd_mag_errz</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>nT</td>
						<td>Component Z uncertainty</td>
					</tr>
					<tr>
						<td>fd_mag_highpass</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>Hz</td>
						<td>High pass</td>
					</tr>
					<tr>
						<td>fd_mag_lowpass</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>Hz</td>
						<td>Low pass</td>
					</tr>
					<tr>
						<td>fd_mag_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>
					<tr>
						<td>fd_mag_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>fd_mag_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>fd_mag_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>fd_mag_id</td>
					</tr>
					<tr>
						<td rowspan="2">CODE</td>
						<td rowspan="2">UNIQUE</td>
						<td>fd_mag_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>fs_id</td>
						<td>fs.fs_id</td>
					</tr>
					<tr>
						<td>fs_id_ref</td>
						<td>fs.fs_id</td>
					</tr>
					<tr>
						<td>fi_id</td>
						<td>fi.fi_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li><em>fs_id</em>.fs_stime &le; fd_mag_time &le; <em>fs_id</em>.fs_etime</li>
					<li><em>fs_id_ref</em>.fs_stime &le; fd_mag_time &le; <em>fs_id_ref</em>.fs_etime</li>
					<li><em>fi_id</em>.fi_stime &le; fd_mag_time &le; <em>fi_id</em>.fi_etime</li>
					<li>fs_id = <em>fi_id</em>.fs_id</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- fd_mgv - Magnetic vector -->
				<h2 class="element_title"><a name="fd_mgv" id="fd_mgv"></a>fd_mgv - Magnetic vector</h2>
				
				<h3>Description</h3>
				<p>This table contains magnetic vector data for which the data for the individual components is unavailable.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>fd_mgv_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>fd_mgv_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>fs_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Fields station ID</td>
					</tr>
					<tr>
						<td>fi_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Fields instrument ID</td>
					</tr>
					<tr>
						<td>fd_mgv_time</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Measurement time</td>
					</tr>
					<tr>
						<td>fd_mgv_time_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Measurement time uncertainty</td>
					</tr>
					<tr>
						<td>fd_mgv_dec</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Declination</td>
					</tr>
					<tr>
						<td>fd_mgv_incl</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Inclination</td>
					</tr>
					<tr>
						<td>fd_mgv_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>
					<tr>
						<td>fd_mgv_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>fd_mgv_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>fd_mgv_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>fd_mgv_id</td>
					</tr>
					<tr>
						<td rowspan="2">CODE</td>
						<td rowspan="2">UNIQUE</td>
						<td>fd_mgv_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>fs_id</td>
						<td>fs.fs_id</td>
					</tr>
					<tr>
						<td>fi_id</td>
						<td>fi.fi_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li>0 &le; fd_mgv_dec &le; 360</li>
					<li>0 &le; fd_mgv_incl &le; 90</li>
					<li><em>fs_id</em>.fs_stime &le; fd_mgv_time &le; <em>fs_id</em>.fs_etime</li>
					<li><em>fi_id</em>.fi_stime &le; fd_mgv_time &le; <em>fi_id</em>.fi_etime</li>
					<li>fs_id = <em>fi_id</em>.fs_id</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- fi - Fields instrument -->
				<h2 class="element_title"><a name="fi" id="fi"></a>fi - Fields instrument</h2>
				
				<h3>Description</h3>
				<p>This table stores information about the instruments used to collect magnetic, electric, and gravity data.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>fi_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>fi_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>fs_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Fields station ID</td>
					</tr>
					<tr>
						<td>fi_name</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Name</td>
					</tr>
					<tr>
						<td>fi_type</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Type</td>
					</tr>
					<tr>
						<td>fi_res</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Resolution</td>
					</tr>
					<tr>
						<td>fi_units</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Units measured</td>
					</tr>
					<tr>
						<td>fi_rate</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Sampling rate</td>
					</tr>
					<tr>
						<td>fi_filter</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Filter type</td>
					</tr>
					<tr>
						<td>fi_orient</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Orientation</td>
					</tr>
					<tr>
						<td>fi_calc</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Calculation</td>
					</tr>
					<tr>
						<td>fi_stime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time</td>
					</tr>
					<tr>
						<td>fi_stime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time uncertainty</td>
					</tr>
					<tr>
						<td>fi_etime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End time</td>
					</tr>
					<tr>
						<td>fi_etime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End time uncertainty</td>
					</tr>
					<tr>
						<td>fi_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>
					<tr>
						<td>fi_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>fi_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>fi_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>fi_id</td>
					</tr>
					<tr>
						<td rowspan="3">CODE</td>
						<td rowspan="3">UNIQUE</td>
						<td>fi_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
					<tr>
						<td>fi_stime</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>fs_id</td>
						<td>fs.fs_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li><em>fs_id</em>.fs_stime &le; fi_stime &le; <em>fs_id</em>.fs_etime</li>
					<li><em>fs_id</em>.fs_stime &le; fi_etime &le; <em>fs_id</em>.fs_etime</li>
					<li>fi_stime &le; fi_etime</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- fs - Fields station -->
				<h2 class="element_title"><a name="fs" id="fs"></a>fs - Fields station</h2>
				
				<h3>Description</h3>
				<p>This table stores information such as a location, conversion from local time to UTC, and a description of the stations where fields data are collected.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>fs_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>fs_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>cn_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Fields network ID</td>
					</tr>
					<tr>
						<td>fs_name</td>
						<td>varchar(50)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Name</td>
					</tr>
					<tr>
						<td>fs_lat</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Latitude</td>
					</tr>
					<tr>
						<td>fs_lon</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Longitude</td>
					</tr>
					<tr>
						<td>fs_elev</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m</td>
						<td>Elevation</td>
					</tr>
					<tr>
						<td>fs_inst</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>List of instruments</td>
					</tr>
					<tr>
						<td>fs_utc</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Difference from UTC</td>
					</tr>
					<tr>
						<td>fs_stime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start date</td>
					</tr>
					<tr>
						<td>fs_stime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start date uncertainty</td>
					</tr>
					<tr>
						<td>fs_etime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End date</td>
					</tr>
					<tr>
						<td>fs_etime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End date uncertainty</td>
					</tr>
					<tr>
						<td>fs_desc</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Description</td>
					</tr>
					<tr>
						<td>fs_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>
					<tr>
						<td>fs_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>fs_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>fs_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>fs_id</td>
					</tr>
					<tr>
						<td rowspan="3">CODE</td>
						<td rowspan="3">UNIQUE</td>
						<td>fs_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
					<tr>
						<td>fs_stime</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>cn_id</td>
						<td>cn.cn_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li>fs_stime &le; fs_etime</li>
					<li><em>cn_id</em>.cn_stime &le; fs_stime &le; <em>cn_id</em>.cn_etime</li>
					<li><em>cn_id</em>.cn_stime &le; fs_etime &le; <em>cn_id</em>.cn_etime</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- gd - Directly sampled gas -->
				<h2 class="element_title"><a name="gd" id="gd"></a>gd - Directly sampled gas</h2>
				
				<h3>Description</h3>
				<p>This table stores gas data collected at ground sites. Data include the gas temperature, concentrations, and environmental factors.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>gd_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>gd_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>gs_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Gas station ID</td>
					</tr>
					<tr>
						<td>gi_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Gas instrument ID</td>
					</tr>
					<tr>
						<td>gd_time</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Sampling/Measurement time</td>
					</tr>
					<tr>
						<td>gd_time_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Sampling/Measurement time uncertainty</td>
					</tr>
					<tr>
						<td>gd_gtemp</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;C</td>
						<td>Gas temperature</td>
					</tr>
					<tr>
						<td>gd_bp</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>mbar</td>
						<td>Barometric pressure</td>
					</tr>
					<tr>
						<td>gd_flow</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Gas emission rate</td>
					</tr>
					<tr>
						<td>gd_species</td>
						<td>enum('CO2', 'SO2', 'H2S', 'HCl', 'HF', 'CH4', 'H2', 'CO', '3He4He', 'd13C', 'd34S', 'd18O', 'dD')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Species or ratio of gas reported</td>
					</tr>
					<tr>
						<td>gd_waterfree_flag</td>
						<td>enum('Y', 'N')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Water free gas: Y=Yes, N=No</td>
					</tr>
					<tr>
						<td>gd_units</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Reported units</td>
					</tr>
					<tr>
						<td>gd_concentration</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Gas concentration</td>
					</tr>
					<tr>
						<td>gd_concentration_err</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Gas concentration uncertainty</td>
					</tr>
					<tr>
						<td>gd_recalc</td>
						<td>enum('O', 'R')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Recalculated value: O=Original, R=Recalculated</td>
					</tr>
					<tr>
						<td>gd_envir</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Environmental factors</td>
					</tr>
					<tr>
						<td>gd_submin</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Sublimate minerals</td>
					</tr>
					<tr>
						<td>gd_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>
					<tr>
						<td>gd_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>gd_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>gd_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>gd_id</td>
					</tr>
					<tr>
						<td rowspan="2">CODE</td>
						<td rowspan="2">UNIQUE</td>
						<td>gd_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>gs_id</td>
						<td>gs.gs_id</td>
					</tr>
					<tr>
						<td>gi_id</td>
						<td>gi.gi_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li><em>gs_id</em>.gs_stime &le; gd_time &le; <em>gs_id</em>.gs_etime</li>
					<li><em>gi_id</em>.gi_stime &le; gd_time &le; <em>gi_id</em>.gi_etime</li>
					<li>gs_id = <em>gi_id</em>.gs_id</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- gd_plu - Plume -->
				<h2 class="element_title"><a name="gd_plu" id="gd_plu"></a>gd_plu - Plume</h2>
				
				<h3>Description</h3>
				<p>This table stores gas data collected from a plume including the location of the vent, the height of the plume, and the gas emission rates.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>gd_plu_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>gd_plu_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>smallint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Volcano ID</td>
					</tr>
					<tr>
						<td>cs_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Satellite ID</td>
					</tr>					
					<tr>
						<td>gs_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Gas station ID</td>
					</tr>
					<tr>
						<td>gi_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Gas instrument ID</td>
					</tr>
					<tr>
						<td>gd_plu_lat</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Latitude</td>
					</tr>
					<tr>
						<td>gd_plu_lon</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Longitude</td>
					</tr>
					<tr>
						<td>gd_plu_height</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>km</td>
						<td>Height</td>
					</tr>
					<tr>
						<td>gd_plu_hdet</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Height determination</td>
					</tr>
					<tr>
						<td>gd_plu_time</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Measurement time</td>
					</tr>
					<tr>
						<td>gd_plu_time_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Measurement time uncertainty</td>
					</tr>
					<tr>
						<td>gd_plu_species</td>
						<td>enum('CO2', 'SO2', 'H2S', 'HCl', 'HF', 'CO')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Species of gas reported</td>
					</tr>
					<tr>
						<td>gd_plu_units</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Reported units</td>
					</tr>
					<tr>
						<td>gd_plu_emit</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Emission rate</td>
					</tr>
					<tr>
						<td>gd_plu_emit_err</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Emission rate uncertainty</td>
					</tr>
					<tr>
						<td>gd_plu_recalc</td>
						<td>enum('O', 'R')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Recalculated value: O=Original, R=Recalculated</td>
					</tr>
					<tr>
						<td>gd_plu_wind</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m/s</td>
						<td>Wind speed</td>
					</tr>
					<tr>
						<td>gd_plu_wsmin</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m/s</td>
						<td>Minimum Wind speed</td>
					</tr>
					<tr>
						<td>gd_plu_wsmax</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m/s</td>
						<td>Maximum Wind speed</td>
					</tr>					
					<tr>
						<td>gd_plu_wdir</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Wind Direction</td>
					</tr>
					<tr>
						<td>gd_plu_weth</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Weather notes</td>
					</tr>
					<tr>
						<td>gd_plu_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>					
					<tr>
						<td>gd_plu_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>gd_plu_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>gd_plu_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>gd_plu_id</td>
					</tr>
					<tr>
						<td rowspan="2">CODE</td>
						<td rowspan="2">UNIQUE</td>
						<td>gd_plu_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>vd.vd_id</td>
					</tr>
					<tr>
						<td>cs_id</td>
						<td>cs.cs_id</td>
					</tr>
					<tr>
						<td>gs_id</td>
						<td>gs.gs_id</td>
					</tr>
					<tr>
						<td>gi_id</td>
						<td>gi.gi_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li><em>gs_id</em>.gs_stime &le; gd_plu_time &le; <em>gs_id</em>.gs_etime</li>
					<li><em>gi_id</em>.gi_stime &le; gd_plu_time &le; <em>gi_id</em>.gi_etime</li>
					<li>gs_id = <em>gi_id</em>.gs_id</li>
					<li>vd_id = <em>gs_id</em>.cn_id.vd_id OR jj_volnet.vd_id WHERE jj_volnet.jj_net_id=<em>gs_id</em>.cn_id AND jj_volnet.jj_net_flag=C</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- gd_sol - Soil efflux -->
				<h2 class="element_title"><a name="gd_sol" id="gd_sol"></a>gd_sol - Soil efflux</h2>
				
				<h3>Description</h3>
				<p>This table stores a daily total flux value for an individual gas species.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>gd_sol_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>gd_sol_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>gs_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Gas station ID</td>
					</tr>
					<tr>
						<td>gi_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Gas instrument ID</td>
					</tr>
					<tr>
						<td>gd_sol_time</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Measurement time</td>
					</tr>
					<tr>
						<td>gd_sol_time_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Measurement time uncertainty</td>
					</tr>
					<tr>
						<td>gd_sol_species</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Mesured species</td>
					</tr>
					<tr>
						<td>gd_sol_tflux</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>t/d</td>
						<td>Total flux</td>
					</tr>
					<tr>
						<td>gd_sol_flux_err</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>t/d</td>
						<td>Total flux uncertainty</td>
					</tr>
					<tr>
						<td>gd_sol_pts</td>
						<td>smallint(5)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Number of points</td>
					</tr>
					<tr>
						<td>gd_sol_area</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m<sup>2</sup></td>
						<td>Area</td>
					</tr>
					<tr>
						<td>gd_sol_high</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>g/m<sup>2</sup>/d</td>
						<td>Highest individual flux</td>
					</tr>
					<tr>
						<td>gd_sol_htemp</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;C</td>
						<td>Highest temperature</td>
					</tr>
					<tr>
						<td>gd_sol_units</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Reported Units</td>
					</tr>					
					<tr>
						<td>gd_sol_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>	
					<tr>
						<td>gd_sol_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Collector ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>					
					<tr>
						<td>gd_sol_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>gd_sol_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>gd_sol_id</td>
					</tr>
					<tr>
						<td rowspan="2">CODE</td>
						<td rowspan="2">UNIQUE</td>
						<td>gd_sol_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>gs_id</td>
						<td>gs.gs_id</td>
					</tr>
					<tr>
						<td>gi_id</td>
						<td>gi.gi_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li><em>gs_id</em>.gs_stime &le; gd_sol_time &le; <em>gs_id</em>.gs_etime</li>
					<li><em>gi_id</em>.gi_stime &le; gd_sol_time &le; <em>gi_id</em>.gi_etime</li>
					<li>gs_id = <em>gi_id</em>.gs_id</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- gi - Gas instrument -->
				<h2 class="element_title"><a name="gi" id="gi"></a>gi - Gas instrument</h2>
				
				<h3>Description</h3>
				<p>This table stores information about the instruments used to collect ground-based and remote gas data.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>gi_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>gi_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>cs_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Satellite ID</td>
					</tr>
					<tr>
						<td>gs_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Gas station ID</td>
					</tr>
					<tr>
						<td>gi_type</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Type</td>
					</tr>
					<tr>
						<td>gi_name</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Name</td>
					</tr>
					<tr>
						<td>gi_units</td>
						<td>varchar(50)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Measured units</td>
					</tr>
					<tr>
						<td>gi_pres</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Resolution</td>
					</tr>
					<tr>
						<td>gi_stn</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Signal to noise</td>
					</tr>
					<tr>
						<td>gi_calib</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Calibration</td>
					</tr>
					<tr>
						<td>gi_stime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start date</td>
					</tr>
					<tr>
						<td>gi_stime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start date uncertainty</td>
					</tr>
					<tr>
						<td>gi_etime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End date</td>
					</tr>
					<tr>
						<td>gi_etime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End date uncertainty</td>
					</tr>
					<tr>
						<td>gi_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>
					<tr>
						<td>gi_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>gi_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>gi_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>gield(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>gi_id</td>
					</tr>
					<tr>
						<td rowspan="3">CODE</td>
						<td rowspan="3">UNIQUE</td>
						<td>gi_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
					<tr>
						<td>gi_stime</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>cs_id</td>
						<td>cs.cs_id</td>
					</tr>
					<tr>
						<td>gs_id</td>
						<td>gs.gs_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li>gi_stime &le; gi_etime</li>
					<li><em>gs_id</em>.gs_stime &le; gi_stime &le; <em>gs_id</em>.gs_etime</li>
					<li><em>gs_id</em>.gs_stime &le; gi_etime &le; <em>gs_id</em>.gs_etime</li>
					<li><em>cs_id</em>.cs_stime &le; gi_stime &le; <em>cs_id</em>.cs_etime</li>
					<li><em>cs_id</em>.cs_stime &le; gi_etime &le; <em>cs_id</em>.cs_etime</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- gs - Gas station -->
				<h2 class="element_title"><a name="gs" id="gs"></a>gs - Gas station</h2>
				
				<h3>Description</h3>
				<p>This table stores information such as a location, type of gas body monitored, and a description of the stations where gas data are collected.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>gs_id</td>
						<td>smallint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>gs_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>gs_name</td>
						<td>varchar(50)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Station Name</td>
					</tr>
					<tr>
						<td>cn_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Gas network ID</td>
					</tr>
					<tr>
						<td>gs_lat</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Latitude</td>
					</tr>
					<tr>
						<td>gs_lon</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Longitude</td>
					</tr>
					<tr>
						<td>gs_elev</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m</td>
						<td>Elevation</td>
					</tr>
					<tr>
						<td>gs_inst</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>List of permanent instruments</td>
					</tr>
					<tr>
						<td>gs_type</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Type of gas body</td>
					</tr>
					<tr>
						<td>gs_utc</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Difference from UTC</td>
					</tr>
					<tr>
						<td>gs_stime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start date</td>
					</tr>
					<tr>
						<td>gs_stime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start date uncertainty</td>
					</tr>
					<tr>
						<td>gs_etime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End date</td>
					</tr>
					<tr>
						<td>gs_etime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End date uncertainty</td>
					</tr>
					<tr>
						<td>gs_desc</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Description</td>
					</tr>
					<tr>
						<td>gs_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>
					<tr>
						<td>gs_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>					
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>gs_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>gs_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>gs_id</td>
					</tr>
					<tr>
						<td rowspan="3">CODE</td>
						<td rowspan="3">UNIQUE</td>
						<td>gs_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
					<tr>
						<td>gs_stime</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>cn_id</td>
						<td>cn.cn_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li>gs_stime &le; gs_etime</li>
					<li><em>cn_id</em>.cn_stime &le; gs_stime &le; <em>cn_id</em>.cn_etime</li>
					<li><em>cn_id</em>.cn_stime &le; gs_etime &le; <em>cn_id</em>.cn_etime</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- hd - Hydrologic data -->
				<h2 class="element_title"><a name="hd" id="hd"></a>hd - Hydrologic data</h2>
				
				<h3>Description</h3>
				<p>This table stores all of the water data including temperature, water depth, and concentrations.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>hd_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>hd_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>hs_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Hydrologic station ID</td>
					</tr>
					<tr>
						<td>hi_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Hydrologic instrument ID</td>
					</tr>
					<tr>
						<td>hd_time</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Measurement time</td>
					</tr>
					<tr>
						<td>hd_time_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Measurement time uncertainty</td>
					</tr>
					<tr>
						<td>hd_temp</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;C</td>
						<td>Water temperature</td>
					</tr>
					<tr>
						<td>hd_welev</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m</td>
						<td>Water elevation</td>
					</tr>
					<tr>
						<td>hd_wdepth</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m</td>
						<td>Water depth</td>
					</tr>
					<tr>
						<td>hd_dwlev</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m</td>
						<td>Change in water level</td>
					</tr>
					<tr>
						<td>hd_bp</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>mbar</td>
						<td>Barometric pressure</td>
					</tr>
					<tr>
						<td>hd_sdisc</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>L/s</td>
						<td>Water discharge rate</td>
					</tr>
					<tr>
						<td>hd_prec</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>mm</td>
						<td>Precipitation</td>
					</tr>
					<tr>
						<td>hd_dprec</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Precipitation of preceding day</td>
					</tr>
					<tr>
						<td>hd_tprec</td>
						<td>enum('R', 'FR', 'S', 'H', 'R-FR', 'R-S', 'R-H', 'FR-R', 'FR-S', 'FR-H', 'S-R', 'S-FR', 'S-H', 'H-R', 'H-FR', 'H-S')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Type of precipitation: R=Rain, FR=Freezing Rain, S=Snow, H=Hail, and combinations</td>
					</tr>
					<tr>
						<td>hd_ph</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>pH</td>
					</tr>
					<tr>
						<td>hd_ph_err</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>pH standard error</td>
					</tr>
					<tr>
						<td>hd_cond</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&mu;mhos/cm, &mu;S/cm</td>
						<td>Conductivity</td>
					</tr>
					<tr>
						<td>hd_cond_err</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&mu;mhos/cm, &mu;S/cm</td>
						<td>Conductivity standard error</td>
					</tr>
					<tr>
						<td>hd_comp_species</td>
						<td>enum('SO4', 'H2S', 'Cl', 'F', 'HCO3', 'Mg', 'Fe', 'Ca', 'Na', 'K', '3He4He', 'c3He4He', 'd13C', 'd34S', 'dD', 'd18O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Type of compound, kation, anion or ratio</td>
					</tr>
					<tr>
						<td>hd_comp_units</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Reported units</td>
					</tr>
					<tr>
						<td>hd_comp_content</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Content of compound, kation, anion or ratio </td>
					</tr>
					<tr>
						<td>hd_comp_content_err</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Content of compound, kation, anion or ratio error</td>
					</tr>
					<tr>
						<td>hd_atemp</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Air temperature</td>
					</tr>
					<tr>
						<td>hd_tds</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Total disolved solid</td>
					</tr>		
					<tr>
						<td>hd_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>					
					<tr>
						<td>hd_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>hd_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>hd_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>hd_id</td>
					</tr>
					<tr>
						<td rowspan="2">CODE</td>
						<td rowspan="2">UNIQUE</td>
						<td>hd_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>hs_id</td>
						<td>hs.hs_id</td>
					</tr>
					<tr>
						<td>hi_id</td>
						<td>hi.hi_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li><em>hs_id</em>.hs_stime &le; hd_time &le; <em>hs_id</em>.hs_etime</li>
					<li><em>hi_id</em>.hi_stime &le; hd_time &le; <em>hi_id</em>.hi_etime</li>
					<li>hs_id = <em>hi_id</em>.hs_id</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- hi - Hydrologic instrument -->
				<h2 class="element_title"><a name="hi" id="hi"></a>hi - Hydrologic instrument</h2>
				
				<h3>Description</h3>
				<p>This table stores information about each individual hydrologic instrument.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>hi_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>hi_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>hs_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Hydrologic station ID</td>
					</tr>
					<tr>
						<td>hi_name</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Name</td>
					</tr>
					<tr>
						<td>hi_type</td>
						<td>varchar(50)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Type</td>
					</tr>
					<tr>
						<td>hi_meas</td>
						<td>enum('A', 'V')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Pressure measurement type: A=Absolute, V=Vented</td>
					</tr>
					<tr>
						<td>hi_units</td>
						<td>varchar(50)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Measured units</td>
					</tr>
					<tr>
						<td>hi_res</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Resolution</td>
					</tr>
					<tr>
						<td>hi_stime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start date</td>
					</tr>
					<tr>
						<td>hi_stime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start date uncertainty</td>
					</tr>
					<tr>
						<td>hi_etime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End date</td>
					</tr>
					<tr>
						<td>hi_etime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End date uncertainty</td>
					</tr>
					<tr>
						<td>hi_desc</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Description</td>
					</tr>
					<tr>
						<td>hi_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>
					<tr>
						<td>hi_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>					
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>hi_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>hi_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>hield(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>hi_id</td>
					</tr>
					<tr>
						<td rowspan="3">CODE</td>
						<td rowspan="3">UNIQUE</td>
						<td>hi_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
					<tr>
						<td>hi_stime</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>hs_id</td>
						<td>hs.hs_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li>hi_stime &le; hi_etime</li>
					<li><em>hs_id</em>.hs_stime &le; hi_stime &le; <em>hs_id</em>.hs_etime</li>
					<li><em>hs_id</em>.hs_stime &le; hi_etime &le; <em>hs_id</em>.hs_etime</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- hs - Hydrologic station -->
				<h2 class="element_title"><a name="hs" id="hs"></a>hs - Hydrologic station</h2>
				
				<h3>Description</h3>
				<p>This table stores information such as location, type of water body, and descriptions for stations where hydrologic data are collected.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>hs_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>hs_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>cn_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Hydrologic network ID</td>
					</tr>
					<tr>
						<td>hs_lat</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Latitude</td>
					</tr>
					<tr>
						<td>hs_lon</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Longitude</td>
					</tr>
					<tr>
						<td>hs_elev</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m</td>
						<td>Elevation</td>
					</tr>
					<tr>
						<td>hs_perm</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>List of permanent instruments</td>
					</tr>
					<tr>
						<td>hs_name</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Station name</td>
					</tr>					
					<tr>
						<td>hs_type</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Type of water body</td>
					</tr>
					<tr>
						<td>hs_utc</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Difference from UTC</td>
					</tr>
					<tr>
						<td>hs_tscr</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m</td>
						<td>Top of screen</td>
					</tr>
					<tr>
						<td>hs_bscr</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m</td>
						<td>Bottom of screen</td>
					</tr>
					<tr>
						<td>hs_tdepth</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m</td>
						<td>Total depth of well</td>
					</tr>
					<tr>
						<td>hs_stime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start date</td>
					</tr>
					<tr>
						<td>hs_stime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start date uncertainty</td>
					</tr>
					<tr>
						<td>hs_etime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End date</td>
					</tr>
					<tr>
						<td>hs_etime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End date uncertainty</td>
					</tr>
					<tr>
						<td>hs_desc</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Description</td>
					</tr>
					<tr>
						<td>hs_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>
					<tr>
						<td>hs_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>					
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>hs_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>hs_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>hs_id</td>
					</tr>
					<tr>
						<td rowspan="3">CODE</td>
						<td rowspan="3">UNIQUE</td>
						<td>hs_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
					<tr>
						<td>hs_stime</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>cn_id</td>
						<td>cn.cn_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li>hs_stime &le; hs_etime</li>
					<li><em>cn_id</em>.cn_stime &le; hs_stime &le; <em>cn_id</em>.cn_etime</li>
					<li><em>cn_id</em>.cn_stime &le; hs_etime &le; <em>cn_id</em>.cn_etime</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- ip_hyd - Hydrothermal system interaction -->
				<h2 class="element_title"><a name="ip_hyd" id="ip_hyd"></a>ip_hyd - Hydrothermal system interaction</h2>
				
				<h3>Description</h3>
				<p>This table stores information about magmatic interactions with the hydrothermal system.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>ip_hyd_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>ip_hyd_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Volcano Identifier</td>
					</tr>
					<tr>
						<td>ip_hyd_time</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Inference time</td>
					</tr>
					<tr>
						<td>ip_hyd_time_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Inference time uncertainty</td>
					</tr>
					<tr>
						<td>ip_hyd_start</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time</td>
					</tr>
					<tr>
						<td>ip_hyd_start_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time uncertainty</td>
					</tr>
					<tr>
						<td>ip_hyd_end</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End time</td>
					</tr>
					<tr>
						<td>ip_hyd_end_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End time uncertainty</td>
					</tr>
					<tr>
						<td>ip_hyd_gwater</td>
						<td>enum('Y', 'N', 'M', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Heated groundwater: Y=Yes, N=No, M=Maybe, U=Unknown</td>
					</tr>
					<tr>
						<td>ip_hyd_ipor</td>
						<td>enum('Y', 'N', 'M', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Pore destabilization: Y=Yes, N=No, M=Maybe, U=Unknown</td>
					</tr>
					<tr>
						<td>ip_hyd_edef</td>
						<td>enum('Y', 'N', 'M', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Pore deformation: Y=Yes, N=No, M=Maybe, U=Unknown</td>
					</tr>
					<tr>
						<td>ip_hyd_hfrac</td>
						<td>enum('Y', 'N', 'M', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Hydrofracturing: Y=Yes, N=No, M=Maybe, U=Unknown</td>
					</tr>
					<tr>
						<td>ip_hyd_btrem</td>
						<td>enum('Y', 'N', 'M', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Boiling induced tremor: Y=Yes, N=No, M=Maybe, U=Unknown</td>
					</tr>
					<tr>
						<td>ip_hyd_abgas</td>
						<td>enum('Y', 'N', 'M', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Absorption of soluble gases: Y=Yes, N=No, M=Maybe, U=Unknown</td>
					</tr>
					<tr>
						<td>ip_hyd_species</td>
						<td>enum('Y', 'N', 'M', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Change in equilibrium species: Y=Yes, N=No, M=Maybe, U=Unknown</td>
					</tr>
					<tr>
						<td>ip_hyd_chim</td>
						<td>enum('Y', 'N', 'M', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Boiling until dry chimneys are formed: Y=Yes, N=No, M=Maybe, U=Unknown</td>
					</tr>
					<tr>
						<td>ip_hyd_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>
					<tr>
						<td>ip_hyd_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>ip_hyd_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>ip_hyd_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>ip_hyd_id</td>
					</tr>
					<tr>
						<td rowspan="2">CODE</td>
						<td rowspan="2">UNIQUE</td>
						<td>ip_hyd_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>vd.vd_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li>ip_hyd_start &le; ip_hyd_end</li>
					<li>ip_hyd_start &le; ip_hyd_time</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- ip_mag - Magma movement -->
				<h2 class="element_title"><a name="ip_mag" id="ip_mag"></a>ip_mag - Magma movement</h2>
				
				<h3>Description</h3>
				<p>This table stores information about processes related to the movement of magma.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>ip_mag_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>ip_mag_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Volcano Identifier</td>
					</tr>
					<tr>
						<td>ip_mag_time</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Inference time</td>
					</tr>
					<tr>
						<td>ip_mag_time_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Inference time uncertainty</td>
					</tr>
					<tr>
						<td>ip_mag_start</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time</td>
					</tr>
					<tr>
						<td>ip_mag_start_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time uncertainty</td>
					</tr>
					<tr>
						<td>ip_mag_end</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End time</td>
					</tr>
					<tr>
						<td>ip_mag_end_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End time uncertainty</td>
					</tr>
					<tr>
						<td>ip_mag_deepsupp</td>
						<td>enum('Y', 'N', 'M', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Supply of magma from depth: Y=Yes, N=No, M=Maybe, U=Unknown</td>
					</tr>
					<tr>
						<td>ip_mag_asc</td>
						<td>enum('Y', 'N', 'M', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Ascent: Y=Yes, N=No, M=Maybe, U=Unknown</td>
					</tr>
					<tr>
						<td>ip_mag_convb</td>
						<td>enum('Y', 'N', 'M', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Convection below: Y=Yes, N=No, M=Maybe, U=Unknown</td>
					</tr>
					<tr>
						<td>ip_mag_conva</td>
						<td>enum('Y', 'N', 'M', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Convection above: Y=Yes, N=No, M=Maybe, U=Unknown</td>
					</tr>
					<tr>
						<td>ip_mag_mix</td>
						<td>enum('Y', 'N', 'M', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Magma mixing: Y=Yes, N=No, M=Maybe, U=Unknown</td>
					</tr>
					<tr>
						<td>ip_mag_dike</td>
						<td>enum('Y', 'N', 'M', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Dike intrusion: Y=Yes, N=No, M=Maybe, U=Unknown</td>
					</tr>
					<tr>
						<td>ip_mag_pipe</td>
						<td>enum('Y', 'N', 'M', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Pipe intrusion: Y=Yes, N=No, M=Maybe, U=Unknown</td>
					</tr>
					<tr>
						<td>ip_mag_sill</td>
						<td>enum('Y', 'N', 'M', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Sill intrusion: Y=Yes, N=No, M=Maybe, U=Unknown</td>
					</tr>
					<tr>
						<td>ip_mag_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>
					<tr>
						<td>ip_mag_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>ip_mag_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>ip_mag_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>ip_mag_id</td>
					</tr>
					<tr>
						<td rowspan="2">CODE</td>
						<td rowspan="2">UNIQUE</td>
						<td>ip_mag_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>vd.vd_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li>ip_mag_start &le; ip_mag_end</li>
					<li>ip_mag_start &le; ip_mag_time</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- ip_pres - Buildup of magma pressure -->
				<h2 class="element_title"><a name="ip_pres" id="ip_pres"></a>ip_pres - Buildup of magma pressure</h2>
				
				<h3>Description</h3>
				<p>This table stores information about processes related to an increase in magmatic pressure.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>ip_pres_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>ip_pres_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Volcano Identifier</td>
					</tr>
					<tr>
						<td>ip_pres_time</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Inference time</td>
					</tr>
					<tr>
						<td>ip_pres_time_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Inference time uncertainty</td>
					</tr>
					<tr>
						<td>ip_pres_start</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time</td>
					</tr>
					<tr>
						<td>ip_pres_start_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time uncertainty</td>
					</tr>
					<tr>
						<td>ip_pres_end</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End time</td>
					</tr>
					<tr>
						<td>ip_pres_end_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End time uncertainty</td>
					</tr>
					<tr>
						<td>ip_pres_gas</td>
						<td>enum('Y', 'N', 'M', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Gas-induced overpressure: Y=Yes, N=No, M=Maybe, U=Unknown</td>
					</tr>
					<tr>
						<td>ip_pres_tec</td>
						<td>enum('Y', 'N', 'M', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Tectonic overpressure: Y=Yes, N=No, M=Maybe, U=Unknown</td>
					</tr>
					<tr>
						<td>ip_pres_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>
					<tr>
						<td>ip_pres_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>ip_pres_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>ip_pres_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>ip_pres_id</td>
					</tr>
					<tr>
						<td rowspan="2">CODE</td>
						<td rowspan="2">UNIQUE</td>
						<td>ip_pres_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>vd.vd_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li>ip_pres_start &le; ip_pres_end</li>
					<li>ip_pres_start &le; ip_pres_time</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- ip_sat - Volatile saturation -->
				<h2 class="element_title"><a name="ip_sat" id="ip_sat"></a>ip_sat - Volatile saturation</h2>
				
				<h3>Description</h3>
				<p>This table stores information about processes related to volatiles in the magma.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>ip_sat_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>ip_sat_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Volcano Identifier</td>
					</tr>
					<tr>
						<td>ip_sat_time</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Inference time</td>
					</tr>
					<tr>
						<td>ip_sat_time_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Inference time uncertainty</td>
					</tr>
					<tr>
						<td>ip_sat_start</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time</td>
					</tr>
					<tr>
						<td>ip_sat_start_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time uncertainty</td>
					</tr>
					<tr>
						<td>ip_sat_end</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End time</td>
					</tr>
					<tr>
						<td>ip_sat_end_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End time uncertainty</td>
					</tr>
					<tr>
						<td>ip_sat_co2</td>
						<td>enum('Y', 'N', 'M', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>CO2 saturation: Y=Yes, N=No, M=Maybe, U=Unknown</td>
					</tr>
					<tr>
						<td>ip_sat_h2o</td>
						<td>enum('Y', 'N', 'M', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>H2O saturation: Y=Yes, N=No, M=Maybe, U=Unknown</td>
					</tr>
					<tr>
						<td>ip_sat_decomp</td>
						<td>enum('Y', 'N', 'M', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Decompression: Y=Yes, N=No, M=Maybe, U=Unknown</td>
					</tr>
					<tr>
						<td>ip_sat_dfo2</td>
						<td>enum('Y', 'N', 'M', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Fugacity: Y=Yes, N=No, M=Maybe, U=Unknown</td>
					</tr>
					<tr>
						<td>ip_sat_add</td>
						<td>enum('Y', 'N', 'M', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Volatile addition: Y=Yes, N=No, M=Maybe, U=Unknown</td>
					</tr>
					<tr>
						<td>ip_sat_xtl</td>
						<td>enum('Y', 'N', 'M', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Crystallization or 2nd boiling: Y=Yes, N=No, M=Maybe, U=Unknown</td>
					</tr>
					<tr>
						<td>ip_sat_ves</td>
						<td>enum('Y', 'N', 'M', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Vesiculation: Y=Yes, N=No, M=Maybe, U=Unknown</td>
					</tr>
					<tr>
						<td>ip_sat_deves</td>
						<td>enum('Y', 'N', 'M', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Devesiculation: Y=Yes, N=No, M=Maybe, U=Unknown</td>
					</tr>
					<tr>
						<td>ip_sat_degas</td>
						<td>enum('Y', 'N', 'M', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Degassing: Y=Yes, N=No, M=Maybe, U=Unknown</td>
					</tr>
					<tr>
						<td>ip_sat_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>
					<tr>
						<td>ip_sat_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>ip_sat_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>ip_sat_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>ip_sat_id</td>
					</tr>
					<tr>
						<td rowspan="2">CODE</td>
						<td rowspan="2">UNIQUE</td>
						<td>ip_sat_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>vd.vd_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li>ip_sat_start &le; ip_sat_end</li>
					<li>ip_sat_start &le; ip_sat_time</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- ip_tec - Regional tectonics interaction -->
				<h2 class="element_title"><a name="ip_tec" id="ip_tec"></a>ip_tec - Regional tectonics interaction</h2>
				
				<h3>Description</h3>
				<p>This table stores information about processes related to regional tectonic events.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>ip_tec_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>ip_tec_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Volcano Identifier</td>
					</tr>
					<tr>
						<td>ip_tec_time</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Inference time</td>
					</tr>
					<tr>
						<td>ip_tec_time_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Inference time uncertainty</td>
					</tr>
					<tr>
						<td>ip_tec_start</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time</td>
					</tr>
					<tr>
						<td>ip_tec_start_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time uncertainty</td>
					</tr>
					<tr>
						<td>ip_tec_end</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End time</td>
					</tr>
					<tr>
						<td>ip_tec_end_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End time uncertainty</td>
					</tr>
					<tr>
						<td>ip_tec_change</td>
						<td>enum('Y', 'N', 'M', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Tectonic changes: Y=Yes, N=No, M=Maybe, U=Unknown</td>
					</tr>
					<tr>
						<td>ip_tec_sstress</td>
						<td>enum('Y', 'N', 'M', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Static stress: Y=Yes, N=No, M=Maybe, U=Unknown</td>
					</tr>
					<tr>
						<td>ip_tec_dstrain</td>
						<td>enum('Y', 'N', 'M', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Dynamic strain: Y=Yes, N=No, M=Maybe, U=Unknown</td>
					</tr>
					<tr>
						<td>ip_tec_fault</td>
						<td>enum('Y', 'N', 'M', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Local shear: Y=Yes, N=No, M=Maybe, U=Unknown</td>
					</tr>
					<tr>
						<td>ip_tec_seq</td>
						<td>enum('Y', 'N', 'M', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Slow earthquake: Y=Yes, N=No, M=Maybe, U=Unknown</td>
					</tr>
					<tr>
						<td>ip_tec_press</td>
						<td>enum('Y', 'N', 'M', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Distal pressurization: Y=Yes, N=No, M=Maybe, U=Unknown</td>
					</tr>
					<tr>
						<td>ip_tec_depress</td>
						<td>enum('Y', 'N', 'M', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Distal depressurization: Y=Yes, N=No, M=Maybe, U=Unknown</td>
					</tr>
					<tr>
						<td>ip_tec_hppress</td>
						<td>enum('Y', 'N', 'M', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Hydrothermal lubrication: Y=Yes, N=No, M=Maybe, U=Unknown</td>
					</tr>
					<tr>
						<td>ip_tec_etide</td>
						<td>enum('Y', 'N', 'M', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Earth-tide: Y=Yes, N=No, M=Maybe, U=Unknown</td>
					</tr>
					<tr>
						<td>ip_tec_atmp</td>
						<td>enum('Y', 'N', 'M', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Atmospheric influence: Y=Yes, N=No, M=Maybe, U=Unknown</td>
					</tr>
					<tr>
						<td>ip_tec_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>
					<tr>
						<td>ip_tec_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>ip_tec_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>ip_tec_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>ip_tec_id</td>
					</tr>
					<tr>
						<td rowspan="2">CODE</td>
						<td rowspan="2">UNIQUE</td>
						<td>ip_tec_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>vd.vd_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li>ip_tec_start &le; ip_tec_end</li>
					<li>ip_tec_start &le; ip_tec_time</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- jj_concon - User to user permissions -->
				<h2 class="element_title"><a name="jj_concon" id="jj_concon"></a>jj_concon - User to user permissions</h2>
				
				<h3>Description</h3>
				<p>This table stores information about the permissions (upload, update, view their data or manage their account) given by a user to another.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>jj_concon_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Granting user ID</td>
					</tr>
					<tr>
						<td>cc_id_granted</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Granted user ID</td>
					</tr>
					<tr>
						<td>jj_concon_view</td>
						<td>tinyint(1)</td>
						<td></td>
						<td>No</td>
						<td>0</td>
						<td></td>
						<td></td>
						<td>Permission to view unpublished data: 0=No, 1=Yes</td>
					</tr>
					<tr>
						<td>jj_concon_upload</td>
						<td>tinyint(1)</td>
						<td></td>
						<td>No</td>
						<td>0</td>
						<td></td>
						<td></td>
						<td>Permission to upload data: 0=No, 1=Yes</td>
					</tr>
					<tr>
						<td>jj_concon_update</td>
						<td>tinyint(1)</td>
						<td></td>
						<td>No</td>
						<td>0</td>
						<td></td>
						<td></td>
						<td>Permission to update data: 0=No, 1=Yes</td>
					</tr>
					<tr>
						<td>jj_concon_admin</td>
						<td>tinyint(1)</td>
						<td></td>
						<td>No</td>
						<td>0</td>
						<td></td>
						<td></td>
						<td>Permission to manage account: 0=No, 1=Yes</td>
					</tr>
					<tr>
						<td>jj_concon_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>jj_concon_id</td>
					</tr>
					<tr>
						<td rowspan="2">GRANT</td>
						<td rowspan="2">UNIQUE</td>
						<td>cc_id</td>
					</tr>
					<tr>
						<td>cc_id_granted</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_granted</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<p>None</p>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- jj_imgx - Image junction -->
				<h2 class="element_title"><a name="jj_imgx" id="jj_imgx"></a>jj_imgx - Image junction</h2>
				
				<h3>Description</h3>
				<p>This table was created to link images to other known data.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>jj_imgx_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>cm_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td></td>
						<td></td>
						<td>Image ID</td>
					</tr>
					<tr>
						<td>jj_idname</td>
						<td>enum('cb','cc','ch','cm','cn','co','cp','cr','cr_tmp','cs','cu','dd_ang','dd_edm','dd_gps','dd_gpv','dd_lev','dd_sar','dd_srd','dd_str','dd_tlt','dd_tlv','di_gen','di_tlt','ds','ed','ed_for','ed_phs','ed_vid','fd_ele','fd_gra','fd_mag','fd_mgv','fi','fs','gd','gd_plu','gd_sol','gi','gs','hd','hi','hs','ip_hyd','ip_mag','ip_pres','ip_sat','ip_tec','jj_concon','jj_imgx','jj_volcon','jj_volnet','j_sarsat','md','med','mi','ms','sd_evn','sd_evs','sd_int','sd_ivl','sd_rsm','sd_sam','sd_ssm','sd_trm','sd_wav','si','si_cmp','sn','ss','st_eqt','td','td_img','td_pix','ti','ts','vd','vd_inf','vd_mag','vd_tec')</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Table name</td>
					</tr>
					<tr>
						<td>jj_x_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Data ID</td>
					</tr>
					<tr>
						<td>jj_imgx_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>jj_imgx_id</td>
					</tr>
					<tr>
						<td rowspan="3">LINK</td>
						<td rowspan="3">UNIQUE</td>
						<td>cm_id</td>
					</tr>
					<tr>
						<td>jj_idname</td>
					</tr>
					<tr>
						<td>jj_x_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>cm_id</td>
						<td>cm.cm_id</td>
					</tr>
					<tr>
						<td>jj_x_id</td>
						<td><em>jj_idname</em>.<em>jj_idname</em>_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<p>None</p>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- jj_volcon - Volcano-contact junction -->
				<h2 class="element_title"><a name="jj_volcon" id="jj_volcon"></a>jj_volcon - Volcano-contact junction</h2>
				
				<h3>Description</h3>
				<p>This table was created for the many-to-many relationship between the volcano and the observatories that monitor the volcano.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>jj_volcon_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Volcano Identifier</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td></td>
						<td></td>
						<td>Contact ID</td>
					</tr>
					<tr>
						<td>jj_volcon_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>jj_volcon_id</td>
					</tr>
					<tr>
						<td rowspan="2">LINK</td>
						<td rowspan="2">UNIQUE</td>
						<td>vd_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>vd.vd_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<p>None</p>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- jj_volnet - Volcano-network junction -->
				<h2 class="element_title"><a name="jj_volnet" id="jj_volnet"></a>jj_volnet - Volcano-network junction</h2>
				
				<h3>Description</h3>
				<p>This table was created for the many-to-many relationship between the volcano and the observatories that monitor the volcano.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>jj_volnet_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Volcano Identifier</td>
					</tr>
					<tr>
						<td>jj_net_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Network ID</td>
					</tr>
					<tr>
						<td>jj_net_flag</td>
						<td>enum('C', 'S')</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Network type: C=Common, S=Seismic</td>
					</tr>
					<tr>
						<td>jj_volnet_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>jj_volnet_id</td>
					</tr>
					<tr>
						<td rowspan="3">LINK</td>
						<td rowspan="3">UNIQUE</td>
						<td>vd_id</td>
					</tr>
					<tr>
						<td>jj_net_id</td>
					</tr>
					<tr>
						<td>jj_net_flag</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>vd.vd_id</td>
					</tr>
					<tr>
						<td>jj_net_id</td>
						<td><em>jj_net_flag</em>n.<em>jj_net_flag</em>n_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<p>None</p>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- j_sarsat - InSAR-satellite junction -->
				<h2 class="element_title"><a name="j_sarsat" id="j_sarsat"></a>j_sarsat - InSAR-satellite junction</h2>
				
				<h3>Description</h3>
				<p>This table was created for the many-to-many relationship between the satellite data and the InSAR data.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>j_sarsat_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>dd_sar_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>InSAR image ID</td>
					</tr>
					<tr>
						<td>cs_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Satellite ID</td>
					</tr>
					<tr>
						<td>j_sarsat_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>j_sarsat_id</td>
					</tr>
					<tr>
						<td rowspan="2">LINK</td>
						<td rowspan="2">UNIQUE</td>
						<td>dd_sar_id</td>
					</tr>
					<tr>
						<td>cs_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>dd_sar_id</td>
						<td>dd_sar.dd_sar_id</td>
					</tr>
					<tr>
						<td>cs_id</td>
						<td>cs.cs_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<p>None</p>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- md - Map -->
				<h2 class="element_title"><a name="md" id="md"></a>md - Map</h2>
				
				<h3>Description</h3>
				<p>This table stores information about maps that cover areas where WOVOdat data is collected.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>md_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>md_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Volcano Identifier</td>
					</tr>
					<tr>
						<td>md_name</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Name</td>
					</tr>
					<tr>
						<td>md_type</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Type</td>
					</tr>
					<tr>
						<td>md_srtm</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to SRTM</td>
					</tr>
					<tr>
						<td>md_scale</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Scale</td>
					</tr>
					<tr>
						<td>md_contour</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m</td>
						<td>Contour interval</td>
					</tr>
					<tr>
						<td>md_date</td>
						<td>date</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publication date</td>
					</tr>
					<tr>
						<td>md_date_unc</td>
						<td>date</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publication date uncertainty</td>
					</tr>
					<tr>
						<td>md_proj</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Projection</td>
					</tr>
					<tr>
						<td>md_map_datum</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Datum</td>
					</tr>
					<tr>
						<td>md_west</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>West bounding coordinate</td>
					</tr>
					<tr>
						<td>md_east</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>East bounding coordinate</td>
					</tr>
					<tr>
						<td>md_north</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>North bounding coordinate</td>
					</tr>
					<tr>
						<td>md_south</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>South bounding coordinate</td>
					</tr>
					<tr>
						<td>md_elev_max</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m</td>
						<td>Maximum elevation</td>
					</tr>
					<tr>
						<td>md_elev_min</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m</td>
						<td>Minimum elevation</td>
					</tr>
					<tr>
						<td>md_use</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Intended use</td>
					</tr>
					<tr>
						<td>md_restrictions</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Restrictions on the use</td>
					</tr>
					<tr>
						<td>md_quality</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Quality</td>
					</tr>
					<tr>
						<td>md_image</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to image</td>
					</tr>
					<tr>
						<td>md_desc</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Description</td>
					</tr>
					<tr>
						<td>md_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>
					<tr>
						<td>md_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>md_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>md_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>md_id</td>
					</tr>
					<tr>
						<td rowspan="2">CODE</td>
						<td rowspan="2">UNIQUE</td>
						<td>md_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>vd.vd_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li>md_elev_min &le; md_elev_max</li>
				</ul>

				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- med - Meteo data -->
				<h2 class="element_title"><a name="med" id="med"></a>med - Meteo data</h2>
				
				<h3>Description</h3>
				<p>This table stores all of the meteo data including temperature, wind speed, and Cloud coverage.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>med_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>med_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>ms_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Meteo station ID</td>
					</tr>
					<tr>
						<td>mi_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Meteo instrument ID</td>
					</tr>
					<tr>
						<td>med_time</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Measurement time</td>
					</tr>
					<tr>
						<td>med_time_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Measurement time uncertainty</td>
					</tr>
					<tr>
						<td>med_temp</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Air temperature</td>
					</tr>
					<tr>
						<td>med_stemp</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Soil temperature</td>
					</tr>
					<tr>
						<td>med_bp</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Barometric pressure at the time of measurement</td>
					</tr>
					<tr>
						<td>med_prec</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m</td>
						<td>Measured precipitation (daily)</td>
					</tr>
					<tr>
						<td>med_tprec</td>
						<td>enum('R','FR','S','H','R-FR','R-S','R-H','FR-R','FR-S','FR-H','S-R','S-FR','S-H','H-R','H-FR','H-S')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Type of precipitation: R=Rain, FR=Freezing Rain, S=Snow, H=Hail, and combinations</td>
					</tr>
					<tr>
						<td>med_hd</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Humidity</td>
					</tr>
					<tr>
						<td>med_wind</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Wind speed</td>
					</tr>
					<tr>
						<td>med_wsmin</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Minimum Wind speed</td>
					</tr>
					<tr>
						<td>med_wsmax</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Maximum Wind speed</td>
					</tr>
					<tr>
						<td>med_wdir</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Wind direction</td>
					</tr>
					<tr>
						<td>med_clc</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Cloud coverage</td>
					</tr>
					<tr>
						<td>med_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>					
					<tr>
						<td>med_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>med_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>med_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>med_id</td>
					</tr>
					<tr>
						<td rowspan="2">CODE</td>
						<td rowspan="2">UNIQUE</td>
						<td>med_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>ms_id</td>
						<td>ms.ms_id</td>
					</tr>
					<tr>
						<td>mi_id</td>
						<td>mi.mi_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li><em>ms_id</em>.ms_stime &le; med_time &le; <em>ms_id</em>.ms_etime</li>
					<li><em>mi_id</em>.mi_stime &le; med_time &le; <em>mi_id</em>.mi_etime</li>
					<li>ms_id = <em>mi_id</em>.ms_id</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- mi - Meteo instrument -->
				<h2 class="element_title"><a name="mi" id="mi"></a>mi - Meteo instrument</h2>
				
				<h3>Description</h3>
				<p>This table stores information about each individual meteo instrument.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>mi_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>mi_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>ms_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Meteo station ID</td>
					</tr>
					<tr>
						<td>mi_name</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Name</td>
					</tr>
					<tr>
						<td>mi_type</td>
						<td>varchar(50)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Type</td>
					</tr>
					<tr>
						<td>mi_units</td>
						<td>varchar(50)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Measured units</td>
					</tr>
					<tr>
						<td>mi_res</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Resolution</td>
					</tr>
					<tr>
						<td>mi_stime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start date</td>
					</tr>
					<tr>
						<td>mi_stime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start date uncertainty</td>
					</tr>
					<tr>
						<td>mi_etime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End date</td>
					</tr>
					<tr>
						<td>mi_etime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End date uncertainty</td>
					</tr>
					<tr>
						<td>mi_desc</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Description</td>
					</tr>
					<tr>
						<td>mi_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>
					<tr>
						<td>mi_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>					
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>mi_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>mi_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>hield(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>mi_id</td>
					</tr>
					<tr>
						<td rowspan="3">CODE</td>
						<td rowspan="3">UNIQUE</td>
						<td>mi_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
					<tr>
						<td>mi_stime</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>ms_id</td>
						<td>ms.ms_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li>mi_stime &le; mi_etime</li>
					<li><em>ms_id</em>.ms_stime &le; mi_stime &le; <em>ms_id</em>.ms_etime</li>
					<li><em>ms_id</em>.ms_stime &le; mi_etime &le; <em>ms_id</em>.ms_etime</li>
				</ul>				

				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- ms - Meteo station -->
				<h2 class="element_title"><a name="ms" id="ms"></a>ms - Meteo station</h2>
				
				<h3>Description</h3>
				<p>This table stores information such as location, name, and descriptions for stations where meteo data are collected.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>ms_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>ms_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>cn_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Meteo network ID</td>
					</tr>
					<tr>
						<td>ms_name</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Station Name</td>
					</tr>
					<tr>
						<td>ms_lat</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Latitude</td>
					</tr>
					<tr>
						<td>ms_lon</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Longitude</td>
					</tr>
					<tr>
						<td>ms_elev</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m</td>
						<td>Elevation</td>
					</tr>
					<tr>
						<td>ms_perm</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>List of permanent instruments</td>
					</tr>
					<tr>
						<td>ms_type</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Type</td>
					</tr>
					<tr>
						<td>ms_stime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start date</td>
					</tr>
					<tr>
						<td>ms_stime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start date uncertainty</td>
					</tr>
					<tr>
						<td>ms_etime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End date</td>
					</tr>
					<tr>
						<td>ms_etime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End date uncertainty</td>
					</tr>
					<tr>
						<td>ms_utc</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Difference from UTC</td>
					</tr>
					<tr>
						<td>ms_desc</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Description</td>
					</tr>
					<tr>
						<td>ms_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>
					<tr>
						<td>ms_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>					
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>ms_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>ms_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>ms_id</td>
					</tr>
					<tr>
						<td rowspan="3">CODE</td>
						<td rowspan="3">UNIQUE</td>
						<td>ms_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
					<tr>
						<td>ms_stime</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>cn_id</td>
						<td>cn.cn_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li>ms_stime &le; ms_etime</li>
					<li><em>cn_id</em>.cn_stime &le; ms_stime &le; <em>cn_id</em>.cn_etime</li>
					<li><em>cn_id</em>.cn_stime &le; ms_etime &le; <em>cn_id</em>.cn_etime</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- sd_evn - Seismic event data from a network -->
				<h2 class="element_title"><a name="sd_evn" id="sd_evn"></a>sd_evn - Seismic event data from a network</h2>
				
				<h3>Description</h3>
				<p>This table contains seismic data that were collected from several stations in a network and then processed to give a location.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>sd_evn_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>sd_evn_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>sn_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Seismic network ID</td>
					</tr>
					<tr>
						<td>sd_evn_arch</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Location of the seismogram archive</td>
					</tr>
					<tr>
						<td>sd_evn_time</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Origin time</td>
					</tr>
					<tr>
						<td>sd_evn_timecsec</td>
						<td>decimal(2,2)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Centisecond precision for origin time</td>
					</tr>
					<tr>
						<td>sd_evn_time_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Origin time uncertainty</td>
					</tr>
					<tr>
						<td>sd_evn_timecsec_unc</td>
						<td>decimal(2,2)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Centisecond precision for origin time uncertainty</td>
					</tr>
					<tr>
						<td>sd_evn_dur</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>s</td>
						<td>Average duration of the earthquake as recorded at stations &lt;15 km from the volcano</td>
					</tr>
					<tr>
						<td>sd_evn_dur_unc</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>s</td>
						<td>Uncertainty in average duration of the earthquake</td>
					</tr>
					<tr>
						<td>sd_evn_tech</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>The technique used to locate the event</td>
					</tr>
					<tr>
						<td>sd_evn_picks</td>
						<td>enum('A', 'R', 'H', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Determination of picks: A=Automatic picker, R=Ruler, H=Human using a computer-based picker, U=Unknown</td>
					</tr>
					<tr>
						<td>sd_evn_elat</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Estimated latitude</td>
					</tr>
					<tr>
						<td>sd_evn_elon</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Estimated longitude</td>
					</tr>
					<tr>
						<td>sd_evn_edepth</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>km</td>
						<td>Estimated depth</td>
					</tr>
					<tr>
						<td>sd_evn_fixdep</td>
						<td>enum('Y', 'N', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Fixed depth: Y=Yes, N=No, U=Unknown</td>
					</tr>
					<tr>
						<td>sd_evn_nst</td>
						<td>tinyint(3)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>The total number of seismic stations that reported arrival times for this earthquake</td>
					</tr>
					<tr>
						<td>sd_evn_nph</td>
						<td>tinyint(3)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>The total number of P and S arrival-time observations used to compute the hypocenter location</td>
					</tr>
					<tr>
						<td>sd_evn_gp</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>The largest azimuthal gap between azimuthally adjacent stations</td>
					</tr>
					<tr>
						<td>sd_evn_dcs</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>km</td>
						<td>Horizontal distance from the epicenter to the nearest station</td>
					</tr>
					<tr>
						<td>sd_evn_rms</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>s</td>
						<td>RMS travel time residual</td>
					</tr>
					<tr>
						<td>sd_evn_herr</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>km</td>
						<td>The horizontal location error defined as the length of the largest projection of the three principal errors on a horizontal plane</td>
					</tr>
					<tr>
						<td>sd_evn_xerr</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>km</td>
						<td>The maximum x (longitude) error for cases where the horizontal error is not given</td>
					</tr>
					<tr>
						<td>sd_evn_yerr</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>km</td>
						<td>The maximum y (latitude) error for cases where the horizontal error is not given</td>
					</tr>
					<tr>
						<td>sd_evn_derr</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>km</td>
						<td>The depth error defined as the largest projection of the three principal errors on a vertical line</td>
					</tr>
					<tr>
						<td>sd_evn_locqual</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>The quality of the calculated location</td>
					</tr>
					<tr>
						<td>sd_evn_pmag</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>The primary magnitude</td>
					</tr>
					<tr>
						<td>sd_evn_pmag_type</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>The primary magnitude type, e.g., Ms, Mb, Mw, Md (the last, duration or "coda" magnitude)</td>
					</tr>
					<tr>
						<td>sd_evn_smag</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A secondary magnitude</td>
					</tr>
					<tr>
						<td>sd_evn_smag_type</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Secondary magnitude type</td>
					</tr>
					<tr>
						<td>sd_evn_eqtype</td>
						<td>enum('R','Q','V','VT','VT_D','VT_S','H','H_HLF','H_LHF','LF','LF_LP','LF_T','LF_ILF','VLP','E','U','O','X')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>The WOVOdat terminology for the earthquake type: U=Unknown Origin, O=Other non-volcanic, X=Undefined</td>
					</tr>
					<tr>
						<td>sd_evn_mtscale</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>The scale of the following moment tensor data. Please store as a multiplier for the moment tensor data</td>
					</tr>
					<tr>
						<td>sd_evn_mxx</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Moment tensor m_xx stored as +/- x.xx</td>
					</tr>
					<tr>
						<td>sd_evn_mxy</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Moment tensor m_xy stored as +/- x.xx</td>
					</tr>
					<tr>
						<td>sd_evn_mxz</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Moment tensor m_xz stored as +/- x.xx</td>
					</tr>
					<tr>
						<td>sd_evn_myy</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Moment tensor m_yy</td>
					</tr>
					<tr>
						<td>sd_evn_myz</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Moment tensor m_yz</td>
					</tr>
					<tr>
						<td>sd_evn_mzz</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Moment tensor m_zz</td>
					</tr>
					<tr>
						<td>sd_evn_strk1</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Strike 1 of best double couple</td>
					</tr>
					<tr>
						<td>sd_evn_strk1_err</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>The uncertainty in the value of strike 1</td>
					</tr>
					<tr>
						<td>sd_evn_dip1</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Dip 1 of best double couple</td>
					</tr>
					<tr>
						<td>sd_evn_dip1_err</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>The uncertainty in the value of dip 1</td>
					</tr>
					<tr>
						<td>sd_evn_rak1</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Rake 1 of best double couple</td>
					</tr>
					<tr>
						<td>sd_evn_rak1_err</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>The uncertainty in the value of rake 1</td>
					</tr>
					<tr>
						<td>sd_evn_strk2</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Strike 2 of best double couple</td>
					</tr>
					<tr>
						<td>sd_evn_strk2_err</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>The uncertainty in the value of strike 2</td>
					</tr>
					<tr>
						<td>sd_evn_dip2</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Dip 2 of best double couple</td>
					</tr>
					<tr>
						<td>sd_evn_dip2_err</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>The uncertainty in the value of dip 2</td>
					</tr>
					<tr>
						<td>sd_evn_rak2</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Rake 2 of best double couple</td>
					</tr>
					<tr>
						<td>sd_evn_rak2_err</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>The uncertainty in the value of rake 2</td>
					</tr>
					<tr>
						<td>sd_evn_foc</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>The focal plane solution (beachball, w/ arrivals) stored as a .gif for well defined events</td>
					</tr>
					<tr>
						<td>sd_evn_samp</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>Hz</td>
						<td>The sampling rate</td>
					</tr>
					<tr>
						<td>sd_evn_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>
					<tr>
						<td>sd_evn_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>					
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Collector ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>					
					<tr>
						<td>sd_evn_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>sd_evn_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>sd_evn_id</td>
					</tr>
					<tr>
						<td rowspan="4">CODE</td>
						<td rowspan="4">UNIQUE</td>
						<td>sd_evn_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
					<tr>
						<td>sn_id</td>
					</tr>
					<tr>
						<td>sd_evn_tech</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>sn_id</td>
						<td>sn.sn_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>					
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li><em>sn_id</em>.sn_stime &le; sd_evn_time &le; <em>sn_id</em>.sn_etime</li>
					<li>0 &le; sd_evn_gp &le; 360</li>
					<li>0 &le; sd_evn_strk1 &le; 360</li>
					<li>0 &le; sd_evn_dip1 &le; 90</li>
					<li>0 &le; sd_evn_rak1 &le; 90</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- sd_evs - Seismic event data from a single station -->
				<h2 class="element_title"><a name="sd_evs" id="sd_evs"></a>sd_evs - Seismic event data from a single station</h2>
				
				<h3>Description</h3>
				<p>This table contains seismic data that were collected from a single station and therefore no location can be calculated.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>sd_evs_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>sd_evs_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>ss_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Seismic station ID</td>
					</tr>
					<tr>
						<td>sd_evs_time</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time</td>
					</tr>
					<tr>
						<td>sd_evs_time_ms</td>
						<td>decimal(2,2)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Centisecond precision for start time</td>
					</tr>
					<tr>
						<td>sd_evs_time_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time uncertainty</td>
					</tr>
					<tr>
						<td>sd_evs_time_unc_ms</td>
						<td>decimal(2,2)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Centisecond precision for start time uncertainty</td>
					</tr>
					<tr>
						<td>sd_evs_picks</td>
						<td>enum('A', 'R', 'H', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Determination of picks: A=Automatic picker, R=Ruler, H=Human using a computer-based picker, U=Unknown</td>
					</tr>
					<tr>
						<td>sd_evs_spint</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>s</td>
						<td>S-P interval</td>
					</tr>
					<tr>
						<td>sd_evs_dur</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>s</td>
						<td>Duration</td>
					</tr>
					<tr>
						<td>sd_evs_dur_unc</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>s</td>
						<td>Duration uncertainty</td>
					</tr>
					<tr>
						<td>sd_evs_dist_actven</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>km</td>
						<td>Distance from active vent</td>
					</tr>
					<tr>
						<td>sd_evs_maxamptrac</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Maximum amplitude of trace</td>
					</tr>
					<tr>
						<td>sd_evs_samp</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>Hz</td>
						<td>Sampling rate</td>
					</tr>
					<tr>
						<td>sd_evs_eqtype</td>
						<td>enum('R','Q','V','VT','VT_D','VT_S','H','H_HLF','H_LHF','LF','LF_LP','LF_T','LF_ILF','VLP','E','U','O','X')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>The WOVOdat terminology for the earthquake type: U=Unknown Origin, O=Other non-volcanic, X=Undefined</td>
					</tr>
					<tr>
						<td>sd_evs_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>	
					<tr>
						<td>sd_evs_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>					
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>sd_evs_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>sd_evs_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>sd_evs_id</td>
					</tr>
					<tr>
						<td rowspan="2">CODE</td>
						<td rowspan="2">UNIQUE</td>
						<td>sd_evs_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>ss_id</td>
						<td>ss.ss_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li><em>ss_id</em>.ss_stime &le; sd_evs_time &le; <em>ss_id</em>.ss_etime</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- sd_int - Intensity -->
				<h2 class="element_title"><a name="sd_int" id="sd_int"></a>sd_int - Intensity</h2>
				
				<h3>Description</h3>
				<p>This table was created to store information about the intensities of events that may or may not have been recorded by a station.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>sd_int_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>sd_int_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Volcano Identifier</td>
					</tr>
					<tr>
						<td>sd_evn_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Probable network event ID</td>
					</tr>
					<tr>
						<td>sd_evs_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Probable single station event ID</td>
					</tr>
					<tr>
						<td>sd_int_time</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Time</td>
					</tr>
					<tr>
						<td>sd_int_time_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Time uncertainty</td>
					</tr>
					<tr>
						<td>sd_int_city</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>City</td>
					</tr>
					<tr>
						<td>sd_int_maxdist</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>km</td>
						<td>Maximum distance felt</td>
					</tr>
					<tr>
						<td>sd_int_maxrint</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Maximum reported intensity</td>
					</tr>
					<tr>
						<td>sd_int_maxrint_dist</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>km</td>
						<td>Distance at maximum reported intensity</td>
					</tr>
					<tr>
						<td>sd_int_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>
					<tr>
						<td>sd_int_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>					
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>sd_int_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>sd_int_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>sd_int_id</td>
					</tr>
					<tr>
						<td rowspan="2">CODE</td>
						<td rowspan="2">UNIQUE</td>
						<td>sd_int_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>vd.vd_id</td>
					</tr>
					<tr>
						<td>sd_evn_id</td>
						<td>sd_evn.sd_evn_id</td>
					</tr>
					<tr>
						<td>sd_evs_id</td>
						<td>sd_evs.sd_evs_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<p>None</p>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- sd_ivl - Interval (swarm) -->
				<h2 class="element_title"><a name="sd_ivl" id="sd_ivl"></a>sd_ivl - Interval (swarm)</h2>
				
				<h3>Description</h3>
				<p>This table contains data about earthquakes that occur in specified time intervals, e.g., as seismic swarms.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>sd_ivl_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>sd_ivl_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>sn_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Seismic network ID</td>
					</tr>
					<tr>
						<td>ss_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Seismic station ID</td>
					</tr>
					<tr>
						<td>sd_ivl_eqtype</td>
						<td>enum('R','Q','V','VT','VT_D','VT_S','H','H_HLF','H_LHF','LF','LF_LP','LF_T','LF_ILF','VLP','E','U','O','X')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>The WOVOdat terminology for the earthquake type: U=Unknown Origin, O=Other non-volcanic, X=Undefined</td>
					</tr>
					<tr>
						<td>sd_ivl_stime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time</td>
					</tr>
					<tr>
						<td>sd_ivl_stime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time uncertainty</td>
					</tr>
					<tr>
						<td>sd_ivl_etime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End time</td>
					</tr>
					<tr>
						<td>sd_ivl_etime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End time uncertainty</td>
					</tr>
					<tr>
						<td>sd_ivl_hdist</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>km</td>
						<td>Horizontal distance from summit to swarm center</td>
					</tr>
					<tr>
						<td>sd_ivl_avgdepth</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m</td>
						<td>Mean depth</td>
					</tr>
					<tr>
						<td>sd_ivl_vdispers</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>km</td>
						<td>Vertical dispersion</td>
					</tr>
					<tr>
						<td>sd_ivl_hmigr_hyp</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>km</td>
						<td>Horizontal migration of hypocenters</td>
					</tr>
					<tr>
						<td>sd_ivl_vmigr_hyp</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>km</td>
						<td>Vertical migration of hypocenters</td>
					</tr>
					<tr>
						<td>sd_ivl_patt</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Temporal pattern</td>
					</tr>
					<tr>
						<td>sd_ivl_data</td>
						<td>enum('L', 'C', 'H', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Data type: L=Located earthquakes, C=Detected by computer trigger algorithm, H=Hand counted, U=Unknown</td>
					</tr>
					<tr>
						<td>sd_ivl_picks</td>
						<td>enum('A', 'R', 'H', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Determination of picks: A=Automatic picker, R=Ruler, H=Human using a computer-based picker, U=Unknown</td>
					</tr>
					<tr>
						<td>sd_ivl_felt_stime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Earthquake counts felt start time</td>
					</tr>
					<tr>
						<td>sd_ivl_felt_stime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Earthquake counts felt start time uncertainty</td>
					</tr>
					<tr>
						<td>sd_ivl_felt_etime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Earthquake counts felt end time</td>
					</tr>
					<tr>
						<td>sd_ivl_felt_etime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Earthquake counts felt end time uncertainty</td>
					</tr>
					<tr>
						<td>sd_ivl_nrec</td>
						<td>mediumint(6)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Number of recorded earthquakes</td>
					</tr>
					<tr>
						<td>sd_ivl_nfelt</td>
						<td>smallint(4)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Number of felt earthquakes</td>
					</tr>
					<tr>
						<td>sd_ivl_etot_stime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Total seismic energy release measurement start time</td>
					</tr>
					<tr>
						<td>sd_ivl_etot_stime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Total seismic energy release measurement start time uncertainty</td>
					</tr>
					<tr>
						<td>sd_ivl_etot_etime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Total seismic energy release measurement end time</td>
					</tr>
					<tr>
						<td>sd_ivl_etot_etime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Total seismic energy release measurement end time uncertainty</td>
					</tr>
					<tr>
						<td>sd_ivl_etot</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>erg<sup>-0.5</sup></td>
						<td>Total seismic energy release</td>
					</tr>
					<tr>
						<td>sd_ivl_fmin</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Minimum frequency</td>
					</tr>
					<tr>
						<td>sd_ivl_fmax</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Maximum frequency</td>
					</tr>
					<tr>
						<td>sd_ivl_amin</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Minimum amplitude</td>
					</tr>
					<tr>
						<td>sd_ivl_amax</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Maximum amplitude</td>
					</tr>
					<tr>
						<td>sd_ivl_desc</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Description</td>
					</tr> 
					<tr>
						<td>sd_ivl_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>					
					<tr>
						<td>sd_ivl_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>	
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>sd_ivl_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>sd_ivl_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>sd_ivl_id</td>
					</tr>
					<tr>
						<td rowspan="2">CODE</td>
						<td rowspan="2">UNIQUE</td>
						<td>sd_ivl_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>sn_id</td>
						<td>sn.sn_id</td>
					</tr>
					<tr>
						<td>ss_id</td>
						<td>ss.ss_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>					
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li>sd_ivl_stime &le; sd_ivl_etime</li>
					<li>sd_ivl_felt_stime &le; sd_ivl_felt_etime</li>
					<li>sd_ivl_etot_stime &le; sd_ivl_etot_etime</li>
					<li><em>sn_id</em>.sn_stime &le; sd_ivl_stime &le; <em>sn_id</em>.sn_etime</li>
					<li><em>sn_id</em>.sn_stime &le; sd_ivl_etime &le; <em>sn_id</em>.sn_etime</li>
					<li><em>ss_id</em>.ss_stime &le; sd_ivl_stime &le; <em>ss_id</em>.ss_etime</li>
					<li><em>ss_id</em>.ss_stime &le; sd_ivl_etime &le; <em>ss_id</em>.ss_etime</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- sd_rsm - RSAM data -->
				<h2 class="element_title"><a name="sd_rsm" id="sd_rsm"></a>sd_rsm - RSAM data</h2>
				
				<h3>Description</h3>
				<p>This table stores the data needed to create an RSAM image.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>sd_rsm_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>sd_sam_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>RSAM-SSAM ID</td>
					</tr>
					<tr>
						<td>sd_rsm_stime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time</td>
					</tr>
					<tr>
						<td>sd_rsm_stime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time uncertainty</td>
					</tr>
					<tr>
						<td>sd_rsm_count</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Count</td>
					</tr>
					<tr>
						<td>sd_rsm_calib</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Reduced displacement per 100 RSAM counts</td>
					</tr>
					<tr>
						<td>sd_rsm_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>					
					<tr>
						<td>sd_rsm_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>sd_rsm_id</td>
					</tr>
					<tr>
						<td rowspan="2">TIME</td>
						<td rowspan="2">UNIQUE</td>
						<td>sd_sam_id</td>
					</tr>
					<tr>
						<td>sd_rsm_stime</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>sd_sam_id</td>
						<td>sd_sam.sd_sam_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<p>For all RSAM data of the same RSAM-SSAM data:</p>
				<ul class="line_height_180">
					<li>start time (sd_rsm_stime) must be unique and continuous<br/>i.e. sd_rsm_stime (n+1) = sd_rsm_stime (n) + sd_sam_int</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- sd_sam - RSAM-SSAM -->
				<h2 class="element_title"><a name="sd_sam" id="sd_sam"></a>sd_sam - RSAM-SSAM</h2>
				
				<h3>Description</h3>
				<p>This table stores information needed to create RSAM and SSAM images.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>sd_sam_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>sd_sam_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>ss_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Seismic station ID</td>
					</tr>
					<tr>
						<td>sd_sam_stime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time</td>
					</tr>
					<tr>
						<td>sd_sam_stime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time uncertainty</td>
					</tr>
					<tr>
						<td>sd_sam_etime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End time</td>
					</tr>
					<tr>
						<td>sd_sam_etime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End time uncertainty</td>
					</tr>
					<tr>
						<td>sd_sam_int</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>s</td>
						<td>Counting interval</td>
					</tr>
					<tr>
						<td>sd_sam_int_unc</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>s</td>
						<td>Counting interval uncertainty</td>
					</tr>
					<tr>
						<td>sd_sam_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>
					<tr>
						<td>sd_sam_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>sd_sam_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>sd_sam_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>sd_sam_id</td>
					</tr>
					<tr>
						<td rowspan="2">CODE</td>
						<td rowspan="2">UNIQUE</td>
						<td>sd_sam_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>ss_id</td>
						<td>ss.ss_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li>sd_sam_stime &le; sd_sam_etime</li>
					<li><em>ss_id</em>.ss_stime &le; sd_sam_stime &le; <em>ss_id</em>.ss_etime</li>
					<li><em>ss_id</em>.ss_stime &le; sd_sam_etime &le; <em>ss_id</em>.ss_etime</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- sd_ssm - SSAM data -->
				<h2 class="element_title"><a name="sd_ssm" id="sd_ssm"></a>sd_ssm - SSAM data</h2>
				
				<h3>Description</h3>
				<p>This table stores the data needed to create an SSAM image.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>sd_ssm_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>sd_sam_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>RSAM-SSAM ID</td>
					</tr>
					<tr>
						<td>sd_ssm_stime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time</td>
					</tr>
					<tr>
						<td>sd_ssm_stime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time uncertainty</td>
					</tr>
					<tr>
						<td>sd_ssm_lowf</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>Hz</td>
						<td>Low frequency limit</td>
					</tr>
					<tr>
						<td>sd_ssm_highf</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>Hz</td>
						<td>High frequency limit</td>
					</tr>
					<tr>
						<td>sd_ssm_count</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Count</td>
					</tr>
					<tr>
						<td>sd_ssm_calib</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Reduced displacement per 100 SSAM counts</td>
					</tr>
					<tr>
						<td>sd_ssm_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>sd_ssm_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>sd_ssm_id</td>
					</tr>
					<tr>
						<td rowspan="2">TIME</td>
						<td rowspan="2">UNIQUE</td>
						<td>sd_sam_id</td>
					</tr>
					<tr>
						<td>sd_ssm_stime</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>sd_sam_id</td>
						<td>sd_sam.sd_sam_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<p>For all SSAM data of the same RSAM-SSAM data:</p>
				<ul class="line_height_180">
					<li>combination of low frequency limit (sd_ssm_lowf) and start time (sd_ssm_stime) must be unique and continuous:<br/>i.e. sd_ssm_lowf (n+1) = sd_ssm_highf (n) AND sd_ssm_stime (n+1) = sd_ssm_stime (n)<br/>OR sd_ssm_lowf (n+1) = MINIMUM (sd_ssm_lowf) AND sd_ssm_stime (n+1) = sd_ssm_stime (n) + sd_sam_int</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- sd_trm - Tremor -->
				<h2 class="element_title"><a name="sd_trm" id="sd_trm"></a>sd_trm - Tremor</h2>
				
				<h3>Description</h3>
				<p>This table contains information about tremor such as the time interval, qualitative depth, dominant frequency, amplitude range, and reduced displacement.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>sd_trm_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>sd_trm_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>sn_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Seismic network ID</td>
					</tr>
					<tr>
						<td>ss_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Seismic station ID</td>
					</tr>
					<tr>
						<td>sd_trm_stime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time</td>
					</tr>
					<tr>
						<td>sd_trm_stime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time uncertainty</td>
					</tr>
					<tr>
						<td>sd_trm_etime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End time</td>
					</tr>
					<tr>
						<td>sd_trm_etime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End time uncertainty</td>
					</tr>
					<tr>
						<td>sd_trm_dur_day</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>min</td>
						<td>Duration per day</td>
					</tr>
					<tr>
						<td>sd_trm_dur_day_unc</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>min</td>
						<td>Duration per day uncertainty</td>
					</tr>
					<tr>
						<td>sd_trm_type</td>
						<td>enum('G', 'M', 'H', 'C')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Type: G=General, M=Monochromatic, H=Harmonic, C=Close-events</td>
					</tr>
					<tr>
						<td>sd_trm_qdepth</td>
						<td>enum('D', 'I', 'S', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Qualitative depth: D=Deep (&gt;10 km), I=Intermediate (4-10 km), S=Shallow (0-4 km), U =Unknown</td>
					</tr>
					<tr>
						<td>sd_trm_domfreq1</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>Hz</td>
						<td>Dominant frequency</td>
					</tr>
					<tr>
						<td>sd_trm_domfreq2</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>Hz</td>
						<td>Second dominant frequency</td>
					</tr>
					<tr>
						<td>sd_trm_maxamp</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Maximum amplitude</td>
					</tr>
					<tr>
						<td>sd_trm_noise</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Background noise level</td>
					</tr>
					<tr>
						<td>sd_trm_reddis</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Reduced displacement (as estimated using a station &gt;5km from source)</td>
					</tr>
					<tr>
						<td>sd_trm_rderr</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Reduced displacement error</td>
					</tr>
					<tr>
						<td>sd_trm_visact</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Description of associated visible activity</td>
					</tr>
					<tr>
						<td>sd_trm_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>
					<tr>
						<td>sd_trm_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Collector ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>sd_trm_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>sd_trm_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>sd_trm_id</td>
					</tr>
					<tr>
						<td rowspan="2">CODE</td>
						<td rowspan="2">UNIQUE</td>
						<td>sd_trm_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>sn_id</td>
						<td>sn.sn_id</td>
					</tr>
					<tr>
						<td>ss_id</td>
						<td>ss.ss_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li>sd_trm_stime &le; sd_trm_etime</li>
					<li><em>sn_id</em>.sn_stime &le; sd_trm_stime &le; <em>sn_id</em>.sn_etime</li>
					<li><em>sn_id</em>.sn_stime &le; sd_trm_etime &le; <em>sn_id</em>.sn_etime</li>
					<li><em>ss_id</em>.ss_stime &le; sd_trm_stime &le; <em>ss_id</em>.ss_etime</li>
					<li><em>ss_id</em>.ss_stime &le; sd_trm_etime &le; <em>ss_id</em>.ss_etime</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- sd_wav - Waveform -->
				<h2 class="element_title"><a name="sd_wav" id="sd_wav"></a>sd_wav - Waveform</h2>
				
				<h3>Description</h3>
				<p>This table contains sample waveforms to highlight common and uncommon events at different volcanoes and links to the event information.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>sd_wav_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>sd_wav_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>ss_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Seismic station ID</td>
					</tr>
					<tr>
						<td>sd_evn_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Seismic event ID</td>
					</tr>
					<tr>
						<td>sd_evs_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Single Station Event ID</td>
					</tr>
					<tr>
						<td>sd_trm_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Tremor ID</td>
					</tr>					
					<tr>
						<td>sd_wav_arch</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Location of seismogram archive</td>
					</tr>
					<tr>
						<td>sd_wav_link</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to archive</td>
					</tr>
					<tr>
						<td>sd_wav_dist</td>
						<td>enum('P', 'I', 'D', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Distance from summit: P=Proximal (&lt; 2 km), I=Intermediate (2-5 km), D=Distal (&gt; 5 km), U=Unknown</td>
					</tr>
					<tr>
						<td>sd_wav_img</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Image</td>
					</tr>
					<tr>
						<td>sd_wav_info</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Information</td>
					</tr>
					<tr>
						<td>sd_wav_desc</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Description</td>
					</tr>
					<tr>
						<td>sd_wav_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>
					<tr>
						<td>sd_wav_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Description</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>sd_wav_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>sd_wav_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>sd_wav_id</td>
					</tr>
					<tr>
						<td rowspan="2">CODE</td>
						<td rowspan="2">UNIQUE</td>
						<td>sd_wav_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>ss_id</td>
						<td>ss.ss_id</td>
					</tr>
					<tr>
						<td>sd_evn_id</td>
						<td>sd_evn.sd_evn_id</td>
					</tr>
					<tr>
						<td>sd_evs_id</td>
						<td>sd_evs.sd_evs_id</td>
					</tr>
					<tr>
						<td>sd_trm_id</td>
						<td>sd_trm.sd_trm_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>					
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<p>None</p>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- si - Seismic instrument -->
				<h2 class="element_title"><a name="si" id="si"></a>si - Seismic instrument</h2>
				
				<h3>Description</h3>
				<p>This table stores information such as the instrument name, model, number of components and response time.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>si_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>si_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>ss_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Seismic station ID</td>
					</tr>
					<tr>
						<td>si_name</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Name</td>
					</tr>
					<tr>
						<td>si_type</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Type</td>
					</tr>
					<tr>
						<td>si_range</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Dynamic range</td>
					</tr>
					<tr>
						<td>si_igain</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Gain</td>
					</tr>
					<tr>
						<td>si_filter</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Filters</td>
					</tr>
					<tr>
						<td>si_ncomp</td>
						<td>tinyint(3)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Number of components</td>
					</tr>
					<tr>
						<td>si_resp</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Response overview</td>
					</tr>
					<tr>
						<td>si_resp_file</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>File containing response</td>
					</tr>
					<tr>
						<td>si_stime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start date</td>
					</tr>
					<tr>
						<td>si_stime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start date uncertainty</td>
					</tr>
					<tr>
						<td>si_etime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End date</td>
					</tr>
					<tr>
						<td>si_etime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End date uncertainty</td>
					</tr>
					<tr>
						<td>si_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>
					<tr>
						<td>si_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>si_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>si_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>					
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>sield(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>si_id</td>
					</tr>
					<tr>
						<td rowspan="3">CODE</td>
						<td rowspan="3">UNIQUE</td>
						<td>si_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
					<tr>
						<td>si_stime</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>ss_id</td>
						<td>ss.ss_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li>si_stime &le; si_etime</li>
					<li><em>ss_id</em>.ss_stime &le; si_stime &le; <em>ss_id</em>.ss_etime</li>
					<li><em>ss_id</em>.ss_stime &le; si_etime &le; <em>ss_id</em>.ss_etime</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- si_cmp - Seismic component -->
				<h2 class="element_title"><a name="si_cmp" id="si_cmp"></a>si_cmp - Seismic component</h2>
				
				<h3>Description</h3>
				<p>This table stores information about an individual component (geophone) that sends data to the instrument or recorder such as the component name, model, orientation, band type, and sampling rate.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>si_cmp_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>si_cmp_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>si_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Seismic instrument ID</td>
					</tr>
					<tr>
						<td>si_cmp_name</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Name</td>
					</tr>
					<tr>
						<td>si_cmp_type</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Type</td>
					</tr>
					<tr>
						<td>si_cmp_resp</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Description of response</td>
					</tr>
					<tr>
						<td>si_cmp_band</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Band type (SEED convention)</td>
					</tr>
					<tr>
						<td>si_cmp_samp</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>Hz</td>
						<td>Sampling rate</td>
					</tr>
					<tr>
						<td>si_cmp_icode</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Instrument code (SEED convention)</td>
					</tr>
					<tr>
						<td>si_cmp_orient</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Orientation code (SEED convention)</td>
					</tr>
					<tr>
						<td>si_cmp_sens</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Sensitivity</td>
					</tr>
					<tr>
						<td>si_cmp_depth</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m</td>
						<td>Depth</td>
					</tr>
					<tr>
						<td>si_cmp_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>
					<tr>
						<td>si_cmp_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>si_cmp_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>si_cmp_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNsi_cmpGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>si_cmpeld(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>si_cmp_id</td>
					</tr>
					<tr>
						<td rowspan="2">CODE</td>
						<td rowspan="2">UNIQUE</td>
						<td>si_cmp_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>si_id</td>
						<td>si.si_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<p>None</p>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- sn - Seismic network -->
				<h2 class="element_title"><a name="sn" id="sn"></a>sn - Seismic network</h2>
				
				<h3>Description</h3>
				<p>This table contains information about the seismic network such as the velocity model used for computing the event locations and a general overview of the types of instruments used.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>sn_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>sn_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Volcano Identifier</td>
					</tr>
					<tr>
						<td>sn_name</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Name</td>
					</tr>
					<tr>
						<td>sn_vmodel</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Description of velocity model</td>
					</tr>
					<tr>
						<td>sn_vmodel_detail</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to a file containing additional details about velocity model</td>
					</tr>
					<tr>
						<td>sn_zerokm</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m</td>
						<td>Elevation of zero km "depth"</td>
					</tr>
					<tr>
						<td>sn_fdepth_flag</td>
						<td>enum('Y', 'N', 'U')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Depth is fixed: Y=Yes, N=No, U=Unknown</td>
					</tr>
					<tr>
						<td>sn_fdepth</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Fixed depth description</td>
					</tr>
					<tr>
						<td>sn_stime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start date</td>
					</tr>
					<tr>
						<td>sn_stime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start date uncertainty</td>
					</tr>
					<tr>
						<td>sn_etime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End date</td>
					</tr>
					<tr>
						<td>sn_etime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End date uncertainty</td>
					</tr>
					<tr>
						<td>sn_tot</td>
						<td>tinyint(3)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Total number of seismometers</td>
					</tr>
					<tr>
						<td>sn_bb</td>
						<td>tinyint(3)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Number of broadband seismometers</td>
					</tr>
					<tr>
						<td>sn_smp</td>
						<td>tinyint(3)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Number of short- and mid-period seismometers</td>
					</tr>
					<tr>
						<td>sn_digital</td>
						<td>tinyint(3)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Number of digital seismometers</td>
					</tr>
					<tr>
						<td>sn_analog</td>
						<td>tinyint(3)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Number of analog seismometers</td>
					</tr>
					<tr>
						<td>sn_tcomp</td>
						<td>tinyint(3)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Number of 3 component seismometers</td>
					</tr>
					<tr>
						<td>sn_micro</td>
						<td>tinyint(3)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Number of microphones</td>
					</tr>
					<tr>
						<td>sn_desc</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Description</td>
					</tr>
					<tr>
						<td>sn_utc</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Difference from UTC</td>
					</tr>
					<tr>
						<td>sn_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>
					<tr>
						<td>sn_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>					
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>sn_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>sn_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNsnGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>sneld(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>sn_id</td>
					</tr>
					<tr>
						<td rowspan="4">CODE</td>
						<td rowspan="4">UNIQUE</td>
						<td>sn_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
					<tr>
						<td>sn_stime</td>
					</tr>
					<tr>
						<td>sn_vmodel</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>vd.vd_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li>sn_bb &le; sn_tot</li>
					<li>sn_smp &le; sn_tot</li>
					<li>sn_digital &le; sn_tot</li>
					<li>sn_analog &le; sn_tot</li>
					<li>sn_tcomp &le; sn_tot</li>
					<li>sn_micro &le; sn_tot</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- ss - Seismic station -->
				<h2 class="element_title"><a name="ss" id="ss"></a>ss - Seismic station</h2>
				
				<h3>Description</h3>
				<p>This table stores information such as a location, name, system gain, and comments about the stations where the data are collected.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>ss_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>ss_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>sn_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Seismic network ID</td>
					</tr>
					<tr>
						<td>ss_name</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Name</td>
					</tr>
					<tr>
						<td>ss_lat</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Latitude</td>
					</tr>
					<tr>
						<td>ss_lon</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Lonsitude</td>
					</tr>
					<tr>
						<td>ss_elev</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m</td>
						<td>Elevation</td>
					</tr>
					<tr>
						<td>ss_depth</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m</td>
						<td>Depth of instruments</td>
					</tr>
					<tr>
						<td>ss_stime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start date</td>
					</tr>
					<tr>
						<td>ss_stime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start date uncertainty</td>
					</tr>
					<tr>
						<td>ss_etime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End date</td>
					</tr>
					<tr>
						<td>ss_etime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End date uncertainty</td>
					</tr>
					<tr>
						<td>ss_utc</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Difference from UTC</td>
					</tr>
					<tr>
						<td>ss_instr_type</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Instrument types</td>
					</tr>
					<tr>
						<td>ss_sgain</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>System gain</td>
					</tr>
					<tr>
						<td>ss_desc</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Description</td>
					</tr>
					<tr>
						<td>ss_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>					
					<tr>
						<td>ss_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>ss_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>ss_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>ss_id</td>
					</tr>
					<tr>
						<td rowspan="3">CODE</td>
						<td rowspan="3">UNIQUE</td>
						<td>ss_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
					<tr>
						<td>ss_stime</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>sn_id</td>
						<td>sn.sn_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li>ss_stime &le; ss_etime</li>
					<li><em>sn_id</em>.sn_stime &le; ss_stime &le; <em>sn_id</em>.sn_etime</li>
					<li><em>sn_id</em>.sn_stime &le; ss_etime &le; <em>sn_id</em>.sn_etime</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- st_eqt - Earthquake translation -->
				<h2 class="element_title"><a name="st_eqt" id="st_eqt"></a>st_eqt - Earthquake translation</h2>
				
				<h3>Description</h3>
				<p>This table allows users to translate an earthquake type defined by one observatory to the WOVOdat earthquake type.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>st_eqt_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>st_eqt_org</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Original terminology</td>
					</tr>
					<tr>
						<td>st_eqt_wovo</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>WOVOdat terminology</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Contact ID</td>
					</tr>
					<tr>
						<td>st_eqt_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>st_eqt_id</td>
					</tr>
					<tr>
						<td rowspan="2">USER TRANSLATION</td>
						<td rowspan="2">UNIQUE</td>
						<td>st_eqt_wovo</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<p>None</p>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- td - Ground-based thermal data -->
				<h2 class="element_title"><a name="td" id="td"></a>td - Ground-based thermal data</h2>
				
				<h3>Description</h3>
				<p>This table stores all of the thermal data collected on the ground.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>td_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>td_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>ts_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Thermal station ID</td>
					</tr>
					<tr>
						<td>ti_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Thermal instrument ID</td>
					</tr>
					<tr>
						<td>td_mtype</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Measurement type</td>
					</tr>
					<tr>
						<td>td_time</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Measurement time</td>
					</tr>
					<tr>
						<td>td_time_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Measurement time uncertainty</td>
					</tr>
					<tr>
						<td>td_depth</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m</td>
						<td>Depth of measurement</td>
					</tr>
					<tr>
						<td>td_distance</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m</td>
						<td>Distance from instrument to the measured object</td>
					</tr>
					<tr>
						<td>td_calc_flag</td>
						<td>enum('O', 'R')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Recalculated value: O=Original, R=Recalculated</td>
					</tr>
					<tr>
						<td>td_temp</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;C</td>
						<td>Temperature</td>
					</tr>
					<tr>
						<td>td_terr</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;C</td>
						<td>Temperature standard error</td>
					</tr>
					<tr>
						<td>td_aarea</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m<sup>2</sup></td>
						<td>Approximate area of body measured</td>
					</tr>
					<tr>
						<td>td_flux</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>W/m<sup>2</sup></td>
						<td>Heat flux</td>
					</tr>
					<tr>
						<td>td_ferr</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>W/m<sup>2</sup></td>
						<td>Heat flux standard error</td>
					</tr>
					<tr>
						<td>td_bkgg</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;C/km</td>
						<td>Background geothermal gradient</td>
					</tr>
					<tr>
						<td>td_tcond</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>W/(m<sup>2</sup> &deg;C)</td>
						<td>Thermal conductivity</td>
					</tr>
					<tr>
						<td>td_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>
					<tr>
						<td>td_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>td_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>td_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>td_id</td>
					</tr>
					<tr>
						<td rowspan="2">CODE</td>
						<td rowspan="2">UNIQUE</td>
						<td>td_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>ts_id</td>
						<td>ts.ts_id</td>
					</tr>
					<tr>
						<td>ti_id</td>
						<td>ti.ti_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li><em>ts_id</em>.ts_stime &le; td_time &le; <em>ts_id</em>.ts_etime</li>
					<li><em>ti_id</em>.ti_stime &le; td_time &le; <em>ti_id</em>.ti_etime</li>
					<li>ts_id = <em>ti_id</em>.ts_id</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- td_img - Thermal image -->
				<h2 class="element_title"><a name="td_img" id="td_img"></a>td_img - Thermal image</h2>
				
				<h3>Description</h3>
				<p>This table contains data collected from space, the air, or the ground that are used to create thermal images.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>td_img_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>td_img_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Volcano Identifier</td>
					</tr>
					<tr>
						<td>cs_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Satellite ID</td>
					</tr>
					<tr>
						<td>ts_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Thermal station ID</td>
					</tr>
					<tr>
						<td>ti_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Thermal instrument ID</td>
					</tr>
					<tr>
						<td>td_img_iplat</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Description of instrument platform</td>
					</tr>
					<tr>
						<td>td_img_ialt</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m</td>
						<td>Instrument altitude</td>
					</tr>
					<tr>
						<td>td_img_ilat</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Instrument latitude</td>
					</tr>
					<tr>
						<td>td_img_ilon</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Instrument longitude</td>
					</tr>
					<tr>
						<td>td_img_idatum</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Datum</td>
					</tr>
					<tr>
						<td>td_img_desc</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Description</td>
					</tr>
					<tr>
						<td>td_img_time</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Time</td>
					</tr>
					<tr>
						<td>td_img_time_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Time uncertainty</td>
					</tr>
					<tr>
						<td>td_img_bname</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Band name</td>
					</tr>
					<tr>
						<td>td_img_hbwave</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&mu;m</td>
						<td>High band wavelength</td>
					</tr>
					<tr>
						<td>td_img_lbwave</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&mu;m</td>
						<td>Low band wavelength</td>
					</tr>
					<tr>
						<td>td_img_path</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Image Path</td>
					</tr>
					<tr>
						<td>td_img_psize</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m</td>
						<td>Pixel size</td>
					</tr>
					<tr>
						<td>td_img_maxrad</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>W/(m<sup>2</sup>-m) &times; 10<sup>7</sup></td>
						<td>Maximum radiance</td>
					</tr>
					<tr>
						<td>td_img_maxrrad</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>W/(m<sup>2</sup>-m &times sr) &times; 10<sup>7</sup></td>
						<td>Maximum relative radiance</td>
					</tr>
					<tr>
						<td>td_img_maxtemp</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;C</td>
						<td>Maximum temperature</td>
					</tr>
					<tr>
						<td>td_img_totrad</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>W/(m<sup>2</sup>-m) &times; 10<sup>7</sup></td>
						<td>Total radiance</td>
					</tr>
					<tr>
						<td>td_img_maxflux</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>W/m<sup>2</sup></td>
						<td>Maximum heat flux</td>
					</tr>
					<tr>
						<td>td_img_ntres</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;C</td>
						<td>Nominal temperature resolution</td>
					</tr>
					<tr>
						<td>td_img_atmcorr</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Atmospheric correction</td>
					</tr>
					<tr>
						<td>td_img_thmcorr</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Thermal correction</td>
					</tr>
					<tr>
						<td>td_img_ortho</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Orthorectification procedure</td>
					</tr>
					<tr>
						<td>td_img_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>
					<tr>
						<td>td_img_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>td_img_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>td_img_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>td_img_id</td>
					</tr>
					<tr>
						<td rowspan="2">CODE</td>
						<td rowspan="2">UNIQUE</td>
						<td>td_img_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>vd.vd_id</td>
					</tr>
					<tr>
						<td>cs_id</td>
						<td>cs.cs_id</td>
					</tr>
					<tr>
						<td>ts_id</td>
						<td>ts.ts_id</td>
					</tr>
					<tr>
						<td>ti_id</td>
						<td>ti.ti_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li><em>cs_id</em>.cs_stime &le; td_img_time &le; <em>cs_id</em>.cs_etime</li>
					<li><em>ts_id</em>.ts_stime &le; td_img_time &le; <em>ts_id</em>.ts_etime</li>
					<li><em>ti_id</em>.ti_stime &le; td_img_time &le; <em>ti_id</em>.ti_etime</li>
					<li>ts_id = <em>ti_id</em>.ts_id</li>
					<li>cs_id = <em>ti_id</em>.cs_id</li>
					<li>vd_id = <em>ts_id</em>.cn_id.vd_id OR jj_volnet.vd_id WHERE jj_volnet.jj_net_id=<em>ts_id</em>.cn_id AND jj_volnet.jj_net_flag=C</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- td_pix - Thermal pixel -->
				<h2 class="element_title"><a name="td_pix" id="td_pix"></a>td_pix - Thermal pixel</h2>
				
				<h3>Description</h3>
				<p>This table contains data for each pixel of a thermal image.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>td_pix_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>td_img_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Thermal image ID</td>
					</tr>
					<tr>
						<td>td_pix_elev</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m</td>
						<td>Elevation</td>
					</tr>
					<tr>
						<td>td_pix_lat</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Latitude</td>
					</tr>
					<tr>
						<td>td_pix_lon</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Longitude</td>
					</tr>
					<tr>
						<td>td_pix_rad</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>W/(m<sup>2</sup>-m) &times; 10<sup>7</sup></td>
						<td>Radiance</td>
					</tr>
					<tr>
						<td>td_pix_flux</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>W/m<sup>2</sup></td>
						<td>Heat flux</td>
					</tr>
					<tr>
						<td>td_pix_temp</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;C</td>
						<td>Temperature</td>
					</tr>
					<tr>
						<td>td_pix_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>td_pix_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>td_pix_id</td>
					</tr>
					<tr>
						<td rowspan="3">LAT/LON</td>
						<td rowspan="3">UNIQUE</td>
						<td>td_img_id</td>
					</tr>
					<tr>
						<td>td_pix_lat</td>
					</tr>
					<tr>
						<td>td_pix_lon</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>td_img_id</td>
						<td>td_img.td_img_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<p>None</p>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- ti - Thermal instrument -->
				<h2 class="element_title"><a name="ti" id="ti"></a>ti - Thermal instrument</h2>
				
				<h3>Description</h3>
				<p>This table was created to store information about the instruments used to collect ground-based and remote thermal data.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>ti_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>ti_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>cs_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Satellite ID</td>
					</tr>
					<tr>
						<td>ts_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Thermal station ID</td>
					</tr>
					<tr>
						<td>ti_type</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Type</td>
					</tr>
					<tr>
						<td>ti_name</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Name</td>
					</tr>
					<tr>
						<td>ti_units</td>
						<td>varchar(50)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Measured units</td>
					</tr>
					<tr>
						<td>ti_pres</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Resolution</td>
					</tr>
					<tr>
						<td>ti_stn</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Signal to noise</td>
					</tr>
					<tr>
						<td>ti_stime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start date</td>
					</tr>
					<tr>
						<td>ti_stime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start date uncertainty</td>
					</tr>
					<tr>
						<td>ti_etime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End date</td>
					</tr>
					<tr>
						<td>ti_etime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End date uncertainty</td>
					</tr>
					<tr>
						<td>ti_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>
					<tr>
						<td>ti_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>ti_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>ti_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>tield(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>ti_id</td>
					</tr>
					<tr>
						<td rowspan="3">CODE</td>
						<td rowspan="3">UNIQUE</td>
						<td>ti_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
					<tr>
						<td>ti_stime</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>cs_id</td>
						<td>cs.cs_id</td>
					</tr>
					<tr>
						<td>ts_id</td>
						<td>ts.ts_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li>ti_stime &le; ti_etime</li>
					<li><em>ts_id</em>.ts_stime &le; ti_stime &le; <em>ts_id</em>.ts_etime</li>
					<li><em>ts_id</em>.ts_stime &le; ti_etime &le; <em>ts_id</em>.ts_etime</li>
					<li><em>cs_id</em>.cs_stime &le; ti_stime &le; <em>cs_id</em>.cs_etime</li>
					<li><em>cs_id</em>.cs_stime &le; ti_etime &le; <em>cs_id</em>.cs_etime</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- ts - Thermal station -->
				<h2 class="element_title"><a name="ts" id="ts"></a>ts - Thermal station</h2>
				
				<h3>Description</h3>
				<p>This table stores information such as a location, name, and a description for stations where thermal data are collected.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>ts_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID</td>
					</tr>
					<tr>
						<td>ts_code</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Code</td>
					</tr>
					<tr>
						<td>cn_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Thermal network ID</td>
					</tr>
					<tr>
						<td>ts_name</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Name</td>
					</tr>
					<tr>
						<td>ts_type</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Type of thermal feature</td>
					</tr>
					<tr>
						<td>ts_ground</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Soil or ground type</td>
					</tr>
					<tr>
						<td>ts_lat</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Latitude</td>
					</tr>
					<tr>
						<td>ts_lon</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Lontitude</td>
					</tr>
					<tr>
						<td>ts_elev</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m</td>
						<td>Elevation</td>
					</tr>
					<tr>
						<td>ts_perm</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>List of permanent instruments</td>
					</tr>
					<tr>
						<td>ts_utc</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Difference from UTC</td>
					</tr>
					<tr>
						<td>ts_stime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start date</td>
					</tr>
					<tr>
						<td>ts_stime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start date uncertainty</td>
					</tr>
					<tr>
						<td>ts_etime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End date</td>
					</tr>
					<tr>
						<td>ts_etime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End date uncertainty</td>
					</tr>
					<tr>
						<td>ts_desc</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Description</td>
					</tr>
					<tr>
						<td>ts_ori</td>
						<td>enum('D','O')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>A flag for source of data: D=digitized/Bibliography, O=Original from observatory</td>
					</tr>					
					<tr>
						<td>ts_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Owner ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Owner ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Owner ID</td>
					</tr>
					<tr>
						<td>ts_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>ts_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>ts_id</td>
					</tr>
					<tr>
						<td rowspan="3">CODE</td>
						<td rowspan="3">UNIQUE</td>
						<td>ts_code</td>
					</tr>
					<tr>
						<td>cc_id</td>
					</tr>
					<tr>
						<td>ts_stime</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>cn_id</td>
						<td>cn.cn_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<ul class="line_height_180">
					<li>ts_stime &le; ts_etime</li>
					<li><em>cn_id</em>.cn_stime &le; ts_stime &le; <em>cn_id</em>.cn_etime</li>
					<li><em>cn_id</em>.cn_stime &le; ts_etime &le; <em>cn_id</em>.cn_etime</li>
				</ul>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- vd - Volcano -->
				<h2 class="element_title"><a name="vd" id="vd"></a>vd - Volcano</h2>
				
				<h3>Description</h3>
				<p>This table stores two pieces of data that are unlikely to change, the volcano name and the time zone.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID, Volcano Identifier (Index)</td>
					</tr>
					<tr>
						<td>vd_cavw</td>
						<td>varchar(15)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>The current CAVW number</td>
					</tr>
					<tr>
						<td>vd_name</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Volcano Name (first)</td>
					</tr>
					<tr>
						<td>vd_name2</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Volcano Name (second)</td>
					</tr>
					<tr>
						<td>vd_tzone</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Time zone (relative to UTC)</td>
					</tr>
					<tr>
						<td>vd_mcont</td>
						<td>char(1)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>M=Multiple contacts for this volcano</td>
					</tr>
					<tr>
						<td>vd_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>First Contact ID</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second Contact ID</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third Contact ID</td>
					</tr>
					<tr>
						<td>cc_id4</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Fourth Contact ID</td>
					</tr>
					<tr>
						<td>cc_id5</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Fifth Contact ID</td>
					</tr>
					<tr>
						<td>vd_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>vd_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>vd_id</td>
					</tr>
					<tr>
						<td rowspan="1">CAVW NUMBER</td>
						<td rowspan="1">UNIQUE</td>
						<td>vd_cavw</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id2</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id3</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id4</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id5</td>
						<td>cc.cc_id</td>
					</tr>					
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<p>None</p>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- vd_inf - Volcano information -->
				<h2 class="element_title"><a name="vd_inf" id="vd_inf"></a>vd_inf - Volcano information</h2>
				
				<h3>Description</h3>
				<p>This table contains information about the volcano that could possibly change over the life of the database, such as the CAVW number, the location of the summit, and other descriptive information.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>vd_inf_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID, volcano information identifier (index)/td>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Volcano Identifier</td>
					</tr>
					<tr>
						<td>vd_inf_cavw</td>
						<td>varchar(15)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>CAVW number, the current CAVW number</td>
					</tr>
					<tr>
						<td>vd_inf_status</td>
						<td>enum('Anthropology','Ar/Ar','Dendrochronology','Fumarolic','Historical','Holocene','Holocene?','Hot Springs','Hydration Rind','Hydrophonic','Ice Core','Lichenometry','Magnetism','Pleistocene','Potassium-Argon','Radiocarbon','Seismicity','Surface Exposure','Tephrochronology','Thermoluminescence','Uncertain','Uranium-series','Varve Count','Unknown')</td>
						<td></td>
						<td>Yes</td>
						<td><em>Unknown</em></td>
						<td></td>
						<td></td>
						<td>Status</td>
					</tr>
					<tr>
						<td>vd_inf_desc</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Short narrative</td>
					</tr>
					<tr>
						<td>vd_inf_slat</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Summit latitude</td>
					</tr>
					<tr>
						<td>vd_inf_slon</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Summit longitude</td>
					</tr>
					<tr>
						<td>vd_inf_selev</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m</td>
						<td>Summit elevation</td>
					</tr>
					<tr>
						<td>vd_inf_type</td>
						<td>enum('Caldera','Cinder cone','Complex volcano','Compound volcano','Cone','Crater rows','Explosion craters','Fissure vent','Hydrothermal field','Lava cone','Lava dome','Maar','Pumice cone','Pyroclastic cone','Pyroclastic shield','Scoria cone','Shield volcano','Somma volcano','Stratovolcano','Subglacial volcano','Submarine volcano','Tuff cone','Tuff ring','Unknown','Volcanic complex','Volcanic field')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Type</td>
					</tr>
					<tr>
						<td>vd_inf_loc</td>
						<td>varchar(30)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m<sup>3</sup></td>
						<td>Geographic location </td>
					</tr>
					<tr>
						<td>vd_inf_rtype</td>
						<td>enum('Basalt','Tephrit/Trachybasalt','Andesite/Basaltic-andesite','Trachyandesite','Dacite','Rhyolite','Trachyte','Phonolite','Phonotephrite','Foidite','Unknown')</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m<sup>3</sup></td>
						<td>Dominant Rock Type</td>
					</tr>					
					<tr>
						<td>vd_inf_evol</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>m<sup>3</sup></td>
						<td>Volume of edifice</td>
					</tr>
					<tr>
						<td>vd_inf_numcald</td>
						<td>tinyint(4)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Number of calderas</td>
					</tr>
					<tr>
						<td>vd_inf_lcald_dia</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>km</td>
						<td>Diameter of largest caldera</td>
					</tr>
					<tr>
						<td>vd_inf_ycald_lat</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Latitude of youngest caldera</td>
					</tr>
					<tr>
						<td>vd_inf_ycald_lon</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>&deg;</td>
						<td>Longitude of youngest caldera</td>
					</tr>
					<tr>
						<td>vd_inf_stime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time</td>
					</tr>
					<tr>
						<td>vd_inf_stime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Start time uncertainty</td>
					</tr>
					<tr>
						<td>vd_inf_etime</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End time</td>
					</tr>
					<tr>
						<td>vd_inf_etime_unc</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>End time uncertainty</td>
					</tr>
					<tr>
						<td>vd_inf_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>				
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Contact ID</td>
					</tr>
					<tr>
						<td>vd_inf_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>vd_inf_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>vd_inf_id</td>
					</tr>
					<tr>
						<td rowspan="2">INFORMATION AT A CERTAIN TIME</td>
						<td rowspan="2">UNIQUE</td>
						<td>vd_id</td>
					</tr>
					<tr>
						<td>vd_inf_stime</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>vd.vd_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<p>None</p>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- vd_mag - Magma chamber -->
				<h2 class="element_title"><a name="vd_mag" id="vd_mag"></a>vd_mag - Magma chamber</h2>
				
				<h3>Description</h3>
				<p>This table contains information about the magma chamber such as its composition(s) and minimum size (based on the largest eruption volume).</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>vd_mag_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>Volcano magma chamber identifier (index)</td>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Volcano Identifier</td>
					</tr>
					<tr>
						<td>vd_mag_lvz_dia</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>km</td>
						<td>Diameter of low velocity zone</td>
					</tr>
					<tr>
						<td>vd_mag_lvz_vol</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>km<sup>3</sup></td>
						<td>Volume of low velocity zone</td>
					</tr>
					<tr>
						<td>vd_mag_tlvz</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>km</td>
						<td>Depth to top of low velocity zone</td>
					</tr>
					<tr>
						<td>vd_mag_lerup_vol</td>
						<td>double</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>km<sup>3</sup></td>
						<td>Volume of largest eruption, DRE</td>
					</tr>
					<tr>
						<td>vd_mag_drock</td>
						<td>varchar(60)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Dominant rock type</td>
					</tr>
					<tr>
						<td>vd_mag_orock</td>
						<td>varchar(60)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Outlier rock type</td>
					</tr>
					<tr>
						<td>vd_mag_orock2</td>
						<td>varchar(60)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Second outlier rock type</td>
					</tr>
					<tr>
						<td>vd_mag_orock3</td>
						<td>varchar(60)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Third outlier rock type</td>
					</tr>
					<tr>
						<td>vd_mag_minsio2</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Minimum SiO<sub>2</sub> content of whole rocks erupted</td>
					</tr>
					<tr>
						<td>vd_mag_maxsio2</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Maximum SiO<sub>2</sub> content of whole rocks erupted</td>
					</tr>
					<tr>
						<td>vd_mag_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Data Owner ID</td>
					</tr>
					<tr>
						<td>vd_mag_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>vd_mag_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>vd_mag_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>vd.vd_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<p>None</p>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
				<!-- vd_tec - Tectonic setting -->
				<h2 class="element_title"><a name="vd_tec" id="vd_tec"></a>vd_tec - Tectonic setting</h2>
				
				<h3>Description</h3>
				<p>This table contains information about the local tectonic setting such as rates of movement either along a plate or over a hotspot.</p>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Type</th>
						<th>Attributes</th>
						<th>Null</th>
						<th>Default</th>
						<th>Extra</th>
						<th>Unit</th>
						<th>Comments</th>
					</tr>
					<tr>
						<td>vd_tec_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>No</td>
						<td></td>
						<td>auto_increment</td>
						<td></td>
						<td>ID, tectonic setting identifier</td>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>mediumint(8)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Volcano Identifier</td>
					</tr>
					<tr>
						<td>vd_tec_desc</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Description</td>
					</tr>
					<tr>
						<td>vd_tec_strslip</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>cm/a</td>
						<td>Rate of strike-slip</td>
					</tr>
					<tr>
						<td>vd_tec_ext</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>cm/a</td>
						<td>Rate of extension</td>
					</tr>
					<tr>
						<td>vd_tec_conv</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>cm/a</td>
						<td>Rate of convergence</td>
					</tr>
					<tr>
						<td>vd_tec_travhs</td>
						<td>float</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td>cm/a</td>
						<td>Travel rate across hotspot</td>
					</tr>
					<tr>
						<td>vd_tec_com</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Comments</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Contact ID</td>
					</tr>
					<tr>
						<td>vd_tec_loaddate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Load date, the date the data was entered (in UTC)</td>
					</tr>
					<tr>
						<td>vd_tec_pubdate</td>
						<td>datetime</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Publish date, the date the data become public</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>smallint(5)</td>
						<td>UNSIGNED</td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Loader ID, contact ID for the person who entered the data</td>
					</tr>
					<tr>
						<td>cb_ids</td>
						<td>varchar(255)</td>
						<td></td>
						<td>Yes</td>
						<td><em>NULL</em></td>
						<td></td>
						<td></td>
						<td>Link to bibliography table</td>
					</tr>
				</table>
				
				<h3>Indexes</h3>
				<table class="db_ref">
					<tr>
						<th>Keyname</th>
						<th>Type</th>
						<th>Field(s)</th>
					</tr>
					<tr>
						<td>PRIMARY</td>
						<td>PRIMARY</td>
						<td>vd_tec_id</td>
					</tr>
				</table>
				
				<h3>Links</h3>
				<table class="db_ref">
					<tr>
						<th>Field</th>
						<th>Link to</th>
					</tr>
					<tr>
						<td>vd_id</td>
						<td>vd.vd_id</td>
					</tr>
					<tr>
						<td>cc_id</td>
						<td>cc.cc_id</td>
					</tr>
					<tr>
						<td>cc_id_load</td>
						<td>cc.cc_id</td>
					</tr>
				</table>
				
				<h3>Restrictions</h3>
				<p>None</p>
				
				<p class="backtotop"><a href="#top">Click to top <span style="background-color:white;">&gt</span>&nbsp</a></p>
				
			</div>
			</div>
			</div>
			
		<!-- Footer -->
		<div id="footer">
			<?php include 'php/include/footer_beta.php'; ?>
		</div>
		
		</div>
		
	</div>
</body>
</html>