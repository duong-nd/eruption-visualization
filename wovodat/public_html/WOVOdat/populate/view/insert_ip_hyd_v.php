<?php
function showUpdateTableList($vol,$obs,$cbs){

$i="";

echo <<<HTMLBLOCK
		<!-- Content -->

		<div id="content" style="overflow:visible;">
		<!-- Page content -->
		
		<h2 style="text-align:center;">Upload form for Hydrologic System Interaction Information.  Table : ip_hyd</h2>
		
		<p class="formFont">The fields preceded by an asterisk (*) are required.</p> 
		<!-- Form -->
		<form method="post" action="insertSwitch.php" name="form_ip_hyd" id="form_ip_hyd">
			
			<table class="formtable" id="formtable">

				<tr>
					<td><span class="formFont">*Unique Code:</span> </td>
					
					<td>
						<input type="text" maxlength="30" id="ip_hyd_code" name="ip_hyd_code" value="" />
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
						<input type="text" id="ip_hyd_time" name="ip_hyd_time" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">Inference time uncertainty:</span></td>
					<td>
						<input type="text" id="ip_hyd_time_unc" name="ip_hyd_time_unc" value="" />
					</td>
				</tr>				
				<tr>
					<td><span class="formFont">*Start Time:</span></td>
					<td>
						<input type="text" id="ip_hyd_start" name="ip_hyd_start" value="" />
					</td>
				</tr>
				<tr> 
					<td><span class="formFont">Start Time Uncertainty:</span></td>
					<td>
						<input type="text" id="ip_hyd_start_unc" name="ip_hyd_start_unc" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">End Time:</span></td>
					<td>
						<input type="text" id="ip_hyd_end" name="ip_hyd_end" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">End Time Uncertainty:</span></td>
					<td>
						<input type="text" id="ip_hyd_end_unc" name="ip_hyd_end_unc" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">*Heated groundwater:</span></td>
					<td>
						<input type="radio" id="ip_hyd_gwater" name="ip_hyd_gwater" value="Y">Yes</input>
						<input type="radio" id="ip_hyd_gwater" name="ip_hyd_gwater" value="N">No</input>
						<input type="radio" id="ip_hyd_gwater" name="ip_hyd_gwater" value="M">Maybe</input>
						<input type="radio" id="ip_hyd_gwater" name="ip_hyd_gwater" checked="yes" value="U">Unknown</input>						
					</td>
				</tr>				
				<tr>
					<td><span class="formFont">*Pore destabilization:</span></td>
					<td>
						<input type="radio" id="ip_hyd_ipor" name="ip_hyd_ipor" value="Y">Yes</input>
						<input type="radio" id="ip_hyd_ipor" name="ip_hyd_ipor" value="N">No</input>
						<input type="radio" id="ip_hyd_ipor" name="ip_hyd_ipor" value="M">Maybe</input>
						<input type="radio" id="ip_hyd_ipor" name="ip_hyd_ipor" checked="yes" value="U">Unknown</input>						
					</td>
				</tr>					
				<tr>
					<td><span class="formFont">*Pore deformation:</span></td>
					<td>
						<input type="radio" id="ip_hyd_edef" name="ip_hyd_edef" value="Y">Yes</input>
						<input type="radio" id="ip_hyd_edef" name="ip_hyd_edef" value="N">No</input>
						<input type="radio" id="ip_hyd_edef" name="ip_hyd_edef" value="M">Maybe</input>
						<input type="radio" id="ip_hyd_edef" name="ip_hyd_edef" checked="yes" value="U">Unknown</input>						
					</td>
				</tr>
				<tr>
					<td><span class="formFont">*Hydrofracturing:</span></td>
					<td>
						<input type="radio" id="ip_hyd_hfrac" name="ip_hyd_hfrac" value="Y">Yes</input>
						<input type="radio" id="ip_hyd_hfrac" name="ip_hyd_hfrac" value="N">No</input>
						<input type="radio" id="ip_hyd_hfrac" name="ip_hyd_hfrac" value="M">Maybe</input>
						<input type="radio" id="ip_hyd_hfrac" name="ip_hyd_hfrac" checked="yes" value="U">Unknown</input>						
					</td>
				</tr>
				<tr>
					<td><span class="formFont">*Boiling induced tremor:</span></td>
					<td>
						<input type="radio" id="ip_hyd_btrem" name="ip_hyd_btrem" value="Y">Yes</input>
						<input type="radio" id="ip_hyd_btrem" name="ip_hyd_btrem" value="N">No</input>
						<input type="radio" id="ip_hyd_btrem" name="ip_hyd_btrem" value="M">Maybe</input>
						<input type="radio" id="ip_hyd_btrem" name="ip_hyd_btrem" checked="yes" value="U">Unknown</input>						
					</td>
				</tr>
				<tr>
					<td><span class="formFont">*Absorption of soluble gases:</span></td>
					<td>
						<input type="radio" id="ip_hyd_abgas" name="ip_hyd_abgas" value="Y">Yes</input>
						<input type="radio" id="ip_hyd_abgas" name="ip_hyd_abgas" value="N">No</input>
						<input type="radio" id="ip_hyd_abgas" name="ip_hyd_abgas" value="M">Maybe</input>
						<input type="radio" id="ip_hyd_abgas" name="ip_hyd_abgas" checked="yes" value="U">Unknown</input>						
					</td>
				</tr>		
				<tr>
					<td><span class="formFont">*Change in equilibrium species:</span></td>
					<td>
						<input type="radio" id="ip_hyd_species" name="ip_hyd_species" value="Y">Yes</input>
						<input type="radio" id="ip_hyd_species" name="ip_hyd_species" value="N">No</input>
						<input type="radio" id="ip_hyd_species" name="ip_hyd_species" value="M">Maybe</input>
						<input type="radio" id="ip_hyd_species" name="ip_hyd_species" checked="yes" value="U">Unknown</input>						
					</td>
				</tr>	
				<tr>
					<td><span class="formFont">*Boiling until dry chimneys are formed:</span></td>
					<td>
						<input type="radio" id="ip_hyd_chim" name="ip_hyd_chim" value="Y">Yes</input>
						<input type="radio" id="ip_hyd_chim" name="ip_hyd_chim" value="N">No</input>
						<input type="radio" id="ip_hyd_chim" name="ip_hyd_chim" value="M">Maybe</input>
						<input type="radio" id="ip_hyd_chim" name="ip_hyd_chim" checked="yes" value="U">Unknown</input>						
					</td>
				</tr>		
				<tr>
					<td><span class="formFont">*Source of data:</span></td>
					<td>
						<input type="radio" id="ip_hyd_ori" name="ip_hyd_ori" value="D">Digitized/Bibliography</input>
						<input type="radio" id="ip_hyd_ori" name="ip_hyd_ori" value="O" checked="yes">Original from observatory</input>
					</td>
				</tr>				
				<tr>
					<td><span class="formFont">Comment:</span> </td>
					<td>
						<textarea id="ip_hyd_com" name="ip_hyd_com" cols="30" rows="2" maxlength="255"></textarea>
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
		
				<input type="hidden" id="ip_hyd_loaddate" name="ip_hyd_loaddate" value="" />
				
				<tr>
					<td><span class="formFont">Publish Date:</span></td>
					<td>
						<input type="text" id="ip_hyd_pubdate" name="ip_hyd_pubdate" value="" />
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