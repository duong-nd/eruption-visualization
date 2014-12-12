<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>Phivolcs :: Monitoring Database, by VMEP</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8">
	<meta http-equiv="content-type" content="text/html;charset=iso-8859-1">

	<link href="../css/styles_beta.css" rel="stylesheet">
	<link rel="stylesheet" href="../jscookmenu/ThemeOffice/theme.css" type="text/css">

	<script language="JavaScript" src="../jscookmenu/JSCookMenu.js" type="text/javascript"></script>
	<script language="JavaScript" src="../jscookmenu/ThemeOffice/theme.js" type="text/javascript"></script>
	<script language="JavaScript" src="../jscookmenu/menu-items.js" type="text/javascript"></script>

<script type="text/javascript" src="/js/jquery-1.4.2.min.js"></script>	
<script type="text/javascript">
$( document ).ready( function() {
	$( '#nav ul li' ).click( function() {
		$( '#nav ul' ).children('li').removeClass();
		$( this ).addClass( 'selected' );
	});

	$("#ulid li").click(function() {
		$text =$(this).text();
		$src = "/documentation/volcano/"+$text+".html";
		$('#iframe').attr({
			src: $src
		});
	});
});
</script>	
<style type="text/css">
#nav .selected a{background:#3399CC;}
</style>	
</head>

<body>
	<div id="wrapborder">  <!--start wrapborder-->
		<div id="wrap">
			<div id="headershadow">
				<div id="headerspacer"></div>
				<div id="headerspacer1"></div>
				<div id="header1">

					<div  id="logo2_middle" >
						<p style="text-align:center; padding-top:20px;padding-left:120px;">
							<span style="font-family:lucida,sans-serif; font-size:20px; color:#0005b2;">
								RAPID INFORMATION ACCESS SYSTEM
							</span>
						</p>
					</div>

				</div>


				<div id="header2">
					<span id="wovodatMenu" style="float:left; margin-left:50px;">
						<script type="text/javascript">
							cmDraw('wovodatMenu',wovodatMenu,'hbr', cmThemeOffice);
						</script>
					</span>	
					
					<div id="navi">
						<ul>
							<li id="contactus"><a href="/populate/contact_us_form.php">Contact</a></li>
							<li name="myaccount" id="myaccount"><a href="/populate/my_account.php">My Account</a></li>
						</ul>
					</div>

				</div>
			</div>
			
			<!-- Content -->
			<div id="content" >
				
							
				<!-- Left --> 
				<div style="width:160px; height:700px; float:left; overflow:auto; padding:0px 2px 0px 0px;">
					<div id="nav" class="ddm2" style="margin-top:20px;">
						<ul id="ulid" style="list-style:square;">    
							<li><a href="#" >Makaturing</a></li>
							<li><a href="#">Matutum</a></li>
							<li><a href="#">Mayon</a></li>
							<li><a href="#">Musuan</a></li>
							<li><a href="#">Parker</a></li>
							<li><a href="#">Pinatubo</a></li>
							<li><a href="#">Ragang</a></li>
							<li><a href="#">Smith</a></li>
							<li><a href="#">Taal</a></li>
							<li><a href="#">Apo</a></li>
							<li><a href="#">Balut</a></li>
							<li><a href="#">Calballan</a></li>
							<li><a href="#">Cancannajag</a></li>
							<li><a href="#">Corregldor</a></li>
							<li><a href="#">Dakut</a></li>
							<li><a href="#">Gorra</a></li>
							<li><a href="#">etc....</a></li>
						</ul>
					</div>		
					
				</div>	

			<!--Right iframe master -->
				<div style="width:730px; height:1000px; float:left; overflow:auto; ">
					
					<iframe id="iframe" frameBorder="0" style="width:690px; height:900px; float:left; margin-top:20px;border: solid 1px; text-align: justify;">
						<p><b>Your browser does not support iframe!</b></p>
					</iframe>
				
						
			</div>

			</div>
			<!-- Footer -->
			<div id="footer">
				<?php include 'php/include/footer_main_beta.php'; ?>
			</div>
		</div> <!--end of wrap-->
	</div> <!--end of wrapborder-->
</body>
</html>
