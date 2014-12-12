<?php
function showUpdateTableList($vol,$obs,$cbs){

$i="";

echo <<<HTMLBLOCK
		<!-- Content -->

		<div id="content">
		<!-- Page content -->
		
		<h2 style="text-align:center;">Upload form for Volcano Activity Information.  Table : co </h2> <br/>
		
		<p class="formFont">The fields preceded by an asterisk (*) are required.</p> <br/>
		<!-- Form -->
		<form method="post" action="insertSwitch.php" name="form_co" id="form_co">
			
			<table class="formtable" id="formtable">

				<tr>
					<td><span class="formFont">*Unique Code:</span> </td>
					
					<td>
						<input type="text" maxlength="30" id="co_code" name="co_code" value="" />
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
					<td><span class="formFont">Description:</span></td>
					<td>
						<textarea id="co_observe" name="co_observe" cols="30" rows="2"></textarea>
						
					</td>
				</tr>
				<tr>
					<td><span class="formFont">*Start Time:</span></td>
					<td>
						<input type="text" id="co_stime" name="co_stime" value="" />
					</td>
				</tr>
				<tr> 
					<td><span class="formFont">Start Time Uncertainty:</span></td>
					<td>
						<input type="text" id="co_stime_unc" name="co_stime_unc" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">End Time:</span></td>
					<td>
						<input type="text" id="co_etime" name="co_etime" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">End Time Uncertainty:</span></td>
					<td>
						<input type="text" id="co_etime_unc" name="co_etime_unc" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">Comment:</span> </td>
					<td>
						<textarea id="co_com" name="co_com" cols="30" rows="2" maxlength="255"></textarea>
					</td>
				</tr>
				<tr>
					<td><span class="formFont">*Observer:</span></td>
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
		
				<input type="hidden" id="co_loaddate" name="co_loaddate" value="" />
				
				<tr>
					<td><span class="formFont">Publish Date:</span></td>
					<td>
						<input type="text" id="co_pubdate" name="co_pubdate" value="" />
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