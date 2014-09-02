<?php
function showUpdateTableList($vol,$obs,$cbs){

$i="";


echo <<<HTMLBLOCK
		<!-- Content -->

		<div id="content" style="overflow:auto;">
		<!-- Page content -->
		
		<h2 style="text-align:center;">Upload form for Volcano Magma Chamber Information.  Table : vd_mag </h2> <br/>

		<p class="formFont">The fields preceded by an asterisk (*) are required.</p>   <br/>
		<!-- Form -->
		<form method="post" action="insertSwitch.php" name="form_vd_mag" id="form_vd_mag">
			
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
					<td><span class="formFont">Diameter of low velocity zone:</span>  </td>
					<td>
						<input type="text" id="vd_mag_lvz_dia" name="vd_mag_lvz_dia" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">Volume of low velocity zone:</span>  </td>
					<td>
						<input type="text" id="vd_mag_lvz_vol" name="vd_mag_lvz_vol" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">Depth to top of low velocity zone:</span></td>
					<td>
						<input type="text" id="vd_mag_tlvz" name="vd_mag_tlvz" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">Volume of largest eruption:</span> </td>
					<td>
						<input type="text" id="vd_mag_lerup_vol" name="vd_mag_lerup_vol" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">Dominant rock type:</span></td>
					<td>
						<input type="text" id="vd_mag_drock" name="vd_mag_drock" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">Outlier rock type:</span></td>
					<td>
						<input type="text" maxlength="60" id="vd_mag_orock" name="vd_mag_orock" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">Second outlier rock type:</span></td>
					<td>
						<input type="text"  maxlength="60"  id="vd_mag_orock2" name="vd_mag_orock2" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">Third outlier rock type:</span></td>
					<td>
						<input type="text" maxlength="60" id="vd_mag_orock3" name="vd_mag_orock3" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">Minimum SiO2 content of whole rocks erupted:</span></td>
					<td>
						<input type="text" id="vd_mag_minsio2" name="vd_mag_minsio2" value="" />
					</td>
				</tr>				
				<tr>
					<td><span class="formFont">Maximum SiO2 content of whole rocks erupted:</span></td>
					<td>
						<input type="text" id="vd_mag_maxsio2" name="vd_mag_maxsio2" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">Comment:</span></td>
					<td>
						<input type="text" maxlength="255" id="vd_mag_com" name="vd_mag_com" value="" />
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
				<input type="hidden" name="vd_mag_loaddate" value="" />
				<tr>
					<td><span class="formFont">Publish Date:</span></td>
					<td>
						<input type="text" id="vd_mag_pubdate" name="vd_mag_pubdate" value="" />
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