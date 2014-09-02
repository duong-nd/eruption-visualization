<?php

/**********************************

This script is loaded on the right side of home_populate.php.
It displays a small form for uploading a file to the database, with possibility to enter bibliographic references.
When form is submitted, upload_file_check.php is launched.

**********************************/

// Start session
session_start();

if((!isset($_SESSION['login'])) || (!isset($_GET['type']))){          
header('Location: '.$url_root.'home_populate.php');
exit();
}


// Get values
$file_type=$_GET['type'];
$select_data=array();
$n_select_data=0;

switch ($file_type) {
	case "ini_csv_cc":
		// Initialization CSV file for contacts
		// Check that user is a developper
		if ($_SESSION['permissions']['access']!=0) {
			// Don't have the permission
print <<<STRING
<html>
	<br><br>
	<div style="padding:0px 0px 0px 25px;"><br>
		<p>You do not have the permission for doing that</p>
	</div>
</html>
STRING;
			exit();
		}
		
		// Prepare variables
		$title="Upload CSV contact file to WOVOdat";
		$current_title="Upload CSV contact to WOVOdat";
		$file_ab="CSV";
		break;
	case "ini_csv_cc_no_ul":
		// Initialization CSV file for contacts, no upload to DB
		// Check that user is a developper
		if ($_SESSION['permissions']['access']!=0) {
print <<<STRING
<html>
	<br><br>
	<div style="padding:0px 0px 0px 25px;"><br>
		<p>You do not have the permission for doing that</p>
	</div>
</html>
STRING;
			exit();
		}
		
		// Prepare variables
		$title="Upload CSV contact file to WOVOdat [NO UPLOAD]";
		$current_title="Upload CSV contact to WOVOdat [NO UL]";
		$file_ab="CSV";
		break;
	case "ori":
		// Observatory file
		// Get observatory
		if (!isset($_POST['select_user_upload_csv'])) {
			// Default user: themselves
			$obs=$_SESSION['login']['cc_id'];
		}
		else {
			$obs=$_POST['select_user_upload_csv'];
		}
		
		// Store observatory ID
		$_SESSION['obs_id']=$obs;
		
		// Get data type
		switch ($obs) {
			case 159:
				// GNS
				break;
			case 202:
				// PBO
				$select_data[$n_select_data]="Strain";
				$n_select_data++;
				break;
		}
		$select_data[$n_select_data]="Other";
		$n_select_data++;
		
		// Prepare variables
		$title="Upload original file to WOVOdat";
		$current_title="Upload original file to WOVOdat";
		$file_ab="Original";
		break;
	case "ori_no_ul":
		// Observatory file, no upload to DB
		// Check that user is a developper
		if ($_SESSION['permissions']['access']!=0) {
print <<<STRING
<html>
	<br><br>
	<div style="padding:0px 0px 0px 25px;"><br>
		<p>You do not have the permission for doing that</p>
	</div>
</html>
STRING;
			exit();
		}
		
		// Get observatory
		if (!isset($_POST['select_user_upload_csv_no_ul'])) {
			// Default user: themselves
			$obs=$_SESSION['login']['cc_id'];
		}
		else {
			$obs=$_POST['select_user_upload_csv_no_ul'];
		}
		
		// Store observatory ID
		$_SESSION['obs_id']=$obs;
		
		// Get data type
		switch ($obs) {
			case 159:
				// GNS
				break;
			case 202:
				// PBO
				$select_data[$n_select_data]="Strain";
				$n_select_data++;
				break;
		}
		$select_data[$n_select_data]="Other";
		$n_select_data++;
		
		// Prepare variables
		$title="Upload original file to WOVOdat [NO UPLOAD]";
		$current_title="Upload original file to WOVOdat [NO UL]";
		$file_ab="Original";
		break;
	case "ini":
		// Initialization WOVOML file
		// Check that user is a developper
		if ($_SESSION['permissions']['access']!=0) {
print <<<STRING
<html>
	<br><br>
	<div style="padding:0px 0px 0px 25px;"><br>
		<p>You do not have the permission for doing that</p>
	</div>
</html>
STRING;
			exit();
		}
		
		// Prepare variables
		$title="Upload initialization WOVOML file to WOVOdat";
		$current_title="Upload ini WOVOML to WOVOdat";
		$file_ab="WOVOML";
		break;
	case "ini_no_ul":
		// Initialization WOVOML file, no upload to DB
		// Check that user is a developper
		if ($_SESSION['permissions']['access']!=0) {
print <<<STRING
<html>
	<br><br>
	<div style="padding:0px 0px 0px 25px;"><br>
		<p>You do not have the permission for doing that</p>
	</div>
</html>
STRING;
			exit();
		}
		
		// Prepare variables
		$title="Upload initialization WOVOML file to WOVOdat [NO UPLOAD]";
		$current_title="Upload ini WOVOML to WOVOdat [NO UL]";
		$file_ab="WOVOML";
		break;
	case "wovoml":
		// WOVOML file
		// Prepare variables
		$title="Upload WOVOML file to WOVOdat";
		$current_title="Upload WOVOML to WOVOdat";
		$file_ab="WOVOML";
		$obs=NULL;
		break;
	case "wovoml_no_ul":
		// WOVOML file, no upload to DB
		// Check that user is a developper
		if ($_SESSION['permissions']['access']!=0) {
print <<<STRING
<html>
	<br><br>
	<div style="padding:0px 0px 0px 25px;"><br>
		<p>You do not have the permission for doing that</p>
	</div>
</html>
STRING;
			exit();
		}
		
		// Prepare variables
		$title="Upload WOVOML file to WOVOdat [NO UPLOAD]";
		$current_title="Upload WOVOML to WOVOdat [NO UL]";
		$file_ab="WOVOML";
		$obs=NULL;
		break;
	case "wovoml_no_pub":
		// WOVOML file, no checking of publish dates
		// Check that user is a developper
		if ($_SESSION['permissions']['access']!=0) {
print <<<STRING
<html>
	<br><br>
	<div style="padding:0px 0px 0px 25px;"><br>
		<p>You do not have the permission for doing that</p>
	</div>
</html>
STRING;
			exit();
		}
		
		// Prepare variables
		$title="Upload WOVOML file to WOVOdat [NO CHECKING PUBDATES]";
		$current_title="Upload WOVOML to WOVOdat [NO CHECK PUBDATES]";
		$file_ab="WOVOML";
		$obs=NULL;
		break;
	default:
		// Please specify file type
print <<<STRING
<html>
	<br><br>
	<div style="padding:0px 0px 0px 25px;"><br>
		<p>No file type selected</p>
	</div>
</html>
STRING;
		exit();
}

// Max file size
$max_filesize=ini_get('upload_max_filesize');

?>
		
<html>
	<script type="text/javascript" src="/js/upload_file.js" language="JavaScript"></script>	
	<br><br>
	<div style="padding:0px 0px 0px 25px;"><br>
		<!-- Page content -->
		<form name="translate_file_form" method="post" action="upload_file_check.php" enctype="multipart/form-data" onsubmit="return check_form()">
			<input type="hidden" name="file_type" value="<?php print $file_type; ?>" />
			<input type="hidden" name="obs_id" value="<?php print $obs; ?>" />
			<div id="selected_pub">
				<input type="hidden" name="n_list" id="n_list" value="0" />
				<table class="formtable" id="list_of_pub">
				</table>
			</div>
			<div id="another_pub">
				<table class="formtable">
					<tr>
						<th id="another_pub_p">Are the data issued from a publication?</th>
						<td><input type="radio" onclick="add_another()" name="another_pub" id="another_pub_yes" value="yes" /> Yes</td>
						<td><input type="radio" onclick="no_more()" checked="true" name="another_pub" id="another_pub_no" value="no" /> No</td>
					</tr>
				</table>
			</div>
			<div id="add_pub">
				<table class="formtable" style="width:100%;">
					<tr>
						<th>Author(s):</th>
						<td>
							<input type="text" maxlength="255" onkeypress="return noenter()" onkeyup="search_auth(this.value)" onblur="free_search('auth_suggest')" name="auth_input" id="auth_input" />
							<div class="suggest_list" id="auth_suggest"></div>
						</td>
					</tr>
					<tr>
						<th>Title:</th>
						<td>
							<input type="text" maxlength="255" onkeypress="return noenter()" onkeyup="search_title(this.value)" onblur="free_search('title_suggest')" name="title_input" id="title_input" />
							<div class="suggest_list" id="title_suggest"></div>
						</td>
					</tr>
					<tr>
						<th>Publication year:</th>
						<td>
							<input type="text" maxlength="4" onkeypress="return noenter()" onkeydown="numbersOnly(this)" onkeyup="numbersOnly(this)" name="year_input" id="year_input" />
						</td>
					</tr>
					<tr>
						<th>Journal:</th>
						<td>
							<input type="text" maxlength="255" onkeypress="return noenter()" onkeyup="search_journ(this.value)" onblur="free_search('journ_suggest')" name="journ_input" id="journ_input" />
							<div class="suggest_list" id="journ_suggest"></div>
						</td>
					</tr>
					<tr>
						<th>Volume:</th>
						<td>
							<input type="text" maxlength="20" onkeypress="return noenter()" name="vol_input" id="vol_input" />
						</td>
					</tr>
					<tr>
						<th>Publisher:</th>
						<td>
							<input type="text" maxlength="50" onkeypress="return noenter()" onkeyup="search_pub(this.value)" onblur="free_search('pub_suggest')" name="pub_input" id="pub_input" />
							<div class="suggest_list" id="pub_suggest"></div>
						</td>
					</tr>
					<tr>
						<th>Pages:</th>
						<td>
							<input type="text" maxlength="30" onkeypress="return noenter()" name="page_input" id="page_input" />
						</td>
					</tr>
					<tr>
						<th>DOI:</th>
						<td>
							<input type="text" maxlength="20" onkeypress="return noenter()" name="doi_input" id="doi_input" />
						</td>
					</tr>
					<tr>
						<th>ISBN:</th>
						<td>
							<input type="text" maxlength="13" onkeypress="return noenter()" name="isbn_input" id="isbn_input" />
						</td>
					</tr>
					<tr>
						<th>Web:</th>
						<td>
							<input type="text" maxlength="255" onkeypress="return noenter()" name="url_input" id="url_input" />
						</td>
					</tr>
					<tr>
						<th>Observatory/laboratory email:</th>
						<td>
							<input type="text" maxlength="320" onkeypress="return noenter()" name="labadr_input" id="labadr_input" />
						</td>
					</tr>
					<tr>
						<th>Keywords:</th>
						<td>
							<input type="text" maxlength="255" onkeypress="return noenter()" name="keywords_input" id="keywords_input" />
						</td>
					</tr>
				</table>
				<button id="save_pub" type="button" onclick="select_pub()">Save</button>
				<button id="cancel_pub" type="button" onclick="no_more()">Cancel</button>
			</div>
			<div id="select_file">
				<p>Select file to upload:</p>
				<?php print $file_ab; ?> file :
				<input type="file" size="35" name="upload_file_inputfile" />
				<br />
				<br />
				<input type="submit" name="upload_file_ok" value="OK" />
			</div>
		</form>
	</div>
</body>
</html>