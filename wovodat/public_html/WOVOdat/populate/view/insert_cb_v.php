<?php
function showUpdateTableList(){

$i="";

echo <<<HTMLBLOCK
		<!-- Content -->

		<div id="content">
		<!-- Page content -->
		
		<h2 style="text-align:center;">Upload form for Bibliographic Information.  Table : cb  </h2> <br/>
		
		<p class="formFont">The fields preceded by an asterisk (*) are required.</p><br/>
		<!-- Form -->
		<form method="post" action="insertSwitch.php" name="form_cb" id="form_cb">
			
			<table class="formtable" id="formtable">

				<tr>
					<td><span class="formFont">*Authors/Editors:</span> </td>
					
					<td>
						<input type="text" maxlength="255" id="cb_auth" name="cb_auth" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">*Publication year (YYYY):</span>  </td>
					
					<td>
						<input type="text" maxlength="4" id="cb_year" name="cb_year" value="" />
					</td>
				</tr>		
				<tr>
					<td><span class="formFont">*Paper Title:</span></td>
					<td>
						<input type="text" maxlength="255" id="cb_title" name="cb_title" cols="30" rows="2"  value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">Journal Name:</span> </th>
					<td>
						<textarea id="cb_journ" name="cb_journ" cols="30" rows="2" maxlength="255"></textarea>
						
					</td>
				</tr>
				<tr>
					<td><span class="formFont">Journal Volume:</span> </th>
					<td>
						<input type="text" maxlength="20" id="cb_vol" name="cb_vol" value="" />
					</td>
				</tr>				
				<tr>
					<td><span class="formFont">Publisher Name:</span></td>
					<td>
						<input type="text" maxlength="50" id="cb_pub" name="cb_pub" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">Page Numbers:</span></td>
					<td>
						<input type="text" maxlength="30" id="cb_page" name="cb_page" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">Digital Object Identifier:</span> </td>
					<td>
						<input type="text" maxlength="20" id="cb_doi" name="cb_doi" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">International Standard Book Number (ISBN):</span> </td>
					<td>
						<input type="text" maxlength="13" id="cb_isbn" name="cb_isbn" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">Web Address (URL):</span> </td>
					<td>
						<textarea id="cb_url" name="cb_url" cols="30" rows="2" maxlength="255"></textarea>
					</td>
				</tr>			
				<tr>
					<td><span class="formFont">Email address of observatory or laboratory:</span> </td>
					<td>
						<input type="text" maxlength="320" id="cb_labadr" name="cb_labadr" value="" />
					</td>
				</tr>
				<tr>
					<td><span class="formFont">Keywords (Please separate each group of keywords with a comma):</span> </td>
					<td>
						<textarea id="cb_keywords" name="cb_keywords" cols="30" rows="2" maxlength="255"></textarea>
					</td>
				</tr>
				<tr>
					<td><span class="formFont">Comments:</span> </td>
					<td>
						<textarea id="cb_com" name="cb_com" cols="30" rows="2" maxlength="255"></textarea>
					</td>
				</tr>	
	
				<input type="hidden" id="cb_loaddate" name="cb_loaddate" value="" />
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