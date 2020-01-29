<?php /*?><?php
session_set_cookie_params(0);
error_reporting(0); 
session_start();
if (empty($_SESSION[username]) AND empty($_SESSION[password])){
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<center><H3>Mohon Login Terlebih Dahulu</h3><br>";
	echo "<a href=index.html><b>LOGIN</b></a></center>";
	exit;
}
include "koneksi.php";

include "autologout.php";

?><?php */?>

<?php
include "koneksi.php";
?>

<!DOCTYPE HTML>
<html>
<head>

<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="-1">
<meta http-equiv="pragma" content="no-cache">
<!--<link rel="shortcut icon" href="..//AntrianLAB/image/iconpage.png"/>-->
<meta http-equiv="refresh" content="5" >

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--<title>Display Date and Time in Javascript</title>-->


<title>RUANG TIMBANG</title>
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
	color: #000;
}
body,td,th {
	font-family: Tahoma, Geneva, sans-serif;
	font-size: 18px;
}
</style>

<link href="style.css" rel="stylesheet"/>
<style type="text/css">
<!--
.style6 {font-size: 24px}
-->

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
	left:87px;
	top:355px;
	width:1094px;
	height:590px;
	z-index:10;
	overflow: scroll;
}
#Layer2 {
	position:absolute;
	left:200px;
	top:-158px;
	width:5px;
	height:27000px;
	z-index:11;
	background-color: #000066;
}
.style7 {color: #DD4D41}
.style9 {
	font-size: 23px;
	color: #9900CC;
}
.style10 {
	color: #009933;
	font-weight: bold;
	font-size: 30px;
}
.style14 {font-size: 25px}
.style28 {font-size: 20px; }
.style34 {color: #9900CC}
.style35 {color: #9900CC; font-size: 24px; }
</style>

<script type="text/javascript" src="js/jquery.js"></script>

<script type="text/javascript" src="js/date_time.js"></script>

<!--<script src="jquery.js" type="text/javascript"></script>-->

<script type="text/javascript">
/*function pilih_semua()
{
	// mengecek Banyak checkbox di dalam form
	jumKomponen = $("input:checkbox").length;
	
	// myForm[0] merupakan checkbox induk untuk centang semua data
	if(document.myForm[0].checked == false)
	{
		//jika status checked(false) maka akan checked(true) semuanya
		for(x = 1; x <= jumKomponen ; x++ )
		{
			if(document.myForm[x].type == "checkbox") document.myForm[x].checked = false;
		}
	}
	else 
	{
		//jika status checked(true) maka akan checked(false) semuanya
		for(x = 1; x <= jumKomponen ; x++ )
		{
			if(document.myForm[x].type == "checkbox") document.myForm[x].checked = true;
		}
	}
}
function konfirmasi()
{
	// jika checked lebih dari satu maka di exsekusi
	
		if(confirm('apakah anda yakin menyimpan ?') == true)
		{
			tesCb = '';
			tesKd = '';
			var cboxes = document.getElementsByName('markCb[]');
			jumKomponen = $("input:checkbox").length;
			for(x = 1; x <= jumKomponen ; x++ )
		   {	if ( x == 1 ) {
		   			tesCb = cboxes[x-1].checked;
					tesKd = cboxes[x-1].value; }
				else {
		   			tesCb = tesCb+" "+cboxes[x-1].checked; 
					tesKd = tesKd+" "+cboxes[x-1].value;}
				document.myForm.cb.value = tesCb;
				document.myForm.kode.value = tesKd;
		   }
			return true;  
		} else {
			return false;
		}
	 
}*/
function konfirmasi(){	
	tanya = confirm("YAKIN INGIN CANCEL ???");
	if (tanya == true) return true;
	else return false;
}
</script>

</head>
<body bgcolor="#BFFBC0"> 

<div id="Layer1">
<form action="proses_antri.php" name="myForm" method="post">

    <div align="center">
	
	
      <table width="565" height="54" border="2" align="center" cellpadding="5" bordercolor="#3300FF">
	      <thead>
	        
	        <tr>
	          <td width="144" height="46"><div align="center" class="style9 style34">No. Antrian</div>	            <div align="center" class="style9">
	            <div align="center"></div>
	            </div></td>
		        <!--<td><div align="center">Kode</div></td>-->
	          <td width="184"><div align="center" class="style9">Ruang Timbang </div></td>
	          <td width="189"><div align="center" class="style9"> 
	            <div align="center">Status </div>
	          </div></td>
            </tr>
          </thead>
	      <tbody>
	        
  <?php
  			$date = date('Y/m/d 00:00:00');
		
			
			$query = "SELECT * FROM QP7ANTRIAN WHERE tgl_antrian = CONVERT(DATETIME,'".$date."', 102) AND jam_pasien_timbang_selesai is null order by id";

			
			$sql = sqlsrv_query($conn,$query);
			
			if ($sql)
			{ 
				while($rows = sqlsrv_fetch_array($sql))
				{
				?>
	        <tr>
	          <td height="39"><div align="center" class="style14">
	            <?=$rows['nomor_antrian']?>
	            </div>
				<div align="center" class="style14"></div></td> 
		        <td><div align="center">
				
		          <input type="image" name="call" src="Images/CALL.PNG" value="Call&1&<?=$rows['id']?>" onClick="call()"/>
				  
		          </div>
		        </td>
		        <td><div align="center">
			      <div align="center">
			        <?php if($rows['status'] == 1)
						   { echo '<i style="color:red;font-size:28px;font-family:calibri ;">
     							 Belum Timbang </i> '; }
						   elseif($rows['status'] == 2)
  						   { echo '<i style="color:blue;font-size:28px;font-family:calibri ;">
     							 Sudah Dipanggil </i> '; }
						   ?>
	            </div></td>
			</tr>
	        <?
				}
			} 
					
			else {?>
	        <tr>
	          <td colspan="4" align="center">Tidak Ada Antrian</td>
	        </tr>
	        <?  } ?>
          </tbody>
      </table>
      <div align="center">
        <input type="hidden" name="cb" value="">
        <input type="hidden" name="kode" value="">
      </div></div>
  </form>

<script>  
function call(){

	
} 
</script>
</div>

<div>	
<div align="center" id="2">
<form action="proses_after_call.php" name="myForm" method="post">
<p><span class="style6 style10"> . : ANTRIAN RUANG TIMBANG POLIKLINIK 7 : . </span></p>
<table width="278" height="244" border="2" cellpadding="5" bordercolor="#3300FF">
  <thead>
    <tr>
      <td height="38"><div align="center" class="style28">
        <div align="center"><span class="style35">Ruang Timbang  </span></div>
      </div></td>
      </tr>
    <tr>
      <td height="84">
	    
	    <div align="center">
	  
	  <?php 
	  $RT = "SELECT * FROM QP7TEMPLAST";
	  
	  $sqlRT = sqlsrv_query($conn,$RT);
	  
	  $isiRT = sqlsrv_fetch_array($sqlRT);

	  echo "<b style='color:red;font-size:65px;font-family:calibri ;'>".$isiRT['RuangTimbang']."</b>";
	  
	  ?>
          </div></td>
      </tr>
    <tr>
      <td width="258" height="47"><div align="center">
	  
	  
	   <input type="image" name="proses" src="Images/button_complete.PNG" value="Complete" />
	   
	   <input type="image" name="proses" src="Images/button_skip.PNG" value="Skip" />
	   
	   <input type="image" name="proses" src="Images/button_cancel.PNG" value="Cancel" onClick="return konfirmasi()" />
	   <script>
		function myFunction() {
			var txt;
			if (confirm("Press a button!")) {
				txt = "You pressed OK!";
			} else {
				txt = "You pressed Cancel!";
			}
			document.getElementById("demo").innerHTML = txt;
		}
		</script>
	
	   </div></td>
      </tr>
  </thead> 
</table>
<div align="center"></div>
<span id="date_time" style="font-size:30px; color:#009933"></span>
            <script type="text/javascript">window.onload = date_time('date_time');</script>
	<span class="style7"></span>
</form>
</div>
  
  
<?php /*?>    <?php		  
			$query = "SELECT * FROM QLANTRIAN WHERE jam_selesai is not null AND jam_lab_selesai is null";
			
			$sql = sqlsrv_query($conn,$query);
			
			if ($sql)
			{
				while($rows = sqlsrv_fetch_array($sql))
				{
				?>
    <?
				}
			} 
					
		
			else {?>
    <? } ?><?php */?>
  </tbody>
</table>
</body>
</html>