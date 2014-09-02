<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>WOVOdat :: The World Organization of Volcano Observatories (WOVO): Database of Volcanic Unrest (WOVOdat), by IAVCEI</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8">
	<meta http-equiv="content-type" content="text/html;charset=iso-8859-1">
	<meta name="description" content="The World Organization of Volcano Observatories (WOVO): Database of Volcanic Unrest (WOVOdat)">
	<meta name="keywords" content="Volcano, Vulcano, Volcanoes, Vulcanoes, Volcan, Vulkan, eruption, forecasting, forecast, predict, prediction, hazard, desaster, disaster, desasters, disasters, database, data warehouse, format, formats, WOVO, WOVOdat, IAVCEI, sharing, streaming, earthquake, earthquakes, seismic, seismicity, seismology, deformation, INSar, GPS, uplift, caldera, stratovolcano, stratovulcano">
	<link href="/css/styles_beta.css" rel="stylesheet">
	<link href="/gif/WOVOfavicon.ico" type="image/x-icon" rel="SHORTCUT ICON">
	<script language="javascript" type="text/javascript" src="/js/scripts.js"></script>
</head>
<body>
	<div id="wrapborder">
	<div id="wrap">
		<?php include 'php/include/header_beta.php'; ?>
		<!-- Content -->
		<div id="content">
		<div id="content_ref">
		<h1 class="page_title"><a name="top" id="top"></a>WOVOML Reference</h1>
		<h2>About this reference</h2>
		<p>This reference presents all classes (tags) defined in WOVOML version 1.0. The first tag to start with is <a href="#wovoml">&lt;wovoml&gt;</a>. This is the root element for WOVOML and it contains all the other elements.</p>
		
		<h2>Description of this page's content</h2>
		<p>Each entry contains the following sections:</p>
		<ul>
			<li><b>Check</b> is the first step done by the upload process. It checks and prepare values to be uploaded.
			<br/>Here is a list of the possible checking functions:
				<ul>
					<li>Volcano: gets the volcano ID (vd_id) according to volcano code (vd_inf_cavw)</li>
					<li>Owner/Collector/Contact/Observer: gets the contact ID (cc_id) according to contact code (cc_code)</li>
					<li>Time order: checks if date order is coherent</li>
					<li>Publish date: gets the publish date</li>
					<li>B.C. date: gets B.C. year from date</li>
					<li>etc...</li>
				</ul>
			</li>
			<li><b>Upload/Update</b> is the second (and last) step done by the upload process. It inserts or updates data in the database.
			<br/>This step is divided in two sub-steps:
				<ul>
					<li>A <b>Condition</b> must first be verified</li>
					<li>If the <b>Condition</b> does not return a result, then the <b>INSERT</b> step will be done. Otherwise, the process will <b>UPDATE</b> the row of data returned.</li>
				</ul>
			</li>
		</ul>
		
		<h2>Description of terminology</h2>
		<ul>
			<li>
				Attributes of tags are preceded by '/'
				<br/>E.g.:
				<ul>
					<li>/version for &lt;wovoml <b>version="..."</b>&gt;</li>
					<li>/code for &lt;Eruption <b>code="..."</b>&gt;</li>
				</ul>
			</li>
			<li>
				General values are preceded by '!'
				<br/>E.g.:
				<ul>
					<li>!cc_id_load = Loader ID (known upon login)</li>
					<li>!loaddate = Load date</li>
					<li>!vd_id = General volcano ID (from 'LoadingInfo')</li>
					<li>!cc_id = General owner ID (from 'LoadingInfo')</li>
					<li>!pubDate = General publish date (from 'LoadingInfo')</li>
				</ul>
			</li>
			<li>
				Results of <b>Check</b> step are preceded by '#'
				<br/>E.g.:
				<ul>
					<li>#cc_id for <b>Owner &rarr; #cc_id</b></li>
					<li>#pubDate for <b>Publish date &rarr; #pubDate</b></li>
				</ul>
			</li>
			<li>
				IDs of current element and parents are preceded by '@'
				<br/>E.g.:
				<ul>
					<li>@current for current element ID</li>
					<li>@parent1 for ID of parent of current element</li>
					<li>@parent2 for ID of parent of parent of current element</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- wovoml (root) -->
		<h2 class="wovomlclass"><a name="wovoml" id="wovoml"></a>&lt;wovoml&gt;</h2>
		
<pre><strong>&lt;wovoml version=&quot;1.001&quot; xmlns=&quot;http://www.w3.org/2001/XMLSchema-instance&quot; xmlns:xsi=&quot;http://www.w3.org/2001/XMLSchema-instance&quot; xsi:schemaLocation=&quot;http://www.wovodat.org WOVOdatV1.xsd&quot;&gt;</strong>
	<a href="#loadinginfo">&lt;LoadingInfo&gt;...&lt;/LoadingInfo&gt;</a>
	<a href="#observation">&lt;Observation&gt;...&lt;/Observation&gt;</a>
	<a href="#eruption">&lt;Eruption&gt;...&lt;/Eruption&gt;</a>
	<a href="#phase">&lt;Phase&gt;...&lt;/Phase&gt;</a>
	<a href="#video">&lt;Video&gt;...&lt;/Video&gt;</a>
	<a href="#forecast">&lt;Forecast&gt;...&lt;/Forecast&gt;</a>
	<a href="#inferredprocesses">&lt;InferredProcesses&gt;...&lt;/InferredProcesses&gt;</a>
	<a href="#monitoringsystem">&lt;MonitoringSystem&gt;...&lt;/MonitoringSystem&gt;</a>
	<a href="#data">&lt;Data&gt;...&lt;/Data&gt;</a>
<strong>&lt;/wovoml&gt;</strong></pre>
		
		<h3>Check</h3>
		<ul class="line_height_150">
			<li>
				Version:
				<br/>'/version' must be an existing version of WOVOML
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- wovoml - LoadingInfo -->
		<h2 class="wovomlclass"><a name="loadinginfo" id="loadinginfo"></a><a href="#wovoml">&lt;wovoml&gt;</a> | &lt;LoadingInfo&gt;</h2>
		
<pre><strong>&lt;LoadingInfo&gt;</strong>
	&lt;volcanoCode&gt;...&lt;/volcanoCode&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/LoadingInfo&gt;</strong></pre>
		
		<h3>Check</h3>
		<ul class="line_height_150">
			<li>
				Volcano:
				<br/>SELECT vd_id FROM vd_inf WHERE vd_cavw = 'volcanoCode'
				<br/>&rarr; !vd_id
			</li>
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; !cc_id
			</li>
			<li>
				Publish date:
				<br/>Earliest of 'pubDate' and (!loaddate + 2 years)
				<br/>&rarr; !pubdate
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- wovoml - Observation -->
		<h2 class="wovomlclass"><a name="observation" id="observation"></a><a href="#wovoml">&lt;wovoml&gt;</a> | &lt;Observation&gt;</h2>
		
<pre><strong>&lt;Observation code=&quot;...&quot;&gt;</strong>
	&lt;volcanoCode&gt;...&lt;/volcanoCode&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/Observation&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Volcano:
				<br/>SELECT vd_id FROM vd_inf WHERE vd_cavw = 'volcanoCode'
				<br/>&rarr; #vd_id
			</li>
			<li>
				Observer:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT co_id FROM co WHERE co_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #co_id
		</p>
		<h4>a) INSERT INTO co</h4>
		<ul>
			<li>/code &rarr; co_code</li>
			<li>description &rarr; co_observe</li>
			<li>startTime &rarr; co_stime</li>
			<li>startTimeUnc &rarr; co_stime_unc</li>
			<li>endTime &rarr; co_etime</li>
			<li>endTimeUnc &rarr; co_etime_unc</li>
			<li>#vd_id &rarr; vd_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; co_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; ed_loaddate</li>
		</ul>
		<h4>b) UPDATE co WHERE co_id = '#co_id'</h4>
		<ul>
			<li>description &rarr; co_observe</li>
			<li>startTime &rarr; co_stime</li>
			<li>startTimeUnc &rarr; co_stime_unc</li>
			<li>endTime &rarr; co_etime</li>
			<li>endTimeUnc &rarr; co_etime_unc</li>
			<li>#vd_id &rarr; vd_id</li>
			<li>#pubDate &rarr; co_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Eruption -->
		<h2 class="wovomlclass"><a name="eruption" id="eruption"></a><a href="#wovoml">&lt;wovoml&gt;</a> | &lt;Eruption&gt;</h2>
		
<pre><strong>&lt;Eruption code=&quot;...&quot;&gt;</strong>
	&lt;volcanoCode&gt;...&lt;/volcanoCode&gt;
	&lt;name&gt;...&lt;/name&gt;
	&lt;narrative&gt;...&lt;/narrative&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;climaxTime&gt;...&lt;/climaxTime&gt;
	&lt;climaxTimeUnc&gt;...&lt;/climaxTimeUnc&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
	<a href="#eruption_video">&lt;Video&gt;...&lt;/Video&gt;</a>
	<a href="#eruption_phase">&lt;Phase&gt;...&lt;/Phase&gt;</a>
<strong>&lt;/Eruption&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Volcano:
				<br/>SELECT vd_id FROM vd_inf WHERE vd_cavw = 'volcanoCode'
				<br/>&rarr; #vd_id
			</li>
			<li>
				Collector:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'climaxTime' &le; 'endTime'
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>'climaxTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
			<li>
				B.C. date:
				<br/>Cut possible BC year from 'startTime'
				<br/>&rarr; #ed_stime
				<br/>&rarr; #ed_stime_bc
			</li>
			<li>
				B.C. date:
				<br/>Cut possible BC year from 'endTime'
				<br/>&rarr; #ed_etime
				<br/>&rarr; #ed_etime_bc
			</li>
			<li>
				B.C. date:
				<br/>Cut possible BC year from 'climaxTime'
				<br/>&rarr; #ed_climax
				<br/>&rarr; #ed_climax_bc
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT ed_id FROM ed WHERE ed_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #ed_id
		</p>
		<h4>a) INSERT INTO ed</h4>
		<ul>
			<li>/code &rarr; ed_code</li>
			<li>name &rarr; ed_name</li>
			<li>narrative &rarr; ed_nar</li>
			<li>#ed_stime &rarr; ed_stime</li>
			<li>#ed_stime_bc &rarr; ed_stime_bc</li>
			<li>startTimeUnc &rarr; ed_stime_unc</li>
			<li>#ed_etime &rarr; ed_etime</li>
			<li>#ed_etime_bc &rarr; ed_etime_bc</li>
			<li>endTimeUnc &rarr; ed_etime_unc</li>
			<li>#ed_climax &rarr; ed_climax</li>
			<li>#ed_climax_bc &rarr; ed_climax_bc</li>
			<li>climaxTimeUnc &rarr; ed_climax_unc</li>
			<li>comments &rarr; ed_com</li>
			<li>#vd_id &rarr; vd_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; ed_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; ed_loaddate</li>
		</ul>
		<h4>b) UPDATE ed WHERE ed_id = '#ed_id'</h4>
		<ul>
			<li>name &rarr; ed_name</li>
			<li>narrative &rarr; ed_nar</li>
			<li>#ed_stime &rarr; ed_stime</li>
			<li>#ed_stime_bc &rarr; ed_stime_bc</li>
			<li>startTimeUnc &rarr; ed_stime_unc</li>
			<li>#ed_etime &rarr; ed_etime</li>
			<li>#ed_etime_bc &rarr; ed_etime_bc</li>
			<li>endTimeUnc &rarr; ed_etime_unc</li>
			<li>#ed_climax &rarr; ed_climax</li>
			<li>#ed_climax_bc &rarr; ed_climax_bc</li>
			<li>climaxTimeUnc &rarr; ed_climax_unc</li>
			<li>comments &rarr; ed_com</li>
			<li>#vd_id &rarr; vd_id</li>
			<li>#pubDate &rarr; ed_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Eruption - Video -->
		<h2 class="wovomlclass"><a name="eruption_video" id="eruption_video"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#eruption">&lt;Eruption&gt;</a> | &lt;Video&gt;</h2>
		
<pre><strong>&lt;Video code=&quot;...&quot;&gt;</strong>
	&lt;link&gt;...&lt;/link&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;length&gt;...&lt;/length&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/Video&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Collector:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
			<li>
				Link:
				<br/>SELECT vd_id FROM ed WHERE ed_id = '@parent1'
				<br/>&rarr; #vd_id
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT ed_vid_id FROM ed_vid WHERE ed_vid_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #ed_vid_id
		</p>
		<h4>a) INSERT INTO ed_vid</h4>
		<ul>
			<li>/code &rarr; ed_vid_code</li>
			<li>link &rarr; ed_vid_link</li>
			<li>startTime &rarr; ed_vid_stime</li>
			<li>startTimeUnc &rarr; ed_vid_stime_unc</li>
			<li>length &rarr; ed_vid_length</li>
			<li>description &rarr; ed_vid_desc</li>
			<li>comments &rarr; ed_vid_com</li>
			<li>@parent1 &rarr; ed_id</li>
			<li>#vd_id &rarr; vd_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; ed_vid_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; ed_vid_loaddate</li>
		</ul>
		<h4>b) UPDATE ed_vid WHERE ed_vid_id = '#ed_vid_id'</h4>
		<ul>
			<li>link &rarr; ed_vid_link</li>
			<li>startTime &rarr; ed_vid_stime</li>
			<li>startTimeUnc &rarr; ed_vid_stime_unc</li>
			<li>length &rarr; ed_vid_length</li>
			<li>description &rarr; ed_vid_desc</li>
			<li>comments &rarr; ed_vid_com</li>
			<li>@parent1 &rarr; ed_id</li>
			<li>#vd_id &rarr; vd_id</li>
			<li>#pubDate &rarr; ed_vid_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Eruption - Phase -->
		<h2 class="wovomlclass"><a name="eruption_phase" id="eruption_phase"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#eruption">&lt;Eruption&gt;</a> | &lt;Phase&gt;</h2>
		
<pre><strong>&lt;Phase code=&quot;...&quot;&gt;</strong>
	&lt;phaseNumber&gt;...&lt;/phaseNumber&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;vei&gt;...&lt;/vei&gt;
	&lt;maxLavaExtru&gt;...&lt;/maxLavaExtru&gt;
	&lt;maxExpMassDis&gt;...&lt;/maxExpMassDis&gt;
	&lt;dre&gt;...&lt;/dre&gt;
	&lt;magmaMix&gt;...&lt;/magmaMix&gt;
	&lt;maxColHeight&gt;...&lt;/maxColHeight&gt;
	&lt;colHeightDet&gt;...&lt;/colHeightDet&gt;
	&lt;minSiO2MatrixGlass&gt;...&lt;/minSiO2MatrixGlass&gt;
	&lt;maxSiO2MatrixGlass&gt;...&lt;/maxSiO2MatrixGlass&gt;
	&lt;minSiO2WholeRock&gt;...&lt;/minSiO2WholeRock&gt;
	&lt;maxSiO2WholeRock&gt;...&lt;/maxSiO2WholeRock&gt;
	&lt;totCrystal&gt;...&lt;/totCrystal&gt;
	&lt;phenoContent&gt;...&lt;/phenoContent&gt;
	&lt;phenoAssemb&gt;...&lt;/phenoAssemb&gt;
	&lt;preErupH2OContent&gt;...&lt;/preErupH2OContent&gt;
	&lt;phenoMeltInclusion&gt;...&lt;/phenoMeltInclusion&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
	<a href="#eruption_phase_video">&lt;Video&gt;...&lt;/Video&gt;</a>
	<a href="#eruption_phase_forecast">&lt;Forecast&gt;...&lt;/Forecast&gt;</a>
<strong>&lt;/Phase&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Collector:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Time inclusion:
				<br/>@current.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc'] &sub; @parent1.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc']
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
			<li>
				B.C. date:
				<br/>Cut possible BC year from 'startTime'
				<br/>&rarr; #ed_phs_stime
				<br/>&rarr; #ed_phs_stime_bc
			</li>
			<li>
				B.C. date:
				<br/>Cut possible BC year from 'endTime'
				<br/>&rarr; #ed_phs_etime
				<br/>&rarr; #ed_phs_etime_bc
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT ed_phs_id FROM ed_phs WHERE ed_phs_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #ed_phs_id
		</p>
		<h4>a) INSERT INTO ed_phs</h4>
		<ul>
			<li>/code &rarr; ed_phs_code</li>
			<li>phaseNumber &rarr; ed_phs_phsnum</li>
			<li>#ed_phs_stime &rarr; ed_phs_stime</li>
			<li>#ed_phs_stime_bc &rarr; ed_phs_stime_bc</li>
			<li>startTimeUnc &rarr; ed_phs_stime_unc</li>
			<li>#ed_phs_etime &rarr; ed_phs_etime</li>
			<li>#ed_phs_etime_bc &rarr; ed_phs_etime_bc</li>
			<li>endTimeUnc &rarr; ed_phs_etime_unc</li>
			<li>description &rarr; ed_phs_desc</li>
			<li>vei &rarr; ed_phs_vei</li>
			<li>maxLavaExtru &rarr; ed_phs_max_lext</li>
			<li>maxExpMassDis &rarr; ed_phs_max_expdis</li>
			<li>dre &rarr; ed_phs_dre</li>
			<li>magmaMix &rarr; ed_phs_mix</li>
			<li>maxColHeight &rarr; ed_phs_col</li>
			<li>colHeightDet &rarr; ed_phs_coldet</li>
			<li>minSiO2MatrixGlass &rarr; ed_phs_minsio2_mg</li>
			<li>maxSiO2MatrixGlass &rarr; ed_phs_maxsio2_mg</li>
			<li>minSiO2WholeRock &rarr; ed_phs_minsio2_wr</li>
			<li>maxSiO2WholeRock &rarr; ed_phs_maxsio2_wr</li>
			<li>totCrystal &rarr; ed_phs_totxtl</li>
			<li>phenoContent &rarr; ed_phs_phenc</li>
			<li>phenoAssemb &rarr; ed_phs_phena</li>
			<li>preErupH2OContent &rarr; ed_phs_h2o</li>
			<li>phenoMeltInclusion &rarr; ed_phs_h2o_xtl</li>
			<li>comments &rarr; ed_phs_com</li>
			<li>@parent1 &rarr; ed_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; ed_phs_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; ed_phs_loaddate</li>
		</ul>
		<h4>b) UPDATE ed_phs WHERE ed_phs_id = '#ed_phs_id'</h4>
		<ul>
			<li>phaseNumber &rarr; ed_phs_phsnum</li>
			<li>#ed_phs_stime &rarr; ed_phs_stime</li>
			<li>#ed_phs_stime_bc &rarr; ed_phs_stime_bc</li>
			<li>startTimeUnc &rarr; ed_phs_stime_unc</li>
			<li>#ed_phs_etime &rarr; ed_phs_etime</li>
			<li>#ed_phs_etime_bc &rarr; ed_phs_etime_bc</li>
			<li>endTimeUnc &rarr; ed_phs_etime_unc</li>
			<li>description &rarr; ed_phs_desc</li>
			<li>vei &rarr; ed_phs_vei</li>
			<li>maxLavaExtru &rarr; ed_phs_max_lext</li>
			<li>maxExpMassDis &rarr; ed_phs_max_expdis</li>
			<li>dre &rarr; ed_phs_dre</li>
			<li>magmaMix &rarr; ed_phs_mix</li>
			<li>maxColHeight &rarr; ed_phs_col</li>
			<li>colHeightDet &rarr; ed_phs_coldet</li>
			<li>minSiO2MatrixGlass &rarr; ed_phs_minsio2_mg</li>
			<li>maxSiO2MatrixGlass &rarr; ed_phs_maxsio2_mg</li>
			<li>minSiO2WholeRock &rarr; ed_phs_minsio2_wr</li>
			<li>maxSiO2WholeRock &rarr; ed_phs_maxsio2_wr</li>
			<li>totCrystal &rarr; ed_phs_totxtl</li>
			<li>phenoContent &rarr; ed_phs_phenc</li>
			<li>phenoAssemb &rarr; ed_phs_phena</li>
			<li>preErupH2OContent &rarr; ed_phs_h2o</li>
			<li>phenoMeltInclusion &rarr; ed_phs_h2o_xtl</li>
			<li>comments &rarr; ed_phs_com</li>
			<li>@parent1 &rarr; ed_id</li>
			<li>#pubDate &rarr; ed_phs_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Eruption - Phase - Video -->
		<h2 class="wovomlclass"><a name="eruption_phase_video" id="eruption_phase_video"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#eruption">&lt;Eruption&gt;</a> |  <a href="#eruption_phase">&lt;Phase&gt;</a> | &lt;Video&gt;</h2>
		
<pre><strong>&lt;Video code=&quot;...&quot;&gt;</strong>
	&lt;link&gt;...&lt;/link&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;length&gt;...&lt;/length&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/Video&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Collector:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
			<li>
				Link:
				<br/>SELECT vd_id FROM ed WHERE ed_id = '@parent2'
				<br/>&rarr; #vd_id
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT ed_vid_id FROM ed_vid WHERE ed_vid_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #ed_vid_id
		</p>
		<h4>a) INSERT INTO ed_vid</h4>
		<ul>
			<li>/code &rarr; ed_vid_code</li>
			<li>link &rarr; ed_vid_link</li>
			<li>startTime &rarr; ed_vid_stime</li>
			<li>startTimeUnc &rarr; ed_vid_stime_unc</li>
			<li>length &rarr; ed_vid_length</li>
			<li>description &rarr; ed_vid_desc</li>
			<li>comments &rarr; ed_vid_com</li>
			<li>@parent2 &rarr; ed_id</li>
			<li>@parent1 &rarr; ed_phs_id</li>
			<li>#vd_id &rarr; vd_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; ed_vid_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; ed_vid_loaddate</li>
		</ul>
		<h4>b) UPDATE ed_vid WHERE ed_vid_id = '#ed_vid_id'</h4>
		<ul>
			<li>link &rarr; ed_vid_link</li>
			<li>startTime &rarr; ed_vid_stime</li>
			<li>startTimeUnc &rarr; ed_vid_stime_unc</li>
			<li>length &rarr; ed_vid_length</li>
			<li>description &rarr; ed_vid_desc</li>
			<li>comments &rarr; ed_vid_com</li>
			<li>@parent2 &rarr; ed_id</li>
			<li>@parent1 &rarr; ed_phs_id</li>
			<li>#vd_id &rarr; vd_id</li>
			<li>#pubDate &rarr; ed_vid_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Eruption - Phase - Forecast -->
		<h2 class="wovomlclass"><a name="eruption_phase_forecast" id="eruption_phase_forecast"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#eruption">&lt;Eruption&gt;</a> |  <a href="#eruption_phase">&lt;Phase&gt;</a> | &lt;Forecast&gt;</h2>
		
<pre><strong>&lt;Forecast code=&quot;...&quot;&gt;</strong>
	&lt;description&gt;...&lt;/description&gt;
	&lt;earliestStartTime&gt;...&lt;/earliestStartTime&gt;
	&lt;earliestStartTimeUnc&gt;...&lt;/earliestStartTimeUnc&gt;
	&lt;latestStartTime&gt;...&lt;/latestStartTime&gt;
	&lt;latestStartTimeUnc&gt;...&lt;/latestStartTimeUnc&gt;
	&lt;issueTime&gt;...&lt;/issueTime&gt;
	&lt;issueTimeUnc&gt;...&lt;/issueTimeUnc&gt;
	&lt;timeSuccess&gt;...&lt;/timeSuccess&gt;
	&lt;magniSuccess&gt;...&lt;/magniSuccess&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/Forecast&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Collector:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'issueTime' &le; 'earliestStartTime' &le; 'latestStartTime'
			</li>
			<li>
				Time order:
				<br/>(@current.'issueTime' &plusmn; 'issueTimeUnc') &le; (@parent1.'startTime' &plusmn; 'startTimeUnc')
			</li>
			<li>
				Publish date:
				<ul>
					<li>'issueTime' + 2 years</li>
					<li>'earliestStartTime' + 2 years</li>
					<li>'latestStartTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
			<li>
				Link:
				<br/>SELECT vd_id FROM ed WHERE ed_id = '@parent2'
				<br/>&rarr; #vd_id
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT ed_for_id FROM ed_for WHERE ed_for_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #ed_for_id
		</p>
		<h4>a) INSERT INTO ed_for</h4>
		<ul>
			<li>/code &rarr; ed_for_code</li>
			<li>description &rarr; ed_for_desc</li>
			<li>earliestStartTime &rarr; ed_for_open</li>
			<li>earliestStartTimeUnc &rarr; ed_for_open_unc</li>
			<li>latestStartTime &rarr; ed_for_close</li>
			<li>latestStartTimeUnc &rarr; ed_for_close_unc</li>
			<li>issueTime &rarr; ed_for_time</li>
			<li>issueTimeUnc &rarr; ed_for_time_unc</li>
			<li>timeSuccess &rarr; ed_for_tsucc</li>
			<li>magniSuccess &rarr; ed_for_msucc</li>
			<li>comments &rarr; ed_for_com</li>
			<li>@parent1 &rarr; ed_phs_id</li>
			<li>#vd_id &rarr; vd_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; ed_for_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; ed_for_loaddate</li>
		</ul>
		<h4>b) UPDATE ed_vid WHERE ed_vid_id = '#ed_vid_id'</h4>
		<ul>
			<li>description &rarr; ed_for_desc</li>
			<li>earliestStartTime &rarr; ed_for_open</li>
			<li>earliestStartTimeUnc &rarr; ed_for_open_unc</li>
			<li>latestStartTime &rarr; ed_for_close</li>
			<li>latestStartTimeUnc &rarr; ed_for_close_unc</li>
			<li>issueTime &rarr; ed_for_time</li>
			<li>issueTimeUnc &rarr; ed_for_time_unc</li>
			<li>timeSuccess &rarr; ed_for_tsucc</li>
			<li>magniSuccess &rarr; ed_for_msucc</li>
			<li>comments &rarr; ed_for_com</li>
			<li>@parent1 &rarr; ed_phs_id</li>
			<li>#vd_id &rarr; vd_id</li>
			<li>#pubDate &rarr; ed_for_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Phase -->
		<h2 class="wovomlclass"><a name="phase" id="phase"></a><a href="#wovoml">&lt;wovoml&gt;</a> | &lt;Phase&gt;</h2>
		
<pre><strong>&lt;Phase code=&quot;...&quot;&gt;</strong>
	&lt;eruptionCode&gt;...&lt;/eruptionCode&gt;
	&lt;phaseNumber&gt;...&lt;/phaseNumber&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;vei&gt;...&lt;/vei&gt;
	&lt;maxLavaExtru&gt;...&lt;/maxLavaExtru&gt;
	&lt;maxExpMassDis&gt;...&lt;/maxExpMassDis&gt;
	&lt;dre&gt;...&lt;/dre&gt;
	&lt;magmaMix&gt;...&lt;/magmaMix&gt;
	&lt;maxColHeight&gt;...&lt;/maxColHeight&gt;
	&lt;colHeightDet&gt;...&lt;/colHeightDet&gt;
	&lt;minSiO2MatrixGlass&gt;...&lt;/minSiO2MatrixGlass&gt;
	&lt;maxSiO2MatrixGlass&gt;...&lt;/maxSiO2MatrixGlass&gt;
	&lt;minSiO2WholeRock&gt;...&lt;/minSiO2WholeRock&gt;
	&lt;maxSiO2WholeRock&gt;...&lt;/maxSiO2WholeRock&gt;
	&lt;totCrystal&gt;...&lt;/totCrystal&gt;
	&lt;phenoContent&gt;...&lt;/phenoContent&gt;
	&lt;phenoAssemb&gt;...&lt;/phenoAssemb&gt;
	&lt;preErupH2OContent&gt;...&lt;/preErupH2OContent&gt;
	&lt;phenoMeltInclusion&gt;...&lt;/phenoMeltInclusion&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
	<a href="#phase_video">&lt;Video&gt;...&lt;/Video&gt;</a>
	<a href="#phase_forecast">&lt;Forecast&gt;...&lt;/Forecast&gt;</a>
<strong>&lt;/Phase&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Collector:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT ed_id, ed_stime, ed_stime_unc, ed_etime, ed_etime_unc FROM ed WHERE ed_code = 'eruptionCode' AND cc_id = #cc_id
				<br/>@current.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc'] &sub; [ed_stime &plusmn; ed_stime_unc, ed_etime &plusmn; ed_etime_unc]
				<br/>&rarr; #ed_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
			<li>
				B.C. date:
				<br/>Cut possible BC year from 'startTime'
				<br/>&rarr; #ed_phs_stime
				<br/>&rarr; #ed_phs_stime_bc
			</li>
			<li>
				B.C. date:
				<br/>Cut possible BC year from 'endTime'
				<br/>&rarr; #ed_phs_etime
				<br/>&rarr; #ed_phs_etime_bc
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT ed_phs_id FROM ed_phs WHERE ed_phs_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #ed_phs_id
		</p>
		<h4>a) INSERT INTO ed_phs</h4>
		<ul>
			<li>/code &rarr; ed_phs_code</li>
			<li>phaseNumber &rarr; ed_phs_phsnum</li>
			<li>#ed_phs_stime &rarr; ed_phs_stime</li>
			<li>#ed_phs_stime_bc &rarr; ed_phs_stime_bc</li>
			<li>startTimeUnc &rarr; ed_phs_stime_unc</li>
			<li>#ed_phs_etime &rarr; ed_phs_etime</li>
			<li>#ed_phs_etime_bc &rarr; ed_phs_etime_bc</li>
			<li>endTimeUnc &rarr; ed_phs_etime_unc</li>
			<li>description &rarr; ed_phs_desc</li>
			<li>vei &rarr; ed_phs_vei</li>
			<li>maxLavaExtru &rarr; ed_phs_max_lext</li>
			<li>maxExpMassDis &rarr; ed_phs_max_expdis</li>
			<li>dre &rarr; ed_phs_dre</li>
			<li>magmaMix &rarr; ed_phs_mix</li>
			<li>maxColHeight &rarr; ed_phs_col</li>
			<li>colHeightDet &rarr; ed_phs_coldet</li>
			<li>minSiO2MatrixGlass &rarr; ed_phs_minsio2_mg</li>
			<li>maxSiO2MatrixGlass &rarr; ed_phs_maxsio2_mg</li>
			<li>minSiO2WholeRock &rarr; ed_phs_minsio2_wr</li>
			<li>maxSiO2WholeRock &rarr; ed_phs_maxsio2_wr</li>
			<li>totCrystal &rarr; ed_phs_totxtl</li>
			<li>phenoContent &rarr; ed_phs_phenc</li>
			<li>phenoAssemb &rarr; ed_phs_phena</li>
			<li>preErupH2OContent &rarr; ed_phs_h2o</li>
			<li>phenoMeltInclusion &rarr; ed_phs_h2o_xtl</li>
			<li>comments &rarr; ed_phs_com</li>
			<li>#ed_id &rarr; ed_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; ed_phs_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; ed_phs_loaddate</li>
		</ul>
		<h4>b) UPDATE ed_phs WHERE ed_phs_id = '#ed_phs_id'</h4>
		<ul>
			<li>phaseNumber &rarr; ed_phs_phsnum</li>
			<li>#ed_phs_stime &rarr; ed_phs_stime</li>
			<li>#ed_phs_stime_bc &rarr; ed_phs_stime_bc</li>
			<li>startTimeUnc &rarr; ed_phs_stime_unc</li>
			<li>#ed_phs_etime &rarr; ed_phs_etime</li>
			<li>#ed_phs_etime_bc &rarr; ed_phs_etime_bc</li>
			<li>endTimeUnc &rarr; ed_phs_etime_unc</li>
			<li>description &rarr; ed_phs_desc</li>
			<li>vei &rarr; ed_phs_vei</li>
			<li>maxLavaExtru &rarr; ed_phs_max_lext</li>
			<li>maxExpMassDis &rarr; ed_phs_max_expdis</li>
			<li>dre &rarr; ed_phs_dre</li>
			<li>magmaMix &rarr; ed_phs_mix</li>
			<li>maxColHeight &rarr; ed_phs_col</li>
			<li>colHeightDet &rarr; ed_phs_coldet</li>
			<li>minSiO2MatrixGlass &rarr; ed_phs_minsio2_mg</li>
			<li>maxSiO2MatrixGlass &rarr; ed_phs_maxsio2_mg</li>
			<li>minSiO2WholeRock &rarr; ed_phs_minsio2_wr</li>
			<li>maxSiO2WholeRock &rarr; ed_phs_maxsio2_wr</li>
			<li>totCrystal &rarr; ed_phs_totxtl</li>
			<li>phenoContent &rarr; ed_phs_phenc</li>
			<li>phenoAssemb &rarr; ed_phs_phena</li>
			<li>preErupH2OContent &rarr; ed_phs_h2o</li>
			<li>phenoMeltInclusion &rarr; ed_phs_h2o_xtl</li>
			<li>comments &rarr; ed_phs_com</li>
			<li>#ed_id &rarr; ed_id</li>
			<li>#pubDate &rarr; ed_phs_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Phase - Video -->
		<h2 class="wovomlclass"><a name="phase_video" id="phase_video"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#phase">&lt;Phase&gt;</a> | &lt;Video&gt;</h2>
		
<pre><strong>&lt;Video code=&quot;...&quot;&gt;</strong>
	&lt;link&gt;...&lt;/link&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;length&gt;...&lt;/length&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/Video&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Collector:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
			<li>
				Link:
				<br/>SELECT ed_id FROM ed_phs WHERE ed_phs_id = '@parent1'
				<br/>&rarr; #ed_id
			</li>
			<li>
				Link:
				<br/>SELECT vd_id FROM ed WHERE ed_id = '#ed_id'
				<br/>&rarr; #vd_id
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT ed_vid_id FROM ed_vid WHERE ed_vid_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #ed_vid_id
		</p>
		<h4>a) INSERT INTO ed_vid</h4>
		<ul>
			<li>/code &rarr; ed_vid_code</li>
			<li>link &rarr; ed_vid_link</li>
			<li>startTime &rarr; ed_vid_stime</li>
			<li>startTimeUnc &rarr; ed_vid_stime_unc</li>
			<li>length &rarr; ed_vid_length</li>
			<li>description &rarr; ed_vid_desc</li>
			<li>comments &rarr; ed_vid_com</li>
			<li>#ed_id &rarr; ed_id</li>
			<li>@parent1 &rarr; ed_phs_id</li>
			<li>#vd_id &rarr; vd_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; ed_vid_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; ed_vid_loaddate</li>
		</ul>
		<h4>b) UPDATE ed_vid WHERE ed_vid_id = '#ed_vid_id'</h4>
		<ul>
			<li>link &rarr; ed_vid_link</li>
			<li>startTime &rarr; ed_vid_stime</li>
			<li>startTimeUnc &rarr; ed_vid_stime_unc</li>
			<li>length &rarr; ed_vid_length</li>
			<li>description &rarr; ed_vid_desc</li>
			<li>comments &rarr; ed_vid_com</li>
			<li>#ed_id &rarr; ed_id</li>
			<li>@parent1 &rarr; ed_phs_id</li>
			<li>#vd_id &rarr; vd_id</li>
			<li>#pubDate &rarr; ed_vid_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Phase - Forecast -->
		<h2 class="wovomlclass"><a name="phase_forecast" id="phase_forecast"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#phase">&lt;Phase&gt;</a> | &lt;Forecast&gt;</h2>
		
<pre><strong>&lt;Forecast code=&quot;...&quot;&gt;</strong>
	&lt;description&gt;...&lt;/description&gt;
	&lt;earliestStartTime&gt;...&lt;/earliestStartTime&gt;
	&lt;earliestStartTimeUnc&gt;...&lt;/earliestStartTimeUnc&gt;
	&lt;latestStartTime&gt;...&lt;/latestStartTime&gt;
	&lt;latestStartTimeUnc&gt;...&lt;/latestStartTimeUnc&gt;
	&lt;issueTime&gt;...&lt;/issueTime&gt;
	&lt;issueTimeUnc&gt;...&lt;/issueTimeUnc&gt;
	&lt;timeSuccess&gt;...&lt;/timeSuccess&gt;
	&lt;magniSuccess&gt;...&lt;/magniSuccess&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/Forecast&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Collector:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'issueTime' &le; 'earliestStartTime' &le; 'latestStartTime'
			</li>
			<li>
				Time order:
				<br/>(@current.'issueTime' &plusmn; 'issueTimeUnc') &le; (@parent1.'startTime' &plusmn; 'startTimeUnc')
			</li>
			<li>
				Publish date:
				<ul>
					<li>'issueTime' + 2 years</li>
					<li>'earliestStartTime' + 2 years</li>
					<li>'latestStartTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
			<li>
				Link:
				<br/>SELECT ed_id FROM ed_phs WHERE ed_phs_id = '@parent1'
				<br/>&rarr; #ed_id
			</li>
			<li>
				Link:
				<br/>SELECT vd_id FROM ed WHERE ed_id = '#ed_id'
				<br/>&rarr; #vd_id
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT ed_for_id FROM ed_for WHERE ed_for_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #ed_for_id
		</p>
		<h4>a) INSERT INTO ed_for</h4>
		<ul>
			<li>/code &rarr; ed_for_code</li>
			<li>description &rarr; ed_for_desc</li>
			<li>earliestStartTime &rarr; ed_for_open</li>
			<li>earliestStartTimeUnc &rarr; ed_for_open_unc</li>
			<li>latestStartTime &rarr; ed_for_close</li>
			<li>latestStartTimeUnc &rarr; ed_for_close_unc</li>
			<li>issueTime &rarr; ed_for_time</li>
			<li>issueTimeUnc &rarr; ed_for_time_unc</li>
			<li>timeSuccess &rarr; ed_for_tsucc</li>
			<li>magniSuccess &rarr; ed_for_msucc</li>
			<li>comments &rarr; ed_for_com</li>
			<li>@parent1 &rarr; ed_phs_id</li>
			<li>#vd_id &rarr; vd_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; ed_for_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; ed_for_loaddate</li>
		</ul>
		<h4>b) UPDATE ed_for WHERE ed_for_id = '#ed_for_id'</h4>
		<ul>
			<li>description &rarr; ed_for_desc</li>
			<li>earliestStartTime &rarr; ed_for_open</li>
			<li>earliestStartTimeUnc &rarr; ed_for_open_unc</li>
			<li>latestStartTime &rarr; ed_for_close</li>
			<li>latestStartTimeUnc &rarr; ed_for_close_unc</li>
			<li>issueTime &rarr; ed_for_time</li>
			<li>issueTimeUnc &rarr; ed_for_time_unc</li>
			<li>timeSuccess &rarr; ed_for_tsucc</li>
			<li>magniSuccess &rarr; ed_for_msucc</li>
			<li>comments &rarr; ed_for_com</li>
			<li>@parent1 &rarr; ed_phs_id</li>
			<li>#vd_id &rarr; vd_id</li>
			<li>#pubDate &rarr; ed_for_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Video -->
		<h2 class="wovomlclass"><a name="video" id="video"></a><a href="#wovoml">&lt;wovoml&gt;</a> | &lt;Video&gt;</h2>
		
<pre><strong>&lt;Video code=&quot;...&quot;&gt;</strong>
	&lt;volcanoCode&gt;...&lt;/volcanoCode&gt;		&lt;!-- OR &lt;eruptionCode&gt;...&lt;/eruptionCode&gt; OR &lt;phaseCode&gt;...&lt;/phaseCode&gt; --&gt;
	&lt;eruptionCode&gt;...&lt;/eruptionCode&gt;
	&lt;phaseCode&gt;...&lt;/phaseCode&gt;
	&lt;link&gt;...&lt;/link&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;length&gt;...&lt;/length&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/Video&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Collector:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Link:
				<br/>SELECT vd_id FROM vd_inf WHERE vd_inf_cavw = 'volcanoCode'
				<br/>&rarr; #vd_id1
			</li>
			<li>
				Link:
				<br/>SELECT ed_id FROM ed WHERE ed_code = 'eruptionCode' AND cc_id = '#cc_id'
				<br/>&rarr; #ed_id1
			</li>
			<li>
				Link:
				<br/>SELECT ed_phs_id FROM ed_phs WHERE ed_phs_code = 'phaseCode' AND cc_id = '#cc_id'
				<br/>&rarr; #ed_phs_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
			<li>
				Link:
				<br/>SELECT vd_id FROM ed WHERE ed_id = '#ed_id1'
				<br/>&rarr; #vd_id2
			</li>
			<li>
				Link:
				<br/>SELECT ed_id FROM ed_phs WHERE ed_phs_id = '#ed_phs_id'
				<br/>&rarr; #ed_id2
			</li>
			<li>
				Link:
				<br/>SELECT vd_id FROM ed WHERE ed_id = '#ed_id2'
				<br/>&rarr; #vd_id3
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT ed_vid_id FROM ed_vid WHERE ed_vid_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #ed_vid_id
		</p>
		<h4>a) INSERT INTO ed_vid</h4>
		<ul>
			<li>/code &rarr; ed_vid_code</li>
			<li>link &rarr; ed_vid_link</li>
			<li>startTime &rarr; ed_vid_stime</li>
			<li>startTimeUnc &rarr; ed_vid_stime_unc</li>
			<li>length &rarr; ed_vid_length</li>
			<li>description &rarr; ed_vid_desc</li>
			<li>comments &rarr; ed_vid_com</li>
			<li>#ed_id1|#ed_id2 &rarr; ed_id</li>
			<li>#ed_phs_id &rarr; ed_phs_id</li>
			<li>#vd_id1|#vd_id2|#vd_id3|!vd_id &rarr; vd_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; ed_vid_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; ed_vid_loaddate</li>
		</ul>
		<h4>b) UPDATE ed_vid WHERE ed_vid_id = '#ed_vid_id'</h4>
		<ul>
			<li>link &rarr; ed_vid_link</li>
			<li>startTime &rarr; ed_vid_stime</li>
			<li>startTimeUnc &rarr; ed_vid_stime_unc</li>
			<li>length &rarr; ed_vid_length</li>
			<li>description &rarr; ed_vid_desc</li>
			<li>comments &rarr; ed_vid_com</li>
			<li>#ed_id1|#ed_id2 &rarr; ed_id</li>
			<li>#ed_phs_id &rarr; ed_phs_id</li>
			<li>#vd_id1|#vd_id2|#vd_id3|!vd_id &rarr; vd_id</li>
			<li>#pubDate &rarr; ed_vid_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Forecast -->
		<h2 class="wovomlclass"><a name="forecast" id="forecast"></a><a href="#wovoml">&lt;wovoml&gt;</a> | &lt;Forecast&gt;</h2>
		
<pre><strong>&lt;Forecast code=&quot;...&quot;&gt;</strong>
	&lt;volcanoCode&gt;...&lt;/volcanoCode&gt;		&lt;!-- OR &lt;phaseCode&gt;...&lt;/phaseCode&gt; --&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;earliestStartTime&gt;...&lt;/earliestStartTime&gt;
	&lt;earliestStartTimeUnc&gt;...&lt;/earliestStartTimeUnc&gt;
	&lt;latestStartTime&gt;...&lt;/latestStartTime&gt;
	&lt;latestStartTimeUnc&gt;...&lt;/latestStartTimeUnc&gt;
	&lt;issueTime&gt;...&lt;/issueTime&gt;
	&lt;issueTimeUnc&gt;...&lt;/issueTimeUnc&gt;
	&lt;timeSuccess&gt;...&lt;/timeSuccess&gt;
	&lt;magniSuccess&gt;...&lt;/magniSuccess&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/Forecast&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Collector:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Link:
				<br/>SELECT vd_id FROM vd_inf WHERE vd_inf_cavw = 'volcanoCode'
				<br/>&rarr; #vd_id1
			</li>
			<li>
				Time order:
				<br/>'issueTime' &le; 'earliestStartTime' &le; 'latestStartTime'
			</li>
			<li>
				Link with time order:
				<br/>SELECT ed_phs_id, ed_phs_stime, ed_phs_stime_unc FROM ed_phs WHERE ed_phs_code = 'phaseCode' AND cc_id = '#cc_id'
				<br/>(@current.'issueTime' &plusmn; 'issueTimeUnc') &le; (ed_phs_stime &plusmn; ed_phs_stime_unc)
				<br/>&rarr; #ed_phs_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'issueTime' + 2 years</li>
					<li>'earliestStartTime' + 2 years</li>
					<li>'latestStartTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
			<li>
				Link:
				<br/>SELECT ed_id FROM ed_phs WHERE ed_phs_id = '#ed_phs_id'
				<br/>&rarr; #ed_id
			</li>
			<li>
				Link:
				<br/>SELECT vd_id FROM ed WHERE ed_id = '#ed_id'
				<br/>&rarr; #vd_id2
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT ed_for_id FROM ed_for WHERE ed_for_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #ed_for_id
		</p>
		<h4>a) INSERT INTO ed_for</h4>
		<ul>
			<li>/code &rarr; ed_for_code</li>
			<li>description &rarr; ed_for_desc</li>
			<li>earliestStartTime &rarr; ed_for_open</li>
			<li>earliestStartTimeUnc &rarr; ed_for_open_unc</li>
			<li>latestStartTime &rarr; ed_for_close</li>
			<li>latestStartTimeUnc &rarr; ed_for_close_unc</li>
			<li>issueTime &rarr; ed_for_time</li>
			<li>issueTimeUnc &rarr; ed_for_time_unc</li>
			<li>timeSuccess &rarr; ed_for_tsucc</li>
			<li>magniSuccess &rarr; ed_for_msucc</li>
			<li>comments &rarr; ed_for_com</li>
			<li>#ed_phs_id &rarr; ed_phs_id</li>
			<li>#vd_id1|#vd_id2|!vd_id &rarr; vd_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; ed_for_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; ed_for_loaddate</li>
		</ul>
		<h4>b) UPDATE ed_for WHERE ed_for_id = '#ed_for_id'</h4>
		<ul>
			<li>description &rarr; ed_for_desc</li>
			<li>earliestStartTime &rarr; ed_for_open</li>
			<li>earliestStartTimeUnc &rarr; ed_for_open_unc</li>
			<li>latestStartTime &rarr; ed_for_close</li>
			<li>latestStartTimeUnc &rarr; ed_for_close_unc</li>
			<li>issueTime &rarr; ed_for_time</li>
			<li>issueTimeUnc &rarr; ed_for_time_unc</li>
			<li>timeSuccess &rarr; ed_for_tsucc</li>
			<li>magniSuccess &rarr; ed_for_msucc</li>
			<li>comments &rarr; ed_for_com</li>
			<li>#ed_phs_id &rarr; ed_phs_id</li>
			<li>#vd_id1|#vd_id2|!vd_id &rarr; vd_id</li>
			<li>#pubDate &rarr; ed_for_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Inferred processes -->
		<h2 class="wovomlclass"><a name="inferredprocesses" id="inferredprocesses"></a><a href="#wovoml">&lt;wovoml&gt;</a> | &lt;InferredProcesses&gt;</h2>
		
<pre><strong>&lt;InferredProcesses&gt;</strong>
	<a href="#inferredprocesses_magmamovement">&lt;MagmaMovement&gt;...&lt;/MagmaMovement&gt;</a>
	<a href="#inferredprocesses_volatilesat">&lt;VolatileSat&gt;...&lt;/VolatileSat&gt;</a>
	<a href="#inferredprocesses_magmapressure">&lt;MagmaPressure&gt;...&lt;/MagmaPressure&gt;</a>
	<a href="#inferredprocesses_hydrothermal">&lt;Hydrothermal&gt;...&lt;/Hydrothermal&gt;</a>
	<a href="#inferredprocesses_regionaltectonics">&lt;RegionalTectonics&gt;...&lt;/RegionalTectonics&gt;</a>
<strong>&lt;/InferredProcesses&gt;</strong></pre>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Inferred processes - Magma movement -->
		<h2 class="wovomlclass"><a name="inferredprocesses_magmamovement" id="inferredprocesses_magmamovement"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#inferredprocesses">&lt;InferredProcesses&gt;</a> | &lt;MagmaMovement&gt;</h2>
		
<pre><strong>&lt;MagmaMovement code=&quot;...&quot;&gt;</strong>
	&lt;volcanoCode&gt;...&lt;/volcanoCode&gt;
	&lt;inferTime&gt;...&lt;/inferTime&gt;
	&lt;inferTimeUnc&gt;...&lt;/inferTimeUnc&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;deepSupp&gt;...&lt;/deepSupp&gt;
	&lt;ascent&gt;...&lt;/ascent&gt;
	&lt;convecBelow&gt;...&lt;/convecBelow&gt;
	&lt;convecAbove&gt;...&lt;/convecAbove&gt;
	&lt;magmaMix&gt;...&lt;/magmaMix&gt;
	&lt;dikeIntru&gt;...&lt;/dikeIntru&gt;
	&lt;pipeIntru&gt;...&lt;/pipeIntru&gt;
	&lt;sillIntru&gt;...&lt;/sillIntru&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/MagmaMovement&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Interpreter:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Volcano:
				<br/>SELECT vd_id FROM vd_inf WHERE vd_inf_cavw = 'volcanoCode'
				<br/>&rarr; #vd_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'inferTime'
			</li>
			<li>
				Publish date:
				<ul>
					<li>'inferTime' + 2 years</li>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT ip_mag_id FROM ip_mag WHERE ip_mag_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #ip_mag_id
		</p>
		<h4>a) INSERT INTO ip_mag</h4>
		<ul>
			<li>/code &rarr; ip_mag_code</li>
			<li>inferTime &rarr; ip_mag_time</li>
			<li>inferTimeUnc &rarr; ip_mag_time_unc</li>
			<li>startTime &rarr; ip_mag_start</li>
			<li>startTimeUnc &rarr; ip_mag_start_unc</li>
			<li>endTime &rarr; ip_mag_end</li>
			<li>endTimeUnc &rarr; ip_mag_end_unc</li>
			<li>deepSupp &rarr; ip_mag_deepsupp</li>
			<li>ascent &rarr; ip_mag_asc</li>
			<li>convecBelow &rarr; ip_mag_convb</li>
			<li>convecAbove &rarr; ip_mag_conva</li>
			<li>magmaMix &rarr; ip_mag_mix</li>
			<li>dikeIntru &rarr; ip_mag_dike</li>
			<li>pipeIntru &rarr; ip_mag_pipe</li>
			<li>sillIntru &rarr; ip_mag_sill</li>
			<li>comments &rarr; ip_mag_com</li>
			<li>#vd_id &rarr; vd_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; ip_mag_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; ip_mag_loaddate</li>
		</ul>
		<h4>b) UPDATE ip_mag WHERE ip_mag_id = '#ip_mag_id'</h4>
		<ul>
			<li>inferTime &rarr; ip_mag_time</li>
			<li>inferTimeUnc &rarr; ip_mag_time_unc</li>
			<li>startTime &rarr; ip_mag_start</li>
			<li>startTimeUnc &rarr; ip_mag_start_unc</li>
			<li>endTime &rarr; ip_mag_end</li>
			<li>endTimeUnc &rarr; ip_mag_end_unc</li>
			<li>deepSupp &rarr; ip_mag_deepsupp</li>
			<li>ascent &rarr; ip_mag_asc</li>
			<li>convecBelow &rarr; ip_mag_convb</li>
			<li>convecAbove &rarr; ip_mag_conva</li>
			<li>magmaMix &rarr; ip_mag_mix</li>
			<li>dikeIntru &rarr; ip_mag_dike</li>
			<li>pipeIntru &rarr; ip_mag_pipe</li>
			<li>sillIntru &rarr; ip_mag_sill</li>
			<li>comments &rarr; ip_mag_com</li>
			<li>#vd_id &rarr; vd_id</li>
			<li>#pubDate &rarr; ip_mag_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Inferred processes - Volatile saturation -->
		<h2 class="wovomlclass"><a name="inferredprocesses_volatilesat" id="inferredprocesses_volatilesat"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#inferredprocesses">&lt;InferredProcesses&gt;</a> | &lt;VolatileSat&gt;</h2>
		
<pre><strong>&lt;VolatileSat code=&quot;...&quot;&gt;</strong>
	&lt;volcanoCode&gt;...&lt;/volcanoCode&gt;
	&lt;inferTime&gt;...&lt;/inferTime&gt;
	&lt;inferTimeUnc&gt;...&lt;/inferTimeUnc&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;CO2Sat&gt;...&lt;/CO2Sat&gt;
	&lt;H2OSat&gt;...&lt;/H2OSat&gt;
	&lt;decompress&gt;...&lt;/decompress&gt;
	&lt;fugacity&gt;...&lt;/fugacity&gt;
	&lt;volatileAdd&gt;...&lt;/volatileAdd&gt;
	&lt;crystalOr2ndBoil&gt;...&lt;/crystalOr2ndBoil&gt;
	&lt;vesicul&gt;...&lt;/vesicul&gt;
	&lt;devesicul&gt;...&lt;/devesicul&gt;
	&lt;degas&gt;...&lt;/degas&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/VolatileSat&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Interpreter:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Volcano:
				<br/>SELECT vd_id FROM vd_inf WHERE vd_inf_cavw = 'volcanoCode'
				<br/>&rarr; #vd_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'inferTime'
			</li>
			<li>
				Publish date:
				<ul>
					<li>'inferTime' + 2 years</li>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT ip_sat_id FROM ip_sat WHERE ip_sat_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #ip_sat_id
		</p>
		<h4>a) INSERT INTO ip_sat</h4>
		<ul>
			<li>/code &rarr; ip_sat_code</li>
			<li>inferTime &rarr; ip_sat_time</li>
			<li>inferTimeUnc &rarr; ip_sat_time_unc</li>
			<li>startTime &rarr; ip_sat_start</li>
			<li>startTimeUnc &rarr; ip_sat_start_unc</li>
			<li>endTime &rarr; ip_sat_end</li>
			<li>endTimeUnc &rarr; ip_sat_end_unc</li>
			<li>CO2Sat &rarr; ip_sat_co2</li>
			<li>H2OSat &rarr; ip_sat_h2o</li>
			<li>decompress &rarr; ip_sat_decomp</li>
			<li>fugacity &rarr; ip_sat_dfo2</li>
			<li>volatileAdd &rarr; ip_sat_add</li>
			<li>crystalOr2ndBoil &rarr; ip_sat_xtl</li>
			<li>vesicul &rarr; ip_sat_ves</li>
			<li>devesicul &rarr; ip_sat_deves</li>
			<li>degas &rarr; ip_sat_degas</li>
			<li>comments &rarr; ip_sat_com</li>
			<li>#vd_id &rarr; vd_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; ip_sat_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; ip_sat_loaddate</li>
		</ul>
		<h4>b) UPDATE ip_sat WHERE ip_sat_id = '#ip_sat_id'</h4>
		<ul>
			<li>inferTime &rarr; ip_sat_time</li>
			<li>inferTimeUnc &rarr; ip_sat_time_unc</li>
			<li>startTime &rarr; ip_sat_start</li>
			<li>startTimeUnc &rarr; ip_sat_start_unc</li>
			<li>endTime &rarr; ip_sat_end</li>
			<li>endTimeUnc &rarr; ip_sat_end_unc</li>
			<li>CO2Sat &rarr; ip_sat_co2</li>
			<li>H2OSat &rarr; ip_sat_h2o</li>
			<li>decompress &rarr; ip_sat_decomp</li>
			<li>fugacity &rarr; ip_sat_dfo2</li>
			<li>volatileAdd &rarr; ip_sat_add</li>
			<li>crystalOr2ndBoil &rarr; ip_sat_xtl</li>
			<li>vesicul &rarr; ip_sat_ves</li>
			<li>devesicul &rarr; ip_sat_deves</li>
			<li>degas &rarr; ip_sat_degas</li>
			<li>comments &rarr; ip_sat_com</li>
			<li>#vd_id &rarr; vd_id</li>
			<li>#pubDate &rarr; ip_sat_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Inferred processes - Magma pressure -->
		<h2 class="wovomlclass"><a name="inferredprocesses_magmapressure" id="inferredprocesses_magmapressure"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#inferredprocesses">&lt;InferredProcesses&gt;</a> | &lt;MagmaPressure&gt;</h2>
		
<pre><strong>&lt;MagmaPressure code=&quot;...&quot;&gt;</strong>
	&lt;volcanoCode&gt;...&lt;/volcanoCode&gt;
	&lt;inferTime&gt;...&lt;/inferTime&gt;
	&lt;inferTimeUnc&gt;...&lt;/inferTimeUnc&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;gasInduced&gt;...&lt;/gasInduced&gt;
	&lt;tectInduced&gt;...&lt;/tectInduced&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/MagmaPressure&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Interpreter:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Volcano:
				<br/>SELECT vd_id FROM vd_inf WHERE vd_inf_cavw = 'volcanoCode'
				<br/>&rarr; #vd_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'inferTime'
			</li>
			<li>
				Publish date:
				<ul>
					<li>'inferTime' + 2 years</li>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT ip_pres_id FROM ip_pres WHERE ip_pres_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #ip_pres_id
		</p>
		<h4>a) INSERT INTO ip_pres</h4>
		<ul>
			<li>/code &rarr; ip_pres_code</li>
			<li>inferTime &rarr; ip_pres_time</li>
			<li>inferTimeUnc &rarr; ip_pres_time_unc</li>
			<li>startTime &rarr; ip_pres_start</li>
			<li>startTimeUnc &rarr; ip_pres_start_unc</li>
			<li>endTime &rarr; ip_pres_end</li>
			<li>endTimeUnc &rarr; ip_pres_end_unc</li>
			<li>gasInduced &rarr; ip_pres_gas</li>
			<li>tectInduced &rarr; ip_pres_tec</li>
			<li>comments &rarr; ip_pres_com</li>
			<li>#vd_id &rarr; vd_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; ip_pres_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; ip_pres_loaddate</li>
		</ul>
		<h4>b) UPDATE ip_pres WHERE ip_pres_id = '#ip_pres_id'</h4>
		<ul>
			<li>inferTime &rarr; ip_pres_time</li>
			<li>inferTimeUnc &rarr; ip_pres_time_unc</li>
			<li>startTime &rarr; ip_pres_start</li>
			<li>startTimeUnc &rarr; ip_pres_start_unc</li>
			<li>endTime &rarr; ip_pres_end</li>
			<li>endTimeUnc &rarr; ip_pres_end_unc</li>
			<li>gasInduced &rarr; ip_pres_gas</li>
			<li>tectInduced &rarr; ip_pres_tec</li>
			<li>comments &rarr; ip_pres_com</li>
			<li>#vd_id &rarr; vd_id</li>
			<li>#pubDate &rarr; ip_pres_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Inferred processes - Hydrothermal -->
		<h2 class="wovomlclass"><a name="inferredprocesses_hydrothermal" id="inferredprocesses_hydrothermal"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#inferredprocesses">&lt;InferredProcesses&gt;</a> | &lt;Hydrothermal&gt;</h2>
		
<pre><strong>&lt;Hydrothermal code=&quot;...&quot;&gt;</strong>
	&lt;volcanoCode&gt;...&lt;/volcanoCode&gt;
	&lt;inferTime&gt;...&lt;/inferTime&gt;
	&lt;inferTimeUnc&gt;...&lt;/inferTimeUnc&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;heatGwater&gt;...&lt;/heatGwater&gt;
	&lt;poreDestab&gt;...&lt;/poreDestab&gt;
	&lt;poreDeform&gt;...&lt;/poreDeform&gt;
	&lt;hydrofract&gt;...&lt;/hydrofract&gt;
	&lt;boilTremor&gt;...&lt;/boilTremor&gt;
	&lt;absorSolGas&gt;...&lt;/absorSolGas&gt;
	&lt;speciesEqbChange&gt;...&lt;/speciesEqbChange&gt;
	&lt;boilDryChimneys&gt;...&lt;/boilDryChimneys&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/Hydrothermal&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Interpreter:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Volcano:
				<br/>SELECT vd_id FROM vd_inf WHERE vd_inf_cavw = 'volcanoCode'
				<br/>&rarr; #vd_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'inferTime'
			</li>
			<li>
				Publish date:
				<ul>
					<li>'inferTime' + 2 years</li>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT ip_hyd_id FROM ip_hyd WHERE ip_hyd_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #ip_hyd_id
		</p>
		<h4>a) INSERT INTO ip_hyd</h4>
		<ul>
			<li>/code &rarr; ip_hyd_code</li>
			<li>inferTime &rarr; ip_hyd_time</li>
			<li>inferTimeUnc &rarr; ip_hyd_time_unc</li>
			<li>startTime &rarr; ip_hyd_start</li>
			<li>startTimeUnc &rarr; ip_hyd_start_unc</li>
			<li>endTime &rarr; ip_hyd_end</li>
			<li>endTimeUnc &rarr; ip_hyd_end_unc</li>
			<li>heatGwater &rarr; ip_hyd_gwater</li>
			<li>poreDestab &rarr; ip_hyd_ipor</li>
			<li>poreDeform &rarr; ip_hyd_edef</li>
			<li>hydrofract &rarr; ip_hyd_hfrac</li>
			<li>boilTremor &rarr; ip_hyd_btrem</li>
			<li>absorSolGas &rarr; ip_hyd_abgas</li>
			<li>speciesEqbChange &rarr; ip_hyd_species</li>
			<li>boilDryChimneys &rarr; ip_hyd_chim</li>
			<li>comments &rarr; ip_hyd_com</li>
			<li>#vd_id &rarr; vd_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; ip_hyd_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; ip_hyd_loaddate</li>
		</ul>
		<h4>b) UPDATE ip_hyd WHERE ip_hyd_id = '#ip_hyd_id'</h4>
		<ul>
			<li>inferTime &rarr; ip_hyd_time</li>
			<li>inferTimeUnc &rarr; ip_hyd_time_unc</li>
			<li>startTime &rarr; ip_hyd_start</li>
			<li>startTimeUnc &rarr; ip_hyd_start_unc</li>
			<li>endTime &rarr; ip_hyd_end</li>
			<li>endTimeUnc &rarr; ip_hyd_end_unc</li>
			<li>heatGwater &rarr; ip_hyd_gwater</li>
			<li>poreDestab &rarr; ip_hyd_ipor</li>
			<li>poreDeform &rarr; ip_hyd_edef</li>
			<li>hydrofract &rarr; ip_hyd_hfrac</li>
			<li>boilTremor &rarr; ip_hyd_btrem</li>
			<li>absorSolGas &rarr; ip_hyd_abgas</li>
			<li>speciesEqbChange &rarr; ip_hyd_species</li>
			<li>boilDryChimneys &rarr; ip_hyd_chim</li>
			<li>comments &rarr; ip_hyd_com</li>
			<li>#vd_id &rarr; vd_id</li>
			<li>#pubDate &rarr; ip_hyd_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Regional tectonics -->
		<h2 class="wovomlclass"><a name="inferredprocesses_regionaltectonics" id="inferredprocesses_regionaltectonics"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#inferredprocesses">&lt;InferredProcesses&gt;</a> | &lt;RegionalTectonics&gt;</h2>
		
<pre><strong>&lt;RegionalTectonics code=&quot;...&quot;&gt;</strong>
	&lt;volcanoCode&gt;...&lt;/volcanoCode&gt;
	&lt;inferTime&gt;...&lt;/inferTime&gt;
	&lt;inferTimeUnc&gt;...&lt;/inferTimeUnc&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;tectonicChanges&gt;...&lt;/tectonicChanges&gt;
	&lt;staticStress&gt;...&lt;/staticStress&gt;
	&lt;dynamicStrain&gt;...&lt;/dynamicStrain&gt;
	&lt;localShear&gt;...&lt;/localShear&gt;
	&lt;slowEarthquake&gt;...&lt;/slowEarthquake&gt;
	&lt;distalPressure&gt;...&lt;/distalPressure&gt;
	&lt;distalDepressure&gt;...&lt;/distalDepressure&gt;
	&lt;hydrothermalLubrication&gt;...&lt;/hydrothermalLubrication&gt;
	&lt;earthTide&gt;...&lt;/earthTide&gt;
	&lt;atmosInfluence&gt;...&lt;/atmosInfluence&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/RegionalTectonics&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Interpreter:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Volcano:
				<br/>SELECT vd_id FROM vd_inf WHERE vd_inf_cavw = 'volcanoCode'
				<br/>&rarr; #vd_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'inferTime'
			</li>
			<li>
				Publish date:
				<ul>
					<li>'inferTime' + 2 years</li>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT ip_tec_id FROM ip_tec WHERE ip_tec_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #ip_tec_id
		</p>
		<h4>a) INSERT INTO ip_tec</h4>
		<ul>
			<li>/code &rarr; ip_tec_code</li>
			<li>inferTime &rarr; ip_tec_time</li>
			<li>inferTimeUnc &rarr; ip_tec_time_unc</li>
			<li>startTime &rarr; ip_tec_start</li>
			<li>startTimeUnc &rarr; ip_tec_start_unc</li>
			<li>endTime &rarr; ip_tec_end</li>
			<li>endTimeUnc &rarr; ip_tec_end_unc</li>
			<li>tectonicChanges &rarr; ip_tec_change</li>
			<li>staticStress &rarr; ip_tec_sstress</li>
			<li>dynamicStrain &rarr; ip_tec_dstrain</li>
			<li>localShear &rarr; ip_tec_fault</li>
			<li>slowEarthquake &rarr; ip_tec_seq</li>
			<li>distalPressure &rarr; ip_tec_press</li>
			<li>distalDepressure &rarr; ip_tec_depress</li>
			<li>hydrothermalLubrication &rarr; ip_tec_hppress</li>
			<li>earthTide &rarr; ip_tec_etide</li>
			<li>atmosInfluence &rarr; ip_tec_atmp</li>
			<li>comments &rarr; ip_tec_com</li>
			<li>#vd_id &rarr; vd_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; ip_tec_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; ip_tec_loaddate</li>
		</ul>
		<h4>b) UPDATE ip_tec WHERE ip_tec_id = '#ip_tec_id'</h4>
		<ul>
			<li>inferTime &rarr; ip_tec_time</li>
			<li>inferTimeUnc &rarr; ip_tec_time_unc</li>
			<li>startTime &rarr; ip_tec_start</li>
			<li>startTimeUnc &rarr; ip_tec_start_unc</li>
			<li>endTime &rarr; ip_tec_end</li>
			<li>endTimeUnc &rarr; ip_tec_end_unc</li>
			<li>tectonicChanges &rarr; ip_tec_change</li>
			<li>staticStress &rarr; ip_tec_sstress</li>
			<li>dynamicStrain &rarr; ip_tec_dstrain</li>
			<li>localShear &rarr; ip_tec_fault</li>
			<li>slowEarthquake &rarr; ip_tec_seq</li>
			<li>distalPressure &rarr; ip_tec_press</li>
			<li>distalDepressure &rarr; ip_tec_depress</li>
			<li>hydrothermalLubrication &rarr; ip_tec_hppress</li>
			<li>earthTide &rarr; ip_tec_etide</li>
			<li>atmosInfluence &rarr; ip_tec_atmp</li>
			<li>comments &rarr; ip_tec_com</li>
			<li>#vd_id &rarr; vd_id</li>
			<li>#pubDate &rarr; ip_tec_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system -->
		<h2 class="wovomlclass"><a name="monitoringsystem" id="monitoringsystem"></a><a href="#wovoml">&lt;wovoml&gt;</a> | &lt;MonitoringSystem&gt;</h2>
		
<pre><strong>&lt;MonitoringSystem&gt;</strong>
	<a href="#monitoringsystem_airplane">&lt;Airplane&gt;...&lt;/Airplane&gt;</a>
	<a href="#monitoringsystem_deformationnetwork">&lt;DeformationNetwork&gt;...&lt;/DeformationNetwork&gt;</a>
	<a href="#monitoringsystem_deformationstation">&lt;DeformationStation&gt;...&lt;/DeformationStation&gt;</a>
	<a href="#monitoringsystem_deformationinstrument">&lt;DeformationInstrument&gt;...&lt;/DeformationInstrument&gt;</a>
	<a href="#monitoringsystem_tiltstraininstrument">&lt;TiltStrainInstrument&gt;...&lt;/TiltStrainInstrument&gt;</a>
	<a href="#monitoringsystem_gasnetwork">&lt;GasNetwork&gt;...&lt;/GasNetwork&gt;</a>
	<a href="#monitoringsystem_gasstation">&lt;GasStation&gt;...&lt;/GasStation&gt;</a>
	<a href="#monitoringsystem_gasinstrument">&lt;GasInstrument&gt;...&lt;/GasInstrument&gt;</a>
	<a href="#monitoringsystem_hydrologicnetwork">&lt;HydrologicNetwork&gt;...&lt;/HydrologicNetwork&gt;</a>
	<a href="#monitoringsystem_hydrologicstation">&lt;HydrologicStation&gt;...&lt;/HydrologicStation&gt;</a>
	<a href="#monitoringsystem_hydrologicinstrument">&lt;HydrologicInstrument&gt;...&lt;/HydrologicInstrument&gt;</a>
	<a href="#monitoringsystem_fieldsnetwork">&lt;FieldsNetwork&gt;...&lt;/FieldsNetwork&gt;</a>
	<a href="#monitoringsystem_fieldsstation">&lt;FieldsStation&gt;...&lt;/FieldsStation&gt;</a>
	<a href="#monitoringsystem_fieldsinstrument">&lt;FieldsInstrument&gt;...&lt;/FieldsInstrument&gt;</a>
	<a href="#monitoringsystem_thermalnetwork">&lt;ThermalNetwork&gt;...&lt;/ThermalNetwork&gt;</a>
	<a href="#monitoringsystem_thermalstation">&lt;ThermalStation&gt;...&lt;/ThermalStation&gt;</a>
	<a href="#monitoringsystem_thermalinstrument">&lt;ThermalInstrument&gt;...&lt;/ThermalInstrument&gt;</a>
	<a href="#monitoringsystem_seismicnetwork">&lt;SeismicNetwork&gt;...&lt;/SeismicNetwork&gt;</a>
	<a href="#monitoringsystem_seismicstation">&lt;SeismicStation&gt;...&lt;/SeismicStation&gt;</a>
	<a href="#monitoringsystem_seismicinstrument">&lt;SeismicInstrument&gt;...&lt;/SeismicInstrument&gt;</a>
	<a href="#monitoringsystem_seismiccomponent">&lt;SeismicComponent&gt;...&lt;/SeismicComponent&gt;</a>
<strong>&lt;/MonitoringSystem&gt;</strong></pre>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Airplane -->
		<h2 class="wovomlclass"><a name="monitoringsystem_airplane" id="monitoringsystem_airplane"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | &lt;Airplane&gt;</h2>
		
<pre><strong>&lt;Airplane code=&quot;...&quot;&gt;</strong>
	&lt;name&gt;...&lt;/name&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
	<a href="#monitoringsystem_airplane_gasinstrument">&lt;GasInstrument&gt;...&lt;/GasInstrument&gt;</a>
	<a href="#monitoringsystem_airplane_thermalinstrument">&lt;ThermalInstrument&gt;...&lt;/ThermalInstrument&gt;</a>
<strong>&lt;/Airplane&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT cs_id FROM cs WHERE cs_code = '/code' AND cc_id = '#cc_id' AND cs_stime = 'startTime'
			<br/>&rarr; #cs_id
		</p>
		<h4>a) INSERT INTO cs</h4>
		<ul>
			<li>/code &rarr; cs_code</li>
			<li>"A" &rarr; cs_type</li>
			<li>name &rarr; cs_name</li>
			<li>description &rarr; cs_desc</li>
			<li>startTime &rarr; cs_stime</li>
			<li>startTimeUnc &rarr; cs_stime_unc</li>
			<li>endTime &rarr; cs_etime</li>
			<li>endTimeUnc &rarr; cs_etime_unc</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; cs_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; cs_loaddate</li>
		</ul>
		<h4>b) UPDATE cs WHERE cs_id = '#cs_id'</h4>
		<ul>
			<li>name &rarr; cs_name</li>
			<li>description &rarr; cs_desc</li>
			<li>startTimeUnc &rarr; cs_stime_unc</li>
			<li>endTime &rarr; cs_etime</li>
			<li>endTimeUnc &rarr; cs_etime_unc</li>
			<li>#pubDate &rarr; cs_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Airplane - Gas instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystem_airplane_gasinstrument" id="monitoringsystem_airplane_gasinstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | <a href="#monitoringsystem_airplane">&lt;Airplane&gt;</a> | &lt;GasInstrument&gt;</h2>
		
<pre><strong>&lt;GasInstrument code=&quot;...&quot;&gt;</strong>
	&lt;permanent&gt;...&lt;/permanent&gt;
	&lt;name&gt;...&lt;/name&gt;
	&lt;type&gt;...&lt;/type&gt;
	&lt;units&gt;...&lt;/units&gt;
	&lt;resolution&gt;...&lt;/resolution&gt;
	&lt;signalToNoise&gt;...&lt;/signalToNoise&gt;
	&lt;calibration&gt;...&lt;/calibration&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/GasInstrument&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Time inclusion:
				<br/>@current.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc'] &sub; @parent1.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc']
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT gi_id FROM gi WHERE gi_code = '/code' AND cc_id = '#cc_id' AND gi_stime = 'startTime'
			<br/>&rarr; #gi_id
		</p>
		<h4>a) INSERT INTO gi</h4>
		<ul>
			<li>/code &rarr; gi_code</li>
			<li>name &rarr; gi_name</li>
			<li>type &rarr; gi_type</li>
			<li>units &rarr; gi_units</li>
			<li>resolution &rarr; gi_pres</li>
			<li>signalToNoise &rarr; gi_stn</li>
			<li>calibration &rarr; gi_calib</li>
			<li>startTime &rarr; gi_stime</li>
			<li>startTimeUnc &rarr; gi_stime_unc</li>
			<li>endTime &rarr; gi_etime</li>
			<li>endTimeUnc &rarr; gi_etime_unc</li>
			<li>comments &rarr; gi_com</li>
			<li>@parent1 &rarr; cs_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; gi_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; gi_loaddate</li>
		</ul>
		<h4>b) UPDATE gi WHERE gi_id = '#gi_id'</h4>
		<ul>
			<li>name &rarr; gi_name</li>
			<li>type &rarr; gi_type</li>
			<li>units &rarr; gi_units</li>
			<li>resolution &rarr; gi_pres</li>
			<li>signalToNoise &rarr; gi_stn</li>
			<li>calibration &rarr; gi_calib</li>
			<li>startTimeUnc &rarr; gi_stime_unc</li>
			<li>endTime &rarr; gi_etime</li>
			<li>endTimeUnc &rarr; gi_etime_unc</li>
			<li>comments &rarr; gi_com</li>
			<li>@parent1 &rarr; cs_id</li>
			<li>#pubDate &rarr; gi_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Airplane - Thermal instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystem_airplane_thermalinstrument" id="monitoringsystem_airplane_thermalinstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | <a href="#monitoringsystem_airplane">&lt;Airplane&gt;</a> | &lt;ThermalInstrument&gt;</h2>
		
<pre><strong>&lt;ThermalInstrument code=&quot;...&quot;&gt;</strong>
	&lt;name&gt;...&lt;/name&gt;
	&lt;type&gt;...&lt;/type&gt;
	&lt;units&gt;...&lt;/units&gt;
	&lt;resolution&gt;...&lt;/resolution&gt;
	&lt;signalToNoise&gt;...&lt;/signalToNoise&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/ThermalInstrument&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Time inclusion:
				<br/>@current.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc'] &sub; @parent1.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc']
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT ti_id FROM ti WHERE ti_code = '/code' AND cc_id = '#cc_id' AND ti_stime = 'startTime'
			<br/>&rarr; #ti_id
		</p>
		<h4>a) INSERT INTO ti</h4>
		<ul>
			<li>/code &rarr; ti_code</li>
			<li>name &rarr; ti_name</li>
			<li>type &rarr; ti_type</li>
			<li>units &rarr; ti_units</li>
			<li>resolution &rarr; ti_pres</li>
			<li>signalToNoise &rarr; ti_stn</li>
			<li>startTime &rarr; ti_stime</li>
			<li>startTimeUnc &rarr; ti_stime_unc</li>
			<li>endTime &rarr; ti_etime</li>
			<li>endTimeUnc &rarr; ti_etime_unc</li>
			<li>comments &rarr; ti_com</li>
			<li>@parent1 &rarr; cs_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; ti_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; ti_loaddate</li>
		</ul>
		<h4>b) UPDATE ti WHERE ti_id = '#ti_id'</h4>
		<ul>
			<li>name &rarr; ti_name</li>
			<li>type &rarr; ti_type</li>
			<li>units &rarr; ti_units</li>
			<li>resolution &rarr; ti_pres</li>
			<li>signalToNoise &rarr; ti_stn</li>
			<li>startTimeUnc &rarr; ti_stime_unc</li>
			<li>endTime &rarr; ti_etime</li>
			<li>endTimeUnc &rarr; ti_etime_unc</li>
			<li>comments &rarr; ti_com</li>
			<li>@parent1 &rarr; cs_id</li>
			<li>#pubDate &rarr; ti_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Deformation network -->
		<h2 class="wovomlclass"><a name="monitoringsystem_deformationnetwork" id="monitoringsystem_deformationnetwork"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | &lt;DeformationNetwork&gt;</h2>
		
<pre><strong>&lt;DeformationNetwork code=&quot;...&quot;&gt;</strong>
	<a href="#monitoringsystem_deformationnetwork_volcanoes">&lt;Volcanoes&gt;...&lt;/Volcanoes&gt;</a>
	&lt;name&gt;...&lt;/name&gt;
	&lt;area&gt;...&lt;/area&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;diffUTC&gt;...&lt;/diffUTC&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
	<a href="#monitoringsystem_deformationnetwork_deformationstation">&lt;DeformationStation&gt;...&lt;/DeformationStation&gt;</a>
<strong>&lt;/DeformationNetwork&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT cn_id FROM cn WHERE cn_code = '/code' AND cc_id = '#cc_id' AND cn_stime = 'startTime'
			<br/>&rarr; #cn_id
		</p>
		<h4>a) INSERT INTO cn</h4>
		<ul>
			<li>/code &rarr; cn_code</li>
			<li>"Deformation" &rarr; cn_type</li>
			<li>name &rarr; cn_name</li>
			<li>area &rarr; cn_area</li>
			<li>description &rarr; cn_desc</li>
			<li>startTime &rarr; cn_stime</li>
			<li>startTimeUnc &rarr; cn_stime_unc</li>
			<li>endTime &rarr; cn_etime</li>
			<li>endTimeUnc &rarr; cn_etime_unc</li>
			<li>diffUTC &rarr; cn_utc</li>
			<li>comments &rarr; cn_com</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; cn_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; cn_loaddate</li>
		</ul>
		<h4>b) UPDATE cn WHERE cn_id = '#cn_id'</h4>
		<ul>
			<li>name &rarr; cn_name</li>
			<li>area &rarr; cn_area</li>
			<li>description &rarr; cn_desc</li>
			<li>startTimeUnc &rarr; cn_stime_unc</li>
			<li>endTime &rarr; cn_etime</li>
			<li>endTimeUnc &rarr; cn_etime_unc</li>
			<li>diffUTC &rarr; cn_utc</li>
			<li>comments &rarr; cn_com</li>
			<li>#pubDate &rarr; cn_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Deformation network - Volcanoes -->
		<h2 class="wovomlclass"><a name="monitoringsystem_deformationnetwork_volcanoes" id="monitoringsystem_deformationnetwork_volcanoes"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | <a href="#monitoringsystem_deformationnetwork">&lt;DeformationNetwork&gt;</a> | &lt;Volcanoes&gt;</h2>
		
<pre><strong>&lt;Volcanoes&gt;</strong>
	&lt;volcanoCode&gt;...&lt;/volcanoCode&gt;
<strong>&lt;/Volcanoes&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Link:
				<br/>SELECT vd_id FROM vd_inf WHERE vd_inf_cavw = 'volcanoCode'
				<br/>&rarr; #vd_id
			</li>
		</ul>
		
		<h3>2. Change (if parent is updated)</h3>
		<h4>a) Delete</h4>
		<p>
			DELETE FROM jj_volnet WHERE jj_net_id = '@parent1' AND jj_net_flag = "C"
		</p>
		<h4>b) UPDATE cn WHERE cn_id = '@parent1'</h4>
		<ul>
			<li>"0" &rarr; vd_id</li>
		</ul>
		
		<h3>3. Upload/Update</h3>
		<h4>a) If one element listed:</h4>
		<ul class="line_height_150">
			<li>
				Select:
				<br/>SELECT vd_id FROM vd_inf WHERE vd_inf_cavw = 'volcanoCode'
				<br/>&rarr; #vd_id
			</li>
			<li>
				UPDATE cn WHERE cn_id = '@parent1':
				<ul>
					<li>#vd_id &rarr; vd_id</li>
				</ul>
			</li>
		</ul>
		<h4>b) If many elements listed, for each element:</h4>
		<ul class="line_height_150">
			<li>
				Select:
				<br/>SELECT vd_id FROM vd_inf WHERE vd_inf_cavw = 'volcanoCode'
				<br/>&rarr; #vd_id
			</li>
			<li>
				INSERT INTO jj_volnet:
				<ul>
					<li>"C" &rarr; jj_net_flag</li>
					<li>@parent1 &rarr; jj_net_id</li>
					<li>#vd_id &rarr; vd_id</li>
					<li>!cc_id_load &rarr; cc_id_load</li>
					<li>!loaddate &rarr; jj_volnet_loaddate</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Deformation network - Deformation station -->
		<h2 class="wovomlclass"><a name="monitoringsystem_deformationnetwork_deformationstation" id="monitoringsystem_deformationnetwork_deformationstation"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | <a href="#monitoringsystem_deformationnetwork">&lt;DeformationNetwork&gt;</a> | &lt;DeformationStation&gt;</h2>
		
<pre><strong>&lt;DeformationStation code=&quot;...&quot;&gt;</strong>
	&lt;name&gt;...&lt;/name&gt;
	&lt;permInst&gt;...&lt;/permInst&gt;
	&lt;lat&gt;...&lt;/lat&gt;
	&lt;lon&gt;...&lt;/lon&gt;
	&lt;elev&gt;...&lt;/elev&gt;
	&lt;horizPrecision&gt;...&lt;/horizPrecision&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;diffUTC&gt;...&lt;/diffUTC&gt;
	&lt;refStation&gt;...&lt;/refStation&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
	<a href="#monitoringsystem_deformationnetwork_deformationstation_deformationinstrument">&lt;DeformationInstrument&gt;...&lt;/DeformationInstrument&gt;</a>
	<a href="#monitoringsystem_deformationnetwork_deformationstation_tiltstraininstrument">&lt;TiltStrainInstrument&gt;...&lt;/TiltStrainInstrument&gt;</a>
<strong>&lt;/DeformationStation&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Time inclusion:
				<br/>@current.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc'] &sub; @parent1.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc']
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT ds_id FROM ds WHERE ds_code = '/code' AND cc_id = '#cc_id' AND ds_stime = 'startTime'
			<br/>&rarr; #ds_id
		</p>
		<h4>a) INSERT INTO ds</h4>
		<ul>
			<li>/code &rarr; ds_code</li>
			<li>name &rarr; ds_name</li>
			<li>permInst &rarr; ds_perm</li>
			<li>lat &rarr; ds_nlat</li>
			<li>lon &rarr; ds_nlon</li>
			<li>elev &rarr; ds_nelev</li>
			<li>horizPrecision &rarr; ds_herr_loc</li>
			<li>startTime &rarr; ds_stime</li>
			<li>startTimeUnc &rarr; ds_stime_unc</li>
			<li>endTime &rarr; ds_etime</li>
			<li>endTimeUnc &rarr; ds_etime_unc</li>
			<li>diffUTC &rarr; ds_utc</li>
			<li>refStation &rarr; ds_rflag</li>
			<li>description &rarr; ds_desc</li>
			<li>@parent1 &rarr; cn_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; ds_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; ds_loaddate</li>
		</ul>
		<h4>b) UPDATE ds WHERE ds_id = '#ds_id'</h4>
		<ul>
			<li>name &rarr; ds_name</li>
			<li>permInst &rarr; ds_perm</li>
			<li>lat &rarr; ds_nlat</li>
			<li>lon &rarr; ds_nlon</li>
			<li>elev &rarr; ds_nelev</li>
			<li>horizPrecision &rarr; ds_herr_loc</li>
			<li>startTimeUnc &rarr; ds_stime_unc</li>
			<li>endTime &rarr; ds_etime</li>
			<li>endTimeUnc &rarr; ds_etime_unc</li>
			<li>diffUTC &rarr; ds_utc</li>
			<li>refStation &rarr; ds_rflag</li>
			<li>description &rarr; ds_desc</li>
			<li>@parent1 &rarr; cn_id</li>
			<li>#pubDate &rarr; ds_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Deformation network - Deformation station - Deformation instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystem_deformationnetwork_deformationstation_deformationinstrument" id="monitoringsystem_deformationnetwork_deformationstation_deformationinstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | <a href="#monitoringsystem_deformationnetwork">&lt;DeformationNetwork&gt;</a> | <a href="#monitoringsystem_deformationnetwork_deformationstation">&lt;DeformationStation&gt;</a> | &lt;DeformationInstrument&gt;</h2>
		
<pre><strong>&lt;DeformationInstrument code=&quot;...&quot;&gt;</strong>
	&lt;name&gt;...&lt;/name&gt;
	&lt;type&gt;...&lt;/type&gt;
	&lt;units&gt;...&lt;/units&gt;
	&lt;resolution&gt;...&lt;/resolution&gt;
	&lt;signalToNoise&gt;...&lt;/signalToNoise&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/DeformationInstrument&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Time inclusion:
				<br/>@current.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc'] &sub; @parent1.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc']
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT di_gen_id FROM di_gen WHERE di_gen_code = '/code' AND cc_id = '#cc_id' AND di_gen_stime = 'startTime'
			<br/>&rarr; #di_gen_id
		</p>
		<h4>a) INSERT INTO di_gen</h4>
		<ul>
			<li>/code &rarr; di_gen_code</li>
			<li>name &rarr; di_gen_name</li>
			<li>type &rarr; di_gen_type</li>
			<li>units &rarr; di_gen_units</li>
			<li>resolution &rarr; di_gen_res</li>
			<li>signalToNoise &rarr; di_gen_stn</li>
			<li>startTime &rarr; di_gen_stime</li>
			<li>startTimeUnc &rarr; di_gen_stime_unc</li>
			<li>endTime &rarr; di_gen_etime</li>
			<li>endTimeUnc &rarr; di_gen_etime_unc</li>
			<li>comments &rarr; di_gen_com</li>
			<li>@parent1 &rarr; ds_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; di_gen_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; di_gen_loaddate</li>
		</ul>
		<h4>b) UPDATE di_gen WHERE di_gen_id = '#di_gen_id'</h4>
		<ul>
			<li>name &rarr; di_gen_name</li>
			<li>type &rarr; di_gen_type</li>
			<li>units &rarr; di_gen_units</li>
			<li>resolution &rarr; di_gen_res</li>
			<li>signalToNoise &rarr; di_gen_stn</li>
			<li>startTimeUnc &rarr; di_gen_stime_unc</li>
			<li>endTime &rarr; di_gen_etime</li>
			<li>endTimeUnc &rarr; di_gen_etime_unc</li>
			<li>comments &rarr; di_gen_com</li>
			<li>@parent1 &rarr; ds_id</li>
			<li>#pubDate &rarr; di_gen_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Deformation network - Deformation station - Tilt/Strain instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystem_deformationnetwork_deformationstation_tiltstraininstrument" id="monitoringsystem_deformationnetwork_deformationstation_tiltstraininstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | <a href="#monitoringsystem_deformationnetwork">&lt;DeformationNetwork&gt;</a> | <a href="#monitoringsystem_deformationnetwork_deformationstation">&lt;DeformationStation&gt;</a> | &lt;TiltStrainInstrument&gt;</h2>
		
<pre><strong>&lt;TiltStrainInstrument code=&quot;...&quot;&gt;</strong>
	&lt;name&gt;...&lt;/name&gt;
	&lt;type&gt;...&lt;/type&gt;
	&lt;depth&gt;...&lt;/depth&gt;
	&lt;units&gt;...&lt;/units&gt;
	&lt;resolution&gt;...&lt;/resolution&gt;
	&lt;direction1&gt;...&lt;/direction1&gt;
	&lt;direction2&gt;...&lt;/direction2&gt;
	&lt;direction3&gt;...&lt;/direction3&gt;
	&lt;direction4&gt;...&lt;/direction4&gt;
	&lt;electroConv1&gt;...&lt;/electroConv1&gt;
	&lt;electroConv2&gt;...&lt;/electroConv2&gt;
	&lt;electroConv3&gt;...&lt;/electroConv3&gt;
	&lt;electroConv4&gt;...&lt;/electroConv4&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/TiltStrainInstrument&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Time inclusion:
				<br/>@current.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc'] &sub; @parent1.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc']
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT di_tlt_id FROM di_tlt WHERE di_tlt_code = '/code' AND cc_id = '#cc_id' AND di_tlt_stime = 'startTime'
			<br/>&rarr; #di_tlt_id
		</p>
		<h4>a) INSERT INTO di_tlt</h4>
		<ul>
			<li>/code &rarr; di_tlt_code</li>
			<li>name &rarr; di_tlt_name</li>
			<li>type &rarr; di_tlt_type</li>
			<li>depth &rarr; di_tlt_depth</li>
			<li>units &rarr; di_tlt_units</li>
			<li>resolution &rarr; di_tlt_res</li>
			<li>direction1 &rarr; di_tlt_dir1</li>
			<li>direction2 &rarr; di_tlt_dir2</li>
			<li>direction3 &rarr; di_tlt_dir3</li>
			<li>direction4 &rarr; di_tlt_dir4</li>
			<li>electroConv1 &rarr; di_tlt_econv1</li>
			<li>electroConv2 &rarr; di_tlt_econv2</li>
			<li>electroConv3 &rarr; di_tlt_econv3</li>
			<li>electroConv4 &rarr; di_tlt_econv4</li>
			<li>startTime &rarr; di_tlt_stime</li>
			<li>startTimeUnc &rarr; di_tlt_stime_unc</li>
			<li>endTime &rarr; di_tlt_etime</li>
			<li>endTimeUnc &rarr; di_tlt_etime_unc</li>
			<li>comments &rarr; di_tlt_com</li>
			<li>@parent1 &rarr; ds_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; di_tlt_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; di_tlt_loaddate</li>
		</ul>
		<h4>b) UPDATE di_tlt WHERE di_tlt_id = '#di_tlt_id'</h4>
		<ul>
			<li>name &rarr; di_tlt_name</li>
			<li>type &rarr; di_tlt_type</li>
			<li>depth &rarr; di_tlt_depth</li>
			<li>units &rarr; di_tlt_units</li>
			<li>resolution &rarr; di_tlt_res</li>
			<li>direction1 &rarr; di_tlt_dir1</li>
			<li>direction2 &rarr; di_tlt_dir2</li>
			<li>direction3 &rarr; di_tlt_dir3</li>
			<li>direction4 &rarr; di_tlt_dir4</li>
			<li>electroConv1 &rarr; di_tlt_econv1</li>
			<li>electroConv2 &rarr; di_tlt_econv2</li>
			<li>electroConv3 &rarr; di_tlt_econv3</li>
			<li>electroConv4 &rarr; di_tlt_econv4</li>
			<li>startTimeUnc &rarr; di_tlt_stime_unc</li>
			<li>endTime &rarr; di_tlt_etime</li>
			<li>endTimeUnc &rarr; di_tlt_etime_unc</li>
			<li>comments &rarr; di_tlt_com</li>
			<li>@parent1 &rarr; ds_id</li>
			<li>#pubDate &rarr; di_tlt_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Deformation station -->
		<h2 class="wovomlclass"><a name="monitoringsystem_deformationstation" id="monitoringsystem_deformationstation"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | &lt;DeformationStation&gt;</h2>
		
<pre><strong>&lt;DeformationStation code=&quot;...&quot;&gt;</strong>
	&lt;networkCode&gt;...&lt;/networkCode&gt;
	&lt;name&gt;...&lt;/name&gt;
	&lt;permInst&gt;...&lt;/permInst&gt;
	&lt;lat&gt;...&lt;/lat&gt;
	&lt;lon&gt;...&lt;/lon&gt;
	&lt;elev&gt;...&lt;/elev&gt;
	&lt;horizPrecision&gt;...&lt;/horizPrecision&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;diffUTC&gt;...&lt;/diffUTC&gt;
	&lt;refStation&gt;...&lt;/refStation&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
	<a href="#monitoringsystem_deformationstation_deformationinstrument">&lt;DeformationInstrument&gt;...&lt;/DeformationInstrument&gt;</a>
	<a href="#monitoringsystem_deformationstation_tiltstraininstrument">&lt;TiltStrainInstrument&gt;...&lt;/TiltStrainInstrument&gt;</a>
<strong>&lt;/DeformationStation&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT cn_id, cn_stime, cn_stime_unc, cn_etime, cn_etime_unc FROM cn WHERE cn_code = 'networkCode' AND cc_id = #cc_id
				<br/>@current.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc'] &sub; [cn_stime &plusmn; cn_stime_unc, cn_etime &plusmn; cn_etime_unc]
				<br/>&rarr; #cn_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT ds_id FROM ds WHERE ds_code = '/code' AND cc_id = '#cc_id' AND ds_stime = 'startTime'
			<br/>&rarr; #ds_id
		</p>
		<h4>a) INSERT INTO ds</h4>
		<ul>
			<li>/code &rarr; ds_code</li>
			<li>name &rarr; ds_name</li>
			<li>permInst &rarr; ds_perm</li>
			<li>lat &rarr; ds_nlat</li>
			<li>lon &rarr; ds_nlon</li>
			<li>elev &rarr; ds_nelev</li>
			<li>horizPrecision &rarr; ds_herr_loc</li>
			<li>startTime &rarr; ds_stime</li>
			<li>startTimeUnc &rarr; ds_stime_unc</li>
			<li>endTime &rarr; ds_etime</li>
			<li>endTimeUnc &rarr; ds_etime_unc</li>
			<li>diffUTC &rarr; ds_utc</li>
			<li>refStation &rarr; ds_rflag</li>
			<li>description &rarr; ds_desc</li>
			<li>#cn_id &rarr; cn_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; ds_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; ds_loaddate</li>
		</ul>
		<h4>b) UPDATE ds WHERE ds_id = '#ds_id'</h4>
		<ul>
			<li>name &rarr; ds_name</li>
			<li>permInst &rarr; ds_perm</li>
			<li>lat &rarr; ds_nlat</li>
			<li>lon &rarr; ds_nlon</li>
			<li>elev &rarr; ds_nelev</li>
			<li>horizPrecision &rarr; ds_herr_loc</li>
			<li>startTimeUnc &rarr; ds_stime_unc</li>
			<li>endTime &rarr; ds_etime</li>
			<li>endTimeUnc &rarr; ds_etime_unc</li>
			<li>diffUTC &rarr; ds_utc</li>
			<li>refStation &rarr; ds_rflag</li>
			<li>description &rarr; ds_desc</li>
			<li>#cn_id &rarr; cn_id</li>
			<li>#pubDate &rarr; ds_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Deformation station - Deformation instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystem_deformationstation_deformationinstrument" id="monitoringsystem_deformationstation_deformationinstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | <a href="#monitoringsystem_deformationstation">&lt;DeformationStation&gt;</a> | &lt;DeformationInstrument&gt;</h2>
		
<pre><strong>&lt;DeformationInstrument code=&quot;...&quot;&gt;</strong>
	&lt;name&gt;...&lt;/name&gt;
	&lt;type&gt;...&lt;/type&gt;
	&lt;units&gt;...&lt;/units&gt;
	&lt;resolution&gt;...&lt;/resolution&gt;
	&lt;signalToNoise&gt;...&lt;/signalToNoise&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/DeformationInstrument&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Time inclusion:
				<br/>@current.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc'] &sub; @parent1.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc']
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT di_gen_id FROM di_gen WHERE di_gen_code = '/code' AND cc_id = '#cc_id' AND di_gen_stime = 'startTime'
			<br/>&rarr; #di_gen_id
		</p>
		<h4>a) INSERT INTO di_gen</h4>
		<ul>
			<li>/code &rarr; di_gen_code</li>
			<li>name &rarr; di_gen_name</li>
			<li>type &rarr; di_gen_type</li>
			<li>units &rarr; di_gen_units</li>
			<li>resolution &rarr; di_gen_res</li>
			<li>signalToNoise &rarr; di_gen_stn</li>
			<li>startTime &rarr; di_gen_stime</li>
			<li>startTimeUnc &rarr; di_gen_stime_unc</li>
			<li>endTime &rarr; di_gen_etime</li>
			<li>endTimeUnc &rarr; di_gen_etime_unc</li>
			<li>comments &rarr; di_gen_com</li>
			<li>@parent1 &rarr; ds_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; di_gen_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; di_gen_loaddate</li>
		</ul>
		<h4>b) UPDATE di_gen WHERE di_gen_id = '#di_gen_id'</h4>
		<ul>
			<li>name &rarr; di_gen_name</li>
			<li>type &rarr; di_gen_type</li>
			<li>units &rarr; di_gen_units</li>
			<li>resolution &rarr; di_gen_res</li>
			<li>signalToNoise &rarr; di_gen_stn</li>
			<li>startTimeUnc &rarr; di_gen_stime_unc</li>
			<li>endTime &rarr; di_gen_etime</li>
			<li>endTimeUnc &rarr; di_gen_etime_unc</li>
			<li>comments &rarr; di_gen_com</li>
			<li>@parent1 &rarr; ds_id</li>
			<li>#pubDate &rarr; di_gen_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Deformation station - Tilt/Strain instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystem_deformationstation_tiltstraininstrument" id="monitoringsystem_deformationstation_tiltstraininstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | <a href="#monitoringsystem_deformationstation">&lt;DeformationStation&gt;</a> | &lt;TiltStrainInstrument&gt;</h2>
		
<pre><strong>&lt;TiltStrainInstrument code=&quot;...&quot;&gt;</strong>
	&lt;name&gt;...&lt;/name&gt;
	&lt;type&gt;...&lt;/type&gt;
	&lt;depth&gt;...&lt;/depth&gt;
	&lt;units&gt;...&lt;/units&gt;
	&lt;resolution&gt;...&lt;/resolution&gt;
	&lt;direction1&gt;...&lt;/direction1&gt;
	&lt;direction2&gt;...&lt;/direction2&gt;
	&lt;direction3&gt;...&lt;/direction3&gt;
	&lt;direction4&gt;...&lt;/direction4&gt;
	&lt;electroConv1&gt;...&lt;/electroConv1&gt;
	&lt;electroConv2&gt;...&lt;/electroConv2&gt;
	&lt;electroConv3&gt;...&lt;/electroConv3&gt;
	&lt;electroConv4&gt;...&lt;/electroConv4&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/TiltStrainInstrument&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Time inclusion:
				<br/>@current.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc'] &sub; @parent1.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc']
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT di_tlt_id FROM di_tlt WHERE di_tlt_code = '/code' AND cc_id = '#cc_id' AND di_tlt_stime = 'startTime'
			<br/>&rarr; #di_tlt_id
		</p>
		<h4>a) INSERT INTO di_tlt</h4>
		<ul>
			<li>/code &rarr; di_tlt_code</li>
			<li>name &rarr; di_tlt_name</li>
			<li>type &rarr; di_tlt_type</li>
			<li>depth &rarr; di_tlt_depth</li>
			<li>units &rarr; di_tlt_units</li>
			<li>resolution &rarr; di_tlt_res</li>
			<li>direction1 &rarr; di_tlt_dir1</li>
			<li>direction2 &rarr; di_tlt_dir2</li>
			<li>direction3 &rarr; di_tlt_dir3</li>
			<li>direction4 &rarr; di_tlt_dir4</li>
			<li>electroConv1 &rarr; di_tlt_econv1</li>
			<li>electroConv2 &rarr; di_tlt_econv2</li>
			<li>electroConv3 &rarr; di_tlt_econv3</li>
			<li>electroConv4 &rarr; di_tlt_econv4</li>
			<li>startTime &rarr; di_tlt_stime</li>
			<li>startTimeUnc &rarr; di_tlt_stime_unc</li>
			<li>endTime &rarr; di_tlt_etime</li>
			<li>endTimeUnc &rarr; di_tlt_etime_unc</li>
			<li>comments &rarr; di_tlt_com</li>
			<li>@parent1 &rarr; ds_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; di_tlt_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; di_tlt_loaddate</li>
		</ul>
		<h4>b) UPDATE di_tlt WHERE di_tlt_id = '#di_tlt_id'</h4>
		<ul>
			<li>name &rarr; di_tlt_name</li>
			<li>type &rarr; di_tlt_type</li>
			<li>depth &rarr; di_tlt_depth</li>
			<li>units &rarr; di_tlt_units</li>
			<li>resolution &rarr; di_tlt_res</li>
			<li>direction1 &rarr; di_tlt_dir1</li>
			<li>direction2 &rarr; di_tlt_dir2</li>
			<li>direction3 &rarr; di_tlt_dir3</li>
			<li>direction4 &rarr; di_tlt_dir4</li>
			<li>electroConv1 &rarr; di_tlt_econv1</li>
			<li>electroConv2 &rarr; di_tlt_econv2</li>
			<li>electroConv3 &rarr; di_tlt_econv3</li>
			<li>electroConv4 &rarr; di_tlt_econv4</li>
			<li>startTimeUnc &rarr; di_tlt_stime_unc</li>
			<li>endTime &rarr; di_tlt_etime</li>
			<li>endTimeUnc &rarr; di_tlt_etime_unc</li>
			<li>comments &rarr; di_tlt_com</li>
			<li>@parent1 &rarr; ds_id</li>
			<li>#pubDate &rarr; di_tlt_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Deformation instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystem_deformationinstrument" id="monitoringsystem_deformationinstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | &lt;DeformationInstrument&gt;</h2>
		
<pre><strong>&lt;DeformationInstrument code=&quot;...&quot;&gt;</strong>
	&lt;stationCode&gt;...&lt;/stationCode&gt;
	&lt;name&gt;...&lt;/name&gt;
	&lt;type&gt;...&lt;/type&gt;
	&lt;units&gt;...&lt;/units&gt;
	&lt;resolution&gt;...&lt;/resolution&gt;
	&lt;signalToNoise&gt;...&lt;/signalToNoise&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/DeformationInstrument&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT ds_id, ds_stime, ds_stime_unc, ds_etime, ds_etime_unc FROM ds WHERE ds_code = 'stationCode' AND cc_id = #cc_id
				<br/>@current.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc'] &sub; [ds_stime &plusmn; ds_stime_unc, ds_etime &plusmn; ds_etime_unc]
				<br/>&rarr; #ds_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT di_gen_id FROM di_gen WHERE di_gen_code = '/code' AND cc_id = '#cc_id' AND di_gen_stime = 'startTime'
			<br/>&rarr; #di_gen_id
		</p>
		<h4>a) INSERT INTO di_gen</h4>
		<ul>
			<li>/code &rarr; di_gen_code</li>
			<li>name &rarr; di_gen_name</li>
			<li>type &rarr; di_gen_type</li>
			<li>units &rarr; di_gen_units</li>
			<li>resolution &rarr; di_gen_res</li>
			<li>signalToNoise &rarr; di_gen_stn</li>
			<li>startTime &rarr; di_gen_stime</li>
			<li>startTimeUnc &rarr; di_gen_stime_unc</li>
			<li>endTime &rarr; di_gen_etime</li>
			<li>endTimeUnc &rarr; di_gen_etime_unc</li>
			<li>comments &rarr; di_gen_com</li>
			<li>#ds_id &rarr; ds_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; di_gen_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; di_gen_loaddate</li>
		</ul>
		<h4>b) UPDATE di_gen WHERE di_gen_id = '#di_gen_id'</h4>
		<ul>
			<li>name &rarr; di_gen_name</li>
			<li>type &rarr; di_gen_type</li>
			<li>units &rarr; di_gen_units</li>
			<li>resolution &rarr; di_gen_res</li>
			<li>signalToNoise &rarr; di_gen_stn</li>
			<li>startTimeUnc &rarr; di_gen_stime_unc</li>
			<li>endTime &rarr; di_gen_etime</li>
			<li>endTimeUnc &rarr; di_gen_etime_unc</li>
			<li>comments &rarr; di_gen_com</li>
			<li>#ds_id &rarr; ds_id</li>
			<li>#pubDate &rarr; di_gen_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Tilt/Strain instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystem_tiltstraininstrument" id="monitoringsystem_tiltstraininstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | &lt;TiltStrainInstrument&gt;</h2>
		
<pre><strong>&lt;TiltStrainInstrument code=&quot;...&quot;&gt;</strong>
	&lt;stationCode&gt;...&lt;/stationCode&gt;
	&lt;name&gt;...&lt;/name&gt;
	&lt;type&gt;...&lt;/type&gt;
	&lt;depth&gt;...&lt;/depth&gt;
	&lt;units&gt;...&lt;/units&gt;
	&lt;resolution&gt;...&lt;/resolution&gt;
	&lt;direction1&gt;...&lt;/direction1&gt;
	&lt;direction2&gt;...&lt;/direction2&gt;
	&lt;direction3&gt;...&lt;/direction3&gt;
	&lt;direction4&gt;...&lt;/direction4&gt;
	&lt;electroConv1&gt;...&lt;/electroConv1&gt;
	&lt;electroConv2&gt;...&lt;/electroConv2&gt;
	&lt;electroConv3&gt;...&lt;/electroConv3&gt;
	&lt;electroConv4&gt;...&lt;/electroConv4&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/TiltStrainInstrument&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT ds_id, ds_stime, ds_stime_unc, ds_etime, ds_etime_unc FROM ds WHERE ds_code = 'stationCode' AND cc_id = #cc_id
				<br/>@current.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc'] &sub; [ds_stime &plusmn; ds_stime_unc, ds_etime &plusmn; ds_etime_unc]
				<br/>&rarr; #ds_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT di_tlt_id FROM di_tlt WHERE di_tlt_code = '/code' AND cc_id = '#cc_id' AND di_tlt_stime = 'startTime'
			<br/>&rarr; #di_tlt_id
		</p>
		<h4>a) INSERT INTO di_tlt</h4>
		<ul>
			<li>/code &rarr; di_tlt_code</li>
			<li>name &rarr; di_tlt_name</li>
			<li>type &rarr; di_tlt_type</li>
			<li>depth &rarr; di_tlt_depth</li>
			<li>units &rarr; di_tlt_units</li>
			<li>resolution &rarr; di_tlt_res</li>
			<li>direction1 &rarr; di_tlt_dir1</li>
			<li>direction2 &rarr; di_tlt_dir2</li>
			<li>direction3 &rarr; di_tlt_dir3</li>
			<li>direction4 &rarr; di_tlt_dir4</li>
			<li>electroConv1 &rarr; di_tlt_econv1</li>
			<li>electroConv2 &rarr; di_tlt_econv2</li>
			<li>electroConv3 &rarr; di_tlt_econv3</li>
			<li>electroConv4 &rarr; di_tlt_econv4</li>
			<li>startTime &rarr; di_tlt_stime</li>
			<li>startTimeUnc &rarr; di_tlt_stime_unc</li>
			<li>endTime &rarr; di_tlt_etime</li>
			<li>endTimeUnc &rarr; di_tlt_etime_unc</li>
			<li>comments &rarr; di_tlt_com</li>
			<li>#ds_id &rarr; ds_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; di_tlt_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; di_tlt_loaddate</li>
		</ul>
		<h4>b) UPDATE di_tlt WHERE di_tlt_id = '#di_tlt_id'</h4>
		<ul>
			<li>name &rarr; di_tlt_name</li>
			<li>type &rarr; di_tlt_type</li>
			<li>depth &rarr; di_tlt_depth</li>
			<li>units &rarr; di_tlt_units</li>
			<li>resolution &rarr; di_tlt_res</li>
			<li>direction1 &rarr; di_tlt_dir1</li>
			<li>direction2 &rarr; di_tlt_dir2</li>
			<li>direction3 &rarr; di_tlt_dir3</li>
			<li>direction4 &rarr; di_tlt_dir4</li>
			<li>electroConv1 &rarr; di_tlt_econv1</li>
			<li>electroConv2 &rarr; di_tlt_econv2</li>
			<li>electroConv3 &rarr; di_tlt_econv3</li>
			<li>electroConv4 &rarr; di_tlt_econv4</li>
			<li>startTimeUnc &rarr; di_tlt_stime_unc</li>
			<li>endTime &rarr; di_tlt_etime</li>
			<li>endTimeUnc &rarr; di_tlt_etime_unc</li>
			<li>comments &rarr; di_tlt_com</li>
			<li>#ds_id &rarr; ds_id</li>
			<li>#pubDate &rarr; di_tlt_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Gas network -->
		<h2 class="wovomlclass"><a name="monitoringsystem_gasnetwork" id="monitoringsystem_gasnetwork"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | &lt;GasNetwork&gt;</h2>
		
<pre><strong>&lt;GasNetwork code=&quot;...&quot;&gt;</strong>
	<a href="#monitoringsystem_gasnetwork_volcanoes">&lt;Volcanoes&gt;...&lt;/Volcanoes&gt;</a>
	&lt;name&gt;...&lt;/name&gt;
	&lt;area&gt;...&lt;/area&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;diffUTC&gt;...&lt;/diffUTC&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
	<a href="#monitoringsystem_gasnetwork_gasstation">&lt;GasStation&gt;...&lt;/GasStation&gt;</a>
<strong>&lt;/GasNetwork&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT cn_id FROM cn WHERE cn_code = '/code' AND cc_id = '#cc_id' AND cn_stime = 'startTime'
			<br/>&rarr; #cn_id
		</p>
		<h4>a) INSERT INTO cn</h4>
		<ul>
			<li>/code &rarr; cn_code</li>
			<li>"Gas" &rarr; cn_type</li>
			<li>name &rarr; cn_name</li>
			<li>area &rarr; cn_area</li>
			<li>description &rarr; cn_desc</li>
			<li>startTime &rarr; cn_stime</li>
			<li>startTimeUnc &rarr; cn_stime_unc</li>
			<li>endTime &rarr; cn_etime</li>
			<li>endTimeUnc &rarr; cn_etime_unc</li>
			<li>diffUTC &rarr; cn_utc</li>
			<li>comments &rarr; cn_com</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; cn_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; cn_loaddate</li>
		</ul>
		<h4>b) UPDATE cn WHERE cn_id = '#cn_id'</h4>
		<ul>
			<li>name &rarr; cn_name</li>
			<li>area &rarr; cn_area</li>
			<li>description &rarr; cn_desc</li>
			<li>startTimeUnc &rarr; cn_stime_unc</li>
			<li>endTime &rarr; cn_etime</li>
			<li>endTimeUnc &rarr; cn_etime_unc</li>
			<li>diffUTC &rarr; cn_utc</li>
			<li>comments &rarr; cn_com</li>
			<li>#pubDate &rarr; cn_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Gas network - Volcanoes -->
		<h2 class="wovomlclass"><a name="monitoringsystem_gasnetwork_volcanoes" id="monitoringsystem_gasnetwork_volcanoes"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | <a href="#monitoringsystem_gasnetwork">&lt;GasNetwork&gt;</a> | &lt;Volcanoes&gt;</h2>
		
<pre><strong>&lt;Volcanoes&gt;</strong>
	&lt;volcanoCode&gt;...&lt;/volcanoCode&gt;
<strong>&lt;/Volcanoes&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Link:
				<br/>SELECT vd_id FROM vd_inf WHERE vd_inf_cavw = 'volcanoCode'
				<br/>&rarr; #vd_id
			</li>
		</ul>
		
		<h3>2. Change (if parent is updated)</h3>
		<h4>a) Delete</h4>
		<p>
			DELETE FROM jj_volnet WHERE jj_net_id = '@parent1' AND jj_net_flag = "C"
		</p>
		<h4>b) UPDATE cn WHERE cn_id = '@parent1'</h4>
		<ul>
			<li>"0" &rarr; vd_id</li>
		</ul>
		
		<h3>3. Upload/Update</h3>
		<h4>a) If one element listed:</h4>
		<ul class="line_height_150">
			<li>
				Select:
				<br/>SELECT vd_id FROM vd_inf WHERE vd_inf_cavw = 'volcanoCode'
				<br/>&rarr; #vd_id
			</li>
			<li>
				UPDATE cn WHERE cn_id = '@parent1':
				<ul>
					<li>#vd_id &rarr; vd_id</li>
				</ul>
			</li>
		</ul>
		<h4>b) If many elements listed, for each element:</h4>
		<ul class="line_height_150">
			<li>
				Select:
				<br/>SELECT vd_id FROM vd_inf WHERE vd_inf_cavw = 'volcanoCode'
				<br/>&rarr; #vd_id
			</li>
			<li>
				INSERT INTO jj_volnet:
				<ul>
					<li>"C" &rarr; jj_net_flag</li>
					<li>@parent1 &rarr; jj_net_id</li>
					<li>#vd_id &rarr; vd_id</li>
					<li>!cc_id_load &rarr; cc_id_load</li>
					<li>!loaddate &rarr; jj_volnet_loaddate</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Gas network - Gas station -->
		<h2 class="wovomlclass"><a name="monitoringsystem_gasnetwork_gasstation" id="monitoringsystem_gasnetwork_gasstation"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | <a href="#monitoringsystem_gasnetwork">&lt;GasNetwork&gt;</a> | &lt;GasStation&gt;</h2>
		
<pre><strong>&lt;GasStation code=&quot;...&quot;&gt;</strong>
	&lt;name&gt;...&lt;/name&gt;
	&lt;type&gt;...&lt;/type&gt;
	&lt;permInst&gt;...&lt;/permInst&gt;
	&lt;lat&gt;...&lt;/lat&gt;
	&lt;lon&gt;...&lt;/lon&gt;
	&lt;elev&gt;...&lt;/elev&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;diffUTC&gt;...&lt;/diffUTC&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
	<a href="#monitoringsystem_gasnetwork_gasstation_gasinstrument">&lt;GasInstrument&gt;...&lt;/GasInstrument&gt;</a>
<strong>&lt;/GasStation&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Time inclusion:
				<br/>@current.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc'] &sub; @parent1.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc']
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT gs_id FROM gs WHERE gs_code = '/code' AND cc_id = '#cc_id' AND gs_stime = 'startTime'
			<br/>&rarr; #gs_id
		</p>
		<h4>a) INSERT INTO gs</h4>
		<ul>
			<li>/code &rarr; gs_code</li>
			<li>name &rarr; gs_name</li>
			<li>type &rarr; gs_type</li>
			<li>permInst &rarr; gs_inst</li>
			<li>lat &rarr; gs_lat</li>
			<li>lon &rarr; gs_lon</li>
			<li>elev &rarr; gs_elev</li>
			<li>startTime &rarr; gs_stime</li>
			<li>startTimeUnc &rarr; gs_stime_unc</li>
			<li>endTime &rarr; gs_etime</li>
			<li>endTimeUnc &rarr; gs_etime_unc</li>
			<li>diffUTC &rarr; gs_utc</li>
			<li>description &rarr; gs_desc</li>
			<li>@parent1 &rarr; cn_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; gs_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; gs_loaddate</li>
		</ul>
		<h4>b) UPDATE gs WHERE gs_id = '#gs_id'</h4>
		<ul>
			<li>name &rarr; gs_name</li>
			<li>type &rarr; gs_type</li>
			<li>permInst &rarr; gs_inst</li>
			<li>lat &rarr; gs_lat</li>
			<li>lon &rarr; gs_lon</li>
			<li>elev &rarr; gs_elev</li>
			<li>startTimeUnc &rarr; gs_stime_unc</li>
			<li>endTime &rarr; gs_etime</li>
			<li>endTimeUnc &rarr; gs_etime_unc</li>
			<li>diffUTC &rarr; gs_utc</li>
			<li>description &rarr; gs_desc</li>
			<li>@parent1 &rarr; cn_id</li>
			<li>#pubDate &rarr; gs_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Gas network - Gas station - Gas instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystem_gasnetwork_gasstation_gasinstrument" id="monitoringsystem_gasnetwork_gasstation_gasinstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | <a href="#monitoringsystem_gasnetwork">&lt;GasNetwork&gt;</a> | <a href="#monitoringsystem_gasnetwork_gasstation">&lt;GasStation&gt;</a> | &lt;GasInstrument&gt;</h2>
		
<pre><strong>&lt;GasInstrument code=&quot;...&quot;&gt;</strong>
	&lt;name&gt;...&lt;/name&gt;
	&lt;type&gt;...&lt;/type&gt;
	&lt;units&gt;...&lt;/units&gt;
	&lt;resolution&gt;...&lt;/resolution&gt;
	&lt;signalToNoise&gt;...&lt;/signalToNoise&gt;
	&lt;calibration&gt;...&lt;/calibration&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/GasInstrument&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Time inclusion:
				<br/>@current.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc'] &sub; @parent1.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc']
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT gi_id FROM gi WHERE gi_code = '/code' AND cc_id = '#cc_id' AND gi_stime = 'startTime'
			<br/>&rarr; #gi_id
		</p>
		<h4>a) INSERT INTO gi</h4>
		<ul>
			<li>/code &rarr; gi_code</li>
			<li>name &rarr; gi_name</li>
			<li>type &rarr; gi_type</li>
			<li>units &rarr; gi_units</li>
			<li>resolution &rarr; gi_pres</li>
			<li>signalToNoise &rarr; gi_stn</li>
			<li>calibration &rarr; gi_calib</li>
			<li>startTime &rarr; gi_stime</li>
			<li>startTimeUnc &rarr; gi_stime_unc</li>
			<li>endTime &rarr; gi_etime</li>
			<li>endTimeUnc &rarr; gi_etime_unc</li>
			<li>comments &rarr; gi_com</li>
			<li>@parent1 &rarr; gs_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; gi_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; gi_loaddate</li>
		</ul>
		<h4>b) UPDATE gi WHERE gi_id = '#gi_id'</h4>
		<ul>
			<li>name &rarr; gi_name</li>
			<li>type &rarr; gi_type</li>
			<li>units &rarr; gi_units</li>
			<li>resolution &rarr; gi_pres</li>
			<li>signalToNoise &rarr; gi_stn</li>
			<li>calibration &rarr; gi_calib</li>
			<li>startTimeUnc &rarr; gi_stime_unc</li>
			<li>endTime &rarr; gi_etime</li>
			<li>endTimeUnc &rarr; gi_etime_unc</li>
			<li>comments &rarr; gi_com</li>
			<li>@parent1 &rarr; gs_id</li>
			<li>#pubDate &rarr; gi_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Gas station -->
		<h2 class="wovomlclass"><a name="monitoringsystem_gasstation" id="monitoringsystem_gasstation"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | &lt;GasStation&gt;</h2>
		
<pre><strong>&lt;GasStation code=&quot;...&quot;&gt;</strong>
	&lt;networkCode&gt;...&lt;/networkCode&gt;
	&lt;name&gt;...&lt;/name&gt;
	&lt;type&gt;...&lt;/type&gt;
	&lt;permInst&gt;...&lt;/permInst&gt;
	&lt;lat&gt;...&lt;/lat&gt;
	&lt;lon&gt;...&lt;/lon&gt;
	&lt;elev&gt;...&lt;/elev&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;diffUTC&gt;...&lt;/diffUTC&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
	<a href="#monitoringsystem_gasstation_gasinstrument">&lt;GasInstrument&gt;...&lt;/GasInstrument&gt;</a>
<strong>&lt;/GasStation&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT cn_id, cn_stime, cn_stime_unc, cn_etime, cn_etime_unc FROM cn WHERE cn_code = 'networkCode' AND cc_id = #cc_id
				<br/>@current.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc'] &sub; [cn_stime &plusmn; cn_stime_unc, cn_etime &plusmn; cn_etime_unc]
				<br/>&rarr; #cn_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT gs_id FROM gs WHERE gs_code = '/code' AND cc_id = '#cc_id' AND gs_stime = 'startTime'
			<br/>&rarr; #gs_id
		</p>
		<h4>a) INSERT INTO gs</h4>
		<ul>
			<li>/code &rarr; gs_code</li>
			<li>name &rarr; gs_name</li>
			<li>type &rarr; gs_type</li>
			<li>permInst &rarr; gs_inst</li>
			<li>lat &rarr; gs_lat</li>
			<li>lon &rarr; gs_lon</li>
			<li>elev &rarr; gs_elev</li>
			<li>startTime &rarr; gs_stime</li>
			<li>startTimeUnc &rarr; gs_stime_unc</li>
			<li>endTime &rarr; gs_etime</li>
			<li>endTimeUnc &rarr; gs_etime_unc</li>
			<li>diffUTC &rarr; gs_utc</li>
			<li>description &rarr; gs_desc</li>
			<li>#cn_id &rarr; cn_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; gs_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; gs_loaddate</li>
		</ul>
		<h4>b) UPDATE gs WHERE gs_id = '#gs_id'</h4>
		<ul>
			<li>name &rarr; gs_name</li>
			<li>type &rarr; gs_type</li>
			<li>permInst &rarr; gs_inst</li>
			<li>lat &rarr; gs_lat</li>
			<li>lon &rarr; gs_lon</li>
			<li>elev &rarr; gs_elev</li>
			<li>startTimeUnc &rarr; gs_stime_unc</li>
			<li>endTime &rarr; gs_etime</li>
			<li>endTimeUnc &rarr; gs_etime_unc</li>
			<li>diffUTC &rarr; gs_utc</li>
			<li>description &rarr; gs_desc</li>
			<li>#cn_id &rarr; cn_id</li>
			<li>#pubDate &rarr; gs_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Gas station - Gas instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystem_gasstation_gasinstrument" id="monitoringsystem_gasstation_gasinstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | <a href="#monitoringsystem_gasnetwork_gasstation">&lt;GasStation&gt;</a> | &lt;GasInstrument&gt;</h2>
		
<pre><strong>&lt;GasInstrument code=&quot;...&quot;&gt;</strong>
	&lt;name&gt;...&lt;/name&gt;
	&lt;type&gt;...&lt;/type&gt;
	&lt;units&gt;...&lt;/units&gt;
	&lt;resolution&gt;...&lt;/resolution&gt;
	&lt;signalToNoise&gt;...&lt;/signalToNoise&gt;
	&lt;calibration&gt;...&lt;/calibration&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/GasInstrument&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Time inclusion:
				<br/>@current.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc'] &sub; @parent1.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc']
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT gi_id FROM gi WHERE gi_code = '/code' AND cc_id = '#cc_id' AND gi_stime = 'startTime'
			<br/>&rarr; #gi_id
		</p>
		<h4>a) INSERT INTO gi</h4>
		<ul>
			<li>/code &rarr; gi_code</li>
			<li>name &rarr; gi_name</li>
			<li>type &rarr; gi_type</li>
			<li>units &rarr; gi_units</li>
			<li>resolution &rarr; gi_pres</li>
			<li>signalToNoise &rarr; gi_stn</li>
			<li>calibration &rarr; gi_calib</li>
			<li>startTime &rarr; gi_stime</li>
			<li>startTimeUnc &rarr; gi_stime_unc</li>
			<li>endTime &rarr; gi_etime</li>
			<li>endTimeUnc &rarr; gi_etime_unc</li>
			<li>comments &rarr; gi_com</li>
			<li>@parent1 &rarr; gs_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; gi_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; gi_loaddate</li>
		</ul>
		<h4>b) UPDATE gi WHERE gi_id = '#gi_id'</h4>
		<ul>
			<li>name &rarr; gi_name</li>
			<li>type &rarr; gi_type</li>
			<li>units &rarr; gi_units</li>
			<li>resolution &rarr; gi_pres</li>
			<li>signalToNoise &rarr; gi_stn</li>
			<li>calibration &rarr; gi_calib</li>
			<li>startTimeUnc &rarr; gi_stime_unc</li>
			<li>endTime &rarr; gi_etime</li>
			<li>endTimeUnc &rarr; gi_etime_unc</li>
			<li>comments &rarr; gi_com</li>
			<li>@parent1 &rarr; gs_id</li>
			<li>#pubDate &rarr; gi_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Gas instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystem_gasinstrument" id="monitoringsystem_gasinstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | &lt;GasInstrument&gt;</h2>
		
<pre><strong>&lt;GasInstrument code=&quot;...&quot;&gt;</strong>
	&lt;stationCode&gt;...&lt;/stationCode&gt;		&lt;!-- OR &lt;airplaneCode&gt;...&lt;/airplaneCode&gt; --&gt;
	&lt;name&gt;...&lt;/name&gt;
	&lt;type&gt;...&lt;/type&gt;
	&lt;units&gt;...&lt;/units&gt;
	&lt;resolution&gt;...&lt;/resolution&gt;
	&lt;signalToNoise&gt;...&lt;/signalToNoise&gt;
	&lt;calibration&gt;...&lt;/calibration&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/GasInstrument&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT gs_id, gs_stime, gs_stime_unc, gs_etime, gs_etime_unc FROM gs WHERE gs_code = 'stationCode' AND cc_id = #cc_id
				<br/>@current.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc'] &sub; [gs_stime &plusmn; gs_stime_unc, gs_etime &plusmn; gs_etime_unc]
				<br/>&rarr; #gs_id
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT cs_id, cs_stime, cs_stime_unc, cs_etime, cs_etime_unc FROM cs WHERE cs_code = 'airplaneCode' AND cc_id = #cc_id
				<br/>@current.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc'] &sub; [cs_stime &plusmn; cs_stime_unc, cs_etime &plusmn; cs_etime_unc]
				<br/>&rarr; #cs_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT gi_id FROM gi WHERE gi_code = '/code' AND cc_id = '#cc_id' AND gi_stime = 'startTime'
			<br/>&rarr; #gi_id
		</p>
		<h4>a) INSERT INTO gi</h4>
		<ul>
			<li>/code &rarr; gi_code</li>
			<li>name &rarr; gi_name</li>
			<li>type &rarr; gi_type</li>
			<li>units &rarr; gi_units</li>
			<li>resolution &rarr; gi_pres</li>
			<li>signalToNoise &rarr; gi_stn</li>
			<li>calibration &rarr; gi_calib</li>
			<li>startTime &rarr; gi_stime</li>
			<li>startTimeUnc &rarr; gi_stime_unc</li>
			<li>endTime &rarr; gi_etime</li>
			<li>endTimeUnc &rarr; gi_etime_unc</li>
			<li>comments &rarr; gi_com</li>
			<li>#gs_id &rarr; gs_id</li>
			<li>#cs_id &rarr; cs_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; gi_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; gi_loaddate</li>
		</ul>
		<h4>b) UPDATE gi WHERE gi_id = '#gi_id'</h4>
		<ul>
			<li>name &rarr; gi_name</li>
			<li>type &rarr; gi_type</li>
			<li>units &rarr; gi_units</li>
			<li>resolution &rarr; gi_pres</li>
			<li>signalToNoise &rarr; gi_stn</li>
			<li>calibration &rarr; gi_calib</li>
			<li>startTimeUnc &rarr; gi_stime_unc</li>
			<li>endTime &rarr; gi_etime</li>
			<li>endTimeUnc &rarr; gi_etime_unc</li>
			<li>comments &rarr; gi_com</li>
			<li>#gs_id &rarr; gs_id</li>
			<li>#cs_id &rarr; cs_id</li>
			<li>#pubDate &rarr; gi_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Hydrologic network -->
		<h2 class="wovomlclass"><a name="monitoringsystem_hydrologicnetwork" id="monitoringsystem_hydrologicnetwork"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | &lt;HydrologicNetwork&gt;</h2>
		
<pre><strong>&lt;HydrologicNetwork code=&quot;...&quot;&gt;</strong>
	<a href="#monitoringsystem_hydrologicnetwork_volcanoes">&lt;Volcanoes&gt;...&lt;/Volcanoes&gt;</a>
	&lt;name&gt;...&lt;/name&gt;
	&lt;area&gt;...&lt;/area&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;diffUTC&gt;...&lt;/diffUTC&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
	<a href="#monitoringsystem_hydrologicnetwork_hydrologicstation">&lt;HydrologicStation&gt;...&lt;/HydrologicStation&gt;</a>
<strong>&lt;/HydrologicNetwork&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT cn_id FROM cn WHERE cn_code = '/code' AND cc_id = '#cc_id' AND cn_stime = 'startTime'
			<br/>&rarr; #cn_id
		</p>
		<h4>a) INSERT INTO cn</h4>
		<ul>
			<li>/code &rarr; cn_code</li>
			<li>"Hydrologic" &rarr; cn_type</li>
			<li>name &rarr; cn_name</li>
			<li>area &rarr; cn_area</li>
			<li>description &rarr; cn_desc</li>
			<li>startTime &rarr; cn_stime</li>
			<li>startTimeUnc &rarr; cn_stime_unc</li>
			<li>endTime &rarr; cn_etime</li>
			<li>endTimeUnc &rarr; cn_etime_unc</li>
			<li>diffUTC &rarr; cn_utc</li>
			<li>comments &rarr; cn_com</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; cn_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; cn_loaddate</li>
		</ul>
		<h4>b) UPDATE cn WHERE cn_id = '#cn_id'</h4>
		<ul>
			<li>name &rarr; cn_name</li>
			<li>area &rarr; cn_area</li>
			<li>description &rarr; cn_desc</li>
			<li>startTimeUnc &rarr; cn_stime_unc</li>
			<li>endTime &rarr; cn_etime</li>
			<li>endTimeUnc &rarr; cn_etime_unc</li>
			<li>diffUTC &rarr; cn_utc</li>
			<li>comments &rarr; cn_com</li>
			<li>#pubDate &rarr; cn_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Hydrologic network - Volcanoes -->
		<h2 class="wovomlclass"><a name="monitoringsystem_hydrologicnetwork_volcanoes" id="monitoringsystem_hydrologicnetwork_volcanoes"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | <a href="#monitoringsystem_hydrologicnetwork">&lt;HydrologicNetwork&gt;</a> | &lt;Volcanoes&gt;</h2>
		
<pre><strong>&lt;Volcanoes&gt;</strong>
	&lt;volcanoCode&gt;...&lt;/volcanoCode&gt;
<strong>&lt;/Volcanoes&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Link:
				<br/>SELECT vd_id FROM vd_inf WHERE vd_inf_cavw = 'volcanoCode'
				<br/>&rarr; #vd_id
			</li>
		</ul>
		
		<h3>2. Change (if parent is updated)</h3>
		<h4>a) Delete</h4>
		<p>
			DELETE FROM jj_volnet WHERE jj_net_id = '@parent1' AND jj_net_flag = "C"
		</p>
		<h4>b) UPDATE cn WHERE cn_id = '@parent1'</h4>
		<ul>
			<li>"0" &rarr; vd_id</li>
		</ul>
		
		<h3>3. Upload/Update</h3>
		<h4>a) If one element listed:</h4>
		<ul class="line_height_150">
			<li>
				Select:
				<br/>SELECT vd_id FROM vd_inf WHERE vd_inf_cavw = 'volcanoCode'
				<br/>&rarr; #vd_id
			</li>
			<li>
				UPDATE cn WHERE cn_id = '@parent1':
				<ul>
					<li>#vd_id &rarr; vd_id</li>
				</ul>
			</li>
		</ul>
		<h4>b) If many elements listed, for each element:</h4>
		<ul class="line_height_150">
			<li>
				Select:
				<br/>SELECT vd_id FROM vd_inf WHERE vd_inf_cavw = 'volcanoCode'
				<br/>&rarr; #vd_id
			</li>
			<li>
				INSERT INTO jj_volnet:
				<ul>
					<li>"C" &rarr; jj_net_flag</li>
					<li>@parent1 &rarr; jj_net_id</li>
					<li>#vd_id &rarr; vd_id</li>
					<li>!cc_id_load &rarr; cc_id_load</li>
					<li>!loaddate &rarr; jj_volnet_loaddate</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Hydrologic network - Hydrologic station -->
		<h2 class="wovomlclass"><a name="monitoringsystem_hydrologicnetwork_hydrologicstation" id="monitoringsystem_hydrologicnetwork_hydrologicstation"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | <a href="#monitoringsystem_hydrologicnetwork">&lt;HydrologicNetwork&gt;</a> | &lt;HydrologicStation&gt;</h2>
		
<pre><strong>&lt;HydrologicStation code=&quot;...&quot;&gt;</strong>
	&lt;name&gt;...&lt;/name&gt;
	&lt;waterBodyType&gt;...&lt;/waterBodyType&gt;
	&lt;permInst&gt;...&lt;/permInst&gt;
	&lt;screenTop&gt;...&lt;/screenTop&gt;
	&lt;screenBottom&gt;...&lt;/screenBottom&gt;
	&lt;wellDepth&gt;...&lt;/wellDepth&gt;
	&lt;lat&gt;...&lt;/lat&gt;
	&lt;lon&gt;...&lt;/lon&gt;
	&lt;elev&gt;...&lt;/elev&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;diffUTC&gt;...&lt;/diffUTC&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
	<a href="#monitoringsystem_hydrologicnetwork_hydrologicstation_hydrologicinstrument">&lt;HydrologicInstrument&gt;...&lt;/HydrologicInstrument&gt;</a>
<strong>&lt;/HydrologicStation&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Time inclusion:
				<br/>@current.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc'] &sub; @parent1.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc']
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT hs_id FROM hs WHERE hs_code = '/code' AND cc_id = '#cc_id' AND hs_stime = 'startTime'
			<br/>&rarr; #hs_id
		</p>
		<h4>a) INSERT INTO hs</h4>
		<ul>
			<li>/code &rarr; hs_code</li>
			<li>name &rarr; hs_name</li>
			<li>waterBodyType &rarr; hs_type</li>
			<li>permInst &rarr; hs_perm</li>
			<li>screenTop &rarr; hs_tscr</li>
			<li>screenBottom &rarr; hs_bscr</li>
			<li>wellDepth &rarr; hs_tdepth</li>
			<li>lat &rarr; hs_lat</li>
			<li>lon &rarr; hs_lon</li>
			<li>elev &rarr; hs_elev</li>
			<li>startTime &rarr; hs_stime</li>
			<li>startTimeUnc &rarr; hs_stime_unc</li>
			<li>endTime &rarr; hs_etime</li>
			<li>endTimeUnc &rarr; hs_etime_unc</li>
			<li>diffUTC &rarr; hs_utc</li>
			<li>description &rarr; hs_desc</li>
			<li>@parent1 &rarr; cn_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; hs_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; hs_loaddate</li>
		</ul>
		<h4>b) UPDATE hs WHERE hs_id = '#hs_id'</h4>
		<ul>
			<li>name &rarr; hs_name</li>
			<li>waterBodyType &rarr; hs_type</li>
			<li>permInst &rarr; hs_perm</li>
			<li>screenTop &rarr; hs_tscr</li>
			<li>screenBottom &rarr; hs_bscr</li>
			<li>wellDepth &rarr; hs_tdepth</li>
			<li>lat &rarr; hs_lat</li>
			<li>lon &rarr; hs_lon</li>
			<li>elev &rarr; hs_elev</li>
			<li>startTimeUnc &rarr; hs_stime_unc</li>
			<li>endTime &rarr; hs_etime</li>
			<li>endTimeUnc &rarr; hs_etime_unc</li>
			<li>diffUTC &rarr; hs_utc</li>
			<li>description &rarr; hs_desc</li>
			<li>@parent1 &rarr; cn_id</li>
			<li>#pubDate &rarr; hs_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Hydrologic network - Hydrologic station - Hydrologic instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystem_hydrologicnetwork_hydrologicstation_hydrologicinstrument" id="monitoringsystem_hydrologicnetwork_hydrologicstation_hydrologicinstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | <a href="#monitoringsystem_hydrologicnetwork">&lt;HydrologicNetwork&gt;</a> | <a href="#monitoringsystem_hydrologicnetwork_hydrologicstation">&lt;HydrologicStation&gt;</a> | &lt;HydrologicInstrument&gt;</h2>
		
<pre><strong>&lt;HydrologicInstrument code=&quot;...&quot;&gt;</strong>
	&lt;name&gt;...&lt;/name&gt;
	&lt;pressureMeasType&gt;...&lt;/pressureMeasType&gt;
	&lt;type&gt;...&lt;/type&gt;
	&lt;units&gt;...&lt;/units&gt;
	&lt;resolution&gt;...&lt;/resolution&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/HydrologicInstrument&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Time inclusion:
				<br/>@current.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc'] &sub; @parent1.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc']
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT hi_id FROM hi WHERE hi_code = '/code' AND cc_id = '#cc_id' AND hi_stime = 'startTime'
			<br/>&rarr; #hi_id
		</p>
		<h4>a) INSERT INTO hi</h4>
		<ul>
			<li>/code &rarr; hi_code</li>
			<li>name &rarr; hi_name</li>
			<li>pressureMeasType &rarr; hi_meas</li>
			<li>type &rarr; hi_type</li>
			<li>units &rarr; hi_units</li>
			<li>resolution &rarr; hi_res</li>
			<li>startTime &rarr; hi_stime</li>
			<li>startTimeUnc &rarr; hi_stime_unc</li>
			<li>endTime &rarr; hi_etime</li>
			<li>endTimeUnc &rarr; hi_etime_unc</li>
			<li>comments &rarr; hi_desc</li>
			<li>@parent1 &rarr; hs_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; hi_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; hi_loaddate</li>
		</ul>
		<h4>b) UPDATE hi WHERE hi_id = '#hi_id'</h4>
		<ul>
			<li>name &rarr; hi_name</li>
			<li>pressureMeasType &rarr; hi_meas</li>
			<li>type &rarr; hi_type</li>
			<li>units &rarr; hi_units</li>
			<li>resolution &rarr; hi_res</li>
			<li>startTimeUnc &rarr; hi_stime_unc</li>
			<li>endTime &rarr; hi_etime</li>
			<li>endTimeUnc &rarr; hi_etime_unc</li>
			<li>comments &rarr; hi_desc</li>
			<li>@parent1 &rarr; hs_id</li>
			<li>#pubDate &rarr; hi_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Hydrologic station -->
		<h2 class="wovomlclass"><a name="monitoringsystem_hydrologicstation" id="monitoringsystem_hydrologicstation"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | &lt;HydrologicStation&gt;</h2>
		
<pre><strong>&lt;HydrologicStation code=&quot;...&quot;&gt;</strong>
	&lt;networkCode&gt;...&lt;/networkCode&gt;
	&lt;name&gt;...&lt;/name&gt;
	&lt;waterBodyType&gt;...&lt;/waterBodyType&gt;
	&lt;permInst&gt;...&lt;/permInst&gt;
	&lt;screenTop&gt;...&lt;/screenTop&gt;
	&lt;screenBottom&gt;...&lt;/screenBottom&gt;
	&lt;wellDepth&gt;...&lt;/wellDepth&gt;
	&lt;lat&gt;...&lt;/lat&gt;
	&lt;lon&gt;...&lt;/lon&gt;
	&lt;elev&gt;...&lt;/elev&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;diffUTC&gt;...&lt;/diffUTC&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
	<a href="#monitoringsystem_hydrologicstation_hydrologicinstrument">&lt;HydrologicInstrument&gt;...&lt;/HydrologicInstrument&gt;</a>
<strong>&lt;/HydrologicStation&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT cn_id, cn_stime, cn_stime_unc, cn_etime, cn_etime_unc FROM cn WHERE cn_code = 'networkCode' AND cc_id = #cc_id
				<br/>@current.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc'] &sub; [cn_stime &plusmn; cn_stime_unc, cn_etime &plusmn; cn_etime_unc]
				<br/>&rarr; #cn_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT hs_id FROM hs WHERE hs_code = '/code' AND cc_id = '#cc_id' AND hs_stime = 'startTime'
			<br/>&rarr; #hs_id
		</p>
		<h4>a) INSERT INTO hs</h4>
		<ul>
			<li>/code &rarr; hs_code</li>
			<li>name &rarr; hs_name</li>
			<li>waterBodyType &rarr; hs_type</li>
			<li>permInst &rarr; hs_perm</li>
			<li>screenTop &rarr; hs_tscr</li>
			<li>screenBottom &rarr; hs_bscr</li>
			<li>wellDepth &rarr; hs_tdepth</li>
			<li>lat &rarr; hs_lat</li>
			<li>lon &rarr; hs_lon</li>
			<li>elev &rarr; hs_elev</li>
			<li>startTime &rarr; hs_stime</li>
			<li>startTimeUnc &rarr; hs_stime_unc</li>
			<li>endTime &rarr; hs_etime</li>
			<li>endTimeUnc &rarr; hs_etime_unc</li>
			<li>diffUTC &rarr; hs_utc</li>
			<li>description &rarr; hs_desc</li>
			<li>#cn_id &rarr; cn_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; hs_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; hs_loaddate</li>
		</ul>
		<h4>b) UPDATE hs WHERE hs_id = '#hs_id'</h4>
		<ul>
			<li>name &rarr; hs_name</li>
			<li>waterBodyType &rarr; hs_type</li>
			<li>permInst &rarr; hs_perm</li>
			<li>screenTop &rarr; hs_tscr</li>
			<li>screenBottom &rarr; hs_bscr</li>
			<li>wellDepth &rarr; hs_tdepth</li>
			<li>lat &rarr; hs_lat</li>
			<li>lon &rarr; hs_lon</li>
			<li>elev &rarr; hs_elev</li>
			<li>startTimeUnc &rarr; hs_stime_unc</li>
			<li>endTime &rarr; hs_etime</li>
			<li>endTimeUnc &rarr; hs_etime_unc</li>
			<li>diffUTC &rarr; hs_utc</li>
			<li>description &rarr; hs_desc</li>
			<li>#cn_id &rarr; cn_id</li>
			<li>#pubDate &rarr; hs_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Hydrologic station - Hydrologic instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystem_hydrologicstation_hydrologicinstrument" id="monitoringsystem_hydrologicstation_hydrologicinstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | <a href="#monitoringsystem_hydrologicstation">&lt;HydrologicStation&gt;</a> | &lt;HydrologicInstrument&gt;</h2>
		
<pre><strong>&lt;HydrologicInstrument code=&quot;...&quot;&gt;</strong>
	&lt;name&gt;...&lt;/name&gt;
	&lt;pressureMeasType&gt;...&lt;/pressureMeasType&gt;
	&lt;type&gt;...&lt;/type&gt;
	&lt;units&gt;...&lt;/units&gt;
	&lt;resolution&gt;...&lt;/resolution&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/HydrologicInstrument&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Time inclusion:
				<br/>@current.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc'] &sub; @parent1.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc']
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT hi_id FROM hi WHERE hi_code = '/code' AND cc_id = '#cc_id' AND hi_stime = 'startTime'
			<br/>&rarr; #hi_id
		</p>
		<h4>a) INSERT INTO hi</h4>
		<ul>
			<li>/code &rarr; hi_code</li>
			<li>name &rarr; hi_name</li>
			<li>pressureMeasType &rarr; hi_meas</li>
			<li>type &rarr; hi_type</li>
			<li>units &rarr; hi_units</li>
			<li>resolution &rarr; hi_res</li>
			<li>startTime &rarr; hi_stime</li>
			<li>startTimeUnc &rarr; hi_stime_unc</li>
			<li>endTime &rarr; hi_etime</li>
			<li>endTimeUnc &rarr; hi_etime_unc</li>
			<li>comments &rarr; hi_desc</li>
			<li>@parent1 &rarr; hs_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; hi_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; hi_loaddate</li>
		</ul>
		<h4>b) UPDATE hi WHERE hi_id = '#hi_id'</h4>
		<ul>
			<li>name &rarr; hi_name</li>
			<li>pressureMeasType &rarr; hi_meas</li>
			<li>type &rarr; hi_type</li>
			<li>units &rarr; hi_units</li>
			<li>resolution &rarr; hi_res</li>
			<li>startTimeUnc &rarr; hi_stime_unc</li>
			<li>endTime &rarr; hi_etime</li>
			<li>endTimeUnc &rarr; hi_etime_unc</li>
			<li>comments &rarr; hi_desc</li>
			<li>@parent1 &rarr; hs_id</li>
			<li>#pubDate &rarr; hi_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Hydrologic instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystem_hydrologicinstrument" id="monitoringsystem_hydrologicinstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | &lt;HydrologicInstrument&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;HydrologicInstrument code=&quot;...&quot;&gt;</strong>
	&lt;stationCode&gt;...&lt;/stationCode&gt;
	&lt;name&gt;...&lt;/name&gt;
	&lt;pressureMeasType&gt;...&lt;/pressureMeasType&gt;
	&lt;type&gt;...&lt;/type&gt;
	&lt;units&gt;...&lt;/units&gt;
	&lt;resolution&gt;...&lt;/resolution&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/HydrologicInstrument&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT hs_id, hs_stime, hs_stime_unc, hs_etime, hs_etime_unc FROM hs WHERE hs_code = 'stationCode' AND cc_id = #cc_id
				<br/>@current.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc'] &sub; [hs_stime &plusmn; hs_stime_unc, hs_etime &plusmn; hs_etime_unc]
				<br/>&rarr; #hs_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT hi_id FROM hi WHERE hi_code = '/code' AND cc_id = '#cc_id' AND hi_stime = 'startTime'
			<br/>&rarr; #hi_id
		</p>
		<h4>a) INSERT INTO hi</h4>
		<ul>
			<li>/code &rarr; hi_code</li>
			<li>name &rarr; hi_name</li>
			<li>pressureMeasType &rarr; hi_meas</li>
			<li>type &rarr; hi_type</li>
			<li>units &rarr; hi_units</li>
			<li>resolution &rarr; hi_res</li>
			<li>startTime &rarr; hi_stime</li>
			<li>startTimeUnc &rarr; hi_stime_unc</li>
			<li>endTime &rarr; hi_etime</li>
			<li>endTimeUnc &rarr; hi_etime_unc</li>
			<li>comments &rarr; hi_desc</li>
			<li>#hs_id &rarr; hs_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; hi_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; hi_loaddate</li>
		</ul>
		<h4>b) UPDATE hi WHERE hi_id = '#hi_id'</h4>
		<ul>
			<li>name &rarr; hi_name</li>
			<li>pressureMeasType &rarr; hi_meas</li>
			<li>type &rarr; hi_type</li>
			<li>units &rarr; hi_units</li>
			<li>resolution &rarr; hi_res</li>
			<li>startTimeUnc &rarr; hi_stime_unc</li>
			<li>endTime &rarr; hi_etime</li>
			<li>endTimeUnc &rarr; hi_etime_unc</li>
			<li>comments &rarr; hi_desc</li>
			<li>#hs_id &rarr; hs_id</li>
			<li>#pubDate &rarr; hi_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Fields network -->
		<h2 class="wovomlclass"><a name="monitoringsystem_fieldsnetwork" id="monitoringsystem_fieldsnetwork"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | &lt;FieldsNetwork&gt;</h2>
		
<pre><strong>&lt;FieldsNetwork code=&quot;...&quot;&gt;</strong>
	<a href="#monitoringsystem_fieldsnetwork_volcanoes">&lt;Volcanoes&gt;...&lt;/Volcanoes&gt;</a>
	&lt;name&gt;...&lt;/name&gt;
	&lt;area&gt;...&lt;/area&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;diffUTC&gt;...&lt;/diffUTC&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
	<a href="#monitoringsystem_fieldsnetwork_fieldsstation">&lt;FieldsStation&gt;...&lt;/FieldsStation&gt;</a>
<strong>&lt;/FieldsNetwork&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT cn_id FROM cn WHERE cn_code = '/code' AND cc_id = '#cc_id' AND cn_stime = 'startTime'
			<br/>&rarr; #cn_id
		</p>
		<h4>a) INSERT INTO cn</h4>
		<ul>
			<li>/code &rarr; cn_code</li>
			<li>"Fields" &rarr; cn_type</li>
			<li>name &rarr; cn_name</li>
			<li>area &rarr; cn_area</li>
			<li>description &rarr; cn_desc</li>
			<li>startTime &rarr; cn_stime</li>
			<li>startTimeUnc &rarr; cn_stime_unc</li>
			<li>endTime &rarr; cn_etime</li>
			<li>endTimeUnc &rarr; cn_etime_unc</li>
			<li>diffUTC &rarr; cn_utc</li>
			<li>comments &rarr; cn_com</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; cn_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; cn_loaddate</li>
		</ul>
		<h4>b) UPDATE cn WHERE cn_id = '#cn_id'</h4>
		<ul>
			<li>name &rarr; cn_name</li>
			<li>area &rarr; cn_area</li>
			<li>description &rarr; cn_desc</li>
			<li>startTimeUnc &rarr; cn_stime_unc</li>
			<li>endTime &rarr; cn_etime</li>
			<li>endTimeUnc &rarr; cn_etime_unc</li>
			<li>diffUTC &rarr; cn_utc</li>
			<li>comments &rarr; cn_com</li>
			<li>#pubDate &rarr; cn_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Fields network - Volcanoes -->
		<h2 class="wovomlclass"><a name="monitoringsystem_fieldsnetwork_volcanoes" id="monitoringsystem_fieldsnetwork_volcanoes"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | <a href="#monitoringsystem_fieldsnetwork">&lt;FieldsNetwork&gt;</a> | &lt;Volcanoes&gt;</h2>
		
<pre><strong>&lt;Volcanoes&gt;</strong>
	&lt;volcanoCode&gt;...&lt;/volcanoCode&gt;
<strong>&lt;/Volcanoes&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Link:
				<br/>SELECT vd_id FROM vd_inf WHERE vd_inf_cavw = 'volcanoCode'
				<br/>&rarr; #vd_id
			</li>
		</ul>
		
		<h3>2. Change (if parent is updated)</h3>
		<h4>a) Delete</h4>
		<p>
			DELETE FROM jj_volnet WHERE jj_net_id = '@parent1' AND jj_net_flag = "C"
		</p>
		<h4>b) UPDATE cn WHERE cn_id = '@parent1'</h4>
		<ul>
			<li>"0" &rarr; vd_id</li>
		</ul>
		
		<h3>3. Upload/Update</h3>
		<h4>a) If one element listed:</h4>
		<ul class="line_height_150">
			<li>
				Select:
				<br/>SELECT vd_id FROM vd_inf WHERE vd_inf_cavw = 'volcanoCode'
				<br/>&rarr; #vd_id
			</li>
			<li>
				UPDATE cn WHERE cn_id = '@parent1':
				<ul>
					<li>#vd_id &rarr; vd_id</li>
				</ul>
			</li>
		</ul>
		<h4>b) If many elements listed, for each element:</h4>
		<ul class="line_height_150">
			<li>
				Select:
				<br/>SELECT vd_id FROM vd_inf WHERE vd_inf_cavw = 'volcanoCode'
				<br/>&rarr; #vd_id
			</li>
			<li>
				INSERT INTO jj_volnet:
				<ul>
					<li>"C" &rarr; jj_net_flag</li>
					<li>@parent1 &rarr; jj_net_id</li>
					<li>#vd_id &rarr; vd_id</li>
					<li>!cc_id_load &rarr; cc_id_load</li>
					<li>!loaddate &rarr; jj_volnet_loaddate</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Fields network - Fields station -->
		<h2 class="wovomlclass"><a name="monitoringsystem_fieldsnetwork_fieldsstation" id="monitoringsystem_fieldsnetwork_fieldsstation"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | <a href="#monitoringsystem_fieldsnetwork">&lt;FieldsNetwork&gt;</a> | &lt;FieldsStation&gt;</h2>
		
<pre><strong>&lt;FieldsStation code=&quot;...&quot;&gt;</strong>
	&lt;name&gt;...&lt;/name&gt;
	&lt;permInst&gt;...&lt;/permInst&gt;
	&lt;lat&gt;...&lt;/lat&gt;
	&lt;lon&gt;...&lt;/lon&gt;
	&lt;elev&gt;...&lt;/elev&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;diffUTC&gt;...&lt;/diffUTC&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
	<a href="#monitoringsystem_fieldsnetwork_fieldsstation_fieldsinstrument">&lt;FieldsInstrument&gt;...&lt;/FieldsInstrument&gt;</a>
<strong>&lt;/FieldsStation&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Time inclusion:
				<br/>@current.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc'] &sub; @parent1.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc']
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT fs_id FROM fs WHERE fs_code = '/code' AND cc_id = '#cc_id' AND fs_stime = 'startTime'
			<br/>&rarr; #fs_id
		</p>
		<h4>a) INSERT INTO fs</h4>
		<ul>
			<li>/code &rarr; fs_code</li>
			<li>name &rarr; fs_name</li>
			<li>permInst &rarr; fs_inst</li>
			<li>lat &rarr; fs_lat</li>
			<li>lon &rarr; fs_lon</li>
			<li>elev &rarr; fs_elev</li>
			<li>startTime &rarr; fs_stime</li>
			<li>startTimeUnc &rarr; fs_stime_unc</li>
			<li>endTime &rarr; fs_etime</li>
			<li>endTimeUnc &rarr; fs_etime_unc</li>
			<li>diffUTC &rarr; fs_utc</li>
			<li>description &rarr; fs_desc</li>
			<li>@parent1 &rarr; cn_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; fs_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; fs_loaddate</li>
		</ul>
		<h4>b) UPDATE fs WHERE fs_id = '#fs_id'</h4>
		<ul>
			<li>name &rarr; fs_name</li>
			<li>permInst &rarr; fs_inst</li>
			<li>lat &rarr; fs_lat</li>
			<li>lon &rarr; fs_lon</li>
			<li>elev &rarr; fs_elev</li>
			<li>startTimeUnc &rarr; fs_stime_unc</li>
			<li>endTime &rarr; fs_etime</li>
			<li>endTimeUnc &rarr; fs_etime_unc</li>
			<li>diffUTC &rarr; fs_utc</li>
			<li>description &rarr; fs_desc</li>
			<li>@parent1 &rarr; cn_id</li>
			<li>#pubDate &rarr; fs_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Fields network - Fields station - Fields instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystem_fieldsnetwork_fieldsstation_fieldsinstrument" id="monitoringsystem_fieldsnetwork_fieldsstation_fieldsinstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | <a href="#monitoringsystem_fieldsnetwork">&lt;FieldsNetwork&gt;</a> | <a href="#monitoringsystem_fieldsnetwork_fieldsstation">&lt;FieldsStation&gt;</a> | &lt;FieldsInstrument&gt;</h2>
		
<pre><strong>&lt;FieldsInstrument code=&quot;...&quot;&gt;</strong>
	&lt;permanent&gt;...&lt;/permanent&gt;
	&lt;name&gt;...&lt;/name&gt;
	&lt;type&gt;...&lt;/type&gt;
	&lt;units&gt;...&lt;/units&gt;
	&lt;resolution&gt;...&lt;/resolution&gt;
	&lt;sampleRate&gt;...&lt;/sampleRate&gt;
	&lt;filterType&gt;...&lt;/filterType&gt;
	&lt;orientation&gt;...&lt;/orientation&gt;
	&lt;calculation&gt;...&lt;/calculation&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/FieldsInstrument&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Time inclusion:
				<br/>@current.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc'] &sub; @parent1.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc']
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT fi_id FROM fi WHERE fi_code = '/code' AND cc_id = '#cc_id' AND fi_stime = 'startTime'
			<br/>&rarr; #fi_id
		</p>
		<h4>a) INSERT INTO fi</h4>
		<ul>
			<li>/code &rarr; fi_code</li>
			<li>name &rarr; fi_name</li>
			<li>type &rarr; fi_type</li>
			<li>units &rarr; fi_units</li>
			<li>resolution &rarr; fi_res</li>
			<li>sampleRate &rarr; fi_rate</li>
			<li>filterType &rarr; fi_filter</li>
			<li>orientation &rarr; fi_orient</li>
			<li>calculation &rarr; fi_calc</li>
			<li>startTime &rarr; fi_stime</li>
			<li>startTimeUnc &rarr; fi_stime_unc</li>
			<li>endTime &rarr; fi_etime</li>
			<li>endTimeUnc &rarr; fi_etime_unc</li>
			<li>comments &rarr; fi_com</li>
			<li>@parent1 &rarr; fs_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; fi_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; fi_loaddate</li>
		</ul>
		<h4>b) UPDATE fi WHERE fi_id = '#fi_id'</h4>
		<ul>
			<li>name &rarr; fi_name</li>
			<li>type &rarr; fi_type</li>
			<li>units &rarr; fi_units</li>
			<li>resolution &rarr; fi_res</li>
			<li>sampleRate &rarr; fi_rate</li>
			<li>filterType &rarr; fi_filter</li>
			<li>orientation &rarr; fi_orient</li>
			<li>calculation &rarr; fi_calc</li>
			<li>startTimeUnc &rarr; fi_stime_unc</li>
			<li>endTime &rarr; fi_etime</li>
			<li>endTimeUnc &rarr; fi_etime_unc</li>
			<li>comments &rarr; fi_com</li>
			<li>@parent1 &rarr; fs_id</li>
			<li>#pubDate &rarr; fi_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Fields station -->
		<h2 class="wovomlclass"><a name="monitoringsystem_fieldsstation" id="monitoringsystem_fieldsstation"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | &lt;FieldsStation&gt;</h2>
		
<pre><strong>&lt;FieldsStation code=&quot;...&quot;&gt;</strong>
	&lt;networkCode&gt;...&lt;/networkCode&gt;
	&lt;name&gt;...&lt;/name&gt;
	&lt;permInst&gt;...&lt;/permInst&gt;
	&lt;lat&gt;...&lt;/lat&gt;
	&lt;lon&gt;...&lt;/lon&gt;
	&lt;elev&gt;...&lt;/elev&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;diffUTC&gt;...&lt;/diffUTC&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
	<a href="#monitoringsystem_fieldsstation_fieldsinstrument">&lt;FieldsInstrument&gt;...&lt;/FieldsInstrument&gt;</a>
<strong>&lt;/FieldsStation&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT cn_id, cn_stime, cn_stime_unc, cn_etime, cn_etime_unc FROM cn WHERE cn_code = 'networkCode' AND cc_id = #cc_id
				<br/>@current.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc'] &sub; [cn_stime &plusmn; cn_stime_unc, cn_etime &plusmn; cn_etime_unc]
				<br/>&rarr; #cn_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT fs_id FROM fs WHERE fs_code = '/code' AND cc_id = '#cc_id' AND fs_stime = 'startTime'
			<br/>&rarr; #fs_id
		</p>
		<h4>a) INSERT INTO fs</h4>
		<ul>
			<li>/code &rarr; fs_code</li>
			<li>name &rarr; fs_name</li>
			<li>permInst &rarr; fs_inst</li>
			<li>lat &rarr; fs_lat</li>
			<li>lon &rarr; fs_lon</li>
			<li>elev &rarr; fs_elev</li>
			<li>startTime &rarr; fs_stime</li>
			<li>startTimeUnc &rarr; fs_stime_unc</li>
			<li>endTime &rarr; fs_etime</li>
			<li>endTimeUnc &rarr; fs_etime_unc</li>
			<li>diffUTC &rarr; fs_utc</li>
			<li>description &rarr; fs_desc</li>
			<li>#cn_id &rarr; cn_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; fs_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; fs_loaddate</li>
		</ul>
		<h4>b) UPDATE fs WHERE fs_id = '#fs_id'</h4>
		<ul>
			<li>name &rarr; fs_name</li>
			<li>permInst &rarr; fs_inst</li>
			<li>lat &rarr; fs_lat</li>
			<li>lon &rarr; fs_lon</li>
			<li>elev &rarr; fs_elev</li>
			<li>startTimeUnc &rarr; fs_stime_unc</li>
			<li>endTime &rarr; fs_etime</li>
			<li>endTimeUnc &rarr; fs_etime_unc</li>
			<li>diffUTC &rarr; fs_utc</li>
			<li>description &rarr; fs_desc</li>
			<li>#cn_id &rarr; cn_id</li>
			<li>#pubDate &rarr; fs_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Fields station - Fields instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystem_fieldsstation_fieldsinstrument" id="monitoringsystem_fieldsstation_fieldsinstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | <a href="#monitoringsystem_fieldsnetwork_fieldsstation">&lt;FieldsStation&gt;</a> | &lt;FieldsInstrument&gt;</h2>
		
<pre><strong>&lt;FieldsInstrument code=&quot;...&quot;&gt;</strong>
	&lt;name&gt;...&lt;/name&gt;
	&lt;type&gt;...&lt;/type&gt;
	&lt;units&gt;...&lt;/units&gt;
	&lt;resolution&gt;...&lt;/resolution&gt;
	&lt;sampleRate&gt;...&lt;/sampleRate&gt;
	&lt;filterType&gt;...&lt;/filterType&gt;
	&lt;orientation&gt;...&lt;/orientation&gt;
	&lt;calculation&gt;...&lt;/calculation&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/FieldsInstrument&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Time inclusion:
				<br/>@current.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc'] &sub; @parent1.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc']
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT fi_id FROM fi WHERE fi_code = '/code' AND cc_id = '#cc_id' AND fi_stime = 'startTime'
			<br/>&rarr; #fi_id
		</p>
		<h4>a) INSERT INTO fi</h4>
		<ul>
			<li>/code &rarr; fi_code</li>
			<li>name &rarr; fi_name</li>
			<li>type &rarr; fi_type</li>
			<li>units &rarr; fi_units</li>
			<li>resolution &rarr; fi_res</li>
			<li>sampleRate &rarr; fi_rate</li>
			<li>filterType &rarr; fi_filter</li>
			<li>orientation &rarr; fi_orient</li>
			<li>calculation &rarr; fi_calc</li>
			<li>startTime &rarr; fi_stime</li>
			<li>startTimeUnc &rarr; fi_stime_unc</li>
			<li>endTime &rarr; fi_etime</li>
			<li>endTimeUnc &rarr; fi_etime_unc</li>
			<li>comments &rarr; fi_com</li>
			<li>@parent1 &rarr; fs_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; fi_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; fi_loaddate</li>
		</ul>
		<h4>b) UPDATE fi WHERE fi_id = '#fi_id'</h4>
		<ul>
			<li>name &rarr; fi_name</li>
			<li>type &rarr; fi_type</li>
			<li>units &rarr; fi_units</li>
			<li>resolution &rarr; fi_res</li>
			<li>sampleRate &rarr; fi_rate</li>
			<li>filterType &rarr; fi_filter</li>
			<li>orientation &rarr; fi_orient</li>
			<li>calculation &rarr; fi_calc</li>
			<li>startTimeUnc &rarr; fi_stime_unc</li>
			<li>endTime &rarr; fi_etime</li>
			<li>endTimeUnc &rarr; fi_etime_unc</li>
			<li>comments &rarr; fi_com</li>
			<li>@parent1 &rarr; fs_id</li>
			<li>#pubDate &rarr; fi_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Fields instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystem_fieldsinstrument" id="monitoringsystem_fieldsinstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | &lt;FieldsInstrument&gt;</h2>
		
<pre><strong>&lt;FieldsInstrument code=&quot;...&quot;&gt;</strong>
	&lt;stationCode&gt;...&lt;/stationCode&gt;
	&lt;name&gt;...&lt;/name&gt;
	&lt;type&gt;...&lt;/type&gt;
	&lt;units&gt;...&lt;/units&gt;
	&lt;resolution&gt;...&lt;/resolution&gt;
	&lt;sampleRate&gt;...&lt;/sampleRate&gt;
	&lt;filterType&gt;...&lt;/filterType&gt;
	&lt;orientation&gt;...&lt;/orientation&gt;
	&lt;calculation&gt;...&lt;/calculation&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/FieldsInstrument&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT fs_id, fs_stime, fs_stime_unc, fs_etime, fs_etime_unc FROM fs WHERE fs_code = 'stationCode' AND cc_id = #cc_id
				<br/>@current.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc'] &sub; [fs_stime &plusmn; fs_stime_unc, fs_etime &plusmn; fs_etime_unc]
				<br/>&rarr; #fs_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT fi_id FROM fi WHERE fi_code = '/code' AND cc_id = '#cc_id' AND fi_stime = 'startTime'
			<br/>&rarr; #fi_id
		</p>
		<h4>a) INSERT INTO fi</h4>
		<ul>
			<li>/code &rarr; fi_code</li>
			<li>name &rarr; fi_name</li>
			<li>type &rarr; fi_type</li>
			<li>units &rarr; fi_units</li>
			<li>resolution &rarr; fi_res</li>
			<li>sampleRate &rarr; fi_rate</li>
			<li>filterType &rarr; fi_filter</li>
			<li>orientation &rarr; fi_orient</li>
			<li>calculation &rarr; fi_calc</li>
			<li>startTime &rarr; fi_stime</li>
			<li>startTimeUnc &rarr; fi_stime_unc</li>
			<li>endTime &rarr; fi_etime</li>
			<li>endTimeUnc &rarr; fi_etime_unc</li>
			<li>comments &rarr; fi_com</li>
			<li>#fs_id &rarr; fs_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; fi_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; fi_loaddate</li>
		</ul>
		<h4>b) UPDATE fi WHERE fi_id = '#fi_id'</h4>
		<ul>
			<li>name &rarr; fi_name</li>
			<li>type &rarr; fi_type</li>
			<li>units &rarr; fi_units</li>
			<li>resolution &rarr; fi_res</li>
			<li>sampleRate &rarr; fi_rate</li>
			<li>filterType &rarr; fi_filter</li>
			<li>orientation &rarr; fi_orient</li>
			<li>calculation &rarr; fi_calc</li>
			<li>startTimeUnc &rarr; fi_stime_unc</li>
			<li>endTime &rarr; fi_etime</li>
			<li>endTimeUnc &rarr; fi_etime_unc</li>
			<li>comments &rarr; fi_com</li>
			<li>#fs_id &rarr; fs_id</li>
			<li>#pubDate &rarr; fi_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Thermal network -->
		<h2 class="wovomlclass"><a name="monitoringsystem_thermalnetwork" id="monitoringsystem_thermalnetwork"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | &lt;ThermalNetwork&gt;</h2>
		
<pre><strong>&lt;ThermalNetwork code=&quot;...&quot;&gt;</strong>
	<a href="#monitoringsystem_thermalnetwork_volcanoes">&lt;Volcanoes&gt;...&lt;/Volcanoes&gt;</a>
	&lt;name&gt;...&lt;/name&gt;
	&lt;area&gt;...&lt;/area&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;diffUTC&gt;...&lt;/diffUTC&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
	<a href="#monitoringsystem_thermalnetwork_thermalstation">&lt;ThermalStation&gt;...&lt;/ThermalStation&gt;</a>
<strong>&lt;/ThermalNetwork&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT cn_id FROM cn WHERE cn_code = '/code' AND cc_id = '#cc_id' AND cn_stime = 'startTime'
			<br/>&rarr; #cn_id
		</p>
		<h4>a) INSERT INTO cn</h4>
		<ul>
			<li>/code &rarr; cn_code</li>
			<li>"Thermal" &rarr; cn_type</li>
			<li>name &rarr; cn_name</li>
			<li>area &rarr; cn_area</li>
			<li>description &rarr; cn_desc</li>
			<li>startTime &rarr; cn_stime</li>
			<li>startTimeUnc &rarr; cn_stime_unc</li>
			<li>endTime &rarr; cn_etime</li>
			<li>endTimeUnc &rarr; cn_etime_unc</li>
			<li>diffUTC &rarr; cn_utc</li>
			<li>comments &rarr; cn_com</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; cn_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; cn_loaddate</li>
		</ul>
		<h4>b) UPDATE cn WHERE cn_id = '#cn_id'</h4>
		<ul>
			<li>name &rarr; cn_name</li>
			<li>area &rarr; cn_area</li>
			<li>description &rarr; cn_desc</li>
			<li>startTimeUnc &rarr; cn_stime_unc</li>
			<li>endTime &rarr; cn_etime</li>
			<li>endTimeUnc &rarr; cn_etime_unc</li>
			<li>diffUTC &rarr; cn_utc</li>
			<li>comments &rarr; cn_com</li>
			<li>#pubDate &rarr; cn_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Thermal network - Volcanoes -->
		<h2 class="wovomlclass"><a name="monitoringsystem_thermalnetwork_volcanoes" id="monitoringsystem_thermalnetwork_volcanoes"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | <a href="#monitoringsystem_thermalnetwork">&lt;ThermalNetwork&gt;</a> | &lt;Volcanoes&gt;</h2>
		
<pre><strong>&lt;Volcanoes&gt;</strong>
	&lt;volcanoCode&gt;...&lt;/volcanoCode&gt;
<strong>&lt;/Volcanoes&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Link:
				<br/>SELECT vd_id FROM vd_inf WHERE vd_inf_cavw = 'volcanoCode'
				<br/>&rarr; #vd_id
			</li>
		</ul>
		
		<h3>2. Change (if parent is updated)</h3>
		<h4>a) Delete</h4>
		<p>
			DELETE FROM jj_volnet WHERE jj_net_id = '@parent1' AND jj_net_flag = "C"
		</p>
		<h4>b) UPDATE cn WHERE cn_id = '@parent1'</h4>
		<ul>
			<li>"0" &rarr; vd_id</li>
		</ul>
		
		<h3>3. Upload/Update</h3>
		<h4>a) If one element listed:</h4>
		<ul class="line_height_150">
			<li>
				Select:
				<br/>SELECT vd_id FROM vd_inf WHERE vd_inf_cavw = 'volcanoCode'
				<br/>&rarr; #vd_id
			</li>
			<li>
				UPDATE cn WHERE cn_id = '@parent1':
				<ul>
					<li>#vd_id &rarr; vd_id</li>
				</ul>
			</li>
		</ul>
		<h4>b) If many elements listed, for each element:</h4>
		<ul class="line_height_150">
			<li>
				Select:
				<br/>SELECT vd_id FROM vd_inf WHERE vd_inf_cavw = 'volcanoCode'
				<br/>&rarr; #vd_id
			</li>
			<li>
				INSERT INTO jj_volnet:
				<ul>
					<li>"C" &rarr; jj_net_flag</li>
					<li>@parent1 &rarr; jj_net_id</li>
					<li>#vd_id &rarr; vd_id</li>
					<li>!cc_id_load &rarr; cc_id_load</li>
					<li>!loaddate &rarr; jj_volnet_loaddate</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Thermal network - Thermal station -->
		<h2 class="wovomlclass"><a name="monitoringsystem_thermalnetwork_thermalstation" id="monitoringsystem_thermalnetwork_thermalstation"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | <a href="#monitoringsystem_thermalnetwork">&lt;ThermalNetwork&gt;</a> | &lt;ThermalStation&gt;</h2>
		
<pre><strong>&lt;ThermalStation code=&quot;...&quot;&gt;</strong>
	&lt;name&gt;...&lt;/name&gt;
	&lt;thermalFeatType&gt;...&lt;/thermalFeatType&gt;
	&lt;groundType&gt;...&lt;/groundType&gt;
	&lt;permInst&gt;...&lt;/permInst&gt;
	&lt;lat&gt;...&lt;/lat&gt;
	&lt;lon&gt;...&lt;/lon&gt;
	&lt;elev&gt;...&lt;/elev&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;diffUTC&gt;...&lt;/diffUTC&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
	<a href="#monitoringsystem_thermalnetwork_thermalstation_thermalinstrument">&lt;ThermalInstrument&gt;...&lt;/ThermalInstrument&gt;</a>
<strong>&lt;/ThermalStation&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Time inclusion:
				<br/>@current.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc'] &sub; @parent1.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc']
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT ts_id FROM ts WHERE ts_code = '/code' AND cc_id = '#cc_id' AND ts_stime = 'startTime'
			<br/>&rarr; #ts_id
		</p>
		<h4>a) INSERT INTO ts</h4>
		<ul>
			<li>/code &rarr; ts_code</li>
			<li>name &rarr; ts_name</li>
			<li>thermalFeatType &rarr; ts_type</li>
			<li>groundType &rarr; ts_ground</li>
			<li>permInst &rarr; ts_perm</li>
			<li>lat &rarr; ts_lat</li>
			<li>lon &rarr; ts_lon</li>
			<li>elev &rarr; ts_elev</li>
			<li>startTime &rarr; ts_stime</li>
			<li>startTimeUnc &rarr; ts_stime_unc</li>
			<li>endTime &rarr; ts_etime</li>
			<li>endTimeUnc &rarr; ts_etime_unc</li>
			<li>diffUTC &rarr; ts_utc</li>
			<li>description &rarr; ts_desc</li>
			<li>@parent1 &rarr; cn_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; ts_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; ts_loaddate</li>
		</ul>
		<h4>b) UPDATE ts WHERE ts_id = '#ts_id'</h4>
		<ul>
			<li>name &rarr; ts_name</li>
			<li>thermalFeatType &rarr; ts_type</li>
			<li>groundType &rarr; ts_ground</li>
			<li>permInst &rarr; ts_perm</li>
			<li>lat &rarr; ts_lat</li>
			<li>lon &rarr; ts_lon</li>
			<li>elev &rarr; ts_elev</li>
			<li>startTimeUnc &rarr; ts_stime_unc</li>
			<li>endTime &rarr; ts_etime</li>
			<li>endTimeUnc &rarr; ts_etime_unc</li>
			<li>diffUTC &rarr; ts_utc</li>
			<li>description &rarr; ts_desc</li>
			<li>@parent1 &rarr; cn_id</li>
			<li>#pubDate &rarr; ts_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Thermal network - Thermal station - Thermal instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystem_thermalnetwork_thermalstation_thermalinstrument" id="monitoringsystem_thermalnetwork_thermalstation_thermalinstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | <a href="#monitoringsystem_thermalnetwork">&lt;ThermalNetwork&gt;</a> | <a href="#monitoringsystem_thermalnetwork_thermalstation">&lt;ThermalStation&gt;</a> | &lt;ThermalInstrument&gt;</h2>
		
<pre><strong>&lt;ThermalInstrument code=&quot;...&quot;&gt;</strong>
	&lt;name&gt;...&lt;/name&gt;
	&lt;type&gt;...&lt;/type&gt;
	&lt;units&gt;...&lt;/units&gt;
	&lt;resolution&gt;...&lt;/resolution&gt;
	&lt;signalToNoise&gt;...&lt;/signalToNoise&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/ThermalInstrument&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Time inclusion:
				<br/>@current.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc'] &sub; @parent1.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc']
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT ti_id FROM ti WHERE ti_code = '/code' AND cc_id = '#cc_id' AND ti_stime = 'startTime'
			<br/>&rarr; #ti_id
		</p>
		<h4>a) INSERT INTO ti</h4>
		<ul>
			<li>/code &rarr; ti_code</li>
			<li>name &rarr; ti_name</li>
			<li>type &rarr; ti_type</li>
			<li>units &rarr; ti_units</li>
			<li>resolution &rarr; ti_pres</li>
			<li>signalToNoise &rarr; ti_stn</li>
			<li>startTime &rarr; ti_stime</li>
			<li>startTimeUnc &rarr; ti_stime_unc</li>
			<li>endTime &rarr; ti_etime</li>
			<li>endTimeUnc &rarr; ti_etime_unc</li>
			<li>comments &rarr; ti_com</li>
			<li>@parent1 &rarr; ts_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; ti_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; ti_loaddate</li>
		</ul>
		<h4>b) UPDATE ti WHERE ti_id = '#ti_id'</h4>
		<ul>
			<li>name &rarr; ti_name</li>
			<li>type &rarr; ti_type</li>
			<li>units &rarr; ti_units</li>
			<li>resolution &rarr; ti_pres</li>
			<li>signalToNoise &rarr; ti_stn</li>
			<li>startTimeUnc &rarr; ti_stime_unc</li>
			<li>endTime &rarr; ti_etime</li>
			<li>endTimeUnc &rarr; ti_etime_unc</li>
			<li>comments &rarr; ti_com</li>
			<li>@parent1 &rarr; ts_id</li>
			<li>#pubDate &rarr; ti_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Thermal station -->
		<h2 class="wovomlclass"><a name="monitoringsystem_thermalstation" id="monitoringsystem_thermalstation"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | &lt;ThermalStation&gt;</h2>
		
<pre><strong>&lt;ThermalStation code=&quot;...&quot;&gt;</strong>
	&lt;networkCode&gt;...&lt;/networkCode&gt;
	&lt;name&gt;...&lt;/name&gt;
	&lt;thermalFeatType&gt;...&lt;/thermalFeatType&gt;
	&lt;groundType&gt;...&lt;/groundType&gt;
	&lt;permInst&gt;...&lt;/permInst&gt;
	&lt;lat&gt;...&lt;/lat&gt;
	&lt;lon&gt;...&lt;/lon&gt;
	&lt;elev&gt;...&lt;/elev&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;diffUTC&gt;...&lt;/diffUTC&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
	<a href="#monitoringsystem_thermalstation_thermalinstrument">&lt;ThermalInstrument&gt;...&lt;/ThermalInstrument&gt;</a>
<strong>&lt;/ThermalStation&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT cn_id, cn_stime, cn_stime_unc, cn_etime, cn_etime_unc FROM cn WHERE cn_code = 'networkCode' AND cc_id = #cc_id
				<br/>@current.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc'] &sub; [cn_stime &plusmn; cn_stime_unc, cn_etime &plusmn; cn_etime_unc]
				<br/>&rarr; #cn_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT ts_id FROM ts WHERE ts_code = '/code' AND cc_id = '#cc_id' AND ts_stime = 'startTime'
			<br/>&rarr; #ts_id
		</p>
		<h4>a) INSERT INTO ts</h4>
		<ul>
			<li>/code &rarr; ts_code</li>
			<li>name &rarr; ts_name</li>
			<li>thermalFeatType &rarr; ts_type</li>
			<li>groundType &rarr; ts_ground</li>
			<li>permInst &rarr; ts_perm</li>
			<li>lat &rarr; ts_lat</li>
			<li>lon &rarr; ts_lon</li>
			<li>elev &rarr; ts_elev</li>
			<li>startTime &rarr; ts_stime</li>
			<li>startTimeUnc &rarr; ts_stime_unc</li>
			<li>endTime &rarr; ts_etime</li>
			<li>endTimeUnc &rarr; ts_etime_unc</li>
			<li>diffUTC &rarr; ts_utc</li>
			<li>description &rarr; ts_desc</li>
			<li>#cn_id &rarr; cn_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; ts_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; ts_loaddate</li>
		</ul>
		<h4>b) UPDATE ts WHERE ts_id = '#ts_id'</h4>
		<ul>
			<li>name &rarr; ts_name</li>
			<li>thermalFeatType &rarr; ts_type</li>
			<li>groundType &rarr; ts_ground</li>
			<li>permInst &rarr; ts_perm</li>
			<li>lat &rarr; ts_lat</li>
			<li>lon &rarr; ts_lon</li>
			<li>elev &rarr; ts_elev</li>
			<li>startTimeUnc &rarr; ts_stime_unc</li>
			<li>endTime &rarr; ts_etime</li>
			<li>endTimeUnc &rarr; ts_etime_unc</li>
			<li>diffUTC &rarr; ts_utc</li>
			<li>description &rarr; ts_desc</li>
			<li>#cn_id &rarr; cn_id</li>
			<li>#pubDate &rarr; ts_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Thermal station - Thermal instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystem_thermalstation_thermalinstrument" id="monitoringsystem_thermalstation_thermalinstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | <a href="#monitoringsystem_thermalstation">&lt;ThermalStation&gt;</a> | &lt;ThermalInstrument&gt;</h2>
		
<pre><strong>&lt;ThermalInstrument code=&quot;...&quot;&gt;</strong>
	&lt;name&gt;...&lt;/name&gt;
	&lt;type&gt;...&lt;/type&gt;
	&lt;units&gt;...&lt;/units&gt;
	&lt;resolution&gt;...&lt;/resolution&gt;
	&lt;signalToNoise&gt;...&lt;/signalToNoise&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/ThermalInstrument&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Time inclusion:
				<br/>@current.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc'] &sub; @parent1.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc']
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT ti_id FROM ti WHERE ti_code = '/code' AND cc_id = '#cc_id' AND ti_stime = 'startTime'
			<br/>&rarr; #ti_id
		</p>
		<h4>a) INSERT INTO ti</h4>
		<ul>
			<li>/code &rarr; ti_code</li>
			<li>name &rarr; ti_name</li>
			<li>type &rarr; ti_type</li>
			<li>units &rarr; ti_units</li>
			<li>resolution &rarr; ti_pres</li>
			<li>signalToNoise &rarr; ti_stn</li>
			<li>startTime &rarr; ti_stime</li>
			<li>startTimeUnc &rarr; ti_stime_unc</li>
			<li>endTime &rarr; ti_etime</li>
			<li>endTimeUnc &rarr; ti_etime_unc</li>
			<li>comments &rarr; ti_com</li>
			<li>@parent1 &rarr; ts_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; ti_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; ti_loaddate</li>
		</ul>
		<h4>b) UPDATE ti WHERE ti_id = '#ti_id'</h4>
		<ul>
			<li>name &rarr; ti_name</li>
			<li>type &rarr; ti_type</li>
			<li>units &rarr; ti_units</li>
			<li>resolution &rarr; ti_pres</li>
			<li>signalToNoise &rarr; ti_stn</li>
			<li>startTimeUnc &rarr; ti_stime_unc</li>
			<li>endTime &rarr; ti_etime</li>
			<li>endTimeUnc &rarr; ti_etime_unc</li>
			<li>comments &rarr; ti_com</li>
			<li>@parent1 &rarr; ts_id</li>
			<li>#pubDate &rarr; ti_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Thermal instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystem_thermalinstrument" id="monitoringsystem_thermalinstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | &lt;ThermalInstrument&gt;</h2>
		
<pre><strong>&lt;ThermalInstrument code=&quot;...&quot;&gt;</strong>
	&lt;stationCode&gt;...&lt;/stationCode&gt;		&lt;!-- OR &lt;airplaneCode&gt;...&lt;/airplaneCode&gt; --&gt;
	&lt;name&gt;...&lt;/name&gt;
	&lt;type&gt;...&lt;/type&gt;
	&lt;units&gt;...&lt;/units&gt;
	&lt;resolution&gt;...&lt;/resolution&gt;
	&lt;signalToNoise&gt;...&lt;/signalToNoise&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/ThermalInstrument&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT ts_id, ts_stime, ts_stime_unc, ts_etime, ts_etime_unc FROM ts WHERE ts_code = 'stationCode' AND cc_id = #cc_id
				<br/>@current.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc'] &sub; [ts_stime &plusmn; ts_stime_unc, ts_etime &plusmn; ts_etime_unc]
				<br/>&rarr; #ts_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT ti_id FROM ti WHERE ti_code = '/code' AND cc_id = '#cc_id' AND ti_stime = 'startTime'
			<br/>&rarr; #ti_id
		</p>
		<h4>a) INSERT INTO ti</h4>
		<ul>
			<li>/code &rarr; ti_code</li>
			<li>name &rarr; ti_name</li>
			<li>type &rarr; ti_type</li>
			<li>units &rarr; ti_units</li>
			<li>resolution &rarr; ti_pres</li>
			<li>signalToNoise &rarr; ti_stn</li>
			<li>startTime &rarr; ti_stime</li>
			<li>startTimeUnc &rarr; ti_stime_unc</li>
			<li>endTime &rarr; ti_etime</li>
			<li>endTimeUnc &rarr; ti_etime_unc</li>
			<li>comments &rarr; ti_com</li>
			<li>#ts_id &rarr; ts_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; ti_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; ti_loaddate</li>
		</ul>
		<h4>b) UPDATE ti WHERE ti_id = '#ti_id'</h4>
		<ul>
			<li>name &rarr; ti_name</li>
			<li>type &rarr; ti_type</li>
			<li>units &rarr; ti_units</li>
			<li>resolution &rarr; ti_pres</li>
			<li>signalToNoise &rarr; ti_stn</li>
			<li>startTimeUnc &rarr; ti_stime_unc</li>
			<li>endTime &rarr; ti_etime</li>
			<li>endTimeUnc &rarr; ti_etime_unc</li>
			<li>comments &rarr; ti_com</li>
			<li>#ts_id &rarr; ts_id</li>
			<li>#pubDate &rarr; ti_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Seismic network -->
		<h2 class="wovomlclass"><a name="monitoringsystem_seismicnetwork" id="monitoringsystem_seismicnetwork"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | &lt;SeismicNetwork&gt;</h2>
		
<pre><strong>&lt;SeismicNetwork code=&quot;...&quot;&gt;</strong>
	<a href="#monitoringsystem_seismicnetwork_volcanoes">&lt;Volcanoes&gt;...&lt;/Volcanoes&gt;</a>
	&lt;name&gt;...&lt;/name&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;velocityModel&gt;...&lt;/velocityModel&gt;
	&lt;zeroDepth&gt;...&lt;/zeroDepth&gt;
	&lt;fixedDepth&gt;...&lt;/fixedDepth&gt;
	&lt;fixedDepthDesc&gt;...&lt;/fixedDepthDesc&gt;
	&lt;numberOfSeismo&gt;...&lt;/numberOfSeismo&gt;
	&lt;numberOfBBSeismo&gt;...&lt;/numberOfBBSeismo&gt;
	&lt;numberOfSMPSeismo&gt;...&lt;/numberOfSMPSeismo&gt;
	&lt;numberOfDigiSeismo&gt;...&lt;/numberOfDigiSeismo&gt;
	&lt;numberOfAnaSeismo&gt;...&lt;/numberOfAnaSeismo&gt;
	&lt;numberOf3CompSeismo&gt;...&lt;/numberOf3CompSeismo&gt;
	&lt;numberOfMicro&gt;...&lt;/numberOfMicro&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;diffUTC&gt;...&lt;/diffUTC&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
	<a href="#monitoringsystem_seismicnetwork_seismicstation">&lt;SeismicStation&gt;...&lt;/SeismicStation&gt;</a>
<strong>&lt;/SeismicNetwork&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT sn_id FROM sn WHERE sn_code = '/code' AND cc_id = '#cc_id' AND sn_stime = 'startTime'
			<br/>&rarr; #sn_id
		</p>
		<h4>a) INSERT INTO sn</h4>
		<ul>
			<li>/code &rarr; sn_code</li>
			<li>name &rarr; sn_name</li>
			<li>description &rarr; sn_desc</li>
			<li>velocityModel &rarr; sn_vmodel</li>
			<li>zeroDepth &rarr; sn_zerokm</li>
			<li>fixedDepth &rarr; sn_fdepth_flag</li>
			<li>fixedDepthDesc &rarr; sn_fdepth</li>
			<li>numberOfSeismo &rarr; sn_tot</li>
			<li>numberOfBBSeismo &rarr; sn_bb</li>
			<li>numberOfSMPSeismo &rarr; sn_smp</li>
			<li>numberOfDigiSeismo &rarr; sn_digital</li>
			<li>numberOfAnaSeismo &rarr; sn_analog</li>
			<li>numberOf3CompSeismo &rarr; sn_tcomp</li>
			<li>numberOfMicro &rarr; sn_micro</li>
			<li>startTime &rarr; sn_stime</li>
			<li>startTimeUnc &rarr; sn_stime_unc</li>
			<li>endTime &rarr; sn_etime</li>
			<li>endTimeUnc &rarr; sn_etime_unc</li>
			<li>diffUTC &rarr; sn_utc</li>
			<li>comments &rarr; sn_com</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; sn_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; sn_loaddate</li>
		</ul>
		<h4>b) UPDATE sn WHERE sn_id = '#sn_id'</h4>
		<ul>
			<li>name &rarr; sn_name</li>
			<li>description &rarr; sn_desc</li>
			<li>velocityModel &rarr; sn_vmodel</li>
			<li>zeroDepth &rarr; sn_zerokm</li>
			<li>fixedDepth &rarr; sn_fdepth_flag</li>
			<li>fixedDepthDesc &rarr; sn_fdepth</li>
			<li>numberOfSeismo &rarr; sn_tot</li>
			<li>numberOfBBSeismo &rarr; sn_bb</li>
			<li>numberOfSMPSeismo &rarr; sn_smp</li>
			<li>numberOfDigiSeismo &rarr; sn_digital</li>
			<li>numberOfAnaSeismo &rarr; sn_analog</li>
			<li>numberOf3CompSeismo &rarr; sn_tcomp</li>
			<li>numberOfMicro &rarr; sn_micro</li>
			<li>startTimeUnc &rarr; sn_stime_unc</li>
			<li>endTime &rarr; sn_etime</li>
			<li>endTimeUnc &rarr; sn_etime_unc</li>
			<li>diffUTC &rarr; sn_utc</li>
			<li>comments &rarr; sn_com</li>
			<li>#pubDate &rarr; sn_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Seismic network - Volcanoes -->
		<h2 class="wovomlclass"><a name="monitoringsystem_seismicnetwork_volcanoes" id="monitoringsystem_seismicnetwork_volcanoes"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | <a href="#monitoringsystem_seismicnetwork">&lt;SeismicNetwork&gt;</a> | &lt;Volcanoes&gt;</h2>
		
<pre><strong>&lt;Volcanoes&gt;</strong>
	&lt;volcanoCode&gt;...&lt;/volcanoCode&gt;
<strong>&lt;/Volcanoes&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Link:
				<br/>SELECT vd_id FROM vd_inf WHERE vd_inf_cavw = 'volcanoCode'
				<br/>&rarr; #vd_id
			</li>
		</ul>
		
		<h3>2. Change (if parent is updated)</h3>
		<h4>a) Delete</h4>
		<p>
			DELETE FROM jj_volnet WHERE jj_net_id = '@parent1' AND jj_net_flag = "S"
		</p>
		<h4>b) UPDATE sn WHERE sn_id = '@parent1'</h4>
		<ul>
			<li>"0" &rarr; vd_id</li>
		</ul>
		
		<h3>3. Upload/Update</h3>
		<h4>a) If one element listed:</h4>
		<ul class="line_height_150">
			<li>
				Select:
				<br/>SELECT vd_id FROM vd_inf WHERE vd_inf_cavw = 'volcanoCode'
				<br/>&rarr; #vd_id
			</li>
			<li>
				UPDATE sn WHERE sn_id = '@parent1':
				<ul>
					<li>#vd_id &rarr; vd_id</li>
				</ul>
			</li>
		</ul>
		<h4>b) If many elements listed, for each element:</h4>
		<ul class="line_height_150">
			<li>
				Select:
				<br/>SELECT vd_id FROM vd_inf WHERE vd_inf_cavw = 'volcanoCode'
				<br/>&rarr; #vd_id
			</li>
			<li>
				INSERT INTO jj_volnet:
				<ul>
					<li>"S" &rarr; jj_net_flag</li>
					<li>@parent1 &rarr; jj_net_id</li>
					<li>#vd_id &rarr; vd_id</li>
					<li>!cc_id_load &rarr; cc_id_load</li>
					<li>!loaddate &rarr; jj_volnet_loaddate</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Seismic network - Seismic station -->
		<h2 class="wovomlclass"><a name="monitoringsystem_seismicnetwork_seismicstation" id="monitoringsystem_seismicnetwork_seismicstation"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | <a href="#monitoringsystem_seismicnetwork">&lt;SeismicNetwork&gt;</a> | &lt;SeismicStation&gt;</h2>
		
<pre><strong>&lt;SeismicStation code=&quot;...&quot;&gt;</strong>
	&lt;name&gt;...&lt;/name&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;instDepth&gt;...&lt;/instDepth&gt;
	&lt;instType&gt;...&lt;/instType&gt;
	&lt;systemGain&gt;...&lt;/systemGain&gt;
	&lt;lat&gt;...&lt;/lat&gt;
	&lt;lon&gt;...&lt;/lon&gt;
	&lt;elev&gt;...&lt;/elev&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;diffUTC&gt;...&lt;/diffUTC&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
	<a href="#monitoringsystem_seismicnetwork_seismicstation_seismicinstrument">&lt;SeismicInstrument&gt;...&lt;/SeismicInstrument&gt;</a>
<strong>&lt;/SeismicStation&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Time inclusion:
				<br/>@current.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc'] &sub; @parent1.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc']
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT ss_id FROM ss WHERE ss_code = '/code' AND cc_id = '#cc_id' AND ss_stime = 'startTime'
			<br/>&rarr; #ss_id
		</p>
		<h4>a) INSERT INTO ss</h4>
		<ul>
			<li>/code &rarr; ss_code</li>
			<li>name &rarr; ss_name</li>
			<li>description &rarr; ss_desc</li>
			<li>comments &rarr; ss_com</li>
			<li>instDepth &rarr; ss_depth</li>
			<li>instType &rarr; ss_instr_type</li>
			<li>systemGain &rarr; ss_sgain</li>
			<li>lat &rarr; ss_lat</li>
			<li>lon &rarr; ss_lon</li>
			<li>elev &rarr; ss_elev</li>
			<li>startTime &rarr; ss_stime</li>
			<li>startTimeUnc &rarr; ss_stime_unc</li>
			<li>endTime &rarr; ss_etime</li>
			<li>endTimeUnc &rarr; ss_etime_unc</li>
			<li>diffUTC &rarr; ss_utc</li>
			<li>@parent1 &rarr; sn_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; ss_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; ss_loaddate</li>
		</ul>
		<h4>b) UPDATE ss WHERE ss_id = '#ss_id'</h4>
		<ul>
			<li>name &rarr; ss_name</li>
			<li>description &rarr; ss_desc</li>
			<li>comments &rarr; ss_com</li>
			<li>instDepth &rarr; ss_depth</li>
			<li>instType &rarr; ss_instr_type</li>
			<li>systemGain &rarr; ss_sgain</li>
			<li>lat &rarr; ss_lat</li>
			<li>lon &rarr; ss_lon</li>
			<li>elev &rarr; ss_elev</li>
			<li>startTimeUnc &rarr; ss_stime_unc</li>
			<li>endTime &rarr; ss_etime</li>
			<li>endTimeUnc &rarr; ss_etime_unc</li>
			<li>diffUTC &rarr; ss_utc</li>
			<li>@parent1 &rarr; sn_id</li>
			<li>#pubDate &rarr; ss_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Seismic network - Seismic station - Seismic instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystem_seismicnetwork_seismicstation_seismicinstrument" id="monitoringsystem_seismicnetwork_seismicstation_seismicinstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | <a href="#monitoringsystem_seismicnetwork">&lt;SeismicNetwork&gt;</a> | <a href="#monitoringsystem_seismicnetwork_seismicstation">&lt;SeismicStation&gt;</a> | &lt;SeismicInstrument&gt;</h2>
		
<pre><strong>&lt;SeismicInstrument code=&quot;...&quot;&gt;</strong>
	&lt;name&gt;...&lt;/name&gt;
	&lt;type&gt;...&lt;/type&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;dynamicRange&gt;...&lt;/dynamicRange&gt;
	&lt;gain&gt;...&lt;/gain&gt;
	&lt;filters&gt;...&lt;/filters&gt;
	&lt;numberOfComp&gt;...&lt;/numberOfComp&gt;
	&lt;respOverview&gt;...&lt;/respOverview&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
	<a href="#monitoringsystem_seismicnetwork_seismicstation_seismicinstrument_seismiccomponent">&lt;SeismicComponent&gt;...&lt;/SeismicComponent&gt;</a>
<strong>&lt;/SeismicInstrument&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Time inclusion:
				<br/>@current.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc'] &sub; @parent1.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc']
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT si_id FROM si WHERE si_code = '/code' AND cc_id = '#cc_id' AND si_stime = 'startTime'
			<br/>&rarr; #si_id
		</p>
		<h4>a) INSERT INTO si</h4>
		<ul>
			<li>/code &rarr; si_code</li>
			<li>name &rarr; si_name</li>
			<li>type &rarr; si_type</li>
			<li>comments &rarr; si_com</li>
			<li>dynamicRange &rarr; si_range</li>
			<li>gain &rarr; si_igain</li>
			<li>filters &rarr; si_filter</li>
			<li>numberOfComp &rarr; si_ncomp</li>
			<li>respOverview &rarr; si_resp</li>
			<li>startTime &rarr; si_stime</li>
			<li>startTimeUnc &rarr; si_stime_unc</li>
			<li>endTime &rarr; si_etime</li>
			<li>endTimeUnc &rarr; si_etime_unc</li>
			<li>@parent1 &rarr; ss_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; si_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; si_loaddate</li>
		</ul>
		<h4>b) UPDATE si WHERE si_id = '#si_id'</h4>
		<ul>
			<li>name &rarr; si_name</li>
			<li>type &rarr; si_type</li>
			<li>comments &rarr; si_com</li>
			<li>dynamicRange &rarr; si_range</li>
			<li>gain &rarr; si_igain</li>
			<li>filters &rarr; si_filter</li>
			<li>numberOfComp &rarr; si_ncomp</li>
			<li>respOverview &rarr; si_resp</li>
			<li>startTimeUnc &rarr; si_stime_unc</li>
			<li>endTime &rarr; si_etime</li>
			<li>endTimeUnc &rarr; si_etime_unc</li>
			<li>@parent1 &rarr; ss_id</li>
			<li>#pubDate &rarr; si_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Seismic network - Seismic station - Seismic instrument - Seismic component -->
		<h2 class="wovomlclass"><a name="monitoringsystem_seismicnetwork_seismicstation_seismicinstrument_seismiccomponent" id="monitoringsystem_seismicnetwork_seismicstation_seismicinstrument_seismiccomponent"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | <a href="#monitoringsystem_seismicnetwork">&lt;SeismicNetwork&gt;</a> | <a href="#monitoringsystem_seismicnetwork_seismicstation">&lt;SeismicStation&gt;</a> | <a href="#monitoringsystem_seismicnetwork_seismicstation_seismicinstrument">&lt;SeismicInstrument&gt;</a> | &lt;SeismicComponent&gt;</h2>
		
<pre><strong>&lt;SeismicComponent code=&quot;...&quot;&gt;</strong>
	&lt;name&gt;...&lt;/name&gt;
	&lt;type&gt;...&lt;/type&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;respDesc&gt;...&lt;/respDesc&gt;
	&lt;sampleRate&gt;...&lt;/sampleRate&gt;
	&lt;seedBandCode&gt;...&lt;/seedBandCode&gt;
	&lt;seedInstCode&gt;...&lt;/seedInstCode&gt;
	&lt;seedOrientCode&gt;...&lt;/seedOrientCode&gt;
	&lt;sensitivity&gt;...&lt;/sensitivity&gt;
	&lt;depth&gt;...&lt;/depth&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/SeismicComponent&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT si_cmp_id FROM si_cmp WHERE si_cmp_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #si_cmp_id
		</p>
		<h4>a) INSERT INTO si_cmp</h4>
		<ul>
			<li>/code &rarr; si_cmp_code</li>
			<li>name &rarr; si_cmp_name</li>
			<li>type &rarr; si_cmp_type</li>
			<li>comments &rarr; si_cmp_com</li>
			<li>respDesc &rarr; si_cmp_resp</li>
			<li>sampleRate &rarr; si_cmp_samp</li>
			<li>seedBandCode &rarr; si_cmp_band</li>
			<li>seedInstCode &rarr; si_cmp_icode</li>
			<li>seedOrientCode &rarr; si_cmp_orient</li>
			<li>sensitivity &rarr; si_cmp_sens</li>
			<li>depth &rarr; si_cmp_depth</li>
			<li>@parent1 &rarr; si_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; si_cmp_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; si_cmp_loaddate</li>
		</ul>
		<h4>b) UPDATE si_cmp WHERE si_cmp_id = '#si_cmp_id'</h4>
		<ul>
			<li>name &rarr; si_cmp_name</li>
			<li>type &rarr; si_cmp_type</li>
			<li>comments &rarr; si_cmp_com</li>
			<li>respDesc &rarr; si_cmp_resp</li>
			<li>sampleRate &rarr; si_cmp_samp</li>
			<li>seedBandCode &rarr; si_cmp_band</li>
			<li>seedInstCode &rarr; si_cmp_icode</li>
			<li>seedOrientCode &rarr; si_cmp_orient</li>
			<li>sensitivity &rarr; si_cmp_sens</li>
			<li>depth &rarr; si_cmp_depth</li>
			<li>@parent1 &rarr; si_id</li>
			<li>#pubDate &rarr; si_cmp_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Seismic station -->
		<h2 class="wovomlclass"><a name="monitoringsystem_seismicstation" id="monitoringsystem_seismicstation"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | &lt;SeismicStation&gt;</h2>
		
<pre><strong>&lt;SeismicStation code=&quot;...&quot;&gt;</strong>
	&lt;networkCode&gt;...&lt;/networkCode&gt;
	&lt;name&gt;...&lt;/name&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;instDepth&gt;...&lt;/instDepth&gt;
	&lt;instType&gt;...&lt;/instType&gt;
	&lt;systemGain&gt;...&lt;/systemGain&gt;
	&lt;lat&gt;...&lt;/lat&gt;
	&lt;lon&gt;...&lt;/lon&gt;
	&lt;elev&gt;...&lt;/elev&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;diffUTC&gt;...&lt;/diffUTC&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
	<a href="#monitoringsystem_seismicstation_seismicinstrument">&lt;SeismicInstrument&gt;...&lt;/SeismicInstrument&gt;</a>
<strong>&lt;/SeismicStation&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT sn_id, sn_stime, sn_stime_unc, sn_etime, sn_etime_unc FROM sn WHERE sn_code = 'networkCode' AND cc_id = #cc_id
				<br/>@current.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc'] &sub; [sn_stime &plusmn; sn_stime_unc, sn_etime &plusmn; sn_etime_unc]
				<br/>&rarr; #sn_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT ss_id FROM ss WHERE ss_code = '/code' AND cc_id = '#cc_id' AND ss_stime = 'startTime'
			<br/>&rarr; #ss_id
		</p>
		<h4>a) INSERT INTO ss</h4>
		<ul>
			<li>/code &rarr; ss_code</li>
			<li>name &rarr; ss_name</li>
			<li>description &rarr; ss_desc</li>
			<li>comments &rarr; ss_com</li>
			<li>instDepth &rarr; ss_depth</li>
			<li>instType &rarr; ss_instr_type</li>
			<li>systemGain &rarr; ss_sgain</li>
			<li>lat &rarr; ss_lat</li>
			<li>lon &rarr; ss_lon</li>
			<li>elev &rarr; ss_elev</li>
			<li>startTime &rarr; ss_stime</li>
			<li>startTimeUnc &rarr; ss_stime_unc</li>
			<li>endTime &rarr; ss_etime</li>
			<li>endTimeUnc &rarr; ss_etime_unc</li>
			<li>diffUTC &rarr; ss_utc</li>
			<li>#sn_id &rarr; sn_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; ss_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; ss_loaddate</li>
		</ul>
		<h4>b) UPDATE ss WHERE ss_id = '#ss_id'</h4>
		<ul>
			<li>name &rarr; ss_name</li>
			<li>description &rarr; ss_desc</li>
			<li>comments &rarr; ss_com</li>
			<li>instDepth &rarr; ss_depth</li>
			<li>instType &rarr; ss_instr_type</li>
			<li>systemGain &rarr; ss_sgain</li>
			<li>lat &rarr; ss_lat</li>
			<li>lon &rarr; ss_lon</li>
			<li>elev &rarr; ss_elev</li>
			<li>startTimeUnc &rarr; ss_stime_unc</li>
			<li>endTime &rarr; ss_etime</li>
			<li>endTimeUnc &rarr; ss_etime_unc</li>
			<li>diffUTC &rarr; ss_utc</li>
			<li>#sn_id &rarr; sn_id</li>
			<li>#pubDate &rarr; ss_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Seismic station - Seismic instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystem_seismicstation_seismicinstrument" id="monitoringsystem_seismicstation_seismicinstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | <a href="#monitoringsystem_seismicstation">&lt;SeismicStation&gt;</a> | &lt;SeismicInstrument&gt;</h2>
		
<pre><strong>&lt;SeismicInstrument code=&quot;...&quot;&gt;</strong>
	&lt;name&gt;...&lt;/name&gt;
	&lt;type&gt;...&lt;/type&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;dynamicRange&gt;...&lt;/dynamicRange&gt;
	&lt;gain&gt;...&lt;/gain&gt;
	&lt;filters&gt;...&lt;/filters&gt;
	&lt;numberOfComp&gt;...&lt;/numberOfComp&gt;
	&lt;respOverview&gt;...&lt;/respOverview&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
	<a href="#monitoringsystem_seismicstation_seismicinstrument_seismiccomponent">&lt;SeismicComponent&gt;...&lt;/SeismicComponent&gt;</a>
<strong>&lt;/SeismicInstrument&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Time inclusion:
				<br/>@current.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc'] &sub; @parent1.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc']
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT si_id FROM si WHERE si_code = '/code' AND cc_id = '#cc_id' AND si_stime = 'startTime'
			<br/>&rarr; #si_id
		</p>
		<h4>a) INSERT INTO si</h4>
		<ul>
			<li>/code &rarr; si_code</li>
			<li>name &rarr; si_name</li>
			<li>type &rarr; si_type</li>
			<li>comments &rarr; si_com</li>
			<li>dynamicRange &rarr; si_range</li>
			<li>gain &rarr; si_igain</li>
			<li>filters &rarr; si_filter</li>
			<li>numberOfComp &rarr; si_ncomp</li>
			<li>respOverview &rarr; si_resp</li>
			<li>startTime &rarr; si_stime</li>
			<li>startTimeUnc &rarr; si_stime_unc</li>
			<li>endTime &rarr; si_etime</li>
			<li>endTimeUnc &rarr; si_etime_unc</li>
			<li>@parent1 &rarr; ss_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; si_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; si_loaddate</li>
		</ul>
		<h4>b) UPDATE si WHERE si_id = '#si_id'</h4>
		<ul>
			<li>name &rarr; si_name</li>
			<li>type &rarr; si_type</li>
			<li>comments &rarr; si_com</li>
			<li>dynamicRange &rarr; si_range</li>
			<li>gain &rarr; si_igain</li>
			<li>filters &rarr; si_filter</li>
			<li>numberOfComp &rarr; si_ncomp</li>
			<li>respOverview &rarr; si_resp</li>
			<li>startTimeUnc &rarr; si_stime_unc</li>
			<li>endTime &rarr; si_etime</li>
			<li>endTimeUnc &rarr; si_etime_unc</li>
			<li>@parent1 &rarr; ss_id</li>
			<li>#pubDate &rarr; si_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Seismic station - Seismic instrument - Seismic component -->
		<h2 class="wovomlclass"><a name="monitoringsystem_seismicstation_seismicinstrument_seismiccomponent" id="monitoringsystem_seismicstation_seismicinstrument_seismiccomponent"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | <a href="#monitoringsystem_seismicstation">&lt;SeismicStation&gt;</a> | <a href="#monitoringsystem_seismicstation_seismicinstrument">&lt;SeismicInstrument&gt;</a> | &lt;SeismicComponent&gt;</h2>
		
<pre><strong>&lt;SeismicComponent code=&quot;...&quot;&gt;</strong>
	&lt;name&gt;...&lt;/name&gt;
	&lt;type&gt;...&lt;/type&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;respDesc&gt;...&lt;/respDesc&gt;
	&lt;sampleRate&gt;...&lt;/sampleRate&gt;
	&lt;seedBandCode&gt;...&lt;/seedBandCode&gt;
	&lt;seedInstCode&gt;...&lt;/seedInstCode&gt;
	&lt;seedOrientCode&gt;...&lt;/seedOrientCode&gt;
	&lt;sensitivity&gt;...&lt;/sensitivity&gt;
	&lt;depth&gt;...&lt;/depth&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/SeismicComponent&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT si_cmp_id FROM si_cmp WHERE si_cmp_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #si_cmp_id
		</p>
		<h4>a) INSERT INTO si_cmp</h4>
		<ul>
			<li>/code &rarr; si_cmp_code</li>
			<li>name &rarr; si_cmp_name</li>
			<li>type &rarr; si_cmp_type</li>
			<li>comments &rarr; si_cmp_com</li>
			<li>respDesc &rarr; si_cmp_resp</li>
			<li>sampleRate &rarr; si_cmp_samp</li>
			<li>seedBandCode &rarr; si_cmp_band</li>
			<li>seedInstCode &rarr; si_cmp_icode</li>
			<li>seedOrientCode &rarr; si_cmp_orient</li>
			<li>sensitivity &rarr; si_cmp_sens</li>
			<li>depth &rarr; si_cmp_depth</li>
			<li>@parent1 &rarr; si_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; si_cmp_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; si_cmp_loaddate</li>
		</ul>
		<h4>b) UPDATE si_cmp WHERE si_cmp_id = '#si_cmp_id'</h4>
		<ul>
			<li>name &rarr; si_cmp_name</li>
			<li>type &rarr; si_cmp_type</li>
			<li>comments &rarr; si_cmp_com</li>
			<li>respDesc &rarr; si_cmp_resp</li>
			<li>sampleRate &rarr; si_cmp_samp</li>
			<li>seedBandCode &rarr; si_cmp_band</li>
			<li>seedInstCode &rarr; si_cmp_icode</li>
			<li>seedOrientCode &rarr; si_cmp_orient</li>
			<li>sensitivity &rarr; si_cmp_sens</li>
			<li>depth &rarr; si_cmp_depth</li>
			<li>@parent1 &rarr; si_id</li>
			<li>#pubDate &rarr; si_cmp_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Seismic instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystem_seismicinstrument" id="monitoringsystem_seismicinstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | &lt;SeismicInstrument&gt;</h2>
		
<pre><strong>&lt;SeismicInstrument code=&quot;...&quot;&gt;</strong>
	&lt;stationCode&gt;...&lt;/stationCode&gt;
	&lt;name&gt;...&lt;/name&gt;
	&lt;type&gt;...&lt;/type&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;dynamicRange&gt;...&lt;/dynamicRange&gt;
	&lt;gain&gt;...&lt;/gain&gt;
	&lt;filters&gt;...&lt;/filters&gt;
	&lt;numberOfComp&gt;...&lt;/numberOfComp&gt;
	&lt;respOverview&gt;...&lt;/respOverview&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
	<a href="#monitoringsystem_seismicinstrument_seismiccomponent">&lt;SeismicComponent&gt;...&lt;/SeismicComponent&gt;</a>
<strong>&lt;/SeismicInstrument&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT ss_id, ss_stime, ss_stime_unc, ss_etime, ss_etime_unc FROM ss WHERE ss_code = 'stationCode' AND cc_id = #cc_id
				<br/>@current.['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc'] &sub; [ss_stime &plusmn; ss_stime_unc, ss_etime &plusmn; ss_etime_unc]
				<br/>&rarr; #ss_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT si_id FROM si WHERE si_code = '/code' AND cc_id = '#cc_id' AND si_stime = 'startTime'
			<br/>&rarr; #si_id
		</p>
		<h4>a) INSERT INTO si</h4>
		<ul>
			<li>/code &rarr; si_code</li>
			<li>name &rarr; si_name</li>
			<li>type &rarr; si_type</li>
			<li>comments &rarr; si_com</li>
			<li>dynamicRange &rarr; si_range</li>
			<li>gain &rarr; si_igain</li>
			<li>filters &rarr; si_filter</li>
			<li>numberOfComp &rarr; si_ncomp</li>
			<li>respOverview &rarr; si_resp</li>
			<li>startTime &rarr; si_stime</li>
			<li>startTimeUnc &rarr; si_stime_unc</li>
			<li>endTime &rarr; si_etime</li>
			<li>endTimeUnc &rarr; si_etime_unc</li>
			<li>#ss_id &rarr; ss_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; si_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; si_loaddate</li>
		</ul>
		<h4>b) UPDATE si WHERE si_id = '#si_id'</h4>
		<ul>
			<li>name &rarr; si_name</li>
			<li>type &rarr; si_type</li>
			<li>comments &rarr; si_com</li>
			<li>dynamicRange &rarr; si_range</li>
			<li>gain &rarr; si_igain</li>
			<li>filters &rarr; si_filter</li>
			<li>numberOfComp &rarr; si_ncomp</li>
			<li>respOverview &rarr; si_resp</li>
			<li>startTimeUnc &rarr; si_stime_unc</li>
			<li>endTime &rarr; si_etime</li>
			<li>endTimeUnc &rarr; si_etime_unc</li>
			<li>#ss_id &rarr; ss_id</li>
			<li>#pubDate &rarr; si_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Seismic instrument - Seismic component -->
		<h2 class="wovomlclass"><a name="monitoringsystem_seismicinstrument_seismiccomponent" id="monitoringsystem_seismicinstrument_seismiccomponent"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | <a href="#monitoringsystem_seismicinstrument">&lt;SeismicInstrument&gt;</a> | &lt;SeismicComponent&gt;</h2>
		
<pre><strong>&lt;SeismicComponent code=&quot;...&quot;&gt;</strong>
	&lt;name&gt;...&lt;/name&gt;
	&lt;type&gt;...&lt;/type&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;respDesc&gt;...&lt;/respDesc&gt;
	&lt;sampleRate&gt;...&lt;/sampleRate&gt;
	&lt;seedBandCode&gt;...&lt;/seedBandCode&gt;
	&lt;seedInstCode&gt;...&lt;/seedInstCode&gt;
	&lt;seedOrientCode&gt;...&lt;/seedOrientCode&gt;
	&lt;sensitivity&gt;...&lt;/sensitivity&gt;
	&lt;depth&gt;...&lt;/depth&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/SeismicComponent&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT si_cmp_id FROM si_cmp WHERE si_cmp_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #si_cmp_id
		</p>
		<h4>a) INSERT INTO si_cmp</h4>
		<ul>
			<li>/code &rarr; si_cmp_code</li>
			<li>name &rarr; si_cmp_name</li>
			<li>type &rarr; si_cmp_type</li>
			<li>comments &rarr; si_cmp_com</li>
			<li>respDesc &rarr; si_cmp_resp</li>
			<li>sampleRate &rarr; si_cmp_samp</li>
			<li>seedBandCode &rarr; si_cmp_band</li>
			<li>seedInstCode &rarr; si_cmp_icode</li>
			<li>seedOrientCode &rarr; si_cmp_orient</li>
			<li>sensitivity &rarr; si_cmp_sens</li>
			<li>depth &rarr; si_cmp_depth</li>
			<li>@parent1 &rarr; si_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; si_cmp_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; si_cmp_loaddate</li>
		</ul>
		<h4>b) UPDATE si_cmp WHERE si_cmp_id = '#si_cmp_id'</h4>
		<ul>
			<li>name &rarr; si_cmp_name</li>
			<li>type &rarr; si_cmp_type</li>
			<li>comments &rarr; si_cmp_com</li>
			<li>respDesc &rarr; si_cmp_resp</li>
			<li>sampleRate &rarr; si_cmp_samp</li>
			<li>seedBandCode &rarr; si_cmp_band</li>
			<li>seedInstCode &rarr; si_cmp_icode</li>
			<li>seedOrientCode &rarr; si_cmp_orient</li>
			<li>sensitivity &rarr; si_cmp_sens</li>
			<li>depth &rarr; si_cmp_depth</li>
			<li>@parent1 &rarr; si_id</li>
			<li>#pubDate &rarr; si_cmp_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring system - Seismic component -->
		<h2 class="wovomlclass"><a name="monitoringsystem_seismiccomponent" id="monitoringsystem_seismiccomponent"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystem">&lt;MonitoringSystem&gt;</a> | &lt;SeismicComponent&gt;</h2>
		
<pre><strong>&lt;SeismicComponent code=&quot;...&quot;&gt;</strong>
	&lt;instrumentCode&gt;...&lt;/instrumentCode&gt;
	&lt;name&gt;...&lt;/name&gt;
	&lt;type&gt;...&lt;/type&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;respDesc&gt;...&lt;/respDesc&gt;
	&lt;sampleRate&gt;...&lt;/sampleRate&gt;
	&lt;seedBandCode&gt;...&lt;/seedBandCode&gt;
	&lt;seedInstCode&gt;...&lt;/seedInstCode&gt;
	&lt;seedOrientCode&gt;...&lt;/seedOrientCode&gt;
	&lt;sensitivity&gt;...&lt;/sensitivity&gt;
	&lt;depth&gt;...&lt;/depth&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/SeismicComponent&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Link:
				<br/>SELECT si_id FROM si WHERE si_code = 'instrumentCode' AND cc_id = '#cc_id'
				<br/>&rarr; #si_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT si_cmp_id FROM si_cmp WHERE si_cmp_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #si_cmp_id
		</p>
		<h4>a) INSERT INTO si_cmp</h4>
		<ul>
			<li>/code &rarr; si_cmp_code</li>
			<li>name &rarr; si_cmp_name</li>
			<li>type &rarr; si_cmp_type</li>
			<li>comments &rarr; si_cmp_com</li>
			<li>respDesc &rarr; si_cmp_resp</li>
			<li>sampleRate &rarr; si_cmp_samp</li>
			<li>seedBandCode &rarr; si_cmp_band</li>
			<li>seedInstCode &rarr; si_cmp_icode</li>
			<li>seedOrientCode &rarr; si_cmp_orient</li>
			<li>sensitivity &rarr; si_cmp_sens</li>
			<li>depth &rarr; si_cmp_depth</li>
			<li>#si_id &rarr; si_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; si_cmp_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; si_cmp_loaddate</li>
		</ul>
		<h4>b) UPDATE si_cmp WHERE si_cmp_id = '#si_cmp_id'</h4>
		<ul>
			<li>name &rarr; si_cmp_name</li>
			<li>type &rarr; si_cmp_type</li>
			<li>comments &rarr; si_cmp_com</li>
			<li>respDesc &rarr; si_cmp_resp</li>
			<li>sampleRate &rarr; si_cmp_samp</li>
			<li>seedBandCode &rarr; si_cmp_band</li>
			<li>seedInstCode &rarr; si_cmp_icode</li>
			<li>seedOrientCode &rarr; si_cmp_orient</li>
			<li>sensitivity &rarr; si_cmp_sens</li>
			<li>depth &rarr; si_cmp_depth</li>
			<li>#si_id &rarr; si_id</li>
			<li>#pubDate &rarr; si_cmp_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data -->
		<h2 class="wovomlclass"><a name="data" id="data"></a><a href="#wovoml">&lt;wovoml&gt;</a> | &lt;Data&gt;</h2>
		
<pre><strong>&lt;Data&gt;</strong>
	<a href="#data_deformation">&lt;Deformation&gt;...&lt;/Deformation&gt;</a>
	<a href="#data_gas">&lt;Gas&gt;...&lt;/Gas&gt;</a>
	<a href="#data_hydrologic">&lt;Hydrologic&gt;...&lt;/Hydrologic&gt;</a>
	<a href="#data_fields">&lt;Fields&gt;...&lt;/Fields&gt;</a>
	<a href="#data_thermal">&lt;Thermal&gt;...&lt;/Thermal&gt;</a>
	<a href="#data_seismic">&lt;Seismic&gt;...&lt;/Seismic&gt;</a>
<strong>&lt;/Data&gt;</strong></pre>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Deformation -->
		<h2 class="wovomlclass"><a name="data_deformation" id="data_deformation"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | &lt;Deformation&gt;</h2>
		
<pre><strong>&lt;Deformation&gt;</strong>
	<a href="#data_deformation_electronictilt">&lt;ElectronicTilt&gt;...&lt;/ElectronicTilt&gt;</a>
	<a href="#data_deformation_tiltvector">&lt;TiltVector&gt;...&lt;/TiltVector&gt;</a>
	<a href="#data_deformation_strain">&lt;Strain&gt;...&lt;/Strain&gt;</a>
	<a href="#data_deformation_edm">&lt;EDM&gt;...&lt;/EDM&gt;</a>
	<a href="#data_deformation_angle">&lt;Angle&gt;...&lt;/Angle&gt;</a>
	<a href="#data_deformation_gps">&lt;GPS&gt;...&lt;/GPS&gt;</a>
	<a href="#data_deformation_gpsvector">&lt;GPSVector&gt;...&lt;/GPSVector&gt;</a>
	<a href="#data_deformation_leveling">&lt;Leveling&gt;...&lt;/Leveling&gt;</a>
	<a href="#data_deformation_insarimage">&lt;InSARImage&gt;...&lt;/InSARImage&gt;</a>
<strong>&lt;/Deformation&gt;</strong></pre>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Deformation - Electronic tilt -->
		<h2 class="wovomlclass"><a name="data_deformation_electronictilt" id="data_deformation_electronictilt"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_deformation">&lt;Deformation&gt;</a> | &lt;ElectronicTilt&gt;</h2>
		
<pre><strong>&lt;ElectronicTilt code=&quot;...&quot;&gt;</strong>
	&lt;instrumentCode&gt;...&lt;/instrumentCode&gt;		&lt;!-- OR &lt;stationCode&gt;...&lt;/stationCode&gt; --&gt;
	&lt;measTime&gt;...&lt;/measTime&gt;
	&lt;measTimeUnc&gt;...&lt;/measTimeUnc&gt;
	&lt;sampleRate&gt;...&lt;/sampleRate&gt;
	&lt;tilt1&gt;...&lt;/tilt1&gt;
	&lt;tilt1Unc&gt;...&lt;/tilt1Unc&gt;
	&lt;tilt2&gt;...&lt;/tilt2&gt;
	&lt;tilt2Unc&gt;...&lt;/tilt2Unc&gt;
	&lt;processed&gt;...&lt;/processed&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/ElectronicTilt&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT ds_id, ds_stime, ds_stime_unc, ds_etime, ds_etime_unc FROM ds WHERE ds_code = 'stationCode' AND cc_id = #cc_id
				<br/>@current.'measTime' &plusmn; 'measTimeUnc' &isin; [ds_stime &plusmn; ds_stime_unc, ds_etime &plusmn; ds_etime_unc]
				<br/>&rarr; #ds_id1
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT di_tlt_id, di_tlt_stime, di_tlt_stime_unc, di_tlt_etime, di_tlt_etime_unc FROM di_tlt WHERE di_tlt_code = 'instrumentCode' AND cc_id = #cc_id
				<br/>@current.'measTime' &plusmn; 'measTimeUnc' &isin; [di_tlt_stime &plusmn; di_tlt_stime_unc, di_tlt_etime &plusmn; di_tlt_etime_unc]
				<br/>&rarr; #di_tlt_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'measTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
			<li>
				Get microseconds:
				<br/>'measTime'
				<br/>&rarr; #dd_tlt_timecsec
			</li>
			<li>
				Get microseconds:
				<br/>'measTimeUnc'
				<br/>&rarr; #dd_tlt_timecsec_unc
			</li>
			<li>
				Link:
				<br/>SELECT ds_id FROM di_tlt WHERE di_tlt_id = '#di_tlt_id'
				<br/>&rarr; #ds_id2
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT dd_tlt_id FROM dd_tlt WHERE dd_tlt_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #dd_tlt_id
		</p>
		<h4>a) INSERT INTO dd_tlt</h4>
		<ul>
			<li>/code &rarr; dd_tlt_code</li>
			<li>measTime &rarr; dd_tlt_time</li>
			<li>#dd_tlt_timecsec &rarr; dd_tlt_timecsec</li>
			<li>measTimeUnc &rarr; dd_tlt_time_unc</li>
			<li>#dd_tlt_timecsec_unc &rarr; dd_tlt_timecsec_unc</li>
			<li>sampleRate &rarr; dd_tlt_srate</li>
			<li>tilt1 &rarr; dd_tlt1</li>
			<li>tilt1Unc &rarr; dd_tlt_err1</li>
			<li>tilt2 &rarr; dd_tlt2</li>
			<li>tilt2Unc &rarr; dd_tlt_err2</li>
			<li>processed &rarr; dd_tlt_proc_flg</li>
			<li>#ds_id1|#ds_id2 &rarr; ds_id</li>
			<li>#di_tlt_id &rarr; di_tlt_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; dd_tlt_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; dd_tlt_loaddate</li>
		</ul>
		<h4>b) UPDATE dd_tlt WHERE dd_tlt_id = '#dd_tlt_id'</h4>
		<ul>
			<li>measTime &rarr; dd_tlt_time</li>
			<li>#dd_tlt_timecsec &rarr; dd_tlt_timecsec</li>
			<li>measTimeUnc &rarr; dd_tlt_time_unc</li>
			<li>#dd_tlt_timecsec_unc &rarr; dd_tlt_timecsec_unc</li>
			<li>sampleRate &rarr; dd_tlt_srate</li>
			<li>tilt1 &rarr; dd_tlt1</li>
			<li>tilt1Unc &rarr; dd_tlt_err1</li>
			<li>tilt2 &rarr; dd_tlt2</li>
			<li>tilt2Unc &rarr; dd_tlt_err2</li>
			<li>processed &rarr; dd_tlt_proc_flg</li>
			<li>#ds_id1|#ds_id2 &rarr; ds_id</li>
			<li>#di_tlt_id &rarr; di_tlt_id</li>
			<li>#pubDate &rarr; dd_tlt_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Deformation - Tilt vector -->
		<h2 class="wovomlclass"><a name="data_deformation_tiltvector" id="data_deformation_tiltvector"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_deformation">&lt;Deformation&gt;</a> | &lt;TiltVector&gt;</h2>
		
<pre><strong>&lt;TiltVector code=&quot;...&quot;&gt;</strong>
	&lt;instrumentCode&gt;...&lt;/instrumentCode&gt;		&lt;!-- OR &lt;stationCode&gt;...&lt;/stationCode&gt; --&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;magnitude&gt;...&lt;/magnitude&gt;
	&lt;magnitudeUnc&gt;...&lt;/magnitudeUnc&gt;
	&lt;azimuth&gt;...&lt;/azimuth&gt;
	&lt;azimuthUnc&gt;...&lt;/azimuthUnc&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/TiltVector&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT ds_id, ds_stime, ds_stime_unc, ds_etime, ds_etime_unc FROM ds WHERE ds_code = 'stationCode' AND cc_id = #cc_id
				<br/>@current.'startTime' &plusmn; 'startTimeUnc' &isin; [ds_stime &plusmn; ds_stime_unc, ds_etime &plusmn; ds_etime_unc]
				<br/>&rarr; #ds_id1
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT di_tlt_id, di_tlt_stime, di_tlt_stime_unc, di_tlt_etime, di_tlt_etime_unc FROM di_tlt WHERE di_tlt_code = 'instrumentCode' AND cc_id = #cc_id
				<br/>@current.'startTime' &plusmn; 'startTimeUnc' &isin; [di_tlt_stime &plusmn; di_tlt_stime_unc, di_tlt_etime &plusmn; di_tlt_etime_unc]
				<br/>&rarr; #di_tlt_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
			<li>
				Link:
				<br/>SELECT ds_id FROM di_tlt WHERE di_tlt_id = '#di_tlt_id'
				<br/>&rarr; #ds_id2
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT dd_tlv_id FROM dd_tlv WHERE dd_tlv_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #dd_tlv_id
		</p>
		<h4>a) INSERT INTO dd_tlv</h4>
		<ul>
			<li>/code &rarr; dd_tlv_code</li>
			<li>startTime &rarr; dd_tlv_stime</li>
			<li>startTimeUnc &rarr; dd_tlv_stime_unc</li>
			<li>endTime &rarr; dd_tlv_etime</li>
			<li>endTimeUnc &rarr; dd_tlv_etime_unc</li>
			<li>magnitude &rarr; dd_tlv_mag</li>
			<li>magnitudeUnc &rarr; dd_tlv_magerr</li>
			<li>azimuth &rarr; dd_tlv_azi</li>
			<li>azimuthUnc &rarr; dd_tlv_azierr</li>
			<li>comments &rarr; dd_tlv_com</li>
			<li>#ds_id1|#ds_id2 &rarr; ds_id</li>
			<li>#di_tlt_id &rarr; di_tlt_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; dd_tlv_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; dd_tlv_loaddate</li>
		</ul>
		<h4>b) UPDATE dd_tlv WHERE dd_tlv_id = '#dd_tlv_id'</h4>
		<ul>
			<li>startTime &rarr; dd_tlv_stime</li>
			<li>startTimeUnc &rarr; dd_tlv_stime_unc</li>
			<li>endTime &rarr; dd_tlv_etime</li>
			<li>endTimeUnc &rarr; dd_tlv_etime_unc</li>
			<li>magnitude &rarr; dd_tlv_mag</li>
			<li>magnitudeUnc &rarr; dd_tlv_magerr</li>
			<li>azimuth &rarr; dd_tlv_azi</li>
			<li>azimuthUnc &rarr; dd_tlv_azierr</li>
			<li>comments &rarr; dd_tlv_com</li>
			<li>#ds_id1|#ds_id2 &rarr; ds_id</li>
			<li>#di_tlt_id &rarr; di_tlt_id</li>
			<li>#pubDate &rarr; dd_tlv_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Deformation - Strain -->
		<h2 class="wovomlclass"><a name="data_deformation_strain" id="data_deformation_strain"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_deformation">&lt;Deformation&gt;</a> | &lt;Strain&gt;</h2>
		
<pre><strong>&lt;Strain code=&quot;...&quot;&gt;</strong>
	&lt;instrumentCode&gt;...&lt;/instrumentCode&gt;		&lt;!-- OR &lt;stationCode&gt;...&lt;/stationCode&gt; --&gt;
	&lt;measTime&gt;...&lt;/measTime&gt;
	&lt;measTimeUnc&gt;...&lt;/measTimeUnc&gt;
	&lt;component1&gt;...&lt;/component1&gt;
	&lt;component1Unc&gt;...&lt;/component1Unc&gt;
	&lt;component2&gt;...&lt;/component2&gt;
	&lt;component2Unc&gt;...&lt;/component2Unc&gt;
	&lt;component3&gt;...&lt;/component3&gt;
	&lt;component3Unc&gt;...&lt;/component3Unc&gt;
	&lt;component4&gt;...&lt;/component4&gt;
	&lt;component4Unc&gt;...&lt;/component4Unc&gt;
	&lt;volumetricStrain&gt;...&lt;/volumetricStrain&gt;
	&lt;volumetricStrainUnc&gt;...&lt;/volumetricStrainUnc&gt;
	&lt;shearStrainAxis1&gt;...&lt;/shearStrainAxis1&gt;
	&lt;shearStrainAxis1Unc&gt;...&lt;/shearStrainAxis1Unc&gt;
	&lt;azimuthAxis1&gt;...&lt;/azimuthAxis1&gt;
	&lt;shearStrainAxis2&gt;...&lt;/shearStrainAxis2&gt;
	&lt;shearStrainAxis2Unc&gt;...&lt;/shearStrainAxis2Unc&gt;
	&lt;azimuthAxis2&gt;...&lt;/azimuthAxis2&gt;
	&lt;shearStrainAxis3&gt;...&lt;/shearStrainAxis3&gt;
	&lt;shearStrainAxis3Unc&gt;...&lt;/shearStrainAxis3Unc&gt;
	&lt;azimuthAxis3&gt;...&lt;/azimuthAxis3&gt;
	&lt;minPrincipalStrain&gt;...&lt;/minPrincipalStrain&gt;
	&lt;minPrincipalStrainUnc&gt;...&lt;/minPrincipalStrainUnc&gt;
	&lt;maxPrincipalStrain&gt;...&lt;/maxPrincipalStrain&gt;
	&lt;maxPrincipalStrainUnc&gt;...&lt;/maxPrincipalStrainUnc&gt;
	&lt;minPrincipalStrainDir&gt;...&lt;/minPrincipalStrainDir&gt;
	&lt;minPrincipalStrainDirUnc&gt;...&lt;/minPrincipalStrainDirUnc&gt;
	&lt;maxPrincipalStrainDir&gt;...&lt;/maxPrincipalStrainDir&gt;
	&lt;maxPrincipalStrainDirUnc&gt;...&lt;/maxPrincipalStrainDirUnc&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/Strain&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT ds_id, ds_stime, ds_stime_unc, ds_etime, ds_etime_unc FROM ds WHERE ds_code = 'stationCode' AND cc_id = #cc_id
				<br/>@current.'measTime' &plusmn; 'measTimeUnc' &isin; [ds_stime &plusmn; ds_stime_unc, ds_etime &plusmn; ds_etime_unc]
				<br/>&rarr; #ds_id1
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT di_tlt_id, di_tlt_stime, di_tlt_stime_unc, di_tlt_etime, di_tlt_etime_unc FROM di_tlt WHERE di_tlt_code = 'instrumentCode' AND cc_id = #cc_id
				<br/>@current.'measTime' &plusmn; 'measTimeUnc' &isin; [di_tlt_stime &plusmn; di_tlt_stime_unc, di_tlt_etime &plusmn; di_tlt_etime_unc]
				<br/>&rarr; #di_tlt_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'measTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
			<li>
				Link:
				<br/>SELECT ds_id FROM di_tlt WHERE di_tlt_id = '#di_tlt_id'
				<br/>&rarr; #ds_id2
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT dd_str_id FROM dd_str WHERE dd_str_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #dd_str_id
		</p>
		<h4>a) INSERT INTO dd_str</h4>
		<ul>
			<li>/code &rarr; dd_str_code</li>
			<li>measTime &rarr; dd_str_time</li>
			<li>measTimeUnc &rarr; dd_str_time_unc</li>
			<li>component1 &rarr; dd_str_comp1</li>
			<li>component1Unc &rarr; dd_str_err1</li>
			<li>component2 &rarr; dd_str_comp2</li>
			<li>component2Unc &rarr; dd_str_err2</li>
			<li>component3 &rarr; dd_str_comp3</li>
			<li>component3Unc &rarr; dd_str_err3</li>
			<li>component4 &rarr; dd_str_comp4</li>
			<li>component4Unc &rarr; dd_str_err4</li>
			<li>volumetricStrain &rarr; dd_str_vdstr</li>
			<li>volumetricStrainUnc &rarr; dd_str_vdstr_err</li>
			<li>shearStrainAxis1 &rarr; dd_str_sstr_ax1</li>
			<li>shearStrainAxis1Unc &rarr; dd_str_stderr1</li>
			<li>azimuthAxis1 &rarr; dd_str_azi_ax1</li>
			<li>shearStrainAxis2 &rarr; dd_str_sstr_ax2</li>
			<li>shearStrainAxis2Unc &rarr; dd_str_stderr2</li>
			<li>azimuthAxis2 &rarr; dd_str_azi_ax2</li>
			<li>shearStrainAxis3 &rarr; dd_str_sstr_ax3</li>
			<li>shearStrainAxis3Unc &rarr; dd_str_stderr3</li>
			<li>azimuthAxis3 &rarr; dd_str_azi_ax3</li>
			<li>minPrincipalStrain &rarr; dd_str_pmin</li>
			<li>minPrincipalStrainUnc &rarr; dd_str_pminerr</li>
			<li>maxPrincipalStrain &rarr; dd_str_pmax</li>
			<li>maxPrincipalStrainUnc &rarr; dd_str_pmaxerr</li>
			<li>minPrincipalStrainDir &rarr; dd_str_pmin_dir</li>
			<li>minPrincipalStrainDirUnc &rarr; dd_str_pmin_direrr</li>
			<li>maxPrincipalStrainDir &rarr; dd_str_pmax_dir</li>
			<li>maxPrincipalStrainDirUnc &rarr; dd_str_pmax_direrr</li>
			<li>comments &rarr; dd_str_com</li>
			<li>#ds_id1|#ds_id2 &rarr; ds_id</li>
			<li>#di_tlt_id &rarr; di_tlt_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; dd_str_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; dd_str_loaddate</li>
		</ul>
		<h4>b) UPDATE dd_str WHERE dd_str_id = '#dd_str_id'</h4>
		<ul>
			<li>measTime &rarr; dd_str_time</li>
			<li>measTimeUnc &rarr; dd_str_time_unc</li>
			<li>component1 &rarr; dd_str_comp1</li>
			<li>component1Unc &rarr; dd_str_err1</li>
			<li>component2 &rarr; dd_str_comp2</li>
			<li>component2Unc &rarr; dd_str_err2</li>
			<li>component3 &rarr; dd_str_comp3</li>
			<li>component3Unc &rarr; dd_str_err3</li>
			<li>component4 &rarr; dd_str_comp4</li>
			<li>component4Unc &rarr; dd_str_err4</li>
			<li>volumetricStrain &rarr; dd_str_vdstr</li>
			<li>volumetricStrainUnc &rarr; dd_str_vdstr_err</li>
			<li>shearStrainAxis1 &rarr; dd_str_sstr_ax1</li>
			<li>shearStrainAxis1Unc &rarr; dd_str_stderr1</li>
			<li>azimuthAxis1 &rarr; dd_str_azi_ax1</li>
			<li>shearStrainAxis2 &rarr; dd_str_sstr_ax2</li>
			<li>shearStrainAxis2Unc &rarr; dd_str_stderr2</li>
			<li>azimuthAxis2 &rarr; dd_str_azi_ax2</li>
			<li>shearStrainAxis3 &rarr; dd_str_sstr_ax3</li>
			<li>shearStrainAxis3Unc &rarr; dd_str_stderr3</li>
			<li>azimuthAxis3 &rarr; dd_str_azi_ax3</li>
			<li>minPrincipalStrain &rarr; dd_str_pmin</li>
			<li>minPrincipalStrainUnc &rarr; dd_str_pminerr</li>
			<li>maxPrincipalStrain &rarr; dd_str_pmax</li>
			<li>maxPrincipalStrainUnc &rarr; dd_str_pmaxerr</li>
			<li>minPrincipalStrainDir &rarr; dd_str_pmin_dir</li>
			<li>minPrincipalStrainDirUnc &rarr; dd_str_pmin_direrr</li>
			<li>maxPrincipalStrainDir &rarr; dd_str_pmax_dir</li>
			<li>maxPrincipalStrainDirUnc &rarr; dd_str_pmax_direrr</li>
			<li>comments &rarr; dd_str_com</li>
			<li>#ds_id1|#ds_id2 &rarr; ds_id</li>
			<li>#di_tlt_id &rarr; di_tlt_id</li>
			<li>#pubDate &rarr; dd_str_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Deformation - EDM -->
		<h2 class="wovomlclass"><a name="data_deformation_edm" id="data_deformation_edm"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_deformation">&lt;Deformation&gt;</a> | &lt;EDM&gt;</h2>
		
<pre><strong>&lt;EDM code=&quot;...&quot;&gt;</strong>
	&lt;instrumentCode&gt;...&lt;/instrumentCode&gt;		&lt;!-- OR &lt;instStationCode&gt;...&lt;/instStationCode&gt; --&gt;
	&lt;targetStationCode&gt;...&lt;/targetStationCode&gt;
	&lt;measTime&gt;...&lt;/measTime&gt;
	&lt;measTimeUnc&gt;...&lt;/measTimeUnc&gt;
	&lt;lineLength&gt;...&lt;/lineLength&gt;
	&lt;constantErr&gt;...&lt;/constantErr&gt;
	&lt;scaleErr&gt;...&lt;/scaleErr&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/EDM&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT ds_id, ds_stime, ds_stime_unc, ds_etime, ds_etime_unc FROM ds WHERE ds_code = 'instStationCode' AND cc_id = #cc_id
				<br/>@current.'measTime' &plusmn; 'measTimeUnc' &isin; [ds_stime &plusmn; ds_stime_unc, ds_etime &plusmn; ds_etime_unc]
				<br/>&rarr; #ds_id1
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT ds_id, ds_stime, ds_stime_unc, ds_etime, ds_etime_unc FROM ds WHERE ds_code = 'targetStationCode' AND cc_id = #cc_id
				<br/>@current.'measTime' &plusmn; 'measTimeUnc' &isin; [ds_stime &plusmn; ds_stime_unc, ds_etime &plusmn; ds_etime_unc]
				<br/>&rarr; #ds_id2
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT di_gen_id, di_gen_stime, di_gen_stime_unc, di_gen_etime, di_gen_etime_unc FROM di_gen WHERE di_gen_code = 'instrumentCode' AND cc_id = #cc_id
				<br/>@current.'measTime' &plusmn; 'measTimeUnc' &isin; [di_gen_stime &plusmn; di_gen_stime_unc, di_gen_etime &plusmn; di_gen_etime_unc]
				<br/>&rarr; #di_gen_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'measTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
			<li>
				Link:
				<br/>SELECT ds_id FROM di_gen WHERE di_gen_id = '#di_gen_id'
				<br/>&rarr; #ds_id3
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT dd_edm_id FROM dd_edm WHERE dd_edm_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #dd_edm_id
		</p>
		<h4>a) INSERT INTO dd_edm</h4>
		<ul>
			<li>/code &rarr; dd_edm_code</li>
			<li>measTime &rarr; dd_edm_time</li>
			<li>measTimeUnc &rarr; dd_edm_time_unc</li>
			<li>lineLength &rarr; dd_edm_line</li>
			<li>constantErr &rarr; dd_edm_cerr</li>
			<li>scaleErr &rarr; dd_edm_serr</li>
			<li>#ds_id1|#ds_id3 &rarr; ds_id1</li>
			<li>#ds_id2 &rarr; ds_id2</li>
			<li>#di_gen_id &rarr; di_gen_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; dd_edm_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; dd_edm_loaddate</li>
		</ul>
		<h4>b) UPDATE dd_edm WHERE dd_edm_id = '#dd_edm_id'</h4>
		<ul>
			<li>measTime &rarr; dd_edm_time</li>
			<li>measTimeUnc &rarr; dd_edm_time_unc</li>
			<li>lineLength &rarr; dd_edm_line</li>
			<li>constantErr &rarr; dd_edm_cerr</li>
			<li>scaleErr &rarr; dd_edm_serr</li>
			<li>#ds_id1|#ds_id3 &rarr; ds_id1</li>
			<li>#ds_id2 &rarr; ds_id2</li>
			<li>#di_gen_id &rarr; di_gen_id</li>
			<li>#pubDate &rarr; dd_edm_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Deformation - Angle -->
		<h2 class="wovomlclass"><a name="data_deformation_angle" id="data_deformation_angle"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_deformation">&lt;Deformation&gt;</a> | &lt;Angle&gt;</h2>
		
<pre><strong>&lt;Angle code=&quot;...&quot;&gt;</strong>
	&lt;instrumentCode&gt;...&lt;/instrumentCode&gt;		&lt;!-- OR &lt;instStationCode&gt;...&lt;/instStationCode&gt; --&gt;
	&lt;targetStation1Code&gt;...&lt;/targetStation1Code&gt;
	&lt;targetStation2Code&gt;...&lt;/targetStation2Code&gt;
	&lt;measTime&gt;...&lt;/measTime&gt;
	&lt;measTimeUnc&gt;...&lt;/measTimeUnc&gt;
	&lt;hAngle1&gt;...&lt;/hAngle1&gt;
	&lt;hAngle1Unc&gt;...&lt;/hAngle1Unc&gt;
	&lt;hAngle2&gt;...&lt;/hAngle2&gt;
	&lt;hAngle2Unc&gt;...&lt;/hAngle2Unc&gt;
	&lt;vAngle1&gt;...&lt;/vAngle1&gt;
	&lt;vAngle1Unc&gt;...&lt;/vAngle1Unc&gt;
	&lt;vAngle2&gt;...&lt;/vAngle2&gt;
	&lt;vAngle2Unc&gt;...&lt;/vAngle2Unc&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/Angle&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT ds_id, ds_stime, ds_stime_unc, ds_etime, ds_etime_unc FROM ds WHERE ds_code = 'instStationCode' AND cc_id = #cc_id
				<br/>@current.'measTime' &plusmn; 'measTimeUnc' &isin; [ds_stime &plusmn; ds_stime_unc, ds_etime &plusmn; ds_etime_unc]
				<br/>&rarr; #ds_id1
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT ds_id, ds_stime, ds_stime_unc, ds_etime, ds_etime_unc FROM ds WHERE ds_code = 'targetStation1Code' AND cc_id = #cc_id
				<br/>@current.'measTime' &plusmn; 'measTimeUnc' &isin; [ds_stime &plusmn; ds_stime_unc, ds_etime &plusmn; ds_etime_unc]
				<br/>&rarr; #ds_id2
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT ds_id, ds_stime, ds_stime_unc, ds_etime, ds_etime_unc FROM ds WHERE ds_code = 'targetStation2Code' AND cc_id = #cc_id
				<br/>@current.'measTime' &plusmn; 'measTimeUnc' &isin; [ds_stime &plusmn; ds_stime_unc, ds_etime &plusmn; ds_etime_unc]
				<br/>&rarr; #ds_id3
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT di_gen_id, di_gen_stime, di_gen_stime_unc, di_gen_etime, di_gen_etime_unc FROM di_gen WHERE di_gen_code = 'instrumentCode' AND cc_id = #cc_id
				<br/>@current.'measTime' &plusmn; 'measTimeUnc' &isin; [di_gen_stime &plusmn; di_gen_stime_unc, di_gen_etime &plusmn; di_gen_etime_unc]
				<br/>&rarr; #di_gen_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'measTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
			<li>
				Link:
				<br/>SELECT ds_id FROM di_gen WHERE di_gen_id = '#di_gen_id'
				<br/>&rarr; #ds_id4
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT dd_ang_id FROM dd_ang WHERE dd_ang_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #dd_ang_id
		</p>
		<h4>a) INSERT INTO dd_ang</h4>
		<ul>
			<li>/code &rarr; dd_ang_code</li>
			<li>measTime &rarr; dd_ang_time</li>
			<li>measTimeUnc &rarr; dd_ang_time_unc</li>
			<li>hAngle1 &rarr; dd_ang_hort1</li>
			<li>hAngle1Unc &rarr; dd_ang_herr1</li>
			<li>hAngle2 &rarr; dd_ang_hort2</li>
			<li>hAngle2Unc &rarr; dd_ang_herr2</li>
			<li>vAngle1 &rarr; dd_ang_vert1</li>
			<li>vAngle1Unc &rarr; dd_ang_verr1</li>
			<li>vAngle2 &rarr; dd_ang_vert2</li>
			<li>vAngle2Unc &rarr; dd_ang_verr2</li>
			<li>comments &rarr; dd_ang_com</li>
			<li>#ds_id1|#ds_id4 &rarr; ds_id</li>
			<li>#ds_id2 &rarr; ds_id1</li>
			<li>#ds_id3 &rarr; ds_id2</li>
			<li>#di_gen_id &rarr; di_gen_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; dd_ang_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; dd_ang_loaddate</li>
		</ul>
		<h4>b) UPDATE dd_ang WHERE dd_ang_id = '#dd_ang_id'</h4>
		<ul>
			<li>measTime &rarr; dd_ang_time</li>
			<li>measTimeUnc &rarr; dd_ang_time_unc</li>
			<li>hAngle1 &rarr; dd_ang_hort1</li>
			<li>hAngle1Unc &rarr; dd_ang_herr1</li>
			<li>hAngle2 &rarr; dd_ang_hort2</li>
			<li>hAngle2Unc &rarr; dd_ang_herr2</li>
			<li>vAngle1 &rarr; dd_ang_vert1</li>
			<li>vAngle1Unc &rarr; dd_ang_verr1</li>
			<li>vAngle2 &rarr; dd_ang_vert2</li>
			<li>vAngle2Unc &rarr; dd_ang_verr2</li>
			<li>comments &rarr; dd_ang_com</li>
			<li>#ds_id1|#ds_id4 &rarr; ds_id</li>
			<li>#ds_id2 &rarr; ds_id1</li>
			<li>#ds_id3 &rarr; ds_id2</li>
			<li>#di_gen_id &rarr; di_gen_id</li>
			<li>#pubDate &rarr; dd_ang_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Deformation - GPS -->
		<h2 class="wovomlclass"><a name="data_deformation_gps" id="data_deformation_gps"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_deformation">&lt;Deformation&gt;</a> | &lt;GPS&gt;</h2>
		
<pre><strong>&lt;GPS code=&quot;...&quot;&gt;</strong>
	&lt;instrumentCode&gt;...&lt;/instrumentCode&gt;		&lt;!-- OR &lt;instStationCode&gt;...&lt;/instStationCode&gt; --&gt;
	&lt;targetStation1Code&gt;...&lt;/targetStation1Code&gt;
	&lt;targetStation2Code&gt;...&lt;/targetStation2Code&gt;
	&lt;measTime&gt;...&lt;/measTime&gt;
	&lt;measTimeUnc&gt;...&lt;/measTimeUnc&gt;
	&lt;lat&gt;...&lt;/lat&gt;
	&lt;lon&gt;...&lt;/lon&gt;
	&lt;elev&gt;...&lt;/elev&gt;
	&lt;N-SErr&gt;...&lt;/N-SErr&gt;
	&lt;E-WErr&gt;...&lt;/E-WErr&gt;
	&lt;verticalErr&gt;...&lt;/verticalErr&gt;
	&lt;software&gt;...&lt;/software&gt;
	&lt;orbits&gt;...&lt;/orbits&gt;
	&lt;duration&gt;...&lt;/duration&gt;
	&lt;quality&gt;...&lt;/quality&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/GPS&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT ds_id, ds_stime, ds_stime_unc, ds_etime, ds_etime_unc FROM ds WHERE ds_code = 'instStationCode' AND cc_id = #cc_id
				<br/>@current.'measTime' &plusmn; 'measTimeUnc' &isin; [ds_stime &plusmn; ds_stime_unc, ds_etime &plusmn; ds_etime_unc]
				<br/>&rarr; #ds_id1
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT ds_id, ds_stime, ds_stime_unc, ds_etime, ds_etime_unc FROM ds WHERE ds_code = 'targetStation1Code' AND cc_id = #cc_id
				<br/>@current.'measTime' &plusmn; 'measTimeUnc' &isin; [ds_stime &plusmn; ds_stime_unc, ds_etime &plusmn; ds_etime_unc]
				<br/>&rarr; #ds_id_ref1
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT ds_id, ds_stime, ds_stime_unc, ds_etime, ds_etime_unc FROM ds WHERE ds_code = 'targetStation2Code' AND cc_id = #cc_id
				<br/>@current.'measTime' &plusmn; 'measTimeUnc' &isin; [ds_stime &plusmn; ds_stime_unc, ds_etime &plusmn; ds_etime_unc]
				<br/>&rarr; #ds_id_ref2
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT di_gen_id, di_gen_stime, di_gen_stime_unc, di_gen_etime, di_gen_etime_unc FROM di_gen WHERE di_gen_code = 'instrumentCode' AND cc_id = #cc_id
				<br/>@current.'measTime' &plusmn; 'measTimeUnc' &isin; [di_gen_stime &plusmn; di_gen_stime_unc, di_gen_etime &plusmn; di_gen_etime_unc]
				<br/>&rarr; #di_gen_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'measTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
			<li>
				Link:
				<br/>SELECT ds_id FROM di_gen WHERE di_gen_id = '#di_gen_id'
				<br/>&rarr; #ds_id2
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT dd_gps_id FROM dd_gps WHERE dd_gps_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #dd_gps_id
		</p>
		<h4>a) INSERT INTO dd_gps</h4>
		<ul>
			<li>/code &rarr; dd_gps_code</li>
			<li>measTime &rarr; dd_gps_time</li>
			<li>measTimeUnc &rarr; dd_gps_time_unc</li>
			<li>lat &rarr; dd_gps_lat</li>
			<li>lon &rarr; dd_gps_lon</li>
			<li>elev &rarr; dd_gps_elev</li>
			<li>N-SErr &rarr; dd_gps_nserr</li>
			<li>E-WErr &rarr; dd_gps_ewerr</li>
			<li>verticalErr &rarr; dd_gps_verr</li>
			<li>software &rarr; dd_gps_software</li>
			<li>orbits &rarr; dd_gps_orbits</li>
			<li>duration &rarr; dd_gps_dur</li>
			<li>quality &rarr; dd_gps_qual</li>
			<li>#ds_id1|#ds_id2 &rarr; ds_id</li>
			<li>#ds_id_ref1 &rarr; ds_id_ref1</li>
			<li>#ds_id_ref2 &rarr; ds_id_ref2</li>
			<li>#di_gen_id &rarr; di_gen_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; dd_gps_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; dd_gps_loaddate</li>
		</ul>
		<h4>b) UPDATE dd_gps WHERE dd_gps_id = '#dd_gps_id'</h4>
		<ul>
			<li>measTime &rarr; dd_gps_time</li>
			<li>measTimeUnc &rarr; dd_gps_time_unc</li>
			<li>lat &rarr; dd_gps_lat</li>
			<li>lon &rarr; dd_gps_lon</li>
			<li>elev &rarr; dd_gps_elev</li>
			<li>N-SErr &rarr; dd_gps_nserr</li>
			<li>E-WErr &rarr; dd_gps_ewerr</li>
			<li>verticalErr &rarr; dd_gps_verr</li>
			<li>software &rarr; dd_gps_software</li>
			<li>orbits &rarr; dd_gps_orbits</li>
			<li>duration &rarr; dd_gps_dur</li>
			<li>quality &rarr; dd_gps_qual</li>
			<li>#ds_id1|#ds_id2 &rarr; ds_id</li>
			<li>#ds_id_ref1 &rarr; ds_id_ref1</li>
			<li>#ds_id_ref2 &rarr; ds_id_ref2</li>
			<li>#di_gen_id &rarr; di_gen_id</li>
			<li>#pubDate &rarr; dd_gps_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Deformation - GPS vector -->
		<h2 class="wovomlclass"><a name="data_deformation_gpsvector" id="data_deformation_gpsvector"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_deformation">&lt;Deformation&gt;</a> | &lt;GPSVector&gt;</h2>
		
<pre><strong>&lt;GPSVector code=&quot;...&quot;&gt;</strong>
	&lt;instrumentCode&gt;...&lt;/instrumentCode&gt;		&lt;!-- OR &lt;stationCode&gt;...&lt;/stationCode&gt; --&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;magnitude&gt;...&lt;/magnitude&gt;
	&lt;azimuth&gt;...&lt;/azimuth&gt;
	&lt;inclination&gt;...&lt;/inclination&gt;
	&lt;northDispl&gt;...&lt;/northDispl&gt;
	&lt;northDisplErr&gt;...&lt;/northDisplErr&gt;
	&lt;eastDispl&gt;...&lt;/eastDispl&gt;
	&lt;eastDisplErr&gt;...&lt;/eastDisplErr&gt;
	&lt;vertDispl&gt;...&lt;/vertDispl&gt;
	&lt;vertDisplErr&gt;...&lt;/vertDisplErr&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/GPSVector&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT ds_id, ds_stime, ds_stime_unc, ds_etime, ds_etime_unc FROM ds WHERE ds_code = 'stationCode' AND cc_id = #cc_id
				<br/>@current.'startTime' &plusmn; 'startTimeUnc' &isin; [ds_stime &plusmn; ds_stime_unc, ds_etime &plusmn; ds_etime_unc]
				<br/>&rarr; #ds_id1
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT di_gen_id, di_gen_stime, di_gen_stime_unc, di_gen_etime, di_gen_etime_unc FROM di_gen WHERE di_gen_code = 'instrumentCode' AND cc_id = #cc_id
				<br/>@current.'startTime' &plusmn; 'startTimeUnc' &isin; [di_gen_stime &plusmn; di_gen_stime_unc, di_gen_etime &plusmn; di_gen_etime_unc]
				<br/>&rarr; #di_gen_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
			<li>
				Link:
				<br/>SELECT ds_id FROM di_gen WHERE di_gen_id = '#di_gen_id'
				<br/>&rarr; #ds_id2
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT dd_gpv_id FROM dd_gpv WHERE dd_gpv_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #dd_gpv_id
		</p>
		<h4>a) INSERT INTO dd_gpv</h4>
		<ul>
			<li>/code &rarr; dd_gpv_code</li>
			<li>startTime &rarr; dd_gpv_stime</li>
			<li>startTimeUnc &rarr; dd_gpv_stime_unc</li>
			<li>endTime &rarr; dd_gpv_etime</li>
			<li>endTimeUnc &rarr; dd_gpv_etime_unc</li>
			<li>magnitude &rarr; dd_gpv_dmag</li>
			<li>azimuth &rarr; dd_gpv_daz</li>
			<li>inclination &rarr; dd_gpv_vincl</li>
			<li>northDispl &rarr; dd_gpv_N</li>
			<li>northDisplErr &rarr; dd_gpv_dnerr</li>
			<li>eastDispl &rarr; dd_gpv_E</li>
			<li>eastDisplErr &rarr; dd_gpv_deerr</li>
			<li>vertDispl &rarr; dd_gpv_vert</li>
			<li>vertDisplErr &rarr; dd_gpv_dverr</li>
			<li>comments &rarr; dd_gpv_com</li>
			<li>#ds_id1|#ds_id2 &rarr; ds_id</li>
			<li>#di_gen_id &rarr; di_gen_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; dd_gpv_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; dd_gpv_loaddate</li>
		</ul>
		<h4>b) UPDATE dd_gpv WHERE dd_gpv_id = '#dd_gpv_id'</h4>
		<ul>
			<li>startTime &rarr; dd_gpv_stime</li>
			<li>startTimeUnc &rarr; dd_gpv_stime_unc</li>
			<li>endTime &rarr; dd_gpv_etime</li>
			<li>endTimeUnc &rarr; dd_gpv_etime_unc</li>
			<li>magnitude &rarr; dd_gpv_dmag</li>
			<li>azimuth &rarr; dd_gpv_daz</li>
			<li>inclination &rarr; dd_gpv_vincl</li>
			<li>northDispl &rarr; dd_gpv_N</li>
			<li>northDisplErr &rarr; dd_gpv_dnerr</li>
			<li>eastDispl &rarr; dd_gpv_E</li>
			<li>eastDisplErr &rarr; dd_gpv_deerr</li>
			<li>vertDispl &rarr; dd_gpv_vert</li>
			<li>vertDisplErr &rarr; dd_gpv_dverr</li>
			<li>comments &rarr; dd_gpv_com</li>
			<li>#ds_id1|#ds_id2 &rarr; ds_id</li>
			<li>#di_gen_id &rarr; di_gen_id</li>
			<li>#pubDate &rarr; dd_gpv_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Deformation - Leveling -->
		<h2 class="wovomlclass"><a name="data_deformation_leveling" id="data_deformation_leveling"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_deformation">&lt;Deformation&gt;</a> | &lt;Leveling&gt;</h2>
		
<pre><strong>&lt;Leveling code=&quot;...&quot;&gt;</strong>
&lt;instrumentCode&gt;...&lt;/instrumentCode&gt;
&lt;refStationCode&gt;...&lt;/refStationCode&gt;
&lt;firstBMStationCode&gt;...&lt;/firstBMStationCode&gt;
&lt;secondBMStationCode&gt;...&lt;/secondBMStationCode&gt;
&lt;order&gt;...&lt;/order&gt;
&lt;class&gt;...&lt;/class&gt;
&lt;measTime&gt;...&lt;/measTime&gt;
&lt;measTimeUnc&gt;...&lt;/measTimeUnc&gt;
&lt;elevChange&gt;...&lt;/elevChange&gt;
&lt;elevChangeUnc&gt;...&lt;/elevChangeUnc&gt;
&lt;comments&gt;...&lt;/comments&gt;
&lt;ownerCode&gt;...&lt;/ownerCode&gt;
&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/Leveling&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT ds_id, ds_stime, ds_stime_unc, ds_etime, ds_etime_unc FROM ds WHERE ds_code = 'refStationCode' AND cc_id = #cc_id
				<br/>@current.'measTime' &plusmn; 'measTimeUnc' &isin; [ds_stime &plusmn; ds_stime_unc, ds_etime &plusmn; ds_etime_unc]
				<br/>&rarr; #ds_id_ref
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT ds_id, ds_stime, ds_stime_unc, ds_etime, ds_etime_unc FROM ds WHERE ds_code = 'firstBMStationCode' AND cc_id = #cc_id
				<br/>@current.'measTime' &plusmn; 'measTimeUnc' &isin; [ds_stime &plusmn; ds_stime_unc, ds_etime &plusmn; ds_etime_unc]
				<br/>&rarr; #ds_id1
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT ds_id, ds_stime, ds_stime_unc, ds_etime, ds_etime_unc FROM ds WHERE ds_code = 'secondBMStationCode' AND cc_id = #cc_id
				<br/>@current.'measTime' &plusmn; 'measTimeUnc' &isin; [ds_stime &plusmn; ds_stime_unc, ds_etime &plusmn; ds_etime_unc]
				<br/>&rarr; #ds_id2
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT di_gen_id, di_gen_stime, di_gen_stime_unc, di_gen_etime, di_gen_etime_unc FROM di_gen WHERE di_gen_code = 'instrumentCode' AND cc_id = #cc_id
				<br/>@current.'measTime' &plusmn; 'measTimeUnc' &isin; [di_gen_stime &plusmn; di_gen_stime_unc, di_gen_etime &plusmn; di_gen_etime_unc]
				<br/>&rarr; #di_gen_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'measTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT dd_lev_id FROM dd_lev WHERE dd_lev_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #dd_lev_id
		</p>
		<h4>a) INSERT INTO dd_lev</h4>
		<ul>
			<li>/code &rarr; dd_lev_code</li>
			<li>order &rarr; dd_lev_ord</li>
			<li>class &rarr; dd_lev_class</li>
			<li>measTime &rarr; dd_lev_time</li>
			<li>measTimeUnc &rarr; dd_lev_time_unc</li>
			<li>elevChange &rarr; dd_lev_delev</li>
			<li>elevChangeUnc &rarr; dd_lev_herr</li>
			<li>comments &rarr; dd_lev_com</li>
			<li>#ds_id_ref &rarr; ds_id_ref</li>
			<li>#ds_id1 &rarr; ds_id1</li>
			<li>#ds_id2 &rarr; ds_id2</li>
			<li>#di_gen_id &rarr; di_gen_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; dd_lev_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; dd_lev_loaddate</li>
		</ul>
		<h4>b) UPDATE dd_lev WHERE dd_lev_id = '#dd_lev_id'</h4>
		<ul>
			<li>order &rarr; dd_lev_ord</li>
			<li>class &rarr; dd_lev_class</li>
			<li>measTime &rarr; dd_lev_time</li>
			<li>measTimeUnc &rarr; dd_lev_time_unc</li>
			<li>elevChange &rarr; dd_lev_delev</li>
			<li>elevChangeUnc &rarr; dd_lev_herr</li>
			<li>comments &rarr; dd_lev_com</li>
			<li>#ds_id_ref &rarr; ds_id_ref</li>
			<li>#ds_id1 &rarr; ds_id1</li>
			<li>#ds_id2 &rarr; ds_id2</li>
			<li>#di_gen_id &rarr; di_gen_id</li>
			<li>#pubDate &rarr; dd_lev_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Deformation - InSAR image -->
		<h2 class="wovomlclass"><a name="data_deformation_insarimage" id="data_deformation_insarimage"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_deformation">&lt;Deformation&gt;</a> | &lt;InSARImage&gt;</h2>
		
<pre><strong>&lt;InSARImage code=&quot;...&quot;&gt;</strong>
	<a href="#data_deformation_insarimage_satellites">&lt;Satellites&gt;...&lt;/Satellites&gt;</a>
	&lt;volcanoCode&gt;...&lt;/volcanoCode&gt;
	&lt;startLat&gt;...&lt;/startLat&gt;
	&lt;startLon&gt;...&lt;/startLon&gt;
	&lt;startPosition&gt;...&lt;/startPosition&gt;
	&lt;rowOrder&gt;...&lt;/rowOrder&gt;
	&lt;numbOfRows&gt;...&lt;/numbOfRows&gt;
	&lt;numbOfCols&gt;...&lt;/numbOfCols&gt;
	&lt;units&gt;...&lt;/units&gt;
	&lt;nullValue&gt;...&lt;/nullValue&gt;
	&lt;location&gt;...&lt;/location&gt;
	&lt;pair&gt;...&lt;/pair&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;DEM&gt;...&lt;/DEM&gt;
	&lt;bytesOrder&gt;...&lt;/bytesOrder&gt;
	&lt;img1Time&gt;...&lt;/img1Time&gt;
	&lt;img1TimeUnc&gt;...&lt;/img1TimeUnc&gt;
	&lt;img2Time&gt;...&lt;/img2Time&gt;
	&lt;img2TimeUnc&gt;...&lt;/img2TimeUnc&gt;
	&lt;metersPixelSize&gt;...&lt;/metersPixelSize&gt;
	&lt;degreesPixelSize&gt;...&lt;/degreesPixelSize&gt;
	&lt;lookAngle&gt;...&lt;/lookAngle&gt;
	&lt;limb&gt;...&lt;/limb&gt;
	&lt;processMethod&gt;...&lt;/processMethod&gt;
	&lt;software&gt;...&lt;/software&gt;
	&lt;DEMQuality&gt;...&lt;/DEMQuality&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
	<a href="#data_deformation_insarimage_insarpixels">&lt;InSARPixels&gt;...&lt;/InSARPixels&gt;</a>
<strong>&lt;/InSARImage&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Volcano:
				<br/>SELECT vd_id FROM vd_inf WHERE vd_cavw = 'volcanoCode'
				<br/>&rarr; #vd_id
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT di_gen_id, di_gen_stime, di_gen_stime_unc, di_gen_etime, di_gen_etime_unc FROM di_gen WHERE di_gen_code = 'instrumentCode' AND cc_id = #cc_id
				<br/>@current.'img1Time' &plusmn; 'img1TimeUnc' &isin; [di_gen_stime &plusmn; di_gen_stime_unc, di_gen_etime &plusmn; di_gen_etime_unc]
				<br/>&rarr; #di_gen_id
			</li>
			<li>
				Time order:
				<br/>'img1Time' &le; 'img2Time'
			</li>
			<li>
				Publish date:
				<ul>
					<li>'img2Time' + 2 years</li>
					<li>'img1Time' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT dd_sar_id FROM dd_sar WHERE dd_sar_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #dd_sar_id
		</p>
		<h4>a) INSERT INTO dd_sar</h4>
		<ul>
			<li>/code &rarr; dd_sar_code</li>
			<li>startLat &rarr; dd_sar_slat</li>
			<li>startLon &rarr; dd_sar_slon</li>
			<li>startPosition &rarr; dd_sar_spos</li>
			<li>rowOrder &rarr; dd_sar_rord</li>
			<li>numbOfRows &rarr; dd_sar_nrows</li>
			<li>numbOfCols &rarr; dd_sar_ncols</li>
			<li>units &rarr; dd_sar_units</li>
			<li>nullValue &rarr; dd_sar_ndata</li>
			<li>location &rarr; dd_sar_loc</li>
			<li>pair &rarr; dd_sar_pair</li>
			<li>description &rarr; dd_sar_desc</li>
			<li>DEM &rarr; dd_sar_dem</li>
			<li>bytesOrder &rarr; dd_sar_dord</li>
			<li>img1Time &rarr; dd_sar_img1_time</li>
			<li>img1TimeUnc &rarr; dd_sar_img1_time_unc</li>
			<li>img2Time &rarr; dd_sar_img2_time</li>
			<li>img2TimeUnc &rarr; dd_sar_img2_time_unc</li>
			<li>metersPixelSize &rarr; dd_sar_pixsiz</li>
			<li>degreesPixelSize &rarr; dd_sar_spacing</li>
			<li>lookAngle &rarr; dd_sar_lookang</li>
			<li>limb &rarr; dd_sar_limb</li>
			<li>processMethod &rarr; dd_sar_prometh</li>
			<li>software &rarr; dd_sar_softwr</li>
			<li>DEMQuality &rarr; dd_sar_dem_qual</li>
			<li>#di_gen_id &rarr; di_gen_id</li>
			<li>#vd_id &rarr; vd_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; dd_sar_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; dd_sar_loaddate</li>
		</ul>
		<h4>b) UPDATE dd_sar WHERE dd_sar_id = '#dd_sar_id'</h4>
		<ul>
			<li>startLat &rarr; dd_sar_slat</li>
			<li>startLon &rarr; dd_sar_slon</li>
			<li>startPosition &rarr; dd_sar_spos</li>
			<li>rowOrder &rarr; dd_sar_rord</li>
			<li>numbOfRows &rarr; dd_sar_nrows</li>
			<li>numbOfCols &rarr; dd_sar_ncols</li>
			<li>units &rarr; dd_sar_units</li>
			<li>nullValue &rarr; dd_sar_ndata</li>
			<li>location &rarr; dd_sar_loc</li>
			<li>pair &rarr; dd_sar_pair</li>
			<li>description &rarr; dd_sar_desc</li>
			<li>DEM &rarr; dd_sar_dem</li>
			<li>bytesOrder &rarr; dd_sar_dord</li>
			<li>img1Time &rarr; dd_sar_img1_time</li>
			<li>img1TimeUnc &rarr; dd_sar_img1_time_unc</li>
			<li>img2Time &rarr; dd_sar_img2_time</li>
			<li>img2TimeUnc &rarr; dd_sar_img2_time_unc</li>
			<li>metersPixelSize &rarr; dd_sar_pixsiz</li>
			<li>degreesPixelSize &rarr; dd_sar_spacing</li>
			<li>lookAngle &rarr; dd_sar_lookang</li>
			<li>limb &rarr; dd_sar_limb</li>
			<li>processMethod &rarr; dd_sar_prometh</li>
			<li>software &rarr; dd_sar_softwr</li>
			<li>DEMQuality &rarr; dd_sar_dem_qual</li>
			<li>#di_gen_id &rarr; di_gen_id</li>
			<li>#vd_id &rarr; vd_id</li>
			<li>#pubDate &rarr; dd_sar_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Deformation - InSAR image - Satellites -->
		<h2 class="wovomlclass"><a name="data_deformation_insarimage_satellites" id="data_deformation_insarimage_satellites"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_deformation">&lt;Deformation&gt;</a> | <a href="#data_deformation_insarimage">&lt;InSARImage&gt;</a> | &lt;Satellites&gt;</h2>
		
<pre><strong>&lt;Satellites&gt;</strong>
	&lt;satelliteCode&gt;...&lt;/satelliteCode&gt;
<strong>&lt;/Satellites&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Link:
				<br/>SELECT cs_id FROM cs WHERE cs_code = 'satelliteCode'
				<br/>&rarr; #cs_id
			</li>
		</ul>
		
		<h3>2. Change (if parent is updated)</h3>
		<ul class="line_height_150">
			<li>
				Delete:
				<br/>DELETE FROM j_sarsat WHERE dd_sar_id = '@parent1'
			</li>
		</ul>
		
		<h3>3. Upload/Update</h3>
		<ul class="line_height_150">
			<li>
				Select:
				<br/>SELECT cs_id FROM cs WHERE cs_code = 'satelliteCode'
				<br/>&rarr; #cs_id
			</li>
			<li>
				INSERT INTO j_sarsat:
				<ul>
					<li>#cs_id &rarr; cs_id</li>
					<li>@parent1 &rarr; dd_sar_id</li>
					<li>!cc_id_load &rarr; cc_id_load</li>
					<li>!loaddate &rarr; j_sarsat_loaddate</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Deformation - InSAR image - InSAR image pixels -->
		<h2 class="wovomlclass"><a name="data_deformation_insarimage_insarpixels" id="data_deformation_insarimage_insarpixels"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_deformation">&lt;Deformation&gt;</a> | <a href="#data_deformation_insarimage">&lt;InSARImage&gt;</a> | &lt;InSARPixels&gt;</h2>
		
<pre><strong>&lt;InSARPixels&gt;</strong>
	<a href="#data_deformation_insarimage_insarpixels_insarpixel">&lt;InSARPixel&gt;...&lt;/InSARPixel&gt;</a>
<strong>&lt;/InSARPixels&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Pixels:
				<br/>@child1.'number' &le; @parent1.'numbOfRows' &times; @parent1.'numbOfCols'
				<br/>AND {@child1.'number'} UNIQUE
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<ul class="line_height_150">
			<li>
				Delete:
				<br/>DELETE FROM dd_srd WHERE dd_sar_id = '@parent1'
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Deformation - InSAR image - InSAR image pixels - InSAR image pixel -->
		<h2 class="wovomlclass"><a name="data_deformation_insarimage_insarpixels_insarpixel" id="data_deformation_insarimage_insarpixels_insarpixel"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_deformation">&lt;Deformation&gt;</a> | <a href="#data_deformation_insarimage">&lt;InSARImage&gt;</a> | <a href="#data_deformation_insarimage_insarpixels">&lt;InSARPixels&gt;</a> | &lt;InSARPixel&gt;</h2>
		
<pre><strong>&lt;InSARPixel&gt;</strong>
	&lt;number&gt;...&lt;/number&gt;
	&lt;rangeOfChange&gt;...&lt;/rangeOfChange&gt;
<strong>&lt;/InSARPixel&gt;</strong></pre>
		
		<h3>Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT dd_srd_id FROM dd_srd WHERE dd_sar_id = '@parent2' AND dd_srd_numb = 'number'
			<br/>&rarr; #dd_srd_id
		</p>
		<h4>a) INSERT INTO dd_srd</h4>
		<ul>
			<li>number &rarr; dd_srd_numb</li>
			<li>rangeOfChange &rarr; dd_srd_dchange</li>
			<li>@parent2 &rarr; dd_sar_id</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; dd_srd_loaddate</li>
		</ul>
		<h4>b) UPDATE dd_srd WHERE dd_srd_id = '#dd_srd_id'</h4>
		<ul>
			<li>rangeOfChange &rarr; dd_srd_dchange</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Gas -->
		<h2 class="wovomlclass"><a name="data_gas" id="data_gas"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | &lt;Gas&gt;</h2>
		
<pre><strong>&lt;Gas&gt;</strong>
	<a href="#data_gas_directlysampled">&lt;DirectlySampled&gt;...&lt;/DirectlySampled&gt;</a>
	<a href="#data_gas_soilefflux">&lt;SoilEfflux&gt;...&lt;/SoilEfflux&gt;</a>
	<a href="#data_gas_plume">&lt;Plume&gt;...&lt;/Plume&gt;</a>
<strong>&lt;/Gas&gt;</strong></pre>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Gas - Directly sampled -->
		<h2 class="wovomlclass"><a name="data_gas_directlysampled" id="data_gas_directlysampled"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_gas">&lt;Gas&gt;</a> | &lt;DirectlySampled&gt;</h2>
		
<pre><strong>&lt;DirectlySampled code=&quot;...&quot;&gt;</strong>
	&lt;instrumentCode&gt;...&lt;/instrumentCode&gt;		&lt;!-- OR &lt;stationCode&gt;...&lt;/stationCode&gt; --&gt;
	&lt;measTime&gt;...&lt;/measTime&gt;
	&lt;measTimeUnc&gt;...&lt;/measTimeUnc&gt;
	&lt;temperature&gt;...&lt;/temperature&gt;
	&lt;atmosPress&gt;...&lt;/atmosPress&gt;
	&lt;emissionRate&gt;...&lt;/emissionRate&gt;
	&lt;species&gt;...&lt;/species&gt;
	&lt;waterFree&gt;...&lt;/waterFree&gt;
	&lt;units&gt;...&lt;/units&gt;
	&lt;concentration&gt;...&lt;/concentration&gt;
	&lt;concentrationUnc&gt;...&lt;/concentrationUnc&gt;
	&lt;recalculated&gt;...&lt;/recalculated&gt;
	&lt;environFactors&gt;...&lt;/environFactors&gt;
	&lt;sublimateMinerals&gt;...&lt;/sublimateMinerals&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/DirectlySampled&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT gs_id, gs_stime, gs_stime_unc, gs_etime, gs_etime_unc FROM gs WHERE gs_code = 'stationCode' AND cc_id = #cc_id
				<br/>@current.'measTime' &plusmn; 'measTimeUnc' &isin; [gs_stime &plusmn; gs_stime_unc, gs_etime &plusmn; gs_etime_unc]
				<br/>&rarr; #gs_id1
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT gi_id, gi_stime, gi_stime_unc, gi_etime, gi_etime_unc FROM gi WHERE gi_code = 'instrumentCode' AND cc_id = #cc_id
				<br/>@current.'measTime' &plusmn; 'measTimeUnc' &isin; [gi_stime &plusmn; gi_stime_unc, gi_etime &plusmn; gi_etime_unc]
				<br/>&rarr; #gi_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'measTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
			<li>
				Link:
				<br/>SELECT gs_id FROM gi WHERE gi_id = '#gi_id'
				<br/>&rarr; #gs_id2
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT gd_id FROM gd WHERE gd_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #gd_id
		</p>
		<h4>a) INSERT INTO gd</h4>
		<ul>
			<li>/code &rarr; gd_code</li>
			<li>measTime &rarr; gd_time</li>
			<li>measTimeUnc &rarr; gd_time_unc</li>
			<li>temperature &rarr; gd_gtemp</li>
			<li>atmosPress &rarr; gd_bp</li>
			<li>emissionRate &rarr; gd_flow</li>
			<li>species &rarr; gd_species</li>
			<li>waterFree &rarr; gd_waterfree_flag</li>
			<li>units &rarr; gd_units</li>
			<li>concentration &rarr; gd_concentration</li>
			<li>concentrationUnc &rarr; gd_concentration_err</li>
			<li>recalculated &rarr; gd_recalc</li>
			<li>environFactors &rarr; gd_envir</li>
			<li>sublimateMinerals &rarr; gd_submin</li>
			<li>comments &rarr; gd_com</li>
			<li>#gi_id &rarr; gi_id</li>
			<li>#gs_id1|#gs_id2 &rarr; gs_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; gd_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; gd_loaddate</li>
		</ul>
		<h4>b) UPDATE gd WHERE gd_id = '#gd_id'</h4>
		<ul>
			<li>measTime &rarr; gd_time</li>
			<li>measTimeUnc &rarr; gd_time_unc</li>
			<li>temperature &rarr; gd_gtemp</li>
			<li>atmosPress &rarr; gd_bp</li>
			<li>emissionRate &rarr; gd_flow</li>
			<li>species &rarr; gd_species</li>
			<li>waterFree &rarr; gd_waterfree_flag</li>
			<li>units &rarr; gd_units</li>
			<li>concentration &rarr; gd_concentration</li>
			<li>concentrationUnc &rarr; gd_concentration_err</li>
			<li>recalculated &rarr; gd_recalc</li>
			<li>environFactors &rarr; gd_envir</li>
			<li>sublimateMinerals &rarr; gd_submin</li>
			<li>comments &rarr; gd_com</li>
			<li>#gi_id &rarr; gi_id</li>
			<li>#gs_id1|#gs_id2 &rarr; gs_id</li>
			<li>#pubDate &rarr; gd_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Gas - Soil efflux -->
		<h2 class="wovomlclass"><a name="data_gas_soilefflux" id="data_gas_soilefflux"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_gas">&lt;Gas&gt;</a> | &lt;SoilEfflux&gt;</h2>
		
<pre><strong>&lt;SoilEfflux code=&quot;...&quot;&gt;</strong>
	&lt;instrumentCode&gt;...&lt;/instrumentCode&gt;		&lt;!-- OR &lt;stationCode&gt;...&lt;/stationCode&gt; --&gt;
	&lt;measTime&gt;...&lt;/measTime&gt;
	&lt;measTimeUnc&gt;...&lt;/measTimeUnc&gt;
	&lt;species&gt;...&lt;/species&gt;
	&lt;totalFlux&gt;...&lt;/totalFlux&gt;
	&lt;totalFluxUnc&gt;...&lt;/totalFluxUnc&gt;
	&lt;numberOfPoints&gt;...&lt;/numberOfPoints&gt;
	&lt;area&gt;...&lt;/area&gt;
	&lt;highestFlux&gt;...&lt;/highestFlux&gt;
	&lt;highestTemp&gt;...&lt;/highestTemp&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/SoilEfflux&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT gs_id, gs_stime, gs_stime_unc, gs_etime, gs_etime_unc FROM gs WHERE gs_code = 'stationCode' AND cc_id = #cc_id
				<br/>@current.'measTime' &plusmn; 'measTimeUnc' &isin; [gs_stime &plusmn; gs_stime_unc, gs_etime &plusmn; gs_etime_unc]
				<br/>&rarr; #gs_id1
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT gi_id, gi_stime, gi_stime_unc, gi_etime, gi_etime_unc FROM gi WHERE gi_code = 'instrumentCode' AND cc_id = #cc_id
				<br/>@current.'measTime' &plusmn; 'measTimeUnc' &isin; [gi_stime &plusmn; gi_stime_unc, gi_etime &plusmn; gi_etime_unc]
				<br/>&rarr; #gi_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'measTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
			<li>
				Link:
				<br/>SELECT gs_id FROM gi WHERE gi_id = '#gi_id'
				<br/>&rarr; #gs_id2
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT gd_sol_id FROM gd_sol WHERE gd_sol_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #gd_sol_id
		</p>
		<h4>a) INSERT INTO gd_sol</h4>
		<ul>
			<li>/code &rarr; gd_sol_code</li>
			<li>measTime &rarr; gd_sol_time</li>
			<li>measTimeUnc &rarr; gd_sol_time_unc</li>
			<li>species &rarr; gd_sol_species</li>
			<li>totalFlux &rarr; gd_sol_tflux</li>
			<li>totalFluxUnc &rarr; gd_sol_flux_err</li>
			<li>numberOfPoints &rarr; gd_sol_pts</li>
			<li>area &rarr; gd_sol_area</li>
			<li>highestFlux &rarr; gd_sol_high</li>
			<li>highestTemp &rarr; gd_sol_htemp</li>
			<li>comments &rarr; gd_sol_com</li>
			<li>#gi_id &rarr; gi_id</li>
			<li>#gs_id1|#gs_id2 &rarr; gs_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; gd_sol_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; gd_sol_loaddate</li>
		</ul>
		<h4>b) UPDATE gd_sol WHERE gd_sol_id = '#gd_sol_id'</h4>
		<ul>
			<li>measTime &rarr; gd_sol_time</li>
			<li>measTimeUnc &rarr; gd_sol_time_unc</li>
			<li>species &rarr; gd_sol_species</li>
			<li>totalFlux &rarr; gd_sol_tflux</li>
			<li>totalFluxUnc &rarr; gd_sol_flux_err</li>
			<li>numberOfPoints &rarr; gd_sol_pts</li>
			<li>area &rarr; gd_sol_area</li>
			<li>highestFlux &rarr; gd_sol_high</li>
			<li>highestTemp &rarr; gd_sol_htemp</li>
			<li>comments &rarr; gd_sol_com</li>
			<li>#gi_id &rarr; gi_id</li>
			<li>#gs_id1|#gs_id2 &rarr; gs_id</li>
			<li>#pubDate &rarr; gd_sol_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Gas - Plume -->
		<h2 class="wovomlclass"><a name="data_gas_plume" id="data_gas_plume"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_gas">&lt;Gas&gt;</a> | &lt;Plume&gt;</h2>
		
<pre><strong>&lt;Plume code=&quot;...&quot;&gt;</strong>
	&lt;volcanoCode&gt;...&lt;/volcanoCode&gt;
	&lt;instrumentCode&gt;...&lt;/instrumentCode&gt;		&lt;!-- OR &lt;stationCode&gt;...&lt;/stationCode&gt; --&gt;
	&lt;lat&gt;...&lt;/lat&gt;
	&lt;lon&gt;...&lt;/lon&gt;
	&lt;height&gt;...&lt;/height&gt;
	&lt;heightDetermination&gt;...&lt;/heightDetermination&gt;
	&lt;measTime&gt;...&lt;/measTime&gt;
	&lt;measTimeUnc&gt;...&lt;/measTimeUnc&gt;
	&lt;species&gt;...&lt;/species&gt;
	&lt;units&gt;...&lt;/units&gt;
	&lt;emissionRate&gt;...&lt;/emissionRate&gt;
	&lt;emissionRateUnc&gt;...&lt;/emissionRateUnc&gt;
	&lt;recalculated&gt;...&lt;/recalculated&gt;
	&lt;windSpeed&gt;...&lt;/windSpeed&gt;
	&lt;weatherNotes&gt;...&lt;/weatherNotes&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/Plume&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Volcano:
				<br/>SELECT vd_id FROM vd_inf WHERE vd_cavw = 'volcanoCode'
				<br/>&rarr; #vd_id
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT gs_id, gs_stime, gs_stime_unc, gs_etime, gs_etime_unc FROM gs WHERE gs_code = 'stationCode' AND cc_id = #cc_id
				<br/>@current.'measTime' &plusmn; 'measTimeUnc' &isin; [gs_stime &plusmn; gs_stime_unc, gs_etime &plusmn; gs_etime_unc]
				<br/>&rarr; #gs_id1
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT gi_id, gi_stime, gi_stime_unc, gi_etime, gi_etime_unc FROM gi WHERE gi_code = 'instrumentCode' AND cc_id = #cc_id
				<br/>@current.'measTime' &plusmn; 'measTimeUnc' &isin; [gi_stime &plusmn; gi_stime_unc, gi_etime &plusmn; gi_etime_unc]
				<br/>&rarr; #gi_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'measTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
			<li>
				Link:
				<br/>SELECT gs_id FROM gi WHERE gi_id = '#gi_id'
				<br/>&rarr; #gs_id2
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT gd_plu_id FROM gd_plu WHERE gd_plu_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #gd_plu_id
		</p>
		<h4>a) INSERT INTO gd_plu</h4>
		<ul>
			<li>/code &rarr; gd_plu_code</li>
			<li>lat &rarr; gd_plu_lat</li>
			<li>lon &rarr; gd_plu_lon</li>
			<li>height &rarr; gd_plu_height</li>
			<li>heightDetermination &rarr; gd_plu_hdet</li>
			<li>measTime &rarr; gd_plu_time</li>
			<li>measTimeUnc &rarr; gd_plu_time_unc</li>
			<li>species &rarr; gd_plu_species</li>
			<li>units &rarr; gd_plu_units</li>
			<li>emissionRate &rarr; gd_plu_emit</li>
			<li>emissionRateUnc &rarr; gd_plu_emit_err</li>
			<li>recalculated &rarr; gd_plu_recalc</li>
			<li>windSpeed &rarr; gd_plu_wind</li>
			<li>weatherNotes &rarr; gd_plu_weth</li>
			<li>comments &rarr; gd_plu_com</li>
			<li>#gi_id &rarr; gi_id</li>
			<li>#gs_id1|#gs_id2 &rarr; gs_id</li>
			<li>#vd_id &rarr; vd_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; gd_plu_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; gd_plu_loaddate</li>
		</ul>
		<h4>b) UPDATE gd_plu WHERE gd_plu_id = '#gd_plu_id'</h4>
		<ul>
			<li>lat &rarr; gd_plu_lat</li>
			<li>lon &rarr; gd_plu_lon</li>
			<li>height &rarr; gd_plu_height</li>
			<li>heightDetermination &rarr; gd_plu_hdet</li>
			<li>measTime &rarr; gd_plu_time</li>
			<li>measTimeUnc &rarr; gd_plu_time_unc</li>
			<li>species &rarr; gd_plu_species</li>
			<li>units &rarr; gd_plu_units</li>
			<li>emissionRate &rarr; gd_plu_emit</li>
			<li>emissionRateUnc &rarr; gd_plu_emit_err</li>
			<li>recalculated &rarr; gd_plu_recalc</li>
			<li>windSpeed &rarr; gd_plu_wind</li>
			<li>weatherNotes &rarr; gd_plu_weth</li>
			<li>comments &rarr; gd_plu_com</li>
			<li>#gi_id &rarr; gi_id</li>
			<li>#gs_id1|#gs_id2 &rarr; gs_id</li>
			<li>#vd_id &rarr; vd_id</li>
			<li>#pubDate &rarr; gd_plu_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Hydrologic -->
		<h2 class="wovomlclass"><a name="data_hydrologic" id="data_hydrologic"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | &lt;Hydrologic&gt;</h2>
		
<pre><strong>&lt;Hydrologic&gt;</strong>
	<a href="#data_hydrologic_sample">&lt;Sample&gt;...&lt;/Sample&gt;</a>
<strong>&lt;/Hydrologic&gt;</strong></pre>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Hydrologic - Sample -->
		<h2 class="wovomlclass"><a name="data_hydrologic_sample" id="data_hydrologic_sample"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_hydrologic">&lt;Hydrologic&gt;</a> | &lt;Sample&gt;</h2>
		
<pre><strong>&lt;Sample code=&quot;...&quot;&gt;</strong>
	&lt;instrumentCode&gt;...&lt;/instrumentCode&gt;		&lt;!-- OR &lt;stationCode&gt;...&lt;/stationCode&gt; --&gt;
	&lt;measTime&gt;...&lt;/measTime&gt;
	&lt;measTimeUnc&gt;...&lt;/measTimeUnc&gt;
	&lt;temperature&gt;...&lt;/temperature&gt;
	&lt;elev&gt;...&lt;/elev&gt;
	&lt;depth&gt;...&lt;/depth&gt;
	&lt;waterLevelChange&gt;...&lt;/waterLevelChange&gt;
	&lt;atmosPress&gt;...&lt;/atmosPress&gt;
	&lt;springDischRate&gt;...&lt;/springDischRate&gt;
	&lt;precipitation&gt;...&lt;/precipitation&gt;
	&lt;dailyPrecipitation&gt;...&lt;/dailyPrecipitation&gt;
	&lt;precipitationType&gt;...&lt;/precipitationType&gt;
	&lt;pH&gt;...&lt;/pH&gt;
	&lt;pHUnc&gt;...&lt;/pHUnc&gt;
	&lt;conductivity&gt;...&lt;/conductivity&gt;
	&lt;conductivityUnc&gt;...&lt;/conductivityUnc&gt;
	&lt;species&gt;...&lt;/species&gt;
	&lt;units&gt;...&lt;/units&gt;
	&lt;content&gt;...&lt;/content&gt;
	&lt;contentUnc&gt;...&lt;/contentUnc&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/Sample&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT hs_id, hs_stime, hs_stime_unc, hs_etime, hs_etime_unc FROM hs WHERE hs_code = 'stationCode' AND cc_id = #cc_id
				<br/>@current.'measTime' &plusmn; 'measTimeUnc' &isin; [hs_stime &plusmn; hs_stime_unc, hs_etime &plusmn; hs_etime_unc]
				<br/>&rarr; #hs_id1
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT hi_id, hi_stime, hi_stime_unc, hi_etime, hi_etime_unc FROM hi WHERE hi_code = 'instrumentCode' AND cc_id = #cc_id
				<br/>@current.'measTime' &plusmn; 'measTimeUnc' &isin; [hi_stime &plusmn; hi_stime_unc, hi_etime &plusmn; hi_etime_unc]
				<br/>&rarr; #hi_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'measTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
			<li>
				Link:
				<br/>SELECT hs_id FROM hi WHERE hi_id = '#hi_id'
				<br/>&rarr; #hs_id2
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT hd_id FROM hd WHERE hd_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #hd_id
		</p>
		<h4>a) INSERT INTO hd</h4>
		<ul>
			<li>/code &rarr; hd_code</li>
			<li>measTime &rarr; hd_time</li>
			<li>measTimeUnc &rarr; hd_time_unc</li>
			<li>temperature &rarr; hd_temp</li>
			<li>elev &rarr; hd_welev</li>
			<li>depth &rarr; hd_wdepth</li>
			<li>waterLevelChange &rarr; hd_dwlev</li>
			<li>atmosPress &rarr; hd_bp</li>
			<li>springDischRate &rarr; hd_sdisc</li>
			<li>precipitation &rarr; hd_prec</li>
			<li>dailyPrecipitation &rarr; hd_dprec</li>
			<li>precipitationType &rarr; hd_tprec</li>
			<li>pH &rarr; hd_ph</li>
			<li>pHUnc &rarr; hd_ph_err</li>
			<li>conductivity &rarr; hd_cond</li>
			<li>conductivityUnc &rarr; hd_cond_err</li>
			<li>species &rarr; hd_comp_species</li>
			<li>units &rarr; hd_comp_units</li>
			<li>content &rarr; hd_comp_content</li>
			<li>contentUnc &rarr; hd_comp_content_err</li>
			<li>comments &rarr; hd_com</li>
			<li>#hi_id &rarr; hi_id</li>
			<li>#hs_id1|#hs_id2 &rarr; hs_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; hd_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; hd_loaddate</li>
		</ul>
		<h4>b) UPDATE hd WHERE hd_id = '#hd_id'</h4>
		<ul>
			<li>measTime &rarr; hd_time</li>
			<li>measTimeUnc &rarr; hd_time_unc</li>
			<li>temperature &rarr; hd_temp</li>
			<li>elev &rarr; hd_welev</li>
			<li>depth &rarr; hd_wdepth</li>
			<li>waterLevelChange &rarr; hd_dwlev</li>
			<li>atmosPress &rarr; hd_bp</li>
			<li>springDischRate &rarr; hd_sdisc</li>
			<li>precipitation &rarr; hd_prec</li>
			<li>dailyPrecipitation &rarr; hd_dprec</li>
			<li>precipitationType &rarr; hd_tprec</li>
			<li>pH &rarr; hd_ph</li>
			<li>pHUnc &rarr; hd_ph_err</li>
			<li>conductivity &rarr; hd_cond</li>
			<li>conductivityUnc &rarr; hd_cond_err</li>
			<li>species &rarr; hd_comp_species</li>
			<li>units &rarr; hd_comp_units</li>
			<li>content &rarr; hd_comp_content</li>
			<li>contentUnc &rarr; hd_comp_content_err</li>
			<li>comments &rarr; hd_com</li>
			<li>#hi_id &rarr; hi_id</li>
			<li>#hs_id1|#hs_id2 &rarr; hs_id</li>
			<li>#pubDate &rarr; hd_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Fields -->
		<h2 class="wovomlclass"><a name="data_fields" id="data_fields"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | &lt;Fields&gt;</h2>
		
<pre><strong>&lt;Fields&gt;</strong>
	<a href="#data_fields_magnetic">&lt;Magnetic&gt;...&lt;/Magnetic&gt;</a>
	<a href="#data_fields_magneticvector">&lt;MagneticVector&gt;...&lt;/MagneticVector&gt;</a>
	<a href="#data_fields_electric">&lt;Electric&gt;...&lt;/Electric&gt;</a>
	<a href="#data_fields_gravity">&lt;Gravity&gt;...&lt;/Gravity&gt;</a>
<strong>&lt;/Fields&gt;</strong></pre>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Fields - Magnetic -->
		<h2 class="wovomlclass"><a name="data_fields_magnetic" id="data_fields_magnetic"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_fields">&lt;Fields&gt;</a> | &lt;Magnetic&gt;</h2>
		
<pre><strong>&lt;Magnetic code=&quot;...&quot;&gt;</strong>
	&lt;instrumentCode&gt;...&lt;/instrumentCode&gt;		&lt;!-- OR &lt;stationCode&gt;...&lt;/stationCode&gt; --&gt;
	&lt;refStationCode&gt;...&lt;/refStationCode&gt;
	&lt;measTime&gt;...&lt;/measTime&gt;
	&lt;measTimeUnc&gt;...&lt;/measTimeUnc&gt;
	&lt;F&gt;...&lt;/F&gt;
	&lt;FUnc&gt;...&lt;/FUnc&gt;
	&lt;X&gt;...&lt;/X&gt;
	&lt;XUnc&gt;...&lt;/XUnc&gt;
	&lt;Y&gt;...&lt;/Y&gt;
	&lt;YUnc&gt;...&lt;/YUnc&gt;
	&lt;Z&gt;...&lt;/Z&gt;
	&lt;ZUnc&gt;...&lt;/ZUnc&gt;
	&lt;highPass&gt;...&lt;/highPass&gt;
	&lt;lowPass&gt;...&lt;/lowPass&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/Magnetic&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT fs_id, fs_stime, fs_stime_unc, fs_etime, fs_etime_unc FROM fs WHERE fs_code = 'stationCode' AND cc_id = #cc_id
				<br/>@current.'measTime' &plusmn; 'measTimeUnc' &isin; [fs_stime &plusmn; fs_stime_unc, fs_etime &plusmn; fs_etime_unc]
				<br/>&rarr; #fs_id1
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT fs_id, fs_stime, fs_stime_unc, fs_etime, fs_etime_unc FROM fs WHERE fs_code = 'refStationCode' AND cc_id = #cc_id
				<br/>@current.'measTime' &plusmn; 'measTimeUnc' &isin; [fs_stime &plusmn; fs_stime_unc, fs_etime &plusmn; fs_etime_unc]
				<br/>&rarr; #fs_id_ref
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT fi_id, fi_stime, fi_stime_unc, fi_etime, fi_etime_unc FROM fi WHERE fi_code = 'instrumentCode' AND cc_id = #cc_id
				<br/>@current.'measTime' &plusmn; 'measTimeUnc' &isin; [fi_stime &plusmn; fi_stime_unc, fi_etime &plusmn; fi_etime_unc]
				<br/>&rarr; #fi_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'measTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
			<li>
				Link:
				<br/>SELECT fs_id FROM fi WHERE fi_id = '#fi_id'
				<br/>&rarr; #fs_id2
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT fd_mag_id FROM fd_mag WHERE fd_mag_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #fd_mag_id
		</p>
		<h4>a) INSERT INTO fd_mag</h4>
		<ul>
			<li>/code &rarr; fd_mag_code</li>
			<li>measTime &rarr; fd_mag_time</li>
			<li>measTimeUnc &rarr; fd_mag_time_unc</li>
			<li>F &rarr; fd_mag_f</li>
			<li>FUnc &rarr; fd_mag_ferr</li>
			<li>X &rarr; fd_mag_compx</li>
			<li>XUnc &rarr; fd_mag_errx</li>
			<li>Y &rarr; fd_mag_compy</li>
			<li>YUnc &rarr; fd_mag_erry</li>
			<li>Z &rarr; fd_mag_compz</li>
			<li>ZUnc &rarr; fd_mag_errz</li>
			<li>highPass &rarr; fd_mag_highpass</li>
			<li>lowPass &rarr; fd_mag_lowpass</li>
			<li>comments &rarr; fd_mag_com</li>
			<li>#fi_id &rarr; fi_id</li>
			<li>#fs_id1|#fs_id2 &rarr; fs_id</li>
			<li>#fs_id_ref &rarr; fs_id_ref</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; fd_mag_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; fd_mag_loaddate</li>
		</ul>
		<h4>b) UPDATE fd_mag WHERE fd_mag_id = '#fd_mag_id'</h4>
		<ul>
			<li>measTime &rarr; fd_mag_time</li>
			<li>measTimeUnc &rarr; fd_mag_time_unc</li>
			<li>F &rarr; fd_mag_f</li>
			<li>FUnc &rarr; fd_mag_ferr</li>
			<li>X &rarr; fd_mag_compx</li>
			<li>XUnc &rarr; fd_mag_errx</li>
			<li>Y &rarr; fd_mag_compy</li>
			<li>YUnc &rarr; fd_mag_erry</li>
			<li>Z &rarr; fd_mag_compz</li>
			<li>ZUnc &rarr; fd_mag_errz</li>
			<li>highPass &rarr; fd_mag_highpass</li>
			<li>lowPass &rarr; fd_mag_lowpass</li>
			<li>comments &rarr; fd_mag_com</li>
			<li>#fi_id &rarr; fi_id</li>
			<li>#fs_id1|#fs_id2 &rarr; fs_id</li>
			<li>#fs_id_ref &rarr; fs_id_ref</li>
			<li>#pubDate &rarr; fd_mag_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Fields - Magnetic vector -->
		<h2 class="wovomlclass"><a name="data_fields_magneticvector" id="data_fields_magneticvector"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_fields">&lt;Fields&gt;</a> | &lt;MagneticVector&gt;</h2>
		
<pre><strong>&lt;MagneticVector code=&quot;...&quot;&gt;</strong>
	&lt;instrumentCode&gt;...&lt;/instrumentCode&gt;		&lt;!-- OR &lt;stationCode&gt;...&lt;/stationCode&gt; --&gt;
	&lt;refStationCode&gt;...&lt;/refStationCode&gt;
	&lt;continuous&gt;...&lt;/continuous&gt;
	&lt;measTime&gt;...&lt;/measTime&gt;
	&lt;measTimeUnc&gt;...&lt;/measTimeUnc&gt;
	&lt;F&gt;...&lt;/F&gt;
	&lt;FUnc&gt;...&lt;/FUnc&gt;
	&lt;X&gt;...&lt;/X&gt;
	&lt;XUnc&gt;...&lt;/XUnc&gt;
	&lt;Y&gt;...&lt;/Y&gt;
	&lt;YUnc&gt;...&lt;/YUnc&gt;
	&lt;Z&gt;...&lt;/Z&gt;
	&lt;ZUnc&gt;...&lt;/ZUnc&gt;
	&lt;highPass&gt;...&lt;/highPass&gt;
	&lt;lowPass&gt;...&lt;/lowPass&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/MagneticVector&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT fs_id, fs_stime, fs_stime_unc, fs_etime, fs_etime_unc FROM fs WHERE fs_code = 'stationCode' AND cc_id = #cc_id
				<br/>@current.'measTime' &plusmn; 'measTimeUnc' &isin; [fs_stime &plusmn; fs_stime_unc, fs_etime &plusmn; fs_etime_unc]
				<br/>&rarr; #fs_id1
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT fi_id, fi_stime, fi_stime_unc, fi_etime, fi_etime_unc FROM fi WHERE fi_code = 'instrumentCode' AND cc_id = #cc_id
				<br/>@current.'measTime' &plusmn; 'measTimeUnc' &isin; [fi_stime &plusmn; fi_stime_unc, fi_etime &plusmn; fi_etime_unc]
				<br/>&rarr; #fi_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'measTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
			<li>
				Link:
				<br/>SELECT fs_id FROM fi WHERE fi_id = '#fi_id'
				<br/>&rarr; #fs_id2
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT fd_mgv_id FROM fd_mgv WHERE fd_mgv_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #fd_mgv_id
		</p>
		<h4>a) INSERT INTO fd_mgv</h4>
		<ul>
			<li>/code &rarr; fd_mgv_code</li>
			<li>measTime &rarr; fd_mgv_time</li>
			<li>measTimeUnc &rarr; fd_mgv_time_unc</li>
			<li>declination &rarr; fd_mgv_dec</li>
			<li>inclination &rarr; fd_mgv_incl</li>
			<li>comments &rarr; fd_mgv_com</li>
			<li>#fi_id &rarr; fi_id</li>
			<li>#fs_id1|#fs_id2 &rarr; fs_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; fd_mgv_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; fd_mgv_loaddate</li>
		</ul>
		<h4>b) UPDATE fd_mgv WHERE fd_mgv_id = '#fd_mgv_id'</h4>
		<ul>
			<li>measTime &rarr; fd_mgv_time</li>
			<li>measTimeUnc &rarr; fd_mgv_time_unc</li>
			<li>declination &rarr; fd_mgv_dec</li>
			<li>inclination &rarr; fd_mgv_incl</li>
			<li>comments &rarr; fd_mgv_com</li>
			<li>#fi_id &rarr; fi_id</li>
			<li>#fs_id1|#fs_id2 &rarr; fs_id</li>
			<li>#pubDate &rarr; fd_mgv_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Fields - Electric -->
		<h2 class="wovomlclass"><a name="data_fields_electric" id="data_fields_electric"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_fields">&lt;Fields&gt;</a> | &lt;Electric&gt;</h2>
		
<pre><strong>&lt;Electric code=&quot;...&quot;&gt;</strong>
	&lt;instrumentCode&gt;...&lt;/instrumentCode&gt;
	&lt;refStation1Code&gt;...&lt;/refStation1Code&gt;
	&lt;refStation2Code&gt;...&lt;/refStation2Code&gt;
	&lt;measTime&gt;...&lt;/measTime&gt;
	&lt;measTimeUnc&gt;...&lt;/measTimeUnc&gt;
	&lt;field&gt;...&lt;/field&gt;
	&lt;fieldUnc&gt;...&lt;/fieldUnc&gt;
	&lt;direction&gt;...&lt;/direction&gt;
	&lt;highPass&gt;...&lt;/highPass&gt;
	&lt;lowPass&gt;...&lt;/lowPass&gt;
	&lt;selfPotential&gt;...&lt;/selfPotential&gt;
	&lt;selfPotentialUnc&gt;...&lt;/selfPotentialUnc&gt;
	&lt;apparentResistivity&gt;...&lt;/apparentResistivity&gt;
	&lt;apparentResistivityUnc&gt;...&lt;/apparentResistivityUnc&gt;
	&lt;directResistivity&gt;...&lt;/directResistivity&gt;
	&lt;directResistivityUnc&gt;...&lt;/directResistivityUnc&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/Electric&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT fs_id, fs_stime, fs_stime_unc, fs_etime, fs_etime_unc FROM fs WHERE fs_code = 'refStation1Code' AND cc_id = #cc_id
				<br/>@current.'measTime' &plusmn; 'measTimeUnc' &isin; [fs_stime &plusmn; fs_stime_unc, fs_etime &plusmn; fs_etime_unc]
				<br/>&rarr; #fs_id1
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT fs_id, fs_stime, fs_stime_unc, fs_etime, fs_etime_unc FROM fs WHERE fs_code = 'refStation2Code' AND cc_id = #cc_id
				<br/>@current.'measTime' &plusmn; 'measTimeUnc' &isin; [fs_stime &plusmn; fs_stime_unc, fs_etime &plusmn; fs_etime_unc]
				<br/>&rarr; #fs_id2
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT fi_id, fi_stime, fi_stime_unc, fi_etime, fi_etime_unc FROM fi WHERE fi_code = 'instrumentCode' AND cc_id = #cc_id
				<br/>@current.'measTime' &plusmn; 'measTimeUnc' &isin; [fi_stime &plusmn; fi_stime_unc, fi_etime &plusmn; fi_etime_unc]
				<br/>&rarr; #fi_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'measTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT fd_ele_id FROM fd_ele WHERE fd_ele_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #fd_ele_id
		</p>
		<h4>a) INSERT INTO fd_ele</h4>
		<ul>
			<li>/code &rarr; fd_ele_code</li>
			<li>measTime &rarr; fd_ele_time</li>
			<li>measTimeUnc &rarr; fd_ele_time_unc</li>
			<li>field &rarr; fd_ele_field</li>
			<li>fieldUnc &rarr; fd_ele_ferr</li>
			<li>direction &rarr; fd_ele_dir</li>
			<li>highPass &rarr; fd_ele_hpass</li>
			<li>lowPass &rarr; fd_ele_lpass</li>
			<li>selfPotential &rarr; fd_ele_spot</li>
			<li>selfPotentialUnc &rarr; fd_ele_spot_err</li>
			<li>apparentResistivity &rarr; fd_ele_ares</li>
			<li>apparentResistivityUnc &rarr; fd_ele_ares_err</li>
			<li>directResistivity &rarr; fd_ele_dres</li>
			<li>directResistivityUnc &rarr; fd_ele_dres_err</li>
			<li>comments &rarr; fd_ele_com</li>
			<li>#fi_id &rarr; fi_id</li>
			<li>#fs_id1 &rarr; fs_id1</li>
			<li>#fs_id2 &rarr; fs_id2</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; fd_ele_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; fd_ele_loaddate</li>
		</ul>
		<h4>b) UPDATE fd_ele WHERE fd_ele_id = '#fd_ele_id'</h4>
		<ul>
			<li>measTime &rarr; fd_ele_time</li>
			<li>measTimeUnc &rarr; fd_ele_time_unc</li>
			<li>field &rarr; fd_ele_field</li>
			<li>fieldUnc &rarr; fd_ele_ferr</li>
			<li>direction &rarr; fd_ele_dir</li>
			<li>highPass &rarr; fd_ele_hpass</li>
			<li>lowPass &rarr; fd_ele_lpass</li>
			<li>selfPotential &rarr; fd_ele_spot</li>
			<li>selfPotentialUnc &rarr; fd_ele_spot_err</li>
			<li>apparentResistivity &rarr; fd_ele_ares</li>
			<li>apparentResistivityUnc &rarr; fd_ele_ares_err</li>
			<li>directResistivity &rarr; fd_ele_dres</li>
			<li>directResistivityUnc &rarr; fd_ele_dres_err</li>
			<li>comments &rarr; fd_ele_com</li>
			<li>#fi_id &rarr; fi_id</li>
			<li>#fs_id1 &rarr; fs_id1</li>
			<li>#fs_id2 &rarr; fs_id2</li>
			<li>#pubDate &rarr; fd_ele_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Fields - Gravity -->
		<h2 class="wovomlclass"><a name="data_fields_gravity" id="data_fields_gravity"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_fields">&lt;Fields&gt;</a> | &lt;Gravity&gt;</h2>
		
<pre><strong>&lt;Gravity code=&quot;...&quot;&gt;</strong>
	&lt;instrumentCode&gt;...&lt;/instrumentCode&gt;		&lt;!-- OR &lt;stationCode&gt;...&lt;/stationCode&gt; --&gt;
	&lt;refStationCode&gt;...&lt;/refStationCode&gt;
	&lt;measTime&gt;...&lt;/measTime&gt;
	&lt;measTimeUnc&gt;...&lt;/measTimeUnc&gt;
	&lt;fieldStrength&gt;...&lt;/fieldStrength&gt;
	&lt;fieldStrengthUnc&gt;...&lt;/fieldStrengthUnc&gt;
	&lt;assocVertDispl&gt;...&lt;/assocVertDispl&gt;
	&lt;assocGWaterLevel&gt;...&lt;/assocGWaterLevel&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/Gravity&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT fs_id, fs_stime, fs_stime_unc, fs_etime, fs_etime_unc FROM fs WHERE fs_code = 'stationCode' AND cc_id = #cc_id
				<br/>@current.'measTime' &plusmn; 'measTimeUnc' &isin; [fs_stime &plusmn; fs_stime_unc, fs_etime &plusmn; fs_etime_unc]
				<br/>&rarr; #fs_id1
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT fs_id, fs_stime, fs_stime_unc, fs_etime, fs_etime_unc FROM fs WHERE fs_code = 'refStationCode' AND cc_id = #cc_id
				<br/>@current.'measTime' &plusmn; 'measTimeUnc' &isin; [fs_stime &plusmn; fs_stime_unc, fs_etime &plusmn; fs_etime_unc]
				<br/>&rarr; #fs_id_ref
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT fi_id, fi_stime, fi_stime_unc, fi_etime, fi_etime_unc FROM fi WHERE fi_code = 'instrumentCode' AND cc_id = #cc_id
				<br/>@current.'measTime' &plusmn; 'measTimeUnc' &isin; [fi_stime &plusmn; fi_stime_unc, fi_etime &plusmn; fi_etime_unc]
				<br/>&rarr; #fi_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'measTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
			<li>
				Link:
				<br/>SELECT fs_id FROM fi WHERE fi_id = '#fi_id'
				<br/>&rarr; #fs_id2
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT fd_gra_id FROM fd_gra WHERE fd_gra_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #fd_gra_id
		</p>
		<h4>a) INSERT INTO fd_gra</h4>
		<ul>
			<li>/code &rarr; fd_gra_code</li>
			<li>measTime &rarr; fd_gra_time</li>
			<li>measTimeUnc &rarr; fd_gra_time_unc</li>
			<li>fieldStrength &rarr; fd_gra_fstr</li>
			<li>fieldStrengthUnc &rarr; fd_gra_ferr</li>
			<li>assocVertDispl &rarr; fd_gra_vdisp</li>
			<li>assocGWaterLevel &rarr; fd_gra_gwater</li>
			<li>comments &rarr; fd_gra_com</li>
			<li>#fi_id &rarr; fi_id</li>
			<li>#fs_id1|#fs_id2 &rarr; fs_id</li>
			<li>#fs_id_ref &rarr; fs_id_ref</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; fd_gra_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; fd_gra_loaddate</li>
		</ul>
		<h4>b) UPDATE fd_gra WHERE fd_gra_id = '#fd_gra_id'</h4>
		<ul>
			<li>measTime &rarr; fd_gra_time</li>
			<li>measTimeUnc &rarr; fd_gra_time_unc</li>
			<li>fieldStrength &rarr; fd_gra_fstr</li>
			<li>fieldStrengthUnc &rarr; fd_gra_ferr</li>
			<li>assocVertDispl &rarr; fd_gra_vdisp</li>
			<li>assocGWaterLevel &rarr; fd_gra_gwater</li>
			<li>comments &rarr; fd_gra_com</li>
			<li>#fi_id &rarr; fi_id</li>
			<li>#fs_id1|#fs_id2 &rarr; fs_id</li>
			<li>#fs_id_ref &rarr; fs_id_ref</li>
			<li>#pubDate &rarr; fd_gra_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Thermal -->
		<h2 class="wovomlclass"><a name="data_thermal" id="data_thermal"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | &lt;Thermal&gt;</h2>
		
<pre><strong>&lt;Thermal&gt;</strong>
	<a href="#data_thermal_ground-based">&lt;Ground-based&gt;...&lt;/Ground-based&gt;</a>
	<a href="#data_thermal_thermalimage">&lt;ThermalImage&gt;...&lt;/ThermalImage&gt;</a>
<strong>&lt;/Thermal&gt;</strong></pre>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Thermal - Ground-based -->
		<h2 class="wovomlclass"><a name="data_thermal_ground-based" id="data_thermal_ground-based"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_thermal">&lt;Thermal&gt;</a> | &lt;Ground-based&gt;</h2>
		
<pre><strong>&lt;Ground-based code=&quot;...&quot;&gt;</strong>
	&lt;instrumentCode&gt;...&lt;/instrumentCode&gt;		&lt;!-- OR &lt;stationCode&gt;...&lt;/stationCode&gt; --&gt;
	&lt;measType&gt;...&lt;/measType&gt;
	&lt;measTime&gt;...&lt;/measTime&gt;
	&lt;measTimeUnc&gt;...&lt;/measTimeUnc&gt;
	&lt;measDepth&gt;...&lt;/measDepth&gt;
	&lt;distance&gt;...&lt;/distance&gt;
	&lt;recalculated&gt;...&lt;/recalculated&gt;
	&lt;temperature&gt;...&lt;/temperature&gt;
	&lt;temperatureUnc&gt;...&lt;/temperatureUnc&gt;
	&lt;area&gt;...&lt;/area&gt;
	&lt;heatFlux&gt;...&lt;/heatFlux&gt;
	&lt;heatFluxUnc&gt;...&lt;/heatFluxUnc&gt;
	&lt;bgGeothermGradient&gt;...&lt;/bgGeothermGradient&gt;
	&lt;conductivity&gt;...&lt;/conductivity&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/Ground-based&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT ts_id, ts_stime, ts_stime_unc, ts_etime, ts_etime_unc FROM ts WHERE ts_code = 'stationCode' AND cc_id = #cc_id
				<br/>@current.'measTime' &plusmn; 'measTimeUnc' &isin; [ts_stime &plusmn; ts_stime_unc, ts_etime &plusmn; ts_etime_unc]
				<br/>&rarr; #ts_id1
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT ti_id, ti_stime, ti_stime_unc, ti_etime, ti_etime_unc FROM ti WHERE ti_code = 'instrumentCode' AND cc_id = #cc_id
				<br/>@current.'measTime' &plusmn; 'measTimeUnc' &isin; [ti_stime &plusmn; ti_stime_unc, ti_etime &plusmn; ti_etime_unc]
				<br/>&rarr; #ti_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'measTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
			<li>
				Link:
				<br/>SELECT ts_id FROM ti WHERE ti_id = '#ti_id'
				<br/>&rarr; #ts_id2
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT td_id FROM td WHERE td_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #td_id
		</p>
		<h4>a) INSERT INTO td</h4>
		<ul>
			<li>/code &rarr; td_code</li>
			<li>measType &rarr; td_mtype</li>
			<li>measTime &rarr; td_time</li>
			<li>measTimeUnc &rarr; td_time_unc</li>
			<li>measDepth &rarr; td_depth</li>
			<li>distance &rarr; td_distance</li>
			<li>recalculated &rarr; td_calc_flag</li>
			<li>temperature &rarr; td_temp</li>
			<li>temperatureUnc &rarr; td_terr</li>
			<li>area &rarr; td_aarea</li>
			<li>heatFlux &rarr; td_flux</li>
			<li>heatFluxUnc &rarr; td_ferr</li>
			<li>bgGeothermGradient &rarr; td_bkgg</li>
			<li>conductivity &rarr; td_tcond</li>
			<li>comments &rarr; td_com</li>
			<li>#ti_id &rarr; ti_id</li>
			<li>#ts_id1|#ts_id2 &rarr; ts_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; td_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; td_loaddate</li>
		</ul>
		<h4>b) UPDATE td WHERE td_id = '#td_id'</h4>
		<ul>
			<li>measType &rarr; td_mtype</li>
			<li>measTime &rarr; td_time</li>
			<li>measTimeUnc &rarr; td_time_unc</li>
			<li>measDepth &rarr; td_depth</li>
			<li>distance &rarr; td_distance</li>
			<li>recalculated &rarr; td_calc_flag</li>
			<li>temperature &rarr; td_temp</li>
			<li>temperatureUnc &rarr; td_terr</li>
			<li>area &rarr; td_aarea</li>
			<li>heatFlux &rarr; td_flux</li>
			<li>heatFluxUnc &rarr; td_ferr</li>
			<li>bgGeothermGradient &rarr; td_bkgg</li>
			<li>conductivity &rarr; td_tcond</li>
			<li>comments &rarr; td_com</li>
			<li>#ti_id &rarr; ti_id</li>
			<li>#ts_id1|#ts_id2 &rarr; ts_id</li>
			<li>#pubDate &rarr; td_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Thermal - Thermal image -->
		<h2 class="wovomlclass"><a name="data_thermal_thermalimage" id="data_thermal_thermalimage"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_thermal">&lt;Thermal&gt;</a> | &lt;ThermalImage&gt;</h2>
		
<pre><strong>&lt;ThermalImage code=&quot;...&quot;&gt;</strong>
	&lt;volcanoCode&gt;...&lt;/volcanoCode&gt;
	&lt;instrumentCode&gt;...&lt;/instrumentCode&gt;		&lt;!-- OR &lt;stationCode&gt;...&lt;/stationCode&gt; OR &lt;satelliteCode&gt;...&lt;/satelliteCode&gt; OR &lt;airplaneCode&gt;...&lt;/airplaneCode&gt; --&gt;
	&lt;instPlatform&gt;...&lt;/instPlatform&gt;
	&lt;instLat&gt;...&lt;/instLat&gt;
	&lt;instLon&gt;...&lt;/instLon&gt;
	&lt;datum&gt;...&lt;/datum&gt;
	&lt;instAlt&gt;...&lt;/instAlt&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;time&gt;...&lt;/time&gt;
	&lt;timeUnc&gt;...&lt;/timeUnc&gt;
	&lt;bandName&gt;...&lt;/bandName&gt;
	&lt;highBandWavelength&gt;...&lt;/highBandWavelength&gt;
	&lt;lowBandWavelength&gt;...&lt;/lowBandWavelength&gt;
	&lt;pixelSize&gt;...&lt;/pixelSize&gt;
	&lt;maxRadiance&gt;...&lt;/maxRadiance&gt;
	&lt;maxRelativeRadiance&gt;...&lt;/maxRelativeRadiance&gt;
	&lt;hottestPixelTemp&gt;...&lt;/hottestPixelTemp&gt;
	&lt;totRadiance&gt;...&lt;/totRadiance&gt;
	&lt;maxHeatFlux&gt;...&lt;/maxHeatFlux&gt;
	&lt;nominalTempRes&gt;...&lt;/nominalTempRes&gt;
	&lt;atmosCorrection&gt;...&lt;/atmosCorrection&gt;
	&lt;thermCorrection&gt;...&lt;/thermCorrection&gt;
	&lt;orthorecProc&gt;...&lt;/orthorecProc&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
	<a href="#data_thermal_thermalimage_thermalpixels">&lt;ThermalPixels&gt;...&lt;/ThermalPixels&gt;</a>
<strong>&lt;/ThermalImage&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Volcano:
				<br/>SELECT vd_id FROM vd_inf WHERE vd_cavw = 'volcanoCode'
				<br/>&rarr; #vd_id
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT cs_id, cs_stime, cs_stime_unc, cs_etime, cs_etime_unc FROM cs WHERE cs_code = 'satelliteCode' AND cc_id = #cc_id
				<br/>@current.'time' &plusmn; 'timeUnc' &isin; [cs_stime &plusmn; cs_stime_unc, cs_etime &plusmn; cs_etime_unc]
				<br/>&rarr; #cs_id_sat
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT cs_id, cs_stime, cs_stime_unc, cs_etime, cs_etime_unc FROM cs WHERE cs_code = 'airplaneCode' AND cc_id = #cc_id
				<br/>@current.'time' &plusmn; 'timeUnc' &isin; [cs_stime &plusmn; cs_stime_unc, cs_etime &plusmn; cs_etime_unc]
				<br/>&rarr; #cs_id_air
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT ts_id, ts_stime, ts_stime_unc, ts_etime, ts_etime_unc FROM ts WHERE ts_code = 'stationCode' AND cc_id = #cc_id
				<br/>@current.'time' &plusmn; 'timeUnc' &isin; [ts_stime &plusmn; ts_stime_unc, ts_etime &plusmn; ts_etime_unc]
				<br/>&rarr; #ts_id1
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT ti_id, ti_stime, ti_stime_unc, ti_etime, ti_etime_unc FROM ti WHERE ti_code = 'instrumentCode' AND cc_id = #cc_id
				<br/>@current.'time' &plusmn; 'timeUnc' &isin; [ti_stime &plusmn; ti_stime_unc, ti_etime &plusmn; ti_etime_unc]
				<br/>&rarr; #ti_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'time' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
			<li>
				Link:
				<br/>SELECT ts_id FROM ti WHERE ti_id = '#ti_id'
				<br/>&rarr; #ts_id2
			</li>
			<li>
				Link:
				<br/>SELECT cs_id FROM ti WHERE ti_id = '#ti_id'
				<br/>&rarr; #cs_id
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT td_img_id FROM td_img WHERE td_img_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #td_img_id
		</p>
		<h4>a) INSERT INTO td_img</h4>
		<ul>
			<li>/code &rarr; td_img_code</li>
			<li>instPlatform &rarr; td_img_iplat</li>
			<li>instLat &rarr; td_img_ilat</li>
			<li>instLon &rarr; td_img_ilon</li>
			<li>datum &rarr; td_img_idatum</li>
			<li>instAlt &rarr; td_img_ialt</li>
			<li>description &rarr; td_img_desc</li>
			<li>time &rarr; td_img_time</li>
			<li>timeUnc &rarr; td_img_time_unc</li>
			<li>bandName &rarr; td_img_bname</li>
			<li>highBandWavelength &rarr; td_img_hbwave</li>
			<li>lowBandWavelength &rarr; td_img_lbwave</li>
			<li>pixelSize &rarr; td_img_psize</li>
			<li>maxRadiance &rarr; td_img_maxrad</li>
			<li>maxRelativeRadiance &rarr; td_img_maxrrad</li>
			<li>hottestPixelTemp &rarr; td_img_maxtemp</li>
			<li>totRadiance &rarr; td_img_totrad</li>
			<li>maxHeatFlux &rarr; td_img_maxflux</li>
			<li>nominalTempRes &rarr; td_img_ntres</li>
			<li>atmosCorrection &rarr; td_img_atmcorr</li>
			<li>thermCorrection &rarr; td_img_thmcorr</li>
			<li>orthorecProc &rarr; td_img_ortho</li>
			<li>comments &rarr; td_img_com</li>
			<li>#ti_id &rarr; ti_id</li>
			<li>#ts_id1|#ts_id2 &rarr; ts_id</li>
			<li>#cs_id_sat|#cs_id_air|#cs_id &rarr; cs_id</li>
			<li>#vd_id &rarr; vd_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; td_img_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; td_img_loaddate</li>
		</ul>
		<h4>b) UPDATE td_img WHERE td_img_id = '#td_img_id'</h4>
		<ul>
			<li>instPlatform &rarr; td_img_iplat</li>
			<li>instLat &rarr; td_img_ilat</li>
			<li>instLon &rarr; td_img_ilon</li>
			<li>datum &rarr; td_img_idatum</li>
			<li>instAlt &rarr; td_img_ialt</li>
			<li>description &rarr; td_img_desc</li>
			<li>time &rarr; td_img_time</li>
			<li>timeUnc &rarr; td_img_time_unc</li>
			<li>bandName &rarr; td_img_bname</li>
			<li>highBandWavelength &rarr; td_img_hbwave</li>
			<li>lowBandWavelength &rarr; td_img_lbwave</li>
			<li>pixelSize &rarr; td_img_psize</li>
			<li>maxRadiance &rarr; td_img_maxrad</li>
			<li>maxRelativeRadiance &rarr; td_img_maxrrad</li>
			<li>hottestPixelTemp &rarr; td_img_maxtemp</li>
			<li>totRadiance &rarr; td_img_totrad</li>
			<li>maxHeatFlux &rarr; td_img_maxflux</li>
			<li>nominalTempRes &rarr; td_img_ntres</li>
			<li>atmosCorrection &rarr; td_img_atmcorr</li>
			<li>thermCorrection &rarr; td_img_thmcorr</li>
			<li>orthorecProc &rarr; td_img_ortho</li>
			<li>comments &rarr; td_img_com</li>
			<li>#ti_id &rarr; ti_id</li>
			<li>#ts_id1|#ts_id2 &rarr; ts_id</li>
			<li>#cs_id_sat|#cs_id_air|#cs_id &rarr; cs_id</li>
			<li>#vd_id &rarr; vd_id</li>
			<li>#pubDate &rarr; td_img_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Thermal - Thermal image - Thermal pixels -->
		<h2 class="wovomlclass"><a name="data_thermal_thermalimage_thermalpixels" id="data_thermal_thermalimage_thermalpixels"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_thermal">&lt;Thermal&gt;</a> | <a href="#data_thermal_thermalimage">&lt;ThermalImage&gt;</a> | &lt;ThermalPixels&gt;</h2>
		
<pre><strong>&lt;ThermalPixels</strong>
	<a href="#data_thermal_thermalimage_thermalpixels_thermalpixel">&lt;ThermalPixel&gt;...&lt;/ThermalPixel&gt;</a>
<strong>&lt;/ThermalPixels&gt;</strong></pre>
		
		<h3>Upload/Update</h3>
		<ul class="line_height_150">
			<li>
				Delete:
				<br/>DELETE FROM td_pix WHERE td_img_id = '@parent1'
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Thermal - Thermal image - Thermal pixels - Thermal pixel -->
		<h2 class="wovomlclass"><a name="data_thermal_thermalimage_thermalpixels_thermalpixel" id="data_thermal_thermalimage_thermalpixels_thermalpixel"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_thermal">&lt;Thermal&gt;</a> | <a href="#data_thermal_thermalimage">&lt;ThermalImage&gt;</a> | <a href="#data_thermal_thermalimage_thermalpixels">&lt;ThermalPixels&gt;</a> | &lt;ThermalPixel&gt;</h2>
		
<pre><strong>&lt;ThermalPixel</strong>
	&lt;lat&gt;...&lt;/lat&gt;
	&lt;lon&gt;...&lt;/lon&gt;
	&lt;elev&gt;...&lt;/elev&gt;
	&lt;radiance&gt;...&lt;/radiance&gt;
	&lt;heatFlux&gt;...&lt;/heatFlux&gt;
	&lt;temperature&gt;...&lt;/temperature&gt;
<strong>&lt;/ThermalPixel&gt;</strong></pre>
		
		<h3>Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT td_pix_id FROM td_pix WHERE td_img_id = '@parent2' AND td_pix_lat = 'lat' AND td_pix_lon = 'lon'
			<br/>&rarr; #td_pix_id
		</p>
		<h4>a) INSERT INTO td_pix</h4>
		<ul>
			<li>lat &rarr; td_pix_lat</li>
			<li>lon &rarr; td_pix_lon</li>
			<li>elev &rarr; td_pix_elev</li>
			<li>radiance &rarr; td_pix_rad</li>
			<li>heatFlux &rarr; td_pix_flux</li>
			<li>temperature &rarr; td_pix_temp</li>
			<li>@parent2 &rarr; td_img_id</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; td_pix_loaddate</li>
		</ul>
		<h4>b) UPDATE td_pix WHERE td_pix_id = '#td_pix_id'</h4>
		<ul>
			<li>elev &rarr; td_pix_elev</li>
			<li>radiance &rarr; td_pix_rad</li>
			<li>heatFlux &rarr; td_pix_flux</li>
			<li>temperature &rarr; td_pix_temp</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Seismic -->
		<h2 class="wovomlclass"><a name="data_seismic" id="data_seismic"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | &lt;Seismic&gt;</h2>
		
<pre><strong>&lt;Seismic&gt;</strong>
	<a href="#data_seismic_networkevent">&lt;NetworkEvent&gt;...&lt;/NetworkEvent&gt;</a>
	<a href="#data_seismic_singlestationevent">&lt;SingleStationEvent&gt;...&lt;/SingleStationEvent&gt;</a>
	<a href="#data_seismic_intensity">&lt;Intensity&gt;...&lt;/Intensity&gt;</a>
	<a href="#data_seismic_tremor">&lt;Tremor&gt;...&lt;/Tremor&gt;</a>
	<a href="#data_seismic_waveform">&lt;Waveform&gt;...&lt;/Waveform&gt;</a>
	<a href="#data_seismic_interval">&lt;Interval&gt;...&lt;/Interval&gt;</a>
	<a href="#data_seismic_rsam-ssam">&lt;RSAM-SSAM&gt;...&lt;/RSAM-SSAM&gt;</a>
<strong>&lt;/Seismic&gt;</strong></pre>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Seismic - Network event -->
		<h2 class="wovomlclass"><a name="data_seismic_networkevent" id="data_seismic_networkevent"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_seismic">&lt;Seismic&gt;</a> | &lt;NetworkEvent&gt;</h2>
		
<pre><strong>&lt;NetworkEvent code=&quot;...&quot;&gt;</strong>
	&lt;networkCode&gt;...&lt;/networkCode&gt;
	&lt;seismoArchive&gt;...&lt;/seismoArchive&gt;
	&lt;originTime&gt;...&lt;/originTime&gt;
	&lt;originTimeUnc&gt;...&lt;/originTimeUnc&gt;
	&lt;duration&gt;...&lt;/duration&gt;
	&lt;durationUnc&gt;...&lt;/durationUnc&gt;
	&lt;locaTechnique&gt;...&lt;/locaTechnique&gt;
	&lt;picksDetermination&gt;...&lt;/picksDetermination&gt;
	&lt;lat&gt;...&lt;/lat&gt;
	&lt;lon&gt;...&lt;/lon&gt;
	&lt;depth&gt;...&lt;/depth&gt;
	&lt;fixedDepth&gt;...&lt;/fixedDepth&gt;
	&lt;numberOfStations&gt;...&lt;/numberOfStations&gt;
	&lt;numberOfPhases&gt;...&lt;/numberOfPhases&gt;
	&lt;largestAzimuthGap&gt;...&lt;/largestAzimuthGap&gt;
	&lt;distClosestStation&gt;...&lt;/distClosestStation&gt;
	&lt;travelTimeRMS&gt;...&lt;/travelTimeRMS&gt;
	&lt;horizLocaErr&gt;...&lt;/horizLocaErr&gt;
	&lt;maxLonErr&gt;...&lt;/maxLonErr&gt;
	&lt;maxLatErr&gt;...&lt;/maxLatErr&gt;
	&lt;depthErr&gt;...&lt;/depthErr&gt;
	&lt;locaQuality&gt;...&lt;/locaQuality&gt;
	&lt;primMagnitude&gt;...&lt;/primMagnitude&gt;
	&lt;primMagnitudeType&gt;...&lt;/primMagnitudeType&gt;
	&lt;secMagnitude&gt;...&lt;/secMagnitude&gt;
	&lt;secMagnitudeType&gt;...&lt;/secMagnitudeType&gt;
	&lt;earthquakeType&gt;...&lt;/earthquakeType&gt;
	&lt;momentTensorScale&gt;...&lt;/momentTensorScale&gt;
	&lt;momentTensorXX&gt;...&lt;/momentTensorXX&gt;
	&lt;momentTensorXY&gt;...&lt;/momentTensorXY&gt;
	&lt;momentTensorXZ&gt;...&lt;/momentTensorXZ&gt;
	&lt;momentTensorYY&gt;...&lt;/momentTensorYY&gt;
	&lt;momentTensorYZ&gt;...&lt;/momentTensorYZ&gt;
	&lt;momentTensorZZ&gt;...&lt;/momentTensorZZ&gt;
	&lt;strike1&gt;...&lt;/strike1&gt;
	&lt;strike1Unc&gt;...&lt;/strike1Unc&gt;
	&lt;dip1&gt;...&lt;/dip1&gt;
	&lt;dip1Unc&gt;...&lt;/dip1Unc&gt;
	&lt;rake1&gt;...&lt;/rake1&gt;
	&lt;rake1Unc&gt;...&lt;/rake1Unc&gt;
	&lt;strike2&gt;...&lt;/strike2&gt;
	&lt;strike2Unc&gt;...&lt;/strike2Unc&gt;
	&lt;dip2&gt;...&lt;/dip2&gt;
	&lt;dip2Unc&gt;...&lt;/dip2Unc&gt;
	&lt;rake2&gt;...&lt;/rake2&gt;
	&lt;rake2Unc&gt;...&lt;/rake2Unc&gt;
	&lt;sampleRate&gt;...&lt;/sampleRate&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
	<a href="#data_seismic_networkevent_waveform">&lt;Waveform&gt;...&lt;/Waveform&gt;</a>
<strong>&lt;/NetworkEvent&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT sn_id, sn_stime, sn_stime_unc, sn_etime, sn_etime_unc FROM sn WHERE sn_code = 'networkCode' AND cc_id = #cc_id
				<br/>@current.'originTime' &plusmn; 'originTimeUnc' &isin; [sn_stime &plusmn; sn_stime_unc, sn_etime &plusmn; sn_etime_unc]
				<br/>&rarr; #sn_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'originTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
			<li>
				Get microseconds:
				<br/>'originTime'
				<br/>&rarr; #sd_evn_timecsec
			</li>
			<li>
				Get microseconds:
				<br/>'originTimeUnc'
				<br/>&rarr; #sd_evn_timecsec_unc
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT sd_evn_id FROM sd_evn WHERE sd_evn_code = '/code' AND cc_id = '#cc_id' AND sn_id = '#sn_id' AND sd_evn_tech = 'locaTechnique'
			<br/>&rarr; #sd_evn_id
		</p>
		<h4>a) INSERT INTO sd_evn</h4>
		<ul>
			<li>/code &rarr; sd_evn_code</li>
			<li>seismoArchive &rarr; sd_evn_arch</li>
			<li>originTime &rarr; sd_evn_time</li>
			<li>#sd_evn_timecsec &rarr; sd_evn_timecsec</li>
			<li>originTimeUnc &rarr; sd_evn_time_unc</li>
			<li>#sd_evn_timecsec_unc &rarr; sd_evn_timecsec_unc</li>
			<li>duration &rarr; sd_evn_dur</li>
			<li>durationUnc &rarr; sd_evn_dur_unc</li>
			<li>locaTechnique &rarr; sd_evn_tech</li>
			<li>picksDetermination &rarr; sd_evn_picks</li>
			<li>lat &rarr; sd_evn_elat</li>
			<li>lon &rarr; sd_evn_elon</li>
			<li>depth &rarr; sd_evn_edep</li>
			<li>fixedDepth &rarr; sd_evn_fixdep</li>
			<li>numberOfStations &rarr; sd_evn_nst</li>
			<li>numberOfPhases &rarr; sd_evn_nph</li>
			<li>largestAzimuthGap &rarr; sd_evn_gp</li>
			<li>distClosestStation &rarr; sd_evn_dcs</li>
			<li>travelTimeRMS &rarr; sd_evn_rms</li>
			<li>horizLocaErr &rarr; sd_evn_herr</li>
			<li>maxLonErr &rarr; sd_evn_xerr</li>
			<li>maxLatErr &rarr; sd_evn_yerr</li>
			<li>depthErr &rarr; sd_evn_derr</li>
			<li>locaQuality &rarr; sd_evn_locqual</li>
			<li>primMagnitude &rarr; sd_evn_pmag</li>
			<li>primMagnitudeType &rarr; sd_evn_pmag_type</li>
			<li>secMagnitude &rarr; sd_evn_smag</li>
			<li>secMagnitudeType &rarr; sd_evn_smag_type</li>
			<li>earthquakeType &rarr; sd_evn_eqtype</li>
			<li>momentTensorScale &rarr; sd_evn_mtscale</li>
			<li>momentTensorXX &rarr; sd_evn_mxx</li>
			<li>momentTensorXY &rarr; sd_evn_mxy</li>
			<li>momentTensorXZ &rarr; sd_evn_mxz</li>
			<li>momentTensorYY &rarr; sd_evn_myy</li>
			<li>momentTensorYZ &rarr; sd_evn_myz</li>
			<li>momentTensorZZ &rarr; sd_evn_mzz</li>
			<li>strike1 &rarr; sd_evn_strk1</li>
			<li>strike1Unc &rarr; sd_evn_strk1_err</li>
			<li>dip1 &rarr; sd_evn_dip1</li>
			<li>dip1Unc &rarr; sd_evn_dip1_err</li>
			<li>rake1 &rarr; sd_evn_rak1</li>
			<li>rake1Unc &rarr; sd_evn_rak1_err</li>
			<li>strike2 &rarr; sd_evn_strk2</li>
			<li>strike2Unc &rarr; sd_evn_strk2_err</li>
			<li>dip2 &rarr; sd_evn_dip2</li>
			<li>dip2Unc &rarr; sd_evn_dip2_err</li>
			<li>rake2 &rarr; sd_evn_rak2</li>
			<li>rake2Unc &rarr; sd_evn_rak2_err</li>
			<li>sampleRate &rarr; sd_evn_samp</li>
			<li>#sn_id &rarr; sn_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; sd_evn_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; sd_evn_loaddate</li>
		</ul>
		<h4>b) UPDATE sd_evn WHERE sd_evn_id = '#sd_evn_id'</h4>
		<ul>
			<li>seismoArchive &rarr; sd_evn_arch</li>
			<li>originTime &rarr; sd_evn_time</li>
			<li>#sd_evn_timecsec &rarr; sd_evn_timecsec</li>
			<li>originTimeUnc &rarr; sd_evn_time_unc</li>
			<li>#sd_evn_timecsec_unc &rarr; sd_evn_timecsec_unc</li>
			<li>duration &rarr; sd_evn_dur</li>
			<li>durationUnc &rarr; sd_evn_dur_unc</li>
			<li>picksDetermination &rarr; sd_evn_picks</li>
			<li>lat &rarr; sd_evn_elat</li>
			<li>lon &rarr; sd_evn_elon</li>
			<li>depth &rarr; sd_evn_edep</li>
			<li>fixedDepth &rarr; sd_evn_fixdep</li>
			<li>numberOfStations &rarr; sd_evn_nst</li>
			<li>numberOfPhases &rarr; sd_evn_nph</li>
			<li>largestAzimuthGap &rarr; sd_evn_gp</li>
			<li>distClosestStation &rarr; sd_evn_dcs</li>
			<li>travelTimeRMS &rarr; sd_evn_rms</li>
			<li>horizLocaErr &rarr; sd_evn_herr</li>
			<li>maxLonErr &rarr; sd_evn_xerr</li>
			<li>maxLatErr &rarr; sd_evn_yerr</li>
			<li>depthErr &rarr; sd_evn_derr</li>
			<li>locaQuality &rarr; sd_evn_locqual</li>
			<li>primMagnitude &rarr; sd_evn_pmag</li>
			<li>primMagnitudeType &rarr; sd_evn_pmag_type</li>
			<li>secMagnitude &rarr; sd_evn_smag</li>
			<li>secMagnitudeType &rarr; sd_evn_smag_type</li>
			<li>earthquakeType &rarr; sd_evn_eqtype</li>
			<li>momentTensorScale &rarr; sd_evn_mtscale</li>
			<li>momentTensorXX &rarr; sd_evn_mxx</li>
			<li>momentTensorXY &rarr; sd_evn_mxy</li>
			<li>momentTensorXZ &rarr; sd_evn_mxz</li>
			<li>momentTensorYY &rarr; sd_evn_myy</li>
			<li>momentTensorYZ &rarr; sd_evn_myz</li>
			<li>momentTensorZZ &rarr; sd_evn_mzz</li>
			<li>strike1 &rarr; sd_evn_strk1</li>
			<li>strike1Unc &rarr; sd_evn_strk1_err</li>
			<li>dip1 &rarr; sd_evn_dip1</li>
			<li>dip1Unc &rarr; sd_evn_dip1_err</li>
			<li>rake1 &rarr; sd_evn_rak1</li>
			<li>rake1Unc &rarr; sd_evn_rak1_err</li>
			<li>strike2 &rarr; sd_evn_strk2</li>
			<li>strike2Unc &rarr; sd_evn_strk2_err</li>
			<li>dip2 &rarr; sd_evn_dip2</li>
			<li>dip2Unc &rarr; sd_evn_dip2_err</li>
			<li>rake2 &rarr; sd_evn_rak2</li>
			<li>rake2Unc &rarr; sd_evn_rak2_err</li>
			<li>sampleRate &rarr; sd_evn_samp</li>
			<li>#pubDate &rarr; sd_evn_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Seismic - Network event - Waveform -->
		<h2 class="wovomlclass"><a name="data_seismic_networkevent_waveform" id="data_seismic_networkevent_waveform"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_seismic">&lt;Seismic&gt;</a> | <a href="#data_seismic_networkevent">&lt;NetworkEvent&gt;</a> | &lt;Waveform&gt;</h2>
		
<pre><strong>&lt;Waveform code=&quot;...&quot;&gt;</strong>
	&lt;archive&gt;...&lt;/archive&gt;
	&lt;distSummit&gt;...&lt;/distSummit&gt;
	&lt;information&gt;...&lt;/information&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/Waveform&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Link:
				<br/>SELECT ss_id FROM ss WHERE ss_code = 'stationCode' AND cc_id = #cc_id
				<br/>&rarr; #ss_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT sd_wav_id FROM sd_wav WHERE sd_wav_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #sd_wav_id
		</p>
		<h4>a) INSERT INTO sd_wav</h4>
		<ul>
			<li>/code &rarr; sd_wav_code</li>
			<li>archive &rarr; sd_wav_arch</li>
			<li>distSummit &rarr; sd_wav_dist</li>
			<li>information &rarr; sd_wav_info</li>
			<li>description &rarr; sd_wav_desc</li>
			<li>"N" &rarr; sd_evt_flag</li>
			<li>@parent1 &rarr; sd_evt_id</li>
			<li>#ss_id &rarr; ss_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; sd_wav_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; sd_wav_loaddate</li>
		</ul>
		<h4>b) UPDATE sd_wav WHERE sd_wav_id = '#sd_wav_id'</h4>
		<ul>
			<li>archive &rarr; sd_wav_arch</li>
			<li>distSummit &rarr; sd_wav_dist</li>
			<li>information &rarr; sd_wav_info</li>
			<li>description &rarr; sd_wav_desc</li>
			<li>"N" &rarr; sd_evt_flag</li>
			<li>@parent1 &rarr; sd_evt_id</li>
			<li>#ss_id &rarr; ss_id</li>
			<li>#pubDate &rarr; sd_wav_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Seismic - Single station event -->
		<h2 class="wovomlclass"><a name="data_seismic_singlestationevent" id="data_seismic_singlestationevent"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_seismic">&lt;Seismic&gt;</a> | &lt;SingleStationEvent&gt;</h2>
		
<pre><strong>&lt;SingleStationEvent code=&quot;...&quot;&gt;</strong>
	&lt;stationCode&gt;...&lt;/stationCode&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;duration&gt;...&lt;/duration&gt;
	&lt;durationUnc&gt;...&lt;/durationUnc&gt;
	&lt;picksDetermination&gt;...&lt;/picksDetermination&gt;
	&lt;SPInterval&gt;...&lt;/SPInterval&gt;
	&lt;distActiveVent&gt;...&lt;/distActiveVent&gt;
	&lt;maxAmplitude&gt;...&lt;/maxAmplitude&gt;
	&lt;sampleRate&gt;...&lt;/sampleRate&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
	<a href="#data_seismic_singlestationevent_waveform">&lt;Waveform&gt;...&lt;/Waveform&gt;</a>
<strong>&lt;/SingleStationEvent&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT ss_id, ss_stime, ss_stime_unc, ss_etime, ss_etime_unc FROM ss WHERE ss_code = 'stationCode' AND cc_id = #cc_id
				<br/>@current.'startTime' &plusmn; 'startTimeUnc' &isin; [ss_stime &plusmn; ss_stime_unc, ss_etime &plusmn; ss_etime_unc]
				<br/>&rarr; #ss_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
			<li>
				Get microseconds:
				<br/>'startTime'
				<br/>&rarr; #sd_evs_time_ms
			</li>
			<li>
				Get microseconds:
				<br/>'startTimeUnc'
				<br/>&rarr; #sd_evs_time_unc_ms
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT sd_evs_id FROM sd_evs WHERE sd_evs_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #sd_evs_id
		</p>
		<h4>a) INSERT INTO sd_evs</h4>
		<ul>
			<li>/code &rarr; sd_evs_code</li>
			<li>startTime &rarr; sd_evs_time</li>
			<li>#sd_evs_time_ms &rarr; sd_evs_time_ms</li>
			<li>startTimeUnc &rarr; sd_evs_time_unc</li>
			<li>#sd_evs_time_unc_ms &rarr; sd_evs_time_unc_ms</li>
			<li>duration &rarr; sd_evs_dur</li>
			<li>durationUnc &rarr; sd_evs_dur_unc</li>
			<li>picksDetermination &rarr; sd_evs_picks</li>
			<li>SPInterval &rarr; sd_evs_spint</li>
			<li>distActiveVent &rarr; sd_evs_dist_actven</li>
			<li>maxAmplitude &rarr; sd_evs_maxamptrac</li>
			<li>sampleRate &rarr; sd_evs_samp</li>
			<li>#ss_id &rarr; ss_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; sd_evs_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; sd_evs_loaddate</li>
		</ul>
		<h4>b) UPDATE sd_evs WHERE sd_evs_id = '#sd_evs_id'</h4>
		<ul>
			<li>startTime &rarr; sd_evs_time</li>
			<li>#sd_evs_time_ms &rarr; sd_evs_time_ms</li>
			<li>startTimeUnc &rarr; sd_evs_time_unc</li>
			<li>#sd_evs_time_unc_ms &rarr; sd_evs_time_unc_ms</li>
			<li>duration &rarr; sd_evs_dur</li>
			<li>durationUnc &rarr; sd_evs_dur_unc</li>
			<li>picksDetermination &rarr; sd_evs_picks</li>
			<li>SPInterval &rarr; sd_evs_spint</li>
			<li>distActiveVent &rarr; sd_evs_dist_actven</li>
			<li>maxAmplitude &rarr; sd_evs_maxamptrac</li>
			<li>sampleRate &rarr; sd_evs_samp</li>
			<li>#ss_id &rarr; ss_id</li>
			<li>#pubDate &rarr; sd_evs_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Seismic - Single station event - Waveform -->
		<h2 class="wovomlclass"><a name="data_seismic_singlestationevent_waveform" id="data_seismic_singlestationevent_waveform"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_seismic">&lt;Seismic&gt;</a> | <a href="#data_seismic_singlestationevent">&lt;SingleStationEvent&gt;</a> | &lt;Waveform&gt;</h2>
		
<pre><strong>&lt;Waveform code=&quot;...&quot;&gt;</strong>
	&lt;archive&gt;...&lt;/archive&gt;
	&lt;distSummit&gt;...&lt;/distSummit&gt;
	&lt;information&gt;...&lt;/information&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/Waveform&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Link:
				<br/>SELECT ss_id FROM ss WHERE ss_code = 'stationCode' AND cc_id = #cc_id
				<br/>&rarr; #ss_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT sd_wav_id FROM sd_wav WHERE sd_wav_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #sd_wav_id
		</p>
		<h4>a) INSERT INTO sd_wav</h4>
		<ul>
			<li>/code &rarr; sd_wav_code</li>
			<li>archive &rarr; sd_wav_arch</li>
			<li>distSummit &rarr; sd_wav_dist</li>
			<li>information &rarr; sd_wav_info</li>
			<li>description &rarr; sd_wav_desc</li>
			<li>"S" &rarr; sd_evt_flag</li>
			<li>@parent1 &rarr; sd_evt_id</li>
			<li>#ss_id &rarr; ss_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; sd_wav_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; sd_wav_loaddate</li>
		</ul>
		<h4>b) UPDATE sd_wav WHERE sd_wav_id = '#sd_wav_id'</h4>
		<ul>
			<li>archive &rarr; sd_wav_arch</li>
			<li>distSummit &rarr; sd_wav_dist</li>
			<li>information &rarr; sd_wav_info</li>
			<li>description &rarr; sd_wav_desc</li>
			<li>"S" &rarr; sd_evt_flag</li>
			<li>@parent1 &rarr; sd_evt_id</li>
			<li>#ss_id &rarr; ss_id</li>
			<li>#pubDate &rarr; sd_wav_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Seismic - Intensity -->
		<h2 class="wovomlclass"><a name="data_seismic_intensity" id="data_seismic_intensity"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_seismic">&lt;Seismic&gt;</a> | &lt;Intensity&gt;</h2>
		
<pre><strong>&lt;Intensity code=&quot;...&quot;&gt;</strong>
	&lt;volcanoCode&gt;...&lt;/volcanoCode&gt;
	&lt;networkEventCode&gt;...&lt;/networkEventCode&gt;		&lt;!-- OR &lt;singleStationEventCode&gt;...&lt;/singleStationEventCode&gt; --&gt;
	&lt;time&gt;...&lt;/time&gt;
	&lt;timeUnc&gt;...&lt;/timeUnc&gt;
	&lt;city&gt;...&lt;/city&gt;
	&lt;maxDistance&gt;...&lt;/maxDistance&gt;
	&lt;maxReported&gt;...&lt;/maxReported&gt;
	&lt;distMaxReported&gt;...&lt;/distMaxReported&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/Intensity&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Volcano:
				<br/>SELECT vd_id FROM vd_inf WHERE vd_inf_cavw = 'volcanoCode'
				<br/>&rarr; #vd_id
			</li>
			<li>
				Link:
				<br/>SELECT sd_evn_id FROM sd_evn WHERE sd_evn_code = 'networkEventCode' AND cc_id = #cc_id
				<br/>&rarr; #sd_evn_id
			</li>
			<li>
				Link:
				<br/>SELECT sd_evs_id FROM sd_evs WHERE sd_evs_code = 'singleStationEventCode' AND cc_id = #cc_id
				<br/>&rarr; #sd_evs_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'time' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT sd_int_id FROM sd_int WHERE sd_int_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #sd_int_id
		</p>
		<h4>a) INSERT INTO sd_int</h4>
		<ul>
			<li>/code &rarr; sd_int_code</li>
			<li>time &rarr; sd_int_time</li>
			<li>timeUnc &rarr; sd_int_time_unc</li>
			<li>city &rarr; sd_int_city</li>
			<li>maxDistance &rarr; sd_int_maxdist</li>
			<li>maxReported &rarr; sd_int_maxrint</li>
			<li>distMaxReported &rarr; sd_int_maxrint_dist</li>
			<li>#sd_evn_id &rarr; sd_evn_id</li>
			<li>#sd_evs_id &rarr; sd_evs_id</li>
			<li>#vd_id &rarr; vd_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; sd_int_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; sd_int_loaddate</li>
		</ul>
		<h4>b) UPDATE sd_int WHERE sd_int_id = '#sd_int_id'</h4>
		<ul>
			<li>time &rarr; sd_int_time</li>
			<li>timeUnc &rarr; sd_int_time_unc</li>
			<li>city &rarr; sd_int_city</li>
			<li>maxDistance &rarr; sd_int_maxdist</li>
			<li>maxReported &rarr; sd_int_maxrint</li>
			<li>distMaxReported &rarr; sd_int_maxrint_dist</li>
			<li>#sd_evn_id &rarr; sd_evn_id</li>
			<li>#sd_evs_id &rarr; sd_evs_id</li>
			<li>#vd_id &rarr; vd_id</li>
			<li>#pubDate &rarr; sd_int_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Seismic - Tremor -->
		<h2 class="wovomlclass"><a name="data_seismic_tremor" id="data_seismic_tremor"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_seismic">&lt;Seismic&gt;</a> | &lt;Tremor&gt;</h2>
		
<pre><strong>&lt;Tremor code=&quot;...&quot;&gt;</strong>
	&lt;networkCode&gt;...&lt;/networkCode&gt;		&lt;!-- OR &lt;stationCode&gt;...&lt;/stationCode&gt; --&gt;
	&lt;type&gt;...&lt;/type&gt;
	&lt;qualitativeDepth&gt;...&lt;/qualitativeDepth&gt;
	&lt;dominantFreq&gt;...&lt;/dominantFreq&gt;
	&lt;secondDominantFreq&gt;...&lt;/secondDominantFreq&gt;
	&lt;maxAmplitude&gt;...&lt;/maxAmplitude&gt;
	&lt;backgroundNoise&gt;...&lt;/backgroundNoise&gt;
	&lt;reducedDisp&gt;...&lt;/reducedDisp&gt;
	&lt;reducedDispUnc&gt;...&lt;/reducedDispUnc&gt;
	&lt;visibleActivity&gt;...&lt;/visibleActivity&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;durationPerDay&gt;...&lt;/durationPerDay&gt;
	&lt;durationPerDayUnc&gt;...&lt;/durationPerDayUnc&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
	<a href="#data_seismic_tremor_waveform">&lt;Waveform&gt;...&lt;/Waveform&gt;</a>
<strong>&lt;/Tremor&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT sn_id, sn_stime, sn_stime_unc, sn_etime, sn_etime_unc FROM sn WHERE sn_code = 'networkCode' AND cc_id = #cc_id
				<br/>@current.'startTime' &plusmn; 'startTimeUnc' &isin; [sn_stime &plusmn; sn_stime_unc, sn_etime &plusmn; sn_etime_unc]
				<br/>&rarr; #sn_id
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT ss_id, ss_stime, ss_stime_unc, ss_etime, ss_etime_unc FROM ss WHERE ss_code = 'stationCode' AND cc_id = #cc_id
				<br/>@current.'startTime' &plusmn; 'startTimeUnc' &isin; [ss_stime &plusmn; ss_stime_unc, ss_etime &plusmn; ss_etime_unc]
				<br/>&rarr; #ss_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT sd_trm_id FROM sd_trm WHERE sd_trm_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #sd_trm_id
		</p>
		<h4>a) INSERT INTO sd_trm</h4>
		<ul>
			<li>/code &rarr; sd_trm_code</li>
			<li>type &rarr; sd_trm_type</li>
			<li>qualitativeDepth &rarr; sd_trm_qdepth</li>
			<li>dominantFreq &rarr; sd_trm_domfreq1</li>
			<li>secondDominantFreq &rarr; sd_trm_domfreq2</li>
			<li>maxAmplitude &rarr; sd_trm_maxamp</li>
			<li>backgroundNoise &rarr; sd_trm_noise</li>
			<li>reducedDisp &rarr; sd_trm_reddis</li>
			<li>reducedDispUnc &rarr; sd_trm_rderr</li>
			<li>visibleActivity &rarr; sd_trm_visact</li>
			<li>startTime &rarr; sd_trm_stime</li>
			<li>startTimeUnc &rarr; sd_trm_stime_unc</li>
			<li>endTime &rarr; sd_trm_etime</li>
			<li>endTimeUnc &rarr; sd_trm_etime_unc</li>
			<li>durationPerDay &rarr; sd_trm_dur_day</li>
			<li>durationPerDayUnc &rarr; sd_trm_dur_day_unc</li>
			<li>#sn_id &rarr; sn_id</li>
			<li>#ss_id &rarr; ss_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; sd_trm_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; sd_trm_loaddate</li>
		</ul>
		<h4>b) UPDATE sd_trm WHERE sd_trm_id = '#sd_trm_id'</h4>
		<ul>
			<li>type &rarr; sd_trm_type</li>
			<li>qualitativeDepth &rarr; sd_trm_qdepth</li>
			<li>dominantFreq &rarr; sd_trm_domfreq1</li>
			<li>secondDominantFreq &rarr; sd_trm_domfreq2</li>
			<li>maxAmplitude &rarr; sd_trm_maxamp</li>
			<li>backgroundNoise &rarr; sd_trm_noise</li>
			<li>reducedDisp &rarr; sd_trm_reddis</li>
			<li>reducedDispUnc &rarr; sd_trm_rderr</li>
			<li>visibleActivity &rarr; sd_trm_visact</li>
			<li>startTime &rarr; sd_trm_stime</li>
			<li>startTimeUnc &rarr; sd_trm_stime_unc</li>
			<li>endTime &rarr; sd_trm_etime</li>
			<li>endTimeUnc &rarr; sd_trm_etime_unc</li>
			<li>durationPerDay &rarr; sd_trm_dur_day</li>
			<li>durationPerDayUnc &rarr; sd_trm_dur_day_unc</li>
			<li>#sn_id &rarr; sn_id</li>
			<li>#ss_id &rarr; ss_id</li>
			<li>#pubDate &rarr; sd_trm_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Seismic - Tremor - Waveform -->
		<h2 class="wovomlclass"><a name="data_seismic_tremor_waveform" id="data_seismic_tremor_waveform"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_seismic">&lt;Seismic&gt;</a> | <a href="#data_seismic_tremor">&lt;Tremor&gt;</a> | &lt;Waveform&gt;</h2>
		
<pre><strong>&lt;Waveform code=&quot;...&quot;&gt;</strong>
	&lt;archive&gt;...&lt;/archive&gt;
	&lt;distSummit&gt;...&lt;/distSummit&gt;
	&lt;information&gt;...&lt;/information&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/Waveform&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Link:
				<br/>SELECT ss_id FROM ss WHERE ss_code = 'stationCode' AND cc_id = #cc_id
				<br/>&rarr; #ss_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT sd_wav_id FROM sd_wav WHERE sd_wav_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #sd_wav_id
		</p>
		<h4>a) INSERT INTO sd_wav</h4>
		<ul>
			<li>/code &rarr; sd_wav_code</li>
			<li>archive &rarr; sd_wav_arch</li>
			<li>distSummit &rarr; sd_wav_dist</li>
			<li>information &rarr; sd_wav_info</li>
			<li>description &rarr; sd_wav_desc</li>
			<li>"T" &rarr; sd_evt_flag</li>
			<li>@parent1 &rarr; sd_evt_id</li>
			<li>#ss_id &rarr; ss_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; sd_wav_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; sd_wav_loaddate</li>
		</ul>
		<h4>b) UPDATE sd_wav WHERE sd_wav_id = '#sd_wav_id'</h4>
		<ul>
			<li>archive &rarr; sd_wav_arch</li>
			<li>distSummit &rarr; sd_wav_dist</li>
			<li>information &rarr; sd_wav_info</li>
			<li>description &rarr; sd_wav_desc</li>
			<li>"T" &rarr; sd_evt_flag</li>
			<li>@parent1 &rarr; sd_evt_id</li>
			<li>#ss_id &rarr; ss_id</li>
			<li>#pubDate &rarr; sd_wav_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Seismic - Waveform -->
		<h2 class="wovomlclass"><a name="data_seismic_waveform" id="data_seismic_waveform"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_seismic">&lt;Seismic&gt;</a> | &lt;Waveform&gt;</h2>
		
<pre><strong>&lt;Waveform code=&quot;...&quot;&gt;</strong>
	&lt;networkEventCode&gt;...&lt;/networkEventCode&gt;		&lt;!-- OR &lt;singleStationEventCode&gt;...&lt;/singleStationEventCode&gt; OR &lt;tremorCode&gt;...&lt;/tremorCode&gt; --&gt;
	&lt;archive&gt;...&lt;/archive&gt;
	&lt;distSummit&gt;...&lt;/distSummit&gt;
	&lt;information&gt;...&lt;/information&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/Waveform&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Volcano:
				<br/>SELECT vd_id FROM vd_inf WHERE vd_inf_cavw = 'volcanoCode'
				<br/>&rarr; #vd_id
			</li>
			<li>
				Link:
				<br/>SELECT sd_evn_id FROM sd_evn WHERE sd_evn_code = 'networkEventCode' AND cc_id = #cc_id
				<br/>&rarr; #sd_evn_id
			</li>
			<li>
				Link:
				<br/>SELECT sd_evs_id FROM sd_evs WHERE sd_evs_code = 'singleStationEventCode' AND cc_id = #cc_id
				<br/>&rarr; #sd_evs_id
			</li>
			<li>
				Link:
				<br/>SELECT sd_trm_id FROM sd_trm WHERE sd_trm_code = 'tremorCode' AND cc_id = #cc_id
				<br/>&rarr; #sd_trm_id
			</li>
			<li>
				Link:
				<br/>SELECT ss_id FROM ss WHERE ss_code = 'stationCode' AND cc_id = #cc_id
				<br/>&rarr; #ss_id
			</li>
			<li>
				Event type:
				<ul>
					<li>networkEventCode = 'N'</li>
					<li>singleStationEventCode = 'S'</li>
					<li>tremorCode = 'T'</li>
				</ul>
				&rarr; #sd_evt_flag
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT sd_wav_id FROM sd_wav WHERE sd_wav_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #sd_wav_id
		</p>
		<h4>a) INSERT INTO sd_wav</h4>
		<ul>
			<li>/code &rarr; sd_wav_code</li>
			<li>archive &rarr; sd_wav_arch</li>
			<li>distSummit &rarr; sd_wav_dist</li>
			<li>information &rarr; sd_wav_info</li>
			<li>description &rarr; sd_wav_desc</li>
			<li>#sd_evn_id|#sd_evs_id|#sd_trm_id &rarr; sd_evt_id</li>
			<li>#sd_evt_flag &rarr; sd_evt_flag</li>
			<li>#ss_id &rarr; ss_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; sd_wav_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; sd_wav_loaddate</li>
		</ul>
		<h4>b) UPDATE sd_wav WHERE sd_wav_id = '#sd_wav_id'</h4>
		<ul>
			<li>archive &rarr; sd_wav_arch</li>
			<li>distSummit &rarr; sd_wav_dist</li>
			<li>information &rarr; sd_wav_info</li>
			<li>description &rarr; sd_wav_desc</li>
			<li>#sd_evn_id|#sd_evs_id|#sd_trm_id &rarr; sd_evt_id</li>
			<li>#sd_evt_flag &rarr; sd_evt_flag</li>
			<li>#ss_id &rarr; ss_id</li>
			<li>#pubDate &rarr; sd_wav_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Seismic - Interval -->
		<h2 class="wovomlclass"><a name="data_seismic_interval" id="data_seismic_interval"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_seismic">&lt;Seismic&gt;</a> | &lt;Interval&gt;</h2>
		
<pre><strong>&lt;Interval code=&quot;...&quot;&gt;</strong>
	&lt;networkCode&gt;...&lt;/networkCode&gt;		&lt;!-- OR &lt;stationCode&gt;...&lt;/stationCode&gt; --&gt;
	&lt;earthquakeType&gt;...&lt;/earthquakeType&gt;
	&lt;hDistSummit&gt;...&lt;/hDistSummit&gt;
	&lt;meanDepth&gt;...&lt;/meanDepth&gt;
	&lt;verticalDisp&gt;...&lt;/verticalDisp&gt;
	&lt;hypocenterHMigr&gt;...&lt;/hypocenterHMigr&gt;
	&lt;hypocenterVMigr&gt;...&lt;/hypocenterVMigr&gt;
	&lt;temporalPattern&gt;...&lt;/temporalPattern&gt;
	&lt;dataType&gt;...&lt;/dataType&gt;
	&lt;picksDetermination&gt;...&lt;/picksDetermination&gt;
	&lt;numbOfRecEq&gt;...&lt;/numbOfRecEq&gt;
	&lt;numbOfFeltEq&gt;...&lt;/numbOfFeltEq&gt;
	&lt;feltEqCntStartTime&gt;...&lt;/feltEqCntStartTime&gt;
	&lt;feltEqCntStartTimeUnc&gt;...&lt;/feltEqCntStartTimeUnc&gt;
	&lt;feltEqCntEndTime&gt;...&lt;/feltEqCntEndTime&gt;
	&lt;feltEqCntEndTimeUnc&gt;...&lt;/feltEqCntEndTimeUnc&gt;
	&lt;energyRelease&gt;...&lt;/energyRelease&gt;
	&lt;energyMeasStartTime&gt;...&lt;/energyMeasStartTime&gt;
	&lt;energyMeasStartTimeUnc&gt;...&lt;/energyMeasStartTimeUnc&gt;
	&lt;energyMeasEndTime&gt;...&lt;/energyMeasEndTime&gt;
	&lt;energyMeasEndTimeUnc&gt;...&lt;/energyMeasEndTimeUnc&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
<strong>&lt;/Interval&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Time order:
				<br/>'feltEqCntStartTime' &le; 'feltEqCntEndTime'
			</li>
			<li>
				Time order:
				<br/>'energyMeasStartTime' &le; 'energyMeasEndTime'
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT sn_id, sn_stime, sn_stime_unc, sn_etime, sn_etime_unc FROM sn WHERE sn_code = 'networkCode' AND cc_id = #cc_id
				<br/>@current.'startTime' &plusmn; 'startTimeUnc' &isin; [sn_stime &plusmn; sn_stime_unc, sn_etime &plusmn; sn_etime_unc]
				<br/>&rarr; #sn_id
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT ss_id, ss_stime, ss_stime_unc, ss_etime, ss_etime_unc FROM ss WHERE ss_code = 'stationCode' AND cc_id = #cc_id
				<br/>@current.'startTime' &plusmn; 'startTimeUnc' &isin; [ss_stime &plusmn; ss_stime_unc, ss_etime &plusmn; ss_etime_unc]
				<br/>&rarr; #ss_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>'feltEqCntStartTime' + 2 years</li>
					<li>'feltEqCntEndTime' + 2 years</li>
					<li>'energyMeasStartTime' + 2 years</li>
					<li>'energyMeasEndTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT sd_ivl_id FROM sd_ivl WHERE sd_ivl_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #sd_ivl_id
		</p>
		<h4>a) INSERT INTO sd_ivl</h4>
		<ul>
			<li>/code &rarr; sd_ivl_code</li>
			<li>earthquakeType &rarr; sd_ivl_eqtype</li>
			<li>hDistSummit &rarr; sd_ivl_hdist</li>
			<li>meanDepth &rarr; sd_ivl_avgdepth</li>
			<li>verticalDisp &rarr; sd_ivl_vdispers</li>
			<li>hypocenterHMigr &rarr; sd_ivl_hmigr_hyp</li>
			<li>hypocenterVMigr &rarr; sd_ivl_vmigr_hyp</li>
			<li>temporalPattern &rarr; sd_ivl_patt</li>
			<li>dataType &rarr; sd_ivl_data</li>
			<li>picksDetermination &rarr; sd_ivl_picks</li>
			<li>numbOfRecEq &rarr; sd_ivl_nrec</li>
			<li>numbOfFeltEq &rarr; sd_ivl_nfelt</li>
			<li>feltEqCntStartTime &rarr; sd_ivl_felt_stime</li>
			<li>feltEqCntStartTimeUnc &rarr; sd_ivl_felt_stime_unc</li>
			<li>feltEqCntEndTime &rarr; sd_ivl_felt_etime</li>
			<li>feltEqCntEndTimeUnc &rarr; sd_ivl_felt_etime_unc</li>
			<li>energyRelease &rarr; sd_ivl_etot</li>
			<li>energyMeasStartTime &rarr; sd_ivl_etot_stime</li>
			<li>energyMeasStartTimeUnc &rarr; sd_ivl_etot_stime_unc</li>
			<li>energyMeasEndTime &rarr; sd_ivl_etot_etime</li>
			<li>energyMeasEndTimeUnc &rarr; sd_ivl_etot_etime_unc</li>
			<li>startTime &rarr; sd_ivl_stime</li>
			<li>startTimeUnc &rarr; sd_ivl_stime_unc</li>
			<li>endTime &rarr; sd_ivl_etime</li>
			<li>endTimeUnc &rarr; sd_ivl_etime_unc</li>
			<li>description &rarr; sd_ivl_desc</li>
			<li>#sn_id &rarr; sn_id</li>
			<li>#ss_id &rarr; ss_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; sd_ivl_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; sd_ivl_loaddate</li>
		</ul>
		<h4>b) UPDATE sd_ivl WHERE sd_ivl_id = '#sd_ivl_id'</h4>
		<ul>
			<li>earthquakeType &rarr; sd_ivl_eqtype</li>
			<li>hDistSummit &rarr; sd_ivl_hdist</li>
			<li>meanDepth &rarr; sd_ivl_avgdepth</li>
			<li>verticalDisp &rarr; sd_ivl_vdispers</li>
			<li>hypocenterHMigr &rarr; sd_ivl_hmigr_hyp</li>
			<li>hypocenterVMigr &rarr; sd_ivl_vmigr_hyp</li>
			<li>temporalPattern &rarr; sd_ivl_patt</li>
			<li>dataType &rarr; sd_ivl_data</li>
			<li>picksDetermination &rarr; sd_ivl_picks</li>
			<li>numbOfRecEq &rarr; sd_ivl_nrec</li>
			<li>numbOfFeltEq &rarr; sd_ivl_nfelt</li>
			<li>feltEqCntStartTime &rarr; sd_ivl_felt_stime</li>
			<li>feltEqCntStartTimeUnc &rarr; sd_ivl_felt_stime_unc</li>
			<li>feltEqCntEndTime &rarr; sd_ivl_felt_etime</li>
			<li>feltEqCntEndTimeUnc &rarr; sd_ivl_felt_etime_unc</li>
			<li>energyRelease &rarr; sd_ivl_etot</li>
			<li>energyMeasStartTime &rarr; sd_ivl_etot_stime</li>
			<li>energyMeasStartTimeUnc &rarr; sd_ivl_etot_stime_unc</li>
			<li>energyMeasEndTime &rarr; sd_ivl_etot_etime</li>
			<li>energyMeasEndTimeUnc &rarr; sd_ivl_etot_etime_unc</li>
			<li>startTime &rarr; sd_ivl_stime</li>
			<li>startTimeUnc &rarr; sd_ivl_stime_unc</li>
			<li>endTime &rarr; sd_ivl_etime</li>
			<li>endTimeUnc &rarr; sd_ivl_etime_unc</li>
			<li>description &rarr; sd_ivl_desc</li>
			<li>#sn_id &rarr; sn_id</li>
			<li>#ss_id &rarr; ss_id</li>
			<li>#pubDate &rarr; sd_ivl_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Seismic - RSAM-SSAM -->
		<h2 class="wovomlclass"><a name="data_seismic_rsam-ssam" id="data_seismic_rsam-ssam"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_seismic">&lt;Seismic&gt;</a> | &lt;RSAM-SSAM&gt;</h2>
		
<pre><strong>&lt;RSAM-SSAM code=&quot;...&quot;&gt;</strong>
	&lt;stationCode&gt;...&lt;/stationCode&gt;
	&lt;cntInterval&gt;...&lt;/cntInterval&gt;
	&lt;cntIntervalUnc&gt;...&lt;/cntIntervalUnc&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	&lt;pubDate&gt;...&lt;/pubDate&gt;
	<a href="#data_seismic_rsam-ssam_rsam">&lt;RSAM&gt;...&lt;/RSAM&gt;</a>
	<a href="#data_seismic_rsam-ssam_ssam">&lt;SSAM&gt;...&lt;/SSAM&gt;</a>
<strong>&lt;/RSAM-SSAM&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Owner:
				<br/>SELECT cc_id FROM cc WHERE cc_code = 'ownerCode'
				<br/>&rarr; #cc_id
			</li>
			<li>
				Time order:
				<br/>'startTime' &le; 'endTime'
			</li>
			<li>
				Time coherence:
				<br/>[@child2.'startTime' &plusmn; 'startTimeUnc', @child2.'endTime' &plusmn; 'endTimeUnc'] &sub; ['startTime' &plusmn; 'startTimeUnc', 'endTime' &plusmn; 'endTimeUnc']
				<br/>@child2(n).'endTime' &plusmn; 'endTimeUnc' = @child2(n+1).'startTime' &plusmn; 'startTimeUnc' + 'cntInterval' &plusmn; 'cntIntervalUnc'
				<br/>For SSAM data: IF @child2(n+1).'startTime' = @child2(n).'startTime', THEN @child2(n+1).'lowFreq' = @child2(n).'highFreq'
			</li>
			<li>
				Link with time inclusion:
				<br/>SELECT ss_id, ss_stime, ss_stime_unc, ss_etime, ss_etime_unc FROM ss WHERE ss_code = 'stationCode' AND cc_id = #cc_id
				<br/>@current.'startTime' &plusmn; 'startTimeUnc' &isin; [ss_stime &plusmn; ss_stime_unc, ss_etime &plusmn; ss_etime_unc]
				<br/>&rarr; #ss_id
			</li>
			<li>
				Publish date:
				<ul>
					<li>'startTime' + 2 years</li>
					<li>'endTime' + 2 years</li>
					<li>!pubdate</li>
				</ul>
				&rarr; #pubDate
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT sd_sam_id FROM sd_sam WHERE sd_sam_code = '/code' AND cc_id = '#cc_id'
			<br/>&rarr; #sd_sam_id
		</p>
		<h4>a) INSERT INTO sd_sam</h4>
		<ul>
			<li>/code &rarr; sd_sam_code</li>
			<li>cntInterval &rarr; sd_sam_int</li>
			<li>cntIntervalUnc &rarr; sd_sam_int_unc</li>
			<li>startTime &rarr; sd_sam_stime</li>
			<li>startTimeUnc &rarr; sd_sam_stime_unc</li>
			<li>endTime &rarr; sd_sam_etime</li>
			<li>endTimeUnc &rarr; sd_sam_etime_unc</li>
			<li>#ss_id &rarr; ss_id</li>
			<li>#cc_id &rarr; cc_id</li>
			<li>#pubDate &rarr; sd_sam_pubdate</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; sd_sam_loaddate</li>
		</ul>
		<h4>b) UPDATE sd_sam WHERE sd_sam_id = '#sd_sam_id'</h4>
		<ul>
			<li>cntInterval &rarr; sd_sam_int</li>
			<li>cntIntervalUnc &rarr; sd_sam_int_unc</li>
			<li>startTime &rarr; sd_sam_stime</li>
			<li>startTimeUnc &rarr; sd_sam_stime_unc</li>
			<li>endTime &rarr; sd_sam_etime</li>
			<li>endTimeUnc &rarr; sd_sam_etime_unc</li>
			<li>#ss_id &rarr; ss_id</li>
			<li>#pubDate &rarr; sd_sam_pubdate</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Seismic - RSAM-SSAM - RSAM -->
		<h2 class="wovomlclass"><a name="data_seismic_rsam-ssam_rsam" id="data_seismic_rsam-ssam_rsam"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_seismic">&lt;Seismic&gt;</a> | <a href="#data_seismic_rsam-ssam">&lt;RSAM-SSAM&gt;</a> | &lt;RSAM&gt;</h2>
		
<pre><strong>&lt;RSAM&gt;</strong>
	<a href="#data_seismic_rsam-ssam_rsam_rsamdata">&lt;RSAMData&gt;...&lt;/RSAMData&gt;</a>
<strong>&lt;/RSAM&gt;</strong></pre>
		
		<h3>Upload/Update</h3>
		<ul class="line_height_150">
			<li>
				Delete:
				<br/>DELETE FROM sd_rsm WHERE sd_sam_id = '@parent1'
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- RSAM data -->
		<h2 class="wovomlclass"><a name="data_seismic_rsam-ssam_rsam_rsamdata" id="data_seismic_rsam-ssam_rsam_rsamdata"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_seismic">&lt;Seismic&gt;</a> | <a href="#data_seismic_rsam-ssam">&lt;RSAM-SSAM&gt;</a> | <a href="#data_seismic_rsam-ssam_rsam">&lt;RSAM&gt;</a> | &lt;RSAMData&gt;</h2>
		
<pre><strong>&lt;RSAMData&gt;</strong>
	&lt;cnt&gt;...&lt;/cnt&gt;
	&lt;calibration&gt;...&lt;/calibration&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
<strong>&lt;/RSAMData&gt;</strong></pre>
		
		<h3>Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT sd_rsm_id FROM sd_rsm WHERE sd_sam_id = '@parent2' AND sd_rsm_stime = 'startTime'
			<br/>&rarr; #sd_rsm_id
		</p>
		<h4>a) INSERT INTO sd_rsm</h4>
		<ul>
			<li>cnt &rarr; sd_rsm_count</li>
			<li>calibration &rarr; sd_rsm_calib</li>
			<li>startTime &rarr; sd_rsm_stime</li>
			<li>startTimeUnc &rarr; sd_rsm_stime_unc</li>
			<li>@parent2 &rarr; sd_sam_id</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; sd_rsm_loaddate</li>
		</ul>
		<h4>b) UPDATE sd_rsm WHERE sd_rsm_id = '#sd_rsm_id'</h4>
		<ul>
			<li>cnt &rarr; sd_rsm_count</li>
			<li>calibration &rarr; sd_rsm_calib</li>
			<li>startTimeUnc &rarr; sd_rsm_stime_unc</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Seismic - RSAM-SSAM - SSAM -->
		<h2 class="wovomlclass"><a name="data_seismic_rsam-ssam_ssam" id="data_seismic_rsam-ssam_ssam"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_seismic">&lt;Seismic&gt;</a> | <a href="#data_seismic_rsam-ssam">&lt;RSAM-SSAM&gt;</a> | &lt;SSAM&gt;</h2>
		
<pre><strong>&lt;SSAM&gt;</strong>
	<a href="#data_seismic_rsam-ssam_ssam_ssamdata">&lt;SSAMData&gt;...&lt;/SSAMData&gt;</a>
<strong>&lt;/SSAM&gt;</strong></pre>
		
		<h3>Upload/Update</h3>
		<ul class="line_height_150">
			<li>
				Delete:
				<br/>DELETE FROM sd_ssm WHERE sd_sam_id = '@parent1'
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Seismic - RSAM-SSAM - SSAM - SSAM data -->
		<h2 class="wovomlclass"><a name="data_seismic_rsam-ssam_ssam_ssamdata" id="data_seismic_rsam-ssam_ssam_ssamdata"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_seismic">&lt;Seismic&gt;</a> | <a href="#data_seismic_rsam-ssam">&lt;RSAM-SSAM&gt;</a> | <a href="#data_seismic_rsam-ssam_ssam">&lt;SSAM&gt;</a> | &lt;SSAMData&gt;</h2>
		
<pre><strong>&lt;SSAMData&gt;</strong>
	&lt;lowFreq&gt;...&lt;/lowFreq&gt;
	&lt;highFreq&gt;...&lt;/highFreq&gt;
	&lt;cnt&gt;...&lt;/cnt&gt;
	&lt;calibration&gt;...&lt;/calibration&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
<strong>&lt;/SSAMData&gt;</strong></pre>
		
		<h3>1. Check</h3>
		<ul class="line_height_150">
			<li>
				Value order:
				<br/>'lowFreq' &le; 'highFreq'
			</li>
		</ul>
		
		<h3>2. Upload/Update</h3>
		<h4>Condition</h4>
		<p>
			SELECT sd_ssm_id FROM sd_ssm WHERE sd_sam_id = '@parent2' AND sd_ssm_stime = 'startTime' AND sd_ssm_lowf = 'lowFreq'
			<br/>&rarr; #sd_ssm_id
		</p>
		<h4>a) INSERT INTO sd_ssm</h4>
		<ul>
			<li>lowFreq &rarr; sd_ssm_lowf</li>
			<li>highFreq &rarr; sd_ssm_highf</li>
			<li>cnt &rarr; sd_ssm_count</li>
			<li>calibration &rarr; sd_ssm_calib</li>
			<li>startTime &rarr; sd_ssm_stime</li>
			<li>startTimeUnc &rarr; sd_ssm_stime_unc</li>
			<li>@parent2 &rarr; sd_sam_id</li>
			<li>!cc_id_load &rarr; cc_id_load</li>
			<li>!loaddate &rarr; sd_ssm_loaddate</li>
		</ul>
		<h4>b) UPDATE sd_ssm WHERE sd_ssm_id = '#sd_ssm_id'</h4>
		<ul>
			<li>highFreq &rarr; sd_ssm_highf</li>
			<li>cnt &rarr; sd_ssm_count</li>
			<li>calibration &rarr; sd_ssm_calib</li>
			<li>startTimeUnc &rarr; sd_ssm_stime_unc</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
			
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