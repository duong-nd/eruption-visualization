<?php
function showUpdateTableList(){

$i="";

echo <<<HTMLBLOCK
		<!-- Content -->

		<div id="content">
		<!-- Page content -->
		
		<h2 style="text-align:center;">Upload form for Observatory Contact Information.  Table : cc </h2> <br/>
		
		<p class="formFont">The fields preceded by an asterisk (*) are required.</p><br/>
		<!-- Form -->
		<form method="post" action="insertSwitch.php" name="form_cc" id="form_cc">
			
			<table class="formtable" id="formtable">

				<tr>
					<td><span class="formFont">*Observatory Code:</span> </td>
					
					<td>
						<input type="text" maxlength="15" id="cc_code" name="cc_code" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">Observatory Code 2:</span>  </td>
					
					<td>
						<input type="text" maxlength="15" id="cc_code2" name="cc_code2" value="" />
					</td>
				</tr>		
				<input type="hidden" id="cc_fname" name="cc_fname" value="" />
				<input type="hidden" id="cc_lname" name="cc_lname" value="" />				
				<tr>
					<td><span class="formFont">*Observatory Name:</span></td>
					<td>
						<input type="text" maxlength="150" id="cc_obs" name="cc_obs" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">*observatory Address:</span> </th>
					<td>
						<textarea id="cc_add1" name="cc_add1" cols="30" rows="2" maxlength="60"></textarea>
						
					</td>
				</tr>
				<tr>
					<td><span class="formFont">observatory Address 2:</span> </th>
					<td>
						<textarea id="cc_add2" name="cc_add2" cols="30" rows="2" maxlength="60"></textarea>
						
					</td>
				</tr>				
				<tr>
					<td><span class="formFont">*City:</span></td>
					<td>
						<input type="text" maxlength="50" id="cc_city" name="cc_city" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">*State:</span></td>
					<td>
						<input type="text" maxlength="50" id="cc_state" name="cc_state" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">*Country:</span> </td>
					<td>
						<input type="text" maxlength="50" id="cc_country" name="cc_country" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">*Postal code:</span> </td>
					<td>
						<input type="text" maxlength="30" id="cc_post" name="cc_post" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">*Web address (URL):</span> </td>
					<td>
						<input type="text" maxlength="255" id="cc_url" name="cc_url" value="" />
					</td>
				</tr>			
				<tr>
					<td><span class="formFont">*Email:</span> </td>
					<td>
						<input type="text" maxlength="320" id="cc_email" name="cc_email" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">*Contact Number:</span> </td>
					<td>
						<input type="text" maxlength="50" id="cc_phone" name="cc_phone" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">Contact Number 2:</span> </td>
					<td>
						<input type="text" maxlength="50" id="cc_phone2" name="cc_phone2" value="" />
					</td>
				</tr>	
				<tr>
					<td><span class="formFont">Fax:</span></td>
					<td>
						<input type="text" maxlength="60" id="cc_fax" name="cc_fax" value="" />
					</td>
				</tr>	
				<tr>
					<td><span class="formFont">Comments:</span></td>
					<td>
						<textarea id="cc_com" name="cc_com" cols="30" rows="2" maxlength="255"></textarea>
					</td>
				</tr>	
	
				<input type="hidden" id="cc_loaddate" name="cc_loaddate" value="" />
	
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