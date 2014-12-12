<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>WOVOdat :: The World Organization of Volcano Observatories (WOVO): Database of Volcanic Unrest (WOVOdat), by IAVCEI</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8">
	<meta http-equiv="content-type" content="text/html;charset=iso-8859-1">
	<meta name="description" content="The World Organization of Volcano Observatories (WOVO): Database of Volcanic Unrest (WOVOdat)">
	<meta name="keywords" content="Volcano, Vulcano, Volcanoes, Vulcanoes, Volcan, Vulkan, eruption, forecasting, forecast, predict, prediction, hazard, desaster, disaster, desasters, disasters, database, data warehouse, format, formats, WOVO, WOVOdat, IAVCEI, sharing, streaming, earthquake, earthquakes, seismic, seismicity, seismology, deformation, INSar, GPS, uplift, caldera, stratovolcano, stratovulcano">
	<link href="/css/styles_beta.css" rel="stylesheet">
	<link href="/js2/navig.css" rel="stylesheet">
	<link href="/gif/WOVOfavicon.ico" type="image/x-icon" rel="SHORTCUT ICON">
	<script language="javascript" type="text/javascript" src="/js/scripts.js"></script>
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
		
		<h1 class="page_title"><a name="top" id="top"></a>WOVOML Reference</h1>
		
		<p>This section contains a reference for all WOVOML elements defined in WOVOML version 1.1.0.</p>
		<p>WOVOML was initially built for importing data to WOVOdat. The goal of this project is to have a database containing data of world's volcanoes unrest. This project is still in progress.</p>
		<p>The complete XML schema for WOVOML can be found <a href="/docum/system/1.1.0/wovoml_schema.xsd">here</a>.</p>
		<p>Because WOVOML is an XML grammar and file format, tag names are case-sensitive and must appear exactly as shown here. If you're familiar with XML, you will also be interested in the <a href="/docum/system/1.1.0/wovoml_schema.xsd">WOVOML 1.1.0 Schema</a>. When you are editing WOVOML text files, you can load this Schema into any XML editor and validate your WOVOML code with it.</p>
		<p>You may also be interested in this <a href="/docum/system/1.1.0/wovoml_example.xml">WOVOML 1.1.0 Example</a> which you can edit in-co-ordination with this reference for creating your own WOVOML file.</p>

		<p><strong>Compatibility</strong></p>
		<p><span>WOVOML versions have a double numbering system: <em>databaseVersion.XMLVersion</em>. Example: WOVOML version 1.1.0 is related to WOVOdat version 1.1 and is the initial XML version.</span></p>

		<h2>About this reference</h2>
		<p>This reference presents all classes (tags) defined in WOVOML version 1.1.0. The first tag to start with is <a href="#wovoml">&lt;wovoml&gt;</a>. This is the root element for WOVOML and it contains all the other elements.</p>
		<p>Each reference entry includes the following:</p>
		<ul>
			<li>A <b>Template</b> section which lists the possible elements contained. There is a link to the description of these elements if they are of a complex type (i.e. if they contain elements).
			<br/>This section can be copied and used as a template in a WOVOML file.</li>
			<li>A <b>Description</b> of the class</li>
			<li>A list of possible <b>Attributes</b> of the class. For each of these attributes, the following information is given:
				<ul>
					<li>Description: a description of the attribute</li>
					<li>Type: the type or possible values of the attribute</li>
					<li>Required: whether this attribute is required</li>
				</ul>
			</li>
			<li>A list of possible <b>Elements</b> of the class. For each of these elements, the following information is given:
				<ul>
					<li>Description: a description of the element, or a link to its entry in the reference if the element is a class (i.e. if it contains elements)</li>
					<li>Type: the type or possible values of the element</li>
					<li>Unit: the unit in which the element's value should be given (for decimal and integer values only)</li>
					<li>Number of occurrences: the number of times this element can be repeated</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- wovoml (root) -->
		<h2 class="wovomlclass"><a name="wovoml" id="wovoml"></a>&lt;wovoml&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;wovoml version=&quot;1.1.0&quot; owner1="..." owner2="..." owner3="..." pubDate="..." xmlns=&quot;http://www.w3.org/2001/XMLSchema-instance&quot; xmlns:xsi=&quot;http://www.w3.org/2001/XMLSchema-instance&quot; xsi:schemaLocation=&quot;http://www.wovodat.org WOVOdatV1.xsd&quot;&gt;</strong>
	<a href="#observations">&lt;Observations&gt;...&lt;/Observations&gt;</a>
	<a href="#inferredprocesses">&lt;InferredProcesses&gt;...&lt;/InferredProcesses&gt;</a>
	<a href="#eruptions">&lt;Eruptions&gt;...&lt;/Eruptions&gt;</a>
	<a href="#monitoringsystems">&lt;MonitoringSystems&gt;...&lt;/MonitoringSystems&gt;</a>
	<a href="#data">&lt;Data&gt;...&lt;/Data&gt;</a>
<strong>&lt;/wovoml&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This is the root element for a WOVOML file. It cannot be contained in any element and must appear once (and only once) in the file.</p>
		
		<h3>Attributes</h3>
		<ul>
			<li>&lt;version&gt;
				<ul>
					<li>Description: The version of this WOVOML file.</li>
					<li>Type: string</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of this WOVOML file.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of this WOVOML file (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of this WOVOML file (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The general publish date for the data contained in this WOVOML file.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>&lt;xmlns&gt;
				<ul>
					<li>Description: The namespace location.</li>
					<li>Type: string</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>&lt;xmlns:xsi&gt;
				<ul>
					<li>Description: The XML namespace location.</li>
					<li>Type: string</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>&lt;xsi:schemaLocation&gt;
				<ul>
					<li>Description: The schema location.</li>
					<li>Type: string</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;Observations&gt;
				<ul>
					<li>Description: See <a href="#observations">&lt;Observations&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;InferredProcesses&gt;
				<ul>
					<li>Description: See <a href="#inferredprocesses">&lt;InferredProcesses&gt;</a>.</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;Eruptions&gt;
				<ul>
					<li>Description: See <a href="#eruptions">&lt;Eruptions&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;MonitoringSystems&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;Data&gt;
				<ul>
					<li>Description: See <a href="#data">&lt;Data&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Observations -->
		<h2 class="wovomlclass"><a name="observations" id="observations"></a><a href="#wovoml">&lt;wovoml&gt;</a> | &lt;Observations&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;Observations volcano=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	<a href="#observation">&lt;Observation&gt;...&lt;/Observation&gt;</a>
<strong>&lt;/Observations&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information for observations about volcanic activity.</p>

		<h3>Attributes</h3>
		<ul>
			<li>volcano
				<ul>
					<li>Description: The CAVW number of the volcano to which these data refer.</li>
					<li>Type: string of at most 12 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;Observation&gt;
				<ul>
					<li>Description: See <a href="#observation">&lt;Observation&gt;</a>.</li>
					<li>Number of occurrences: 1-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Observations - Observation -->
		<h2 class="wovomlclass"><a name="observation" id="observation"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#observations">&lt;Observations&gt;</a> | &lt;Observation&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;Observation code=&quot;...&quot; volcano=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	&lt;description&gt;...&lt;/description&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
<strong>&lt;/Observation&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information for observations about volcanic activity.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>volcano
				<ul>
					<li>Description: The CAVW number of the volcano to which these data refer.</li>
					<li>Type: string of at most 12 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;description&gt;
				<ul>
					<li>Description: A description of the observation.</li>
					<li>Type: string</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The time the observation was made.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the time the observation was made.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The end time the observation was made.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the end time the observation was made.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Inferred processes -->
		<h2 class="wovomlclass"><a name="inferredprocesses" id="inferredprocesses"></a><a href="#wovoml">&lt;wovoml&gt;</a> | &lt;InferredProcesses&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;InferredProcesses volcano=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	<a href="#inferredprocesses_magmamovement">&lt;MagmaMovement&gt;...&lt;/MagmaMovement&gt;</a>
	<a href="#inferredprocesses_volatilesat">&lt;VolatileSat&gt;...&lt;/VolatileSat&gt;</a>
	<a href="#inferredprocesses_magmapressure">&lt;MagmaPressure&gt;...&lt;/MagmaPressure&gt;</a>
	<a href="#inferredprocesses_hydrothermal">&lt;Hydrothermal&gt;...&lt;/Hydrothermal&gt;</a>
	<a href="#inferredprocesses_regionaltectonics">&lt;RegionalTectonics&gt;...&lt;/RegionalTectonics&gt;</a>
<strong>&lt;/InferredProcesses&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about historical (in most cases, published) inferences about processes causing volcanic unrest.</p>

		<h3>Attributes</h3>
		<ul>
			<li>volcano
				<ul>
					<li>Description: The CAVW number of the volcano to which these data refer.</li>
					<li>Type: string of at most 12 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;MagmaMovement&gt;
				<ul>
					<li>Description: See <a href="#inferredprocesses_magmamovement">&lt;MagmaMovement&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;VolatileSat&gt;
				<ul>
					<li>Description: See <a href="#inferredprocesses_volatilesat">&lt;VolatileSat&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;MagmaPressure&gt;
				<ul>
					<li>Description: See <a href="#inferredprocesses_magmapressure">&lt;MagmaPressure&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;Hydrothermal&gt;
				<ul>
					<li>Description: See <a href="#inferredprocesses_hydrothermal">&lt;Hydrothermal&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;RegionalTectonics&gt;
				<ul>
					<li>Description: See <a href="#inferredprocesses_regionaltectonics">&lt;RegionalTectonics&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Inferred processes - Magma movement -->
		<h2 class="wovomlclass"><a name="inferredprocesses_magmamovement" id="inferredprocesses_magmamovement"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#inferredprocesses">&lt;InferredProcesses&gt;</a> | &lt;MagmaMovement&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;MagmaMovement code=&quot;...&quot; volcano=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
<strong>&lt;/MagmaMovement&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about processes related to the movement of magma.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>volcano
				<ul>
					<li>Description: The CAVW number of the volcano to which these data refer.</li>
					<li>Type: string of at most 12 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;inferTime&gt;
				<ul>
					<li>Description: The date and time of the inference in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;inferTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date and time of the inference.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date and time at which this inferred process started in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date and time at which this inferred process started.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date and time at which (or by which) this inferred process stopped in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date and time at which this inferred process ended.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;deepSupp&gt;
				<ul>
					<li>Description: New or renewed supply of magma from depth.</li>
					<li>Type: Y, N, M, U <em>(Yes, No, Maybe, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;ascent&gt;
				<ul>
					<li>Description: Magma ascent, up from reservoir.</li>
					<li>Type: Y, N, M, U <em>(Yes, No, Maybe, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;convecBelow&gt;
				<ul>
					<li>Description: Magma convection/overturn induced from below by an intrusion at the base. The magma convection can be within the conduit and/or in underlying reservoir. If magma in a conduit convects to shallow depth, it may foam and release a substantial part of its gas.</li>
					<li>Type: Y, N, M, U <em>(Yes, No, Maybe, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;convecAbove&gt;
				<ul>
					<li>Description: Magma convection/overturn induced from above, by settling of a dense crystal-rich mass. In conduit and/or reservoir, with potential foaming, as above.</li>
					<li>Type: Y, N, M, U <em>(Yes, No, Maybe, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;magmaMix&gt;
				<ul>
					<li>Description: Magma mixing.</li>
					<li>Type: Y, N, M, U <em>(Yes, No, Maybe, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;dikeIntru&gt;
				<ul>
					<li>Description: Dike intrusion. In many cases this will be new intrusion through country rock; in some instances, magmas will flow anew through existing dikes.</li>
					<li>Type: Y, N, M, U <em>(Yes, No, Maybe, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;pipeIntru&gt;
				<ul>
					<li>Description: Intrusion through a pipe-like cylindrical conduit. As above, may be a new intrusion through country rock or renewed flow in an existing conduit.</li>
					<li>Type: Y, N, M, U <em>(Yes, No, Maybe, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;sillIntru&gt;
				<ul>
					<li>Description: Sill intrusion.</li>
					<li>Type: Y, N, M, U <em>(Yes, No, Maybe, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Added comments on magma movement.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Inferred processes - Volatile saturation -->
		<h2 class="wovomlclass"><a name="inferredprocesses_volatilesat" id="inferredprocesses_volatilesat"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#inferredprocesses">&lt;InferredProcesses&gt;</a> | &lt;VolatileSat&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;VolatileSat code=&quot;...&quot; volcano=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
<strong>&lt;/VolatileSat&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about processes related to volatiles in the magma.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>volcano
				<ul>
					<li>Description: The CAVW number of the volcano to which these data refer.</li>
					<li>Type: string of at most 12 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;inferTime&gt;
				<ul>
					<li>Description: The date and time of the inference in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;inferTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date and time of the inference.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date and time at which this inferred process started in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date and time at which this inferred process started.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date and time at which (or by which) this inferred process stopped in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date and time at which this inferred process ended.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;CO2Sat&gt;
				<ul>
					<li>Description: Magma became saturated with CO<sub>2</sub> before an eruption and contributed to preeruption unrest. Saturation induced by any cause.</li>
					<li>Type: Y, N, M, U <em>(Yes, No, Maybe, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;H2OSat&gt;
				<ul>
					<li>Description: Magma became saturated with H<sub>2</sub>O before an eruption and contributed to preeruption unrest. Saturation induced by any cause.</li>
					<li>Type: Y, N, M, U <em>(Yes, No, Maybe, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;decompress&gt;
				<ul>
					<li>Description: Volatile saturation by decompression.</li>
					<li>Type: Y, N, M, U <em>(Yes, No, Maybe, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;fugacity&gt;
				<ul>
					<li>Description: Volatile saturation by change in fO<sub>2</sub>.</li>
					<li>Type: Y, N, M, U <em>(Yes, No, Maybe, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;volatileAdd&gt;
				<ul>
					<li>Description: Volatile saturation by volatile addition.</li>
					<li>Type: Y, N, M, U <em>(Yes, No, Maybe, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;crystalOr2ndBoil&gt;
				<ul>
					<li>Description: Volatile saturation by crystallization or second boiling.</li>
					<li>Type: Y, N, M, U <em>(Yes, No, Maybe, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;vesicul&gt;
				<ul>
					<li>Description: Subsurface, preeruptive increases in vesiculation, thereby decreasing density. This would include extreme vesiculation to permeable foam.</li>
					<li>Type: Y, N, M, U <em>(Yes, No, Maybe, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;devesicul&gt;
				<ul>
					<li>Description: Subsurface, preeruptive decreases in vesiculation, thereby increasing density. This would include collapse of newly-degassed foam.</li>
					<li>Type: Y, N, M, U <em>(Yes, No, Maybe, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;degas&gt;
				<ul>
					<li>Description: Deep and near-surface degassing including gas explosion events.</li>
					<li>Type: Y, N, M, U <em>(Yes, No, Maybe, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Additional comments on volatile saturation.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Inferred processes - Magma pressure -->
		<h2 class="wovomlclass"><a name="inferredprocesses_magmapressure" id="inferredprocesses_magmapressure"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#inferredprocesses">&lt;InferredProcesses&gt;</a> | &lt;MagmaPressure&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;MagmaPressure code=&quot;...&quot; volcano=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	&lt;inferTime&gt;...&lt;/inferTime&gt;
	&lt;inferTimeUnc&gt;...&lt;/inferTimeUnc&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;gasInduced&gt;...&lt;/gasInduced&gt;
	&lt;tectInduced&gt;...&lt;/tectInduced&gt;
	&lt;comments&gt;...&lt;/comments&gt;
<strong>&lt;/MagmaPressure&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about processes related to an increase in magmatic pressure.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>volcano
				<ul>
					<li>Description: The CAVW number of the volcano to which these data refer.</li>
					<li>Type: string of at most 12 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;inferTime&gt;
				<ul>
					<li>Description: The date and time of the inference in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;inferTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date and time of the inference.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date and time at which this inferred process started in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date and time at which this inferred process started.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date and time at which (or by which) this inferred process stopped in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date and time at which this inferred process ended.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;gasInduced&gt;
				<ul>
					<li>Description: Gas-induced overpressure.</li>
					<li>Type: Y, N, M, U <em>(Yes, No, Maybe, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;tectInduced&gt;
				<ul>
					<li>Description: Magma or tectonically induced overpressures.</li>
					<li>Type: Y, N, M, U <em>(Yes, No, Maybe, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments on the buildup of magma pressure.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Inferred processes - Hydrothermal -->
		<h2 class="wovomlclass"><a name="inferredprocesses_hydrothermal" id="inferredprocesses_hydrothermal"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#inferredprocesses">&lt;InferredProcesses&gt;</a> | &lt;Hydrothermal&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;Hydrothermal code=&quot;...&quot; volcano=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
<strong>&lt;/Hydrothermal&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about magmatic interactions with the hydrothermal system.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>volcano
				<ul>
					<li>Description: The CAVW number of the volcano to which these data refer.</li>
					<li>Type: string of at most 12 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;inferTime&gt;
				<ul>
					<li>Description: The date and time of the inference in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;inferTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date and time of the inference.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date and time at which this inferred process started in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date and time at which this inferred process started.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date and time at which (or by which) this inferred process stopped in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date and time at which this inferred process ended.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;heatGwater&gt;
				<ul>
					<li>Description: Convective heating of groundwater.</li>
					<li>Type: Y, N, M, U <em>(Yes, No, Maybe, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;poreDestab&gt;
				<ul>
					<li>Description: Destabilization of edifice by pore pressure increase.</li>
					<li>Type: Y, N, M, U <em>(Yes, No, Maybe, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;poreDeform&gt;
				<ul>
					<li>Description: Elastic deformation induced by pore pressure change.</li>
					<li>Type: Y, N, M, U <em>(Yes, No, Maybe, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;hydrofract&gt;
				<ul>
					<li>Description: Hydrofracturing.</li>
					<li>Type: Y, N, M, U <em>(Yes, No, Maybe, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;boilTremor&gt;
				<ul>
					<li>Description: Boiling-induced tremor.</li>
					<li>Type: Y, N, M, U <em>(Yes, No, Maybe, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;absorSolGas&gt;
				<ul>
					<li>Description: Absorption of soluble gases.</li>
					<li>Type: Y, N, M, U <em>(Yes, No, Maybe, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;speciesEqbChange&gt;
				<ul>
					<li>Description: Changing the equilibrium species.</li>
					<li>Type: Y, N, M, U <em>(Yes, No, Maybe, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;boilDryChimneys&gt;
				<ul>
					<li>Description: Boiling until dry chimneys are formed.</li>
					<li>Type: Y, N, M, U <em>(Yes, No, Maybe, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments on interaction with the hydrothermal system.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Regional tectonics -->
		<h2 class="wovomlclass"><a name="inferredprocesses_regionaltectonics" id="inferredprocesses_regionaltectonics"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#inferredprocesses">&lt;InferredProcesses&gt;</a> | &lt;RegionalTectonics&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;RegionalTectonics code=&quot;...&quot; volcano=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
<strong>&lt;/RegionalTectonics&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about processes related to regional tectonic events.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>volcano
				<ul>
					<li>Description: The CAVW number of the volcano to which these data refer.</li>
					<li>Type: string of at most 12 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;inferTime&gt;
				<ul>
					<li>Description: The date and time of the inference in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;inferTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date and time of the inference.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date and time at which this inferred process started in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date and time at which this inferred process started.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date and time at which (or by which) this inferred process stopped in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date and time at which this inferred process ended.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;tectonicChanges&gt;
				<ul>
					<li>Description: Tectonically induced changes in magma/hydrothermal system (any mechanism).</li>
					<li>Type: Y, N, M, U <em>(Yes, No, Maybe, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;staticStress&gt;
				<ul>
					<li>Description: Changes induced by changes in static stress after large regional earthquakes (incl. Viscoelastic processes).</li>
					<li>Type: Y, N, M, U <em>(Yes, No, Maybe, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;dynamicStrain&gt;
				<ul>
					<li>Description: Changes induced by dynamic strain, associated with passage of earthquake waves from distal sources.</li>
					<li>Type: Y, N, M, U <em>(Yes, No, Maybe, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;localShear&gt;
				<ul>
					<li>Description: Changes induced by local fault shear or other deformation of the cone.</li>
					<li>Type: Y, N, M, U <em>(Yes, No, Maybe, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;slowEarthquake&gt;
				<ul>
					<li>Description: Changes induced by "slow earthquake" as recorded in a GPS or other strain network.</li>
					<li>Type: Y, N, M, U <em>(Yes, No, Maybe, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;distalPressure&gt;
				<ul>
					<li>Description: Changes induced by pressurization of magma or hydrothermal reservoir located several kilometers or more from the apparent center of unrest. May include Distal VT earthquakes.</li>
					<li>Type: Y, N, M, U <em>(Yes, No, Maybe, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;distalDepressure&gt;
				<ul>
					<li>Description: Changes induced by depressurization of magma or hydrothermal reservoir located several kilometers or more from the apparent center of unrest. May include Distal VT earthquakes.</li>
					<li>Type: Y, N, M, U <em>(Yes, No, Maybe, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;hydrothermalLubrication&gt;
				<ul>
					<li>Description: Changes induced by increased hydrothermal pore pressures ("lubrication") along faults beneath or near the volcano.</li>
					<li>Type: Y, N, M, U <em>(Yes, No, Maybe, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;earthTide&gt;
				<ul>
					<li>Description: Earth tide interaction with magma/hydrothermal systems. Typically inferred from correlations between unrest and semi-diurnal or fortnightly earth tides.</li>
					<li>Type: Y, N, M, U <em>(Yes, No, Maybe, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;atmosInfluence&gt;
				<ul>
					<li>Description: Interaction of the volcanic system with changes in atmospheric pressure, rainfall, wind, etc.</li>
					<li>Type: Y, N, M, U <em>(Yes, No, Maybe, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments on interaction between the magma/hydrothermal system and regional tectonics.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Eruptions -->
		<h2 class="wovomlclass"><a name="eruptions" id="eruptions"></a><a href="#wovoml">&lt;wovoml&gt;</a> | &lt;Eruptions&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;Eruptions volcano=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	<a href="#eruption">&lt;Eruption&gt;...&lt;/Eruption&gt;</a>
	<a href="#phases">&lt;Phases&gt;...&lt;/Phases&gt;</a>
	<a href="#video">&lt;Video&gt;...&lt;/Video&gt;</a>
	<a href="#forecast">&lt;Forecast&gt;...&lt;/Forecast&gt;</a>
<strong>&lt;/Eruptions&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains eruption data.</p>

		<h3>Attributes</h3>
		<ul>
			<li>volcano
				<ul>
					<li>Description: The CAVW number of the volcano to which these data refer.</li>
					<li>Type: string of at most 12 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;Eruption&gt;
				<ul>
					<li>Description: See <a href="#eruption">&lt;Eruption&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;Phases&gt;
				<ul>
					<li>Description: See <a href="#phases">&lt;Phases&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;Video&gt;
				<ul>
					<li>Description: See <a href="#video">&lt;Video&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;Forecast&gt;
				<ul>
					<li>Description: See <a href="#forecast">&lt;Forecast&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Eruption -->
		<h2 class="wovomlclass"><a name="eruption" id="eruption"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#eruptions">&lt;Eruptions&gt;</a> | &lt;Eruption&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;Eruption code=&quot;...&quot; volcano=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	&lt;name&gt;...&lt;/name&gt;
	&lt;narrative&gt;...&lt;/narrative&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;climaxTime&gt;...&lt;/climaxTime&gt;
	&lt;climaxTimeUnc&gt;...&lt;/climaxTimeUnc&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	<a href="#eruption_video">&lt;Video&gt;...&lt;/Video&gt;</a>
	<a href="#eruption_phase">&lt;Phase&gt;...&lt;/Phase&gt;</a>
<strong>&lt;/Eruption&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains general information about an eruption such as a narrative and time span.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>volcano
				<ul>
					<li>Description: The CAVW number of the volcano to which these data refer.</li>
					<li>Type: string of at most 12 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name (other than eruption year) that is often used to refer to the eruption (e.g., the Hoei eruption of Fuji or the VTTS eruption of Novarupta/Katmai).</li>
					<li>Type: string of at most 60 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;narrative&gt;
				<ul>
					<li>Description: A narrative of eruption.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The eruption start time in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the eruption start time.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The eruption end time in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the eruption end time.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;climaxTime&gt;
				<ul>
					<li>Description: The onset of eruption climax in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;climaxTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the time of the onset of eruption climax.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments and additional information about the eruption.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;Video&gt;
				<ul>
					<li>Description: See <a href="#eruption_video">&lt;Video&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;Phase&gt;
				<ul>
					<li>Description: See <a href="#eruption_phase">&lt;Phase&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Eruption - Video -->
		<h2 class="wovomlclass"><a name="eruption_video" id="eruption_video"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#eruptions">&lt;Eruptions&gt;</a> | <a href="#eruption">&lt;Eruption&gt;</a> | &lt;Video&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;Video code=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	&lt;link&gt;...&lt;/link&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;length&gt;...&lt;/length&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;comments&gt;...&lt;/comments&gt;
<strong>&lt;/Video&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about a video clip of the eruption.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;link&gt;
				<ul>
					<li>Description: A link to the video clip or information about where to find the video clip.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The start time of the video clip in UTC</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the start time of the video clip.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;length&gt;
				<ul>
					<li>Description: The length of the video clip.</li>
					<li>Type: HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;description&gt;
				<ul>
					<li>Description: A short description of the video, e.g., strombolian eruption footage taken from northwest of the vent at a distance of 5km. This should contain enough information to allow the user to determine if the video will be useful to them.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Additional information about the video including copyright information.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Eruption - Phase -->
		<h2 class="wovomlclass"><a name="eruption_phase" id="eruption_phase"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#eruptions">&lt;Eruptions&gt;</a> | <a href="#eruption">&lt;Eruption&gt;</a> | &lt;Phase&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;Phase code=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
	<a href="#eruption_phase_video">&lt;Video&gt;...&lt;/Video&gt;</a>
	<a href="#eruption_phase_forecast">&lt;Forecast&gt;...&lt;/Forecast&gt;</a>
<strong>&lt;/Phase&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains specific information about the eruption such as the size of the phase and composition of magma.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;phaseNumber&gt;
				<ul>
					<li>Description: The observatory defined phase number starting with number 1 for the first phase of the eruption.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The start time of this phase in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the start time of this phase.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The end time of this phase in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the end time of this phase.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;description&gt;
				<ul>
					<li>Description: A description of the eruption characteristics for this phase (please include the word climax for the climax of the eruption for search purposes).</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;vei&gt;
				<ul>
					<li>Description: The volcanic explosivity index (VEI) for this phase taken from the Smithsonian.</li>
					<li>Type: integer number</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;maxLavaExtru&gt;
				<ul>
					<li>Description: The maximum lava extrusion rate in m<sup>3</sup>/s.</li>
					<li>Type: float</li>
					<li>Unit: m<sup>3</sup>/s</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;maxExpMassDis&gt;
				<ul>
					<li>Description: The maximum explosive mass discharge rate in kg/s &times; 10<sup>6</sup>.</li>
					<li>Type: float</li>
					<li>Unit: kg/s &times; 10<sup>6</sup></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;dre&gt;
				<ul>
					<li>Description: The volume of material erupted or DRE in m<sup>3</sup> &times; 10<sup>6</sup>.</li>
					<li>Type: float</li>
					<li>Unit: m<sup>3</sup> &times; 10<sup>6</sup></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;magmaMix&gt;
				<ul>
					<li>Description: A text field to indicate if there is evidence of magma mixing. Use Y for detected, N for not seen, or U for unknown. You can also give a short description of the evidence for magma mixing.</li>
					<li>Type: Y, N, U <em>(Yes, No, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;maxColHeight&gt;
				<ul>
					<li>Description: The maximum height of the eruption column in kilometers above sea level.</li>
					<li>Type: float</li>
					<li>Unit: km</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;colHeightDet&gt;
				<ul>
					<li>Description: The method used to determine the maximum height of the eruption column.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;minSiO2MatrixGlass&gt;
				<ul>
					<li>Description: The minimum SiO<sub>2</sub> of the matrix glass as a weight percent (xx.xx%).</li>
					<li>Type: float</li>
					<li>Unit: %</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;maxSiO2MatrixGlass&gt;
				<ul>
					<li>Description: The maximum SiO<sub>2</sub> of the matrix glass as a weight percent (xx.xx%).</li>
					<li>Type: float</li>
					<li>Unit: %</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;minSiO2WholeRock&gt;
				<ul>
					<li>Description: The minimum SiO<sub>2</sub> of the whole rock as a weight percent (xx.xx%).</li>
					<li>Type: float</li>
					<li>Unit: %</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;maxSiO2WholeRock&gt;
				<ul>
					<li>Description: The maximum SiO<sub>2</sub> of the whole rock as a weight percent (xx.xx%).</li>
					<li>Type: float</li>
					<li>Unit: %</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;totCrystal&gt;
				<ul>
					<li>Description: The total crystallinity of the dominant rock type in volume % (xx %).</li>
					<li>Type: float</li>
					<li>Unit: %</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;phenoContent&gt;
				<ul>
					<li>Description: The percentage of phenocrysts in the dominant rock type (xx%).</li>
					<li>Type: float</li>
					<li>Unit: %</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;phenoAssemb&gt;
				<ul>
					<li>Description: The phenocryst assemblage listed in order of most abundant to least abundant.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;preErupH2OContent&gt;
				<ul>
					<li>Description: Pre-eruption water content in melt, as analyzed in melt inclusions in phenocrysts.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;phenoMeltInclusion&gt;
				<ul>
					<li>Description: A description of the phenocryst and the melt inclusion that was analyzed to determine the pre-eruption water content along with the method used.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Additional information about this eruptive phase including descriptions of the rocks, phenocrysts, and inclusions.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;Video&gt;
				<ul>
					<li>Description: See <a href="#eruption_phase_video">&lt;Video&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;Forecast&gt;
				<ul>
					<li>Description: See <a href="#eruption_phase_forecast">&lt;Forecast&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Eruption - Phase - Video -->
		<h2 class="wovomlclass"><a name="eruption_phase_video" id="eruption_phase_video"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#eruptions">&lt;Eruptions&gt;</a> | <a href="#eruption">&lt;Eruption&gt;</a> |  <a href="#eruption_phase">&lt;Phase&gt;</a> | &lt;Video&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;Video code=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	&lt;link&gt;...&lt;/link&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;length&gt;...&lt;/length&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;comments&gt;...&lt;/comments&gt;
<strong>&lt;/Video&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about a video clip of the eruption.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;link&gt;
				<ul>
					<li>Description: A link to the video clip or information about where to find the video clip.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The start time of the video clip in UTC</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the start time of the video clip.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;length&gt;
				<ul>
					<li>Description: The length of the video clip.</li>
					<li>Type: HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;description&gt;
				<ul>
					<li>Description: A short description of the video, e.g., strombolian eruption footage taken from northwest of the vent at a distance of 5km. This should contain enough information to allow the user to determine if the video will be useful to them.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Additional information about the video including copyright information.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Eruption - Phase - Forecast -->
		<h2 class="wovomlclass"><a name="eruption_phase_forecast" id="eruption_phase_forecast"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#eruptions">&lt;Eruptions&gt;</a> | <a href="#eruption">&lt;Eruption&gt;</a> |  <a href="#eruption_phase">&lt;Phase&gt;</a> | &lt;Forecast&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;Forecast code=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
<strong>&lt;/Forecast&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about forecasts made for a phase of the eruption, such as an overview of the forecast and the times forecasted. The forecasts give an insight into what was thought would occur at specific times during unrest. WOVOdat should provide the opportunity to analyze forecasts with monitoring data and event outcomes for future crisis situations.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;description&gt;
				<ul>
					<li>Description: A short description of the forecast for this phase. Please include the forecast type and magnitude.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;earliestStartTime&gt;
				<ul>
					<li>Description: The earliest expected start time of the eruption in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;earliestStartTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the earliest expected start time of the eruption.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;latestStartTime&gt;
				<ul>
					<li>Description: The latest expected start time of the eruption in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;latestStartTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the latest expected start time of the eruption.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;issueTime&gt;
				<ul>
					<li>Description: The time the forecast was issued in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;issueTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the time the forecast was issued.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;timeSuccess&gt;
				<ul>
					<li>Description: A flag and comments on the success of the forecasted time of the eruption. Use the letters Y for yes, N for no, or P for Partly..</li>
					<li>Type: Y, N, P <em>(Yes, No, Partly)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;magniSuccess&gt;
				<ul>
					<li>Description: A flag and cmments on the success of the forecasted type and magnitude of the eruption. Use the letters Y for yes, N for no, or P for Partly.</li>
					<li>Type: Y, N, P <em>(Yes, No, Partly)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Any comments or additional information about the forecast, including what aspects were or were not successful.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Phases -->
		<h2 class="wovomlclass"><a name="phases" id="phases"></a><a href="#wovoml">&lt;wovoml&gt;</a> | &lt;Phases&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;Phases eruption=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	<a href="#phase">&lt;Phase&gt;...&lt;/Phase&gt;</a>
<strong>&lt;/Phases&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains phase data.</p>

		<h3>Attributes</h3>
		<ul>
			<li>&lt;eruption&gt;
				<ul>
					<li>Description: The code of the eruption to which these data refer.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;Phase&gt;
				<ul>
					<li>Description: See <a href="#phase">&lt;Phase&gt;</a>.</li>
					<li>Number of occurrences: 1-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Phase -->
		<h2 class="wovomlclass"><a name="phase" id="phase"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#eruptions">&lt;Eruptions&gt;</a> | &lt;Phase&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;Phase code=&quot;...&quot; eruption=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
	<a href="#phase_video">&lt;Video&gt;...&lt;/Video&gt;</a>
	<a href="#phase_forecast">&lt;Forecast&gt;...&lt;/Forecast&gt;</a>
<strong>&lt;/Phase&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains specific information about an eruption such as the size of the phase and composition of magma.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>&lt;eruption&gt;
				<ul>
					<li>Description: The code of the eruption to which these data refer.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;phaseNumber&gt;
				<ul>
					<li>Description: The observatory defined phase number starting with number 1 for the first phase of the eruption.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The start time of this phase in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the start time of this phase.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The end time of this phase in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the end time of this phase.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;description&gt;
				<ul>
					<li>Description: A description of the eruption characteristics for this phase (please include the word climax for the climax of the eruption for search purposes).</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;vei&gt;
				<ul>
					<li>Description: The volcanic explosivity index (VEI) for this phase taken from the Smithsonian.</li>
					<li>Type: integer number</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;maxLavaExtru&gt;
				<ul>
					<li>Description: The maximum lava extrusion rate in m<sup>3</sup>/s.</li>
					<li>Type: float</li>
					<li>Unit: m<sup>3</sup>/s</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;maxExpMassDis&gt;
				<ul>
					<li>Description: The maximum explosive mass discharge rate in kg/s &times; 10<sup>6</sup>.</li>
					<li>Type: float</li>
					<li>Unit: kg/s &times; 10<sup>6</sup></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;dre&gt;
				<ul>
					<li>Description: The volume of material erupted or DRE in m<sup>3</sup> &times; 10<sup>6</sup>.</li>
					<li>Type: float</li>
					<li>Unit: m<sup>3</sup> &times; 10<sup>6</sup></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;magmaMix&gt;
				<ul>
					<li>Description: A text field to indicate if there is evidence of magma mixing. Use Y for detected, N for not seen, or U for unknown. You can also give a short description of the evidence for magma mixing.</li>
					<li>Type: Y, N, U <em>(Yes, No, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;maxColHeight&gt;
				<ul>
					<li>Description: The maximum height of the eruption column in kilometers above sea level.</li>
					<li>Type: float</li>
					<li>Unit: km</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;colHeightDet&gt;
				<ul>
					<li>Description: The method used to determine the maximum height of the eruption column.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;minSiO2MatrixGlass&gt;
				<ul>
					<li>Description: The minimum SiO<sub>2</sub> of the matrix glass as a weight percent (xx.xx%).</li>
					<li>Type: float</li>
					<li>Unit: %</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;maxSiO2MatrixGlass&gt;
				<ul>
					<li>Description: The maximum SiO<sub>2</sub> of the matrix glass as a weight percent (xx.xx%).</li>
					<li>Type: float</li>
					<li>Unit: %</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;minSiO2WholeRock&gt;
				<ul>
					<li>Description: The minimum SiO<sub>2</sub> of the whole rock as a weight percent (xx.xx%).</li>
					<li>Type: float</li>
					<li>Unit: %</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;maxSiO2WholeRock&gt;
				<ul>
					<li>Description: The maximum SiO<sub>2</sub> of the whole rock as a weight percent (xx.xx%).</li>
					<li>Type: float</li>
					<li>Unit: %</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;totCrystal&gt;
				<ul>
					<li>Description: The total crystallinity of the dominant rock type in volume % (xx %).</li>
					<li>Type: float</li>
					<li>Unit: %</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;phenoContent&gt;
				<ul>
					<li>Description: The percentage of phenocrysts in the dominant rock type (xx%).</li>
					<li>Type: float</li>
					<li>Unit: %</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;phenoAssemb&gt;
				<ul>
					<li>Description: The phenocryst assemblage listed in order of most abundant to least abundant.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;preErupH2OContent&gt;
				<ul>
					<li>Description: Pre-eruption water content in melt, as analyzed in melt inclusions in phenocrysts.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;phenoMeltInclusion&gt;
				<ul>
					<li>Description: A description of the phenocryst and the melt inclusion that was analyzed to determine the pre-eruption water content along with the method used.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Additional information about this eruptive phase including descriptions of the rocks, phenocrysts, and inclusions.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;Video&gt;
				<ul>
					<li>Description: See <a href="#phase_video">&lt;Video&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;Forecast&gt;
				<ul>
					<li>Description: See <a href="#phase_forecast">&lt;Forecast&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Phase - Video -->
		<h2 class="wovomlclass"><a name="phase_video" id="phase_video"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#eruptions">&lt;Eruptions&gt;</a> | <a href="#phase">&lt;Phase&gt;</a> | &lt;Video&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;Video code=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	&lt;link&gt;...&lt;/link&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;length&gt;...&lt;/length&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;comments&gt;...&lt;/comments&gt;
<strong>&lt;/Video&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about a video clip of the eruption phase.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;link&gt;
				<ul>
					<li>Description: A link to the video clip or information about where to find the video clip.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The start time of the video clip in UTC</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the start time of the video clip.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;length&gt;
				<ul>
					<li>Description: The length of the video clip.</li>
					<li>Type: HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;description&gt;
				<ul>
					<li>Description: A short description of the video, e.g., strombolian eruption footage taken from northwest of the vent at a distance of 5km. This should contain enough information to allow the user to determine if the video will be useful to them.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Additional information about the video including copyright information.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Phase - Forecast -->
		<h2 class="wovomlclass"><a name="phase_forecast" id="phase_forecast"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#eruptions">&lt;Eruptions&gt;</a> | <a href="#phase">&lt;Phase&gt;</a> | &lt;Forecast&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;Forecast code=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
<strong>&lt;/Forecast&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about forecasts made for a phase of the eruption, such as an overview of the forecast and the times forecasted. The forecasts give an insight into what was thought would occur at specific times during unrest. WOVOdat should provide the opportunity to analyze forecasts with monitoring data and event outcomes for future crisis situations.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;description&gt;
				<ul>
					<li>Description: A short description of the forecast for this phase. Please include the forecast type and magnitude.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;earliestStartTime&gt;
				<ul>
					<li>Description: The earliest expected start time of the eruption in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;earliestStartTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the earliest expected start time of the eruption.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;latestStartTime&gt;
				<ul>
					<li>Description: The latest expected start time of the eruption in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;latestStartTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the latest expected start time of the eruption.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;issueTime&gt;
				<ul>
					<li>Description: The time the forecast was issued in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;issueTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the time the forecast was issued.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;timeSuccess&gt;
				<ul>
					<li>Description: A flag and comments on the success of the forecasted time of the eruption. Use the letters Y for yes, N for no, or P for Partly..</li>
					<li>Type: Y, N, P <em>(Yes, No, Partly)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;magniSuccess&gt;
				<ul>
					<li>Description: A flag and cmments on the success of the forecasted type and magnitude of the eruption. Use the letters Y for yes, N for no, or P for Partly.</li>
					<li>Type: Y, N, P <em>(Yes, No, Partly)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Any comments or additional information about the forecast, including what aspects were or were not successful.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Video -->
		<h2 class="wovomlclass"><a name="video" id="video"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#eruptions">&lt;Eruptions&gt;</a> | &lt;Video&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;Video code=&quot;...&quot; volcano=&quot;...&quot; eruption=&quot;...&quot; phase=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	&lt;link&gt;...&lt;/link&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;length&gt;...&lt;/length&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;comments&gt;...&lt;/comments&gt;
<strong>&lt;/Video&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about a video clip of the eruption.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>volcano
				<ul>
					<li>Description: The CAVW number of the volcano to which the data refer.</li>
					<li>Type: string of at most 12 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>eruption
				<ul>
					<li>Description: The code of the eruption to which the data refer.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>phase
				<ul>
					<li>Description: The code of the phase to which the data refer.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;link&gt;
				<ul>
					<li>Description: A link to the video clip or information about where to find the video clip.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The start time of the video clip in UTC</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the start time of the video clip.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;length&gt;
				<ul>
					<li>Description: The length of the video clip.</li>
					<li>Type: HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;description&gt;
				<ul>
					<li>Description: A short description of the video, e.g., strombolian eruption footage taken from northwest of the vent at a distance of 5km. This should contain enough information to allow the user to determine if the video will be useful to them.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Additional information about the video including copyright information.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Forecast -->
		<h2 class="wovomlclass"><a name="forecast" id="forecast"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#eruptions">&lt;Eruptions&gt;</a> | &lt;Forecast&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;Forecast code=&quot;...&quot; volcano=&quot;...&quot; phase=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
<strong>&lt;/Forecast&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about forecasts made for a phase of the eruption, such as an overview of the forecast and the times forecasted. The forecasts give an insight into what was thought would occur at specific times during unrest. WOVOdat should provide the opportunity to analyze forecasts with monitoring data and event outcomes for future crisis situations.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>volcano
				<ul>
					<li>Description: The CAVW number of the volcano to which the data refer.</li>
					<li>Type: string of at most 12 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>eruption
				<ul>
					<li>Description: The code of the eruption to which the data refer.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>phase
				<ul>
					<li>Description: The code of the phase to which the data refer.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;description&gt;
				<ul>
					<li>Description: A short description of the forecast for this phase. Please include the forecast type and magnitude.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;earliestStartTime&gt;
				<ul>
					<li>Description: The earliest expected start time of the eruption in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;earliestStartTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the earliest expected start time of the eruption.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;latestStartTime&gt;
				<ul>
					<li>Description: The latest expected start time of the eruption in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;latestStartTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the latest expected start time of the eruption.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;issueTime&gt;
				<ul>
					<li>Description: The time the forecast was issued in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;issueTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the time the forecast was issued.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;timeSuccess&gt;
				<ul>
					<li>Description: A flag and comments on the success of the forecasted time of the eruption. Use the letters Y for yes, N for no, or P for Partly..</li>
					<li>Type: Y, N, P <em>(Yes, No, Partly)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;magniSuccess&gt;
				<ul>
					<li>Description: A flag and cmments on the success of the forecasted type and magnitude of the eruption. Use the letters Y for yes, N for no, or P for Partly.</li>
					<li>Type: Y, N, P <em>(Yes, No, Partly)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Any comments or additional information about the forecast, including what aspects were or were not successful.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems -->
		<h2 class="wovomlclass"><a name="monitoringsystems" id="monitoringsystems"></a><a href="#wovoml">&lt;wovoml&gt;</a> | &lt;MonitoringSystems&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;MonitoringSystems owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	<a href="#monitoringsystems_airplane">&lt;Airplane&gt;...&lt;/Airplane&gt;</a>
	<a href="#monitoringsystems_deformationnetwork">&lt;DeformationNetwork&gt;...&lt;/DeformationNetwork&gt;</a>
	<a href="#monitoringsystems_deformationstations">&lt;DeformationStations&gt;...&lt;/DeformationStations&gt;</a>
	<a href="#monitoringsystems_deformationinstruments">&lt;DeformationInstruments&gt;...&lt;/DeformationInstruments&gt;</a>
	<a href="#monitoringsystems_gasnetwork">&lt;GasNetwork&gt;...&lt;/GasNetwork&gt;</a>
	<a href="#monitoringsystems_gasstations">&lt;GasStations&gt;...&lt;/GasStations&gt;</a>
	<a href="#monitoringsystems_gasinstruments">&lt;GasInstruments&gt;...&lt;/GasInstruments&gt;</a>
	<a href="#monitoringsystems_hydrologicnetwork">&lt;HydrologicNetwork&gt;...&lt;/HydrologicNetwork&gt;</a>
	<a href="#monitoringsystems_hydrologicstations">&lt;HydrologicStations&gt;...&lt;/HydrologicStations&gt;</a>
	<a href="#monitoringsystems_hydrologicinstruments">&lt;HydrologicInstruments&gt;...&lt;/HydrologicInstruments&gt;</a>
	<a href="#monitoringsystems_fieldsnetwork">&lt;FieldsNetwork&gt;...&lt;/FieldsNetwork&gt;</a>
	<a href="#monitoringsystems_fieldsstations">&lt;FieldsStations&gt;...&lt;/FieldsStations&gt;</a>
	<a href="#monitoringsystems_fieldsinstruments">&lt;FieldsInstruments&gt;...&lt;/FieldsInstruments&gt;</a>
	<a href="#monitoringsystems_thermalnetwork">&lt;ThermalNetwork&gt;...&lt;/ThermalNetwork&gt;</a>
	<a href="#monitoringsystems_thermalstations">&lt;ThermalStations&gt;...&lt;/ThermalStations&gt;</a>
	<a href="#monitoringsystems_thermalinstruments">&lt;ThermalInstruments&gt;...&lt;/ThermalInstruments&gt;</a>
	<a href="#monitoringsystems_seismicnetwork">&lt;SeismicNetwork&gt;...&lt;/SeismicNetwork&gt;</a>
	<a href="#monitoringsystems_seismicstations">&lt;SeismicStations&gt;...&lt;/SeismicStations&gt;</a>
	<a href="#monitoringsystems_seismicinstruments">&lt;SeismicInstruments&gt;...&lt;/SeismicInstruments&gt;</a>
	<a href="#monitoringsystems_seismiccomponents">&lt;SeismicComponents&gt;...&lt;/SeismicComponents&gt;</a>
<strong>&lt;/MonitoringSystems&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about all monitoring systems used for a volcano.</p>

		<h3>Attributes</h3>
		<ul>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;Airplane&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_airplane">&lt;Airplane&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;DeformationNetwork&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_deformationnetwork">&lt;DeformationNetwork&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;DeformationStations&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_deformationstations">&lt;DeformationStations&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;DeformationInstruments&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_deformationinstruments">&lt;DeformationInstruments&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;GasNetwork&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_gasnetwork">&lt;GasNetwork&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;GasStations&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_gasstations">&lt;GasStations&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;GasInstruments&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_gasinstruments">&lt;GasInstruments&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;HydrologicNetwork&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_hydrologicnetwork">&lt;HydrologicNetwork&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;HydrologicStations&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_hydrologicstations">&lt;HydrologicStations&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;HydrologicInstruments&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_hydrologicinstruments">&lt;HydrologicInstruments&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;FieldsNetwork&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_fieldsnetwork">&lt;FieldsNetwork&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;FieldsStations&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_fieldsstations">&lt;FieldsStations&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;FieldsInstruments&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_fieldsinstruments">&lt;FieldsInstruments&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;ThermalNetwork&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_thermalnetwork">&lt;ThermalNetwork&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;ThermalStations&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_thermalstations">&lt;ThermalStations&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;ThermalInstruments&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_thermalinstruments">&lt;ThermalInstruments&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;SeismicNetwork&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_seismicnetwork">&lt;SeismicNetwork&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;SeismicStations&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_seismicstations">&lt;SeismicStations&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;SeismicInstruments&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_seismicinstruments">&lt;SeismicInstruments&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;SeismicComponents&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_seismiccomponent">&lt;SeismicComponents&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Airplane -->
		<h2 class="wovomlclass"><a name="monitoringsystems_airplane" id="monitoringsystems_airplane"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | &lt;Airplane&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;Airplane code=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	&lt;name&gt;...&lt;/name&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	<a href="#monitoringsystems_airplane_gasinstrument">&lt;GasInstrument&gt;...&lt;/GasInstrument&gt;</a>
	<a href="#monitoringsystems_airplane_thermalinstrument">&lt;ThermalInstrument&gt;...&lt;/ThermalInstrument&gt;</a>
<strong>&lt;/Airplane&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about airplanes that are used for collecting data from above the surface of the earth.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name of the airplane.</li>
					<li>Type: string of at most 50 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;description&gt;
				<ul>
					<li>Description: A description of the airplane including where to find additional information.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the airplane was first used in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the airplane was first used.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date the airplane was permanently decommissioned or the time this set of information became invalid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the airplane was permanently decommissioned or the time this set of information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;GasInstrument&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_airplane_gasinstrument">&lt;GasInstrument&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;ThermalInstrument&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_airplane_thermalinstrument">&lt;ThermalInstrument&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Airplane - Gas instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystems_airplane_gasinstrument" id="monitoringsystems_airplane_gasinstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_airplane">&lt;Airplane&gt;</a> | &lt;GasInstrument&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;GasInstrument code=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
<strong>&lt;/GasInstrument&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about the instruments used to collect ground-based and remote gas data along with a flag to indicate if the instrument is installed permanently or is used periodically as part of a campaign.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;permanent&gt;
				<ul>
					<li>Description: A single character field to know if the instrument is part of a permanent installation (use P for permanent) or part of a campaign (use C for campaign).</li>
					<li>Type: P, C <em>(Permanent, Campaign)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name, model, and manufacturer of the instrument.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;type&gt;
				<ul>
					<li>Description: The type of instrument.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;units&gt;
				<ul>
					<li>Description: The units the instrument measures.</li>
					<li>Type: string of at most 50 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;resolution&gt;
				<ul>
					<li>Description: Typical instrumental measuring precision.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;signalToNoise&gt;
				<ul>
					<li>Description: An instrument specific signal to noise ratio.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;calibration&gt;
				<ul>
					<li>Description: The calibration method.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the instrument was set up and activated or the time this information became valid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the instrument was set up and activated or the time this information became valid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date (UTC) the instrument was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the instrument was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments on the instrument.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Airplane - Thermal instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystems_airplane_thermalinstrument" id="monitoringsystems_airplane_thermalinstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_airplane">&lt;Airplane&gt;</a> | &lt;ThermalInstrument&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;ThermalInstrument code=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
<strong>&lt;/ThermalInstrument&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about the instruments used to collect ground-based and remote thermal data.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name, model, and manufacturer of the instrument.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;type&gt;
				<ul>
					<li>Description: The type of instrument.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;units&gt;
				<ul>
					<li>Description: The units the instrument measures.</li>
					<li>Type: string of at most 50 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;resolution&gt;
				<ul>
					<li>Description: Typical instrumental measuring precision.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;signalToNoise&gt;
				<ul>
					<li>Description: An instrument specific signal to noise ratio.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the instrument was set up and activated or the time this information became valid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the instrument was set up and activated or the time this information became valid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date (UTC) the instrument was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the instrument was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments on the instrument.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Deformation network -->
		<h2 class="wovomlclass"><a name="monitoringsystems_deformationnetwork" id="monitoringsystems_deformationnetwork"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | &lt;DeformationNetwork&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;DeformationNetwork code=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	<a href="#monitoringsystems_deformationnetwork_volcanoes">&lt;Volcanoes&gt;...&lt;/Volcanoes&gt;</a>
	&lt;name&gt;...&lt;/name&gt;
	&lt;area&gt;...&lt;/area&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;diffUTC&gt;...&lt;/diffUTC&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	<a href="#monitoringsystems_deformationnetwork_deformationstation">&lt;DeformationStation&gt;...&lt;/DeformationStation&gt;</a>
<strong>&lt;/DeformationNetwork&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about the network of stations that collect deformation data at a particular site, in general at one volcano.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;Volcanoes&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_deformationnetwork_volcanoes">&lt;Volcanoes&gt;</a>.</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name of the network.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;area&gt;
				<ul>
					<li>Description: The volcano and approximate area in km<sup>2</sup> covered by the network.</li>
					<li>Type: float</li>
					<li>Unit: km<sup>2</sup></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;description&gt;
				<ul>
					<li>Description: A description of the network including permanent stations and types of instruments.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the network was set up and activated in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the network was set up and activated.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date the network was permanently decommissioned or the time this set of information became invalid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the network was permanently decommissioned or the time this set of information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;diffUTC&gt;
				<ul>
					<li>Description: Time zone relative to UTC. Please enter the number of hours from GMT, using a negative sign (-) for hours before GMT and no sign for positive numbers.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments about the network including minor updates to the network over time and future plans.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;DeformationStation&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_deformationnetwork_deformationstation">&lt;DeformationStation&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Deformation network - Volcanoes -->
		<h2 class="wovomlclass"><a name="monitoringsystems_deformationnetwork_volcanoes" id="monitoringsystems_deformationnetwork_volcanoes"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_deformationnetwork">&lt;DeformationNetwork&gt;</a> | &lt;Volcanoes&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;Volcanoes&gt;</strong>
	&lt;volcanoCode&gt;...&lt;/volcanoCode&gt;
<strong>&lt;/Volcanoes&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains a list of volcano codes.</p>

		<h3>Elements</h3>
		<ul>
			<li>&lt;volcanoCode&gt;
				<ul>
					<li>Description: The CAVW number of a volcano.</li>
					<li>Type: string of at most 12 characters</li>
					<li>Number of occurrences: 1-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Deformation network - Deformation station -->
		<h2 class="wovomlclass"><a name="monitoringsystems_deformationnetwork_deformationstation" id="monitoringsystems_deformationnetwork_deformationstation"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_deformationnetwork">&lt;DeformationNetwork&gt;</a> | &lt;DeformationStation&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;DeformationStation code=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
	<a href="#monitoringsystems_deformationnetwork_deformationstation_deformationinstrument">&lt;DeformationInstrument&gt;...&lt;/DeformationInstrument&gt;</a>
	<a href="#monitoringsystems_deformationnetwork_deformationstation_tiltstraininstrument">&lt;TiltStrainInstrument&gt;...&lt;/TiltStrainInstrument&gt;</a>
<strong>&lt;/DeformationStation&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information such as a location, name, and description for stations where deformation or geodetic data are collected.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name of the benchmark or station given by the observatory.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;permInst&gt;
				<ul>
					<li>Description: A list of any permanent instruments installed at this site.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;lat&gt; AND &lt;lon&gt;
				<ul>
					<li>Description: The latitude and longitude in decimal degrees.</li>
					<li>Type: a decimal value ranging from -90 (inclusive) to +90 (inclusive) for latitude and from -180 (inclusive) to +180 (inclusive) for longitude</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;elev&gt;
				<ul>
					<li>Description: The nominal elevation of the station in meters.</li>
					<li>Type: float</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;horizPrecision&gt;
				<ul>
					<li>Description: The horizontal precision of nominal location for GPS.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the station was set up and activated or the time this new information became valid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the station was set up and activated or the time this new information became valid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date (UTC) the station was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the station was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;diffUTC&gt;
				<ul>
					<li>Description: The time zone relative to UTC. Please enter the number of hours from GMT, using a negative sign (-) for hours before GMT and no sign for positive numbers.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;refStation&gt;
				<ul>
					<li>Description: A flag indicating that this station is used as a reference station.</li>
					<li>Type: Y, N <em>(Yes, No)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;description&gt;
				<ul>
					<li>Description: A description of the station or any comments.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;DeformationInstrument&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_deformationnetwork_deformationstation_deformationinstrument">&lt;DeformationInstrument&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;TiltStrainInstrument&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_deformationnetwork_deformationstation_tiltstraininstrument">&lt;TiltStrainInstrument&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Deformation network - Deformation station - Deformation instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystems_deformationnetwork_deformationstation_deformationinstrument" id="monitoringsystems_deformationnetwork_deformationstation_deformationinstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_deformationnetwork">&lt;DeformationNetwork&gt;</a> | <a href="#monitoringsystems_deformationnetwork_deformationstation">&lt;DeformationStation&gt;</a> | &lt;DeformationInstrument&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;DeformationInstrument code=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
<strong>&lt;/DeformationInstrument&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about each individual instrument along with a flag to indicate if the instrument is installed permanently or is used periodically as part of a campaign.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name, model, and manufacturer of the instrument.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;type&gt;
				<ul>
					<li>Description: The type of instrument chosen from a standard set of instruments.</li>
					<li>Type: string of at most 50 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;units&gt;
				<ul>
					<li>Description: The units the instrument measures.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;resolution&gt;
				<ul>
					<li>Description: Typical instrumental measuring precision.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;signalToNoise&gt;
				<ul>
					<li>Description: An instrument specific signal to noise ratio.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the instrument was set up and activated or the time this new information became valid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the instrument was set up and activated or the time this new information became valid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date (UTC) the instrument was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the instrument was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments on the instrument including anything unusual, for example, modifications.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Deformation network - Deformation station - Tilt/Strain instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystems_deformationnetwork_deformationstation_tiltstraininstrument" id="monitoringsystems_deformationnetwork_deformationstation_tiltstraininstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_deformationnetwork">&lt;DeformationNetwork&gt;</a> | <a href="#monitoringsystems_deformationnetwork_deformationstation">&lt;DeformationStation&gt;</a> | &lt;TiltStrainInstrument&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;TiltStrainInstrument code=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
<strong>&lt;/TiltStrainInstrument&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about each individual instrument and provides the necessary data to process raw tilt and strain data.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name, model, and manufacturer of the instrument.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;type&gt;
				<ul>
					<li>Description: The type of instrument.</li>
					<li>Type: string of at most 50 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;depth&gt;
				<ul>
					<li>Description: The depth of instrument.</li>
					<li>Type: float</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;units&gt;
				<ul>
					<li>Description: The units the instrument measures.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;resolution&gt;
				<ul>
					<li>Description: The analog to digitizer resolution.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;direction1&gt;
				<ul>
					<li>Description: The azimuth of direction 1 (or x for tiltmeters) using geographic north in degrees from 0 to 360.</li>
					<li>Type: a decimal value ranging from 0 (inclusive) to 360 (inclusive)</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;direction2&gt;
				<ul>
					<li>Description: The azimuth of direction 2 (or y for tiltmeters) using geographic north in degrees from 0 to 360.</li>
					<li>Type: a decimal value ranging from 0 (inclusive) to 360 (inclusive)</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;direction3&gt;
				<ul>
					<li>Description: The azimuth of direction 3 using geographic north in degrees from 0 to 360.</li>
					<li>Type: a decimal value ranging from 0 (inclusive) to 360 (inclusive)</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;direction4&gt;
				<ul>
					<li>Description: The azimuth of direction 4 using geographic north in degrees from 0 to 360.</li>
					<li>Type: a decimal value ranging from 0 (inclusive) to 360 (inclusive)</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;electroConv1&gt;
				<ul>
					<li>Description: The electronic conversion (scale factor) for component 1. The tilt conversion will be from mV to microradians and the strain conversion should be from mV to microstrain.</li>
					<li>Type: float</li>
					<li>Unit: &mu;rad/mV or &mu;strain/mV</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;electroConv2&gt;
				<ul>
					<li>Description: The electronic conversion (scale factor) for component 2. The tilt conversion should be from mV to microradian conversion and the strain conversion should be from mV to microstrain.</li>
					<li>Type: float</li>
					<li>Unit: &mu;rad/mV or &mu;strain/mV</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;electroConv3&gt;
				<ul>
					<li>Description: The electronic conversion (scale factor) for component 3, if applicable. The tilt conversion should be from mV to microradian conversion and the strain conversion should be from mV to microstrain.</li>
					<li>Type: float</li>
					<li>Unit: &mu;rad/mV or &mu;strain/mV</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;electroConv4&gt;
				<ul>
					<li>Description: The electronic conversion (scale factor) for component 4, if applicable. The tilt conversion should be from mV to microradian conversion and the strain conversion should be from mV to microstrain.</li>
					<li>Type: float</li>
					<li>Unit: &mu;rad/mV or &mu;strain/mV</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The time this instrument information became valid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the time this instrument information became valid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The time this instrument information changed in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the time this instrument information changed.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments about the instrument.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Deformation stations -->
		<h2 class="wovomlclass"><a name="monitoringsystems_deformationstations" id="monitoringsystems_deformationstations"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | &lt;DeformationStations&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;DeformationStations network=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	<a href="#monitoringsystems_deformationstation">&lt;DeformationStation&gt;...&lt;/DeformationStation&gt;</a>
<strong>&lt;/DeformationStations&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information such as a location, name, and description for stations where deformation or geodetic data are collected.</p>

		<h3>Attributes</h3>
		<ul>
			<li>network
				<ul>
					<li>Description: The code of the network to which these stations belong.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these stations.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these stations (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these stations (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;DeformationStation&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystemss_deformationstation">&lt;DeformationStation&gt;</a>.</li>
					<li>Number of occurrences: 1-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Deformation station -->
		<h2 class="wovomlclass"><a name="monitoringsystems_deformationstation" id="monitoringsystems_deformationstation"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_deformationstations">&lt;DeformationStations&gt;</a> | &lt;DeformationStation&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;DeformationStation code=&quot;...&quot; network=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
	<a href="#monitoringsystems_deformationstation_deformationinstrument">&lt;DeformationInstrument&gt;...&lt;/DeformationInstrument&gt;</a>
	<a href="#monitoringsystems_deformationstation_tiltstraininstrument">&lt;TiltStrainInstrument&gt;...&lt;/TiltStrainInstrument&gt;</a>
<strong>&lt;/DeformationStation&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information such as a location, name, and description for stations where deformation or geodetic data are collected.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>network
				<ul>
					<li>Description: The code of the network to which this station belongs.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of this station.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of this station (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of this station (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name of the benchmark or station given by the observatory.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;permInst&gt;
				<ul>
					<li>Description: A list of any permanent instruments installed at this site.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;lat&gt; AND &lt;lon&gt;
				<ul>
					<li>Description: The latitude and longitude in decimal degrees.</li>
					<li>Type: a decimal value ranging from -90 (inclusive) to +90 (inclusive) for latitude and from -180 (inclusive) to +180 (inclusive) for longitude</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;elev&gt;
				<ul>
					<li>Description: The nominal elevation of the station in meters.</li>
					<li>Type: float</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;horizPrecision&gt;
				<ul>
					<li>Description: The horizontal precision of nominal location for GPS.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the station was set up and activated or the time this new information became valid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the station was set up and activated or the time this new information became valid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date (UTC) the station was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the station was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;diffUTC&gt;
				<ul>
					<li>Description: The time zone relative to UTC. Please enter the number of hours from GMT, using a negative sign (-) for hours before GMT and no sign for positive numbers.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;refStation&gt;
				<ul>
					<li>Description: A flag indicating that this station is used as a reference station.</li>
					<li>Type: Y, N <em>(Yes, No)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;description&gt;
				<ul>
					<li>Description: A description of the station or any comments.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;DeformationInstrument&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_deformationstation_deformationinstrument">&lt;DeformationInstrument&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;TiltStrainInstrument&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_deformationstation_tiltstraininstrument">&lt;TiltStrainInstrument&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Deformation station - Deformation instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystems_deformationstation_deformationinstrument" id="monitoringsystems_deformationstation_deformationinstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_deformationstations">&lt;DeformationStations&gt;</a> | <a href="#monitoringsystems_deformationstation">&lt;DeformationStation&gt;</a> | &lt;DeformationInstrument&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;DeformationInstrument code=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
<strong>&lt;/DeformationInstrument&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about each individual instrument along with a flag to indicate if the instrument is installed permanently or is used periodically as part of a campaign.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of this instrument.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of this instrument (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of this instrument (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name, model, and manufacturer of the instrument.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;type&gt;
				<ul>
					<li>Description: The type of instrument chosen from a standard set of instruments.</li>
					<li>Type: string of at most 50 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;units&gt;
				<ul>
					<li>Description: The units the instrument measures.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;resolution&gt;
				<ul>
					<li>Description: Typical instrumental measuring precision.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;signalToNoise&gt;
				<ul>
					<li>Description: An instrument specific signal to noise ratio.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the instrument was set up and activated or the time this new information became valid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the instrument was set up and activated or the time this new information became valid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date (UTC) the instrument was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the instrument was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments on the instrument including anything unusual, for example, modifications.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Deformation station - Tilt/Strain instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystems_deformationstation_tiltstraininstrument" id="monitoringsystems_deformationstation_tiltstraininstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_deformationstations">&lt;DeformationStations&gt;</a> | <a href="#monitoringsystems_deformationstation">&lt;DeformationStation&gt;</a> | &lt;TiltStrainInstrument&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;TiltStrainInstrument code=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
<strong>&lt;/TiltStrainInstrument&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about each individual instrument and provides the necessary data to process raw tilt and strain data.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of this instrument.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of this instrument (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of this instrument (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name, model, and manufacturer of the instrument.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;type&gt;
				<ul>
					<li>Description: The type of instrument.</li>
					<li>Type: string of at most 50 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;depth&gt;
				<ul>
					<li>Description: The depth of instrument.</li>
					<li>Type: float</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;units&gt;
				<ul>
					<li>Description: The units the instrument measures.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;resolution&gt;
				<ul>
					<li>Description: The analog to digitizer resolution.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;direction1&gt;
				<ul>
					<li>Description: The azimuth of direction 1 (or x for tiltmeters) using geographic north in degrees from 0 to 360.</li>
					<li>Type: a decimal value ranging from 0 (inclusive) to 360 (inclusive)</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;direction2&gt;
				<ul>
					<li>Description: The azimuth of direction 2 (or y for tiltmeters) using geographic north in degrees from 0 to 360.</li>
					<li>Type: a decimal value ranging from 0 (inclusive) to 360 (inclusive)</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;direction3&gt;
				<ul>
					<li>Description: The azimuth of direction 3 using geographic north in degrees from 0 to 360.</li>
					<li>Type: a decimal value ranging from 0 (inclusive) to 360 (inclusive)</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;direction4&gt;
				<ul>
					<li>Description: The azimuth of direction 4 using geographic north in degrees from 0 to 360.</li>
					<li>Type: a decimal value ranging from 0 (inclusive) to 360 (inclusive)</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;electroConv1&gt;
				<ul>
					<li>Description: The electronic conversion (scale factor) for component 1. The tilt conversion will be from mV to microradians and the strain conversion should be from mV to microstrain.</li>
					<li>Type: float</li>
					<li>Unit: &mu;rad/mV or &mu;strain/mV</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;electroConv2&gt;
				<ul>
					<li>Description: The electronic conversion (scale factor) for component 2. The tilt conversion should be from mV to microradian conversion and the strain conversion should be from mV to microstrain.</li>
					<li>Type: float</li>
					<li>Unit: &mu;rad/mV or &mu;strain/mV</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;electroConv3&gt;
				<ul>
					<li>Description: The electronic conversion (scale factor) for component 3, if applicable. The tilt conversion should be from mV to microradian conversion and the strain conversion should be from mV to microstrain.</li>
					<li>Type: float</li>
					<li>Unit: &mu;rad/mV or &mu;strain/mV</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;electroConv4&gt;
				<ul>
					<li>Description: The electronic conversion (scale factor) for component 4, if applicable. The tilt conversion should be from mV to microradian conversion and the strain conversion should be from mV to microstrain.</li>
					<li>Type: float</li>
					<li>Unit: &mu;rad/mV or &mu;strain/mV</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The time this instrument information became valid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the time this instrument information became valid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The time this instrument information changed in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the time this instrument information changed.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments about the instrument.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Deformation instruments -->
		<h2 class="wovomlclass"><a name="monitoringsystems_deformationinstruments" id="monitoringsystems_deformationinstruments"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | &lt;DeformationInstruments&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;DeformationInstruments station=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	<a href="#monitoringsystems_deformationinstrument">&lt;DeformationInstrument&gt;...&lt;/DeformationInstrument&gt;</a>
<strong>&lt;/DeformationInstruments&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about each individual instrument along with a flag to indicate if the instrument is installed permanently or is used periodically as part of a campaign.</p>

		<h3>Attributes</h3>
		<ul>
			<li>station
				<ul>
					<li>Description: The code of the station to which these instruments belong.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these instruments.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these instruments (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these instruments (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;DeformationInstrument&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_deformationinstrument">&lt;DeformationInstrument&gt;</a>.</li>
					<li>Number of occurrences: 1-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Deformation instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystems_deformationinstrument" id="monitoringsystems_deformationinstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_deformationinstruments">&lt;DeformationInstruments&gt;</a> | &lt;DeformationInstrument&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;DeformationInstrument code=&quot;...&quot; station=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
<strong>&lt;/DeformationInstrument&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about each individual instrument along with a flag to indicate if the instrument is installed permanently or is used periodically as part of a campaign.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>station
				<ul>
					<li>Description: The code of the station to which this instrument belongs.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name, model, and manufacturer of the instrument.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;type&gt;
				<ul>
					<li>Description: The type of instrument chosen from a standard set of instruments.</li>
					<li>Type: string of at most 50 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;units&gt;
				<ul>
					<li>Description: The units the instrument measures.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;resolution&gt;
				<ul>
					<li>Description: Typical instrumental measuring precision.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;signalToNoise&gt;
				<ul>
					<li>Description: An instrument specific signal to noise ratio.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the instrument was set up and activated or the time this new information became valid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the instrument was set up and activated or the time this new information became valid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date (UTC) the instrument was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the instrument was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments on the instrument including anything unusual, for example, modifications.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Tilt/Strain instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystems_tiltstraininstrument" id="monitoringsystems_tiltstraininstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_deformationinstruments">&lt;DeformationInstruments&gt;</a> | &lt;TiltStrainInstrument&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;TiltStrainInstrument code=&quot;...&quot; station=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
<strong>&lt;/TiltStrainInstrument&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about each individual instrument and provides the necessary data to process raw tilt and strain data.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>station
				<ul>
					<li>Description: The code of the station to which this instrument belongs.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name, model, and manufacturer of the instrument.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;type&gt;
				<ul>
					<li>Description: The type of instrument.</li>
					<li>Type: string of at most 50 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;depth&gt;
				<ul>
					<li>Description: The depth of instrument.</li>
					<li>Type: float</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;units&gt;
				<ul>
					<li>Description: The units the instrument measures.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;resolution&gt;
				<ul>
					<li>Description: The analog to digitizer resolution.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;direction1&gt;
				<ul>
					<li>Description: The azimuth of direction 1 (or x for tiltmeters) using geographic north in degrees from 0 to 360.</li>
					<li>Type: a decimal value ranging from 0 (inclusive) to 360 (inclusive)</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;direction2&gt;
				<ul>
					<li>Description: The azimuth of direction 2 (or y for tiltmeters) using geographic north in degrees from 0 to 360.</li>
					<li>Type: a decimal value ranging from 0 (inclusive) to 360 (inclusive)</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;direction3&gt;
				<ul>
					<li>Description: The azimuth of direction 3 using geographic north in degrees from 0 to 360.</li>
					<li>Type: a decimal value ranging from 0 (inclusive) to 360 (inclusive)</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;direction4&gt;
				<ul>
					<li>Description: The azimuth of direction 4 using geographic north in degrees from 0 to 360.</li>
					<li>Type: a decimal value ranging from 0 (inclusive) to 360 (inclusive)</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;electroConv1&gt;
				<ul>
					<li>Description: The electronic conversion (scale factor) for component 1. The tilt conversion will be from mV to microradians and the strain conversion should be from mV to microstrain.</li>
					<li>Type: float</li>
					<li>Unit: &mu;rad/mV or &mu;strain/mV</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;electroConv2&gt;
				<ul>
					<li>Description: The electronic conversion (scale factor) for component 2. The tilt conversion should be from mV to microradian conversion and the strain conversion should be from mV to microstrain.</li>
					<li>Type: float</li>
					<li>Unit: &mu;rad/mV or &mu;strain/mV</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;electroConv3&gt;
				<ul>
					<li>Description: The electronic conversion (scale factor) for component 3, if applicable. The tilt conversion should be from mV to microradian conversion and the strain conversion should be from mV to microstrain.</li>
					<li>Type: float</li>
					<li>Unit: &mu;rad/mV or &mu;strain/mV</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;electroConv4&gt;
				<ul>
					<li>Description: The electronic conversion (scale factor) for component 4, if applicable. The tilt conversion should be from mV to microradian conversion and the strain conversion should be from mV to microstrain.</li>
					<li>Type: float</li>
					<li>Unit: &mu;rad/mV or &mu;strain/mV</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The time this instrument information became valid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the time this instrument information became valid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The time this instrument information changed in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the time this instrument information changed.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments about the instrument.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Gas network -->
		<h2 class="wovomlclass"><a name="monitoringsystems_gasnetwork" id="monitoringsystems_gasnetwork"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | &lt;GasNetwork&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;GasNetwork code=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	<a href="#monitoringsystems_gasnetwork_volcanoes">&lt;Volcanoes&gt;...&lt;/Volcanoes&gt;</a>
	&lt;name&gt;...&lt;/name&gt;
	&lt;area&gt;...&lt;/area&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;diffUTC&gt;...&lt;/diffUTC&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	<a href="#monitoringsystems_gasnetwork_gasstation">&lt;GasStation&gt;...&lt;/GasStation&gt;</a>
<strong>&lt;/GasNetwork&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about the network of stations that collect gas data at a particular site, in general at one volcano.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of this network.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of this network (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of this network (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;Volcanoes&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_gasnetwork_volcanoes">&lt;Volcanoes&gt;</a>.</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name of the network.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;area&gt;
				<ul>
					<li>Description: The volcano and approximate area in km<sup>2</sup> covered by the network.</li>
					<li>Type: float</li>
					<li>Unit: km<sup>2</sup></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;description&gt;
				<ul>
					<li>Description: A description of the network including permanent stations and types of instruments.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the network was set up and activated in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the network was set up and activated.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date the network was permanently decommissioned or the time this set of information became invalid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the network was permanently decommissioned or the time this set of information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;diffUTC&gt;
				<ul>
					<li>Description: Time zone relative to UTC. Please enter the number of hours from GMT, using a negative sign (-) for hours before GMT and no sign for positive numbers.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments about the network including minor updates to the network over time and future plans.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;ownerCode&gt;
				<ul>
					<li>Description: The contact code in WOVOdat for the person responsible for the station.</li>
					<li>Type: string of at most 10 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Gas network - Volcanoes -->
		<h2 class="wovomlclass"><a name="monitoringsystems_gasnetwork_volcanoes" id="monitoringsystems_gasnetwork_volcanoes"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_gasnetwork">&lt;GasNetwork&gt;</a> | &lt;Volcanoes&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;Volcanoes&gt;</strong>
	&lt;volcanoCode&gt;...&lt;/volcanoCode&gt;
<strong>&lt;/Volcanoes&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains a list of volcano codes.</p>

		<h3>Elements</h3>
		<ul>
			<li>&lt;volcanoCode&gt;
				<ul>
					<li>Description: The CAVW number of a volcano in WOVOdat.</li>
					<li>Type: string of at most 12 characters</li>
					<li>Number of occurrences: 1-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Gas network - Gas station -->
		<h2 class="wovomlclass"><a name="monitoringsystems_gasnetwork_gasstation" id="monitoringsystems_gasnetwork_gasstation"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_gasnetwork">&lt;GasNetwork&gt;</a> | &lt;GasStation&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;GasStation code=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
	<a href="#monitoringsystems_gasnetwork_gasstation_gasinstrument">&lt;GasInstrument&gt;...&lt;/GasInstrument&gt;</a>
<strong>&lt;/GasStation&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information such as a location, type of gas body monitored, and a description of the stations where gas data are collected.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of this station.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of this station (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of this station (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name of the station.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;type&gt;
				<ul>
					<li>Description: The type of gas body found at the station, for example fumarole or diffuse soil degassing or if the station is used to collect remote plume data.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;permInst&gt;
				<ul>
					<li>Description: A list of permanent instruments, if applicable, installed at this site.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;lat&gt; AND &lt;lon&gt;
				<ul>
					<li>Description: The latitude and longitude in decimal degrees.</li>
					<li>Type: a decimal value ranging from -90 (inclusive) to +90 (inclusive) for latitude and from -180 (inclusive) to +180 (inclusive) for longitude</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;elev&gt;
				<ul>
					<li>Description: The elevation of the land surface in meters above sea level.</li>
					<li>Type: float</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the station was set up and activated or the time this new information became valid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the station was set up and activated or the time this new information became valid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date (UTC) the station was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the station was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;diffUTC&gt;
				<ul>
					<li>Description: The time zone relative to UTC. Please enter the number of hours from GMT, using a negative sign (-) for hours before GMT and no sign for positive numbers.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;description&gt;
				<ul>
					<li>Description: A description of the station and any comments.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;GasInstrument&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_gasnetwork_gasstation_gasinstrument">&lt;GasInstrument&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Gas network - Gas station - Gas instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystems_gasnetwork_gasstation_gasinstrument" id="monitoringsystems_gasnetwork_gasstation_gasinstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_gasnetwork">&lt;GasNetwork&gt;</a> | <a href="#monitoringsystems_gasnetwork_gasstation">&lt;GasStation&gt;</a> | &lt;GasInstrument&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;GasInstrument code=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
<strong>&lt;/GasInstrument&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about the instruments used to collect ground-based and remote gas data along with a flag to indicate if the instrument is installed permanently or is used periodically as part of a campaign.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of this instrument.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of this instrument (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of this instrument (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name, model, and manufacturer of the instrument.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;type&gt;
				<ul>
					<li>Description: The type of instrument.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;units&gt;
				<ul>
					<li>Description: The units the instrument measures.</li>
					<li>Type: string of at most 50 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;resolution&gt;
				<ul>
					<li>Description: Typical instrumental measuring precision.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;signalToNoise&gt;
				<ul>
					<li>Description: An instrument specific signal to noise ratio.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;calibration&gt;
				<ul>
					<li>Description: The calibration method.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the instrument was set up and activated or the time this information became valid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the instrument was set up and activated or the time this information became valid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date (UTC) the instrument was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the instrument was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments on the instrument.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Gas stations -->
		<h2 class="wovomlclass"><a name="monitoringsystems_gasstations" id="monitoringsystems_gasstations"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | &lt;GasStations&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;GasStations network=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	<a href="#monitoringsystems_gasstation">&lt;GasStation&gt;...&lt;/GasStation&gt;</a>
<strong>&lt;/GasStations&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information such as a location, type of gas body monitored, and a description of the stations where gas data are collected.</p>

		<h3>Attributes</h3>
		<ul>
			<li>network
				<ul>
					<li>Description: The code of the network to which these stations belong.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these stations.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these stations (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these stations (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;GasStation&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystemss_gasstation">&lt;GasStation&gt;</a>.</li>
					<li>Number of occurrences: 1-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Gas station -->
		<h2 class="wovomlclass"><a name="monitoringsystems_gasstation" id="monitoringsystems_gasstation"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_gasstations">&lt;GasStations&gt;</a> | &lt;GasStation&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;GasStation code=&quot;...&quot; network=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
	<a href="#monitoringsystems_gasstation_gasinstrument">&lt;GasInstrument&gt;...&lt;/GasInstrument&gt;</a>
<strong>&lt;/GasStation&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information such as a location, type of gas body monitored, and a description of the stations where gas data are collected.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>network
				<ul>
					<li>Description: The code of the network to which this station belongs.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of this station.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of this station (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of this station (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name of the station.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;type&gt;
				<ul>
					<li>Description: The type of gas body found at the station, for example fumarole or diffuse soil degassing or if the station is used to collect remote plume data.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;permInst&gt;
				<ul>
					<li>Description: A list of permanent instruments, if applicable, installed at this site.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;lat&gt; AND &lt;lon&gt;
				<ul>
					<li>Description: The latitude and longitude in decimal degrees.</li>
					<li>Type: a decimal value ranging from -90 (inclusive) to +90 (inclusive) for latitude and from -180 (inclusive) to +180 (inclusive) for longitude</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;elev&gt;
				<ul>
					<li>Description: The elevation of the land surface in meters above sea level.</li>
					<li>Type: float</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the station was set up and activated or the time this new information became valid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the station was set up and activated or the time this new information became valid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date (UTC) the station was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the station was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;diffUTC&gt;
				<ul>
					<li>Description: The time zone relative to UTC. Please enter the number of hours from GMT, using a negative sign (-) for hours before GMT and no sign for positive numbers.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;description&gt;
				<ul>
					<li>Description: A description of the station and any comments.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;GasInstrument&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_gasstation_gasinstrument">&lt;GasInstrument&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Gas station - Gas instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystems_gasstation_gasinstrument" id="monitoringsystems_gasstation_gasinstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_gasstations">&lt;GasStations&gt;</a> | <a href="#monitoringsystems_gasnetwork_gasstation">&lt;GasStation&gt;</a> | &lt;GasInstrument&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;GasInstrument code=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
<strong>&lt;/GasInstrument&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about the instruments used to collect ground-based and remote gas data along with a flag to indicate if the instrument is installed permanently or is used periodically as part of a campaign.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of this instrument.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of this instrument (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of this instrument (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name, model, and manufacturer of the instrument.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;type&gt;
				<ul>
					<li>Description: The type of instrument.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;units&gt;
				<ul>
					<li>Description: The units the instrument measures.</li>
					<li>Type: string of at most 50 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;resolution&gt;
				<ul>
					<li>Description: Typical instrumental measuring precision.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;signalToNoise&gt;
				<ul>
					<li>Description: An instrument specific signal to noise ratio.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;calibration&gt;
				<ul>
					<li>Description: The calibration method.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the instrument was set up and activated or the time this information became valid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the instrument was set up and activated or the time this information became valid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date (UTC) the instrument was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the instrument was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments on the instrument.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Gas instruments -->
		<h2 class="wovomlclass"><a name="monitoringsystems_gasinstruments" id="monitoringsystems_gasinstruments"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | &lt;GasInstruments&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;GasInstruments station=&quot;...&quot; airplane=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	<a href="#monitoringsystems_gasinstrument">&lt;GasInstrument&gt;...&lt;/GasInstrument&gt;</a>
<strong>&lt;/GasInstruments&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about the instruments used to collect ground-based and remote gas data along with a flag to indicate if the instrument is installed permanently or is used periodically as part of a campaign.</p>

		<h3>Attributes</h3>
		<ul>
			<li>station
				<ul>
					<li>Description: The code of the station where these instruments are installed.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>airplane
				<ul>
					<li>Description: The code of the airplane where these instruments are installed.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these instruments.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these instruments (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these instruments (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;GasInstrument&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_gasinstrument">&lt;GasInstrument&gt;</a>.</li>
					<li>Number of occurrences: 1-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Gas instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystems_gasinstrument" id="monitoringsystems_gasinstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_gasinstruments">&lt;GasInstruments&gt;</a> | &lt;GasInstrument&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;GasInstrument code=&quot;...&quot; station=&quot;...&quot; airplane=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
<strong>&lt;/GasInstrument&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about the instruments used to collect ground-based and remote gas data along with a flag to indicate if the instrument is installed permanently or is used periodically as part of a campaign.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>station
				<ul>
					<li>Description: The code of the station where this instrument is installed.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>airplane
				<ul>
					<li>Description: The code of the airplane where this instrument is installed.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of this instrument.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of this instrument (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of this instrument (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name, model, and manufacturer of the instrument.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;type&gt;
				<ul>
					<li>Description: The type of instrument.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;units&gt;
				<ul>
					<li>Description: The units the instrument measures.</li>
					<li>Type: string of at most 50 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;resolution&gt;
				<ul>
					<li>Description: Typical instrumental measuring precision.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;signalToNoise&gt;
				<ul>
					<li>Description: An instrument specific signal to noise ratio.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;calibration&gt;
				<ul>
					<li>Description: The calibration method.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the instrument was set up and activated or the time this information became valid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the instrument was set up and activated or the time this information became valid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date (UTC) the instrument was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the instrument was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments on the instrument.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Hydrologic network -->
		<h2 class="wovomlclass"><a name="monitoringsystems_hydrologicnetwork" id="monitoringsystems_hydrologicnetwork"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | &lt;HydrologicNetwork&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;HydrologicNetwork code=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	<a href="#monitoringsystems_hydrologicnetwork_volcanoes">&lt;Volcanoes&gt;...&lt;/Volcanoes&gt;</a>
	&lt;name&gt;...&lt;/name&gt;
	&lt;area&gt;...&lt;/area&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;diffUTC&gt;...&lt;/diffUTC&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	<a href="#monitoringsystems_hydrologicnetwork_hydrologicstation">&lt;HydrologicStation&gt;...&lt;/HydrologicStation&gt;</a>
<strong>&lt;/HydrologicNetwork&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about the network of stations that collect hydrologic data at a particular site, in general at one volcano.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of this network.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of this network (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of this network (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;Volcanoes&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_hydrologicnetwork_volcanoes">&lt;Volcanoes&gt;</a>.</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name of the network.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;area&gt;
				<ul>
					<li>Description: The volcano and approximate area in km<sup>2</sup> covered by the network.</li>
					<li>Type: float</li>
					<li>Unit: km<sup>2</sup></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;description&gt;
				<ul>
					<li>Description: A description of the network including permanent stations and types of instruments.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the network was set up and activated in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the network was set up and activated.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date the network was permanently decommissioned or the time this set of information became invalid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the network was permanently decommissioned or the time this set of information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;diffUTC&gt;
				<ul>
					<li>Description: Time zone relative to UTC. Please enter the number of hours from GMT, using a negative sign (-) for hours before GMT and no sign for positive numbers.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments about the network including minor updates to the network over time and future plans.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;HydrologicStation&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_hydrologicnetwork_hydrologicstation">&lt;HydrologicStation&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Hydrologic network - Volcanoes -->
		<h2 class="wovomlclass"><a name="monitoringsystems_hydrologicnetwork_volcanoes" id="monitoringsystems_hydrologicnetwork_volcanoes"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_hydrologicnetwork">&lt;HydrologicNetwork&gt;</a> | &lt;Volcanoes&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;Volcanoes&gt;</strong>
	&lt;volcanoCode&gt;...&lt;/volcanoCode&gt;
<strong>&lt;/Volcanoes&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains a list of volcano codes.</p>

		<h3>Elements</h3>
		<ul>
			<li>&lt;volcanoCode&gt;
				<ul>
					<li>Description: The CAVW number of a volcano.</li>
					<li>Type: string of at most 12 characters</li>
					<li>Number of occurrences: 1-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Hydrologic network - Hydrologic station -->
		<h2 class="wovomlclass"><a name="monitoringsystems_hydrologicnetwork_hydrologicstation" id="monitoringsystems_hydrologicnetwork_hydrologicstation"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_hydrologicnetwork">&lt;HydrologicNetwork&gt;</a> | &lt;HydrologicStation&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;HydrologicStation code=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
	<a href="#monitoringsystems_hydrologicnetwork_hydrologicstation_hydrologicinstrument">&lt;HydrologicInstrument&gt;...&lt;/HydrologicInstrument&gt;</a>
<strong>&lt;/HydrologicStation&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information such as location, type of water body, and descriptions for stations where hydrologic data are collected.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of this station.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of this station (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of this station (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name or code of the station.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;waterBodyType&gt;
				<ul>
					<li>Description: The type of water body (well, lake, spring, etc.).</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;permInst&gt;
				<ul>
					<li>Description: A list of permanent instruments, if applicable, installed at this site.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;screenTop&gt;
				<ul>
					<li>Description: The top of the interval open to inflow in meters below the surface.</li>
					<li>Type: float</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;screenBottom&gt;
				<ul>
					<li>Description: The bottom of the interval open to inflow in meters below the surface.</li>
					<li>Type: float</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;wellDepth&gt;
				<ul>
					<li>Description: The total depth of well in meters below the surface.</li>
					<li>Type: double</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;lat&gt; AND &lt;lon&gt;
				<ul>
					<li>Description: The latitude and longitude in decimal degrees.</li>
					<li>Type: a decimal value ranging from -90 (inclusive) to +90 (inclusive) for latitude and from -180 (inclusive) to +180 (inclusive) for longitude</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;elev&gt;
				<ul>
					<li>Description: The elevation of the land surface in meters.</li>
					<li>Type: float</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the station was set up and activated or the time this new information became valid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the station was set up and activated or the time this new information became valid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date (UTC) the station was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the station was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;diffUTC&gt;
				<ul>
					<li>Description: The time zone relative to UTC. Please enter the number of hours from GMT, using a negative sign (-) for hours before GMT and no sign for positive numbers.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;description&gt;
				<ul>
					<li>Description: A description of the station, please include information about environmental factors, e.g., nearby pumping, ocean tides, or anything else that might affect the water measurements.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;HydrologicInstrument&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_hydrologicnetwork_hydrologicstation_hydrologicinstrument">&lt;HydrologicInstrument&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Hydrologic network - Hydrologic station - Hydrologic instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystems_hydrologicnetwork_hydrologicstation_hydrologicinstrument" id="monitoringsystems_hydrologicnetwork_hydrologicstation_hydrologicinstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_hydrologicnetwork">&lt;HydrologicNetwork&gt;</a> | <a href="#monitoringsystems_hydrologicnetwork_hydrologicstation">&lt;HydrologicStation&gt;</a> | &lt;HydrologicInstrument&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;HydrologicInstrument code=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
<strong>&lt;/HydrologicInstrument&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about each individual hydrologic instrument along with a flag to indicate if the instrument is installed permanently or is used periodically as part of a campaign.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of this instrument.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of this instrument (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of this instrument (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name of the instrument including the model and manufacturer.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;pressureMeasType&gt;
				<ul>
					<li>Description: A single character (A or V) to know whether the pressure transducer measurement is absolute (non-vented) or vented (gauge).</li>
					<li>Type: A, V <em>(Absolute, Vented)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;type&gt;
				<ul>
					<li>Description: The type of instrument (float, pressure transducer, bubbler, rain gage, barometer, flow meter, pH or conductivity meter).</li>
					<li>Type: string of at most 50 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;units&gt;
				<ul>
					<li>Description: The units the instrument measures.</li>
					<li>Type: string of at most 50 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;resolution&gt;
				<ul>
					<li>Description: The measurement resolution or precision.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the instrument was set up and activated or the time this information became valid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the instrument was set up and activated or the time this information became valid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date (UTC) the instrument was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the instrument was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: A description of or comments about the instrument.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Hydrologic stations -->
		<h2 class="wovomlclass"><a name="monitoringsystems_hydrologicstations" id="monitoringsystems_hydrologicstations"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | &lt;HydrologicStations&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;HydrologicStations network=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	<a href="#monitoringsystems_hydrologicstation">&lt;HydrologicStation&gt;...&lt;/HydrologicStation&gt;</a>
<strong>&lt;/HydrologicStations&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information such as location, type of water body, and descriptions for stations where hydrologic data are collected.</p>

		<h3>Attributes</h3>
		<ul>
			<li>network
				<ul>
					<li>Description: The code of the network to which these stations belong.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these stations.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these stations (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these stations (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;HydrologicStation&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystemss_hydrologicstation">&lt;HydrologicStation&gt;</a>.</li>
					<li>Number of occurrences: 1-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Hydrologic station -->
		<h2 class="wovomlclass"><a name="monitoringsystems_hydrologicstation" id="monitoringsystems_hydrologicstation"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_hydrologicstations">&lt;HydrologicStations&gt;</a> | &lt;HydrologicStation&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;HydrologicStation code=&quot;...&quot; network=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
	<a href="#monitoringsystems_hydrologicstation_hydrologicinstrument">&lt;HydrologicInstrument&gt;...&lt;/HydrologicInstrument&gt;</a>
<strong>&lt;/HydrologicStation&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information such as location, type of water body, and descriptions for stations where hydrologic data are collected.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>network
				<ul>
					<li>Description: The code of the network to which this station belongs.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of this station.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of this station (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of this station (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name or code of the station.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;waterBodyType&gt;
				<ul>
					<li>Description: The type of water body (well, lake, spring, etc.).</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;permInst&gt;
				<ul>
					<li>Description: A list of permanent instruments, if applicable, installed at this site.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;screenTop&gt;
				<ul>
					<li>Description: The top of the interval open to inflow in meters below the surface.</li>
					<li>Type: float</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;screenBottom&gt;
				<ul>
					<li>Description: The bottom of the interval open to inflow in meters below the surface.</li>
					<li>Type: float</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;wellDepth&gt;
				<ul>
					<li>Description: The total depth of well in meters below the surface.</li>
					<li>Type: double</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;lat&gt; AND &lt;lon&gt;
				<ul>
					<li>Description: The latitude and longitude in decimal degrees.</li>
					<li>Type: a decimal value ranging from -90 (inclusive) to +90 (inclusive) for latitude and from -180 (inclusive) to +180 (inclusive) for longitude</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;elev&gt;
				<ul>
					<li>Description: The elevation of the land surface in meters.</li>
					<li>Type: float</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the station was set up and activated or the time this new information became valid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the station was set up and activated or the time this new information became valid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date (UTC) the station was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the station was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;diffUTC&gt;
				<ul>
					<li>Description: The time zone relative to UTC. Please enter the number of hours from GMT, using a negative sign (-) for hours before GMT and no sign for positive numbers.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;description&gt;
				<ul>
					<li>Description: A description of the station, please include information about environmental factors, e.g., nearby pumping, ocean tides, or anything else that might affect the water measurements.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;HydrologicInstrument&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_hydrologicstation_hydrologicinstrument">&lt;HydrologicInstrument&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Hydrologic station - Hydrologic instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystems_hydrologicstation_hydrologicinstrument" id="monitoringsystems_hydrologicstation_hydrologicinstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_hydrologicstations">&lt;HydrologicStations&gt;</a> | <a href="#monitoringsystems_hydrologicstation">&lt;HydrologicStation&gt;</a> | &lt;HydrologicInstrument&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;HydrologicInstrument code=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
<strong>&lt;/HydrologicInstrument&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about each individual hydrologic instrument along with a flag to indicate if the instrument is installed permanently or is used periodically as part of a campaign.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of this instrument.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of this instrument (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of this instrument (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name of the instrument including the model and manufacturer.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;pressureMeasType&gt;
				<ul>
					<li>Description: A single character (A or V) to know whether the pressure transducer measurement is absolute (non-vented) or vented (gauge).</li>
					<li>Type: A, V <em>(Absolute, Vented)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;type&gt;
				<ul>
					<li>Description: The type of instrument (float, pressure transducer, bubbler, rain gage, barometer, flow meter, pH or conductivity meter).</li>
					<li>Type: string of at most 50 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;units&gt;
				<ul>
					<li>Description: The units the instrument measures.</li>
					<li>Type: string of at most 50 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;resolution&gt;
				<ul>
					<li>Description: The measurement resolution or precision.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the instrument was set up and activated or the time this information became valid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the instrument was set up and activated or the time this information became valid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date (UTC) the instrument was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the instrument was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: A description of or comments about the instrument.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Hydrologic instruments -->
		<h2 class="wovomlclass"><a name="monitoringsystems_hydrologicinstruments" id="monitoringsystems_hydrologicinstruments"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | &lt;HydrologicInstruments&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;HydrologicInstruments station=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	<a href="#monitoringsystems_hydrologicinstrument">&lt;HydrologicInstrument&gt;...&lt;/HydrologicInstrument&gt;</a>
<strong>&lt;/HydrologicInstruments&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about each individual hydrologic instrument along with a flag to indicate if the instrument is installed permanently or is used periodically as part of a campaign.</p>

		<h3>Attributes</h3>
		<ul>
			<li>station
				<ul>
					<li>Description: The code of the station to which these instruments belong.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these instruments.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these instruments (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these instruments (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;HydrologicInstrument&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_hydrologicinstrument">&lt;HydrologicInstrument&gt;</a>.</li>
					<li>Number of occurrences: 1-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Hydrologic instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystems_hydrologicinstrument" id="monitoringsystems_hydrologicinstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_hydrologicinstruments">&lt;HydrologicInstruments&gt;</a> | &lt;HydrologicInstrument&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;HydrologicInstrument code=&quot;...&quot; station=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
<strong>&lt;/HydrologicInstrument&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about each individual hydrologic instrument along with a flag to indicate if the instrument is installed permanently or is used periodically as part of a campaign.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>station
				<ul>
					<li>Description: The code of the station where this instrument is installed.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of this instrument.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of this instrument (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of this instrument (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name of the instrument including the model and manufacturer.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;pressureMeasType&gt;
				<ul>
					<li>Description: A single character (A or V) to know whether the pressure transducer measurement is absolute (non-vented) or vented (gauge).</li>
					<li>Type: A, V <em>(Absolute, Vented)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;type&gt;
				<ul>
					<li>Description: The type of instrument (float, pressure transducer, bubbler, rain gage, barometer, flow meter, pH or conductivity meter).</li>
					<li>Type: string of at most 50 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;units&gt;
				<ul>
					<li>Description: The units the instrument measures.</li>
					<li>Type: string of at most 50 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;resolution&gt;
				<ul>
					<li>Description: The measurement resolution or precision.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the instrument was set up and activated or the time this information became valid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the instrument was set up and activated or the time this information became valid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date (UTC) the instrument was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the instrument was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: A description of or comments about the instrument.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Fields network -->
		<h2 class="wovomlclass"><a name="monitoringsystems_fieldsnetwork" id="monitoringsystems_fieldsnetwork"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | &lt;FieldsNetwork&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;FieldsNetwork code=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	<a href="#monitoringsystems_fieldsnetwork_volcanoes">&lt;Volcanoes&gt;...&lt;/Volcanoes&gt;</a>
	&lt;name&gt;...&lt;/name&gt;
	&lt;area&gt;...&lt;/area&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;diffUTC&gt;...&lt;/diffUTC&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	<a href="#monitoringsystems_fieldsnetwork_fieldsstation">&lt;FieldsStation&gt;...&lt;/FieldsStation&gt;</a>
<strong>&lt;/FieldsNetwork&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about the network of stations that collect fields data at a particular site, in general at one volcano.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of this network.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of this network (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of this network (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;Volcanoes&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_fieldsnetwork_volcanoes">&lt;Volcanoes&gt;</a>.</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name of the network.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;area&gt;
				<ul>
					<li>Description: The volcano and approximate area in km<sup>2</sup> covered by the network.</li>
					<li>Type: float</li>
					<li>Unit: km<sup>2</sup></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;description&gt;
				<ul>
					<li>Description: A description of the network including permanent stations and types of instruments.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the network was set up and activated in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the network was set up and activated.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date the network was permanently decommissioned or the time this set of information became invalid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the network was permanently decommissioned or the time this set of information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;diffUTC&gt;
				<ul>
					<li>Description: Time zone relative to UTC. Please enter the number of hours from GMT, using a negative sign (-) for hours before GMT and no sign for positive numbers.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments about the network including minor updates to the network over time and future plans.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;FieldsStation&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_fieldsnetwork_fieldsstation">&lt;FieldsStation&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Fields network - Volcanoes -->
		<h2 class="wovomlclass"><a name="monitoringsystems_fieldsnetwork_volcanoes" id="monitoringsystems_fieldsnetwork_volcanoes"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_fieldsnetwork">&lt;FieldsNetwork&gt;</a> | &lt;Volcanoes&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;Volcanoes&gt;</strong>
	&lt;volcanoCode&gt;...&lt;/volcanoCode&gt;
<strong>&lt;/Volcanoes&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains a list of volcano codes.</p>

		<h3>Elements</h3>
		<ul>
			<li>&lt;volcanoCode&gt;
				<ul>
					<li>Description: The CAVW number of a volcano.</li>
					<li>Type: string of at most 12 characters</li>
					<li>Number of occurrences: 1-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Fields network - Fields station -->
		<h2 class="wovomlclass"><a name="monitoringsystems_fieldsnetwork_fieldsstation" id="monitoringsystems_fieldsnetwork_fieldsstation"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_fieldsnetwork">&lt;FieldsNetwork&gt;</a> | &lt;FieldsStation&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;FieldsStation code=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
	<a href="#monitoringsystems_fieldsnetwork_fieldsstation_fieldsinstrument">&lt;FieldsInstrument&gt;...&lt;/FieldsInstrument&gt;</a>
<strong>&lt;/FieldsStation&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information such as a location, conversion from local time to UTC, and a description of the stations where fields data are collected.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of this station.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of this station (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of this station (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name of the benchmark or station given by the observatory.</li>
					<li>Type: string of at most 50 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;permInst&gt;
				<ul>
					<li>Description: A list of permanent instruments, if applicable, installed at this site.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;lat&gt; AND &lt;lon&gt;
				<ul>
					<li>Description: The latitude and longitude in decimal degrees.</li>
					<li>Type: a decimal value ranging from -90 (inclusive) to +90 (inclusive) for latitude and from -180 (inclusive) to +180 (inclusive) for longitude</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;elev&gt;
				<ul>
					<li>Description: The elevation of the land surface in meters.</li>
					<li>Type: float</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the station was set up and activated or the time this new information became valid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the station was set up and activated or the time this new information became valid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date (UTC) the station was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the station was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;diffUTC&gt;
				<ul>
					<li>Description: The time zone relative to UTC. Please enter the number of hours from GMT, using a negative sign (-) for hours before GMT and no sign for positive numbers.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;description&gt;
				<ul>
					<li>Description: A description of the station or any comments.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;FieldsInstrument&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_fieldsnetwork_fieldsstation_fieldsinstrument">&lt;FieldsInstrument&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Fields network - Fields station - Fields instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystems_fieldsnetwork_fieldsstation_fieldsinstrument" id="monitoringsystems_fieldsnetwork_fieldsstation_fieldsinstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_fieldsnetwork">&lt;FieldsNetwork&gt;</a> | <a href="#monitoringsystems_fieldsnetwork_fieldsstation">&lt;FieldsStation&gt;</a> | &lt;FieldsInstrument&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;FieldsInstrument code=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
<strong>&lt;/FieldsInstrument&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about the instruments used to collect magnetic, electric, and gravity data along with a flag to indicate if the instrument is installed permanently or is used periodically as part of a campaign.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of this instrument.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of this instrument (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of this instrument (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;permanent&gt;
				<ul>
					<li>Description: A single character field to know if the instrument is part of a permanent installation (use P for permanent) or part of a campaign (use C for campaign).</li>
					<li>Type: P, C <em>(Permanent, Campaign)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name, model, and manufacturer of the instrument or instrument package, for example magnetometers may consist of one instrument for gathering vectorial data and another for total intensity of the field.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;type&gt;
				<ul>
					<li>Description: The type of instrument(s) and the units each instrument measures.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;units&gt;
				<ul>
					<li>Description: The units the instrument measures.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;resolution&gt;
				<ul>
					<li>Description: The resolution of each individual instrument in the instrument package. Please give the instrument name and then the resolution.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;sampleRate&gt;
				<ul>
					<li>Description: The sampling rate for the instrument(s).</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;filterType&gt;
				<ul>
					<li>Description: The filter type, if applicable.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;orientation&gt;
				<ul>
					<li>Description: The orientation of the instrument, if applicable (for permanent stations only).</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;calculation&gt;
				<ul>
					<li>Description: Any processing used to convert and clean or correct the raw data collected by this instrument to the data stored in the fields data tables. Please note corrections made for atmospheric conditions, ground deformation, noise, thermal stability, and/or long term instability of the instrument(s).</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the instrument was set up and activated or the time this information became valid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the instrument was set up and activated or the time this information became valid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date (UTC) the instrument was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the instrument was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments on the instrument(s).</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Fields stations -->
		<h2 class="wovomlclass"><a name="monitoringsystems_fieldsstations" id="monitoringsystems_fieldsstations"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | &lt;FieldsStations&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;FieldsStations network=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	<a href="#monitoringsystems_fieldsstation">&lt;FieldsStation&gt;...&lt;/FieldsStation&gt;</a>
<strong>&lt;/FieldsStations&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information such as a location, conversion from local time to UTC, and a description of the stations where fields data are collected.</p>

		<h3>Attributes</h3>
		<ul>
			<li>network
				<ul>
					<li>Description: The code of the network to which these stations belong.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these stations.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these stations (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these stations (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;FieldsStation&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystemss_fieldsstation">&lt;FieldsStation&gt;</a>.</li>
					<li>Number of occurrences: 1-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Fields station -->
		<h2 class="wovomlclass"><a name="monitoringsystems_fieldsstation" id="monitoringsystems_fieldsstation"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_fieldsstations">&lt;FieldsStations&gt;</a> | &lt;FieldsStation&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;FieldsStation code=&quot;...&quot; network=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
	<a href="#monitoringsystems_fieldsstation_fieldsinstrument">&lt;FieldsInstrument&gt;...&lt;/FieldsInstrument&gt;</a>
<strong>&lt;/FieldsStation&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information such as a location, conversion from local time to UTC, and a description of the stations where fields data are collected.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>network
				<ul>
					<li>Description: The code of the network to which this station belongs.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of this station.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of this station (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of this station (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name of the benchmark or station given by the observatory.</li>
					<li>Type: string of at most 50 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;permInst&gt;
				<ul>
					<li>Description: A list of permanent instruments, if applicable, installed at this site.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;lat&gt; AND &lt;lon&gt;
				<ul>
					<li>Description: The latitude and longitude in decimal degrees.</li>
					<li>Type: a decimal value ranging from -90 (inclusive) to +90 (inclusive) for latitude and from -180 (inclusive) to +180 (inclusive) for longitude</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;elev&gt;
				<ul>
					<li>Description: The elevation of the land surface in meters.</li>
					<li>Type: float</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the station was set up and activated or the time this new information became valid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the station was set up and activated or the time this new information became valid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date (UTC) the station was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the station was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;diffUTC&gt;
				<ul>
					<li>Description: The time zone relative to UTC. Please enter the number of hours from GMT, using a negative sign (-) for hours before GMT and no sign for positive numbers.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;description&gt;
				<ul>
					<li>Description: A description of the station or any comments.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;FieldsInstrument&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_fieldsstation_fieldsinstrument">&lt;FieldsInstrument&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Fields station - Fields instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystems_fieldsstation_fieldsinstrument" id="monitoringsystems_fieldsstation_fieldsinstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_fieldsstations">&lt;FieldsStations&gt;</a> | <a href="#monitoringsystems_fieldsnetwork_fieldsstation">&lt;FieldsStation&gt;</a> | &lt;FieldsInstrument&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;FieldsInstrument code=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
<strong>&lt;/FieldsInstrument&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about the instruments used to collect magnetic, electric, and gravity data along with a flag to indicate if the instrument is installed permanently or is used periodically as part of a campaign.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of this instrument.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of this instrument (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of this instrument (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name, model, and manufacturer of the instrument or instrument package, for example magnetometers may consist of one instrument for gathering vectorial data and another for total intensity of the field.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;type&gt;
				<ul>
					<li>Description: The type of instrument(s) and the units each instrument measures.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;units&gt;
				<ul>
					<li>Description: The units the instrument measures.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;resolution&gt;
				<ul>
					<li>Description: The resolution of each individual instrument in the instrument package. Please give the instrument name and then the resolution.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;sampleRate&gt;
				<ul>
					<li>Description: The sampling rate for the instrument(s).</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;filterType&gt;
				<ul>
					<li>Description: The filter type, if applicable.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;orientation&gt;
				<ul>
					<li>Description: The orientation of the instrument, if applicable (for permanent stations only).</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;calculation&gt;
				<ul>
					<li>Description: Any processing used to convert and clean or correct the raw data collected by this instrument to the data stored in the fields data tables. Please note corrections made for atmospheric conditions, ground deformation, noise, thermal stability, and/or long term instability of the instrument(s).</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the instrument was set up and activated or the time this information became valid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the instrument was set up and activated or the time this information became valid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date (UTC) the instrument was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the instrument was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments on the instrument(s).</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Fields instruments -->
		<h2 class="wovomlclass"><a name="monitoringsystems_fieldsinstruments" id="monitoringsystems_fieldsinstruments"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | &lt;FieldsInstruments&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;FieldsInstruments station=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	<a href="#monitoringsystems_fieldsinstrument">&lt;FieldsInstrument&gt;...&lt;/FieldsInstrument&gt;</a>
<strong>&lt;/FieldsInstruments&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about the instruments used to collect magnetic, electric, and gravity data along with a flag to indicate if the instrument is installed permanently or is used periodically as part of a campaign.</p>

		<h3>Attributes</h3>
		<ul>
			<li>station
				<ul>
					<li>Description: The code of the station to which these instruments belong.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these instruments.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these instruments (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these instruments (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;FieldsInstrument&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_fieldsinstrument">&lt;FieldsInstrument&gt;</a>.</li>
					<li>Number of occurrences: 1-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Fields instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystems_fieldsinstrument" id="monitoringsystems_fieldsinstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_fieldsinstruments">&lt;FieldsInstruments&gt;</a> | &lt;FieldsInstrument&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;FieldsInstrument code=&quot;...&quot; station=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
<strong>&lt;/FieldsInstrument&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about the instruments used to collect magnetic, electric, and gravity data along with a flag to indicate if the instrument is installed permanently or is used periodically as part of a campaign.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>station
				<ul>
					<li>Description: The code of the station where this instrument is installed.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of this instrument.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of this instrument (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of this instrument (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name, model, and manufacturer of the instrument or instrument package, for example magnetometers may consist of one instrument for gathering vectorial data and another for total intensity of the field.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;type&gt;
				<ul>
					<li>Description: The type of instrument(s) and the units each instrument measures.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;units&gt;
				<ul>
					<li>Description: The units the instrument measures.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;resolution&gt;
				<ul>
					<li>Description: The resolution of each individual instrument in the instrument package. Please give the instrument name and then the resolution.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;sampleRate&gt;
				<ul>
					<li>Description: The sampling rate for the instrument(s).</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;filterType&gt;
				<ul>
					<li>Description: The filter type, if applicable.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;orientation&gt;
				<ul>
					<li>Description: The orientation of the instrument, if applicable (for permanent stations only).</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;calculation&gt;
				<ul>
					<li>Description: Any processing used to convert and clean or correct the raw data collected by this instrument to the data stored in the fields data tables. Please note corrections made for atmospheric conditions, ground deformation, noise, thermal stability, and/or long term instability of the instrument(s).</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the instrument was set up and activated or the time this information became valid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the instrument was set up and activated or the time this information became valid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date (UTC) the instrument was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the instrument was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments on the instrument(s).</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Thermal network -->
		<h2 class="wovomlclass"><a name="monitoringsystems_thermalnetwork" id="monitoringsystems_thermalnetwork"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | &lt;ThermalNetwork&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;ThermalNetwork code=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	<a href="#monitoringsystems_thermalnetwork_volcanoes">&lt;Volcanoes&gt;...&lt;/Volcanoes&gt;</a>
	&lt;name&gt;...&lt;/name&gt;
	&lt;area&gt;...&lt;/area&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;diffUTC&gt;...&lt;/diffUTC&gt;
	&lt;comments&gt;...&lt;/comments&gt;
	<a href="#monitoringsystems_thermalnetwork_thermalstation">&lt;ThermalStation&gt;...&lt;/ThermalStation&gt;</a>
<strong>&lt;/ThermalNetwork&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about the network of stations that collect thermal data at a particular site, in general at one volcano.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of this network.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of this network (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of this network (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;Volcanoes&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_thermalnetwork_volcanoes">&lt;Volcanoes&gt;</a>.</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name of the network.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;area&gt;
				<ul>
					<li>Description: The volcano and approximate area in km<sup>2</sup> covered by the network.</li>
					<li>Type: float</li>
					<li>Unit: km<sup>2</sup></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;description&gt;
				<ul>
					<li>Description: A description of the network including permanent stations and types of instruments.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the network was set up and activated in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the network was set up and activated.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date the network was permanently decommissioned or the time this set of information became invalid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the network was permanently decommissioned or the time this set of information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;diffUTC&gt;
				<ul>
					<li>Description: Time zone relative to UTC. Please enter the number of hours from GMT, using a negative sign (-) for hours before GMT and no sign for positive numbers.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments about the network including minor updates to the network over time and future plans.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;ThermalStation&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_thermalnetwork_thermalstation">&lt;ThermalStation&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Thermal network - Volcanoes -->
		<h2 class="wovomlclass"><a name="monitoringsystems_thermalnetwork_volcanoes" id="monitoringsystems_thermalnetwork_volcanoes"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_thermalnetwork">&lt;ThermalNetwork&gt;</a> | &lt;Volcanoes&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;Volcanoes&gt;</strong>
	&lt;volcanoCode&gt;...&lt;/volcanoCode&gt;
<strong>&lt;/Volcanoes&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains a list of volcano codes.</p>

		<h3>Elements</h3>
		<ul>
			<li>&lt;volcanoCode&gt;
				<ul>
					<li>Description: The CAVW number of a volcano.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 1-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Thermal network - Thermal station -->
		<h2 class="wovomlclass"><a name="monitoringsystems_thermalnetwork_thermalstation" id="monitoringsystems_thermalnetwork_thermalstation"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_thermalnetwork">&lt;ThermalNetwork&gt;</a> | &lt;ThermalStation&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;ThermalStation code=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
	<a href="#monitoringsystems_thermalnetwork_thermalstation_thermalinstrument">&lt;ThermalInstrument&gt;...&lt;/ThermalInstrument&gt;</a>
<strong>&lt;/ThermalStation&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information such as a location, name, and a description for stations where thermal data are collected.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of this station.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of this station (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of this station (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name of the benchmark or station.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;thermalFeatType&gt;
				<ul>
					<li>Description: The type of thermal feature at the site (soil, fumarole, surface or crack in a dome, spring, crater lake, etc.) or if the station is used to collect remote image data.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;groundType&gt;
				<ul>
					<li>Description: The soil or ground type.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;permInst&gt;
				<ul>
					<li>Description: A list of permanent instruments, if applicable, installed at this site.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;lat&gt; AND &lt;lon&gt;
				<ul>
					<li>Description: The latitude and longitude in decimal degrees.</li>
					<li>Type: a decimal value ranging from -90 (inclusive) to +90 (inclusive) for latitude and from -180 (inclusive) to +180 (inclusive) for longitude</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;elev&gt;
				<ul>
					<li>Description: The nominal elevation of the station in meters.</li>
					<li>Type: float</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the station was set up and activated or the time this new information became valid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the station was set up and activated or the time this new information became valid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date (UTC) the station was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the station was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;diffUTC&gt;
				<ul>
					<li>Description: The time zone relative to UTC. Please enter the number of hours from GMT, using a negative sign (-) for hours before GMT and no sign for positive numbers.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;description&gt;
				<ul>
					<li>Description: A description of the station or comments.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;ThermalInstrument&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_thermalnetwork_thermalstation_thermalinstrument">&lt;ThermalInstrument&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Thermal network - Thermal station - Thermal instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystems_thermalnetwork_thermalstation_thermalinstrument" id="monitoringsystems_thermalnetwork_thermalstation_thermalinstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_thermalnetwork">&lt;ThermalNetwork&gt;</a> | <a href="#monitoringsystems_thermalnetwork_thermalstation">&lt;ThermalStation&gt;</a> | &lt;ThermalInstrument&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;ThermalInstrument code=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
<strong>&lt;/ThermalInstrument&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about the instruments used to collect ground-based and remote thermal data.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of this instrument.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of this instrument (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of this instrument (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name, model, and manufacturer of the instrument.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;type&gt;
				<ul>
					<li>Description: The type of instrument.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;units&gt;
				<ul>
					<li>Description: The units the instrument measures.</li>
					<li>Type: string of at most 50 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;resolution&gt;
				<ul>
					<li>Description: Typical instrumental measuring precision.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;signalToNoise&gt;
				<ul>
					<li>Description: An instrument specific signal to noise ratio.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the instrument was set up and activated or the time this information became valid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the instrument was set up and activated or the time this information became valid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date (UTC) the instrument was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the instrument was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments on the instrument.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Thermal stations -->
		<h2 class="wovomlclass"><a name="monitoringsystems_thermalstations" id="monitoringsystems_thermalstations"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | &lt;ThermalStations&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;ThermalStations network=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	<a href="#monitoringsystems_thermalstation">&lt;ThermalStation&gt;...&lt;/ThermalStation&gt;</a>
<strong>&lt;/ThermalStations&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information such as a location, name, and a description for stations where thermal data are collected.</p>

		<h3>Attributes</h3>
		<ul>
			<li>network
				<ul>
					<li>Description: The code of the network to which these stations belong.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these stations.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these stations (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these stations (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;ThermalStation&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_thermalstation">&lt;ThermalStation&gt;</a>.</li>
					<li>Number of occurrences: 1-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Thermal station -->
		<h2 class="wovomlclass"><a name="monitoringsystems_thermalstation" id="monitoringsystems_thermalstation"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_thermalstations">&lt;ThermalStations&gt;</a> | &lt;ThermalStation&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;ThermalStation code=&quot;...&quot; network=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
	<a href="#monitoringsystems_thermalstation_thermalinstrument">&lt;ThermalInstrument&gt;...&lt;/ThermalInstrument&gt;</a>
<strong>&lt;/ThermalStation&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information such as a location, name, and a description for stations where thermal data are collected.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>network
				<ul>
					<li>Description: The code of the network to which this station belongs.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of this station.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of this station (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of this station (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name of the benchmark or station.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;thermalFeatType&gt;
				<ul>
					<li>Description: The type of thermal feature at the site (soil, fumarole, surface or crack in a dome, spring, crater lake, etc.) or if the station is used to collect remote image data.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;groundType&gt;
				<ul>
					<li>Description: The soil or ground type.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;permInst&gt;
				<ul>
					<li>Description: A list of permanent instruments, if applicable, installed at this site.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;lat&gt; AND &lt;lon&gt;
				<ul>
					<li>Description: The latitude and longitude in decimal degrees.</li>
					<li>Type: a decimal value ranging from -90 (inclusive) to +90 (inclusive) for latitude and from -180 (inclusive) to +180 (inclusive) for longitude</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;elev&gt;
				<ul>
					<li>Description: The nominal elevation of the station in meters.</li>
					<li>Type: float</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the station was set up and activated or the time this new information became valid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the station was set up and activated or the time this new information became valid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date (UTC) the station was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the station was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;diffUTC&gt;
				<ul>
					<li>Description: The time zone relative to UTC. Please enter the number of hours from GMT, using a negative sign (-) for hours before GMT and no sign for positive numbers.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;description&gt;
				<ul>
					<li>Description: A description of the station or comments.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;ThermalInstrument&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_thermalstation_thermalinstrument">&lt;ThermalInstrument&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Thermal station - Thermal instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystems_thermalstation_thermalinstrument" id="monitoringsystems_thermalstation_thermalinstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_thermalstations">&lt;ThermalStations&gt;</a> | <a href="#monitoringsystems_thermalstation">&lt;ThermalStation&gt;</a> | &lt;ThermalInstrument&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;ThermalInstrument code=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
<strong>&lt;/ThermalInstrument&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about the instruments used to collect ground-based and remote thermal data.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of this station.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of this station (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of this station (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name, model, and manufacturer of the instrument.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;type&gt;
				<ul>
					<li>Description: The type of instrument.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;units&gt;
				<ul>
					<li>Description: The units the instrument measures.</li>
					<li>Type: string of at most 50 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;resolution&gt;
				<ul>
					<li>Description: Typical instrumental measuring precision.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;signalToNoise&gt;
				<ul>
					<li>Description: An instrument specific signal to noise ratio.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the instrument was set up and activated or the time this information became valid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the instrument was set up and activated or the time this information became valid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date (UTC) the instrument was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the instrument was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments on the instrument.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Thermal instruments -->
		<h2 class="wovomlclass"><a name="monitoringsystems_thermalinstruments" id="monitoringsystems_thermalinstruments"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | &lt;ThermalInstruments&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;ThermalInstruments station=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	<a href="#monitoringsystems_thermalinstrument">&lt;ThermalInstrument&gt;...&lt;/ThermalInstrument&gt;</a>
<strong>&lt;/ThermalInstruments&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about the instruments used to collect ground-based and remote thermal data.</p>

		<h3>Attributes</h3>
		<ul>
			<li>station
				<ul>
					<li>Description: The code of the station to which these instruments belong.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these instruments.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these instruments (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these instruments (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;ThermalInstrument&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_thermalinstrument">&lt;ThermalInstrument&gt;</a>.</li>
					<li>Number of occurrences: 1-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Thermal instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystems_thermalinstrument" id="monitoringsystems_thermalinstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_thermalinstruments">&lt;ThermalInstruments&gt;</a> | &lt;ThermalInstrument&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;ThermalInstrument code=&quot;...&quot; station=&quot;...&quot; airplane=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
<strong>&lt;/ThermalInstrument&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about the instruments used to collect ground-based and remote thermal data.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>station
				<ul>
					<li>Description: The code of the station where this instrument is installed.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>airplane
				<ul>
					<li>Description: The code of the airplane where this instrument is installed.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of this instrument.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of this instrument (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of this instrument (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name, model, and manufacturer of the instrument.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;type&gt;
				<ul>
					<li>Description: The type of instrument.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;units&gt;
				<ul>
					<li>Description: The units the instrument measures.</li>
					<li>Type: string of at most 50 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;resolution&gt;
				<ul>
					<li>Description: Typical instrumental measuring precision.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;signalToNoise&gt;
				<ul>
					<li>Description: An instrument specific signal to noise ratio.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the instrument was set up and activated or the time this information became valid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the instrument was set up and activated or the time this information became valid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date (UTC) the instrument was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the instrument was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments on the instrument.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Seismic network -->
		<h2 class="wovomlclass"><a name="monitoringsystems_seismicnetwork" id="monitoringsystems_seismicnetwork"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | &lt;SeismicNetwork&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;SeismicNetwork code=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	<a href="#monitoringsystems_seismicnetwork_volcanoes">&lt;Volcanoes&gt;...&lt;/Volcanoes&gt;</a>
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
	<a href="#monitoringsystems_seismicnetwork_seismicstation">&lt;SeismicStation&gt;...&lt;/SeismicStation&gt;</a>
<strong>&lt;/SeismicNetwork&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about the seismic network such as the velocity model used for computing the event locations and a general overview of the types of instruments used.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of this network.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of this network (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of this network (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;Volcanoes&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_seismicnetwork_volcanoes">&lt;Volcanoes&gt;</a>.</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name of the network given by the observatory.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;description&gt;
				<ul>
					<li>Description: Additional description of the network that should include azimuthal coverage, how the data are relayed, status information and any other descriptive information that could be helpful.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;velocityModel&gt;
				<ul>
					<li>Description: A description the velocity model if it is a simple 2D model.</li>
					<li>Type: string of at most 511 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;zeroDepth&gt;
				<ul>
					<li>Description: The elevation of the zero km "depth", in meters above sea level. For some networks the zero km value will be sea level whereas other networks use a local base level or average elevation of stations in the network. Please also describe what negative depths mean, if applicable.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;fixedDepth&gt;
				<ul>
					<li>Description: A flag whether depths data are held fixed.</li>
					<li>Type: Y, N, U <em>(Yes, No, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;fixedDepthDesc&gt;
				<ul>
					<li>Description: A description of whether and how depths data are held fixed by the location algorithm.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;numberOfSeismo&gt;
				<ul>
					<li>Description: The number of permanent seismometers in the network.</li>
					<li>Type: integer number</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;numberOfBBSeismo&gt;
				<ul>
					<li>Description: The number of broadband seismometers in network (corner period &gt;10 s).</li>
					<li>Type: integer number</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;numberOfSMPSeismo&gt;
				<ul>
					<li>Description: The number of short- and mid-period seismometers in network (corner period &lt;10 s).</li>
					<li>Type: integer number</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;numberOfDigiSeismo&gt;
				<ul>
					<li>Description: The number of digital seismometers in the network (not including analog seismometers whose signal is later converted to digital).</li>
					<li>Type: integer number</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;numberOfAnaSeismo&gt;
				<ul>
					<li>Description: The number of analog seismometers including those whose signal is later converted to digital.</li>
					<li>Type: integer number</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;numberOf3CompSeismo&gt;
				<ul>
					<li>Description: The number of 3-component seismometers in the network.</li>
					<li>Type: integer number</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;numberOfMicro&gt;
				<ul>
					<li>Description: The number of microphones in the network (for recording air waves, acoustic signals).</li>
					<li>Type: integer number</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the network was set up and activated or the time this information became valid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the network was set up and activated or the time this information became valid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date the network was permanently decommissioned or the time this set of information became invalid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the network was permanently decommissioned or the time this set of information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;diffUTC&gt;
				<ul>
					<li>Description: Time zone relative to UTC. Please enter the number of hours from GMT, using a negative sign (-) for hours before GMT and no sign for positive numbers.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;SeismicStation&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_seismicnetwork_seismicstation">&lt;SeismicStation&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Seismic network - Volcanoes -->
		<h2 class="wovomlclass"><a name="monitoringsystems_seismicnetwork_volcanoes" id="monitoringsystems_seismicnetwork_volcanoes"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_seismicnetwork">&lt;SeismicNetwork&gt;</a> | &lt;Volcanoes&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;Volcanoes&gt;</strong>
	&lt;volcanoCode&gt;...&lt;/volcanoCode&gt;
<strong>&lt;/Volcanoes&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains a list of volcano codes.</p>

		<h3>Elements</h3>
		<ul>
			<li>&lt;volcanoCode&gt;
				<ul>
					<li>Description: The CAVW number of a volcano.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 1-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Seismic network - Seismic station -->
		<h2 class="wovomlclass"><a name="monitoringsystems_seismicnetwork_seismicstation" id="monitoringsystems_seismicnetwork_seismicstation"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_seismicnetwork">&lt;SeismicNetwork&gt;</a> | &lt;SeismicStation&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;SeismicStation code=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
	<a href="#monitoringsystems_seismicnetwork_seismicstation_seismicinstrument">&lt;SeismicInstrument&gt;...&lt;/SeismicInstrument&gt;</a>
<strong>&lt;/SeismicStation&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information such as a location, name, system gain, and comments about the stations where the data are collected.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of this station.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of this station (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of this station (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name of the station given by the observatory.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;description&gt;
				<ul>
					<li>Description: A description of the station including the type of material it is set in, any issues with the installation and/or function, how the data are relayed, and any additional descriptive information.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments about the station including information about status.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;instDepth&gt;
				<ul>
					<li>Description: The depth of the instrument in meters below the elevation of station. If there are multiple components at different depths, please give a list of depths.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;instType&gt;
				<ul>
					<li>Description: The type(s) of instruments installed at this station.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;systemGain&gt;
				<ul>
					<li>Description: Total gain from seismometer, telemetry, and recorder.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;lat&gt; AND &lt;lon&gt;
				<ul>
					<li>Description: The latitude and longitude in decimal degrees.</li>
					<li>Type: a decimal value ranging from -90 (inclusive) to +90 (inclusive) for latitude and from -180 (inclusive) to +180 (inclusive) for longitude</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;elev&gt;
				<ul>
					<li>Description: The elevation of the land surface in meters above sea level.</li>
					<li>Type: float</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the station was set up and activated or the time this information became valid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the station was set up and activated or the time this information became valid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date (UTC) the station was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the station was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;diffUTC&gt;
				<ul>
					<li>Description: The time zone relative to UTC. Please enter the number of hours from GMT, using a negative sign (-) for hours before GMT and no sign for positive numbers.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;SeismicInstrument&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_seismicnetwork_seismicstation_seismicinstrument">&lt;SeismicInstrument&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Seismic network - Seismic station - Seismic instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystems_seismicnetwork_seismicstation_seismicinstrument" id="monitoringsystems_seismicnetwork_seismicstation_seismicinstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_seismicnetwork">&lt;SeismicNetwork&gt;</a> | <a href="#monitoringsystems_seismicnetwork_seismicstation">&lt;SeismicStation&gt;</a> | &lt;SeismicInstrument&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;SeismicInstrument code=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
	<a href="#monitoringsystems_seismicnetwork_seismicstation_seismicinstrument_seismiccomponent">&lt;SeismicComponent&gt;...&lt;/SeismicComponent&gt;</a>
<strong>&lt;/SeismicInstrument&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information such as the seismic instrument name, model, number of components and response time.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of this instrument.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of this instrument (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of this instrument (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name, model, and manufacturer of the instrument (recorder).</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;type&gt;
				<ul>
					<li>Description: The type of instrument. This field should include if the instrument is analog or digital.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments on the instrument.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;dynamicRange&gt;
				<ul>
					<li>Description: The dynamic range of the instrument, please provide the units.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;gain&gt;
				<ul>
					<li>Description: The instrument gain.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;filters&gt;
				<ul>
					<li>Description: Information about filters if they have been applied.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;numberOfComp&gt;
				<ul>
					<li>Description: The number of components.</li>
					<li>Type: integer number</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;respOverview&gt;
				<ul>
					<li>Description: An overview of the response for the instrument (poles and zeros).</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the instrument was set up and activated or the time this information became valid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the instrument was set up and activated or the time this information became valid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date (UTC) the instrument was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the instrument was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;SeismicComponent&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_seismicnetwork_seismicstation_seismicinstrument_seismiccomponent">&lt;SeismicComponent&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Seismic network - Seismic station - Seismic instrument - Seismic component -->
		<h2 class="wovomlclass"><a name="monitoringsystems_seismicnetwork_seismicstation_seismicinstrument_seismiccomponent" id="monitoringsystems_seismicnetwork_seismicstation_seismicinstrument_seismiccomponent"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_seismicnetwork">&lt;SeismicNetwork&gt;</a> | <a href="#monitoringsystems_seismicnetwork_seismicstation">&lt;SeismicStation&gt;</a> | <a href="#monitoringsystems_seismicnetwork_seismicstation_seismicinstrument">&lt;SeismicInstrument&gt;</a> | &lt;SeismicComponent&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;SeismicComponent code=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
<strong>&lt;/SeismicComponent&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about an individual component (geophone) that sends data to the instrument or recorder such as the component name, model, orientation, band type, and sampling rate.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of this component.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of this component (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of this component (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name of the component given by the observatory, if applicable.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;type&gt;
				<ul>
					<li>Description: The type of geophone.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments on the component.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;respDesc&gt;
				<ul>
					<li>Description: A description of the response of the component.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;sampleRate&gt;
				<ul>
					<li>Description: The sample rate for the component, in Hz.</li>
					<li>Type: float</li>
					<li>Unit: Hz</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;seedBandCode&gt;
				<ul>
					<li>Description: The band type for this component. Please follow the SEED convention for Band Code (S, B, V, etc).</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;seedInstCode&gt;
				<ul>
					<li>Description: The instrument code for this component. Please follow the SEED convention for Instrument Code.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;seedOrientCode&gt;
				<ul>
					<li>Description: The orientation code for this component. Please follow the SEED convention for Instrument Code (Z, N, E, A, B C, etc).</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;sensitivity&gt;
				<ul>
					<li>Description: The sensitivity of the component, please include the units.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;depth&gt;
				<ul>
					<li>Description: The depth of the component in meters.</li>
					<li>Type: float</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the component was set up and activated or the time this information became valid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the component was set up and activated or the time this information became valid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date (UTC) the component was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the component was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Seismic stations -->
		<h2 class="wovomlclass"><a name="monitoringsystems_seismicstations" id="monitoringsystems_seismicstations"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | &lt;SeismicStations&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;SeismicStations network=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	<a href="#monitoringsystems_seismicstation">&lt;SeismicStation&gt;...&lt;/SeismicStation&gt;</a>
<strong>&lt;/SeismicStations&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information such as a location, name, system gain, and comments about the stations where the data are collected.</p>

		<h3>Attributes</h3>
		<ul>
			<li>network
				<ul>
					<li>Description: The code of the network to which these stations belong.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these stations.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these stations (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these stations (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;SeismicStation&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_seismicstation">&lt;SeismicStation&gt;</a>.</li>
					<li>Number of occurrences: 1-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Seismic station -->
		<h2 class="wovomlclass"><a name="monitoringsystems_seismicstation" id="monitoringsystems_seismicstation"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_seismicstations">&lt;SeismicStations&gt;</a> | &lt;SeismicStation&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;SeismicStation code=&quot;...&quot; network=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
	<a href="#monitoringsystems_seismicstation_seismicinstrument">&lt;SeismicInstrument&gt;...&lt;/SeismicInstrument&gt;</a>
<strong>&lt;/SeismicStation&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information such as a location, name, system gain, and comments about the stations where the data are collected.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>network
				<ul>
					<li>Description: The code of the network to which this station belongs.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of this station.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of this station (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of this station (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;networkCode&gt;
				<ul>
					<li>Description: The code of the network to which this station belongs.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name of the station given by the observatory.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;description&gt;
				<ul>
					<li>Description: A description of the station including the type of material it is set in, any issues with the installation and/or function, how the data are relayed, and any additional descriptive information.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments about the station including information about status.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;instDepth&gt;
				<ul>
					<li>Description: The depth of the instrument in meters below the elevation of station. If there are multiple components at different depths, please give a list of depths.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;instType&gt;
				<ul>
					<li>Description: The type(s) of instruments installed at this station.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;systemGain&gt;
				<ul>
					<li>Description: Total gain from seismometer, telemetry, and recorder.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;lat&gt; AND &lt;lon&gt;
				<ul>
					<li>Description: The latitude and longitude in decimal degrees.</li>
					<li>Type: a decimal value ranging from -90 (inclusive) to +90 (inclusive) for latitude and from -180 (inclusive) to +180 (inclusive) for longitude</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;elev&gt;
				<ul>
					<li>Description: The elevation of the land surface in meters above sea level.</li>
					<li>Type: float</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the station was set up and activated or the time this information became valid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the station was set up and activated or the time this information became valid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date (UTC) the station was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the station was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;diffUTC&gt;
				<ul>
					<li>Description: The time zone relative to UTC. Please enter the number of hours from GMT, using a negative sign (-) for hours before GMT and no sign for positive numbers.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;SeismicInstrument&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_seismicstation_seismicinstrument">&lt;SeismicInstrument&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Seismic station - Seismic instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystems_seismicstation_seismicinstrument" id="monitoringsystems_seismicstation_seismicinstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_seismicstations">&lt;SeismicStations&gt;</a> | <a href="#monitoringsystems_seismicstation">&lt;SeismicStation&gt;</a> | &lt;SeismicInstrument&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;SeismicInstrument code=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
	<a href="#monitoringsystems_seismicstation_seismicinstrument_seismiccomponent">&lt;SeismicComponent&gt;...&lt;/SeismicComponent&gt;</a>
<strong>&lt;/SeismicInstrument&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information such as the seismic instrument name, model, number of components and response time.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of this instrument.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of this instrument (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of this instrument (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name, model, and manufacturer of the instrument (recorder).</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;type&gt;
				<ul>
					<li>Description: The type of instrument. This field should include if the instrument is analog or digital.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments on the instrument.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;dynamicRange&gt;
				<ul>
					<li>Description: The dynamic range of the instrument, please provide the units.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;gain&gt;
				<ul>
					<li>Description: The instrument gain.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;filters&gt;
				<ul>
					<li>Description: Information about filters if they have been applied.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;numberOfComp&gt;
				<ul>
					<li>Description: The number of components.</li>
					<li>Type: integer number</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;respOverview&gt;
				<ul>
					<li>Description: An overview of the response for the instrument (poles and zeros).</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the instrument was set up and activated or the time this information became valid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the instrument was set up and activated or the time this information became valid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date (UTC) the instrument was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the instrument was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;SeismicComponent&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_seismicstation_seismicinstrument_seismiccomponent">&lt;SeismicComponent&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Seismic station - Seismic instrument - Seismic component -->
		<h2 class="wovomlclass"><a name="monitoringsystems_seismicstation_seismicinstrument_seismiccomponent" id="monitoringsystems_seismicstation_seismicinstrument_seismiccomponent"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_seismicstations">&lt;SeismicStations&gt;</a> | <a href="#monitoringsystems_seismicstation">&lt;SeismicStation&gt;</a> | <a href="#monitoringsystems_seismicstation_seismicinstrument">&lt;SeismicInstrument&gt;</a> | &lt;SeismicComponent&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;SeismicComponent code=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
<strong>&lt;/SeismicComponent&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about an individual component (geophone) that sends data to the instrument or recorder such as the component name, model, orientation, band type, and sampling rate.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of this component.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of this component (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of this component (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name of the component given by the observatory, if applicable.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;type&gt;
				<ul>
					<li>Description: The type of geophone.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments on the component.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;respDesc&gt;
				<ul>
					<li>Description: A description of the response of the component.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;sampleRate&gt;
				<ul>
					<li>Description: The sample rate for the component, in Hz.</li>
					<li>Type: float</li>
					<li>Unit: Hz</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;seedBandCode&gt;
				<ul>
					<li>Description: The band type for this component. Please follow the SEED convention for Band Code (S, B, V, etc).</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;seedInstCode&gt;
				<ul>
					<li>Description: The instrument code for this component. Please follow the SEED convention for Instrument Code.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;seedOrientCode&gt;
				<ul>
					<li>Description: The orientation code for this component. Please follow the SEED convention for Instrument Code (Z, N, E, A, B C, etc).</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;sensitivity&gt;
				<ul>
					<li>Description: The sensitivity of the component, please include the units.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;depth&gt;
				<ul>
					<li>Description: The depth of the component in meters.</li>
					<li>Type: float</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the component was set up and activated or the time this information became valid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the component was set up and activated or the time this information became valid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date (UTC) the component was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the component was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Seismic instruments -->
		<h2 class="wovomlclass"><a name="monitoringsystems_seismicinstruments" id="monitoringsystems_seismicinstruments"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | &lt;SeismicInstruments&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;SeismicInstruments station=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	<a href="#monitoringsystems_seismicinstrument">&lt;SeismicInstrument&gt;...&lt;/SeismicInstrument&gt;</a>
<strong>&lt;/SeismicInstruments&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information such as the seismic instrument name, model, number of components and response time.</p>

		<h3>Attributes</h3>
		<ul>
			<li>station
				<ul>
					<li>Description: The code of the station to which these instruments belong.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these instruments.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these instruments (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these instruments (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;SeismicInstrument&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_seismicinstrument">&lt;SeismicInstrument&gt;</a>.</li>
					<li>Number of occurrences: 1-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Seismic instrument -->
		<h2 class="wovomlclass"><a name="monitoringsystems_seismicinstrument" id="monitoringsystems_seismicinstrument"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_seismicinstruments">&lt;SeismicInstruments&gt;</a> | &lt;SeismicInstrument&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;SeismicInstrument code=&quot;...&quot; station=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
	<a href="#monitoringsystems_seismicinstrument_seismiccomponent">&lt;SeismicComponent&gt;...&lt;/SeismicComponent&gt;</a>
<strong>&lt;/SeismicInstrument&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information such as the seismic instrument name, model, number of components and response time.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>station
				<ul>
					<li>Description: The code of the station where this instrument is installed.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of this instrument.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of this instrument (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of this instrument (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name, model, and manufacturer of the instrument (recorder).</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;type&gt;
				<ul>
					<li>Description: The type of instrument. This field should include if the instrument is analog or digital.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments on the instrument.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;dynamicRange&gt;
				<ul>
					<li>Description: The dynamic range of the instrument, please provide the units.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;gain&gt;
				<ul>
					<li>Description: The instrument gain.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;filters&gt;
				<ul>
					<li>Description: Information about filters if they have been applied.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;numberOfComp&gt;
				<ul>
					<li>Description: The number of components.</li>
					<li>Type: integer number</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;respOverview&gt;
				<ul>
					<li>Description: An overview of the response for the instrument (poles and zeros).</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the instrument was set up and activated or the time this information became valid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the instrument was set up and activated or the time this information became valid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date (UTC) the instrument was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the instrument was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;SeismicComponent&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_seismicinstrument_seismiccomponent">&lt;SeismicComponent&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Seismic instrument - Seismic component -->
		<h2 class="wovomlclass"><a name="monitoringsystems_seismicinstrument_seismiccomponent" id="monitoringsystems_seismicinstrument_seismiccomponent"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_seismicinstruments">&lt;SeismicInstruments&gt;</a> | <a href="#monitoringsystems_seismicinstrument">&lt;SeismicInstrument&gt;</a> | &lt;SeismicComponent&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;SeismicComponent code=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
<strong>&lt;/SeismicComponent&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about an individual component (geophone) that sends data to the instrument or recorder such as the component name, model, orientation, band type, and sampling rate.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of this component.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of this component (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of this component (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name of the component given by the observatory, if applicable.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;type&gt;
				<ul>
					<li>Description: The type of geophone.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments on the component.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;respDesc&gt;
				<ul>
					<li>Description: A description of the response of the component.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;sampleRate&gt;
				<ul>
					<li>Description: The sample rate for the component, in Hz.</li>
					<li>Type: float</li>
					<li>Unit: Hz</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;seedBandCode&gt;
				<ul>
					<li>Description: The band type for this component. Please follow the SEED convention for Band Code (S, B, V, etc).</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;seedInstCode&gt;
				<ul>
					<li>Description: The instrument code for this component. Please follow the SEED convention for Instrument Code.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;seedOrientCode&gt;
				<ul>
					<li>Description: The orientation code for this component. Please follow the SEED convention for Instrument Code (Z, N, E, A, B C, etc).</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;sensitivity&gt;
				<ul>
					<li>Description: The sensitivity of the component, please include the units.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;depth&gt;
				<ul>
					<li>Description: The depth of the component in meters.</li>
					<li>Type: float</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the component was set up and activated or the time this information became valid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the component was set up and activated or the time this information became valid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date (UTC) the component was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the component was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Seismic components -->
		<h2 class="wovomlclass"><a name="monitoringsystems_seismiccomponents" id="monitoringsystems_seismiccomponents"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | &lt;SeismicComponents&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;SeismicComponents instrument=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	<a href="#monitoringsystems_seismiccomponent">&lt;SeismicComponent&gt;...&lt;/SeismicComponent&gt;</a>
<strong>&lt;/SeismicComponents&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about components (geophones) that sends data to seismic instruments.</p>

		<h3>Attributes</h3>
		<ul>
			<li>instrument
				<ul>
					<li>Description: The code of the instrument to which these components belong.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these components.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these components (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these components (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;SeismicComponent&gt;
				<ul>
					<li>Description: See <a href="#monitoringsystems_seismiccomponent">&lt;SeismicComponent&gt;</a>.</li>
					<li>Number of occurrences: 1-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Monitoring systems - Seismic component -->
		<h2 class="wovomlclass"><a name="monitoringsystems_seismiccomponent" id="monitoringsystems_seismiccomponent"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#monitoringsystems">&lt;MonitoringSystems&gt;</a> | <a href="#monitoringsystems_seismiccomponents">&lt;SeismicComponents&gt;</a> | &lt;SeismicComponent&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;SeismicComponent code=&quot;...&quot; instrument=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
<strong>&lt;/SeismicComponent&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about an individual component (geophone) that sends data to the instrument or recorder such as the component name, model, orientation, band type, and sampling rate.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>instrument
				<ul>
					<li>Description: The code of the instrument to which this component belongs.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of this component.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of this component (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of this component (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;name&gt;
				<ul>
					<li>Description: The name of the component given by the observatory, if applicable.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;type&gt;
				<ul>
					<li>Description: The type of geophone.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments on the component.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;respDesc&gt;
				<ul>
					<li>Description: A description of the response of the component.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;sampleRate&gt;
				<ul>
					<li>Description: The sample rate for the component, in Hz.</li>
					<li>Type: float</li>
					<li>Unit: Hz</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;seedBandCode&gt;
				<ul>
					<li>Description: The band type for this component. Please follow the SEED convention for Band Code (S, B, V, etc).</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;seedInstCode&gt;
				<ul>
					<li>Description: The instrument code for this component. Please follow the SEED convention for Instrument Code.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;seedOrientCode&gt;
				<ul>
					<li>Description: The orientation code for this component. Please follow the SEED convention for Instrument Code (Z, N, E, A, B C, etc).</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;sensitivity&gt;
				<ul>
					<li>Description: The sensitivity of the component, please include the units.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;depth&gt;
				<ul>
					<li>Description: The depth of the component in meters.</li>
					<li>Type: float</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The date the component was set up and activated or the time this information became valid in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the component was set up and activated or the time this information became valid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The date (UTC) the component was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date the component was permanently decommissioned or the time this information became invalid.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data -->
		<h2 class="wovomlclass"><a name="data" id="data"></a><a href="#wovoml">&lt;wovoml&gt;</a> | &lt;Data&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;Data&gt;</strong>
	<a href="#data_deformation">&lt;Deformation&gt;...&lt;/Deformation&gt;</a>
	<a href="#data_gas">&lt;Gas&gt;...&lt;/Gas&gt;</a>
	<a href="#data_hydrologic">&lt;Hydrologic&gt;...&lt;/Hydrologic&gt;</a>
	<a href="#data_fields">&lt;Fields&gt;...&lt;/Fields&gt;</a>
	<a href="#data_thermal">&lt;Thermal&gt;...&lt;/Thermal&gt;</a>
	<a href="#data_seismic">&lt;Seismic&gt;...&lt;/Seismic&gt;</a>
<strong>&lt;/Data&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about all data for a volcano.</p>

		<h3>Elements</h3>
		<ul>
			<li>&lt;Deformation&gt;
				<ul>
					<li>Description: See <a href="#data_deformation">&lt;Deformation&gt;</a>.</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;Gas&gt;
				<ul>
					<li>Description: See <a href="#data_gas">&lt;Gas&gt;</a>.</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;Hydrologic&gt;
				<ul>
					<li>Description: See <a href="#data_hydrologic">&lt;Hydrologic&gt;</a>.</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;Fields&gt;
				<ul>
					<li>Description: See <a href="#data_fields">&lt;Fields&gt;</a>.</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;Thermal&gt;
				<ul>
					<li>Description: See <a href="#data_thermal">&lt;Thermal&gt;</a>.</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;Seismic&gt;
				<ul>
					<li>Description: See <a href="#data_seismic">&lt;Seismic&gt;</a>.</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Deformation -->
		<h2 class="wovomlclass"><a name="data_deformation" id="data_deformation"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | &lt;Deformation&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;Deformation&gt;</strong>
	<a href="#data_deformation_electronictiltds">&lt;ElectronicTiltDataset&gt;...&lt;/ElectronicTiltDataset&gt;</a>
	<a href="#data_deformation_tiltvectords">&lt;TiltVectorDataset&gt;...&lt;/TiltVectorDataset&gt;</a>
	<a href="#data_deformation_strainds">&lt;StrainDataset&gt;...&lt;/StrainDataset&gt;</a>
	<a href="#data_deformation_edmds">&lt;EDMDataset&gt;...&lt;/EDMDataset&gt;</a>
	<a href="#data_deformation_angleds">&lt;AngleDataset&gt;...&lt;/AngleDataset&gt;</a>
	<a href="#data_deformation_gpsds">&lt;GPSDataset&gt;...&lt;/GPSDataset&gt;</a>
	<a href="#data_deformation_gpsvectords">&lt;GPSVectorDataset&gt;...&lt;/GPSVectorDataset&gt;</a>
	<a href="#data_deformation_levelingds">&lt;LevelingDataset&gt;...&lt;/LevelingDataset&gt;</a>
	<a href="#data_deformation_insarimageds">&lt;InSARImageDataset&gt;...&lt;/InSARImageDataset&gt;</a>
<strong>&lt;/Deformation&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about all deformation data for a volcano.</p>

		<h3>Elements</h3>
		<ul>
			<li>&lt;ElectronicTiltDataset&gt;
				<ul>
					<li>Description: See <a href="#data_deformation_electronictiltds">&lt;ElectronicTiltDataset&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;TiltVectorDataset&gt;
				<ul>
					<li>Description: See <a href="#data_deformation_tiltvectords">&lt;TiltVectorDataset&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;StrainDataset&gt;
				<ul>
					<li>Description: See <a href="#data_deformation_strainds">&lt;StrainDataset&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;EDMDataset&gt;
				<ul>
					<li>Description: See <a href="#data_deformation_edmds">&lt;EDMDataset&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;AngleDataset&gt;
				<ul>
					<li>Description: See <a href="#data_deformation_angleds">&lt;AngleDataset&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;GPSDataset&gt;
				<ul>
					<li>Description: See <a href="#data_deformation_gpsds">&lt;GPSDataset&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;GPSVectorDataset&gt;
				<ul>
					<li>Description: See <a href="#data_deformation_gpsvectords">&lt;GPSVectorDataset&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;LevelingDataset&gt;
				<ul>
					<li>Description: See <a href="#data_deformation_levelingds">&lt;LevelingDataset&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;InSARImageDataset&gt;
				<ul>
					<li>Description: See <a href="#data_deformation_insarimageds">&lt;InSARImageDataset&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Deformation - Electronic tilt dataset -->
		<h2 class="wovomlclass"><a name="data_deformation_electronictiltds" id="data_deformation_electronictiltds"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_deformation">&lt;Deformation&gt;</a> | &lt;ElectronicTiltDataset&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;ElectronicTiltDataset instrument=&quot;...&quot; station=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	<a href="#data_deformation_electronictilt">&lt;ElectronicTilt&gt;...&lt;/ElectronicTilt&gt;</a>
<strong>&lt;/ElectronicTiltDataset&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains tilt data that are either raw or processed.</p>

		<h3>Attributes</h3>
		<ul>
			<li>instrument
				<ul>
					<li>Description: The code of the instrument which recorded these data.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>station
				<ul>
					<li>Description: The code of the station where these data were recorded.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;ElectronicTilt&gt;
				<ul>
					<li>Description: See <a href="#data_deformation_electronictilt">&lt;ElectronicTilt&gt;</a>.</li>
					<li>Number of occurrences: 1-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Deformation - Electronic tilt -->
		<h2 class="wovomlclass"><a name="data_deformation_electronictilt" id="data_deformation_electronictilt"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_deformation">&lt;Deformation&gt;</a> | <a href="#data_deformation_electronictiltds">&lt;ElectronicTiltDataset&gt;</a> | &lt;ElectronicTilt&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;ElectronicTilt code=&quot;...&quot; instrument=&quot;...&quot; station=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	&lt;measTime&gt;...&lt;/measTime&gt;
	&lt;measTimeUnc&gt;...&lt;/measTimeUnc&gt;
	&lt;sampleRate&gt;...&lt;/sampleRate&gt;
	&lt;tilt1&gt;...&lt;/tilt1&gt;
	&lt;tilt1Unc&gt;...&lt;/tilt1Unc&gt;
	&lt;tilt2&gt;...&lt;/tilt2&gt;
	&lt;tilt2Unc&gt;...&lt;/tilt2Unc&gt;
	&lt;processed&gt;...&lt;/processed&gt;
<strong>&lt;/ElectronicTilt&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains tilt data that are either raw or processed.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>instrument
				<ul>
					<li>Description: The code of the instrument which recorded these data.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>station
				<ul>
					<li>Description: The code of the station where these data were recorded.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;measTime&gt;
				<ul>
					<li>Description: The measurement time in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS.SSSS* (unlimited number of digits for sub-seconds)</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;measTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the measurement time.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS.SSSS* (unlimited number of digits for sub-seconds)</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;sampleRate&gt;
				<ul>
					<li>Description: The sampling rate for these data in seconds.</li>
					<li>Type: double</li>
					<li>Unit: s</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;tilt1&gt;
				<ul>
					<li>Description: Tilt measurement 1 or x (positive is down to the north).</li>
					<li>Type: double</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;tilt1Unc&gt;
				<ul>
					<li>Description: The error from all sources (instrument, rain, diurnal heating, etc) for processed tilt 1 data or error from environmental factors only if the raw data are provided.</li>
					<li>Type: double</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;tilt2&gt;
				<ul>
					<li>Description: Tilt measurement 2 or y (positive is down to the east).</li>
					<li>Type: double</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;tilt2Unc&gt;
				<ul>
					<li>Description: The error from all sources (instrument, rain, diurnal heating, etc) for processed tilt 2 data or error from environmental factors only if the raw data are provided.</li>
					<li>Type: double</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;processed&gt;
				<ul>
					<li>Description: A single character field to indicate that these data have already been processed and do not require a link to the instrument table for conversions. Use P for processed data or R for raw data.</li>
					<li>Type: P, R <em>(Processed, Raw)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Deformation - Tilt vector dataset -->
		<h2 class="wovomlclass"><a name="data_deformation_tiltvectords" id="data_deformation_tiltvectords"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_deformation">&lt;Deformation&gt;</a> | &lt;TiltVectorDataset&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;TiltVectorDataset instrument=&quot;...&quot; station=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	<a href="#data_deformation_tiltvector">&lt;TiltVector&gt;...&lt;/TiltVector&gt;</a>
<strong>&lt;/TiltVectorDataset&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains tilt information from sources where we do not have the raw or semi-processed data and only have access to tilt vectors.</p>

		<h3>Attributes</h3>
		<ul>
			<li>instrument
				<ul>
					<li>Description: The code of the instrument which recorded these data.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>station
				<ul>
					<li>Description: The code of the station where these data were recorded.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;TiltVector&gt;
				<ul>
					<li>Description: See <a href="#data_deformation_tiltvector">&lt;TiltVector&gt;</a>.</li>
					<li>Number of occurrences: 1-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Deformation - Tilt vector -->
		<h2 class="wovomlclass"><a name="data_deformation_tiltvector" id="data_deformation_tiltvector"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_deformation">&lt;Deformation&gt;</a> | <a href="#data_deformation_tiltvectords">&lt;TiltVectorDataset&gt;</a> | &lt;TiltVector&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;TiltVector code=&quot;...&quot; instrument=&quot;...&quot; station=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;magnitude&gt;...&lt;/magnitude&gt;
	&lt;magnitudeUnc&gt;...&lt;/magnitudeUnc&gt;
	&lt;azimuth&gt;...&lt;/azimuth&gt;
	&lt;azimuthUnc&gt;...&lt;/azimuthUnc&gt;
	&lt;comments&gt;...&lt;/comments&gt;
<strong>&lt;/TiltVector&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains tilt information from sources where we do not have the raw or semi-processed data and only have access to tilt vectors.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>instrument
				<ul>
					<li>Description: The code of the instrument which recorded these data.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>station
				<ul>
					<li>Description: The code of the station where these data were recorded.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: Start time of measurement in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty of the start time of measurement.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: End time of measurement in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty of the end time of measurement.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;magnitude&gt;
				<ul>
					<li>Description: The magnitude of the tilt vector (the length) in microradians.</li>
					<li>Type: float</li>
					<li>Unit: &mu;rad</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;magnitudeUnc&gt;
				<ul>
					<li>Description: The magnitude error in microradians.</li>
					<li>Type: float</li>
					<li>Unit: &mu;rad</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;azimuth&gt;
				<ul>
					<li>Description: The azimuth of downward tilt (the direction) in degrees (0-360).</li>
					<li>Type: a decimal value ranging from 0 (inclusive) to 360 (inclusive)</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;azimuthUnc&gt;
				<ul>
					<li>Description: The azimuth error in degrees.</li>
					<li>Type: float</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments about possible artifacts and instrument details.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Deformation - Strain dataset -->
		<h2 class="wovomlclass"><a name="data_deformation_strainds" id="data_deformation_strainds"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_deformation">&lt;Deformation&gt;</a> | &lt;StrainDataset&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;StrainDataset instrument=&quot;...&quot; station=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	<a href="#data_deformation_strain">&lt;Strain&gt;...&lt;/Strain&gt;</a>
<strong>&lt;/StrainDataset&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains both raw and processed strainmeter data.</p>

		<h3>Attributes</h3>
		<ul>
			<li>instrument
				<ul>
					<li>Description: The code of the instrument which recorded these data.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>station
				<ul>
					<li>Description: The code of the station where these data were recorded.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;Strain&gt;
				<ul>
					<li>Description: See <a href="#data_deformation_strain">&lt;Strain&gt;</a>.</li>
					<li>Number of occurrences: 1-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Deformation - Strain -->
		<h2 class="wovomlclass"><a name="data_deformation_strain" id="data_deformation_strain"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_deformation">&lt;Deformation&gt;</a> | <a href="#data_deformation_strainds">&lt;StrainDataset&gt;</a> | &lt;Strain&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;Strain code=&quot;...&quot; instrument=&quot;...&quot; station=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
<strong>&lt;/Strain&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains both raw and processed strainmeter data.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>instrument
				<ul>
					<li>Description: The code of the instrument which recorded these data.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>station
				<ul>
					<li>Description: The code of the station where these data were recorded.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;measTime&gt;
				<ul>
					<li>Description: The measurement time in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;measTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the measurement time.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;component1&gt;
				<ul>
					<li>Description: The strainmeter data for component 1 in microstrain where contraction is positive and dilatation is negative.</li>
					<li>Type: double</li>
					<li>Unit: &mu;strain</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;component1Unc&gt;
				<ul>
					<li>Description: The error in measurement of component 1 in microstrain.</li>
					<li>Type: double</li>
					<li>Unit: &mu;strain</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;component2&gt;
				<ul>
					<li>Description: The strainmeter data for component 2 in microstrain where contraction is positive and dilatation is negative.</li>
					<li>Type: double</li>
					<li>Unit: &mu;strain</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;component2Unc&gt;
				<ul>
					<li>Description: The error in measurement of component 2 in microstrain.</li>
					<li>Type: double</li>
					<li>Unit: &mu;strain</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;component3&gt;
				<ul>
					<li>Description: The strainmeter data for component 3 in microstrain where contraction is positive and dilatation is negative.</li>
					<li>Type: double</li>
					<li>Unit: &mu;strain</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;component3Unc&gt;
				<ul>
					<li>Description: The error in measurement of component 3 in microstrain.</li>
					<li>Type: double</li>
					<li>Unit: &mu;strain</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;component4&gt;
				<ul>
					<li>Description: The strainmeter data for component 4 in microstrain where contraction is positive and dilatation is negative.</li>
					<li>Type: double</li>
					<li>Unit: &mu;strain</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;component4Unc&gt;
				<ul>
					<li>Description: The error in measurement of component 4 in microstrain.</li>
					<li>Type: double</li>
					<li>Unit: &mu;strain</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;volumetricStrain&gt;
				<ul>
					<li>Description: The volumetric strain in microstrain (contraction is positive and dilatation is negative).</li>
					<li>Type: double</li>
					<li>Unit: &mu;strain</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;volumetricStrainUnc&gt;
				<ul>
					<li>Description: The error associated with the volumetric strain in microstrain.</li>
					<li>Type: double</li>
					<li>Unit: &mu;strain</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;shearStrainAxis1&gt;
				<ul>
					<li>Description: The shear strain of axis 1 (gamma 1) in microstrain.</li>
					<li>Type: double</li>
					<li>Unit: &mu;strain</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;shearStrainAxis1Unc&gt;
				<ul>
					<li>Description: The uncertainty in the strain for axis 1 in microstrain.</li>
					<li>Type: double</li>
					<li>Unit: &mu;strain</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;azimuthAxis1&gt;
				<ul>
					<li>Description: Theazimuth of axis 1 (gamma 1) in degrees (0-360) measuring with respect to North with clockwise rotation as positive.</li>
					<li>Type: a decimal value ranging from 0 (inclusive) to 360 (inclusive)</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;shearStrainAxis2&gt;
				<ul>
					<li>Description: The shear strain of axis 2 (gamma 2) in microstrain.</li>
					<li>Type: double</li>
					<li>Unit: &mu;strain</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;shearStrainAxis2Unc&gt;
				<ul>
					<li>Description: The uncertainty in the strain for axis 2 in microstrain.</li>
					<li>Type: double</li>
					<li>Unit: &mu;strain</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;azimuthAxis2&gt;
				<ul>
					<li>Description: The azimuth of axis 2 (gamma 2) in degrees (0-360) measuring with respect to North with clockwise rotation as positive.</li>
					<li>Type: a decimal value ranging from 0 (inclusive) to 360 (inclusive)</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;shearStrainAxis3&gt;
				<ul>
					<li>Description: The shear strain of axis 3 (gamma 3) in microstrain (for 3D strainmeters).</li>
					<li>Type: double</li>
					<li>Unit: &mu;strain</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;shearStrainAxis3Unc&gt;
				<ul>
					<li>Description: The uncertainty in the strain for axis 3 in microstrain.</li>
					<li>Type: double</li>
					<li>Unit: &mu;strain</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;azimuthAxis3&gt;
				<ul>
					<li>Description: The azimuth of axis 3 (gamma 3) in degrees (0-360) measuring with respect to North with clockwise rotation as positive.</li>
					<li>Type: a decimal value ranging from 0 (inclusive) to 360 (inclusive)</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;minPrincipalStrain&gt;
				<ul>
					<li>Description: The minimum principal strain in microstrain.</li>
					<li>Type: double</li>
					<li>Unit: &mu;strain</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;minPrincipalStrainUnc&gt;
				<ul>
					<li>Description: The uncertainty in the minimum principal strain in microstrain.</li>
					<li>Type: double</li>
					<li>Unit: &mu;strain</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;maxPrincipalStrain&gt;
				<ul>
					<li>Description: The maximum principal strain in microstrain.</li>
					<li>Type: double</li>
					<li>Unit: &mu;strain</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;maxPrincipalStrainUnc&gt;
				<ul>
					<li>Description: The uncertainty in the maximum principal strain in microstrain.</li>
					<li>Type: double</li>
					<li>Unit: &mu;strain</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;minPrincipalStrainDir&gt;
				<ul>
					<li>Description: The direction of the minimum principal strain 3 in degrees.</li>
					<li>Type: a decimal value ranging from 0 (inclusive) to 360 (inclusive)</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;minPrincipalStrainDirUnc&gt;
				<ul>
					<li>Description: The uncertainty in the minimum principal strain direction.</li>
					<li>Type: float</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;maxPrincipalStrainDir&gt;
				<ul>
					<li>Description: The direction of the maximum principal strain 1 in degrees (0-360).</li>
					<li>Type: a decimal value ranging from 0 (inclusive) to 360 (inclusive)</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;maxPrincipalStrainDirUnc&gt;
				<ul>
					<li>Description: The uncertainty in the maximum principal strain direction.</li>
					<li>Type: float</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Any additionnal comment about the data.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Deformation - EDM dataset -->
		<h2 class="wovomlclass"><a name="data_deformation_edmds" id="data_deformation_edmds"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_deformation">&lt;Deformation&gt;</a> | &lt;EDMDataset&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;EDMDataset instrument=&quot;...&quot; station=&quot;...&quot; targetStation=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	<a href="#data_deformation_edm">&lt;EDM&gt;...&lt;/EDM&gt;</a>
<strong>&lt;/EDMDataset&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains EDM data that were collected between two stations, an instrument station and a target or reflector station.</p>
		
		<h3>Attributes</h3>
		<ul>
			<li>instrument
				<ul>
					<li>Description: The code of the instrument which recorded these data.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>station
				<ul>
					<li>Description: The code of the station where these data were recorded.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>targetStation
				<ul>
					<li>Description: The code of the target or reflector station.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;EDM&gt;
				<ul>
					<li>Description: See <a href="#data_deformation_edm">&lt;EDM&gt;</a>.</li>
					<li>Number of occurrences: 1-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Deformation - EDM -->
		<h2 class="wovomlclass"><a name="data_deformation_edm" id="data_deformation_edm"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_deformation">&lt;Deformation&gt;</a> | <a href="#data_deformation_edmds">&lt;EDMDataset&gt;</a> | &lt;EDM&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;EDM code=&quot;...&quot; instrument=&quot;...&quot; station=&quot;...&quot; targetStation=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	&lt;measTime&gt;...&lt;/measTime&gt;
	&lt;measTimeUnc&gt;...&lt;/measTimeUnc&gt;
	&lt;lineLength&gt;...&lt;/lineLength&gt;
	&lt;constantErr&gt;...&lt;/constantErr&gt;
	&lt;scaleErr&gt;...&lt;/scaleErr&gt;
<strong>&lt;/EDM&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains EDM data that were collected between two stations, an instrument station and a target or reflector station.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>instrument
				<ul>
					<li>Description: The code of the instrument which recorded these data.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>station
				<ul>
					<li>Description: The code of the station where these data were recorded.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>targetStation
				<ul>
					<li>Description: The code of the target or reflector station.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;measTime&gt;
				<ul>
					<li>Description: The measurement time in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;measTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the measurement time.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;lineLength&gt;
				<ul>
					<li>Description: The mark-to-mark line length in meters.</li>
					<li>Type: double</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;constantErr&gt;
				<ul>
					<li>Description: The constant error in meters, an indication of the instrument and reflector error.</li>
					<li>Type: float</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;scaleErr&gt;
				<ul>
					<li>Description: The scale error in ppm, an indication of the error in line length due to temperature, and pressure.</li>
					<li>Type: float</li>
					<li>Unit: ppm</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Deformation - Angle dataset -->
		<h2 class="wovomlclass"><a name="data_deformation_angleds" id="data_deformation_angleds"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_deformation">&lt;Deformation&gt;</a> | &lt;AngleDataset&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;AngleDataset instrument=&quot;...&quot; station=&quot;...&quot; targetStation1=&quot;...&quot; targetStation2=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	<a href="#data_deformation_angle">&lt;Angle&gt;...&lt;/Angle&gt;</a>
<strong>&lt;/AngleDataset&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains a few angles from early geodetic surveys where someone would stand on a high point (on top of a mountain) and measure the horizontal and vertical angles to prominent features in the area. Today, angles are measured to describe dramatic vertical or horizontal deformation of points on which GPS receivers and other modern instruments cannot safely be installed (e.g., on growing lava domes).</p>

		<h3>Attributes</h3>
		<ul>
			<li>instrument
				<ul>
					<li>Description: The code of the instrument which recorded these data.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>station
				<ul>
					<li>Description: The code of the station where these data were recorded.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>targetStation1
				<ul>
					<li>Description: The code of the first target station.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>targetStation2
				<ul>
					<li>Description: The code of the second target station.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;Angle&gt;
				<ul>
					<li>Description: See <a href="#data_deformation_angle">&lt;Angle&gt;</a>.</li>
					<li>Number of occurrences: 1-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Deformation - Angle -->
		<h2 class="wovomlclass"><a name="data_deformation_angle" id="data_deformation_angle"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_deformation">&lt;Deformation&gt;</a> | <a href="#data_deformation_angleds">&lt;AngleDataset&gt;</a> | &lt;Angle&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;Angle code=&quot;...&quot; instrument=&quot;...&quot; station=&quot;...&quot; targetStation1=&quot;...&quot; targetStation2=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
<strong>&lt;/Angle&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains a few angles from early geodetic surveys where someone would stand on a high point (on top of a mountain) and measure the horizontal and vertical angles to prominent features in the area. Today, angles are measured to describe dramatic vertical or horizontal deformation of points on which GPS receivers and other modern instruments cannot safely be installed (e.g., on growing lava domes).</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>instrument
				<ul>
					<li>Description: The code of the instrument which recorded these data.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>station
				<ul>
					<li>Description: The code of the station where these data were recorded.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>targetStation1
				<ul>
					<li>Description: The code of the first target station.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>targetStation2
				<ul>
					<li>Description: The code of the second target station.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;measTime&gt;
				<ul>
					<li>Description: The measurement time in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;measTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the measurement time.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;hAngle1&gt;
				<ul>
					<li>Description: The horizontal angle as measured by theodolite or total station (in degrees, 0-360) to target 1.</li>
					<li>Type: a decimal value ranging from 0 (inclusive) to 360 (inclusive)</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;hAngle1Unc&gt;
				<ul>
					<li>Description: The error on the horizontal angle to target 1.</li>
					<li>Type: float</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;hAngle2&gt;
				<ul>
					<li>Description: The horizontal angle as measured by theodolite or total station (in degrees, 0-360) to target 2.</li>
					<li>Type: a decimal value ranging from 0 (inclusive) to 360 (inclusive)</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;hAngle2Unc&gt;
				<ul>
					<li>Description: The error on the horizontal angle to target 2.</li>
					<li>Type: float</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;vAngle1&gt;
				<ul>
					<li>Description: The vertical angle as measured by theodolite or total station (in degrees, -90 to +90) to target 1.</li>
					<li>Type: a decimal value ranging from -90 (inclusive) to +90 (inclusive)</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;vAngle1Unc&gt;
				<ul>
					<li>Description: The error on the vertical angle to target 1.</li>
					<li>Type: float</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;vAngle2&gt;
				<ul>
					<li>Description: The vertical angle as measured by theodolite or total station (in degrees, -90 to +90) to target 2.</li>
					<li>Type: a decimal value ranging from -90 (inclusive) to +90 (inclusive)</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;vAngle2Unc&gt;
				<ul>
					<li>Description: The error on the vertical angle to target 2.</li>
					<li>Type: float</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments about the angle data including information on how well we know the location and time of measurement.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Deformation - GPS dataset -->
		<h2 class="wovomlclass"><a name="data_deformation_gpsds" id="data_deformation_gpsds"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_deformation">&lt;Deformation&gt;</a> | &lt;GPSDataset&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;GPSDataset instrument=&quot;...&quot; station=&quot;...&quot; refStation1=&quot;...&quot; refStation2=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	<a href="#data_deformation_gps">&lt;GPS&gt;...&lt;/GPS&gt;</a>
<strong>&lt;/GPSDataset&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about each individual instrument along with a flag to indicate if the instrument is installed permanently or is used periodically as part of a campaign.</p>

		<h3>Attributes</h3>
		<ul>
			<li>instrument
				<ul>
					<li>Description: The code of the instrument which recorded these data.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>station
				<ul>
					<li>Description: The code of the station where these data were recorded.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>refStation1
				<ul>
					<li>Description: The code of the first reference (fixed) station.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>refStation2
				<ul>
					<li>Description: The code of the second reference (fixed) station.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;GPS&gt;
				<ul>
					<li>Description: See <a href="#data_deformation_gps">&lt;GPS&gt;</a>.</li>
					<li>Number of occurrences: 1-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Deformation - GPS -->
		<h2 class="wovomlclass"><a name="data_deformation_gps" id="data_deformation_gps"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_deformation">&lt;Deformation&gt;</a> | <a href="#data_deformation_gpsds">&lt;GPSDataset&gt;</a> | &lt;GPS&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;GPS code=&quot;...&quot; instrument=&quot;...&quot; station=&quot;...&quot; refStation1=&quot;...&quot; refStation2=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
<strong>&lt;/GPS&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains continuous and periodic data collected at a single station and referenced to two reference stations. These data are collected either by a temporary GPS instrument for a period of time or by an instrument that records the position continuously.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>instrument
				<ul>
					<li>Description: The code of the instrument which recorded these data.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>station
				<ul>
					<li>Description: The code of the station where these data were recorded.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>refStation1
				<ul>
					<li>Description: The code of the first reference (fixed) station.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>refStation2
				<ul>
					<li>Description: The code of the second reference (fixed) station.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;measTime&gt;
				<ul>
					<li>Description: The measurement time in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;measTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the measurement time.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;lat&gt; AND &lt;lon&gt;
				<ul>
					<li>Description: The latitude and longitude in decimal degrees.</li>
					<li>Type: a decimal value ranging from -90 (inclusive) to +90 (inclusive) for latitude and from -180 (inclusive) to +180 (inclusive) for longitude</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;elev&gt;
				<ul>
					<li>Description: The measured elevation in meters (above sea level).</li>
					<li>Type: double</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;N-SErr&gt;
				<ul>
					<li>Description: The north-south error in degrees.</li>
					<li>Type: double</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;E-WErr&gt;
				<ul>
					<li>Description: The east-west error in degrees.</li>
					<li>Type: double</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;verticalErr&gt;
				<ul>
					<li>Description: The vertical error in meters.</li>
					<li>Type: float</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;software&gt;
				<ul>
					<li>Description: The software used to determine the positions, e.g., GIPSY, BERNESE, other.</li>
					<li>Type: string of at most 50 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;orbits&gt;
				<ul>
					<li>Description: The orbits used to determine the positions (source, and corrections applied). Please provide whose orbits and which ones.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;duration&gt;
				<ul>
					<li>Description: The duration of the solution in minutes. For continuous data, please give the frequency of measurement and the duration of time used to calculate each position, e.g., For example, data collected every 10 seconds and each position computed from 24 hours of data. For periodic (campaign) data, please give the duration of dataused to calculate this position.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;quality&gt;
				<ul>
					<li>Description: An indicator of the quality for this measurement (use E for excellent, G for good, P for poor, and U for unknown).</li>
					<li>Type: E, G, P, U <em>(Excellent, Good, Poor, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Deformation - GPS vector dataset -->
		<h2 class="wovomlclass"><a name="data_deformation_gpsvectords" id="data_deformation_gpsvectords"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_deformation">&lt;Deformation&gt;</a> | &lt;GPSVectorDataset&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;GPSVectorDataset instrument=&quot;...&quot; station=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	<a href="#data_deformation_gpsvector">&lt;GPSVector&gt;...&lt;/GPSVector&gt;</a>
<strong>&lt;/GPSVectorDataset&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about each individual instrument along with a flag to indicate if the instrument is installed permanently or is used periodically as part of a campaign.</p>

		<h3>Attributes</h3>
		<ul>
			<li>instrument
				<ul>
					<li>Description: The code of the instrument which recorded these data.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>station
				<ul>
					<li>Description: The code of the station where these data were recorded.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;GPSVector&gt;
				<ul>
					<li>Description: See <a href="#data_deformation_gpsvector">&lt;GPSVector&gt;</a>.</li>
					<li>Number of occurrences: 1-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Deformation - GPS vector -->
		<h2 class="wovomlclass"><a name="data_deformation_gpsvector" id="data_deformation_gpsvector"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_deformation">&lt;Deformation&gt;</a> | <a href="#data_deformation_gpsvectords">&lt;GPSVectorDataset&gt;</a> | &lt;GPSVector&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;GPSVector code=&quot;...&quot; instrument=&quot;...&quot; station=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
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
<strong>&lt;/GPSVector&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains vectors that were computed from GPS data where the actual positions are not available.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>instrument
				<ul>
					<li>Description: The code of the instrument which recorded these data.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>station
				<ul>
					<li>Description: The code of the station where these data were recorded.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: Start time of measurement in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty of the start time of measurement.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: End time of measurement in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty of the end time of measurement.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;magnitude&gt;
				<ul>
					<li>Description: The magnitude of the displacement in mm, if vector is described by displacement magnitude, azimuth, and vector inclination.</li>
					<li>Type: float</li>
					<li>Unit: mm</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;azimuth&gt;
				<ul>
					<li>Description: The displacement azimuth in degrees (0-360), if vector is so described.</li>
					<li>Type: a decimal value ranging from 0 (inclusive) to 360 (inclusive)</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;inclination&gt;
				<ul>
					<li>Description: The inclination of displacement vector in degrees (0-90), if vector is so described.</li>
					<li>Type: a decimal value ranging from 0 (inclusive) to 90 (inclusive)</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;northDispl&gt;
				<ul>
					<li>Description: The displacement to the north in mm, if vector is described in terms of North, East, and Vertical displacement.</li>
					<li>Type: float</li>
					<li>Unit: mm</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;northDisplErr&gt;
				<ul>
					<li>Description: The error in displacement to the north in mm.</li>
					<li>Type: float</li>
					<li>Unit: mm</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;eastDispl&gt;
				<ul>
					<li>Description: The displacement to the east in mm, if vector is so described.</li>
					<li>Type: float</li>
					<li>Unit: mm</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;eastDisplErr&gt;
				<ul>
					<li>Description: The error in displacement to the east in mm.</li>
					<li>Type: float</li>
					<li>Unit: mm</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;vertDispl&gt;
				<ul>
					<li>Description: The vertical displacement in mm, if vector is so described.</li>
					<li>Type: float</li>
					<li>Unit: mm</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;vertDisplErr&gt;
				<ul>
					<li>Description: The error in vertical displacement in mm.</li>
					<li>Type: float</li>
					<li>Unit: mm</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments about the vector data including locations of the instrument and target stations, information about the instruments used, and information on how well we know the location and time of measurement.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Deformation - Leveling dataset -->
		<h2 class="wovomlclass"><a name="data_deformation_levelingds" id="data_deformation_levelingds"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_deformation">&lt;Deformation&gt;</a> | &lt;LevelingDataset&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;LevelingDataset instrument=&quot;...&quot; refStation=&quot;...&quot; secondBMStation=&quot;...&quot; secondBMStation=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	<a href="#data_deformation_leveling">&lt;Leveling&gt;...&lt;/Leveling&gt;</a>
<strong>&lt;/LevelingDataset&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains elevation changes between successive benchmarks of a leveling line.</p>

		<h3>Attributes</h3>
		<ul>
			<li>instrument
				<ul>
					<li>Description: The code of the instrument which recorded these data.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>refStation
				<ul>
					<li>Description: The code of the reference station.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>firstBMStation
				<ul>
					<li>Description: The code of the first benchmark.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>secondBMStation
				<ul>
					<li>Description: The code of the second benchmark.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;Leveling&gt;
				<ul>
					<li>Description: See <a href="#data_deformation_leveling">&lt;Leveling&gt;</a>.</li>
					<li>Number of occurrences: 1-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Deformation - Leveling -->
		<h2 class="wovomlclass"><a name="data_deformation_leveling" id="data_deformation_leveling"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_deformation">&lt;Deformation&gt;</a> | <a href="#data_deformation_levelingds">&lt;LevelingDataset&gt;</a> | &lt;Leveling&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;Leveling code=&quot;...&quot; instrument=&quot;...&quot; refStation=&quot;...&quot; secondBMStation=&quot;...&quot; secondBMStation=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	&lt;order&gt;...&lt;/order&gt;
	&lt;class&gt;...&lt;/class&gt;
	&lt;measTime&gt;...&lt;/measTime&gt;
	&lt;measTimeUnc&gt;...&lt;/measTimeUnc&gt;
	&lt;elevChange&gt;...&lt;/elevChange&gt;
	&lt;elevChangeUnc&gt;...&lt;/elevChangeUnc&gt;
	&lt;comments&gt;...&lt;/comments&gt;
<strong>&lt;/Leveling&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains elevation changes between successive benchmarks of a leveling line.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>instrument
				<ul>
					<li>Description: The code of the instrument which recorded these data.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>refStation
				<ul>
					<li>Description: The code of the reference station.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>firstBMStation
				<ul>
					<li>Description: The code of the first benchmark.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>secondBMStation
				<ul>
					<li>Description: The code of the second benchmark.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;order&gt;
				<ul>
					<li>Description: The order of the survey.</li>
					<li>Type: integer number</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;class&gt;
				<ul>
					<li>Description: The class of the survey.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;measTime&gt;
				<ul>
					<li>Description: The survey time in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;measTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the survey time.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;elevChange&gt;
				<ul>
					<li>Description: The elevation change in mm from the first benchmark to the second benchmark.</li>
					<li>Type: float</li>
					<li>Unit: mm</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;elevChangeUnc&gt;
				<ul>
					<li>Description: The estimated error in the elevation change in mm from the first benchmark to the second benchmark.</li>
					<li>Type: float</li>
					<li>Unit: mm</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments about the data including the original level of detail for the survey date (the year, the month, or the day).</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Deformation - InSAR image dataset -->
		<h2 class="wovomlclass"><a name="data_deformation_insarimageds" id="data_deformation_insarimageds"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_deformation">&lt;Deformation&gt;</a> | &lt;InSARImageDataset&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;InSARImageDataset instrument=&quot;...&quot; volcano=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	<a href="#data_deformation_insarimage">&lt;InSARImage&gt;...&lt;/InSARImage&gt;</a>
<strong>&lt;/InSARImageDataset&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about radar interferograms that show deformation of volcanoes. The original data are pairs of radar images, currently from a satellite such as ERS1, ERS2, Envisat, JERS, Radarsat, or (soon) PalSAR.</p>

		<h3>Attributes</h3>
		<ul>
			<li>instrument
				<ul>
					<li>Description: The code of the instrument which recorded these data.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>volcano
				<ul>
					<li>Description: The CAVW number of the volcano concerned by these data.</li>
					<li>Type: string of at most 12 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;InSARImage&gt;
				<ul>
					<li>Description: See <a href="#data_deformation_insarimage">&lt;InSARImage&gt;</a>.</li>
					<li>Number of occurrences: 1-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Deformation - InSAR image -->
		<h2 class="wovomlclass"><a name="data_deformation_insarimage" id="data_deformation_insarimage"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_deformation">&lt;Deformation&gt;</a> | <a href="#data_deformation_insarimageds">&lt;InSARImageDataset&gt;</a> | &lt;InSARImage&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;InSARImage code=&quot;...&quot; instrument=&quot;...&quot; volcano=&quot;...&quot; owner1=&quot;...&quot; owner2=&quot;...&quot; owner3=&quot;...&quot; pubDate=&quot;...&quot;&gt;</strong>
	<a href="#data_deformation_insarimage_satellites">&lt;Satellites&gt;...&lt;/Satellites&gt;</a>
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
	<a href="#data_deformation_insarimage_insarpixels">&lt;InSARPixels&gt;...&lt;/InSARPixels&gt;</a>
<strong>&lt;/InSARImage&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about radar interferograms that show deformation of volcanoes. The original data are pairs of radar images, currently from a satellite such as ERS1, ERS2, Envisat, JERS, Radarsat, or (soon) PalSAR.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
			<li>instrument
				<ul>
					<li>Description: The code of the instrument which recorded these data.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>volcano
				<ul>
					<li>Description: The CAVW number of the volcano concerned by these data.</li>
					<li>Type: string of at most 12 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner1
				<ul>
					<li>Description: The main owner of these data.</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner2
				<ul>
					<li>Description: The second owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>owner3
				<ul>
					<li>Description: The third owner of these data (if any).</li>
					<li>Type: string of at most 15 characters</li>
					<li>Required: No</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The publish date for these data.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Required: No</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;Satellites&gt;
				<ul>
					<li>Description: See <a href="#data_deformation_insarimage_satellites">&lt;Satellites&gt;</a>.</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startLat&gt; AND &lt;startLon&gt;
				<ul>
					<li>Description: The latitude and longitude of the starting corner.</li>
					<li>Type: a decimal value ranging from -90 (inclusive) to +90 (inclusive) for latitude and from -180 (inclusive) to +180 (inclusive) for longitude</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startPosition&gt;
				<ul>
					<li>Description: The starting position. Use BLC for bottom left corner or TLC for top left corner.</li>
					<li>Type: BLC, TLC <em>(Bottom Left Corner, Top Left Corner)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;rowOrder&gt;
				<ul>
					<li>Description: The order of the rows for example, left to right.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;numbOfRows&gt;
				<ul>
					<li>Description: The number of rows in the image.</li>
					<li>Type: integer number</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;numbOfCols&gt;
				<ul>
					<li>Description: The number of columns in the image.</li>
					<li>Type: integer number</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;units&gt;
				<ul>
					<li>Description: The units used in the image (e.g., mm).</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;nullValue&gt;
				<ul>
					<li>Description: The number used for fields without data.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;location&gt;
				<ul>
					<li>Description: The location of the image (e.g., This is Yellowstone).</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;pair&gt;
				<ul>
					<li>Description: A flag indicating if the image is composed of a pair (P) of data, stacked data (S), or unknown (U).</li>
					<li>Type: P, S, U <em>(Pair, Stacked, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;description&gt;
				<ul>
					<li>Description: A description of the image including a set of standard features, the number of satellite passes, and the time frame covered by the image (e.g., Norris uplift anomaly includes 3 images, one from Sept. 1996 to Sept 2000, one from Aug. 2000 to Aug 2001, and one from July 2001 to July 2002).</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;DEM&gt;
				<ul>
					<li>Description: The DEM used (e.g., 30m NED or SRTM).</li>
					<li>Type: string of at most 50 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;bytesOrder&gt;
				<ul>
					<li>Description: The order in which the bytes are stored and which bytes are most significant in multi-byte data types (e.g., big endian or little endian).</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;img1Time&gt;
				<ul>
					<li>Description: The date of image 1 in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;img1TimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date of image 1.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;img2Time&gt;
				<ul>
					<li>Description: The date of image 2 in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;img2TimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the date of image 2.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;metersPixelSize&gt;
				<ul>
					<li>Description: The pixel size in meters.</li>
					<li>Type: float</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;degreesPixelSize&gt;
				<ul>
					<li>Description: The pixel size in decimal degrees.</li>
					<li>Type: float</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;lookAngle&gt;
				<ul>
					<li>Description: The look angle.</li>
					<li>Type: float</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;limb&gt;
				<ul>
					<li>Description: The limb. Use ASC for ascending or DES for descending.</li>
					<li>Type: ASC, DES <em>(ASCending, DEScending)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;processMethod&gt;
				<ul>
					<li>Description: The processing method.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;software&gt;
				<ul>
					<li>Description: The software used.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;DEMQuality&gt;
				<ul>
					<li>Description: The DEM quality, Use excellent (E) for 1m, good (G) for 10m, fair (F) for 100m, or unknown (U).</li>
					<li>Type: E, G, P, U <em>(Excellent (1m), Good (10m), Fair (100m), Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;InSARPixels&gt;
				<ul>
					<li>Description: See <a href="#data_deformation_insarimage_insarpixels">&lt;InSARPixels&gt;</a>.</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Deformation - InSAR image - Satellites -->
		<h2 class="wovomlclass"><a name="data_deformation_insarimage_satellites" id="data_deformation_insarimage_satellites"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_deformation">&lt;Deformation&gt;</a> | <a href="#data_deformation_insarimageds">&lt;InSARImageDataset&gt;</a> | <a href="#data_deformation_insarimage">&lt;InSARImage&gt;</a> | &lt;Satellites&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;Satellites&gt;</strong>
	&lt;satelliteCode&gt;...&lt;/satelliteCode&gt;
<strong>&lt;/Satellites&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains a list of satellite codes.</p>

		<h3>Elements</h3>
		<ul>
			<li>&lt;satelliteCode&gt;
				<ul>
					<li>Description: The code of a satellite in WOVOdat.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 1-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Deformation - InSAR image - InSAR image pixels -->
		<h2 class="wovomlclass"><a name="data_deformation_insarimage_insarpixels" id="data_deformation_insarimage_insarpixels"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_deformation">&lt;Deformation&gt;</a> | <a href="#data_deformation_insarimageds">&lt;InSARImageDataset&gt;</a> | <a href="#data_deformation_insarimage">&lt;InSARImage&gt;</a> | &lt;InSARPixels&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;InSARPixels&gt;</strong>
	<a href="#data_deformation_insarimage_insarpixels_insarpixel">&lt;InSARPixel&gt;...&lt;/InSARPixel&gt;</a>
<strong>&lt;/InSARPixels&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains the pixels collected by two satellites to create an InSAR image.</p>

		<h3>Elements</h3>
		<ul>
			<li>&lt;InSARPixel&gt;
				<ul>
					<li>Description: See <a href="#data_deformation_insarimage_insarpixels_insarpixel">&lt;InSARPixel&gt;</a>.</li>
					<li>Number of occurrences: 1-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Deformation - InSAR image - InSAR image pixels - InSAR image pixel -->
		<h2 class="wovomlclass"><a name="data_deformation_insarimage_insarpixels_insarpixel" id="data_deformation_insarimage_insarpixels_insarpixel"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_deformation">&lt;Deformation&gt;</a> | <a href="#data_deformation_insarimage">&lt;InSARImage&gt;</a> | <a href="#data_deformation_insarimage_insarpixels">&lt;InSARPixels&gt;</a> | &lt;InSARPixel&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;InSARPixel number=&quot;...&quot;&gt;</strong>
	&lt;rangeOfChange&gt;...&lt;/rangeOfChange&gt;
<strong>&lt;/InSARPixel&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains the data collected by two satellites to create an InSAR image.</p>

		<h3>Attributes</h3>
		<ul>
			<li>number
				<ul>
					<li>Description: The pixel number.</li>
					<li>Type: integer number</li>
					<li>Required: Yes</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;rangeOfChange&gt;
				<ul>
					<li>Description: The range of change in mm.</li>
					<li>Type: float</li>
					<li>Unit: mm</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Gas -->
		<h2 class="wovomlclass"><a name="data_gas" id="data_gas"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | &lt;Gas&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;Gas&gt;</strong>
	<a href="#data_gas_directlysampled">&lt;DirectlySampled&gt;...&lt;/DirectlySampled&gt;</a>
	<a href="#data_gas_soilefflux">&lt;SoilEfflux&gt;...&lt;/SoilEfflux&gt;</a>
	<a href="#data_gas_plume">&lt;Plume&gt;...&lt;/Plume&gt;</a>
<strong>&lt;/Gas&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about all gas data for a volcano.</p>

		<h3>Elements</h3>
		<ul>
			<li>&lt;DirectlySampled&gt;
				<ul>
					<li>Description: See <a href="#data_gas_directlysampled">&lt;DirectlySampled&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;SoilEfflux&gt;
				<ul>
					<li>Description: See <a href="#data_gas_soilefflux">&lt;SoilEfflux&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;Plume&gt;
				<ul>
					<li>Description: See <a href="#data_gas_plume">&lt;Plume&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Gas - Directly sampled -->
		<h2 class="wovomlclass"><a name="data_gas_directlysampled" id="data_gas_directlysampled"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_gas">&lt;Gas&gt;</a> | &lt;DirectlySampled&gt;</h2>
		
		<h3>Template</h3>
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
	pubDate...&lt;/pubDate&gt;
<strong>&lt;/DirectlySampled&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains gas data collected at ground sites. Data include the gas temperature, concentrations, and environmental factors.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;instrumentCode&gt; OR &lt;stationCode&gt;
				<ul>
					<li>Description: The code in WOVOdat for the instrument/station which recorded these data.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;continuous&gt;
				<ul>
					<li>Description: A single character field used to identify continuous data. Use C for data that were collected continuously or P for data that were collected periodically.</li>
					<li>Type: C, P <em>(Continuous, Periodically)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;measTime&gt;
				<ul>
					<li>Description: The measurement time in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;measTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the measurement time.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;temperature&gt;
				<ul>
					<li>Description: The gas temperature in degrees Celsius.</li>
					<li>Type: float</li>
					<li>Unit: &deg;C</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;atmosPress&gt;
				<ul>
					<li>Description: The atmospheric pressure in millibars at the time of measurement.</li>
					<li>Type: float</li>
					<li>Unit: mbar</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;emissionRate&gt;
				<ul>
					<li>Description: The measured gas emission rate.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;species&gt;
				<ul>
					<li>Description: Species or ratio of gas reported.</li>
					<li>Type: CO2, SO2, H2S, HCl, HF, CH4, H2, CO, 3He4He, d13C, d34S, d18O, dD</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;waterFree&gt;
				<ul>
					<li>Description: A single character field used to indicate whether the value is calculated for water-free regime.</li>
					<li>Type: Y, N <em>(Yes, No)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;units&gt;
				<ul>
					<li>Description: The units reported for the species below, e.g., vol % or wt %.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;concentration&gt;
				<ul>
					<li>Description: The measured concentration.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;concentrationUnc&gt;
				<ul>
					<li>Description: The estimated uncertainty in concentration.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;recalculated&gt;
				<ul>
					<li>Description: A single character field used to know if the value is directly from measurement (O for Original) or recalculated from other parameters (R for Recalculated).</li>
					<li>Type: O, R <em>(Original, Recalculated)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;environFactors&gt;
				<ul>
					<li>Description: Comments on environmental factors, e.g., snowpack, groundwater masking.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;sublimateMinerals&gt;
				<ul>
					<li>Description: Information on sublimate minerals.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Additional comments, e.g., tree kill, dead animals, etc.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;ownerCode&gt;
				<ul>
					<li>Description: The contact code in WOVOdat for the data collector.</li>
					<li>Type: string of at most 10 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The date these data can become public. This date can be set up to two years in advance.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Gas - Soil efflux -->
		<h2 class="wovomlclass"><a name="data_gas_soilefflux" id="data_gas_soilefflux"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_gas">&lt;Gas&gt;</a> | &lt;SoilEfflux&gt;</h2>
		
		<h3>Template</h3>
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
	pubDate...&lt;/pubDate&gt;
<strong>&lt;/SoilEfflux&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains a daily total flux value for an individual gas species.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;instrumentCode&gt; OR &lt;stationCode&gt;
				<ul>
					<li>Description: The code in WOVOdat for the instrument/station which recorded these data.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;measTime&gt;
				<ul>
					<li>Description: The measurement time in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;measTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the measurement time.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;species&gt;
				<ul>
					<li>Description: The type of gas measured (CO<sub>2</sub>, Radon, etc.).</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;totalFlux&gt;
				<ul>
					<li>Description: The total flux value in t/d.</li>
					<li>Type: float</li>
					<li>Unit: t/d</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;totalFluxUnc&gt;
				<ul>
					<li>Description: The uncertainty in the flux value in t/d.</li>
					<li>Type: float</li>
					<li>Unit: t/d</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;numberOfPoints&gt;
				<ul>
					<li>Description: The number of points measured.</li>
					<li>Type: integer number</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;area&gt;
				<ul>
					<li>Description: The area measured in m<sup>2</sup>.</li>
					<li>Type: float</li>
					<li>Unit: m<sup>2</sup></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;highestFlux&gt;
				<ul>
					<li>Description: The highest individual flux for the measured species in g/m<sup>2</sup>/d.</li>
					<li>Type: float</li>
					<li>Unit: g/m<sup>2</sup>/d</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;highestTemp&gt;
				<ul>
					<li>Description: The highest measured temperature in degrees Celsius if the measurement was from a geothermal area.</li>
					<li>Type: float</li>
					<li>Unit: &deg;C</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments about the measurement including information about the weather such as snow on the ground.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;ownerCode&gt;
				<ul>
					<li>Description: The contact code in WOVOdat for the data collector.</li>
					<li>Type: string of at most 10 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The date these data can become public. This date can be set up to two years in advance.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Gas - Plume -->
		<h2 class="wovomlclass"><a name="data_gas_plume" id="data_gas_plume"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_gas">&lt;Gas&gt;</a> | &lt;Plume&gt;</h2>
		
		<h3>Template</h3>
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
	pubDate...&lt;/pubDate&gt;
<strong>&lt;/Plume&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains gas data collected from a plume including the location of the vent, the height of the plume, and the gas emission rates.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;volcanoCode&gt;
				<ul>
					<li>Description: The code of the volcano to which the data refer.</li>
					<li>Type: string of at most 12 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;instrumentCode&gt; OR &lt;stationCode&gt;
				<ul>
					<li>Description: The code in WOVOdat for the instrument/station which recorded these data.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;lat&gt; AND &lt;lon&gt;
				<ul>
					<li>Description: The latitude and longitude in decimal degrees.</li>
					<li>Type: a decimal value ranging from -90 (inclusive) to +90 (inclusive) for latitude and from -180 (inclusive) to +180 (inclusive) for longitude</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;height&gt;
				<ul>
					<li>Description: The height of the plume in km.</li>
					<li>Type: float</li>
					<li>Unit: km</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;heightDetermination&gt;
				<ul>
					<li>Description: The method used to determine the height of the plume.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;measTime&gt;
				<ul>
					<li>Description: The measurement time in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;measTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the measurement time.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;species&gt;
				<ul>
					<li>Description: Species of gas reported.</li>
					<li>Type: CO2, SO2, H2S, HCl, HF, CO</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;units&gt;
				<ul>
					<li>Description: The units reported for the species below, e.g., vol % or wt %.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;emissionRate&gt;
				<ul>
					<li>Description: The gas emission rate in the plume in the units reported in gd_plu_units.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;emissionRateUnc&gt;
				<ul>
					<li>Description: The gas standard error in the units reported in gd_plu_units.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;recalculated&gt;
				<ul>
					<li>Description: A single character field used to know if the value is directly from measurement (O for Original) or recalculated from other parameters (R for Recalculated).</li>
					<li>Type: O, R <em>(Original, Recalculated)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;windSpeed&gt;
				<ul>
					<li>Description: The estimated wind speed at plume height in m/s.</li>
					<li>Type: float</li>
					<li>Unit: m/s</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;weatherNotes&gt;
				<ul>
					<li>Description: Notes on the weather for example information on cloud cover, rain, ambient temperature, etc.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Additional comments about the plume such as the shape and size, and how the plume data was collected.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;ownerCode&gt;
				<ul>
					<li>Description: The contact code in WOVOdat for the data collector.</li>
					<li>Type: string of at most 10 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The date these data can become public. This date can be set up to two years in advance.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Hydrologic -->
		<h2 class="wovomlclass"><a name="data_hydrologic" id="data_hydrologic"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | &lt;Hydrologic&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;Hydrologic&gt;</strong>
	<a href="#data_hydrologic_sample">&lt;Sample&gt;...&lt;/Sample&gt;</a>
<strong>&lt;/Hydrologic&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains all of the water data including daily data and data obtained from sample analysis.</p>

		<h3>Elements</h3>
		<ul>
			<li>&lt;Sample&gt;
				<ul>
					<li>Description: See <a href="#data_hydrologic_sample">&lt;Sample&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Hydrologic - Sample -->
		<h2 class="wovomlclass"><a name="data_hydrologic_sample" id="data_hydrologic_sample"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_hydrologic">&lt;Hydrologic&gt;</a> | &lt;Sample&gt;</h2>
		
		<h3>Template</h3>
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
	pubDate...&lt;/pubDate&gt;
<strong>&lt;/Sample&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains hydrologic data from sample analysis.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;instrumentCode&gt; OR &lt;stationCode&gt;
				<ul>
					<li>Description: The code in WOVOdat for the instrument/station which recorded these data.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;measTime&gt;
				<ul>
					<li>Description: The measurement time in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;measTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the measurement time.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;temperature&gt;
				<ul>
					<li>Description: The temperature of the water in degrees Celsius.</li>
					<li>Type: float</li>
					<li>Unit: &deg;C</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;elev&gt;
				<ul>
					<li>Description: The elevation of the water level in meters above sea level, if available.</li>
					<li>Type: double</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;depth&gt;
				<ul>
					<li>Description: The water depth in meters below the ground surface, if available.</li>
					<li>Type: double</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;waterLevelChange&gt;
				<ul>
					<li>Description: The change in water level in meters if the water depth and water elevation are not available.</li>
					<li>Type: double</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;atmosPress&gt;
				<ul>
					<li>Description: The atmospheric pressure in millibars at the time of measurement.</li>
					<li>Type: float</li>
					<li>Unit: mbar</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;springDischRate&gt;
				<ul>
					<li>Description: The measured spring discharge rate in liters per second.</li>
					<li>Type: double</li>
					<li>Unit: L/s</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;precipitation&gt;
				<ul>
					<li>Description: The amount of precipitation in millimeters for this measurement.</li>
					<li>Type: float</li>
					<li>Unit: mm</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;dailyPrecipitation&gt;
				<ul>
					<li>Description: The precipitation in millimeters for the preceding day.</li>
					<li>Type: float</li>
					<li>Unit: mm</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;precipitationType&gt;
				<ul>
					<li>Description: The precipitation type. Use R for rain, FR for freezing rain or sleet, S for snow, H for hail, or any combination of the above.</li>
					<li>Type: R, FR, S, H, R-FR, R-S, R-H, FR-R, FR-S, FR-H, S-R, S-FR, S-H, H-R, H-FR, H-S <em>(Rain, Freezing Rain, Snow, Hail, combinations of those)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;pH&gt;
				<ul>
					<li>Description: The pH of the water.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;pHUnc&gt;
				<ul>
					<li>Description: The standard error in the measured pH of the water.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;conductivity&gt;
				<ul>
					<li>Description: The measured conductivity in micromhos/cm (microSiemens/cm).</li>
					<li>Type: float</li>
					<li>Unit: &mu;mhos/cm, &mu;S/cm</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;conductivityUnc&gt;
				<ul>
					<li>Description: The standard error in measured conductivity in micromhos/cm (microSiemens/cm).</li>
					<li>Type: float</li>
					<li>Unit: &mu;mhos/cm, &mu;S/cm</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;species&gt;
				<ul>
					<li>Description: Type of compound, kation, anion or ratio.</li>
					<li>Type: SO4, H2S, Cl, F, HCO3, Mg, Fe, Ca, Na, K, 3He4He, c3He4He, d13C, d34S, dD, d18O</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;units&gt;
				<ul>
					<li>Description: The units reported for the emission rates below, e.g., t/d or kg/s.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;content&gt;
				<ul>
					<li>Description: The measured content in unit mentioned in hd_comp_units.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;contentUnc&gt;
				<ul>
					<li>Description: The measured content standard error in unit mentioned in hd_comp_units.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments about the measurement and about precipitation over the past month.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;ownerCode&gt;
				<ul>
					<li>Description: The contact code in WOVOdat for the data collector.</li>
					<li>Type: string of at most 10 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The date these data can become public. This date can be set up to two years in advance.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Fields -->
		<h2 class="wovomlclass"><a name="data_fields" id="data_fields"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | &lt;Fields&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;Fields&gt;</strong>
	<a href="#data_fields_magnetic">&lt;Magnetic&gt;...&lt;/Magnetic&gt;</a>
	<a href="#data_fields_magneticvector">&lt;MagneticVector&gt;...&lt;/MagneticVector&gt;</a>
	<a href="#data_fields_electric">&lt;Electric&gt;...&lt;/Electric&gt;</a>
	<a href="#data_fields_gravity">&lt;Gravity&gt;...&lt;/Gravity&gt;</a>
<strong>&lt;/Fields&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about all fields data for a volcano.</p>

		<h3>Elements</h3>
		<ul>
			<li>&lt;Magnetic&gt;
				<ul>
					<li>Description: See <a href="#data_fields_magnetic">&lt;Magnetic&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;MagneticVector&gt;
				<ul>
					<li>Description: See <a href="#data_fields_magneticvector">&lt;MagneticVector&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;Electric&gt;
				<ul>
					<li>Description: See <a href="#data_fields_electric">&lt;Electric&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;Gravity&gt;
				<ul>
					<li>Description: See <a href="#data_fields_gravity">&lt;Gravity&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Fields - Magnetic -->
		<h2 class="wovomlclass"><a name="data_fields_magnetic" id="data_fields_magnetic"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_fields">&lt;Fields&gt;</a> | &lt;Magnetic&gt;</h2>
		
		<h3>Template</h3>
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
	pubDate...&lt;/pubDate&gt;
<strong>&lt;/Magnetic&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains magnetic data that were collected digitally.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;instrumentCode&gt; OR &lt;stationCode&gt;
				<ul>
					<li>Description: The code in WOVOdat for the instrument/station which recorded these data.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;refStationCode&gt;
				<ul>
					<li>Description: The code in WOVOdat for the reference station.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;measTime&gt;
				<ul>
					<li>Description: The measurement time in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;measTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the measurement time.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;F&gt;
				<ul>
					<li>Description: The total field strength in nanoteslas.</li>
					<li>Type: double</li>
					<li>Unit: nT</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;FUnc&gt;
				<ul>
					<li>Description: The total field strength uncertainty in nanoteslas.</li>
					<li>Type: float</li>
					<li>Unit: nT</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;X&gt;
				<ul>
					<li>Description: The x component in nanoteslas.</li>
					<li>Type: double</li>
					<li>Unit: nT</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;XUnc&gt;
				<ul>
					<li>Description: The uncertainty in the x component measurement in nanoteslas.</li>
					<li>Type: float</li>
					<li>Unit: nT</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;Y&gt;
				<ul>
					<li>Description: The y component in nanoteslas.</li>
					<li>Type: double</li>
					<li>Unit: nT</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;YUnc&gt;
				<ul>
					<li>Description: The uncertainty in the y component measurement in nanoteslas.</li>
					<li>Type: float</li>
					<li>Unit: nT</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;Z&gt;
				<ul>
					<li>Description: The z component in nanoteslas.</li>
					<li>Type: double</li>
					<li>Unit: nT</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;ZUnc&gt;
				<ul>
					<li>Description: The uncertainty in the z component measurement in nanoteslas.</li>
					<li>Type: float</li>
					<li>Unit: nT</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;highPass&gt;
				<ul>
					<li>Description: The high pass filter frequency value in Hz above which signals are used (passed).</li>
					<li>Type: float</li>
					<li>Unit: Hz</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;lowPass&gt;
				<ul>
					<li>Description: The low pass filter frequency value in Hz below which signals are used (passed).</li>
					<li>Type: float</li>
					<li>Unit: Hz</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments on the magnetic measurements.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;ownerCode&gt;
				<ul>
					<li>Description: The contact code in WOVOdat for the data collector.</li>
					<li>Type: string of at most 10 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The date these data can become public. This date can be set up to two years in advance.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Fields - Magnetic vector -->
		<h2 class="wovomlclass"><a name="data_fields_magneticvector" id="data_fields_magneticvector"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_fields">&lt;Fields&gt;</a> | &lt;MagneticVector&gt;</h2>
		
		<h3>Template</h3>
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
	pubDate...&lt;/pubDate&gt;
<strong>&lt;/MagneticVector&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains magnetic vector data for which the data for the individual components is unavailable.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;instrumentCode&gt; OR &lt;stationCode&gt;
				<ul>
					<li>Description: The code in WOVOdat for the instrument/station which recorded these data.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;measTime&gt;
				<ul>
					<li>Description: The measurement time in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;measTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the measurement time.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;declination&gt;
				<ul>
					<li>Description: The declination in degrees from 0 to 360.</li>
					<li>Type: a decimal value ranging from 0 (inclusive) to 360 (inclusive)</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;inclination&gt;
				<ul>
					<li>Description: The inclination in degrees from 0 to 90.</li>
					<li>Type: a decimal value ranging from 0 (inclusive) to 90 (inclusive)</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;ownerCode&gt;
				<ul>
					<li>Description: The contact code in WOVOdat for the data collector.</li>
					<li>Type: string of at most 10 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The date these data can become public. This date can be set up to two years in advance.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Fields - Electric -->
		<h2 class="wovomlclass"><a name="data_fields_electric" id="data_fields_electric"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_fields">&lt;Fields&gt;</a> | &lt;Electric&gt;</h2>
		
		<h3>Template</h3>
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
	pubDate...&lt;/pubDate&gt;
<strong>&lt;/Electric&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains electric data in digital form.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;instrumentCode&gt;
				<ul>
					<li>Description: The code in WOVOdat for the instrument which recorded these data.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;refStation1Code&gt;
				<ul>
					<li>Description: The code in WOVOdat for the electric fields station information from which the electrode is subtracted (station A in the equation A - B).</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;refStation2Code&gt;
				<ul>
					<li>Description: The code in WOVOdat for the electric fields station information for the electrode that's being subtracted (station B in the equation A - B).</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;measTime&gt;
				<ul>
					<li>Description: The measurement time in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;measTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the measurement time.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;field&gt;
				<ul>
					<li>Description: The electric field in mV (difference/distance).</li>
					<li>Type: float</li>
					<li>Unit: mV</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;fieldUnc&gt;
				<ul>
					<li>Description: Electric field uncertainty in mV.</li>
					<li>Type: float</li>
					<li>Unit: mV</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;direction&gt;
				<ul>
					<li>Description: The direction from station 1 to station 2 in degrees from 0 to 360 with respect to geodetic north.</li>
					<li>Type: a decimal value ranging from 0 (inclusive) to 360 (inclusive)</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;highPass&gt;
				<ul>
					<li>Description: The high pass filter frequency value in Hz above which signals are used (passed).</li>
					<li>Type: float</li>
					<li>Unit: Hz</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;lowPass&gt;
				<ul>
					<li>Description: The low pass filter frequency value in Hz below which signals are used (passed).</li>
					<li>Type: float</li>
					<li>Unit: Hz</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;selfPotential&gt;
				<ul>
					<li>Description: The self potential in mV between station 1 (A) and station 2 (B) (i.e., 1-2, or A-B).</li>
					<li>Type: float</li>
					<li>Unit: mV</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;selfPotentialUnc&gt;
				<ul>
					<li>Description: The self potential uncertainty in mV.</li>
					<li>Type: float</li>
					<li>Unit: mV</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;apparentResistivity&gt;
				<ul>
					<li>Description: The apparent resistivity in ohm-m.</li>
					<li>Type: float</li>
					<li>Unit: &Omega; m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;apparentResistivityUnc&gt;
				<ul>
					<li>Description: The uncertainty in apparent resistivity in ohm-m.</li>
					<li>Type: float</li>
					<li>Unit: &Omega; m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;directResistivity&gt;
				<ul>
					<li>Description: The direct resistivity in ohm-m.</li>
					<li>Type: float</li>
					<li>Unit: &Omega; m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;directResistivityUnc&gt;
				<ul>
					<li>Description: The uncertainty in direct resistivity in ohm-m.</li>
					<li>Type: float</li>
					<li>Unit: &Omega; m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Any comments about the measurements.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;ownerCode&gt;
				<ul>
					<li>Description: The contact code in WOVOdat for the data collector.</li>
					<li>Type: string of at most 10 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The date these data can become public. This date can be set up to two years in advance.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Fields - Gravity -->
		<h2 class="wovomlclass"><a name="data_fields_gravity" id="data_fields_gravity"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_fields">&lt;Fields&gt;</a> | &lt;Gravity&gt;</h2>
		
		<h3>Template</h3>
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
	pubDate...&lt;/pubDate&gt;
<strong>&lt;/Gravity&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains gravity data such as field strength and associated vertical displacement.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;instrumentCode&gt; OR &lt;stationCode&gt;
				<ul>
					<li>Description: The code in WOVOdat for the instrument/station which recorded these data.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;refStationCode&gt;
				<ul>
					<li>Description: The code in WOVOdat for the reference station.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;measTime&gt;
				<ul>
					<li>Description: The measurement time in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;measTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the measurement time.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;fieldStrength&gt;
				<ul>
					<li>Description: The field strength in Gal corrected for tides.</li>
					<li>Type: double</li>
					<li>Unit: Gal</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;fieldStrengthUnc&gt;
				<ul>
					<li>Description: The field strength uncertainty in Gal.</li>
					<li>Type: double</li>
					<li>Unit: Gal</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;assocVertDispl&gt;
				<ul>
					<li>Description: Comments on associated vertical displacement. Use the letters Y for yes, U for unknown and N for none in front of the comments.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;assocGWaterLevel&gt;
				<ul>
					<li>Description: Comments on associated change in groundwater level. Use the letters Y for yes, U for unknown and N for none in front of the comments.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Comments about the measurements.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;ownerCode&gt;
				<ul>
					<li>Description: The contact code in WOVOdat for the data collector.</li>
					<li>Type: string of at most 10 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The date these data can become public. This date can be set up to two years in advance.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Thermal -->
		<h2 class="wovomlclass"><a name="data_thermal" id="data_thermal"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | &lt;Thermal&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;Thermal&gt;</strong>
	<a href="#data_thermal_ground-based">&lt;Ground-based&gt;...&lt;/Ground-based&gt;</a>
	<a href="#data_thermal_thermalimage">&lt;ThermalImage&gt;...&lt;/ThermalImage&gt;</a>
<strong>&lt;/Thermal&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about all thermal data for a volcano.</p>

		<h3>Elements</h3>
		<ul>
			<li>&lt;Ground-based&gt;
				<ul>
					<li>Description: See <a href="#data_thermal_ground-based">&lt;Ground-based&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;ThermalImage&gt;
				<ul>
					<li>Description: See <a href="#data_thermal_thermalimage">&lt;ThermalImage&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Thermal - Ground-based -->
		<h2 class="wovomlclass"><a name="data_thermal_ground-based" id="data_thermal_ground-based"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_thermal">&lt;Thermal&gt;</a> | &lt;Ground-based&gt;</h2>
		
		<h3>Template</h3>
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
	pubDate...&lt;/pubDate&gt;
<strong>&lt;/Ground-based&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains all of the thermal data collected on the ground.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;instrumentCode&gt; OR &lt;stationCode&gt;
				<ul>
					<li>Description: The code in WOVOdat for the instrument/station which recorded these data.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;measType&gt;
				<ul>
					<li>Description: The type of measurement, for example, thermocouple or thermal IR.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;measTime&gt;
				<ul>
					<li>Description: The measurement time in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;measTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the measurement time.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;measDepth&gt;
				<ul>
					<li>Description: The depth of the measurement in meters below the ground surface.</li>
					<li>Type: float</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;distance&gt;
				<ul>
					<li>Description: The distance of the instrument from the object measured. This field is used in the case when the measurement is done remotely.</li>
					<li>Type: float</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;recalculated&gt;
				<ul>
					<li>Description: The flag to indicate if the value is directly measured (O), or recalculated from other parameter (R).</li>
					<li>Type: O, R <em>(Original value, Recalculated value)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;temperature&gt;
				<ul>
					<li>Description: The measured temperature in degrees Celsius.</li>
					<li>Type: float</li>
					<li>Unit: &deg;C</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;temperatureUnc&gt;
				<ul>
					<li>Description: The standard error or precision of the temperature in degrees Celsius.</li>
					<li>Type: float</li>
					<li>Unit: &deg;C</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;area&gt;
				<ul>
					<li>Description: The approximate area of of the body measured in meters squared.</li>
					<li>Type: float</li>
					<li>Unit: m<sup>2</sup></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;heatFlux&gt;
				<ul>
					<li>Description: The heat flux in W/m<sup>2</sup>.</li>
					<li>Type: float</li>
					<li>Unit: W/m<sup>2</sup></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;heatFluxUnc&gt;
				<ul>
					<li>Description: The standard error or precision of flux in W/m<sup>2</sup>.</li>
					<li>Type: float</li>
					<li>Unit: W/m<sup>2</sup></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;bgGeothermGradient&gt;
				<ul>
					<li>Description: The regional background geothermal gradient in deg Celsius/km.</li>
					<li>Type: float</li>
					<li>Unit: &deg;C/km</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;conductivity&gt;
				<ul>
					<li>Description: The thermal conductivity at the station or measurement point, in W/(m<sup>2</sup> degC). This value is either inferred from the soil type or measured intrinsically, and used to derive heat flux with the help of Fick's law.</li>
					<li>Type: float</li>
					<li>Unit: W/(m<sup>2</sup>&deg;C)</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Additional comments on the heat flux and thermal conductivity including if they inferred or measured.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;ownerCode&gt;
				<ul>
					<li>Description: The contact code in WOVOdat for the data collector.</li>
					<li>Type: string of at most 10 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The date these data can become public. This date can be set up to two years in advance.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Thermal - Thermal image -->
		<h2 class="wovomlclass"><a name="data_thermal_thermalimage" id="data_thermal_thermalimage"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_thermal">&lt;Thermal&gt;</a> | &lt;ThermalImage&gt;</h2>
		
		<h3>Template</h3>
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
	pubDate...&lt;/pubDate&gt;
	<a href="#data_thermal_thermalimage_thermalpixels">&lt;ThermalPixels&gt;...&lt;/ThermalPixels&gt;</a>
<strong>&lt;/ThermalImage&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains data collected from space, the air, or the ground that are used to create thermal images.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;volcanoCode&gt;
				<ul>
					<li>Description: The code of the volcano to which the data refer.</li>
					<li>Type: string of at most 12 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;instrumentCode&gt; OR &lt;stationCode&gt; OR &lt;satelliteCode&gt; OR &lt;airplaneCode&gt;
				<ul>
					<li>Description: The code in WOVOdat for the instrument/station/satellite/airplane which recorded these data.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;instPlatform&gt;
				<ul>
					<li>Description: A description of the instrument platform, for example on an airplane or satellite, or on a crater rim or roof of a hut.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;instLat&gt; AND &lt;instLon&gt;
				<ul>
					<li>Description: The latitude and longitude of the instrument during recording of image in decimal degrees. Please enter the location information for instruments on moving objects only.</li>
					<li>Type: a decimal value ranging from -90 (inclusive) to +90 (inclusive) for latitude and from -180 (inclusive) to +180 (inclusive) for longitude</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;datum&gt;
				<ul>
					<li>Description: The datum used for the longitude and latitude. Please also include the original datum.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;instAlt&gt;
				<ul>
					<li>Description: The altitude of the instrument during recording of image in meters above sea level. Please enter the location information for instruments on moving objects only.</li>
					<li>Type: float</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;description&gt;
				<ul>
					<li>Description: A description of the thermal image, for example a hot spot at summit that has increased in temperature over the past week.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;time&gt;
				<ul>
					<li>Description: The time the image was taken in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;timeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the time the image was taken.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;bandName&gt;
				<ul>
					<li>Description: The band name where each band is separated by a comma.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;highBandWavelength&gt;
				<ul>
					<li>Description: The high value of the band wavelength range in microns.</li>
					<li>Type: float</li>
					<li>Unit: &mu;m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;lowBandWavelength&gt;
				<ul>
					<li>Description: The low value of the band wavelength range in microns.</li>
					<li>Type: float</li>
					<li>Unit: &mu;m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;pixelSize&gt;
				<ul>
					<li>Description: The pixel size in meters.</li>
					<li>Type: float</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;maxRadiance&gt;
				<ul>
					<li>Description: The maximum radiance of any pixel in the frame in W/(m<sup>2</sup>-m) &times; 10<sup>7</sup>.</li>
					<li>Type: float</li>
					<li>Unit: W/(m<sup>2</sup>-m) &times; 10<sup>7</sup></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;maxRelativeRadiance&gt;
				<ul>
					<li>Description: The maximum relative radiance of any pixel in the frame in W/(m<sup>2</sup>-m &times; sr) &times; 10<sup>7</sup> where sr is spectral radiance, which is wavelength dependent.</li>
					<li>Type: float</li>
					<li>Unit: W/(m<sup>2</sup>-m &times; sr) &times; 10<sup>7</sup></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;hottestPixelTemp&gt;
				<ul>
					<li>Description: The temperature of the hottest pixel (if calibrated) in degrees Celsius.</li>
					<li>Type: float</li>
					<li>Unit: &deg;C</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;totRadiance&gt;
				<ul>
					<li>Description: Total radiance in the whole surface of the frame. This is an integration of all pixels radiances.</li>
					<li>Type: float</li>
					<li>Unit: W/(m<sup>2</sup>-m) &times; 10<sup>7</sup></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;maxHeatFlux&gt;
				<ul>
					<li>Description: The heat flux of the hottest pixel in W/m<sup>2</sup>.</li>
					<li>Type: float</li>
					<li>Unit: W/m<sup>2</sup></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;nominalTempRes&gt;
				<ul>
					<li>Description: The nominal temperature resolution (per pixel) in degrees Celsius.</li>
					<li>Type: float</li>
					<li>Unit: &deg;C</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;atmosCorrection&gt;
				<ul>
					<li>Description: The type of atmospheric correction procedure / method applied.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;thermCorrection&gt;
				<ul>
					<li>Description: The type of thermal correction procedure / method applied using ground truth points.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;orthorecProc&gt;
				<ul>
					<li>Description: The type of orthorectification procedure used, for example ESRI tool, rubber sheeting, etc.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;comments&gt;
				<ul>
					<li>Description: Additional comments on the measurement, instrument, etc.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;ownerCode&gt;
				<ul>
					<li>Description: The contact code in WOVOdat for the data collector.</li>
					<li>Type: string of at most 10 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The date these data can become public. This date can be set up to two years in advance.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;ThermalPixels&gt;
				<ul>
					<li>Description: See <a href="#data_thermal_thermalimage_thermalpixels">&lt;ThermalPixels&gt;</a>.</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Thermal - Thermal image - Thermal pixels -->
		<h2 class="wovomlclass"><a name="data_thermal_thermalimage_thermalpixels" id="data_thermal_thermalimage_thermalpixels"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_thermal">&lt;Thermal&gt;</a> | <a href="#data_thermal_thermalimage">&lt;ThermalImage&gt;</a> | &lt;ThermalPixels&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;ThermalPixels</strong>
	<a href="#data_thermal_thermalimage_thermalpixels_thermalpixel">&lt;ThermalPixel&gt;...&lt;/ThermalPixel&gt;</a>
<strong>&lt;/ThermalPixels&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains every pixels of a thermal image.</p>

		<h3>Elements</h3>
		<ul>
			<li>&lt;ThermalPixel&gt;
				<ul>
					<li>Description: See <a href="#data_thermal_thermalimage_thermalpixels_thermalpixel">&lt;ThermalPixel&gt;</a>.</li>
					<li>Number of occurrences: 1-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Thermal - Thermal image - Thermal pixels - Thermal pixel -->
		<h2 class="wovomlclass"><a name="data_thermal_thermalimage_thermalpixels_thermalpixel" id="data_thermal_thermalimage_thermalpixels_thermalpixel"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_thermal">&lt;Thermal&gt;</a> | <a href="#data_thermal_thermalimage">&lt;ThermalImage&gt;</a> | <a href="#data_thermal_thermalimage_thermalpixels">&lt;ThermalPixels&gt;</a> | &lt;ThermalPixel&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;ThermalPixel</strong>
	&lt;lat&gt;...&lt;/lat&gt;
	&lt;lon&gt;...&lt;/lon&gt;
	&lt;elev&gt;...&lt;/elev&gt;
	&lt;radiance&gt;...&lt;/radiance&gt;
	&lt;heatFlux&gt;...&lt;/heatFlux&gt;
	&lt;temperature&gt;...&lt;/temperature&gt;
<strong>&lt;/ThermalPixel&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains data for each pixel of a thermal image.</p>

		<h3>Elements</h3>
		<ul>
			<li>&lt;lat&gt; AND &lt;lon&gt;
				<ul>
					<li>Description: The latitude and longitude in decimal degrees.</li>
					<li>Type: a decimal value ranging from -90 (inclusive) to +90 (inclusive) for latitude and from -180 (inclusive) to +180 (inclusive) for longitude</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;elev&gt;
				<ul>
					<li>Description: The elevation at the pixel center in meters.</li>
					<li>Type: float</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;radiance&gt;
				<ul>
					<li>Description: The radiance of the pixel center in W/(m<sup>2</sup>-m) &times; 10<sup>7</sup>.</li>
					<li>Type: float</li>
					<li>Unit: W/(m<sup>2</sup>-m) &times; 10<sup>7</sup></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;heatFlux&gt;
				<ul>
					<li>Description: The heat flux at the pixel center in W/m<sup>2</sup>.</li>
					<li>Type: float</li>
					<li>Unit: W/m<sup>2</sup></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;temperature&gt;
				<ul>
					<li>Description: The temperature at the pixel center in degrees Celsius.</li>
					<li>Type: float</li>
					<li>Unit: &deg;C</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Seismic -->
		<h2 class="wovomlclass"><a name="data_seismic" id="data_seismic"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | &lt;Seismic&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;Seismic&gt;</strong>
	<a href="#data_seismic_networkevent">&lt;NetworkEvent&gt;...&lt;/NetworkEvent&gt;</a>
	<a href="#data_seismic_singlestationevent">&lt;SingleStationEvent&gt;...&lt;/SingleStationEvent&gt;</a>
	<a href="#data_seismic_intensity">&lt;Intensity&gt;...&lt;/Intensity&gt;</a>
	<a href="#data_seismic_tremor">&lt;Tremor&gt;...&lt;/Tremor&gt;</a>
	<a href="#data_seismic_waveform">&lt;Waveform&gt;...&lt;/Waveform&gt;</a>
	<a href="#data_seismic_interval">&lt;Interval&gt;...&lt;/Interval&gt;</a>
	<a href="#data_seismic_rsam-ssam">&lt;RSAM-SSAM&gt;...&lt;/RSAM-SSAM&gt;</a>
<strong>&lt;/Seismic&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about all seismic data for a volcano.</p>

		<h3>Elements</h3>
		<ul>
			<li>&lt;NetworkEvent&gt;
				<ul>
					<li>Description: See <a href="#data_seismic_networkevent">&lt;NetworkEvent&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;SingleStationEvent&gt;
				<ul>
					<li>Description: See <a href="#data_seismic_singlestationevent">&lt;SingleStationEvent&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;Intensity&gt;
				<ul>
					<li>Description: See <a href="#data_seismic_intensity">&lt;Intensity&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;Tremor&gt;
				<ul>
					<li>Description: See <a href="#data_seismic_tremor">&lt;Tremor&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;Waveform&gt;
				<ul>
					<li>Description: See <a href="#data_seismic_waveform">&lt;Waveform&gt;</a>.</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;Interval&gt;
				<ul>
					<li>Description: See <a href="#data_seismic_interval">&lt;Interval&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
			<li>&lt;RSAM-SSAM&gt;
				<ul>
					<li>Description: See <a href="#data_seismic_rsam-ssam">&lt;RSAM-SSAM&gt;</a>.</li>
					<li>Number of occurrences: 0-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Seismic - Network event -->
		<h2 class="wovomlclass"><a name="data_seismic_networkevent" id="data_seismic_networkevent"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_seismic">&lt;Seismic&gt;</a> | &lt;NetworkEvent&gt;</h2>
		
		<h3>Template</h3>
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
	pubDate...&lt;/pubDate&gt;
	<a href="#data_seismic_networkevent_waveform">&lt;Waveform&gt;...&lt;/Waveform&gt;</a>
<strong>&lt;/NetworkEvent&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains seismic data that were collected from several stations in a network and then processed to give a location.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;networkCode&gt;
				<ul>
					<li>Description: The code in WOVOdat for the network which recorded these data.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;seismoArchive&gt;
				<ul>
					<li>Description: Location of the seismogram archive, if available.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;originTime&gt;
				<ul>
					<li>Description: The time of the beginning of the event in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS.SSSS* (unlimited number of digits for sub-seconds)</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;originTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the time of the beginning of the event.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS.SSSS* (unlimited number of digits for sub-seconds)</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;duration&gt;
				<ul>
					<li>Description: Average duration of the earthquake as recorded at stations &lt;15 km from the volcano (in sec).</li>
					<li>Type: float</li>
					<li>Unit: s</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;durationUnc&gt;
				<ul>
					<li>Description: The uncertainty in the average duration of the earthquake as recorded at stations &lt;15 km from the volcano (in sec).</li>
					<li>Type: float</li>
					<li>Unit: s</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;locaTechnique&gt;
				<ul>
					<li>Description: The technique used to locate the event. Please include information about each recalculation such as "initial Hypo71, those locations recalculated using double difference".</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;picksDetermination&gt;
				<ul>
					<li>Description: A description of how the picks were determined.</li>
					<li>Type: A, R, H, U <em>(Automatic picker, Ruler hand-picked, Human using computer-based picker, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;lat&gt; AND &lt;lon&gt;
				<ul>
					<li>Description: The latitude and longitude in decimal degrees.</li>
					<li>Type: a decimal value ranging from -90 (inclusive) to +90 (inclusive) for latitude and from -180 (inclusive) to +180 (inclusive) for longitude</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;depth&gt;
				<ul>
					<li>Description: Estimated depth of the seismic event in kilometers.</li>
					<li>Type: float</li>
					<li>Unit: km</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;fixedDepth&gt;
				<ul>
					<li>Description: A flag to indicate that the depth was held fixed by the location algorithm.</li>
					<li>Type: Y, N, U <em>(Yes, No, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;numberOfStations&gt;
				<ul>
					<li>Description: The total number of seismic stations that reported arrival times for this earthquake.</li>
					<li>Type: integer number</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;numberOfPhases&gt;
				<ul>
					<li>Description: The total number of P and S arrival-time observations used to compute the hypocenter location.</li>
					<li>Type: integer number</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;largestAzimuthGap&gt;
				<ul>
					<li>Description: The largest azimuthal gap between azimuthally adjacent stations (in degrees, 0-360).</li>
					<li>Type: a decimal value ranging from 0 (inclusive) to 360 (inclusive)</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;distClosestStation&gt;
				<ul>
					<li>Description: Horizontal distance from the epicenter to the nearest station in km.</li>
					<li>Type: float</li>
					<li>Unit: km</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;travelTimeRMS&gt;
				<ul>
					<li>Description: The weighted root-mean-square (RMS) travel time residual, in sec.</li>
					<li>Type: float</li>
					<li>Unit: s</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;horizLocaErr&gt;
				<ul>
					<li>Description: The horizontal location error, in km, defined as the length of the largest projection of the three principal errors on a horizontal plane. The principal errors are the major axes of the error ellipsoid, and are mutually perpendicular.</li>
					<li>Type: float</li>
					<li>Unit: km</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;maxLonErr&gt;
				<ul>
					<li>Description: The maximum x (longitude) error, in km, for cases where the horizontal error is not given.</li>
					<li>Type: float</li>
					<li>Unit: km</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;maxLatErr&gt;
				<ul>
					<li>Description: The maximum y (latitude) error, in km, for cases where the horizontal error is not given.</li>
					<li>Type: float</li>
					<li>Unit: km</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;depthErr&gt;
				<ul>
					<li>Description: The depth error, in km, defined as the largest projection of the three principal errors on a vertical line.</li>
					<li>Type: float</li>
					<li>Unit: km</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;locaQuality&gt;
				<ul>
					<li>Description: The quality of the calculated location.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;primMagnitude&gt;
				<ul>
					<li>Description: The primary magnitude.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;primMagnitudeType&gt;
				<ul>
					<li>Description: The primary magnitude type, e.g., M<sub>s</sub>, M<sub>b</sub>, M<sub>w</sub>, M<sub>d</sub> (the last, duration or "coda" magnitude).</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;secMagnitude&gt;
				<ul>
					<li>Description: A secondary magnitude, where given.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;secMagnitudeType&gt;
				<ul>
					<li>Description: A secondary magnitude type.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;earthquakeType&gt;
				<ul>
					<li>Description: The original terminology for the earthquake type given by the observatory. (for example, VT, LP; A,B,C; HF, LF; other).</li>
					<li>Type: R, Q, V, VT, VT_D, VT_S, H, H_HLF, H_LHF, LF, LF_LP, LF_T, LF_ILF, VLP, E <em>(Click <a href="#">here</a> for details)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;momentTensorScale&gt;
				<ul>
					<li>Description: The scale of the following moment tensor data. Please store as a multiplier for the moment tensor data.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;momentTensorXX&gt;
				<ul>
					<li>Description: Moment tensor m_xx.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;momentTensorXY&gt;
				<ul>
					<li>Description: Moment tensor m_xy.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;momentTensorXZ&gt;
				<ul>
					<li>Description: Moment tensor m_xz.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;momentTensorYY&gt;
				<ul>
					<li>Description: Moment tensor m_yy.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;momentTensorYZ&gt;
				<ul>
					<li>Description: Moment tensor m_yz.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;momentTensorZZ&gt;
				<ul>
					<li>Description: Moment tensor m_zz.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;strike1&gt;
				<ul>
					<li>Description: Strike 1 of best double couple (0-360 degrees).</li>
					<li>Type: a decimal value ranging from 0 (inclusive) to 360 (inclusive)</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;strike1Unc&gt;
				<ul>
					<li>Description: The uncertainty in the value of strike 1.</li>
					<li>Type: float</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;dip1&gt;
				<ul>
					<li>Description: Dip 1 of best double couple (0-90 degrees).</li>
					<li>Type: a decimal value ranging from 0 (inclusive) to 90 (inclusive)</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;dip1Unc&gt;
				<ul>
					<li>Description: The uncertainty in the value of dip 1.</li>
					<li>Type: float</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;rake1&gt;
				<ul>
					<li>Description: Rake 1 of best double couple (0-90 degrees).</li>
					<li>Type: a decimal value ranging from 0 (inclusive) to 90 (inclusive)</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;rake1Unc&gt;
				<ul>
					<li>Description: The uncertainty in the value of rake 1.</li>
					<li>Type: float</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;strike2&gt;
				<ul>
					<li>Description: Strike 2 of best double couple, if available (0-360 degrees).</li>
					<li>Type: a decimal value ranging from 0 (inclusive) to 360 (inclusive)</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;strike2Unc&gt;
				<ul>
					<li>Description: The uncertainty in the value of strike 2.</li>
					<li>Type: float</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;dip2&gt;
				<ul>
					<li>Description: Dip 2 of best double couple, if available (0-90 degrees).</li>
					<li>Type: a decimal value ranging from 0 (inclusive) to 90 (inclusive)</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;dip2Unc&gt;
				<ul>
					<li>Description: The uncertainty in the value of dip 2.</li>
					<li>Type: float</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;rake2&gt;
				<ul>
					<li>Description: Rake 2 of best double couple, if available (0-90 degrees).</li>
					<li>Type: a decimal value ranging from 0 (inclusive) to 90 (inclusive)</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;rake2Unc&gt;
				<ul>
					<li>Description: The uncertainty in the value of rake 2.</li>
					<li>Type: float</li>
					<li>Unit: &deg;</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;sampleRate&gt;
				<ul>
					<li>Description: The sampling rate in Hz.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Unit: Hz</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;ownerCode&gt;
				<ul>
					<li>Description: The contact code in WOVOdat for the data collector.</li>
					<li>Type: string of at most 10 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The date these data can become public. This date can be set up to two years in advance.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;Waveform&gt;
				<ul>
					<li>Description: See <a href="#data_seismic_networkevent_waveform">&lt;Waveform&gt;</a>.</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Seismic - Network event - Waveform -->
		<h2 class="wovomlclass"><a name="data_seismic_networkevent_waveform" id="data_seismic_networkevent_waveform"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_seismic">&lt;Seismic&gt;</a> | <a href="#data_seismic_networkevent">&lt;NetworkEvent&gt;</a> | &lt;Waveform&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;Waveform code=&quot;...&quot;&gt;</strong>
	&lt;stationCode&gt;...&lt;/stationCode&gt;
	&lt;archive&gt;...&lt;/archive&gt;
	&lt;distSummit&gt;...&lt;/distSummit&gt;
	&lt;information&gt;...&lt;/information&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	pubDate...&lt;/pubDate&gt;
<strong>&lt;/Waveform&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains sample waveforms to highlight common and uncommon events at different volcanoes.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;stationCode&gt;
				<ul>
					<li>Description: The code in WOVOdat for the station which recorded these data.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;archive&gt;
				<ul>
					<li>Description: Location of seismogram archive. This information should be used to find additional waveforms beyond the representative waveforms stored here.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;distSummit&gt;
				<ul>
					<li>Description: The distance that the waveform was recorded from the summit.</li>
					<li>Type: D, I, P, U <em>(Distal (&gt; 5 km), Intermediate (2-5 km), Proximal (&lt; 2 km), Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;information&gt;
				<ul>
					<li>Description: Background information to include the event type in WOVOdat terminology, the volcano or approximate location where the event occurred, and a time.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;description&gt;
				<ul>
					<li>Description: Added description of the waveform. Include how often and when this kind of waveform occurs, and any interpretations.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;ownerCode&gt;
				<ul>
					<li>Description: The contact code in WOVOdat for the data collector.</li>
					<li>Type: string of at most 10 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The date these data can become public. This date can be set up to two years in advance.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Seismic - Single station event -->
		<h2 class="wovomlclass"><a name="data_seismic_singlestationevent" id="data_seismic_singlestationevent"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_seismic">&lt;Seismic&gt;</a> | &lt;SingleStationEvent&gt;</h2>
		
		<h3>Template</h3>
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
	pubDate...&lt;/pubDate&gt;
	<a href="#data_seismic_singlestationevent_waveform">&lt;Waveform&gt;...&lt;/Waveform&gt;</a>
<strong>&lt;/SingleStationEvent&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains seismic data that were collected from a single station and therefore no location can be calculated.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;stationCode&gt;
				<ul>
					<li>Description: The code in WOVOdat for the station which recorded these data.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The event start time (P phase) in UTC.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS.SSSS* (unlimited number of digits for sub-seconds)</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the event start time (P phase).</li>
					<li>Type: YYYY-MM-DD HH:MM:SS.SSSS* (unlimited number of digits for sub-seconds)</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;duration&gt;
				<ul>
					<li>Description: The length or duration of the event in seconds from the start time until a background level has returned.</li>
					<li>Type: float</li>
					<li>Unit: s</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;durationUnc&gt;
				<ul>
					<li>Description: The uncertainty in the length or duration of the event in seconds from the start time until a background level has returned.</li>
					<li>Type: float</li>
					<li>Unit: s</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;picksDetermination&gt;
				<ul>
					<li>Description: A description of how the picks were determined.</li>
					<li>Type: A, R, H, U <em>(Automatic picker, Ruler hand-picked, Human using computer-based picker, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;SPInterval&gt;
				<ul>
					<li>Description: The interval between the S and P start times in seconds.</li>
					<li>Type: float</li>
					<li>Unit: s</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;distActiveVent&gt;
				<ul>
					<li>Description: The approximate distance from where the event was recorded to the active vent.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;maxAmplitude&gt;
				<ul>
					<li>Description: The maximum amplitude of trace.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;sampleRate&gt;
				<ul>
					<li>Description: The sampling rate in Hz.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Unit: Hz</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;ownerCode&gt;
				<ul>
					<li>Description: The contact code in WOVOdat for the data collector.</li>
					<li>Type: string of at most 10 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The date these data can become public. This date can be set up to two years in advance.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;Waveform&gt;
				<ul>
					<li>Description: See <a href="#data_seismic_singlestationevent_waveform">&lt;Waveform&gt;</a>.</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Seismic - Single station event - Waveform -->
		<h2 class="wovomlclass"><a name="data_seismic_singlestationevent_waveform" id="data_seismic_singlestationevent_waveform"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_seismic">&lt;Seismic&gt;</a> | <a href="#data_seismic_singlestationevent">&lt;SingleStationEvent&gt;</a> | &lt;Waveform&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;Waveform code=&quot;...&quot;&gt;</strong>
	&lt;stationCode&gt;...&lt;/stationCode&gt;
	&lt;archive&gt;...&lt;/archive&gt;
	&lt;distSummit&gt;...&lt;/distSummit&gt;
	&lt;information&gt;...&lt;/information&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	pubDate...&lt;/pubDate&gt;
<strong>&lt;/Waveform&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains sample waveforms to highlight common and uncommon events at different volcanoes.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;stationCode&gt;
				<ul>
					<li>Description: The code in WOVOdat for the station which recorded these data.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;archive&gt;
				<ul>
					<li>Description: Location of seismogram archive. This information should be used to find additional waveforms beyond the representative waveforms stored here.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;distSummit&gt;
				<ul>
					<li>Description: The distance that the waveform was recorded from the summit.</li>
					<li>Type: D, I, P, U <em>(Distal (&gt; 5 km), Intermediate (2-5 km), Proximal (&lt; 2 km), Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;information&gt;
				<ul>
					<li>Description: Background information to include the event type in WOVOdat terminology, the volcano or approximate location where the event occurred, and a time.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;description&gt;
				<ul>
					<li>Description: Added description of the waveform. Include how often and when this kind of waveform occurs, and any interpretations.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;ownerCode&gt;
				<ul>
					<li>Description: The contact code in WOVOdat for the data collector.</li>
					<li>Type: string of at most 10 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The date these data can become public. This date can be set up to two years in advance.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Seismic - Intensity -->
		<h2 class="wovomlclass"><a name="data_seismic_intensity" id="data_seismic_intensity"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_seismic">&lt;Seismic&gt;</a> | &lt;Intensity&gt;</h2>
		
		<h3>Template</h3>
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
	pubDate...&lt;/pubDate&gt;
<strong>&lt;/Intensity&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about the intensities of events that may or may not have been recorded by a station.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;volcanoCode&gt;
				<ul>
					<li>Description: The code of the volcano to which the data refer.</li>
					<li>Type: string of at most 12 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;networkEventCode&gt; OR &lt;singleStationEventCode&gt;
				<ul>
					<li>Description: The code in WOVOdat for the probable network/single station event.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;time&gt;
				<ul>
					<li>Description: Approximate time of event (UTC).</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;timeUnc&gt;
				<ul>
					<li>Description: Uncertainty in the approximate time of event.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;city&gt;
				<ul>
					<li>Description: The name of the city or town where the event was felt.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;maxDistance&gt;
				<ul>
					<li>Description: The maximum distance at which the earthquake was felt, measured from the volcano summit in km.</li>
					<li>Type: float</li>
					<li>Unit: km</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;maxReported&gt;
				<ul>
					<li>Description: The maximum reported intensity (modified mercalli intensity).</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;distMaxReported&gt;
				<ul>
					<li>Description: The distance from the volcano's summit to where the maximum intensity was reported in km.</li>
					<li>Type: float</li>
					<li>Unit: km</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;ownerCode&gt;
				<ul>
					<li>Description: The contact code in WOVOdat for the data collector.</li>
					<li>Type: string of at most 10 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The date these data can become public. This date can be set up to two years in advance.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Seismic - Tremor -->
		<h2 class="wovomlclass"><a name="data_seismic_tremor" id="data_seismic_tremor"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_seismic">&lt;Seismic&gt;</a> | &lt;Tremor&gt;</h2>
		
		<h3>Template</h3>
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
	pubDate...&lt;/pubDate&gt;
	<a href="#data_seismic_tremor_waveform">&lt;Waveform&gt;...&lt;/Waveform&gt;</a>
<strong>&lt;/Tremor&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information about tremor such as the time interval, qualitative depth, dominant frequency, amplitude range, and reduced displacement.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;networkCode&gt; OR &lt;stationCode&gt;
				<ul>
					<li>Description: The code in WOVOdat for the network/station which recorded these data.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;type&gt;
				<ul>
					<li>Description: The type and a description of the tremor, e.g., any temporal pattern such as banding, spasmodic bursts, etc. Use N for narrow band or B for broadband and include the frequency range. Broadband includes spasmodic bursts and should span a frequency range greater than 3 Hz.</li>
					<li>Type: G, M, H, C <em>(Click <a href="#">here</a> for details)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;qualitativeDepth&gt;
				<ul>
					<li>Description: The qualitative depth of the tremor.</li>
					<li>Type: D, I, S, U <em>(Deep (&gt; 10 km), Intermediate (4-10 km), Shallow (&lt; 4 km), Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;dominantFreq&gt;
				<ul>
					<li>Description: The dominant frequency (in Hz).</li>
					<li>Type: float</li>
					<li>Unit: Hz</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;secondDominantFreq&gt;
				<ul>
					<li>Description: The second dominant frequency (if any, in Hz).</li>
					<li>Type: float</li>
					<li>Unit: Hz</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;maxAmplitude&gt;
				<ul>
					<li>Description: The maximum amplitude of tremor.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;backgroundNoise&gt;
				<ul>
					<li>Description: The background noise level.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;reducedDisp&gt;
				<ul>
					<li>Description: The reduced displacement (as estimated using a station >5km from source to minimize the effects of geometrical spreading).</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;reducedDispUnc&gt;
				<ul>
					<li>Description: The reduced displacement error.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;visibleActivity&gt;
				<ul>
					<li>Description: A description of any associated visible activity.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The start time (UTC).</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the start time.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The end time (UTC).</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the end time.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;durationPerDay&gt;
				<ul>
					<li>Description: The total duration of tremor for each day in minutes.</li>
					<li>Type: float</li>
					<li>Unit: min</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;durationPerDayUnc&gt;
				<ul>
					<li>Description: The uncertainty in the total duration of tremor for each day in minutes.</li>
					<li>Type: float</li>
					<li>Unit: min</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;ownerCode&gt;
				<ul>
					<li>Description: The contact code in WOVOdat for the data collector.</li>
					<li>Type: string of at most 10 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The date these data can become public. This date can be set up to two years in advance.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;Waveform&gt;
				<ul>
					<li>Description: See <a href="#data_seismic_tremor_waveform">&lt;Waveform&gt;</a>.</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Seismic - Tremor - Waveform -->
		<h2 class="wovomlclass"><a name="data_seismic_tremor_waveform" id="data_seismic_tremor_waveform"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_seismic">&lt;Seismic&gt;</a> | <a href="#data_seismic_tremor">&lt;Tremor&gt;</a> | &lt;Waveform&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;Waveform code=&quot;...&quot;&gt;</strong>
	&lt;stationCode&gt;...&lt;/stationCode&gt;
	&lt;archive&gt;...&lt;/archive&gt;
	&lt;distSummit&gt;...&lt;/distSummit&gt;
	&lt;information&gt;...&lt;/information&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	pubDate...&lt;/pubDate&gt;
<strong>&lt;/Waveform&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains sample waveforms to highlight common and uncommon events at different volcanoes.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;stationCode&gt;
				<ul>
					<li>Description: The code in WOVOdat for the station which recorded these data.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;archive&gt;
				<ul>
					<li>Description: Location of seismogram archive. This information should be used to find additional waveforms beyond the representative waveforms stored here.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;distSummit&gt;
				<ul>
					<li>Description: The distance that the waveform was recorded from the summit.</li>
					<li>Type: D, I, P, U <em>(Distal (&gt; 5 km), Intermediate (2-5 km), Proximal (&lt; 2 km), Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;information&gt;
				<ul>
					<li>Description: Background information to include the event type in WOVOdat terminology, the volcano or approximate location where the event occurred, and a time.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;description&gt;
				<ul>
					<li>Description: Added description of the waveform. Include how often and when this kind of waveform occurs, and any interpretations.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;ownerCode&gt;
				<ul>
					<li>Description: The contact code in WOVOdat for the data collector.</li>
					<li>Type: string of at most 10 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The date these data can become public. This date can be set up to two years in advance.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Seismic - Waveform -->
		<h2 class="wovomlclass"><a name="data_seismic_waveform" id="data_seismic_waveform"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_seismic">&lt;Seismic&gt;</a> | &lt;Waveform&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;Waveform code=&quot;...&quot;&gt;</strong>
	&lt;networkEventCode&gt;...&lt;/networkEventCode&gt;		&lt;!-- OR &lt;singleStationEventCode&gt;...&lt;/singleStationEventCode&gt; OR &lt;tremorCode&gt;...&lt;/tremorCode&gt; --&gt;
	&lt;stationCode&gt;...&lt;/stationCode&gt;
	&lt;archive&gt;...&lt;/archive&gt;
	&lt;distSummit&gt;...&lt;/distSummit&gt;
	&lt;information&gt;...&lt;/information&gt;
	&lt;description&gt;...&lt;/description&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	pubDate...&lt;/pubDate&gt;
<strong>&lt;/Waveform&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains sample waveforms to highlight common and uncommon events at different volcanoes.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;networkEventCode&gt; OR &lt;singleStationEventCode&gt; OR &lt;tremorCode&gt;
				<ul>
					<li>Description: The code in WOVOdat for the probable network/single station/tremor event.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;stationCode&gt;
				<ul>
					<li>Description: The code in WOVOdat for the station which recorded these data.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;archive&gt;
				<ul>
					<li>Description: Location of seismogram archive. This information should be used to find additional waveforms beyond the representative waveforms stored here.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;distSummit&gt;
				<ul>
					<li>Description: The distance that the waveform was recorded from the summit.</li>
					<li>Type: D, I, P, U <em>(Distal (&gt; 5 km), Intermediate (2-5 km), Proximal (&lt; 2 km), Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;information&gt;
				<ul>
					<li>Description: Background information to include the event type in WOVOdat terminology, the volcano or approximate location where the event occurred, and a time.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;description&gt;
				<ul>
					<li>Description: Added description of the waveform. Include how often and when this kind of waveform occurs, and any interpretations.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;ownerCode&gt;
				<ul>
					<li>Description: The contact code in WOVOdat for the data collector.</li>
					<li>Type: string of at most 10 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The date these data can become public. This date can be set up to two years in advance.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Seismic - Interval -->
		<h2 class="wovomlclass"><a name="data_seismic_interval" id="data_seismic_interval"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_seismic">&lt;Seismic&gt;</a> | &lt;Interval&gt;</h2>
		
		<h3>Template</h3>
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
	pubDate...&lt;/pubDate&gt;
<strong>&lt;/Interval&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains data about earthquakes that occur in specified time intervals, e.g., as seismic swarms.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;networkCode&gt; OR &lt;stationCode&gt;
				<ul>
					<li>Description: The code in WOVOdat for the network/station which recorded these data.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;earthquakeType&gt;
				<ul>
					<li>Description: The original terminology for the earthquake type given by the observatory. (for example, VT, LP; A,B,C; HF, LF; other).</li>
					<li>Type: R, Q, V, VT, VT_D, VT_S, H, H_HLF, H_LHF, LF, LF_LP, LF_T, LF_ILF, VLP, E <em>(Click <a href="#">here</a> for details)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;hDistSummit&gt;
				<ul>
					<li>Description: The horizontal distance from the summit to the swarm center in km.</li>
					<li>Type: float</li>
					<li>Unit: km</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;meanDepth&gt;
				<ul>
					<li>Description: Mean depth of the swarm earthquakes in m.</li>
					<li>Type: float</li>
					<li>Unit: m</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;verticalDisp&gt;
				<ul>
					<li>Description: Range (dispersion) of depths over which these swarm earthquakes occurred.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;hypocenterHMigr&gt;
				<ul>
					<li>Description: Any horizontal migration of hypocenters from/to the summit in km (use positive numbers for outward and negative numbers for inward).</li>
					<li>Type: float</li>
					<li>Unit: km</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;hypocenterVMigr&gt;
				<ul>
					<li>Description: Any vertical migration of hypocenters in km (use positive numbers for up and negative numbers for down).</li>
					<li>Type: float</li>
					<li>Unit: km</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;temporalPattern&gt;
				<ul>
					<li>Description: The temporal pattern of the swarm.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;dataType&gt;
				<ul>
					<li>Description: A description of the types of data included in the earthquake counts.</li>
					<li>Type: L, C, H, U <em>(Located, Computer trigger algorithm detected, Hand counted, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;picksDetermination&gt;
				<ul>
					<li>Description: A description of how the picks were determined.</li>
					<li>Type: A, R, H, U <em>(Automatic picker, Ruler hand-picked, Human using computer-based picker, Unknown)</em></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;numbOfRecEq&gt;
				<ul>
					<li>Description: The recorded earthquake count during the specified time interval.</li>
					<li>Type: integer number</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;numbOfFeltEq&gt;
				<ul>
					<li>Description: The number of felt earthquakes for this interval.</li>
					<li>Type: integer number</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;feltEqCntStartTime&gt;
				<ul>
					<li>Description: The felt earthquake counts measurement start time (UTC).</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;feltEqCntStartTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the felt earthquake counts measurement start time.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;feltEqCntEndTime&gt;
				<ul>
					<li>Description: The felt earthquake counts measurement stop time (UTC).</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;feltEqCntEndTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the felt earthquake counts measurement end time.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;energyRelease&gt;
				<ul>
					<li>Description: The total seismic energy release (seismic moment) for this swarm interval in erg<sup>-0.5</sup>.</li>
					<li>Type: float</li>
					<li>Unit: erg<sup>-0.5</sup></li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;energyMeasStartTime&gt;
				<ul>
					<li>Description: The total seismic energy release (seismic moment) measurement start time (UTC).</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;energyMeasStartTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the total seismic energy release (seismic moment) measurement start time.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;energyMeasEndTime&gt;
				<ul>
					<li>Description: The total seismic energy release (seismic moment) measurement stop time (UTC).</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;energyMeasEndTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the total seismic energy release (seismic moment) measurement end time.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The start time (UTC) of this interval based on instrument recordings.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the start time of this interval based on instrument recordings.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The end time (UTC) of this interval based on instrument recordings.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the end time of this interval based on instrument recordings.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;description&gt;
				<ul>
					<li>Description: A description of the swarms or interval data and any uncertainties in the data such as location.</li>
					<li>Type: string of at most 255 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;ownerCode&gt;
				<ul>
					<li>Description: The contact code in WOVOdat for the data collector.</li>
					<li>Type: string of at most 10 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The date these data can become public. This date can be set up to two years in advance.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Seismic - RSAM-SSAM -->
		<h2 class="wovomlclass"><a name="data_seismic_rsam-ssam" id="data_seismic_rsam-ssam"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_seismic">&lt;Seismic&gt;</a> | &lt;RSAM-SSAM&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;RSAM-SSAM code=&quot;...&quot;&gt;</strong>
	&lt;stationCode&gt;...&lt;/stationCode&gt;
	&lt;cntInterval&gt;...&lt;/cntInterval&gt;
	&lt;cntIntervalUnc&gt;...&lt;/cntIntervalUnc&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
	&lt;endTime&gt;...&lt;/endTime&gt;
	&lt;endTimeUnc&gt;...&lt;/endTimeUnc&gt;
	&lt;ownerCode&gt;...&lt;/ownerCode&gt;
	pubDate...&lt;/pubDate&gt;
	<a href="#data_seismic_rsam-ssam_rsam">&lt;RSAM&gt;...&lt;/RSAM&gt;</a>
	<a href="#data_seismic_rsam-ssam_ssam">&lt;SSAM&gt;...&lt;/SSAM&gt;</a>
<strong>&lt;/RSAM-SSAM&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains information needed to create RSAM and SSAM images. These techniques were developed by the USGS to summarize seismic activity in real-time during volcanic crises. The techniques use the amplitudes and frequencies of seismic signals instead of the locations and magnitudes of the earthquakes, which makes them an ideal tool for rapid analysis during periods of time when seismicity has reached a level at which individual seismic events are difficult to distinguish.</p>

		<h3>Attributes</h3>
		<ul>
			<li>code
				<ul>
					<li>Description: A unique code/ID that can be used for finding these data in WOVOdat later.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Required: Yes</li>
				</ul>
			</li>
		</ul>
		
		<h3>Elements</h3>
		<ul>
			<li>&lt;stationCode&gt;
				<ul>
					<li>Description: The code in WOVOdat for the station which recorded these data.</li>
					<li>Type: string of at most 30 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;cntInterval&gt;
				<ul>
					<li>Description: The time interval in seconds for each measurement bin.</li>
					<li>Type: float</li>
					<li>Unit: s</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;cntIntervalUnc&gt;
				<ul>
					<li>Description: The uncertainty in the time interval in seconds for each measurement bin.</li>
					<li>Type: float</li>
					<li>Unit: s</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The measurement start time (UTC) of RSAM or SSAM measurements.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the measurement start time of RSAM or SSAM measurements.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;endTime&gt;
				<ul>
					<li>Description: The measurement end time (UTC) of RSAM or SSAM measurements.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;endTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the measurement end time of RSAM or SSAM measurements.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;ownerCode&gt;
				<ul>
					<li>Description: The contact code in WOVOdat for the data collector.</li>
					<li>Type: string of at most 10 characters</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>pubDate
				<ul>
					<li>Description: The date these data can become public. This date can be set up to two years in advance.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;RSAM&gt;
				<ul>
					<li>Description: See <a href="#data_seismic_rsam-ssam_rsam">&lt;RSAM&gt;</a>.</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;SSAM&gt;
				<ul>
					<li>Description: See <a href="#data_seismic_rsam-ssam_ssam">&lt;SSAM&gt;</a>.</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Seismic - RSAM-SSAM - RSAM -->
		<h2 class="wovomlclass"><a name="data_seismic_rsam-ssam_rsam" id="data_seismic_rsam-ssam_rsam"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_seismic">&lt;Seismic&gt;</a> | <a href="#data_seismic_rsam-ssam">&lt;RSAM-SSAM&gt;</a> | &lt;RSAM&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;RSAM&gt;</strong>
	<a href="#data_seismic_rsam-ssam_rsam_rsamdata">&lt;RSAMData&gt;...&lt;/RSAMData&gt;</a>
<strong>&lt;/RSAM&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains the data needed to create an RSAM image.</p>

		<h3>Elements</h3>
		<ul>
			<li>&lt;RSAMData&gt;
				<ul>
					<li>Description: See <a href="#data_seismic_rsam-ssam_rsam_rsamdata">&lt;RSAMData&gt;</a>.</li>
					<li>Number of occurrences: 1-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- RSAM data -->
		<h2 class="wovomlclass"><a name="data_seismic_rsam-ssam_rsam_rsamdata" id="data_seismic_rsam-ssam_rsam_rsamdata"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_seismic">&lt;Seismic&gt;</a> | <a href="#data_seismic_rsam-ssam">&lt;RSAM-SSAM&gt;</a> | <a href="#data_seismic_rsam-ssam_rsam">&lt;RSAM&gt;</a> | &lt;RSAMData&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;RSAMData&gt;</strong>
	&lt;cnt&gt;...&lt;/cnt&gt;
	&lt;calibration&gt;...&lt;/calibration&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
<strong>&lt;/RSAMData&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains a part of the data needed to create an RSAM image.</p>

		<h3>Elements</h3>
		<ul>
			<li>&lt;cnt&gt;
				<ul>
					<li>Description: The RSAM count during this interval.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;calibration&gt;
				<ul>
					<li>Description: The reduced displacement per 100 RSAM counts.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The starting time for the given interval.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the starting time for the given interval.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Seismic - RSAM-SSAM - SSAM -->
		<h2 class="wovomlclass"><a name="data_seismic_rsam-ssam_ssam" id="data_seismic_rsam-ssam_ssam"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_seismic">&lt;Seismic&gt;</a> | <a href="#data_seismic_rsam-ssam">&lt;RSAM-SSAM&gt;</a> | &lt;SSAM&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;SSAM&gt;</strong>
	<a href="#data_seismic_rsam-ssam_ssam_ssamdata">&lt;SSAMData&gt;...&lt;/SSAMData&gt;</a>
<strong>&lt;/SSAM&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains the data needed to create an SSAM image.</p>

		<h3>Elements</h3>
		<ul>
			<li>&lt;SSAMData&gt;
				<ul>
					<li>Description: See <a href="#data_seismic_rsam-ssam_ssam_ssamdata">&lt;SSAMData&gt;</a>.</li>
					<li>Number of occurrences: 1-<em class="infin">&infin;</em></li>
				</ul>
			</li>
		</ul>
		
		<h2>&nbsp;</h2>
		<p class="backtotop"><a href="#top">Back to top</a></p>
		
		<!-- Data - Seismic - RSAM-SSAM - SSAM - SSAM data -->
		<h2 class="wovomlclass"><a name="data_seismic_rsam-ssam_ssam_ssamdata" id="data_seismic_rsam-ssam_ssam_ssamdata"></a><a href="#wovoml">&lt;wovoml&gt;</a> | <a href="#data">&lt;Data&gt;</a> | <a href="#data_seismic">&lt;Seismic&gt;</a> | <a href="#data_seismic_rsam-ssam">&lt;RSAM-SSAM&gt;</a> | <a href="#data_seismic_rsam-ssam_ssam">&lt;SSAM&gt;</a> | &lt;SSAMData&gt;</h2>
		
		<h3>Template</h3>
<pre><strong>&lt;SSAMData&gt;</strong>
	&lt;lowFreq&gt;...&lt;/lowFreq&gt;
	&lt;highFreq&gt;...&lt;/highFreq&gt;
	&lt;cnt&gt;...&lt;/cnt&gt;
	&lt;calibration&gt;...&lt;/calibration&gt;
	&lt;startTime&gt;...&lt;/startTime&gt;
	&lt;startTimeUnc&gt;...&lt;/startTimeUnc&gt;
<strong>&lt;/SSAMData&gt;</strong></pre>
		
		<h3>Description</h3>
		<p>This class contains a part of the data needed to create an SSAM image.</p>

		<h3>Elements</h3>
		<ul>
			<li>&lt;lowFreq&gt;
				<ul>
					<li>Description: The low frequency limit in Hz for this frequency range.</li>
					<li>Type: float</li>
					<li>Unit: Hz</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;highFreq&gt;
				<ul>
					<li>Description: The high frequency limit in Hz for this frequency range.</li>
					<li>Type: float</li>
					<li>Unit: Hz</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;cnt&gt;
				<ul>
					<li>Description: The SSAM count for this time and frequency interval.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;calibration&gt;
				<ul>
					<li>Description: The reduced displacement per 100 SSAM counts for the specified frequency range.</li>
					<li>Type: float</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
			<li>&lt;startTime&gt;
				<ul>
					<li>Description: The starting time for the given interval.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 1</li>
				</ul>
			</li>
			<li>&lt;startTimeUnc&gt;
				<ul>
					<li>Description: The uncertainty in the starting time for the given interval.</li>
					<li>Type: YYYY-MM-DD HH:MM:SS</li>
					<li>Number of occurrences: 0-1</li>
				</ul>
			</li>
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