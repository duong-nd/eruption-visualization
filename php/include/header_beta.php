<?php
if (!isset($_SESSION))
    session_start();
?>
<script language="JavaScript" src="/jscookmenu/JSCookMenu.js" type="text/javascript"></script>
<link rel="stylesheet" href="/jscookmenu/ThemeOffice/theme.css" type="text/css">
<script language="JavaScript" src="/jscookmenu/ThemeOffice/theme.js" type="text/javascript"></script>
<script language="JavaScript" src="/jscookmenu/menu-items.js" type="text/javascript"></script>
<style type="text/css">
    #header2 div:first-child{
        width: 180px;
    }
    #header2 div a{
        color:white;
    }
    #header2 div ul li{
        color: white;
        display: inline;
        padding-bottom: 2px;
        padding-left: 10px;
        padding-right: 10px;
        text-align:center;
        font-size: 1.2em;
    }
    #header2 div ul li:hover{
        background-color: grey;
        color: black;
    }
    #wovodatMenu{
        margin-left: 50px;
    }
    #header2 div ul{
        list-style-type:none;
        border-width: 0px;
        padding: 0px 0px 0px 0px;
        margin: 0px 0px 0px 0px;
        height: 18px;
    }
</style>
<div id="headershadow">
    <div id="headerspacer"></div>
    <div id="headerspacer1"></div>
    <div id="header1">
	<div id="wovologo">
		<a href="http://www.wovo.org/" target="_blank"><p align="center"><img src="/gif2/WOVO_logo.gif" alt="WOVO logo" width="40" height="40" border="0"></p></a>
	
	</div>
        <div align="left" id="wovodatlogo">
            <a href="http://www.wovodat.org/" target="_parent"><b><span style="font-family:lucida,sans-serif; font-size:32px; color:#0005b2;">WOVOdat</span></b><span style="font-family:lucida,sans-serif; font-size:12px; color:#fdfdfd;"> &nbsp ...A Database of Volcanic Unrest</span></a>
        </div>
        <div id="eoslogo">
            <a href="http://www.earthobservatory.sg/" target="_blank">
            </a>   
        </div>

        <div align="left" id="silogo">
            <a href="http://www.volcano.si.edu/" target="_blank">
	    </a>
        </div>
    </div>
    <div id="header2">
        <div style="float:right">
            <ul>
                <?php
                if (isset($_SESSION['login'])) {
                    ?>
                    <li>
                        <a href="/populate/my_account.php"><?php 
                        $n = $_SESSION['login']['cr_uname'];
                        $l = strlen($n);
                        if($l > 12) $n = substr($n,0,12) . '...';
                        echo $n; 
                        ?></a>
                    </li>
                    <li>
                        <a href="/populate/logout.php">Logout</a>
                    </li>
                    <?php
                } else {
                    ?>

                    <li>
                        <a href="/populate/index.php">Login</a>
                    </li>
                    <?php
                }
                ?>

            </ul>
        </div>
        <div id="wovodatMenu">
            <script type="text/javascript">cmDraw('wovodatMenu',wovodatMenu,'hbr', cmThemeOffice);</script>

        </div>		


    </div>
</div>
