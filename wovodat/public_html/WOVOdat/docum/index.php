<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>WOVOdat :: The World Organization of Volcano Observatories (WOVO): Database of Volcanic Unrest (WOVOdat), by IAVCEI</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <meta http-equiv="content-type" content="text/html;charset=iso-8859-1">
        <meta name="description" content="The World Organization of Volcano Observatories (WOVO): Database of Volcanic Unrest (WOVOdat)">
        <meta name="keywords" content="Volcano, Vulcano, Volcanoes">
        <link href="/css/styles_beta.css" rel="stylesheet">
        <link href="/gif2/WOVOfavicon.ico" type="image/x-icon" rel="SHORTCUT ICON">
        <script language="javascript" type="text/javascript" src="/js/scripts.js"></script>
    </head>
    <body>
        <div id="wrapborder">
            <div id="wrap">	
                <?php include 'php/include/header_beta.php'; ?>
                <!-- Content -->
                <div id="content">	
                    <!-- Left content -->
                    <div id="contentl"><br>
                        <p style="padding:10px 50px 0px 2px;"><span style="font-size:13px;">
                                WOVOdat Database uses formats and data structure as described in <a href="/docum/database/1.0/wovodat10_doc.pdf" title="download WOVOdat pdf 1.0 file" target="_blank">WOVOdat1.0 (Venezky and Newhall, 2007) </a>. The current version is WOVOdat1.1. The overall structure was retained from v1.0 to v1.1; most changes are in the details of parameters.<br>
                                We use MySQL database system, and convert all submitted data into xml-format (WOVOml). </span>
                        </p><br>
                        <p align="center" style="padding:0px;"><img src="/gif2/flowschema3a.png" width="410" height="308" alt="schema"></p>
                        <br><br>
                    </div>
                    <!-- Right content -->
                    <div id="contentr"><br>
                        <div style="background:#ddffed;"><br>
                            <h3 style="padding:0px 35px 0px 20px;"><a href="/docum/"> List of Documents Available</a></h3>
                            <p class="home1">
                            <ul>
                                <li>
                                    <p style="padding: 0px 40px 0px 10px;">WOVOdat1.1 Manual <a href="/docum/database/1.1/wovodat11_doc.pdf" title="download WOVOdat pdf file" target="_blank">(pdf)</a>
                                    <blockquote>WOVOdat database Documentation/ Manual</blockquote>
                                    </p>
                                </li>
                                <li>	
                                    <p style="padding: 0px 40px 0px 10px;">WOVOdat1.1 Tables <a href="/docum/database/1.1/index.php" title="view WOVOdat Table on-line">(online view)</a>
                                    <blockquote>Detail description of WOVOdat Tables</blockquote>
                                    </p>
                                </li><br>
                                <li>
                                    <p style="padding: 0px 40px 0px 10px;">WOVOml1.1.0 Schema <a href="/docum/system/1.1.0/wovoml_schema.xsd" title="view WOVOml descriptions">(online view)</a>
                                    <blockquote>WOVOdat Schema xsd</blockquote>
                                    </p>
                                </li>
                                <li>
                                    <p style="padding: 0px 40px 0px 10px;">WOVOdat XML <a href="/docum/system/1.1.0/wovoml_110.php" title="view WOVOml upload descriptions">(online view)</a>
                                    <blockquote>WOVOdat structure in XML format and their related MySQL's attributes</blockquote>
                                    </p>
                                </li>
                            </ul>
                            </p><br>
                        </div><br>
                      </div>
                </div>
                <!-- Footer -->
                <?php include 'php/include/footer_main_beta.php'; ?>
            </div> <!--end of wrap-->
        </div> <!--end of wrapborder-->
    </body>
</html>