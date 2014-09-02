<?php
	// Start session
	session_start();
	// Regenerate session ID
	session_regenerate_id(true);
	$uname="";
	$ccd="";
?>

<?php
	if (isset($_SESSION['login'])) {
		$uname=$_SESSION['login']['cr_uname'];
		$ccd=$_SESSION['login']['cc_id'];
	}
?>

<html>
	<script>
		function select_observos_change(){
			$('#observs').change(update_volcanos);
		}
		function update_volcanos(){
			var institute=$('#observs').attr('value');
			$.get('./convertie/selectVolOfInstitute2.php?kode='+institute, show_gunung);
		}
		function show_gunung(res){
			$('#volanos').html(res);
		}
		$(document).ready(select_observos_change);
	</script>

	<div style="padding: 0px 0px 0px 5px;">
	<br><br>
	<h1>Sending File</h1>
	<p>This page is for sending a file to the WOVOdat team.</p>

<?php
		echo "User: ".$uname."<br><br>";
?>
	<!-- Form -->
	<form method="post" action="submit_file_check.php" name="upload_form" enctype="multipart/form-data">
		<table>
			<tr>
				<td>
				<p1>Observatory (data owner) : </p1><br>
					<div id='observos' style="float:left">
						<select name='observs' id='observs' style="width:190px">
						<option value="observatory">...</option>
<?php
						include 'php/include/db_connect_view.php';
							
						$result = mysql_query("select cc_code, cc_country, cc_obs, cc_id from cc order by 								cc_country");
							
							while ($v_arr = mysql_fetch_array($result)) {
								if(!is_numeric($v_arr[0])){
									$titles=htmlentities($v_arr[2], ENT_COMPAT, "cp1252");
									if($v_arr[1]==""){
										if($v_arr[3]==$ccd){
											echo "<option value=\"$v_arr[0]\" title=\"$titles\" selected=\"selected\">".htmlentities($v_arr[0], ENT_COMPAT, "cp1252")."</option>";
										}else{
											echo "<option value=\"$v_arr[0]\" title=\"$titles\">".htmlentities($v_arr[0], ENT_COMPAT, "cp1252")."</option>";
										}
									}else{
										if($v_arr[3]==$ccd){
											echo "<option value=\"$v_arr[0]\" title=\"$titles\" selected=\"selected\">".htmlentities($v_arr[1].",".$v_arr[0], ENT_COMPAT, "cp1252")."</option>";
										}else{
											echo "<option value=\"$v_arr[0]\" title=\"$titles\">".htmlentities($v_arr[1].",".$v_arr[0], ENT_COMPAT, "cp1252")."</option>";
										}
									}
								}
							} 
?>
						</select>
					</div>
				</td>
				<td>
				<p1>Volcano: </p1><br>
					<div id="volanos">
						<select name="vol" id="vol"  style="width:160px"><option value="volcano">.....</option></select>
					</div>
				</td>
			</tr>
		</table><br>			
		<table class="formtable" id="formtable">
			<tr>
				<th>Select file (max size 2M):</th>
				<td>
					<input type="file" name="submit_file_inputfile" size="25" />
				</td>
			</tr>
			<tr>
				<th>Description/ comments:</th>
				<td>
					<textarea name="com" cols="40" rows="8" onkeydown="limitText(this, 1024)"><?php print $com; ?></textarea>
				</td>
			</tr>
		</table>
		<input type="submit" name="submit_file_form_ok" value="OK" />
	</form>
	<div>
</html>
