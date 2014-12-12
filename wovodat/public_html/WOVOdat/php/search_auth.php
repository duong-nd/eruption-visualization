<?php

// Connect to database
include "php/include/db_connect_view.php";

// Get author
if (($auth=urldecode($_GET['auth']))=="") {
	exit;
}

// Query database
$result=mysql_query("SELECT cb_id, cb_title, cb_auth, cb_year, cb_journ, cb_vol, cb_pub, cb_page, cb_doi, cb_isbn, cb_url, cb_labadr, cb_keywords FROM cb WHERE cb_auth LIKE '%".mysql_real_escape_string($auth)."%' LIMIT 5");

while ($row=mysql_fetch_array($result)) {
	// Create <div class="suggestion" id="cb_id">Author (Year). Title</div>
	$cb_id=$row['cb_id'];
	$start_pos=stripos($row['cb_auth'], $auth);
	$end_pos=$start_pos+strlen($auth);
	$cb_auth=substr($row['cb_auth'], 0, $start_pos)."<b>".substr($row['cb_auth'], $start_pos, strlen($auth))."</b>".substr($row['cb_auth'], $end_pos);
	$cb_year=$row['cb_year'];
	$cb_title=$row['cb_title'];
	?><div class="suggest" id="<?php echo $cb_id; ?>" onmousedown="load_all('<?php echo $row['cb_title']."', '".$row['cb_auth']."', '".$row['cb_year']."', '".$row['cb_journ']."', '".$row['cb_vol']."', '".$row['cb_pub']."', '".$row['cb_page']."', '".$row['cb_doi']."', '".$row['cb_isbn']."', '".$row['cb_url']."', '".$row['cb_labadr']."', '".$row['cb_keywords']; ?>')"><?php echo $cb_auth; ?> (<?php echo $cb_year; ?>). <?php echo $cb_title; ?></div><?php
}

?>