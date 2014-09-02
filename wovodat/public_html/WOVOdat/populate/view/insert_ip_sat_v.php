<?php
function showUpdateTableList($vol,$obs,$cbs){

$i="";

echo <<<HTMLBLOCK
		<!-- Content -->

		<div id="content" style="overflow:auto;">
		<!-- Page content -->
		
		<h2 style="text-align:center;">Upload form for Volatile saturation Information.  Table : ip_sat</h2>
		
		<p class="formFont">The fields preceded by an asterisk (*) are required.</p> 
		<!-- Form -->
		<form method="post" action="insertSwitch.php" name="form_ip_sat" id="form_ip_sat">
			
			<table class="formtable" id="formtable">

				<tr>
					<td><span class="formFont">*Unique Code:</span> </td>
					
					<td>
						<input type="text" maxlength="30" id="ip_sat_code" name="ip_sat_code" value="" />
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
						<input type="text" id="ip_sat_time" name="ip_sat_time" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">Inference time uncertainty:</span></td>
					<td>
						<input type="text" id="ip_sat_time_unc" name="ip_sat_time_unc" value="" />
					</td>
				</tr>				
				<tr>
					<td><span class="formFont">*Start Time:</span></td>
					<td>
						<input type="text" id="ip_sat_start" name="ip_sat_start" value="" />
					</td>
				</tr>
				<tr> 
					<td><span class="formFont">Start Time Uncertainty:</span></td>
					<td>
						<input type="text" id="ip_sat_start_unc" name="ip_sat_start_unc" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">End Time:</span></td>
					<td>
						<input type="text" id="ip_sat_end" name="ip_sat_end" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">End Time Uncertainty:</span></td>
					<td>
						<input type="text" id="ip_sat_end_unc" name="ip_sat_end_unc" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">*Magma became saturated with CO2 before an eruption and contributed to preeruption unrest:</span></td>
					<td>
						<input type="radio" id="ip_sat_co2" name="ip_sat_co2" value="Y">Yes</input>
						<input type="radio" id="ip_sat_co2" name="ip_sat_co2" value="N">No</input>
						<input type="radio" id="ip_sat_co2" name="ip_sat_co2" value="M">Maybe</input>
						<input type="radio" id="ip_sat_co2" name="ip_sat_co2" checked="yes" value="U">Unknown</input>						
					</td>
				</tr>				
				<tr>
					<td><span class="formFont">*Magma became saturated with H2O before an eruption and contributed to preeruption unrest:</span></td>
					<td>
						<input type="radio" id="ip_sat_h2o" name="ip_sat_h2o" value="Y">Yes</input>
						<input type="radio" id="ip_sat_h2o" name="ip_sat_h2o" value="N">No</input>
						<input type="radio" id="ip_sat_h2o" name="ip_sat_h2o" value="M">Maybe</input>
						<input type="radio" id="ip_sat_h2o" name="ip_sat_h2o" checked="yes" value="U">Unknown</input>						
					</td>
				</tr>					
				<tr>
					<td><span class="formFont">*Volatile saturation by decompression :</span></td>
					<td>
						<input type="radio" id="ip_sat_decomp" name="ip_sat_decomp" value="Y">Yes</input>
						<input type="radio" id="ip_sat_decomp" name="ip_sat_decomp" value="N">No</input>
						<input type="radio" id="ip_sat_decomp" name="ip_sat_decomp" value="M">Maybe</input>
						<input type="radio" id="ip_sat_decomp" name="ip_sat_decomp" checked="yes" value="U">Unknown</input>						
					</td>
				</tr>
				<tr>
					<td><span class="formFont">*Volatile saturation by change in fO2:</span></td>
					<td>
						<input type="radio" id="ip_sat_dfo2" name="ip_sat_dfo2" value="Y">Yes</input>
						<input type="radio" id="ip_sat_dfo2" name="ip_sat_dfo2" value="N">No</input>
						<input type="radio" id="ip_sat_dfo2" name="ip_sat_dfo2" value="M">Maybe</input>
						<input type="radio" id="ip_sat_dfo2" name="ip_sat_dfo2" checked="yes" value="U">Unknown</input>						
					</td>
				</tr>
				<tr>
					<td><span class="formFont">*Volatile addition:</span></td>
					<td>
						<input type="radio" id="ip_sat_add" name="ip_sat_add" value="Y">Yes</input>
						<input type="radio" id="ip_sat_add" name="ip_sat_add" value="N">No</input>
						<input type="radio" id="ip_sat_add" name="ip_sat_add" value="M">Maybe</input>
						<input type="radio" id="ip_sat_add" name="ip_sat_add" checked="yes" value="U">Unknown</input>						
					</td>
				</tr>
				<tr>
					<td><span class="formFont">*Volatile saturation by crystallization or second boiling :</span></td>
					<td>
						<input type="radio" id="ip_sat_xtl" name="ip_sat_xtl" value="Y">Yes</input>
						<input type="radio" id="ip_sat_xtl" name="ip_sat_xtl" value="N">No</input>
						<input type="radio" id="ip_sat_xtl" name="ip_sat_xtl" value="M">Maybe</input>
						<input type="radio" id="ip_sat_xtl" name="ip_sat_xtl" checked="yes" value="U">Unknown</input>						
					</td>
				</tr>		
				<tr>
					<td><span class="formFont">*Subsurface, preeruptive increases in vesiculation, thereby decreasing density:</span></td>
					<td>
						<input type="radio" id="ip_sat_ves" name="ip_sat_ves" value="Y">Yes</input>
						<input type="radio" id="ip_sat_ves" name="ip_sat_ves" value="N">No</input>
						<input type="radio" id="ip_sat_ves" name="ip_sat_ves" value="M">Maybe</input>
						<input type="radio" id="ip_sat_ves" name="ip_sat_ves" checked="yes" value="U">Unknown</input>						
					</td>
				</tr>	
				<tr>
					<td><span class="formFont">*Subsurface, preeruptive decreases in vesiculation, thereby increasing density:</span></td>
					<td>
						<input type="radio" id="ip_sat_deves" name="ip_sat_deves" value="Y">Yes</input>
						<input type="radio" id="ip_sat_deves" name="ip_sat_deves" value="N">No</input>
						<input type="radio" id="ip_sat_deves" name="ip_sat_deves" value="M">Maybe</input>
						<input type="radio" id="ip_sat_deves" name="ip_sat_deves" checked="yes" value="U">Unknown</input>						
					</td>
				</tr>	 	
				<tr>
					<td><span class="formFont">*Deep and near-surface degassing including gas explosion events :</span></td>
					<td>
						<input type="radio" id="ip_sat_degas" name="ip_sat_degas" value="Y">Yes</input>
						<input type="radio" id="ip_sat_degas" name="ip_sat_degas" value="N">No</input>
						<input type="radio" id="ip_sat_degas" name="ip_sat_degas" value="M">Maybe</input>
						<input type="radio" id="ip_sat_degas" name="ip_sat_degas" checked="yes" value="U">Unknown</input>						
					</td>
				</tr>				
				<tr>
					<td><span class="formFont">*Source of data:</span></td>
					<td>
						<input type="radio" id="ip_sat_ori" name="ip_sat_ori" value="D">Digitized/Bibliography</input>
						<input type="radio" id="ip_sat_ori" name="ip_sat_ori" value="O" checked="yes">Original from observatory</input>
					</td>
				</tr>				
				<tr>
					<td><span class="formFont">Comment:</span> </td>
					<td>
						<textarea id="ip_sat_com" name="ip_sat_com" cols="30" rows="2" maxlength="255"></textarea>
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
		
				<input type="hidden" id="ip_sat_loaddate" name="ip_sat_loaddate" value="" />
				
				<tr>
					<td><span class="formFont">Publish Date:</span></td>
					<td>
						<input type="text" id="ip_sat_pubdate" name="ip_sat_pubdate" value="" />
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