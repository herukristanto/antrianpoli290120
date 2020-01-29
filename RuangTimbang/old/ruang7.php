<?php /*?><?php
session_set_cookie_params(0);
error_reporting(0);
session_start();
if (empty($_SESSION[username]) AND empty($_SESSION[password])){
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<center><H3>Mohon Login Terlebih Dahulu</H3><br>";
	echo "<a href=index.html><b>LOGIN</b></a></center>";
	exit;
}

include "koneksi.php";

include "autologout.php";


$user = $_SESSION[username];
$hal = 'inputdata.php';
//$queryAut = "SELECT * FROM AUTH_USERS WHERE PagesID = '".$hal."' AND UserID = '" .$user. "'";
$queryAut = "SELECT * FROM V_AUTHPAGES WHERE PagesID = '".$hal."' AND UserID = '" .$user. "'";
$sqlAut = sqlsrv_query($conn, $queryAut);
while($rsAut = sqlsrv_fetch_array($sqlAut)){

$Permit = $rsAut['ReadPermit'];

if ( $Permit !== 'X') 
	{
	header("Location: sorry.php");
	}
	
}

#cekuser
$cekuser = "SELECT * FROM USERS WHERE User_ID = '" .$user. "'";
$sqlcek = sqlsrv_query($conn, $cekuser);
while($rsuser = sqlsrv_fetch_array($sqlcek)){

$Deptx = $rsuser['Departemen'];

if ( $Deptx == '*') 
	{
	#ambil data semua
		$query = "SELECT * FROM M_Kategori";
		$sql = sqlsrv_query($conn, $query);
		$arrind = array();
		while ($row = sqlsrv_fetch_array($sql)) {
			$arrind [ $row['Kategori'] ] = $row['Kategori'];
		}
	}	
elseif ( $Deptx !== '*')	
	{ 
	#ambil data
	$query = "SELECT * FROM V_KoneksiKategori where User_ID = '".$user."' and mark is null";
	$sql = sqlsrv_query($conn, $query);
	$arrind = array();
	while ($row = sqlsrv_fetch_array($sql)) {
		$arrind [ $row['Kategori'] ] = $row['Kategori'];
		}
	}
}


$user = $_SESSION['username'];

#ambil data
//$query = "SELECT * FROM V_KoneksiKategori where User_ID = '".$user."' and mark = '1'";
//$sql = sqlsrv_query($conn, $query);
//$arrind = array();
//while ($row = sqlsrv_fetch_array($sql)) {
//	$arrind [ $row['Kategori'] ] = $row['Kategori'];
//}

?><?php */?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LIST ANTRIAN</title>
<style type="text/css">
nav ul ul {
 display: none;
}
nav ul li:hover > ul {
 display: block;
}
nav ul {
 background: #efefef;
 padding: 0;
 list-style: none;
 position: relative;
 display: inline-table;
}
nav ul:after {
 content: ""; clear: both; display: block;
}
nav ul li {
 float: left;
}
nav ul li:hover {
 background: #4b545f;
}
nav ul li:hover a {
 color: #fff;
}
nav ul li a {
 display: block; padding: 0px 30px;
 color: #757575; text-decoration: none;
}
nav ul ul {
 background: #5f6975; border-radius: 0px; padding: 0;
 position: absolute; top: 100%;
}
nav ul ul li {
 float: none;
 border-top: 1px solid #6b727c;
 border-bottom: 1px solid #575f6a;
 position: relative;
}
nav ul ul li a {
 padding: 0px 30px;
 color: #fff;
} 
nav ul ul li a:hover {
 background: #4b545f;
}
nav ul ul ul {
 position: absolute; left: 100%; top:0;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(Images/displayruangtimbang.jpg);
	background-repeat: no-repeat;
}
#Container {
	margin-right: auto;
	margin-left: auto;
	border-top-width: 0px;
	border-right-width: 0px;
	border-bottom-width: 0px;
	border-left-width: 0px;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
}
#Header {
	height: 200px;
	width: 800px;
	margin-right: auto;
	margin-left: auto;
	border-top-width: 0px;
	border-right-width: 0px;
	border-bottom-width: 0px;
	border-left-width: 0px;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
	background-attachment: fixed;
	background-image: url(header.jpg);
	background-repeat: no-repeat;
	background-position: center top;
}
#NavBar {
	height: 20px;
	width: 800px;
	margin-right: auto;
	margin-left: auto;
	border-top-width: 0px;
	border-right-width: 0px;
	border-bottom-width: 0px;
	border-left-width: 0px;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
}
#MainContent {
	height: auto;
	width: 800px;
	margin-right: auto;
	margin-left: auto;
	border-top-width: 0px;
	border-right-width: 0px;
	border-bottom-width: 0px;
	border-left-width: 0px;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
}
#Footer {
	height: 100px;
	width: 800px;
	margin-right: auto;
	margin-left: auto;
	border-top-width: 0px;
	border-right-width: 0px;
	border-bottom-width: 0px;
	border-left-width: 0px;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
	font-size: 10px;
	color: #000000;
}
body,td,th {
	font-family: Tahoma, Geneva, sans-serif;
	font-size: 18px;
}

textarea  
{  
   font-family:"Tahoma", Geneva, sans-serif;  
   font-size: 16px;   
}

/*untuk combo box */
span.inputan { display:block; margin-bottom:5px; }
span.inputan label { float:left; display:block; width:200px;}
/*untuk combo box */

.style3 {
	font-size: 17px;
	font-family: "Courier New", Courier, monospace;
}
.style4 {font-size: 14px}

/*VERTIKAL*/
@import url(http://fonts.googleapis.com/css?family=Oxygen+Mono);
/* Please Keep this font import at the very top of any CSS file */
@charset "UTF-8";
/* Starter CSS for Flyout Menu */
#cssmenu {
  /* padding: 0; */
  padding-top:5px;
  padding-bottom:5px; 
  /* margin: 0; */
  margin-top:200px;
  border: 0;
  line-height: 1;
}
#cssmenu ul,
#cssmenu ul li,
#cssmenu ul ul {
  list-style: none;
  margin: 0;
  padding: 0;
}
#cssmenu ul {
  position: relative;
  z-index: 597;
  float: left;
}
#cssmenu ul li {
  float: left;
  min-height: 1px;
  line-height: 1em;
  vertical-align: middle;
  position: relative;
}
#cssmenu ul li.hover,
#cssmenu ul li:hover {
  position: relative;
  z-index: 599;
  cursor: default;
}
#cssmenu ul ul {
  visibility: hidden;
  position: absolute;
  top: 100%;
  left: 0px;
  z-index: 598;
  width: 100%;
}
#cssmenu ul ul li {
  float: none;
}
#cssmenu ul ul ul {
  top: -2px;
  right: 0;
}
#cssmenu ul li:hover > ul {
  visibility: visible;
}
#cssmenu ul ul {
  top: 1px;
  left: 99%;
}
#cssmenu ul li {
  float: none;
}
#cssmenu ul ul {
  margin-top: 1px;
}
#cssmenu ul ul li {
  font-weight: normal;
}
/* Custom CSS Styles */
#cssmenu {
  width: 200px;
  background: #333333;
  font-family: 'Oxygen Mono', Tahoma, Arial, sans-serif;
  zoom: 1;
  font-size: 14px;
}
#cssmenu:before {
  content: '';
  display: block;
}
#cssmenu:after {
  content: '';
  display: table;
  clear: both;
}
#cssmenu a {
  display: block;
  padding: 15px 20px;
  color: #ffffff;
  text-decoration: none;
  text-transform: uppercase;
}
#cssmenu > ul {
  width: 200px;
}
#cssmenu ul ul {
  width: 200px;
}
#cssmenu > ul > li > a {
  border-right: 4px solid #1b9bff;
  color: #ffffff;
}
#cssmenu > ul > li > a:hover {
  color: #ffffff;
}
#cssmenu > ul > li.active a {
  background: #1b9bff;
}
#cssmenu > ul > li a:hover,
#cssmenu > ul > li:hover a {
  background: #1b9bff;
}
#cssmenu li {
  position: relative;
  z-index:100;
}
#cssmenu ul li.has-sub > a:after {
  content: '+';
  position: absolute;
  top: 50%;
  right: 15px;
  margin-top: -6px;
}
#cssmenu ul ul li.first {
  -webkit-border-radius: 0 3px 0 0;
  -moz-border-radius: 0 3px 0 0;
  border-radius: 0 3px 0 0;
}
#cssmenu ul ul li.last {
  -webkit-border-radius: 0 0 3px 0;
  -moz-border-radius: 0 0 3px 0;
  border-radius: 0 0 3px 0;
  border-bottom: 0;
}
#cssmenu ul ul {
  -webkit-border-radius: 0 3px 3px 0;
  -moz-border-radius: 0 3px 3px 0;
  border-radius: 0 3px 3px 0;
}
#cssmenu ul ul {
  border: 1px solid #0082e7;
}
#cssmenu ul ul a {
  /* font-size: 12px; */
  font-size: 14px;
  color: #ffffff;
}
#cssmenu ul ul a:hover {
  color: #ffffff;
}
#cssmenu ul ul li {
  border-bottom: 1px solid #0082e7;
}
#cssmenu ul ul li:hover > a {
  background: #4eb1ff;
  color: #ffffff;
}
#cssmenu.align-right > ul > li > a {
  border-left: 4px solid #1b9bff;
  border-right: none;
}
#cssmenu.align-right {
  float: right;
}
#cssmenu.align-right li {
  text-align: right;
}
#cssmenu.align-right ul li.has-sub > a:before {
  content: '+';
  position: absolute;
  top: 50%;
  left: 15px;
  margin-top: -6px;
}
#cssmenu.align-right ul li.has-sub > a:after {
  content: none;
}
#cssmenu.align-right ul ul {
  visibility: hidden;
  position: absolute;
  top: 0;
  left: -100%;
  z-index: 598;
  width: 100%;
}
#cssmenu.align-right ul ul li.first {
  -webkit-border-radius: 3px 0 0 0;
  -moz-border-radius: 3px 0 0 0;
  border-radius: 3px 0 0 0;
}
#cssmenu.align-right ul ul li.last {
  -webkit-border-radius: 0 0 0 3px;
  -moz-border-radius: 0 0 0 3px;
  border-radius: 0 0 0 3px;
}
#cssmenu.align-right ul ul {
  -webkit-border-radius: 3px 0 0 3px;
  -moz-border-radius: 3px 0 0 3px;
  border-radius: 3px 0 0 3px;
}
/*VERTIKAL*/
#Layer1 {
	position:absolute;
	left:34px;
	top:27px;
	width:898px;
	height:656px;
	z-index:10;
}
#Layer2 {
	position:absolute;
	left:200px;
	top:-158px;
	width:5px;
	height:1108px;
	z-index:11;
	background-color: #000066;
}

.style5 {font-size: 30px}
.style7 {font-size: 30px; font-weight: bold; }
</style>
<script type="text/javascript" src="libs/jquery.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function()
			{
				$('#unitkerja').change(function()
				{
					$.getJSON('inputdata.php',{action:'getunit', indikator:$(this).val()}, function(json)
					{
						$('#indikator').html('');
						$.each(json, function(index, row) 
						{
							$('#indikator').append('<option value="'+row.kode+'">'+row.nama+'</option>');
						});
					});
				});
			});
		</script>


<script language="javascript">    
function getkey(e)    
{    
if (window.event)    
   return window.event.keyCode;    
else if (e)    
   return e.which;    
else    
   return null;    
}    
function angkadanhuruf(e, goods, field)    
{    
var angka, karakterangka;    
angka = getkey(e);    
if (angka == null) return true;    
     
karakterangka = String.fromCharCode(angka);    
karakterangka = karakterangka.toLowerCase();    
goods = goods.toLowerCase();    
     
// check goodkeys    
if (goods.indexOf(karakterangka) != -1)    
    return true;    
// control angka    
if ( angka==null || angka==0 || angka==8 || angka==9 || angka==27 )    
   return true;    
        
if (angka == 13) {    
    var i;    
    for (i = 0; i < field.form.elements.length; i++)    
        if (field == field.form.elements[i])    
            break;    
    i = (i + 1) % field.form.elements.length;    
    field.form.elements[i].focus();    
    return false;    
    };    
// else return false    
return false;    
}    
</script>    
</head>
<body bgcolor="#289a30">
<div id="Layer1">
     <form action="" method="post">
   
	  <table width="900" height="597" border="1">
  <tr>
    <th width="144" height="59" scope="col"><div align="center"></div></th>
    <th width="137" scope="col"><div align="center"></div></th>
    <th width="136" scope="col"><div align="center"></div></th>
    <th width="146" scope="col"><div align="center"></div></th>
    <th width="140" scope="col"><div align="center"></div></th>
    <th width="157" scope="col"><div align="center"></div></th>
  </tr>
  <tr>
    <td width="144" height="62" scope="col"><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td height="60">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="65">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="69">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="60">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="67">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="68">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="65">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

     </form>
</div>
  
<p align="center">&nbsp;</p>
<p align="center" class="style3 style4">&nbsp;</p>
  </div>
</body>
</html>

