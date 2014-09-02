<?php


function showUpdateTableList(){
echo <<< HTMLBLOCK

	
			<!-- Page content -->
			<h1>Upload Data with Form</h1>
			<p>Type of Data to upload:</p>
			<ul>
				<li><p><a href="controller/insert_cb.php">Bibliographic</a></p></li>
				<li><p>Inferred processes</p>
					<ul>
						<li><p><a href="controller/insert_ip.php?type=ip_hyd">Hydrothermal system interaction</a></p></li>
						<li><p><a href="controller/insert_ip.php?type=ip_mag">Magma movement</a></p></li>
						<li><p><a href="controller/insert_ip.php?type=ip_pres">Buildup of magma pressure</a></p></li>
						<li><p><a href="controller/insert_ip.php?type=ip_sat">Volatile saturation</a></p></li>
						<li><p><a href="controller/insert_ip.php?type=ip_tec">Regional tectonics interaction</a></p></li>
					</ul>
				</li>
				<li><p>Volcano</p>
					<ul>
						<li><p><a href="controller/insert_vd.php">Volcano</a></p></li>
						<li><p><a href="controller/insert_vd_inf.php">Volcano Information</a></p></li>
						<li><p><a href="controller/insert_vd_mag.php">Magma chamber</a></p></li>
						<li><p><a href="controller/insert_vd_tec.php">Tectonic setting</a></p></li>
					</ul>
				</li>				
				<li><p><a href="controller/insert_co.php">Observation about volcanic activity</a></p></li>
				<li><p><a href="controller/insert_cc.php">Observatory Contact Information</a></p></li>
			</ul>

		
HTMLBLOCK;
}