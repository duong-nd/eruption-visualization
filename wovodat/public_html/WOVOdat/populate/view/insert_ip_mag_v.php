<?php
function showUpdateTableList($vol,$obs,$cbs){

$i="";

echo <<<HTMLBLOCK
		<!-- Content -->

		<div id="content" style="overflow:visible;">
		<!-- Page content -->
		
		<h2 style="text-align:center;">Upload form for Magma Movement Information.  Table : ip_mag </h2>
		
		<p class="formFont">The fields preceded by an asterisk (*) are required.</p> 
		<!-- Form -->
		<form method="post" action="insertSwitch.php" name="form_ip_mag" id="form_ip_mag">
			
			<table class="formtable" id="formtable">

				<tr>
					<td><span class="formFont">*Unique Code:</span> </td>
					
					<td>
						<input type="text" maxlength="30" id="ip_mag_code" name="ip_mag_code" value="" />
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
						<input type="text" id="ip_mag_time" name="ip_mag_time" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">Inference time uncertainty:</span></td>
					<td>
						<input type="text" id="ip_mag_time_unc" name="ip_mag_time_unc" value="" />
					</td>
				</tr>				
				<tr>
					<td><span class="formFont">*Start Time:</span></td>
					<td>
						<input type="text" id="ip_mag_start" name="ip_mag_start" value="" />
					</td>
				</tr>
				<tr> 
					<td><span class="formFont">Start Time Uncertainty:</span></td>
					<td>
						<input type="text" id="ip_mag_start_unc" name="ip_mag_start_unc" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">End Time:</span></td>
					<td>
						<input type="text" id="ip_mag_end" name="ip_mag_end" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">End Time Uncertainty:</span></td>
					<td>
						<input type="text" id="ip_mag_end_unc" name="ip_mag_end_unc" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">*Supply of magma from depth:</span></td>
					<td>
						<input type="radio" id="ip_mag_deepsupp" name="ip_mag_deepsupp" value="Y">Yes</input>
						<input type="radio" id="ip_mag_deepsupp" name="ip_mag_deepsupp" value="N">No</input>
						<input type="radio" id="ip_mag_deepsupp" name="ip_mag_deepsupp" value="M">Maybe</input>
						<input type="radio" id="ip_mag_deepsupp" name="ip_mag_deepsupp" checked="yes" value="U">Unknown</input>						
					</td>
				</tr>				
				<tr>
					<td><span class="formFont">*Magma ascent, up from reservoir :</span></td>
					<td>
						<input type="radio" id="ip_mag_asc" name="ip_mag_asc" value="Y">Yes</input>
						<input type="radio" id="ip_mag_asc" name="ip_mag_asc" value="N">No</input>
						<input type="radio" id="ip_mag_asc" name="ip_mag_asc" value="M">Maybe</input>
						<input type="radio" id="ip_mag_asc" name="ip_mag_asc" checked="yes" value="U">Unknown</input>						
					</td>
				</tr>					
				<tr>
					<td><span class="formFont">*Magma convection induced from below by an intrusion at the base:</span></td>
					<td>
						<input type="radio" id="ip_mag_convb" name="ip_mag_convb" value="Y">Yes</input>
						<input type="radio" id="ip_mag_convb" name="ip_mag_convb" value="N">No</input>
						<input type="radio" id="ip_mag_convb" name="ip_mag_convb" value="M">Maybe</input>
						<input type="radio" id="ip_mag_convb" name="ip_mag_convb" checked="yes" value="U">Unknown</input>						
					</td>
				</tr>
				<tr>
					<td><span class="formFont">*Magma convection induced from above, by settling of a dense crystal-rich mass:</span></td>
					<td>
						<input type="radio" id="ip_mag_conva" name="ip_mag_conva" value="Y">Yes</input>
						<input type="radio" id="ip_mag_conva" name="ip_mag_conva" value="N">No</input>
						<input type="radio" id="ip_mag_conva" name="ip_mag_conva" value="M">Maybe</input>
						<input type="radio" id="ip_mag_conva" name="ip_mag_conva" checked="yes" value="U">Unknown</input>						
					</td>
				</tr>
				<tr>
					<td><span class="formFont">*Magma mixing:</span></td>
					<td>
						<input type="radio" id="ip_mag_mix" name="ip_mag_mix" value="Y">Yes</input>
						<input type="radio" id="ip_mag_mix" name="ip_mag_mix" value="N">No</input>
						<input type="radio" id="ip_mag_mix" name="ip_mag_mix" value="M">Maybe</input>
						<input type="radio" id="ip_mag_mix" name="ip_mag_mix" checked="yes" value="U">Unknown</input>						
					</td>
				</tr>
				<tr>
					<td><span class="formFont">*Dike intrusion:</span></td>
					<td>
						<input type="radio" id="ip_mag_dike" name="ip_mag_dike" value="Y">Yes</input>
						<input type="radio" id="ip_mag_dike" name="ip_mag_dike" value="N">No</input>
						<input type="radio" id="ip_mag_dike" name="ip_mag_dike" value="M">Maybe</input>
						<input type="radio" id="ip_mag_dike" name="ip_mag_dike" checked="yes" value="U">Unknown</input>						
					</td>
				</tr>		
				<tr>
					<td><span class="formFont">*Intrusion through a pipe-like cylindrical conduit:</span></td>
					<td>
						<input type="radio" id="ip_mag_pipe" name="ip_mag_pipe" value="Y">Yes</input>
						<input type="radio" id="ip_mag_pipe" name="ip_mag_pipe" value="N">No</input>
						<input type="radio" id="ip_mag_pipe" name="ip_mag_pipe" value="M">Maybe</input>
						<input type="radio" id="ip_mag_pipe" name="ip_mag_pipe" checked="yes" value="U">Unknown</input>						
					</td>
				</tr>	
				<tr>
					<td><span class="formFont">*Sill intrusion:</span></td>
					<td>
						<input type="radio" id="ip_mag_sill" name="ip_mag_sill" value="Y">Yes</input>
						<input type="radio" id="ip_mag_sill" name="ip_mag_sill" value="N">No</input>
						<input type="radio" id="ip_mag_sill" name="ip_mag_sill" value="M">Maybe</input>
						<input type="radio" id="ip_mag_sill" name="ip_mag_sill" checked="yes" value="U">Unknown</input>						
					</td>
				</tr>		
				<tr>
					<td><span class="formFont">*Source of data:</span></td>
					<td>
						<input type="radio" id="ip_mag_ori" name="ip_mag_ori" value="D">Digitized/Bibliography</input>
						<input type="radio" id="ip_mag_ori" name="ip_mag_ori" value="O" checked="yes">Original from observatory</input>
					</td>
				</tr>				
				<tr>
					<td><span class="formFont">Comment:</span> </td>
					<td>
						<textarea id="ip_mag_com" name="ip_mag_com" cols="30" rows="2" maxlength="255"></textarea>
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
		
				<input type="hidden" id="ip_mag_loaddate" name="ip_mag_loaddate" value="" />
				
				<tr>
					<td><span class="formFont">Publish Date:</span></td>
					<td>
						<input type="text" id="ip_mag_pubdate" name="ip_mag_pubdate" value="" />
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