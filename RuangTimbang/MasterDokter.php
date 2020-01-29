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
<style type="text/css">
<!--
.style36 {font-size: 36px}
.style34 {color: #9900CC}
.style9 {  font-size: 23px;
  color: #9900CC;
}
-->
</style>
<p align="center"><img src="Images/header.png" width="1000" height="140"></p>
  <meta http-equiv="cache-control" content="no-cache">
  <meta http-equiv="expires" content="-1">
  <meta http-equiv="pragma" content="no-cache">

  <!--<meta http-equiv="refresh" content="5" >-->

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


  <title>MASTER DOKTER</title>
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
  left:177px;
  top:527px;
  width:950px;
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
.style28 {font-size: 20px; }
.style35 {color: #9900CC; font-size: 24px; }
.style38 {color: #FF0000}
.style39 {color: #336600}
.style40 {font-size: 18px}
</style>

<script type="text/javascript" src="js/jquery.js"></script>

<!--<script type="text/javascript" src="js/date_time.js"></script>-->

<script type="text/javascript">

</script>

</head>
<body bgcolor="">

<div>
<div align="center" id="2">
  <div align="center" class="style28">
    <div align="center"><span class="style35 style36">.: MASTER DOKTER :. </span></div>
  </div>
  <form name="form" method="post" action="proses_dokter.php"/> 
  <table width="517" height="259" cellpadding="5" bordercolor="#3300FF">
        <thead>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td height="32">&nbsp;</td>
          </tr>
          <tr>
            <td>ID </td>
            <td>:</td>
            <td height="38"><input name="id" type="text" id="id" size="6" maxlength="5" style="font-size:18px;border-color:#669900" /></td>
          </tr>
          <tr>
            <td>Nama</td>
            <td>:</td>
            <td height="34"><input name="nama" type="text" id="nama" size="60" maxlength="60" style="font-size:18px;border-color:#669900" /></td>
          </tr>
            <tr>
              <td>Status</td>
              <td>:</td>
              <td height="47"><label>
                <input name="pilihstatus" type="radio" value="1">
                <span class="style39">Aktif</span></label></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td height="39"><input name="pilihstatus" type="radio" value="2">
                <span class="style38">Non Aktif </span></td>
            </tr>
            <tr>
              <td width="59">&nbsp;</td>
              <td width="6">&nbsp;</td>
              <td width="404" height="47"><input name="save" type="image" src="../AntrianPoli7/Images/button_save.PNG" /></td>
            </tr>
        </thead> 
  </table>
  </form>
        <div id="Layer1">
          <div align="center">
            <table width="697" height="54" border="2" align="center" cellpadding="5" bordercolor="#3300FF">
              <thead>
                <tr>
                  <td width="67" height="46"><div align="center" class="style9 style34 style40">ID  </div>
                      <div align="center" class="style9 style40">
                        <div align="center"></div>
                      </div></td>
                  <td width="366"><div align="center" class="style9 style34 style40">Nama </div></td>
                  <td width="112"><div align="center" class="style9 style40">
                      <div align="center">Status </div>
                  </div></td>
                  <!--<td><div align="center">Kode</div></td>-->
                  <td width="90"><div align="center" class="style9 style40">Action </div></td>
                </tr>
              </thead>
              <tbody>
                <?php
          $date = date('Y/m/d 00:00:00');


          $query = "SELECT * FROM QP7DOCTOR order by Doctor_id";


          $sql = sqlsrv_query($conn,$query);

          if ($sql)
          { 
            while($rows = sqlsrv_fetch_array($sql))
            {
              ?>
                <tr>
                  <td height="39"><div align="center" class="style40">
                      <?=$rows['Doctor_Id']?>
                    </div>
                      <div align="center" class="style40"></div></td>
                  <td><div align="center" class="style40">
                    <div align="left">
                      <?=$rows['Name']?>
                    </div>
                  </div></td>
                  <td><div align="center" class="style40">
                      <div align="center">
                        <?php if($rows['Status'] == 1)
                  { echo '<i style="color:green;font-size:28px;font-family:calibri ;">
                  Aktif </i> '; }
                  elseif($rows['Status'] == 2)
                   { echo '<i style="color:red;font-size:28px;font-family:calibri ;">
                 Non Aktif </i> '; }
                 ?>
                      </div>
                  </div></td>
                  <td><div align="center" class="style40">
                      <input name="image2" type="image" onClick="edit(<?=$rows['Doctor_Id'];?>)" src="../AntrianPoli7/Images/button_edit.PNG" />
                  </div></td>
                </tr>
                <?
           }
         } 

         else {?>
                <tr>
                  <td colspan="5" align="center"><span class="style40">Tidak Ada Antrian</span></td>
                </tr>
                <?  } ?>
              </tbody>
            </table>
            <div align="center"> </div>
          </div>
  </div>
        <p><script type="text/javascript">window.onload = date_time('date_time');</script>
          
          <script>
         function edit(Ed){
          window.location.href = "MasterDokter_edit.php?cmd=edit&id="+Ed;
        } 
		  </script>
          
        <span class="style7"></span> </p>
        <div align="center"></div>
</div>
 </tbody>
</table>
</body>
</html>

