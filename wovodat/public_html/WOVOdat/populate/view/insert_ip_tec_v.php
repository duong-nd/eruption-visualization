<?php
function showUpdateTableList($vol,$obs,$cbs){

$i="";

echo <<<HTMLBLOCK
		<!-- Content -->

		<div id="content" style="overflow:auto;">
		<!-- Page content -->
		
		<h2 style="text-align:center;">Upload form for Regional tectonics interaction Information.  Table : ip_tec</h2>
		
		<p class="formFont">The fields preceded by an asterisk (*) are required.</p> 
		<!-- Form -->
		<form method="post" action="insertSwitch.php" name="form_ip_tec" id="form_ip_tec">
			
			<table class="formtable" id="formtable">

				<tr>
					<td><span class="formFont">*Unique Code:</span> </td>
					
					<td>
						<input type="text" maxlength="30" id="ip_tec_code" name="ip_tec_code" value="" />
					</td>
				</tr>
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
					<td><span class="formFont">Inference time:</span></td>
					<td>
						<input type="text" id="ip_tec_time" name="ip_tec_time" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">Inference time uncertainty:</span></td>
					<td>
						<input type="text" id="ip_tec_time_unc" name="ip_tec_time_unc" value="" />
					</td>
				</tr>				
				<tr>
					<td><span class="formFont">*Start Time:</span></td>
					<td>
						<input type="text" id="ip_tec_start" name="ip_tec_start" value="" />
					</td>
				</tr>
				<tr> 
					<td><span class="formFont">Start Time Uncertainty:</span></td>
					<td>
						<input type="text" id="ip_tec_start_unc" name="ip_tec_start_unc" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">End Time:</span></td>
					<td>
						<input type="text" id="ip_tec_end" name="ip_tec_end" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">End Time Uncertainty:</span></td>
					<td>
						<input type="text" id="ip_tec_end_unc" name="ip_tec_end_unc" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">*Tectonically induced changes in magma/hydrothermal system:</span></td>
					<td>
						<input type="radio" id="ip_tec_change" name="ip_tec_change" value="Y">Yes</input>
						<input type="radio" id="ip_tec_change" name="ip_tec_change" value="N">No</input>
						<input type="radio" id="ip_tec_change" name="ip_tec_change" value="M">Maybe</input>
						<input type="radio" id="ip_tec_change" name="ip_tec_change" checked="yes" value="U">Unknown</input>						
					</td>
				</tr>				
				<tr>
					<td><span class="formFont">*Changes induced by changes in static stress after large regional earthquakes:</span></td>
					<td>
						<input type="radio" id="ip_tec_sstress" name="ip_tec_sstress" value="Y">Yes</input>
						<input type="radio" id="ip_tec_sstress" name="ip_tec_sstress" value="N">No</input>
						<input type="radio" id="ip_tec_sstress" name="ip_tec_sstress" value="M">Maybe</input>
						<input type="radio" id="ip_tec_sstress" name="ip_tec_sstress" checked="yes" value="U">Unknown</input>						
					</td>
				</tr>					
				<tr>
					<td><span class="formFont">*Changes induced by dynamic strain, associated with passage of earthquake waves from distal sources :</span></td>
					<td>
						<input type="radio" id="ip_tec_dstrain" name="ip_tec_dstrain" value="Y">Yes</input>
						<input type="radio" id="ip_tec_dstrain" name="ip_tec_dstrain" value="N">No</input>
						<input type="radio" id="ip_tec_dstrain" name="ip_tec_dstrain" value="M">Maybe</input>
						<input type="radio" id="ip_tec_dstrain" name="ip_tec_dstrain" checked="yes" value="U">Unknown</input>						
					</td>
				</tr>
				<tr>
					<td><span class="formFont">*Changes induced by local fault shear or other deformation of the cone:</span></td>
					<td>
						<input type="radio" id="ip_tec_fault" name="ip_tec_fault" value="Y">Yes</input>
						<input type="radio" id="ip_tec_fault" name="ip_tec_fault" value="N">No</input>
						<input type="radio" id="ip_tec_fault" name="ip_tec_fault" value="M">Maybe</input>
						<input type="radio" id="ip_tec_fault" name="ip_tec_fault" checked="yes" value="U">Unknown</input>						
					</td>
				</tr>
				<tr>
					<td><span class="formFont">*Changes induced by slow earthquake, as recorded in a GPS or other strain network :</span></td>
					<td>
						<input type="radio" id="ip_tec_seq" name="ip_tec_seq" value="Y">Yes</input>
						<input type="radio" id="ip_tec_seq" name="ip_tec_seq" value="N">No</input>
						<input type="radio" id="ip_tec_seq" name="ip_tec_seq" value="M">Maybe</input>
						<input type="radio" id="ip_tec_seq" name="ip_tec_seq" checked="yes" value="U">Unknown</input>						
					</td>
				</tr>
				<tr>
					<td><span class="formFont">*Changes induced by pressurization of magma or hydrothermal reservoir located several kilometers or more from the apparent center of unrest:</span></td>
					<td>
						<input type="radio" id="ip_tec_press" name="ip_tec_press" value="Y">Yes</input>
						<input type="radio" id="ip_tec_press" name="ip_tec_press" value="N">No</input>
						<input type="radio" id="ip_tec_press" name="ip_tec_press" value="M">Maybe</input>
						<input type="radio" id="ip_tec_press" name="ip_tec_press" checked="yes" value="U">Unknown</input>						
					</td>
				</tr>		
				<tr>
					<td><span class="formFont">*Changes induced by depressurization of magma or hydrothermal reservoir located several kilometers or more from the apparent center of unrest:</span></td>
					<td>
						<input type="radio" id="ip_tec_depress" name="ip_tec_depress" value="Y">Yes</input>
						<input type="radio" id="ip_tec_depress" name="ip_tec_depress" value="N">No</input>
						<input type="radio" id="ip_tec_depress" name="ip_tec_depress" value="M">Maybe</input>
						<input type="radio" id="ip_tec_depress" name="ip_tec_depress" checked="yes" value="U">Unknown</input>						
					</td>
				</tr>	
				<tr>
					<td><span class="formFont">*Changes induced by increased hydrothermal pore pressures ("lubrication") along faults beneath or near the volcano :</span></td>
					<td>
						<input type="radio" id="ip_tec_hppress" name="ip_tec_hppress" value="Y">Yes</input>
						<input type="radio" id="ip_tec_hppress" name="ip_tec_hppress" value="N">No</input>
						<input type="radio" id="ip_tec_hppress" name="ip_tec_hppress" value="M">Maybe</input>
						<input type="radio" id="ip_tec_hppress" name="ip_tec_hppress" checked="yes" value="U">Unknown</input>						
					</td>
				</tr>
				<tr>
					<td><span class="formFont">*Earth tide interaction with magma/hydrothermal systems:</span></td>
					<td>
						<input type="radio" id="ip_tec_etide" name="ip_tec_etide" value="Y">Yes</input>
						<input type="radio" id="ip_tec_etide" name="ip_tec_etide" value="N">No</input>
						<input type="radio" id="ip_tec_etide" name="ip_tec_etide" value="M">Maybe</input>
						<input type="radio" id="ip_tec_etide" name="ip_tec_etide" checked="yes" value="U">Unknown</input>						
					</td>
				</tr>
				<tr>
					<td><span class="formFont">*Interaction of the volcanic system with changes in atmospheric pressure, rainfall, wind, etc.:</span></td>
					<td>
						<input type="radio" id="ip_tec_atmp" name="ip_tec_atmp" value="Y">Yes</input>
						<input type="radio" id="ip_tec_atmp" name="ip_tec_atmp" value="N">No</input>
						<input type="radio" id="ip_tec_atmp" name="ip_tec_atmp" value="M">Maybe</input>
						<input type="radio" id="ip_tec_atmp" name="ip_tec_atmp" checked="yes" value="U">Unknown</input>						
					</td>
				</tr>				
				<tr>
					<td><span class="formFont">*Source of data:</span></td>
					<td>
						<input type="radio" id="ip_tec_ori" name="ip_tec_ori" value="D">Digitized/Bibliography</input>
						<input type="radio" id="ip_tec_ori" name="ip_tec_ori" value="O" checked="yes">Original from observatory</input>
					</td>
				</tr>				
				<tr>
					<td><span class="formFont">Comment:</span> </td>
					<td>
						<textarea id="ip_tec_com" name="ip_tec_com" cols="30" rows="2" maxlength="255"></textarea>
					</td>
				</tr>
				<tr>
					<td><span class="formFont">*Institution/Observatory:</span></td>
					<td>
						<select id="cc_id" name="cc_id" >
							<option value="">Select Observer.</option>
HTMLBLOCK;
							for($i=0; $i<sizeof($obs); $i++){
								echo"<option value=\"{$obs[$i][0]}\"> {$obs[$i][1]} - {$obs[$i][2]} </option>";
							}
echo <<<HTMLBLOCK
						</select>					
					</td>
				</tr>
				<tr>
					<td><span class="formFont">Second Institution/Observatory:</span></td>
					<td>
						<select id="cc_id2" name="cc_id2" >
							<option value="">Select Institution/Obs.</option>
HTMLBLOCK;
							for($i=0; $i<sizeof($obs); $i++){
								echo"<option value=\"{$obs[$i][0]}\"> {$obs[$i][1]} - {$obs[$i][2]}</option>";
							}
echo <<<HTMLBLOCK
						</select>					
					</td>
				</tr>	
				<tr>
					<td><span class="formFont">Third Institution/Observatory:</span></td>
					<td>
						<select id="cc_id3" name="cc_id3" >
							<option value="">Select Institution/Obs.</option>
HTMLBLOCK;
							for($i=0; $i<sizeof($obs); $i++){
								echo"<option value=\"{$obs[$i][0]}\"> {$obs[$i][1]} - {$obs[$i][2]} </option>";
							}
echo <<<HTMLBLOCK
						</select>					
					</td>
				</tr>
		
				<input type="hidden" id="ip_tec_loaddate" name="ip_tec_loaddate" value="" />
				
				<tr>
					<td><span class="formFont">Publish Date:</span></td>
					<td>
						<input type="text" id="ip_tec_pubdate" name="ip_tec_pubdate" value="" />
					</td>
				</tr>
				<input type="hidden" name="cc_id_load" value="{$_SESSION['login']['cc_id']}" />
				
				<tr>
					<td><span class="formFont">Bibliographic:</span> (Hold down the Ctrl to select multiple options) </td>
					<td>
						<select class="bibliographic" id="cb_ids" name="cb_ids[]" multiple>
							<option value="">Select bibliographic</option>
HTMLBLOCK;
							for($i=0; $i<sizeof($cbs); $i++){
							
								echo"<option value=\"{$cbs[$i][0]}\" title=\"{$cbs[$i][1]} ({$cbs[$i][2]}) {$cbs[$i][3]}\"> {$cbs[$i][1]} ({$cbs[$i][2]}) {$cbs[$i][3]}  </option>";
							}
echo <<<HTMLBLOCK
						</select>					
					</td>

				
			</table>
			
			<div style="padding:10px 130px;" >
			<input type="button" id="back" name="back" value="Back to previous page" />
			<input type="submit" name="confirm" value="Confirm" />
			</div>
		</form>
		 
		</div>  <!-- end page content div -->
HTMLBLOCK;
}

?>