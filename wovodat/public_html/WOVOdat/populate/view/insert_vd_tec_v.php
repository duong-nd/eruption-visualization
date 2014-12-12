<?php
function showUpdateTableList($vol,$obs,$cbs){

$i="";


echo <<<HTMLBLOCK
		<!-- Content -->

		<div id="content" style="overflow:auto;">
		<!-- Page content -->
		
		<h2 style="text-align:center;">Upload form for Volcano Tectonic setting Information.  Table : vd_tec </h2> <br/>

		<p class="formFont">The fields preceded by an asterisk (*) are required.</p> <br/>
		<!-- Form -->
		<form method="post" action="insertSwitch.php" name="form_vd_tec" id="form_vd_tec">
			
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
					<td><span class="formFont">Description:</span></td>
					<td>
						<input type="text" maxlength="255" id="vd_tec_desc" name="vd_tec_desc" value="" />
					</td>
				</tr>	
				<tr>
					<td><span class="formFont">Rate of strike-slip:</span>  </td>
					<td>
						<input type="text" id="vd_tec_strslip" name="vd_tec_strslip" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">Rate of extension:</span>  </td>
					<td>
						<input type="text" id="vd_tec_ext" name="vd_tec_ext" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">Rate of convergence:</span>  </td>
					<td>
						<input type="text" id="vd_tec_conv" name="vd_tec_conv" value="" />
					</td>
				</tr>	
				<tr>
					<td><span class="formFont">Travel rate across hotspot:</span>  </td>
					<td>
						<input type="text" id="vd_tec_travhs" name="vd_tec_travhs" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">Comment:</span></td>
					<td>
						<input type="text" maxlength="255" id="vd_tec_com" name="vd_tec_com" value="" />
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
				<input type="hidden" name="vd_tec_loaddate" value="" />
				<tr>
					<td><span class="formFont">Publish Date:</span></td>
					<td>
						<input type="text" id="vd_tec_pubdate" name="vd_tec_pubdate" value="" />
					</td>
				</tr>
				<input type="hidden" name="cc_id_load" value="{$_SESSION['login']['cc_id']}" />

				<tr>
					<td><span class="formFont">Bibliographic:</span> (Hold down the Ctrl key to select multiple options) </td>
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