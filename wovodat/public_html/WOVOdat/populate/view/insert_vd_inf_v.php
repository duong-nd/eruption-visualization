<?php
function showUpdateTableList($vol,$obs){

$i="";
$j="";
$t="";
$r="";

$status=array('Anthropology','Ar/Ar','Dendrochronology','Fumarolic','Historical','Holocene','Holocene?','Hot Springs','Hydration Rind','Hydrophonic','Ice Core','Lichenometry','Magnetism','Pleistocene','Potassium-Argon','Radiocarbon','Seismicity','Surface Exposure','Tephrochronology','Thermoluminescence','Uncertain','Uranium-series','Varve Count','Unknown');

$type=array('Caldera','Cinder cone','Complex volcano','Compound volcano','Cone','Crater rows','Explosion craters','Fissure vent','Hydrothermal field','Lava cone','Lava dome','Maar','Pumice cone','Pyroclastic cone','Pyroclastic shield','Scoria cone','Shield volcano','Somma volcano','Stratovolcano','Subglacial volcano','Submarine volcano','Tuff cone','Tuff ring','Unknown','Volcanic complex','Volcanic field');

$rtype=array('Andesite/Basaltic Andesite','Basalt','Basalt/Picro-Basalt','Dacite','Foidite','Phonolite','Phonotephrite','Phono-tephrite/Tephri-phonolite',' Trachyte/Trachyandesite','Trachybasalt/Tephrite Basanite','Trachyandesite/Basaltic trachy-andesite','Trachyandesite','Trachyte','Rhyolite','Unknown');

echo <<<HTMLBLOCK
		<!-- Content -->

		<div id="content" style="overflow:auto;">
		<!-- Page content -->
		
		<h2 style="text-align:center;">Upload form for Volcano Information.  Table : vd_inf </h2> <br/>

		<p class="formFont">The fields preceded by an asterisk (*) are required.</p> <br/>
		<!-- Form -->
		<form method="post" action="insertSwitch.php" name="form_vd_inf" id="form_vd_inf">
			
			<table class="formtable" id="formtable">
				<tr>
					<td><span class="formFont">*Volcano Name:</span></td>
					<td> 
					
						<select id="vd_id" name="vd_id" >
							<option value="">Select Volcano</option>
HTMLBLOCK;
							for($i=0; $i<sizeof($vol); $i++){
								echo"<option value=\"{$vol[$i][0]}\"> {$vol[$i][1]} </option>";
							}
echo <<<HTMLBLOCK
						</select>
					</td>
				</tr>
				<tr>
					<td><span class="formFont">*Volcano Info CAVW:</span>  </td>
					<td>
						<input type="text" maxlength="15" id="vd_inf_cavw" name="vd_inf_cavw" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">*Volcano Status:</span></td>
					<td>
						<select id="vd_inf_status" name="vd_inf_status" >
							<option value="">Select Volcano Status</option>
HTMLBLOCK;
	
						for($j=0; $j<sizeof($status); $j++){ 
							echo"<option value=\"{$status[$j]}\"> {$status[$j]} </option>";
						}
echo <<<HTMLBLOCK
						</select>
					</td>
				</tr>
				<tr>
					<td><span class="formFont">Description:</span> </td>
					<td>
						<textarea id="vd_inf_desc" name="vd_inf_desc" cols="30" rows="2" maxlength="1200"></textarea>
						
					</td>
				</tr>
				<tr>
					<td><span class="formFont">*Summit Latitude:</span> </td>
					<td>
						<input type="text" id="vd_inf_slat" name="vd_inf_slat" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">*Summit Longitude:</span></td>
					<td>
						<input type="text" id="vd_inf_slon" name="vd_inf_slon" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">*Summit Elevation:</span></td>
					<td>
						<input type="text" id="vd_inf_selev" name="vd_inf_selev" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">*Volcano Type:</span></td>
					<td>
						<select id="vd_inf_type" name="vd_inf_type" >
							<option value="">Select Volcano Type</option>
HTMLBLOCK;
							for($t=0; $t<sizeof($type); $t++){
								echo"<option value=\"{$type[$t]}\"> {$type[$t]} </option>";
							}
echo <<<HTMLBLOCK
						</select>
					</td>
				</tr>
<!--
				<tr>
					<td><span class="formFont">Country:</span> </td>
					<td>
						<input type="text" maxlength="30" id="vd_inf_country" name="vd_inf_country" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">Sub-region:</span> (max 30 characters)</td>
					<td>
						<input type="text" maxlength="30" id="vd_inf_subreg" name="vd_inf_subreg" value="" />
					</td>
				</tr>	
-->				
				<tr>
					<td><span class="formFont">Geographic Location:</span></td>
					<td>
						<input type="text" maxlength="30" id="vd_inf_loc" name="vd_inf_loc" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">*Dominant Rock Type:</span></td>
					<td>
						<select id="vd_inf_rtype" name="vd_inf_rtype" >
							<option value="">Select Rock Type</option>
HTMLBLOCK;
		
							for($r=0; $r<sizeof($rtype); $r++){
								echo"<option value=\"{$rtype[$r]}\"> {$rtype[$r]} </option>";
							}
							
echo <<<HTMLBLOCK
						</select>
					</td>
				</tr>
				<tr>
					<td><span class="formFont">Volume Of Edifice:</span></td>
					<td>
						<input type="text" id="vd_inf_evol" name="vd_inf_evol" value="" />
					</td>
				</tr>	
				<tr>
					<td><span class="formFont">Number Of Calderas:</span></td>
					<td>
						<input type="text" maxlength="4" id="vd_inf_numcald" name="vd_inf_numcald" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">Diameter Of Largest Caldera:</span></td>
					<td>
						<input type="text" id="vd_inf_lcald_dia" name="vd_inf_lcald_dia" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">Latitude Of Youngest Caldera:</span></td>
					<td>
						<input type="text" id="vd_inf_ycald_lat" name="vd_inf_ycald_lat" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">Longitude Of Youngest Caldera:</span></td>
					<td>
						<input type="text" id="vd_inf_ycald_lon" name="vd_inf_ycald_lon" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">*Start Time:</span></td>
					<td>
						<input type="text" id="vd_inf_stime" name="vd_inf_stime" value="" />
					</td>
				</tr>
				<tr> 
					<td><span class="formFont">Start Time Uncertainty:</span></td>
					<td>
						<input type="text" id="vd_inf_stime_unc" name="vd_inf_stime_unc" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">End Time:</span></td>
					<td>
						<input type="text" id="vd_inf_etime" name="vd_inf_etime" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">End Time Uncertainty:</span></td>
					<td>
						<input type="text" id="vd_inf_etime_unc" name="vd_inf_etime_unc" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">Comment:</span> </td>
					<td>
						<input type="text" maxlength="255" id="vd_inf_com" name="vd_inf_com" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">*Institution/Observatory:</span></td>
					<td>
						<select id="cc_id" name="cc_id" >
							<option value="">Select Institution/Obs.</option>
HTMLBLOCK;
							for($i=0; $i<sizeof($obs); $i++){
								echo"<option value=\"{$obs[$i][0]}\"> {$obs[$i][1]} - {$obs[$i][2]} </option>";
							}
echo <<<HTMLBLOCK
						</select>					
					</td>
				</tr>
				<input type="hidden" name="vd_inf_loaddate" value="" />
				<tr>
					<td><span class="formFont">Publish Date:</span></td>
					<td>
						<input type="text" id="vd_inf_pubdate" name="vd_inf_pubdate" value="" />
					</td>
				</tr>
		
			</table>
			
			<div style="padding:10px 130px;" >

			<input type="hidden" name="cc_id_load" value="{$_SESSION['login']['cc_id']}" />
			<input type="button" id="back" name="back" value="Back to previous page" />
			<input type="submit" name="confirm" value="Confirm" />
			</div>
		</form>  
		 
		</div>  <!-- end page content div -->
HTMLBLOCK;
}

?>