<?php
function showUpdateTableList($vol,$obs){

$i="";

echo <<<HTMLBLOCK
		<!-- Content -->

		<div id="content">
		<!-- Page content -->
		
		<h2 style="text-align:center;">Upload form for Volcano Data.  Table : vd </h2> <br/>
		
		<p class="formFont">The fields preceded by an asterisk (*) are required.</p> <br/>
		<!-- Form -->
		<form method="post" action="insertSwitch.php" name="form_vd" id="form_vd">
			
			<table class="formtable" id="formtable">

				<tr>
					<td><span class="formFont">*Volcano CAVW:</span> </td>
					
					<td>
						<input type="text" maxlength="15" id="vd_cavw" name="vd_cavw" value="" />
					</td>
				</tr>
			<!--
				<tr rowspan="10">
					<td><span class="formFont">Volcano Number:</span></td>
					<td>
						<input type="text" maxlength="6" id="vd_num" name="vd_num" value="" />
					</td>
				</tr>
			-->	
				<tr>
					<td><span class="formFont">*Volcano Name:</span></th>
					<td>
						<textarea id="vd_name" name="vd_name" cols="30" rows="2" maxlength="255"></textarea>
						
					</td>
				</tr>
				<tr>
					<td><span class="formFont">Volcano Second Name:</span></td>
					<td>
						<textarea id="vd_name2" name="vd_name2" cols="30" rows="2" maxlength="255"></textarea>
						
					</td>
				</tr>
				<tr>
					<td><span class="formFont">Volcano Time Zone:</span></td>
					<td>
						<input type="text" id="vd_tzone" name="vd_tzone" value="" />
					</td>
				</tr>
				<tr>
					<th>vd_mcont:</th>
					<td>
						<input type="text" id="vd_mcont" name="vd_mcont" value="" maxlength="1"/>
					</td>
				</tr>
				<tr>
					<td><span class="formFont">Comment:</span></td>
					<td>
						<textarea id="vd_com" name="vd_com" cols="30" rows="2" maxlength="255"></textarea>
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
				<tr>
					<td><span class="formFont">Fourth Institution/Observatory:</span></td>
					<td>
						<select id="cc_id4" name="cc_id4" >
							<option value="">Select Institution/Obs.</option>
HTMLBLOCK;
							for($i=0; $i<sizeof($obs); $i++){
								echo"<option value=\"{$obs[$i][0]}\"> {$obs[$i][1]} - {$obs[$i][2]} </option>";
							}
echo <<<HTMLBLOCK
						</select>					
					</td>
				</tr>		
				<tr>
					<td><span class="formFont">Fifth Institution/Observatory:</span></td>
					<td>
						<select id="cc_id5" name="cc_id5" >
							<option value="">Select Institution/Obs.</option>
HTMLBLOCK;
							for($i=0; $i<sizeof($obs); $i++){
								echo"<option value=\"{$obs[$i][0]}\"> {$obs[$i][1]} - {$obs[$i][2]} </option>";
							}
echo <<<HTMLBLOCK
						</select>					
					</td>
				</tr>				
				<input type="hidden" id="vd_loaddate" name="vd_loaddate" value="" />
				
				<tr>
					<td><span class="formFont">Publish Date:</span></td>
					<td>
						<input type="text" id="vd_pubdate" name="vd_pubdate" value="" />
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